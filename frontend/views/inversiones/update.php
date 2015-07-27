<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Inversiones */

$this->title = 'Update Inversiones: ' . ' ' . $model->idinversion;
$this->params['breadcrumbs'][] = ['label' => 'Inversiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idinversion, 'url' => ['view', 'id' => $model->idinversion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inversiones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
