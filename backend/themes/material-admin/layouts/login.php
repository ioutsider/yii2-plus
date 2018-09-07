<?php

use backend\assets\MaterialLoginAsset;
use yii\helpers\Html;

/**
 * @var $this \yii\base\View
 * @var $content string
 */
MaterialLoginAsset::register($this);
?>
<?php $this->beginPage(); ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="login-content">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="login-content">
        <?php $this->beginBody() ?>



        <?php echo $content; ?>


        <!--        <footer id="footer">
                    Copyright &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?>
        
                </footer>-->

        <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p><?= Yii::t('sys', 'Please wait...') ?></p>
            </div>
        </div>



        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage(); ?>