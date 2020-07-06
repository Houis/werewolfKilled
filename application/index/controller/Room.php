<?php
/**
 * Created by PhpStorm.
 * User: dev_001
 * Date: 20/7/6
 * Time: 下午4:06
 */

namespace app\index\controller;
use think\Cache;
use \think\Request;

class Room
{
    public function createRoom(){
        $request = Request::instance();
        $token = $request->param('token');

        $user_info = api_get_user_info($token);
        if(!$user_info){
            api_result(1005);
        }




        api_result(0,$user_info);
    }
}