<?php

namespace backend\models;

use yii\base\Model;
use yii\rbac\Item;

class RoleFrom extends Model {

    public $name;
    public $type;
    public $description;
    public $rule_name;
    public $data;

    public function init() {

        parent::init();
        $this->type = Item::TYPE_ROLE; //yii-rbac-Role隐藏继承常量这里的值是1
    }

    /**
     * 验证规则
     */
    public function rules() {

        return [
            ['name', 'unique', 'targetClass' => '\backend\models\AuthItem', 'message' => '角色名称不能重复'],
            ['name', 'required', 'message' => '角色名称不能为空'],
            ['description', 'safe']
        ];
    }

    //角色添加
    public function addRole() {

        $authItem = new AuthItem();
        $authItem->name = $this->name;
        $authItem->type = $this->type;
        $authItem->description = $this->description;
        $authItem->save();
        return $authItem;
    }

    //角色更新
    public function updateRole($name) {

        $authItem = AuthItem::find()->where(['name' => $name, 'type' => $this->type])->one();
        $authItem->name = $this->name;
        $authItem->description = $this->description;
        $authItem->save();
        return $authItem;
    }

}
