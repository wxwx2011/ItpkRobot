<?php if (!defined('ITPK')) exit('You can not directly access the file.');

/**
 * 分页工具类
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 1.0
 */

class PageUtil {

	private $limit;
	private $count;
	private $pageno;
	private $maxpage;

	private function setLimit($limit) {
		if (!is_numeric($limit) || $limit <= 1) {
			$this->limit = 1;
		} else {
			$this->limit = $limit;
		}
	}

	/**
	 * 每页数据显示的最大限制
	 * @return number
	 */
	public function getLimit() {
		return $this->limit;
	}

	private function setCount($count) {
		if (!is_numeric($count) || $count <= 0) {
			$this->count = 0;
		} else {
			$this->count = $count;
		}
	}

	/**
	 * 所有数据的记录数
	 * @return number
	 */
	public function getCount() {
		return $this->count;
	}

	private function setPageno($pageno) {
		if (!is_numeric($pageno) || $pageno <= 1) {
			$this->pageno = 1;
		} elseif ($pageno >= $this->maxPage) {
			$this->pageno = $this->maxPage;
		} else {
			$this->pageno = $pageno;
		}
	}

	/**
	 * 当前正确的页数
	 * @return number
	 */
	public function getPageno() {
		return $this->pageno;
	}

	private function setMaxpage() {
		$maxpage = ceil($this->count / $this->limit);
		$this->maxpage = $maxpage == 0 ? 1 : $maxpage;
	}

	/**
	 * 最大页数
	 * @return number
	 */
	public function getMaxpage() {
		return $this->maxpage;
	}

	/**
	 * 分页偏移量
	 * @return number
	 */
	public function getOffset() {
		return ($this->pageno - 1) * $this->limit;
	}

	/**
	 * 初始化分页工具
	 * @param number $pageno
	 * @param number $limit
	 * @param number $count
	 */
	public function __construct($pageno, $limit, $count) {
		$this->setCount($count);
		$this->setLimit($limit);
		$this->setMaxpage();
		$this->setPageno($pageno);
	}

	/**
	 * 第一页的页数
	 * @return number
	 */
	public function getFirstPage() {
		return 1;
	}

	/**
	 * 最后一页的页数
	 * @return number
	 */
	public function getLastPage() {
		return $this->maxpage;
	}

	/**
	 * 判断当前页是否还有上一页
	 * @return boolean
	 */
	public function isHasPreviousPage() {
		if ($this->pageno - 1 <= 0) {
			return false;
		}
		return true;
	}

	/**
	 * 判断当前页是否还有下一页
	 * @return boolean
	 */
	public function isHasNextPage() {
		if ($this->pageno + 1 > $this->maxpage) {
			return false;
		}
		return true;
	}

	/**
	 * 获取正确的上一页的页数
	 * @return number
	 */
	public function getPreviousPage() {
		if ($this->pageno - 1 < 0) {
			return 1;
		}
		return $this->pageno - 1;
	}

	/**
	 * 获取正确的下一页的页数
	 * @return number
	 */
	public function getNextPage() {
		if ($this->pageno + 1 > $this->maxpage) {
			return $this->maxpage;
		}
		return $this->pageno + 1;
	}

}

?>