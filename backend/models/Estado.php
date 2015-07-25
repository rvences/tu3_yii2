<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "estado".
 *
 * @property integer $id
 * @property string $estado_nombre
 * @property integer $estado_valor
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%estado}}';
        //return 'estado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado_nombre', 'estado_valor'], 'required'],
            [['estado_valor'], 'integer'],
            [['estado_nombre'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'estado_nombre' => 'Nombre del Estado', // Ex. estado_nombre = 'Activo'
            'estado_valor' => 'Valor del Estado', // Ex. estado_valor = '10'
        ];
    }

    /**
     * Establece una relación entre Estado y User.
     * Se usa una relación hasMany porque un mismo estado puede aplicar a varios usuarios.
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['estado_id' => 'id']);
    }
}
