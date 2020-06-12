<?php
namespace app\index\controller;

include_once __DIR__.'/../libraries/gateway/Gateway.php';
use GatewayClient\Gateway;

class Chat
{
    public function __construct()
    {
        Gateway::$registerAddress = '192.168.10.62:1238';
    }

    public function bind(){

    }

    public function joinRoom(){

    }


}