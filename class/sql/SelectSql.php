<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * Webqq数据库连接类
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 1.0
 */

class SelectSql extends BaseSql {

	public function __construct($table, $columns = "*") {
		$this->table = $table;
		$this->setSelectTable($columns);
	}

	public function setOrder($order, $is_asc = "ASC") {
		$this->sql .= " ORDER BY " . $order . " " . $is_asc;
	}

	public function setOrderDesc($order) {
		$this->sql .= " ORDER BY " . $order . " DESC";
	}

	public function setLimitAndOffset($limit = 1, $offset = 0) {
		$this->sql .= " LIMIT " . $limit . " OFFSET " . $offset;
	}

	/**
	 * 执行sql查询
	 * @param AbstractDBManager $db
	 * @param boolean $is_array
	 */
	public function executeSelectSql($db, $is_array = false) {
		return $db->executeQuery($this->getSqlStr(), true, $is_array);
	}

}

?>