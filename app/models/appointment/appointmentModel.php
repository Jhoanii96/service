<?php

class appointmentModel extends Model
{

    public function mostrar_citas($admin)
    {
        $query = "CALL `mostrar_lista_citas`('', '0', '" . $admin . "');";
        $res = Model::query_execute($query);
        return $res;
    }

    public function mostrar_paciente($nom_user)
    {

        $query = "select v.id, concat(v.nombre, ' ', v.apellidos) as nombres from v_paciente v where concat(v.nombre, ' ', v.apellidos) like concat('%', '$nom_user', '%')";
        $res = Model::query_execute($query);
        return $res;
        
    }

    public function buscar_citas($search, $filter, $admin)
    {
        $query = "CALL `mostrar_lista_citas`('" . $search . "', '" . $filter . "', '" . $admin . "');";
        $res = Model::query_execute($query);
        return $res;
    }

}
