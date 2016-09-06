<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 机器人系统消息
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class RobotSystemMsg extends RobotSystemMsgCommon {

	/**
	 * 插入系统消息
	 * @param number $robot_id
	 * @param string $content
	 * @return boolean
	 */
	public static function insertMe($robot_id, $content) {
		$insertSql = new InsertSql(self::TABLE);
		$columnArray = array(
			self::ROBOT_ID, self::CONTENT, self::CREATEDATE
		);
		$columnValueArray = array(
			$robot_id, $content, time()
		);
		$insertSql->setInsert($columnArray, $columnValueArray, array(true, false, true));
		return self::INSERT_ME($insertSql);
	}

}

?>
