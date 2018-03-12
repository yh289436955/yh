<?php /* Smarty version 2.6.31, created on 2018-03-12 04:39:59
         compiled from header.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../static/admin/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../static/admin/css/init.css">
    <script type="text/javascript" src="../static/admin/js/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="../static/admin/js/init.js"></script>
    <script type="text/javascript" src="../static/admin/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <title>后台</title>
</head>
<?php echo '
<script>
    $(document).ready(function(){
        setBodyHeight();
    })
</script>
'; ?>

<body>

    <div class="header">
        <div class="lf">个人后台</div>
        <div class="lg"><a href="javascript:void(0)">退出登陆</a></div>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "nav.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="nav-right">