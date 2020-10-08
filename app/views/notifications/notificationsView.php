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
  <?php require(ROOT . '/' . PATH_VIEWS . 'alert_message.php'); ?>
  <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    <!-- HEADER -->
    <?php require(ROOT . '/' . PATH_VIEWS . 'panel_superior.php'); ?>
    <!-- PANEL LATERAL DERECHO/CONFIGURACIONES DE DISEÑO -->
    <!--?php require(ROOT . '/' . PATH_VIEWS . 'panel_lateral_der.php'); ?-->

    <div id="body-main" class="app-main" <?php if (isset($act_msg)) if ($act_msg == 1) echo (' style="padding-top: 120px;"'); ?>>

      <!-- PANEL LATERAL IZQUIERDO -->
      <?php require(ROOT . '/' . PATH_VIEWS . 'panel_lateral_izq.php'); ?>

      <div class="app-main__outer">
        <div class="app-main__inner">
          <div class="app-page-title">
            <div class="page-title-wrapper">
              <div class="page-title-heading">
                <div class="page-title-icon">
                  <i class="pe-7s-home icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Notificaciones
                  <div class="page-title-subheading">
                      Notificaciones del administrador.
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
                        <!-- <div class="row"> -->
                          <!-- <button class="btn btn-outline-dark mb-3" id="btnCheckNotification"><i class="fas fa-check"></i>  Marcar todo como leido</button>
                          <button class="btn btn-outline-primary mb-3" id="btnUncheckNotification" style="display:none" ><i class="fas fa-check"></i>  Desmarcar todo como leido</button>
                          <button class="btn btn-outline-danger mb-3" id="btnShowAllNotification"><i class="far fa-eye"></i>  Mostrar todas las notificaciones</button> -->
                        <!-- </div> -->
                        <?php
                          $notification = $this->showNotifications();
                          if($notification === null){
                            echo "<div class='mb-2' style='text-align:center;border:1px groove rgba(119, 136, 153,0.5);padding:25px;'>";
                            echo    "<b><span><i class='fas fa-bell'></i> No tiene nuevas notificaciones</span></b>";
                            echo "</div>";
                          }else{
                            foreach ($notification as $notificacion) {
                              echo "<div class='notification-card  mb-2' style='border:1px solid rgba(119, 136, 153,0.2);padding:15px;box-shadow: -1px 8px 5px -6px rgba(119,136,153,0.64);'>";
                              echo    "<input type='hidden' class='id_notification' value='".$notificacion['Id']."'>";
                              echo    "<b><span>".$notificacion['Titulo']."</span></b><br>";  
                              // if($notificacion['Leido'] === '1'){
                              //   echo    "<input type='checkbox' class='checkNotification' style='float:right' checked><br>";
                              // }else{
                              //   echo    "<input type='checkbox' class='checkNotification' style='float:right'><br>";
                              // }
                              echo    "<span>".$notificacion['Descripcion']."</span>";
                              if($notificacion['Fecha']){
                                
                              }
                              echo    "<div class='notification_time mb-3' style='color:#F08080'><i class='far fa-clock mr-1'></i>".$notificacion['Fecha']."</div>";
                              // echo    "<div style='display:flex;justify-content:flex-end'>";
                              // echo      "<button class='btn btn-primary' >Contactar</button>";
                              // echo    "</div>";
                              echo "</div>";
                            }
                          }
                        ?>   
                        </div>
                      </div>
                    </div>
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
<script>
  $('#btnCheckNotification').click(function(e){
    e.preventDefault();

    $('.checkNotification').each(function(){
      $(this).prop('checked',true);
      console.log('checked');
    });
    $('#btnCheckNotification').css('display','none');
    $('#btnUncheckNotification').css('display','inline-block');

  });

  $('#btnUncheckNotification').click(function(e){
    e.preventDefault();

    $('.checkNotification').each(function(){
      $(this).prop('checked',false);
      console.log('checked');
    });
    $('#btnCheckNotification').css('display','inline-block');
    $('#btnUncheckNotification').css('display','none');
  });

  $('#btnShowAllNotification').click(function(e){
    e.preventDefault();

    $('.notification-card').css('display','block');
  })

  $('.checkNotification').change(function(e){
    e.preventDefault();

    let data = $(this).siblings('.id_notification').val();
    let state = $(this).is(':checked') ? true : false;
    console.log(state);
    $.ajax({
      type:'post',
      url:'<?php echo FOLDER_PATH ?>/notifications/updateStateNotification',
      data: {id:data, state}
    })
    .done(function(response){
      alert(response);
    })
    .fail(function(){
      alert('Hubo un error');
    })
    // $(this).parent().css('display','none');
  });

  /** Para las notificaciones */

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

  $(window).load(function(){
    // e.preventDefault();

    let date = $('.notification_time').html();
    console.log(date);
  });

  function showDate(dateNotification){
    // if(dateNotification){

    // }
  }
</script>

</html>