<?php
require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/help/helpModel.php";

class help extends Controller
{

  protected $session;

  public function __construct(){
    $this->session = new Session;
    $this->session->getAll();

    if (!$this->session->get('admin')) {
      echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
    }
    $this->helpModel = new helpModel();
    
  }

  public function index(){
    $usu_cod = $this->session->get('admin');
    $enabled = $this->helpModel->fecha_habilitado($usu_cod);
    $this->view('help/help',[
      'Enabled' => $enabled 
    ]);
  }
}

?>