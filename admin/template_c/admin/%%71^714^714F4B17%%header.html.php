<?php /* Smarty version 2.6.31, created on 2018-03-14 06:20:38
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
<!--删除模态框-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">删除</h4>
            </div>
            <div class="modal-body">
                <p>是否确定删除？</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-danger confirm">确定</button>
            </div>
        </div>
    </div>
</div>
    <div class="header">
        <div class="lf"><a href="admin.php">个人后台</a></div>
        <div class="lg"><a href="javascript:void(0)">退出登陆</a></div>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "nav.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="nav-right">