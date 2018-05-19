<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/9
 * Time: 17:49
 */
//页面跳转
function redirect($url) {
    header('location:'.$url, false, 301);
    exit;
}
?>