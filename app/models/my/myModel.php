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
        $query = "SELECT meu.Id_Mensaje_Usuario as id,me.Titulo,me.Descripcion,meu.Leido FROM mensaje_usuario meu INNER JOIN mensaje me ON meu.Id_Mensaje = me.Id_Mensaje WHERE meu.Id_Usuario = $idUser";
        return Model::query_execute($query);
    }

    public function updateStateAllNotifications($id){
        $cont = 0;
        $fecha = date("Y-m-d H:i:s");
        if($id !== null){
            for ($i=0; $i < count($id) ; $i++) { 
                $query = "UPDATE mensaje_usuario SET Leido = 1,Fecha = '$fecha' WHERE Id_Mensaje_Usuario = $id[$i]";
                $cant = Model::query_execute($query);
                $cant = $cant->rowCount();
                $cont += $cant;
            }
        }
        return $cont;
    }

    public function fecha_habilitado($idUser){
        $query = "SELECT us.Mensaje_Habilitado as activo, us.Fecha_Habilitado as fecha FROM usuario us WHERE us.Nombre = '$idUser'";
        return Model::query_execute($query);
    }
}

