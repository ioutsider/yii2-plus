<?php

/**
 * Created by PhpStorm.
 * User: xu.gao
 * Date: 2016/1/20
 * Time: 9:59
 */

namespace backend\models;

use yii\db\ActiveRecord;

class Menu extends ActiveRecord {

    public static function tableName() {
        return '{{%menu}}';
    }

    public function getTopmenus() {
        $menus = Menu::find()
                ->select(['id', 'description'])
                ->where('parent_id=0')
                ->asArray()
                ->all();

        return array_merge([['id' => 0, 'description' => '一级菜单']], $menus);
    }

    public function getPermission() {
        return AuthItem::find()
                        ->select(['name', 'description'])
                        ->where('type=2')
                        ->asArray()
                        ->all();
    }

}
