<?php

class myModel extends Model
{
    
    public function lista_historia_clinica($admin){
        $query = "select * from `v_lista_historia_clinica` where username='$admin';";
        $res = Model::query_execute($query);
        return $res;
    }
}

