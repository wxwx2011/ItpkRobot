<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 机器人插件
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */
class RobotPlugin extends RobotPluginCommon {

	/**
	 * 根据相关信息获取所有的相关插件
	 * @param boolean $is_monitor_all_msg 是否为监控所有消息
	 * @param boolean $is_able 是否开启状态下
	 * @return array
	 */
	public static function getAllsByInfos($is_monitor_all_msg, $is_able) {
		$selectSql = new SelectSql(self::TABLE);
		$selectSql->setWhere(self::IS_MONITOR_ALL_MSG, $is_monitor_all_msg);
		$selectSql->setWhere(self::IS_ABLE, $is_able);
		$selectSql->setOrder(self::ID);
		return $selectSql->executeSelectSql(self::GET_DB(), true);
	}
}

?>