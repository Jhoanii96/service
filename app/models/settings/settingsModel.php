<?php

class settingsModel extends Model
{

  //Muestra cualquier tabla 
  public function insertAnamnesisPred($idUser, $anamnesis, $exam_fisico, $examenes, $diagnostico, $tratamiento)
  {
    $query = "INSERT INTO historia_clinica_predeterminado(Id_Usuario,Anamnesis_Pred,Examenes_Pred,Examen_Fisico_Pred,Diagnostico_Pred,Tratamiento_Pred) VALUES($idUser,'$anamnesis','$examenes','$exam_fisico','$diagnostico','$tratamiento')";
    return Model::query_execute($query);
  }

  public function updateHistoryPred($idUser, $anamnesis, $exam_fisico, $examenes, $diagnostico, $tratamiento)
  {
    $query = "UPDATE historia_clinica_predeterminado SET Anamnesis_Pred = '$anamnesis',Examenes_Pred = '$examenes',Examen_Fisico_Pred = '$exam_fisico',Diagnostico_Pred = '$diagnostico',Tratamiento_Pred = '$tratamiento' WHERE Id_Usuario = $idUser";
    return Model::query_execute($query);
  }

  public function getHistoryPred($idUser)
  {
    $query = "SELECT hc.Anamnesis_Pred, hc.Examenes_Pred, hc.Examen_Fisico_Pred, hc.Diagnostico_Pred, hc.Tratamiento_Pred, us.Monto_Pago 
      FROM historia_clinica_predeterminado hc 
      INNER JOIN usuario us 
      ON us.Id_Usuario = hc.Id_Usuario 
      WHERE hc.Id_Usuario = $idUser;";
    return Model::query_execute($query);
  }

  public function updateStateHistoryPred($idUser)
  {
    $query = "UPDATE historia_clinica_predeterminado SET creado = 1  WHERE Id_Usuario = $idUser";
    return Model::query_execute($query);
  }

  public function getStateHistoryPred($idUser)
  {
    $query = "SELECT creado FROM historia_clinica_predeterminado WHERE Id_Usuario = $idUser";
    return Model::query_execute($query);
  }

  public function insertClinicalTest($idPaciente, $idUser, $idCita, $anamnesis, $exam_fisico, $examenes, $diagnostico, $tratamiento, $monto_consulta, $enlace, $nameImage, $imagen_size, $imagen_type)
  {

    try {
      $db = Model::conectar();
      $db->beginTransaction();
      $datenow = date("Y-m-d H:i:s");
      if ($idCita !== null) {
        $db->query("INSERT INTO historia_clinica(Id_Paciente,Id_Usuario,Id_Cita,Fecha,Anamnesis,Examenes,Examen_Fisico,Diagnostico,Tratamiento,Monto) VALUES 
        ($idPaciente,$idUser,$idCita,'$datenow','$anamnesis','$examenes','$exam_fisico','$diagnostico','$tratamiento',$monto_consulta");
      } else {
        $db->query("INSERT INTO historia_clinica(Id_Paciente,Id_Usuario,Fecha,Anamnesis,Examenes,Examen_Fisico,Diagnostico,Tratamiento,Monto) VALUES 
        ($idPaciente,$idUser,'$datenow','$anamnesis','$examenes','$exam_fisico','$diagnostico','$tratamiento',$monto_consulta)");
      }
      if ($nameImage !== null) {
        if (count($nameImage) > 0) {
          $db->query("SET @ID_HISTORIA = LAST_INSERT_ID()");
          for ($i = 0; $i < count($nameImage); $i++) {
            $db->query("INSERT INTO archivo(Nombre,Subnombre,Enlace,Size,FechaCreado,Id_Historia_Clinica,Id_Tipo_Archivo,CreadoPor) VALUES('$nameImage[$i]','$nameImage[$i]','$enlace[$i]',$imagen_size[$i],'$datenow',@ID_HISTORIA,$imagen_type[$i],'$idUser')");
          }
        }
      }
      $db->commit();
      echo "Agregado exitosamente";
    } catch (Exception $e) {
      echo "No se pudo agregar la prueba clinica";
      $db->rollback();
    }
  }

  public function updateClinicalTest($idClinicalTest, $anamnesis_clinical, $examen_clinical, $examenes_clinical, $diagnostico_clinical, $tratamiento_clinical)
  {

    $query = "UPDATE historia_clinica SET Anamnesis = '$anamnesis_clinical',Examenes = '$examenes_clinical' ,Examen_Fisico = '$examen_clinical',Diagnostico = '$diagnostico_clinical',Tratamiento = '$tratamiento_clinical' WHERE Id_historia_clinica = $idClinicalTest";
    return Model::query_execute($query);
  }

  public function getIDClinicalTest($idPaciente)
  {
    // $query = "SELECT Id_historia_clinica,Fecha,Tratamiento FROM historia_clinica WHERE Id_Paciente = $idPaciente ORDER BY Id_historia_clinica DESC LIMIT 1 ";
    $query = "SELECT hi.Id_historia_clinica,hi.Fecha,hi.Tratamiento,concat_ws(' ',pa.Nombre,pa.Apellido_Paterno,pa.Apellido_Materno) as Nombre,pa.Documento,pa.Genero,pa.Procedencia,pa.Fecha_Nacimiento FROM historia_clinica hi 
    INNER JOIN paciente pa ON hi.Id_Paciente = pa.Id_Paciente WHERE hi.Id_Paciente = $idPaciente ORDER BY Id_historia_clinica DESC LIMIT 1 ";
    return Model::query_execute($query);
  }

  public function fecha_habilitado($idUser)
  {
    $query = "SELECT us.Mensaje_Habilitado as activo, us.Fecha_Habilitado as fecha FROM usuario us WHERE us.Nombre = '$idUser'";
    return Model::query_execute($query);
  }
}
