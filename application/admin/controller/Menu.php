<?php
namespace app\admin\controller;

use app\admin\common\BaseController;
use think\Loader;

class Menu extends BaseController
{
    public function index()
    {
        if ($this->request->isAjax()){
            $items = Loader::model('Cate')->getListMenu();
            $menu = [];
            foreach ($items['data'] as $k=>$v) {
                $menu[$v['cate_Id']] = $v;
                $menu[$v['cate_Id']]['items'] = [];
                if($v['cate_ParentId'] != 0)
                    $menu[$v['cate_ParentId']]['items'][$v['cate_Id']] = &$menu[$v['cate_Id']];
            }

            $items['data'] = toTreeMenu($menu);
            return jsonOutPut(1, '', $items);
        }

//        abort(404, '请求错误！');
    }

    public function edit($id)
    {
        $this->assign(Loader::model('Cate')->find($id)->toArray());
        return $this->fetch('edit');
    }

    public function create()
    {
        $fields = ['cate_ParentId' => $this->request->get('id'), 'cate_Icon' => '', 'cate_Intro' => '', 'cate_Name' => '', 'cate_Model' => '',  'cate_Id' => 0];
        $this->assign($fields);
        return $this->fetch('edit');
    }

    public function update()
    {
        return $this->save();
    }

    public function save()
    {
        $data = $this->request->param();
        $validate = Loader::validate('Cate');
        if(!$validate->check($data) && !isset($data['cate_Order']))
            return jsonOutPut(0, $validate->getError(), '');

        $cate = isset($data['id']) ? Loader::model('Cate')->get($data['id']) : Loader::model('Cate');
        $cate->data($data);
        return jsonOutPut(1, '操作成功', $cate->allowField(true)->save());
    }

    public function delete($id)
    {
        return jsonOutPut(1, '', Loader::model('Cate')->delMenu($id));
    }
}