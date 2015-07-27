<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Empresas */

$this->title = 'Update Empresas: ' . ' ' . $model->idempresas;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idempresas, 'url' => ['view', 'id' => $model->idempresas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="empresas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
