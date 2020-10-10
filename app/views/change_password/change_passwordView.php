<?php


$datos = $data['datos_perfil']->fetch();
if ($datos['genero'] == 'Masculino') {
  $genero = 'Doctor';
}
if ($datos['genero'] == 'Femenino') {
  $genero = 'Doctora';
} else {
  $genero = 'Doctor';
}

$Fechanac_day = date("d", strtotime($datos['fecha']));
$Fechanac_mes = date("F", strtotime($datos['fecha']));
$Fechanac_year = date("Y", strtotime($datos['fecha']));
$Fechanacimiento = "$Fechanac_day de $Fechanac_mes del año $Fechanac_year";

$Fecharegistro = date("d/m/Y h:i:s A", strtotime($datos[17]));

$Fechareg_day = date("d", strtotime($datos[18]));
$Fechareg_mes = date("F", strtotime($datos[18]));
$Fechareg_year = date("Y", strtotime($datos[18]));
$Fechapago = "$Fechareg_day de $Fechareg_mes del año $Fechareg_year";

$cellphone = str_split($datos['celular1'], 1);
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
  <title>Perfil: <?php echo ($datos['nombre'] . ' ' . $datos['ape_paterno'] . ' ' . $datos['ape_materno']); ?></title>
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
  <?php require(ROOT . '/' . PATH_VIEWS . 'alert_message.php'); ?>
  <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">

    <!-- HEADER -->
    <?php require(ROOT . '/' . PATH_VIEWS . 'panel_superior.php'); ?>

    <!-- PANEL LATERAL DERECHO/CONFIGURACIONES DE DISEÑO -->
    <?php require(ROOT . '/' . PATH_VIEWS . 'panel_lateral_der.php'); ?>

    <div id="body-main" class="app-main" <?php if (isset($act_msg)) if ($act_msg == 1) echo (' style="padding-top: 120px;"'); ?>>

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

                        <h3 class="profile-username text-center"><?php echo ($datos['nombre'] . ' ' . $datos['ape_paterno']); ?></h3>

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
                          <a href="mailto:<?= $datos['correo'] ?>"><?= $datos['correo'] ?></a>
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Ubicación actual</strong>

                        <p class="text-muted"><?= $datos['pais'] ?>, <?= $datos['departamento'] ?></p>

                        <hr>

                        <strong><i class="fas fa-user-md mr-1"></i> Especialidad</strong>

                        <p class="text-muted"><?= $datos['especialidad'] ?></p>

                        <hr>

                        <strong><i class="fas fa-plus-circle mr-1"></i> Código Médico del Perú</strong>

                        <p class="text-muted"><?= $datos['cmp'] ?></p>

                        <hr>

                        <strong><i class="fas fa-money-bill mr-1"></i> Precio promedio por consulta</strong>

                        <p class="text-muted">S/. <?= $datos['precioconsulta'] ?></p>

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
                          <li class="nav-item"><a class="nav-link disabled" href="#personal" data-toggle="tab">Personal</a></li>
                          <li class="nav-item"><a class="nav-link disabled" href="#users" data-toggle="tab">Mi cuenta</a></li>
                          <li class="nav-item"><a class="nav-link disabled" href="#ubicacion" data-toggle="tab">Ubicación</a></li>
                          <li class="nav-item"><a class="nav-link active" href="#change" data-toggle="tab">Cambiar password</a></li>
                          <!-- <li class="nav-item"><a class="nav-link" href="#linked" data-toggle="tab">Conexiones</a></li> -->
                        </ul>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content">
                          <div class="active tab-pane" id="change">
                            <form class="form-horizontal">
                              <div class="form-group row">
                                <label for="oldpass" class="col-sm-2 col-form-label">Contraseña actual</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="oldpass" placeholder="Ingrese su contraseña actual" value="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="newpass" class="col-sm-2 col-form-label">Nueva contraseña</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="newpass" autocomplete="new-password" placeholder="Ingrese nueva contraseña">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="newpassconf" class="col-sm-2 col-form-label">Confirmar nueva contraseña</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="newpassconf" placeholder="Confirmar contraseña" value="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <button id="btn_change" type="button" class="btn btn-primary">Actualizar</button>
                                </div>
                              </div>
                              <span id="msg" style="color: #ff0000; display: none;">*Su nueva contraseña ha sido registrado con éxito, regresará a inicio de sesión para que vuelva a autenticarse</span>
                            </form>
                          </div>
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

  <script>
    $('#btn_change').click(function() {

      var oldpass = $("#oldpass").val();
      var newpass = $("#newpass").val();
      var newpassconf = $("#newpassconf").val();

      if (oldpass == "") {
        swal("Atención!", "Debe ingresar su contraseña actual.", "warning");
        return;
      }
      if (newpass == "") {
        swal("Atención!", "Debe ingresar la nueva contraseña.", "warning");
        return;
      }
      if (newpassconf == "") {
        swal("Atención!", "Debe ingresar la contraseña de confirmación.", "warning");
        return;
      }
      if (newpass != newpassconf) {
        swal("Atención!", "La nueva contraseña y la confirmación no coinciden.", "warning");
        return;
      }

      var data = new FormData();
      data.append("oldpass", oldpass);
      data.append("newpass", newpass);

      $.ajax({
        beforeSend: function() {
          $("#btn_change").html('Actualizando &ThinSpace;&ThinSpace;<span id="spinner-p1" class="fa fa-spinner fa-spin"></span>');
          $("#btn_change").attr("disabled", true);
          $("#msg").css("display", "none");
        },
        url: "<?= FOLDER_PATH ?>/change_password/change",
        type: "POST",
        data: data,
        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
        processData: false, // NEEDED, DON'T OMIT THIS
        success: function(resp) {
          if (resp == 1) {
            $("#btn_change").html("Actualizado");
            $("#msg").css("display", "block");
            $("#msg").html("*Su nueva contraseña ha sido registrado con éxito, regresará a inicio de sesión para que vuelva a autenticarse");
            setTimeout(function() {
              location.href = "<?= FOLDER_PATH ?>/login/salir";
            }, 2000);
          }
          if (resp == 0) {
            $("#btn_change").attr("disabled", false);
            $("#btn_change").html("Actualizar");
            $("#msg").css("display", "block");
            $("#msg").html("*La contraseña es incorrecta");
          }
          
        }
      })
    });
  </script>
  

</body>

</html>