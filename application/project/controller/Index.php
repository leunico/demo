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
        $items = Loader::model('ProjectGroup')->getListGroup($id);
        $group = [];
        foreach ($items['data'] as $v) {
            $group[$v['group_id']] = $v;
            $group[$v['group_id']]['items'] = [];
            if ($v['group_parent_id'] != 0)
                $group[$v['group_parent_id']]['items'][$v['group_id']] = &$group[$v['group_id']];
        }

        foreach ($group as $k=>$v) {
            if ($v['group_parent_id'] != 0)
                unset($group[$k]);
        }

        $this->assign('group', $group);
        $this->assign('id', $id);
        return $this->fetch('api');
    }

    public function code($id)
    {
        $items = Loader::model('CodeGroup')->getListGroup($id);
        $group = [];
        foreach ($items['data'] as $v) {
            $group[$v['group_id']] = $v;
            $group[$v['group_id']]['items'] = [];
            if ($v['group_parent_id'] != 0)
                $group[$v['group_parent_id']]['items'][$v['group_id']] = &$group[$v['group_id']];
        }

        foreach ($group as $k=>$v) {
            if ($v['group_parent_id'] != 0)
                unset($group[$k]);
        }

        $this->assign('group', $group);
        $this->assign('id', $id);
        return $this->fetch('code');
    }
}