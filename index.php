<?php

/**
 * 首页
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

require_once './config/web-main.php';

$mod = param_filter("mod", "index");
$action = param_filter("action");

require_once './config/web-template.php';

require_once './config/web-user.php';

require_once MODEL_FOLDER . 'index.php';

?>