<?php if (!defined('ITPK')) exit('You can not directly access the file.');

global $robot;
global $setupResult;

?>

<div id="robotSetupIframe">
	<div class="iframe_head">
		<div class="operation_window" id="closeWindow" onclick="closeWindow()" title="关闭"><i class="fa fa-close"></i></div>
		<div class="iframe_head_container">
			<div class="robot_photo">
				<img src="http://q.qlogo.cn/headimg_dl?dst_uin=<?php echo $robot?$robot[Robot::UIN]:10000;?>&spec=100&img_type=jpg" />
			</div>
			<div class="iframe_title">
				<h4><?php echo $robot?$robot[Robot::NAME]:"机器人不存在";?></h4>
				<code><i class="fa fa-qq fa-fw fa-frs"></i><?php echo $robot?$robot[Robot::UIN]:"xxxxx";?></code>
			</div>
		</div>
	</div>
	<div class="iframe_container">
		<div class="iframe_content">
			<?php if ($robot) { ?>
			<?php if (isset($setupResult)) { ?>
			<div id="iframe_ajax_result" class="iframe_ajax_result">
				<div class="result_tip"><?php echo $setupResult ? "修改成功":"修改失败";?></div>
				<div class="result_memo">
					<?php if ($setupResult) { ?>
					QQ<code><?php echo $robot[Robot::UIN];?></code>的配置修改成功，接下来做点什么呢
					<?php } else { ?>
					哎呀，QQ<code><?php echo $robot[Robot::UIN];?></code>的配置修改失败
					<br/>
					如果什么都没有修改，也算作修改失败的呦
					<?php } ?>
				</div>
				<input class="form_submit" type="button" value="返回设置页面" onclick="switchInterface('setupForm', 'iframe_ajax_result')" />
				<input class="form_submit" type="button" value="<?php echo $robot[Robot::STATUS] == StatusUtil::ONLINE ? "前往聊天记录" : "登录机器人";?>" />
			</div>
			<?php } ?>
			<form<?php echo isset($setupResult) ? " class=\"display\"":""; ?> id="setupForm" name="setupForm" action="robot.php" method="post" target="operationIframe">
				<input type="hidden" name="mod" value="setup" />
				<input type="hidden" name="ajax" value="true" />
				<input type="hidden" name="action" value="submit" />
				<input type="hidden" name="<?php echo Robot::ID;?>" value="<?php echo $robot[Robot::ID];?>" />
				<table class="iframe_table" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td class="iframe_center iframe_tip" colspan="2">温馨提示：开启挂机模式后机器人将不处理任何消息</td>
					</tr>
					<tr>
						<th>QQ</th>
						<td class="td_input">
							<input class="iframe_input" type="text" name="<?php echo Robot::UIN; ?>" value="<?php echo $robot[Robot::UIN];?>" placeholder="机器人QQ" />
						</td>
					</tr>
					<tr>
						<th>机器人名字</th>
						<td class="td_input">
							<input class="iframe_input" type="text" name="<?php echo Robot::NAME; ?>" value="<?php echo $robot[Robot::NAME];?>" placeholder="机器人名字" />
						</td>
					</tr>
					<tr>
						<th>创建者QQ</th>
						<td class="td_input">
							<input class="iframe_input" type="text" name="<?php echo Robot::CREATE_UIN; ?>" value="<?php echo $robot[Robot::CREATE_UIN];?>" placeholder="创建者QQ" />
						</td>
					</tr>
					<tr>
						<th>开启群聊</th>
						<td>
							<label class="label_radio"><input class="form_radio" type="radio" name="<?php echo Robot::IS_GROUP_SPEECH; ?>" value="true" <?php echo $robot[Robot::IS_GROUP_SPEECH] == 1 ? "checked=\"checked\"" : "";?> />是</label>
							<label class="label_radio"><input class="form_radio" type="radio" name="<?php echo Robot::IS_GROUP_SPEECH; ?>" value="false" <?php echo $robot[Robot::IS_GROUP_SPEECH] == 0 ? "checked=\"checked\"" : "";?> />否</label>
						</td>
					</tr>
					<tr>
						<th>开启私人聊天</th>
						<td>
							<label class="label_radio"><input class="form_radio" type="radio" name="<?php echo Robot::IS_PERSONAL_SPEECH; ?>" value="true" <?php echo $robot[Robot::IS_PERSONAL_SPEECH] == 1 ? "checked=\"checked\"" : "";?> />是</label>
							<label class="label_radio"><input class="form_radio" type="radio" name="<?php echo Robot::IS_PERSONAL_SPEECH; ?>" value="false" <?php echo $robot[Robot::IS_PERSONAL_SPEECH] == 0 ? "checked=\"checked\"" : "";?> />否</label>
						</td>
					</tr>
					<tr>
						<th>回复总开关</th>
						<td>
							<label class="label_radio"><input class="form_radio" type="radio" name="<?php echo Robot::IS_REPLY; ?>" value="true" <?php echo $robot[Robot::IS_REPLY] == 1 ? "checked=\"checked\"" : "";?> />开</label>
							<label class="label_radio"><input class="form_radio" type="radio" name="<?php echo Robot::IS_REPLY; ?>" value="false" <?php echo $robot[Robot::IS_REPLY] == 0 ? "checked=\"checked\"" : "";?> />关</label>
						</td>
					</tr>
					<tr>
						<th>挂机模式</th>
						<td>
							<label class="label_radio"><input class="form_radio" type="radio" name="<?php echo Robot::IS_HOOK; ?>" value="true" <?php echo $robot[Robot::IS_HOOK] == 1 ? "checked=\"checked\"" : "";?> />是</label>
							<label class="label_radio"><input class="form_radio" type="radio" name="<?php echo Robot::IS_HOOK; ?>" value="false" <?php echo $robot[Robot::IS_HOOK] == 0 ? "checked=\"checked\"" : "";?> />否</label>
						</td>
					</tr>
					<tr>
						<th>是否运行机器人</th>
						<td>
							<label class="label_radio"><input class="form_radio" type="radio" name="<?php echo Robot::IS_RUN; ?>" value="true" <?php echo $robot[Robot::IS_RUN] == 1 ? "checked=\"checked\"" : "";?> />是</label>
							<label class="label_radio"><input class="form_radio" type="radio" name="<?php echo Robot::IS_RUN; ?>" value="false" <?php echo $robot[Robot::IS_RUN] == 0 ? "checked=\"checked\"" : "";?> />否</label>
						</td>
					</tr>
					<tr>
						<td class="iframe_center iframe_submit" colspan="2">
							<input class="form_submit" type="submit" value="确定修改" />
						</td>
					</tr>
				</table>
			</form>
			<?php } else { ?>
			<div class="error_tip">你没有这个机器人账号</div>
			<?php } ?>
		</div>
	</div>
</div>

<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
$("#maskDiv", parent.document).hide();
$("#iframeBox", parent.document).html($("#robotSetupIframe").html());
$("#robotSetupIframe").html("");
$("#iframeDiv", parent.document).css({ "display":"block" });
var height = (0 - $("#iframeBox", parent.document).outerHeight()/2) + "px";
$("#iframeBox", parent.document).css({ marginTop:height });
parent.giveNewTitle();
</script>