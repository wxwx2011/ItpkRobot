<?php 

/**
 * 计划任务监控文件
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 1.0
 */

/**
 * 加载主体文件
 */
require_once './config/web-main.php';

/**
 * 定义激活计划任务的超时时间
 */
define('TASK_TIMEOUT', 3);

/**
 * 记录激活之前的时间
 */
$start_time = time();

/**
 * 访问计划任务程序激活它
 */
$ch = curl_init(ITPK_ROOT_URL_LOCAL . "cron/task.php");
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: {$_SERVER['HTTP_HOST']}"));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, TASK_TIMEOUT);
$result = curl_exec($ch);
curl_close($ch);

/**
 * 输出激活结果
 */
header("Content-type:text/plain; Charset=utf-8");

if (time() - $start_time == TASK_TIMEOUT) {
	exit("计划任务激活成功");
} else {
	exit($result);
}

?>