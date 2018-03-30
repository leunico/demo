<?php
namespace app\project\behavior;

//use think\Config;

class ProjectLog
{
    public function run(&$params)
    {
        if(request()->isPost() || request()->isPut() || request()->isDelete()){
            \app\project\model\ProjectLog::record($params);
        }
    }
}
