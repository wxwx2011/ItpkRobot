<?php

/**
 * Webqq二维码图片
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 1.2
 */

require_once './config/web-main.php';

require_once './config/web-user.php';

/**
 * 如果用户不是登录成功状态则跳转到登录页面
 */
if (LOGIN_STATUS != UserLoginUtil::SUCCESS) header("location:login.php");

/**
 * 如果没有接收到uin参数，则跳转到机器人列表页面
 */
if (!param_is_exits("robot_id")) header("location:robot.php");

/**
 * 获取二维码
 */
$qrcode = RobotQrcode::GET_ME_BY_COLUMN(RobotQrcode::TABLE, RobotQrcode::ROBOT_ID, param_filter("robot_id"));

/**
 * 如果没有获取到验证码则返回no img
 */
if (!$qrcode) exit("no img");

/**
 * 定义图片输出
 */
header("Content-type: image/png");

/**
 * 判断是不是windows主机
 */
if (start_contain("WIN", PHP_OS)) {
	/**
	 * 防止php将utf8的bom头输出
	 */
	ob_clean();
}

/**
 * 输出二维码图片
 */
echo $qrcode[RobotQrcode::IMAGE];

?>