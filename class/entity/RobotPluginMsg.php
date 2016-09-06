<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 插件计划任务的消息
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class RobotPluginMsg extends RobotPluginMsgCommon {

	/**
	 * 插入插件计划任务的消息
	 * @param number $robot_id
	 * @param number $plugin_uin
	 * @param string $content
	 * @return boolean
	 */
	public static function insertMe($plugin_uin, $content) {
		$insertSql = new InsertSql(self::TABLE);
		$columnArray = array(
			self::ROBOT_PLUGIN_UIN, self::CONTENT, self::CREATEDATE
		);
		$columnValueArray = array(
			$plugin_uin, $content, time()
		);
		$insertSql->setInsert($columnArray, $columnValueArray, array(true, false, true));
		return self::INSERT_ME2($insertSql);
	}

}

?>
