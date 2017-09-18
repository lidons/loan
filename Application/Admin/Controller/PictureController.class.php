<?php
/**
 * @author lidons
 *
 */
namespace Admin\Controller;
use Think\Controller;
class PictureController extends PublicController {
	public function index(){
		$img = M('Picture')->order('id desc,sort asc')->select();
		$conut = M('Picture')->count();
		$this->assign('count',$conut);
		$this->assign('img',$img);
  		$this->display();
	}
   public function add_img(){
   		$data['img_desc'] = $_POST['desc'];
   		$data['img'] = $this->uploads($_FILES['img']);
   		$data['sort'] = $_POST['sort'];
   		$data['createtime'] = time();
   		$res = M('Picture')->add($data);
   		if($res){
   			$this->success('成功',U('/Admin/Picture/index'));
   		}else{
   			$this->error('失败');
   		}
   }
   public function del_img(){
   		$id = $_POST['id'];
   		$res = M('Picture')->where('id='.$id)->delete();
   		if($res){
   			return show(1, '删除成功');
   		}else{
   			return show(0, '删除失败');
   		}
   }
}