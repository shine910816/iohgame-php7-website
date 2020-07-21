<?php
//phpinfo();

define("SRC_PATH", str_replace("\\", "/", __DIR__));
date_default_timezone_set("Asia/Shanghai");
mb_internal_encoding("UTF-8");

require_once SRC_PATH . "/lib/Init.php";
require_once SRC_PATH . "/lib/User.php";
require_once SRC_PATH . "/lib/LoginedUserBean.php";

use Ioh\Library\User;

$user = User::getInstance();

//$user->setCookieLogin("1", "shine910816", "Kinsama", "ABCDEF01-2345-6789-ABCD-EF0123456789", "0");

echo $user->getLoginInfo()->getNickName();

?>