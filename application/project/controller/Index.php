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
        $items = Loader::model('ApiGroup')->getListGroup($id);
        $group = [];
        foreach ($items['data'] as $v) {
            $group[$v['group_Id']] = $v;
            $group[$v['group_Id']]['items'] = [];
            if ($v['group_ParentId'] != 0)
                $group[$v['group_ParentId']]['items'][$v['group_Id']] = &$group[$v['group_Id']];
        }

        foreach ($group as $k=>$v) {
            if ($v['group_ParentId'] != 0)
                unset($group[$k]);
        }

        $this->assign('group', $group);
        $this->assign('id', $id);
        return $this->fetch('api');
    }
}