<?php
header("Content-type:text/plain; charset=utf-8");
date_default_timezone_set("Asia/Shanghai");
echo json_encode(array(
    "error_cd" => "0",
    "error_msg" => "",
    "datetime" => date("Y-m-d H:i:s"),
    "result" => array(
        "server_ver" => $_SERVER["SERVER_SOFTWARE"],
        "user_agent" => $_SERVER["HTTP_USER_AGENT"],
        "remote" => $_SERVER["REMOTE_ADDR"]
    )
));
?>