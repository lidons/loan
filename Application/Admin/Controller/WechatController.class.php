<?php
namespace Admin\Controller;
use Think\Controller;
class WechatController extends PublicController {
		public function init() {
			$config=M('wechat')->where('id=1')->find();
			$options = array(
					'token'=>$config['token'], //填写你设定的key
					'encodingaeskey'=>$config['encodingaeskey'], //填写加密用的EncodingAESKey
					'appid'=>$config['appid'], //填写高级调用功能的app id, 请在微信开发模式后台查询
					'appsecret'=>$config['appsecret'] //填写高级调用功能的密钥
			);
			$weObj = new  \Vendor\Wechat\wechat($options); //创建实例对象
			return $weObj;
		}
		public function index(){
			$res = M('wechat')->where('id=1')->find();
			$this->assign('res',$res);
			$this->display();
		}
		public function addwx_info(){
			$res = M('wechat')->where('id=1')->save($_POST);
			if ($res) {
				return show(1, '修改成功');
			}else{
				return show(0, '修改失败');
			}
		}
		public function addmenu(){
			$res = M('wxmenu')->select();
			$this->assign('res',$res);
			//dump($res);exit();
			$this->display();
		}
		public function addmenu_do(){
			$res = M('wxmenu')->where('status=0')->field('id,name')->select();
			$this->assign('res',$res);
			$this->display();
		}
		public function append_menu(){
			//dump($_POST);exit();
			$res = M('wxmenu')->add($_POST);
			if($res){
				return show(1,'增加成功');
			}else{
				return show(0,'增加失败');
			}
		}
		public function del_wxmenu(){
			$id = $_POST['id'];
			$res = M('wxmenu')->where('id='.$id,'$status='.$id)->delete();
			if($res){
				return show(1, '删除成功');
			}else{
				return show(0, '删除失败 ');
			}
		}
		public function del_one_wxmenu(){
			$id = $_POST['id'];
			$res = M('wxmenu')->where('id='.$id)->delete();
			if($res){
				return show(1, '删除成功');
			}else{
				return show(0, '删除失败');
			}
		}
		public function saveMenu(){
			$id = $_GET['id'];
			$wx = M('wxmenu')->where('id='.$id)->find();
			$this->assign('wx',$wx);
			$this->display();
		}
		public function saveOneMenu(){
			$id = $_GET['id'];
			$res = M('wxmenu')->where('status=0')->select();
			$wx = M('wxmenu')->where('id='.$id)->find();
			$this->assign('res',$res);
			$this->assign('wx',$wx);
			$this->display();
		}
		public function save_wxmenu_main(){
			//dump($_POST);exit;
			$id = $_POST['id'];
			$res = M('wxmenu')->where('id='.$id)->save($_POST);
			if($res){
				return show(1, '修改成功');
			}else{
				return show(0, '修改失败');
			}
		}
		public function modify_wxmenu(){
			$id = $_POST['id'];
			$res = M('wxmenu')->where('id='.$id)->save($_POST);
			if($res){
				return show(1, '修改成功');
			}else{
				return show(0, '修改失败');
			}
		}
		/*
		 *
		* 创建菜单
		*
		* 
		* */
		function get_data() {
			$list = M ( 'wxmenu' )->select ();
			// 取一级菜单
			foreach ( $list as $k => $vo ) {
				if ($vo ['status'] != 0)
					continue;
				$one_arr [$vo ['id']] = $vo;
				unset ( $list [$k] );
			}
			//var_dump( $list); die;
			//dump($one_arr);exit;
			foreach ( $one_arr as $p ) {
				$data [] = $p;
				$two_arr = array ();
				foreach ( $list as $key =>$l ) {
					if ($l ['status'] != $p ['id'])
						continue;
					$l ['name'] = '├──' . $l ['name'];
					$two_arr [] = $l;
					unset ( $list [$key] );
				}
				$data = array_merge($data,$two_arr);
				//dump($data);exit;
			}
			//var_dump($data); die;
			return $data;
		}
		function _deal_data($d) {
			//dump($d);exit;
			$res ['name'] = str_replace ( '├──', '', $d ['name'] );
			if($d['wx_type']=='view'){
				$res ['type'] = 'view';
				$res ['url'] = trim($d['menu_change']);
			}elseif($d['wx_type'] == 'click'){
				$res ['type'] = 'click';
				$res ['key'] = trim ($d['menu_change'] );
			}
			//dump($res);exit;
			return $res;
		}
		function json_encode_cn($data) {
			$data = json_encode ($data,JSON_UNESCAPED_UNICODE);
			//return preg_replace ( "/\\\u([0-9a-f]{4})/ie", "iconv('UCS-2BE', 'UTF-8', pack('H*', '$1'));", $data );
			return preg_replace_callback( "/\\\u([0-9a-f]{4})/is", "iconv('UCS-2BE', 'UTF-8', pack('H*', '$1'));", $data );
		}
		//生成菜单
		public function createMenu() {
			$data = $this->get_data ();
			foreach ( $data as $k => $d ) {
				if ($d ['status'] != 0)
					continue;
				$tree ['button'] [$d ['id']] = $this->_deal_data ($d);
				unset($data [$k] );
			}
			foreach ( $data as $k => $d ) {
				$tree ['button'] [$d ['status']] ['sub_button'] [] = $this->_deal_data ( $d );
				unset ( $data [$k] );
			}
			$tree2 = array ();
			$tree2 ['button'] = array ();
			foreach ( $tree ['button'] as $k => $d ) {
				$tree2 ['button'] [] = $d;
			}
			$tree = $this->json_encode_cn($tree2);
			$weObj = $this->init();
			//dump($weObj);exit;
			//dump($tree);exit;
			$res = $weObj->createMenu($tree);
			if($res['errcode']== 0){
				$this->success ( "重新创建菜单成功!" );
			}else{
				$this->error ($res['errmsg']);
			}
		}


}