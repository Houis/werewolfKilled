<?php

/**
 * Class Werewolf
 * 狼人杀角色-狼人
 *
 */
class Werewolf implements Role
{
    private $role_name;
    public function roleName()
    {
        // TODO: Implement roleName() method.
        $this->role_name = '狼人';
    }

    public function skill()
    {
        // TODO: Implement skill() method.
    }

    public function dead()
    {
        // TODO: Implement dead() method.
    }
}