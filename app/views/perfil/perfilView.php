<?php

while ($datosperfil = $data['datos_perfil']->fetch()) {

  $id = $datosperfil['id']; /* no en uso */
  $nom = $datosperfil['nombre'];
  $ape = $datosperfil['apellido'];
  $dni = $datosperfil['dni'];
  $email = $datosperfil['email'];
  $cel = $datosperfil['celular'];
  $nfecha = $datosperfil['nfecha'];
  $ipAddres = $datosperfil['ipAddres'];
  $onlineUsu = $datosperfil['onlineUsu'];
  $facultad = $datosperfil['facultad'];
  $oficina = $datosperfil['oficina'];
  $abrOficina = $datosperfil['abrOficina'];
  $unidad = $datosperfil['unidad'];
  $imagen = $datosperfil['foto'];
  $clave = base64_decode($datosperfil['clave']); /* no en uso */
  $nombreTipo = $datosperfil['nombreTipo'];
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perfil de usuario</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="<?= FOLDER_PATH . '/' ?>src/assets/media/image/usi-image_icon.png">
	<!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= FOLDER_PATH . '/' ?>src/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= FOLDER_PATH . '/' ?>src/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= FOLDER_PATH . '/' ?>src/css/ionicons.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= FOLDER_PATH . '/' ?>src/css/bootstrap-datepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= FOLDER_PATH . '/' ?>src/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= FOLDER_PATH . '/' ?>src/css/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <?php
    if ($data['tipouser'] == 'Personal Administrativo') {
      echo '
        <style>
          .main-header .navbar {
            margin-left: 0px;
          }

          .content-wrapper {
            margin-left: 0px;
          }
        </style>
      ';
    }
  ?>
  
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php
    if ($data['tipouser'] == 'Personal Administrativo') {
      // include head
      require(ROOT . '/' . PATH_VIEWS . 'headnavigation_user.php');
    } else {
      // include head
      require(ROOT . '/' . PATH_VIEWS . 'head_admin.php');
      // include navbar
      require(ROOT . '/' . PATH_VIEWS . 'rightnavigation_admin.php');
    }
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Perfil usuario
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?= FOLDER_PATH ?>/"><i class="fa fa-table"></i> Inicio</a></li>
          <li class="active">Perfil usuario</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
              <div class="box-body box-profile">
                <?php
                if ($imagen != "/src/assets/media/image/perfil/avatar.png") {
                  echo "<img class=\"profile-user-img img-responsive img-circle\" src=" . FOLDER_PATH . $imagen . " alt=\"User profile picture\">";
                } else {
                  echo '<img class="profile-user-img img-responsive img-circle" src="' . FOLDER_PATH . '/src/assets/media/image/perfil/avatar.png" alt="User profile picture">';
                }
                ?>

                <h3 class="profile-username text-center" style="font-size: 16px"><?= $nom . ' ' . $ape ?></h3>

                <p class="text-muted text-center"><?= $nombreTipo ?></p>

                <ul class="list-group list-group-unbordered">
                  <!-- <hr> -->
                  <!-- <strong><i class="fa fa-envelope-o margin-r-5"></i> E-Mail</strong>

                  <p class="text-muted" style="color: #3c8dbc;">
                    ZZZzzz
                  </p>
                   -->
                  <li class="list-group-item">
                    <i class="fa fa-envelope-o margin-r-5"></i> <strong> E-Mail</strong> <a class="pull-right" href="<?= 'mailto:' . $email ?>"><?= $email ?></a>
                  </li>

                  <li class="list-group-item">
                    <i class="fa fa-birthday-cake margin-r-5"></i> <strong> Fecha de nacimiento</strong> <a class="pull-right"><?= date("d/m/Y", strtotime($nfecha)); ?></a>
                  </li>

                  <li class="list-group-item">
                    <i class="fa fa-mobile-phone margin-r-5" style="font-size: 20px;"></i> <strong> N° Celular</strong> <a class="pull-right"><?= $cel ?></a>
                  </li>

                  <div style="padding-top: 10px;">
                    <strong><i class="fa fa-building-o margin-r-5"></i> Oficina</strong>

                    <p class="text-muted" style="color: #3c8dbc;">
                      <?= $oficina . ' (' . $abrOficina . ')' ?>
                    </p>
                  </div>

                </ul>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#settings" data-toggle="tab">Editar perfil</a></li>
              </ul>
              <div class="tab-content">
                <div class="active tab-pane" id="settings">
                  <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Nombres</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" pattern="[A-Za-zÁÉÍÓÚñÑ ]+" name="firstName" id="firstName" value="<?= $nom ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Apellidos</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" pattern="[A-Za-zÁÉÍÓÚñÑ ]+" name="lastName" id="lastName" value="<?= $ape ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">E-Mail</label>

                      <div class="col-sm-10">
                        <input type="email" class="form-control" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="correo" id="correo" value="<?= $email ?>" readonly />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">DNI</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" name="dni" id="dni" maxlength="8" value="<?= $dni ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Celular</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" pattern="[0-9 ]+" name="contact_point" id="contact_point" maxlength="15" value="<?= $cel ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">F. Nacimiento</label>

                      <div class="col-sm-10">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker" name="date" value="<?= $nfecha ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Facultad</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="fct" value="<?= $facultad ?>" readonly />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Oficina</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="ofn" value="<?= $oficina . ' (' . $abrOficina . ')' ?>" readonly />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Unidad</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="und" value="<?= $unidad ?>" readonly />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Rol usuario</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="rol" value="<?= $nombreTipo ?>" readonly />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputSkills" class="col-sm-2 control-label">Agregar imagen</label>

                      <div class="col-sm-10">
                        <input style="display: none" type="text" id="uploadFile" name="textImage" readonly />
                        <input type="file" id="photoInputFile" name="image" accept="image/png,image/jpeg" style="margin-top: 4px;">
                      </div>
                    </div>
                    <?php
                    if ($imagen != "/src/assets/media/image/perfil/avatar.png") {
                      echo "<div class=\"form-group\">
                          <div class=\"col-sm-2\"></div>
                          <div class=\"col-sm-10\" style=\"text-align: center; width: 300px;\">
                            <img id=\"imgg\" height=\"200px\" src=" . FOLDER_PATH . $imagen . " alt=\"your image\" />
                          </div>
                        </div>";
                    } else {
                      echo "<div class=\"form-group\">
                          <div class=\"col-sm-2\"></div>
                          <div class=\"col-sm-10\" style=\"text-align: center; width: 300px;\">
                            <img id=\"imgg\" height=\"200px\" src=\"src/assets/media/image/perfil/avatar.png\"/>
                          </div>
                        </div>";
                    }
                    ?>

                    <div class="form-group">
                      <label class="col-sm-2 control-label" style="font-size: smaller;">Nueva contraseña</label>

                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="password" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" name="update" value="true">Actualizar</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    
    <?php 
      if ($data['tipouser'] != 'Personal Administrativo') {
        require(ROOT . '/' . PATH_VIEWS . 'aside_control.php'); 
      }
    ?>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?= FOLDER_PATH . '/' ?>src/js/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= FOLDER_PATH . '/' ?>src/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="<?= FOLDER_PATH . '/' ?>src/js/fastclick.js"></script>
  <!-- bootstrap datepicker -->
  <script src="<?= FOLDER_PATH . '/' ?>src/js/bootstrap-datepicker.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= FOLDER_PATH . '/' ?>src/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= FOLDER_PATH . '/' ?>src/js/demo.js"></script>
  <script>
    $(function() {
      //Date picker
      $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      })
    })
  </script>
  <script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#imgg')
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

</body>

</html>