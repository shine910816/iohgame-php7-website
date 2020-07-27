<?php
/**
 * 公用方法类
 * @author Kinsama
 * @version 2017-02-20
 */
class Utility
{

    /**
     * 获取文件格式文件名
     * @param string $name 参数格式文件名
     * @return string 文件格式文件名
     */
    public static function getFileFormatName($name)
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $name)));
    }

    /**
     * 获取参数格式文件名
     * @param string $name 文件格式文件名
     * @return string 参数格式文件名
     */
    public static function getParamFormatName($name)
    {
        $result = "";
        for ($i = 0; $i < strlen($name); $i++) {
            $str = substr($name, $i, 1);
            if (preg_match('/^[a-z0-9]$/', $str)) {
                $result .= $str;
            } else {
                $result .= "_" . strtolower($str);
            }
        }
        return ltrim($result, "_");
    }

    /**
     * 为字符串或数组添加索引标识
     * @param string or array $value 字符串或数组
     * @param boolean $db_flg 数据库表名或字段名Flag
     * @return string or array
     */
    public static function quoteString($value, $db_flg = false)
    {
        if (is_array($value)) {
            foreach ($value as $arr_key => $arr_val) {
                $value[$arr_key] = self::quoteString($arr_val, $db_flg);
            }
        } else {
            if ($db_flg) {
                $value = '`' . $value . '`';
            } else {
                $value = str_replace('"', '\\"', $value);
                $value = '"' . $value . '"';
            }
        }
        return $value;
    }

    /**
     * 按概率返回结果
     * @param float $rate 概率(百分值)
     * @return boolean 符合概率范围内返回true，否则返回false
     */
    public static function getRateResult($rate)
    {
        $base_rate = floor($rate * 100);
        $rand_num = rand(1, 10000);
        if ($rand_num > $base_rate) {
            return false;
        }
        return true;
    }

    /**
     * 获取随机字符列
     * @param int $length 长度
     * @param boolean $upper_flg 大写字母Flag
     * @return string
     */
    public static function getRandomString($length = 6, $upper_flg = false)
    {
        $number_list = "0123456789";
        $lower_list = "abcdefghijklmnopqrstuvwxyz";
        $upper_list = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $string_list = $number_list . $lower_list;
        if ($upper_flg) {
            $string_list .= $upper_list;
        }
        $random_string = "";
        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen($string_list) - 1);
            $random_string .= substr($string_list, $index, 1);
        }
        return $random_string;
    }

    /**
     * 获取随机验证码
     *
     * @param int $length
     * @return string
     */
    public static function getNumberCode($length = 6)
    {
        $number_list = "0123456789";
        $result = "";
        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen($number_list) - 1);
            $result .= substr($number_list, $index, 1);
        }
        return $result;
    }

    public static function transSalt($code = null)
    {
        if (is_null($code)) {
            $code = self::getRandomString();
        }
        $md5_code = md5($code);
        $salt1 = substr($md5_code, 0, 16);
        $salt2 = substr($md5_code, 16, 16);
        return array(
            "code" => $code,
            "salt1" => $salt1,
            "salt2" => $salt2
        );
    }

    public static function sendToPhone($phone, $code, $template)
    {
        if (TEST_STATUS) {
            return true;
        }
        require_once SRC_PATH . "/ext/aliyun-dysms-php-sdk/Message.php";
        $result = Message::sendSms($phone, $code, $template);
        return $result->Code == "OK";
    }

    public static function sendToMail($mail_address, $title, $content)
    {
        if (TEST_STATUS) {
            return true;
        }
        require_once SRC_PATH . "/ext/PHPMailer/Mailer.php";
        $mailer = Mailer::getInstance();
        return $mailer->send($mail_address, $title, $content);
    }

    public static function transContext($str)
    {
        $i_flg = false;
        $b_flg = false;
        $result = "";
        for ($i = 0; $i < mb_strlen($str, "utf-8"); $i++) {
            $word = mb_substr($str, $i, 1, "utf-8");
            if ($word == "_") {
                if ($i_flg) {
                    $result .= "</i>";
                    $i_flg = false;
                } else {
                    $result .= "<i>";
                    $i_flg = true;
                }
            } elseif ($word == "*") {
                if ($b_flg) {
                    $result .= "</b>";
                    $b_flg = false;
                } else {
                    $result .= "<b>";
                    $b_flg = true;
                }
            } else {
                $result .= $word;
            }
        }
        return $result;
    }

    public static function getPasswordSecurityLevel($password)
    {
        $ref_text = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()`~-_=+[{]}\\|;:'\",<.>/?";
        $ref = array();
        for ($j = 0; $j < strlen($ref_text); $j++) {
            $ref[] = substr($ref_text, $j, 1);
        }
        $length = mb_strlen($password, "utf-8");
        $password_arr = array();
        for ($i = 0; $i < $length; $i++) {
            $password_arr[] = mb_substr($password, $i, 1, "utf-8");
        }
        $result = 0;
        foreach ($password_arr as $password_item) {
            if (!in_array($password_item, $ref)) {
                return 0;
            }
            $result++;
        }
        return $result;
    }

    public static function encodeInfo($param)
    {
        $result = base64_encode(json_encode($param));
        $result = rtrim($result, "=");
        $result = str_replace("+", "-", $result);
        $result = str_replace("/", "_", $result);
        return $result;
    }

    public static function decodeInfo($param)
    {
        $param = str_replace("_", "/", $param);
        $param = str_replace("-", "+", $param);
        $result = json_decode(base64_decode($param), true);
        return $result;
    }

    public static function transJson($json_path)
    {
        $json_header = get_headers($json_path);
        if (strpos($json_header[0], "200 OK") === false) {
            $err = Report::getInstance();
            $err->raiseError(ERROR_CODE_THIRD_ERROR_FALSIFY, "地址无效: " . $json_path);
            $err->setPos(__FILE__, __LINE__);
            return $err;
        }
        $json_array = json_decode(file_get_contents($json_path), true);
        if (empty($json_array)) {
            $err = Report::getInstance();
            $err->raiseError(ERROR_CODE_THIRD_ERROR_FALSIFY, "JSON内容无效: " . $json_path);
            $err->setPos(__FILE__, __LINE__);
            return $err;
        }
        return $json_array;
    }

    public static function getBirthInfo($custom_birth)
    {
        $result = array();
        $birthday = new DateTime($custom_birth);
        $month_day = $birthday->format("nd");
        $now_month_day = date("nd");
        $result["age"] = date("Y") - $birthday->format("Y");
        if ($now_month_day < $month_day) {
            $result["age"] -= 1;
        }
        if ($month_day >= 321 && $month_day <= 419) {
            $result["con"] = "白羊";
            $result["icon"] = "&#9800;";
        }
        if ($month_day >= 420 && $month_day <= 520) {
            $result["con"] = "金牛";
            $result["icon"] = "&#9801;";
        }
        if ($month_day >= 521 && $month_day <= 621) {
            $result["con"] = "双子";
            $result["icon"] = "&#9802;";
        }
        if ($month_day >= 622 && $month_day <= 722) {
            $result["con"] = "巨蟹";
            $result["icon"] = "&#9803;";
        }
        if ($month_day >= 723 && $month_day <= 822) {
            $result["con"] = "狮子";
            $result["icon"] = "&#9804;";
        }
        if ($month_day >= 823 && $month_day <= 922) {
            $result["con"] = "处女";
            $result["icon"] = "&#9805;";
        }
        if ($month_day >= 923 && $month_day <= 1023) {
            $result["con"] = "天秤";
            $result["icon"] = "&#9806;";
        }
        if ($month_day >= 1024 && $month_day <= 1122) {
            $result["con"] = "天蝎";
            $result["icon"] = "&#9807;";
        }
        if ($month_day >= 1123 && $month_day <= 1221) {
            $result["con"] = "射手";
            $result["icon"] = "&#9808;";
        }
        if ($month_day >= 1222 || $month_day <= 119) {
            $result["con"] = "摩羯";
            $result["icon"] = "&#9809;";
        }
        if ($month_day >= 120 && $month_day <= 218) {
            $result["con"] = "水瓶";
            $result["icon"] = "&#9810;";
        }
        if ($month_day >= 219 && $month_day <= 320) {
            $result["con"] = "双鱼";
            $result["icon"] = "&#9811;";
        }
        return $result;
    }

    /**
     * 测试变量
     *
     * @param mixed $data 变量
     * @param boolean $disp_flg 表示形式
     */
    public static function testVariable($data, $disp_flg = false)
    {
        if ($disp_flg) {
            header("Content-Type:text/html; charset=utf-8");
            var_dump($data);
        } else {
            header("Content-Type:text/plain; charset=utf-8");
            print_r($data);
        }
        exit();
    }
}
?>