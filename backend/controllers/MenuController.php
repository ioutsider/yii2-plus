<?php

/**
 * Created by PhpStorm.
 * User: xu.gao
 * Date: 2016/1/20
 * Time: 9:16
 */

namespace backend\controllers;

use Yii;
use backend\controllers\BaseController;

class MenuController extends BaseController {

    public function actionIndex() {
        
    }

    public function actionCreate() {
        $model = new \backend\models\MenuForm;

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->addMenu()) {
            Yii::$app->session->setFlash('success', 'add menu success.');
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

}
