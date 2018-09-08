<?php

namespace backend\controllers;

use Yii;
use backend\controllers\BaseController;
use backend\models\RoleFrom;

class RoleController extends BaseController {

    public function actionCreate() {
        $model = new RoleFrom();


        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->addRole()) {
            Yii::$app->session->setFlash('success', 'add role success.');
//            return $this->redirect(['index']);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

}
