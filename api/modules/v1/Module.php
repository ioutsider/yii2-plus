<?php

namespace api\modules\v1;

use \yii\base\Module as BaseModule;

class Module extends BaseModule {

    const VERSION = '1.0.0-dev';

    public $controllerNamespace = 'api\modules\v1\controllers';

    public function init() {
        parent::init();
    }

}
