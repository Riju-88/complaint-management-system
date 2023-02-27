<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcd65a15a92ea3d98604ea06ebe464c4a
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcd65a15a92ea3d98604ea06ebe464c4a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcd65a15a92ea3d98604ea06ebe464c4a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcd65a15a92ea3d98604ea06ebe464c4a::$classMap;

        }, null, ClassLoader::class);
    }
}
