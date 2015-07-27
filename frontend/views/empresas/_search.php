<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\EmpresasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idempresas') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'tipo_cliente_id') ?>

    <?= $form->field($model, 'cabeza_sector') ?>

    <?php // echo $form->field($model, 'cuenta') ?>

    <?php // echo $form->field($model, 'siglas') ?>

    <?php // echo $form->field($model, 'nat_juridica') ?>

    <?php // echo $form->field($model, 'categoria') ?>

    <?php // echo $form->field($model, 'subcuenta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
