<?php

class loginModel extends Model
{
    
    public function load_user(string $idUsu){
        $query = "CALL `verificar_usuario`('" . $idUsu . "');";
        $res = Model::query_execute($query);
        return $res;
    }

    
}

