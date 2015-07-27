<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "personas".
 *
 * @property integer $idpersonas
 * @property integer $empresas_id
 * @property string $nombre
 * @property string $telefono
 * @property string $email
 * @property string $direccion
 * @property string $asistente
 * @property string $fecha_reunion
 *  @property string $cargo
 *
 * @property Empresas $empresas
 */
class Personas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['empresas_id', 'nombre'], 'required'],
            [['empresas_id'], 'integer'],
            [['fecha_reunion'], 'safe'],
            [['nombre'], 'string', 'max' => 100],
            [['telefono', 'email', 'direccion', 'asistente', 'cargo'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpersonas' => 'Idpersonas',
            'empresas_id' => 'Empresas ID',
            'nombre' => 'Nombre',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'cargo' => 'Puesto',
            'direccion' => 'Direccion',
            'asistente' => 'Asistente',
            'fecha_reunion' => 'Fecha Reunion',

            // Atributos del modelo Empresas
            'cuenta' => Yii::t('app', 'Cuenta'),
            'categoria' => Yii::t('app', 'Categoria'),
            'cabezaSector' => Yii::t('app','Sector'),
            'username' => Yii::t('app', 'Gerente'),
            'inversion2010' => Yii::t('app', 'Inversión 2010'),

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresas()
    {
        return $this->hasOne(Empresas::className(), ['idempresas' => 'empresas_id']);
    }

    /**
     * Se obtiene el nombre de la cuenta ligada a la persona de acuerdo a la Empresa
     * @return string
     */
    public function getCuenta()
    {
        return $this->empresas->cuenta;
    }

    /**
     * Se obtiene el nombre de la cuenta ligada a la persona de acuerdo a la Empresa
     * @return string
     */
    public function getCategoria()      { return $this->empresas->categoria; }
    public function getSubcuenta()      { return $this->empresas->subcuenta; }
    public function getCabezaSector()   { return $this->empresas->cabeza_sector; }
    public function getStatus()         { return $this->empresas->status; }

    public function getUsername()         { return $this->empresas->getGerente(); }

    public function getInversion2010() {return $this->empresas->getInversion2010(); }
}
