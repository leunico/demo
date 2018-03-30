<?php
namespace app\admin\controller;

use app\common\controller\BaseController;

class Settings extends BaseController
{
    public function index()
    {
        return $this->fetch('index');
    }
}