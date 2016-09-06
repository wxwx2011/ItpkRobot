<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 机器人群临时代码跟群号码
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */
class RobotGroupCode extends RobotGroupCodeCommon {

	/**
	 * 更新或添加群检测记录
	 * @param number $robot_id
	 * @param number $group_code
	 * @param number $group_uin
	 * @return boolean
	 */
	public static function replaceMe($robot_id, $from_uin, $group_code, $group_uin) {
		$replaceSql = new ReplaceSql(self::TABLE);
		$replaceSql->setReplace(
			array(self::ROBOT_ID, self::FROM_UIN, self::GROUP_CODE, self::GROUP_UIN, self::CREATEDATE), 
			array($robot_id, $from_uin, $group_code, $group_uin, time()),
			array(true, true, true, true, true)
		);
		return self::REPLACE_ME($replaceSql);
	}

	/**
	 * 根据机器人ID获取所有的群检测记录(两天以内的记录，超过这个时间可能已经失效了)
	 * @param string $robotIds
	 */
	public static function getMeByRobotIds($robotIds) {
		$limittime = time() - 2 * 24 * 60 * 60;
		$selectSql = new SelectSql(self::TABLE);
		$selectSql->setWhereNumber(self::CREATEDATE, $limittime, ">");
		$selectSql->setWhereString(self::ROBOT_ID, $robotIds, "in");
		return self::GET_ME($selectSql, true);
	}
}

?>