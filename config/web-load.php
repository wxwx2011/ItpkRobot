<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 加载程序文件
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

/**
 * 根据类名自动导入类文件
 * @param string $className 类名
 */
function __autoload($className) {

	/**
	 * 类文件默认目录
	 */
	$folder = ENTITY_FOLDER;

	if (end_contain("Common", $className)) {
		/**
		 * Common结尾的类名为公共包
		 */
		$folder = COMMON_FOLDER;
	} elseif (is_contain("DB", $className)) {
		/**
		 * 类名中包含DB的为数据库操作相关文件
		 */
		$folder = DB_FOLDER;
	} elseif (end_contain("Sql", $className)) {
		/**
		 * Sql结尾的类名为SQL语句操作类
		 */
		$folder = SQL_FOLDER;
	} elseif (end_contain("Util", $className)) {
		/**
		 * Util结尾的类名为工具类
		 */
		$folder = TOOLS_FOLDER;
	} elseif (start_contain("Wq", $className)) {
		/**
		 * Wq开头的类名为机器人相关类
		 */
		$folder = ROBOT_FOLDER;
	} elseif (start_contain("Plugin", $className)) {
		/**
		 * Plugin开头的类名为机器人插件相关类
		 */
		if ($className == "PluginBase" || $className == "PluginBaseCron") {
			$folder = PLUGIN_FOLDER;
		} elseif (end_contain("Cron", $className)) {
			$folder = explode("Plugin", $className);
			$folder = explode("Cron", $folder[1]);
			$folder = PLUGIN_FOLDER . strtolower($folder[0]) . "/";
		} else {
			$folder = explode("Plugin", $className);
			$folder = PLUGIN_FOLDER . strtolower($folder[1]) . "/";
		}
	}

	/**
	 * 类名的具体目录
	 */
	$file = $folder . $className . ".php";

	/**
	 * 如果文件存在则导入此文件
	 */
	if(file_exists($file)) require_once($file);
}

?>