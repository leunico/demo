<?php
namespace app\admin\controller;

use app\common\controller\BaseController;
use think\Loader;

class Project extends BaseController
{
    public function index()
    {
        if ($this->request->isAjax()){
            $items = Loader::model('Project')->order('project_id')->paginate(10)->toArray();
            $this->success('请求成功', '', $items);
        }

//        abort(404, '请求错误！');
    }

    public function edit($id)
    {
        $this->assign(Loader::model('Project')->find($id)->toArray());
        return $this->fetch('edit');
    }

    public function create()
    {
        $this->assign([
            'project_version' => '',
            'project_type' => 1,
            'project_remark' => '',
            'project_name' => '',
            'project_id' => 0,
            'project_cover' => validateImg('', 'project')
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
        $validate = Loader::validate('Project');
        if(!$validate->check($data) && !isset($data['cate_Order']))
            $this->error($validate->getError());

        $project = isset($data['id']) ? Loader::model('Project')->get($data['id']) : Loader::model('Project');
        $project->data($data);
        $this->success('操作成功', '', $project->allowField(true)->save());
    }

    public function delete($id)
    {
        $delete = Loader::model('Project')->destroy($id);
        $delete ? $this->success('删除成功', '', $delete) : $this->error('删除失败');
    }

    public function upload()
    {
        $file = $this->request->file('file');
        if(!$file)
            $this->error('图片不存在');

        $path = getImgPath($this->request->controller());
        $info = $file->move($path['basePath']);
        if(!empty($info))
            $this->success('项目封面上传成功', '', ['SaveName' => $path['filePath']. $info->getSaveName(), 'Filename' => $info->getFilename()]);
        else
            $this->error($file->getError());
    }
}