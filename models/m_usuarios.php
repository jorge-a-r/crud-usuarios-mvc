<?php
require_once 'modelo.php';

class m_Usuario{
    //Obtener todos los registros de la tabla usuario
    public static function m_get_usuarios(){
        $query = Modelo::conectar()->prepare(
            "SELECT id_user, nombre, email, username, nombre_rol, 'X' as Acciones FROM usuarios INNER JOIN roles WHERE usuarios.rol_id = roles.rol_id"
        );

        $query -> execute();

        return $query -> fetchAll();

        $query = NULL;
    }

    //Obtener los usuarios cuyo nombre coincidan con el ingresado por el usuario
    public static function m_get_usuario_by_nombre($nombre){
        $query = Modelo::conectar()->prepare(
            "SELECT * FROM usuarios WHERE nombre LIKE '" . $nombre . "%'"
        );

        $query->execute();

        return $query->fetchAll();

        $query = NULL;
    }
}

?>