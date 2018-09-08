<?php

namespace backend\controllers;

use Yii;
use backend\controllers\BaseController;
use backend\models\RoleFrom;
use backend\models\AuthItem;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use backend\tools\Flush;
use backend\models\AuthRule;

class RoleController extends BaseController {

    public function actionIndex() {

        $query = AuthItem::find()->where(['type' => 1]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        return $this->render('index', [
                    'models' => $models,
                    'pages' => $pages,
        ]);
    }

    public function actionCreate() {
        $model = new RoleFrom();


        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->addRole()) {
            Yii::$app->session->setFlash('success', 'add role success.');
//            return $this->redirect(['index']);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function actionAssignment() {
        $roleName = Yii::$app->request->get('name', '');
        //获取当前角色的权限
        $roleList = array_keys(ArrayHelper::toArray(Yii::$app->authManager->getPermissionsByRole($roleName)));
        //查询权限列表
        $permission = new AuthRule;
        $list = $permission->permissionGroupByTypeName();
//        echo "<pre>";
//        var_dump($list);
//        die;
        if (Yii::$app->request->isPost) {
            $authrule = new AuthRule;

//            echo "<pre>";
//            var_dump(Yii::$app->request->post());
//            die;
            $ret = $authrule->assignRole(Yii::$app->request->post());

            if ($ret) {

                Flush::success('权限分配成功');
            } else {

                Flush::danger('操作失败');
            }
        }
        return $this->render('assignment', ['permissionlist' => $list, 'name' => $roleName, 'roleList' => $roleList]);
    }

}
