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

# 应用公共文件

// 分组下拉框
function apiGroupSelect($pid, $gpid)
{
    $parentGroups = model('ApiGroup')->where(['group_ParentId' => 0, 'project_Id' => $pid])->column('group_Id', 'group_Name');
    if(empty($parentGroups))
        return '';

    $html = '';
    foreach($parentGroups as $k=>$v)
        $html .= $gpid == $v ? "<option value=$v selected>$k</option>" : "<option value=$v>$k</option>";

    return $html;
}