<?php

class loginModel extends Model
{
    
    public function load_user($idUsu){
        $query = "select us.Nombre, us.Password from usuario us where us.Nombre = '" . $idUsu . "';";
        $res = Model::query_execute($query);
        return $res;
    }
}

