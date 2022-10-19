<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit576a6f74b312e3f23a1fd64823f8b7ef
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

        spl_autoload_register(array('ComposerAutoloaderInit576a6f74b312e3f23a1fd64823f8b7ef', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit576a6f74b312e3f23a1fd64823f8b7ef', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit576a6f74b312e3f23a1fd64823f8b7ef::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
