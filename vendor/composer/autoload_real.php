<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit29fc62bf20e7ab839a22e90b226602d4
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

        spl_autoload_register(array('ComposerAutoloaderInit29fc62bf20e7ab839a22e90b226602d4', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit29fc62bf20e7ab839a22e90b226602d4', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit29fc62bf20e7ab839a22e90b226602d4::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
