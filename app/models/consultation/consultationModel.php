<?php

class consultationModel extends Model
{
    
    
    public function lista_citas_paciente($dni, $admin)
    {
        $query = "CALL `mostrar_citas_consulta`('" . $dni . "', '" . $admin . "');";
        $res = Model::query_execute($query);
        return $res;
    }


}

