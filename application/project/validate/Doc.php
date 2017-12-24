<?php
namespace app\project\validate;

use think\Validate;

class Doc extends Validate
{
    protected $rule = [
        'project_id'  => 'require|number',
        'doc_type'    => 'in:1,2',
        'doc_name'    => 'require|max:32',
        'doc_content' => 'require'
    ];
}