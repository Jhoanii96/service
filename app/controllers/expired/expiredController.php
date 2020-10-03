<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/expired/expiredModel.php";

class expired extends Controller
{
	protected $session;

	public function __construct()
	{
		$this->session = new Session;
		$this->session->getAll();

		if (empty($this->session->get('admin'))) {
			echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
		}
		
		$this->model = new expiredModel();
	}

	public function index()
	{
        $datos = $this->model->data_user($this->session->get('admin'));
		$this->view('expired/expired', ['datos_usuario' => $datos]);
	}


}
