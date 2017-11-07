<?php
namespace app\admin\controller;

use app\admin\common\BaseController;

class Settings extends BaseController
{
    public function index()
    {
        return $this->fetch('index');
    }

    public function menu()
    {
        if (request()->isAjax()){
            $items = db('cate')->order('cate_ParentId, cate_Order')->paginate(100)->toArray(); // 菜单不应该有太长！
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