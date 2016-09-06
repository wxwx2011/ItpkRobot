<?php if (!defined('ITPK')) exit('You can not directly access the file.');

class User extends UserCommon {

	public static function LOGIN($mail, $password) {
		$selectSql = new SelectSql(User::TABLE);
		$selectSql->setWhereString("mail", $mail);
		$selectSql->setWhereString("password", $password);
		$selectSql->setLimitAndOffset(1);
		return self::GET_ME($selectSql);
	}

	public static function REG($username, $email, $password) {
		$insertSql = new InsertSql(User::TABLE);
		$columnArray = array(
			"role_id", "nickname", "password", "mail", "invitation", "reg_ip", "createdate"
		);
		$columnValueArray = array(
			1, $username, $password, $email, getRandString(8, 1), getIP(), time()
		);
		$columnIsnumberArray = array(
			true, false, false, false, false, false, true
		);
		$insertSql->setInsert($columnArray, $columnValueArray, $columnIsnumberArray);
		return self::INSERT_ME($insertSql);
	}

	/**
	 * 增加或减少用户的金币
	 * @param int $user_id
	 * @param int $gold
	 * @param string $symbol
	 * @return boolean
	 */
	public static function updateGold($user_id, $gold, $symbol = "+") {
		$updateSql = new UpdateSql(User::TABLE);
		$updateSql->setUpdateSelfValue(User::GOLD, $gold, $symbol);
		$updateSql->setWhere(User::ID, $user_id);
		return self::UPDATE_ME($updateSql);
	}

}

?>