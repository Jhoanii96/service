<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/questionnaire/questionnaireModel.php";

class questionnaire extends Controller{

  protected $session;


  public function __construct(){
    $this->session = new Session;
    $this->session->getAll();

    if (empty($this->session->get('admin'))) {
      echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
    }

    $this->questionnaireModel = new questionnaireModel();
  }

  public function index(){
    $this->view('questionnaire/questionnaire');
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
    $resultQuestions = $this->questionnaireModel->getQuestionnaire($idUser)->fetchAll(PDO::FETCH_ASSOC);
  }
}

?>