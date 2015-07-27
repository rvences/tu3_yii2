<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Inversiones */

$this->title = $model->idinversion;
$this->params['breadcrumbs'][] = ['label' => 'Inversiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inversiones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idinversion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idinversion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idinversion',
            'empresas_id',
            'anio',
            'inversion',
            'monto_propuesta',
            'fecha_campana',
            'productos_interes',
            'comentarios',
            'propuesta',
            'campana',
            'temporalidad',
        ],
    ]) ?>

</div>
