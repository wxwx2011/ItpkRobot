<?php if (!defined('ITPK')) exit('You can not directly access the file.');

global $mod;
global $action;

if ($action == "login") {
	header("content-type:text/plain; charset=utf-8");
	$result = array();
	if (LOGIN_STATUS == UserLoginUtil::SUCCESS) {
		$result['result'] = 0;
	} else {
		$login_name = param_filter("login_name");
		$login_pass = md5(param_filter("login_pass"));
		if (!is_empty($login_name) && !is_empty($login_pass)) {
			$user = User::LOGIN($login_name, $login_pass);
			if ($user) {
				$user_check = $user['user_check'];
				if (is_empty($user_check)) {
					$date = time();
					$user_check = base64_encode(md5("ITPK" . getRandString(12, 0) . $date));
					User::UPDATE_ME_BY_COLUMN(User::TABLE, User::USER_CHECK, $user_check, User::ID, $user['id']);
				}
				setcookie('user_check', $user_check, time()+(60*60*24*30));
				$_SESSION['user_check'] = $user_check;
				$result['result'] = 1;
				$result['nickname'] = $user['nickname'];
			} else {
				$result['result'] = 9;
			}
		} else {
			$result['result'] = 8;
		}
	}
	exit(json_encode($result));
} elseif ($action == "logout") {
	if (LOGIN_STATUS == UserLoginUtil::SUCCESS) {
		User::UPDATE_ME_BY_COLUMN(User::TABLE, User::USER_CHECK, "", User::ID, USER_ID);
		$_SESSION = array();
		if(isset($_COOKIE[session_name()])){
			setcookie(session_name(), '', time()-3600);
		}
		session_destroy();
		setcookie('user_check', '', time()-3600);
		$url = param_filter("url", "index");
		header("location:$url.php");
	}
} elseif ($action == "reg") {
	header("content-type:text/plain; charset=utf-8");
	$result = array();
	$username = param_filter("username");
	$email = param_filter("email");
	$password = md5(param_filter("password"));
	if (!is_empty($username) && !is_empty($email) && !is_empty($password)) {
		$affected_rows = User::REG($username, $email, $password);
		if ($affected_rows > 0) {
			$result['result'] = 1;
		} else {
			$result['result'] = 9;
		}
	} else {
		$result['result'] = 8;
	}
	exit(json_encode($result));
}

require_once TEMPLATE_FOLDER . "common/header.inc";
require_once TEMPLATE_FOLDER . $mod . '.inc';
require_once TEMPLATE_FOLDER . "common/footer.inc";

?>