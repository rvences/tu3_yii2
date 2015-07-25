<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "rol".
 *
 * @property integer $id
 * @property string $rol_nombre
 * @property integer $rol_valor
 */
class Rol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%rol}}';
        //return 'rol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rol_nombre', 'rol_valor'], 'required'],
            [['rol_valor'], 'integer'], // No se usa para la interaccion con user
            [['rol_nombre'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rol_nombre' => 'Nombre del Rol', // Ex. Administrador
            'rol_valor' => 'Rol Valor', // ID del Rol Ex. 100
        ];
    }

    /**
     * Obtiene todos los usuarios en los que rol_id es igual a Rol (id)
     * Establece una relación entre Rol y User.
     * Se usa una relación hasMany porque un mismo Rol puede aplicar a varios usuarios.
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        // User (rol_id) => Rol (id)
        return $this->hasMany(User::className(), ['rol_id' => 'id']);
    }
}
