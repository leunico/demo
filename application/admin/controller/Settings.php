<?php
namespace app\admin\controller;

use app\admin\common\BaseController;
use think\Loader;

class Settings extends BaseController
{
    public function index()
    {
        return $this->fetch('index');
    }

    public function menu()
    {
        if (request()->isAjax()){
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
}