<?php
require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/help/helpModel.php";

class help extends Controller
{

  protected $session;

  public function __construct(){
    $this->session = new Session;
    $this->session->getAll();

    if (!$this->session->get('admin')) {
      echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
    }
    $this->helpModel = new helpModel();
    
  }

  public function index(){
    $usu_cod = $this->session->get('admin');
    $enabled = $this->helpModel->fecha_habilitado($usu_cod);
    $this->view('help/help',[
      'Enabled' => $enabled 
    ]);
  }

  // public function sendHelp(){
  //   $idUser = $this->session->get('idUser');
  //   $file = $_FILES['file'];
  //   $titulo = $_POST['asunto'];
  //   $descripcion = $_POST['message'];
  //   if((isset($titulo) && !empty($titulo)) && (isset($descripcion) && !empty($descripcion)) && (isset($file['name']) && !empty($file['name']))){
      
  //     $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/files/images/help';
      
  //     if(!file_exists($imagen_destino)){
  //         mkdir($imagen_destino);
  //     }
      
  //     $microseconds2 = microtime(true);
  //     $microseconds2 = str_replace('.', '', $microseconds2);
  //     $rand = rand(100000,999999);
  //     $nameImageBD = date("y" . "d" . "m") . date("h" . "i" . "s") . $rand . $microseconds2 . "." . basename($file["type"]);
      
  //     $file_tmp = $file["tmp_name"];
  //     $imagen_size = $file["size"];
  //     $imagen_type = $file["type"];
  //     $imagen_name = $file["name"];

  //     $ruta = 'src/assets/files/images/help/' . $nameImageBD;
  //     while(file_exists($ruta)){
  //       $nameImageBD = date("y" . "d" . "m") . date("h" . "i" . "s") . $rand . $microseconds2 . "." . basename($file['type']);
  //       $ruta = 'src/assets/files/images/help/' . $nameImageBD;
  //     }
  //     $nameImage = $imagen_name;
  //     move_uploaded_file($file_tmp, $ruta);
  //     $imagen_bd = $ruta;

  //     $result = $this->helpModel->sendHelp($titulo,$descripcion,$idUser,$imagen_bd);
  //   }else{
  //     $result = $this->helpModel->sendHelp($titulo,$descripcion,$idUser,$imagen_bd = null);
  //   }
  //   $rowAffected = $result->rowCount(); 

  //   if($rowAffected > 0){
  //     echo "Se envió con exito la ayuda";
  //   }else{
  //     echo "No se pudo enviar";
  //   }
  // }
}
?>