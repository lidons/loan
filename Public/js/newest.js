$('.del_newest').click(function(){
	var id = $(this).attr('attr-id');
    layer.open({
        type : 0,
        title : '是否提交？',
        btn: ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content: "是否删除此？",
        scrollbar: true,
        yes: function(){
            // 执行相关跳转
            var url = "/admin.php/Admin/newest/del_newest";
            var data = {'id':id};
        	$.post(url,data,function(result){
  	          if(result.status == 0) {
  	              return dialog.error(result.message);
  	          }
  	          if(result.status == 1) {
  	              return dialog.success(result.message, '/Admin/newest/index');
  	          }
  	      },'JSON');
        },
    });
});
$('.save_newest').click(function(){
	var id  = $(this).attr('attr-id');
	var url = './save_newest?id='+id;
	window.location.href = url;
});
$('.save_card').click(function(){
	var id  = $(this).attr('attr-id');
	var url = './save_tc?id='+id;
	window.location.href = url;
});
$('.save_upmany').click(function(){
	var id  = $(this).attr('attr-id');
	var url = './save_tc?id='+id;
	window.location.href = url;
});
$('.del_apply_to').click(function(){
	var id  = $(this).attr('attr-id');
	layer.open({
        type : 0,
        title : '是否提交？',
        btn: ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content: "是否删除此？",
        scrollbar: true,
        yes: function(){
            // 执行相关跳转
            var url = "/admin.php/Admin/newest/del_apply_to";
            var data = {'id':id};
        	$.post(url,data,function(result){
  	          if(result.status == 0) {
  	              return dialog.error(result.message);
  	          }
  	          if(result.status == 1) {
  	              return dialog.success(result.message, '/Admin/newest/apply');
  	          }
  	      },'JSON');
        },
    });
});
$('.del_card').click(function(){
	var id  = $(this).attr('attr-id');
	layer.open({
        type : 0,
        title : '是否提交？',
        btn: ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content: "是否删除此？",
        scrollbar: true,
        yes: function(){
            // 执行相关跳转
            var url = "/admin.php/Admin/card/del_card_to";
            var data = {'id':id};
        	$.post(url,data,function(result){
  	          if(result.status == 0) {
  	              return dialog.error(result.message);
  	          }
  	          if(result.status == 1) {
  	              return dialog.success(result.message, '/Admin/card/index');
  	          }
  	      },'JSON');
        },
    });
});
$('.del_upmany').click(function(){
	var id  = $(this).attr('attr-id');
	layer.open({
        type : 0,
        title : '是否提交？',
        btn: ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content: "是否删除此？",
        scrollbar: true,
        yes: function(){
            // 执行相关跳转
            var url = "/admin.php/Admin/upmany/del_upmany_to";
            var data = {'id':id};
        	$.post(url,data,function(result){
  	          if(result.status == 0) {
  	              return dialog.error(result.message);
  	          }
  	          if(result.status == 1) {
  	              return dialog.success(result.message, '/Admin/upmany/index');
  	          }
  	      },'JSON');
        },
    });
});
