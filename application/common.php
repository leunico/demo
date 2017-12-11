<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

# 菜单循环
function procMenuHtml($tree, $route)
{
    $html = '';
    foreach($tree as $t) {
        if(empty($t['items'])) {
            $html .= "<dd class='" . ($t['cate_Model'] == $route ? 'layui-this-new' : "") . "'><a href='".handleUrl($t['cate_Model'])."' title='".$t['cate_Intro']."'><i class='fa fa-".$t['cate_Icon']."'>&nbsp;&nbsp;</i>".$t['cate_Name']."</a></dd>";
        } else {
            $html .= "<dd class='" . ($t['cate_Model'] == $route ? 'layui-this-new' : "") . "'><a href='".handleUrl($t['cate_Model'])."' title='".$t['cate_Intro']."'><i class='fa fa-".$t['cate_Icon']."'>&nbsp;&nbsp;</i>".$t['cate_Name']."</a>";
            $html .= procMenuHtml($t['items'], $route);
            $html  = $html."</dd>";
        }
    }

    return $html ? "<dl class='layui-nav-child'>$html</dl>" : $html;
}

# 菜单选中样式
function menuClass($menu, $route)
{
    $li_class = 'layui-nav-item';
    foreach($menu['items'] as $v)
        $li_class = $v['cate_Model'] == $route ? $li_class . ' layui-nav-itemed' : $li_class;

    return $menu['cate_Model'] == $route ? $li_class . ' layui-this-new' : $li_class;
}

# 处理url参数
function handleUrl($url)
{
    $request = request();
    if($request->isGet())
        return url($url, $request->param());
    else
        return url($url);
}

# 菜单转换树结构
function toTreeMenu($menu, $level = '', $data = [])
{
    if (empty($menu) || !is_array($menu))
        return false;

    foreach ($menu as $v) {
        if(!empty($v['cate_ParentId']) && $level == '')
            continue;

        $v['level'] = $level;
        $data[] = $v;
        if (!empty($v['items']))
            $data = toTreeMenu($v['items'], $level . '-', $data);
    }

    return $data;
}

# 验证图片的正确性
function validateImg($url, $type)
{
    return "/static/images/default/defaultp.jpg";
}

# 获取一个配置项的值
function getConfigModel($name)
{
    $config = model('config')->where('config_Name', $name)->find();
    $data = $config->getData();
    return (array)json_decode($data['config_Value']);
}

# 返回包装好的json数据
function jsonOutPut($status, $msg='', $data='', $page=1, $count=0)
{
    return json(['status' => $status, 'msg' => $msg, 'data' => $data, 'page' => $page, 'count' => $count]);
}

# 返回图片放置路径
function getImgPath($model)
{
    $model = strtolower($model);
    $basePath = ROOT_PATH . 'public' . DS . 'uploads'. DS . $model. DS;
    $filePath = '/uploads/'. $model . '/';
    return ['basePath' => $basePath, 'filePath' => $filePath];
}

# 生成随机字符串
function generatePassword($length = 8, $type = false)
{
    // 密码字符集，可任意添加你需要的字符
    $chars = empty($type) ? 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_ []{}<>~`+=,.;:/?|' : 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';
    for ( $i = 0; $i < $length; $i++ ) {
//        这里提供两种字符获取方式
//        第一种是使用 substr 截取$chars中的任意一位字符；
//        第二种是取字符数组 $chars 的任意元素
//        $password .= substr($chars, mt_rand(0, strlen($chars) – 1), 1);
        $password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
    }

    return $password;
}

# 判断文件夹是否存在不存在则创建
function mkdirs($dir, $mode = 0777)
{
    if (is_dir($dir) || @mkdir($dir, $mode))
        return TRUE;

    if (!mkdirs(dirname($dir), $mode))
        return FALSE;

    return @mkdir($dir, $mode);
}