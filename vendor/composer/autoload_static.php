<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb3c544ee1850f075237a783e1ecc3117
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb3c544ee1850f075237a783e1ecc3117::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb3c544ee1850f075237a783e1ecc3117::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb3c544ee1850f075237a783e1ecc3117::$classMap;

        }, null, ClassLoader::class);
    }
}
