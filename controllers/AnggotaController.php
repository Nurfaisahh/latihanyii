<?php

namespace app\controllers;

use app\models\Anggota;
use app\models\AnggotaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AnggotaController implements the CRUD actions for Anggota model.
 */
class AnggotaController extends Controller
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
     * Lists all Anggota models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AnggotaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Anggota model.
     * @param int $kode_anggota Kode Anggota
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($kode_anggota)
    {
        return $this->render('view', [
            'model' => $this->findModel($kode_anggota),
        ]);
    }

    /**
     * Creates a new Anggota model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Anggota();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'kode_anggota' => $model->kode_anggota]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Anggota model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $kode_anggota Kode Anggota
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($kode_anggota)
    {
        $model = $this->findModel($kode_anggota);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kode_anggota' => $model->kode_anggota]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Anggota model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $kode_anggota Kode Anggota
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($kode_anggota)
    {
        $this->findModel($kode_anggota)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Anggota model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $kode_anggota Kode Anggota
     * @return Anggota the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kode_anggota)
    {
        if (($model = Anggota::findOne(['kode_anggota' => $kode_anggota])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
