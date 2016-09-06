<?php 

/**
 * 回复工具类
 * @author 冬天的秘密
 * @link http://bbs.itpk.cn
 * @version 1.0
 */
class ReplyUtil {

	private $contentArray = array();
	private $sleepArray = array();

	/**
	 * 插入回复内容，回复此条消息后再回复下一条消息的休眠时间（最后一条消息的休眠时间请设置为0，休眠时间单位为秒）
	 * @param string $content
	 * @param number $sleep
	 */
	public function setReply($content, $sleep = 0) {
		array_push($this->contentArray, $content);
		array_push($this->sleepArray, $sleep);
	}

	/**
	 * 插入回复内容和休眠时间后，再调用此方法返回回复数据
	 * @return boolean|string
	 */
	public function getReplyArray() {
		$replyArray = array();
		$sleepArray = array();
		for ($i = 0; $i < count($this->contentArray); $i++) {
			if ($i >= 3) break;
			if (trim($this->contentArray[$i]) == "") continue;
			array_push($replyArray, $this->contentArray[$i]);
			array_push($sleepArray, $this->sleepArray[$i]);
		}
		if (count($replyArray) <= 0 || count($sleepArray) <= 0) {
			return false; 
		}
		$replyJson = array();
		$replyJson['count'] = count($replyArray);
		$replyJson['contents'] = $replyArray;
		$replyJson['sleeps'] = $sleepArray;
		return json_encode($replyJson);
	}

	/**
	 * 静态方法，可以直接调用，例(在插件中)：return ReplyUtil::getReply("abc");
	 * @param string $content
	 * @return string
	 */
	public static function getReply($content) {
		$replyJson = array();
		$replyJson['count'] = 1;
		$replyJson['contents'] = array($content);
		$replyJson['sleeps'] = array(0);
		return json_encode($replyJson);
	}

	/**
	 * 插件返回此方法内容将不回复消息
	 * @return string
	 */
	public static function noReply() {
		$replyJson = array();
		$replyJson['count'] = 0;
		$replyJson['contents'] = array();
		$replyJson['sleeps'] = array();
		return json_encode($replyJson);
	}

}

?>