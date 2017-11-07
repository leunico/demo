<?php
namespace app\admin\controller;

use app\admin\common\BaseController;

class Index extends BaseController
{
    public function index()
    {
        return $this->fetch('index');
    }
}