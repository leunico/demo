<?php
namespace app\project\validate;

use think\Validate;

class ProjectGroup extends Validate
{
    protected $rule = [
        'group_name' => 'require|max:25',
        'group_parent_id' => 'number',
        'group_type' => 'require|in:1,2,3',
        'project_id' => 'require|number'
    ];
}