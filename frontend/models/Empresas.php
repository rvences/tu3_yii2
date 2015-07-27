<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "empresas".
 *
 * @property integer $idempresas
 * @property integer $user_id
 * @property string $status
 * @property integer $tipo_cliente_id
 * @property string $cabeza_sector
 * @property string $cuenta
 * @property string $siglas
 * @property string $nat_juridica
 * @property string $categoria
 * @property string $subcuenta
 *
 * @property TipoCliente $tipoCliente
 * @property User $user
 * @property Inversiones[] $inversiones
 * @property Personas[] $personas
 */
class Empresas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'tipo_cliente_id', 'cabeza_sector', 'cuenta'], 'required'],
            [['user_id', 'tipo_cliente_id'], 'integer'],
            [['status', 'siglas', 'nat_juridica', 'categoria', 'subcuenta'], 'string', 'max' => 45],
            [['cabeza_sector'], 'string', 'max' => 100],
            [['cuenta'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idempresas' => 'Idempresas',
            'user_id' => 'User ID',
            'status' => 'Status',
            'tipo_cliente_id' => 'Tipo Cliente ID',
            'cabeza_sector' => 'Cabeza Sector',
            'cuenta' => 'Cuenta',
            'siglas' => 'Siglas',
            'nat_juridica' => 'Nat Juridica',
            'categoria' => 'Categoria',
            'subcuenta' => 'Subcuenta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoCliente()
    {
        return $this->hasOne(TipoCliente::className(), ['id' => 'tipo_cliente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInversiones()
    {
        return $this->hasMany(Inversiones::className(), ['empresas_id' => 'idempresas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Personas::className(), ['empresas_id' => 'idempresas']);
    }

    public function getGerente()
    {
        return $this->user->username;
    }

    public function getInversion2010() {
        $inversiones ='';
        foreach ($this->inversiones as $totales) {
            $inversiones .= $totales->anio  . ' ' . $totales->inversion . '</br>';
        }
        return $inversiones;
      //  if ($this->inversiones->anio == '2010') {  return "hola" ;}

    }


}
