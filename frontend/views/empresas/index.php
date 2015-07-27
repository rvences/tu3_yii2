<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\EmpresasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Empresas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idempresas',
            'user_id',
            'status',
            'tipo_cliente_id',
            'cabeza_sector',
            // 'cuenta',
            // 'siglas',
            // 'nat_juridica',
            // 'categoria',
            // 'subcuenta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
