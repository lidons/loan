<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
<meta name="format-detection" content="telephone=no" />
<title>韩梅梅</title>
<link rel="stylesheet" type="text/css" href="/Public/index/css/foxui.min_10.css">
<link rel="stylesheet" type="text/css" href="/Public/index/css/style_10.css">      
<link rel="stylesheet" type="text/css" href="/Public/index/css/iconfont_10.css">
<script src="/Public/index/js/jquery-1.11.1.min_10.js"></script>
<script src='/Public/index/js/jweixin-1.1.0_10.js'></script>
<script src="/Public/index/js/require_10.js"></script>
<script src="/Public/index/js/myconfig-app_10.js"></script>
<script src="/Public/js/isPhone.js"></script>
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
<body >
<div class='fui-page-group '>
<div class='fui-page  fui-page-current page-commission-index' style="top: 0; background-color: #fafafa; ">
    <div class="fui-header">
        <div class="fui-header-left">
                    </div>
        <div class="title">个人中心</div>
        <div class="fui-header-right"></div>
    </div>
<div class="fui-content navbar" id="container" style="background-color: #fafafa; padding-bottom: 0;">                     
<div class="headinfo-m" style="background: #5955fd; border: none;">  
<a class="setbtn" style="color: #ffffff;" href="#" data-nocache="true"><i class="icon icon-right"></i></a>
<div class="child">
    <div class="title" style="color: #ffffff;">成功提现佣金</div>
<div class="num" style="color: #fef31f;"><?php echo ($res["up_money"]); ?></div> 
</div>
<div class="child userinfo" style="color: #ffffff;">
    <div class="face "><img src="<?php echo ($res["headimgurl"]); ?>"></div>
    <div class="name"><?php echo ($res["wxnickname"]); ?></div>
    <div class="level"><?php echo (getVipinfo($res["status"])); ?></div>           
    <div class="level">推荐人: <?php echo (getPerson($res["upuser"])); ?></div>        
</div>
<div class="child">
    <div class="title" style="color: #ffffff;">可提现佣金</div>
<div class="num" style="color: #fef31f;"><?php echo ($res["money"]); ?></div>           
    </div>
</div>
<div class="fui-cell-group fui-cell-click" style="margin-top: 0px; background-color: #ffffff;">
<a class="fui-cell" href="/index.php/home/index/my_money" data-nocache="true">
 <div class="fui-cell-icon" style="color: #999999;width: auto">
<img src="/Public/index/picture/qianbao.png" style="width: 1.6rem;padding-top: 0.2rem;">
</div>
<div class="fui-cell-text" style="color: #333333;">我的钱包</div>
<div class="fui-cell-remark" style="color: #888888;">                                                                            </div>
</a>
</div>     
        <div class="fui-icon-group noborder col-4 radius" style="background: #f9f9f9">
<a class="fui-icon-col external" href="/index.php/home/index/down_user" data-nocache="true">
    <div class="icon"><img src="/Public/index/picture/i7qk9wve9i0ffvvvy78wy9ve07kti8.png"></div>
    <div class="text" style="color: #666666;">我的会员</div>
</a>
<a class="fui-icon-col external" href="/index.php/home/index/user" data-nocache="true">
    <div class="icon"><img src="/Public/index/picture/bl736nmpmpou2i2il7o264mb6xfvmm.png"></div>
    <div class="text" style="color: #666666;">我的资料</div>
</a>
<a class="fui-icon-col external" href="/index.php/home/index/income" data-nocache="true">
    <div class="icon"><img src="/Public/index/picture/vsi7s4fd9rirzy8ozzmyyfuqs9urys.png"></div>
    <div class="text" style="color: #666666;">收入明细</div>
</a>
<a class="fui-icon-col external" href="#" data-nocache="true">
    <div class="icon"><img src="/Public/index/picture/cb6c3oj88333zfg6f7bnyr316j2333.png"></div>
    <div class="text" style="color: #666666;">提现记录</div>
</a>
<a class="fui-icon-col external" href="/index.php/home/index/user_help" data-nocache="true">
    <div class="icon"><img src="/Public/index/picture/pv7cd8tncczclqccz5d0l47q5pzddc.png"></div>
    <div class="text" style="color: #666666;">客服</div>
