<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/8
 * Time: 17:18
 */
require(CORE_PATH.'libs/marty.class.php');

//缓存路径设置
$template_dir = ROOT_PATH.THEME_DIR.'/';
$compile_dir = ROOT_PATH.'template_c/compile/';
$cache_dir = ROOT_PATH.'template_c/cache/';


if (defined('IN_ADMIN') && IN_ADMIN == TRUE) {
    $dirname = 'admin';
    $lifetime = 0;
    $caching = false;
} elseif (defined('IN_MEMBER')) {
    $dirname = 'app';
    $lifetime = 0;
    $caching = false;
} else {
    $dirname = 'home';
    $lifetime = CACHE_LIFETIME;
    $caching = CACHE_ON;
}

$smarty = new Smarty();
$smarty->debugging = false;
$smarty->template_dir = $template_dir.$dirname.'/';
$smarty->compile_dir = $compile_dir.$dirname.'/';
$smarty->cache_dir = $cache_dir.$dirname.'/';
$smarty->caching = $caching;
$smarty->cache_lifetime = $lifetime;
$smarty->left_delimiter = "{";
$smarty->right_delimiter = "}";

//检查模板是否存在
function template_exists($template) {
    global $smarty;

    if (!$smarty->templateExists($template)){
        exit('The template file "'.$template.'" is not found!');
    }
}
?>