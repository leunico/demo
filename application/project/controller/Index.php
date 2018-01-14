<?php
namespace app\project\controller;

use app\project\common\BaseController;
use think\Loader;

class Index extends BaseController
{
    protected function _initialize()
    {
        parent::_initialize();
        $rule = Loader::model('ProjectUser')->get(['user_id' => $this->auth->user_id, 'project_id' => $this->request->param('id', 0)]);
        if(empty($rule))
            $this->error("您没有此项目权限，请返回！", '/admin/index');

        if(isset($rule->rule_type) && $rule->rule_type['id'] == 3)
            $this->error("您是只读成员，不可进入编辑后台！", '/admin/index');

        $this->assign((array)$rule);
    }

    public function index($id)
    {
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

    public function team($id)
    {
        $this->assign('id', $id);
        return $this->fetch('team');
    }
}