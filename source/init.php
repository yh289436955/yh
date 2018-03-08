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

?>
