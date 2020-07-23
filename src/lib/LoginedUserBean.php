<?php
namespace Ioh\Library\Bean;

/**
 * 用户登录信息
 */
class LoginedUserBean
{
    private $_id;
    private $_loginName;
    private $_nickName;
    private $_token;
    private $_isAdmin;

    private function __construct($login_info)
    {
        $this->_id = $login_info["user_id"];
        $this->_loginName = $login_info["user_login_name"];
        $this->_nickName = $login_info["user_nick_name"];
        $this->_token = $login_info["user_token"];
        $this->_isAdmin = $login_info["admin_flg"] == "1" ? true : false;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getLoginName()
    {
        return $this->_loginName;
    }

    public function getNickName()
    {
        return $this->_nickName;
    }

    public function getToken()
    {
        return $this->_token;
    }

    public function isAdmin()
    {
        return $this->_isAdmin;
    }

    public static function getInstance($login_info)
    {
        return new LoginedUserBean($login_info);
    }
}
?>