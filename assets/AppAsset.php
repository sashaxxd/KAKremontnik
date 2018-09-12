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
        'css/index.css',
        'css/style.css',
        'css/flash_message.css',
        'css/font-awesome.min.css'
    ];
    public $js = [
        'js/jquery-1.12.4.min.js',
        'js/flash_message.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//        'yii\web\JqueryAsset',//Cтавим зависимость от jquery - отключит встроенный Jquery
    ];

    public $jsOptions = [ 'position' => \yii\web\View::POS_END ];
}
