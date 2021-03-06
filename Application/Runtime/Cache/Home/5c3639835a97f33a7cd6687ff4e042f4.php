<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">        <meta name="format-detection" content="telephone=no" />
<title>韩梅梅</title>
<link rel="stylesheet" type="text/css" href="/Public/index/css/foxui.min_8.css">
<link rel="stylesheet" type="text/css" href="/Public/index/css/style_8.css">
<link rel="stylesheet" type="text/css" href="/Public/index/css/iconfont_8.css">
<link rel="stylesheet" href="/Public/index/css/swiper.min_8.css">
<link rel="stylesheet" href="//cdn.bootcss.com/weui/1.1.1/style/weui.min.css">
<link rel="stylesheet" href="//cdn.bootcss.com/jquery-weui/1.0.1/css/jquery-weui.min.css">
<link href="/Public/index/css/foxui.diy_15.css"rel="stylesheet"type="text/css"/>
<link href="/Public/index/css/foxui.diy_16.css"rel="stylesheet"type="text/css"/>
<script src="/Public/index/js/jquery-1.11.1.min_8.js"></script>
<script src='/Public/index/js/jweixin-1.1.0_8.js'></script>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>  
<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/jquery-weui.min.js"></script>
<!-- 如果使用了某些拓展插件还需要额外的JS -->
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/swiper.min.js"></script>
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

 #jurisdiction{
        padding: 2px 5px;
        height: 80px;
    }
    #jurisdiction h3{
        margin: 2px 0 5px;
        font:900 14px '';
        color: #333;
        text-align: center;
    }
    #jurisdiction .level{
        float: left;
        width: 26%;
        height: 35px;
        background: #4f7083;
        margin: 2px 12px;
        text-align: center;
        box-sizing: border-box;
    }
    #jurisdiction .level span{
        display: block;
        color: #ffffff;
        font: 900 15px/30px '';
    }
    #info{
        font:100 15px '';
        color: #333;
        width: 95%;
        margin:0 auto;
    }
    #info .inp_wrap{
        padding:15px 0;
        height: 50px;
        box-sizing: border-box;
        position: relative;
    }
    #info .inp_wrap .code{
    	position: absolute;
    	top: 8px;
    	right: 10px;
    	color: #666;
    	width: 100px;
		line-height: 30px;
		text-align: center;
		border: 1px solid #00ba02;
		border-radius: 5px;
		padding: 0 2px;
		font-size: 15px;
    }
    #info .inp_wrap span{
        float: left;
        padding: 10px 0;
        width: 25%;
    }
    #info .inp_wrap input{
        background: #fafafa;
        border:none;
        font:100 15px '';
        padding: 10px 0;
        float: left;
        width: 70%;
    }
    .agreement{
        border-top:1px solid #F0F0F0;
        padding: 10px 0;

    }
    
    #price_wrap{
        padding: 10px 0;
        width: 95%;
        height: 50px;
        margin: 0 auto;
        position: relative;
    }
    #price_wrap .p_wrap{
        position: absolute;
        bottom: 10px;
        left: 0;
        color: red;
    }
    #price_wrap .p_wrap span{
        color: red;
    }
    #price_wrap .buy{
        width: 125px;
        height: 30px;
        text-align: center;
        position: absolute;
        right: 0;
        top: 8px;
        background: #d43718;
        color: #FFFFFF;
        font:900 15px/30px '';
    }
    .agreement{
        border-top: 1px solid #F0F0F0;
        position: relative;
        height: auto;
    }
    .agreement .p1{
        color: #666666;
    }
    .agreement .agree{
        padding-left:30px;
        width: 100%;
        margin-top:10px;
    }
    .agreement .agree input{
        position: absolute;
        bottom: 0;
        left: 0;
        width: 26px;
        height: 26px;
        opacity: 0;
        z-index: 10;
    }
    .agreement .agree img{
        position: absolute;
        bottom: 6px;
        left: 0;
    }
    .agreement .agree a{
        color: #6191a3;
    }
    #tip_pop{
        position: fixed;
        width: 260px;
        height: 260px;
        background: #FFFFFF;
        border-radius: 0.2rem;
        display: none;
    }
    #tip_pop .back{
        position: absolute;
        top: 0.22rem;
        width: 0.8rem;
        height: 0.56rem;
    }
    #tip_pop h3{
        width: 100%;
        text-align: center;
        margin-top: 20px;
        line-height: 20px;
        font-size: 14px;
        color: #343434;
    }
    #tip_pop p{
        width: 100%;
        text-align: center;
        margin-top: 20px;
        font-size: 13px;
        color: #737373;
    }
    #tip_pop .pop_bg{
        width: 138px;
        height: 128px;
        position: absolute;
        left: 60px;
        bottom: 30px;
    }
    #tip_pop .back{
    	display: block;
    	width: 50px;
    	height: 40px !important;
    	position: absolute;
    	padding-top: 10px;
    	top: 0;
    	left: 0;
    	z-index: 100;
    }
    #jurisdiction .choosed{
        background: #e6763e;
    }
    #jurisdiction .choosed .right_img{
        display: block;
    }
