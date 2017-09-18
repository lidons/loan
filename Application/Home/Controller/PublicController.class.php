<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller{
/**
 * @return array
 */
    protected $wechat_config;
	public function _initialize() {
		$wechat = M('wechat')->where('id=1')->find();
		//dump($wechat);exit;
		$this->wechat_config = $wechat;
		//dump($wechat_config);exit;
			if(!session('?useropenid')){
				$wxuser = $this->GetOpenid();
				//获取用户昵称
				//var_dump($wxuser);exit;
				//微信自动登录
				$data = array(
					'openid'=>$wxuser['openid'],
					'nickname'=>trim($wxuser['nickname']) ? trim($wxuser['nickname']) : '微信用户',
					'head_pic'=>$wxuser['headimgurl'],
				);
			    $user = $this->thirdLogin($data);
				//dump($user);exit;
				session('useropenid',$user['wxuser']);
			}
	}
	// 网页授权登录获取 OpendId
	public function GetOpenid()
	{
		//通过code获得openid
		if (!isset($_GET['code'])){
			//触发微信返回code码
			//$baseUrl = urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
			$baseUrl = urlencode($this->get_url());
			$url = $this->__CreateOauthUrlForCode($baseUrl); // 获取 code地址
			//var_dump($baseUrl,$url);exit;
			Header("Location: $url"); // 跳转到微信授权页面 需要用户确认登录的页面
			exit();
		} else {
			// 上面跳转, 这里跳了回来
			//获取code码，以获取openid
			$code = $_GET['code'];
			$data = $this->getOpenidFromMp($code);
			//var_dump($data);exit;
			$data2 = $this->GetUserInfo($data['access_token'],$data['openid']);
			$data['nickname'] = $data2['nickname'];
			$data['headimgurl'] = $data2['headimgurl'];
			//var_dump($data);exit;
			return $data;
		}
	}
	/**
	 * 获取当前的url 地址
	 * @return type
	 */
	private function get_url() {
		$sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
		$php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
		$path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
		$relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
		return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
	}
	/**
	 *
	 * 通过code从工作平台获取openid机器access_token
	 * @param string $code 微信跳转回来带上的code
	 *
	 * @return openid
	 */
	public function GetOpenidFromMp($code)
	{
		//通过code换取网页授权access_token  和 openid
		$url = $this->__CreateOauthUrlForOpenid($code);
		$ch = curl_init();//初始化curl
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);//设置超时
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$res = curl_exec($ch);//运行curl，结果以jason形式返回
		$data = json_decode($res,true);//取出openid access_token
		curl_close($ch);
		return $data;
	}
	/**
	 *
	 * 通过access_token openid 从工作平台获取UserInfo
	 * @return openid
	 */
	public function GetUserInfo($access_token,$openid)
	{
		// 获取用户 信息
		$url = $this->__CreateOauthUrlForUserinfo($access_token,$openid);
		$ch = curl_init();//初始化curl
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);//设置超时
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$res = curl_exec($ch);//运行curl，结果以jason形式返回
		$data = json_decode($res,true);//取出openid access_token
		curl_close($ch);
		return $data;
	}

	/**
	 *
	 * 构造获取code的url连接
	 * @param string $redirectUrl 微信服务器回跳的url，需要url编码
	 *
	 * @return 返回构造好的url
	 */
	private function __CreateOauthUrlForCode($redirectUrl)
	{
		$urlObj["appid"] = $this->wechat_config['appid'];
		$urlObj["redirect_uri"] = "$redirectUrl";
		$urlObj["response_type"] = "code";
//        $urlObj["scope"] = "snsapi_base";
		$urlObj["scope"] = "snsapi_userinfo";
		$urlObj["state"] = "STATE"."#wechat_redirect";
		$bizString = $this->ToUrlParams($urlObj);
		return "https://open.weixin.qq.com/connect/oauth2/authorize?".$bizString;
	}

	/**
	 *
	 * 构造获取open和access_toke的url地址
	 * @param string $code，微信跳转带回的code
	 *
	 * @return 请求的url
	 */
	private function __CreateOauthUrlForOpenid($code)
	{
		$urlObj["appid"] = $this->wechat_config['appid'];
		$urlObj["secret"] = $this->wechat_config['appsecret'];
		$urlObj["code"] = $code;
		$urlObj["grant_type"] = "authorization_code";
		$bizString = $this->ToUrlParams($urlObj);
		return "https://api.weixin.qq.com/sns/oauth2/access_token?".$bizString;
	}
	/**
	 *
	 * 构造获取拉取用户信息(需scope为 snsapi_userinfo)的url地址
	 * @return 请求的url
	 */
	private function __CreateOauthUrlForUserinfo($access_token,$openid)
	{
		$urlObj["access_token"] = $access_token;
		$urlObj["openid"] = $openid;
		$urlObj["lang"] = 'zh_CN';
		$bizString = $this->ToUrlParams($urlObj);
		return "https://api.weixin.qq.com/sns/userinfo?".$bizString;
	}

	/**
	 *
	 * 拼接签名字符串
	 * @param array $urlObj
	 *
	 * @return 返回已经拼接好的字符串
	 */
	private function ToUrlParams($urlObj)
	{
		$buff = "";
		foreach ($urlObj as $k => $v)
		{
			if($k != "sign"){
				$buff .= $k . "=" . $v . "&";
			}
		}
		$buff = trim($buff, "&");
		return $buff;
	}
	private function thirdLogin($data=array()){
		$openid = $data['openid']; //第三方返回唯一标识
		//dump($open);exit;
		//获取用户信息
		$user = M('user')->where(array('wxuser'=>$openid))->find();
		if(!$user){
			//账户不存在 注册一个
			$map['wxuser'] = $openid;
			$map['wxnickname'] = $data['nickname'];
			$map['createtime'] = time();
			$map['headimgurl'] = $data['head_pic'];
			$map['create_time']=time();
			$row = M('user')->add($map);
			$user = M('User')->where(array('id'=>$row))->find();
		}
		return $user;
	}
}