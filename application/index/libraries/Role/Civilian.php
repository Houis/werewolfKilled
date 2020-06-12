<?php

/**
 * Class Civilian
 *
 */
class Civilian implements Role
{
    private $role_name = '';

    public function roleName()
    {
        // TODO: Implement roleName() method.
        $this->role_name = '平民';
    }

    /**
     * @return bool
     * 平民没有技能
     */
    public function skill()
    {
        // TODO: Implement isDead() method.
        return false;
    }

    public function dead()
    {
        // TODO: Implement dead() method.
    }
}