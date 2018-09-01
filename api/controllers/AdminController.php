<?php

namespace api\controllers;

use Yii;
use yii\rest\ActiveController;

class AdminController extends ActiveController
{

    public $modelClass = 'backend\models\Admin';

// 明确列出每个字段，适用于你希望数据表或
// 模型属性修改时不导致你的字段修改（保持后端API兼容性）
    public function fields()
    {
        return [
            // 字段名和属性名相同
            'id',
            // 字段名为"email", 对应的属性名为"email_address"
            'email' => 'email_address',
            'username',
                // 字段名为"name", 值由一个PHP回调函数定义
//            'username' => function ($model) {
//                return $model->first_name . ' ' . $model->last_name;
//            },
        ];

//        $fields = parent::fields();
//
//        // 删除一些包含敏感信息的字段
//        unset($fields['auth_key'], $fields['password_hash'], $fields['password_reset_token']);
//
//        return $fields;
    }

}
