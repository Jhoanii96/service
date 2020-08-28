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

        $this->AdminView('details/details', [
            'datos_details' => $datos_details
        ]);
    }

    public function get_files()
    {
        $cod = $_POST['meta_data'];
        
        /* $history = utf8_decode(base64_decode($history));
        $history = str_replace('show-data-history-details', '', $history);
        $history = str_replace('[', '', $history);
        $history = str_replace(']', '', $history); */

        /* $cod_history = explode("|", $history); */
        
        $datos_details = $this->model->mostrar_archivo_historial($cod, $this->session->get('admin'));

        
    }
}
