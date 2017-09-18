<?php
namespace Home\Controller;
class IndexController extends PublicController {
	/*个人中心*/
    public function index(){
		$openid = session('useropenid');
		$res = M('User')->where(array('wxuser'=>$openid))->find();
		$this->assign('res',$res);
		$this->display();
    }
    /*会员购买*/
    public function shop(){
		  $openid = session('useropenid');
		  $res = M('Member')->select();
		  $info = M('User')->where(array('wxuser'=>$openid))->find();
		  $img = M('Picture')->order('sort asc, id desc')->field('id,img')->select();
		  $this->assign('member',$res);
		  $this->assign('img',$img);
		  $this->assign('info',$info);
		  $this->display();
	  }
    public function getInfo(){
    	var_dump($_POST);
    }
    /*支付页面*/
    public function play(){
		$openid = $_GET['openid'];
		$data['username']=$_GET['name'];
		$data['wxnumber']=$_GET['wechat'];
		$data['phone']=$_GET['tel'];
		M('User')->where(array('wxuser'=>$openid))->save($data);
    	$this->display();
    }
    /*最新口子*/
    public function news(){
		$openid = session('useropenid');
		$obj = M('User')->where(array('wxuser'=>$openid))->field('status,id,wxuser')->find();
    	$res = M('Menu')->order('id desc')->select();
    	$this->assign('menu',$res);
		$this->assign('obj',$obj);
    	$this->display();
    }
    /*最新口子点击出来的文章*/
    public function article(){
    	$id = $_GET['id'];
    	$res = M('Menu')->where('id='.$id)->select();
    	$this->assign('res',$res);
    	$this->display();
    }
    /*急速贷款*/
    public function speed(){
    	$res = M('newest')->order('id desc')->select();
    	$this->assign('newest',$res);
    	$this->display();
    }
    /*获取信息*/
    public function getinformation(){
    	$id = $_GET['id'];
    	$res = M('newest')->where('id='.$id)->field('id,input_picture,url,title')->find();
    	//dump($res);
    	$this->assign('res',$res);
    	$this->display();
    }
    public function save_user_information(){
    	$data['title'] = $_POST['title'];
    	$data['username'] = $_POST['username'];
    	$data['phone'] = $_POST['phone'];
    	$data['createtime'] = time();
    	$res = M('Apply')->add($data);
    }
    /*办卡*/
   public  function card(){
   		$res = M('Card')->order('id desc')->select();
   		$this->assign('res',$res);
   		$this->display();
   }
   /*网贷返佣代理*/
   public function agent(){
   		$res = M('Upmany')->order('id desc')->field('id,picture')->select();
   		$this->assign('res',$res);
   		$this->display();
   }
   /*快速办卡*/
   public function keep_card(){
	   	$res = M('Keepcard')->field('id,icon,nice')->order('id desc')->select();
	   	$this->assign('res',$res);
	   	$this->display();
   }
   /**/
   public function introduce(){
   		$id = $_GET['id'];
   		$res = M('Keepcard')->where('id='.$id)->find();
   		$this->assign('res',$res);
   		$this->display();
   }
   /*新手帮助*/
   public function help(){
		$res = M('Img')->where('status=1')->find();
		$this->assign('res',$res);
   		$this->display();
   }
   /*客服*/
   public function user_help(){
   		$res = M('img')->where('status=2')->find();
   		$this->assign('res',$res);
   		$this->display();
   }
   /*个人资料*/
   public function user(){
	   $openid = session('useropenid');
	   $res = M('User')->where(array('wxuser'=>$openid))->find();
	   $this->assign('res',$res);
	   $this->display();
   }
   /*下级*/
   public function down_user(){
	   $openid = session('useropenid');
	   //$where['upuseropenid,huseropenid'] = array('like',"%$openid%");
	   $where['upuseropenid'] = array('like',"%$openid%");
	   $num = M('User')->where($where)->count();
	   $db = M('User')->where($where)->field('id,wxnickname,headimgurl,create_time,status')->order('status')->select();
	   //dump($db);exit;
	   $this->assign('res',$db);
	   $this->assign('num',$num);
	   $this->display();
	   
   }
}