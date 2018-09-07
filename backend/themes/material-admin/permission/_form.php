<?php
$this->title = "添加权限";

use yii\bootstrap\ActiveForm;
?>

<div class="card">
    <div class="card-header">
        <h2>添加权限 
            <small>
                添加权限，请填写。
            </small>
        </h2>
    </div>

    <div class="card-body card-padding">
        <?php $form = ActiveForm::begin(['id' => 'permission-form']); ?>
        <div class="form-group fg-line">
            <label for="typename">类型名称</label>
            <input type="text" class="form-control input-sm" id='typename' name="Permission[typename]"  placeholder="请输入类型名称">
        </div>
        <div class="form-group fg-line">
            <label for="name">权限名称</label>
            <input type="text" class="form-control input-sm" id='name' name="Permission[name]" placeholder="请输入权限名称">
        </div>
        <div class="form-group fg-line">
            <label for="description">描述信息</label>
            <input type="text" class="form-control input-sm" id='description' name="Permission[description]" placeholder="请输入权限描述信息">
        </div>


        <button type="submit" class="btn btn-primary btn-sm m-t-10 waves-effect">添 加</button>
        <?php ActiveForm::end(); ?>
    </div>
</div>