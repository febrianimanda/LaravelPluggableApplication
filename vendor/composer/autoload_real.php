<?php

// autoload_real.php generated by Composer

class ComposerAutoloaderInit188bb66fa0c5d390395cd406a40ae03c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit188bb66fa0c5d390395cd406a40ae03c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader();
        spl_autoload_unregister(array('ComposerAutoloaderInit188bb66fa0c5d390395cd406a40ae03c', 'loadClassLoader'));

        $vendorDir = dirname(__DIR__);
        $baseDir = dirname($vendorDir);

        $map = require __DIR__ . '/autoload_namespaces.php';
        foreach ($map as $namespace => $path) {
            $loader->add($namespace, $path);
        }

        $classMap = require __DIR__ . '/autoload_classmap.php';
        if ($classMap) {
            $loader->addClassMap($classMap);
        }

        $loader->register(true);

        require $vendorDir . '/patchwork/utf8/bootup.utf8.php';
        require $vendorDir . '/ircmaxell/password-compat/lib/password.php';
        require $vendorDir . '/swiftmailer/swiftmailer/lib/swift_required.php';
        require $vendorDir . '/raveren/kint/Kint.class.php';
        require $vendorDir . '/laravel/framework/src/Illuminate/Support/helpers.php';

        return $loader;
    }
}