<?php
namespace app\project\controller;

use app\project\common\BaseController;
use think\Loader;

class Index extends BaseController
{
    public function index($id)
    {
//        dump(Loader::model('Project')->find($id)->toArray());
        $this->assign(Loader::model('Project')->find($id)->toArray());
        return $this->fetch('index');
    }
}