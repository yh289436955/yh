<?php /* Smarty version 2.6.31, created on 2018-03-14 06:20:43
         compiled from user.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'user.html', 12, false),array('modifier', 'date_format', 'user.html', 40, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="admin.php">系统管理</a></li>
        <li class="active">用户管理</li>
    </ol>

    <div class="public-btn">
        <form action="user.php" method="post" class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" name="key" id="public_name" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['key'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" placeholder="请输入名称或者邮箱">
            </div>
            <input type="hidden" name="act" value="search">
            <button type="submit" class="btn btn-primary">搜索</button>
        </form>
    </div>

    <table class="table table-bordered table-hover table_user">
        <tr>
            <th><label><input type="checkbox">全选</label></th>
            <th>用户名称</th>
            <th>用户类型</th>
            <th>用户邮箱</th>
            <th>用户QQ</th>
            <th>最后登陆时间</th>
            <th>操作</th>
        </tr>
        <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
        <tr>
            <td>
                <?php if ($this->_tpl_vars['item']['user_id'] != '1'): ?>
                <input type="checkbox" name="user_id" value="<?php echo $this->_tpl_vars['item']['user_id']; ?>
">
                <?php endif; ?>
            </td>
            <td><?php echo $this->_tpl_vars['item']['nick_name']; ?>
</td>
            <td><?php echo $this->_tpl_vars['item']['user_type']; ?>
</td>
            <td><?php echo $this->_tpl_vars['item']['user_email']; ?>
</td>
            <td><?php echo $this->_tpl_vars['item']['user_qq']; ?>
</td>
            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['login_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
</td>
            <td>
                <a href="javascript:void(0)" class="btn btn-primary btn-xs" onclick="myUser('<?php echo $this->_tpl_vars['item']['user_id']; ?>
')">修改</a>
                <?php if ($this->_tpl_vars['item']['user_id'] != '1'): ?>
                <a href="javascript:void(0)" class="btn btn-danger btn-xs" onclick="userDel('row','<?php echo $this->_tpl_vars['item']['user_id']; ?>
')">删除</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
    </table>

    <div class="button_btn clear">
        <div class="lf">
            <a href="javascript:void(0)" class="btn btn-primary" onclick="myUser()">新增</a>
            <a href="javascript:void(0)" class="btn btn-primary" onclick="userDel('.table_user')">删除</a>
        </div>
        <div class="lg">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
    </div>

</div>

<script type="text/javascript" src="../static/admin/js/user.js"></script>

<!--修改和新增模态框-->
<div class="modal fade" id="myUser" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <form action="user.php" method="post" class="form-horizontal">
            <input type="hidden" name="act" value="new">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">新增用户</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttom.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>