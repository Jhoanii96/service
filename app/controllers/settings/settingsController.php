<?php

require ROOT . FOLDER_PATH . "/app/models/settings/settingsModel.php";
require ROOT . FOLDER_PATH . "/system/libs/Session.php";

class settings extends Controller
{

  protected $session;
  protected $settingsModel;

  public function __construct(){
    $this->session = new Session;
    $this->session->getAll();
    $this->settingsModel = new settingsModel();

    if (!$this->session->get('admin')) {
      echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
    }
    
  }

  public function index(){
    $usu_cod = $this->session->get('admin');
    $enabled = $this->settingsModel->fecha_habilitado($usu_cod);
    $this->view('settings/settings',[
      'Enabled' => $enabled 
    ]);
  }

  public function insertHistoryPred(){
    $idUser = $this->session->get("idUser");
    $anamnesis = $_POST["anamnesis"];
    $exam_fisico = $_POST["exam_fisico"];
    $examenes = $_POST["examenes"];
    $diagnostico = $_POST["diagnostico"];
    $tratamiento = $_POST["tratamiento"];

    $resultHistory = $this->settingsModel->insertAnamnesisPred($idUser,$anamnesis,$exam_fisico,$examenes,$diagnostico,$tratamiento);
    $count = $resultHistory->rowCount();
    if($count > 0){
      $this->session->add('insertSettingPrueba',true);
      $history = $this->settingsModel->updateStateHistoryPred($idUser);
      $countState = $history->rowCount();
      echo "Se agregó con exito";
    }else{
      echo "No se logró insertar la prueba clinica";
    }
  }

  public function updateHistoryPred(){
    $idUser = $this->session->get("idUser");
    $anamnesis = $_POST["anamnesis"];
    $exam_fisico = $_POST["exam_fisico"];
    $examenes = $_POST["examenes"];
    $diagnostico = $_POST["diagnostico"];
    $tratamiento = $_POST["tratamiento"];

    $resultHistory = $this->settingsModel->updateHistoryPred($idUser,$anamnesis,$exam_fisico,$examenes,$diagnostico,$tratamiento);
    $count = $resultHistory->rowCount();
    if($count > 0){
      echo "Se actualizó con exito";
    }else{
      echo "No se logró actualizar la prueba clinica";
    }

  }
  
  public function getStateHistoryPred(){
    $idUser = $this->session->get("idUser");
    $state = $this->settingsModel->getStateHistoryPred($idUser);
    $result = $state->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  public function getHistoryPred(){
    $idUser = $this->session->get("idUser");

    $resultHistory = $this->settingsModel->getHistoryPred($idUser);
    $result = $resultHistory->fetch(PDO::FETCH_ASSOC);
    if($resultHistory){
      return $result;
    }
  }
}

?>