<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 用来记录一些系统定义的值
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class System extends SystemCommon {

	/**
	 * 根据系统定义的标记和名字来获取对应的值
	 * @param string $mark
	 * @param string $name
	 * @return Ambigous <boolean, unknown>
	 */
	public static function getContentByMarkAndName($mark, $name, $default = false) {
		$selectSql = new SelectSql(self::TABLE, self::CONTENT);
		$selectSql->setWhere(self::MARK, $mark);
		$selectSql->setWhere(self::NAME, $name);
		$system = self::GET_ME($selectSql);
		return $system ? $system[self::CONTENT] : $default;
	}

	/**
	 * 查找定义的标记和名字对应的值，如果没有则添加一个默认值
	 * @param string $mark
	 * @param string $name
	 * @param string $default
	 * @return Ambigous <boolean, unknown>
	 */
	public static function findOrReplace($mark, $name, $default = false) {
		$selectSql = new SelectSql(self::TABLE, self::CONTENT);
		$selectSql->setWhere(self::MARK, $mark);
		$selectSql->setWhere(self::NAME, $name);
		$system = self::GET_ME($selectSql);
		if (!$system && $default) {
			self::replaceMe($mark, $name, $default);
		}
		return $system ? $system[self::CONTENT] : $default;
	}

	/**
	 * 替换定义的标记和名字对应的值
	 * @param string $mark
	 * @param string $name
	 * @param string $content
	 * @return boolean
	 */
	public static function replaceMe($mark, $name, $content) {
		$replaceSql = new ReplaceSql(self::TABLE);
		$columnArray = array(
			self::MARK, self::NAME, self::CONTENT
		);
		$columnValueArray = array(
			$mark, $name, $content
		);
		$replaceSql->setReplace($columnArray, $columnValueArray, array(false, false, false));
		return self::REPLACE_ME($replaceSql);
	}

}

?>
