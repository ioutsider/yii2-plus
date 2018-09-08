<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Menus List');
$this->params['breadcrumbs'][] = $this->title;
?>




<div class="card">
    <div class="card-header">
        <h2>菜单列表 <small>Add zebra-striping to any table row within the tbody</small></h2>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>菜单名称</th>
                    <th>链接</th>
                    <th>权限</th>
                    <th>描述信息</th>
                    <th>添加时间</th>
                    <th>更新时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>

                <?php if ($models): ?>
                    <?php foreach ($models as $k => $model): ?>
                        <tr>
                            <td><?= $k + 1 ?></td>
                            <td><?= $model['name']; ?></td>
                            <td><?= $model['url']; ?></td>
                            <td><?= $model['slug']; ?></td>
                            <td><?= $model['description']; ?></td>
                            <td><?= date('Y-m-d H:i:s', $model['created_at']); ?></td>
                            <td><?= date('Y-m-d H:i:s', $model['updated_at']); ?></td>
                            <td>
                                <a href="<?= Url::to(['menu/sub', 'parent_id' => $model['id']]) ?>">更新</a>
                                <a href="<?= Url::to(['menu/sub', 'parent_id' => $model['id']]) ?>">删除</a>
                                <a href="<?= Url::to(['menu/sub', 'parent_id' => $model['id']]) ?>">详情</a>
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


