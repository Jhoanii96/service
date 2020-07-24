<?php
require ROOT . FOLDER_PATH . "/system/libs/Session.php";
// require ROOT . FOLDER_PATH . "/" . DATA . "admin/autoload" . DATAI . "php";
// require ROOT . FOLDER_PATH . "/" . DATA . "user/autoload" . DATAI . "php";

class appointment extends Controller
{
  protected $session;

  public function index()
  {

    $this->session = new Session;
    $this->session->getAll();

    /* if (empty($this->session->get('usuarioUsi')) || $this->session->get('usuarioUsi') == "" || $this->session->get('usuarioUsi') == NULL) {
      echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
    } */

    $this->view('appointment/appointment' /*, ['noticiasRecientes' => $this->parametro1, 'noticiasAntiguas' => $this->parametro2] */);

  }




  
  
}
