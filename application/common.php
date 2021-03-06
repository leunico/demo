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
    $config = model('config')->where('config_Name', $name)->column('config_Value');
    return (array)json_decode($config[0]);
}

# 返回包装好的json数据
function jsonOutPut($status, $msg='', $data='')
{
    return json(['status' => $status, 'msg' => $msg, 'data' => $data]);
}

# 返回图片放置路径
function getImgPath($model)
{
    $model = strtolower($model);
    $basePath = ROOT_PATH . 'public' . DS . 'uploads'. DS . $model. DS;
    $filePath = '/uploads/'. $model . '/';
    return ['basePath' => $basePath, 'filePath' => $filePath];
}

# 返回时间描述
function format_date($time)
{
    $t = time()- strtotime($time);
    $f = [
        '31536000'=>'年',
        '2592000'=>'个月',
        '604800'=>'星期',
        '86400'=>'天',
        '3600'=>'小时',
        '60'=>'分钟',
        '1'=>'秒'
    ];

    foreach($f as $k=>$v){
        if(0 != $c = floor($t/(int)$k))
            return $c . $v . '前';
    }
}