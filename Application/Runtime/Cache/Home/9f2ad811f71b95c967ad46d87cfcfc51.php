<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>贷款金额预估</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="telephone=no" name="format-detection">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <link rel="stylesheet" type="text/css" href="/Public/index/css/public.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/index/css/swiper-3.4.0.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/index/css/loan_jump.css"/>
    <!--<link rel="stylesheet" type="text/css" href="/Public/index/css/animate.min.css"/>-->
    <script src="/Public/index/js/jquery-1.11.1.min_12.js"></script>
    <script src="/Public/index/js/swiper-3.4.0.jquery.min.js"></script>
    <script src="/Public/index/js/fastclick.js"></script>
    <script type="text/javascript">
        document.documentElement.style.fontSize = document.documentElement.clientWidth/7.5 +"px";
        window.addEventListener("resize",function(){
            document.documentElement.style.fontSize = document.documentElement.clientWidth / 7.5 + "px";
        },false);
        window.addEventListener('load', function(){
            new FastClick(document.body);
        }, false);
    </script>
</head>
<body>
<!--黑户贷款和极速贷款，都用这个页面-->
<!--banner-->
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><a href="#"><img src="/Public/index/picture/1.jpg"/></a></div>
        <div class="swiper-slide"><a href="#"><img src="/Public/index/picture/2.jpg"/></a></div>
        <div class="swiper-slide"><a href="#"><img src="/Public/index/picture/3.jpg"/></a></div>
        <div class="swiper-slide"><a href="#"><img src="/Public/index/picture/4.jpg"/></a></div>
        <div class="swiper-slide"><a href="#"><img src="/Public/index/picture/5.jpg"/></a></div>
    </div>
    <div class="swiper-pagination"></div>
</div>
<div class="choose">
    <div class="choose_top">
        <p>请如实勾选以下选项以便更精确的</p>
        <p>评估您的贷款额度</p>
    </div>
    <div class="choose_wrap">
        <input type="checkbox" name="" class="choose_t" value="" />
        <img src="/Public/index/picture/choose_t.png"/>
        <span>我是黑户</span>
    </div>
    <div class="choose_wrap">
        <input type="checkbox" name="" class="choose_t" value="" />
        <img src="/Public/index/picture/choose_t.png"/>
        <span>我有车</span>
    </div>
    <div class="choose_wrap">
        <input type="checkbox" name="" class="choose_t" value="" />
        <img src="/Public/index/picture/choose_t.png"/>
        <span>我有工作</span>
    </div>
    <div class="choose_wrap">
        <input type="checkbox" name="" class="choose_t" value="" />
        <img src="/Public/index/picture/choose_t.png"/>
        <span>我有房</span>
    </div>
    <div class="choose_wrap">
        <input type="checkbox" name="" class="choose_t" value="" />
        <img src="/Public/index/picture/choose_t.png"/>
        <span>我有社保</span>
    </div>
    <div class="choose_wrap">
        <input type="checkbox" name="" class="choose_t" value="" />
        <img src="/Public/index/picture/choose_t.png"/>
        <span>我已婚</span>
    </div>
    <div class="choose_wrap">
        <input type="checkbox" name="" class="choose_t" value="" />
        <img src="/Public/index/picture/choose_t.png"/>
        <span>我有信用卡</span>
    </div>
    <div class="choose_wrap">
        <input type="checkbox" name="" class="choose_t" value="" />
        <img src="/Public/index/picture/choose_t.png"/>
        <span>均不符合</span>
    </div>

</div>
<div id="main">
    <canvas id="yuan"></canvas>
    <img src="/Public/index/picture/quan.png"/>
    <p class="p1">请点击评估额度</p>
    <span class="counter">0</span>
    <p class="p2">评估额度(元)</p>
    <p class="borrow">预估额度</p>

</div>
<!--提示弹窗-->
<div id="tip_pop">
    <img class="back" src="/Public/index/picture/pop_fan_1.png"/>
    <h3></h3>
    <p></p>
    <img class="pop_bg" src="/Public/index/picture/pop_img_1.png"/>
</div>
<div id="tip_pop1">
    <img class="back" src="/Public/index/picture/fan.png"/>
    <h3></h3>
    <p></p>
    <img class="pop_bg" src="/Public/index/picture/newest.jpg"/>
    <a class="go_updex" href="/index.php/home/index/shop">前往会员升级</a>
</div>

