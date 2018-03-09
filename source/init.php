<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/8
 * Time: 15:43
 */
error_reporting(E_ALL);         //错误报告
//设置默认编码
header('Content-type:text/html;charset=utf-8');
//设置时区
if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('PRC');
}
// 防止一些低级的XSS
if($_SERVER['REQUEST_URI']) {
    $temp = urldecode($_SERVER['REQUEST_URI']);
    if(strpos($temp, '<') !== false || strpos($temp, '>') !== false || strpos($temp, '(') !== false || strpos($temp, '"') !== false) {
        exit('Request Bad url');
    }
}
// 防止 PHP 5.1.x 使用时间函数报错
if(PHP_VERSION > '5.1') {
    @date_default_timezone_set('UTC');
}

//加载配置文件
if (is_file(ROOT_PATH.'config.php')) {
    require(ROOT_PATH.'config.php');
} else {
    exit('config.php file is missing!');
}

require(CORE_PATH.'include/mysql.php');
require(CORE_PATH.'include/function.php');

/** 对传入的变量进行转义 */
if(version_compare(PHP_VERSION,'5.4.0','<')) {
    ini_set('magic_quotes_runtime',0);
    define('MAGIC_QUOTES_GPC',get_magic_quotes_gpc()?True:False);
}else{
    define('MAGIC_QUOTES_GPC',false);
}


//初始化数据库
$DB = new MySQL(DB_HOST,DB_PORT,DB_USER,DB_PASS,DB_NAME,DB_CHARSET,TABLE_PREFIX,DB_PCONNECT);

/** 初始化变量 */
$php_self = htmlspecialchars($_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME']);
$base_name = basename($php_self);
$site_root = substr($php_self, 0, -strlen($base_name));
$site_url = htmlspecialchars('http://'.$_SERVER['HTTP_HOST'].substr($php_self, 0, strrpos($php_self, '/')).'/');

define('SITE_ROOT', $site_root);
define('SITE_URL', $site_url);

/** 加载模板引擎 */
require(CORE_PATH.'include/smarty.php');
?>
