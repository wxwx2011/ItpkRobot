<?php if (!defined('ITPK')) exit('You can not directly access the file.');

global $robot;
global $msgArray;
global $msgtype;

?>

<div id="robotRecordIframe">
	<div class="iframe_head">
		<div class="operation_window" id="closeWindow" onclick="closeWindow()" title="关闭"><i class="fa fa-close"></i></div>
		<div class="operation_window" id="refreshWindow" onclick="robotOperation(<?php echo $robot[Robot::ID]; ?>, 'record')" title="刷新"><i class="fa fa-refresh"></i></div>
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
			<?php if ($robot[Robot::IS_RUN] == 1 && $robot[Robot::STATUS] == StatusUtil::LOADING_VERIFY) { ?>
			<div class="robot_qrcode">
				<h4>什么都别说，用手机QQ扫我</h4>
				<img src="<?php echo ITPK_ROOT_URL;?>qrcode.php?robot_id=<?php echo $robot[Robot::ID];?>&date=<?php echo time();?>" alt="二维码不存在"/>
				<h4><a href="robot.php?mod=record&ajax=true&id=<?php echo $robot[Robot::ID];?>" target="robotIframe">点我刷新状态 </a></h4>
			</div>
			<?php } else { ?>
			<div class="iframe_context">
				<div class="select_type">
					<table border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td><a<?php echo $msgtype == "system" ? " class=\"selected\"":"";?> href="robot.php?mod=record&ajax=true&id=<?php echo $robot[Robot::ID];?>&msgtype=system" target="robotIframe">系统消息</a></td>
							<td><a<?php echo $msgtype == "group" ? " class=\"selected\"":"";?> href="robot.php?mod=record&ajax=true&id=<?php echo $robot[Robot::ID];?>&msgtype=group" target="robotIframe">群消息</a></td>
							<td><a<?php echo $msgtype == "friend" ? " class=\"selected\"":"";?> href="robot.php?mod=record&ajax=true&id=<?php echo $robot[Robot::ID];?>&msgtype=friend" target="robotIframe">好友消息</a></td>
						</tr>
					</table>
				</div>
				<ul>
					<?php if (isset($msgArray) && $msgArray && count($msgArray) > 0) { $i = 0;?>
					<?php foreach ($msgArray as $msg) { $i++; ?>
					<li<?php echo $i==0?" class=\"first_li\"":""?>><i class="fa fa-bell fa-frn"></i><?php echo $msg["content"]?> - <?php echo date('m-d H:i:s', $msg["createdate"])?></li>
					<?php } ?>
					<?php } else { ?>
					<li class="first_li error_tip"><i class="fa fa-bell fa-frn"></i>没有记录</li>
					<?php } ?>
				</ul>
			</div>
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
$("#iframeBox", parent.document).html($("#robotRecordIframe").html());
$("#robotRecordIframe").html("");
$("#iframeDiv", parent.document).css({ "display":"block" });
var height = (0 - $("#iframeBox", parent.document).outerHeight()/2) + "px";
$("#iframeBox", parent.document).css({ marginTop:height });
</script>