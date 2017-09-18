<?php
namespace Admin\Controller;
use Think\Controller;
class MainController extends Controller {
		public function index(){
		 	//获得参数 signature nonce token timestamp echostr
			$nonce     = $_GET['nonce'];
			$token     = lidons;
			$timestamp = $_GET['timestamp'];
			$echostr   = $_GET['echostr'];
			$signature = $_GET['signature'];
			//形成数组，然后按字典序排序
			$array = array();
			$array = array($nonce, $timestamp, $token);
			sort($array);
			//拼接成字符串,sha1加密 ，然后与signature进行校验
			$str = sha1(implode($array));
			if( $str  == $signature && $echostr ){
				//第一次接入weixin api接口的时候
				echo  $echostr;
				exit();
			}else{
				$this->reponseMsg();
			}
		}
		public function init(){
				$config=M('wechat')->where(array('id'=>1))->find();
				$options = array(
				'token'=>$config['token'], //填写你设定的key
				'encodingaeskey'=>$config['encodingaeskey'], //填写加密用的EncodingAESKey
				'appid'=>$config['appid'], //填写高级调用功能的app id, 请在微信开发模式后台查询
				'appsecret'=>$config['appsecret'] //填写高级调用功能的密钥
				);
				$weObj = new  \Vendor\Wechat\wechat($options); //创建实例对象
				return $weObj;
		}
		public function qrcode($res){
				$filename = "Public/qrcode/$res.png";
				if(file_exists($filename)){
					return false;
				}else{
				$weObj=$this->init();
				$ticket = $weObj->getQRCode($res,1);
		        $imgurl = $weObj->getQRUrl($ticket['ticket']);
				//dump($url);exit;
				
				//dump($imgurl);

				ob_start();
				readfile($imgurl);
				$img = ob_get_contents();
				ob_end_clean();
				$size = strlen($img);
				$fp2=fopen($filename, "a");
				//var_dump($fp2);
				fwrite($fp2,$img);
				fclose($fp2);
				$image = new \Think\Image();
				$image->open($filename);
				// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
				$image->thumb(240, 240)->save($filename);
				$image->open('Public/qrcode/bg.png')->water($filename,\Think\Image::IMAGE_WATER_CENTER)->save($filename); 
			}
		}	
		public function uploadImg($id){
			$path = realpath("Public/qrcode/$id.png");
			$weObj = $this->init();
			if(class_exists('CURLFile')){
				$data = array('media'=>new \CURLFile($path));
			}else{
				$data = array('media'=>'@'.$path);
			}
			$res = $weObj->uploadMedia($data,'image');
			return $res['media_id'];
		}		
		public function reponseMsg(){
			$weObj = $this->init();
			$type = $weObj->getRev()->getRevType ();
			$c = $weObj->getRev()->getRevEvent();
			$openid=$weObj->getRevFrom();
			//关注者的基本信息
			$userinfo=$weObj->getUserInfo($openid);
			$reply = $weObj->reply();
			if($type) {
					//点击事件
					if($c['key']=='setclick'){
						$res = M('User')->where(array('wxuser'=>$openid))->find();
						$id = $res['id'];
						$this->qrcode($id);
						//$weObj->text('二维码生成中......')->reply();
						$weObj->image($this->uploadImg($id))->reply();exit;
					}
					//关注事件
					if($c['event']=="subscribe"){
						if($c['key']){
							$openid = $_GET['openid'];
							$res = M('user')->where(array('wxuser'=>$openid))->find();
							if($res){
								$weObj->text('终于等到你，还好我没放弃')->reply();exit;	
							}else{
								$userinfo=$weObj->getUserInfo($openid);
								$fid = substr($c['key'], 8);
								$res = M('user')->where(array('id'=>$fid))->find();
								$hiuseropen= $res['wxuser'];
								$obj = M('user')->where(array('wxuser'=>$hiuseropen))->find();
								$data['wxuser'] = $userinfo['openid'];
								$data['wxnickname']= $userinfo['nickname'];
								$data['upuseropenid'] = $res['wxuser'];
								$data['upuser']=$res['wxnickname'];
								$data['heightuser']=$obj['upuser']?$obj['upuser']:'';
								$data['huseropenid']=$obj['upuseropenid']?$obj['upuseropenid']:'';
								$data['headimgurl']= $userinfo['headimgurl'];
								$data['city']= $userinfo['city'];
								$data['province'] = $userinfo['province'];
								$data['create_time'] = time();
								M('User')->add($data);
								$weObj->text("您由【".$data['upuser']."】邀请成为全民一手的会员--------------------------
								现在"."<a href='http://ldw.wifi5g.top/index.php/home/index/shop'>点击这里</a>"."购买会员获取更多的会员权限把！您还可以点击我的二维码获得属于自己的专属二维码邀请更多的朋友来参加")->reply();exit;
								}
							}else{
								$res = M('user')->where(array('wxuser'=>$openid))->find();
								if($res){
									$weObj->text('终于等到你，还好我没放弃,我以为你把我忘了呢！')->reply();exit;	
								}else{
									$weObj->text('欢迎您关注全民一手，您可以点击我的二维码生成专属的二维码，这样就可以邀请更多的小伙伴在一起玩算了')->reply();exit;	
								}
						}
						
					}
				
				
			}
}
}