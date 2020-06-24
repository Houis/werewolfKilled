<?php
/**
 * 聊天类
 */
namespace app\index\controller;

include_once __DIR__.'/../libraries/gateway/Gateway.php';
use GatewayClient\Gateway;
use think\Request;

class Chat
{
    public function __construct()
    {
        Gateway::$registerAddress = '192.168.10.62:1238';
    }

    public function bindUser(){
        $request = Request::instance();
        $params = $request->param();

        $check_params = ['client_id','token'];

        if(api_check_params($params,$check_params))
            api_result(1003);

        $user = api_get_user_info($params['token']);

        if(!$user)
            api_result(1005);

        //解除旧连接
        $client_ids = Gateway::getClientIdByUid($user['user_id']);
        foreach ($client_ids as $client_id){
            Gateway::closeClient($client_id);
        }

        if(Gateway::bindUid($params['client_id'],$user['user_id']))
            api_result(0);
        else
            api_result(2001);
    }

    public function unBindUser(){
        $request = Request::instance();
        $params = $request->param();

        $check_params = ['client_id','token'];

        if(api_check_params($params,$check_params))
            api_result(1003);

        $user = api_get_user_info($params['token']);

        if(!$user)
            api_result(1005);

        Gateway::unbindUid($params['client_id'],$user['user_id']);

        return api_result(0);
    }



}