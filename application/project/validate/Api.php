<?php
namespace app\project\validate;

use think\Validate;

class Api extends Validate
{
    protected $rule = [
        'interface_name'   => 'require|max:32',
        'interface_url'    => 'require|url',
        'body_mode'        => 'in:1,2,3',
        'header_key'       => 'array',
        'header_value'     => 'array',
        'header_remark'    => 'array',
        'body_check'       => 'array',
        'body_name'        => 'array',
        'body_remark'      => 'array',
        'body_type'        => 'array',
        'body_value'       => 'array',
        'response_check'   => 'array',
        'response_name'    => 'array',
        'response_remark'  => 'array',
        'response_type'    => 'array',
        'response_value'   => 'array'
    ];
}