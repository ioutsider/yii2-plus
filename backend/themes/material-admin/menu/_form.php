
<?php
$this->title = "添加菜单";

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>
<div class="card">
    <div class="card-header">
        <h2>添加菜单 
            <small>
                添加菜单，请填写。
            </small>
        </h2>
    </div>

    <div class="card-body card-padding">
        <?= Html::beginForm('', 'post') ?>
        <div class="form-group">
            <div class="fg-line">
                <label for="exampleInputEmail1">菜单名称</label>
                <?= Html::activeInput('text', $model, 'name', ['class' => 'form-control input-sm', 'placeholder' => '请输入菜单名称']) ?>

            </div>
            <small class="help-block"><?= Html::error($model, 'name', ['class' => 'error']) ?></small>
        </div>

        <?= Html::error($model, 'name', ['class' => 'error']) ?>
        <div class="form-group fg-line">
            <label for="exampleInputEmail1">访问地址</label>
            <?= Html::activeInput('text', $model, 'url', ['class' => 'form-control input-sm', 'placeholder' => '请输入菜单访问地址']) ?>

        </div>
        <small class="help-block"><?= Html::error($model, 'url', ['class' => 'error']) ?></small>
        <?= Html::error($model, 'route', ['class' => 'error']) ?>
        <div class="form-group fg-line">
            <label for="exampleInputEmail1">上级菜单</label>


            <?= Html::activeDropDownList($model, 'parent_id', ArrayHelper::map($menus, 'id', 'description'), ['class' => 'chosen', 'prompt' => '选择上级菜单']) ?>


        </div>
        <small class="help-block"><?= Html::error($model, 'parent_id', ['class' => 'error']) ?></small>
        <div class="form-group fg-line">
            <label for="exampleInputEmail1">菜单权限</label>


            <?= Html::activeDropDownList($model, 'slug', ArrayHelper::map($permission, 'name', 'description'), ['class' => 'chosen', 'prompt' => '请选择菜单权限']) ?>

        </div>
        <small class="help-block"><?= Html::error($model, 'slug', ['class' => 'error']) ?></small>
        <div class="form-group fg-line">
            <label for="exampleInputEmail1">描述信息</label>
            <?= Html::activeInput('text', $model, 'description', ['class' => 'form-control input-sm', 'placeholder' => '请输入描述信息']) ?>
        </div>
        <small class="help-block"><?= Html::error($model, 'description', ['class' => 'error']) ?></small>
        <?= Html::submitButton('提 交', ['class' => 'btn btn-primary btn-sm m-t-10 waves-effect']) ?>
        <?= Html::endForm() ?>
    </div>
</div>