<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/appointment/appointmentModel.php";
class appointment extends Controller
{
  protected $session;
  protected $model;

  public function __construct()
  {
    $this->session = new Session;
    $this->session->getAll();

    if (empty($this->session->get('admin'))) {
      echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
    }

    $this->model = new appointmentModel();
  }

  public function index()
  {
    
    $datos_cita = $this->model->mostrar_citas($this->session->get('admin'));

    $this->view('appointment/appointment', [
      'datos_cita' => $datos_cita 
    ]);
  }
}
