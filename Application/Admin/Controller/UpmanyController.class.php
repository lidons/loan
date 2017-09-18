<?php
namespace Admin\Controller;
use Think\Controller;
class UpmanyController extends PublicController {
		public function index(){
		$User  = M('Upmany');
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
		$list = $User->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
		$this->assign('upmany',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
		}
		public function add_tc_do(){
			if(!trim($_POST['title'])){
				echo "<script>alert('银行名字为空');window.history.back();</script>";
				return false;
			}
			$data['title'] = $_POST['title'];
			$data['picture']=$this->uploads($_FILES['img']);
			$data['jump_picture']=$this->uploads($_FILES['imgs']);
			$res = M('Upmany')->add($data);
			if($res){
				$this->success('添加成功',U('/Admin/upmany/index'));
			}else{
				$this->error('添加成功');
			}
		}
		public function del_upmany_to(){
			$id = $_POST['id'];
			$res = M('Upmany')->where('id='.$id)->delete();
			if($res){
				return show(1,'删除成功');
			}else{
				return show(0,'删除失败');
			}
		}
		public function save_tc(){
			$id = $_GET['id'];
			$res = M('Upmany')->where('id='.$id)->find();
			$this->assign('res',$res);
			$this->display();
		}
		public function add_upmany_do(){
				$id = $_POST['id'];
				$data['title'] = $_POST['title'];
				if($_FILES['img']['name']){
					$data['picture'] = $this->uploads($_FILES['img']);
				}
				if($_FILES['imgs']['name']){
					$data['jump_picture'] = $this->uploads($_FILES['imgs']);
				}
				$res = M('upmany')->where('id='.$id)->save($data);
				if($res){
					$this->success('修改成功',U('/Admin/upmany/index'));
				}else{
					$this->error('修改失败');
				}
		}
}