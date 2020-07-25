<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>人民币配色测试</title>
<link type="text/css" rel="stylesheet" href="css/rmb.css" />
<style type="text/css">
.display_box {
  width:420px;
  height:630px;
}
.t_block {
  width:100px;
  height:100px;
  margin:5px 0 0 5px;
  float:left;
}
</style>
</head>
<body>
<div class="display_box">
<?php
    $t = explode(",", "A,B,C,D,E,F");
    foreach ($t as $cols) {
        for ($rows = 1; $rows < 5; $rows++) {
            printf('<div class="t_block %s"></div>', $cols . $rows);
        }
    }
?>
</div>
</body>
</html>