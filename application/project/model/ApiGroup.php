<?php
namespace app\project\model;

use think\Model;
use traits\model\SoftDelete;
use app\project\model\Api;

class ApiGroup extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    protected static function init()
    {
        self::event('before_delete', function (ApiGroup $api_group) {
            Api::where('group_Id', $api_group->group_Id)->update(['group_Id' => 0]);
        });
    }

    public function api()
    {
        return $this->hasMany('api', 'group_Id', 'group_Id');
    }

    /**
     * 获取分组列表
     * @author albert
     */
    public function getListGroup($project_id)
    {
        return $this->where('project_Id', $project_id)->order('group_ParentId, group_Order, group_Id')->paginate(100)->toArray();
    }

    /**
     * 删除分组列表
     * @author albert
     */
    public function delGroup($id)
    {
        $this->destroy($id);
        $items = $this->where('group_ParentId', $id)->column('group_Id');
        if(!empty($items)){
            foreach ($items as $v)
                $this->delGroup($v);
        }else{
            return $items;
        }
    }
}
