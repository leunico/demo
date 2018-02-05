<?php
namespace app\project\model;

use think\Model;
use traits\model\SoftDelete;

class ProjectLog extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    public static function record(array $params)
    {
        $user = \think\Session::get('user');
        $user_id = $user ? $user->user_id : 0;
        $user_name = $user ? $user->user_name : 'Unknown';

        $content = isset($params['content']) && !empty($params['content']) ? $params['content'] : '';
        $type = isset($params['log_type']) && !empty($params['log_type']) ? $params['log_type'] : 1;
        $title = isset($params['title']) && !empty($params['title']) ? $params['title'] : '';
        $project_id = isset($params['project_id']) && !empty($params['project_id']) ? $params['project_id'] : 0;

        if(empty($title) || empty($project_id))
            return false;

        self::create([
            'user_id' => $user_id,
            'project_id' => $project_id,
            'log_title' => $title,
            'log_content' => !is_scalar($content) ? json_encode($content) : $content,
            'log_url' => request()->url(),
            'log_type' => $type,
            'log_name'  => $user_name
        ]);
    }

    public function admin()
    {
        return $this->belongsTo('Admin', 'admin_id')->setEagerlyType(0);
    }
}
