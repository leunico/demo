<?php
namespace app\common\model;

use think\Model;
use app\project\model\ProjectGroup;
use app\project\model\ProjectUser;
use traits\model\SoftDelete;
use app\common\controller\Auth;

class Project extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    protected static function init()
    {
//        self::event('after_insert', function (Project $project) {
//            $project_id = $project->getLastInsID();
//            if (!empty($project_id)){
//                $auth = Auth::instance();
//                ProjectUser::create([
//                    'project_id' => $project_id,
//                    'user_id'    => $auth->user_id,
//                    'rule_type'  => 99
//                ]);
//
//                $project_group = new ProjectGroup;
//                $list = [
//                    ['project_id' => $project_id, 'group_name' => '默认分组', 'group_type' => 1],
//                    ['project_id' => $project_id, 'group_name' => '默认分组', 'group_type' => 2],
//                    ['project_id' => $project_id, 'group_name' => '默认分组', 'group_type' => 3]
//                ];
//                $project_group->saveAll($list);
//            }
//        });
    }

    public function saveNewProject($data, $user_id)
    {
        $this->startTrans();
        try{
            $this->data($data);
            $project = $this->allowField(true)->save();

            $project_id = $this->getLastInsID();
            $project_user = ProjectUser::create([
                'project_id' => $project_id,
                'user_id'    => $user_id,
                'rule_type'  => 99
            ]);

            $projectGroup = new ProjectGroup;
            $project_group = $projectGroup->saveAll([
                ['project_id' => $project_id, 'group_name' => '默认分组', 'group_type' => 1],
                ['project_id' => $project_id, 'group_name' => '默认分组', 'group_type' => 2],
                ['project_id' => $project_id, 'group_name' => '默认分组', 'group_type' => 3]
            ]);

            if($project && $project_user && $project_group){
                $this->commit();
                return true;
            }else{
                $this->rollback();
            }
        }catch(\Exception $e){
            $this->rollback();
        }

        return false;
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
