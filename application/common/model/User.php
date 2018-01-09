<?php
namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;
use app\common\library\Random;

class User extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    /**
     * 重置用户密码
     * @author albert
     */
    public function resetPassword($uid, $NewPassword)
    {
        $passwd = $this->encryptPassword($NewPassword, Random::alnum(8));
        $result = $this->where(['user_id' => $uid])->update(['user_password' => $passwd]);
        return $result;
    }

    public function projectUser()
    {
        return $this->hasMany('app\project\model\ProjectUser', 'user_id', 'user_id');
    }

    public function searchUser($keyword, $project_id)
    {
        $data = $this->with(['projectUser' => function($query) use ($project_id){$query->field('user_id,project_id')->where('project_id', $project_id);}])->field('user_id,user_name,user_email,user_head')->where('user_name|user_email', 'LIKE', '%'.$keyword.'%')->select();  
        return empty($data) ? [] : $data;
    }

    protected function encryptPassword($password, $salt = '', $encrypt = 'md5')
    {
        return $encrypt($encrypt($password) . $salt);
    }
}