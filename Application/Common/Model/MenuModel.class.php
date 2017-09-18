<?php
namespace Common\Model;
use Think\Model;

class MenuModel extends Model{
	private $_db ='';
	public function __construct(){
		$this->_db = M('Menu');
	}
	public function addMenu($data){
		return $this->_db->add($data);
	}
	public function del_black($id){
		return $this->_db->where('id='.$id)->delete();
	}
	public function updata_menu($id){
		return $this->_db->where('id='.$id)->select();
	}
	public function saveMenuNot($id,$data){
		return $this->_db->where('id='.$id)->save($data);
	}
	
}

