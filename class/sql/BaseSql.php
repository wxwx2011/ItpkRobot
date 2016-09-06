<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * Webqq数据库连接类
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 1.0
 */

class BaseSql {

	protected $sql;
	protected $table;

	protected function setSelectTable($columns = "*") {
		$this->sql = "SELECT " . $columns . " FROM " . $this->table;
	}

	protected function setDeleteTable() {
		$this->sql = "DELETE FROM " . $this->table;
	}

	protected function setUpdateTable() {
		$this->sql = "UPDATE " . $this->table;
	}

	protected function setInsertOrReplace($columnArray, $columnValueArray, $columnIsnumberArray, $is_insert = true) {
		$this->sql = ($is_insert ? "INSERT" : "REPLACE") . " INTO " . $this->table;
		$columnSql = "";
		for ($i = 0; $i < count($columnArray); $i++) {
			if ($columnSql != "") {
				$columnSql .= ", ";
			}
			$columnSql .= $columnArray[$i];
		}
		$columnValueSql = "";
		for ($i = 0; $i < count($columnValueArray); $i++) {
			if ($columnValueSql != "") {
				$columnValueSql .= ", ";
			}
			if (is_bool($columnValueArray[$i])) {
				$columnValueSql .= $columnValueArray[$i] ? 1 : 0;
			} elseif ($columnIsnumberArray[$i]) {
				$columnValueSql .= $columnValueArray[$i];
			} else {
				$columnValueSql .= ("'" . $columnValueArray[$i] . "'");
			}
		}
		$this->sql .= " (" . $columnSql . ") VALUES (" . $columnValueSql . ")";
	}

	private function setWhereForAndOr($column, $columnValue, $term = "=", $is_number, $is_and = true) {
		if (!is_contain("WHERE", $this->sql)) {
			$this->sql .= " WHERE ";
		} else {
			$this->sql .= ($is_and ? " AND " : " OR ");
		}
		if (is_bool($columnValue)) {
			$columnValue = $columnValue ? 1 : 0;
		} elseif (!is_numeric($columnValue) || !$is_number) {
			$columnValue = "'" . $columnValue . "'";
		}
		$this->sql .= ($column . " " . $term . " (" . $columnValue . ")");
	}

	public function setWhere($column, $columnValue, $term = "=") {
		$this->setWhereForAndOr($column, $columnValue, $term, true, true);
	}

	public function setWhereNumber($column, $columnValue, $term = "=") {
		$this->setWhereForAndOr($column, $columnValue, $term, true, true);
	}

	public function setWhereString($column, $columnValue, $term = "=") {
		$this->setWhereForAndOr($column, $columnValue, $term, false, true);
	}

	public function setWhereOr($column, $columnValue, $term = "=") {
		$this->setWhereForAndOr($column, $columnValue, $term, true, false);
	}

	public function setWhereOrNumber($column, $columnValue, $term = "=") {
		$this->setWhereForAndOr($column, $columnValue, $term, true, false);
	}

	public function setWhereOrString($column, $columnValue, $term = "=") {
		$this->setWhereForAndOr($column, $columnValue, $term, false, false);
	}

	protected function getSqlStr() {
		return $this->sql;
	}

}

?>