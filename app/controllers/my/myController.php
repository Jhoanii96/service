<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/perfil/perfilModel.php";
require ROOT . FOLDER_PATH . "/app/models/tipado/tipadoModel.php";

class my extends Controller
{
    protected $session; 
    protected $stateProfile;
    // public $profile;

    public function __construct()
    {
        $this->session = new Session;
        $this->session->getAll(); 

        if (empty($this->session->get('admin'))) {
            echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
        }

        $this->model = new perfilModel();
        $this->tipadoModel = new tipadoModel();
        // $this->profile = $this->showProfile();
    }
    
    public function index()
    {

        $this->view('my/my');
    }
    
    protected function stateProfile(){
        $response = $this->model->getStateProfile($this->session->get('admin'));
        return $response->fetch();    
    }

    protected function updateStateProfile(){
        $res = $this->model->updateStateProfile($this->session->get('admin'));
        $res->fetch();
    }

    protected function showProfile(){
        $res = $this->model->showProfile($this->session->get('admin'));
        return $res->fetch();
    }

    protected function showTableSelect($table){
        $res = $this->tipadoModel->showTipadoSelect($table);
        return $res->fetchAll();
    }
}
