<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/perfil/perfilModel.php";
require ROOT . FOLDER_PATH . "/app/models/tipado/tipadoModel.php";
require ROOT . FOLDER_PATH . "/app/models/questionnaire/questionnaireModel.php";

class my extends Controller
{
    protected $session;
    protected $stateProfile;
    protected $questionnaireModel;

    public function __construct()
    {
        $this->session = new Session;
        $this->session->getAll();

        if (empty($this->session->get('admin'))) {
            echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
        }

        $this->perfilModel = new perfilModel();
        $this->tipadoModel = new tipadoModel();
        $this->questionnaireModel = new questionnaireModel();
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
        $diapago = $_POST['diapago'];

        if (!isset($_FILES["imagen"]["tmp_name"]) || $_FILES["imagen"]["tmp_name"] == "") {
            $file_tmp = '';
            $dont_edit_photo = '1';
        } else {
            $file_tmp = $_FILES["imagen"]["tmp_name"];
            $dont_edit_photo = '0';
        }
        if (!isset($_FILES["imagen"]["name"]) || $_FILES["imagen"]["name"] == "") {
            $file_name = 'avatar1.png';
        } else {
            $file_name = date("m" . "d" . "y") . date("h" . "i" . "s" . microtime(TRUE)) . "." . basename($_FILES['imagen']['type']);
        }

        $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/media/images/profile/';
        move_uploaded_file($file_tmp, $imagen_destino . $file_name);
        $imagen_bd = 'src/assets/media/images/profile/' . $file_name;

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
            $diapago,
            $dont_edit_photo,
            $imagen_bd
        );
    }

    public function questionCounter()
    {
        $idUser = $this->session->get('idUser');
        $count = $this->questionnaireModel->getQuestionnaireCounter($idUser);
        return $count->fetch();
    }


    public function createQuestionnaire()
    {
        $idUser = $this->session->get('idUser');
        $questionnaire = $this->questionnaireModel->createQuestionnaire($idUser);
        $questionnaire->fetch();
    }



    public function insertQuestion()
    {
        $question = $_POST['dato'];
        $idUser = $this->session->get('idUser');
        $idCuestionario = $this->questionnaireModel->getIdQuestionnaire($idUser)->fetch();
        if ($idCuestionario > 0) {
            $resQuestion = $this->questionnaireModel->insertQuestion($idCuestionario['Id_Cuestionario'], $question);
            $resQuestion->fetch();
        } else {
            $questionnaire = $this->questionnaireModel->createQuestionnaire($idUser);
            $questionnaire->fetch();
            $idLastInsert = $this->questionnaireModel->getIdQuestionnaire($idUser)->fetch();
            $questionResult =  $this->questionnaireModel->insertQuestion($idLastInsert['Id_Cuestionario'], $question);
            $questionResult->fetch();
        }
    }
}
