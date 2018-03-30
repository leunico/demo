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

// 联动下拉框
function projectGroupSelect($gid = 0, $project_id = 0, $type = 1)
{
    $optionC = $optionP = '';
    if(empty($gid)){
        $pid = 0;
    }else{
        $pid = model('ProjectGroup')->where(['group_id' => $gid])->value('group_parent_id');
        if(empty($pid))
            $pid = $gid;

        $child = model('ProjectGroup')->where(['group_parent_id' => $pid])->column('group_id', 'group_name');
        foreach($child as $k=>$v)
            $optionC .= $gid == $v ? "<option value=$v selected>$k</option>" : "<option value=$v>$k</option>";
    }

    if(!empty($project_id)){
        $parents = model('ProjectGroup')->where(['group_parent_id' => 0, 'project_id' => $project_id, 'group_type' => $type])->column('group_id', 'group_name');
        if(!empty($parents)){
            foreach($parents as $k=>$v)
                $optionP .= $pid == $v ? "<option value=$v selected>$k</option>" : "<option value=$v>$k</option>";
        }
    }

    $htmlP = '<div class="layui-input-inline"><select name="group_Parent" lay-filter="group_Parent">%s</select></div>';
    $htmlC = '<div class="layui-input-inline"><select name="group_Child"><option value=0>-可不设置子分组-</option>%s</select></div>';
    return sprintf($htmlP, $optionP).sprintf($htmlC, $optionC);
}