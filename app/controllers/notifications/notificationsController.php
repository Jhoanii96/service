<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/notifications/notificationsModel.php";

class notifications extends Controller{

  protected $session;
  public $notification;

  public function __construct(){
    $this->session = new Session;
    $this->session->getAll();
    $this->notification = new notificationModel();

    if (empty($this->session->get('admin'))) {
      echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
    }
  }

  public function index(){
    $this->view('notifications/notifications');
  }

  public function showNotifications(){
    $idUser = $this->session->get('idUser');
    $notifications = $this->notification->showNotifications($idUser);
    $cantNotifications = $notifications->rowCount();
        if($cantNotifications > 0){
          $resultNotifications = $notifications->fetchAll(PDO::FETCH_ASSOC);   
        }else{
          $resultNotifications = null;
        }
      return $resultNotifications;
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

?>