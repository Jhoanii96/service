<?php

class helpModel extends Model
{
    public function fecha_habilitado($idUser){
        $query = "SELECT us.Mensaje_Habilitado as activo, us.Fecha_Habilitado as fecha FROM usuario us WHERE us.Nombre = '$idUser'";
        return Model::query_execute($query);
    }

    public function sendHelp($titulo,$descripcion,$idUser,$imgBd){
        $fecha = date('Y-m-d H:i:s');
        if($imgBd){
            $query = "INSERT INTO ayuda(Titulo,Descripcion,Fecha,Arch_Enlace,Id_USUARIO) VALUES('$titulo','$descripcion','$fecha','$imgBd',$idUser)";
        }else{
            $query = "INSERT INTO ayuda(Titulo,Descripcion,Fecha,Id_USUARIO) VALUES('$titulo','$descripcion','$fecha',$idUser)";
        }
        return Model::query_execute($query);
    }
}

