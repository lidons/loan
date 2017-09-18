<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
<meta name="format-detection" content="telephone=no" />
<title>韩梅梅</title>
<link rel="stylesheet" type="text/css" href="/Public/index/css/foxui.min_19.css">
<link rel="stylesheet" type="text/css" href="/Public/index/css/style_25.css">
<link rel="stylesheet" type="text/css" href="/Public/index/css/iconfont_19.css">         
<link href="/Public/index/css/style_26.css" rel="stylesheet">
<link rel="stylesheet" href="//cdn.bootcss.com/weui/1.1.1/style/weui.min.css">
<link rel="stylesheet" href="//cdn.bootcss.com/jquery-weui/1.0.1/css/jquery-weui.min.css">
<link rel="stylesheet" href="/Public/admin/css/pintuer.css">
<style type="text/css">
body {
    position: absolute;;
    max-width: 750px;  margin:auto;
}
</style>
</head>
<body>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title">我的下线(<?php echo ($num); ?>)</div>
    </div>
	<div class="lists" style="margin-top:45px;border-width:0 0 1px 0;border-style: solid;border-color:#eee;">
	<?php if($num == 0 ): ?><center>您还没有下线</center>
    <?php else: ?> 
	<?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="fui-list" style="height:90px;" href="#" data-nocache="true">
		<div class="fui-list-media">
		 <img style="width:60px;"  class="round avatar"  src="<?php echo ($vo["headimgurl"]); ?>" />
		</div>
		<div class="fui-list-inner">
			<div style="margin-top:5px;"class="title nickname"><?php echo ($vo["wxnickname"]); ?>:&nbsp;<span style="color:#da5f5f;"class="icon-star-o" >&nbsp;<b style="font-size:14px;"><?php echo (getVipinfo($vo["status"])); ?></b></span></div>
			<div style="margin-top:12px;font-size:14px;"class="title nickname">关注时间:&nbsp;<b style="color:#888;"><?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?></b></div>
		</div>
		</a><?php endforeach; endif; else: echo "" ;endif; endif; ?>
	</div>
	
</body>
<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/jquery-weui.min.js"></script>
</html>