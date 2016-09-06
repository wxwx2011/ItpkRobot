<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 机器人群成员
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */
class RobotGroupMember extends RobotGroupMemberCommon {

	/**
	 * 获取群成员基本信息
	 * @param number $robot_id
	 * @param number $group_uin
	 * @param number $member_uin
	 * @return array
	 */
	public static function getMeByInfos($robot_id, $group_uin, $member_uin) {
		$selectSql = new SelectSql(self::TABLE);
		$selectSql->setWhereNumber(self::ROBOT_ID, $robot_id);
		$selectSql->setWhereNumber(self::GROUP_UIN, $group_uin);
		$selectSql->setWhereNumber(self::MEMBER_UIN, $member_uin);
		return $selectSql->executeSelectSql(self::GET_DB());
	}

	/**
	 * 新增群成员记录
	 * @param string $robot_id
	 * @param string $group_uin
	 * @param string $member_uin
	 * @param string $nick_name
	 * @return boolean
	 */
	public static function insertMe($robot_id, $group_uin, $member_uin, $nick_name) {
		$insertSql = new InsertSql(self::TABLE);
		$insertSql->setInsert(
			array(self::ROBOT_ID, self::GROUP_UIN, self::MEMBER_UIN, self::NICKNAME, self::CREATEDATE),
			array($robot_id, $group_uin, $member_uin, $nick_name, time()),
			array(true, true, true, false, true)
		);
		return $insertSql->executeInsertSql2(self::GET_DB());
	}

	/**
	 * 更新机器人插件定位
	 * @param int $id
	 * @param int $plugin_id
	 * @return boolean
	 */
	public static function updatePluginId($id, $plugin_id) {
		$updateSql = new UpdateSql(self::TABLE);
		$updateSql->setUpdateValue(self::PLUGIN_ID, $plugin_id);
		$updateSql->setWhere(self::ID, $id);
		return $updateSql->executeUpdateSql(self::GET_DB());
	}
}

?>