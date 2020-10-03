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
                            <div>Configuración 
                                <div class="page-title-subheading">
                                    Prueba clinica
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
              <!-- CONTENIDO AYUDA -->
              <!-- <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel"> -->
              <div class="row">
                <div class="col-md-12 col-lg-12">
                  <div class="main-card mb-3 card">
                    <div class="card-body">
                      <div class="position-relative form-group">
                          <!-- <label for="exampleEmail3">--------------------------------------------</label> -->
                          <p class="form-control-plaintext">Control de preguntas</p>
                      </div>
                      <?php 
                        $history = $this->getHistoryPred();
                       
                      ?>
                      <div class="col-md-12">
                        <div class="card border-info" style="max-width:25rem;margin:auto;">
                            <!-- <div class="card-header ">Nota :</div> -->
                            <div class="card-body text-info">
                                <h5 class="card-title">Nota :</h5>
                                <p class="card-text">En esta sección podrá crear el formato de listado para la historia clínica .</p>
                            </div>
                        </div>
                      </div>
                      <form id="frm-settings-prueba">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="genero">Anamnesis</label>
                                    <textarea rows="1" class="form-control autosize-input" placeholder="te:" name="anamnesis" style="max-height: 200px; height: 35px;"><?php echo ($history) ? $history['Anamnesis_Pred']:""; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="genero">Examen Físico</label>
                                    <textarea rows="1" class="form-control autosize-input" placeholder="1:" name="exam_fisico" style="max-height: 200px; height: 35px;" ><?php echo ($history) ? $history['Examen_Fisico_Pred']:""; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="genero">Exámenes</label>
                                    <textarea rows="1" class="form-control autosize-input" placeholder="resultado:"  name="examenes" style="max-height: 200px; height: 35px;" ><?php echo ($history)? $history['Examenes_Pred']:""; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="genero">Diagnóstico</label>
                                    <textarea rows="1" class="form-control autosize-input" placeholder="diag 1:"  name="diagnostico" style="max-height: 200px; height: 35px;" ><?php echo ($history)? $history['Diagnostico_Pred']:""; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="genero">Tratamiento</label>
                                    <textarea rows="1" class="form-control autosize-input"  name="tratamiento" style="max-height: 200px; height: 35px;" ><?php echo ($history)? $history['Tratamiento_Pred']:""; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                  <?php 
                                    $stateHistory = $this->getStateHistoryPred();
                                    if($stateHistory  !== false){
                                      if($stateHistory['creado'] === '1'){
                                        
                                        echo "<button class='btn btn-primary submitSettingPrueba' id='btnSaveSettingPrueba' style='display:none'>Guardar</button>";
                                        echo "<button class='btn btn-warning submitSettingPrueba' id='btnUpdateSettingPrueba'>Actualizar</button>";
                                      }else{
  
                                        echo "<button class='btn btn-primary submitSettingPrueba' id='btnSaveSettingPrueba'>Guardar</button>";
                                        echo "<button class='btn btn-warning submitSettingPrueba' id='btnUpdateSettingPrueba' style='display:none'>Actualizar</button>";
                                      }
                                    }else{
                                        echo "<button class='btn btn-primary submitSettingPrueba' id='btnSaveSettingPrueba'>Guardar</button>";
                                        echo "<button class='btn btn-warning submitSettingPrueba' id='btnUpdateSettingPrueba' style='display:none'>Actualizar</button>";
                                    }
                                  ?>
                                </div>
                            </div>
                        </div>
                      
                      </form>
                    </div>
                  </div>
              <!-- END CONTENIDO AYUDA -->
              </div>
            </div>
          </div>
      </div>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script src="<?= FOLDER_PATH ?>/src/js/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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

        let buttonPressed;
        $('.submitSettingPrueba').click(function(){
          buttonPressed = $(this).attr('id');
        })

        $('#frm-settings-prueba').submit(function(){
          
          let datos = $('#frm-settings-prueba').serialize();

          if(buttonPressed === 'btnSaveSettingPrueba'){
            console.log('save');
            $.ajax({
              type:"post",
              url: "<?php echo FOLDER_PATH ?>/settings/insertHistoryPred",
              data: datos
            })
            .done(function(response){
              Swal.fire({
                icon: 'success',
                title: response,
                showConfirmButton: false,
                timer: 1500
              })
              $('#btnUpdateSettingPrueba').css("display","block");
              $('#btnSaveSettingPrueba').css("display","none");
            })
            .fail(function(){
              Swal.fire({
                icon: 'error',
                title: 'Error',
                showConfirmButton: false,
                timer: 1500
              });
            })
            return false;
          }

          if(buttonPressed === 'btnUpdateSettingPrueba'){
            console.log('update');
            $.ajax({
              type:"post",
              url: "<?php echo FOLDER_PATH ?>/settings/updateHistoryPred",
              data: datos
            })
            .done(function(response){
              Swal.fire({
                icon: 'success',
                title: response,
                showConfirmButton: false,
                timer: 1500
              })

            })
            .fail(function(){
              Swal.fire({
                icon: 'error',
                title: 'Error',
                showConfirmButton: false,
                timer: 1500
              });
            })
            return false;
          }
        })
    </script>
    <script>
    
        /* Para las notificaciones */

        (function requestNotification(){
                    
          $.ajax({
              url: "<?php echo FOLDER_PATH ?>/my/notifications",
              type: 'get',
              dataType: 'JSON',
              success: function(data){
                  if (Object.keys(data).length > 0) {
                      let content = '';
                      let cantNotification = 0;
                      for (let index = 0; index < Object.keys(data).length; index++) {
                          
                          content += '<div class="vertical-timeline-item dot-success vertical-timeline-element mb-2" ">';
                          content +=    '<div>'
                          content +=        '<span class="vertical-timeline-element-icon bounce-in"></span>';
                          content +=        '<a href="<?= FOLDER_PATH ?>/notifications" class="vertical-timeline-element-content bounce-in row content-row-notification" style="text-decoration:none" onclick="return notificationclick()">';
                          content +=            '<h4 class="timeline-title container-notification" >'+data[index].Titulo;
                          content +=            '</h4>';
                          if(data[index].Leido === '0'){
                          cantNotification++;
                          content +=            '<span class="badge badge-danger ml-2" style="float:right">NEW</span>';
                          }
                          content +=            '<span class="vertical-timeline-element-date"></span>';
                          content +=        '</a>';
                          content +=    '</div>';
                          content += '</div>';
                          console.log(data[index].Titulo , data[index].Descripcion);
                      }
                      $('#notifications-box').html(content);
                      if(cantNotification > 0){
                          $('#cantNotification').html(cantNotification);
                          $('#cantNotification').css('display','block');
                      }else{
                          $('#cantNotification').css('display','none');
                      }
                      $('#cant-notifications').html(cantNotification);
                  }
                  // console.log(status.status)
                  setTimeout(() => {
                      requestNotification();
                  },6000);
              }
              // complete:requestNotification,
              // timeout: 60000
          });
        })();

        function notificationclick(){
            // e.preventDefault();
            $.ajax({
                type:'post',
                url:'<?php echo FOLDER_PATH ?>/my/updateStateAllNotifications'
            })
            .done(function(response){
                console.log(response);
            })
            .fail(function(){
                console.log('Hubo un error')
            })
        }
    </script>
</body>
</html>