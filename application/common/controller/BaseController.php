<?php
namespace app\common\controller;

use think\Controller;
//use think\Config;
//use think\Hook;
use think\Session;

class BaseController extends Controller
{
    /**
     * 无需登录的方法
     * @var array
     */
    protected $noNeedLogin = ['login', 'register', 'resetpwd'];

    /**
     * 登陆处理类
     * @var Auth
     */
    protected $auth = null;

	protected $beforeActionList = [
//        '_before_first',                       //在执行所有方法前都会执行_before_first方法
//        'second' =>  ['except'=>'hello'],      //除hello方法外的方法执行前都要先执行second方法
//        'three'  =>  ['only'=>'hello, data'],  //在hello/data方法执行前先执行three方法
    ];

    // 初始化项目
    protected function _initialize()
    {
        $controller_name = strtolower($this->request->controller());
        $action_name = strtolower($this->request->action());

        $path = str_replace('.', '/', $controller_name) . '/' . $action_name;

        // 定义是否AJAX请求
        !defined('IS_AJAX') && define('IS_AJAX', $this->request->isAjax());

        // 定义是否Dialog请求
        !defined('IS_DIALOG') && define('IS_DIALOG', input("dialog") ? TRUE : FALSE);

        $this->auth = Auth::instance();

        // 设置当前请求的URI
        $this->auth->setRequestUri($path);

        // 检测是否需要验证登录
        if (!$this->auth->match($this->noNeedLogin)) {

            //检测是否登录
            if (!$this->auth->isLogin()) {
//                Hook::listen('admin_nologin', $this);
//                $url = Session::get('referer');
//                $url = $url ? $url : $this->request->url();
                $this->error('请先登陆', url('/index/login'));
            }
        }

        // 渲染管理员对象
        $this->assign('user', Session::get('user'));
        $this->assign('module', $this->request->module());
        $this->assign('controller', $this->request->controller());
    }

    protected function _before_first()
    {

    }
}