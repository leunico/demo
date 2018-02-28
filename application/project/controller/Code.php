<?php
namespace app\project\controller;

use app\project\common\BaseController;
use think\Loader;

class Code extends BaseController
{
    public function index()
    {
        if ($this->request->isAjax())
            $this->success('请求成功', '', Loader::model('Code')->with('projectGroup')->field('group_id,code_id,code_name,code_remark,create_time,code_order')->where($this->groupCondition('code'))->order('code_order ASC')->paginate(10));
        else
            abort(404, '请求错误！');
    }

    public function edit($id)
    {
        $this->assign(Loader::model('Code')->find($id)->toArray());
        return $this->fetch('edit');
    }

    public function create()
    {
        $this->assign([
            'project_id' => $this->request->get('pid', 0),
            'group_id' => $this->request->get('gid', 0),
            'code_id' => 0,
            'code_name' => '',
            'code_remark' => ''
        ]);
        return $this->fetch('edit');
    }

    public function update()
    {
        return $this->save();
    }

    public function save()
    {
        $data = $this->request->param();
        $validate = Loader::validate('Code');
        if(!$validate->check($data))
            $this->error($validate->getError());

        $data['group_id'] = isset($data['group_Child']) && !empty($data['group_Child']) ? $data['group_Child'] : $data['group_Parent'];
        $code = isset($data['id']) ? Loader::model('Code')->get($data['id']) : Loader::model('Code');
        $this->success('操作成功', '', $code->allowField(true)->save($data)); // 不做状态判断！
    }

    public function delete($id)
    {
        $delete = Loader::model('Code')->destroy($id);
        $delete ? $this->success('删除成功', '', $delete) : $this->error('删除失败');
    }

    public function order($id)
    {
        $order = Loader::model('Code')->update(['code_id' => $id, 'code_order' => $this->request->put('order', 0), 'log_type' => 6]);
        $order ? $this->success('操作成功', '', $order) : $this->error('操作失败');
    }
}