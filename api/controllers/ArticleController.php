<?php

namespace api\controllers;

use Yii;
use yii\rest\Controller;
use yii\helpers\Json;

class ArticleController extends Controller
{

    public $post_data = [];

    public function init()
    {
        $this->post_data = Yii::$app->getRequest()->getBodyParams();
    }

    public function actionIndex()
    {
        return [
            'name' => $this->post_data['name'],
            'email' => $this->post_data['email'],
        ];
    }

}
