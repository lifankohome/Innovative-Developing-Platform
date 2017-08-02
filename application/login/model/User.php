<?php
/**
 * Created by PhpStorm.
 * User: lifanko  lee
 * Date: 2017/8/1
 * Time: 21:03
 */
namespace app\login\model;

use think\Model;
use think\Session;

class User extends Model
{
    //数据表名称
    protected $table = 'user';

    public static function check($stuId, $password)
    {
        $password = substr(md5($password), 0, 30);
        $user = User::get(['stu_id' => $stuId]);
        if ($user == null) {
            $result = '此学号尚未注册';
        } else if ($user['password'] == $password) {
            $result = '你好！' . $user['name'];
            //设置session
            Session::set('name',$user['name']);
            Session::set('stuId',$user['stu_id']);
        } else {
            $result = '密码不正确';
        }
        return $result;
    }
}