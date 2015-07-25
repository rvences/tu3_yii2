<?php
namespace common\models;

use yii;

class RegistrosHelpers
{
    /**
     * Verifica si el usuario cuando con algún registro dentro del modelo
     * @param $modelo_nombre
     * @return bool
     */
    public static function userTiene($modelo_nombre)
    {
        $conexion = \Yii::$app->db;
        $userid = Yii::$app->user->identity->id;
        $sql = "SELECT id FROM $modelo_nombre WHERE user_id=:userid";
        $comando = $conexion->createCommand($sql);
        $comando->bindValue(":userid", $userid);
        $resultado = $comando->queryOne();
        if ($resultado == null) {
            return false;
        } else {
            return $resultado['id'];
        }
    }
}