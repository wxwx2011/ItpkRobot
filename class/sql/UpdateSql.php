<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * Webqq数据库连接类
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 1.0
 */

class UpdateSql extends BaseSql {

	public function __construct($table) {
		$this->table = $table;
		$this->setUpdateTable();
	}

	public function setUpdateValue($column, $columnValue) {
		if (!is_contain("SET", $this->sql)) {
			$this->sql .= " SET ";
		} else {
			$this->sql .= ", ";
		}
		if (!is_numeric($columnValue)) {
			$columnValue = "'" . $columnValue . "'";
		}
		$this->sql .= ($column . " = " . $columnValue);
	}

	public function setUpdateNumber($column, $columnValue) {
		$this->setUpdateValue($column, $columnValue);
	}

	public function setUpdateString($column, $columnValue) {
		if (!is_contain("SET", $this->sql)) {
			$this->sql .= " SET ";
		} else {
			$this->sql .= ", ";
		}
		$this->sql .= ($column . " = '" . $columnValue . "'");
	}

	public function setUpdateBool($column, $columnValue) {
		if (!is_contain("SET", $this->sql)) {
			$this->sql .= " SET ";
		} else {
			$this->sql .= ", ";
		}
		if ($columnValue || $columnValue == 1 || $columnValue == "true") {
			$columnValue = 1;
		} else {
			$columnValue = 0;
		}
		$this->sql .= ($column . " = " . $columnValue);
	}

	public function setUpdateSelfValue($column, $columnValue, $symbol = "+") {
		if (!is_contain("SET", $this->sql)) {
			$this->sql .= " SET ";
		} else {
			$this->sql .= ", ";
		}
		if (!is_numeric($columnValue)) {
			$columnValue = "'" . $columnValue . "'";
		}
		$this->sql .= ($column . " = " . $column . " " . $symbol . " " . $columnValue);
	}

	public function setUpdateSelfNumber($column, $columnValue, $symbol = "+") {
		$this->setUpdateSelfValue($column, $columnValue, $symbol);
	}

	public function setUpdateSelfString($column, $columnValue, $symbol = "+") {
		if (!is_contain("SET", $this->sql)) {
			$this->sql .= " SET ";
		} else {
			$this->sql .= ", ";
		}
		$this->sql .= ($column . " = " . $column . " " . $symbol . " '" . $columnValue . "'");
	}

	public function executeUpdateSql($db) {
		return $db->executeQuery($this->getSqlStr()) > 0 ? true : false;
	}

}

?>