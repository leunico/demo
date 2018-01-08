<?php
namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;
use app\common\library\Random;
use app\project\model\ProjectUser;

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

    public function searchUser($keyword)
    {
        $data = $this->where('user_name|user_email', 'LIKE', '%'.$keyword.'%')->column('user_id,user_name,user_email,user_head');
        // ProjectUser::
        $data2 = $this->getByUserEmail('867426952@qq.com');
    dump($data);
    dump($data2);
    dump($this->getLastSql());
    die;    
        if(empty($data)){
            return [];
        }else{
            return $data;
        }
    }

    // 密码加密
    protected function encryptPassword($password, $salt = '', $encrypt = 'md5')
    {
        return $encrypt($encrypt($password) . $salt);
    }
}