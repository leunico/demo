<?php
namespace app\project\model;

use think\Model;

class ProjectUser extends Model
{
    public function user()
    {
        return $this->belongsTo('app\common\model\User', 'user_id', 'user_id');
    }

    public function getRuleTypeAttr($value)
    {
        $status = [
            99 => ['id' => 99, 'str' => '超级管理员'],
            1  => ['id' => 1, 'str' => '管理成员'],
            2  => ['id' => 2, 'str' => '只读成员'],
            3  => ['id' => 3, 'str' => '读写成员']
        ];

        return $status[$value];
    }

    public function getProjectUser($id)
    {
        $data = $this->with('user')->field('id,rule_type,remark_name,user_id')->where('project_id', $id)->order("rule_type DESC")->select();
        $result = ['admin' => [], 'users' => []];
        foreach ($data as $item) {
            if(in_array($item->rule_type['id'], [99, 1]))
                $result['admin'][] = $item;
            else
                $result['users'][] = $item;
        }
        
        return $result;
    }
}
