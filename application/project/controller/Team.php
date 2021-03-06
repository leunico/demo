<?php
namespace app\project\controller;

use app\project\common\BaseController;
use think\Loader;

class Team extends BaseController
{
    public function index($id)
    {
        if ($this->request->isAjax())
            $this->success('请求成功', '', Loader::model('ProjectUser')->getProjectUser($id, $this->auth->user_id));
        else
            abort(404, '请求错误！');
    }

    public function search()
    {
    	$id = $this->request->post('id', '');
    	if(empty($id))
    	    $this->error('参数错误！');

        if ($this->request->isAjax())
            $this->success('请求成功', '', Loader::model('User')->searchUser($this->request->post('keyword', ''), $id));
        else
            abort(404, '请求错误！');
    }

    public function add()
    {
        $user_id = $this->request->post('user_id', 0);
        $project_id = $this->request->post('project_id', 0);
        if(empty($user_id) || empty($project_id))
            $this->error('参数错误！');

        $this->success('请求成功', '', Loader::model('ProjectUser')->addTeam($user_id, $project_id));
    }

    public function set()
    {
        $type = $this->request->put('type', 0);
        $id = $this->request->put('id', 0);
        if(empty($type) || empty($id))
            $this->error('参数错误！');

        $set = Loader::model('ProjectUser')->setTeam($type, $id, $this->auth->user_id);
        if($set === true)
        	$this->success('请求成功');
        else
        	$this->error($set);
    }

    public function remark()
    {
        $name = $this->request->put('name', '');
        $id = $this->request->put('id', 0);
        if(empty($name) || empty($id))
            $this->error('参数错误！');

        $this->success('请求成功', '', Loader::model('ProjectUser')->update(['id' => $id, 'remark_name' => $name, 'log_remark' => '修改成员备注名称']));
    }
}