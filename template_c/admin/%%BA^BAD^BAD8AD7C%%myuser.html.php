<?php /* Smarty version 2.6.31, created on 2018-03-13 08:02:02
         compiled from myuser.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'myuser.html', 29, false),)), $this); ?>
<div class="form-group">
    <label class="col-lg-2 control-label">用户类型</label>
    <div class="col-lg-6">
        <select name="user_type" class="form-control">
            <?php if ($this->_tpl_vars['user']['user_type'] == 'admin'): ?>
            <option value="member" selected>超级管理员</option>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['user']['user_type'] == 'member'): ?>
            <option value="member" selected>注册会员</option>
            <?php else: ?>
            <option value="member">注册会员</option>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['user']['user_type'] == 'recruit'): ?>
            <option value="recruit" selected>快速收录</option>
            <?php else: ?>
            <option value="recruit">快速收录</option>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['user']['user_type'] == 'vip'): ?>
            <option value="vip" selected>vip</option>
            <?php else: ?>
            <option value="vip">vip</option>
            <?php endif; ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-2 control-label">用户名称</label>
    <div class="col-lg-6">
        <input type="text" placeholder="请输入用户名称" class="form-control" name="user_name" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['user']['nick_name'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
">
    </div>
</div>
<div class="form-group">
    <label class="col-lg-2 control-label">登陆密码</label>
    <div class="col-lg-6">
        <input type="password" placeholder="请输入登陆密码" class="form-control" name="user_pass">
    </div>
</div>
<div class="form-group">
    <label class="col-lg-2 control-label">电子邮箱</label>
    <div class="col-lg-6">
        <input type="email" placeholder="请输入电子邮箱" class="form-control" name="user_email" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['user']['user_email'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
">
    </div>
</div>
<div class="form-group">
    <label class="col-lg-2 control-label">QQ号码</label>
    <div class="col-lg-6">
        <input type="text" placeholder="请输入QQ号码" class="form-control" name="user_qq" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['user']['user_qq'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
">
    </div>
</div>