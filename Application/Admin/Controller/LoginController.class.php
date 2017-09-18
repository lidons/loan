<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
		public function index(){
			if(IS_POST){
			$res  = $this->check_verify($_POST['code']);
			if($res){
				$username = $_POST['username'];
				$password = md5($_POST['password']);
				$user = M('admin')->where(array('username'=>$username,'password'=>$password))->find();
				if($user){
					session('user',$user['username']);  //设置session
					
					$this->success('登录成功',U('Admin/Index/index'));
					exit;
				}else{
					 $this->error('用户名和密码不匹配');
					 exit;
				}
			}else{
				$this->error('验证码错误');
				exit;
			}
			
		}	
			
		  $this->display();
		}
	
	
	    //验证码 
		public function verify(){
        $config =    array(
          'fontSize'    =>    25,    
          'length'      =>    4,
		  'useCurve'    =>    false,
          'useNoise'    =>    false,
		  'codeSet'     =>'0123456789',
	  	  'bg'          =>array(245,245,245),
        );
        $Verify =    new \Think\Verify($config);
        $Verify->entry();
         
       }
	   
	   //验证验证码
	   function check_verify($code, $id = ''){
		
		$verify = new \Think\Verify();
		return $verify->check($code, $id);
	   }
	
	//退出登录
	public function loginout(){
		session('user',null); // 删除name
		$this->redirect('index');
	}
	
	 
	public function register(){
		//dump($_POST);exit;
		if(!trim($_POST['username'])){
			return show(0, '用户名不能为空');
			return false;
		}
		if(!trim($_POST['password'])){
			return show(0,'密码不能为空');
			return false;							
		}
		$data['username'] = $_POST['username'];
		$data['password'] = md5($_POST['password']);
		$user = $_POST['username'];
		$ret = M('Admin')->where('username="'.$user.'"')->find();
		if($ret){
			return show(0, '用户存在,请重新添加');
		}
		$res = M('Admin')->add($data);
		if($res){
			return show(1, '添加管理员成功');
		}else{
			return show(0, '添加管理员失败');
		}
	}
	public function save_pwd(){
		$this->display();
	}
	
	public function save_pwd_do(){
      if(IS_POST){
			$res = M('admin')->where(array('username'=>session('user')))->find();
			if($res['password'] != md5($_POST['orpassword'])){
				$this->error('输入的原始密码不正确');
			}else if($res['password'] == md5($_POST['password'])){
				$this->error('新密码和原密码一致');
			}else{
			$save_pwd = M('admin')->where(array('username'=>session('user')))
			->save(array('password'=>md5($_POST['password'])));
			   if($save_pwd){
				   $this->success('修改成功！');
			   }else{
				   
				  $this->error('修改失败！'); 
			   }
			}
		}
	}
}