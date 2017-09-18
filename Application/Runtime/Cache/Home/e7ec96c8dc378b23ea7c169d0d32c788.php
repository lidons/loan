<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head><meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
<meta name="format-detection" content="telephone=no" />
<title>韩梅梅</title>
<link rel="stylesheet" type="text/css" href="/Public/index/css/foxui.min_22.css">
<link rel="stylesheet" type="text/css" href="/Public/index/css/style_29.css">
<link rel="stylesheet" type="text/css" href="/Public/index/css/iconfont_22.css">
<link rel="stylesheet" type="text/css" href="/Public/index/css/coupon_2.css">
<link rel="stylesheet" type="text/css" href="/Public/index/css/coupon-new_2.css">
<script src="/Public/index/js/jquery-1.11.1.min_23.js"></script><script src='/Public/index/js/jweixin-1.1.0_22.js'></script>
<script src="/Public/js/isPhone.js"></script>
<style type="text/css">
body {
       position: absolute;;
       max-width: 750px;  margin:auto;
   }
   .fui-navbar {     max-width:750px;
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
  .yen{border:none;height:0.75rem;width:0.75rem;display: inline-block;background: #ff4753;color:#fff;font-size:0.4rem;line-height: 0.8rem;text-align: center;
        font-style: normal;border-radius: 0.75rem;-webkit-border-radius: 0.75rem;}
</style>
<style>.danmu {display: none;opacity: 0;}</style>
</head>
<body > <div class='fui-page-group ' style="display: block;">
<div class='fui-page order-create-page' style="display: block;">
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title">确认订单</div>
        <div class="fui-header-right" data-nomenu="true">&nbsp;</div>
    </div>
    <div class='fui-content  navbar'>
        <!--联系填写-->
<div class="fui-cell-group sm" id="memberInfo" >
<div class="fui-cell">
    <div class="fui-cell-label sm">联系人</div>
    <div class="fui-cell-info"><input type="text" placeholder="请输入联系人" data-set="0" name='carrier_realname' class="fui-input" value="<?php echo $_GET['name']?>"/></div>
</div>
<div class="fui-cell">
    <div class="fui-cell-label sm">联系电话</div>
    <div class="fui-cell-info"><input type="tel" placeholder="请输入联系电话" data-set="0" name='carrier_mobile' class="fui-input" value="<?php echo $_GET['tel']?>"/></div>
</div>
</div>
<div class="fui-list-group" >
        <div class="fui-list-group-title"><i class="icon icon-shop"></i >xxx</div>
        <input type='hidden' name='goodsid[]' value="" />
    <input type='hidden' name='optionid[]' value="0" />
    <div class="fui-list goods-item">
        <div class="fui-list-media">
            <a href="">
                <img src="/Public/index/picture/zxy74fyppwu8pf1fg7u71fy8pb7zgx_2.jpg" class="round package-goods-img">
            </a>
        </div>
        <div class="fui-list-inner">
            <a href="">
                <div class="text"><?php $id =$_GET['id']; if($id==1) echo '初级会员';if($id==2) echo '中级会员'; if($id==3) echo '高级会员'; if($id==4) echo '服务商'; if($id==5) echo '高级服务商'; if($id==6) echo '合伙人'; ?></div>
            </a>
        </div>
        <div class='fui-list-angle'>
            <span class="price ">&yen; <span class='marketprice'><?php echo $_GET['price']?></span></span>
            <span class="total">
                    <div class="fui-number small" data-value="1" data-unit="" data-maxbuy="2147482798" data-minbuy="0" data-goodsid="1">
                        <div class="minus">-</div>
                        <input class="num shownum" type="tel" name="" value="1"/>
                        <div class="plus">+</div>
                    </div>
             </span>
        </div>
    </div>
    <div class='fui-cell-group'>
                <div class="fui-cell">
        <div class="fui-cell-info" style="text-align: right;">共 <span id='goodscount' class='text-danger'>1</span> 件商品 合计：<span class="text-danger">&yen; <span class='goodsprice'><?php echo $_GET['price']?></soan></span></div>
    </div>
</div>
</div>
<div class="fui-cell-group sm ">
    <div class="fui-cell">
        <div class="fui-cell-info"><input type="text" class="fui-input" id='remark' placeholder="选填: 买家留言(50字以内)" maxlength="50"></div>
    </div>
</div>
<div class="fui-cell-group  sm">
    <div id='coupondiv' class="fui-cell fui-cell-click" style='display:none'>
    <div class='fui-cell-label' style='width:auto;'>优惠券</div>
    <div class='fui-cell-info'></div>
    <div class='fui-cell-remark'>
        <img id="couponloading" src="/Public/index/picture/loading_2.gif" style="vertical-align: middle;display: none;" width="20" alt=""/>
        <div class='badge badge-danger' style='display:none'>0</div>
    <span class='text' >无可用</span>
</div>
</div>
</div>
<div class="fui-cell-group sm">
    <input type="hidden" id="weight" name='weight' value="0" />
        <div class="fui-cell">
        <div class="fui-cell-label" >商品小计</div>
        <div class="fui-cell-info"></div>
        <div class="fui-cell-remark noremark">&yen; <span class='goodsprice'>
         <?php echo $_GET['price']?>   </span></div>
    	</div>
<div class="fui-cell">
    <div class="fui-cell-label" >运费</div>
    <div class="fui-cell-info"></div>
    <div class="fui-cell-remark noremark">&yen; <span class='dispatchprice'>0.00</span></div>
</div
<div class="fui-cell" id='coupondeduct_div' style='display:none'>
    <div class="fui-cell-label" style='width:auto' id='coupondeduct_text' ></div>
    <div class="fui-cell-info"></div>
    <div class="fui-cell-remark noremark"> <span id="coupondeduct_money"></span></div>
</div>
</div>
</div>
<div class="fui-navbar order-create-checkout">
    <a href="javascript:;" class="nav-item total">
        <p>需付：<span class="text-danger ">&yen; <span class="totalprice"><?php echo $_GET['price']?></span></span>
        </p>
    </a>
    <a href="javascript:;" class="nav-item btn btn-danger buybtn">立即支付</a>
</div>
</div>
</div>
<script>
        clearTimeout(window.interval);
        window.interval = setTimeout(function () {
            window.shareData = {"hideMenus":["menuItem:share:qq","menuItem:share:QZone","menuItem:share:email","menuItem:copyUrl","menuItem:openWithSafari","menuItem:openWithQQBrowser","menuItem:share:timeline","menuItem:share:appMessage"]};
            jssdkconfig = null || { jsApiList:[] };
            jssdkconfig.debug = false;
            jssdkconfig.jsApiList = ['checkJsApi','onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo','showOptionMenu', 'hideMenuItems', 'onMenuShareQZone'];
            wx.config(jssdkconfig);
            wx.ready(function () {
                wx.showOptionMenu();
                wx.hideMenuItems({
                menuList: ["menuItem:share:qq","menuItem:share:QZone","menuItem:share:email","menuItem:copyUrl","menuItem:openWithSafari","menuItem:openWithQQBrowser","menuItem:share:timeline","menuItem:share:appMessage"]                    });   
                wx.onMenuShareAppMessage(window.shareData);
                wx.onMenuShareTimeline(window.shareData);
                wx.onMenuShareQQ(window.shareData);
                wx.onMenuShareWeibo(window.shareData);
                wx.onMenuShareQZone(window.shareData);
            });
        },500);
		</script> 
</body>
</html>