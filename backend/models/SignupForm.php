<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use backend\models\Admin;
use yii\helpers\VarDumper;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;
    public $email;
    public $password;
    public $password_repeat;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
                ['username', 'filter', 'filter' => 'trim'],
                ['username', 'required'],
                ['username', 'unique', 'targetClass' => '\backend\models\Admin', 'message' => '用户名已经存在.'],
                ['username', 'string', 'min' => 2, 'max' => 255],
                ['email', 'filter', 'filter' => 'trim'],
                ['email', 'required'],
                ['email', 'email'],
                ['email', 'string', 'max' => 255],
                ['email', 'unique', 'targetClass' => '\backend\models\Admin', 'message' => '邮件地址已经存在.'],
                ['password', 'required'],
                ['password', 'string', 'min' => 6],
                ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => '两次输入的密码不一致！'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('sys', 'username'),
            'password' => Yii::t('sys', 'password'),
            'password_repeat' => Yii::t('sys', 'password repeat'),
            'email' => Yii::t('sys', 'Email'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new Admin();
        $user->username = $this->username;

        $user->email = $this->email;

        $user->setPassword($this->password);
        $user->generateAuthKey();
//        $user->password = '*';
        //  $user->save(); VarDumper::dump($user->errors);exit(0);
        return $user->save() ? $user : null;
    }

}
