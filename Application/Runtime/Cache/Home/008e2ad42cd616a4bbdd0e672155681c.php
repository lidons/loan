<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
<meta name="format-detection" content="telephone=no" />
<title>我的资料</title>
<link rel="stylesheet" type="text/css" href="/Public/index/css/foxui.min_14.css">
<link rel="stylesheet" type="text/css" href="/Public/index/css/style_16.css">
<link rel="stylesheet" type="text/css" href="/Public/index/css/iconfont_14.css">
<script src="/Public/index/js/jquery-1.11.1.min_15.js"></script>
<script src='/Public/index/js/jweixin-1.1.0_14.js'></script>
<script src="/Public/index/js/require_14.js"></script>
<script src="/Public/index/js/myconfig-app_14.js"></script>
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
</head>
<body>
<div class='fui-page-group '>
<div class='fui-page  fui-page-current'>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back" src="#"></a>
        </div>
        <div class="title">会员资料</div>
        <div class="fui-header-right">&nbsp;</div>
    </div>

    <div class='fui-content' style='margin-top:5px;'>

        <div class="fui-list-group">
            <a class="fui-list" href="#" data-nocache="true">
                <div class="fui-list-media">
                 <img class="round avatar" src="<?php echo ($res["headimgurl"]); ?>" />
                </div>
                <div class="fui-list-inner">
                    <div class="title nickname"><?php echo ($res["wxnickname"]); ?></div>
                </div>
                <div class="fui-list-angle">
                    <div class="angle"></div>
                </div>
            </a>
        </div>
        <div class="fui-cell-group">
            <div class="fui-cell must ">
                <div class="fui-cell-label ">姓名</div>
                <div class="fui-cell-info"><input type="text" class='fui-input' id='realname' name='realname' placeholder="请输入您的姓名"  value="<?php echo ($res["username"]); ?>" /></div>
            </div>
            <div class="fui-cell must ">
                <div class="fui-cell-label ">会员等级</div>
                <div class="fui-cell-info"><input type="text" class='fui-input' id='realname' name='realname' placeholder="请输入您的姓名"  value="<?php echo (getVipinfo($res["status"])); ?>" /></div>
            </div>
            <div class="fui-cell must">
                <div class="fui-cell-label">手机号</div>
                <div class="fui-cell-info"><input type="text" class='fui-input' id='mobile' name='mobile' placeholder="请输入您的手机号"  value="<?php echo ($res["phone"]); ?>" /></div>
            </div>
            
            <div class="fui-cell">
                <div class="fui-cell-label">微信号</div>
                <div class="fui-cell-info"><input type="text"  class='fui-input'  id='weixin' name='weixin' placeholder="请输入您的微信号"  value="<?php echo ($res["wxnumber"]); ?>" /></div>
            </div>
            <div class="fui-cell">
                <div class="fui-cell-label ">所在城市</div>
                <div class="fui-cell-info"><input type="text"  class='fui-input' id="city"  name='city' placeholder="填写城市"  value="<?php echo ($res["province"]); echo ($res["city"]); ?>" /></div>
            </div>
			<input type="hidden" id="useropenid" name="useropenid" value="<?php echo session('useropenid')?>"/>
        </div>
               <!-- <div href='' id='saveUserInfo' class='btn btn-success block'>确认修改</div>-->
    </div>
    </div>
    </div>
</body>
</html>