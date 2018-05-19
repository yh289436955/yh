<?php /* Smarty version 2.6.31, created on 2018-03-14 06:22:37
         compiled from classify.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'classify.html', 12, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="admin.php">站点管理</a></li>
        <li class="active">分类管理</li>
    </ol>

    <div class="public-btn">
        <form action="classify.php" method="post" class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" name="key" id="public_name" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['key'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" placeholder="请输入分类名称">
            </div>
            <input type="hidden" name="act" value="search">
            <button type="submit" class="btn btn-primary">搜索</button>
        </form>
    </div>

</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'buttom.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>