<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Buku;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BukuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bukus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Buku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kode_buku',
            'judul',
            'penulis',
            'penerbit',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Buku $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'kode_buku' => $model->kode_buku]);
                 }
            ],
        ],
    ]); ?>


</div>
