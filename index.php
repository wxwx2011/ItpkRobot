<?php

/**
 * 首页
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

/**
 * 导入主体文件
 */
require_once './config/web-main.php';

/**
 * 接收两个重要参数，mod用来判断功能类型，action用来控制功能的各种具体实现
 */
$mod = param_filter("mod", "index");
$action = param_filter("action");

/**
 * 获取默认的模板，用于页面上的展示
 */
require_once './config/web-template.php';

/**
 * 检查用户的登录状态，并获取用户相关信息
 */
require_once './config/web-user.php';

/**
 * 导入/model目录对应的逻辑处理文件
 */
require_once MODEL_FOLDER . 'index.php';

?>