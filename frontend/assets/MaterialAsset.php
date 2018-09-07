<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class MaterialAsset extends AssetBundle
{

    public $sourcePath = "@app/themes/material-default";
    public $css = [
        'http://fonts.googleapis.com/icon?family=Material+Icons',
        'css/materialize.css',
        'css/style.css',
    ];
    public $js = [
        'https://code.jquery.com/jquery-2.1.1.min.js',
        'js/materialize.js',
        'js/init.js'
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];

}
