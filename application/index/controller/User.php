<?php
/**
 * Created by PhpStorm.
 * User: dev_001
 * Date: 20/6/18
 * Time: 下午3:45
 */

namespace app\index\controller;

use \think\Request;
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
        echo "<pre>";
        print_r($params);


        $result = db('user')->where('user_name',$params['user_name'])->select();
        print_r($result);
    }
}