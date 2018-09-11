<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

//use yii\widgets\ActiveForm;
//use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$this->title = Yii::t('sys', 'reset password');
$this->params['breadcrumbs'][] = ['label' => Yii::t('sys', 'Admins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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


<div class="card">
    <div class="card-header">
        <h2><?= Html::encode($this->title) ?>

        </h2>
    </div>

    <div class="card-body card-padding">

        <?= Html::beginForm('', 'post', ['class' => 'form-horizontal']) ?>


        <div class="form-group">
            <?= Html::activeLabel($model, 'password', ['class' => 'col-sm-2 control-label']) ?>
            <div class="col-sm-6">
                <div class="fg-line">
                    <?= Html::activeInput('password', $model, 'password', ['class' => 'form-control input-sm', 'id' => 'password', 'placeholder' => '请输入密码']) ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= Html::activeLabel($model, 'password_repeat', ['class' => 'col-sm-2 control-label']) ?>
            <div class="col-sm-6">
                <div class="fg-line">
                    <?= Html::activeInput('password', $model, 'password_repeat', ['class' => 'form-control input-sm', 'id' => 'password_repeat', 'placeholder' => '确认密码']) ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= Html::activeLabel($model, 'roles', ['class' => 'col-sm-2 control-label']) ?>
            <div class="col-sm-6">
                <div class="fg-line">
                    <?= Html::activeDropDownList($model, 'roles', ArrayHelper::map($roles, 'name', 'description'), ['class' => 'chosen', 'multiple' => 'multiple', 'data-placeholder' => '选择角色']) ?>

                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-6">
                <?= Html::submitButton(Yii::t('sys', 'Save'), ['class' => 'btn btn-primary btn-sm waves-effect']) ?>

            </div>
        </div>
        <?= Html::endForm(); ?>
    </div>
</div>


