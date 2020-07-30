<?php

class patientModel extends Model{
 
  public function insertPatient($idUser,$dni,$nombre,$apellidoPa,$apellidoMa,$genero,$fechana,$celular,$correo,$procedencia,$ocupan,$ocupaac){
    $query = "INSERT INTO paciente(Documento,Nombre,Apellido_Paterno,Apellido_Materno,Genero,Fecha_Nacimiento,Celular,Email,Procedencia,Ocupacion_Anterior,Ocupacion_Actual,Id_Usuario) VALUES('$dni','$nombre','$apellidoPa','$apellidoMa','$genero','$fechana','$celular','$correo','$procedencia','$ocupan','$ocupaac',$idUser)";
    return Model::query_execute($query);
  } 

  public function getPatient($idPaciente){

    if($idPaciente != null){
      $query = "SELECT Documento,Nombre,Apellido_Paterno,Apellido_Materno FROM paciente WHERE Id_Paciente = $idPaciente";
    }else{
      $query = "SELECT Documento,Nombre,Apellido_Paterno,Apellido_Materno FROM paciente ORDER BY Id_Paciente DESC LIMIT 1";
    }

    return Model::query_execute($query);
  }

  public function searchDocumentPatient($documento){
    $query = "SELECT Id_Paciente,Documento,Nombre,Apellido_Paterno,Apellido_Materno,Genero,Celular,Email,Procedencia,Ocupacion_Anterior,Ocupacion_Actual,Fecha_Nacimiento FROM paciente WHERE Documento = '$documento'";
    return Model::query_execute($query);
  }

  public function getIDPatient(){
    $query = "SELECT Id_Paciente,Documento,Nombre,Apellido_Paterno,Apellido_Materno FROM paciente ORDER BY Id_Paciente DESC LIMIT 1";
    return Model::query_execute($query);
  }
}

?>