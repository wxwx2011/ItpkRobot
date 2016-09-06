<?php if (!defined('ITPK')) exit('You can not directly access the file.');

class Robot extends RobotCommon {

	/**
	 * 根据页面上传入的参数，实例化一个数组
	 * @return multitype:unknown
	 */
	public static function newInstance() {
		$robot = array();
		if (param_is_exits(Robot::ID)) {
			$robot[Robot::ID] = param_filter(Robot::ID);
		}
		if (param_is_exits(Robot::USER_ID)) {
			$robot[Robot::USER_ID] = param_filter(Robot::USER_ID);
		}
		if (param_is_exits(Robot::UIN)) {
			$robot[Robot::UIN] = param_filter(Robot::UIN);
		}
		if (param_is_exits(Robot::NAME)) {
			$robot[Robot::NAME] = param_filter(Robot::NAME);
		}
		if (param_is_exits(Robot::SECRET)) {
			$robot[Robot::SECRET] = param_filter(Robot::SECRET);
		}
		if (param_is_exits(Robot::STATUS)) {
			$robot[Robot::STATUS] = param_filter(Robot::STATUS);
		}
		if (param_is_exits(Robot::IS_RUN)) {
			$robot[Robot::IS_RUN] = param_filter(Robot::IS_RUN, false, true);
		}
		if (param_is_exits(Robot::IS_RECONNECTION)) {
			$robot[Robot::IS_RECONNECTION] = param_filter(Robot::IS_RECONNECTION, false, true);
		}
		if (param_is_exits(Robot::IS_REPLY)) {
			$robot[Robot::IS_REPLY] = param_filter(Robot::IS_REPLY, false, true);
		}
		if (param_is_exits(Robot::IS_HOOK)) {
			$robot[Robot::IS_HOOK] = param_filter(Robot::IS_HOOK, false, true);
		}
		if (param_is_exits(Robot::IS_GROUP_SPEECH)) {
			$robot[Robot::IS_GROUP_SPEECH] = param_filter(Robot::IS_GROUP_SPEECH, false, true);
		}
		if (param_is_exits(Robot::IS_PERSONAL_SPEECH)) {
			$robot[Robot::IS_PERSONAL_SPEECH] = param_filter(Robot::IS_PERSONAL_SPEECH, false, true);
		}
		if (param_is_exits(Robot::CREATE_UIN)) {
			$robot[Robot::CREATE_UIN] = param_filter(Robot::CREATE_UIN);
		}
		if (param_is_exits(Robot::MANAGER_UIN)) {
			$robot[Robot::MANAGER_UIN] = param_filter(Robot::MANAGER_UIN);
		}
		return $robot;
	}

	/**
	 * 在页面上添加机器人
	 * @param int $user_id
	 * @param int $robot_uin
	 * @param string $robot_name
	 * @param int $robot_create_uin
	 * @return boolean
	 */
	public static function insertMeByInfo($user_id, $robot_uin, $robot_name, $robot_create_uin) {
		$insertSql = new InsertSql(Robot::TABLE);
		$columnArray = array(
			Robot::USER_ID, Robot::UIN, Robot::NAME, Robot::SECRET, Robot::CREATE_UIN, Robot::CREATEDATE
		);
		$columnValueArray = array(
			$user_id, $robot_uin, $robot_name, getRandString(8), $robot_create_uin, time()
		);
		$insertSql->setInsert($columnArray, $columnValueArray, array(true, true, false, false, true, true));
		return self::INSERT_ME($insertSql);
	}

	/**
	 * 根据机器人ID和用户ID获取机器人
	 * @param int $robot_id
	 * @param int $user_id
	 * @return object_array
	 */
	public static function getMeByIdAndUserId($robot_id, $user_id) {
		$selectSql = new SelectSql(Robot::TABLE);
		$selectSql->setWhere(Robot::ID, $robot_id);
		$selectSql->setWhere(Robot::USER_ID, $user_id);
		return self::GET_ME($selectSql);
	}

	/**
	 * 根据机器人账号和密钥获取机器人
	 * @param int $uin
	 * @param string $secret
	 * @return object_array
	 */
	public static function getMeByUinAndSecret($uin, $secret) {
		$selectSql = new SelectSql(Robot::TABLE);
		$selectSql->setWhere(Robot::UIN, $uin);
		$selectSql->setWhere(Robot::SECRET, $secret);
		return self::GET_ME($selectSql);
	}

	/**
	 * 给机器人续期
	 * @param int $robot_id
	 * @param int $user_id
	 * @param int $limitdate
	 * @return boolean
	 */
	public static function renewalRobot($robot_id, $user_id, $limitdate) {
		$updateSql = new UpdateSql(Robot::TABLE);
		$updateSql->setUpdateValue(Robot::LIMITDATE, $limitdate);
		$updateSql->setWhere(Robot::ID, $robot_id);
		$updateSql->setWhere(Robot::USER_ID, $user_id);
		return self::UPDATE_ME($updateSql);
	}

