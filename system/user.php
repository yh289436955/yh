<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/12
 * Time: 14:02
 */

require('common.php');

$act = empty($_POST['act']) ? '' : $_POST['act'];
$page = isset($_GET['p']) ? $_GET['p'] : 1;

//点击新增返回新增模板
if ($act == 'add') {
    $smarty->display('myuser.html');
    $html = ob_get_contents();
    ob_end_clean();
    $json = array(
        'status' => true,
        'msg' => '',
        'data' => $html,
    );
    exit(json_encode($json));
} elseif ($act == 'new' || $act == 'mdf') {             //修改和编辑
    $nick_name = isset($_POST['user_name']) ? trim($_POST['user_name'])  : '';
    $user_type = isset($_POST['user_type']) ? trim($_POST['user_type'])  : '';
    $user_pass = isset($_POST['user_pass']) ? trim($_POST['user_pass'])  : '';
    $user_email = isset($_POST['user_email']) ? trim($_POST['user_email'])  : '';
    $user_qq = isset($_POST['user_qq']) ? trim($_POST['user_qq'])  : '';

    if (empty($nick_name)) {
        echo "<script>alert('请输入用户名称');history.back();</script>";
        exit;
    }

    if (empty($user_type)) {
        echo "<script>alert('请选择用户类型');history.back();</script>";
        exit;
    }

    if (empty($user_pass)) {
        echo "<script>alert('请输入用户密码');history.back();</script>";
        exit;
    }

    if (empty($user_email)) {
        echo "<script>alert('请输入用户邮箱');history.back();</script>";
        exit;
    } else {
        if (!is_valid_email($user_email)) {
            echo "<script>alert('输入邮箱不合法');history.back();</script>";
            exit;
        }
    }


    $data = array(
        'user_type' => $user_type,
        'nick_name' => $nick_name,
        'user_pass' => $user_pass,
        'user_email' => $user_email,
        'user_qq' => $user_qq
    );

    if ($act == 'new') {
        $query = $DB->query("SELECT user_id FROM $table WHERE user_email='$user_email'");
        if ($DB->num_rows($query)) {
            echo "<script>alert('您所添加的会员已经存在');history.back();</script>";
            exit;
        }

        $DB->insert($table,$data);
        msgbox("添加成功",'user.php');

    } elseif ($act == 'mdf') {

    }


} elseif ($act == 'modify') {                   //编辑
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
    $json = array('status' => true,'msg' => '','data' => '');
    if (empty($user_id)) {
        $json['status'] = false;
        $json['msg'] = "参数错误";
        exit(json_encode($json));
    }

    $row = $DB->fetch_one("SELECT user_id,user_type,nick_name,user_email,user_qq FROM $table WHERE user_id='$user_id' LIMIT 1 ");

    if (!$row) {
        $json['status'] = false;
        $json['msg'] = "会员不存在";
        exit(json_encode($json));
    }

    $smarty->assign('user',$row);
    $smarty->display('myuser.html');
    $data = ob_get_contents();
    ob_end_clean();
    $json['data'] = $data;
    exit(json_encode($json));
} else {
    $p = ($page - 1) * 3;
    $sql = "SELECT * FROM $table LIMIT $p,3";
    $query = $DB->query($sql);

    page($DB->get_count($table),$page,3);

    $userList = array();
    while ($row = $DB->fetch_array($query)) {
        array_push($userList,$row);
    }
    $smarty->assign('list',$userList);
    $smarty->display('user.html');
}

?>