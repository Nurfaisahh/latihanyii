<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Peminjaman;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PeminjamanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Peminjaman';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Peminjaman', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kode_pinjam',
            'tgl_pinjam',
            'tgl_kembali',
            'kode_petugas',
            'kode_anggota',
            'petugas.nama',
            'kode_buku',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Peminjaman $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'kode_pinjam' => $model->kode_pinjam]);
                 }
            ],
        ],
    ]); ?>


</div>
