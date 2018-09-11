<?php

namespace api\controllers;

use Yii;
use yii\rest\Controller;

class ArticleController extends Controller {

    public $post_data = [];

//
//    public function behaviors()
//    {
//        return [
//            'authAccess' => [
//                'class' => AuthAccessFilter::className(),
//            ]
//        ];
//    }
//
//
    public function init() {


//        $this->post_data = Yii::$app->getRequest()->getBodyParams();
//        if ($this->post_data['access-token']) {
//
//            $user = new User;
//            $token = $user->findIdentityByAccessToken($this->post_data['access-token']);
//            var_dump($token);
//            die;
//            if (!$token) {
//                echo "no";
//                return [
//                    'respCode' => 401,
//                    'respMsg' => '无权访问此接口',
//                    'respData' => []
//                ];
//            } else {
//                echo "yes";
//            }
//            die;
//        }
    }

    public function actionIndex() {
        return $data = [
            'access-token' => '123',
        ];
    }

}
