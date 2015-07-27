<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\PersonasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idpersonas') ?>

    <?= $form->field($model, 'empresas_id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'telefono') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'asistente') ?>

    <?php // echo $form->field($model, 'fecha_reunion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
