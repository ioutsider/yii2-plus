<?php

use yii\helpers\Html;
?>
<?= Html::beginForm('', 'post', ['class' => 'form-horizontal']) ?>
<div class="card">
    <div class="card-header">
        <h2>更新角色权限</h2>
    </div>
    <div class="card-body card-padding">
        <input type="hidden" name="name" value="<?= $name ?>">
        <?php foreach ($permissionlist as $items): ?>
            <?php
            $names = explode(',', $items['description']);
            $roles = explode(',', $items['name']);
            $len = count($names);
            ?>
            <div class="fieldset col-xs-9">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><?= $items['typename'] ?></legend>
                    <?php for ($i = 0; $i < $len; $i++): ?>

                        <div class="checkbox col-xs-3">
                            <label>
                                <input type="checkbox" <?php if (in_array($roles[$i], $roleList)) echo 'checked'; ?> name="roles[]" value="<?= $roles[$i] ?>">
                                <i class="input-helper"></i>
                                <?= $names[$i] ?>
                            </label>
                        </div>

                    <?php endfor; ?>
                </fieldset>
            </div>
        <?php endforeach; ?>
        <div class="form-group">
            <div class="col-xs-4 pull-right">
                <button type="submit" class="btn bgm-blue waves-effect waves-button waves-float">提交</button>
            </div>
        </div>
    </div>

    <?= Html::endForm() ?>
</div>