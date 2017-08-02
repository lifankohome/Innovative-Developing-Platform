<?php
namespace app\components\controller;

use app\components\model\Component;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;

class Index extends Controller
{
    public function index()
    {
        $this->assign('name',Session::get('name'));
        $Component = new Component();
        $list = $Component->where('location', '1417')->paginate(25);
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function search(Request $request){
        $keyWord = $request->get('keywords');
        if(empty($keyWord)){
            echo "<span class='tipText'>请输入查询条件</span>";
        }else{
            echo Component::search($keyWord);
        }
    }
}
