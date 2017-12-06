<?php
namespace app\project\controller;

use app\project\common\BaseController;
use think\Loader;

class Index extends BaseController
{
    public function index($id)
    {
//        dump(Loader::model('Project')->find($id)->toArray());
        $project = Loader::model('Project')->find($id)->toArray();
        $this->assign($project);
        return $this->fetch('index');
    }
}