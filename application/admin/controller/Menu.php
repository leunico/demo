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
        $fields = ['cate_ParentId' => $this->request->get('id'), 'cate_Icon' => '', 'cate_Intro' => '', 'cate_Name' => '', 'cate_Model' => '', ];
        $this->assign($fields);
        return $this->fetch('edit');
    }

    public function save()
    {
        $cate = Loader::model('Cate');
        $cate->cate_Icon     = $this->request->post('cate_Icon');
        $cate->cate_Intro    = $this->request->post('cate_Intro');
        $cate->cate_Name     = $this->request->post('cate_Name');
        $cate->cate_Model    = $this->request->post('cate_Model');
        $cate->cate_ParentId = $this->request->post('cate_ParentId');
        return jsonOutPut(1, '', $cate->save());
    }

    public function delete($id)
    {
        return jsonOutPut(1, '', Loader::model('Cate')->delMenu($id));
    }
}