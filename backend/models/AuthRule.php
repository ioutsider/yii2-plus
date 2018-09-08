<?php

namespace backend\models;

use backend\models\AuthItem;
use Yii;

/**
 * This is the model class for table "{{%auth_rule}}".
 *
 * @property string $name
 * @property string $data
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AuthItem[] $authItems
 */
class AuthRule extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%auth_rule}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['data'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'name' => 'Name',
            'data' => 'Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItems() {
        return $this->hasMany(AuthItem::className(), ['rule_name' => 'name']);
    }

    public function getRoles() {
        return $roles = AuthItem::find()
                ->select(['name', 'description'])
                ->where('type=1')
                ->asArray()
                ->all();
    }

    /**
     * 查询分组后的权限列表
     * @return mixed
     */
    public function permissionGroupByTypeName() {
        return AuthItem::find()->select(['typename', 'GROUP_CONCAT(description) AS description', 'GROUP_CONCAT(name) AS name'])
                        ->where(['type' => 2])->groupBy('typename')
                        ->asArray()
                        ->all();
    }

    /**
     * 权限分配
     */
    public function assignRole($params = []) {
        //当前角色对象
        $role = Yii::$app->authManager->getRole($params['name']);
        Yii::$app->authManager->removeChildren($role);

        //权限添加
        foreach ($params['roles'] as $item) {

            $childObj = Yii::$app->authManager->getPermission($item);
            //给item_child表写入数据（权限表）
            Yii::$app->authManager->addChild($role, $childObj);
        }

        return true;
    }

}
