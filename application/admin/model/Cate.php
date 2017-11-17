<?php
namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class Cate extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    
    /**
     * 获取栏目列表
     * @author albert
     */
    public function getListMenu($type = 3)
    {
        return $this->where('cate_Status', $type)->order('cate_ParentId, cate_Order, cate_Id')->paginate(100)->toArray(); // 菜单不应该有太长！
    }

    /**
     * 删除栏目列表
     * @author albert
     */
    public function delMenu($id)
    {
        $items = $this->where('cate_ParentId', $id)->column('cate_Id');
        $this->destroy($id);
        if(!empty($items)){
            foreach ($items as $v)
                $this->delMenu($v);
        }
    }
}
