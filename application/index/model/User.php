<?php
/**
 * Class User
 *
 */
namespace app\index\model;

use think\Model;
class User extends Model
{
    //默认主键为自动识别，如果需要指定，可以设置属性：
    protected $pk = 'user_id';

    //自定义初始化
    protected function initialize()
    {
        //需要调用`Model`的`initialize`方法
        parent::initialize();
        //TODO:自定义的初始化
    }
}