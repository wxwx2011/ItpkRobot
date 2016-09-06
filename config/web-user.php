<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 获取当前用户的信息，并判断登陆状态
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

/**
 * 开启SESSION
 */
session_start();

require_once './other/check-login.php';

/**
 * 用户登录状态
 * @var int
 */
define('LOGIN_STATUS', $user_login_status);

/**
 * 用户ID
 * @var int
*/
define('USER_ID', $user_id);

/**
 * 用户名
 * @var string
*/
define('USER_NAME', $nickname);

/**
 * 用户角色ID
 * @var int
*/
define('ROLE_ID', $role_id);

/**
 * 用户现有金币
 * @var int
 */
define('USER_GOLD', $user_gold);

unset($user_login_status);
unset($user_id);
unset($nickname);
unset($role_id);
unset($user_gold);

?>