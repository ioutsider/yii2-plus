<?php

namespace api\modules\v2\controllers;
use Yii;
use yii\rest\Controller;

class ArticleController extends Controller {

    public $post_data = [];

    public function init() {


        $this->post_data = Yii::$app->getRequest()->getBodyParams();
    }

    public function actionIndex() {
        return $data = [
            'access-token' => 'v2',
        ];
    }

}
