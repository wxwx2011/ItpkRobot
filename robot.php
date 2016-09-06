<?php

/**
 * 机器人
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

require_once './config/web-main.php';

$mod = param_filter("mod", "list");
$action = param_filter("action");

require_once './config/web-template.php';

require_once './config/web-user.php';

if (LOGIN_STATUS != UserLoginUtil::SUCCESS) header("location:index.php");

require_once MODEL_FOLDER . 'robot.php';

?>