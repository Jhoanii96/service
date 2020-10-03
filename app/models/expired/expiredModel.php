<?php

class expiredModel extends Model
{
    
    public function data_user($idUsu){
        $query = "select us.Nombre, us.Password, us.Fecha_Habilitado from usuario us where us.Nombre = '" . $idUsu . "';";
        $res = Model::query_execute($query);
        return $res;
    }
}

