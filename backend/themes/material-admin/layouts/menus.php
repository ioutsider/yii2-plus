<?php

use yii\helpers\Url;
?>
<aside id="sidebar" class="sidebar c-overflow">
    <div class="profile-menu">
        <a href="">
            <div class="profile-pic">
                <img src="img/profile-pics/1.jpg" alt="">
            </div>

            <div class="profile-info">
                <?= Yii::t('sys', 'Welcome') ?>， <?= Yii::$app->user->identity->username; ?>

                <i class="zmdi zmdi-caret-down"></i>
            </div>
        </a>

        <ul class="main-menu">

            <li>
                <a href="#"><i class="zmdi zmdi-settings"></i> <?= Yii::t('sys', 'Settings') ?></a>
            </li>
            <li>
                <a href="<?= Url::to(['auth/logout']); ?>"><i class="zmdi zmdi-time-restore"></i> <?= Yii::t('sys', 'Logout') ?></a>
            </li>
        </ul>
    </div>



    <ul class="main-menu">
        <li class="active">
            <a href="<?= Url::to(['site/index']); ?>"><i class="zmdi zmdi-home"></i> <?= Yii::t('sys', 'Home') ?></a>
        </li>
        <!--遍历菜单-->

        <?php foreach ($menus as $item): ?>

            <?php
            $controllerID = Yii::$app->controller->id;
            $actionID = Yii::$app->controller->action->id;
            $str = Url::current();
            $arr = explode('/', $str);
            if ($item['url'] == $controllerID) {
                $flag = 0;
            } else {
                $flag = 1;
            }
            ?>
            <li <?php
            if ($flag == 0) {
                echo 'class="sub-menu active"';
            } else {
                echo 'class="sub-menu"';
            }
            ?>>
                <a href=""><i class="zmdi zmdi-widgets zmdi-hc-fw"></i> <?= $item['name'] ?></a>
                <ul <?php if ($flag == 0) echo 'style="display: block;"'; ?>>

                    <?php if (!empty($item['son'])) : ?>
                        <?php foreach ($item['son'] as $son): ?>
                            <li><a <?php if ($controllerID . '/' . $actionID == $son['url']) echo 'class="active"'; ?>  href="<?= Url::toRoute($son['url']); ?>"><i class="zmdi zmdi-long-arrow-right zmdi-hc-fw"></i> <?= $son['name'] ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>

                </ul>
            </li>

        <?php endforeach; ?>

    </ul>
</aside>