<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\InversionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inversiones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idinversion') ?>

    <?= $form->field($model, 'empresas_id') ?>

    <?= $form->field($model, 'anio') ?>

    <?= $form->field($model, 'inversion') ?>

    <?= $form->field($model, 'monto_propuesta') ?>

    <?php // echo $form->field($model, 'fecha_campana') ?>

    <?php // echo $form->field($model, 'productos_interes') ?>

    <?php // echo $form->field($model, 'comentarios') ?>

    <?php // echo $form->field($model, 'propuesta') ?>

    <?php // echo $form->field($model, 'campana') ?>

    <?php // echo $form->field($model, 'temporalidad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
