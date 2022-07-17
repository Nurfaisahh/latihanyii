<?php

namespace app\controllers;

use app\models\Pengembalian;
use app\models\PengembalianSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PengembalianController implements the CRUD actions for Pengembalian model.
 */
class PengembalianController extends Controller
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
     * Lists all Pengembalian models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PengembalianSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pengembalian model.
     * @param string $kode_kembali Kode Kembali
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($kode_kembali)
    {
        return $this->render('view', [
            'model' => $this->findModel($kode_kembali),
        ]);
    }

    /**
     * Creates a new Pengembalian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pengembalian();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'kode_kembali' => $model->kode_kembali]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pengembalian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $kode_kembali Kode Kembali
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($kode_kembali)
    {
        $model = $this->findModel($kode_kembali);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kode_kembali' => $model->kode_kembali]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pengembalian model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $kode_kembali Kode Kembali
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($kode_kembali)
    {
        $this->findModel($kode_kembali)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pengembalian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $kode_kembali Kode Kembali
     * @return Pengembalian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kode_kembali)
    {
        if (($model = Pengembalian::findOne(['kode_kembali' => $kode_kembali])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
