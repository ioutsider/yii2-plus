<?php

namespace api\controllers;

use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;

class AdminController extends ActiveController
{

    public $modelClass = 'backend\models\Admin';


    public function actionSendEmail()  //假如是get请求
    {

//        var_dump($this->post_data);
//        die;
        //业务逻辑
        return [
            'name' => $this->post_data['name'],
            'email' => $this->post_data['email'],
        ];
    }

}
