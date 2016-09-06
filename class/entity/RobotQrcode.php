<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 机器人登录二维码图片
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class RobotQrcode extends RobotQrcodeCommon {

	/**
	 * 更新或添加验证码
	 * @param number $robot_id
	 * @param blob $image
	 * @return boolean
	 */
	public static function replaceMe($robot_id, $image) {
		$replaceSql = new ReplaceSql(self::TABLE);
		$columnArray = array(
			self::ROBOT_ID, self::IMAGE, self::CREATEDATE
		);
		$columnValueArray = array(
			$robot_id, $image, time()
		);
		$replaceSql->setReplace($columnArray, $columnValueArray, array(true, false, true));
		return self::REPLACE_ME($replaceSql);
	}

}

?>