<?php
namespace app\project\controller;

use app\project\common\BaseController;
use think\Loader;

class Log extends BaseController
{
    public function index($id)
    {
        if ($this->request->isAjax())
            $this->success('请求成功', '', Loader::model('ProjectLog')->where('project_id', $id)->order('log_id DESC')->paginate(10));
        else
            abort(404, '请求错误！');
    }
}