//rem.js   
(function (doc, win) { 
	var docEl = doc.documentElement, 
	resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize', 
	recalc = function () { 
		var clientWidth = docEl.clientWidth; 
		if (!clientWidth) return; 
		if(clientWidth>=750){ 
			docEl.style.fontSize = '100px'; 
		}else{ 
			docEl.style.fontSize = 100 * (clientWidth / 750) + 'px'; 
		} 
	}; 

	if (!doc.addEventListener) return; 
		win.addEventListener(resizeEvt, recalc, false); 
		doc.addEventListener('DOMContentLoaded', recalc, false); 
})(document, window);
//渠道
var _paq = _paq || [];
  // tracker methods like "setCustomDimension" should be called before "trackPageView"
_paq.push(['trackPageView']);
_paq.push(['enableLinkTracking']);
(function() {
	var u="//piwik.crfchina.com/piwik/";
	_paq.push(['setTrackerUrl', u+'piwik.php']);
	_paq.push(['setSiteId', '3']);
	var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
	g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
})();

$(function(){

	//销售工号+代理工号
	var inviteSalesmanNo = GetString("salesmanNo");
	var inviteAgentNo = GetString("agentNo");
	//推广来源
	var inviteSource = GetString("source")||GetString("s")||'imm3';
	var inviteChannel = GetString("c");
	var visitId;	//请求编号
	var xieyi=document.location.protocol;//http协议
	var yuming=document.location.host;//端口
	var u=xieyi+'//'+yuming;//路径
	var referrerVal=crfReferrer();
	var codeType;  //验证码类型
	var ifGetCode;  //是否获取验证码
	var canCode;
	var zhuolu;
	//着陆信息
	var param_source = {
		source:inviteSource,
		marketChannel:inviteChannel,
		salesmanNo:inviteSalesmanNo,
		agentNo:inviteAgentNo,
		referer:referrerVal
	}; 
	$.ajax({
        url:u+'/promotion/invite/',
		type:'put',
		data:JSON.stringify(param_source), 
		//dataType:'json',
		async:false,
		cache: false,
		contentType: "application/json;charset=UTF-8",
		success:function(data){
			visitId=data.visitId;
			zhuolu = true;
		},
		error:function(xhr){
			if(xhr.status==400){
				if(JSON.parse(xhr.responseText).code==1000){
					showPoint(JSON.parse(xhr.responseText).message);
				}
				else{
				window.location.href='false.html';
				}
			}else{
				window.location.href='false.html';
			}
		}
   	});

	function crfReferrer() {
        var ref = "";
        try {
            ref = window.top.document.referrer
        } catch (ac) {
            if (window.parent) {
                try {
                    ref = window.parent.document.referrer
                } catch (ab) {
                    ref = ""
                }
            }
        }
        if (ref === "") {
            ref = document.referrer
        }
        return ref
    }
	
	if(inviteSalesmanNo==null){
		if(inviteAgentNo!=null){
			$(".myName").html(inviteAgentNo);
		}
	}else {
		$(".myJob").html(inviteSalesmanNo);
		if(inviteAgentNo!=null){
			$(".myName").html(inviteAgentNo);
		}
	}	
	
    $(".close_img").click(function(){
    	closeImg();
    });
    $(".change_img").click(function(){
    	updateImg();
    });
    $(".btn_pic").click(function(){
    	var j_ver=$(".ver_pic").val();
    	if(!j_ver){
    		$(".errMsg1").show();
    		$(".errMsg2").hide();
    		return;
    	}
    	getCode();
    });
	// 获取验证码
	$(".btn_verification").bind("click",function(){codeType=0;getCode("0")});
	$(".btn_voice").bind("click",function(){codeType=1;getCode("1")});
	function getCode(type){
		codeType=type||codeType;
		var telValue=$(".phone").val();
		var passValue = $(".password").val();
		var checkTel=checkPhone(telValue);
		var checkPass=checkWord(passValue);
		if(!telValue) { 
			showPoint("请输入手机号");
		    return; 
		}
		if(!passValue) { 
			showPoint("请输入密码");
		    return; 
		}
		if(!checkTel){
			return;
		}
		if(!checkPass){
			return;
		}
		if(!zhuolu){
			showPoint("请刷新当前页面");
			return;
		}
		
		
		var sendFlag;
		var picCode=$(".ver_pic").val();
		var param_getsms = {
			phone:telValue,
			source:inviteSource,
			marketChannel:inviteChannel,
			visitId:visitId,
			picCode:picCode||null,
			type:codeType||0
		}
		$.ajax({
	        url:u+'/promotion/invite/'+visitId+'/sms',
	        type:'put',
	        data:JSON.stringify(param_getsms), 
	        //dataType:'json',
	        async:false,
	        cache: false,
	        contentType: "application/json;charset=UTF-8",
	        success:function(data){
	        	if(data.code!=1){
	        		showPoint(data.msg);
	        	}else{
	        		sendFlag=true;
	        		$(".mask_shade").hide();
                    $(".mask_box").hide();
	        	}
	        },
	        error:function(err){
	        	//console.log(err);
	        	switch (err.status){
                    case 400:
                        if(JSON.parse(err.responseText).code=="1004"){//图形验证码
                            $(".now_img").attr("src","/promotion/invite/identifying_code/pic/"+telValue+".png?"+ new Date().getTime());
                            showImg();
                        }else if(JSON.parse(err.responseText).code=="1005"){
                        	// 图片验证码不正确
                        	$(".errMsg2").show(); 
                        	$(".errMsg1").hide(); 
                        }else{
                            showPoint(JSON.parse(err.responseText).message);
                        }
                        break;
                    default:
                        showPoint(err.responseText&&err.responseText.message||"发送失败！");
                }
                sendFlag=false;
	        }
	    });
			
		if(sendFlag){
			ifGetCode=true;
			$(".btn_verification").addClass("wait_time").html("剩余(60s)");
			$(".btn_voice").addClass("wait_voice");
			if(codeType==1){
				showPoint("验证电话即将拨出，请注意接听！");
			}
		    // 倒计时
			var allTime=59;
			var timer=setInterval(function(){
				$(".btn_verification").html('剩余('+allTime+'s)');
				$(".btn_verification").unbind("click");
				$(".btn_voice").unbind("click");
				if(allTime<=0){
					clearInterval(timer);
					$(".btn_verification").removeClass("wait_time");
					$(".btn_verification").html("重新获取");
					$(".btn_verification").bind("click",function(){getCode("0")});
					$(".btn_voice").removeClass("wait_voice");
					$(".btn_voice").bind("click",function(){getCode("1")});
					$(".voice_show").show();
				}
				allTime--;
			},1000);
		}
	}
	
	//校验验证码
	$(".verification").blur(function(){
		
		var telValue=$(".phone").val();
		var passValue = $(".password").val();
		var codeInput1=$(".verification").val();
		var smsCode=$.trim(codeInput1);

		if(!telValue){
	    	blurPoint('请输入手机号');
        	return;
	    }
		if(!passValue){
	    	blurPoint('请输入密码');
        	return;
	    }
		var checkTel=checkPhone(telValue);
		if(!checkTel){
			return;
		}
		var checkPass=checkWord(passValue);
		if(!checkPass){
			return;
		}
    	if(!smsCode){
    		blurPoint('请输入验证码');
        	return;
	    }
	    if(!ifGetCode){
	    	blurPoint('请获取验证码');
        	return;
	    }
   		var param ={ 
	            phone:telValue,
				source:inviteSource,
				marketChannel:inviteChannel,
				visitId:visitId,
				verificatioCode:smsCode
	        }

   		//校验验证码
		$.ajax({
	        url:u+'/promotion/invite/'+visitId+'/sms',
	        data:JSON.stringify(param), 
	        type:'post',
	        //dataType:'json',
	        async:false,
	        cache: false,
	        contentType: "application/json;charset=UTF-8",
	        success:function(data){
				//console.log(data); 
				if(data.code==1){	
					canCode=true;
				}else{
					canCode=false;
					blurPoint(data.msg);
		        }
	        },
	        error:function(xhr){
	        	canCode=false;
	        	blurPoint(JSON.parse(xhr.responseText).errorMessage);
	        }
	    });
	});
	// 提交
	$(".btn_next").click(function(){
		var telValue=$(".phone").val();
		var passValue = $(".password").val();
		var codeInput1=$(".verification").val();
		var smsCode=$.trim(codeInput1);
		var coustomerName=null;
		var idNo=null;
		 
		if(!telValue){
	    	showPoint('请输入手机号');
        	return;
	    }
		if(!passValue){
	    	showPoint('请输入密码');
        	return;
	    }
		var checkTel=checkPhone(telValue);
		if(!checkTel){
			return;
		}
		var checkPass=checkWord(passValue);
		if(!checkPass){
			return;
		}
    	if(!smsCode){
    		showPoint('请输入验证码');
        	return;
	    }
	    if(!ifGetCode){
	    	showPoint('请获取验证码');
        	return;
	    }
	    if(!canCode){
	    	showPoint("请输入正确的验证码");
	    	return;
	    }
   		var regFirm;
   		if($(".choose").is(':checked')==true){
   			regFirm=1;
   		}else{
   			regFirm=0;
   			showPoint("请选择协议");
   			return;
   		}
    	var param_coustmer ={
	    	phone:telValue,
	    	code:smsCode,
	    	pass:passValue,
	    	idNo:idNo,
	    	coustomerName:coustomerName,
	    	registAgreement:regFirm
	    }
    	$(".btn_next").attr({"disabled":"disabled"});
    	
		$.ajax({
			url:u+'/promotion/invite/'+visitId+'/register',
			data:JSON.stringify(param_coustmer),
			type:'post',
			//dataType:'json',
			async:false,
	        cache: false,
		    contentType: "application/json;charset=UTF-8",
			success:function(data){
				
				if(data.status==3){
		        	window.location.href ="white.html";
		        	return;
		    	}else if(data.status==4){
		    		window.location.href ="black.html";
		    		return;
		    	}else if(data.status==12){
		    		localStorage.setItem('phone', telValue);
		    		window.location.href ="success.html";
		    		return;
		    	}else if(data.status==10){
		    		window.location.href ="Registered.html";
		    		return;
		    	}else{
		    		showPoint("注册失败，请重新尝试注册!");
		    		return;
		    	}
		    	$(".btn_next").removeAttr("disabled");
	        },
			error:function(xhr){
	        	if(xhr.status==400){
	        		showPoint(JSON.parse(xhr.responseText).message);
		    	}else if(xhr.status==500){
		    		showPoint(JSON.parse(xhr.responseText).message);
		        }else{
		        	showPoint(JSON.parse(xhr.responseText).errorMessage);
		        }
		    	$(".btn_next").removeAttr("disabled");
			}
		});
	});

	//	点击改变复选框的状态
	$(".btn_check :checkbox").on("change", function() {
		if($(".choose").prop("checked") == true) {
			$('.check').show();
			$('.discheck').hide();
		} else {
			$('.check').hide();
			$('.discheck').show();
		}
	})
	
});

