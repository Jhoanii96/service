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

  <!-- HEADER -->
  <link href="<?= FOLDER_PATH ?>/src/css/all_fonts.css" rel="stylesheet" media="screen">
  <link href="<?= FOLDER_PATH ?>/src/css/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
  <link href="<?= FOLDER_PATH ?>/src/css/perfil.css" rel="stylesheet">
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
                          <img class="profile-user-img img-fluid img-circle" src="<?= FOLDER_PATH ?>/src/assets/media/images/avatars/user4-128x128.jpg" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">Nina Mcintire</h3>

                        <p class="text-muted text-center">Doctora</p>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                      <!-- /.card-header -->
                      <div class="card-body">

                        <span><i class="fas fa-phone mr-1"></i><b>Celular</b></span><a class="float-right">910 181 425</a>

                        <hr>

                        <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                        <p class="text-muted">
                          <a href="mailto:ciistacna@unjbg.edu.pe">jhon_123_jw@hotmail.com</a>
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Ubicación actual</strong>

                        <p class="text-muted">Perú, Tacna</p>

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
                          <li class="nav-item"><a class="nav-link" href="#linked" data-toggle="tab">Conexiones</a></li>
                          <li class="nav-item"><a class="nav-link" href="#change" data-toggle="tab">Cambiar contraseña</a></li>
                        </ul>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content">
                          <div class="active tab-pane" id="personal">
                            <form class="form-horizontal">
                              <div class="form-group row">
                                <label for="names" class="col-sm-2 col-form-label">Nombres</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="names" placeholder="Ingrese nombre">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="ape_paterno" class="col-sm-2 col-form-label">Apellido paterno</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="ape_paterno" placeholder="Ingrese apellido paterno">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="ape_materno" class="col-sm-2 col-form-label">Apellido materno</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="ape_materno" placeholder="Ingrese apellido paterno">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="dni" class="col-sm-2 col-form-label">DNI</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mi especialidad</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" value="" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="cmp" class="col-sm-2 col-form-label">CMP</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="cmp">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="genero" class="col-sm-2 col-form-label">Genero</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="genero">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="celphone" class="col-sm-2 col-form-label">Celular</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="celphone">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="domicilio" class="col-sm-2 col-form-label">Domicilio</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="domicilio">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="fecha_nac" class="col-sm-2 col-form-label">Fecha nacimiento</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="fecha_nac">
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
                                  <input type="text" class="form-control" id="username">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="password">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="e-mail" class="col-sm-2 col-form-label">Correo electrónico</label>
                                <div class="col-sm-10">
                                  <input type="email" class="form-control" id="e-mail">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="date_active" class="col-sm-2 col-form-label">Fecha registro</label>
                                <div class="col-sm-10">
                                  <input type="date" class="form-control" id="date_active">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="fecha_pago" class="col-sm-2 col-form-label">Fecha pago</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="fecha_pago" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="avatar" class="col-sm-2 col-form-label">Cambiar avatar</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="avatar">
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
                                  <input type="text" class="form-control" id="pais">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="departamento" class="col-sm-2 col-form-label">Departamento</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="departamento">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="provincia" class="col-sm-2 col-form-label">Provincia</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="provincia">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="distrito" class="col-sm-2 col-form-label">Distrito</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="distrito">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="direccion_ate" class="col-sm-2 col-form-label">Dirección de atención</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="direccion_ate">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="dir_ip" class="col-sm-2 col-form-label">Dirección IP</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="dir_ip">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="ubicacion_gps" class="col-sm-2 col-form-label">Ubicación GPS Actual - Maps</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="ubicacion_gps">
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
                                  <input type="text" class="form-control" id="time_ate">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="precio" class="col-sm-2 col-form-label">Precio de Consulta Promedio</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="precio">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="dia_pago" class="col-sm-2 col-form-label">Dia de pago</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="dia_pago">
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="tab-pane" id="linked">
                            <form class="form-horizontal">
                              <div class="form-group row">
                                <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="facebook">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="twitter">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="linkedin" class="col-sm-2 col-form-label">Linkedin</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="linkedin">
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <button type="button" class="btn btn-primary">Actualizar</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="tab-pane" id="change">
                            <form class="form-horizontal">
                              <div class="form-group row">
                                <label for="actual_pass" class="col-sm-2 col-form-label">Contraseña actual</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="actual_pass">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="new_pass" class="col-sm-2 col-form-label">Nueva contraseña</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="new_pass">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="conf_pass" class="col-sm-2 col-form-label">Confirmar contraseña</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="conf_pass">
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <button type="button" class="btn btn-danger">Cambiar contraseña</button>
                                </div>
                              </div>
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


</body>

</html>