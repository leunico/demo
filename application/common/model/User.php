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
     * @author baiyouwen
     */
    public function resetPassword($uid, $NewPassword)
    {
        $passwd = $this->encryptPassword($NewPassword, Random::alnum(8));
        $result = $this->where(['user_id' => $uid])->update(['user_password' => $passwd]);
        return $result;
    }

    // 密码加密
    protected function encryptPassword($password, $salt = '', $encrypt = 'md5')
    {
        return $encrypt($encrypt($password) . $salt);
    }
}
