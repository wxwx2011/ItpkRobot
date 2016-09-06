<?php if (!defined('ITPK')) exit('You can not directly access the file.');

global $mod;
global $action;

if ($mod == "list") {
	
} elseif ($mod == "install") {
	
} elseif ($mod == "uninstall") {
	
} elseif ($mod == "find") {
	
}

if (!param_filter("ajax", false, true)) {
	require_once TEMPLATE_FOLDER . "common/header.inc";
}

require_once TEMPLATE_FOLDER . "plugin/plugin_" . $mod . ".inc";

if (!param_filter("ajax", false, true)) {
	require_once TEMPLATE_FOLDER . "common/footer.inc";
}

?>