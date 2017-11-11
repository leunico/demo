<?php
namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class Cate extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    
    /**
     * 获取菜单列表
     * @author baiyouwen
     */
    public function getListMenu()
    {
        return $this->order('cate_ParentId, cate_Order')->paginate(100)->toArray(); // 菜单不应该有太长！
    }

    /**
     * 删除菜单列表
     * @author baiyouwen
     */
    public function delMenu($id)
    {
        $items = $this->where('cate_ParentId', $id)->column('cate_Id');
        if(!empty($items))
            $this->where(['cate_Id' => ['in', implode(',', $items)]])->delete();

        return $this->destroy($id);
    }
}
