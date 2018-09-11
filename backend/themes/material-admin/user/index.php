<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;
use common\models\Lookup;

$this->title = Yii::t('sys', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-header">
        <h2><?= $this->title; ?></h2>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>电子邮箱</th>
                    <th>账号状态</th>
                    <th>添加时间</th>

                    <th>操作</th>
                </tr>
            </thead>
            <tbody>

                <?php if ($models): ?>
                    <?php foreach ($models as $k => $model): ?>
                        <tr>
                            <td><?= $model['id']; ?></td>
                            <td><?= $model['username']; ?></td>
                            <td><?= $model['email']; ?></td>
                            <td> <?php echo Lookup::item("UserStatus", $model['status']); ?></td>
                            <td><?= date('Y-m-d H:i:s', $model['created_at']); ?></td>

                            <td>
        <!--                                <a href="<?= Url::to(['admin/update', 'id' => $model['id']]) ?>">更新</a>
                                <a href="<?= Url::to(['admin/delete', 'id' => $model['id']]) ?>">删除</a>-->

                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="bootgrid-footer container-fluid">
        <?=
        LinkPager::widget([
            'pagination' => $pages,
        ])
        ?>
    </div>
</div>