.swiper-slide img{
	width: 100%;
	height:9.12rem;
	margin: 0 auto;
    display: block;
}
</style>
</head>
<body>
<div class='fui-page-group '>
<div class='fui-page  fui-page-current ' style="top: 0; background-color: #fafafa; ">
    <div class="fui-header">
        <div class="fui-header-left">
        </div>
        <div class="title">会员升级</div>
        <div class="fui-header-right"></div>
    </div>
<div class="fui-content navbar" id="container" style="background-color: #fafafa; padding-bottom: 0;">                       
<div class="swiper-container" data-space-between='10' data-pagination='.swiper-pagination' data-autoplay="1000">
  <div class="swiper-wrapper">
  <?php if(is_array($img)): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="swiper-slide"><img src="/Public/uploads/<?php echo ($vo["img"]); ?>"  alt=""></div><?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
</div>
<!--非滚轮形式显示-->
<!--滚轮方式显示-->
<div class="fui-goods-group block three" style="background: #fafafa;">
    <div id="jurisdiction">
        <h3>请选择会员权限</h3>
        <!--class level_choose  value 换成商品的id-->
        <div class="level channel choosed">
            <input type="hidden" name="channel" class="pri_lesson" id="channel" value="<?php echo ($member["0"]["member_moeny"]); ?>" />
            <input type="hidden" name="" class="level_choose" value="1" />
            <div class="left_wrap">
                <span style="line-height: 35px;"><?php echo ($member["0"]["member"]); ?></span>
            </div>
        </div>
        <div class="level team">
            <input type="hidden" name="team" class="pri_lesson" id="team" value="<?php echo ($member["1"]["member_moeny"]); ?>" />
            <input type="hidden" name="" class="level_choose" value="2" />
            <div class="left_wrap">
                <span style="line-height: 35px;"><?php echo ($member["1"]["member"]); ?></span>
            </div>
        </div>
        <div class="level city">
            <input type="hidden" name="city" class="pri_lesson" id="city" value="<?php echo ($member["2"]["member_moeny"]); ?>" />
            <input type="hidden" name="" class="level_choose" value="3" />
            <div class="left_wrap">
                <span style="line-height: 35px;"><?php echo ($member["2"]["member"]); ?></span>
            </div>
        </div>
        <div class="level set">
            <input type="hidden" name="set" class="pri_lesson" id="set" value="<?php echo ($member["3"]["member_moeny"]); ?>" />
            <input type="hidden" name="" class="level_choose" value="4" />
            <div class="left_wrap">
                <span style="line-height: 35px;"><?php echo ($member["3"]["member"]); ?></span>
            </div>
        </div>
        <div class="level to">
            <input type="hidden" name="to" class="pri_lesson" id="to" value="<?php echo ($member["4"]["member_moeny"]); ?>" />
            <input type="hidden" name="" class="level_choose" value="5" />
            <div class="left_wrap">
                <span style="line-height: 35px;"><?php echo ($member["4"]["member"]); ?></span>
            </div>
        </div>
        <div class="level do">
            <input type="hidden" name="do" class="pri_lesson" id="do" value="<?php echo ($member["5"]["member_moeny"]); ?>" />
            <input type="hidden" name="" class="level_choose" value="6" />
            <div class="left_wrap">
                <span style="line-height: 35px;"><?php echo ($member["5"]["member"]); ?></span>
            </div>
        </div>
    </div>
    <div id="info"  style="margin-top: 20px;">
        <div class="inp_wrap">
            <span>收货姓名</span>
            <input type="text" name="the_name" id="the_name" placeholder="请输入姓名" value="<?php echo ($info["username"]); ?>">
        </div>
        <div class="inp_wrap">
            <span>微信号码</span>
            <input type="text" name="wechat" id="wechat" placeholder="请输入微信号" value="<?php echo ($info["wxnumber"]); ?>">
        </div>
        <div class="inp_wrap">
            <span>手机号码</span>
            <input type="text" name="tel" id="tel" placeholder="请输入手机号" value="<?php echo ($info["phone"]); ?>">
        </div>
        <!--协议-->
        <div class="agreement">
            <p class="p1">我已阅读并同意我公司相关协议</p>
            <div class="agree">
                <input type="checkbox" checked="checked" name="iagree" id="iagree" value="">
                <img class="agree_img" src="/Public/index/picture/choose1.png">
                <a href="">《在线使用服务协议》</a>
            </div>
        </div>
    </div>
    <div id="price_wrap">
        <input type="hidden" name="new_level" id="new_level" value="1" />
        <p class="p_wrap">价格：<span id="price"></span>元</p>
        <p class="buy">立即购买</p>
    </div>
    <p class="kong" style="height: 1rem;"></p>
    <div id="tip_pop">
        <img class="back" src="/Public/index/picture/pop_fan.png"/>
        <h3>资料填写不完整!</h3>
        <p>请输入电话号码！</p>
        <img class="pop_bg" src="/Public/index/picture/pop_img.png"/>
    </div>
	<input type="hidden" id="useropenid" name="useropenid" value="<?php echo session('useropenid')?>"/>
