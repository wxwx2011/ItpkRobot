<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 机器人COOKIE
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class RobotCookie extends RobotCookieCommon {

	/**
	 * 更新或添加COOKIE
	 * @param int $robot_id
	 * @param string $cookie
	 * @param string $ptwebqq
	 * @param string $vfwebqq
	 * @param string $psessionid
	 * @param string $clientid
	 * @return boolean
	 */
	public static function replaceMe($robot_id, $cookie, $ptwebqq, $vfwebqq, $psessionid, $clientid) {
		$replaceSql = new ReplaceSql(self::TABLE);
		$columnArray = array(
			self::ROBOT_ID, 
			self::COOKIE, 
			self::PTWEBQQ, 
			self::VFWEBQQ, 
			self::PSESSIONID, 
			self::CLIENTID,
			self::CREATEDATE
		);
		$columnValueArray = array(
			$robot_id, 
			$cookie, 
			$ptwebqq, 
			$vfwebqq, 
			$psessionid, 
			$clientid,
			time()
		);
		$replaceSql->setReplace($columnArray, $columnValueArray, array(true, false, false, false, false, false, true));
		return self::REPLACE_ME($replaceSql);
	}

	/**
	 * 根据机器人ID获取所有的机器人COOKIE记录
	 * @param string $robotIds
	 */
	public static function getMeByRobotIds($robotIds) {
		$selectSql = new SelectSql(self::TABLE);
		$selectSql->setWhereString(self::ROBOT_ID, $robotIds, "in");
		return self::GET_ME($selectSql, true);
	}

}

?>