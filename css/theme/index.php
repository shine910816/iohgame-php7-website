<?php
// 动态CSS
header("Content-type:text/css; charset=utf-8");
$theme_data = array(
    "1" => explode(",", "4D683F,8E9A76,B29887,D3C499"),
    "5" => explode(",", "A18AB4,8EACC6,D592B1,ECDFBF"),
    "10" => explode(",", "97B495,C9B0AB,636F85,CBA9C4"),
    "20" => explode(",", "805F56,EDD8BD,8AA47D,9FBBD1"),
    "50" => explode(",", "686882,A799B2,6A8E8C,94BEB2"),
    "100" => explode(",", "AD79A0,DB657F,C57E8C,E2C080")
);
$theme_key = "100";
if (isset($_GET["k"]) && isset($theme_data[$_GET["k"]])) {
    $theme_key = $_GET["k"];
}
$theme_block = $theme_data[$theme_key];
function getOppoColor($color) {
    $light_count = 0;
    if (hexdec(substr($color, 0, 2)) > 127) {
        $light_count++;
    }
    if (hexdec(substr($color, 2, 2)) > 127) {
        $light_count++;
    }
    if (hexdec(substr($color, 4, 2)) > 127) {
        $light_count++;
    }
    if ($light_count > 1) {
        return "101010";
    }
    return "F0F0F0";
}
//foreach ($theme_block as $t_k => $theme_color) {
//    if ($t_k == 1 || $t_k == 3) {
//        printf(".theme_block_%s, .theme_block_%s:hover {\n", $t_k + 1, $t_k);
//    } else {
//        printf(".theme_block_%s {\n", $t_k + 1);
//    }
//    printf("  background-color:#%s!important;\n", $theme_color);
//    printf("  color:#%s!important;\n", getOppoColor($theme_color));
//    echo "}\n";
//}
?>
/* 动态主题样式表 - <?php echo $theme_key; ?>号模板 */
body, .left-max-panel, .left-min-panel {
  background-color:#<?php echo $theme_block[0]; ?>;
}
