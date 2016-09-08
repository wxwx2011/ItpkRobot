<?php

/**
 * 主体文件,一般页面都会加载此文件
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

/**
 * 设置报错级别（这里输出所有错误信息）
 */
error_reporting(E_ALL);

/**
 * 定义一个常量，用来防止别人直接访问程序内部文件
 */
define('ITPK', 'ITPK');

/**
 * 程序安装根目录
 */
define('ITPK_ROOT', substr(dirname(__FILE__), 0, -6));

/**
 * 自定义方法合集，在程序内部可以直接调用里面的方法
 */
require_once ITPK_ROOT . 'other/functions.php';

/**
 * 加载配置文件
 */
require_once ITPK_ROOT . 'config/web-config.php';

/**
 * 自动加载所需类文件
 */
require_once ITPK_ROOT . 'config/web-load.php';

/**
 * 数据库配置文件
 */
require_once ITPK_ROOT . 'config/db-config.php';

/**
 * 当前访问地址的根目录url
 */
define('ITPK_ROOT_URL', (isHttps() ? "https://" : "http://") . $_SERVER['SERVER_NAME'] . dirname($_SERVER["REQUEST_URI"]) . "/");

/**
 * 当前访问地址的根目录url（用本地IP127.0.0.1代替服务器的IP或绑定的域名，用于本地回路访问）
 */
define('ITPK_ROOT_URL_LOCAL', (isHttps() ? "https://" : "http://") . "127.0.0.1" . dirname($_SERVER["REQUEST_URI"]) . "/");

?>