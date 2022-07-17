<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Petugas;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PetugasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Petugas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="petugas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Petugas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kode_petugas',
            'nama',
            'jk',
            'jabatan',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Petugas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'kode_petugas' => $model->kode_petugas]);
                 }
            ],
        ],
    ]); ?>


</div>
