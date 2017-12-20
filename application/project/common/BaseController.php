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
        $where['project_Id'] = $this->request->get('pid', 0);

        if(!empty($this->request->get('keyword', '')))
            $where['interface_Name'] = ['LIKE', "%".$this->request->get('keyword', '')."%"];

        $gid = $this->request->get('gid', '');
        if('' === $gid){
            $where['group_Id'] = ['>', 0];
        }else if(0 == $gid){
            $where['group_Id'] = $gid;
        }else{
            $child = Loader::model('ApiGroup')->where(['group_ParentId' => $gid])->column('group_Id');
            if(empty($child))
                $where['group_Id'] = $gid;
            else
                $where['group_Id'] = ['IN', array_merge($child, [$gid])];
        }

        return $where;
    }
}