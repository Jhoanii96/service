<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/questionnaire/questionnaireModel.php";
require ROOT . FOLDER_PATH . "/app/models/my/myModel.php";

class questionnaire extends Controller{

  protected $session;
  protected $my;

  public function __construct(){
    $this->session = new Session;
    $this->session->getAll();

    if (empty($this->session->get('admin'))) {
      echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
    }

    $this->questionnaireModel = new questionnaireModel();
    $this->my = new myModel();
  }

  public function index(){
    $usu_cod = $this->session->get('admin');
    $enabled = $this->questionnaireModel->fecha_habilitado($usu_cod);
    $this->view('questionnaire/questionnaire',[
      'Enabled' => $enabled 
    ]);
  }

  public function deleteQuestion(){
    // $idUser = $this->session->get('idUser');
    $idQuestion = $_POST['id'];
    $deleteQuestion = $this->questionnaireModel->deleteQuestion($idQuestion);
    $countDeleteQuestion = $deleteQuestion->rowCount();
    if($countDeleteQuestion > 0){
      echo "Se elimino correctamente la pregunta";
    }else{
      echo "No se pudo eliminar la pregunta";
    }
  }

  public function showQuestion(){
    $idUser = $this->session->get('idUser');
    $resultQuestions = $this->questionnaireModel->getQuestionnaire($idUser)->fetchAll(PDO::FETCH_ASSOC);
    return $resultQuestions;
  }

  public function insertQuestion(){
    $idUser = $this->session->get('idUser');
    $question = $_POST['dato'];
    $idCuestionario = $this->questionnaireModel->getIdQuestionnaire($idUser)->fetch(PDO::FETCH_ASSOC);
    $resultQuestions = $this->questionnaireModel->insertNewQuestion($idCuestionario['Id_Cuestionario'],$question);
    $cant = $resultQuestions->rowCount();
    if($cant > 0){
      echo "Se inserto correctamente";
    }else{
      echo "No se pudo agregar";
    }
  }

  /* Para las notificaiones */
  public function notifications(){
    $idUser = $this->session->get('idUser');
    $notifications = $this->my->notifications($idUser);
    $cantNotifications = $notifications->rowCount();
    if($cantNotifications > 0){
        $resultNotifications = $notifications->fetchAll(PDO::FETCH_ASSOC);
        $resp = json_encode($resultNotifications);
    }else{
        $resp = ['no hay resultados'];
        $resp = json_encode($resp);
    }
    print_r($resp);
}

}

?>