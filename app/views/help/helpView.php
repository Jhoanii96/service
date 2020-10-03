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
                                <i class="pe-7s-home icon-gradient bg-mean-fruit">
                                </i>
                            </div>
                            <div>Ayuda
                                <div class="page-title-subheading">
                                    Envianos tus problemas.
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
              <!-- CONTENIDO AYUDA -->
              <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card-shadow-info border mb-3 card card-body border-info">
                            <div class="card-body">
                                <h6 class="card-title">MENSAJE</h6>
                                En caso de algun problema o inconveniente envie un mensaje indicando el asunto y el problema o inconveniente que tiene
                            </div>
                        </div>
                        <div class="card-shadow-info border mb-3 card card-body border-info">
                            <div class="card-body">
                                <h6 class="card-title">MENSAJE 2 </h6>
                                Puede contactarnos al numero 9598564871 o al correo edison@gmail.com
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">TENGO UNA CONSULTA</h5>
                                <form class="">
                                    <div class="position-relative form-group"><label for="exampleEmail" class="">Asunto</label><input name="asunto" id="asunto" placeholder="Ingrese el asunto del mensaje" type="text" class="form-control"></div>
                                    <div class="position-relative form-group"><label for="exampleText" class="">Mensaje</label><textarea name="text" id="exampleText" class="form-control"></textarea></div>
                                    <div class="position-relative form-group"><label for="exampleFile" class="">File</label><input name="file" id="exampleFile" type="file" class="form-control-file">
                                        <small class="form-text text-muted">En caso de tener alguna captura o archivo puede adjuntarlo al mensaje.</small>
                                    </div>
                                    <button class="mt-1 btn btn-primary">Enviar consulta</button>
                                </form>
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