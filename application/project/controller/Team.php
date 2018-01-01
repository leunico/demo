<?php
namespace app\project\controller;

use app\project\common\BaseController;
use think\Loader;

class Team extends BaseController
{
    public function index($id)
    {
        if ($this->request->isAjax())
            return jsonOutPut(1, '', Loader::model('ProjectUser')->getProjectUser($id));
        else
            abort(404, '请求错误！');
    }
}