<?php

use think\Cache;
/**
 * Class Game
 * Author Vincenzo
 * DS Game
 */
class Game
{
    public function createRoom(){
        $room_num = create_random_code(6,1);
        if(\think\Cache::store('redis')->get('room_num_'.$room_num)){

        }

    }
}