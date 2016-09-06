<?php 

/**
 * 公共头部文件
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="茉莉QQ机器人，专业提供QQ机器人/QQ群机器人服务的网站。" />
<meta name="keywords" content="机器人,网页机器人,QQ机器人,QQ群机器人,离线机器人,PHP机器人" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=2.0" />
<title>茉莉机器人</title>
<link rel="stylesheet" href="http://apps.bdimg.com/libs/fontawesome/4.4.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="./template/default/css/style1.css" type="text/css" media="all" />
</head>

<body>
<div id="header">
	<div class="container">
		<div class="logo"><a href="index.php"><img src="./template/default/img/logo2.png" /></a></div>
		<ul id="navbar">
			<li><a href="index.php"><i class="fa fa-home fa-fw"></i>首页</a></li>
			<li>
				<a href="robot.php">机器人 <i class="xz fa fa-angle-down fa-fw"></i></a>
				<ul class="sub-menu">
					<li><a href="robot.php?mod=list"><i class="i_left fa fa-tag fa-fw"></i>机器人列表</a></li>
					<li><a href="robot.php?mod=add"><i class="i_left fa fa-tag fa-fw"></i>添加机器人</a></li>
					<li><a href="javascript:void(0)"><i class="i_left fa fa-tag fa-fw"></i>使用教程</a></li>
				</ul>
			</li>
			<li>
				<a href="javascript:void(0)">插件中心 <i class="xz fa fa-angle-down fa-fw"></i></a>
				<ul class="sub-menu">
					<li><a href="javascript:void(0)"><i class="i_left fa fa-tag fa-fw"></i>我的插件</a></li>
					<li><a href="javascript:void(0)"><i class="i_left fa fa-tag fa-fw"></i>插件大全</a></li>
					<li>
						<a href="javascript:void(0)"><i class="i_left fa fa-tag fa-fw"></i>安装插件 <i class="fa fa-angle-right fa-fw"></i></a>
						<ul class="sub-menu sub-menu-inside">
							<li><a href="javascript:void(0)"><i class="i_left fa fa-tag fa-fw"></i>文件夹安装</a></li>
							<li>
								<a href="javascript:void(0)"><i class="i_left fa fa-tag fa-fw"></i>压缩包安装 <i class="fa fa-angle-right fa-fw"></i></a>
								<ul class="sub-menu sub-menu-inside">
									<li><a href="javascript:void(0)"><i class="i_left fa fa-tag fa-fw"></i>ZIP压缩包</a></li>
									<li><a href="javascript:void(0)"><i class="i_left fa fa-tag fa-fw"></i>RAR压缩包</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a href="javascript:void(0)"><i class="i_left fa fa-tag fa-fw"></i>卸载插件</a></li>
					<li>
						<a href="javascript:void(0)"><i class="i_left fa fa-tag fa-fw"></i>定制插件 <i class="fa fa-angle-right fa-fw"></i></a>
						<ul class="sub-menu sub-menu-inside">
							<li><a href="javascript:void(0)"><i class="i_left fa fa-tag fa-fw"></i>定制说明</a></li>
							<li><a href="javascript:void(0)"><i class="i_left fa fa-tag fa-fw"></i>定制案例</a></li>
							<li><a href="javascript:void(0)"><i class="i_left fa fa-tag fa-fw"></i>提交定制</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li><a href="javascript:void(0)">兑换中心</a></li>
			<li><a href="chat.php">聊天室</a></li>
			<li>
				<a href="javascript:void(0)">关于我们 <i class="xz fa fa-angle-down fa-fw"></i></a>
				<ul class="sub-menu">
					<li><a href="javascript:void(0)"><i class="i_left fa fa-weibo fa-fw"></i>新浪微博</a></li>
					<li><a href="javascript:void(0)"><i class="i_left fa fa-pinterest fa-fw"></i>腾讯微博</a></li>
					<li><a href="javascript:void(0)"><i class="i_left fa fa-qrcode fa-fw"></i>微信公众号</a></li>
					<li><a href="javascript:void(0)"><i class="i_left fa fa-rss fa-fw"></i>RSS订阅</a></li>
				</ul>
			</li>
		</ul>
		<div class="login-set">
			<?php if (LOGIN_STATUS != UserLoginUtil::SUCCESS) { ?>
			<a href="javascript:void(0)" onclick="loginOrReg(0)"><i class="fa fa-user fa-fw"></i>登录</a>
			<a href="javascript:void(0)" onclick="loginOrReg(1)"><i class="fa fa-registered fa-fw"></i>注册</a>
			<?php } else { ?>
			<div class="console_sub">
				<a href="profile.php"><?php echo USER_NAME; ?><i class="fa fa-chevron-circle-down fa-fw"></i></a></li>
				<ul class="console_nav">
					<li><a href="javascript:void(0)">修改资料</a></li>
					<li><a href="javascript:void(0)">提交工单</a></li>
					<li><a href="javascript:void(0)">我的消息</a></li>
					<li><a href="javascript:void(0)">管理中心</a></li>
					<li><a href="index.php?action=logout">退出登录</a></li>
				</ul>
			</div>
			<?php } ?>
		</div>
	</div>
</div>