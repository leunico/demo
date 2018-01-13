<?php

namespace app\common\controller;

use app\common\model\User;
use app\common\library\Random;
use think\Cookie;
use think\Request;
use think\Session;

class Auth
{

    /**
     * @var object 对象实例
     */
    protected static $instance;
    protected $requestUri = '';
    protected $breadcrumb = [];

    /**
     * 初始化
     * @access public
     * @return Auth
     */
    public static function instance()
    {
        if(is_null(self::$instance)){
            self::$instance = new static();
        }

        return self::$instance;
    }

    public function __get($name)
    {
        return Session::get('user.' . $name);
    }

    /**
     * 登录
     */
    public function login($user, $password, $keeptime = 0)
    {
        $user = User::get(['user_email|user_name' => $user]);
        if(!$user)
            return "账号不存在！";

        if($user->user_password != md5(md5($password) . $user->password_salt))
            return "密码错误！";

        $user->login_time = time();
        $user->user_token = Random::uuid();
        $user->save();

        Session::set("user", $user);
        $this->keeplogin($keeptime);
        return true;
    }

    /**
     * 注册
     */
    public function register($data)
    {
        $user = User::get(['user_email' => $data['user_email']]);
        if($user)
            return $data['user_email'].'已经注册，请直接登录';

        if(isset($data['__token__']))
            unset($data['__token__']);

        $data['password_salt'] = Random::alnum(8);
        $data['user_token'] = Random::uuid();
        $data['user_password'] = md5(md5($data['user_password']) . $data['password_salt']);
        $user = User::create($data);

        if($user && isset($user->user_id))
            return true;
        else
            return '不可控因素注册失败！';
    }

    /**
     * 注销登录
     */
    public function logout()
    {
        $user = User::get(intval($this->user_id));
        if(!$user)
            return true;

        $user->user_token = '';
        $user->save();
        Session::delete("user");
        Cookie::delete("keeplogin");
        return true;
    }

    /**
     * 自动登录
     * @return boolean
     */
    public function autologin()
    {
        $keeplogin = Cookie::get('keeplogin');
        if(!$keeplogin)
            return false;

        list($user_id, $keeptime, $expiretime, $key) = explode('|', $keeplogin);
        if($user_id && $keeptime && $expiretime && $key && $expiretime > time())
        {
            $user = User::get($user_id);
            if(!$user || !$user->user_token)
                return false;

            // token有变更
            if($key != md5(md5($user_id) . md5($keeptime) . md5($expiretime) . $user->user_token))
                return false;

            Session::set("user", $user);

            //刷新自动登录的时效
            $this->keeplogin($keeptime);
            return true;
        }else{
            return false;
        }
    }

    /**
     * 刷新保持登录的Cookie
     * @param int $keeptime
     * @return boolean
     */
    protected function keeplogin($keeptime = 0)
    {
        if($keeptime)
        {
            $expiretime = time() + $keeptime;
            $key = md5(md5($this->user_id) . md5($keeptime) . md5($expiretime) . $this->user_token);
            $data = [$this->user_id, $keeptime, $expiretime, $key];
            Cookie::set('keeplogin', implode('|', $data));
            return true;
        }
        return false;
    }

    /**
     * 检测当前控制器和方法是否匹配传递的数组
     *
     * @param array $arr 需要验证权限的数组
     */
    public function match($arr = [])
    {
        $request = Request::instance();
        $arr = is_array($arr) ? $arr : explode(',', $arr);
        if(!$arr)
            return false;

        // 是否存在
        if(in_array(strtolower($request->action()), $arr) || in_array('*', $arr))
            return true;

        // 没找到匹配
        return false;
    }

    /**
     * 检测是否登录
     *
     * @return boolean
     */
    public function isLogin()
    {
        return Session::get('user') ? true : false;
    }

    /**
     * 获取当前请求的URI
     * @return string
     */
    public function getRequestUri()
    {
        return $this->requestUri;
    }

    /**
     * 设置当前请求的URI
     * @param string $uri
     */
    public function setRequestUri($uri)
    {
        $this->requestUri = $uri;
    }

    public function getUserInfo($uid = null)
    {
        $uid = is_null($uid) ? $this->user_id : $uid;

        return $uid != $this->user_id ? User::get(intval($uid)) : Session::get('admin');
    }
}
