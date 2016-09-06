<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 系统角色
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class RoleCommon extends EntityCommon {

	const TABLE				= "itpk_role";
	const ID				= "id";
	const NAME				= "name";
	const JURISDICTION		= "jurisdiction";
	const ROBOT_MAX_NUMBER	= "robot_max_number";
	const INIT_GOLD			= "init_gold";
	const SORT				= "sort";
	const CREATEDATE		= "createdate";

}
?>