<?php

namespace backend\controllers;

use yii\web\Controller;
use common\components\behaviors\PermissionBehavior;

class BaseController extends Controller {

    public $menulist;

    public function behaviors() {
        return [
            PermissionBehavior::className(),
        ];
    }

}
