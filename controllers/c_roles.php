<?php
require_once '../models/m_roles.php';

class c_Rol{
    public static function c_get_roles(){
        $respuesta = m_Rol::m_get_roles();
        return($respuesta);
    }

    public static function c_get_rol_by_nombre($nombre){
        $respuesta = m_Rol::m_get_rol_by_nombre($nombre);
        return $respuesta;
    }
}
?>