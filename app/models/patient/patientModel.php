<?php

class patient extends Model{
 
  public function insertPatient($dni,$nombre,$apellidoPa,$apellidoMa,$genero,$fechana,$celular,$correo,$procedencia,$ocupan,$ocupaac){
    $query = "INSERT INTO paciente(Documento,Nombre,Apellido_Paterno,Apellido_Materno,Genero,Fecha_Nacimiento,Celular,Email,Procedencia,Ocupacion_Anterior,Ocupacion_Actual) VALUES('$dni','$nombre','$apellidoPa','$apellidoMa','$genero','$fechana','$celular','$correo','$procedencia','$ocupan','$ocupaac')";
    Model::query_execute($query);
  } 
}

?>