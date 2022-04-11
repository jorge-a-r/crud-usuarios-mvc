<?php
require_once 'modelo.php';

class m_Rol{
    public $rol_id;
    public $nombre_rol;

    public static function m_get_roles(){
        $query = Modelo::conectar()->prepare(
            "SELECT * FROM roles WHERE 1"
        );

        $query -> execute();

        return $query -> fetchAll();

        $query = NULL;
    }

    public static function m_get_rol_by_nombre($nombre){
        $query = Modelo::conectar()->prepare(
            "SELECT * FROM roles WHERE nombre_rol LIKE '" . $nombre . "%'"
        );

        $query->execute();

        return $query->fetchAll();

        $query = NULL;
    }
}

?>