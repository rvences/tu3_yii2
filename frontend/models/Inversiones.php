<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "inversiones".
 *
 * @property integer $idinversion
 * @property integer $empresas_id
 * @property string $anio
 * @property string $inversion
 * @property string $monto_propuesta
 * @property string $fecha_campana
 * @property string $productos_interes
 * @property string $comentarios
 * @property string $propuesta
 * @property string $campana
 * @property string $temporalidad
 *
 * @property Empresas $empresas
 */
class Inversiones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inversiones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['empresas_id'], 'integer'],
            [['anio', 'fecha_campana'], 'safe'],
            [['inversion'], 'number'],
            [['monto_propuesta', 'campana'], 'string', 'max' => 45],
            [['productos_interes', 'comentarios', 'propuesta', 'temporalidad'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idinversion' => 'Idinversion',
            'empresas_id' => 'Empresas ID',
            'anio' => 'Anio',
            'inversion' => 'Inversion',
            'monto_propuesta' => 'Monto Propuesta',
            'fecha_campana' => 'Fecha Campana',
            'productos_interes' => 'Productos Interes',
            'comentarios' => 'Comentarios',
            'propuesta' => 'Propuesta',
            'campana' => 'Campana',
            'temporalidad' => 'Temporalidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresas()
    {
        return $this->hasOne(Empresas::className(), ['idempresas' => 'empresas_id']);
    }
}
