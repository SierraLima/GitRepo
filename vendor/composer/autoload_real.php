<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitbf2aca7aeb18fd99a39eade8e7cbf210
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

        spl_autoload_register(array('ComposerAutoloaderInitbf2aca7aeb18fd99a39eade8e7cbf210', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader();
        spl_autoload_unregister(array('ComposerAutoloaderInitbf2aca7aeb18fd99a39eade8e7cbf210', 'loadClassLoader'));

        $vendorDir = dirname(__DIR__);
        $baseDir = dirname($vendorDir);

        $includePaths = require __DIR__ . '/include_paths.php';
        array_push($includePaths, get_include_path());
        set_include_path(join(PATH_SEPARATOR, $includePaths));

        $map = require __DIR__ . '/autoload_namespaces.php';
        foreach ($map as $namespace => $path) {
            $loader->set($namespace, $path);
        }

        $map = require __DIR__ . '/autoload_psr4.php';
        foreach ($map as $namespace => $path) {
            $loader->setPsr4($namespace, $path);
        }

        $classMap = require __DIR__ . '/autoload_classmap.php';
        if ($classMap) {
            $loader->addClassMap($classMap);
        }

        $loader->register(true);

        $includeFiles = require __DIR__ . '/autoload_files.php';
        foreach ($includeFiles as $file) {
            composerRequirebf2aca7aeb18fd99a39eade8e7cbf210($file);
        }

        return $loader;
    }
}

function composerRequirebf2aca7aeb18fd99a39eade8e7cbf210($file)
{
    require $file;
}
