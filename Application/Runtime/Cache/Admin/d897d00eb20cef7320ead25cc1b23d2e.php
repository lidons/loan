<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>首页</title>  
<link rel="stylesheet" href="/Public/admin/css/pintuer.css">
<link rel="stylesheet" href="/Public/admin/css/admin.css">
<script src="/Public/admin/js/jquery.js"></script>
<script src="/Public/admin/js/pintuer.js"></script>
<script src="/Public/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>  
<script src="/Public/js/common.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder">用户列表</strong></div>
  <form action="<?php echo U('Admin/Yy/index');?>" method="post"> 
  <div class="padding border-bottom"> 
  <li>
    <input type="text"  placeholder="请输入搜索关键字" name="id" class="input" style="width:80%; line-height:17px;display:inline-block" />
    <input type="submit"  value="提交" style="background-color: #0ae;color: #fff;"class="button border-main icon-search"/>
    <!--  <a href="javascript:void(0)" style="background-color: #0ae;color: #fff;"class="button border-main icon-search" onclick="changesearch()" >查询</a>-->
  </li>
  </div> 
  </form>
  <table class="table table-hover text-center">
    <tr>
      <th>ID</th>
      <th>会员等级</th>
	  <th>姓名</th>
	  <th>微信名</th>
	  <th>账户余额</th>
	  <th>已提现</th>
	  <th>用户手机号</th>
	  <th>操作</th>
    </tr>
	<?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	  <td style="width:5%"><?php echo ($vo["id"]); ?></td>
      <td style="width:15%" ><?php echo (getStatus($vo["status"])); ?></td>
	  <td style="width:15%"><?php echo (getUser($vo["username"])); ?> </td> 
	  <td style="width:10%;"><?php echo ($vo["wxnickname"]); ?></td>
	  <td style="width:10%;"><?php echo ($vo["money"]); ?></td>
	  <td style="width:10%;"><?php echo ($vo["up_money"]); ?></td>
	  <td style="width:10%;"><?php echo ($vo["phone"]); ?></td>
      <td>
      <div class="button-group">
      <a type="button"  class="button border-main" href="<?php echo U('Admin/Yy/save',array('id'=>$vo['id']));?>"><span class="icon-edit"></span>修改金额</a>
      <a href="javascript:void(0)" attr-id="<?php echo ($vo["id"]); ?>" onclick="common.pull_black" class="button border-red pull_black" ><span class="icon-trash-o" ></span>拉入黑名单</a>
      </div>
      </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	<tr>
        <td colspan="8"><div class="pagelist"><?php echo ($page); ?></div></td>
    </tr>
  </table>
</div>
</body>  
<script>
$(".pull_black").on('click',function(){
	  	var id = $(this).attr('attr-id');
	    layer.open({
	        type : 0,
	        title : '是否提交？',
	        btn: ['yes', 'no'],
	        icon : 3,
	        closeBtn : 2,
	        content: "确定将此用户拉入黑名单？",
	        scrollbar: true,
	        yes: function(){
	            // 执行相关跳转
	            var url = "/admin.php/Admin/Yy/pull_black";
	            var data = {'id':id,'state':0};
	        	$.post(url,data,function(result){
	  	          if(result.status == 0) {
	  	              return dialog.error(result.message);
	  	          }
	  	          if(result.status == 1) {
	  	              return dialog.success(result.message, '/Admin/Yy/index');
	  	          }
	  	      },'JSON');
	        },

	    });

});
</script>

</html>