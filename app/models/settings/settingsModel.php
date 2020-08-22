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

  public function insertClinicalTest($idPaciente,$idUser,$anamnesis,$exam_fisico,$examenes,$diagnostico,$tratamiento,$nameImage,$imagen_size,$imagen_type){
    
    try {
      $db = Model::conectar();
      $db->beginTransaction();
      $db->query("INSERT INTO historia_clinica(Id_Paciente,Id_Usuario,Anamnesis,Examenes,Examen_Fisico,Diagnostico,Tratamiento) VALUES 
      ($idPaciente,$idUser,'$anamnesis','$examenes','$exam_fisico','$diagnostico','$tratamiento')");
      if( $nameImage !== null ){
        if( count($nameImage) > 0 ){
          $db->query("SET @ID_HISTORIA = LAST_INSERT_ID()");
          for ($i=0; $i < count($nameImage) ; $i++) { 
            $db->query("INSERT INTO archivo(Nombre,tamaño,tipo,Id_Historia_Clinica) VALUES('$nameImage[$i]',$imagen_size[$i],'$imagen_type[$i]',@ID_HISTORIA)"); 
          }
        }
      }
      $db->commit();
      echo "Agregado exitosamente";
    } catch (Exception $e){
      echo "No se pudo agregar la prueba clinica";
      $db->rollback();
    }
  }

  public function updateClinicalTest($idClinicalTest,$anamnesis_clinical,$examen_clinical,$examenes_clinical,$diagnostico_clinical,$tratamiento_clinical){

    $query = "UPDATE historia_clinica SET Anamnesis = '$anamnesis_clinical',Examenes = '$examenes_clinical' ,Examen_Fisico = '$examen_clinical',Diagnostico = '$diagnostico_clinical',Tratamiento = '$tratamiento_clinical' WHERE Id_historia_clinica = $idClinicalTest";
    return Model::query_execute($query);
  }

  public function getIDClinicalTest($idPaciente){
    $query = "SELECT Id_historia_clinica FROM historia_clinica WHERE Id_Paciente = $idPaciente ORDER BY Id_historia_clinica DESC LIMIT 1 ";
    return Model::query_execute($query);
  }

}