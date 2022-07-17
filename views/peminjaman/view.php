<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */

$this->title = $model->kode_pinjam;
$this->params['breadcrumbs'][] = ['label' => 'Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="peminjaman-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'kode_pinjam' => $model->kode_pinjam], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'kode_pinjam' => $model->kode_pinjam], [
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
            'kode_pinjam',
            'tgl_pinjam',
            'tgl_kembali',
            'kode_petugas',
            'kode_anggota',
            'kode_buku',
        ],
    ]) ?>

</div>
