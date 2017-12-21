<?php
namespace app\project\model;

use think\Model;
use traits\model\SoftDelete;
use app\project\model\Api;

class ProjectGroup extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    protected static function init()
    {
        self::event('before_delete', function (ProjectGroup $project_group) {
            Api::where('group_id', $project_group->group_id)->update(['group_id' => 0]);
        });
    }

    public function api()
    {
        return $this->hasMany('api', 'group_id', 'group_id');
    }

    /**
     * 获取分组列表
     * @author albert
     */
    public function getListGroup($project_id, $group_type)
    {
        return $this->where(['project_id'=> $project_id, 'group_type' => $group_type])->order('group_parent_id, group_order, group_id')->paginate(100)->toArray();
    }

    /**
     * 删除分组列表
     * @author albert
     */
    public function delGroup($id)
    {
        $this->destroy($id);
        $items = $this->where('group_parent_id', $id)->column('group_id');
        if(!empty($items)){
            foreach ($items as $v)
                $this->delGroup($v);
        }else{
            return $items;
        }
    }
}
