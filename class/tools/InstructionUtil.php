<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 判断插件指令的类型
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 1.0
 */

class InstructionUtil {

	/**
	 * 指令同消息相等
	 * @var int
	 */
	const EQUAL				= 1;

	/**
	 * 消息开头包含指令
	 * @var int
	 */
	const START_CONTAIN		= 2;

	/**
	 * 消息结尾包含指令
	 * @var int
	 */
	const END_CONTAIN		= 3;

	/**
	 * 消息任意位置中包含指令
	 * @var int
	 */
	const IS_CONTAIN		= 4;

}

?>