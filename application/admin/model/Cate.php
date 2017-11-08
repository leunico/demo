<?php
namespace app\admin\model;

use think\Model;

class Cate extends Model
{
    /**
     * 获取菜单列表
     * @author baiyouwen
     */
    public function getListMenu()
    {
        return $this->order('cate_ParentId, cate_Order')->paginate(100)->toArray(); // 菜单不应该有太长！
    }
}
