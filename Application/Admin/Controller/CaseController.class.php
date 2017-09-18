<?php
namespace Admin\Controller;
use Think\Controller;
class CaseController extends PublicController {
		public function xm(){
		 $data=M('xm_classify')->select();
		 $this->assign('data',$data);
		 $this->display();
		}

		//添加分类
	   public function add_xm(){
		 $this->display();
		}
       //添加分类
       public function add_xm_do(){
		   if(IS_POST){
			   $id=I('post.id');
			   $data['name']=I('post.xm');
			   if(empty($data)){
				   
				   $this->error('分类名不能为空'); 
				   
			     }else{
					 
				  if(!empty($id)){
				       $res=M('xm_classify')->where(array('id'=>$id))->save($data);
			           if($res){
							   
							 $this->success('修改成功');  
							   
						   }else{
							   
							 $this->error('修改失败');     
						   }	  
					 }else{
							 
							 
						  $res=M('xm_classify')->add($data);
						   
						   if($res){
							   
							 $this->success('添加成功');  
							   
						   }else{
							   
							 $this->error('添加失败');     
						   }	 
							 
						 }	 
					 
				   }
			  
		   }
		
		}	
//修改分类
	public function save_classify(){
		$id=$_GET['id'];
		$data=M('xm_classify')->where(array('id'=>$id))->find();
		$data['meu']='修改项目分类';
		$this->assign('data',$data);
		$this->display('add_xm');
	}


   public function article_list(){
	   $id=$_GET['id'];
	   $data=M('xm_classify')->where(array('id'=>$id))->find();
	   $article=M('xm_article')->where(array('fid'=>$id))->select();
	   $this->assign('data',$data);
	   $this->assign('article',$article);
	   $this->display(); 
   }

  public function add_article(){
	  $classify=M('xm_classify')->select();
	  $this->assign('classify',$classify);
	  $this->display();  
  }
  
  //添加文章
  public function add_article_do(){
	  $data['fid']=$_POST['fid'];
	  $data['title']=$_POST['title'];
	  $data['img']=$this->uploads($_FILES['img']);
	  $data['url']=$_POST['url'];
	  $data['content']=$_POST['content'];
	  $data['addtime']=time();
	  $res=M('xm_article')->add($data);
	  
	  if($res){
		   $this->success('添加成功');  
	  }else{
		  
		   $this->error('添加失败');   
	  }
	 
  }
  
  
  //删除文章
  public function del_xm_article(){
	  $id=$_GET['id'];
	  $del= M('xm_article')->where(array('id'=>$id))->delete();
	  if($del){
		   $this->success('删除成功');  
		  
	  }else{
		  
		   $this->error('删除失败');   
	  }
	  
  }
   public function save_xm_article(){
	  $classify=M('xm_classify')->select();
	  $id=$_GET['id'];
	  $data= M('xm_article')->where(array('id'=>$id))->find();
	  $father=array();
	  foreach($classify as $k=>$v){
		  
		  if($v['id']==$data['fid']){
			  $father=$v;
			  unset($classify[$k]);
		  }
	  }
	  
	  $this->assign('classify',$classify); 
	  $this->assign('data',$data);
      $this->assign('father',$father); 	  
	  $this->display(); 
	   
   }
  
  
  public function save_xm_article_do(){
	  $id=$_POST['id'];
	  $res= M('xm_article')->where(array('id'=>$id))->find();
	  $data['fid']=$_POST['fid'];
	  $data['title']=$_POST['title'];
	  $data['url']=$_POST['url'];
	  $data['content']=$_POST['content'];
	  $data['addtime']=time();
	  if($_FILES['img']['name']){
		  
		  $data['img']=$this->uploads($_FILES['img']); 
		  
	  }
	  if($res['fid']==$data['fid']){
		  unset($data['fid']);
		  
	  }
	  if($res['title']==$data['title']){
		  unset($data['title']);
		  
	  }
	   if($res['url']==$data['url']){
		  unset($data['url']);
		  
	  }
	   if($res['content']==$data['content']){
		  unset($data['content']);
		  
	  }
	  
	  $res=M('xm_article')->where(array('id'=>$id))->save($data);
	     
		 if($res){
			  $this->success('修改成功');  
			 
		 }else{
			  $this->error('修改失败');  
		 }
  }
  
  
  
  
  
  
   public function lists(){
	  
	 $this->display();
  }
   public function add(){
	  
	 $this->display();
  }
	
		
}