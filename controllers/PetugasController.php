<?php

namespace app\controllers;

use app\models\Petugas;
use app\models\PetugasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PetugasController implements the CRUD actions for Petugas model.
 */
class PetugasController extends Controller
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
     * Lists all Petugas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PetugasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Petugas model.
     * @param int $kode_petugas Kode Petugas
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($kode_petugas)
    {
        return $this->render('view', [
            'model' => $this->findModel($kode_petugas),
        ]);
    }

    /**
     * Creates a new Petugas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Petugas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'kode_petugas' => $model->kode_petugas]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Petugas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $kode_petugas Kode Petugas
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($kode_petugas)
    {
        $model = $this->findModel($kode_petugas);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kode_petugas' => $model->kode_petugas]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Petugas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $kode_petugas Kode Petugas
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($kode_petugas)
    {
        $this->findModel($kode_petugas)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Petugas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $kode_petugas Kode Petugas
     * @return Petugas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kode_petugas)
    {
        if (($model = Petugas::findOne(['kode_petugas' => $kode_petugas])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
