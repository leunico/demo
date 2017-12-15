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
}
