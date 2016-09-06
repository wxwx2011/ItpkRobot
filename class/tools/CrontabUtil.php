<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 仿crontab的判断工具（依赖：/other/functions.php）
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @copyright 茉莉机器人(ITPK.CN)
 * @version 1.0
 */
class CrontabUtil {

	/**
	 * 判断分钟是否符合执行条件
	 */
	public static function isMinuteProcess($minute, $lastactiontime, $nowtime) {
		if ((intval($nowtime) - intval($lastactiontime)) % 60 != 0) return false;
		if ($minute == "*") {
			return true;
		} 
		if (is_numeric($minute)) {
			if (intval($minute) < 0 || intval($minute) > 59) return false;
			if (intval(date('i', $nowtime)) == intval($minute)) return true;
			return false;
		} elseif (start_contain("*/", $minute)) {
			$arr = explode("*/", $minute);
			if (is_numeric($arr[1])) {
				$minute = intval($arr[1]);
				if ($minute == 0 || $minute == 1) return true;
				$i = floor(($nowtime - $lastactiontime) / 60);
				if ($i == 0) return false;
				if ($i % $minute == 0) return true;
			}
			return false;
		} elseif (is_contain(",", $minute)) {
			$arr = explode(",", $minute);
			foreach ($arr as $m) {
				if (!is_numeric($m) || $m < 0 || $m > 59) continue;
				if (intval(date('i', $nowtime)) == intval($m)) return true;
			}
			return false;
		} elseif (is_contain("-", $minute)) {
			$arr = explode("-", $minute);
			if (count($arr) != 2 || !is_numeric($arr[0]) || !is_numeric($arr[1])) return false;
			if (intval(date('i', $nowtime)) >= intval($arr[0]) && intval(date('i', $nowtime)) <= intval($arr[1])) return true;
			return false;
		}
		return false;
	}

	/**
	 * 判断小时是否符合执行条件
	 */
	public static function isHourProcess($hour, $lastactiontime, $nowtime) {
		if ($hour == "*") {
			return true;
		}
		if (is_numeric($hour)) {
			if (intval($hour) < 0 || intval($hour) > 23) return false;
			if (intval(date('H', $nowtime)) == intval($hour)) return true;
			return false;
		} elseif (start_contain("*/", $hour)) {
			$arr = explode("*/", $hour);
			if (is_numeric($arr[1])) {
				$hour = intval($arr[1]);
				if ($hour == 0 || $hour == 1) return true;
				$h = floor(($nowtime - $lastactiontime) / (60 * 60));
				if ($h == 0) return false;
				if ($h % $hour == 0) return true;
			}
			return false;
		} elseif (is_contain(",", $hour)) {
			$arr = explode(",", $hour);
			foreach ($arr as $h) {
				if (!is_numeric($h) || $h < 0 || $h > 23) continue;
				if (intval(date('H', $nowtime)) == intval($h)) return true;
			}
			return false;
		} elseif (is_contain("-", $hour)) {
			$arr = explode("-", $hour);
			if (count($arr) != 2 || !is_numeric($arr[0]) || !is_numeric($arr[1])) return false;
			if (intval(date('H', $nowtime)) >= intval($arr[0]) && intval(date('H', $nowtime)) <= intval($arr[1])) return true;
			return false;
		}
		return false;
	}

	/**
	 * 判断天数是否符合执行条件
	 */
	public static function isDayProcess($day, $lastactiontime, $nowtime) {
		if ($day == "*") {
			return true;
		}
		if (is_numeric($day)) {
			if (intval($day) < 1 || intval($day) > 31) return false;
			if (intval(date('d', $nowtime)) == intval($day)) return true;
			return false;
		} elseif (start_contain("*/", $day)) {
			$arr = explode("*/", $day);
			if (is_numeric($arr[1])) {
				$day = intval($arr[1]);
				if ($day == 0 || $day == 1) return true;
				$d = floor(($nowtime - $lastactiontime) / (24 * 60 * 60));
				if ($d == 0) return false;
				if ($d % $day == 0) return true;
			}
			return false;
		} elseif (is_contain(",", $day)) {
			$arr = explode(",", $day);
			foreach ($arr as $d) {
				if (!is_numeric($d) || $d < 1 || $d > 31) continue;
				if (intval(date('d', $nowtime)) == intval($d)) return true;
			}
			return false;
		} elseif (is_contain("-", $day)) {
			$arr = explode("-", $day);
			if (count($arr) != 2 || !is_numeric($arr[0]) || !is_numeric($arr[1])) return false;
			if (intval(date('d', $nowtime)) >= intval($arr[0]) && intval(date('d', $nowtime)) <= intval($arr[1])) return true;
			return false;
		}
		return false;
	}

