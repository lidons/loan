<?php
namespace Admin\Controller;
use Think\Controller;
class MenuController extends PublicController {
	public function index(){
		$User  = M('Menu');
		$count = $User->count();// 查询满足要求的总记录数
		//var_dump($count);
		$Page  = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(10)
		$Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('last', '末页');
		$Page->setConfig('first', '首页');
		$Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
		$Page->lastSuffix = false;//最后一页不显示为总页数
		$show = $Page->show();// 分页显示输出
		$list = $User->limit($Page->firstRow.','.$Page->listRows)->order('id desc,createtime desc')->select();
		$this->assign('menu',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}
	public function del_menu(){
		$id = $_POST['id'];
		$res = D('Menu')->del_black($id);
		if($res){
			return show(1, '删除成功');
		}else{
			return show(0,'删除失败');
		}
	}
	public function add_article_do(){
		$data['title'] = $_POST['title'];
		$data['rank'] = $_POST['rank'];
		$data['picture'] = $this->uploads($_FILES['img']);
		$data['small_title'] = $_POST['small_title'];
		$data['description'] = $_POST['content'];
		$data['createtime'] = time();
		//var_dump($data['createtime']);exit();
		$res = D('Menu')->addMenu($data);
		if ($res) {
			$this->success('添加成功',"/Admin/Menu/index");
		}else{
			$this->success('添加失败');
		}
	}
	public function save_menu(){
		$id =  $_GET['id'];
		$menu = D('Menu')->updata_menu($id);
		$this->assign('menu',$menu);
		$this->display();
	}
	public function updata_menu_do(){
		$id = $_POST['id'];
		$data['title'] = $_POST['title'];
		$data['rank'] = $_POST['rank'];
		$data['small_title'] = $_POST['small_title'];
		$data['description'] = $_POST['content'];
		$data['createtime'] = time();
		if($_FILES['img']['name']){
			$data['picture'] = $this->uploads($_FILES['img']);
		}
		$res = D('Menu')->saveMenuNot($id,$data);
		if($res){
			$this->success('修改成功',"/Admin/Menu/index");
		}else{
			$this->error('修改失败');
		}
	}
	public function del(){
		$id = $_GET['id'];  //判断id是数组还是一个数值
		if($id == ''){
			$this->error('删除失败');
		}
		if(is_array($id)){
			$where = 'id in('.implode(',',$id).')';
		}else{
			$where = 'id='.$id;
		}  //dump($where);
		//var_dump($where);exit;
		$list = M('Menu')->where($where)->delete();
		if($list!==false) {
			$this->success("成功删除{$list}条");
		}else{
			$this->error('删除失败！');
		}
	}
		
}