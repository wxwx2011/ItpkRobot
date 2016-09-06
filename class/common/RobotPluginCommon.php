<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 机器人插件系统的插件记录
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class RobotPluginCommon extends EntityCommon {

	const TABLE					= "itpk_robot_plugin";
	const ID					= "id";
	const NAME					= "name";
	const CLASS_NAME			= "class_name";
	const AUTHOR				= "author";
	const AUTHOR_URL			= "author_url";
	const DESCRIPTION			= "description";
	const INSTRUCTION			= "instruction";
	const INSTRUCTION_TYPE		= "instruction_type";
	const TYPE_ID				= "type_id";
	const IS_MONITOR_ALL_MSG	= "is_monitor_all_msg";
	const IS_CRON				= "is_cron";
	const IS_ABLE				= "is_able";
	const VERSION				= "version";
	const CREATEDATE			= "createdate";

}

?>
