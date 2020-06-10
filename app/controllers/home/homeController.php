<?php
require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/" . DATA . "admin/autoload" . DATAI . "php";
require ROOT . FOLDER_PATH . "/" . DATA . "user/autoload" . DATAI . "php";

class home extends Controller
{
  private $session;

  public function index()
  {

    $this->session = new Session;
    $this->session->getAll();

    if (empty($this->session->get('usuarioUsi')) || $this->session->get('usuarioUsi') == "" || $this->session->get('usuarioUsi') == NULL) {
      header("Location: " . FOLDER_PATH . "/login");
    }

    @$admin = $this->session->get('usuarioUsi');

    $this->dataUser = new dataAdmin();
    @$parametro = $this->dataUser->data_user($admin);
    $this->datos_usu = $parametro->fetch();
    /* PARA EL ADMINISTRADOR Y EL TÉCNICO */
    if (
      $this->datos_usu['nombreTipo'] == 'Super Administrador' ||
      $this->datos_usu['nombreTipo'] == 'Administrador' ||
      $this->datos_usu['nombreTipo'] == 'Técnico'
    ) {

      $this->dataAdmin = new dataAdmin();
      $this->parametro1 = $this->dataAdmin->mostrarTablaSolicitud('0');
      $this->NumSoli = $this->dataAdmin->NumeroSolicitud();
      $this->EnLinea = $this->dataAdmin->NumeroLinea();
      $this->NumUsu = $this->dataAdmin->MiembroTotal();
      $this->NueMiem = $this->dataAdmin->NuevosMiembros();
      $this->BellNtf = $this->dataAdmin->BellNotifications();

      $this->view('home/homeAdmin', [
        'nombre' => $this->datos_usu['nombre'],
        'apellido' => $this->datos_usu['apellido'],
        'tipouser' => $this->datos_usu['nombreTipo'],
        'online' => 'online',
        'tsolicitud' => $this->parametro1,
        'NumSoli' => $this->NumSoli,
        'EnLinea' => $this->EnLinea,
        'NumUsu' => $this->NumUsu,
        'NueMiem' => $this->NueMiem,
        'BellNtf' => $this->BellNtf, 
        'foto' => $this->datos_usu['foto']
      ]);
      
      /* PARA LOS ADMINISTRATIVOS */
    } elseif ($this->datos_usu['nombreTipo'] == 'Personal Administrativo') {

      $this->dataUsuario = new dataUser();
      $this->dataAdmin = new dataAdmin();
      $this->parametro2 = $this->dataUsuario->mostrarTablaSolicitud($this->session->get('usuarioUsi'));
      $this->BellNtf = $this->dataAdmin->BellNotifications();

      $this->view('home/homeUser', [ 
        'id' => $this->datos_usu['id'],
        'nombre' => $this->datos_usu['nombre'],
        'apellido' => $this->datos_usu['apellido'],
        'tipouser' => $this->datos_usu['nombreTipo'],
        'online' => 'online',
        'tsolicitud' => $this->parametro2,
        'BellNtf' => $this->BellNtf, 
        'foto' => $this->datos_usu['foto']
      ]);
    }

    //$this->model = new homeModel();
    //$this->parametro1 = $this->model->mostrar_noticiasRecientes();
    //$this->parametro2 = $this->model->mostrar_noticiasAntiguas();

    //$this->view('home/homeAdmin' /*, ['noticiasRecientes' => $this->parametro1, 'noticiasAntiguas' => $this->parametro2] */);

  }



  public function notifications()
  {

    $this->dataAdmin = new dataAdmin();
    $this->BellNtf = $this->dataAdmin->BellNotifications();

    echo '
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <span class="label label-warning">N</span>
      </a>
      <ul class="dropdown-menu">
        <li class="header">Notificaciones</li>
        <li>
          <!-- inner menu: contains the actual data -->
          <ul class="menu">';

    while ($datoBellNotificacion = $this->BellNtf->fetch()) {

      if ($datoBellNotificacion['tipo_n'] == 'Solicitud') {
        echo '
            <li>
                <a href="' . FOLDER_PATH . '/detalle/' . $datoBellNotificacion['idcod_n'] . '" target="_blank">
                    <i class="fa fa-file text-green"></i> ' . $datoBellNotificacion['nombre_n'] . '
                </a>
            </li>
        ';
      } elseif ($datoBellNotificacion['tipo_n'] == 'Usuario') {
        echo '
            <li>
                <a href="' . FOLDER_PATH . '/usuarios/edit/admin/' . $datoBellNotificacion['idcod_n'] . '" target="_blank">
                    <i class="fa fa-user text-aqua"></i> ' . $datoBellNotificacion['nombre_n'] . '
                </a>
            </li>
        ';
      }

      
    }

    echo '
          </ul>
        </li>
        
      </ul>
    ';

    /* <li>
                    <a href="#">
                      <i class="fa fa-file text-green"></i> 15 resoluciones hechas
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> 3 Usuarios han cambiado sus datos
                    </a>
                  </li>  */
  }

