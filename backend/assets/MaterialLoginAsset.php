<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class MaterialLoginAsset extends AssetBundle
{

    public $sourcePath = "@app/themes/material-admin";
    public $css = [
        'assets/css/animate.min.css',
        'assets/css/material-design-iconic-font.min.css',
        'assets/css/app.min.1.css',
        'assets/css/app.min.2.css',
    ];
    public $js = [
        'assets/js/jquery.min.js',
        'assets/js/bootstrap.min.js',
        'assets/js/waves.min.js',
        'assets/js/functions.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];

}
