<?php

namespace backend\models;
use Yii;
use yii\base\Model;
use backend\models\Admin;
use yii\helpers\VarDumper;

/**
 * Signup form
 */
class ResetpwdForm extends Model {

    public $password;
    public $password_repeat;
    public $roles;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => '两次输入的密码不一致！'],
            ['roles', 'safe']
        ];
    }

    public function attributeLabels() {
        return [
            'password' => '密码',
            'password_repeat' => '重输密码',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function resetPassword($id) {
        if (!$this->validate()) {
            return null;
        }

        $admuser = Admin::findOne($id);
        $admuser->setPassword($this->password);
        $admuser->removePasswordResetToken();
//        var_dump($this->roles);
//        die;
        if (!empty($this->roles)) {

            foreach ($this->roles as $item) {
                $role = Yii::$app->authManager->getRole($item);
                Yii::$app->authManager->assign($role, $id);
            }
        }

        return $admuser->save() ? true : false;
    }

}
