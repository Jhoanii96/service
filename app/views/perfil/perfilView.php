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
                          <li class="nav-item"><a class="nav-link active" href="#personal" data-toggle="tab">Personal</a></li>
                          <li class="nav-item"><a class="nav-link" href="#users" data-toggle="tab">Mi cuenta</a></li>
                          <li class="nav-item"><a class="nav-link" href="#ubicacion" data-toggle="tab">Ubicación</a></li>
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
                                  <input type="text" class="form-control" id="celphone1" value="<?= $datos[8] ?>">
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
                                  <input type="text" class="form-control" style="text-transform: uppercase;" id="domicilio" value="<?= $datos[12] ?>">
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
                                  <button id="btn_personal" type="button" class="btn btn-primary">Actualizar</button>
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
                                  <input type="email" class="form-control" id="e-mail" value="<?= $datos[16] ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="date_active" class="col-sm-2 col-form-label">Fecha registro</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="date_active" value="<?= $Fecharegistro ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="precio_pro" class="col-sm-2 col-form-label">Precio promedio</label>
                                <div class="col-sm-10">
                                  <input type="number" class="form-control" id="precio_pro" value="<?= $datos['precioconsulta'] ?>" min="0" value="5000" step=".01">
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
                                  <button id="btn_account" type="button" class="btn btn-primary">Actualizar</button>
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
                                  <input type="text" class="form-control" id="direccion_ate" style="text-transform: uppercase;" value="<?= $datos[24] ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <button id="btn_address" type="button" class="btn btn-primary">Actualizar</button>
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
    $(':input[readonly]').css({
      'background-color': '#f3f3f3'
    });
  </script>
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

  <script>
    $('#btn_personal').click(function() {

      var celphone1 = $("#celphone1").val();
      var celphone2 = $("#celphone2").val();
      var telefono1 = $("#telefono1").val();
      var telefono2 = $("#telefono2").val();
      var domicilio = $("#domicilio").val();

      if (celphone1 == "") {
        swal("Atención!", "Debe ingresar el número de celular principal.", "warning");
        return;
      }
      if (domicilio == "") {
        swal("Atención!", "Debe ingresar la dirección de su domicilio.", "warning");
        return;
      }

      var data = new FormData();
      data.append("celphone1", celphone1);
      data.append("celphone2", celphone2);
      data.append("telefono1", telefono1);
      data.append("telefono2", telefono2);
      data.append("domicilio", domicilio);

      $.ajax({
        beforeSend: function() {
          $("#btn_personal").html('Actualizando &ThinSpace;&ThinSpace;<span id="spinner-p1" class="fa fa-spinner fa-spin"></span>');
          $("#btn_personal").attr("disabled", true);
        },
        url: "<?= FOLDER_PATH ?>/perfil/update_p1",
        type: "POST",
        data: data,
        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
        processData: false, // NEEDED, DON'T OMIT THIS
        success: function(resp) {
          $("#btn_personal").html('Actualizado');
          setTimeout(function() {
            location.href = "<?= FOLDER_PATH ?>/perfil";
          }, 500);
        }
      })
    });
  </script>
  <script>
    $('#btn_account').on('click', function() {
      var email = $('#e-mail').val();
      var precio = $('#precio_pro').val();
      var ufile = $('#uploadFile').val(); /* text image */

      if (email != "") {
        if (!validateEmail(email)) {
          swal("Atención!", "Debe ingresar un correo electrónico válido", "warning");
          return;
        }
      }

      var imgpath = document.getElementById('photoInputFile'); /* foto */
      if (!imgpath.value == "") {
        var img = imgpath.files[0].size;
        var imgsize = img / 1024;
        if (imgsize > 1024) {
          swal("Atención!", "Debe seleccionar una imagen menor de 1MB", "warning");
          return;
        }
      }

      var data = new FormData();

      data.append("email", email);
      data.append("precio", precio);
      data.append("image", $('input[type=file]')[0].files[0]);

      $.ajax({
        beforeSend: function() {
          $("#btn_account").html('Actualizando &ThinSpace;&ThinSpace;<span id="spinner-pf" class="fa fa-spinner fa-spin"></span>');
          $("#btn_account").attr("disabled", true);
        },
        url: "<?= FOLDER_PATH ?>/perfil/update_p2",
        type: "POST",
        data: data,
        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
        processData: false, // NEEDED, DON'T OMIT THIS
        success: function() {
          $("#btn_account").html('Actualizado');
          setTimeout(function() {
            location.href = "<?= FOLDER_PATH ?>/perfil";
          }, 500);
        }
      })
    });
  </script>
  <script>
    $('#btn_address').on('click', function() {
      var direccion = $('#direccion_ate').val();

      if (direccion == "" || direccion == null) {
        swal("Atención!", "Debe ingresar una dirección", "warning");
        return;
      }

      var data = new FormData();

      data.append("address", direccion);

      $.ajax({
        beforeSend: function() {
          $("#btn_address").html('Actualizando &ThinSpace;&ThinSpace;<span class="fa fa-spinner fa-spin"></span>');
          $("#btn_address").attr("disabled", true);
        },
        url: "<?= FOLDER_PATH ?>/perfil/update_p3",
        type: "POST",
        data: data,
        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
        processData: false, // NEEDED, DON'T OMIT THIS
        success: function() {
          $("#btn_address").html('Actualizado');
          setTimeout(function() {
            location.href = "<?= FOLDER_PATH ?>/perfil";
          }, 500);
        }
      })
    });
  </script>
  <script>
    function validateEmail(e) {
      const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(e).toLowerCase());
    }
  </script>

  <script>
    $('#close-alert7').click(function() {
      $("#top-header").css("margin-top", "");
      $("#body-main").css("padding-top", "");
      var active = '0';
      setCookie('alert_active7', active, 7);
    });
    $('#close-alert4').click(function() {
      $("#top-header").css("margin-top", "");
      $("#body-main").css("padding-top", "");
      var active = '0';
      setCookie('alert_active4', active, 7);
    });
    $('#close-alert2').click(function() {
      $("#top-header").css("margin-top", "");
      $("#body-main").css("padding-top", "");
    });

    function setCookie(name, value, days) {
      var expires = "";
      if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
      }
      document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
      var nameEQ = name + "=";
      var ca = document.cookie.split(';');
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
      }
      return null;
    }

    function eraseCookie(name) {
      document.cookie = name + '=; Max-Age=-99999999;';
    }
  </script>

</body>

</html>