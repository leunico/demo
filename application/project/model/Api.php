<?php
namespace app\project\model;

use think\Model;
use traits\model\SoftDelete;

class Api extends Model
{
    use SoftDelete;
    protected $table = 'albert_interface';
    protected $deleteTime = 'delete_time';

    protected $type = [
        'interface_Response' => 'json',
        'interface_Body'     => 'json',
        'interface_Header'   => 'json'
    ];

    public function getInterfaceStatusAttr($value)
    {
        $status = [
            0 => ['id' => $value, 'str' => '已弃用', 'style' => 'layui-btn-disabled'],
            1 => ['id' => $value, 'str' => '已启用', 'style' => '']
        ];

        return $status[$value];
    }
}
