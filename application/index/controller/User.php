<?php
/**
 * Created by PhpStorm.
 * User: dev_001
 * Date: 20/6/18
 * Time: 下午3:45
 */

namespace app\index\controller;
use \think\Request;
use \app\index\model\user as userModel;
class User
{
    public function __construct()
    {
//        $request = Request::instance();
//        echo "<pre>";
//        print_r($request->param());
    }

    public function register(){

    }

    public function login(){
        $request = Request::instance();
        $params = $request->param();

//        $result = db('user')->where('user_name',$params['user_name'])->find();
        $user = new userModel();
        $user->where(['user_name'=>$params['user_name']]);
        $result = $user->select();


//        $user_info = \app\index\model\User::where(['user_name'=>$params['user_name']])->find();
        echo "<pre>";
        print_r($result);

//        if(!$result){
//
//            db('user')->insert($params);
//        }

    }
}