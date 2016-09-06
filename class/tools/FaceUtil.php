<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 所有可用的表情
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class FaceUtil {

	/**
	 * 表情图片存放根目录
	 */
	const FOLDER_ROOT = "./images/face/";

	/**
	 * 网页默认显示的表情组（用表情的folder属性表示）
	 */
	const SELECTED_FACE = "classic";

	/**
	 * QQ经典表情
	 */
	public static function getClassic() {
		$face = array();
		$face['short'] = "cc";
		$face['title'] = "经典";
		$face['column'] = 10;
		$face['max_index'] = 120;
		$face['page_count'] = 2;
		$face['height'] = 23;
		$face['folder'] = "classic";
		$face['type'] = "gif";
		$face['memo'] = array(
			"", "", "", "", "", "", "", "", "", "",
			"", "", "", "", "", "", "", "", "", "",
			"", "", "", "", "", "", "", "", "", "",
			"", "", "", "", "", "", "", "", "", "",
			"", "", "", "", "", "", "", "", "", "",
			"", "", "", "", "", "", "", "", "", "",
			"", "", "", "", "", "", "", "", "", "",
			"", "", "", "", "", "", "", "", "", "",
			"", "", "", "", "", "", "", "", "", "",
			"", "", "", "", "", "", "", "", "", "",
			"", "", "", "", "", "", "", "", "", "",
			"", "", "", "", "", "", "", "", "", ""
		);
		return $face;
	}

	/**
	 * 贴吧泡泡表情
	 */
	public static function getPaoPao() {
		$face = array();
		$face['short'] = "pp";
		$face['title'] = "泡泡";
		$face['column'] = 8;
		$face['max_index'] = 40;
		$face['page_count'] = 1;
		$face['height'] = 33;
		$face['folder'] = "paopao";
		$face['type'] = "png";
		$face['memo'] = array(
			"滑稽", "真棒", "鄙视", "乖", "吐舌", "不高兴", "花心", "阴险", "笑眼", "怒", 
			"汗", "睡觉", "太开心", "哈哈", "呵呵", "喷", "狂汗", "委屈", "勉强", "惊哭", 
			"泪", "吐", "生气", "酷", "开心", "黑线", "冷", "啊", "钱", "呼", 
			"惊讶", "疑问", "爱心", "心碎", "玫瑰", "haha", "胜利", "大拇指", "弱", "OK"
		);
		return $face;
	}

	/**
	 * 其它表情
	 */
	public static function getOther() {
		$face = array();
		$face['short'] = "or";
		$face['title'] = "其它";
		$face['column'] = 8;
		$face['max_index'] = 40;
		$face['page_count'] = 1;
		$face['height'] = 33;
		$face['folder'] = "other";
		$face['type'] = "png";
		$face['memo'] = array(
			"滑稽", "真棒", "鄙视", "乖", "吐舌", "不高兴", "花心", "阴险", "笑眼", "怒",
			"汗", "睡觉", "太开心", "哈哈", "呵呵", "喷", "狂汗", "委屈", "勉强", "惊哭",
			"泪", "吐", "生气", "酷", "开心", "黑线", "冷", "啊", "钱", "呼",
			"惊讶", "疑问", "爱心", "心碎", "玫瑰", "haha", "胜利", "大拇指", "弱", "OK"
		);
		return $face;
	}

	/**
	 * 获取所有使用的表情数组
	 */
	public static function getFaceArray() {
		$faceArray = array();
		array_push($faceArray, self::getClassic());
		array_push($faceArray, self::getPaoPao());
// 		array_push($faceArray, self::getOther());
		return $faceArray;
	}

	/**
	 * 替换表情代码
	 * @param array $face
	 * @param String $content
	 * @return String
	 */
	public static function replace($face, $content) {
		$short = $face['short'];
		$max_index = $face['max_index'];
		$folder = $face['folder'];
		$type = $face['type'];
		$memo = $face['memo'];

		$pattern_array = array();
		for ($i = 0; $i < $max_index; $i++) {
			array_push($pattern_array, '/\[face\s*:\s*' . $short . '\s*,\s*index\s*:\s*' . ($i+1) . '\]/is');
		}

		$replace_array = array();
		for ($i = 0; $i < $max_index; $i++) {
			array_push($replace_array, '<img class="chat_face_img" src="' . self::FOLDER_ROOT . $folder . '/' . ($i+1) . '.' . $type . '" alt="' . $memo[$i] . '" />');
		}

		return preg_replace($pattern_array, $replace_array, $content);
	}

}
?>