<?php

class myModel extends Model
{
    
    public function lista_historia_clinica($admin){
        $query = "select * from `v_lista_historia_clinica` where username='$admin' order by fecha_consulta desc;";
        $res = Model::query_execute($query);
        return $res;
    }

    public function obtener_details($historial, $admin)
    {
        $query = "CALL `mostrar_detalle_historial`(" . $historial . ", '" . $admin . "');";
        $res = Model::query_execute($query);
        return $res;
    }

    public function notifications($idUser){
        $query = "SELECT me.Titulo,me.Descripcion FROM mensaje_usuario meu INNER JOIN mensaje me ON meu.Id_Mensaje = me.Id_Mensaje WHERE meu.Id_Usuario = $idUser";
        return Model::query_execute($query);
    }
}

