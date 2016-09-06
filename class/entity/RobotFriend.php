<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 机器人好友
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */
class RobotFriend extends RobotFriendCommon {

	/**
	 * 保存好友信息
	 * @param int $robot_id
	 * @param int $friend_uin
	 * @param string $nick_name
	 * @param int $plugin_id
	 * @return int
	 */
	public static function insertMe($robot_id, $friend_uin, $nick_name, $plugin_id = 0) {
		$insertSql = new InsertSql(self::TABLE);
		$insertSql->setInsert(
			array(self::ROBOT_ID, self::UIN, self::NICKNAME, self::PLUGIN_ID, self::CREATEDATE), 
			array($robot_id, $friend_uin, $nick_name, $plugin_id, time()),
			array(true, true, false, true, true)
		);
		return self::INSERT_ME2($insertSql);
	}

	/**
	 * 根据机器人ID和好友uin获取机器人好友
	 * @param int $robot_id
	 * @param int $friend_uin
	 */
	public static function getMeByRobotIdAndFriendUin($robot_id, $friend_uin) {
		$selectSql = new SelectSql(self::TABLE);
		$selectSql->setWhereNumber(self::ROBOT_ID, $robot_id);
		$selectSql->setWhereNumber(self::UIN, $friend_uin);
		return self::GET_ME($selectSql);
	}

	/**
	 * 更新好友插件定位
	 * @param int $group_member_id
	 * @param int $plugin_id
	 * @return boolean
	 */
	public static function updatePluginId($id, $plugin_id) {
		$updateSql = new UpdateSql(self::TABLE);
		$updateSql->setUpdateNumber(self::PLUGIN_ID, $plugin_id);
		$updateSql->setWhereNumber(self::ID, $id);
		return self::UPDATE_ME($updateSql);
	}
}

?>