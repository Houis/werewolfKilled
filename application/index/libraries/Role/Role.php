<?php

/**
 * Interface Role
 * 角色接口
 */
interface Role
{

    /* 角色名 */
    public function roleName();

    /* 角色技能 */
    public function skill();

    /*  */
    public function dead();
}