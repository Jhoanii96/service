<?php
require ROOT . FOLDER_PATH . "/system/libs/Session.php";
// require ROOT . FOLDER_PATH . "/" . DATA . "admin/autoload" . DATAI . "php";
// require ROOT . FOLDER_PATH . "/" . DATA . "user/autoload" . DATAI . "php";

class appointment extends Controller
{
    private $session;

  public function index()
  {

    $this->session = new Session;
    $this->session->getAll();

    /* if (empty($this->session->get('usuarioUsi')) || $this->session->get('usuarioUsi') == "" || $this->session->get('usuarioUsi') == NULL) {
      header("Location: " . FOLDER_PATH . "/login");
    } */

    $this->view('appointment/appointment' /*, ['noticiasRecientes' => $this->parametro1, 'noticiasAntiguas' => $this->parametro2] */);

  }




  
  
}
