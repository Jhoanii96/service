<?php

date_default_timezone_set('UTC');

$datos = $data['datos_perfil']->fetch();
if ($datos[7] == 'Masculino') {
  $genero = 'Doctor';
}
if ($datos[7] == 'Femenino') {
  $genero = 'Doctora';
} else {
  $genero = 'Doctor';
}

$Fechanac_day = date("d", strtotime($datos[13]));
$Fechanac_mes = date("F", strtotime($datos[13]));
$Fechanac_year = date("Y", strtotime($datos[13]));
$Fechanacimiento = "$Fechanac_day de $Fechanac_mes del año $Fechanac_year";

$Fecharegistro = date("d/m/Y h:i:s A", strtotime($datos[17]));

$Fechareg_day = date("d", strtotime($datos[18]));
$Fechareg_mes = date("F", strtotime($datos[18]));
$Fechareg_year = date("Y", strtotime($datos[18]));
$Fechapago = "$Fechareg_day de $Fechareg_mes del año $Fechareg_year";

$cellphone = str_split($datos[8], 1);
$digits = count($cellphone);
$digits = $digits - 1;
$newcellphone = [];
$newcellphone[0] = '';
$newcellphone[1] = '';
$newcellphone[2] = '';
$newcellphone[3] = '';
$counting = 0;
$countarray = 0;
for ($i = $digits; $i >= 0; $i--) {
  if ($counting == 3 && $countarray < 3) {
    $counting = 0;
    $countarray++;
  }
  $newcellphone[$countarray] = $cellphone[$i] . $newcellphone[$countarray];
  $counting++;
}

?>

<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Language" content="es">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Perfil: <?php echo ($datos[1] . ' ' . $datos[2] . ' ' . $datos[3]); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
  <meta name="description" content="Examples of just how powerful ArchitectUI really is!">

  <!-- Disable tap highlight on IE -->
  <meta name="msapplication-tap-highlight" content="no">

  <!-- HEADER -->
  <link href="<?= FOLDER_PATH ?>/src/css/all_fonts.css" rel="stylesheet" media="screen">
  <link href="<?= FOLDER_PATH ?>/src/css/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
  <link href="<?= FOLDER_PATH ?>/src/css/perfil.css" rel="stylesheet">

  <style>
    .rounded-image-circle {
      box-shadow: 0px 0px 1px 1px #777777;
      border: 3px solid #fff;
      margin-right: auto;
      margin-left: auto;
      margin-bottom: 10px;
      margin-top: 5px;
      width: 110px;
      height: 110px;
      max-width: 100%;
      border-radius: 50%;
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
    }

    .p-viewer {
      z-index: 9999;
      position: absolute;
      top: 21%;
      right: 28px;
    }
  </style>

</head>