// 手机号格式验证
function checkPhone(tel){
	var myreg = /^1\d{10}$/; 
	if(!myreg.test(tel)) { 
    	showPoint('请输入正确的手机号码');
	    return false; 
	}
	return true;
	
}
//密码验证
function checkWord(password){
	var myreg = /^(?![A-Z]+$)(?![a-z]+$)(?!\d+$)[a-zA-Z0-9]{6,12}$/;
	if(!myreg.test(password)) { 
    	showPoint('密码格式不正确');
	    return false; 
	}
	return true;
	
}


//获取链接参数
function GetString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) {
    	return r[2];
    } 
    return null;
}

//错误框提示
function showPoint(wrong){
	$(".toast").html(wrong);
    $(".shade,.toast").show();
	setTimeout(function(){
		$(".shade,.toast").hide();
	},2000);
}

//blur错误框提示
function blurPoint(wrong){
	$(".toast").html(wrong).show();
	setTimeout(function(){
		$(".toast").hide();
	},2000);
}

// 更换图片验证码
function updateImg(){
	$(".ver_pic").val("");
//  $(".tip_pic").html("");
    $(".now_img").attr("src","/promotion/invite/identifying_code/pic/"+$(".phone").val()+".png?"+ new Date().getTime());
}

// 显示图片弹出框
function showImg(){
	$(".ver_pic").val("");
//  $(".tip_pic").html("");
	$(".mask_shade").show();
    $(".mask_box").show();
}

// 关闭图片弹出框
function closeImg(){
	$(".ver_pic").val("");
//  $(".tip_pic").html("");
	$(".mask_shade").hide();
    $(".mask_box").hide();
}