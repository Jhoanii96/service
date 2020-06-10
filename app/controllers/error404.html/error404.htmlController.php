<?php
    //require ROOT . FOLDER_PATH . "/app/models/registro/registroModel.php";

    class error404 extends Controller 
    {
        public $model;

        public function index()
        {
            
            //$this->model = new homeModel();
            //$this->parametro1 = $this->model->mostrar_noticiasRecientes();
            //$this->parametro2 = $this->model->mostrar_noticiasAntiguas();
            
        $this->view('error404/error404.html' /*, ['noticiasRecientes' => $this->parametro1, 'noticiasAntiguas' => $this->parametro2] */);

        }
    }

?>