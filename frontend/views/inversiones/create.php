<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Inversiones */

$this->title = 'Create Inversiones';
$this->params['breadcrumbs'][] = ['label' => 'Inversiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inversiones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
