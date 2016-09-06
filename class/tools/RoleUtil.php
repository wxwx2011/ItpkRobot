<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 角色权限判断
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 1.0
 */
class RoleUtil {

	/**
	 * 初始设定
	 */
	const INIT					= 0;

	/**
	 * 进入网站的权限
	 */
	const GOINDEX				= 1;

	/**
	 * 进入聊天室的权限
	 */
	const GOCHAT				= 2;

	/**
	 * 聊天室发言的权限
	 */
	const CHATSPEECH			= 3;

	/**
	 * 默认的角色权限设定
	 */
	const DEFAULTUSER			= 14;

	/**
	 * 游客的权限设定
	 */
	const TOURISTS				= 6;

	/**
	 * 获取所有设定好的权限值和权限名称
	 * @return multitype:string
	 */
	public static function getRoleArray() {
		$roles = array(
			RoleUtil::GOINDEX			=> '访问网站',
			RoleUtil::GOCHAT			=> '访问聊天室',
			RoleUtil::CHATSPEECH		=> '聊天室发言',
		);
		return $roles;
	}

	/**
	 * 判断用户是否有权限访问某内容
	 * @param string $jurisdiction 用户的角色权限
	 * @param string $power 用户要访问的内容权限设定
	 * @return boolean 返回true表示有权限，返回false表示没有权限
	 */
	public static function getRolePower($jurisdiction, $power) {
		$power = pow(2, $power);
		return (($jurisdiction & $power) == $power) ? true : false;
	}

	/**
	 * 获取所有的权限值和权限名称，并且生成HTML代码
	 * @param string $jurisdiction 用户的角色权限
	 * @param string $name checkbox的name属性
	 * @param boolean $is_disabled 是否可操作checkbox
	 * @return multitype:string
	 */
	public static function getRoleCheckBoxHtml($jurisdiction, $name, $is_disabled = false) {
		$is_disabled = $is_disabled ? "disabled = \"disabled\"" : "";
		$checkedHtmlArray = array();
		$roleArray = RoleUtil::getRoleArray();
		foreach ($roleArray as $key=>$value) {
			if (RoleUtil::getRolePower($jurisdiction, $key)) {
				array_push($checkedHtmlArray, "<label class = \"label_checkbox\"><input class = \"form_checkbox\" type = \"checkbox\" name = \"{$name}\" value = \"{$key}\" checked = \"checked\" {$is_disabled} />{$value}</label>");
			} else {
				array_push($checkedHtmlArray, "<label class = \"label_checkbox\"><input class = \"form_checkbox\" type = \"checkbox\" name = \"{$name}\" value = \"{$key}\" {$is_disabled} />{$value}</label>");
			}
		}
		return $checkedHtmlArray;
	}

}

?>