<?php
namespace app\project\controller;

use app\project\common\BaseController;
use think\Loader;

class Api extends BaseController
{
    public function index()
    {
        abort(404, '请求错误！');
    }

    public function edit($id)
    {
        $this->assign(Loader::model('ApiGroup')->find($id)->toArray());
        return $this->fetch('edit');
    }

    public function create()
    {
        $this->assign([
            'project_Id' => $this->request->get('pid', 0),
            'group_Id' => $this->request->get('gid', 0),
            'interface_Url' => '',
            'interface_Name' => '',
            'interface_Remark' => '',
            'interface_Status' => '',
            'interface_Method' => ''
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
        $validate = Loader::validate('ApiGroup');
        if(!$validate->check($data) && !isset($data['group_Order']))
            return jsonOutPut(0, $validate->getError(), '');

        $cate = isset($data['id']) ? Loader::model('ApiGroup')->get($data['id']) : Loader::model('ApiGroup');
        $cate->data($data);
        return jsonOutPut(1, '操作成功', $cate->allowField(true)->save());
    }

    public function delete($id)
    {
        return jsonOutPut(1, '', Loader::model('ApiGroup')->delGroup($id));
    }
}