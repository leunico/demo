<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\albert\www\demo\public/../application/admin\view\settings\menu.html";i:1509619034;s:68:"D:\albert\www\demo\public/../application/admin\view\Public\base.html";i:1509618884;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>layout 后台大布局 - Layui</title>
    <link rel="stylesheet" href="/static/css/layui.css">
    <!-- 自定义头部区域 -->
    
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo"><a href="<?php echo Url('Index/index'); ?>">之心后台</a></div>
        <ul id="navtop" class="layui-nav layui-layout-right layui-bg-green" lay-filter="">
            <li class="layui-nav-item" data-nav="Settings"><a href="<?php echo Url('Settings/menu'); ?>">系统设置</a></li>
            <!--<li class="layui-nav-item  layui-this"><a href="">商品管理</a></li>-->
            <!--<li class="layui-nav-item"><a href="">用户</a></li>-->
            <!--<li class="layui-nav-item">-->
                <!--<a href="javascript:;">其它系统</a>-->
                <!--<dl class="layui-nav-child">-->
                    <!--<dd><a href="">邮件管理</a></dd>-->
                    <!--<dd><a href="">消息管理</a></dd>-->
                    <!--<dd><a href="">授权管理</a></dd>-->
                <!--</dl>-->
            <!--</li>-->
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="https://avatars2.githubusercontent.com/u/14231022?s=120&u=f4a850878def91adf7757d8dc8294f960d5bda4d&v=4" class="layui-nav-img">之心
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                    <dd><a href="">退出登陆</a></dd>
                </dl>
            </li>
        </ul>
    </div>

    <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
    <?php echo widget('LeftMenuWidget/index'); ?>

    <!-- 内容区 -->
    
<div class="layui-body">
    <!-- 内容主体区域 -->
    <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
        <ul class="layui-tab-title">
            <li class="layui-this">网站设置</li>
            <li>菜单设置</li>
            <li>权限分配</li>
            <li>商品管理</li>
            <li>订单管理</li>
        </ul>
        <div class="layui-tab-content"></div>
    </div>
</div>


    <!-- 底部固定区域 -->
    
    <div class="layui-footer">© layui.com - 底部固定区域</div>
    
</div>
<script src="/static/layui.all.js"></script>
<script src="/static/jquery.min.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });

    $(function(){
        var action = "<?php echo request()->controller(); ?>";
        $("#navtop>li").each(function(){
            if(action == $(this).attr('data-nav'))
                $(this).addClass('layui-this');
            else
                $(this).removeClass('layui-this');
        });
    });
</script>

<!-- 自定义js区域 -->


</body>
</html>