<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = Yii::t('sys', 'Update Admin: ') . $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('sys', 'Admins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('sys', 'Update');
?>
<?php if (Yii::$app->session->get('msg')) { ?>
    <div class="alert alert-<?= Yii::$app->session->get('type') ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?= Yii::$app->session->get('msg') ?>
    </div>
    <?php
    Yii::$app->session->set('msg', '');
    Yii::$app->session->set('type', '');
    ?>
<?php } ?>
<?= Html::errorSummary($model, ['class' => 'alert alert-danger alert-dismissible', 'role' => 'alert']) ?>


<?=
$this->render('_form', [
    'model' => $model
])
?>

