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
            $str = Url::current();
            $arr = explode('/', $str);
            echo "<pre>";
            var_dump($arr);
            die;
            if (in_array($item['url'], $arr)) {
                $flag = 0;
            } else {
                $flag = 1;
            }
            ?>
            <li <?php
            if ($flag == 0) {
                echo 'class="sub-menu toggled"';
            } else {
                echo 'class="sub-menu"';
            }
            ?>>
                <a href=""><i class="md md-now-widgets"></i><?= $item['name'] ?></a>
                <ul <?php if ($flag == 0) echo 'style="display: block;"'; ?>>

                    <?php if (!empty($item['son'])) : ?>
                        <?php foreach ($item['son'] as $son): ?>

                            <li><a <?php if (Url::current() == $son['url']) echo 'class="active"'; ?>  href="<?= Url::toRoute($son['url']); ?>"><i class="md md-arrow-forward"></i><?= $son['name'] ?></a></li>

                        <?php endforeach; ?>
                    <?php endif; ?>

                </ul>
            </li>

        <?php endforeach; ?>
        <li class="sub-menu">
            <a href=""><i class="zmdi zmdi-view-compact"></i> 用户管理</a>
            <ul>
                <li><a href="<?= Url::to(['admin/index']) ?>">用户列表</a></li>
                <li><a href="<?= Url::to(['admin/create']) ?>">添加用户</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href=""><i class="zmdi zmdi-view-compact"></i> 会员管理</a>
            <ul>
                <li><a href="<?= Url::to(['user/index']) ?>">会员列表</a></li>

            </ul>
        </li>
        <li class="sub-menu">
            <a href=""><i class="zmdi zmdi-view-compact"></i> 菜单管理</a>
            <ul>
                <li><a href="<?= Url::to(['menu/index']) ?>">菜单列表</a></li>
                <li><a href="<?= Url::to(['menu/create']) ?>">添加菜单</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href=""><i class="zmdi zmdi-view-compact"></i> 角色管理</a>
            <ul>
                <li><a href="<?= Url::to(['role/index']) ?>">角色列表</a></li>
                <li><a href="<?= Url::to(['role/create']) ?>">添加角色</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href=""><i class="zmdi zmdi-view-compact"></i> 权限管理</a>
            <ul>
                <li><a href="<?= Url::to(['permission/index']) ?>">权限列表</a></li>
                <li><a href="<?= Url::to(['permission/create']) ?>">添加权限</a></li>
            </ul>
        </li>
    </ul>
</aside>