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
}