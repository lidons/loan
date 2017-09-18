<?php
namespace Common\Model;
use Think\Model;

class UserModel extends Model{
	private $_db ='';
	public function __construct(){
		$this->_db = M('User');
	}
	public function getUserContent(){
		return $this->_db->select();
	}
	public function saveMoney($id,$data){
		return $this->_db->where('id='.$id)->save($data);
	}
	public function saveStatus($id,$data){
		return $this->_db->where('id='.$id)->save($data);
	}
	public function del_black($id){
		return $this->_db->where('id='.$id)->delete();
	}
}

