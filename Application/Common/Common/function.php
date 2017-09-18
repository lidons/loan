<?php
function  show($status, $message,$data=array()) {
	$reuslt = array(
			'status' => $status,
			'message' => $message,
			'data' => $data,
	);
	exit(json_encode($reuslt));
}
function getUser($res){
		if($res) {
			return $res;
		}
		return '暂未填写';
}
function getStatus($status){
	if($status == 0){
		$res = '<span style="background-color:#9e9e9e;color:#fff;border:1px solid #9e9e9e;">默认等级</span>';
	}elseif ($status == 1){
		$res = '<span style="background-color:#4caf50;color:#fff;border:1px solid #4caf50;">初始会员</span>';
	}elseif ($status == 2){
		$res = '<span style="background-color:#FF9800;color:#fff;border:1px solid #FF9800;">中级会员</span>';
	}elseif ($status == 3){
		$res = '<span style="background-color:#ff5722;color:#fff;border:1px solid #ff5722;">高级会员</span>';
	}elseif ($status == 4){
		$res = '<span style="background-color:#e91e63;color:#fff;border:1px solid #e91e63;">服务商</span>';
	}elseif ($status == 5){
		$res = '<span style="background-color:#ffeb3b;color:#fff;border:1px solid #ffeb3b;">金牌服务商</span>';
	}elseif ($status == 6){
		$res = '<span style="background-color:#2196f3;color:#fff;border:1px solid #2196f3;">合伙人</span>';
	}
	return $res;
}
function moneyRide($num){
	return $num*100;
}
function getRank($num){
	if($num == 1){
		$res = '<span style="background-color:#4caf50;color:#fff;border:1px solid #4caf50;">初级会员及以上可见</span>';
	}elseif ($num==2){
		$res = '<span style="background-color:#FF9800;color:#fff;border:1px solid #FF9800;">中级会员及以上可见</span>';
	}elseif ($num==3){
		$res = '<span style="background-color:#ff5722;color:#fff;border:1px solid #ff5722;">高级会员及以上可见</span>';
	}elseif ($num==4){
		$res = '<span style="background-color:#e91e63;color:#fff;border:1px solid #e91e63;">服务商及以上可见</span>';
	}elseif ($num==5){
		$res =  '<span style="background-color:#ffeb3b;color:#fff;border:1px solid #ffeb3b;">金牌服务商及以上可见</span>';
	}elseif ($num==6){
		$res = '<span style="background-color:#2196f3;color:#fff;border:1px solid #2196f3;">合伙人可见</span>';
	}
	return $res;
}
function getVipinfo($sta){
	if($sta == 0){
		$res = '默认会员';
	}elseif($sta ==1 ){
		$res ='初级会员';
	}elseif($sta == 2){
		$res ='中级会员';
	}elseif($sta ==3){
		$res ='高级会员';
	}elseif($sta == 4){
		$res ='服务商';
	}elseif($sta == 5){
		$res ='金牌服务商';
	}elseif($sta == 6){
		$res = '合伙人';
	}
	return $res;
}
function getPerson($res){
	return  $res == ''?'韩梅梅推荐':$res;
}