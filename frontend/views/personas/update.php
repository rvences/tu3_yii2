<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Personas */

$this->title = 'Update Personas: ' . ' ' . $model->idpersonas;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpersonas, 'url' => ['view', 'id' => $model->idpersonas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
