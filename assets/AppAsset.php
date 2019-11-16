<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/!site.css',
        'css/bootstrap.min.css',
        'css/bootstrap-grid.min.css',
        'css/style.css',
        'css/slick.css',
        'css/slick-theme.css',
        'css/all.min.css',
        'css/regular.min.css',
//        'css/mdb.min.css',
    ];
    public $js = [
        'js/main.js',
        'js/bootstrap.bundle.min.js',
//        'js/jquery-3.4.1.min.js',
        'js/slick.js',
//        'js/like_button.js'
        'js/index.js',
//        'js/mdb.min.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
            ];
}
