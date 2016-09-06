<?php if (!defined('ITPK')) exit('You can not directly access the file.');

global $mod;

if ($mod == "list") {
	$robot_nav_title = "机器人列表";
} elseif ($mod == "add") {
	$robot_nav_title = "添加机器人";
} elseif ($mod == "renewal") {
	$robot_nav_title = "续期机器人";
} else {
	$robot_nav_title = "机器人导航";
}

?>

<div class="set_side">
	<div class="set_meaus">
		<ul class="set_meau">
			<li class="set_meau_li_first"><a<?php echo $mod == "list" ? " class=\"set_selected\"" : ""; ?> href="robot.php?mod=list"><i class="fa fa-circle fa-frb"></i>机器人列表</a></li>
			<li><a<?php echo $mod == "add" ? " class=\"set_selected\"" : ""; ?> href="robot.php?mod=add"><i class="fa fa-circle fa-frb"></i>添加机器人</a></li>
			<li><a<?php echo $mod == "anquan" ? " class=\"set_selected\"" : ""; ?> href="javascript:void(0)"><i class="fa fa-circle fa-frb"></i>安全中心</a></li>
			<li<?php echo $mod == "jiaocheng" ? " class=\"set_selected\"" : ""; ?> class="set_meau_li_last"><a href="javascript:void(0)"><i class="fa fa-circle fa-frb"></i>使用教程</a></li>
		</ul>
	</div>
</div>
<div class="set_tip" id="set_tip"></div>