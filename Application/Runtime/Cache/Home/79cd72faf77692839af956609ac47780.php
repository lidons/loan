<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html><html> <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
<meta name="format-detection" content="telephone=no" />
<title>韩梅梅</title><link rel="stylesheet" href="/Public/index/css/swiper.min_2.css"><link href="/Public/index/css/foxui.diy_4.css"rel="stylesheet"type="text/css"/>
<link rel="stylesheet" type="text/css" href="/Public/index/css/foxui.min_2.css">
<link rel="stylesheet" type="text/css" href="/Public/index/css/style_2.css">
<link rel="stylesheet" type="text/css" href="/Public/index/css/iconfont_2.css">
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
            <a href="/index.php/home/index/card" class="external"><i class="icon icon-home"></i> </a>
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
	<div class="fui-title" style="background: #ffffff; color: #3a6a92; font-size: 18px; text-align: center; padding: 5px 5px; margin: 0;">
    <a href="" style="color: #3a6a92" data-nocache="true"> 
        信用卡内部申请通道
    </a>
</div>
        <div class="fui-icon-group noborder col-3 " style="background: #ffffff">        	<?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="fui-icon-col external" href="<?php echo ($vo["url"]); ?>" data-nocache="true">
                    <div class="icon"><img src="/Public/uploads/<?php echo ($vo["picture"]); ?>"></div>
                 <div class="text" style="color: #666666;"><?php echo ($vo["title"]); ?></div>
                </a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>                    
<div class="fui-title" style="background: #ffffff; color: #347c98; font-size: 18px; text-align: center; padding: 8px 1px; margin: 0;">
    <a href="" style="color: #347c98" data-nocache="true">    
        信用卡申请进度查询
    </a>
</div>
   <div class="fui-cell-group fui-cell-click" style="margin-top: 2px; background-color: #ffffff;">
      <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="fui-cell" href="<?php echo ($vo["card_url"]); ?>" data-nocache="true">
             <div class="fui-cell-icon" style="color: #ff0000;">
                        <i class="icon icon-search"></i>             </div>
             <div class="fui-cell-text" style="color: #333333;"><?php echo ($vo["title"]); ?>信用卡</div>
              <div class="fui-cell-remark" style="color: #888888;">
                                    进度查询  </div>
         </a><?php endforeach; endif; else: echo "" ;endif; ?>        
  </div></div></div></div>
</body>
</html>