<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"D:\albert\www\demo\public/../application/admin\view\menu\edit.html";i:1510225155;s:68:"D:\albert\www\demo\public/../application/admin\view\Public\open.html";i:1510130522;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>23333</title>
    <link rel="stylesheet" href="/static/css/layui.css">
    <link rel="stylesheet" href="/static/fontawesome/css/font-awesome.min.css">
    <!-- 自定义头部区域 -->
    
</head>
<body>
<!-- 内容区 -->

<blockquote class="layui-elem-quote layui-text" style="margin-top:12px;">
    添加或编辑一个菜单
</blockquote>

<!--<fieldset class="layui-elem-field layui-field-title" style="margin-top: 10px;">-->
    <!--<legend>菜单（<?php echo request()->action(); ?>）</legend>-->
<!--</fieldset>-->

<div class="layui-tab-content" style="min-height:500px;">
    <form class="layui-form" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">选择图标</label>
            <div class="layui-input-block">
                <select name="cate_Icon" lay-filter="aihao" lay-verify="required">
                    <option value="">请选择</option>
                    <?php echo widget('BaseConfigWidget/icon'); ?>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">菜单名称</label>
            <div class="layui-input-block">
                <input type="text" name="cate_Name" lay-verify="required" placeholder="请输入菜单名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">菜单备注</label>
            <div class="layui-input-block">
                <input type="text" name="cate_Intro" lay-verify="title" autocomplete="off" placeholder="请输入菜单备注" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">菜单Model</label>
            <div class="layui-input-block">
                <input type="text" name="cate_Model" lay-verify="required" autocomplete="off" placeholder="请输入菜单链接" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-small" lay-submit="menu" lay-filter="menu" >立即提交</button>
                <button type="reset" class="layui-btn layui-btn-small layui-btn-primary">取消</button>
            </div>
        </div>
    </form>
</div>


<script src="/static/layui.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>

<!-- 自定义js区域 -->

<script>
    var $ = layui.jquery,
    form = layui.form;
    $(function(){
        $(".layui-anim-upbit>dd").each(function(e){
            if(e > 0) $(this).html('<i class="fa fa-'+ $(this).attr('lay-value') +'"></i>  ' + $(this).attr('lay-value'));
        });

        form.on('submit(menu)', function(data){
            $.post("<?php echo Url('menu/save'); ?>", data.field, function(){
                parent.layer.closeAll();
                parent.layer.closeAll();
            });
//            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });
    });
</script>

</body>
</html>