<?php

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/reports_list/reports_listModel.php";

class reports_list extends Controller
{
  protected $session;

  public function __construct()
  {
    $this->session = new Session;
    $this->session->getAll();

    if (empty($this->session->get('admin'))) {
      echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
    }

    $this->model = new reports_listModel();
  }

  public function index()
  {
    $usu_cod = $this->session->get('admin');
    $Result = $this->model->lista_historia_clinica($usu_cod);
    $enabled = $this->model->fecha_habilitado($usu_cod);
    $this->view('reports_list/reports_list', [
      'Result' => $Result, 
      'Enabled' => $enabled 
    ]);
  }

  public function search()
  {
    $search = $_POST['search'];
    $filter = $_POST['filter'];
    $lista_historial = $this->model->buscar_citas($search, $filter, $this->session->get('admin'));

    $count = 0;

    $resultado = array();

    $resultado[0] = "";
    $resultado[1] = 0;
    $resultado[2] = 0;
    $resultado[0] .= '
    
    <thead>
        <tr>
            <th>Paciente</th>
            <th>Edad</th>
            <th>Fecha consultado</th>
            <th>Hora consultado</th>
            <th>Archivos</th>
            <th>Imagenes</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    
    ';

    while ($datos_lista_historial = $lista_historial->fetch()) {

      $nombre = $datos_lista_historial['nombre_paciente'];
      $nombre = base64_encode(utf8_encode($nombre));

      $count += 1;
      $resultado[1] = $resultado[1] + $datos_lista_historial['monto'];
      $resultado[2] += 1;
      $resultado[0] .= '
      
      <tr>
          <td>' . $datos_lista_historial['nombre_paciente'] . '</td>
          <td class="text-center">' . $datos_lista_historial['age'] . ' años</td>
          <td class="text-center">' . date("d/m/Y", strtotime($datos_lista_historial['fecha_consulta'])) . '</td>
          <td class="text-center">' . date("h:i A", strtotime($datos_lista_historial['fecha_consulta'])) . '</td>
          <td class="text-center">' . $datos_lista_historial['num_archivo'] . '</td>
          <td class="text-center">' . $datos_lista_historial['num_imagen'] . '</td>
          <td class="text-center">S/.' . number_format((float)$datos_lista_historial['monto'], 2, '.', '') . '</td>
          <td class="text-center">
              <div role="group" class="btn-group-sm btn-group">
                  <button class="btn btn-warning text-white">Detalles <i class="fa fa-eye"></i></button>
                  <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
              </div>
          </td>
      </tr>
      
      ';
    }

    
    $resultado[0] .= '
  
    </tbody>
    <tfoot>
        <tr>
            <th>Paciente</th>
            <th>Edad</th>
            <th>Fecha consultado</th>
            <th>Hora consultado</th>
            <th>Archivos</th>
            <th>Imagenes</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </tfoot>
    
    ';

    echo(json_encode($resultado));

  }
}
