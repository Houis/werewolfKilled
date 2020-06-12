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

    /**
     * @param string $play_num
     * 当猎人死亡时，可以带走在场一位玩家
     */
    public function skill($play_num='')
    {
        // TODO: Implement skill() method.
    }

    public function dead()
    {
        // TODO: Implement dead() method.
    }
}