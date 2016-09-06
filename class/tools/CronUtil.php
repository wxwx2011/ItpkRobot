<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 计划任务状态定义值
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 1.0
 */

class CronUtil {

	/**
	 * 运行状态
	 * @var int
	 */
	const RUN			= 1;

	/**
	 * 暂停状态
	 * @var int
	 */
	const STOP			= 2;

	/**
	 * 退出状态
	 * @var int
	 */
	const _EXIT			= 9;

}

?>