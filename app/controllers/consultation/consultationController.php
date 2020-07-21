<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/consultation/consultationModel.php";

class consultation extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = new Session;
        $this->session->getAll();

        if (!empty($this->session->get('userAdmin')) || $this->session->get('userAdmin') != "" || $this->session->get('userAdmin') != NULL) {
            header("Location: " . FOLDER_PATH . "/");
        }
    }

    public function index()
    {
        $this->view('consultation/consultation');
    }

    public function salir()
    {
        $this->session->close();
        header("Location: " . FOLDER_PATH . "/login");
    }

    public function VerificarParametros($param)
    {
        if (empty($param[0]) or empty($param[1])) {
            return false;
        } else {
            return true;
        }
    }

    private function renderErrorMessage($message)
    {
        $this->view('login/login', ['error_message' => $message]);
    }

    public function insertPatient(){
        
    }

}
