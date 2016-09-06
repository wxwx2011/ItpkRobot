<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 如果is_ignore为true，则把字符串或数组内的字符串都转换为小写，否则返回原字符或原数组
 * @param string $str 原字符或原数组
 * @param boolean $isarray 如果为true，那么str则是数组，否则str是字符串
 * @return string | array
 */
function transformation($str, $isarray) {
	$new_str = $str;
	if ($isarray) {
		$new_str = array();
		for ($i = 0; $i < count($str); $i++) {
			array_push($new_str, strtolower($str[$i]));
		}
	} else {
		$new_str = strtolower($str);
	}
	return $new_str;
}

/**
 * 判断某个字符串中是否包含某个字符串或数组的某个元素（判断input中是否包含contain，如果contain为数组，那么判断的是contain里面的元素）
 * @param string | array $contain 要判断包含的字符串或数组
 * @param string $input 要判断的原字符串
 * @param boolean $isarray 如果isarray为true，那么contain则是数组，反之则是字符串
 * @param boolean $is_ignore 是否忽略大小写的比较
 * @return boolean 如果包含返回true，不包含返回false
 */
function is_contain($contain, $input, $isarray = false, $is_ignore = false) {
	if ($is_ignore) {
		$contain = transformation($contain, $isarray);
		$input = transformation($input, false);
	}
	if ($isarray) {
		for ($i = 0; $i < count($contain); $i++) {
			if (count(explode($contain[$i], $input)) > 1) {
				return true;
			}
		}
		return false;
	}
	return count(explode($contain, $input)) > 1 ? true : false;
}

/**
 * 判断某个字符串的开头是否为某个字符串或某个数组的元素（判断input的开头是否是contain，如果contain为数组，那么判断的是contain里面的元素）
 * @param string | array $contain 要判断包含的字符串或数组
 * @param string $input 要判断的原字符串
 * @param boolean $isarray 如果isarray为true，那么contain则是数组，反之则是字符串
 * @param boolean $is_ignore 是否忽略大小写的比较
 * @return boolean 如果是返回true，不是返回false
 */
function start_contain($contain, $input, $isarray = false, $is_ignore = false) {
	if ($is_ignore) {
		$contain = transformation($contain, $isarray);
		$input = transformation($input, false);
	}
	if ($isarray) {
		for ($i = 0; $i < count($contain); $i++) {
			$strArr = explode($contain[$i], $input);
			if (count($strArr) > 1 && ($strArr[0] == "" || strlen($strArr[0]) == 0)) {
				return true;
			}
		}
		return false;
	}
	$strArr = explode($contain, $input);
	if (count($strArr) > 1 && ($strArr[0] == "" || strlen($strArr[0]) == 0)) {
		return true;
	}
	return false;
}

/**
 * 判断某个字符串的结尾是否为某个字符串或某个数组的元素（判断input的结尾是否是contain，如果contain为数组，那么判断的是contain里面的元素）
 * @param string | array $contain 要判断包含的字符串或数组
 * @param string $input 要判断的原字符串
 * @param boolean $isarray 如果isarray为true，那么contain则是数组，反之则是字符串
 * @param boolean $is_ignore 是否忽略大小写的比较
 * @return boolean 如果是返回true，不是返回false
 */
function end_contain($contain, $input, $isarray = false, $is_ignore = false) {
	if ($is_ignore) {
		$contain = transformation($contain, $isarray);
		$input = transformation($input, false);
	}
	if ($isarray) {
		for ($i = 0; $i < count($contain); $i++) {
			$strArr = explode($contain[$i], $input);
			if (count($strArr) > 1 && ($strArr[1] == "" || strlen($strArr[1]) == 0)) {
				return true;
			}
		}
		return false;
	}
	$strArr = explode($contain, $input);
	if (count($strArr) > 1 && ($strArr[1] == "" || strlen($strArr[1]) == 0)) {
		return true;
	}
	return false;
}

/**
 * 判断某个字符串是否跟某个字符串或某个数组的元素相同（判断input的是否跟contain相同，如果contain为数组，那么判断的是contain里面的元素）
 * @param string | array $contain 要判断包含的字符串或数组
 * @param string $input 要判断的原字符串
 * @param boolean $isarray 如果isarray为true，那么contain则是数组，反之则是字符串
 * @param boolean $is_ignore 是否忽略大小写的比较
 * @return boolean 如果是返回true，不是返回false
 */
