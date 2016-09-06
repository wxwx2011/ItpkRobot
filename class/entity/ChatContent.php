<?php if (!defined('ITPK')) exit('You can not directly access the file.');

class ChatContent extends ChatContentCommon {

	/**
	 * 根据发言时间排序，获取聊天室聊天记录（非置顶和非删除的发言）
	 * @param number $limit
	 * @param number $offset
	 * @return array
	 */
	public static function GET_NEW_CHAT_RECORD($limit = 10, $offset = 0) {
		$table = ChatContent::TABLE . " c LEFT JOIN " . User::TABLE . " u ON c." . ChatContent::USER_ID . " = u." . User::ID;
		$selectSql = new SelectSql($table, "c.*, u.nickname");
		$selectSql->setWhere("c." . ChatContent::IS_DELETE, false);
		$selectSql->setWhere("c." . ChatContent::IS_TOP, false);
		$selectSql->setOrderDesc("c." . ChatContent::CREATEDATE);
		$selectSql->setLimitAndOffset($limit, $offset);
		return self::GET_ME($selectSql, true);
	}

	/**
	 * 获取聊天室发言总数（非置顶和非删除的发言）
	 */
	public static function GET_CHAT_COUNT() {
		$selectSql = new SelectSql(ChatContent::TABLE, "count(1) AS count");
		$selectSql->setWhere(ChatContent::IS_DELETE, false);
		$selectSql->setWhere(ChatContent::IS_TOP, false);
		$result = self::GET_ME($selectSql, false);
		return $result ? $result['count'] : 0;
	}

	/**
	 * 新增聊天室发言记录
	 * @param number $user_id
	 * @param string $content
	 * @param string $send_ip
	 */
	public static function INSERT_CHAT_CONTENT($user_id, $content, $send_ip) {
		$insertSql = new InsertSql(ChatContent::TABLE);
		$columnArray = array(
			ChatContent::USER_ID, ChatContent::CONTENT, ChatContent::SEND_IP, ChatContent::CREATEDATE
		);
		$columnValueArray = array(
			$user_id, $content, $send_ip, time()
		);
		$insertSql->setInsert($columnArray, $columnValueArray, array(true, false, false, true));
		return self::INSERT_ME($insertSql);
	}

}

?>