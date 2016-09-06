<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 用来记录一些系统消息
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class SystemMsg extends SystemMsgCommon {

	/**
	 * 插入系统消息
	 * @param string $content
	 * @return boolean
	 */
	public static function insertMe($content) {
		$insertSql = new InsertSql(self::TABLE);
		$columnArray = array(
			self::CONTENT, self::CREATEDATE
		);
		$columnValueArray = array(
			$content, time()
		);
		$insertSql->setInsert($columnArray, $columnValueArray, array(false, true));
		return self::INSERT_ME($insertSql);
	}

}

?>
