<?php
require ROOT . FOLDER_PATH . "/system/libs/Session.php";

class help extends Controller{
 
  public function __construct(){
    $this->session = new Session;
    $this->session->getAll();

    if (!$this->session->get('admin')) {
      echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
    }
  }

  public function index(){

    
    $this->view('help/help');
  }
}

?>