<?php
namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class Project extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

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
