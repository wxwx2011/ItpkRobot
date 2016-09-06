<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * Webqq数据库操作类
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class WebDBManager extends AbstractDBManager {

	public static function &GET_INSTANCE(){
		static $manager_;

		if ($manager_ == null) {
			$manager_ = new WebDBManager();
			$manager_->init(DBHOST, DBUSER, DBPASS, DBBASE, DBPORT, DBCODE);
		}

		return $manager_;
	}

}

?>