function is_equal($contain, $input, $isarray = false, $is_ignore = false) {
	if ($is_ignore) {
		$contain = transformation($contain, $isarray);
		$input = transformation($input, false);
	}
	if ($isarray) {
		for ($i = 0; $i < count($contain); $i++) {
			if ($contain[$i] == $input) {
				return true;
			}
		}
		return false;
	}
	return $contain == $input ? true : false;
}

/**
 * 判断某个值是不是为空或者为NULL
 * @param string $param
 * @return boolean
 */
function is_empty($param) {
	return ($param == null || trim($param) == "") ? true : false;
}

/**
 * 生成随机字符串
 * @param int $length 生成的随机字符长度
 * @param int $type 生成随机字符的类型： 0为大小写字母加数字，1为小写字母，2为大写字母，3为大小写字母，4为数字
 * @return string | int
 */
function getRandString($length = 12, $type = 0) {
	$lower	= range('a', 'z');
	$upper	= range('A', 'Z');
	$number	= range(0, 9);

	if($type == 0) {
		$chars = array_merge($lower, $upper, $number);
	} elseif($type == 1) {
		$chars = $lower;
	} elseif($type == 2) {
		$chars = $upper;
	} elseif($type == 3) {
		$chars = array_merge($lower, $upper);
	} elseif($type == 4) {
		$chars = $number;
	}

	shuffle($chars);
	$char_keys	= array_rand($chars, $length);
	shuffle($char_keys);

	$rand = '';
	foreach($char_keys as $key) {
		$rand .= $chars[$key];
	}
	return $rand;
}

/**
 * 把数组的VALUE拼成字符串，用port隔开
 * @param array $array
 * @param string $port
 * @return string
 */
function arrayToString($array, $port) {
	$str = "";
	foreach ($array as $key=>$value) {
		$str .= ($value . $port);
	}
	return rtrim($str, $port);
}

/**
 * 处理页面接收的参数，防止SQL注入
 * @param string $param 接收的参数
 * @param unknown $defVal 当没有此参数时的默认值
 * @param boolean $is_bool 接收的参数是否转换为0/1（一般当参数的值为true、false、0、1时使用）
 * @return unknown 返回经过处理的参数值
 */
function param_filter($param, $defVal = null, $is_bool = false) {
	$return_param = $defVal;
	if (isset($_GET["$param"])) {
		$return_param = $_GET["$param"];
	} elseif (isset($_POST["$param"])) {
		$return_param = $_POST["$param"];
	}
	if ($is_bool) {
		return ($return_param == null || $return_param == "false" || $return_param === "0" || $return_param == "") ? false : true;
	}
	return ($return_param == null) ? null : trim(addslashes($return_param));
}

/**
 * 处理通过POST表单的checkbox值
 * @param string $param
 * @return array
 */
function param_filter_checkbox($param, $defVal = null) {
	$return_array = $defVal;
	if (isset($_POST["$param"])) {
		$return_params = $_POST["$param"];
		if (is_array($return_params)) {
			$return_array = array();
			foreach ($return_params as $return_param) {
				array_push($return_array, trim(addslashes($return_param)));
			}
		}
	}
	return $return_array;
}

/**
 * 判断是否接收到某参数
 * @param string $param
 * @return boolean
 */
function param_is_exits($param) {
	return isset($_GET["$param"]) ? true : (isset($_POST["$param"]) ? true : false);
}

/**
 * 获取访问者IP地址
 * @return Ambigous <string, unknown>
 */
function getIP() {
	$ip = "";
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
		$ip = getenv("HTTP_CLIENT_IP");
	} else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	} else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
		$ip = getenv("REMOTE_ADDR");
	} else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
		$ip = $_SERVER['REMOTE_ADDR'];
	} else {
		$ip = "unknown";
	}
	if (strpos($ip, ',')) {
		$ipArr = explode(',', $ip);
		$ip = $ipArr[0];
	}
	return $ip;
}

/**
 * 判断当前访问的是不是HTTPS
 * @return boolean
 */
function isHttps() {
	if (!isset($_SERVER['HTTPS'])) {
		return false;
	}
	if ($_SERVER['HTTPS'] === 1) {				//Apache
		return true;
	} elseif ($_SERVER['HTTPS'] === 'on') {		//IIS
		return true;
	} elseif ($_SERVER['SERVER_PORT'] == 443) {	//其他
		return true;
	}
	return false;
}

?>