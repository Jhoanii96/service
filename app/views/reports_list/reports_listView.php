<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="es">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reportes | Lista</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Examples of just how powerful ArchitectUI really is!">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- HEADER -->
    <link href="<?= FOLDER_PATH ?>/src/css/all_fonts.css" rel="stylesheet" media="screen">
    <link href="<?= FOLDER_PATH ?>/src/css/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/selectize.css"> -->

    <style>
        .select_users {
            font-family: Arial, Helvetica, sans-serif;
            flex: 1 1 auto;
            margin-right: 5px;
        }

        .selectize-dropdown {
            top: 35px !important;
        }

        .selectize-control.select_users::before {
            -moz-transition: opacity 0.2s;
            -webkit-transition: opacity 0.2s;
            transition: opacity 0.2s;
            content: ' ';
            z-index: 2;
            position: absolute;
            display: block;
            top: 12px;
            right: 34px;
            width: 16px;
            height: calc(2.25rem + 2px);
            background: url("<?= FOLDER_PATH ?>/src/assets/media/images/icons/spinner.gif") no-repeat;
            background-size: 16px 16px;
            opacity: 0;
        }

        .selectize-control.select_users.loading::before {
            opacity: 0.4;
        }

        .item_name {
            padding-left: 10px;
            height: 30px;
            width: 100%;
            display: table-cell;
            vertical-align: middle;
        }

        .selectize-input {
            overflow: initial;
        }

        @media (min-width: 576px) {
            #form-search {
                width: auto;
            }
        }

        .form-control,
        .custom-select {
            border-radius: 0;
        }
        .dataTables_filter {
            display: none;
        }
    </style>
    <style>
        .title-details {
            color: #468847;
            padding: 8px 35px 8px 14px;
            margin-bottom: 20px;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
            background-color: #e3f3fc;
            border: 1px solid #d9d5fb;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }
    </style>
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
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-home icon-gradient bg-mean-fruit">
                                    </i>
                                </div>
                                <div>Reporte
                                    <div class="page-title-subheading">Lista.
                                    </div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow btn btn-dark">
                                    <i class="fa fa-star"></i>
                                </button>
                            </div>
                        </div>
                    </div>


                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Reportes</h5>
                            <div class="mt-4 mb-1" style="align-content: center; align-items: center;">
                                <div class="form-inline">
                                    <div id="form-search" class="input-group" style="align-items: center;">
                                        <div class="position-relative input-group mb-4">
                                            <label class="mr-2 mt-auto mb-auto">Filtro</label>
                                            <select type="select" id="filter" name="filter" class="custom-select mr-2">
                                                <option value="1" selected>Fecha</option>
                                                <option value="2">Edad</option>
                                                <option value="3">Todas</option>
                                            </select>
                                        </div>
                                        <div id="busqueda" style="display: block;">
                                            <div class="position-relative input-group mb-4" id="b-name">
                                                <label class="mr-2 mt-auto mb-auto">Rango fecha</label>
                                                <input type="text" id="date_search" class="form-control" style="width: 215px;" name="daterange" value="<?= date("d/m/Y"); ?> - <?= date("d/m/Y"); ?>"/>
                                                <button id="btnsrc1" class="btn-icon btn-pill btn btn-primary ml-2" onclick="search(1)"><i class="mr-0 pe-7s-search btn-icon-wrapper"></i></button>
                                            </div>
                                            <div class="position-relative input-group mb-4" id="b-date" style="display: none;">
                                                <label class="mr-2 mt-auto mb-auto">Edad inicial</label>
                                                <input type="number" name="agei" id="agei" class="mr-2 form-control" style="width: 75px;" value="10" min="0" max="100">
                                                <label class="mr-2 mt-auto mb-auto">Edad final</label>
                                                <input type="number" name="agef" id="agef" class="mr-2 form-control" style="width: 75px;" value="30" min="0" max="100">
                                                <button id="btnsrc2" class="btn-icon btn-pill btn btn-primary" onclick="search(2)"><i class="mr-0 pe-7s-search btn-icon-wrapper"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-relative input-group mb-4">
                                        <div id="spsearch"></div>
                                    </div>
                                    <div class="input-group pb-4" style="margin-left: auto;">
                                        <div class="position-relative input-group">
                                            <input type="text" name="monto" id="monto" class="mr-2 form-control" value="Total: S/.0" style="width: 180px;" readonly>
                                            <input type="text" name="count" id="count" class="mr-2 form-control" value="Nro: 115" style="width: 90px;" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table id="example" style="width: 100%;" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Paciente</th>
                                        <th>Edad</th>
                                        <th>Fecha consultado</th>
                                        <th>Hora consultado</th>
                                        <th>Archivos</th>
                                        <th>Imagenes</th>
                                        <th>Precio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $count = 0;
                                    $monto = 0; 
                                    while ($Result = $data['Result']->fetch()) {

                                        $birthDate = explode("-", $Result['fecha_nacimiento']);
                                        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                                            ? ((date("Y") - $birthDate[0]) - 1)
                                            : (date("Y") - $birthDate[0]));

                                        /* $nombre = $datos_cita['nombre'] . ' ' . $datos_cita['apepa'] . ' ' . $datos_cita['apema'] . '|' . $datos_cita['id_paciente'] . '|' . $datos_cita['id'];
                                        $nombre = base64_encode(utf8_encode($nombre));
                                        */
                                        $count += 1; 
                                        $monto += $Result['monto'];

                                    ?>
                                        <tr>
                                            <td><?= $Result['nombre_paciente'] ?></td>
                                            <td class="text-center"><?= $age ?> años</td>
                                            <td class="text-center"><?= date("d/m/Y", strtotime($Result['fecha_consulta'])) ?></td>
                                            <td class="text-center"><?= date("h:i A", strtotime($Result['fecha_consulta'])) ?></td>
                                            <td class="text-center"><?= $Result['num_archivo'] ?></td>
                                            <td class="text-center"><?= $Result['num_imagen'] ?></td>
                                            <td class="text-center">S/.<?= number_format((float)$Result['monto'], 2, '.', ''); ?></td>
                                            <td class="text-center">
                                                <div role="group" class="btn-group-sm btn-group">
                                                    <!-- <button id="details_<?= $count ?>" onclick="GetDetails(<?= $count ?>)" meta-data="{<?php echo (base64_encode(utf8_encode("[" . $count . "]|" . $Result['id_historia'] . "-data-appointment-details"))); ?>}" data-toggle="modal" data-target="#AppDetails" class="btn btn-primary text-white">Detalles <i class="fa fa-eye"></i></button> -->
                                                    <button class="btn btn-warning text-white">Detalles <i class="fa fa-eye"></i></button>
                                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php

                                    }

                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Paciente</th>
                                        <th>Edad</th>
                                        <th>Fecha consultado</th>
                                        <th>Hora consultado</th>
                                        <th>Archivos</th>
                                        <th>Imagenes</th>
                                        <th>Precio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- MODAL USER CONFIGURATIONS  -->

    


    



    <!-- JQUERY -->
    <script src="<?= FOLDER_PATH ?>/src/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?= FOLDER_PATH ?>/src/js/main.d810cf0ae7f39f28f336.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    
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
    </script>
    <script>
        $(document).ready(function (){
            $("#monto").val("Total: S/. <?= number_format((float)$monto, 2, '.', '') ?>");
            $("#count").val("Nro: <?= $count ?>");
        });
        $(':input[readonly]').css({
            'background-color': '#fff'
        });
    </script>

    <script>
        $("#filter").on("change", function() {
            var data = document.getElementById("filter").value;
            if (data == '1') {
                $("#busqueda").css("display", "block");
                $("#b-name").css("display", "flex");
                $("#b-date").css("display", "none");
                withsize = window.innerWidth;
                if (withsize < 576) {
                    $("#form-search").css("width", "auto");
                } else {
                    $("#form-search").css("width", "");
                }

            }
            if (data == '2') {
                $("#busqueda").css("display", "block");
                $("#b-date").css("display", "flex");
                $("#b-name").css("display", "none");
                $("#form-search").css("width", "auto");

            }
            if (data == '3') {
                $("#busqueda").css("display", "none");
                search(3);
            }
        });

        function search(codbtn) {
            var numbtn = codbtn;
            var filter = document.getElementById("filter").value;
            if (filter != 1 && filter != 2 && filter != 3) {
                swal("Atención!", "Operación inválida", "warning");
                return;
            }
            if (numbtn == 1 || numbtn == 2 || numbtn == 3) {
                if (numbtn == 1) {
                    var sendsearch = document.getElementById("date_search").value;
                    var sendfilter = numbtn;
                }
                if (numbtn == 2) {
                    var sendsearch = document.getElementById("agei").value + "-" + document.getElementById("agef").value;
                    var sendfilter = numbtn;
                }
                if (numbtn == 3) {
                    var sendsearch = '';
                    var sendfilter = '3';
                }
            } else {
                swal("Atención!", "Operación inválida", "warning");
            }

            var data = new FormData();
            data.append("search", sendsearch);
            data.append("filter", sendfilter);

            $.ajax({
                beforeSend: function() {
                    $("#spsearch").append('<span id="spinner-src-' + numbtn + '" class="fa fa-spinner fa-spin" style="width: 14px; height: 14px; margin: 12px 12px;"></span>');
                    $("#btnsrc" + numbtn).attr("disabled", true);
                },
                url: "<?= FOLDER_PATH ?>/reports_list/search",
                type: "POST",
                data: data,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                success: function(resp) {
                    var obj_details = JSON.parse(resp);
                    $("#spinner-src-" + numbtn).remove();
                    $("#btnsrc" + numbtn).attr("disabled", false);
                    $("#example").html(obj_details[0]);
                    $("#monto").val("Total: S/." + obj_details[1].toFixed(2));
                    $("#count").val("Nro: " + obj_details[2]);
                }
            })
        }
    </script>
    
    <script>
        $('#save-paciente').click(function() {

            var dni = $("#dni").val();
            var nombre = $("#nombre").val();
            var apellidopa = $("#apellidopa").val();
            var apellidoma = $("#apellidoma").val();
            var genero = $("#genero").children("option:selected").val();
            var celular = $("#celular").val();
            var fechana = $("#fechana").val();
            var correo = $("#correo").val();
            var procedencia = $("#procedencia").val();

            if (dni == "") {
                swal("Atención!", "Debe seleccionar a un paciente.", "warning");
                return;
            }
            if (isNaN(Number(dni))) {
                swal("Atención!", "Debe ingresar el DNI del paciente válido.", "warning");
                return;
            }
            if (dni.length != 8) {
                swal("Atención!", "Debe ingresar los 8 dígitos de su DNI.", "warning");
                return;
            }

            if (nombre == "" || nombre == null) {
                swal("Atención!", "Debe ingresar el nombre del paciente.", "warning");
                return;
            }
            if (apellidopa == "" || apellidopa == null) {
                swal("Atención!", "Debe ingresar el apellido paterno del paciente.", "warning");
                return;
            }
            if (apellidoma == "" || apellidoma == null) {
                swal("Atención!", "Debe ingresar el apellido materno del paciente.", "warning");
                return;
            }
            if (genero == "-" || genero == null) {
                swal("Atención!", "Debe seleccionar su genero.", "warning");
                return;
            }
            if (celular == "" || celular == null) {
                swal("Atención!", "Debe ingresar el número de celular del paciente.", "warning");
                return;
            }
            if (fechana == "" || fechana == null) {
                swal("Atención!", "Debe ingresar la fecha de nacimiento del paciente.", "warning");
                return;
            }

            if (correo != "") {
                if (!validateEmail(correo)) {
                    swal("Atención!", "Debe ingresar un correo electrónico válido", "warning");
                    return;
                }
            }

            var data = new FormData();
            data.append("dni", dni);
            data.append("nombre", nombre);
            data.append("apellidopa", apellidopa);
            data.append("apellidoma", apellidoma);
            data.append("genero", genero);
            data.append("celular", celular);
            data.append("fechana", fechana);
            data.append("correo", correo);
            data.append("procedencia", procedencia);

            $.ajax({
                beforeSend: function() {
                    var btnsav = document.getElementById('save-paciente');
                    var text = btnsav.getAttribute('data-name-text');
                    $("#save-paciente").html('');
                    $("#save-paciente").append(text + '&ThinSpace;&ThinSpace;<span id="spinner-sv" class="fa fa-spinner fa-spin"></span>');
                    $("#save-paciente").attr("disabled", true);
                },
                url: "<?= FOLDER_PATH ?>/appointment/save_paciente",
                type: "POST",
                data: data,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                success: function(resp) {
                    $("#close-paciente").trigger('click');
                    $("#spinner-sv").remove();
                    $("#save-paciente").html('Agregar paciente');
                    $("#save-paciente").attr("disabled", false);

                    $("#dni").val("");
                    $("#nombre").val("");
                    $("#apellidopa").val("");
                    $("#apellidoma").val("");
                    $("#genero").val(0);
                    $("#celular").val("");
                    $("#fechana").val("");
                    $("#correo").val("");
                    $("#procedencia").val("");
                    /* var filter = document.getElementById("filter").value; */
                }
            })
        });
    </script>
    
</body>

</html>