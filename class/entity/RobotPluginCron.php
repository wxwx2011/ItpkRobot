<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 插件计划任务
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */
class RobotPluginCron extends RobotPluginCronCommon {

	/**
	 * 获取所有的插件计划任务
	 * @param boolean $is_able 是否为禁用的计划任务
	 * @return array
	 */
	public static function getPluginCronAll($is_able = false) {
		$selectSql = new SelectSql(self::TABLE);
		$selectSql->setWhere(self::IS_ABLE, $is_able);
		$selectSql->setOrder(self::ID);
		return self::GET_ME($selectSql, true);
	}

	/**
	 * 根据ID修改插件计划任务最后的执行时间
	 * @param number $id
	 * @param number $time
	 * @return boolean
	 */
	public static function updateLastActionTimeById($id, $time) {
		$updateSql = new UpdateSql(self::TABLE);
		$updateSql->setUpdateNumber(self::LASTACTIONTIME, $time);
		$updateSql->setWhereNumber(self::ID, $id);
		return self::UPDATE_ME($updateSql);
	}

	/**
	 * 根据多个ID批量修改插件计划任务最后的执行时间
	 * @param string $ids
	 * @param number $time
	 * @return boolean
	 */
	public static function updateLastActionTimeByIds($ids, $time) {
		$updateSql = new UpdateSql(self::TABLE);
		$updateSql->setUpdateNumber(self::LASTACTIONTIME, $time);
		$updateSql->setWhere(self::ID, $ids, "in");
		return self::UPDATE_ME($updateSql);
	}

}

?>