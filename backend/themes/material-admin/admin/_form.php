<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Lookup;
?>

<div class="card">
    <div class="card-header">
        <h2><?= Html::encode($this->title) ?>

        </h2>
    </div>

    <div class="card-body card-padding">

        <?= Html::beginForm('', 'post', ['class' => 'form-horizontal']) ?>


        <div class="form-group">
            <?= Html::activeLabel($model, 'username', ['class' => 'col-sm-2 control-label']) ?>
            <div class="col-sm-6">
                <div class="fg-line">
                    <?= Html::activeInput('text', $model, 'username', ['class' => 'form-control input-sm', 'id' => 'username', 'placeholder' => '请输入用户名']) ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= Html::activeLabel($model, 'email', ['class' => 'col-sm-2 control-label']) ?>
            <div class="col-sm-6">
                <div class="fg-line">
                    <?= Html::activeInput('email', $model, 'email', ['class' => 'form-control input-sm', 'id' => 'email', 'placeholder' => '请输入电子邮箱地址']) ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= Html::activeLabel($model, 'status', ['class' => 'col-sm-2 control-label']) ?>
            <div class="col-sm-6">
                <div class="fg-line">
                    <?php
                    $items = Lookup::items('UserStatus');
                    ?>
                    <?= Html::activeDropDownList($model, 'status', $items, ['class' => 'chosen', 'data-placeholder' => '选择用户状态']) ?>
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
