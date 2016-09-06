<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 机器人所在群的群成员
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class RobotGroupMemberCommon extends EntityCommon {

	const TABLE				= "itpk_robot_group_member";
	const ID				= "id";
	const ROBOT_ID			= "robot_id";
	const GROUP_UIN			= "group_uin";
	const MEMBER_UIN		= "member_uin";
	const NICKNAME			= "nickname";
	const CARDNAME			= "cardname";
	const EXPERIENCE		= "experience";
	const POINT				= "point";
	const PLUGIN_ID			= "plugin_id";
	const CREATEDATE		= "createdate";

}

?>
