<?php

use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use backend\assets\MaterialAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use common\widgets\Alert;
/**
 * @var $this \yii\base\View
 * @var $content string
 */
MaterialAsset::register($this);
?>
<?php $this->beginPage(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <nav class="light-blue lighten-1" role="navigation">
            <div class="container">
                <div class="nav-wrapper">
                    <a id="logo-container" href="#" class="brand-logo"><?php echo Html::encode(\Yii::$app->name); ?></a>
                    <?php
                    if (Yii::$app->user->isGuest) {
                        $menuItems[] = [
                                ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']],
                        ];
                    } else {
                        $menuItems = [
                                ['label' => Yii::t('sys', 'Admins'), 'url' => ['/admin/index']],
                                ['label' => Yii::t('app', 'Logout' . ' (' . Yii::$app->user->identity->username . ')'), 'url' => ['/site/logout']],
                        ];
                    }


                    echo Menu::widget([
                        'options' => ['id' => "nav-mobile", 'class' => 'right side-nav'],
                        'items' => $menuItems,
                    ]);
                    ?>
                    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
                </div>
            </div>
        </nav>


        <div class="container">
            <div class="section">
                <div class="row">
                    <div class="col s12 m12">
                        <?=
                        Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ])
                        ?>
                        <?= Alert::widget() ?>
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div>



        <footer class="orange">
            <div class="container">
                <div class="row">

                    <h5 class="white-text">Company Bio</h5>
                    <p class="grey-text lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?> <?= Yii::powered() ?>
                </div>
            </div>
        </footer>  

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage(); ?>