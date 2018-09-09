<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<?php $form = ActiveForm::begin(); ?>
<?= Html::activeDropDownList($model, 'roles', ArrayHelper::map($roles, 'name', 'description'), ['class' => 'chosen', 'multiple' => 'multiple', 'prompt' => '选择角色']) ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('sys', 'Save'), ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>