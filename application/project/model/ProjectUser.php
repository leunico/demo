<?php
namespace app\project\model;

use app\project\common\BaseModel as Model;

class ProjectUser extends Model
{
    protected static function init()
    {
        self::_initLog('协作成员', 'remark_name');
    }

    public function user()
    {
        return $this->belongsTo('app\common\model\User', 'user_id', 'user_id')->setEagerlyType(0);
    }

    public function getRuleTypeAttr($value)
    {
        $status = [
            99 => ['id' => 99, 'str' => '超级管理员'],
            1  => ['id' => 1, 'str' => '管理成员'],
            2  => ['id' => 2, 'str' => '读写成员'],
            3  => ['id' => 3, 'str' => '只读成员']
        ];

        return $status[$value];
    }

    public function addTeam($user_id, $project_id)
    {
        $this->data([
            'user_id' => $user_id,
            'project_id' => $project_id,
            'rule_type' => 3
        ]);
        return $this->save();
    }

    public function existTeamUser($user_id, $project_id)
    {
        return empty($this->where(['project_id' => $project_id, 'user_id' => $user_id])->select()) ? true : false;
    }

    public function setTeam($type, $id, $user_id)
    {

        $relation = $this->get($id);
        if(empty($relation))
            return '协助成员不存在';

        $auth = $this->get(['project_id' => $relation->project_id, 'user_id' => $user_id]);
        if(empty($auth))
            return '权限错误';

        if(in_array($auth->rule_type['id'], [1, 2, 3]) && $relation->user_id == $user_id){
            return $type == 7 ? $this->where('id', $id)->delete() : '权限错误，非法操作';
        }else if(in_array($auth->rule_type['id'], [1, 99]) && $relation->user_id != $user_id){
            switch($type){
                case 2:
                    $result = $this->update(['id' => $id, 'rule_type' => 2]);
                    break;
                case 3:
                    $result = $this->update(['id' => $id, 'rule_type' => 3]);
                    break;
                case 4:
                    if($auth->rule_type == 1)
                        return '你不是超级管理员';

                    $result = $this->update(['id' => $id, 'rule_type' => 99]);
                    if(empty($result))
                        return '数据操作错误';

                    $result = $this->update(['id' => $auth->id, 'rule_type' => 1]);
                    break;
                case 5:
                    $result = $this->where('id', $id)->delete();
                    break;
                case 6:
                    if($auth->rule_type == 1)
                        return '你不是超级管理员';

                    $result = $this->update(['id' => $id, 'rule_type' => 1]);
                    break;
                default:
                    return '未知请求';
            }

            return $result ? true : '数据操作错误';
        }

        return '参数错误';
    }

    public function getProjectUser($project_id, $user_id)
    {
        $data = $this->with(['user' => function($query){$query->field('user.user_id,user_head,user_name')->where('user_status', 1);}])->where('project_id', $project_id)->order("rule_type DESC")->select();
        $rule = $this->where(['project_id' => $project_id, 'user_id' => $user_id])->value('rule_type');
        $result = ['admin' => [], 'users' => []];
        foreach ($data as $item){
            $item->menu = $this->getTeamMenu($item, $rule, $user_id);
            if(in_array($item->rule_type['id'], [99, 1]))
                $result['admin'][] = $item;
            else
                $result['users'][] = $item;
        }

        if(empty($result['users']))
            $result['users'] = false;
        
        return $result;
    }

    private function getTeamMenu(ProjectUser $item, $rule, $user_id)
    {
        $menu = false;
        switch ($rule){
            case 99:
                switch ($item->rule_type['id']){
                    case 99:
                        $menu = [1 => '修改备注名'];
                        break;
                    case 1:
                        $menu = [1 => '修改备注名', 2 => '设为协作成员[读写]', 3 => '设为协作成员[只读]', 4 => '转让项目', 5 => '踢出项目'];
                        break;
                    case 2:
                        $menu = [1 => '修改备注名', 6 => '设为管理成员', 3 => '设为协作成员[只读]', 4 => '转让项目', 5 => '踢出项目'];
                        break;
                    case 3:
                        $menu = [1 => '修改备注名', 6 => '设为管理成员', 2 => '设为协作成员[读写]', 4 => '转让项目', 5 => '踢出项目'];
                        break;
                    default:
                        break;
                }
                break;
            case 1:
                switch ($item->rule_type['id']){
                    case 99:
                    case 1:
                        if($item->user_id == $user_id)
                            $menu = [1 => '修改备注名', 7 => '退出项目'];
                        break;
                    case 2:
                        $menu = [1 => '修改备注名', 3 => '设为协作成员[只读]', 5 => '踢出项目'];
                        break;
                    case 3:
                        $menu = [1 => '修改备注名', 2 => '设为协作成员[读写]', 5 => '踢出项目'];
                        break;
                    default:
                        break;
                }
                break;
            default:
                if($item->user_id == $user_id)
                    $menu = [1 => '修改备注名', 7 => '退出项目'];
                break;
        }

        return $menu;
    }
}
