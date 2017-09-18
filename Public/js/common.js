var common = {
	submit:function(){
		  var money = $("#money").val();
		  var id = $('#id').val();
		  url = '/admin.php/Admin/Yy/addmoney_do';
		  data = {'id':id,'money':money}
		  $.post(url,data,function(result){
	          if(result.status == 0) {
	              return dialog.error(result.message);
	          }
	          if(result.status == 1) {
	              return dialog.success(result.message, '/Admin/Yy/index');
	          }
	      },'JSON');
	},
}
