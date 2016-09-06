<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 父类
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class EntityCommon extends WebDBConnection {

	/**
	 * 根据selectSql获取数据
	 * @param SelectSql $selectSql
	 * @param boolean $is_array
	 */
	public static function GET_ME($selectSql, $is_array = false) {
		return $selectSql->executeSelectSql(self::GET_DB(), $is_array);
	}

	/**
	 * 根据insertSql插入数据
	 * @param InsertSql $insertSql
	 */
	public static function INSERT_ME($insertSql) {
		return $insertSql->executeInsertSql(self::GET_DB());
	}

	/**
	 * 根据insertSql插入数据，并返回插入的ID值
	 * @param InsertSql $insertSql
	 */
	public static function INSERT_ME2($insertSql) {
		return $insertSql->executeInsertSql2(self::GET_DB());
	}

	/**
	 * 根据updateSql修改数据
	 * @param UpdateSql $updateSql
	 */
	public static function UPDATE_ME($updateSql) {
		return $updateSql->executeUpdateSql(self::GET_DB());
	}

	/**
	 * 根据deleteSql删除数据
	 * @param DeleteSql $deleteSql
	 */
	public static function DELETE_ME($deleteSql) {
		return $deleteSql->executeDeleteSql(self::GET_DB());
	}

	/**
	 * 根据replaceSql替换数据
	 * @param ReplaceSql $replaceSql
	 */
	public static function REPLACE_ME($replaceSql) {
		return $replaceSql->executeReplaceSql(self::GET_DB());
	}

	public static function GET_ME_ALL($table, $order = "id", $sort = "DESC") {
		$selectSql = new SelectSql($table);
		$selectSql->setOrder($order, $sort);
		return self::GET_ME($selectSql, true);
	}

	public static function GET_ME_ALL_BY_COLUMN($table, $column, $column_value, $order = "id", $sort = "DESC") {
		$selectSql = new SelectSql($table);
		$selectSql->setWhere($column, $column_value);
		$selectSql->setOrder($order, $sort);
		return self::GET_ME($selectSql, true);
	}

	public static function GET_COUNT($table) {
		$countSql = new SelectSql($table, "count(1) as count");
		$countResult = self::GET_ME($countSql);
		$count = $countResult ? intval($countResult['count']) : 0;
		return $count;
	}

	public static function GET_ME_LIMIT($table, $limit, $offset, $order = "id", $sort = "DESC") {
		$selectSql = new SelectSql($table);
		$selectSql->setOrder($order, $sort);
		$selectSql->setLimitAndOffset($limit, $offset);
		return self::GET_ME($selectSql, true);
	}

	public static function GET_COUNT_BY_COLUMN($table, $column, $column_value) {
		$countSql = new SelectSql($table, "count(1) as count");
		$countSql->setWhere($column, $column_value);
		$countResult = self::GET_ME($countSql);
		$count = $countResult ? intval($countResult['count']) : 0;
		return $count;
	}

	public static function GET_ME_LIMIT_BY_COLUMN($table, $column, $column_value, $limit, $offset, $order = "id", $sort = "DESC") {
		$selectSql = new SelectSql($table);
		$selectSql->setWhere($column, $column_value);
		$selectSql->setOrder($order, $sort);
		$selectSql->setLimitAndOffset($limit, $offset);
		return self::GET_ME($selectSql, true);
	}

	public static function GET_ME_BY_COLUMN($table, $column, $column_value, $is_array = false) {
		$selectSql = new SelectSql($table);
		$selectSql->setWhere($column, $column_value);
		return self::GET_ME($selectSql, $is_array);
	}

	public static function GET_ME_BY_ID($table, $id) {
		return self::GET_ME_BY_COLUMN($table, "id", $id, false);
	}

	public static function DELETE_ME_BY_COLUMN($table, $column, $column_value) {
		$deleteSql = new DeleteSql($table);
		$deleteSql->setWhere($column, $column_value);
		return self::DELETE_ME($deleteSql);
	}

	public static function DELETE_ME_BY_ID($table, $id) {
		return self::DELETE_ME_BY_COLUMN($table, "id", $id);
	}

	public static function UPDATE_ME_BY_COLUMN($table, $column, $columnValue, $where, $whereValue) {
		$updateSql = new UpdateSql($table);
		$updateSql->setUpdateValue($column, $columnValue);
		$updateSql->setWhere($where, $whereValue);
		return self::UPDATE_ME($updateSql);
	}

	public static function GET_INT_COLUMNS($entityArray, $column) {
		$columns = "";
		foreach ($entityArray as $entity) {
			if (trim($entity[$column]) == "") continue;
			if ($columns != "") $columns .= ",";
			$columns .= $entity[$column];
		}
		return $columns;
	}

	public static function GET_STRING_COLUMNS($entityArray, $column) {
		$columns = "";
		foreach ($entityArray as $entity) {
			if (trim($entity[$column]) == "") continue;
			if ($columns != "") $columns .= ",";
			$columns .= ("'" . $entity[$column] . "'");
		}
		// 放了方便程序的自定义sql工具，所以去除首尾的单引号，sql工具会在字符串首尾自动加入单引号
		return ltrim(rtrim($columns, "'"), "'");
	}

}

?>