<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Buku */

$this->title = $model->kode_buku;
$this->params['breadcrumbs'][] = ['label' => 'Bukus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="buku-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'kode_buku' => $model->kode_buku], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'kode_buku' => $model->kode_buku], [
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
            'kode_buku',
            'judul',
            'penulis',
            'penerbit',
        ],
    ]) ?>

</div>
