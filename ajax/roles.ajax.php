<?php
require_once "../models/m_roles.php";
require_once "../controllers/c_roles.php";

class ajaxRoles{
    public static function a_get_roles(){
        $respuesta = c_Rol::c_get_roles();

        echo json_encode($respuesta);
    }

    public static function a_get_rol_by_nombre($nombre){
        $respuesta = c_Rol::c_get_rol_by_nombre($nombre);

        echo json_encode($respuesta);
    }
}

$ajax = ajaxRoles::a_get_roles();
//$rol_by_name = ajaxRoles::a_get_rol_by_nombre();

//$ajax;
?>