</div>
<script src="/Public/index/js/easydialog.js"></script>
<script>
    $("input").on("click",function(){
        $(this).focus();
    });
    //注：level==1,2,3,4,5,6分别代表初级会员、中级会员、高级会员三个级别
    //后台续传目前的等级，及每个等级的价格,具体该付多少钱，前段已经处理（升级补差价）
    //根据等级计算对应价格
    //member_level pandu
    var level = 0;
    var le1_p = $("#channel").val();
    var le2_p = $("#team").val();
    var le3_p = $("#city").val();
    var le4_p = $("#set").val();
    var le5_p = $("#to").val();
    var le6_p = $("#do").val();
    var member_level=0;
    if(level==0){
        $("#channel").val(le1_p);
        $("#team").val(le2_p);
        $("#city").val(le3_p);
        $("#set").val(le4_p);
        $("#to").val(le5_p);
        $("#do").val(le6_p);
    }else if(level==1){
        $("#channel").val(0);
        $("#team").val(le2_p - le1_p);
        $("#city").val(le3_p - le1_p);
        $("#set").val(le4_p - le1_p);
        $("#to").val(le5_p - le1_p);
        $("#do").val(le6_p - le1_p);
    }else if(level==2){
        $("#channel").val(0);
        $("#team").val(0);
        $("#city").val(le3_p - le2_p);
        $("#set").val(le4_p - le2_p);
        $("#to").val(le5_p-le2_p);
        $("#do").val(le6_p-le2_p);
    }else if(level==3){
        $("#channel").val(0);
        $("#team").val(0);
        $("#city").val(0);
        $("#set").val(le4_p - le3_p);
        $("#to").val(le5_p - le3_p);
        $("#do").val(le6_p - le3_p);
    }else if(level==4){
	   	$("#channel").val(0);
	    $("#team").val(0);
        $("#city").val(0);
        $("#set").val(0);
        $("#to").val(le5_p - le4_p);
        $("#do").val(le6_p - le4_p);
    }else if(level==5){
	   	$("#channel").val(0);
	    $("#team").val(0);
        $("#city").val(0);
        $("#set").val(0);
        $("#to").val(0);
        $("#do").val(le6_p - le5_p);
    }else if(level==6){
    	$("#channel").val(0);
	    $("#team").val(0);
        $("#city").val(0);
        $("#set").val(0);
        $("#to").val(0);
        $("#do").val(0);
    }
    //同意协议
    $("#iagree").on("change",function(){
        if($(this).is(":checked")){
            $(".agree_img").attr("src","http://ganzhe.hfwoniu.com/diypage/img/vip_up/choose1.png");
        }else{
            $(".agree_img").attr("src","http://ganzhe.hfwoniu.com/diypage/img/vip_up/choose.png");
        }
    });
    if(member_level>0){
        $("#price").html(0);
    }else{
        $("#price").html(le1_p);
    }
    //选择类别
    $(".level").on("click",function(){
        $(".level").removeClass("choosed");
        $(this).addClass("choosed");
        var thePri = $(this).find(".pri_lesson").val();
        var new_l = $(this).find(".level_choose").val();
        console.log(thePri);
       if(member_level==0){
            $("#price").html(thePri);
        }else if(member_level==1){
            $("#price").html(thePri-le1_p<0?0:thePri-le1_p);
        }else if(member_level==2){
            $("#price").html(thePri-le2_p<0?0:thePri-le2_p);
        }else if(member_level==3){
            $("#price").html(thePri-le3_p<0?0:thePri-le3_p);
        }else if(member_level==4){
        	$("#price").html(thePri-le4_p<0?0:thePri-le4_p)
        }else if(member_level==5){
        	$("#price").html(thePri-le5_p<0?0:thePri-le5_p)
        }else if(member_level==6){
        	$("#price").html(thePri-le6_p<0?0:thePri-le6_p)
        }
        $("#new_level").val(new_l);
        //价格和等级后台算吧最好  //这是前台js算的
    });
    //点击购买
    $(".buy").on("click",function(){
		 var openid = $("#useropenid").val();
    	 var name = $("#the_name").val();
         var wechat = $("#wechat").val();
         var tel = $("#tel").val();
         var price = $("#price").html();
         var new_level = $("#new_level").val();
         console.log(the_name+"，"+wechat+"，"+tel+"，"+price+"，"+new_level);
         //输入选择信息的验证
        if(!name){
        	dialog.error('您还没有填写名字！');
        	return false;
        }
        if(jQuery.trim(the_name) == ''){
        	dialog.error('请填写正确的名字！');
        	return false;
        }
        if(!wechat){
        	dialog.error('请填写您的微信号');
        	return false;
        }
    	if(!tel){
    		dialog.error('请填写电话号码');
    		return false;
    	}    
	   	if(!(/^1[34578]\d{9}$/.test(tel))){ 
	   	    dialog.error('请填写正确的手机号码');
	   	    return false; 
	   	} 
	   $.ajax({
           async:false,
           data:{
               openid:openid,
               name:name,
               tel:tel,
               wechat:wechat,
               price:price,
               new_level:new_level,
           },
           type:'post',
           success:function(res){
				//window.location="/index.php/home/index/getUser"
               //跳转至付款页面 传送对应商品的链接至此处
               window.location="/index.php/home/index/play?id="+new_level+"&name="+name+"&tel="+tel+"&price="+price+"&openid="+openid+"&wechat="+wechat;
           },
           error:function(res){
           	console.log(res);
           }
       });
   	   /*$.post(url,data,function(result){
	          if(result.status == 0) {
	              return dialog.error(result.message);
	          }
	          if(result.status == 1) {
	              return dialog.success(result.message, '/Admin/menu/index');
	          }
	      },'JSON');*/
    });
    //验证码倒计时
	//var onOff = true;
