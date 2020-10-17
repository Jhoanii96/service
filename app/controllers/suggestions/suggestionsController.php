<?php
require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/suggestions/suggestionsModel.php";

class suggestions extends Controller
{

  protected $session;

  public function __construct(){
    $this->session = new Session;
    $this->session->getAll();

    if (!$this->session->get('admin')) {
      echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
    }
    $this->suggestionModel = new suggestionModel();
  }

  public function index(){
    $usu_cod = $this->session->get('admin');
    $enabled = $this->suggestionModel->fecha_habilitado($usu_cod);
    $this->view('suggestions/suggestions',[
      'Enabled' => $enabled 
    ]);
  }

  public function sendSuggestion(){
    $idUser = $this->session->get('idUser');
    $titulo = $_POST['asunto'];
    $descripcion = $_POST['message'];
    if((isset($titulo) && !empty($titulo)) && (isset($descripcion) && !empty($descripcion))){
      $result = $this->suggestionModel->sendSuggestion($titulo,$descripcion,$idUser);
      $rowAffected = $result->rowCount();
  
      if($rowAffected > 0){
        echo "Se envió con exito la sugerencia";
      }else{
        echo "No se pudo enviar";
      }
    }
  }
}

?>