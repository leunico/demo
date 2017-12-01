<?php
namespace app\project\controller;

use app\project\common\BaseController;
//use think\Loader;

class Api extends BaseController
{
    public function index($id)
    {
        return $this->fetch('index');
    }
}