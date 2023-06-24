<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita24e1d4d3cd80250d85a28f7017f7305
{
    public static $files = array (
        '3109cb1a231dcd04bee1f9f620d46975' => __DIR__ . '/..' . '/paragonie/sodium_compat/autoload.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'ParagonIE\\HiddenString\\' => 23,
            'ParagonIE\\Halite\\' => 17,
            'ParagonIE\\ConstantTime\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ParagonIE\\HiddenString\\' => 
        array (
            0 => __DIR__ . '/..' . '/paragonie/hidden-string/src',
        ),
        'ParagonIE\\Halite\\' => 
        array (
            0 => __DIR__ . '/..' . '/paragonie/halite/src',
        ),
        'ParagonIE\\ConstantTime\\' => 
        array (
            0 => __DIR__ . '/..' . '/paragonie/constant_time_encoding/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita24e1d4d3cd80250d85a28f7017f7305::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita24e1d4d3cd80250d85a28f7017f7305::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita24e1d4d3cd80250d85a28f7017f7305::$classMap;

        }, null, ClassLoader::class);
    }
}
