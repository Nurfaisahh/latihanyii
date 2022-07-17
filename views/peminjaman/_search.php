<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PeminjamanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peminjaman-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kode_pinjam') ?>

    <?= $form->field($model, 'tgl_pinjam') ?>

    <?= $form->field($model, 'tgl_kembali') ?>

    <?= $form->field($model, 'kode_petugas') ?>

    <?= $form->field($model, 'kode_anggota') ?>

    <?php // echo $form->field($model, 'kode_buku') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
