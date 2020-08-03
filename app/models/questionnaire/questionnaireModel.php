<?php 

class questionnaireModel extends Model{

  public function getQuestionnaireCounter($idUser){
    $query = "SELECT cant_preguntas FROM cuestionario WHERE $idUser";
    $res = Model::query_execute($query);
    return $res;
  }

  public function createQuestionnaire($idUser){
    $query = "INSERT INTO cuestionario(Id_Usuario) VALUES($idUser)";
    $res = Model::query_execute($query);
    return $res;
  }

  public function insertQuestion($idQuestionnaire,$pregunta){
    $query = "INSERT INTO detalle_cuestionario(Id_Cuestionario,Pregunta) VALUES($idQuestionnaire,'".$pregunta."')";
    $res = Model::query_execute($query);
    return $res;
  }

  public function getStateQuestionnaire($idUser){
    $query = "SELECT estado_crear_mas FROM cuestionario WHERE Id_Usuario = $idUser";
    $res = Model::query_execute($query);
    return $res;
  }

  public function getIdQuestionnaire($idUser){
    $query = "SELECT Id_Cuestionario FROM cuestionario WHERE Id_Usuario = $idUser";
    $res = Model::query_execute($query);
    return $res;
  }

  public function getQuestionnaire($idUser){
    $query = "CALL getQuestionnaire($idUser)";
    $res = Model::query_execute($query);
    return $res;
  }

  public function insertAnswers($idDetalleCuest,$idPaciente,$respuesta){
    
    for ($i=0; $i < count($respuesta); $i++) { 
      $query = "INSERT INTO detalle_cuestionario_paciente(Id_Detalle_Cuestionario,Respuesta,Id_Paciente) VALUES($idDetalleCuest[$i],'$respuesta[$i]',$idPaciente)";
      $res = Model::query_execute($query);
    }
    return $res;
  }

  public function getAnswers($idPaciente){
    $query= "SELECT Respuesta FROM detalle_cuestionario_paciente WHERE Id_Paciente = $idPaciente";
    return $res = Model::query_execute($query);
  }
}
?>