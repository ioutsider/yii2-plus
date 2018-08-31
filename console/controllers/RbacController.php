<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{

    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();


        $privilegeAdmin = $auth->createPermission('privilegeAdmin');
        $privilegeAdmin->description = 'privilege admins';
        $auth->add($privilegeAdmin);
        
        $indexAdmin = $auth->createPermission('indexAdmin');
        $indexAdmin->description = 'mange admins';
        $auth->add($indexAdmin);

        $viewAdmin = $auth->createPermission('viewAdmin');
        $viewAdmin->description = 'view admin';
        $auth->add($viewAdmin);

        $deleteAdmin = $auth->createPermission('deleteAdmin');
        $deleteAdmin->description = 'delete admin';
        $auth->add($deleteAdmin);

        $resetpwdAdmin = $auth->createPermission('resetpwdAdmin');
        $resetpwdAdmin->description = 'reset password admin';
        $auth->add($resetpwdAdmin);

        // 添加 "createAdmin" 权限
        $createAdmin = $auth->createPermission('createAdmin');
        $createAdmin->description = 'Create a admin';
        $auth->add($createAdmin);

        // 添加 "updateAdmin" 权限
        $updateAdmin = $auth->createPermission('updateAdmin');
        $updateAdmin->description = 'Update admin';
        $auth->add($updateAdmin);

        // 添加 "crete" 角色并赋予 "createAdmin" 权限
        $test = $auth->createRole('updateData');
        $test->description = 'update data 角色';
        $auth->add($test);
        $auth->addChild($test, $indexAdmin);
        $auth->addChild($test, $updateAdmin);

        $author = $auth->createRole('createData');
        $author->description = 'Create data 角色';
        $auth->add($author);
        $auth->addChild($author, $createAdmin);
        $auth->addChild($author, $indexAdmin);

        // 添加 "admin" 角色并赋予 "updateAdmin" 
        // 和 "author" 权限
        $admin = $auth->createRole('admin');
        $admin->description = 'admin 角色';
        $auth->add($admin);
        $auth->addChild($admin, $indexAdmin);
        $auth->addChild($admin, $createAdmin);
        $auth->addChild($admin, $updateAdmin);
        $auth->addChild($admin, $deleteAdmin);
        $auth->addChild($admin, $resetpwdAdmin);
        $auth->addChild($admin, $viewAdmin);
        $auth->addChild($admin, $privilegeAdmin);

        // 为用户指派角色。其中 1 和 2 是由 IdentityInterface::getId() 返回的id
        // 通常在你的 User 模型中实现这个函数。
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
        $auth->assign($test, 3);
    }

}
