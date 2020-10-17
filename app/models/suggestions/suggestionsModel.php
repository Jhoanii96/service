<?php

class suggestionModel extends Model
{
    
    public function fecha_habilitado($idUser){
        $query = "SELECT us.Mensaje_Habilitado as activo, us.Fecha_Habilitado as fecha FROM usuario us WHERE us.Nombre = '$idUser'";
        return Model::query_execute($query);
    }

    public function sendSuggestion($titulo,$descripcion,$idUser){
        $fecha = date('Y-m-d H:i:s');
        $query = "INSERT INTO sugerencia(Titulo,Fecha,Descripcion,Id_Usuario) VALUES('$titulo','$fecha','$descripcion',$idUser)";
        return Model::query_execute($query);
    }
}

