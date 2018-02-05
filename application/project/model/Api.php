<?php
namespace app\project\model;

use app\project\common\BaseModel as Model;
use traits\model\SoftDelete;

class Api extends Model
{
    use SoftDelete;
    protected $table = 'albert_interface';
    protected $deleteTime = 'delete_time';
    protected static function init()
    {
        self::_initLog('接口', 'interface_name');
    }

    protected $type = [
        'interface_response' => 'json',
        'interface_body'     => 'json',
        'interface_header'   => 'json'
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
