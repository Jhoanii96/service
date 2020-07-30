<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/patient/patientModel.php";
require ROOT . FOLDER_PATH . "/app/models/questionnaire/questionnaireModel.php";
require ROOT . FOLDER_PATH . "/app/models/consultation/consultationModel.php";


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
            echo ("<script>location.href = '" . FOLDER_PATH . "/my';</script>");
        }
        $this->patientModel = new patientModel();
        $this->questionModel = new questionnaireModel();
        $this->model = new consultationModel();
    }

    public function index()
    {
        $this->view('consultation/consultation');
    }

    public function salir()
    {
        $this->session->close();
        echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
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

    public function insertPatient()
    {
        $idUser = $this->session->get('idUser');
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellidoPa = $_POST['apellidopa'];
        $apellidoMa = $_POST['apellidoma'];
        $fechana = $_POST['fechana'];
        $fechana = strtotime($fechana);
        $fechana = date('y-m-d', $fechana);
        $celular = $_POST['celular'];
        $correo = $_POST['correo'];
        $procedencia = $_POST['procedencia'];
        $ocupan = $_POST['ocupacionan'];
        $ocupaac = $_POST['ocupacionac'];
        $genero = $_POST['genero'];

        $patient = $this->patientModel->insertPatient($idUser, $dni, $nombre, $apellidoPa, $apellidoMa, $genero, $fechana, $celular, $correo, $procedencia, $ocupan, $ocupaac);

        if ($patient->rowCount() > 0) {
            // print_r(['Se insertó correctamente']);
            $idPatient = $this->patientModel->getIDPatient();
            $result = $idPatient->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $this->session->add('idPaciente', $result['Id_Paciente']);
                $patientArray = json_encode($result);
            } else {
                $patientArray = json_encode(['no se obtuvo paciente']);
            }
            print_r($patientArray);
        } else {
            print_r(json_encode(["No se inserto nada"]));
        }
    }

    public function getQuestionnaire()
    {
        $idUser = $this->session->get('idUser');
        $questions = $this->questionModel->getQuestionnaire($idUser);
        return $questions->fetchAll();
    }

    public function getPatient()
    {
        $idPaciente = $this->session->get('idPaciente');

        $patient = $this->patientModel->getPatient($idPaciente);

        return $patient->fetch();
    }

    public function searchPatient()
    {
        $documento = $_POST['filter'];
        $searchPatient = $this->patientModel->searchDocumentPatient($documento);
        $result = $searchPatient->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $this->session->add('idPaciente', $result['Id_Paciente']);
            $arrayJSON =  json_encode($result);
        } else {
            $error = ['No se pudo encontrar ese paciente'];
            $arrayJSON =  json_encode($error);
        }
        print_r($arrayJSON);
    }

    public function insertAnswers()
    {


        if (isset($_POST['answers']) && $_POST['answers'] !== "") {
            $detalle = $_POST['detalle'];
            $respuestas = $_POST['answers'];

            $idPaciente = $this->session->get('idPaciente');
            $ResultAnswers = $this->questionModel->insertAnswers($detalle, $idPaciente, $respuestas);
            if ($ResultAnswers->rowCount() > 0) {
                echo "Agregados con exito";
            } else {
                echo "No se inserto nada";
            }
        } else {
            echo "Llene los campos";
        }
    }

    public function citas()
    {
        $dni = $_POST['dni'];
        
        $usu_cod = $this->session->get('admin');
        $ResultAnswers = $this->model->lista_citas_paciente($dni, $usu_cod);
        while ($datos_cita = $ResultAnswers->fetch()) {

            $birthDate = explode("-", $datos_cita['fecha_nac']);
            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                ? ((date("Y") - $birthDate[0]) - 1)
                : (date("Y") - $birthDate[0]));

            if ($datos_cita['estado'] == 0) {
                $estado = "En espera";
                $css = "#ff0000";
            }
            if ($datos_cita['estado'] == 1) {
                $estado = "Atendido";
                $css = "#0000ff";
            }
            
            echo '
            
                <tr>
                    <td>' . $datos_cita['nombre'] . '</td>
                    <td>' . $datos_cita['apellidos'] . '</td>
                    <td class="text-center">' . $age . ' años</td>
                    <td class="text-center">' . date("d/m/Y", strtotime($datos_cita['fecha_atencion'])) . '</td>
                    <td class="text-center">' . date("h:i:s A", strtotime($datos_cita['fecha_atencion'])) . '</td>
                    <td class="text-center" style="color: ' . $css . ';">' . $estado . '</td>
                </tr>
            
            ';
        }
    }
}
