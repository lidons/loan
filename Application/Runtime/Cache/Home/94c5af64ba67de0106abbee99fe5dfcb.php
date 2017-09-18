<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="Cache-Control" content="private">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<title>立即申请</title>
<link rel="Stylesheet" href="/Public/Home/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css"/>
<script type="text/javascript" src="/Public/Home/js/jquery.js"></script>
<script src="/Public/js/isPhone.js"></script>
<script type="text/javascript">
function resize() {
	var htmlEle = document.documentElement; 
	var htmlWidth = window.innerWidth;
	htmlEle.style.fontSize = 100 * (htmlWidth / 750) + 'px'
} resize();
</script>
<style>
.show_main{
	text-align: center;
	margin-top: 90%;
}
</style>
</head>
	<body style="background-image: url(/Public/uploads/<?php echo ($res["input_picture"]); ?>);">
		<div class="box show_main">
			<div class="info_list">
				<ul >
					<li class="info_item">
						<img src="/Public/Home/picture/password.png"  class="pic2" />
						<input type="text" class="password list" name="username" placeholder="请输入您的名字" maxlength="12" />
					</li>
					<li class="info_item ">
						<img src="/Public/Home/picture/phone.png"  class="pic1" />
						<input type="tel" class="phone list"  name="phone"placeholder="请输入手机号码" maxlength="11" onkeyup="this.value=this.value.replace(/\D/g,'')" />
					</li>
				</ul>
				<input type="hidden" name="title"  value="<?php echo ($res["title"]); ?>"/>
				<input type="hidden" name="url"  value="<?php echo ($res["url"]); ?>"/>
				<input class="btn_next" type="button" value="立即申请" />
				<div class='btn_text'>
			
				</div>
			</div>
	</div>
</body>
<script>
$('.btn_next').click(function(){
     var username = $('input[name="username"]').val();
     var phone = $('input[name="phone"]').val();
     var title = $('input[name="title"]').val();
	 var jump_url = $('input[name="url"]').val();
	 if(!username){
			alert('用户名不能为空');
			return false;
	 }
	 if(jQuery.trim(username) == ''){
     	alert('请填写正确的名字！');
     	return false;
     }
	 if(!phone){
			alert('手机号不能为空');
			return false;
	 }
	 if(!(/^1[34578]\d{9}$/.test(phone))){ 
	   	    alert('请填写正确的手机号码');
	   	    return false; 
	} 
	 console.log(username+","+phone+","+title+","+jump_url);
     $.ajax({
         async:false,
         url:"/index.php/home/index/save_user_information",
         data:{
             username:username,
             phone:phone,
             title:title
         },
         type:'post',
         success:function(res){
             window.location = jump_url;
         },
         error:function(res){
         	console.log(res);
         }
     });
});
</script>
</html>