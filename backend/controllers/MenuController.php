<?php

/**
 * Created by PhpStorm.
 * User: xu.gao
 * Date: 2016/1/20
 * Time: 9:16
 */

namespace backend\controllers;

use Yii;
use backend\controllers\BaseController;
use backend\models\Menu;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class MenuController extends BaseController {

    public function actionIndex() {

        $query = Menu::find()->where('parent_id=:parent_id', [':parent_id' => 0]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 15]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        return $this->render('index', [
                    'models' => $models,
                    'pages' => $pages,
        ]);
    }

    public function actionCreate() {
        $model = new \backend\models\MenuForm;

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->addMenu()) {
            Yii::$app->session->setFlash('success', 'add menu success.');
        }

        //查询父级菜单
        $menu = new Menu;
        $menus = $menu->getTopmenus();
        $permission = $menu->getPermission();
//        var_dump($permission);die;
        return $this->render('create', [
                    'model' => $model,
                    'menus' => $menus,
                    'permission' => $permission
        ]);
    }

    public function actionUpdate($id) {

        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index']);
        }

        //查询父级菜单
        $menu = new Menu;
        $menus = $menu->getTopmenus();
        $permission = $menu->getPermission();
        return $this->render('update', [
                    'model' => $model,
                    'menus' => $menus,
                    'permission' => $permission
        ]);
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionSub() {
        $parent_id = Yii::$app->request->get('parent_id');

        $menu = new Menu;
        $models = $menu->getSub($parent_id);
//        echo "<pre>";
//        var_dump($models);
//        die;
        return $this->render('sub', ['models' => $models]);
    }

    protected function findModel($id) {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('sys', 'The requested page does not exist.'));
    }

}
