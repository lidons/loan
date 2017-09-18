<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {
	//验证登陆
	public function __construct(){
	    parent::__construct();
		if(!session('?user')){
		  $this->redirect('Admin/Login/index');
		}
	}

	public function wechat( ){
		$config=M('wxconfig')->where(array('id'=>1))->find();
			 $options = array(
				'token'=>$config['token'], //填写你设定的key
				'encodingaeskey'=>$config['encodingaeskey'], //填写加密用的EncodingAESKey
				'appid'=>$config['appid'], //填写高级调用功能的app id, 请在微信开发模式后台查询
				'appsecret'=>$config['appsecret'], //填写高级调用功能的密钥
				'partnerid' => $config ["partnerid"], // 财付通商户身份标识
				'partnerkey' => $config ["paymentkey"], // 财付通商户权限密钥Key
				);
		$weObj = new  \Vendor\Wechat\wechat($options); //创建实例对象
		return $weObj;
	}	
		
	public function uploads($img){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->autoSub = true;
		$upload->subName = array('date','Ymd');
		$upload->saveName = array('uniqid','');
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =      './Public/uploads/'; // 设置附件上传根目录
		$info  =  $upload->uploadOne($img);
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{
			
			return $info['savepath'].$info['savename'];;
			
		}

		


	}
}