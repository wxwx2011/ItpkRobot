<?php if (!defined('ITPK')) exit('You can not directly access the file.');

class Template extends TemplateCommon {

	public static function GET_TEMPLATE_SELECTED() {
		return self::GET_ME_BY_COLUMN(self::TABLE, self::SELECTED, true);
	}

}

?>