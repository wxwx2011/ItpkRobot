<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * QQ机器人状态
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 1.0
 */

class StatusUtil {

	/**
	 * 初始状态
	 * @var int
	 */
	const INIT				= 1;

	/**
	 * 等待用户点击登录生成加密的密码
	 * @var int
	 */
	const LOADING_RSA		= 2;

	/**
	 * 等待用户扫描二维码
	 * @var int
	 */
	const LOADING_VERIFY	= 3;

	/**
	 * webqq登录中
	 * @var int
	 */
	const LOADING_LOGIN		= 4;

	/**
	 * 其它状态
	 * @var int
	 */
	const OTHER				= 8;

	/**
	 * 正常在线
	 * @var int
	 */
	const ONLINE			= 9;

	/**
	 * 二维码验证成功
	 * @var int
	 */
	const EWM_SUCCES		= 0;

	/**
	 * 二维码已失效
	 * @var int
	 */
	const EWM_FAIL			= 65;

	/**
	 * 二维码未失效
	 * @var int
	 */
	const EWM_ONLINE		= 66;

	/**
	 * 二维码正在验证中
	 * @var int
	 */
	const EWM_LOADING		= 67;

}

?>