  public function notificationsAdministrativo()
  {

    $cod_admin = $_POST['cdAdm'];
    $this->dataAdmin = new dataAdmin();
    $this->BellNtf = $this->dataAdmin->BellNotificationsAdmin($cod_admin);

    echo '
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <span class="label label-warning">N</span>
      </a>
      <ul class="dropdown-menu">
        <li class="header">Notificaciones</li>
        <li>
          <!-- inner menu: contains the actual data -->
          <ul class="menu">';

    while ($datoBellNotificacion = $this->BellNtf->fetch()) {

        echo '
            <li>
                <a href="' . FOLDER_PATH . '/detalle/' . $datoBellNotificacion['idcod_n'] . '" target="_blank">
                    <i class="fa fa-file text-green"></i> ' . $datoBellNotificacion['nombre_n'] . '
                </a>
            </li>
        ';
      
    }

    echo '
          </ul>
        </li>
        
      </ul>
    ';

    /* <li>
                    <a href="#">
                      <i class="fa fa-file text-green"></i> 15 resoluciones hechas
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> 3 Usuarios han cambiado sus datos
                    </a>
                  </li>  */
  }

  public function nuser()
  {

    $this->dataAdmin = new dataAdmin();
    $this->NumUsu = $this->dataAdmin->MiembroTotal();

    while ($datoNumUsuario = $this->NumUsu->fetch()) {

      echo $datoNumUsuario['num_usuario'];

    }

  }

