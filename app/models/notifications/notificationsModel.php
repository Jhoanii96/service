<?php

class notificationModel extends Model{
 
  public function showNotifications($idUser){
    $query = "SELECT meu.Id_Mensaje_Usuario as Id,me.Titulo,me.Descripcion,meu.Leido,meu.Fecha FROM mensaje_usuario meu INNER JOIN mensaje me ON meu.Id_Mensaje = me.Id_Mensaje WHERE meu.Id_Usuario = $idUser ORDER BY meu.Fecha desc";
    return Model::query_execute($query);
  }

  public function updateStateNotification($idMensaje,$estado){
    if($estado === true){
      $query = "UPDATE mensaje_usuario SET Leido = 1 WHERE Id_Mensaje_Usuario = $idMensaje";
    }else{
      $query = "UPDATE mensaje_usuario SET Leido = 0 WHERE Id_Mensaje_Usuario = $idMensaje";
    }
    return Model::query_execute($query);
  }
  public function fecha_habilitado($idUser)
  {
    $query = "SELECT us.Mensaje_Habilitado as activo, us.Fecha_Habilitado as fecha FROM usuario us WHERE us.Nombre = '$idUser'";
    return Model::query_execute($query);
  }
}
