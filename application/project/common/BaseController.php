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

    # api控制器的条件筛选
    protected function apiCondition()
    {
        $where['project_id'] = $this->request->get('pid', 0);

        if(!empty($this->request->get('keyword', '')))
            $where['interface_name'] = ['LIKE', "%".$this->request->get('keyword', '')."%"];

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