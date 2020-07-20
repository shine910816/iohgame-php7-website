<?php
// desc: 自定义常量
// author: Kinsama
// version: 2016-06-20
// +------------------------------------
// | 时间
// +------------------------------------
/**
 * 系统默认时区
 */
define("DATE_DEFAULT_TIMEZONE", "Asia/Shanghai");
/**
 * 系统默认今年
 */
define("DATE_DEFAULT_THIS_YEAR", date("Y"));
// +------------------------------------
// | 系统默认
// +------------------------------------
/**
 * 系统默认标题
 */
define("SYSTEM_DEFAULT_TITLE", "永恒荣耀 - Infinity of Honor");
/**
 * 系统默认域名
 */
define("SYSTEM_APP_HOST", "http://" . $_SERVER['HTTP_HOST'] . "/");
/**
 * 系统默认域名
 */
define("SYSTEM_API_HOST", "http://" . $_SERVER['HTTP_HOST'] . "/api/");
/**
 * 系统默认MENU
 */
define("SYSTEM_DEFAULT_MENU", "common");
/**
 * 系统默认ACT
 */
define("SYSTEM_DEFAULT_ACT", "home");
/**
 * API默认MENU
 */
define("SYSTEM_DEFAULT_API_MENU", "usr_api");
/**
 * 首页显示项目最大条数
 */
define("TOP_PAGE_DISPLAY_MAX", 5);
/**
 * 普通权限
 */
define("SYSTEM_AUTH_COMMON", 1);
/**
 * 用户权限
 */
define("SYSTEM_AUTH_LOGIN", 2);
/**
 * 管理员权限
 */
define("SYSTEM_AUTH_ADMIN", 3);
/**
 * 系统默认错误警报MENU
 */
define("SYSTEM_ERROR_MENU", "common");
/**
 * 系统默认错误警报ACT
 */
define("SYSTEM_ERROR_ACT", "error");
/**
 * Logined Cookie keys
 */
define("LOGINED_COOKIE_KEY", "D5832206-C345-2FBE-A737-A8BF29E22AB0");
/**
 * 本地访问允许IP列表
 */
define("LOCAL_ALLOW_ADDRESS", serialize(array(
    "127.0.0.1",
    "172.23.3.149"
)));
/**
 * 首页访问允许IP列表
 */
define("LOCAL_UNALLOW_ADDRESS", serialize(array(
    "172.23.3.149"
)));
// +------------------------------------
// | 画面
// +------------------------------------
/**
 * 画面默认关键字
 */
define("SYSTEM_PAGE_KEYWORD", "");
/**
 * 画面默认描述
 */
define("SYSTEM_PAGE_DESCRIPTION", "");
/**
 * Smarty左边界符
 */
define("SMARTY_LT_DELIMITER", "{^");
/**
 * Smarty右边界符
 */
define("SMARTY_RT_DELIMITER", "^}");
/**
 * 画面显示
 */
define("VIEW_DONE", 1);
/**
 * 画面不显示
 */
define("VIEW_NONE", null);
/**
 * 画面显示条目数量
 */
define("DISPLAY_NUMBER_PER_PAGE", 20);
// +------------------------------------
// | 用户
// +------------------------------------
/**
 * 用户初始积分
 */
define("CUSTOM_INITIAL_POINT", 100);
/**
 * 用户签到积分
 */
define("CUSTOM_SIGNIN_POINT", 10);
/**
 * 用户积分最大值
 */
define("CUSTOM_MAXIMAL_POINT", 9999999);
/**
 * 用户修改昵称消耗积分
 */
define("CUSTOM_CHANGE_NICK_POINT", 300);
/**
 * 用户修改密码期限提示
 */
define("CUSTOM_NO_CHANGE_PASSWORD_LIMIT", 90 * 24 * 60 * 60);
// +------------------------------------
// | 小说模块
// +------------------------------------
/**
 * 【新】标识显示期限
 */
define("NOVEL_NEW_DISP_DAY", 3);
// +------------------------------------
// | 文档模块
// +------------------------------------
/**
 * Windows换行符
 */
