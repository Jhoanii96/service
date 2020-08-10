<?php

class consultationModel extends Model
{
    
    
    public function lista_citas_paciente($fecha, $admin)
    {
        $query = "CALL `mostrar_citas_consulta`('" . $fecha . "', '" . $admin . "');";
        $res = Model::query_execute($query);
        return $res;
    }

    public function lista_historia_clinica($paciente, $admin)
    {
        $query = "select * from `v_lista_historia_clinica` where id_paciente=$paciente and username='$admin';";
        $res = Model::query_execute($query);
        return $res;
    }


}

