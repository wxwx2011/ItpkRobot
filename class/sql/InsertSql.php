<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * Webqq数据库连接类
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 1.0
 */

class InsertSql extends BaseSql {

	public function __construct($table) {
		$this->table = $table;
	}

	public function setInsert($columnArray, $columnValueArray, $columnIsnumberArray = array()) {
		if (count($columnIsnumberArray) <= 0 || (count($columnArray) != count($columnIsnumberArray))) {
			$columnIsnumberArray = array();
			foreach ($columnValueArray as $columnValue) {
				array_push($columnIsnumberArray, is_numeric($columnValue));
			}
		}
		$this->setInsertOrReplace($columnArray, $columnValueArray, $columnIsnumberArray, true);
	}

	/**
	 * 插入数据，返回true表示插入成功，true表示插入失败
	 * @param AbstractDBManager $db
	 * @return boolean
	 */
	public function executeInsertSql($db) {
		return $db->executeQuery($this->getSqlStr()) > 0 ? true : false;
	}

	/**
	 * 插入数据，并返回插入数据的ID
	 * @param AbstractDBManager $db
	 * @return number
	 */
	public function executeInsertSql2($db) {
		$result = $db->executeQuery($this->getSqlStr());
		if ($result > 0) {
			return $db->returnInsertId();
		}
		return -1;
	}

}

?>