<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */

class AppAsset extends AssetBundle
{
    public $jsOptions = ['position' => \yii\web\View::POS_END];
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
        'css/bootstrap.min.css',
        'css/bootstrap-skin.css',
        'css/normalize.css',
        'css/style.css',
        'css/bundle.css',
        'css/media-queries.css',
        'css/angular-material.min.css',
    ];
    public $js = [
        'js/select.js',
        'js/angular.min.js',
        'js/angular-route.min.js',
        'js/angular-animate.min.js',
        'js/angular-aria.min.js',
        'js/angular-messages.min.js',
        'js/angular-material.min.js',
        'js/all.min.js',
        'js/bootstrap.min.js',
        'js/function.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
