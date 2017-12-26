<?php
namespace app\project\controller;

use app\project\common\BaseController;
use think\Loader;

class Doc extends BaseController
{
    public function index()
    {
        if ($this->request->isAjax())
            return jsonOutPut(1, '', Loader::model('Doc')->with('projectGroup')->field('group_id,doc_id,doc_name,doc_order,update_time')->where($this->groupCondition('doc'))->order('doc_order ASC,update_time ASC')->paginate(10));
        else
            abort(404, '请求错误！');
    }

    public function edit($id)
    {
        $data = Loader::model('Doc')->find($id)->toArray();
        if($data['doc_type'] == 1){
            $data['doc_content1'] = $data['doc_content'];
            $data['doc_content2'] = '';
        }else{
            $data['doc_content1'] = '';
            $data['doc_content2'] = $data['doc_content'];
        }
        $this->assign($data);
        return $this->fetch('edit');
    }

    public function create()
    {
        $this->assign([
            'project_id' => $this->request->get('pid', 0),
            'group_id' => $this->request->get('gid', 0),
            'doc_id' => 0,
            'doc_type' => 1,
            'doc_name' => '',
            'doc_content1' => '',
            'doc_content2' => ''
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
        $validate = Loader::validate('Doc');
        if(!$validate->check($data))
            return jsonOutPut(0, $validate->getError(), '');

        $data['group_id'] = isset($data['group_Child']) && !empty($data['group_Child']) ? $data['group_Child'] : $data['group_Parent'];
        $doc = isset($data['id']) ? Loader::model('Doc')->get($data['id']) : Loader::model('Doc');
        return jsonOutPut(1, '操作成功', $doc->allowField(true)->save($data)); // 不做状态判断！
    }

    public function delete($id)
    {
        $delete = Loader::model('Doc')->destroy($id);
        return $delete ? jsonOutPut(1, '删除成功', $delete) : jsonOutPut(0, '删除失败', $delete);
    }

    public function order($id)
    {
        $order = Loader::model('Doc')->save(['doc_order' => $this->request->put('order', 0)], ['doc_id' => $id]);
        return $order ? jsonOutPut(1, '操作成功', $order) : jsonOutPut(0, '操作失败', []);
    }
}