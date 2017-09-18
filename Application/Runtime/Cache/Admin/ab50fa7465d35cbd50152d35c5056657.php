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
<form action="<?php echo U('Admin/Newest/del_apply');?>" method="get"> 
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder">贷款申请</strong></div>
  <div class="padding border-bottom">  
  </div>
      <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div> 
  <table class="table table-hover text-center">
    <tr>
      <th>ID</th>     
      <th>申请第三方名称</th>
	  <th>用户姓名</th> 
	  <th>用户手机号</th>
      <th>操作</th>
    </tr>
	<?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>    
      <td style="width:10%;"><input type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>"/><?php echo ($vo["id"]); ?></td>
      <td style="width:20%;"><?php echo ($vo["title"]); ?></td>
      <td style="width:20%;"><?php echo ($vo["username"]); ?></td>
      <td style="width:20%;"><?php echo ($vo["phone"]); ?></td>
      <td>
      <div class="button-group">
      <a type="button" class="button border-red del_apply_to"  attr-id="<?php echo ($vo["id"]); ?>"href="javascript:void(0)"><span class="icon-edit"></span>删除</a>
      </div>
      </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	<tr>
        <td colspan="8"><div class="pagelist"><?php echo ($page); ?></div></td>
    </tr>
  </table>
</div>
</form>
<script>
$("#checkall").click(function(){ 
	  $("input[name='id[]']").each(function(){
		  if (this.checked) {
			  this.checked = false;
		  }
		  else {
			  this.checked = true;
		  }
	  });
	})
</script>
<script src="/Public/js/newest.js"></script>
</body>
</html>