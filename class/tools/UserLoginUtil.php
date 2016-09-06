<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 用户登录状态
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class UserLoginUtil {

	/**
	 * 没有登录
	 */
	const NO_LOGIN			= 0;

	/**
	 * 登录成功
	 */
	const SUCCESS			= 1;

	/**
	 * COOKIE失效
	 */
	const COOKIE_FAIL		= 2;

	/**
	 * 违规访问
	 */
	const WARNING			= 3;

}

?>