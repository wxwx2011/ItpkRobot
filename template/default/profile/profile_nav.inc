<?php if (!defined('ITPK')) exit('You can not directly access the file.');

global $mod;

?>

<ul class="info_sub">
	<li>
		<a href="profile.php?mod=info" <?php echo $mod == "info" ? "class=\"select_sub\"" : ""; ?>>基本资料</a>
	</li>
	<li>
		<a href="profile.php?mod=setup" <?php echo $mod == "setup" ? "class=\"select_sub\"" : ""; ?>>修改资料</a>
	</li>
	<li>
		<a href="profile.php?mod=speech" <?php echo $mod == "speech" ? "class=\"select_sub\"" : ""; ?>>聊天室发言</a>
	</li>
	<li>
		<a href="profile.php?mod=record" <?php echo $mod == "record" ? "class=\"select_sub\"" : ""; ?>>兑换记录</a>
	</li>
	<li>
		<a href="profile.php?mod=workorder" <?php echo $mod == "workorder" ? "class=\"select_sub\"" : ""; ?>>我的工单</a>
	</li>
</ul>