<script src="/Public/index/js/jquery.countup.min.js"></script>
<script src="/Public/index/js/jquery.waypoints.min.js"></script>
<script src="/Public/index/js/easydialog_1.js"></script>
<script type="text/javascript">

    var come_w = 1;//1为极速贷款过来，其他是黑户贷款
    var choose_num = 0;//选择的数量
    $(".choose_t").on("change",function(){
        if($(this).is(":checked")){
            $(this).parent().find("img").attr("src","/Public/index/picture/choose1.png");
        }else{
            $(this).parent().find("img").attr("src","/Public/index/picture/choose1.png")
        }
    });

    //我要贷款
    var flag = true;
    $(".borrow").on("click",function(){
        if($(".borrow").html()=="预估额度"){
            choose_num = 0;
            for(var i=0;i<$(".choose_t").length;i++){
                if($(".choose_t").eq(i).is(":checked")){
                    choose_num++;
                }
            }
            if(choose_num==0){
                $("#tip_pop h3").html("您未选择任何选项！");
                $("#tip_pop p").html("请先如实选择，方可更准确的评估！");
                easyDialog.open({
                    container : 'tip_pop'
                });
                $("#tip_pop .back").on("click",function(){
                    easyDialog.close();
                });
            }else{
                if(flag){
                    flag = !flag;
                    if(choose_num<=2){
                        $(".swiper-container").animate({"opacity":1},600);
                        $(".choose").animate({"margin-left":"-7.5rem"},400);
                        //初始化轮播
                        var mySwiper = new Swiper('.swiper-container', {
                            autoplay: 4000,
                            autoplayDisableOnInteraction : false,
                            loop : true,
                            pagination : '.swiper-pagination',
                        });
                        //数字动画
                        setTimeout(function(){
                            $(".counter").html(30000);
                            $('.counter').countUp({
                                delay: 10,
                                time: 2000
                            });
//                          circleProgress(100,50);
                        },1000);
                        setTimeout(function(){
                            $(".p1").html("你已获得贷款资格，实际贷款额度以系统审核为准");
                            $(".borrow").html("立即贷款").css("background","#fd995c");
                            flag = !flag;
                        },4000);
                    }else if(choose_num>2){
                        $(".swiper-container").animate({"opacity":1},600);
                        $(".choose").animate({"margin-left":"-7.5rem"},400);
                        //初始化轮播
                        var mySwiper = new Swiper('.swiper-container', {
                            autoplay: 4000,
                            autoplayDisableOnInteraction : false,
                            loop : true,
                            pagination : '.swiper-pagination',
                        });
                        //数字动画
                        setTimeout(function(){
                            $(".counter").html(50000);
                            $('.counter').countUp({
                                delay: 10,
                                time: 2000
                            });
//                          circleProgress(100,50);
                        },1000);
                        setTimeout(function(){
                            $(".p1").html("你已获得贷款资格，实际贷款额度以系统审核为准");
                            $(".borrow").html("立即贷款");
                            flag = !flag;
                        },4000);
                    }
                }
            }
        }else{
            $("#tip_pop1 h3").html("您还不是会员!");
             $("#tip_pop1 p").html("您可以在会员升级页面进行购买!");
             easyDialog.open({
             container : 'tip_pop1'
             });
             $("#tip_pop1 .back").on("click",function(){
             easyDialog.close();
             });
        }
    });

    function circleProgress(value,average){
        var canvas = document.getElementById("yuan");
        canvas.setAttribute("width", screen.availWidth*0.64);
        canvas.setAttribute("height", screen.availWidth*0.64);
        var context = canvas.getContext('2d');
        var _this = $(canvas),
            value= Number(value),// 当前百分比,数值
            average = Number(average),// 平均百分比
            color = "",// 进度条、文字样式
            maxpercent = 100,//最大百分比，可设置
            c_width = _this.width(),// canvas，宽度
            c_height =_this.height();// canvas,高度
        // 判断设置当前显示颜色
        if( value== maxpercent ){
            color="#27a0ef";
        }else if( value> average ){
            color="#27a0ef";
        }else{
            color="#27a0ef";
        }
        // 清空画布
        context.clearRect(0, 0, c_width, c_height);
        // 画初始圆
        context.beginPath();
        // 将起始点移到canvas中心
        context.moveTo(c_width/2, c_height/2);
        // 绘制一个中心点为（c_width/2, c_height/2），半径为c_height/2，起始点0，终止点为Math.PI * 2的 整圆
        context.arc(c_width/2, c_height/2, c_height/2, 0, Math.PI * 2, false);
        context.closePath();
        context.fillStyle = 'rgba(0,0,0,0)'; //填充颜色
        context.fill();
        // 绘制内圆
        context.beginPath();
        context.strokeStyle = color;
        context.lineCap = 'square';
        context.closePath();
        context.fill();
        context.lineWidth = 10.0;//绘制内圆的线宽度

        function draw(cur){
            // 画内部空白
            context.beginPath();
            context.moveTo(24, 24);
            context.arc(c_width/2, c_height/2, c_height/2-10, 0, Math.PI * 2, true);
            context.closePath();
            context.fillStyle = 'rgba(255,255,255,1)';  // 填充内部颜色
            context.fill();
            // 画内圆
            context.beginPath();
            // 绘制一个中心点为（c_width/2, c_height/2），半径为c_height/2-5不与外圆重叠，
            // 起始点-(Math.PI/2)，终止点为((Math.PI*2)*cur)-Math.PI/2的 整圆cur为每一次绘制的距离
            context.arc(c_width/2, c_height/2, c_height/2-5, -(Math.PI / 2), ((Math.PI * 2) * cur ) - Math.PI / 2, false);
            context.stroke();
            //在中间写字
//			        context.font = "bold 18pt Arial";  // 字体大小，样式
//			        context.fillStyle = color;  // 颜色
//			        context.textAlign = 'center';  // 位置
//			        context.textBaseline = 'middle';
//			        context.moveTo(c_width/2, c_height/2);  // 文字填充位置
//			        context.fillText(value+"%", c_width/2, c_height/2-20);
//			        context.fillText("正确率", c_width/2, c_height/2+20);
        }
        // 调用定时器实现动态效果
        var timer=null,n=0;
        function loadCanvas(nowT){
            timer = setInterval(function(){
                if(n>nowT){
                    clearInterval(timer);
                }else{
                    draw(n);
                    n += 0.008;
                }
            },18);
        }
        loadCanvas(value/100);
        timer=null;
    };

</script>
</body>

</html>