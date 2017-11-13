<?php
namespace app\common\controller;

use think\Controller;

class BaseController extends Controller
{
	protected $beforeActionList = [
        '_before_first',                       //在执行所有方法前都会执行_before_first方法
        //'second' =>  ['except'=>'hello'],      //除hello方法外的方法执行前都要先执行second方法
        //'three'  =>  ['only'=>'hello, data'],  //在hello/data方法执行前先执行three方法
    ];

    protected function _before_first()
    {
        $this->assign('controller', $this->request->controller());
    }
}