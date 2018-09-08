<?php

use backend\assets\MaterialAdminAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use backend\components\NavWidget;
use backend\components\HeaderWidget;

MaterialAdminAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body data-ma-theme="green">
        <?php $this->beginBody() ?>
        <?= HeaderWidget::widget(); ?>
        <section id="main" data-layout="layout-1">
            <?= NavWidget::widget(); ?>
            <section id="content">
                <div class="container">
                    <?php echo $content; ?>
                </div>
            </section>
        </section>

        <footer id="footer">
            Copyright &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?>
        </footer>

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