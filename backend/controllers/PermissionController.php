<?php

namespace backend\controllers;

use Yii;
use backend\controllers\BaseController;
use backend\models\PermissionForm;
use backend\models\AuthItem;

class PermissionController extends BaseController
{

    public function actionIndex()
    {
        
    }

    public function actionCreate()
    {
        $model = new PermissionForm();
        if (Yii::$app->request->isPost) {
//            var_dump(Yii::$app->request->post('Permission'));die;
            $model->attributes = Yii::$app->request->post('Permission');
            echo "<pre>";
            var_dump($model);
            die;
        }

        if ($model->load(Yii::$app->request->post())) {
            var_dump('sss');

            die;
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

}
