<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 用来记录一些系统定义的值
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class SystemCommon extends EntityCommon {

	const TABLE									= "itpk_system";
	const ID									= "id";
	const MARK									= "mark";
	const NAME									= "name";
	const CONTENT								= "content";

	// 以下是各种定义的标记和标记名 -------------------------------------------
	// --------------------------------------------------------------

	/**
	 * 计划任务的标记
	 */
	const TASK_MARK								= "task";
	/**
	 * 计划任务的最后执行时间戳
	 */
	const TASK_NAME_LAST_ACTION_TIME			= "last_action_time";
	/**
	 * 计划任务的设置状态
	 */
	const TASK_NAME_STATUS						= "status";

	// --------------------------------------------------------------

	/**
	 * 运行机器人的触发器标记
	 */
	const ROBOT_RUN_MARK						= "robot_run";
	/**
	 * 触发器的最后执行时间戳
	 */
	const ROBOT_RUN_NAME_LAST_ACTION_TIME		= "last_action_time";
	/**
	 * 触发器的设置状态
	 */
	const ROBOT_RUN_NAME_STATUS					= "status";

	// --------------------------------------------------------------

	/**
	 * 处理机器人消息的触发器标记
	 */
	const ROBOT_MSG_MARK						= "robot_msg";
	/**
	 * 触发器的最后执行时间戳
	 */
	const ROBOT_MSG_NAME_LAST_ACTION_TIME		= "last_action_time";
	/**
	 * 触发器的设置状态
	 */
	const ROBOT_MSG_NAME_STATUS					= "status";

	// --------------------------------------------------------------

	/**
	 * 插件计划任务的触发器标记
	 */
	const ROBOT_PLUGIN_MARK						= "robot_plugin";
	/**
	 * 触发器的最后执行时间戳
	 */
	const ROBOT_PLUGIN_NAME_LAST_ACTION_TIME	= "last_action_time";
	/**
	 * 触发器的设置状态
	 */
	const ROBOT_PLUGIN_NAME_STATUS				= "status";

	// --------------------------------------------------------------

	/**
	 * 插件计划任务消息的标记
	 */
	const ROBOT_PLUGIN_MSG_MARK					= "robot_plugin_msg";
	/**
	 * 插件计划任务消息的密钥
	 */
	const ROBOT_PLUGIN_MSG_NAME_SECRET			= "secret";

	// --------------------------------------------------------------

}

?>
