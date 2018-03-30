<?php
namespace app\admin\controller;

use app\common\controller\BaseController;
use think\Validate;

class Admin extends BaseController
{
    public function index()
    {

    }

    /**
     * 注册
     */
    public function register()
    {
        if($this->request->isPost() && $this->request->isAjax()){
            $data['user_name'] = $this->request->post('user');
            $data['user_email'] = $this->request->post('mail');
            $data['user_password'] = $this->request->post('password');
            $data['__token__'] = $this->request->post('token');
            $validate = new Validate([
                'user_name' => 'require|length:2,16',
                'user_email' => 'require|email',
                'user_password' => 'require|length:6,16',
                '__token__' => 'token',
            ]);

            $result = $validate->check($data);
            if (!$result)
                $this->error($validate->getError(), '', ['token' => $this->request->token()]);

            $result = $this->auth->register($data);
            if ($result === true)
                $this->success('注册成功，等待跳转登陆...', '/index/login', '', 1);
            else
                $this->error($result, '', ['token' => $this->request->token()]);

        }

        abort(404, '错误入口！');
    }

    /**
     * 登录
     */
    public function login()
    {
        $url = $this->request->get('url', '/admin/index');
        if ($this->auth->isLogin())
            $this->error("已经登陆了", $url);

        if ($this->request->isPost() && $this->request->isAjax()){
            if($this->auth->autologin()){
                $this->redirect($url);
            }else{
                $data['user'] = $this->request->post('user');
                $data['user_password'] = $this->request->post('password');
                $data['__token__'] = $this->request->post('token');
                $validate = new Validate([
                    'user' => 'require|length:2,32',
                    'user_password' => 'require|length:6,16',
                    '__token__' => 'token',
                ]);

                $result = $validate->check($data);
                if (!$result)
                    $this->error($validate->getError(), '', ['token' => $this->request->token()]);

                $result = $this->auth->login($data['user'], $data['user_password']);
                if ($result === true)
                    $this->success('登陆成功，等待跳转...', $url, '', 1);
                else
                    $this->error($result, '', ['token' => $this->request->token()]);
            }
        }

        abort(404, '错误入口！');
    }

    /**
     * 注销登录
     */
    public function logout()
    {
        $this->auth->logout();
        $this->success('注销登录成功', '/index/login');
    }
}