<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 机器人记录
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class RobotCommon extends EntityCommon {

	const TABLE					= "itpk_robot";
	const ID					= "id";
	const USER_ID				= "user_id";
	const UIN					= "uin";
	const NAME					= "name";
	const SECRET				= "secret";
	const STATUS				= "status";
	const IS_RUN				= "is_run";
	const IS_RECONNECTION		= "is_reconnection";
	const IS_REPLY				= "is_reply";
	const IS_HOOK				= "is_hook";
	const IS_GROUP_SPEECH		= "is_group_speech";
	const IS_PERSONAL_SPEECH	= "is_personal_speech";
	const CREATE_UIN			= "create_uin";
	const MANAGER_UIN			= "manager_uin";
	const VERIFYSESSION			= "verifysession";
	const COOKIE				= "cookie";
	const SKEY					= "skey";
	const BKN					= "bkn";
	const RUN_LAST_TIME			= "run_last_time";
	const LIMITDATE				= "limitdate";
	const CREATEDATE			= "createdate";

}

?>