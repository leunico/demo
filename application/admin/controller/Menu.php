<?php
namespace app\admin\controller;

use app\admin\common\BaseController;

class Menu extends BaseController
{
    public function edit()
    {
        return $this->fetch('edit');
    }

    public function add()
    {
        return $this->fetch('edit');
    }
}