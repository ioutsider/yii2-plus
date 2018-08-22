<?php
//dev 分支
$this->title = "表单";

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin();
?>

<?= $form->field($model, 'name') ?>

<?= $form->field($model, 'email') ?>

<div class="form-group">
<?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>