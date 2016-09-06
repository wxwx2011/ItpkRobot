<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 插件系统的计划任务记录
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class RobotPluginCronCommon extends EntityCommon {

	const TABLE				= "itpk_robot_plugin_cron";
	const ID				= "id";
	const ROBOT_PLUGIN_ID	= "robot_plugin_id";
	const MINUTE			= "minute";
	const HOUR				= "hour";
	const DAY				= "day";
	const MONTH				= "month";
	const DAYOFWEEK			= "dayofweek";
	const INSTRUCTION		= "instruction";
	const LASTACTIONTIME	= "lastactiontime";
	const IS_ABLE			= "is_able";
	const CREATEDATE		= "createdate";

}

?>
