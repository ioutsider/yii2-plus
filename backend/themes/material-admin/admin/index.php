<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('sys', 'Admins');
$this->params['breadcrumbs'][] = $this->title;
?>

<h2><?= Html::encode($this->title) ?></h2>
<p>
    <?= Html::a(Yii::t('sys', 'Create Admin'), ['create'], ['class' => 'btn btn-success waves-effect']) ?>
</p>
<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'showHeader' => true,
    'showFooter' => false,
//    'tableOptions' => [
//        
//    ],
    'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
        'id',
        'username',
        'email:email',
        'status',
            [
            'attribute' => 'created_at',
            'format' => ['date', 'php:Y-m-d H:i:s'],
        ],
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {resetpwd} {privilege}',
            'buttons' => [
                'resetpwd' => function($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('sys', 'reset password'),
                        'aria-label' => Yii::t('sys', 'reset password'),
                        'data-pjax' => '0',
                    ];
                    return Html::a('<span class="glyphicon glyphicon-lock"></span>', $url, $options);
                },
                'privilege' => function($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('sys', 'permission'),
                        'aria-label' => Yii::t('sys', 'permission'),
                        'data-pjax' => '0',
                    ];
                    return Html::a('<span class="glyphicon glyphicon-user"></span>', $url, $options);
                },
            ],
        ],
    ],
]);
?>

