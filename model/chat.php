<?php if (!defined('ITPK')) exit('You can not directly access the file.');

global $mod;
global $action;

if ($mod == "index") {
	if ($action == "send") {
		if (LOGIN_STATUS != UserLoginUtil::SUCCESS) {
			header("location:login.php");
			exit();
		}
		$chat_content = param_filter(ChatContent::CONTENT);
		if (!is_empty($chat_content)) {
			ChatContent::INSERT_CHAT_CONTENT(USER_ID, $chat_content, getIP());
		}
		header("location:chat.php");
		exit();
	}
	/**
	 * 聊天室每页显示发言的条数
	 */
	$limit = 15;
	/**
	 * 获取哪一页的发言（默认为第一页）
	 */
	$pageno = param_filter("pageno", 1);
	/**
	 * 获取聊天室发言的总数
	 */
	$count = ChatContent::GET_CHAT_COUNT();
	/**
	 * 发言的总页数
	 */
	$total = ceil($count/$limit);
	/**
	 * 判断页码的合法性，并进行修正
	 */
	$pageno = $pageno > $total ? $total : $pageno;
	$pageno = $pageno > 0 ? $pageno : 1;
	/**
	 * 分页的偏移量
	 */
	$offset = ($pageno - 1) * $limit;
	/**
	 * 根据每页显示的发言数和分页偏移量获取聊天室的发言
	 */
	$chatRecord = ChatContent::GET_NEW_CHAT_RECORD($limit, $offset);
}

require_once TEMPLATE_FOLDER . "common/header.inc";
require_once TEMPLATE_FOLDER . "chat/" . $mod . '.inc';
require_once TEMPLATE_FOLDER . "common/footer.inc";

?>