<?php
namespace app\admin\controller;

use app\admin\common\BaseController;

class Settings extends BaseController
{
    public function index()
    {
        return $this->fetch('index');
    }
}