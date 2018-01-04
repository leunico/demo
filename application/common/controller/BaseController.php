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
        '_before_first',                       //在执行所有方法前都会执行_before_first方法
//        'second' =>  ['except'=>'hello'],      //除hello方法外的方法执行前都要先执行second方法
//        'three'  =>  ['only'=>'hello, data'],  //在hello/data方法执行前先执行three方法
    ];

    // 初始化项目
    protected function _initialize()
    {

    }

    protected function _before_first()
    {
//        $module_name = $this->request->module();
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
        if (!$this->auth->match($this->noNeedLogin)){

            //检测是否登录
            if (!$this->auth->isLogin()){
//                Hook::listen('admin_nologin', $this);
//                $url = Session::get('referer');
//                $url = $url ? $url : $this->request->url();
                $this->error('请先登陆', url('/index/login'));
            }
            // 判断是否需要验证权限
//            if (!$this->auth->match($this->noNeedRight))
//            {
//                // 判断控制器和方法判断是否有对应权限
//                if (!$this->auth->check($path))
//                {
//                    Hook::listen('admin_nopermission', $this);
//                    $this->error('You have no permission', '');
//                }
//            }
        }

        // 非选项卡时重定向
//        if (!$this->request->isPost() && !IS_AJAX && !IS_DIALOG)
//        {
//            $url = preg_replace_callback("/([\?|&]+)ref=addtabs(&?)/i", function($matches) {
//                return $matches[2] == '&' ? $matches[1] : '';
//            }, $this->request->url());
//            $this->redirect('/index/index', [], 302, ['referer' => $url]);
//            exit;
//        }

//        $site = Config::get("site");
//
//        // 配置信息
//        $config = [
//            'site'           => array_intersect_key($site, array_flip(['name', 'cdnurl', 'version', 'timezone', 'languages'])),
//            'modulename'     => $module_name,
//            'controllername' => $controller_name,
//            'actionname'     => $action_name,
//            'moduleurl'      => rtrim(url("/{$module_name}", '', false), '/'),
//            'referer'        => Session::get("referer")
//        ];

        //渲染站点配置
//        $this->assign('site', $site);
        //渲染配置信息
//        $this->assign('config', $config);

        //渲染管理员对象
        $this->assign('user', Session::get('user'));
        $this->assign('module', $this->request->module());
        $this->assign('controller', $this->request->controller());
    }
}