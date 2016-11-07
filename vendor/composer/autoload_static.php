<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1e79166f776675b4dafb0b9f810987ac {

    public static $prefixLengthsPsr4 = array(
        'e' =>
        array(
            'estamparia\\view\\' => 16,
            'estamparia\\model\\' => 17,
            'estamparia\\libs\\' => 16,
            'estamparia\\controller\\' => 22,
        ),
    );
    public static $prefixDirsPsr4 = array(
        'estamparia\\view\\' =>
        array(
            0 => __DIR__ . '/../..' . '/estamparia/view',
        ),
        'estamparia\\model\\' =>
        array(
            0 => __DIR__ . '/../..' . '/estamparia/model',
        ),
        'estamparia\\libs\\' =>
        array(
            0 => __DIR__ . '/../..' . '/estamparia/libs',
        ),
        'estamparia\\controller\\' =>
        array(
            0 => __DIR__ . '/../..' . '/estamparia/controller',
        ),
    );

    public static function getInitializer(ClassLoader $loader) {
        return \Closure::bind(function () use ($loader) {
                    $loader->prefixLengthsPsr4 = ComposerStaticInit1e79166f776675b4dafb0b9f810987ac::$prefixLengthsPsr4;
                    $loader->prefixDirsPsr4 = ComposerStaticInit1e79166f776675b4dafb0b9f810987ac::$prefixDirsPsr4;
                }, null, ClassLoader::class);
    }

}