<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\albert\www\demo\public/../application/admin\view\settings\index.html";i:1510016577;s:68:"D:\albert\www\demo\public/../application/admin\view\Public\base.html";i:1509708674;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>layout 后台大布局 - Layui</title>
    <link rel="stylesheet" href="/static/css/layui.css">
    <link rel="stylesheet" href="/static/css/admin.css">
    <link rel="stylesheet" href="/static/fontawesome/css/font-awesome.min.css">
    <!-- 自定义头部区域 -->
    
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo"><a href="<?php echo Url('Index/index'); ?>">之心后台</a></div>
        <ul id="navtop" class="layui-nav layui-layout-right layui-bg-green" lay-filter="">
            <li class="layui-nav-item" data-nav="Settings"><a href="<?php echo Url('Settings/index'); ?>">系统设置</a></li>
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
                    <img src="/static/images/default/top.jpg" class="layui-nav-img">之心
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
    
<div class="layui-body" id="main">
    <!-- 内容主体区域 -->
    <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
        <ul class="layui-tab-title">
            <li class="layui-this"><i class="fa fa-address-book">&nbsp;&nbsp;</i>网站设置</li>
            <li><i class="fa fa-sliders">&nbsp;&nbsp;</i>菜单设置</li>
            <li><i class="fa fa-address-card-o">&nbsp;&nbsp;</i>权限分配</li>
            <li><i class="fa fa-bookmark">&nbsp;&nbsp;</i>商品管理</li>
            <li><i class="fa fa-bookmark-o">&nbsp;&nbsp;</i>订单管理</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">内容不一样是要有，因为你可以监听tab事件（阅读下文档就是了）</div>
            <div class="layui-tab-item">
                <div class="layui-anim layui-anim-upbit">
                    <div class="layui-elem-quote" style="margin-top: 5px;border-left:5px solid #ffffff;background-color: #eeeeee">
                        <div>
                            <button class="layui-btn layui-btn-small" @click="addMenu()">添加菜单</button>
                        </div>
                        <table class="layui-table" lay-even lay-skin="nob">
                            <thead>
                                <tr>
                                    <!--<th>ID</th>-->
                                    <th>名称</th>
                                    <th>描述</th>
                                    <th>模型链接</th>
                                    <th>排序</th>
                                    <th>图标</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody v-cloak>
                                <tr v-for="item in menu_items">
                                    <!--<td>{{ item.cate_Id }}</td>-->
                                    <td style="white-space:pre;">{{ item.level|capitalize }}{{ item.cate_Name }}</td>
                                    <td>{{ item.cate_Intro }}</td>
                                    <td>{{ item.cate_Model }}</td>
                                    <td>{{ item.cate_Order }}</td>
                                    <td>{{ item.cate_Icon }}</td>
                                    <td>
                                        <a class="layui-btn layui-btn-primary layui-btn-mini" lay-event="detail">查看</a>
                                        <a class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
                                        <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            <!--<pagination :cur="1" :all="pageAll" :page-num="perPage" @page-to="loadMenuList"></pagination>-->
                            <button @click="nextList($event)" id="next" class="layui-btn layui-btn-small" style="background-color: #ffffff;color: black">加载更多</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-tab-item">内容3</div>
            <div class="layui-tab-item">内容4</div>
            <div class="layui-tab-item">内容5</div>
        </div>
    </div>
</div>
<div id="menuEdit">
    <form class="layui-form" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">单行输入框</label>
            <div class="layui-input-block">
                <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">验证必填项</label>
            <div class="layui-input-block">
                <input type="text" name="username" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">验证手机</label>
                <div class="layui-input-inline">
                    <input type="tel" name="phone" lay-verify="phone" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">验证邮箱</label>
                <div class="layui-input-inline">
                    <input type="text" name="email" lay-verify="email" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>
    </form>
</div>


    <!-- 底部固定区域 -->
    
        <div class="layui-footer">© layui.com - 底部固定区域</div>
    
</div>
<script src="/static/layui.all.js"></script>
<script src="https://unpkg.com/vue"></script>
<script src="/static/admin.js"></script>
<!--<script src="/static/jquery.min.js"></script>-->
<script>
    layui.use('element', function(){
//        var element = layui.element;
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

<script>
    var lists = new Vue({
        el: "#main",
        data: {
            menu_items: [],
            menu_page: 0
//            pageAll: 0,
//            perPage: 10
        },

        filters: {
            capitalize: function(value){
                return value.replace(/-/g, "       ");
            }
        },

        methods: {
            loadMenuList: function(){
                layer.load();
                $.ajax({
                    url : "<?php echo Url('Settings/menu'); ?>" + "?page=" + (this.menu_page+1),
                    type: "GET",
                    dataType: "json",
                    error:function(){layer.msg('请求菜单列表失败!', {anim: 6})},
                    success:function(res){
                        layer.closeAll('loading');
                        if (res.status > 0) {
//                            lists.menu_items = res.data.data;
//                            lists.perPage = res.data.per_page;
//                            lists.pageAll = res.data.last_page;
                            for ( var i in res.data.data )
                                lists.menu_items.push(res.data.data[i]);

                            lists.menu_page = res.data.current_page;
                            if(lists.menu_page < res.data.last_page)
                                $("#next").html('加载更多');
                            else
                                $("#next").remove();
                        }else{
                            layer.msg(res.msg, {anim: 6});
                        }
                    }
                });
            },

            nextList: function(e){
                e.target.innerHTML = '<i class="layui-anim layui-anim-rotate layui-anim-loop layui-icon ">&#xe63e;</i>';
                this.loadMenuList();
            },

            addMenu: function(){
                layer.open({
                    type: 1
                    ,id: 'menu'
                    ,content: $("#menuEdit")
                    ,btn: ['确认提交', '取消']
                    ,btnAlign: 'c' //按钮居中
                    ,shade: 0      //不显示遮罩
                    ,yes: function(){
                        layer.closeAll();
                    },btn2: function(index, layero){
                        //return false 开启该代码可禁止点击该按钮关闭
                    },cancel: function(){
                        //return false 开启该代码可禁止点击该按钮关闭
                    }
                });
            }
        }

//        mounted: function(){
//            this.loadMenuList();
//        }
    });

    layui.use(['element', 'layer'], function(){
        var element = layui.element
        element.on('tab(docDemoTabBrief)', function(data){
            if(lists.menu_items.length == 0)
                lists.loadMenuList();

//            layer.msg('切到到了'+ data.index + '：' + this.innerHTML);
        });
    });
</script>

</body>
</html>