<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
<meta name="format-detection" content="telephone=no" />
<title>韩梅梅</title>
<link rel="stylesheet" type="text/css" href="/Public/index/css/foxui.min_5.css">
<link rel="stylesheet" type="text/css" href="/Public/index/css/style_5.css">
<link rel="stylesheet" type="text/css" href="/Public/index/css/iconfont_5.css"> 
<link rel="stylesheet" href="/Public/index/css/swiper.min_5.css">
<link href="/Public/index/css/foxui.diy_10.css"rel="stylesheet"type="text/css"/>
<style type="text/css">
body {
    position: absolute;;
    max-width: 750px;  margin:auto;
}
.fui-navbar {
    max-width:750px;
}
.fui-navbar,.fui-footer  {
    max-width:750px;
}
.fui-page.fui-page-from-center-to-left,
.fui-page-group.fui-page-from-center-to-left,
.fui-page.fui-page-from-center-to-right,
.fui-page-group.fui-page-from-center-to-right,
.fui-page.fui-page-from-right-to-center,
.fui-page-group.fui-page-from-right-to-center,
.fui-page.fui-page-from-left-to-center,
.fui-page-group.fui-page-from-left-to-center {
    -webkit-animation: pageFromCenterToRight 0ms forwards;
    animation: pageFromCenterToRight 0ms forwards;
}
</style>
</head> <body ><div class='fui-page-group '>          
<div class='fui-page  fui-page-current ' style="top: 0; background-color: #fafafa; ">
    <div class="fui-header">
        <div class="fui-header-left">
              <a href="/index.php/home/index/agent" class="external"><i class="icon icon-home"></i> </a>
         </div>
        <div class="title">网贷返佣推广</div>
        <div class="fui-header-right"></div>
    </div>
<div class="fui-content " id="container" style="background-color: #fafafa; ">                     
<div class="fui-title" style="background: #fdfdfd; color: #a8a8a8; font-size: 20px; text-align: center; padding: 5px 5px; margin: 0;">
    <a href="" style="color: #a8a8a8" data-nocache="true">
        产品推广返佣表
    </a>
</div>             
    <div class="fui-picture" style="padding-bottom: 0px; background: ;">
        <a href="" style="display: block; padding: 0px 0px;" data-nocache="true">
            <img src="/Public/index/picture/jlvlpikfp3irlp6iib7v7l746rf6fv.jpg" />
        </a>
    </div>         
    <div class="fui-picture" style="padding-bottom: 0px; background: ;">
	 <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/index.php/home/index/qrcode?id=<?php echo ($vo["id"]); ?>" style="display: block; padding: 0px 0px;" data-nocache="true">
            <img src="/Public/uploads/<?php echo ($vo["picture"]); ?>" />
        </a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div> </div>
</div>
</div>
</body>
</html>