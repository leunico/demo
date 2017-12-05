<?php
namespace app\project\model;

use think\Model;
use traits\model\SoftDelete;

class ApiGroup extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

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
    public function delMenu($id)
    {
        $items = $this->where('group_ParentId', $id)->column('group_Id');
        $this->destroy($id);
        if(!empty($items)){
            foreach ($items as $v)
                $this->delMenu($v);
        }
    }
}
