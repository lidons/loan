<?php
namespace Admin\Controller;
use Think\Controller;
class WexiController extends PublicController {
		public function init() {
			$config=M('wechat')->where('id=1')->find();
			$options = array(
					'token'=>$config['token'], //填写你设定的key
					'encodingaeskey'=>$config['encodingaeskey'], //填写加密用的EncodingAESKey
					'appid'=>$config['appid'], //填写高级调用功能的app id, 请在微信开发模式后台查询
					'appsecret'=>$config['appsecret'] //填写高级调用功能的密钥
			);
			$weObj = new  \Vendor\Wechat\wechat($options); //创建实例对象
			return $weObj;
		}
}