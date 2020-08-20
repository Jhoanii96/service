<?php

class settingsModel extends Model{
 
  //Muestra cualquier tabla 
  public function insertAnamnesisPred($idUser,$anamnesis,$exam_fisico,$examenes,$diagnostico,$tratamiento){
    $query = "INSERT INTO historia_clinica_predeterminado(Id_Usuario,Anamnesis_Pred,Examenes_Pred,Examen_Fisico_Pred,Diagnostico_Pred,Tratamiento_Pred) VALUES($idUser,'$anamnesis','$examenes','$exam_fisico','$diagnostico','$tratamiento')";
    return Model::query_execute($query);
  }

  public function updateHistoryPred($idUser,$anamnesis,$exam_fisico,$examenes,$diagnostico,$tratamiento){
    $query = "UPDATE historia_clinica_predeterminado SET Anamnesis_Pred = '$anamnesis',Examenes_Pred = '$examenes',Examen_Fisico_Pred = '$exam_fisico',Diagnostico_Pred = '$diagnostico',Tratamiento_Pred = '$tratamiento' WHERE Id_Usuario = $idUser";
    return Model::query_execute($query);
  }

  public function getHistoryPred($idUser){
    $query = "SELECT Anamnesis_Pred,Examenes_Pred,Examen_Fisico_Pred,Diagnostico_Pred,Tratamiento_Pred FROM historia_clinica_predeterminado WHERE Id_Usuario = $idUser";
    return Model::query_execute($query);
  }

  public function updateStateHistoryPred($idUser){
    $query = "UPDATE historia_clinica_predeterminado SET creado = 1  WHERE Id_Usuario = $idUser";
    return Model::query_execute($query);
  }

  public function getStateHistoryPred($idUser){
    $query = "SELECT creado FROM historia_clinica_predeterminado WHERE Id_Usuario = $idUser";
    return Model::query_execute($query);
  }

  public function insertClinicalTest($idPaciente,$idUser,$idCita,$anamnesis,$exam_fisico,$examenes,$diagnostico,$nameImage,$imagen_size){
    
    try {
      $db = Model::conectar();
      $db->beginTransaction();
      $db->query("INSERT INTO historia_clinica(Id_Paciente,Id_Usuario,Anamnesis,Examenes,Examen_Fisico,Diagnostico) VALUES 
      ($idPaciente,$idUser,'$anamnesis','$examenes','$exam_fisico','$diagnostico')");
      $db->query("SET @ID_HISTORIA = LAST_INSERT_ID()");
      for ($i=0; $i < count($nameImage) ; $i++) { 
        $db->query("INSERT INTO imagen(Nombre,tamaño,Id_Historia_Clinica) VALUES('$nameImage[$i]',$imagen_size[$i],@ID_HISTORIA)"); 
      }
      $db->commit();
      echo "Agregado exitosamente";
    } catch (Exception $e){
      echo "No se pudo agregar la prueba clinica";
      $db->rollback();
    }
  }

  public function getIDClinicalTest($idPaciente){
    $query = "SELECT Id_historia_clinica FROM historia_clinica WHERE Id_Paciente = $idPaciente";
    return Model::query_execute($query);
  }

}