<?php
namespace app\project\model;

use think\Model;
use traits\model\SoftDelete;

class Code extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    public function project_group()
    {
        return $this->belongsTo('ProjectGroup');
    }
}