  public function list()
  {

    $this->session = new Session;
    $this->session->getAll();

    $this->dataUser = new dataAdmin();
    @$parametro = $this->dataUser->data_user($this->session->get('usuarioUsi'));
    $this->datos_usu = $parametro->fetch();

    $this->dataAdmin = new dataAdmin();
    $this->parametro1 = $this->dataAdmin->mostrarTablaSolicitud('0');

    echo '<script type="text/javascript">','';
     
    
    echo 'var dataTable = $(\'#example1\').dataTable();',
        'dataTable.fnClearTable();';


    while ($datosTSolicitud = $this->parametro1->fetch()) {
    
      if ($datosTSolicitud['estado'] == '0') {
        $estado = 'En espera';
        $color = '#007a80';
      } elseif ($datosTSolicitud['estado'] == '1') {
        $estado = 'Atendido';
        $color = '#1400d2';
      } elseif ($datosTSolicitud['estado'] == '2') {
        $estado = 'En observación';
        $color = '#650080';
      } elseif ($datosTSolicitud['estado'] == '3') {
        $estado = 'Anulado';
        $color = '#9e0707';
      }
    
      echo 'dataTable.fnAddData([
        \'' . $datosTSolicitud['nums'] . '\',
        \'<span title="' . $datosTSolicitud['fecha'] . '">' . $datosTSolicitud['fecha'] . '</span>\',
        \'' . $datosTSolicitud['nombre'] . '\',
        \'' . $datosTSolicitud['tipo'] . '\',
        \'' . $datosTSolicitud['usuario'] . '\',
        \'' . $datosTSolicitud['oficina'] . '\',
        \'<p id="data_color-' . $datosTSolicitud['nums'] . '" align="center" style="background-color: ' . $color . ';color: white;white-space: nowrap; padding: 0px 4px;">' . $estado . '</p>\',
        \'<a href="' . FOLDER_PATH . '/detalle/' . $datosTSolicitud['nums'] . '" style="text-decoration: underline;color: #0020c5;">Ver detalle</a>\',';

        if ($this->datos_usu['nombreTipo'] == 'Super Administrador' || $this->datos_usu['nombreTipo'] == 'Administrador') {
          echo '
            \'<div style="display: flex;padding: 8px 34%;">',
                '<form method="post">',
                  '<input style="display: none" name="admi" value="' . $datosTSolicitud['nums'] . '">',
                  '<button id="btndlt-' . $datosTSolicitud['nums'] . '" type="button" title="Anular incidencia" class="btn btn-block btn-danger" style="padding: 2px 8px;" onclick="deleteAdm(' . $datosTSolicitud['nums'] . ')">',
                    '<span class="fa fa-times"></span>',
                  '</button>',
                '</form>',
              '</div>',
            '\']);';
        } elseif ($this->datos_usu['nombreTipo'] == 'Técnico') {
          echo '
            \'<div style="display: flex;">',
                '<a href="#" title="Atender incidencia" style="margin-right: 7px;">',
                  '<button id="btnatnd-' . $datosTSolicitud['nums'] . '" type="button" data-value="' . $datosTSolicitud['nums'] . '" class="btn btn-block btn-success" style="padding: 2px 6px;" onclick="AtendSolc(' . $datosTSolicitud['nums'] . ')">',
                    '<span class="fa fa-check"></span>',
                  '</button>',
                '</a>',
                '<form method="post" style="margin-right: 7px;">',
                  '<input style="display: none" name="admi" value="' . $datosTSolicitud['nums'] . '">',
                  '<button id="btnobs-' . $datosTSolicitud['nums'] . '" type="button" title="Poner en observación" class="btn btn-block btn-info" style="padding: 2px 6px;" onclick="ObservSolc(' . $datosTSolicitud['nums'] . ')">',
                    '<span class="fa fa-eye"></span>',
                  '</button>',
                '</form>',
                '<form method="post">',
                  '<input style="display: none" name="admi" value="' . $datosTSolicitud['nums'] . '">',
                  '<button id="btnanl-' . $datosTSolicitud['nums'] . '" type="button" title="Anular incidencia" class="btn btn-block btn-danger" style="padding: 2px 8px;" onclick="AnulSolc(' . $datosTSolicitud['nums'] . ')">',
                    '<span class="fa fa-times"></span>',
                  '</button>',
                '</form>',
                '<div id="spinner-aoa-' . $datosTSolicitud['nums'] . '"></div>',
              '</div>',
            '\']);';
  
          
        }

        
    
    }


    

    /* while ($datosTSolicitud = $this->parametro1->fetch()) {

      if ($datosTSolicitud['estado'] == '0') {
        $estado = 'En espera';
        $color = '#007a80';
      } elseif ($datosTSolicitud['estado'] == '1') {
        $estado = 'Atendido';
        $color = '#1400d2';
      } elseif ($datosTSolicitud['estado'] == '2') {
        $estado = 'En observación';
        $color = '#650080';
      } elseif ($datosTSolicitud['estado'] == '3') {
        $estado = 'Anulado';
        $color = '#9e0707';
      }

      
      echo '
      	<tr>
					<td>' . $datosTSolicitud['nums'] . '</td>	
					<td title="' . $datosTSolicitud['fecha'] . '">' . $datosTSolicitud['fecha'] . '</td>
					<td>' . $datosTSolicitud['nombre'] . '</td>
					<td>' . $datosTSolicitud['tipo'] . '</td>
					<td>' . $datosTSolicitud['usuario'] . '</td>
					<td>' . $datosTSolicitud['oficina'] . '</td>
          <td><p id="data_color-' . $datosTSolicitud['nums'] . '" align=\'center\' style="background-color: ' . $color . ';color: white;white-space: nowrap; padding: 0px 4px;">' . $estado . '</p></td>
          <td><a href="' . FOLDER_PATH . '/detalle/' . $datosTSolicitud['nums'] . '" style="text-decoration: underline;color: #0020c5;">Ver detalle</a></td>
          ';
      if ($this->datos_usu['nombreTipo'] == 'Super Administrador' || $this->datos_usu['nombreTipo'] == 'Administrador') {
        echo '
            <td style="display: flex;padding: 8px 34%;">
              <form method="post">
                <input style="display: none" name="admi" value="' . $datosTSolicitud['nums'] . '">
                <button id="btndlt-' . $datosTSolicitud['nums'] . '" type="button" title="Anular incidencia" class="btn btn-block btn-danger" style="padding: 2px 8px;" onclick="deleteAdm(' . $datosTSolicitud['nums'] . ')">
                  <span class="fa fa-times"></span>
                </button>
              </form>
            </td>
          </tr>
        ';
      } elseif ($this->datos_usu['nombreTipo'] == 'Técnico') {
        echo '
            <td style="display: flex;">
              <a href="#" title="Atender incidencia" style="margin-right: 7px;">
                <button id="btnatnd-' . $datosTSolicitud['nums'] . '" type="button" data-value="' . $datosTSolicitud['nums'] . '" class="btn btn-block btn-success" style="padding: 2px 6px;" onclick="AtendSolc(' . $datosTSolicitud['nums'] . ')">
                  <span class="fa fa-check"></span>
                </button>
              </a>
              <form method="post" style="margin-right: 7px;">
                <input style="display: none" name="admi" value="' . $datosTSolicitud['nums'] . '">
                <button id="btnobs-' . $datosTSolicitud['nums'] . '" type="button" title="Poner en observación" class="btn btn-block btn-info" style="padding: 2px 6px;" onclick="ObservSolc(' . $datosTSolicitud['nums'] . ')">
                  <span class="fa fa-eye"></span>
                </button>
              </form>
              <form method="post">
                <input style="display: none" name="admi" value="' . $datosTSolicitud['nums'] . '">
                <button id="btnanl-' . $datosTSolicitud['nums'] . '" type="button" title="Anular incidencia" class="btn btn-block btn-danger" style="padding: 2px 8px;" onclick="AnulSolc(' . $datosTSolicitud['nums'] . ')">
                  <span class="fa fa-times"></span>
                </button>
              </form>
              <div id="spinner-aoa-' . $datosTSolicitud['nums'] . '"></div>
            </td>
          </tr>
        ';

        
      }
    } */


    echo '</script>';

  }

  public function nlist()
  {

    $this->dataAdmin = new dataAdmin();
    $this->NumSoli = $this->dataAdmin->NumeroSolicitud();

    while ($datoNumSolicitud = $this->NumSoli->fetch()) {

      echo $datoNumSolicitud['num_solicitud'];

    }

  }
}
