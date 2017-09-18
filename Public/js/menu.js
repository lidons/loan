/*文章操作*/
/*删除操作*/
$('.del_menu').click(function(){
	var id = $(this).attr('attr-id');
    layer.open({
        type : 0,
        title : '是否提交？',
        btn: ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content: "是否删除此文章？",
        scrollbar: true,
        yes: function(){
            // 执行相关跳转
            var url = "/admin.php/Admin/menu/del_menu";
            var data = {'id':id};
        	$.post(url,data,function(result){
  	          if(result.status == 0) {
  	              return dialog.error(result.message);
  	          }
  	          if(result.status == 1) {
  	              return dialog.success(result.message, '/Admin/menu/index');
  	          }
  	      },'JSON');
        },
    });
});
$('.del_img').click(function(){
	var id = $(this).attr('attr-id');
    layer.open({
        type : 0,
        title : '是否提交？',
        btn: ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content: "是否删除此轮播？",
        scrollbar: true,
        yes: function(){
            // 执行相关跳转
            var url = "/admin.php/Admin/Picture/del_img";
            var data = {'id':id};
        	$.post(url,data,function(result){
  	          if(result.status == 0) {
  	              return dialog.error(result.message);
  	          }
  	          if(result.status == 1) {
  	              return dialog.success(result.message, '/Admin/Picture/index');
  	          }
  	      },'JSON');
        },
    });
});








