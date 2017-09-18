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
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 基本配置</strong></div>
  <div class="body-content  form-x">
    <?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="form-group">
        <div class="label">
          <label>微信名</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="mchid" value="<?php echo ($vo["wxnickname"]); ?>"  disabled name="username"/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>可提现金额：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="money"  id="money" value="<?php echo ($vo["money"]); ?>"  />
          <div class="tips"></div>
        </div>
      </div>
      <input type="hidden" id="id" name="id" value="<?php echo ($vo["id"]); ?>"/>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" onclick="common.submit()" type="submit">提交</button>
        </div>
     </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
  </div>
</div>
</body>
</html>