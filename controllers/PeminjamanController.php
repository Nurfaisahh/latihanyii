<?php

namespace app\controllers;

use app\models\Peminjaman;
use app\models\PeminjamanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PeminjamanController implements the CRUD actions for Peminjaman model.
 */
class PeminjamanController extends Controller
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
     * Lists all Peminjaman models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PeminjamanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Peminjaman model.
     * @param string $kode_pinjam Kode Pinjam
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($kode_pinjam)
    {
        return $this->render('view', [
            'model' => $this->findModel($kode_pinjam),
        ]);
    }

    /**
     * Creates a new Peminjaman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Peminjaman();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'kode_pinjam' => $model->kode_pinjam]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Peminjaman model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $kode_pinjam Kode Pinjam
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($kode_pinjam)
    {
        $model = $this->findModel($kode_pinjam);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kode_pinjam' => $model->kode_pinjam]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Peminjaman model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $kode_pinjam Kode Pinjam
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($kode_pinjam)
    {
        $this->findModel($kode_pinjam)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Peminjaman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $kode_pinjam Kode Pinjam
     * @return Peminjaman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kode_pinjam)
    {
        if (($model = Peminjaman::findOne(['kode_pinjam' => $kode_pinjam])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
