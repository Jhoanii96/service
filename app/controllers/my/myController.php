<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/perfil/perfilModel.php";
require ROOT . FOLDER_PATH . "/app/models/tipado/tipadoModel.php";
require ROOT . FOLDER_PATH . "/app/models/questionnaire/questionnaireModel.php";
require ROOT . FOLDER_PATH . "/app/models/my/myModel.php";

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
        $this->model = new myModel();
    
    }

    public function index()
    {
        $usu_cod = $this->session->get('admin');
        $Result = $this->model->lista_historia_clinica($usu_cod);
        $this->view('my/my', [
            'Result' => $Result
        ]);
    }


    public function updateStateProfile()
    {

        $res = $this->perfilModel->updateStateProfile($this->session->get('admin'));
        $count = $res->rowCount();
        if($count > 0){
            echo "Se agrego con exito";
        }else{
            echo "No paso nada";
        }
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
        // $tiempoatencion = $_POST['tiempoatencion'];
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
            // $this->session->add('idCuestionario',$idCuestionario['Id_Cuestionario']);
            // $resQuestion->fetch();
        } else {
            $questionnaire = $this->questionnaireModel->createQuestionnaire($idUser);
            // $questionnaire->fetch();
            $idLastInsert = $this->questionnaireModel->getIdQuestionnaire($idUser)->fetch();
            $questionResult =  $this->questionnaireModel->insertQuestion($idLastInsert['Id_Cuestionario'], $question);
            // $questionResult->fetch();
        }
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
      
      echo(json_encode($json));
    }

    public function notifications(){
        $idUser = $this->session->get('idUser');
        $notifications = $this->model->notifications($idUser);
        $cantNotifications = $notifications->rowCount();
        if($cantNotifications > 0){
            $resultNotifications = $notifications->fetchAll(PDO::FETCH_ASSOC);
            $resp = json_encode($resultNotifications);
        }else{
            $resp = ['no hay resultados'];
            $resp = json_encode($resp);
        }
        print_r($resp);
    }

    public function updateStateAllNotifications(){
        $notifications = $this->model->updateStateAllNotifications();
        $cantNotifications = $notifications->rowCount();
        if($cantNotifications > 0){
            echo "Se actualizaron todas las notificaciones";
        }else{
            echo "No se actualizaron";
        }
    }
}
