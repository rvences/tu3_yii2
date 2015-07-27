<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Inversiones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inversiones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'empresas_id')->textInput() ?>

    <?= $form->field($model, 'anio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inversion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'monto_propuesta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_campana')->textInput() ?>

    <?= $form->field($model, 'productos_interes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comentarios')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'propuesta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'campana')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'temporalidad')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
