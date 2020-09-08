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
, 
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
                    <button type="button" class="btn btn-warning" id="btnAddAnswer" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar</button>
                        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
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
                                                    <button class='btn-shadow btn btn-danger btnDeleteQuestion' onclick='deleteQuestion(".$idQuestion[$i].")'><i class='fa fa-trash'></i></button>
                                                </div>
                                             </td>";
                                        echo "</tr>";
                                        }
                                    ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <!-- <th style='display:none;'>id</th> -->
                                    <th>Nro</th>
                                    <th>Pregunta</th>    
                                    <th>Opciones</th>
                                </tr>
                            </tfoot>
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
                            <input type="text" class="form-control" id="recipient-name">
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


        $('.btnDeleteQuestion').click(function(){
            let data = $(this).val();
            console.log(data);
        })

        function deleteQuestion(idQuestion){
            
            $.ajax({
                type: 'POST',
                url: '<?= FOLDER_PATH ?>/questionnaire/deleteQuestion',
                data: {id:idQuestion}
            })
            .done(function(data){
                alert(data);
            })
            .fail(function(){
                alert('error');
            })
        }

        // $('#btnSaveAnswer').submit(function(){
            
        // })
        // .done(function(){

        // })
        // .fail(function(){

        // })
    </script>
</body>
</html>