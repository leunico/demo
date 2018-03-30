<?php
namespace app\common\model;

use think\Model;

class Config extends Model
{
    protected $type = [
        'config_Value'   => 'json',
        'config_Content' => 'json',
    ];
}