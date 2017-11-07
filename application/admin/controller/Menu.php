<?php
namespace app\admin\controller;

use app\admin\common\BaseController;

class Menu extends BaseController
{
    public function edit()
    {
        dump($this->fetch('edit'));die;
        return $this->fetch('edit');
    }
}