<?php
namespace Ioh\Library;

use Ioh\Library\Bean\LoginedUserBean;

/**
 * 用户控制器
 * @author Kinsama
 * @version 2016-12-30
 */
class User
{
    /**
     * 用户登陆信息
     */
    private $_login_info = array();

    public function __construct()
    {
        session_start();
        //if (!$this->hasVariable("language_code")) {
        //    $this->setVariable("language_code", "cn");
        //}
    }

    /**
     * 用户SESSION登陆
     */
    public function setSessionLogin($user_id, $user_login_name, $user_nick_name, $user_token, $admin_flg)
    {
        $login_info = array(
            "user_id" => $user_id,
            "user_login_name" => $user_login_name,
            "user_nick_name" => $user_nick_name,
            "user_token" => $user_token,
            "admin_flg" => $admin_flg
        );
        $this->setVariable(SESSION_LOGIN_KEY, $login_info);
    }

    /**
     * 用户COOKIE登陆
     */
    public function setCookieLogin($user_id, $user_login_name, $user_nick_name, $user_token, $admin_flg)
    {
        $login_info = array(
            "user_id" => $user_id,
            "user_login_name" => $user_login_name,
            "user_nick_name" => $user_nick_name,
            "user_token" => $user_token,
            "admin_flg" => $admin_flg
        );
        $login_info = base64_encode(json_encode($login_info));
        $login_info = rtrim($login_info, "=");
        $login_info = str_replace("+", "-", $login_info);
        $login_info = str_replace("/", "_", $login_info);
        $this->setParameter(COOKIE_LOGIN_KEY, $login_info, 5 * 24 * 60 * 60);
    }

    /**
     * 用户登出
     */
    public function setLogout()
    {
        if ($this->hasParameter(COOKIE_LOGIN_KEY)) {
            $this->freeParameter(COOKIE_LOGIN_KEY);
        }
        if ($this->hasVariable(SESSION_LOGIN_KEY)) {
            $this->freeVariable(SESSION_LOGIN_KEY);
        }
    }

    /**
     * 检测用户是否登陆
     * 
     * @return boolean
     */
    public function isLogin()
    {
        if ($this->hasParameter(COOKIE_LOGIN_KEY)) {
            return true;
        }
        if ($this->hasVariable(SESSION_LOGIN_KEY)) {
            return true;
        }
        return false;
    }

    /**
     * 获取用户登录信息
     * 
     * @return Ioh\Library\Bean\LoginedUserBean
     */
    public function getLoginInfo()
    {
        if ($this->isLogin()) {
            if ($this->hasParameter(COOKIE_LOGIN_KEY)) {
                $cookie_info = $this->getParameter(COOKIE_LOGIN_KEY);
                $cookie_info = str_replace("_", "/", $cookie_info);
                $cookie_info = str_replace("-", "+", $cookie_info);
                $login_info = json_decode(base64_decode($cookie_info), true);
                return LoginedUserBean::getInstance($login_info);
            } elseif ($this->hasVariable(SESSION_LOGIN_KEY)) {
                $login_info = $this->getVariable(SESSION_LOGIN_KEY);
                return LoginedUserBean::getInstance($login_info);
            }
        }
        return null;
    }

    /**
     * 获取权限等级
     */
    public function getAuthLevel()
    {
        if ($this->isLogin()) {
            if ($this->getLoginInfo()->isAdmin()) {
                return SYSTEM_AUTH_ADMIN;
            } else {
                return SYSTEM_AUTH_LOGIN;
            }
        } else {
            return SYSTEM_AUTH_COMMON;
        }
    }

    /**
     * 获取用户登录IP地址
     * 
     * @return string
     */
    public function getRemoteAddr()
    {
        return $_SERVER["REMOTE_ADDR"];
    }

    /**
     * 设置SESSION
     * 
     * @param string $name SESSION名
     * @param mixed $value SESSION值
     */
    public function setVariable($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    /**
     * 批量设置SESSION
     * 
     * @param array $value SESSION名与值
     */
    public function setVariables($value)
    {
        if (!is_array($value)) {
            return;
        }
        foreach ($value as $var_key => $var_value) {
            $_SESSION[$var_key] = $var_value;
        }
    }

    /**
     * 根据SESSION名判断SESSION是否存在
     * 
     * @param string $name SESSION名
     * @return boolean
     */
    public function hasVariable($name)
    {
        return isset($_SESSION[$name]);
    }

    /**
     * 根据SESSION名获取SESSION值
     * 
     * @param string $name SESSION名
     * @return mixed
     */
    public function getVariable($name)
    {
        if (!$this->hasVariable($name)) {
            return null;
        }
        return $_SESSION[$name];
    }

    /**
     * 根据多个SESSION名获取SESSION值
     * 
     * @param array $names SESSION名数组(索引序列)
     * @return mixed
     */
    public function getVariablesByNames($names)
    {
        if (!is_array($names)) {
            return null;
        }
        $data = array();
        foreach ($names as $name) {
            if (!$this->hasVariable($name)) {
                $data[$name] = null;
            }
            $data[$name] = $this->getVariable($name);
        }
        return $data;
    }

    /**
     * 获取全部SESSION值
     * 
     * @return array
     */
    public function getVariables()
    {
        return $_SESSION;
    }

    /**
     * 释放SESSION值
     * 
     * @param string $name SESSION名数组(索引序列)
     * @return array
     */
    public function freeVariable($name)
    {
        unset($_SESSION[$name]);
    }

    /**
     * 设置COOKIE值
     * 
     * @param string $name COOKIE键
     * @param string $value COOKIE值
     * @param integer $expire COOKIE有效时间（单位为秒）
     * @return array
     */
    public function setParameter($name, $value, $expire = 3600)
    {
        return setcookie($name, $value, time() + $expire, "/", $_SERVER["SERVER_NAME"], false, true);
    }

    /**
     * 释放COOKIE值
     * 
     * @param string $name COOKIE名数组(索引序列)
     * @return array
     */
    public function freeParameter($name)
    {
        return setcookie($name, null, 0, "/", $_SERVER["SERVER_NAME"], false, true);
    }

    /**
     * 根据COOKIE名判断COOKIE是否存在
     * 
     * @param string $name COOKIE名
     * @return boolean
     */
    public function hasParameter($name)
    {
        return isset($_COOKIE[$name]);
    }

    /**
     * 根据COOKIE名获取COOKIE值
     * 
     * @param string $name COOKIE名
     * @return mixed
     */
    public function getParameter($name)
    {
        if ($this->hasParameter($name)) {
            return $_COOKIE[$name];
        }
        return null;
    }

    /**
     * 获取本类实例化对象
     * 
     * @return object
     */
    public static function getInstance()
    {
        return new User();
    }
}
?>