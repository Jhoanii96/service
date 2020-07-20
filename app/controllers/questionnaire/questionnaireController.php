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

  
}

?>