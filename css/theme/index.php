<?php
// 动态CSS
header("Content-type:text/css; charset=utf-8");
$theme_data = array(
    "1" => explode(",", "D3C499,B29887,8E9A76,4D683F"),
    "5" => explode(",", "8EACC6,D592B1,ECDFBF,A18AB4"),
    "10" => explode(",", "C9B0AB,97B495,CBA9C4,636F85"),
    "20" => explode(",", "8AA47D,9FBBD1,EDD8BD,805F56"),
    "50" => explode(",", "686882,A799B2,94BEB2,6A8E8C"),
    "100" => explode(",", "E2C080,AD79A0,C57E8C,DB657F")
);
$theme_key = "100";
if (isset($_GET["k"]) && isset($theme_data[$_GET["k"]])) {
    $theme_key = $_GET["k"];
}
$theme_block = $theme_data[$theme_key];
foreach ($theme_block as $t_k => $theme_color) {
    printf('.theme_block_%s {background-color:#%s!important;}' . "\n", $t_k + 1, $theme_color);
    printf('.theme_text_%s {color:#%s!important;}' . "\n", $t_k + 1, $theme_color);
}
?>