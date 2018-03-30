<?php
namespace app\project\validate;

use think\Validate;

class Code extends Validate
{
    protected $rule = [
        'project_id'  => 'require|number|token',
        'code_name'   => 'require|max:32',
        'code_remark' => 'require|max:255'
    ];
}