//  $('.code').on('click',function(){
//      var tel = $('#tel').val();
//      if(!(/^1[34578]\d{9}$/.test(tel))){
//      	$(".tip_info").html("输入正确的手机号");
//			 $("#tip_pop h3").html("手机号有误！");
//          $("#tip_pop p").html("请输入正确的手机号！");
//          easyDialog.open({
//              container : 'tip_pop'
//          });
//          $("#tip_pop .back").on("click",function(){
//              easyDialog.close();
//          });
//          return false;
//      }else if(onOff){
//      	onOff = false;
//      	$.ajax({
//              type:'POST',
//              url:"./index.php?i=2&c=entry&op=ajax&do=login%2Frepwd&m=",
//              data:{tel:tel},
//              dataType:'json',
//              success:function(data){
//                  //倒计时
//					var intDiff = parseInt(60);
//					function timer(intDiff){
//					    var timer = setInterval(function(){
//						    var day=0,
//						        hour=0,
//						        minute=0,
//						        second=60; //时间默认值  
//						    if(intDiff > 0){
//						        day = Math.floor(intDiff / (60 * 60 * 24));
//						        hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
//						        minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
//						        second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
//						    }
//						    if (second <= 9) second = '0'+ second;
//						    if(second == 00){
//						   	   second = 60;
//						    }
//						    $('.code').html(second+"秒后再获取");
//						    intDiff--;
//						    if(intDiff<=0){
//						    	onOff = true;
//						    	$('.code').html('获取验证码');
//						    	clearInterval(timer);
//						    }
//					    }, 1000);
//					    
//					} 
//					$(function(){
//					    timer(intDiff);
//					});   
//              }
//          });
//      }
//      
//  });
	 
