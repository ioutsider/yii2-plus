<?php

/**
 * Created by PhpStorm.
 * User: xu.gao
 * Date: 2016/1/20
 * Time: 15:29
 */

namespace backend\models;

use yii\base\Event;
use yii\base\Model;

class MenuForm extends Model {

    public $id;
    public $name;
    public $url;
    public $parent_id;
    public $slug;
    public $description;

    /**
     * 验证规则
     */
    public function rules() {

        return [
            ['name', 'unique', 'targetClass' => '\backend\models\Menu', 'message' => '菜单名称不能重复'],
            ['name', 'required', 'message' => '菜单名称不能为空'],
            ['url', 'required', 'message' => '访问地址不能为空'],
            ['slug', 'required', 'message' => '请选择对应的菜单权限'],
            [['description', 'parent_id'], 'safe']
        ];
    }

    /**
     * 添加菜单
     */
    public function addMenu() {

        $menu = new Menu();
        $menu->name = $this->name;
        $menu->parent_id = $this->parent_id;
        $menu->url = $this->url;
        $menu->description = $this->description;
        $menu->slug = $this->slug;
        return $menu->save();
    }

    /**
     * 更新菜单
     */
    public function updateMenu() {

        $menu = Menu::findOne($this->id);
        $menu->name = $this->name;
        $menu->parent_id = $this->parent_id;
        $menu->url = $this->url;
        $menu->description = $this->description;
        $menu->slug = $this->slug;
        $menu->save();
        return $menu;
    }

}
