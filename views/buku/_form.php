<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Buku */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="buku-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_buku')->textInput() ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'penulis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'penerbit')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
