<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/perfil/perfilModel.php";

class my extends Controller
{
    protected $session; 

    protected $stateProfile;

    public function __construct()
    {
        $this->session = new Session;
        $this->session->getAll(); 

        /* if (empty($this->session->get('admin')) || $this->session->get('admin') == "" || $this->session->get('admin') == NULL) {
            header("Location: " . FOLDER_PATH . "/login");
        } */

        if (!$this->session->get('admin')) {
            echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
        }
        // $this->session->add('firstUpdateProfile',true);
        // $this->profile = true;
        
        $this->model = new perfilModel();
    }
    
    public function index()
    {

        $this->view('my/my');
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

    protected function stateProfile(){
        $response = $this->model->getStateProfile($this->session->get('admin'));
        return $response->fetch();    
    }

    protected function updateStateProfile(){
        $res = $this->model->updateStateProfile($this->session->get('admin'));
        $res->fetch();
    }
}
