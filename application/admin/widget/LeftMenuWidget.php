<?php
namespace app\admin\widget;

use think\Controller;
use think\Loader;

class LeftMenuWidget extends Controller
{
    public function index()
    {
        // 按pid从小到大排序，以保证父节点在前，子节点在后。sort是同一层次节点的显示顺序。
        $items = Loader::model('Cate')->getListMenu();
        $menu = [];
        foreach ($items['data'] as $v) {
            $menu[$v['cate_Id']] = $v;
            $menu[$v['cate_Id']]['items'] = []; // items存放当前节点的所有子节点。
            if ($v['cate_ParentId'] != 0)
                $menu[$v['cate_ParentId']]['items'][$v['cate_Id']] = &$menu[$v['cate_Id']];
        }
        foreach ($menu as $k=>$v) {
            if ($v['cate_ParentId'] != 0)
                unset($menu[$k]);
        }

        $this->assign('menu', $menu);
        return $this->fetch('Widget:leftMenu');
    }
}
