<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 系统用户
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class UserCommon extends EntityCommon {

	const TABLE			= "itpk_user";
	const ID			= "id";
	const ROLE_ID		= "role_id";
	const NICKNAME		= "nickname";
	const PASSWORD		= "password";
	const MAIL			= "mail";
	const PHONE			= "phone";
	const QQ			= "qq";
	const GOLD			= "gold";
	const INVITATION	= "invitation";
	const USER_CHECK	= "user_check";
	const REG_IP		= "reg_ip";
	const CREATEDATE	= "createdate";

}
?>