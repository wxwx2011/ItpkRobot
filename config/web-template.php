<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 获取当前的模板信息
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

$template = Template::GET_TEMPLATE_SELECTED();

/**
 * 正使用的模板文件根目录
 */
define('TEMPLATE_FOLDER', ITPK_ROOT . 'template/' . $template['folder'] . "/");

?>