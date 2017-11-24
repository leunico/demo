<?php
namespace app\admin\validate;

use think\Validate;

class Cate extends Validate
{
    protected $rule = [
        'cate_Icon'     => 'require|max:125',
        'cate_Intro'    => 'max:125',
        'cate_Name'     => 'require|max:25',
        'cate_Model'    => 'require|max:25',
        'cate_ParentId' => 'number',
        'cate_Type'     => 'in:1,2,3'
    ];
}