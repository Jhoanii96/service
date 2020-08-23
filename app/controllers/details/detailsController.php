<?php

require ROOT . FOLDER_PATH . "/app/models/perfil/perfilModel.php";
require ROOT . FOLDER_PATH . "/system/libs/Session.php";

class details extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = new Session;
        $this->session->getAll();

        if (empty($this->session->get('admin'))) {
            echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
        }

        $this->model = new perfilModel();
    }

    public function index()
    {
        $datos_details = $this->model->mostrar_perfil($this->session->get('admin'));

        $this->AdminView('details/details', [
            'datos_details' => $datos_details
        ]);
    }

    
}
