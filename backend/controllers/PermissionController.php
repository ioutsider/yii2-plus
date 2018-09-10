<?php

namespace backend\controllers;

use Yii;
use backend\controllers\BaseController;
use backend\models\PermissionForm;
use backend\models\AuthItem;
use yii\data\Pagination;

class PermissionController extends BaseController {

    public function actionIndex() {

        $query = AuthItem::find()->where(['type' => 2]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->orderBy('created_at DESC')
                ->all();

        return $this->render('index', [
                    'models' => $models,
                    'pages' => $pages,
        ]);
    }

    public function actionCreate() {
        $model = new PermissionForm();


        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->addPermission()) {
            Yii::$app->session->setFlash('success', 'add permission success.');
//            return $this->redirect(['index']);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function actionUpdate($name) {

        $model = $this->findModel($name);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index']);
        }


        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($name) {
        if (($model = AuthItem::find()->where(['name' => $name])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('sys', 'The requested page does not exist.'));
    }

}
