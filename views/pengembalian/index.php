<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Pengembalian;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PengembalianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengembalians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengembalian-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pengembalian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kode_kembali',
            'tanggal_kembali',
            'kode_petugas',
            'kode_anggota',
            'kode_buku',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pengembalian $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'kode_kembali' => $model->kode_kembali]);
                 }
            ],
        ],
    ]); ?>


</div>
