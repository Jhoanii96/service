<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="<?= FOLDER_PATH ?>/src/css/all_fonts.css" rel="stylesheet" media="screen">
    <script src="https://kit.fontawesome.com/629b299bcd.js" crossorigin="anonymous"></script>
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
                            <div>Notificaciones
                                <div class="page-title-subheading">
                                    Notificaciones de administración.
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
              <!-- CONTENIDO AYUDA -->
                <div class="main-card mb-3 card pl-5 pr-5 pt-4">
                    <div class="card-body">
                      <div class="container">
                        <div class="content-notification">
                        <button class="btn btn-outline-dark mb-3"><i class="fas fa-check"></i>  Marcar todo como leido</button>
                        <?php
                          $notification = $this->showNotifications();
                          foreach ($notification as $notificacion) {
                            echo "<div class='mb-2' style='border:1px solid rgba(119, 136, 153,0.2);padding:15px;box-shadow: -1px 8px 5px -6px rgba(119,136,153,0.64);'>";
                            echo    "<b><span>".$notificacion['Titulo']."</span></b>";
                            echo    "<input type='checkbox' name='' id='' style='float:right'><br>";
                            echo    "<span>".$notificacion['Descripcion']."</span>";
                            echo    "<div class='notification_time' style='color:#B0C4DE'><i class='far fa-clock mr-1'></i> hace 2 horas</div>";
                            echo    "<div style='display:flex;justify-content:flex-end'>";
                            echo      "<button class='btn btn-primary' >Contactar</button>";
                            echo    "</div>";
                            echo "</div>";
                          }
                        ?>   
                        </div>
                      </div>
                    </div>
                </div>
              <!-- END CONTENIDO AYUDA -->
            </div>
          </div>
      </div>
    </div>
</body>
<script src="<?= FOLDER_PATH ?>/src/js/jquery-3.2.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="<?= FOLDER_PATH ?>/src/js/main.d810cf0ae7f39f28f336.js"></script>
    <!-- <script type="text/javascript" src="<?= FOLDER_PATH ?>/src/js/main.d810cf0ae7f39f28f336.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</html>