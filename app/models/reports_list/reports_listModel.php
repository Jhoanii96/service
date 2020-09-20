<?php

class reports_listModel extends Model
{
    
    public function lista_historia_clinica($admin){
        $query = "select * from `v_lista_historia_clinica` where username='$admin' order by fecha_consulta desc;";
        $res = Model::query_execute($query);
        return $res;
    }

    public function buscar_citas($search, $filter, $admin)
    {
        if ($filter == "1") {
            $search = str_replace(" ", "", $search); 
            $dates = explode("-", $search);
            
            $dates[0] = str_replace("/", "-", $dates[0]); 
            $dates[0] = date('Y-m-d', strtotime($dates[0]));
            $dates[1] = str_replace("/", "-", $dates[1]); 
            $dates[1] = date('Y-m-d', strtotime($dates[1]));
            $query = "SELECT * FROM `v_lista_historia_clinica` WHERE 
                username='$admin' AND 
                fecha_consulta BETWEEN CAST('$dates[0] 00:00:00' AS DATETIME) AND CAST('$dates[1] 23:59:59' AS DATETIME) 
                order by fecha_consulta desc;";
            $res = Model::query_execute($query);
            return $res;
        }
        if ($filter == "2") {
            $ages = explode("-", $search);
            $query = "SELECT * FROM `v_lista_historia_clinica` WHERE 
                username='$admin' AND 
                (age BETWEEN $ages[0] AND $ages[1]) order by fecha_consulta desc;";
            $res = Model::query_execute($query);
            return $res;
        }
        if ($filter == "3") {
            $query = "select * from `v_lista_historia_clinica` where username='$admin' order by fecha_consulta desc;";
            $res = Model::query_execute($query);
            return $res;
        }
    }
}

