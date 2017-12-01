<?php
namespace app\project\common;

use app\common\controller\BaseController as Controller;

class BaseController extends Controller
{
    protected $failException = true;

    // 初始化项目
    protected function _initialize()
    {

    }
}