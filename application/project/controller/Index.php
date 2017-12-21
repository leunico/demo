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

    public function api($id)
    {
        $this->assign('id', $id);
        $this->assign('group', $this->getGroupList($id, 1));
        return $this->fetch('api');
    }

    public function code($id)
    {
        $this->assign('id', $id);
        $this->assign('group', $this->getGroupList($id, 2));
        return $this->fetch('code');
    }

    public function doc($id)
    {
        $this->assign('id', $id);
        $this->assign('group', $this->getGroupList($id, 3));
        return $this->fetch('doc');
    }
}