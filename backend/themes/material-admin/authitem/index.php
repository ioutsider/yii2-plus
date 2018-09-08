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
<div class="auth-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Auth Item'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="card">
        <div class="card-header">
            <h2>Striped rows <small>Add zebra-striping to any table row within the tbody</small></h2>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Nickname</th>
                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <td>1</td>
                        <td>Alexandra</td>
                        <td>Christopher</td>
                        <td>@makinton</td>
                        <td>Ducky</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <?=
    LinkPager::widget([
        'pagination' => $pages,
    ])
    ?>

</div>
