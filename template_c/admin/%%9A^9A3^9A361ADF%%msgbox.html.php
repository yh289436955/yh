<?php /* Smarty version 2.6.31, created on 2018-03-09 08:37:31
         compiled from msgbox.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>系统提示！</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo '
<style type="text/css">
*{margin: 0px; padding: 0px;}
body {background: #fff; font: 12px/23px Verdana, Arial, Helvetica, sans-serif;}
a {color: #be5050; text-decoration: none;}
a:hover {color: #f30; text-decoration: underline;}
.msgbox {border: solid 3px #be0a0a; margin: 80px auto 0px auto; width: 450px;}
.title {background: #be0a0a; color: #fff; font: bold 12px normal; padding: 7px;}
.content {background: #fff; color: #f30; padding: 15px;}
.link {background: #fee; border-top: solid 1px #fadddd; color: #be5050; line-height: 20px; padding: 3px; text-align: center;}
</style>
'; ?>

</head>

<body>
<div class="msgbox">
	<h2 class="title">系统提示！</h2>
    <div class="content"><?php echo $this->_tpl_vars['msg']; ?>
</div>
    <div class="link"><strong>系统 <span id="seconds" style="color: #f60;">2</span> 秒后将自动跳转</strong><br /><a href="<?php echo $this->_tpl_vars['url']; ?>
">如果您的浏览器没有自动跳转，请点击这里...</a></div>
</div>

</body>
</html>