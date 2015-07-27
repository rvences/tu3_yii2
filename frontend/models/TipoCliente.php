<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tipo_cliente".
 *
 * @property integer $id
 * @property string $tipo_cliente
 *
 * @property Empresas[] $empresas
 */
class TipoCliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_cliente'], 'required'],
            [['tipo_cliente'], 'string', 'max' => 255],
            [['tipo_cliente'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_cliente' => 'Tipo Cliente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresas()
    {
        return $this->hasMany(Empresas::className(), ['tipo_cliente_id' => 'id']);
    }
}
