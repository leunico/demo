<?php
namespace app\project\model;

use app\project\common\BaseModel as Model;
use traits\model\SoftDelete;

class Doc extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected static function init()
    {
        self::_initLog('文档', 'doc_name');
    }

    public function projectGroup()
    {
        return $this->belongsTo('ProjectGroup', 'group_id', 'group_id');
    }
}
