<?php
namespace app\project\controller;

use app\project\common\BaseController;
use think\Loader;

class Log extends BaseController
{
    public function index($id)
    {
        if($this->request->isAjax()){
            $date = $this->request->post('date', '');
            $where = empty($date) ? ['project_id' => $id] : ['project_id' => $id, 'create_time' => ['between', explode(' - ', $date)]];
            $this->success('请求成功', '', Loader::model('ProjectLog')->where($where)->field('create_time,log_name,log_type,log_model,log_title,log_content')->order('log_id DESC')->paginate(15));
        }else{
            abort(404, '请求错误！');
        }
    }
}