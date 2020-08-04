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

  public function searchDocumentPatient($filter,$state){
    if($state){
      $query = "SELECT Id_Paciente,Documento,Nombre,Apellido_Paterno,Apellido_Materno,Genero,Celular,Email,Procedencia,Ocupacion_Anterior,Ocupacion_Actual,Fecha_Nacimiento FROM paciente WHERE Documento = '$filter'";
    }else{
      $query = "SELECT Id_Paciente,Documento,Nombre,Apellido_Paterno,Apellido_Materno,Genero,Celular,Email,Procedencia,Ocupacion_Anterior,Ocupacion_Actual,Fecha_Nacimiento FROM paciente WHERE concat(Nombre,' ',concat(Apellido_Paterno,' ',Apellido_Materno)) like '%$filter%'";
    }
    return Model::query_execute($query);
  }

  public function getAllPatient($busqueda){
    $query = "SELECT id,concat(nombre, ' ', apellidos) AS nombres FROM v_paciente WHERE concat(nombre,' ',apellidos) LIKE '%$busqueda%' LIMIT 10";
    return Model::query_execute($query);
  }

  public function getIDPatient(){
    $query = "SELECT Id_Paciente,Documento,Nombre,Apellido_Paterno,Apellido_Materno FROM paciente ORDER BY Id_Paciente DESC LIMIT 1";
    return Model::query_execute($query);
  }

  public function updatePatient($idUser,$idPaciente,$dni,$nombre,$apellidoPa,$apellidoMa,$genero,$fechana,$celular,$correo,$procedencia,$ocupan,$ocupaac){
    $query = "UPDATE paciente SET Documento = '$dni',Nombre = '$nombre',Apellido_Paterno = '$apellidoPa', Apellido_Materno = '$apellidoMa',Genero = '$genero',Fecha_Nacimiento = '$fechana',Celular = '$celular',Email = '$correo',Procedencia = '$procedencia',Ocupacion_Anterior = '$ocupan', Ocupacion_Actual = '$ocupaac',Id_Usuario = $idUser WHERE Id_Paciente = $idPaciente";
    return Model::query_execute($query);
  }
}

?>