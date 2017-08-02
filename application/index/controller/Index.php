<?php
namespace app\index\controller;

use think\Controller;
use think\Session;

class Index extends Controller
{
    public function index()
    {
        $this->assign('name',Session::get('name'));
        return view();
    }
}
