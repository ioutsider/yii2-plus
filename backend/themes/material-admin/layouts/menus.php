<?php

use yii\helpers\Url;

$controllerID = Yii::$app->controller->id;
$actionID = Yii::$app->controller->action->id;
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
        <li <?php if ($controllerID . '/' . $actionID == 'site/index') echo 'class="active"'; ?>>
            <a href="<?= Url::to(['site/index']); ?>"><i class="zmdi zmdi-home"></i> <?= Yii::t('sys', 'Home') ?></a>
        </li>
        <!--遍历菜单-->

        <?php foreach ($menus as $item): ?>

            <?php
            if ($item['url'] == $controllerID) {
                $isactive = 0;
            } else {
                $isactive = 1;
            }
            ?>
            <li <?php
            if ($isactive == 0) {
                echo 'class="sub-menu toggled active"';
            } else {
                echo 'class="sub-menu"';
            }
            ?>>
                <a href=""><i class="zmdi <?php echo $item['icon'] ? 'zmdi-' . $item['icon'] : 'zmdi-widgets'; ?> zmdi-hc-fw"></i> <?= $item['name'] ?></a>
                <ul>

                    <?php if (!empty($item['son'])) : ?>
                        <?php foreach ($item['son'] as $son): ?>
                            <li><a <?php if ($controllerID . '/' . $actionID == $son['url']) echo 'class="active"'; ?>  href="<?= Url::toRoute($son['url']); ?>"><i class="zmdi <?php echo $son['icon'] ? 'zmdi-' . $son['icon'] : 'zmdi-long-arrow-right'; ?>"></i> <?= $son['name'] ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>

                </ul>
            </li>

        <?php endforeach; ?>

    </ul>
</aside>