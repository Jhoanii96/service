<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="es">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>CRM Dashboard - Examples of just how powerful ArchitectUI really is!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Examples of just how powerful ArchitectUI really is!">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
, 
    <link href="<?= FOLDER_PATH ?>/src/css/all_fonts.css" rel="stylesheet" media="screen">

    <link href="<?= FOLDER_PATH ?>/src/css/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
      <!-- HEADER -->
      <?php require(ROOT . '/' . PATH_VIEWS . 'panel_superior.php'); ?>
      <!-- PANEL LATERAL DERECHO/CONFIGURACIONES DE DISEÑO -->
      <!--?php require(ROOT . '/' . PATH_VIEWS . 'panel_lateral_der.php'); ?-->

      <div class="app-main">

          <!-- PANEL LATERAL IZQUIERDO -->
          <?php require(ROOT . '/' . PATH_VIEWS . 'panel_lateral_izq.php'); ?>
          
          <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div class="page-title-icon">
                                <i class="pe-7s-home icon-gradient bg-mean-fruit">
                                </i>
                            </div>
                            <div>Cuestionario
                                <div class="page-title-subheading">
                                    Listado de preguntas.
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
              <!-- CONTENIDO AYUDA -->
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Pregunta</th>    
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--?php

                                $count = 0;
                                while ($datos_historial = $data['Result']->fetch()) {

                                    $birthDate = explode("-", $datos_historial['fecha_nacimiento']);
                                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                                        ? ((date("Y") - $birthDate[0]) - 1)
                                        : (date("Y") - $birthDate[0]));


                                    $count += 1;
                                ?-->
                                    <!-- <tr>
                                        <td><   ?= $datos_historial['nombre_paciente'] ?></td>
                                        <td><   ?= $age ?></td>
                                        <td><   ?= date("Y-m-d", strtotime($datos_historial['fecha_consulta'])) ?></td>
                                        <td><   ?= date("H:i", strtotime($datos_historial['fecha_consulta'])) ?></td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td class="text-center">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <button id="details_<   ?= $count ?>" onclick="GetDetailsCon(<  ?= $count ?>)" meta-data="{<?php echo (base64_encode(utf8_encode("[" . $count . "]|" . $datos_historial[0] . "-data-history-details"))); ?>}" data-toggle="modal" data-target="#AppDetails" class="btn-shadow btn btn-warning text-white"><i class="fa fa-eye"></i> Detalle</button>
                                                <button class="btn-shadow btn btn-warning text-white"><i class="fa fa-edit"></i> Editar</button>
                                                <button class="btn-shadow btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php

                                // }

                                ?> -->

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nro</th>
                                    <th>Pregunta</th>    
                                    <th>Opciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
              <!-- END CONTENIDO AYUDA -->
            </div>
          </div>
      </div>
    </div>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script src="<?= FOLDER_PATH ?>/src/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?= FOLDER_PATH ?>/src/js/main.d810cf0ae7f39f28f336.js"></script>
    <script>
        let cons = document.getElementById("btn-adm_consulta");
        let close = document.getElementById("btn-adm_close");
        if (cons != null) {
            document.getElementById("btn-adm_consulta").addEventListener("click", consulta_admin);
            function consulta_admin() {
                location.href = "<?= FOLDER_PATH ?>/consultation"
            }
        }
        if (close != null) {
            document.getElementById("btn-adm_close").addEventListener("click", close_admin);
            function close_admin() {
                location.href = "<?= FOLDER_PATH ?>/login/salir"
            }
        }
    </script>
</body>
</html>