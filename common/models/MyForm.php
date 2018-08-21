<?php

namespace common\models;

use Yii;
use yii\base\Model;

class MyForm extends Model
{

    public $name;
    public $email;

    public function rules()
    {
        return [
                ['name', 'required', 'message' => Yii::t('app', 'Please Input Your Name')],
                ['email', 'required', 'message' => Yii::t('app', 'Please Input Your Email Address')],
                ['email', 'email', 'message' => Yii::t('app', 'Please enter a valid email address')],
                ['name', 'myname']
        ];
    }

    public function myname($attribute, $params)
    {
        if ($this->name != "outsider") {
            $this->addError($attribute, Yii::t('app', 'Your Nmae is Error'));
        }
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Your Name'),
            'email' => Yii::t('app', 'Your Email'),
        ];
    }

}
