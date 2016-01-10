<?php

namespace backend\controllers;

use Yii;
use common\models\Url;
use common\models\UrlSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UrlController implements the CRUD actions for Url model.
 */
class UrlController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Url models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UrlSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Url model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Url model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($st_id)
    {
        $model = new Url();
        $model->st_id = $st_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['index', 'id' => $model->url_id]);
            return $this->redirect(['/stream/update', 'id' => $model->st_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Url model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $searchModelUrl = new UrlSearch();
        $dataProviderUrl = $searchModelUrl->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['index', 'id' => $model->url_id]);
            return $this->redirect(['/stream/update', 'id' => $model->st_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'searchModelUrl' => $searchModelUrl,
                'dataProviderUrl' => $dataProviderUrl,
            ]);
        }
    }

    /**
     * Deletes an existing Url model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Url model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Url the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Url::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