</script>
</div>
</div>
</div>
<div class="diymenu" style=" position: absolute;max-width: 750px;">
        <div class="item item-col-4 " onclick="location.href = '/index.php/home/index/shop'" >
            <div class="inner  top">
                        <span class="icon icon-vip top" style="color: #000;"></span>                    
                    <span class="text top" >会员升级</span>
            </div> 
        </div>
        <div class="item item-col-4 " onclick="location.href = '/index.php/home/index/news'" >
            <div class="inner  top">
                    <span class="icon icon-hotfill top" ></span>
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
                        <span class="icon icon-person2 top"></span>
                    <span class="text top" >个人中心</span>
            </div>
        </div>
</div>
<script>
 function showSubMenu(obj) {
     $(obj).toggleClass('on').siblings().removeClass('on');
     $(obj).find('.child').toggleClass('in');
     $(obj).siblings().find('.child').removeClass('in')
 }
 $(function (){
         var len = $(".diymenu .child").length;
         $(".diymenu .child").each(function (i) {
             var width = $(this).outerWidth();
             var margin = -(width / 2);
             var left = '50%';
             var pleft = $(this).position().left - width / 2;
             if(i==0 && pleft<2){
                 left = 2;
                 margin = 0;
                 var pwidth = $(this).closest('.item').width();
                 var arrowleft = pwidth / 2;
                 var oldleft = parseFloat( $(this).find('.arrow').css('left').replace('px','') );
                 $(this).find('.arrow').css({'left': arrowleft-10, 'margin-left': 0});
             }
             else if(i+1==len) {
                 var thisleft = parseFloat( $(this).offset().left.toString().replace('px',''));
                 if((thisleft+width)>$(document).width()){
                     var pleft = $(this).closest('.item').offset().left;
                     left =  $(document).width() - width - 2 - pleft;
                     margin = 0;
                     var pwidth = $(this).closest('.item').width();
                     var itemleft = (pwidth / 2) + pleft;
                    var childleft = $(document).width() - width - 2;
                    var arrowleft = itemleft - childleft;
                    $(this).find('.arrow').css({'left': arrowleft-10, 'margin-left': 0});
                 }
             }
             $(this).css({'position': 'absolute', 'left': left, 'margin-left': margin, 'z-index': 0});
         })
     })
</script>

<script>
$(".swiper-container").swiper({autoplay:true,speed:2800,loop:true});
</script>
</body>

</html>