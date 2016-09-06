<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 所有可用的UBB
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class UbbUtil {

	const BR1_P					= '/\/\/\//';
	const BR2_P					= '/\[br\]/';
	const HR1_P					= '/\[hr\]/';
	const HR2_P					= '/\[hr=\s*([0-9]+)\]/';
	const H1_P					= '/\[h1\]\s*(.+?)\[\/h1\]/is';
	const H2_P					= '/\[h2\]\s*(.+?)\[\/h2\]/is';
	const H3_P					= '/\[h3\]\s*(.+?)\[\/h3\]/is';
	const H4_P					= '/\[h4\]\s*(.+?)\[\/h4\]/is';
	const H5_P					= '/\[h5\]\s*(.+?)\[\/h5\]/is';
	const H6_P					= '/\[h6\]\s*(.+?)\[\/h6\]/is';
	const P_P					= '/\[p\]\s*(.+?)\[\/p\]/is';
	const B_P					= '/\[b\]\s*(.+?)\[\/b\]/is';
	const U_P					= '/\[u\]\s*(.+?)\[\/u\]/is';
	const I_P					= '/\[i\]\s*(.+?)\[\/i\]/is';
	const S_P					= '/\[s\]\s*(.+?)\[\/s\]/is';
	const DEL_P					= '/\[del\]\s*(.+?)\[\/del\]/is';
	const URL1_P				= '/\[url\]\s*(.+?)\[\/url\]/is';
	const URL2_P				= '/\[url=\s*(.+?)\]\s*(.+?)\[\/url\]/is';
	const IMG1_P				= '/\[img\]\s*(.+?)\[\/img\]/is';
	const IMG2_P				= '/\[img=\s*(.+?)\]\s*(.+?)\[\/img\]/is';
	const FONT_P				= '/\[font=\s*(\d+?)\s*,\s*(.+?)\s*,\s*(.+?)\]\s*(.+?)\[\/font\]/is';
	const FONT_SIZE_P			= '/\[size=\s*(\d+?)\]\s*(.+?)\[\/size\]/is';
	const FONT_COLOR_P			= '/\[color=\s*(.+?)\]\s*(.+?)\[\/color]/is';
	const FONT_FAMILY_P			= '/\[family=\s*(.+?)\]\s*(.+?)\[\/family\]/is';
	const FLY_P					= '/\[fly\]\s*(.+?)\[\/fly\]/is';
	const MOVE_P				= '/\[move\]\s*(.+?)\[\/move\]/is';
	const ID_P					= '/\[id\]/';
	const NAME_P				= '/\[username\]/';
	const DATE_P				= '/\[date\]/';

	const BR1_R					= '<br/>';
	const BR2_R					= '<br/>';
	const HR1_R					= '<hr/>';
	const HR2_R					= '<hr style="width:\\1%" />';
	const H1_R					= '<h1>\\1</h1>';
	const H2_R					= '<h2>\\1</h2>';
	const H3_R					= '<h3>\\1</h3>';
	const H4_R					= '<h4>\\1</h4>';
	const H5_R					= '<h5>\\1</h5>';
	const H6_R					= '<h6>\\1</h6>';
	const P_R					= '<p>\\1</p>';
	const B_R					= '<b>\\1</b>';
	const U_R					= '<u>\\1</u>';
	const I_R					= '<i>\\1</i>';
	const S_R					= '<s>\\1</s>';
	const DEL_R					= '<del>\\1</del>';
	const URL1_R				= '<a href="\\1" target="_blank">\\1</a>';
	const URL2_R				= '<a href="\\1" target="_blank">\\2</a>';
	const IMG1_R				= '<img class="chat_content_img" src="\\1" alt="not found" />';
	const IMG2_R				= '<img class="chat_content_img" src="\\1" alt="\\2" />';
	const FONT_R				= '<font style="font-size:\\1px;color:\\2;font-family:\\3;">\\4</font>';
	const FONT_SIZE_R			= '<font style="font-size:\\1px">\\2</font>';
	const FONT_COLOR_R			= '<font style="color:\\1">\\2</font>';
	const FONT_FAMILY_R			= '<font style="font-family:\\1">\\2</font>';
	const FLY_R					= '<marquee>\\1</marquee>';
	const MOVE_R				= '<marquee>\\1</marquee>';
	const ID_R					= USER_ID;
	const NAME_R				= USER_NAME;

	public static function getPatternArray() {
		return array(
			self::BR1_P, self::BR2_P, self::HR1_P, self::HR2_P, self::H1_P, self::H2_P, self::H3_P, self::H4_P, self::H5_P, self::H6_P, self::P_P, self::B_P, self::U_P, self::I_P, self::S_P, self::DEL_P, self::URL1_P, self::URL2_P, self::IMG1_P, self::IMG2_P, self::FONT_P, self::FONT_SIZE_P, self::FONT_COLOR_P, self::FONT_FAMILY_P, self::FLY_P, self::MOVE_P, self::ID_P, self::NAME_P, self::DATE_P
		);
	}

	public static function getReplaceArray() {
		return array(
			self::BR1_R, self::BR2_R, self::HR1_R, self::HR2_R, self::H1_R, self::H2_R, self::H3_R, self::H4_R, self::H5_R, self::H6_R, self::P_R, self::B_R, self::U_R, self::I_R, self::S_R, self::DEL_R, self::URL1_R, self::URL2_R, self::IMG1_R, self::IMG2_R, self::FONT_R, self::FONT_SIZE_R, self::FONT_COLOR_R, self::FONT_FAMILY_R, self::FLY_R, self::MOVE_R, self::ID_R, self::NAME_R, date('Y-m-d H:i:s', time())
		);
	}

	public static function replace($content) {
		return preg_replace(self::getPatternArray(), self::getReplaceArray(), $content);
	}

}
?>