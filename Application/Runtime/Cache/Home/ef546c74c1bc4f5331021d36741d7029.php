<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html><html> <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
<meta name="format-detection" content="telephone=no" />
<title>韩梅梅</title><link rel="stylesheet" href="/Public/index/css/swiper.min_2.css"><link href="/Public/index/css/foxui.diy_4.css"rel="stylesheet"type="text/css"/>
<link rel="stylesheet" type="text/css" href="/Public/index/css/foxui.min_2.css">
<link rel="stylesheet" type="text/css" href="/Public/index/css/style_2.css">
<link rel="stylesheet" type="text/css" href="/Public/index/css/iconfont_2.css"><script src="/Public/js/isPhone.js"></script>
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
        <style>.danmu {display: none;opacity: 0;}</style>
    </head>
    <body ><div class='fui-page-group '>
<div class='fui-page  fui-page-current ' style="top: 0; background-color: #fafafa; ">
    <div class="fui-header">
        <div class="fui-header-left">
            <a href="/index.php/home/index/keep_card" class="external"><i class="icon icon-home"></i> </a>
        </div>
        <div class="title">快速办卡</div>
        <div class="fui-header-right"></div>
    </div>
<div class="fui-content navbar" id="container" style="background-color: #fafafa; padding-bottom: 0;">                    
    <div class="fui-picture" style="padding-bottom: 0px; background: ;">
        <a href="" style="display: block; padding: 0px 0px;" data-nocache="true">
            <img src="/Public/index/picture/o0xzyk3cpkqy56fhkh4qhcgx56q5hh_1.jpg" />
        </a>
    </div>
 	<div class="fui-blank" style="height: 20px; background: #ffffff;"></div>                    
        <div class="fui-icon-group noborder col-3 " style="background: #ffffff">        	<?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="fui-icon-col external" href="/index.php/home/index/introduce?id=<?php echo ($vo["id"]); ?>" data-nocache="true">
                    <div class="icon"><img src="/Public/uploads/<?php echo ($vo["icon"]); ?>"></div>
                 <div class="text" style="color: #666666;"><?php echo ($vo["nice"]); ?></div>
                </a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>                    </div>
</body>
</html>