<?php
namespace common\models;
use yii;
use backend\models\Rol;
use backend\models\Estado;
//use common\models\User;

/**
 * Class ValorHelpers
 * @package common\models
 */
class ValorHelpers
{
    /**
     * Indica si el nombre del Rol
     * @param $rol_nombre
     * @return bool
     */
    public static function rolCoincide($rol_nombre)
    {
        $userTieneRolNombre = Yii::$app->user->identity->rol->rol_nombre;
        return $userTieneRolNombre == $rol_nombre ? true : false;
    }

    /**
     * Devuelve el Valor del Rol del usuario ex. 100 para Administrador
     * @param null $userId
     * @return bool
     */
    public static function getUsersRolValor($userId=null)
    {
        if ($userId == null){
            // Obteniendo el valor del rol del usuario logueado
            $usersRolValor = Yii::$app->user->identity->rol->rol_valor;
            return isset($usersRolValor) ? $usersRolValor : false;
        } else {
            $user = User::findOne($userId);
            $usersRolValor = $user->rol->rol_valor;
            return isset($usersRolValor) ? $usersRolValor : false;
        }
    }

    /**
     * Obtiene el rol_id de acuerdo al nombre del rol
     * @param $rol_nombre
     * @return bool|mixed
     */
    public static function getRolValor($rol_nombre)
    {

        $rol = Rol::find('rol_valor')
            ->where(['rol_nombre' => $rol_nombre])
            ->one();
        //print_r($rol);exit;
        return isset($rol->rol_valor) ? $rol->rol_valor : false;
    }

    /**
     * Verifica que el Rol exista en la BD y devuelve true si existe.
     * @param $rol_nombre
     * @return bool
     */
    public static function esRolNombreValido($rol_nombre)
    {
        $rol = Rol::find('rol_nombre')
            ->where(['rol_nombre' => $rol_nombre])
            ->one();
        return isset($rol->rol_nombre) ? true : false;
    }

    public static function estadoCoincide($estado_nombre)
    {
        $userTieneEstadoName = Yii::$app->user->identity->estado->estado_nombre;
        return $userTieneEstadoName == $estado_nombre ? true : false;
    }
    public static function getEstadoId($estado_nombre)
    {
        $estado = Estado::find('id')
            ->where(['estado_nombre' => $estado_nombre])
            ->one();
        return isset($estado->id) ? $estado->id : false;
    }

}