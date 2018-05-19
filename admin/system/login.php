<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/9
 * Time: 16:36
 */
require('load.php');

$table = $DB->table('users');

if (!empty($_POST) && $_POST['act'] == 'login') {
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $pass = isset($_POST['pass']) ? htmlspecialchars($_POST['pass']) : '';
    if (empty($name)) {
        msgbox('请输入正确的用户名！');
    }
    if (empty($pass)) {
        msgbox('请输入登陆密码！');
    }
    $user = $DB->fetch_one("SELECT user_id, user_pass, login_count FROM $table WHERE user_type='admin' AND nick_name='$name'");
    if ($user['user_id'] && $user['user_pass'] == md5($pass)) {
        $ip_address = sprintf("%u", ip2long(get_client_ip()));
        $login_count = $user['login_count'] + 1;
        $data = array(
            'login_time' => time(),
            'login_ip' => $ip_address,
            'login_count' => $login_count,
        );
        $where = array('user_id' => $user['user_id']);
        $DB->update($table, $data, $where);
        $user_auth = authcode("$user[user_id]@$user[user_pass]");
        setcookie('user_auth', $user_auth);

        redirect('admin.php');
    } else {
        msgbox('用户名或密码错误，请重试！');
    }

}

$smarty->display('login.html');
?>