</a>
<a class="fui-icon-col external" href="/index.php/home/index/help" data-nocache="true">
    <div class="icon"><img src="/Public/index/picture/jrsy8xeecegazrwawc84bnwgreem1m.png"></div>
    <div class="text" style="color: #666666;">新手帮助</div>
</a>
<a class="fui-icon-col external" href="/index.php/home/index/news" data-nocache="true">
    <div class="icon"><img src="/Public/index/picture/nb6ci66npzq5z5b5yie65ie7ve90ne.png"></div>
    <div class="text" style="color: #666666;">最新口子</div>
</a>
<a class="fui-icon-col external" href="/index.php/home/index/speed" data-nocache="true">
    <div class="icon"><img src="/Public/index/picture/fdkdhdahp2zvi71712ip7hkm71mcrz.png"></div>
    <div class="text" style="color: #666666;">极速放贷</div>
</a>
<a class="fui-icon-col external" href="/index.php/home/index/agent" data-nocache="true">
    <div class="icon"><img src="/Public/index/picture/bk1k1u1fe8mhka11trmd9jd8tdkxhd.png"></div>
    <div class="text" style="color: #666666;">网贷推广返佣</div>
</a>
<a class="fui-icon-col external" href="/index.php/home/index/black" data-nocache="true">
    <div class="icon"><img src="/Public/index/picture/or4w0yg74bb5yn07yg7eyrz45zzd74.png"></div>
    <div class="text" style="color: #666666;">黑户贷款</div>
</a>
<a class="fui-icon-col external" href="/index.php/home/index/card" data-nocache="true">
    <div class="icon"><img src="/Public/index/picture/a0i88cedpz88dhilhme8g7iul8u95l.png"></div>
    <div class="text" style="color: #666666;">快速办卡</div>
</a>
<a class="fui-icon-col external" href="#" data-nocache="true">
    <div class="icon"><img src="/Public/index/picture/wbkq3bn4sol83nolskzk3kpzxkhosq.png"></div>
    <div class="text" style="color: #666666;">快速提额</div>
</a>
<a class="fui-icon-col external" href="# "data-nocache="true">
    <div class="icon"><img src="/Public/index/picture/m75piepbbepxbpxbgep2alxplxp2bj.png"></div>
    <div class="text" style="color: #666666;">贷款教程</div>
</a>
<a class="fui-icon-col external" href="/index.php/home/index/keep_card" data-nocache="true">
   <div class="icon"><img src="/Public/index/picture/sl84k2aasmos2521eoaeas2s48keex.png"></div>
    <div class="text" style="color: #666666;">养卡攻略</div>
</a>
<a class="fui-icon-col external" href="#" data-nocache="true">
    <div class="icon"><img src="/Public/index/picture/xpwknpkx74zqxyrr4kr7xqqd4pu4zx.png"></div>
    <div class="text" style="color: #666666;">逾期处理办法</div>
</a>
<a class="fui-icon-col external" href="#" data-nocache="true">
    <div class="icon"><img src="/Public/index/picture/twfkz9nxk8bbqz34of9nkke4b3od3d.png"></div>
    <div class="text" style="color: #666666;">黑户如何办卡</div>
                </a>
        </div>
   </div>
<link href="/Public/index/css/foxui.diy_18.css"rel="stylesheet"type="text/css"/>
<style type="text/css">
.icon-vip{
	color: #000;
}
</style>
<div class="diymenu" style=" position: absolute;max-width: 750px;">
        <div class="item item-col-4 " onclick="location.href = '/index.php/home/index/shop'" >
            <div class="inner  top">
                        <span class="icon icon-vip top"></span>                    
                    <span class="text top" >会员升级</span>
            </div> 
        </div>
        <div class="item item-col-4 " onclick="location.href = '/index.php/home/index/news'" >
            <div class="inner  top">
                    <span class="icon icon-hotfill top"></span>
                    <span class="text top" >最新口子</span>            
            </div>
        </div>
        <div class="item item-col-4 " onclick="location.href = '/index.php/home/index/speed'" >     
         <div class="inner  top">
                        <span class="icon icon-shopping top"></span>
                    <span class="text top" >极速贷款</span>
            </div>      
        </div>
        <div class="item item-col-4 " onclick="location.href = '/index.php/home/index/index'" >
            <div class="inner  top">
                        <span class="icon icon-person2 top" style="color: #000;"></span>
                    <span class="text top" >个人中心</span>
            </div>
        </div>
</div>
</div>
</div>
</body>
</html>