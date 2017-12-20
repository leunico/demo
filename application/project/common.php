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

// 联动下拉框（api分组）
function apiGroupSelect($gid = 0, $project_Id = 0)
{
    $optionC = $optionP = '';
    if(empty($gid)){
        $pid = 0;
    }else{
        $pid = model('ApiGroup')->where(['group_Id' => $gid])->value('group_ParentId');
        if(empty($pid)){
            $pid = $gid;
        }else{
            $child = model('ApiGroup')->where(['group_ParentId' => $pid])->column('group_Id', 'group_Name');
            foreach($child as $k=>$v)
                $optionC .= $gid == $v ? "<option value=$v selected>$k</option>" : "<option value=$v>$k</option>";
        }
    }

    if(!empty($project_Id)){
        $parents = model('ApiGroup')->where(['group_ParentId' => 0, 'project_Id' => $project_Id])->column('group_Id', 'group_Name');
        if(!empty($parents)){
            foreach($parents as $k=>$v)
                $optionP .= $pid == $v ? "<option value=$v selected>$k</option>" : "<option value=$v>$k</option>";
        }
    }

    $htmlP = '<div class="layui-input-inline"><select name="group_Parent" lay-filter="group_Parent">%s</select></div>';
    $htmlC = '<div class="layui-input-inline"><select name="group_Child"><option value=0>-可不设置子分组-</option>%s</select></div>';
    return sprintf($htmlP, $optionP).sprintf($htmlC, $optionC);
}