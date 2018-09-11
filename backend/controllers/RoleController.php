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
                ->orderBy('created_at DESC')
                ->all();

        return $this->render('index', [
                    'models' => $models,
                    'pages' => $pages,
        ]);
    }

    public function actionCreate() {
        $model = new RoleFrom();


        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->addRole()) {
            Flush::success('添加成功');
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function actionAssignment() {
        $roleName = Yii::$app->request->get('name', '');

        $roleList = array_keys(ArrayHelper::toArray(Yii::$app->authManager->getPermissionsByRole($roleName)));

        $permission = new AuthRule;
        $list = $permission->permissionGroupByTypeName();

        if (Yii::$app->request->isPost) {
            $authrule = new AuthRule;

            $ret = $authrule->assignRole(Yii::$app->request->post());

            if ($ret) {

                Flush::success('权限分配成功');
            } else {

                Flush::danger('操作失败');
            }
        }
        return $this->render('assignment', ['permissionlist' => $list, 'name' => $roleName, 'roleList' => $roleList]);
    }

    public function actionUpdate($name) {

        $model = $this->findModel($name);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Flush::success('更新成功');
        }


        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($name) {
        if (($model = AuthItem::find()->where(['name' => $name])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('sys', 'The requested page does not exist.'));
    }

}
