<?php
namespace app\common\model;

use think\Model;
use app\project\model\ApiGroup;
use traits\model\SoftDelete;

class Project extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    protected static function init()
    {
        Project::event('after_insert', function (Project $project) {
            $project_id = $project->getLastInsID();
            if (!empty($project_id)){
                ApiGroup::create(['project_Id' => $project_id, 'group_Name' => '默认分组']);
            }
        });
    }

    public function getProjectStatusAttr($value)
    {
        $status = [
            0 => ['str' => '已取消', 'style' => 'layui-btn-disabled'],
            1 => ['str' => '进行中', 'style' => ''],
            2 => ['str' => '已结束', 'style' => 'layui-btn-warm']
        ];

        return $status[$value];
    }
}
