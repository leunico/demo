<?php
namespace app\project\common;

use app\common\controller\BaseController as Controller;
use think\Loader;

class BaseController extends Controller
{
    protected $failException = true;

    // 初始化项目
    protected function _initialize()
    {

    }

    # 获取分组
    protected function getGroupList($id, $type)
    {
        $items = Loader::model('ProjectGroup')->getListGroup($id, $type);
        $group = [];
        foreach ($items['data'] as $v) {
            $group[$v['group_id']] = $v;
            $group[$v['group_id']]['items'] = [];
            if ($v['group_parent_id'] != 0)
                $group[$v['group_parent_id']]['items'][$v['group_id']] = &$group[$v['group_id']];
        }

        foreach ($group as $k=>$v) {
            if ($v['group_parent_id'] != 0)
                unset($group[$k]);
        }

        return $group;
    }

    # 分组控制器的条件筛选
    protected function groupCondition($model)
    {
        $where['project_id'] = $this->request->get('pid', 0);

        if(!empty($model)){
            if (!empty($this->request->get('keyword', '')))
                $where[$model . '_name'] = ['LIKE', "%" . $this->request->get('keyword', '') . "%"];
        }

        $gid = $this->request->get('gid', '');
        if('' === $gid){
            $where['group_id'] = ['>', 0];
        }else if(0 == $gid){
            $where['group_id'] = $gid;
        }else{
            $child = Loader::model('ProjectGroup')->where(['group_parent_id' => $gid])->column('group_id');
            if(empty($child))
                $where['group_id'] = $gid;
            else
                $where['group_id'] = ['IN', array_merge($child, [$gid])];
        }

        return $where;
    }
}