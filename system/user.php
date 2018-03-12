<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/12
 * Time: 14:02
 */

require('common.php');

$act = empty($_POST['act']) ? '' : $_POST['act'];

if ($act == 'add') {
//    $smarty->display('myuser.html');
    $html = ob_get_contents();
    $json = array(
        'status' => true,
        'msg' => '',
        'data' => $html,
    );
    echo json_encode($json);
} else {
    $sql = "SELECT * FROM $table ";
    $query = $DB->query($sql);
    $userList = array();
    while ($row = $DB->fetch_array($query)) {
        array_push($userList,$row);
    }

    $smarty->assign('list',$userList);
    $smarty->display('user.html');
}

?>