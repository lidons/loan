<?php
namespace Common\Model;
use Think\Model;

class AdminModel extends Model{
	private $_db ='';
	public function __construct(){
		$this->_db = M('Admin');
	}
	
}

