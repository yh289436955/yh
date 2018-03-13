<?php /* Smarty version 2.6.31, created on 2018-03-13 08:49:10
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
" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php endif; ?>

        <li class="active"><a href="javascript:void(0)"><?php echo $this->_tpl_vars['page']['page']; ?>
</a></li>

        <!--<li class="active"><a href="#">1</a></li>-->
        <!--<li><a href="#">2</a></li>-->
        <!--<li><a href="#">3</a></li>-->
        <!--<li><a href="#">4</a></li>-->
        <!--<li><a href="#">5</a></li>-->
        <li>
            <a href="?p=<?php echo $this->_tpl_vars['page']['page']+1; ?>
">下一页</a>
        </li>
        <li><a href="?p=<?php echo $this->_tpl_vars['page']['sum']; ?>
">未页</a>
    </ul>
</nav>