<?php
/**
 * Created by PhpStorm.
 * User: dev_001
 * Date: 20/6/18
 * Time: 下午3:45
 */

namespace app\index\controller;
use think\Cache;
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
        echo "<pre>";
        print_r($_SERVER);
        exit;
        $request = Request::instance();
        $params = $request->param('params');
        $params = json_decode($params,true);

        $check_params = ['user_name','password','phone','email'];
        if(api_check_params($params,$check_params,true))
            api_result(1003);

        $user = new userModel();
        $check_user = $user->whereOr([
            'user_name'=>$params['user_name'],
            'phone'=>$params['phone'],
            'email'=>$params['email'],
        ])->select();

        if($check_user)
            api_result(1006);

        $user->data([
            'user_id'=>uuid(),
            'user_name'=>$params['user_name'],
            'phone'=>$params['phone'],
            'email'=>$params['email'],
            'password'=>encrypt($params['password']),
            'create_time'=>time()
        ]);

        $user->save();

        api_result(0);
    }

    public function login(){
        $request = Request::instance();
        $params = $request->param('params');
        $params = json_decode($params,true);

        $check_params = ['phone','password'];
        if(api_check_params($params,$check_params,true))
            api_result(1003);

        $user = new userModel();
        $user_info = $user->where(['phone'=>$params['phone']])->field('user_id,user_name,phone,password,token')->find();

        if(!$user_info)
            api_result(1007);//用户不存在

        if($user_info['password'] != encrypt($params['password']))
            api_result(1008);//密码不正确

        if($user_info['token'])
            Cache::store('redis')->rm($user_info['token']);

        $token = uuid();

        $user->save([
            'token'=>$token,
            'last_login_ip'=>get_client_ip(),
            'last_login_time'=>time()
        ],['user_id'=>$user_info['user_id']]);


        Cache::store('redis')->set($token,$user_info,3200);
        api_result(0,$token);
    }


}