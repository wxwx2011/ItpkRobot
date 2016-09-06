<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 机器人群消息
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class RobotGroupMsg extends RobotGroupMsgCommon {

	/**
	 * 插入群消息
	 * @param number $robot_id
	 * @param number $group_code
	 * @param number $send_uin
	 * @param number $from_uin
	 * @param string $content
	 * @return boolean
	 */
	public static function insertMe($robot_id, $group_code, $send_uin, $from_uin, $content) {
		$insertSql = new InsertSql(self::TABLE);
		$columnArray = array(
			self::ROBOT_ID, self::GROUP_CODE, self::SEND_UIN, self::FROM_UIN, self::CONTENT, self::CREATEDATE
		);
		$columnValueArray = array(
			$robot_id, $group_code, $send_uin, $from_uin, $content, time()
		);
		$insertSql->setInsert($columnArray, $columnValueArray, array(true, true, true, true, false, true));
		return self::INSERT_ME2($insertSql);
	}

}

?>
