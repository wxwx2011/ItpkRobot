<?php if (!defined('ITPK')) exit('You can not directly access the file.');

global $robot;

?>

<div id="robotManagerIframe">
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
			<form action="robot.php" method="post">
				<input type="hidden" name="mod" value="renewal" />
				<input type="hidden" name="action" value="submit" />
				<input type="hidden" name="<?php echo Robot::ID;?>" value="<?php echo $robot[Robot::ID];?>" />
				<table class="iframe_table" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td class="iframe_center iframe_tip" colspan="2">温馨提示：正在开发中。。。</td>
					</tr>
					<tr>
						<td class="iframe_center iframe_submit" colspan="2"><input class="form_submit" type="submit" value="确定修改" /></td>
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
$("#iframeBox", parent.document).html($("#robotManagerIframe").html());
$("#robotManagerIframe").html("");
$("#iframeDiv", parent.document).css({ "display":"block" });
var height = (0 - $("#iframeBox", parent.document).outerHeight()/2) + "px";
$("#iframeBox", parent.document).css({ marginTop:height });
</script>