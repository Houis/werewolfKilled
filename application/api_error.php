<?php
/**
 * Created by PhpStorm.
 * User: dev_001
 * Date: 20/6/22
 * Time: 下午6:01
 */

//global $api_error_msg;
//$api_error_msg = [
//            '0'=>'请求成功',
//            '1001'=>'手机号码格式不正确',
//            '1002'=>'邮箱格式不正确',
//            '1003'=>'缺少参数',
//            '1004'=>'数据库错误',
//            '1005'=>'用户未登录'
//        ];

if(!function_exists('api_error_msg')){
    function api_error_msg(){
        return  [
            '0'=>'请求成功',

            //用户错误
            '1001'=>'手机号码格式不正确',
            '1002'=>'邮箱格式不正确',
            '1003'=>'缺少参数',
            '1004'=>'数据库错误',
            '1005'=>'用户未登录',
            '1006'=>'用户已存在',
            '1007'=>'用户未注册',
            '1008'=>'密码不正确',

            //聊天错误
            '2001'=>'连接失败'
        ];
    }
}