<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8a0532c962f1da88436c76259a5109b0
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Workerman\\' => 10,
        ),
        'G' => 
        array (
            'GatewayWorker\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Workerman\\' => 
        array (
            0 => __DIR__ . '/..' . '/workerman/workerman',
        ),
        'GatewayWorker\\' => 
        array (
            0 => __DIR__ . '/..' . '/workerman/gateway-worker/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8a0532c962f1da88436c76259a5109b0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8a0532c962f1da88436c76259a5109b0::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
