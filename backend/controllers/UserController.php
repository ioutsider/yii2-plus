<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use backend\controllers\BaseController;
use yii\web\NotFoundHttpException;
use backend\models\SignupForm;
use backend\models\ResetpwdForm;
use yii\data\Pagination;
use backend\tools\Flush;

class UserController extends BaseController {

    public function actionIndex() {
        $query = User::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->orderBy('created_at DESC')
                ->all();

        return $this->render('index', [
                    'models' => $models,
                    'pages' => $pages,
        ]);
    }

    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate() {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {

                Flush::success('添加成功');
//                return $this->redirect(['view', 'id' => $user->id]);
            }
        }
        $authrule = new \backend\models\AuthRule;
        $roles = $authrule->getRoles();

        return $this->render('create', [
                    'model' => $model,
                    'roles' => $roles
        ]);
    }

    public function actionUpdate($id) {

        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Flush::success('更新成功');
//            return $this->redirect(['view', 'id' => $model->id]);
        }


        return $this->render('update', [
                    'model' => $model
        ]);
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('sys', 'The requested page does not exist.'));
    }

    public function actionResetpwd($id) {
        $model = new ResetpwdForm();

        if ($model->load(Yii::$app->request->post())) {

            if ($model->resetPassword($id)) {
                Flush::success('密码重置成功');
//                return $this->redirect(['index']);
            }
        }
        $authrule = new \backend\models\AuthRule;
        $roles = $authrule->getRoles();
        return $this->render('resetpwd', [
                    'model' => $model,
                    'roles' => $roles
        ]);
    }

}
