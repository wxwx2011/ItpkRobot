<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=2.0" />
<title>登录网站</title>
<link rel="stylesheet" href="http://apps.bdimg.com/libs/fontawesome/4.4.0/css/font-awesome.min.css" />
<style type="text/css">
:-moz-placeholder {color:#fee;}::-moz-placeholder {color:#fee;}input:-ms-input-placeholder,textarea:-ms-input-placeholder {color:#fee;}input::-webkit-input-placeholder, textarea::-webkit-input-placeholder {color:#fee;}
input:-webkit-autofill,input:-webkit-autofill:hover,input:-webkit-autofill:focus {box-shadow:0 0 0 60px rgba(255,255,255,0.1) inset;-webkit-text-fill-color:#ffd;}
* {margin:0px;padding:0px;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;}
*:focus {outline:none;}
input, a {-webkit-transition: all 0.2s;-moz-transition: all 0.2s;-ms-transition: all 0.2s;-o-transition: all 0.2s;transition: all 0.2s;/* -webkit-animation-fill-mode:forwards;animation-fill-mode:forwards; */}
html, body {position:relative;height:100%;font-family:"helvetica neue",arial,sans-serif;font-size:14px;background-image:url(./template/default/img/bg.jpg);overflow:hidden;}
#mainBox {position:relative;display:none;padding:20px;width:400px;height:400px;text-align:center;background:rgba(0,0,0,0.02);color:#fff;border-radius:50%;box-shadow:-50px 50px 150px rgba(255,255,255,0.9) inset;-moz-user-select:none;-khtml-user-select:none;user-select:none;}
#mainBox form {margin-top:100px;text-align:left;}
#mainBox ul {list-style:none;}
#mainBox ul li {margin-bottom:25px;text-align:center;}
#mainBox ul li h4 {text-align:center;font-size:25px;text-shadow:0 0 4px rgba(0,0,0,0.5);color:#fff;}
#mainBox ul li input[type='text'], #mainBox ul li input[type='password'] {text-align:center;border:none;border-bottom:1px dashed #fdf;background:transparent;color:#fdf;padding:8px 0px;width:260px;font-size:14px;}
#mainBox ul li input[type='button'] {cursor:pointer;border:1px solid #fdd;background:rgba(255,200,255,0.1);color:#fdf;padding:6px 30px;border-radius:4px;font-size:16px;}
#mainBox ul li input[type='button']:hover {background:rgba(255,200,255,0.2);}
</style>
</head>
<body>
<div id="mainBox" unselectable="on" onselectstart="return false;">
	<form autocomplete="off" action="" method="post">
		<ul>
			<li><h4>登录网站</h4></li>
			<li><input type="text" id="login_name" placeholder="登录邮箱" /></li>
			<li><input type="password" id="login_pass" placeholder="登录密码" /></li>
			<li>
				<input type="button" value="登录" onclick="checkLoginForm()" />
				<label>
					<input type="checkbox" checked="checked" id="reuser" name="remember" value="1" />记住我
				</label>
			</li>
		</ul>
	</form>
</div>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
var slider_timer = null;
var slider_inter = 2000;
var win_width = 0;
var win_height = 0;
var init_top = 0;
var init_left = 0;

$(function() {
	win_height = parseInt($(window).height());
	win_width = parseInt($(window).width());
	init_top = parseInt(win_height / 2 - 200);
	init_left = parseInt(win_width / 2 - 200);
	$("#mainBox").css({ left:init_left+'px', top:init_top+'px', display:'block' });
	$("#mainBox").delay(3000).fadeOut(2000, function() {
		$("#mainBox").fadeIn(2000, function() {
			if (slider_timer == null) {
				slider_timer = setInterval(mainAnimate, slider_inter);
			}
		});
	});
});

function mainAnimate() {
	var rand = (parseInt(Math.random()*4) + 7) / 10;
	var position = $("#mainBox").position();
	var left = parseInt(position.left);
	var top = parseInt(position.top);
	var topOffset = ((top <= init_top) ? (top+50) : (top-50)) + "px";
	$("#mainBox").animate({
		top: topOffset,
		opacity: rand
	}, 2000);
}

function checkLoginForm() {
	var isCheck = true;
	var login_name = checkEmpty($("#login_name").val());
	var login_pass = checkEmpty($("#login_pass").val());
	if (login_name == "") {
		$("#errorMsg").html("请输入邮箱");
		$("#login_name").focus();
		isCheck = false;
	} else if (login_pass == "") {
		$("#errorMsg").html("请输入密码");
		$("#login_pass").focus();
		isCheck = false;
	} else if (!checkMail(login_name)) {
		$("#errorMsg").html("邮箱格式错误");
		$("#login_name").focus();
		isCheck = false;
	}
	if (!isCheck) {
		$("#errorMsg").animate( {top:'59px'}, 300 );
		return false;
	}
	$("#errorMsg").animate( {top:'0px'}, 100 );

	var dataPara = "mod=index&action=login&login_name=" + login_name + "&login_pass=" + login_pass;
	if ($("#reuser").is(":checked")) dataPara += "&remember=true";
	$.ajax({
		type: "POST",
		url: "index.php",
		data: dataPara,
		dataType: "json",
		success: function(reply) {
			if (reply.result == 0) {
				$("#errorMsg").html("已经登录");
			} else if (reply.result == 1) {
				$("#errorMsg").html("登录成功");
				window.location.href = "index.php";
			} else if (reply.result == 2) {
				$("#errorMsg").html("邮箱格式错误");
			} else if (reply.result == 8) {
				$("#errorMsg").html("填写不完整");
			} else if (reply.result == 9) {
				$("#errorMsg").html("邮箱或密码错误");
			} else {
				$("#errorMsg").html("系统忙");
			}
			$("#errorMsg").animate( {top:'59px'}, 300 );
		}
	});
}

function checkMail(mail) {
	var mailPattern = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
	return mailPattern.test(mail);
}

function checkEmpty(param) {
	return param.replace(/[ ]/g, "");
}
</script>
</body>
</html>