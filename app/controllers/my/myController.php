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

        $this->perfilModel = new perfilModel();
        $this->tipadoModel = new tipadoModel();
    }

    public function index()
    {

        $this->view('my/my');
    }


    protected function updateStateProfile()
    {
        $res = $this->perfilModel->updateStateProfile($this->session->get('admin'));
        $res->fetch();
    }


    protected function showTableSelect($table, $id = null, $compare = '')
    {
        $res = $this->tipadoModel->showTipadoSelect($table, $id, $compare);
        return $res->fetchAll();
    }

    protected function stateProfile()
    {
        $response = $this->perfilModel->getStateProfile($this->session->get('admin'));
        return $response->fetch();
    }

    protected function showProfile()
    {
        $res = $this->perfilModel->showProfile($this->session->get('admin'));
        return $res->fetch();
    }

    public function updateProfile()
    {
        $idUser = $this->session->get('idUser');
        $idDoctor = $this->session->get('idDoctor');
        $nombre = $_POST['nombre'];
        $apellidopa = $_POST['apellidopa'];
        $apellidoma = $_POST['apellidoma'];
        $especialidad = $_POST['especialidad'];
        $dni = $_POST['dni'];
        $cmp = $_POST['cmp'];
        $pais = $_POST['pais'];
        $departamento = $_POST['departamento'];
        $provincia = $_POST['provincia'];
        $distrito = $_POST['distrito'];
        $telefono1 = $_POST['telefono1'];
        $telefono2 = $_POST['telefono2'];
        $celular1 = $_POST['celular1'];
        $celular2 = $_POST['celular2'];
        $precioconsulta = $_POST['precioconsulta'];
        $tiempoatencion = $_POST['tiempoatencion'];
        $diapago = strtotime($_POST['diapago']);
        $diapago = date('y-m-d',$diapago);
        $this->perfilModel->updateProfile(
            $idUser,
            $idDoctor,
            $nombre,
            $apellidopa,
            $apellidoma,
            $especialidad,
            $dni,
            $cmp,
            $pais,
            $departamento,
            $provincia,
            $distrito,
            $telefono1,
            $telefono2,
            $celular1,
            $celular2,
            $precioconsulta,
            $tiempoatencion,
            $diapago
        );
    }
}
