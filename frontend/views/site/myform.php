<?php
//dev 分支
//master 分支修改
//解决冲突

$this->title = "表单";

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

//echo Url::to(['post/view', 'id' => 100, 'pid' => 123], 'https');
//echo "<br/>";
//echo Url::base();
//Url::remember();
//echo Url::previous();
$form = ActiveForm::begin();
?>

<?= $form->field($model, 'name') ?>

<?= $form->field($model, 'email') ?>

<div class="form-group">
    <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
</div>

