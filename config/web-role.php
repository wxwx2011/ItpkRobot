<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 获取当前用户的角色
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

$user_role = null;

if (defined('ROLE_ID')) {
	$user_role = Role::GET_ME_BY_ID(Role::TABLE, ROLE_ID);
}

?>