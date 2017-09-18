$("#add_wechar_menu").click(function(){
	var url = SCOPE.add_url;
	window.location.href=url;
});
$('#type').change(function(){
	var status = $('#type').find("option:selected").val();
	console.log(status);
	if(status == 'none'){
		$('#chenage_status').css('display','none');
	}
	if(status == 'view'){
		$('#chenage_status').css('display','block');
		$('#change_event').text('url');
	}
	if(status == 'click'){
		$('#chenage_status').css('display','block');
		$('#change_event').text('点击事件');
	}
});
$("#put_id_menu").click(function(){
	var status = $('#status').find("option:selected").val();
	var name = $('#name').val();
	var wx_type = $('#type').find("option:selected").val();
	var menu_change = $('input[name="menu_change"]').val();
	console.log(status+','+name+','+wx_type+','+menu_change);
	var url = '/Admin/Wechat/append_menu';
	var data = {'name':name,'wx_type':wx_type,'menu_change':menu_change,'status':status};
	$.post(url,data,function(result){
          if(result.status == 0) {
              return dialog.error(result.message);
          }
          if(result.status == 1) {
              return dialog.success(result.message, '/Admin/Wechat/addmenu');
          }
      },'JSON');
});
$(".del_wxmenu_do").click(function(){
	var id = $(this).attr('attr-id');
	 layer.open({
	        type : 0,
	        title : '是否提交？',
	        btn: ['yes', 'no'],
	        icon : 3,
	        closeBtn : 2,
	        content: "是否删除此组？",
	        scrollbar: true,
	        yes: function(){
	            // 执行相关跳转
	            var url = "/admin.php/Admin/Wechat/del_wxmenu";
	            var data = {'id':id};
	        	$.post(url,data,function(result){
	  	          if(result.status == 0) {
	  	              return dialog.error(result.message);
	  	          }
	  	          if(result.status == 1) {
	  	              return dialog.success(result.message, '/Admin/wechat/addmenu');
	  	          }
	  	      },'JSON');
	        },
	    });
});
$(".del_one_wxmenu").click(function(){
	var id = $(this).attr('attr-id');
	 layer.open({
	        type : 0,
	        title : '是否提交？',
	        btn: ['yes', 'no'],
	        icon : 3,
	        closeBtn : 2,
	        content: "是否删除此栏目？",
	        scrollbar: true,
	        yes: function(){
	            // 执行相关跳转
	            var url = "/admin.php/Admin/Wechat/del_one_wxmenu";
	            var data = {'id':id};
	        	$.post(url,data,function(result){
	  	          if(result.status == 0) {
	  	              return dialog.error(result.message);
	  	          }
	  	          if(result.status == 1) {
	  	              return dialog.success(result.message, '/Admin/wechat/addmenu');
	  	          }
	  	      },'JSON');
	        },
	    });
});
$('#create_wxmenu').click(function(){
	var url = '/Admin/wechat/createMenu';
	window.location.href = url;
});
$('.saveWxmenudo').click(function(){
	var id = $(this).attr('attr-id');
	var url = '/Admin/Wechat/saveMenu?id='+id;
	window.location.href=url;
})
$('.save_one_wxmenu').click(function(){
	var id  = $(this).attr('attr-id');
	var url = '/Admin/Wechat/saveonemenu?id='+id;
	window.location.href = url;
})
$('#save_one_wxmenu').click(function(){
	var status = $('#status').find("option:selected").val();
	var name = $('#name').val();
	var wx_type = $('#type').find("option:selected").val();
	var menu_change = $('input[name="menu_change"]').val();
	var id = $('input[name="id"]').val();
	console.log(status+','+name+','+wx_type+','+menu_change);
	var url = '/Admin/Wechat/save_wxmenu_main';
	var data = {'name':name,
			    'wx_type':wx_type,
			    'menu_change':menu_change,
			    'status':status,
			    'id':id
			    };
	$.post(url,data,function(result){
          if(result.status == 0) {
              return dialog.error(result.message);
          }
          if(result.status == 1) {
              return dialog.success(result.message, '/Admin/Wechat/addmenu');
          }
      },'JSON');
});

$('#modify_wxmenu').click(function(){
	var status = $('#status').find("option:selected").val();
	var name = $('#name').val();
	var wx_type = $('#type').find("option:selected").val();
	var menu_change = $('input[name="menu_change"]').val();
	var id = $('input[name="id"]').val();
	console.log(status+','+name+','+wx_type+','+menu_change);
	var url = '/Admin/Wechat/modify_wxmenu';
	var data = {'name':name,
			    'wx_type':wx_type,
			    'menu_change':menu_change,
			    'status':status,
			    'id':id
			    };
	$.post(url,data,function(result){
          if(result.status == 0) {
              return dialog.error(result.message);
          }
          if(result.status == 1) {
              return dialog.success(result.message, '/Admin/Wechat/addmenu');
          }
      },'JSON');
});

