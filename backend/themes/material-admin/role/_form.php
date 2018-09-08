
<?php
$this->title = "添加角色";

use yii\helpers\Html;

?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>
<div class="card">
    <div class="card-header">
        <h2>添加角色 
            <small>
                添加角色，请填写。
            </small>
        </h2>
    </div>
    <?= Html::beginForm([''], 'post') ?>
    <div class="card-body card-padding">
        <form role="form">
            <div class="form-group fg-line">
                <label for="exampleInputEmail1">角色名称</label>
                <?= Html::activeInput('text', $model, 'name', ['class' => 'form-control input-sm', 'placeholder' => '请输入类型名称']) ?>

            </div>
            <?= Html::error($model, 'name', ['class' => 'error']) ?>
            <div class="form-group fg-line">
                <label for="exampleInputEmail1">描述信息</label>
                <?= Html::activeInput('text', $model, 'description', ['class' => 'form-control input-sm', 'placeholder' => '请输入类型名称']) ?>

            </div>
            <?= Html::error($model, 'description', ['class' => 'error']) ?>
            <?= Html::submitButton('添 加', ['class' => 'btn btn-primary btn-sm m-t-10 waves-effect']) ?>
            <?= Html::endForm() ?>
    </div>
</div>