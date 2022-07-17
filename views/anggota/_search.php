<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AnggotaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anggota-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kode_anggota') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'jk') ?>

    <?= $form->field($model, 'jurusan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
