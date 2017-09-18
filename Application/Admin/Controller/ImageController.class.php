<?php
namespace Admin\Controller;
use Think\Controller;
class ImageController extends PublicController {
		public function index(){
			$res = M('img')->where('status=1')->find();
			$this->assign('img',$res);
			$this->display();	
		}
		public function add_img(){
			$this->display();
		}
		public function help_user(){
			$res= M('img')->where('status=2')->find();
			$this->assign('res',$res);
			$this->display();
		}
		public function add_image_do(){
			$id = $_POST['id'];
// 			var_dump($id);exit;
			$data['img'] = $this->uploads($_FILES['img']);
			$data['createtime'] = time(); 
			$res = M('img')->where('id='.$id)->save($data);
			if($res){
				$this->success('修改成功');
			} 
		}
}