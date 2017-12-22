<?php
namespace app\project\controller;

use app\project\common\BaseController;
use think\Loader;

class ProjectGroup extends BaseController
{
    public function index()
    {
        if ($this->request->isAjax()){
            $gid = $this->request->get('gid', 0);
            if(!empty($gid))
                return jsonOutPut(1, '请求成功！', Loader::model('ProjectGroup')->where('group_parent_id', $gid)->column('group_id,group_name'));
            else
                return jsonOutPut(0, '请求失败！', []);
        }else{
            abort(404, '请求错误！');
        }
    }

    public function edit($id)
    {
        $this->assign(Loader::model('ProjectGroup')->find($id)->toArray());
        return $this->fetch('edit');
    }

    public function create()
    {
        $this->assign([
            'project_id' => $this->request->get('pid', 0),
            'group_parent_id' => $this->request->get('gpid', 0),
            'group_type' => $this->request->get('type', 0),
            'group_name' => '',
            'group_id' => 0
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
        $validate = Loader::validate('ProjectGroup');
        if(!$validate->check($data))
            return jsonOutPut(0, $validate->getError(), '');

        $cate = isset($data['id']) ? Loader::model('ProjectGroup')->get($data['id']) : Loader::model('ProjectGroup');
        $cate->data($data);
        return jsonOutPut(1, '操作成功', $cate->allowField(true)->save());
    }

    public function delete($id)
    {
        return jsonOutPut(1, '', Loader::model('ProjectGroup')->delGroup($id));
    }
}