define("WINDOWS_FILE_DELIMITER", "\r\n");
/**
 * LINUX换行符
 */
define("LINUX_FILE_DELIMITER", "\n");

/**
 * 绑定邮箱地址邮件模版
 */
define("MAIL_TPL_BIND_PHONE", '<p>尊敬的用户:</p><p>您的邮箱地址绑定验证码为</p><h1 style="color:#FF6600;">%s</h1><p>请在5分钟内按页面提示提交验证码</p><p>切勿将验证码泄露于他人</p>');
/**
 * 解除绑定邮箱地址邮件模版
 */
define("MAIL_TPL_REMOVE_PHONE", '<p>尊敬的用户:</p><p>您的邮箱地址解除绑定验证码为</p><h1 style="color:#FF6600;">%s</h1><p>请在5分钟内按页面提示提交验证码</p><p>切勿将验证码泄露于他人</p>');
/**
 * 重置密码邮件模版
 */
define("MAIL_TPL_RESET_PASSWORD", '<p>尊敬的用户:</p><p>您的重置登录密码验证码为</p><h1 style="color:#FF6600;">%s</h1><p>请在5分钟内按页面提示提交验证码</p><p>切勿将验证码泄露于他人</p>');
/**
 * 找回密码邮件模版
 */
define("MAIL_TPL_GETBACK_PASSWORD", '<p>尊敬的用户:</p><p>您的找回登录密码验证码为</p><h1 style="color:#FF6600;">%s</h1><p>请在5分钟内按页面提示提交验证码</p><p>切勿将验证码泄露于他人</p>');
/**
 * Access key file
 */
//require_once SRC_PATH . "/driver/token/Init2.php";
// +------------------------------------
// | GLOBAL KEY
// +------------------------------------
/**
 * 登录跳转全局主键
 */
define("REDIRECT_URL", "68E8CD70-A70F-E965-F11C-8A183033F96A");
/**
 * 修改昵称全局主键
 */
define("USER_CHANGE_NICK", "C5FCD6C9-25D4-52B4-84C6-6874EFFDFC85");
/**
 * 找回密码全局主键
 */
define("USER_GETBACK_PASSWORD", "BD36CE3D-2374-2FC5-1892-9B993650EB18");
// +------------------------------------
// | 错误代码
// +------------------------------------
/**
 * 错误代码-默认
 */
define("ERROR_CODE_DEFAULT", "1000");
/**
 * 错误代码-ACTION文件不存在
 */
define("ERROR_CODE_NONE_ACTION_FILE", "1001");
/**
 * 错误代码-ACTION类不存在
 */
define("ERROR_CODE_NONE_ACTION_CLASS", "1002");
/**
 * 错误代码-TPL文件不存在
 */
define("ERROR_CODE_NONE_TPL_FILE", "1003");
/**
 * 错误代码-数据库参数
 */
define("ERROR_CODE_DATABASE_PARAM", "2001");
/**
 * 错误代码-数据库结果
 */
define("ERROR_CODE_DATABASE_RESULT", "2002");
/**
 * 错误代码-数据库结果
 */
define("ERROR_CODE_DATABASE_DISACCEPT", "2003");
/**
 * 错误代码-用户窜改画面
 */
define("ERROR_CODE_USER_FALSIFY", "3001");
/**
 * 错误代码-外部画面POST
 */
define("ERROR_CODE_OUTSIDE_FALSIFY", "3002");
/**
 * 错误代码-用户窜改验证码
 */
define("ERROR_CODE_VERIFY_FALSIFY", "3003");
/**
 * 错误代码-用户API获取失败
 */
define("ERROR_CODE_API_GET_FALSIFY", "4001");
/**
 * 错误代码-用户API存在错误
 */
define("ERROR_CODE_API_ERROR_FALSIFY", "4002");
/**
 * 错误代码-第三方API存在错误
 */
define("ERROR_CODE_THIRD_ERROR_FALSIFY", "5001");
?>