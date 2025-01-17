<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/notifications/notificationsModel.php";

class notifications extends Controller
{

  protected $session;
  public $notification;

  public function __construct()
  {
    $this->session = new Session;
    $this->session->getAll();
    $this->notification = new notificationModel();

    if (empty($this->session->get('admin'))) {
      echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
    }
  }

  public function index()
  {
    $enabled = $this->notification->fecha_habilitado($this->session->get('admin'));
    $this->view('notifications/notifications', [
      'Enabled' => $enabled
    ]);
  }

  public function showNotifications()
  {
    $idUser = $this->session->get('idUser');
    $notifications = $this->notification->showNotifications($idUser);
    $cantNotifications = $notifications->rowCount();
    if ($cantNotifications > 0) {
      $resultNotifications = $notifications->fetchAll(PDO::FETCH_ASSOC);
    } else {
      $resultNotifications = null;
    }
    return $resultNotifications;
  }

  public function transformDate($fechaBd){

    $fechaActual = strtotime(date("Y-m-d H:i:s"));
    $fechaBd = strtotime($fechaBd);
    $diff = $fechaActual - $fechaBd;
    $hours = $diff/(60*60);
    if($hours < 1){
      $minutes = round($hours*60);
      return $minutes > 1 ? $minutes .' minutos': $minutes .' minuto';
    }else if($hours < 24){
      $hours = round($hours);
      return $hours .' horas';
    }else{
      $hours = round($hours/24).' dias';
      return $days = $hours;
    }
  }

  public function updateStateNotification(){
    $idMensaje = $_POST['id'];
    $checked = $_POST['state'];
    $resultMensajes =  $this->notification->updateStateNotification($idMensaje,$checked);
    $resultMensajes = $resultMensajes->rowCount();
    if($resultMensajes > 0){
      echo "Ha leido el mensaje";
    }else{
      echo "No ha leido el mensaje";
    }
  }
}