	/**
	 * 在页面上设置机器人
	 * @param array $robot
	 * @return boolean
	 */
	public static function updateMeByInfo($robot) {
		$updateSql = new UpdateSql(Robot::TABLE);
		if (isset($robot[Robot::UIN])) {
			$updateSql->setUpdateValue(Robot::UIN, $robot[Robot::UIN]);
		}
		if (isset($robot[Robot::NAME])) {
			$updateSql->setUpdateString(Robot::NAME, $robot[Robot::NAME]);
		}
		if (isset($robot[Robot::SECRET])) {
			$updateSql->setUpdateString(Robot::SECRET, $robot[Robot::SECRET]);
		}
		if (isset($robot[Robot::IS_RUN])) {
			$updateSql->setUpdateBool(Robot::IS_RUN, $robot[Robot::IS_RUN]);
			if ($robot[Robot::IS_RUN] == 0) {
				$updateSql->setUpdateValue(Robot::STATUS, StatusUtil::INIT);
			}
		}
		if (isset($robot[Robot::IS_RECONNECTION])) {
			$updateSql->setUpdateBool(Robot::IS_RECONNECTION, $robot[Robot::IS_RECONNECTION]);
		}
		if (isset($robot[Robot::IS_REPLY])) {
			$updateSql->setUpdateBool(Robot::IS_REPLY, $robot[Robot::IS_REPLY]);
		}
		if (isset($robot[Robot::IS_HOOK])) {
			$updateSql->setUpdateBool(Robot::IS_HOOK, $robot[Robot::IS_HOOK]);
		}
		if (isset($robot[Robot::IS_GROUP_SPEECH])) {
			$updateSql->setUpdateBool(Robot::IS_GROUP_SPEECH, $robot[Robot::IS_GROUP_SPEECH]);
		}
		if (isset($robot[Robot::IS_PERSONAL_SPEECH])) {
			$updateSql->setUpdateBool(Robot::IS_PERSONAL_SPEECH, $robot[Robot::IS_PERSONAL_SPEECH]);
		}
		if (isset($robot[Robot::CREATE_UIN])) {
			$updateSql->setUpdateValue(Robot::CREATE_UIN, $robot[Robot::CREATE_UIN]);
		}
		if (isset($robot[Robot::MANAGER_UIN])) {
			$updateSql->setUpdateString(Robot::MANAGER_UIN, $robot[Robot::MANAGER_UIN]);
		}
		$updateSql->setWhere(Robot::ID, $robot[Robot::ID]);
		$updateSql->setWhere(Robot::USER_ID, $robot[Robot::USER_ID]);
		return self::UPDATE_ME($updateSql);
	}

	/**
	 * 获取二维码后修改机器人的cookie和状态
	 * @param string $cookie
	 * @param number $status
	 * @param number $robot_id
	 * @return boolean
	 */
	public static function updateCookieAndStatus($cookie, $status, $robot_id) {
		$updateSql = new UpdateSql(self::TABLE);
		$updateSql->setUpdateString(self::COOKIE, $cookie);
		$updateSql->setUpdateValue(self::STATUS, $status);
		$updateSql->setWhere(self::ID, $robot_id);
		return self::UPDATE_ME($updateSql);
	}

	/**
	 * 修改机器人的Skey和Bkn
	 * @param String $skey
	 * @param String $bkn
	 * @param number $robot_id
	 */
	public static function updateSkeyAndBkn($skey, $bkn, $robot_id) {
		$updateSql = new UpdateSql(self::TABLE);
		$updateSql->setUpdateString(self::SKEY, $skey);
		$updateSql->setUpdateValue(self::BKN, $bkn);
		$updateSql->setWhere(self::ID, $robot_id);
		return self::UPDATE_ME($updateSql);
	}

	/**
	 * 关闭机器人运行并且恢复初始状态
	 * @param number $robot_id
	 * @return boolean
	 */
	public static function setRobotInit($robot_id) {
		$updateSql = new UpdateSql(self::TABLE);
		$updateSql->setUpdateValue(self::IS_RUN, 0);
		$updateSql->setUpdateValue(self::STATUS, StatusUtil::INIT);
		$updateSql->setWhere(self::ID, $robot_id);
		return self::UPDATE_ME($updateSql);
	}

	/**
	 * 获取所有正常在线并且不是挂机模式的机器人
	 */
	public static function getOnlineRobotAll() {
		$selectSql = new SelectSql(self::TABLE);
		$selectSql->setWhere(self::IS_HOOK, false);
		$selectSql->setWhere(self::IS_RUN, true);
		$selectSql->setWhere(self::STATUS, StatusUtil::ONLINE);
		return self::GET_ME($selectSql, true);
	}

}

?>