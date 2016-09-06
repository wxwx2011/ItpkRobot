<?php if (!defined('ITPK')) exit('You can not directly access the file.');

global $mod;
global $action;

require_once TEMPLATE_FOLDER . "common/header.inc";
require_once TEMPLATE_FOLDER . "profile/profile_" . $mod . '.inc';
require_once TEMPLATE_FOLDER . "common/footer.inc";

?>