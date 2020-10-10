<?php

require ROOT . FOLDER_PATH . "/app/models/change_password/change_passwordModel.php";
require ROOT . FOLDER_PATH . "/system/libs/Session.php";

class change_password extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = new Session;
        $this->session->getAll();

        if (empty($this->session->get('admin'))) {
            echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
        }

        $this->model = new change_passwordModel();
    }

    public function index()
    {
        $datos_perfil = $this->model->mostrar_perfil($this->session->get('admin'));
        $enabled = $this->model->fecha_habilitado($this->session->get('admin'));
        $this->AdminView('change_password/change_password', [
            'datos_perfil' => $datos_perfil,
            'Enabled' => $enabled
        ]);
    }

    public function change()
    {


        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];

        explode(" ", $oldpass);
        explode(" ", $newpass);

        $param[0] = $oldpass;
        $param[1] = $newpass;


        $parametro = $this->model->load_user($this->session->get('admin'));
        $identi = $parametro->fetch();


        if ($param[0] != $identi[1]) {
            echo '0';
        } else {
            $this->model->ActualizarPassword($this->session->get('admin'), $param[1]);
            echo '1';
        }


        /* $celphone1 = $_POST["celphone1"];
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
        ); */
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
        $datos_perfil = $this->model->mostrar_perfil($this->session->get('admin'));
        $enabled = $this->model->fecha_habilitado($this->session->get('admin'));
        $this->view('change_password/change_password', [
            'error_message' => $message, 
            'datos_perfil' => $datos_perfil, 
            'Enabled' => $enabled 
        ]);
    }
}
