<?php if (!defined('ITPK')) exit('You can not directly access the file.');

global $user;
global $user_role;
global $robotArray;

?>

<?php require_once TEMPLATE_FOLDER . "robot/robot_des.inc"; ?>
<div class="info">
	<div class="container container_robot">
		<?php require_once TEMPLATE_FOLDER . "robot/robot_nav.inc"; ?>
		<div class="set_content">
			<div class="meau_title"><h4><i class="fa fa-server fa-fr"></i>机器人列表</h4></div>
			<div class="table_main">
				<table cellpadding="0" cellspacing="0">
					<tr>
						<th><input type="checkbox" /></th>
						<th>机器人账号</th>
						<th>机器人昵称</th>
						<th>状态</th>
						<th>创建者账号</th>
						<th>到期时间</th>
						<th class="column_operate">操作</th>
					</tr>
					<?php if ($robotArray) { ?>
					<?php foreach ($robotArray as $robot) { ?>
					<tr>
						<td><input type="checkbox" /></td>
						<td><?php echo $robot[Robot::UIN]; ?></td>
						<td><?php echo $robot[Robot::NAME]; ?></td>
						<td><?php echo $robot[Robot::IS_RUN] == 0 ? "未运行" : ($robot[Robot::STATUS] != StatusUtil::ONLINE ? "未上线" : "运行中");?></td>
						<td><?php echo $robot[Robot::CREATE_UIN]; ?></td>
						<td><?php echo date('Y-m-d H:i', $robot[Robot::LIMITDATE]);?></td>
						<td>
							<a class="record itpk_title_container" href="javascript:void(0)" itpk_title="记录 / 登录" onclick="robotOperation(<?php echo $robot[Robot::ID]; ?>, 'record')"><i class="fa fa-tv fa-fw"></i></a>
							<a class="renewal itpk_title_container" href="javascript:void(0)" itpk_title="续期" onclick="robotOperation(<?php echo $robot[Robot::ID]; ?>, 'renewal')"><i class="fa fa-diamond fa-fw"></i></a>
							<a class="cogs itpk_title_container" href="javascript:void(0)" itpk_title="设置" onclick="robotOperation(<?php echo $robot[Robot::ID]; ?>, 'setup')"><i class="fa fa-cogs fa-fw"></i></a>
							<a class="edit itpk_title_container" href="javascript:void(0)" itpk_title="管理" onclick="robotOperation(<?php echo $robot[Robot::ID]; ?>, 'manager')"><i class="fa fa-edit fa-fw"></i></a>
							<a class="remove itpk_title_container" href="javascript:void(0)" itpk_title="删除" onclick="robotOperation(<?php echo $robot[Robot::ID]; ?>, 'remove')"><i class="fa fa-trash fa-fw"></i></a>
						</td>
					</tr>
					<?php } ?>
					<?php } else { ?>
					<tr>
						<td colspan="8"><font color="red">没有记录</font></td>
					</tr>
					<?php } ?>
				</table>
			</div>
			<div class="foot_fun">
				<input value="批量删除" type="button" />
				<input value="批量编辑" type="button" />
				<input value="批量设置" type="button" />
			</div>
		</div>
	</div>
</div>

<iframe name="robotIframe" id="robotIframe" src="about:blank" style="display:none;border:0px" width="0" height="0"></iframe>
<iframe name="operationIframe" id="operationIframe" src="about:blank" style="display:none;border:0px" width="0" height="0"></iframe>

<form id="robotForm" action="robot.php" method="post" target="robotIframe">
	<input type="hidden" id="robotMod" name="mod" />
	<input type="hidden" id="robotAjax" name="ajax" value="true" />
	<input type="hidden" id="robotId" name="<?php echo Robot::ID;?>" />
</form>

<script>
function robotOperation(robot_id, operation) {
	$("#maskTip").html("请稍候...");
	$("#maskDiv").fadeIn(300);
	if (operation != "manager") {
		$("#robotId").val(robot_id);
		$("#robotMod").val(operation);
		$("#robotForm").submit();
	}
}

function robotRenewal() {
	$("#maskTip").html("续期中...");
	$("#maskDiv").show();
	$("#renewalForm").submit();
}

function switchInterface(showMask, hideMask) {
	$("#"+hideMask).slideUp(200);
	$("#"+showMask).slideDown(200, function() {
		correctIframeBoxHeight();
	});
}

function correctIframeBoxHeight() {
	var height = (0 - $("#iframeBox").outerHeight()/2) + "px";
	$("#iframeBox").css({ marginTop:height });
}

function closeWindow() {
	$("#iframeDiv").fadeOut(300);
}
</script>