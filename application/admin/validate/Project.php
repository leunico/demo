<?php
namespace app\admin\validate;

use think\Validate;

class Project extends Validate
{
    protected $rule = [
        'project_remark'  => 'max:255',
        'project_name'    => 'require|max:64',
        'project_status'  => 'in:1,2,3',
        'project_version' => 'require|float',
        'project_type'    => 'in:0,1',
    ];
}