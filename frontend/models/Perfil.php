<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\User;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\db\Expression;

/**
 * This is the model class for table "perfil".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $nombre
 * @property string $apellido
 * @property string $fecha_nacimiento
 * @property string $puesto_usuario
 * @property string $created_at
 * @property string $updated_at
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%perfil}}';
        //return 'perfil';
    }

    /**
     * behaviors
     */

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'nombre', 'apellido', 'fecha_nacimiento', 'puesto_usuario', 'created_at', 'updated_at'], 'required'],
            [['user_id'], 'integer'],
            [['fecha_nacimiento', 'created_at', 'updated_at'], 'safe'],
            //[['fecha_nacimiento'], 'date', 'format'=>'Y-m-d'],
            [['fecha_nacimiento'], 'date', 'format'=>'yyyy-M-d'],
            [['nombre', 'apellido', 'puesto_usuario'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'puesto_usuario' => 'Puesto Usuario',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @get Username
     */
    public function getUsername()
    {
        return $this->user->username;
    }
    /**
     * @getUserId
     */
    public function getUserId()
    {
        return $this->user ? $this->user->id : 'none';
    }

    /**
     * Crea un enlace a la vista del usuario
     * @return string
     */
    public function getUserLink()
    {
        $url = Url::to(['user/view', 'id'=>$this->UserId]);
        $opciones = [];
        return Html::a($this->getUserName(), $url, $opciones);
    }
    /**
     * @getProfileLink
     */

    public function getPerfilIdLink()
    {
        $url = Url::to(['perfil/update', 'id'=>$this->id]);
        $opciones = [];
        return Html::a($this->id, $url, $opciones);
    }
}
