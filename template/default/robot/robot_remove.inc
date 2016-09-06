<?php if (!defined('ITPK')) exit('You can not directly access the file.');

global $robot;
global $removeResult;

?>

<div id="robotRemoveIframe">
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
			<?php if (isset($removeResult)) { ?>
			<div id="iframe_ajax_result" class="iframe_ajax_result">
				<div class="result_tip"><?php echo $removeResult ? "删除成功":"删除失败";?></div>
				<div class="result_memo">
					<?php if ($removeResult) { ?>
					QQ<code><?php echo $robot[Robot::UIN];?></code>删除成功，从此再也看不到可爱的宝宝了
					<?php } else { ?>
					哎呀，QQ<code><?php echo $robot[Robot::UIN];?></code>删除失败，你确定添加过这个账号嘛
					<?php } ?>
				</div>
				<input class="form_submit" type="button" value="添加机器人" />
				<input class="form_submit" type="button" value="去聊天室嗨" />
			</div>
			<?php } else { ?>
			<form action="robot.php" method="post" target="operationIframe">
				<input type="hidden" name="mod" value="remove" />
				<input type="hidden" name="ajax" value="true" />
				<input type="hidden" name="action" value="submit" />
				<input type="hidden" name="<?php echo Robot::ID;?>" value="<?php echo $robot[Robot::ID];?>" />
				<table class="iframe_table" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td class="iframe_center iframe_tip" colspan="2">温馨提示：删除后机器人使用时间不返还</td>
					</tr>
					<tr>
						<th>QQ</th>
						<td><?php echo $robot[Robot::UIN]; ?></td>
					</tr>
					<tr>
						<th>在线状态</th>
						<td><?php echo $robot[Robot::IS_RUN] == 0 ? "未运行" : ($robot[Robot::STATUS] != StatusUtil::ONLINE ? "未上线" : "运行中");?></td>
					</tr>
					<tr>
						<th>创建者</th>
						<td><?php echo $robot[Robot::CREATE_UIN]; ?></td>
					</tr>
					<tr>
						<th>添加时间</th>
						<td><?php echo date('Y-m-d H:i', $robot[Robot::CREATEDATE]);?></td>
					</tr>
					<tr>
						<th>到期时间</th>
						<td><font color="#f66"><?php echo date('Y-m-d H:i', $robot[Robot::LIMITDATE]);?></font></td>
					</tr>
					<tr>
						<td class="iframe_center iframe_submit" colspan="2"><input class="form_submit" type="submit" value="确定删除" /></td>
					</tr>
				</table>
			</form>
			<?php } ?>
			<?php } else { ?>
			<div class="error_tip">你没有这个机器人账号</div>
			<?php } ?>
		</div>
	</div>
</div>

<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
$("#maskDiv", parent.document).hide();
$("#iframeBox", parent.document).html($("#robotRemoveIframe").html());
$("#robotRemoveIframe").html("");
$("#iframeDiv", parent.document).css({ "display":"block" });
var height = (0 - $("#iframeBox", parent.document).outerHeight()/2) + "px";
$("#iframeBox", parent.document).css({ marginTop:height });
</script>