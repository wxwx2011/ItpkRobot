<?php if (!defined('ITPK')) exit('You can not directly access the file.');

global $robot;
global $renewalArray;
global $renewalResult;
global $failmemo;

?>

<div id="robotRenewalIframe">
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
			<?php if (isset($renewalResult)) { ?>
			<div id="iframe_ajax_result" class="iframe_ajax_result">
				<div class="result_tip"><?php echo $renewalResult ? "续期成功":"续期失败";?></div>
				<div class="result_memo">
					<?php if ($renewalResult) { ?>
					恭喜您续期成功
					<br/>
					现在使用期限已经提升到<br/><code><?php echo date('Y-m-d H:i', $robot[Robot::LIMITDATE]);?></code>
					<?php } else { ?>
					哎呀，续期失败啦
					<br/>
					<?php echo $failmemo; ?>
					<br/>
					当前到期时间为<code><?php echo date('Y-m-d H:i', $robot[Robot::LIMITDATE]);?></code>
					<?php } ?>
				</div>
				<input class="form_submit" type="button" value="返回续期页面" onclick="switchInterface('renewalForm', 'iframe_ajax_result')" />
				<input class="form_submit" type="button" value="<?php echo $robot[Robot::STATUS] == StatusUtil::ONLINE ? "前往聊天记录" : "登录机器人";?>" />
			</div>
			<?php } ?>
			<form<?php echo isset($renewalResult) ? " class=\"display\"":""; ?> id="renewalForm" name="renewalForm" action="robot.php" method="post" target="operationIframe">
				<input type="hidden" name="mod" value="renewal" />
				<input type="hidden" name="ajax" value="true" />
				<input type="hidden" name="action" value="submit" />
				<input type="hidden" name="<?php echo Robot::ID;?>" value="<?php echo $robot[Robot::ID];?>" />
				<table class="iframe_table" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td class="iframe_center iframe_tip" colspan="2">温馨提示：续期后才能愉快的使用机器人</td>
					</tr>
					<tr>
						<th>续期卡</th>
						<td class="td_input">
							<?php if ($renewalArray) { ?>
							<select class="iframe_select" name="<?php echo Renewal::TABLE_ID();?>">
								<?php foreach ($renewalArray as $renewal) { ?>
								<option value="<?php echo $renewal[Renewal::ID]; ?>"><?php echo $renewal[Renewal::NAME] . "(" . $renewal[Renewal::DAY_TIME] . "天 - " . $renewal[Renewal::GOLD] . "金币)"; ?></option>
								<?php } ?>
							</select>
							<?php } else {?>
							<font color="red">管理员没有添加续期配置，所有机器人都无法续期</font>
							<?php } ?>
						</td>
					</tr>
					<tr>
						<th>QQ</th>
						<td><?php echo $robot[Robot::UIN]; ?></td>
					</tr>
					<tr>
						<th>到期时间</th>
						<td><font color="#f66"><?php echo date('Y-m-d H:i', $robot[Robot::LIMITDATE]);?></font></td>
					</tr>
					<tr>
						<td class="iframe_center iframe_submit" colspan="2"><input class="form_submit" type="button" value="确定续期" onclick="robotRenewal()" /></td>
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
$("#iframeBox", parent.document).html($("#robotRenewalIframe").html());
$("#robotRenewalIframe").html("");
$("#iframeDiv", parent.document).css({ "display":"block" });
var height = (0 - $("#iframeBox", parent.document).outerHeight()/2) + "px";
$("#iframeBox", parent.document).css({ marginTop:height });
</script>