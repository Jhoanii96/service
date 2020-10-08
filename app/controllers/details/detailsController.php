<?php

require ROOT . FOLDER_PATH . "/app/models/details/detailsModel.php";
require ROOT . FOLDER_PATH . "/system/libs/Session.php";

class details extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = new Session;
        $this->session->getAll();

        if (empty($this->session->get('admin'))) {
            echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
        }

        $this->model = new detailsModel();
    }

    public function index($history = '')
    {
        if ($history == '') {
            echo ("<script>location.href = '" . FOLDER_PATH . "/my';</script>");
        }

        $history = utf8_decode(base64_decode($history));
        $history = str_replace('show-data-history-details', '', $history);
        $history = str_replace('[', '', $history);
        $history = str_replace(']', '', $history);

        $cod_history = explode("|", $history);
        
        $datos_details = $this->model->mostrar_detalle_historial($cod_history[0], $this->session->get('admin'));
        $usu_cod = $this->session->get('admin');
        $enabled = $this->model->fecha_habilitado($usu_cod);
        $this->AdminView('details/details', [
            'datos_details' => $datos_details, 
            'Enabled' => $enabled 
        ]);
    }

    public function Get_Files($historyId, $type)
    {
        
        return $this->model->mostrar_archivo_historial($historyId, $type, $this->session->get('admin'));

    }
}
