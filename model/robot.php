<?php if (!defined('ITPK')) exit('You can not directly access the file.');

global $mod;
global $action;

if ($mod == "list") {
	/**
	 * 机器人列表
	 */
	$robotArray = Robot::GET_ME_BY_COLUMN(Robot::TABLE, Robot::USER_ID, USER_ID, true);
} elseif ($mod == "add" && $action == "submit") {
	/**
	 * 添加机器人
	 */
	$robot_uin = param_filter(Robot::UIN);
	$robot_name = param_filter(Robot::NAME);
	$robot_create_uin = param_filter(Robot::CREATE_UIN);
	if (!is_empty($robot_uin) && !is_empty($robot_name) && !is_empty($robot_create_uin)) {
		$result = Robot::insertMeByInfo(USER_ID, $robot_uin, $robot_name, $robot_create_uin);
	}
} elseif ($mod == "remove") {
	/**
	 * 删除机器人
	 */
	$robot_id = param_filter(Robot::ID);
	$robot = Robot::getMeByIdAndUserId($robot_id, USER_ID);
	if ($robot && $action == "submit") {
		$removeResult = false;
		if (Robot::DELETE_ME_BY_ID(Robot::TABLE, $robot_id)) {
			$removeResult = true;
		}
	}
} elseif ($mod == "setup") {
	/**
	 * 设置机器人
	 */
	$robot_id = param_filter(Robot::ID);
	$robot = Robot::getMeByIdAndUserId($robot_id, USER_ID);
	if ($robot && $action == "submit") {
		$setupResult = false;
		$robot = Robot::newInstance();
		$robot[Robot::USER_ID] = USER_ID;
		if (Robot::updateMeByInfo($robot)) {
			$robot = Robot::getMeByIdAndUserId($robot_id, USER_ID);
			$setupResult = true;
		}
	}
} elseif ($mod == "manager") {
	/**
	 * 管理机器人
	 */
	$robot_id = param_filter(Robot::ID);
	$robot = Robot::getMeByIdAndUserId($robot_id, USER_ID);
	if ($robot && $action == "submit") {
		header("location:robot.php");
	}
} elseif ($mod == "record") {
	/**
	 * 机器人聊天记录和登录机器人
	 */
	$robot_id = param_filter(Robot::ID);
	$robot = Robot::getMeByIdAndUserId($robot_id, USER_ID);
	if ($robot) {
		$limit = 10;
		$pageno = param_filter("pageno", 1);
		$msgtype = param_filter("msgtype", "system");
		if ($msgtype == "system") {
			$count = RobotSystemMsg::GET_COUNT_BY_COLUMN(RobotSystemMsg::TABLE, RobotSystemMsg::ROBOT_ID, $robot_id);
			if ($count > 0) {
				$pageUtil = new PageUtil($pageno, $limit, $count);
				$msgArray = RobotSystemMsg::GET_ME_LIMIT_BY_COLUMN(RobotSystemMsg::TABLE, RobotSystemMsg::ROBOT_ID, $robot_id, $pageUtil->getLimit(), $pageUtil->getOffset());
			}
		} elseif ($msgtype == "group") {
			$count = RobotGroupMsg::GET_COUNT_BY_COLUMN(RobotGroupMsg::TABLE, RobotGroupMsg::ROBOT_ID, $robot_id);
			if ($count > 0) {
				$pageUtil = new PageUtil($pageno, $limit, $count);
				$msgArray = RobotGroupMsg::GET_ME_LIMIT_BY_COLUMN(RobotGroupMsg::TABLE, RobotGroupMsg::ROBOT_ID, $robot_id, $pageUtil->getLimit(), $pageUtil->getOffset());
			}
		} elseif ($msgtype == "friend") {
			$count = RobotFriendMsg::GET_COUNT_BY_COLUMN(RobotFriendMsg::TABLE, RobotFriendMsg::ROBOT_ID, $robot_id);
			if ($count > 0) {
				$pageUtil = new PageUtil($pageno, $limit, $count);
				$msgArray = RobotFriendMsg::GET_ME_LIMIT_BY_COLUMN(RobotFriendMsg::TABLE, RobotFriendMsg::ROBOT_ID, $robot_id, $pageUtil->getLimit(), $pageUtil->getOffset());
			}
		}
	}
} elseif ($mod == "renewal") {
	/**
	 * 机器人续期
	 */
	$robot_id = param_filter(Robot::ID);
	$robot = Robot::getMeByIdAndUserId($robot_id, USER_ID);
	if ($robot && $action == "submit") {
		$renewalResult = false;
		$failmemo = "";
		$robot_uin = param_filter(Robot::ID);
		$renewal_id = param_filter(Renewal::TABLE_ID());
		$renewal = Renewal::GET_ME_BY_ID(Renewal::TABLE, $renewal_id);
		if ($renewal) {
			$gold = $renewal[Renewal::GOLD];
			$day_time = $renewal[Renewal::DAY_TIME];
			if (USER_GOLD >= $gold) {
				$now_time = time();
				$renewaldate = intval($robot[Robot::LIMITDATE]) - $now_time <= 0 ? $now_time : intval($robot[Robot::LIMITDATE]);
				$limitdate = $renewaldate + $day_time * 24 * 60 * 60;
				if (Robot::renewalRobot($robot_id, USER_ID, $limitdate)) {
					User::updateGold(USER_ID, $gold, "-");
					$robot[Robot::LIMITDATE] = $limitdate;
					$renewalResult = true;
				} else {
					$failmemo = "您重新刷新页面看看，您的这个账号是不是不存在了哇<br/>还有可能是系统出现了问题呢，非常抱歉";
				}
			} else {
				$failmemo = "您的金币不足，无法购买这个续期卡给机器人续期";
			}
		} else {
			$failmemo = "这个续期卡不存在了，换一个续期卡试试呗";
		}
	}
	$renewalArray = Renewal::GET_ME_ALL(Renewal::TABLE, Renewal::SORT, "ASC");
}

if (!param_filter("ajax", false, true)) {
	require_once TEMPLATE_FOLDER . "common/header.inc";
}

require_once TEMPLATE_FOLDER . "robot/robot_" . $mod . ".inc";

if (!param_filter("ajax", false, true)) {
	require_once TEMPLATE_FOLDER . "common/footer.inc";
}

?>