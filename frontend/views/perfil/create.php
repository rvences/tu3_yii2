<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Perfil */

$this->title = 'Cambiar datos de usuario';
$this->params['breadcrumbs'][] = ['label' => 'Perfil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
