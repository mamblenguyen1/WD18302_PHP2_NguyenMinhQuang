<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1804a65e520ffac83dd48c37ac75bb96
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'src\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1804a65e520ffac83dd48c37ac75bb96::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1804a65e520ffac83dd48c37ac75bb96::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1804a65e520ffac83dd48c37ac75bb96::$classMap;

        }, null, ClassLoader::class);
    }
}
