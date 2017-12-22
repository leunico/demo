<?php
namespace app\project\model;

use think\Model;
use traits\model\SoftDelete;

class Code extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    public function projectGroup()
    {
        return $this->belongsTo('ProjectGroup', 'group_id', 'group_id');
    }
}
