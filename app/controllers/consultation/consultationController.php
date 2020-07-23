<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/patient/patientModel.php";
require ROOT . FOLDER_PATH . "/app/models/questionnaire/questionnaireModel.php";


class consultation extends Controller
{
    protected $session;
    protected $patientModel;
    protected $questionModel;

    public function __construct()
    {
        $this->session = new Session;
        $this->session->getAll();

        if (!empty($this->session->get('userAdmin')) || $this->session->get('userAdmin') != "" || $this->session->get('userAdmin') != NULL) {
            header("Location: " . FOLDER_PATH . "/");
        }
        $this->patientModel = new patientModel();
        $this->questionModel = new questionnaireModel();
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
        $idUser = $this->session->get('idUser');
        $dni = $_POST['dni']; 
        $nombre = $_POST['nombre'];
        $apellidoPa = $_POST['apellidopa'];
        $apellidoMa = $_POST['apellidoma'];
        $fechana = $_POST['fechana'];
        $fechana = strtotime($fechana);
        $fechana = date('y-m-d',$fechana);
        $celular = $_POST['celular'];
        $correo = $_POST['correo'];
        $procedencia = $_POST['procedencia'];
        $ocupan = $_POST['ocupacionan'];
        $ocupaac = $_POST['ocupacionac'];
        $genero = $_POST['genero'];

        $patient = $this->patientModel->insertPatient($idUser,$dni,$nombre,$apellidoPa,$apellidoMa,$genero,$fechana,$celular,$correo,$procedencia,$ocupan,$ocupaac);
        if($patient->rowCount()>0){
            echo "Agregado con exito";
        }else{
            echo "No se inserto nada";
        }
    }

    public function getQuestionnaire(){
        $idUser = $this->session->get('idUser');
        $questions = $this->questionModel->getQuestionnaire($idUser);
        return $questions->fetchAll();
    }

    public function getPatient(){
        $patient = $this->patientModel->getPatient();
        return $patient->fetch();
    }

}
