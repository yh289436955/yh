<?php /* Smarty version 2.6.31, created on 2018-03-09 09:36:24
         compiled from login.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登陆</title>
    <link rel="stylesheet" href="../static/admin/css/init.css">
    <link rel="stylesheet" href="../static/admin/css/login.css">
</head>
<body>
    <div class="login">
        <div class="box">
            <h1>登陆</h1>
            <form action="login.php" method="post">
                <div class="box_content">
                    <div>
                        <input type="text" placeholder="请输入账号" name="name">
                    </div>
                    <div>
                        <input type="password" placeholder="请输入密码" name="pass">
                    </div>
                    <div>
                        <input name="act" type="hidden" id="act" value="login">
                        <button type="submit">登陆</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>