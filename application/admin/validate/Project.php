<?php
namespace app\admin\validate;

use think\Validate;

class Project extends Validate
{
    protected $rule = [
        'project_Remark'  => 'max:255',
        'project_Name'    => 'require|max:64',
        'project_Status'  => 'in:1,2,3',
        'project_Version' => 'require|float',
        'project_Type'    => 'in:0,1',
    ];
}