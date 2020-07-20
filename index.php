<?php
define("SRC_PATH", str_replace("\\", "/", __DIR__));
date_default_timezone_set("Asia/Shanghai");
mb_internal_encoding("UTF-8");
require_once SRC_PATH . "/lib/ErrorBase.php";
require_once SRC_PATH . "/lib/Init.php";

use Ioh\Library\ErrorBase;
$err = ErrorBase::getInstance();
$err->raiseError("1001", "qweq");
$err->setPos(__FILE__, __LINE__);
$err->writeLog();
?>