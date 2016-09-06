<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * Webqq数据库连接类
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class WebDBConnection {

	public $db;
	public function __construct() { 
		$this->db = WebDBManager::GET_INSTANCE(); 
	}

	public static function GET_DB() {
		return WebDBManager::GET_INSTANCE();
	}

}

?>