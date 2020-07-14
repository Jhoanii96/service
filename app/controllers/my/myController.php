<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/perfil/perfilModel.php";
require ROOT . FOLDER_PATH . "/app/models/tipado/tipadoModel.php";

class my extends Controller
{
    protected $session; 
    protected $stateProfile;

    public function __construct()
    {
        $this->session = new Session;
        $this->session->getAll(); 

        if (empty($this->session->get('admin'))) {
            echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
        }

        $this->model = new perfilModel();
        $this->tipadoModel = new tipadoModel();
      
    }
    
    public function index()
    {

        $this->view('my/my');
    }
    
    
    protected function updateStateProfile(){
        $res = $this->model->updateStateProfile($this->session->get('admin'));
        $res->fetch();
    }
    
    
    protected function showTableSelect($table){
        $res = $this->tipadoModel->showTipadoSelect($table);
        return $res->fetchAll();
    }
    
    protected function stateProfile(){
        $response = $this->model->getStateProfile($this->session->get('admin'));
        return $response->fetch();    
    }

    protected function showProfile(){
        $res = $this->model->showProfile($this->session->get('admin'));
        return $res->fetch();
    }

    protected function updateProfile(){
        $_POST['nombre'];
        $_POST['apellidopa'];
        $_POST['apellidoma'];
        $_POST['especialidad'];
        $_POST['dni'];
        $_POST['cmp'];
        $_POST['pais'];
        $_POST['departamento'];
        $_POST['provincia'];
        $_POST['distrito'];
        $_POST['telefono1'];
        $_POST['telefono2'];
        $_POST['celular1'];
        $_POST['celular2'];
        $_POST['correo'];
        $_POST['tiempoatencion'];
        $_POST['precioconsulta'];
        $_POST['imagen'];
    }

    protected function createQuestionnaire(){
        
    }
}
