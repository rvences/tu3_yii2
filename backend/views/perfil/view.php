<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\PermisosHelpers;

/* @var $this yii\web\View */
/* @var $model frontend\models\Perfil */

$this->title = $model->user->username;
$mostrar_esta_nav = PermisosHelpers::requerirMinimoRol('Super Administrador');


$this->params['breadcrumbs'][] = ['label' => 'Perfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-view">

    <h1>Perfil de <?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (!Yii::$app->user->isGuest && $mostrar_esta_nav) {
            echo Html::a('Actualizar', ['update', 'id' => $model->id],
                ['class' => 'btn btn-primary']);}?>


        <?php if (!Yii::$app->user->isGuest && $mostrar_esta_nav) {
            echo Html::a('Borrar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Seguro de que lo quiere eliminar?'),
                    'method' => 'post',
                ],
            ]);}?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute'=>'userLink', 'format'=>'raw'],
            'id',
            'user_id',
            'nombre',
            'apellido',
            'fecha_nacimiento',
            'puesto_usuario',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
