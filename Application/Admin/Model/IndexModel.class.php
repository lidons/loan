<?php
namespace Admin\Model;
use Think\Model;

class IndexModel{
	//回复多文本
	public function responseMsg($postObj,$arr){
		$toUser = $postObj->FromUserName;
		$fromUser = $postObj->ToUserName;
		$template = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<ArticleCount>".count($arr)."</ArticleCount>
						<Articles>";
		foreach($arr as $k=>$v){
			$template .="<item>
							<Title><![CDATA[".$v['title']."]]></Title>
							<Description><![CDATA[".$v['description']."]]></Description>
							<PicUrl><![CDATA[".$v['picUrl']."]]></PicUrl>
							<Url><![CDATA[".$v['url']."]]></Url>
							</item>";
		}
			
		$template .="</Articles>
						</xml> ";
		echo sprintf($template, $toUser, $fromUser, time(), 'news');
	}
	//回复特定的文字
	public function responseText($postObj,$content){
		$template ="<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
						</xml>";
		$toUser   = $postObj->FromUserName;
		$fromUser = $postObj->ToUserName;
		$time = time();
		$msgType ='text';
		echo  sprintf($template,$toUser,$fromUser,$time,$msgType,$content);
	}
	//初次添加回复单图文
	public function  responFirst($postObj,$arr){
		$this->responseMsg($postObj,$arr);
	}
}
