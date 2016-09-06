var slider_index = 0;
var slider_limit = 5;
var slider_timer = null;
var slider_inter = 5000;
$(function () { 
	$(window).scroll(function () { 
		var scrollTop = $(window).scrollTop();
		if (scrollTop >= 100) { 
			$("#footer_scroll").fadeIn(500); 
		} else { 
			$("#footer_scroll").fadeOut(500); 
		}
	});

	$("#message-loading").hide(4000);

	$(".slider_nav i:first").addClass("action");
	$("#slider .slider_a_all").hide();
	$("#slider .slider_a_all:first").show();

	if (slider_timer == null) {
		slider_timer = setInterval(sliderChange, slider_inter);
	}

	$(".slider_nav i").click(function() {
		var index = $(this).attr("id").split("i")[1];
		slider_index = index;
		$(".slider_nav i").removeClass("action");
		$(this).addClass("action");
		$("#slider .slider_a_all").hide();
		$("#slider .slider_a_all .slider_title").hide();
		$("#slider .slider_a_all .slider_memo").hide();
		$("#slider .slider_a_" + index).show();
		$("#slider .slider_a_" + index + " .slider_title").show(300);
		$("#slider .slider_a_" + index + " .slider_memo").show(300);
	});

//	$(".addReplyCode img").attr("oldsrc", function() {return $(this).attr("src")}).attr("src", "about:blank");

	$(".closeLabel").click(function() {
		$(".chat_tools").fadeOut(200);
	});

	$("#slider .slider_a_all").hover(function() {
		clearInterval(slider_timer)
	},function() {
		slider_timer = setInterval(sliderChange, slider_inter);
	});

	navbar();
	giveNewTitle();
	//giveCodeLabel();
	giveReplyCode();

	$("#iframeBox").draggable({ handle:".iframe_head", cursor:"move" });
});

$(document).keyup(function(event){
	switch(event.keyCode) {
		case 27:
			closeWindow();
			break;
		default:
			break;
	}
});

$('body').keypress(function(e) {
	if(e.ctrlKey && (e.which == 13 || e.which == 10)) {
		$(".ctrlSubmit").parent().submit();
	}
});

function scrollTop() {
	jQuery('html,body').animate({scrollTop:0}, 300);
}

function scrollFot() {
	jQuery('html,body').animate({scrollTop:$(document).height()}, 300);
}

function navbar() {
	var url = document.URL;
	var a1 = url;
	if (url.indexOf("#") > -1) {
		var urls = url.split("#");
		a1 = urls[0];
	}
	if (url.indexOf("?") > -1) {
		var urls = url.split("?");
		a1 = urls[0];
	}
	var a2 = $("#navbar > li > a");
	var is_find = false;
	for (var i = 0; i < a2.length; i++) {
		if (a1 == a2[i]) {
			$(a2[i]).addClass("nav_on");
			is_find = true;
			return;
		}
	}
	if (!is_find) {
		$(a2[0]).addClass("nav_on");
	}
}

function giveNewTitle() {
	$(".itpk_title_container").hover(function() {
		var title = $(this).attr("itpk_title");
		if (typeof(title) != "undefined" && $.trim(title) != "") {
			$(this).append("<div class=\"itpk_title\">" + $.trim(title) + "</div>");
			var containerWeight = (($(this).outerWidth() - $(".itpk_title").outerWidth()) / 2) + "px";
			$(".itpk_title").css({ top:"-33px", left:containerWeight });
		}
	}, function() {
		var title = $(this).attr("itpk_title");
		if (typeof(title) != "undefined" && $.trim(title) != "") {
			$(this).find(".itpk_title").remove();
		}
	});
}

function giveCodeLabel() {
	$(".main_container h4 label").click(function() {
		var label_class = $(this).attr('class');
		if (label_class == "icon_code_label") {
			$(".chat_tools").not("#iconCode").fadeOut(100);
			$("#iconCode").fadeToggle(100);
		} else if (label_class == "html_code_label") {
			$(".chat_tools").not("#htmlCode").fadeOut(100);
			$("#htmlCode").fadeToggle(100);
		} else if (label_class == "reply_eraser_label") {
			$("#replyText").val("");
		}
		$("#replyText").focus();
	});
}

function giveReplyCode() {
	$(".addReplyCode").click(function() {
		var reply_code = $(this).attr("rcode");
		$("#replyText").val($("#replyText").val()+reply_code);
		$("#replyText").focus();
	});
}

function showFaceBox(folder) {
	if ($("#" + folder + "Box img").first().attr("marksrc") != "") {
		$("#" + folder + "Box img").attr("src", function() {return $(this).attr("marksrc")}).attr("marksrc", "");
	}
	var faceBoxs = $(".faceBox");
	var isLoadInit = true;
	for (var i = 0; i < faceBoxs.length; i++) {
		if ($(".faceBox:eq(" + i + ")").css("display") != "none") {
			isLoadInit = false;
		}
	}
	if (isLoadInit) {
		$("#" + folder + "Box").show();
	}
	$(".chat_tools").not("#iconCode").fadeOut(100);
	$("#iconCode").fadeToggle(100);
	$("#replyText").focus();

	var parentLeft = Math.abs($(".chat_submit:first").offset().left);
	var thisLeft = Math.abs($("#iconCode").position().left);
	if (parentLeft < thisLeft) {
		var nowLeft = "-" + (parentLeft-20) + "px";
		$("#iconCode").css({ "left":nowLeft});
	}
}

