<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Petugas */

$this->title = $model->kode_petugas;
$this->params['breadcrumbs'][] = ['label' => 'Petugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="petugas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'kode_petugas' => $model->kode_petugas], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'kode_petugas' => $model->kode_petugas], [
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
            'kode_petugas',
            'nama',
            'jk',
            'jabatan',
        ],
    ]) ?>

</div>
