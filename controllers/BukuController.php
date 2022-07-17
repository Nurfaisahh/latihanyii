<?php

namespace app\controllers;

use app\models\Buku;
use app\models\BukuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BukuController implements the CRUD actions for Buku model.
 */
class BukuController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Buku models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BukuSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Buku model.
     * @param int $kode_buku Kode Buku
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($kode_buku)
    {
        return $this->render('view', [
            'model' => $this->findModel($kode_buku),
        ]);
    }

    /**
     * Creates a new Buku model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Buku();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'kode_buku' => $model->kode_buku]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Buku model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $kode_buku Kode Buku
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($kode_buku)
    {
        $model = $this->findModel($kode_buku);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kode_buku' => $model->kode_buku]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Buku model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $kode_buku Kode Buku
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($kode_buku)
    {
        $this->findModel($kode_buku)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Buku model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $kode_buku Kode Buku
     * @return Buku the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kode_buku)
    {
        if (($model = Buku::findOne(['kode_buku' => $kode_buku])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
