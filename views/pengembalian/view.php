<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pengembalian */

$this->title = $model->kode_kembali;
$this->params['breadcrumbs'][] = ['label' => 'Pengembalians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pengembalian-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'kode_kembali' => $model->kode_kembali], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'kode_kembali' => $model->kode_kembali], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kode_kembali',
            'tanggal_kembali',
            'kode_petugas',
            'kode_anggota',
            'kode_buku',
        ],
    ]) ?>

</div>
