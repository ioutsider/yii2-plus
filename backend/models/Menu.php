<?php

/**
 * Created by PhpStorm.
 * User: xu.gao
 * Date: 2016/1/20
 * Time: 9:59
 */

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Menu extends ActiveRecord {

    public static function tableName() {
        return '{{%menu}}';
    }

    public function rules() {

        return [
            ['name', 'unique', 'targetClass' => '\backend\models\Menu', 'message' => '菜单名称不能重复'],
            ['name', 'required', 'message' => '菜单名称不能为空'],
            ['url', 'required', 'message' => '访问地址不能为空'],
            ['slug', 'required', 'message' => '请选择对应的菜单权限'],
            [['description', 'parent_id'], 'safe']
        ];
    }

    public function getTopmenus() {
        $menus = Menu::find()
                ->select(['id', 'description'])
                ->where('parent_id=0')
                ->asArray()
                ->all();

        return array_merge([['id' => 0, 'description' => '一级菜单']], $menus);
    }

    public function getParentmenus() {
        return $menus = Menu::find()
                ->where('parent_id=0')
                ->asArray()
                ->all();
    }

    public function getPermission() {
        return AuthItem::find()
                        ->select(['name', 'description'])
                        ->where('type=2')
                        ->asArray()
                        ->all();
    }

    public function getSub($parent_id = 0) {

        return Menu::find()
                        ->where('parent_id=' . $parent_id)
                        ->all();
    }

    public function menuGroup($items) {

        $tree = [];
        $uid = Yii::$app->user->getId();


        $permissions = ArrayHelper::toArray(Yii::$app->authManager->getPermissionsByUser($uid));

        $permissions = array_keys($permissions);

        foreach ($items as $item) {

            if (in_array($item['slug'], $permissions)) {

                $tree[$item['id']] = $item;
                $childreds = Menu::find()->where(['parent_id' => $item['id']])->asArray()->all();
                foreach ($childreds as $child) {

                    if (in_array($child['slug'], $permissions)) {

                        $tree[$item['id']]['son'][] = $child;
                    }
                }
            }
        }
        return $tree;
    }

    public function beforeSave($insert) {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        if ($this->isNewRecord) {
            $this->created_at = time();
            $this->updated_at = time();
        } else {
            $this->updated_at = time();
        }

        return true;
    }

}
