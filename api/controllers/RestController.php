<?php

namespace api\controllers;

use Yii;
use yii\rest\Controller;
use common\models\User;

class RestController extends Controller
{

    public $post_data = [];

    public function init()
    {
        $this->post_data = Yii::$app->getRequest()->getBodyParams();
        if ($this->post_data['access-token']) {
            $user = new User;
            $token = $user->findIdentityByAccessToken($this->post_data['access-token']);
            if (!$token) {

                return [
                    'respCode' => 401,
                    'respMsg' => '无权访问此接口',
                    'respData' => []
                ];
            }
        }
    }

}
