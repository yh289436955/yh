<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/8
 * Time: 15:41
 */
require('common.php');

$smarty->assign('name',$user['nick_name']);
$smarty->display('admin.html')

?>