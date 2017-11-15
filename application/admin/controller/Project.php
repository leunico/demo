<?php
namespace app\admin\controller;

use app\common\controller\BaseController;
use think\Loader;

class Project extends BaseController
{
    public function index()
    {
        if ($this->request->isAjax()){
            $items = Loader::model('Project')->order('project_Id')->paginate(10)->toArray();
            return jsonOutPut(1, '', $items);
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
            'project_Version' => '',
            'project_Type' => 1,
            'project_Remark' => '',
            'project_Name' => '',
            'project_Id' => 0,
            'project_Cover' => validateImg('', 'project')
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
            return jsonOutPut(0, $validate->getError(), '');

        $project = isset($data['id']) ? Loader::model('Project')->get($data['id']) : Loader::model('Project');
        $project->data($data);
        return jsonOutPut(1, '操作成功', $project->allowField(true)->save());
    }

    public function delete($id)
    {
        return jsonOutPut(1, '', Loader::model('Project')->delMenu($id));
    }

    public function upload()
    {
        $file = $this->request->file('file');
        if(!$file)
            return jsonOutPut(0, '图片不存在！', []);

        $path = getImgPath($this->request->controller());
        $info = $file->move($path['basePath']);
        if(!empty($info))
            return jsonOutPut(1, '项目封面上传成功', ['SaveName' => $path['filePath']. $info->getSaveName(), 'Filename' => $info->getFilename()]);
        else
            return jsonOutPut(0, $file->getError(), []);
    }
}