<?php /* Smarty version 2.6.31, created on 2018-03-14 01:56:38
         compiled from page.html */ ?>
<nav aria-label="Page navigation">
    <ul class="pagination ">
        <li><a href="?p=1">首页</a>
        <?php if ($this->_tpl_vars['page']['page'] == '1'): ?>
        <li class="disabled">
            <a href="javascript:void(0)">上一页</a>
        </li>
        <?php else: ?>
        <li>
            <a href="?p=<?php echo $this->_tpl_vars['page']['page']-1; ?>
" >上一页</a>
        </li>
        <?php endif; ?>

        <?php $_from = $this->_tpl_vars['page']['start']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <li><a href="?p=<?php echo $this->_tpl_vars['item']; ?>
"><?php echo $this->_tpl_vars['item']; ?>
</a></li>
        <?php endforeach; endif; unset($_from); ?>

        <li class="active"><a href="javascript:void(0)"><?php echo $this->_tpl_vars['page']['page']; ?>
</a></li>


        <?php $_from = $this->_tpl_vars['page']['end']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
        <li><a href="?p=<?php echo $this->_tpl_vars['item']; ?>
"><?php echo $this->_tpl_vars['item']; ?>
</a></li>
        <?php endforeach; endif; unset($_from); ?>
        <?php if ($this->_tpl_vars['page']['sum'] == $this->_tpl_vars['page']['page']): ?>
        <li class="disabled">
            <a href="javascript:void(0)">下一页</a>
        </li>
        <?php else: ?>
        <li>
            <a href="?p=<?php echo $this->_tpl_vars['page']['page']+1; ?>
">下一页</a>
        </li>
        <?php endif; ?>
        <li><a href="?p=<?php echo $this->_tpl_vars['page']['sum']; ?>
">未页</a>
    </ul>
</nav>