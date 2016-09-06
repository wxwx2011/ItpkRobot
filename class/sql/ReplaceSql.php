<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * Webqq数据库连接类
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 1.0
 */

class ReplaceSql extends BaseSql {

	public function __construct($table) {
		$this->table = $table;
	}

	public function setReplace($columnArray, $columnValueArray, $columnIsnumberArray = array()) {
		if (count($columnIsnumberArray) <= 0 || (count($columnArray) != count($columnIsnumberArray))) {
			$columnIsnumberArray = array();
			foreach ($columnValueArray as $columnValue) {
				array_push($columnIsnumberArray, is_numeric($columnValue));
			}
		}
		$this->setInsertOrReplace($columnArray, $columnValueArray, $columnIsnumberArray, false);
	}

	public function executeReplaceSql($db) {
		return $db->executeQuery($this->getSqlStr()) > 0 ? true : false;
	}

}

?>