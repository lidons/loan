var login = {
	check:function(){
		var username = $("#username").val();
		var password = $("#password").val();
		if(!username){
			dialog.error('用户名不能为空');
			return false;
		}
		if(!password){
			dialog.error('密码不能为空');
			return false;
		}
		var data = {'username':username,'password':password}
		var url  = '/admin.php/Admin/login/register';
		 $.post(url,data,function(result){
	          if(result.status == 0) {
	              return dialog.error(result.message);
	          }
	          if(result.status == 1) {
	              return dialog.success(result.message,'/admin.php/Admin/Login/add_admin');
	          }
	      },'JSON');
	}
}