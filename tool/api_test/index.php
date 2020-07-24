<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>API测试</title>
<link type="text/css" rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<style type="text/css">
.text_box {
  text-align:center!important;
}
</style>
</head>
<body>
<div data-role="content">
  <div class="ui-body ui-body-a ui-corner-all">
    <h4>API测试</h4>
    <form action="./" method="post">
      <input type="text" class="text_box" name="request_url" value="<?php if (isset($_REQUEST["request_url"])) { echo $_REQUEST["request_url"]; } else { ?>http://<?php echo $_SERVER["SERVER_ADDR"]; ?>/api/<?php } ?>" />
      <input type="submit" value="执行" />
    </form>
    <pre><?php
    if (isset($_REQUEST["request_url"])) {
        $request_url = $_REQUEST["request_url"];
        $api_content = file_get_contents($_REQUEST["request_url"]);
        $decode_content = json_decode($api_content, true);
        if ($decode_content === false) {
            echo $api_content;
        } else {
            if (!$decode_content["error_cd"]) {
                print_r($decode_content["result"]);
            } else {
                printf("[%s]%s(%s)", $decode_content["datetime"], $decode_content["error_msg"], $decode_content["error_cd"]);
            }
        }
    }
?></pre>
  </div>
</div>
</body>
</html>