<body>
  <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">

    <!-- HEADER -->
    <?php require(ROOT . '/' . PATH_VIEWS . 'panel_superior.php'); ?>

    <!-- PANEL LATERAL DERECHO/CONFIGURACIONES DE DISEÑO -->
    <?php require(ROOT . '/' . PATH_VIEWS . 'panel_lateral_der.php'); ?>

    <div class="app-main">

      <!-- PANEL LATERAL IZQUIERDO -->
      <?php require(ROOT . '/' . PATH_VIEWS . 'panel_lateral_izq.php'); ?>

      <div class="app-main__outer">
        <div class="app-main__inner">

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Mi perfil</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                      <li class="breadcrumb-item active">Perfil de usuario</li>
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <!-- <img class="profile-user-img img-fluid img-circle" src="<?= FOLDER_PATH ?>/src/assets/media/images/avatars/user4-128x128.jpg" alt="User profile picture"> -->
                          <div class="rounded-image-circle" alt="" style="background-image: url(<?php echo FOLDER_PATH . '/' . $datos[19]; ?>);"></div>

                        </div>

                        <h3 class="profile-username text-center"><?php echo ($datos[1] . ' ' . $datos[2]); ?></h3>

                        <p class="text-muted text-center" style="margin-bottom: 0;">Doctor</p>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                      <!-- /.card-header -->
                      <div class="card-body">

                        <span><i class="fas fa-phone mr-1"></i><b>Celular</b></span><a class="float-right"><?php echo ($newcellphone[3] . ' ' . $newcellphone[2] . ' ' . $newcellphone[1] . ' ' . $newcellphone[0]); ?></a>

                        <hr>

                        <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                        <p class="text-muted">
                          <a href="mailto:<?= $datos[16] ?>"><?= $datos[16] ?></a>
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Ubicación actual</strong>

                        <p class="text-muted"><?= $datos[20] ?>, <?= $datos[21] ?></p>

                        <hr>

                        <strong><i class="fas fa-user-md mr-1"></i> Especialidad</strong>

                        <p class="text-muted"><?= $datos[5] ?></p>

                        <hr>

                        <strong><i class="fas fa-plus-circle mr-1"></i> Código Médico del Perú</strong>

                        <p class="text-muted"><?= $datos[6] ?></p>

                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-9">
                    <div class="card">
                      <div class="card-header p-2">
                        <ul class="nav nav-pills">
                          <li class="nav-item"><a class="nav-link active" href="#personal" data-toggle="tab">Personal</a></li>
                          <li class="nav-item"><a class="nav-link" href="#users" data-toggle="tab">Mi cuenta</a></li>
                          <li class="nav-item"><a class="nav-link" href="#ubicacion" data-toggle="tab">Ubicación</a></li>
                          <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Configuración</a></li>
                          <!-- <li class="nav-item"><a class="nav-link" href="#linked" data-toggle="tab">Conexiones</a></li> -->
                        </ul>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content">
                          <div class="active tab-pane" id="personal">
                            <form class="form-horizontal">
                              <div class="form-group row">
                                <label for="names" class="col-sm-2 col-form-label">Nombres</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="names" placeholder="Ingrese nombre" value="<?= $datos[1] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="ape_paterno" class="col-sm-2 col-form-label">Apellido paterno</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="ape_paterno" placeholder="Ingrese apellido paterno" value="<?= $datos[2] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="ape_materno" class="col-sm-2 col-form-label">Apellido materno</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="ape_materno" placeholder="Ingrese apellido paterno" value="<?= $datos[3] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="dni" class="col-sm-2 col-form-label">DNI</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" value="<?= $datos[4] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mi especialidad</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" style="text-transform: uppercase;" value="<?= $datos[5] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="cmp" class="col-sm-2 col-form-label">CMP</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="cmp" value="<?= $datos[6] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="genero" class="col-sm-2 col-form-label">Género</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="genero" style="text-transform: uppercase;" value="<?= $datos[7] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="celphone1" class="col-sm-2 col-form-label">Número celular principal</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="celphone1" value="<?= $datos[8] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="celphone2" class="col-sm-2 col-form-label">Número celular</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="celphone2" value="<?= $datos[9] ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="telefono1" class="col-sm-2 col-form-label">Primer teléfono</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="telefono1" value="<?= $datos[10] ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="telefono2" class="col-sm-2 col-form-label">Segundo teléfono</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="telefono2" value="<?= $datos[11] ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="domicilio" class="col-sm-2 col-form-label">Domicilio</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="domicilio" value="<?= $datos[12] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="fecha_nac" class="col-sm-2 col-form-label">Fecha nacimiento</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="fecha_nac" value="<?= $Fechanacimiento ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <button type="button" class="btn btn-primary">Actualizar</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="tab-pane" id="users">
                            <form class="form-horizontal">
                              <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label">Nombre usuario</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="username" value="<?= $datos[14] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                <div class="col-sm-10 input-group pwd">
                                  <input type="password" class="form-control" id="password" value="<?= $datos[15] ?>" readonly>
                                  <span id="show" class="p-viewer" title="Mostrar/Ocultar contraseña">
                                    <i id="pass_show" class="fa fa-eye" style="font: #000;"></i>
                                  </span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="e-mail" class="col-sm-2 col-form-label">Correo electrónico</label>
                                <div class="col-sm-10">
                                  <input type="email" class="form-control" id="e-mail" value="<?= $datos[16] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="date_active" class="col-sm-2 col-form-label">Fecha registro</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="date_active" value="<?= $Fecharegistro ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="fecha_pago" class="col-sm-2 col-form-label">Fecha pago</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="fecha_pago" value="<?= $Fechapago ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="avatar" class="col-sm-2 col-form-label">Cambiar avatar</label>
                                <div class="col-sm-10">
                                  <input style="display: none" type="text" id="uploadFile" name="textImage" readonly />
                                  <input type="file" id="photoInputFile" name="image" accept="image/png,image/jpeg" style="margin-top: 4px;">
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10" style="width: 300px;">
                                  <img id="mypic" height="200px" src="<?php echo (FOLDER_PATH . '/' . $datos[19]); ?>" alt="My picture" style="border-radius: 1%;">
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <button type="button" class="btn btn-primary">Actualizar</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="tab-pane" id="ubicacion">
                            <form class="form-horizontal">
                              <div class="form-group row">
                                <label for="pais" class="col-sm-2 col-form-label">Pais</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="pais" value="<?= $datos[20] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="departamento" class="col-sm-2 col-form-label">Departamento</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="departamento" value="<?= $datos[21] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="provincia" class="col-sm-2 col-form-label">Provincia</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="provincia" value="<?= $datos[22] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="distrito" class="col-sm-2 col-form-label">Distrito</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="distrito" value="<?= $datos[23] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="direccion_ate" class="col-sm-2 col-form-label">Dirección de atención</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="direccion_ate" value="<?= $datos[24] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="dir_ip" class="col-sm-2 col-form-label">Dirección IP</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="dir_ip" value="<?= $datos[25] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="ubicacion_gps" class="col-sm-2 col-form-label">Ubicación GPS Actual - Maps</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="ubicacion_gps" value="<?= $datos[26] ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <button type="button" class="btn btn-primary">Actualizar</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                              <div class="form-group row">
                                <label for="time_ate" class="col-sm-2 col-form-label">Tiempo de atención promedio</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="time_ate" value="<?= $datos[27] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="precio" class="col-sm-2 col-form-label">Precio de Consulta Promedio</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="precio" value="<?= $datos[28] ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <button type="text" class="btn btn-primary">Actualizar</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <!-- <div class="tab-pane" id="linked">
                            <form class="form-horizontal">
                              <div class="form-group row">
                                <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="facebook" value="<?= $datos[29] ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="twitter" value="<?= $datos[30] ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="linkedin" class="col-sm-2 col-form-label">Linkedin</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="linkedin" value="<?= $datos[31] ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <button type="button" class="btn btn-primary">Actualizar</button>
                                </div>
                              </div>
                            </form>
                          </div> -->
                          <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                      </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->

        </div>
      </div>
    </div>
  </div>
  <!-- MODAL USER CONFIGURATIONS  -->

  <div class="app-drawer-overlay d-none animated fadeIn"></div>
  <script type="text/javascript" src="<?= FOLDER_PATH ?>/src/js/main.d810cf0ae7f39f28f336.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
  <script src="<?= FOLDER_PATH ?>/src/js/cuestionario.js"></script>

  <script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#mypic')
            .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#photoInputFile").change(function() {
      readURL(this);
    });
  </script>

  <script>
    document.getElementById("photoInputFile").onchange = function() {
      document.getElementById("uploadFile").value = this.files[0].name;
    };
  </script>

  <script>
    $('#show').click(function() {
      var type = document.getElementById('password').type;
      if (type == "text") {
        document.getElementById('password').type = 'password';
        document.getElementById("pass_show").className = "fa fa-eye";
      } else {
        document.getElementById('password').type = 'text';
        document.getElementById("pass_show").className = "fa fa-eye-slash";
      }
    });
  </script>

</body>

</html>