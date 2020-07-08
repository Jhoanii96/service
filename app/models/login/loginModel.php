<?php

class loginModel extends Model
{
    
    public function load_user($idUsu){
        $query = "select us.Nombre, us.Password from Usuario us where us.Nombre = '" . $idUsu . "';";
        $res = Model::query_execute($query);
        return $res;
    }
}

