<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\PersonasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas - TODAS - FORMATO DE IP';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-index">
    <p><strong>Comentarios:</strong></p>
    <ul>
        <li>Debe existir el nombre del cliente para mostrar el resto de la informacion</li>
        <li>¿En que campos se requiere habilitar el filtrado o cuales se omiten ? ej. "Puesto"</li>
        <li>¿En que campos se agrega la opción de ordenamiento ascendente o descendente ej. "Cuenta"</li>
        <li>NO se edita directamente por los siguientes motivos:
            <ol>
                <li>Se alentaría el servidor y se congelaría el navegador a cada rato por lo que se pasa a una pantalla única para edición de toda la información</li>
            </ol>

    </ul>
    <p><strong>Dudas en la nueva implementación</strong></p>
    <ul>
        <li>¿Una cuenta tiene muchas personas o una persona tiene muchas cuentas?</li>
        <li>¿Cuantos registros se muestran a la vez; mientras más sean, más lentro será la visualización del documento</li>
        <li>¿Van a existir campos que sean de selección (es decir catálogos) a parte del de status o en todos siempre se van a escribir textos?</li>
    </ul>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Personas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  $arreglo = array("uno", "dos", "tres");?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            //Empresas
            'status',
            'cuenta',
            'categoria',
            'subcuenta',
            'cabezaSector', // Metodo Get de Personas

            //'idpersonas',
            //'empresas_id',
            'cargo',
            'nombre',
            'telefono',
            'email:email',
            'direccion',
            // 'asistente',

            ['attribute' => 'fecha_reunion',
                'label' => 'Fecha Reunión',
                'format' =>  ['date', 'php:d-M-Y'],
                // 'format' => ['decimal',2]
                //'filter'=>array("1"=>"Active","2"=>"Inactive"),
            ],

            'inversion2010',
/*
            array(
                foreach ($arreglo as $valor) {}

            ),
*/





            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
