<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\albert\www\demo\public/../application/admin\view\Widget\leftMenu.html";i:1509593920;}*/ ?>
<div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
        <!--lay-filter="test"-->
        <ul class="layui-nav layui-nav-tree">
            <?php foreach($menu as $vo): if(($vo['cate_ParentId'] == 0) and (empty($vo['items']) == true)): ?>
                    <li class="layui-nav-item"><a href="<?php echo url($vo['cate_Model']); ?>"><?php echo $vo['cate_Name']; ?></a></li>
                <?php else: ?>
                    <li class="layui-nav-item">
                        <a href="javascript:;"><?php echo $vo['cate_Name']; ?></a>
                        <?php echo procMenuHtml($vo['items']); ?>
                    </li>
                <?php endif; endforeach; ?>
        </ul>
    </div>
</div>