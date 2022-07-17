<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PengembalianSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengembalian-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kode_kembali') ?>

    <?= $form->field($model, 'tanggal_kembali') ?>

    <?= $form->field($model, 'kode_petugas') ?>

    <?= $form->field($model, 'kode_anggota') ?>

    <?= $form->field($model, 'kode_buku') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
