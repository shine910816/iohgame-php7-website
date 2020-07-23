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
 * 系统默认ACT
 */
define("SYSTEM_DEFAULT_TOKEN", "938AF062-9B89-9A41-0AAB-E58283847B4E");
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
 * Access key file
 */
// TODO
//require_once SRC_PATH . "/driver/AccessInit.php";
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
// +------------------------------------
// | GLOBAL KEY
// +------------------------------------
/**
 * Session login key
 */
define("SESSION_LOGIN_KEY", "A7020C73-E017-F66D-7703-3F7FC5F0C11D");
/**
 * Cookie login key
 */
define("COOKIE_LOGIN_KEY", "8961754D-EF97-45BF-052C-3E9DF1AE058A");
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
?>