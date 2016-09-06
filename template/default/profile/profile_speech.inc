<?php if (!defined('ITPK')) exit('You can not directly access the file.');

global $user;
?>

<div class="info">
	<div class="container">
		<div class="info_nav">
			<a href="index.php"><i class="fa fa-home fa-frn"></i></a><i class="fa fa-angle-right fa-fc"></i><a href="profile.php"><?php echo $user['nickname']; ?></a><i class="fa fa-angle-right fa-fc"></i>个人中心
		</div>
		<div class="info_main">
			<?php require_once TEMPLATE_FOLDER . "profile/profile_nav.inc"; ?>
			<table class="info_table" border="0" cellpadding="0" cellspacing="0">
				<tr class="tr_none_border">
					<th>温馨提示：</th>
					<td>
						正在开发中...
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>