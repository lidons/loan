<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
<meta name="format-detection" content="telephone=no" />
<title>韩梅梅</title>
<link rel="stylesheet" type="text/css" href="/Public/index/css/foxui.min_16.css">
<link rel="stylesheet" type="text/css" href="/Public/index/css/style_19.css">
<link href="/Public/index/css/foxui.diy_24.css"rel="stylesheet"type="text/css"/>
<link rel="stylesheet" type="text/css" href="/Public/index/css/iconfont_16.css">
<link href="/Public/index/css/style_20.css" rel="stylesheet">
<script src="/Public/index/js/jquery-1.11.1.min_17.js"></script>
<script src='/Public/index/js/jweixin-1.1.0_16.js'></script>
<script src="/Public/index/js/require_16.js"></script>
<script src="/Public/index/js/myconfig-app_16.js"></script>
<script src="/Public/js/isPhone.js"></script>
<style type="text/css">
.diymenu .item .inner {background: #ffffff;}
.diymenu .item .inner:before,
.diymenu .item .inner:after {border-color: #ffffff;}
.diymenu .item .inner .text {color: #666666;}
.diymenu .item .inner .icon {color: #999999;}
.diymenu .item.on .inner {background: #ffffff;}
.diymenu .item.on .inner .text {color: #666666;}
.diymenu .item.on .inner .icon {color: #999999;}
.diymenu .item .child {border-color: #eeeeee; background-color: #f4f4f4;}
.diymenu .item .child a {color: #666666;}
.diymenu .item .child a:after {border-color: #eeeeee; color: #666666;}
.diymenu .item .child .arrow:before {background: #eeeeee;}
.diymenu .item .child .arrow:after {background: #f4f4f4;}
.diymenu .item .inner .badge {background: ;}
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
<body >
<div class='fui-page-group '>          
<div class="fui-page fui-page-current page-commission-log">
<div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title">我的收入明细(<span id='total'></span>)</div>
    </div>
    <div class="fui-content navbar">
		<div class='fui-cell-group' style='margin-top:0px;'>
			<div class='fui-cell'>
				<div class='fui-cell-label' style='width:auto'>预计佣金</div>
				<div class='fui-cell-info'></div>
				<div class='fui-cell-remark noremark'>+<span id='commissioncount'></span>元</div>
			</div>
		</div>
 <div class="fui-tab fui-tab-warning" id="tab">
            <!--<a class="active" href="javascript:void(0)" data-tab='status'>所有</a>
            <a href="javascript:void(0)" data-tab='status1'>待审核</a>
            <a href="javascript:void(0)" data-tab='status2'>待打款</a>
            <a href="javascript:void(0)" data-tab='status3'>已打款</a>
            <a href="javascript:void(0)" data-tab='status-1'>无效</a>-->
        </div>
        <div class='content-empty' style='display:none;'>
            <i class='icon icon-manageorder'></i><br/>暂时没有任何数据
        </div>
        <div class="fui-list-group" id="container"></div>
        <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> 正在加载...</span></div>
<script id='tpl_commission_log_list' type='text/html'>
    <%each list as log%>
      <a class="fui-list" href="./index.php?i=2&c=entry&m=ewei_shopv2&do=mobile&r=commission.log.detail&mid=5121&id=<%log.id%>">
            <div class="fui-list-inner">
                <div class="row">
                    <div class="row-text">编号: <%log.applyno%></div>
                </div>
                <div class="subtitle">申请佣金: <%log.commission%>
                    实际金额:<%if log.deductionmoney>0%><%log.realmoney%><%else%><%log.commission%><%/if%>,个人所得税:<%log.deductionmoney%> 元
                    <br>
                    <%if log.status==1%>申请时间:<%/if%>
                    <%if log.status==2%>审核时间:<%/if%>
                    <%if log.status==3%>打款时间:<%/if%>
                    <%if log.status==-1%>无效时间:<%/if%>
                    <%log.dealtime%>
                </div>
            </div>
            <div class="row-remark">
                <p style="color: #00A000">+<%log.commission_pay%></p>
                <p style="color: #00A000"><%log.statusstr%></p>
            </div>
        </a>
<%/each%>
</script>
</div>
 </div>
</div>
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
                        <span class="icon icon-person2 top" ></span>
                    <span class="text top" >个人中心</span>
            </div>
        </div>
</div>
</body>
</html>