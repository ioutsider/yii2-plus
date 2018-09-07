<?php

namespace backend\models;

use yii\db\ActiveRecord;

class AuthItem extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%auth_item}}';
    }

}
