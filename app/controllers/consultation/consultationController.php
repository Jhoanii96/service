<?php

// require_once ROOT . FOLDER_PATH . '/dompdf/autoload.inc.php';
require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/patient/patientModel.php";
require ROOT . FOLDER_PATH . "/app/models/questionnaire/questionnaireModel.php";
require ROOT . FOLDER_PATH . "/app/models/consultation/consultationModel.php";
require ROOT . FOLDER_PATH . "/app/models/settings/settingsModel.php";
// use Dompdf\Dompdf;


class consultation extends Controller
{
    protected $session;
    protected $patientModel;
    protected $questionModel;
    protected $settingsModel;
    // public $dompdf;
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
        $this->settingsModel = new settingsModel();
        // $this->dompdf = new Dompdf();
    }

    public function index()
    {

        if (isset($_GET['cod_name'])) {
            $nombre_usuario = utf8_decode(base64_decode($_GET['cod_name']));

            $id_nombre = explode('|', $nombre_usuario); /* $id_nombre[2]: id cita */
            $id_cita = $id_nombre[2];
        } else {
            $id_nombre = [];
            $id_nombre[0] = 'nothing';
            $id_cita = null;
        }

        $this->view('consultation/consultation', [
            'nombre_usuario' => $id_nombre,
            'id_cita' => $id_cita
        ]);
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
            print_r(json_encode(["Este paciente ya existe"]));
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

    public function updatePatient()
    {
        $idPaciente = $this->session->get('idPaciente');
        $idUser = $this->session->get('idUser');
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellidoPa = $_POST['apellidopa'];
        $apellidoMa = $_POST['apellidoma'];
        $fechana = $_POST['fechana'];
        $celular = $_POST['celular'];
        $correo = $_POST['correo'];
        $procedencia = $_POST['procedencia'];
        $ocupan = $_POST['ocupacionan'];
        $ocupaac = $_POST['ocupacionac'];
        $genero = $_POST['genero'];
        $resultPatient = $this->patientModel->updatePatient($idUser, $idPaciente, $dni, $nombre, $apellidoPa, $apellidoMa, $genero, $fechana, $celular, $correo, $procedencia, $ocupan, $ocupaac);
        $contPatient = $resultPatient->rowCount();
        if ($contPatient > 0) {
            echo "Se actualizó el paciente";
        } else {
            echo "No se actualizó el paciente";
        }
    }

    public function searchPatient()
    {
        $documento = $_POST['filter'];
        $namePaciente = $_POST['namePaciente'];

        if (is_string($namePaciente[0]) && strlen($namePaciente[0]) > 1) {
            $searchPatient = $this->patientModel->searchDocumentPatient($namePaciente, false);
        }
        if (strlen($documento) <= 8 && is_numeric($documento)) {
            $searchPatient = $this->patientModel->searchDocumentPatient($documento, true);
        }

        $result = $searchPatient->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $this->session->add('idPaciente', $result['Id_Paciente']);
            $idPaciente = $this->session->get('idPaciente');
            $idUser = $this->session->get("idUser");
            $idQuestionnaire = $this->questionModel->getIdQuestionnaire($idUser)->fetch(PDO::FETCH_ASSOC);
            $answers = $this->questionModel->getAnswers($idPaciente, $idQuestionnaire['Id_Cuestionario']);
            $cantidad = $answers->rowCount();
            if ($cantidad > 0) {
                $answers = $answers->fetchAll(PDO::FETCH_ASSOC);
                array_push($result, $cantidad);
                $result = array_merge($result, $answers);
            }
            $arrayJSON =  json_encode($result);
        } else {
            $error = ['No se pudo encontrar ese paciente'];
            $arrayJSON =  json_encode($error);
        }
        print_r($arrayJSON);
    }

    public function showPatients()
    {
        if (isset($_GET['q'])) {
            $busqueda = $_GET['q'];
        } else {
            $busqueda = '';
        }
        $patient = $this->patientModel->getAllPatient($busqueda);
        $json = [];
        while ($result = $patient->fetch(PDO::FETCH_ASSOC)) {
            $json[] = ['id' => $result['id'], 'text' => $result['nombres']];
        }

        $arrayJSON = json_encode($json);
        echo $arrayJSON;
    }


    public function insertAnswers()
    {
        if (isset($_POST['answers']) && $_POST['answers'] !== "") {
            $detalle = $_POST['detalle'];
            $respuestas = $_POST['answers'];

            $idPaciente = $this->session->get('idPaciente');
            $ResultAnswers = $this->questionModel->insertAnswers($detalle, $idPaciente, $respuestas);
            if ($ResultAnswers->rowCount() > 0) {
                echo "Respuestas agregadas con exito";
            } else {
                echo "No se agregaron las respuestas";
            }
        } else {
            echo "Llene los campos";
        }
    }

    public function updateAnswers()
    {
        // if (isset($_POST['answers']) && $_POST['answers'] !== "") {
        //     $detalle = $_POST['detalle'];
        //     $respuestas = $_POST['answers']; 
        //     $arrayDetalle = $detalle;
        //     $arrayRespuesta = $respuestas;
        //     $idUser = $this->session->get("idUser");
        //     $idPaciente = $this->session->get('idPaciente');
        //     $idQuestionnaire = $this->questionModel->getIdQuestionnaire($idUser)->fetch(PDO::FETCH_ASSOC);
        //     $getAnswers = $this->questionModel->getAnswers($idPaciente,$idQuestionnaire['Id_Cuestionario']);
        //     $getAnswers = $getAnswers->rowCount();
        //     $resultInsertAnswer = 0;
        //     if($getAnswers < count($respuestas)){
        //         $count = count($respuestas) - $getAnswers;
        //         $cant = count($respuestas) - $count;
        //         $insertDetalle = array_splice($arrayDetalle,$cant,$count);
        //         $insertAnswer = array_splice($arrayRespuesta,$cant,$count);              
        //         $resultInsertAnswer = $this->questionModel->insertAnswers($insertDetalle,$idPaciente,$insertAnswer);
        //         $resultInsertAnswer = $resultInsertAnswer->rowCount();
        //     }
        //     $updateAnswers = $this->questionModel->updateAnswers($detalle, $idPaciente, $respuestas);
        //         if ($updateAnswers > 0 || $resultInsertAnswer > 0) {
        //             echo "Sus respuestas fueron actualizadas";
        //         } else {
        //             echo "No se actualizaron las respuestas";
        //         }
        // } else {
        //     echo "Llene los campos";
        // }

        /** Test */
        if (isset($_POST['answers']) && $_POST['answers'] !== "") {
            $detalle = $_POST['detalle'];
            $respuestas = $_POST['answers'];
            $arrayDetalle = $detalle;
            $arrayRespuesta = $respuestas;
            $idUser = $this->session->get("idUser");
            $idPaciente = $this->session->get('idPaciente');
            $idQuestionnaire = $this->questionModel->getIdQuestionnaire($idUser)->fetch(PDO::FETCH_ASSOC);
            $getAnswers = $this->questionModel->getAnswers($idPaciente, $idQuestionnaire['Id_Cuestionario']);
            $countAnswers = $getAnswers->rowCount();
            if ($countAnswers > 0) {
                $getAnswers = $getAnswers->fetchAll(PDO::FETCH_ASSOC);
                for ($i = 0; $i < count($getAnswers); $i++) {
                    $arrayID[$i] = array_search($getAnswers[$i]['Id_Detalle_Cuestionario'], $arrayDetalle);
                }
            }
            $resultInsertAnswer = 0;
            if ($countAnswers < count($respuestas) ) {
                $j = 0;
                for ($i = 0; $i < count($arrayDetalle); $i++) {
                    if(!isset($arrayID)){
                        $insertDetalle[$j] = $arrayDetalle[$i];
                        $insertAnswer[$j] = $arrayRespuesta[$i];
                        $j++;
                    }
                    else {
                        if(!in_array($i, $arrayID)){
                            $insertDetalle[$j] = $arrayDetalle[$i];
                            $insertAnswer[$j] = $arrayRespuesta[$i];
                            $j++;
                        }
                    }
                }

                $resultInsertAnswer = $this->questionModel->insertAnswers($insertDetalle, $idPaciente, $insertAnswer);
                $resultInsertAnswer = $resultInsertAnswer->rowCount();
            }
            $updateAnswers = $this->questionModel->updateAnswers($detalle, $idPaciente, $respuestas);
            if ($updateAnswers > 0 || $resultInsertAnswer > 0) {
                echo "Sus respuestas fueron actualizadas";
            } else {
                echo "No se actualizaron las respuestas";
            }
        } else {
            echo "Llene los campos";
        }
    }

    public function getHistoryPred()
    {
        $idUser = $this->session->get("idUser");

        $resultHistory = $this->settingsModel->getHistoryPred($idUser);
        $result = $resultHistory->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insertClinicalTest(){
        
        if(isset($_POST['ic']) || !empty($_POST['ic'])){
            if ($_POST['ic'] === 'undefined') {
                $idCita = null;
            } else {
                $idCita = $_POST['ic'];
            }
        }else{
            $idCita = null;
        }
        $idUser = $this->session->get("idUser");
        $idPaciente = $this->session->get('idPaciente');
        $anamnesis_clinical = $_POST['anamnesis-clinical'];
        $examen_clinical = $_POST['examen-clinical'];
        $examenes_clinical = $_POST['examenes-clinical'];
        $diagnostico_clinical = $_POST['diagnostico-clinical'];
        $tratamiento_clinical = $_POST['tratamiento-clinical'];
        if (isset($_FILES["file"]["name"][0]) || !empty($_FILES["file"]["name"][0])) {
            $filter = $_FILES["file"]["name"][0];
        } else {
            $filter = null;
        }
        
        $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/files/images/';
        $imagen_destinoDoc = ROOT . FOLDER_PATH . '/src/assets/files/docs/';
        $imagen_destinoPdf = ROOT . FOLDER_PATH . '/src/assets/files/pdfs/';
        if(!file_exists($imagen_destino)){
            mkdir($imagen_destino);
        }
        if(!file_exists($imagen_destinoDoc)){
            mkdir($imagen_destinoDoc);
        }
        if(!file_exists($imagen_destinoPdf)){
            mkdir($imagen_destinoPdf);
        }


        if ($filter !== null) {
            for ($i=0; $i < count($_FILES["file"]["name"]); $i++) { 
                $microseconds2 = microtime(true);
                $microseconds2 = str_replace('.', '', $microseconds2);
                $rand = rand(100000,999999);
                $nameImageBD[$i] = date("y" . "d" . "m") . date("h" . "i" . "s") . $rand . $microseconds2 . "." . basename($_FILES["file"]["type"][$i]);

                $file_tmp[$i] = $_FILES["file"]["tmp_name"][$i];
                $imagen_size[$i] = $_FILES["file"]["size"][$i];
                $imagen_type[$i] = $_FILES["file"]["type"][$i];
                $imagen_name[$i] = $_FILES["file"]["name"][$i];
                if($imagen_type[$i] === 'application/pdf'){
                    $ruta[$i] = 'src/assets/files/pdfs/' . $nameImageBD[$i]; 
                    $imagen_type[$i] = 3;
                    while(file_exists($ruta[$i])){
                        $nameImageBD[$i] = date("y" . "d" . "m") . date("h" . "i" . "s") . $rand . $microseconds2 . "." . basename($_FILES['file']['type'][$i]);
                        $ruta[$i] = 'src/assets/files/pdfs/' . $nameImageBD[$i];
                    }
                    $nameImage[$i] = $imagen_name[$i];
                    move_uploaded_file($file_tmp[$i], $ruta[$i]);
                    $imagen_bd[$i] = $ruta[$i];   
                }else if($imagen_type[$i] === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
                    $ruta[$i] = 'src/assets/files/docs/' . $nameImageBD[$i]; 
                    $imagen_type[$i] = 4;
                    while(file_exists($ruta[$i])){
                        $nameImageBD[$i] = date("y" . "d" . "m") . date("h" . "i" . "s") . $rand . $microseconds2 . "." . basename($_FILES['file']['type'][$i]);
                        $ruta[$i] = 'src/assets/files/docs/' . $nameImageBD[$i];
                    }
                    $nameImage[$i] = $imagen_name[$i];
                    $ruta[$i] = str_replace(".vnd.openxmlformats-officedocument.wordprocessingml.document",".docx",$ruta[$i]); 
                    move_uploaded_file($file_tmp[$i], $ruta[$i]);
                    $imagen_bd[$i] = $ruta[$i];
                }else if($imagen_type[$i] === 'application/msword'){
                    $ruta[$i] = 'src/assets/files/docs/' . $nameImageBD[$i]; 
                    $imagen_type[$i] = 4;
                    while(file_exists($ruta[$i])){
                        $nameImageBD[$i] = date("y" . "d" . "m") . date("h" . "i" . "s") . $rand . $microseconds2 . "." . basename($_FILES['file']['type'][$i]);
                        $ruta[$i] = 'src/assets/files/docs/' . $nameImageBD[$i];
                    }
                    $nameImage[$i] = $imagen_name[$i];
                    $ruta[$i] = str_replace(".msword",".doc",$ruta[$i]);  
                    move_uploaded_file($file_tmp[$i], $ruta[$i]);
                    $imagen_bd[$i] = $ruta[$i];  
                }else if($imagen_type[$i] === 'image/jpeg' || $imagen_type[$i] === 'image/jpg'){
                    $ruta[$i] = 'src/assets/files/images/' . $nameImageBD[$i]; 
                    $imagen_type[$i] = 1;
                    while(file_exists($ruta[$i])){
                        $nameImageBD[$i] = date("y" . "d" . "m") . date("h" . "i" . "s") . $rand . $microseconds2 . "." . basename($_FILES['file']['type'][$i]);
                        $ruta[$i] = 'src/assets/files/images/' . $nameImageBD[$i];
                    }
                    $nameImage[$i] = $imagen_name[$i];
                    move_uploaded_file($file_tmp[$i], $ruta[$i]);
                    $imagen_bd[$i] = $ruta[$i];
                }else if($imagen_type[$i] === 'image/png'){
                    $ruta[$i] = 'src/assets/files/images/' . $nameImageBD[$i]; 
                    $imagen_type[$i] = 2;
                    while(file_exists($ruta[$i])){
                        $nameImageBD[$i] = date("y" . "d" . "m") . date("h" . "i" . "s") . $rand . $microseconds2 . "." . basename($_FILES['file']['type'][$i]);
                        $ruta[$i] = 'src/assets/files/images/' . $nameImageBD[$i];
                    }
                    $nameImage[$i] = $imagen_name[$i];
                    move_uploaded_file($file_tmp[$i], $ruta[$i]);
                    $imagen_bd[$i] = $ruta[$i];
                }
            }
            $result = $this->settingsModel->insertClinicalTest($idPaciente,$idUser,$idCita,$anamnesis_clinical,$examen_clinical,$examenes_clinical,$diagnostico_clinical,$tratamiento_clinical,$imagen_bd,$nameImage,$imagen_size,$imagen_type);
        }else{
            $result = $this->settingsModel->insertClinicalTest($idPaciente,$idUser,$idCita,$anamnesis_clinical,$examen_clinical,$examenes_clinical,$diagnostico_clinical,$tratamiento_clinical,$imagen_bd = null,$nameImage = null,$imagen_size = null,$imagen_type = null);
        }

        return $result;
    }

    public function updateClinicalTest()
    {
        $idUser = $this->session->get("idUser");
        $idPaciente = $this->session->get('idPaciente');
        $anamnesis_clinical = $_POST['anamnesis-clinical'];
        $examen_clinical = $_POST['examen-clinical'];
        $examenes_clinical = $_POST['examenes-clinical'];
        $diagnostico_clinical = $_POST['diagnostico-clinical'];
        $tratamiento_clinical = $_POST['tratamiento-clinical'];
        $lastIDClinicalTest = $this->settingsModel->getIDClinicalTest($idPaciente)->fetch(PDO::FETCH_ASSOC);
        $resultUpdateClinicalTest = $this->settingsModel->updateClinicalTest($lastIDClinicalTest['Id_historia_clinica'], $anamnesis_clinical, $examen_clinical, $examenes_clinical, $diagnostico_clinical, $tratamiento_clinical);
        $resultUpdateClinicalTest = $resultUpdateClinicalTest->rowCount();
        if ($resultUpdateClinicalTest > 0) {
            echo "Se actualizó la prueba clinica";
        } else {
            echo "No se pudo actualizar la prueba clinica";
        }
    }

    public function createPrintHistoryMedical()
    {
        $idUser = $this->session->get("idUser");
        $idPaciente = $this->session->get('idPaciente');
        // $NameDoctor = $this->session->get('Nombres');
        // $NameDoctor = $this->session->get('Apellidos');
        // $NameDoctor = $this->session->get('Especialidad');
        $resultPrint = $this->settingsModel->getIDClinicalTest($idPaciente)->fetch(PDO::FETCH_ASSOC);
        $array_json = json_encode($resultPrint);
        print_r($array_json);
    }

    public function citas()
    {
        $fecha = $_POST['fecha'];

        $usu_cod = $this->session->get('admin');
        $ResultAnswers = $this->model->lista_citas_paciente($fecha, $usu_cod);
        echo '
            
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Edad</th>
                <th>Hora atención</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        
        ';
        while ($datos_cita = $ResultAnswers->fetch()) {

            $birthDate = explode("-", $datos_cita['fecha_nac']);
            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                ? ((date("Y") - $birthDate[0]) - 1)
                : (date("Y") - $birthDate[0]));

            if ($datos_cita['estado'] == 0) {
                $estado = "En espera";
                $css = "#b90000";
            }
            if ($datos_cita['estado'] == 1) {
                $estado = "Atendido";
                $css = "#008c44";
            }

            echo '
            
                <tr>
                    <td>' . $datos_cita['nombre'] . ' ' . $datos_cita['apellidos'] . '</td>
                    <td class="text-center">' . $age . ' años</td>
                    <td class="text-center">' . date("h:i A", strtotime($datos_cita['fecha_atencion'])) . '</td>
                    <td class="text-center" style="color: ' . $css . ';">' . $estado . '</td>
                </tr>
            
            ';
        }

        echo '
    
        </tbody>
        <tfoot>
            <tr>
                <th>Paciente</th>
                <th>Edad</th>
                <th>Hora atención</th>
                <th>Estado</th>
            </tr>
        </tfoot>
        
        ';
    }

    public function redirect()
    {
        $this->session->close();
        echo ("<script>location.href = '" . FOLDER_PATH . "/my';</script>");
    }

    public function consultas()
    {
        $paciente = $_POST['paciente'];

        $usu_cod = $this->session->get('admin');
        $ResultAnswers = $this->model->lista_historia_clinica($paciente, $usu_cod);
        $count = 0;
        while ($datos_consulta = $ResultAnswers->fetch()) {

            $birthDate = explode("-", $datos_consulta['fecha_nacimiento']);
            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                ? ((date("Y") - $birthDate[0]) - 1)
                : (date("Y") - $birthDate[0]));

            $count += 1;
            echo '
                <tr>
                    <td>' . $datos_consulta['nombre_paciente'] . '</td>
                    <td>' . $age . '</td>
                    <td>' . date("Y-m-d", strtotime($datos_consulta['fecha_consulta'])) . '</td>
                    <td>' . date("H:i", strtotime($datos_consulta['fecha_consulta'])) . '</td>
                    <td>' . $datos_consulta['num_archivo'] . '</td>
                    <td>' . $datos_consulta['num_imagen'] . '</td>
                    <td class="text-center">
                        <div role="group" class="btn-group-sm btn-group">
                            <button id="details_' . $count . '" onclick="GetDetailsCon(' . $count . ')" meta-data="{' . base64_encode(utf8_encode("[" . $count . "]|" . $datos_consulta["id_historia"] . "-data-history-details")) . '}" data-toggle="modal" data-target="#AppDetails" class="btn-shadow btn btn-warning text-white"><i class="fa fa-eye"></i> Detalle</button>
                            <button class="btn-shadow btn btn-danger"><i class="fa fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            ';
        }
    }

    public function load_users()
    {
        $this->mostrar_users = $this->model->mostrar_paciente($_POST["nom_user"], $this->session->get('admin'));

        $datos = '';
        $DatosDep_array = [];
        while ($mostrar_users = $this->mostrar_users->fetch()) {
            $DatosDep_array[] = array(
                "id" => $mostrar_users[1],
                "name" => $mostrar_users[1]
            );
        }
        $DatosDep = array("users" => ($DatosDep_array));
        $out = json_encode($DatosDep);
        echo $out;
    }


    public function search()
    {
        $search = $_POST['search'];
        $filter = $_POST['filter'];
        $lista_citas = $this->model->buscar_citas($search, $filter, $this->session->get('admin'));

        echo '
            
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Edad</th>
                <th>Hora atención</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        
        ';
        
        while ($datos_lista_cita = $lista_citas->fetch()) {

            $birthDate = explode("-", $datos_lista_cita['fenac']);
            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                ? ((date("Y") - $birthDate[0]) - 1)
                : (date("Y") - $birthDate[0]));

            if ($datos_lista_cita['estado'] == 0) {
                $estado = "Por atender";
                $css = "#b90000";
            }
            if ($datos_lista_cita['estado'] == 1) {
                $estado = "Atendido";
                $css = "#008c44";
                /* <td class="text-center" style="color: ' . $css . ';">' . $estado . '</td> */
            }
            
            echo '
      
            <tr>
                <td>' . $datos_lista_cita['nombre'] . ' ' . $datos_lista_cita['apepa'] . ' ' . $datos_lista_cita['apema'] . '</td>
                <td class="text-center">' . $age . ' años</td>
                <td class="text-center">' . date("h:i A", strtotime($datos_lista_cita['fechacita'])) . '</td>
                <td class="text-center" style="color: ' . $css . ';">' . $estado . '</td>
            </tr>
            
            ';
        }

        echo '
    
        </tbody>
        <tfoot>
            <tr>
                <th>Paciente</th>
                <th>Edad</th>
                <th>Hora atención</th>
                <th>Estado</th>
            </tr>
        </tfoot>
        
        ';
    }

    // public function createPDFPrinter(){
    //     $this->dompdf->loadHTML('<h1>HOLA MUNDO</h1>');
    //     $this->dompdf->setPaper('A4', 'landscape');
    //     $this->dompdf->render();
    //     // (Optional) Setup the paper size and orientation
    //     // Output the generated PDF to Browser
    //     $this->dompdf->stream();
    // }


    public function save_appointment()
    {

        $datecita = $_POST["datecita"];
        $timecita = $_POST["timecita"];
        $dnipaciente = $_POST["dnipaciente"];

        $timecita = $timecita . ':00';

        $this->model->insertar_cita($datecita, $timecita, $dnipaciente, $this->session->get('admin'));
    }


    public function show_details()
    {
        $history = $_POST['meta_data'];
        $history = str_replace('{', '', $history);
        $history = str_replace('}', '', $history);

        $history = utf8_decode(base64_decode($history));
        $history = str_replace('-data-history-details', '', $history);

        $cod_history = explode("|", $history);

        $json = array();
        $lista_historys = $this->model->obtener_details($cod_history[1], $this->session->get('admin'));

        while ($details = $lista_historys->fetch()) {
            $json[] = $details;
        }
        $json[1] = FOLDER_PATH . "/details/" . base64_encode(utf8_encode("[" . $json[0][0] . "]|show-data-history-details"));
        $json[0]["id"] = base64_encode(utf8_encode("[" . $json[0][0] . "]|show-data-history-details"));
        $json[0][0] = base64_encode(utf8_encode("[" . $json[0][0] . "]|show-data-history-details"));

        echo (json_encode($json));
    }
}
