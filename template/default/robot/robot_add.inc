<?php if (!defined('ITPK')) exit('You can not directly access the file.'); ?>

<?php require_once TEMPLATE_FOLDER . "robot/robot_des.inc"; ?>
<div class="info">
	<div class="container container_robot">
		<?php require_once TEMPLATE_FOLDER . "robot/robot_nav.inc"; ?>
		<div class="set_content">
			<div class="meau_title"><h4><i class="fa fa-server fa-fr"></i>添加机器人</h4></div>
			<form action="robot.php" method="post">
				<input type="hidden" name="mod" value="add" />
				<input type="hidden" name="action" value="submit" />
				<ul class="form_ul">
					<li><label class="label_title">机器人QQ</label><input class="form_input" type="text" name="<?php echo Robot::UIN; ?>" /></li>
					<li><label class="label_title">机器人名字</label><input class="form_input" type="text" name="<?php echo Robot::NAME; ?>" /></li>
					<li><label class="label_title">创建者QQ</label><input class="form_input" type="text" name="<?php echo Robot::CREATE_UIN; ?>" /></li>
					<li class="last_li"><label class="label_title"></label><input class="form_submit" type="submit" value="确定添加" /></li>
				</ul>
			</form>
		</div>
	</div>
</div>