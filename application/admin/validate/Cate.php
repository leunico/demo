<?php
namespace app\index\validate;

use think\Validate;

class Cate extends Validate
{
    protected $rule = [
        'name'  =>  'require|max:25',
        'email' =>  'email',
    ];
}