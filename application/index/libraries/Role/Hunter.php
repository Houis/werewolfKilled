<?php

/**
 * Class Hunter
 * 狼人杀角色-猎人
 *
 */
class Hunter implements Role
{
    private $role_name = '';

    public function roleName()
    {
        // TODO: Implement roleName() method.
        $this->role_name = '猎人';
    }

    public function skill($play_num='')
    {
        // TODO: Implement skill() method.
    }

}