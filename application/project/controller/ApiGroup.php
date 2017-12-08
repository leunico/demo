<?php
namespace app\project\controller;

use app\project\common\BaseController;
use think\Loader;

class ApiGroup extends BaseController
{
    public function index()
    {
        if ($this->request->isAjax()){
            $gid = $this->request->get('gid', 0);
            if(!empty($gid)){
                $items = Loader::model('ApiGroup')->where('group_ParentId', $gid)->column('group_Id,group_Name');
                return jsonOutPut(1, '请求成功！', $items);
            }else{
                return jsonOutPut(0, '请求失败！', []);
            }
        }
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
            'group_ParentId' => $this->request->get('gpid', 0),
            'group_Name' => '',
            'group_Id' => 0
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