<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pengembalian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengembalian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_kembali')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_kembali')->textInput() ?>

    <?= $form->field($model, 'kode_petugas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_anggota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_buku')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
