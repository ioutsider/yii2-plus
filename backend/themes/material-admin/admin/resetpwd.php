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
<div class="adminuser-resetpwd">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="adminuser-form">

        <?php $form = ActiveForm::begin(); ?>
        <?= Html::activeDropDownList($model, 'roles', ArrayHelper::map($roles, 'name', 'description'), ['class' => 'chosen', 'multiple' => 'multiple', 'prompt' => '选择角色']) ?>
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('sys', 'reset password'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>
