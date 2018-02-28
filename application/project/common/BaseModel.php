<?php
namespace app\project\common;

use think\Model;
use think\Hook;
use app\project\model\ProjectLog;

class BaseModel extends Model
{
    protected $readonly = ['log_remark', 'log_type'];
    protected static function _initLog($name, $title, $content = '')
    {
        if(empty($name) || empty($title))
            return false;

//        self::beforeInsert(function($bInsert){
//
//        });

        self::afterInsert(function($aInsert) use ($name, $title, $content)
        {
            $params = [
                'log_type' => 2,
                'log_model' => $name,
                'title' => $aInsert->{$title},
                'content' => $content,
                'project_id' => $aInsert->project_id
            ];

            Hook::listen('project_log', $params);
        });

//        self::beforeUpdate(function($bUpdate){
//
//        });

        self::afterUpdate(function($aUpdate) use ($name, $title, $content)
        {
            if(isset($aUpdate->delete_time) && !empty($aUpdate->delete_time))
                return false;

            if(empty($aUpdate->updateWhere) && !isset($aUpdate->{$aUpdate->pk}))
                return false;

            $model = self::get(empty($aUpdate->updateWhere) ? $aUpdate->{$aUpdate->pk} : $aUpdate->updateWhere);
            $params = [
                'log_type' => isset($aUpdate->log_type) && !empty($aUpdate->log_type) ? $aUpdate->log_type : 3,
                'log_model' => $name,
                'title' => $model->{$title},
                'content' => isset($aUpdate->log_remark) ? $aUpdate->log_remark : '',
                'project_id' => $model->project_id
            ];

            Hook::listen('project_log', $params);
        });

//        self::beforeWrite(function($bWrite){
//
//        });

        self::afterWrite(function($aWrite) use ($name, $title, $content){ // 所有操作都经过
//            $params = [
//                'log_type' => 5,
//                'title' => '写入一条' . $name . '：'. $aWrite->{$title},
//                'content' => $content,
//                'project_id' => $aWrite->project_id
//            ];
//            Hook::listen('project_log', $params);
        });

//        self::beforeDelete(function($bDelete){
//
//        });

        self::afterDelete(function($aDelete) use ($name, $title, $content)
        {
            $params = [
                'log_type' => 4,
                'log_model' => $name,
                'title' => $aDelete->{$title},
                'content' => $content,
                'project_id' => $aDelete->project_id
            ];

            Hook::listen('project_log', $params);
        });
    }
}