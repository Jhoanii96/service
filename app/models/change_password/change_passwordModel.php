<?php

class change_passwordModel extends Model
{

    /* ----------------------------- CONSULTAS DE CHANGE PASSWORD ----------------------------- */


    public function load_user($idUsu){
        $query = "select us.Nombre, us.Password, us.Fecha_Habilitado from usuario us where us.Nombre = '" . $idUsu . "';";
        $res = Model::query_execute($query);
        return $res;
    }
    
    public function mostrar_perfil($codPerfil)
    {
        $query = "CALL mostrar_perfil('$codPerfil');";
        $res = Model::query_execute($query);
        return $res;
    }

    public function ActualizarPassword($user, $newpass)
    {
        $query = "CALL actualizar_password('$user','$newpass');";
        $res = Model::query_execute($query);
        return $res;
    }

    
    
    public function fecha_habilitado($idUser)
    {
        $query = "SELECT us.Mensaje_Habilitado as activo, us.Fecha_Habilitado as fecha FROM usuario us WHERE us.Nombre = '$idUser'";
        return Model::query_execute($query);
    }
}
