<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 替换UBB代码和表情
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class UserContentUtil {

	/**
	 * 替换内容里面存在的UBB代码和表情代码
	 * @param String $content
	 * @return String
	 */
	public static function replace($content, $faceArray) {
		$content = htmlspecialchars($content);
		$content = UbbUtil::replace($content);
		if (count($faceArray) > 0) {
			foreach ($faceArray as $face) {
				$content = FaceUtil::replace($face, $content);
			}
		}
		return preg_replace("/\r\n/Uis", "<br/>", $content);
	}

}

?>