<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 聊天室的聊天记录
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class ChatContentCommon extends EntityCommon {

	const TABLE				= "itpk_chat_content";
	const ID				= "id";
	const USER_ID			= "user_id";
	const CONTENT			= "content";
	const CONTENT_BACKUP	= "content_backup";
	const IS_TOP			= "is_top";
	const IS_UPDATE			= "is_update";
	const IS_DELETE			= "is_delete";
	const SEND_IP			= "send_ip";
	const CREATEDATE		= "createdate";

}
?>