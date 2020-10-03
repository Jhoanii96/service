<?php

require ROOT . FOLDER_PATH . "/app/models/perfil/perfilModel.php";
require ROOT . FOLDER_PATH . "/system/libs/Session.php";

class perfil extends Controller
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
        $datos_perfil = $this->model->mostrar_perfil($this->session->get('admin'));
        $enabled = $this->model->fecha_habilitado($this->session->get('admin'));
        $this->AdminView('perfil/perfil', [
            'datos_perfil' => $datos_perfil, 
            'Enabled' => $enabled 
        ]);
    }

    public function update_p1()
    {
        $celphone1 = $_POST["celphone1"];
        $celphone1 = str_replace(' ', '', $celphone1);
        $celphone2 = $_POST["celphone2"];
        $celphone2 = str_replace(' ', '', $celphone2);
        $telefono1 = $_POST["telefono1"];
        $telefono1 = str_replace(' ', '', $telefono1);
        $telefono2 = $_POST["telefono2"];
        $telefono2 = str_replace(' ', '', $telefono2);

        $domicilio = mb_strtoupper($_POST["domicilio"], 'UTF-8');
        $username = $this->session->get('admin');

        $this->model->ActualizarPerfil_1(
             $celphone1
            ,$celphone2
            ,$telefono1
            ,$telefono2
            ,$domicilio
            ,$username
        );
    }

    public function update_p2()
    {

        $email = $_POST['email'];
        $precio = $_POST['precio'];
        if (!isset($_FILES['image']['name'])) {
            $text_image = NULL;
        } else {
            $text_image = $_FILES['image']['name'];
        }
        
        $username = $this->session->get('admin');

        $microseconds2 = microtime(true);
        $microseconds2 = str_replace('.', '', $microseconds2);
        $rand = rand(100000,999999);

        $isnotimage = "0";

        if($text_image == "" || $text_image == NULL) {
            $isnotimage = "1";
            $link_image = "";
        } else {
            $file_name = date("y" . "d" . "m") . date("h" . "i" . "s") . $rand . $microseconds2 . "." . basename($_FILES['image']['type']);
            $file_tmp = $_FILES['image']['tmp_name'];

            $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/media/images/profile/';
            move_uploaded_file($file_tmp, $imagen_destino . $file_name);
            $link_image = 'src/assets/media/images/profile/' . $file_name;
        }

        $this->model->ActualizarPerfil_2($email, $precio, $link_image, $username, $isnotimage); 


    }

    public function update_p3()
    {
        $address = mb_strtoupper($_POST['address'], 'UTF-8'); 
        $username = $this->session->get('admin');
        $this->model->ActualizarPerfil_3($address, $username); 
    }

    protected function showProfile()
    {
        $res = $this->perfilModel->showProfile($this->session->get('admin'));
        return $res->fetch();
    }
}
