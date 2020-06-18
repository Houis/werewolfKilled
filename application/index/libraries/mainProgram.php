<?php

include_once __DIR__.'/../libraries/gateway/Gateway.php';
use GatewayClient\Gateway as Gateway;
class mainProgram
{
    public function __construct($address,$port)
    {
        $this->listenAddress($address,$port);
    }

    protected function listenAddress($address,$port){
        Gateway::$registerAddress = $address.'::'.$port;
    }


    public function joinRoom($client_id,$room_id){
        return Gateway::joinGroup($client_id,$room_id);
    }
}