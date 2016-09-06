<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 机器人续期配置
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class RenewalCommon extends EntityCommon {

	const TABLE			= "itpk_renewal";
	const ID			= "id";
	const NAME			= "name";
	const DAY_TIME		= "day_time";
	const GOLD			= "gold";
	const SORT			= "sort";
	const CREATEDATE	= "createdate";

	public static function TABLE_ID() {
		return Renewal::TABLE . "_" . Renewal::ID;
	}

	public static function TABLE_NAME() {
		return Renewal::TABLE . "_" . Renewal::NAME;
	}

	public static function TABLE_DAY_TIME() {
		return Renewal::TABLE . "_" . Renewal::DAY_TIME;
	}

	public static function TABLE_GOLD() {
		return Renewal::TABLE . "_" . Renewal::GOLD;
	}

	public static function TABLE_SORT() {
		return Renewal::TABLE . "_" . Renewal::SORT;
	}

	public static function TABLE_CREATEDATE() {
		return Renewal::TABLE . "_" . Renewal::CREATEDATE;
	}

}

?>