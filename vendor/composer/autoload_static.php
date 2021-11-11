<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd95bbc883f4ebf5de8f2916f6dd744d1
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Omerfdmrl\\Upload\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Omerfdmrl\\Upload\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Verot\\Upload\\Upload' => __DIR__ . '/..' . '/verot/class.upload.php/src/class.upload.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd95bbc883f4ebf5de8f2916f6dd744d1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd95bbc883f4ebf5de8f2916f6dd744d1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd95bbc883f4ebf5de8f2916f6dd744d1::$classMap;

        }, null, ClassLoader::class);
    }
}
