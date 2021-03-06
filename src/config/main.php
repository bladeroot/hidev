<?php
/**
 * Automation tool mixed with code generator for easier continuous development
 *
 * @link      https://github.com/hiqdev/hidev
 * @package   hidev
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

if (!defined('HIDEV_VENDOR_DIR')) {
    define('HIDEV_VENDOR_DIR', dirname(dirname(dirname(dirname(__DIR__)))));
}

return [
    'id'                    => 'hidev',
    'name'                  => 'HiDev',
    'basePath'              => dirname(__DIR__),
    'vendorPath'            => HIDEV_VENDOR_DIR,
    'runtimePath'           => substr(__DIR__, 0, 7) === 'phar://' ? dirname($_SERVER['SCRIPT_NAME']) : dirname(HIDEV_VENDOR_DIR) . '/runtime',
    'enableCoreCommands'    => false,
    'controllerNamespace'   => 'hidev\\controllers',
    'defaultRoute'          => 'default',
    'bootstrap'             => ['log'],
    'components'            => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                ],
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        /*'request' => [
            'class' => 'hidev\base\Request',
        ],*/
        'config' => [
            'class' => 'hidev\components\Config',
            /// internally used actions
            'binaries' => [
                'class' => 'hidev\controllers\BinariesController',
                'composer' => [
                    'class' => 'hidev\base\BinaryPhp',
                    'installer' => 'https://getcomposer.org/installer',
                ],
                'pip' => [
                    'class' => 'hidev\base\BinaryPython',
                    'installer' => 'https://bootstrap.pypa.io/get-pip.py',
                ],
            ],
            /// basic actions
            'init' => [
                'class' => 'hidev\controllers\InitController',
            ],
            '--version' => [
                'class' => 'hidev\controllers\OwnVersionController',
            ],
            'update' => [
                'before' => [
                    'start/update',
                ],
            ],
            /// standard actions
            'vendor' => [
                'class' => 'hidev\controllers\VendorController',
            ],
            'package' => [
                'class' => 'hidev\controllers\PackageController',
            ],
            'command' => [
                'class' => 'hidev\controllers\CommandController',
            ],
            'template' => [
                'class' => 'hidev\controllers\TemplateController',
            ],
            'directory' => [
                'class' => 'hidev\controllers\DirectoryController',
            ],
            /// git/vcs actions
            'github' => [
                'class' => 'hidev\controllers\GithubController',
            ],
            'vcsignore' => [
                'class' => 'hidev\controllers\VcsignoreController',
            ],
            '.gitignore' => [
                'class' => 'hidev\controllers\GitignoreController',
            ],
            /// Yii built-in controllers
            'asset' => [
                'class' => 'yii\console\controllers\AssetController',
            ],
            'cache' => [
                'class' => 'yii\console\controllers\CacheController',
            ],
            'fixture' => [
                'class' => 'yii\console\controllers\FixtureController',
            ],
            'message' => [
                'class' => 'yii\console\controllers\MessageController',
            ],
            'migrate' => [
                'class' => 'yii\console\controllers\MigrateController',
            ],
            'serve' => [
                'class' => 'yii\console\controllers\ServeController',
            ],
        ],
        'view' => [
            'class' => 'hidev\base\View',
            'theme' => [
                'pathMap' => [
                    '@app/views' => ['@hidev/views'],
                ],
            ],
            'renderers' => [
                'twig' => [
                    'class' => 'yii\twig\ViewRenderer',
                    'cachePath' => '@runtime/Twig/cache',
                    'options' => [
                        'auto_reload' => true,
                    ],
                    'extensions' => ['Twig_Extension_StringLoader'],
                ],
            ],
        ],
    ],
];
