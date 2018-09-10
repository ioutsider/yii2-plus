<?php
$this->title = "添加权限";

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
        <h2>添加权限 
            <small>
                添加权限，请填写。
            </small>
        </h2>
    </div>

    <div class="card-body card-padding">
        <?= Html::beginForm('', 'post') ?>
        <div class="form-group">
            <div class="fg-line">
                <label for="typename">类型名称</label>
                <?= Html::activeInput('text', $model, 'typename', ['class' => 'form-control input-sm', 'placeholder' => '请输入类型名称']) ?>
            </div>
            <small class="help-block"><?= Html::error($model, 'typename', ['class' => 'error']) ?></small>
        </div>
        <div class="form-group fg-line">
            <label for="name">权限名称</label>
            <?= Html::activeInput('text', $model, 'name', ['class' => 'form-control input-sm', 'placeholder' => '请输入权限名称']) ?>
            <?= Html::error($model, 'name', ['class' => 'error']) ?>
        </div>
        <div class="form-group fg-line">
            <label for="description">描述信息</label>
            <?= Html::activeInput('text', $model, 'description', ['class' => 'form-control input-sm', 'placeholder' => '请输入权限描述信息']) ?>
            <?= Html::error($model, 'description', ['class' => 'error']) ?>
        </div>

        <?= Html::submitButton('添 加', ['class' => 'btn btn-primary btn-sm m-t-10 waves-effect']) ?>
        <?= Html::endForm() ?>

    </div>
</div>