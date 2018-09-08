<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class MaterialAdminAsset extends AssetBundle
{

    public $sourcePath = "@app/themes/material-admin";
    public $css = [
        'assets/css/material-design-iconic-font.min.css',
        'assets/css/animate.min.css',
        'assets/css/fullcalendar.min.css',
        'assets/css/jquery.mCustomScrollbar.min.css',
        'assets/css/chosen.min.css',
        'assets/css/app.min.1.css',
        'assets/css/app.min.2.css',
    ];
    public $js = [
        'assets/js/jquery.min.js',
        'assets/js/bootstrap.min.js',
        'assets/js/jquery.flot.js',
        'assets/js/jquery.flot.resize.js',
        'assets/js/curvedLines.js',
        'assets/js/jquery.sparkline.min.js',
        'assets/js/jquery.easypiechart.min.js',
        'assets/js/moment.min.js',
        'assets/js/fullcalendar.min.js',
        'assets/js/jquery.simpleWeather.min.js',
        'assets/js/waves.min.js',
        'assets/js/bootstrap-growl.min.js',
        'assets/js/jquery.mCustomScrollbar.concat.min.js',
        'assets/js/curved-line-chart.js',
        'assets/js/line-chart.js',
        'assets/js/charts.js',
        'assets/js/chosen.jquery.min.js',
        'assets/js/functions.js',
        'assets/js/demo.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];

}
