<?php
    if(session_status() == PHP_SESSION_NONE) {
        $this->session = new Session;
        $this->session->getAll();
            
        if(empty($this->session->get('usuarioUsi')) || $this->session->get('usuarioUsi') == "" || $this->session->get('usuarioUsi') == NULL){
            header("Location: " . FOLDER_PATH . "/login");
        }
	}
    @$admin = $this->session->get('usuarioUsi');

    $actual_link = "$_SERVER[REQUEST_URI]";

    $this->dataUser = new dataAdmin();
    @$parametro = $this->dataUser->data_user($admin);
    $this->datos_usu = $parametro->fetch();

    if ($actual_link == FOLDER_PATH . "/" || $actual_link == FOLDER_PATH . "") {
        $this->view('home/homeAdmin', [
            'nombre' => $this->datos_usu['nombre'], 
            'apellido' => $this->datos_usu['apellido'], 
            'nombreTipo' => $this->datos_usu['nombreTipo'], 
            'online' => 'online', 
            'foto' => $this->datos_usu['foto']
        ]);
    }

?>