function showUbbBox() {
	$(".chat_tools").not("#htmlCode").fadeOut(100);
	$("#htmlCode").fadeToggle(100);
	$("#replyText").focus();

	var parentLeft = Math.abs($(".chat_submit:first").offset().left);
	var thisLeft = Math.abs($("#htmlCode").position().left);
	if (parentLeft < thisLeft) {
		var nowLeft = "-" + (parentLeft-20) + "px";
		$("#htmlCode").css({ "left":nowLeft});
	}
}

function clearReplyText() {
	$("#replyText").val("");
	$("#replyText").focus();
}

function sliderChange() {
	slider_index++;
	if (slider_index >= slider_limit) {
		slider_index = 0;
	}
	$(".slider_nav i").removeClass("action");
	$(".slider_nav i:eq(" + slider_index + ")").addClass("action");
	$("#slider .slider_a_all").hide();
	$("#slider .slider_a_all .slider_title").hide();
	$("#slider .slider_a_all .slider_memo").hide();
	$("#slider .slider_a_" + slider_index).show();
	$("#slider .slider_a_" + slider_index + " .slider_title").show(300);
	$("#slider .slider_a_" + slider_index + " .slider_memo").show(300);
}

function selectFace(folder, btn) {
	if ($("#" + folder + "Box img").first().attr("marksrc") != "") {
		$("#" + folder + "Box img").attr("src", function() {return $(this).attr("marksrc")}).attr("marksrc", "");
	}
	$(".chat_tools .faceBox").not("#" + folder + "Box").hide();
	$("#" + folder + "Box").show();
	$(btn).parent().find("li").removeClass("selectedFace");
	$(btn).addClass("selectedFace");
}

function loginOrReg(typeId) {
	$("#loginOrReg").css("display", "block");
	checkLoginOrReg(typeId);
}

function colseForm() {
	$("#loginOrReg").css("display", "none");
}

function checkLoginOrReg(typeId) {
	$("#errorMsg").animate( {top:'0px'}, 100 );
	if (typeId == 0) {
		$("#login_form").css("display", "block");
		$("#reg_form").css("display", "none");
	} else {
		$("#login_form").css("display", "none");
		$("#reg_form").css("display", "block");
	}
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

function checkRegForm() {
	var isCheck = true;
	var username = checkEmpty($("#username").val());
	var email = checkEmpty($("#email").val());
	var password = checkEmpty($("#password").val());
	if (username == "") {
		$("#errorMsg").html("请输入昵称");
		$("#username").focus();
		isCheck = false;
	} else if (email == "") {
		$("#errorMsg").html("请输入邮箱");
		$("#email").focus();
		isCheck = false;
	} else if (password == "") {
		$("#errorMsg").html("请输入密码");
		$("#password").focus();
		isCheck = false;
	} else if (!checkMail(email)) {
		$("#errorMsg").html("邮箱格式错误");
		$("#email").focus();
		isCheck = false;
	}
	if (!isCheck) {
		$("#errorMsg").animate( {top:'59px'}, 300 );
		return false;
	}
	$("#errorMsg").animate( {top:'0px'}, 100 );

	var dataPara = "mod=index&action=reg&username=" + username + "&email=" + email + "&password=" + password;
	if ($("#remember").is(":checked")) dataPara += "&is_login=true";
	$.ajax({
		type: "POST",
		url: "index.php",
		data: dataPara,
		dataType: "json",
		success: function(reply) {
			if (reply.result == 0) {
				$("#errorMsg").html("已经登录");
			} else if (reply.result == 1) {
				$("#errorMsg").html("注册成功");
				//window.location.href = "profile.php";
			} else if (reply.result == 2) {
				$("#errorMsg").html("邮箱格式错误");
			} else if (reply.result == 3) {
				$("#errorMsg").html("邮箱或昵称以存在");
			} else if (reply.result == 8) {
				$("#errorMsg").html("填写不完整");
			} else if (reply.result == 9) {
				$("#errorMsg").html("注册失败");
			} else {
				$("#errorMsg").html("系统忙");
			}
			$("#errorMsg").animate( {top:'59px'}, 300 );
		}
	});
}

function pageSelect(name, pageno, page_count, page_rows) {
	$("#"+name+"Before").removeClass("cursor_allowed");
	$("#"+name+"After").removeClass("cursor_allowed");
	var faceTab = $("#"+name+"Face tr");
	$(faceTab).hide();
	for (var k = 1; k <= faceTab.length; k++) {
		if (k > page_rows * (pageno - 1) && k <= page_rows * pageno) {
			$(faceTab).eq(k-1).show();
		}
	}
	$("#"+name+"Before").attr("onclick", "pageSelect('" + name + "'," + (pageno-1) + "," + page_count + "," + page_rows + ");");
	$("#"+name+"After").attr("onclick", "pageSelect('" + name + "'," + (pageno+1) + "," + page_count + "," + page_rows + ");");
	if (pageno <= 1) {
		$("#"+name+"Before").removeAttr("onclick");
		$("#"+name+"Before").addClass("cursor_allowed");
	} 
	if (pageno >= page_count) {
		$("#"+name+"After").removeAttr("onclick");
		$("#"+name+"After").addClass("cursor_allowed");
	}
}

function checkMail(mail) {
	var mailPattern = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
	return mailPattern.test(mail);
}

function checkEmpty(param) {
	return param.replace(/[ ]/g, "");
}