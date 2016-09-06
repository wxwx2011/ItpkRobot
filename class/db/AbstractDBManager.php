<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 数据库抽象类
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 4.0
 */

class AbstractDBManager {

	private $mysqli		= false;
	private $result		= false;
	private $lastsql	= "";
	private $error		= "";

	/**
	 * 初始化数据库连接
	 * @param string $db_host
	 * @param string $db_user
	 * @param string $db_pass
	 * @param string $db_base
	 * @param string $db_code
	 */
	public function init($db_host, $db_user, $db_pass, $db_base, $db_port, $db_code = "utf8") {

		@$this->mysqli = new mysqli($db_host, $db_user, $db_pass, $db_base, $db_port);
		@$this->mysqli->set_charset($db_code);

		if (mysqli_connect_errno()) {
			$this->lastsql = "连接数据库出错,请检查数据库配置是否正确";
			$this->error = mysqli_connect_error();
			$this->print_error(true);
		}
	}

	/**
	 * 关闭数据库连接
	 */
	private function db_close() {
		$this->mysqli->close();
	}

	/**
	 * 从数据库查询结果中获取需要的数据
	 * @param mysqli_result $result 数据库查询结果，也就是执行query函数后的结果
	 * @param boolean $is_array 当查询结果只有一条时是否返回数组
	 * @return array | boolean
	 */
	private function fetch_result($result, $is_array = false) {
		$rowArray = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				array_push($rowArray, $row);
				unset($row);
			}
			return (count($rowArray) == 1 && !$is_array) ? $rowArray[0] : $rowArray;
		}
		return false;
	}

	/**
	 * 执行数据库操作，返回结果集（一般为查询使用）或者返回受影响的行数（增、删和改）
	 * @param string $sql			sql语句
	 * @param boolean $is_select	如果为true返回结果集，为false则返回受影响的行数，默认为false
	 * @param boolean $is_array		当查询结果只有一条时是否返回数组，只适用于$is_select为true的情况，默认为false
	 * @param boolean $is_die		出错时是否终止程序的运行，为true终止程序的运行并输出错误信息，为false则什么都不做，默认为true
	 */
	public function executeQuery($sql, $is_select = false, $is_array = false, $is_die = true) {
		if ($this->mysqli) {
			$this->lastsql = $sql;
			if (@$this->result = $this->mysqli->query($sql)) {
				return $is_select ? $this->fetch_result($this->result, $is_array) : $this->mysqli->affected_rows;
			} else {
				$this->error = mysqli_connect_error();
				$this->print_error($is_die);
			}
			$this->db_close();
		} else {
			$this->lastsql = "";
			$this->error = "数据库连接已经断开";
			$this->print_error($is_die);
		}
	}

	/**
	 * 返回最新插入数据的ID
	 * @return number
	 */
	public function returnInsertId() {
		if ($this->mysqli) {
			return mysqli_insert_id($this->mysqli);
		}
		return -1;
	}

	/**
	 * 执行多条SQL语句（当某条SQL语句执行出错时会进行回滚）
	 * @param string $sql		sql语句
	 * @param boolean $is_die	出错时是否终止程序的运行，为true终止程序的运行并输出错误信息，为false则什么都不做，默认为true
	 * @return boolean 执行成功返回true，执行失败返回false
	 */
	public function executeMultiQuery($sql, $is_die = true) {
		$this->lastsql = $sql;
		$is_success = false;

		//开启事物（非自动提交）
		$this->mysqli->autocommit(false);

		//批量执行SQL语句
		if (@$this->mysqli->multi_query($sql)) {
			//刷新掉无用的记录，否则mysqli对象不能继续执行
			while ($this->mysqli->more_results()) $this->mysqli->next_result();
			//提交
			$this->mysqli->commit();
			//执行成功
			$is_success = true;
		} else {
			//进行回滚
			if ($this->mysqli) $this->mysqli->rollback();
			//记录错误信息
			$this->error = mysqli_connect_error();
			$this->print_error($is_die);
		}

		//切换事物（自动提交）
		$this->mysqli->autocommit(true);
		return $is_success;
	}

	/**
	 * 输出错误信息
	 * @param boolean $is_die 是否终止程序的运行，为true终止程序的运行并输出错误信息，为false则什么都不做
	 */
	private function print_error($is_die = true) {
		if ($is_die) {
			header("content-type:text/plain; charset=utf-8");
			echo "错误信息：" . $this->error . "\r\n";
			echo "具体执行：" . $this->lastsql;
			die();
		}
	}

}

?>