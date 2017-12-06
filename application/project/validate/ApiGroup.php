<?php
namespace app\project\validate;

use think\Validate;

class ApiGroup extends Validate
{
    protected $rule = [
        'group_Name'     => 'require|max:25',
        'group_ParentId' => 'number',
    ];
}