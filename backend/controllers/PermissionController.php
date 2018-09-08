<?php

namespace backend\controllers;

use Yii;
use backend\controllers\BaseController;
use backend\models\PermissionForm;

class PermissionController extends BaseController {

    public function actionIndex() {
        
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

}
