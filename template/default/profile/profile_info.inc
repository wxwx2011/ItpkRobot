<?php if (!defined('ITPK')) exit('You can not directly access the file.');

global $user;
global $user_role

?>

<div class="info">
	<div class="container">
		<div class="info_nav">
			<a href="index.php"><i class="fa fa-home fa-frn"></i></a><i class="fa fa-angle-right fa-fc"></i><a href="profile.php"><?php echo $user['nickname']; ?></a><i class="fa fa-angle-right fa-fc"></i>个人中心
		</div>
		<div class="info_main">
			<?php require_once TEMPLATE_FOLDER . "profile/profile_nav.inc"; ?>
			<table class="info_table" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<th>用户头像：</th>
					<td>
						<img src="./template/default/img/photo.png" />
					</td>
				</tr>
				<tr>
					<th>用户ID：</th>
					<td><?php echo $user[User::ID]; ?></td>
				</tr>
				<tr>
					<th>用户名：</th>
					<td><?php echo $user[User::NICKNAME]; ?></td>
				</tr>
				<tr>
					<th>用户组：</th>
					<td><?php echo $user_role[Role::NAME]; ?></td>
				</tr>
				<tr>
					<th>金币：</th>
					<td><?php echo $user[User::GOLD]; ?></td>
				</tr>
				<tr>
					<th>邮箱：</th>
					<td><?php echo $user[User::MAIL]; ?></td>
				</tr>
				<tr>
					<th>手机号：</th>
					<td><?php echo $user[User::PHONE]; ?></td>
				</tr>
				<tr>
					<th>QQ：</th>
					<td><?php echo $user[User::QQ]; ?></td>
				</tr>
				<tr>
					<th>邀请码：</th>
					<td><?php echo $user[User::INVITATION]; ?></td>
				</tr>
				<tr>
					<th>注册IP：</th>
					<td><?php echo $user[User::REG_IP]; ?></td>
				</tr>
				<tr>
					<th>注册时间：</th>
					<td><?php echo date('Y-m-d H:i:s', $user[User::CREATEDATE]); ?></td>
				</tr>
				<tr class="tr_none_border">
					<th>退出登录：</th>
					<td><a href="index.php?action=logout">注销</a></td>
				</tr>
			</table>
		</div>
	</div>
</div>