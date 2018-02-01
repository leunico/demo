<?php
namespace app\project\common;

use think\Model;

class BaseModel extends Model
{
    protected static function _initLog($name)
    {
        self::beforeInsert(function($bInsert){
//            dump($bInsert);die;
        });

        self::afterInsert(function($aInsert) use ($name){
            dump($name);
            dump($aInsert);die; // 新增后
        });

        self::beforeUpdate(function($bUpdate){
//            dump($bUpdate);die;
        });

        self::afterUpdate(function($aUpdate){
            dump($aUpdate);die; // 更新后
        });

        self::beforeWrite(function($bWrite){
//            dump($bWrite);die;
        });

        self::afterWrite(function($aWrite){
            dump($aWrite);die; // 写入后
        });

        self::beforeDelete(function($bDelete){
//            dump($bDelete);die;
        });

        self::afterDelete(function($aDelete){
            dump($aDelete);die; // 删除后
        });
    }
}