	/**
	 * 判断月份是否符合执行条件
	 */
	public static function isMonthProcess($month, $lastactiontime, $nowtime) {
		if ($month == "*") {
			return true;
		}
		if (is_numeric($month)) {
			if (intval($month) < 1 || intval($month) > 12) return false;
			if (intval(date('m', $nowtime)) == intval($month)) return true;
			return false;
		} elseif (start_contain("*/", $month)) {
			$arr = explode("*/", $month);
			if (is_numeric($arr[1])) {
				$month = intval($arr[1]);
				if ($month == 0 || $month == 1) return true;
				if (intval(date('Y', $nowtime)) == intval(date('Y', $lastactiontime))) {
					if (intval(date('m', $nowtime)) == intval(date('m', $lastactiontime))) return false;
					if ((intval(date('m', $nowtime)) - intval(date('m', $lastactiontime))) % $month == 0) return true;
				} elseif (intval(date('Y', $nowtime)) > intval(date('Y', $lastactiontime))) {
					$nowmon = intval(date('m', $nowtime)) + (intval(date('Y', $nowtime)) - intval(date('Y', $lastactiontime))) * 12;
					if (($nowmon - intval(date('m', $lastactiontime))) % $month == 0) return true;
				}
			}
			return false;
		} elseif (is_contain(",", $month)) {
			$arr = explode(",", $month);
			foreach ($arr as $m) {
				if (!is_numeric($m) || $m < 1 || $m > 12) continue;
				if (intval(date('m', $nowtime)) == intval($m)) return true;
			}
			return false;
		} elseif (is_contain("-", $month)) {
			$arr = explode("-", $month);
			if (count($arr) != 2 || !is_numeric($arr[0]) || !is_numeric($arr[1])) return false;
			if (intval(date('m', $nowtime)) >= intval($arr[0]) && intval(date('m', $nowtime)) <= intval($arr[1])) return true;
			return false;
		}
		return false;
	}

	/**
	 * 判断星期是否符合执行条件
	 */
	public static function isDayofweekProcess($dayofweek, $lastactiontime, $nowtime) {
		if ($dayofweek == "*") {
			return true;
		}
		if (is_numeric($dayofweek)) {
			if (intval($dayofweek) < 0 || intval($dayofweek) > 6) return false;
			if (intval(date('w', $nowtime)) == intval($dayofweek)) return true;
			return false;
		} elseif (start_contain("*/", $dayofweek)) {
			$arr = explode("*/", $dayofweek);
			if (is_numeric($arr[1])) {
				$dayofweek = intval($arr[1]);
				if ($dayofweek == 0 || $dayofweek == 1) return true;
				$dow = floor(($nowtime - $lastactiontime) / (7 * 24 * 60 * 60));
				if ($dow == 0) return false;
				if ($dow % $dayofweek == 0) return true;
			}
			return false;
		} elseif (is_contain(",", $dayofweek)) {
			$arr = explode(",", $dayofweek);
			foreach ($arr as $dw) {
				if (!is_numeric($dw) || $dw < 1 || $dw > 31) continue;
				if (intval(date('w', $nowtime)) == intval($dw)) return true;
			}
			return false;
		} elseif (is_contain("-", $dayofweek)) {
			$arr = explode("-", $dayofweek);
			if (count($arr) != 2 || !is_numeric($arr[0]) || !is_numeric($arr[1])) return false;
			if (intval(date('w', $nowtime)) >= intval($arr[0]) && intval(date('w', $nowtime)) <= intval($arr[1])) return true;
			return false;
		}
		return false;
	}

	/**
	 * 传入crontab格式的数据，判断是否执行
	 * @param string $minute
	 * @param string $hour
	 * @param string $day
	 * @param string $month
	 * @param string $dayofweek
	 * @param number $lastactiontime
	 * @param number $nowtime
	 * @return boolean
	 */
	public static function isProcess($minute, $hour, $day, $month, $dayofweek, $lastactiontime, $nowtime) {
		return self::isMinuteProcess($minute, $lastactiontime, $nowtime)
			&& self::isHourProcess($hour, $lastactiontime, $nowtime)
			&& self::isDayProcess($day, $lastactiontime, $nowtime)
			&& self::isMonthProcess($month, $lastactiontime, $nowtime)
			&& self::isDayofweekProcess($dayofweek, $lastactiontime, $nowtime);
	}
}
?>