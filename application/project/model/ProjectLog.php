<?php
namespace app\project\model;

use think\Model;
use traits\model\SoftDelete;

class ProjectLog extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    protected $type = [
        'log_history' => 'json'
    ];

    public function getLogTypeAttr($value)
    {
        $status = [
            1 => ['str' => '无效操作', 'style' => ''],
            2 => ['str' => '增加', 'style' => 'layui-bg-orange'],
            3 => ['str' => '修改', 'style' => 'layui-bg-green'],
            4 => ['str' => '删除', 'style' => 'layui-bg-cyan'],
            5 => ['str' => '写入', 'style' => 'layui-bg-black'],
            6 => ['str' => '更新排序', 'style' => 'layui-bg-blue'],
            7 => ['str' => '更新权限', 'style' => 'layui-bg-gray'],
            8 => ['str' => '回收', 'style' => 'layui-btn-red']
        ];

        return $status[$value];
    }

    public function getLogModelAttr($value)
    {
        $status = [
            'Api' => '接口',
            'Code' => '状态码',
            'Doc' => '文档',
            'ProjectUser' => '协作成员'
        ];

        return $status[$value];
    }

    public static function record(array $params)
    {
        $user = \think\Session::get('user');
        $user_id = $user ? $user->user_id : 0;
        $user_name = $user ? $user->user_name : 'Unknown';

        $content = isset($params['content']) && !empty($params['content']) ? $params['content'] : '';
        $log_history = isset($params['log_history']) && !empty($params['log_history']) ? $params['log_history'] : '';
        $title = isset($params['title']) && !empty($params['title']) ? $params['title'] : '';
        $model = isset($params['log_model']) && !empty($params['log_model']) ? $params['log_model'] : '';
        $project_id = isset($params['project_id']) && !empty($params['project_id']) ? $params['project_id'] : 0;
        $model_id = isset($params['log_model_id']) && !empty($params['log_model_id']) ? $params['log_model_id'] : 0;

        if(empty($title) || empty($project_id) || empty($model))
            return false;

        if(!empty($model_id))
            self::where(['log_model_id' => $model_id, 'log_model' => $model, 'log_type' => 3])->update(['log_isnow' => 0]);

        self::create([
            'user_id' => $user_id,
            'log_name'  => $user_name,
            'project_id' => $project_id,
            'log_title' => $title,
            'log_history' => $log_history,
            'log_model_id' => $model_id,
            'log_content' => !is_scalar($content) ? json_encode($content) : $content,
            'log_model' => $model,
            'log_type' => isset($params['log_type']) && !empty($params['log_type']) ? $params['log_type'] : 1,
            'log_isnow' => isset($params['log_isnow']) && !empty($params['log_isnow']) ? $params['log_isnow'] : 0
        ]);
    }
}
