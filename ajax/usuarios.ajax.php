<?php
require_once "../models/m_usuarios.php";
require_once "../controllers/c_usuarios.php";

class ajaxUsuarios{
    public function a_get_usuarios(){
        $respuesta = c_Usuario::c_get_usuarios();

        echo json_encode($respuesta);
    }

    /*public function a_get_usuario_by_nombre(){
        if (isset($_POST['search'])) {
            $nombre = $_POST['q'];
            $respuesta = c_Usuario::c_get_usuario_by_nombre($nombre);

            echo json_encode($respuesta);
        }
    }*/
}

$ajax = new ajaxUsuarios();
$ajax->a_get_usuarios();

?>