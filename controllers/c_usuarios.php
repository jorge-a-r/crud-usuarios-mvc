<?php
require_once '../models/m_usuarios.php';

class c_Usuario{
    //Atributos
    private $id_user;
    private $nombre;
    private $email;
    private $username;
    private $user_password;
    private $rol_id;

    //Setters
    public function set_id_user($id){
        $this->user_id = $id;
    }

    public function set_nombre($nombre){
        $this->nombre = $nombre;
    }

    public function set_email($email){
        $this->email = $email;
    }

    public function set_username($uname){
        $this->username = $uname;
    }

    public function set_user_password($user_pwd){
        $this->user_password = $user_pwd;
    }

    public function set_rol_id($id_rol){
        $this->rol_id = $id_rol;
    }

    //Getters
    public function get_user_id(){
        return $this->user_id;
    }
    public function get_nombre(){
        return $this->nombre;
    }
    public function get_email(){
        return $this->email;
    }
    public function get_username(){
        return $this->username;
    }
    public function get_user_password(){
        return $this->user_password;
    }
    public function get_rol_id(){
        return $this->rol_id;
    }

    //Métodos
    public static function c_get_usuarios(){
        $respuesta = m_Usuario::m_get_usuarios();
        return $respuesta;
    }

    public static function c_get_usuario_by_nombre($nombre){
        $respuesta = m_Usuario::m_get_usuario_by_nombre($nombre);
        return $respuesta;
    }
}
?>