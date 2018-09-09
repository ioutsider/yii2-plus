<?php

namespace backend\components;

use yii\base\Widget;
use Yii;

class NavWidget extends Widget {

    //查询菜单数据
    public function run() {

        $menus = new \backend\models\Menu;
        $topmenus = $menus->getParentmenus();

        $menuList = $menus->menuGroup($topmenus);


        return $this->render('@app/views/layouts/menus', ['menus' => $menuList]);
    }

}
