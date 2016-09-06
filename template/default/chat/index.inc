<?php 

global $template;
global $chatRecord;

$line = 0;
$faceArray = FaceUtil::getFaceArray();

?>

<div class="chat">
	<div class="container">
		<div class="info_nav">
			<a href="index.php"><i class="fa fa-home fa-frn"></i></a><i class="fa fa-angle-right fa-fc"></i>聊天室
		</div>
		<div class="chat_main">
			<div class="chat_log main_container">
				<!-- <div class="title_img"><img src="./template/default/img/chat_bg.png" /></div> -->
				<?php if ($chatRecord) { ?>
				<?php foreach ($chatRecord as $chatContent) { ?>
				<div class="chat_context">
					<div class="chat_author_photo"><img src="./template/default/img/photo.png" /></div>
					<div class="chat_info">
						<div class="chat_author"><?php echo htmlspecialchars($chatContent[User::NICKNAME]); ?></div>
						<div class="chat_time"><?php echo date('Y-m-d H:i', $chatContent[ChatContent::CREATEDATE]); ?></div>
						<div class="chat_content">
							<div class="chat_body"><?php echo UserContentUtil::replace($chatContent[ChatContent::CONTENT], $faceArray); ?></div>
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="page_container">
					<a href="chat.php?pageno=1">首页</a>
					<a href="chat.php?pageno=<?php echo $pageno-1; ?>">上一页</a>
					<a href="chat.php?pageno=<?php echo $pageno+1; ?>">下一页</a>
					<a href="chat.php?pageno=<?php echo $total; ?>">尾页</a>
				</div>
				<?php } else { ?>
				<div class="chat_error_tip">当前没有聊天记录！</div>
				<?php } ?>
			</div>
			<div class="chat_submit main_container">
				<h4>
					<label class="icon_code_label" onclick="showFaceBox('<?php echo FaceUtil::SELECTED_FACE; ?>')" title="表情"><i class="fa fa-smile-o fa-fb"></i></label>
					<label class="html_code_label" onclick="showUbbBox()" title="UBB代码"><i class="fa fa-code fa-fb"></i></label>
					<label class="reply_eraser_label" onclick="clearReplyText()" title="清空输入框"><i class="fa fa-eraser fa-fb"></i></label>
				</h4>
				<form action="chat.php?mod=index&action=send" method="post">
					<textarea id="replyText" name="<?php echo ChatContent::CONTENT; ?>"></textarea>
					<button class="ctrlSubmit" type="submit" title="聊天发言，Ctrl + Enter快速发言"><i class="fa fa-send-o fa-fw"></i></button>
				</form>
				<div id="iconCode" class="chat_tools" unselectable="on" onselectstart="return false;">
					<label class="closeLabel" title="关闭">x</label>
					<?php if (count($faceArray) > 0) { ?>
					<?php foreach ($faceArray as $face) { ?>
					<div class="faceBox" id="<?php echo $face['folder'];?>Box">
						<table id="<?php echo $face['folder'];?>Face" cellpadding="0" cellspacing="0">
						<?php for ($i = 1; $i <= $face['max_index']; $i++) { ?>
							<?php if ($i == 1 || (($line == 0 || (($i-1) % $line) == 0) && $i > $face['column'])) { ?>
							<tr<?php echo ($i > $face['max_index'] / $face['page_count']) ? " class=\"display\"":""; ?>>
							<?php } ?>
								<td class="addReplyCode" rcode="[face:<?php echo $face['short'];?>,index:<?php echo $i;?>]" title="<?php echo $face['memo'][$i-1];?>"><img style="height:<?php echo $face['height'];?>px" draggable="false" marksrc="<?php echo FaceUtil::FOLDER_ROOT . $face['folder'] . "/" . $i . "." . $face['type'];?>" /></td>
							<?php if ($i % ($line + $face['column']) == 0 && $i >= $face['column']) { $line+=$face['column']; ?>
							</tr>
							<?php } ?>
						<?php } $line = 0; ?>
						</table>
						<?php if ($face['page_count'] > 1) { ?>
						<center class="facepage">
							<label id="<?php echo $face['folder'];?>Before" title="上一页" class="cursor_allowed"><i class="fa fa-angle-left fa-fw"></i></label>
							<label id="<?php echo $face['folder'];?>After" title="下一页" onclick="pageSelect('<?php echo $face['folder'];?>', 2, <?php echo $face['page_count'];?>, <?php echo $face['max_index']/$face['page_count']/$face['column'];?>)"><i class="fa fa-angle-right fa-fw"></i></label>
						</center>
						<?php } ?>
					</div>
					<?php } ?>
					<?php } else { ?>
					<center>没有可用表情</center>
					<?php } ?>
					<ul>
						<?php if (count($faceArray) > 0) { ?>
						<?php foreach ($faceArray as $face) { ?>
						<li onclick="selectFace('<?php echo $face['folder'];?>', this)"<?php echo $face['folder'] == FaceUtil::SELECTED_FACE ? " class=\"selectedFace\"" : "";?>><?php echo $face['title'];?></li>
						<?php } ?>
						<?php } else { ?>
						<li class="cursor_allowed">没有可用表情</li>
						<?php } ?>
					</ul>
				</div>
				<div id="htmlCode" class="chat_tools" unselectable="on" onselectstart="return false;">
					<label class="closeLabel" title="关闭">x</label>
					<ul>
						<li class="addReplyCode itpk_title_container" rcode="[url=http://][/url]" itpk_title="超链接">
							<label>[url=链接网址]说明文字[/url]</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="[url]http://[/url]" itpk_title="超链接">
							<label>[url]链接网址[/url]</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="[br]" itpk_title="换行">
							<label>[br]</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="///" itpk_title="换行">
							<label>///</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="[img=http://][/img]" itpk_title="远程图片">
							<label>[img=图片网址]图片标题[/img]</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="[img]http://[/img]" itpk_title="远程图片">
							<label>[img]图片网址[/img]</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="[p][/p]" itpk_title="段落，段落会换行，并且开头会缩进两个文字">
							<label>[p]文本[/p]</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="[id]" itpk_title="用户ID">
							<label>[id]</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="[username]" itpk_title="用户名">
							<label>[username]</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="[date]" itpk_title="日期: YYYY-MM-DD H:I:S">
							<label>[date]</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="[color=][/color]" itpk_title="彩色文本">
							<label>[color=颜色]文本[/color]</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="[size=][/size]" itpk_title="文本大小,单位是PX，不用再加单位">
							<label>[size=大小]文本[/size]</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="[family=][/family]" itpk_title="文本字体，多个字体用逗号隔开">
							<label>[family=字体]文本[/family]</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="[font=,,][/font]" itpk_title="字体样式">
							<label>[font=大小,颜色,字体]文本[/font]</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="[b][/b]" itpk_title="粗体文本">
							<label>[b]粗体文本[/b]</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="[u][/u]" itpk_title="下划线文本">
							<label>[u]下划线文本[/u]</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="[i][/i]" itpk_title="斜体文本">
							<label>[i]斜体文本[/i]</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="[del][/del]" itpk_title="删除线文本">
							<label>[del]删除线文本[/del]</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="[fly][/fly]" itpk_title="滚动的文本">
							<label>[fly]滚动的文本[/fly]</label>
						</li>
						<li class="addReplyCode itpk_title_container" rcode="[move][/move]" itpk_title="滚动的文本">
							<label>[move]滚动的文本[/move]</label>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>