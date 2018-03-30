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

    public function api($id)
    {
        if($this->request->isAjax())
            $this->success('请求成功', '', Loader::model('ProjectLog')->where(['log_model_id' => $id, 'log_model' => 'Api', 'log_type' => 3])->field('log_id,create_time,log_name,log_type,log_model,log_title,log_content,log_isnow')->order('log_id DESC')->paginate(10));
        else
            abort(404, '请求错误！');
    }

    public function refresh($id)
    {
        $data = Loader::model('ProjectLog')->where('log_id', $id)->value('log_history');
        if(empty($data))
            $this->error('恢复失败');

        $data = (array)json_decode($data);
        foreach(['interface_header', 'interface_body', 'interface_response'] as $val){
            if(isset($data[$val]))
                $data[$val] = (array)json_decode($data[$val]);
        }

        $data['log_remark'] = '恢复到版本：' . $data['log_remark'];
        $refresh = Loader::model('Api')->update((array)$data);
        if(empty($refresh)){
            $this->error('恢复失败');
        }else{
            Loader::model('ProjectLog')->where(['log_model_id' => $data['interface_id'], 'log_model' => 'Api', 'log_type' => 3])->update(['log_isnow' => 0]);
            Loader::model('ProjectLog')->where('log_id', $id)->update(['log_isnow' => 1]);
            $this->success('恢复成功');
        }
    }

    public function destroy($id)
    {
        $delete = Loader::model('ProjectLog')->destroy($id);
        $delete ? $this->success('删除成功', '', $delete) : $this->error('删除失败');
    }
}