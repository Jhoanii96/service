<?php

class appointmentModel extends Model
{

    public function mostrar_citas($admin)
    {
        $query = "CALL `mostrar_citas`('" . $admin . "');";
        $res = Model::query_execute($query);
        return $res;
    }
}
