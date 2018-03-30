<?php
namespace app\project\model;

use app\project\common\BaseModel as Model;
use traits\model\SoftDelete;

class Code extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected static function init()
    {
        self::_initLog('code_remark');
    }

    public function projectGroup()
    {
        return $this->belongsTo('ProjectGroup', 'group_id', 'group_id');
    }
}
