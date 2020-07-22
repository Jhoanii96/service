<?php

class patientModel extends Model{
 
  public function insertPatient($idUser,$dni,$nombre,$apellidoPa,$apellidoMa,$genero,$fechana,$celular,$correo,$procedencia,$ocupan,$ocupaac){
    $query = "INSERT INTO paciente(Documento,Nombre,Apellido_Paterno,Apellido_Materno,Genero,Fecha_Nacimiento,Celular,Email,Procedencia,Ocupacion_Anterior,Ocupacion_Actual,Id_Usuario) VALUES('$dni','$nombre','$apellidoPa','$apellidoMa','$genero','$fechana','$celular','$correo','$procedencia','$ocupan','$ocupaac',$idUser)";
    return $res = Model::query_execute($query);
  } 
}

?>