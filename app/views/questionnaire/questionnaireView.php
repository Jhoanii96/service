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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
                            <form class="form-inline mb-5 mt-4" >
                                <!-- <div class="col-md-6"> -->
                                    <!-- <input name="filter" id="filter" type="text" style="width: 400px;" placeholder="Busque su pregunta" class="form-control">
                                    <button class="btn btn-primary ml-2" >Buscar</button> -->
                                <!-- </div> -->
                                    <div>
                                        <button type="button" class="btn btn-warning"  id="btnAddAnswer" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>   Agregar</button>
                                    </div>
                            </form>
                        <table style="width: 100%;" id="tblQuestionnaire" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>    
                                    <!-- <th style='display:none;'>id</th> -->
                                    <th>Nro</th>
                                    <th>Pregunta</th>    
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <button class="btn btn-warning" id="btnAddQuestion">Agregar</button> -->
                                    <?php
                                    $questions = $this->showQuestion();
                                    
                                    for($i=0 ;$i < count($questions);$i++){
                                        $idQuestion[$i] = $questions[$i]['Id_Detalle'];
                                        $j = $i+1;
                                        echo "<tr>";
                                        // echo "<td style='display:none;'>$idQuestion[$i]</td>";
                                        echo "<td>$j</td>";
                                        echo "<td>". $questions[$i]['Pregunta']. "</td>";
                                            // echo "<td> 1</td>";
                                        echo "<td class='text-center'>
                                                <div role='group' class='btn-group-sm btn-group'>
                                                    <button class='btn-shadow btn btn-warning text-white'><i class='fa fa-edit' ></i> Editar</button>
                                                    <button class='btn-shadow btn btn-danger btnDeleteQuestion' onclick='deleteQuestion(".$idQuestion[$i].",this)'><i class='fa fa-trash'></i></button>
                                                </div>
                                             </td>";
                                        echo "</tr>";
                                        }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
              <!-- END CONTENIDO AYUDA -->
            </div>
          </div>
      </div>
    </div>
    
    <!-- MODAL ADD QUESTION -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Pregunta:</label>
                            <input type="text" class="form-control" id="answer">
                        </div>
                        <!-- <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnSaveAnswer" >Guardar pregunta</button>
                </div>
            </div>
        </div>
    </div>

    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script src="<?= FOLDER_PATH ?>/src/js/jquery-3.2.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?= FOLDER_PATH ?>/src/js/main.d810cf0ae7f39f28f336.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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


        $('.btnDeleteQuestion').click(function(){
            let data = $(this).val();
            console.log(data);
        })

        function deleteQuestion(idQuestion,value){
            let i = value.parentNode.parentNode.parentNode.rowIndex;
            $.ajax({
                type: 'POST',
                url: '<?= FOLDER_PATH ?>/questionnaire/deleteQuestion',
                data: {id:idQuestion}
            })
            .done(function(data){
                let table = document.getElementById('tblQuestionnaire');
                table.deleteRow(i);
                // alert(data);
                Swal.fire({
                    icon: 'success',
                    title: data,
                    showConfirmButton: false,
                    timer: 1500
                })
            })
            .fail(function(){
                // alert('error');
                Swal.fire({
                    icon: 'error',
                    title: 'Hubo un error',
                    showConfirmButton: false,
                    timer: 1500
                })
            })
        }

        $('#btnSaveAnswer').click(function(e){
            e.preventDefault();
            let dato = $('#answer').val();
            
            if(dato !== ''){
                $.ajax({
                    url: '<?= FOLDER_PATH ?>/questionnaire/insertQuestion',
                    type: 'post',
                    data: {dato}
                })
                .done(function(response){
                        let table = document.getElementById('tblQuestionnaire');
                        let rowCount = table.rows.length; 
                        let content = '<td>';
                        content += rowCount;
                        content += '</td>';
                        content += '<td>';
                        content += dato;
                        content += '</td>';
                        content += '<td class="text-center">';
                        content +=      '<div role="group" class="btn-group-sm btn-group">';
                        content +=          '<button class="btn-shadow btn btn-warning text-white"><i class="fa fa-edit"></i> Editar</button>';
                        content +=          '<button class="btn-shadow btn btn-danger btnDeleteQuestion"><i class="fa fa-trash"></i></button>';
                        content +=       '</div>';
                        content += '</td>';
                        table.insertRow(-1).innerHTML = content;
                    $('#answer').val('');
                    console.log(response);
                })
                .fail(function(error){
                    console.log(error);
                })
            }

                // $('#exampleModal').modal('hide');
        })
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