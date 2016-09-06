<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 配置文件
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

/**
 * 类文件根目录
 */
define('CLASS_FOLDER', ITPK_ROOT . 'class/');

/**
 * 公共包文件存放目录
 */
define('COMMON_FOLDER', CLASS_FOLDER . 'common/');

/**
 * 实体类文件存放目录
 */
define('ENTITY_FOLDER', CLASS_FOLDER . 'entity/');

/**
 * 数据库连接文件存放目录
 */
define('DB_FOLDER', CLASS_FOLDER . 'db/');

/**
 * 数据库操作文件存放目录
 */
define('HANDLER_FOLDER', CLASS_FOLDER . 'handler/');

/**
 * 工具文件存放目录
 */
define('TOOLS_FOLDER', CLASS_FOLDER . 'tools/');

/**
 * QQ机器人操作相关文件存放目录
 */
define('ROBOT_FOLDER', CLASS_FOLDER . 'robot/');

/**
 * SQL语句操作文件存放目录
 */
define('SQL_FOLDER', CLASS_FOLDER . 'sql/');

/**
 * 插件文件根目录
 */
define('PLUGIN_FOLDER', ITPK_ROOT . 'plugin/');

/**
 * 处理程序数据逻辑的文件目录
 */
define('MODEL_FOLDER', ITPK_ROOT . 'model/');

/**
 * 插件指令等的分隔符号
 */
define('PLUGIN_PART', '|');

/**
 * QQ消息里面的换行符号
 */
define('CR', "\r\n");

/**
 * 链接URL里面的换行符号
 */
define('UCR', "%5C%5Cn");

?>