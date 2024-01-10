<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit1804a65e520ffac83dd48c37ac75bb96
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit1804a65e520ffac83dd48c37ac75bb96', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit1804a65e520ffac83dd48c37ac75bb96', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit1804a65e520ffac83dd48c37ac75bb96::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
