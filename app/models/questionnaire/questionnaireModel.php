<?php

class questionnaireModel extends Model
{

  public function getQuestionnaireCounter($idUser)
  {
    $query = "SELECT cant_preguntas FROM cuestionario WHERE $idUser";
    $res = Model::query_execute($query);
    return $res;
  }

  public function createQuestionnaire($idUser)
  {
    $query = "INSERT INTO cuestionario(Id_Usuario) VALUES($idUser)";
    $res = Model::query_execute($query);
    return $res;
  }

  public function insertQuestion($idQuestionnaire, $pregunta)
  {
    $query = "INSERT INTO detalle_cuestionario(Id_Cuestionario,Pregunta) VALUES($idQuestionnaire,'" . $pregunta . "')";
    $res = Model::query_execute($query);
    return $res;
  }

  public function insertNewQuestion($idQuestionnaire, $pregunta)
  {
    $query = "INSERT INTO detalle_cuestionario(Id_Cuestionario,Pregunta,Nuevo) VALUES($idQuestionnaire,'" . $pregunta . "',1)";
    $res = Model::query_execute($query);
    return $res;
  }

  public function getStateQuestionnaire($idUser)
  {
    $query = "SELECT estado_crear_mas FROM cuestionario WHERE Id_Usuario = $idUser";
    $res = Model::query_execute($query);
    return $res;
  }

  public function getIdQuestionnaire($idUser)
  {
    $query = "SELECT Id_Cuestionario FROM cuestionario WHERE Id_Usuario = $idUser";
    $res = Model::query_execute($query);
    return $res;
  }

  public function getQuestionnaire($idUser)
  {
    $query = "CALL getQuestionnaire($idUser)";
    $res = Model::query_execute($query);
    return $res;
  }

  public function getQuestionnaireAll($idPaciente, $idQuestionnaire)
  {
    // $query = "SELECT de.Id_Detalle_Cuestionario AS Id_Detalle,de.Pregunta FROM cuestionario cu INNER JOIN detalle_cuestionario de ON
    // de.Id_Cuestionario = cu.Id_Cuestionario WHERE cu.Id_Usuario = $idUser";
    $query = "SELECT depa.Respuesta,de.Pregunta,depa.Id_Detalle_Cuestionario AS Id_Detalle FROM detalle_cuestionario_paciente depa INNER JOIN detalle_cuestionario de
      ON de.Id_Detalle_Cuestionario = depa.Id_Detalle_Cuestionario WHERE Id_Paciente = $idPaciente AND Id_Cuestionario = $idQuestionnaire";
    return Model::query_execute($query);
  }

  public function getNewQuestions($idUser)
  {
    $query = "SELECT de.Id_Detalle_Cuestionario AS Id_Detalle,de.Pregunta FROM cuestionario cu INNER JOIN detalle_cuestionario de ON
          de.Id_Cuestionario = cu.Id_Cuestionario WHERE cu.Id_Usuario = $idUser AND Nuevo = 1 AND Mostrar = 1";
    return Model::query_execute($query);
  }

  public function insertAnswers($idDetalleCuest, $idPaciente, $respuesta)
  {

    for ($i = 0; $i < count($respuesta); $i++) {
      $query = "INSERT INTO detalle_cuestionario_paciente(Id_Detalle_Cuestionario,Respuesta,Id_Paciente) VALUES($idDetalleCuest[$i],'$respuesta[$i]',$idPaciente)";
      $res = Model::query_execute($query);
    }
    return $res;
  }

  public function getAnswers($idPaciente, $idQuestionnaire)
  {

    $query = "SELECT depa.Respuesta,depa.Id_Detalle_Cuestionario FROM detalle_cuestionario_paciente depa INNER JOIN detalle_cuestionario de
      ON de.Id_Detalle_Cuestionario = depa.Id_Detalle_Cuestionario WHERE Id_Paciente = $idPaciente AND depa.Mostrar = 1 
      AND Id_Cuestionario = $idQuestionnaire";

    return $res = Model::query_execute($query);
  }

  public function getAnswersAll($idPaciente, $idQuestionnaire)
  {
    $query = "SELECT depa.Respuesta,de.Pregunta,depa.Id_Detalle_Cuestionario FROM detalle_cuestionario_paciente depa INNER JOIN detalle_cuestionario de
      ON de.Id_Detalle_Cuestionario = depa.Id_Detalle_Cuestionario WHERE Id_Paciente = $idPaciente AND Id_Cuestionario = $idQuestionnaire";

    return Model::query_execute($query);
  }

  // public function compareAnswers(){
  //   $query = "SELECT FROM detalle_cuestionario_paciente WHERE ";
  // }

  public function updateAnswers($idDetalleCuest, $idPaciente, $respuestas)
  {
    $cont = 0;
    for ($i = 0; $i < count($respuestas); $i++) {
      $idDetalleCuest[$i] = intval($idDetalleCuest[$i]);
      $query = "UPDATE detalle_cuestionario_paciente SET Respuesta = '$respuestas[$i]' WHERE Id_Paciente = $idPaciente AND Id_Detalle_Cuestionario = $idDetalleCuest[$i]";
      $res = Model::query_execute($query);
      $cont += $res->rowCount();
    }
    return $cont;
  }

  public function getStateNewAnswer($idUser)
  {

    $query = "SELECT de.Id_Detalle_Cuestionario FROM cuestionario cu INNER JOIN detalle_cuestionario de ON de.Id_Cuestionario = cu.Id_Cuestionario WHERE cu.Id_Usuario = $idUser and de.Nuevo = 1";
    return Model::query_execute($query);
  }

  // INSERT INTO ALUMNO(ALUMN_NOMBRES,ALUM_APELLPAT,ALUM_MAT,ALUM_GENERO,ALUM_DNI,ALUM_FECHA_NAC,ALUM_DIRECCION,ALUM_NUM_HERM,ALUM_LENGUA_MAT) 
  // VALUES('walter daniel','huaynapata','aguilar','M','75488848','2010-05-04','ASOC-AISJDLASJD',2,'CASTELLANO');

  public function getStateShowAnswer($idUser)
  {

    $query = "SELECT de.Id_Detalle_Cuestionario FROM cuestionario cu INNER JOIN detalle_cuestionario de ON de.Id_Cuestionario = cu.Id_Cuestionario WHERE cu.Id_Usuario = $idUser and de.Mostrar = 1";
    return Model::query_execute($query);
  }

  public function deleteQuestion($id)
  {
    // $query = "UPDATE detalle_cuestionario SET Mostrar = 0 WHERE Id_Detalle_Cuestionario = $id";
    $query = "
            UPDATE Detalle_Cuestionario decu SET decu.Mostrar = 0 WHERE Id_Detalle_Cuestionario = $id;
            UPDATE detalle_cuestionario_paciente depa SET depa.Mostrar=0 WHERE Id_Detalle_Cuestionario = $id;  
    ";
    return Model::query_execute($query);
  }

  public function fecha_habilitado($idUser)
  {
    $query = "SELECT us.Mensaje_Habilitado as activo, us.Fecha_Habilitado as fecha FROM usuario us WHERE us.Nombre = '$idUser'";
    return Model::query_execute($query);
  }
}
