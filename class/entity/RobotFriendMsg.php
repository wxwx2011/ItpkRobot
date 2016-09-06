<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 机器人好友消息
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class RobotFriendMsg extends RobotFriendMsgCommon {

	/**
	 * 插入机器人好友消息
	 * @param number $robot_id
	 * @param number $from_uin
	 * @param string $content
	 * @return boolean
	 */
	public static function insertMe($robot_id, $from_uin, $content) {
		$insertSql = new InsertSql(self::TABLE);
		$columnArray = array(
			self::ROBOT_ID, self::FROM_UIN, self::CONTENT, self::CREATEDATE
		);
		$columnValueArray = array(
			$robot_id, $from_uin, $content, time()
		);
		$insertSql->setInsert($columnArray, $columnValueArray, array(true, true, false, true));
		return self::INSERT_ME2($insertSql);
	}

}

?>
