<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8b4457e16514e7a13bbcadf337771b01
{
    public static $files = array (
        '6e60481d8c04e99474e2ba7b3658ab5a' => __DIR__ . '/..' . '/php-activerecord/php-activerecord/ActiveRecord.php',
        '233a8c142e2911db44625529eb58362d' => __DIR__ . '/../..' . '/src/Common/Utility.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/models/orm',
        ),
        'App\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit8b4457e16514e7a13bbcadf337771b01::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8b4457e16514e7a13bbcadf337771b01::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8b4457e16514e7a13bbcadf337771b01::$classMap;

        }, null, ClassLoader::class);
    }
}
