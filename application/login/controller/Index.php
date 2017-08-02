<?php
namespace app\login\controller;

use app\login\model\User;
use think\Controller;
use think\Request;
use think\Session;

class Index extends Controller
{
    public function index()
    {
        $bg = array('100', '200', '300', '400', '500', '600', '700', '800', '900');
        $this->assign('bg', $bg[array_rand($bg)]);
        return $this->fetch();
    }

    public function login(Request $request)
    {
        $stuId = $request->get('stuId');
        $password = $request->get('password');
        $result = User::check($stuId, $password);
        echo $result;
        if(mb_substr($result,0,3)=='你好！'){
            //在此处重定向
            echo "<script>history.go(-1);</script>";
        }
    }
    public function logout(){
        Session::delete('name','think');
        Session::delete('stuId','think');
        //在此处重定向
        echo "<script>history.go(-1);</script>";
    }
}
