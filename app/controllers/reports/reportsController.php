<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/reports/reportsModel.php";

class reports extends Controller{

  protected $session;
  protected $reportsModel;

  public function __construct(){
    $this->session = new Session;
    $this->session->getAll();

    if (empty($this->session->get('admin'))) {
      echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
    }

    $this->reportsModel = new reportsModel();
  }

  public function index(){
    $this->view('reports/reports');
  }

  public function getReport(){
    $fechaDesde = $_POST['before'];
    $fechaHasta = $_POST['after'];

    $report = $this->reportsModel->getReportMonto($fechaDesde,$fechaHasta);
    $countReport = $report->rowCount();
    if($countReport > 0){
      $report = $report->fetchAll(PDO::FETCH_ASSOC);
      $print_array = json_encode($report);
    }else{
      $print_array = json_encode(["no se encontro nada"]);
    }
    print_r($print_array);
  }
}

?>