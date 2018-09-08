<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Auth Items');
$this->params['breadcrumbs'][] = $this->title;
?>




<div class="card">
    <div class="card-header">
        <h2>权限列表 <small>Add zebra-striping to any table row within the tbody</small></h2>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>权限类型</th>
                    <th>权限名称</th>
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
                            <td><?= $model['typename']; ?></td>
                            <td><?= $model['name']; ?></td>
                            <td><?= $model['description']; ?></td>
                            <td><?= $model['created_at']; ?></td>
                            <td><?= $model['updated_at']; ?></td>
                            <td>
                                更新
                                删除

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


