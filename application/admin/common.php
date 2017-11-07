<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: albert <qq@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

# admin_菜单转换html
function procMenuHtml($tree)
{
    $html = '';
    foreach($tree as $t) {
        if(empty($t['items'])) {
            $html .= "<dd><a href=\"{$t['cate_Model']}\">{$t['cate_Name']}</a></dd>";
        } else {
            $html .= "<dd><a href=\"{$t['cate_Model']}\">{$t['cate_Name']}</a>";
            $html .= procMenuHtml($t['items']);
            $html  = $html."</dd>";
        }
    }

    return $html ? "<dl class='layui-nav-child'>$html</dl>" : $html;
}

# admin_菜单转换树结构
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