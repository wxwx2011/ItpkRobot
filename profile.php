<?php

/**
 * 个人中心
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

require_once './config/web-main.php';

$mod = param_filter("mod", "info");
$action = param_filter("action");

require_once './config/web-template.php';
require_once './config/web-user.php';
require_once './config/web-role.php';

if (LOGIN_STATUS != UserLoginUtil::SUCCESS) header("location:index.php");

require_once MODEL_FOLDER . 'profile.php';

?>