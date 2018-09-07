<?php

namespace common\components;

use Yii;
use yii\base\ActionFilter;

class AuthAccessFilter extends ActionFilter
{

    public function beforeAction($action)
    {
        $this->post_data = Yii::$app->getRequest()->getBodyParams();
        var_dump($this->post_data);
        die;
        return parent::beforeAction($action);
    }

    public function afterAction($action, $result)
    {
        Yii::debug("Action AuthAccess;");
        return parent::afterAction($action, $result);
    }

}
