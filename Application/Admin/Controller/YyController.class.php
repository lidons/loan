<?php
namespace Admin\Controller;
use Think\Controller;
class YyController extends PublicController {
		public function index(){
		$User  = M('User');
		$count = $User->where('state=1')->count();// 查询满足要求的总记录数
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
		$list = $User->where('state=1')->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
		$this->assign('user',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
		}
		public function black(){
		$User  = M('User');
		$count = $User->where('state=0')->count();// 查询满足要求的总记录数
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
		$list = $User->where('state=0')->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
		$this->assign('user',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
		}
		
		public function commision(){
		$User  = M('Commision');
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
		$res = M('Money')->where('id=1')->field('show_money')->select();
		$add = M('Money')->where('id=2')->field('show_money')->select();
		$b = $res['0'];
		$o = $add['0'];
		$this->assign('one',$b);
		$this->assign('two',$o);
		$this->assign('commision',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
		}
		public function del_black(){
			$id = $_POST['id'];
			$res = D('User')->del_black($id);
			if($res){
				return show(1,'删除成功');
			}else{
				return show(0,'删除失败');
			}
		}
		public function save(){
			$id = $_GET['id'];
			$user = M('User')->where('id='.$id)->select();
			$this->assign('user',$user);
			$this->display();
		}
	  public function addmoney_do(){
	  	 if($_POST['money'] >= 100){
	  	 	return show(0,'金额过大');
	  	 }
	  	 $id = $_POST['id'];
	  	 $data['money'] = $_POST['money'];
	  	 $save = D('User')->saveMoney($id,$data);
	  	 if($save){
	  	 	return show(1,'金额修改成功');
	  	 }else{
	  	 	return show(0,'金额修改失败');
	  	 }
	  }
	  public function pull_black(){
	  	$id = $_POST['id'];
	  	$data['state'] = $_POST['state'];
	  	$res = D('User')->saveStatus($id,$data);
	  	if ($res){
	  		return show(1,'操作成功');
	  	} else{
	  		return show(0,'操作失败');
	  	}
	  }
	  public function save_moeny(){
	  	$main = M('Money')->select();
	  	//var_dump($main);
	  	$this->assign('main',$main);
	  	$this->display();
	  }
	  public function save_number(){
	  	$id = $_POST['id']; 
	  	$data['show_money'] = $_POST['show_money']/100;
	  	$res = M('Money')->where('id='.$id)->save($data);
	  	if($res){
	  		return show(1, '修改成功');
	  	}else{
	  		return show(0, '修改失败');
	  	}
	  }
	  public function del_commision(){
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
	  		$list = M('Commision')->where($where)->delete();
	  		if($list!==false) {
	  			$this->success("成功删除{$list}条");
	  		}else{
	  			$this->error('删除失败！');
	  		}
	  }
	  public function up_commision(){
	  	$id = $_POST[id];
	  	$data['status'] = $_POST['status'];
	  	$res = M('Commision')->where('id='.$id)->save($data);
	  	if($res){
	  		return show(1, '佣金发放成功');
	  	}else{
	  		return show(1, '佣金发送失败请重新再试');
	  	}
	  }
	  public function WxInsert(){
	  	$i=1;
	  	while ($i<50){
	  		M('Commision')->add($data);
	  		echo "This is ：".$i;
	  		echo "<br />";
	  		$data['source'] = rand(100,1000);
	  		$data['status'] = rand(0,1);
	  		$data['createtime']=time();
	  		$i++;
	  	}
	  }
	  public function vip_moeny(){
	  		$res = M('Member')->select();
	  		$this->assign('member',$res);
	  		$this->display();	
	  }
	  public function save_member(){
	  		$id = $_POST['id'];
	  		$data['member_moeny'] = $_POST['show_money'];
	  		$res = M('Member')->where('id='.$id)->save($data);
	  		if($res){
	  			return show(1,'修改成功');
	  		}else{
	  			return show(0,'修改失败');
	  		}
	  }
}