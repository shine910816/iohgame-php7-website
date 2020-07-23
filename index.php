<?php
define("SRC_PATH", str_replace("\\", "/", __DIR__) . "/src");
date_default_timezone_set("Asia/Shanghai");
mb_internal_encoding("UTF-8");

require_once SRC_PATH . "/lib/Init.php";
require_once SRC_PATH . "/lib/Controller.php";
require_once SRC_PATH . "/lib/Request.php";
require_once SRC_PATH . "/lib/User.php";
require_once SRC_PATH . "/lib/LoginedUserBean.php";
require_once SRC_PATH . "/lib/ActionBase.php";
require_once SRC_PATH . "/lib/Report.php";

$controller = Controller::getInstance();
$user = User::getInstance();
$request = Request::getInstance();

require_once SRC_PATH . "/php/Common/act/IohCommon_HomeAction.php";
$class_name = "IohCommon_HomeAction";
$action = new $class_name;
$action->doMainExecute($controller, $user, $request);
?>