<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="es">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Citas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Examples of just how powerful ArchitectUI really is!">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- HEADER -->
    <link href="<?= FOLDER_PATH ?>/src/css/all_fonts.css" rel="stylesheet" media="screen">
    <link href="<?= FOLDER_PATH ?>/src/css/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/selectize.css">

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
                                <div>Citas
                                    <div class="page-title-subheading">Bienvenido.
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
                            <h5 class="card-title">REGISTRO DE CITAS</h5>
                            <div class="mt-4 mb-1" style="align-content: center; align-items: center;">
                                <div class="form-inline">
                                    <div id="form-search" class="input-group" style="align-items: center;">
                                        <div class="position-relative input-group mb-4">
                                            <label class="mr-2 mt-auto mb-auto">Filtro</label>
                                            <select type="select" id="filter" name="filter" class="custom-select mr-2">
                                                <option value="1">Nombre paciente</option>
                                                <option value="2" selected>Fecha cita</option>
                                                <option value="3">Todas las fechas</option>
                                            </select>
                                        </div>
                                        <div id="busqueda" style="display: block;">
                                            <div class="position-relative input-group mb-4" id="b-name" style="display: none;">
                                                <label class="mr-2 mt-auto mb-auto">Nombre paciente</label>
                                                <select id="user-search1" class="select_users" placeholder="Escriba el usuario..."></select>
                                                <button id="btnsrc1" class="btn-icon btn-pill btn btn-primary ml-2" onclick="search(1)"><i class="mr-0 pe-7s-search btn-icon-wrapper"></i></button>
                                            </div>
                                            <div class="position-relative input-group mb-4" id="b-date">
                                                <label class="mr-2 mt-auto mb-auto">Fecha Cita</label>
                                                <input type="date" name="date" id="date" class="mr-2 form-control" value="<?= date("Y-m-d"); ?>">
                                                <button id="btnsrc2" class="btn-icon btn-pill btn btn-primary" onclick="search(2)"><i class="mr-0 pe-7s-search btn-icon-wrapper"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-relative input-group mb-4">
                                        <div id="spsearch"></div>
                                    </div>
                                    <div class="input-group pb-4" style="margin-left: auto;">
                                        <div class="position-relative input-group">
                                            <button class="btn-icon btn-pill btn btn-info mr-1" data-toggle="modal" data-target="#exampleModal1">Añadir paciente</button>
                                            <button class="btn-icon btn-pill btn btn-success" data-toggle="modal" data-target="#exampleModal">Agregar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table id="list-citas" style="width: 100%;" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Paciente</th>
                                        <th>Edad</th>
                                        <th>Hora</th>
                                        <th>Estado</th>
                                        <th>Detalles</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    while ($datos_cita = $data['datos_cita']->fetch()) {

                                        if ($datos_cita['estado'] == 0) {
                                            $estado = "Atender";
                                            $css = "#000eb9";
                                        }
                                        if ($datos_cita['estado'] == 1) {
                                            $estado = "Atendido";
                                            $css = "#008c44";
                                        }

                                        $birthDate = explode("-", $datos_cita['fenac']);
                                        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                                            ? ((date("Y") - $birthDate[0]) - 1)
                                            : (date("Y") - $birthDate[0]));

                                        $nombre = $datos_cita['nombre'] . ' ' . $datos_cita['apepa'] . ' ' . $datos_cita['apema'] . '|' . $datos_cita['id_paciente'] . '|' . $datos_cita['id'];
                                        $nombre = base64_encode(utf8_encode($nombre));

                                    ?>
                                        <tr>
                                            <td><?= $datos_cita['nombre'] ?> <?= $datos_cita['apepa'] ?> <?= $datos_cita['apema'] ?></td>
                                            <td class="text-center"><?= $age ?> años</td>
                                            <td class="text-center"><?= date("h:i A", strtotime($datos_cita['fechacita'])) ?></td>
                                            <?php
                                            if ($datos_cita['estado'] == 0 && (date("Y-m-d H:i:s") >= $datos_cita['fechacita'])) {
                                            ?>
                                                <td class="text-center">
                                                    <a href="<?php echo (FOLDER_PATH . '/consultation?cod_name=' . $nombre); ?>" target="_blank" style="background-color: #00e6dc;color: <?= $css ?>;white-space: nowrap; padding: 0px 4px;">
                                                        <?= $estado ?>
                                                    </a>
                                                </td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($datos_cita['estado'] == 0 && (date("Y-m-d H:i:s") < $datos_cita['fechacita'])) {
                                            ?>
                                                <td class="text-center" style="color: #000;"><?= $estado ?></td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($datos_cita['estado'] == 1) {
                                            ?>
                                                <td class="text-center" style="color: <?= $css ?>;"><?= $estado ?></td>
                                            <?php
                                            }
                                            ?>
                                            <td class="text-center">
                                                <div role="group" class="btn-group-sm btn-group">
                                                    <button class="btn btn-primary text-white">Detalles <i class="fa fa-eye"></i></button>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div role="group" class="btn-group-sm btn-group">
                                                    <button class="btn btn-warning text-white">Editar <i class="fa fa-edit"></i></button>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div role="group" class="btn-group-sm btn-group">
                                                    <button class="btn btn-danger">Eliminar <i class="fa fa-trash"></i></button>
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
                                        <th>Hora</th>
                                        <th>Estado</th>
                                        <th>Detalles</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar cita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Busque el usuario, la fecha y la hora en que realizará la cita</p>
                    <br>
                    <label class="mr-2 mt-auto mb-auto">Buscar paciente</label>
                    <select id="user-search2" class="select_users mr-0" placeholder="Escriba el paciente..."></select>
                    <label class="mr-2 mt-auto mb-auto">Fecha</label>
                    <input type="date" name="date2" id="date2" class="mr-2 form-control" value="<?= date("Y-m-d"); ?>">
                    <label class="mr-2 mt-auto mb-auto">Hora</label>
                    <input class="form-control input-mask-trigger mr-2" id="endTime">
                </div>
                <div class="modal-footer">
                    <button id="close-cita" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button id="save-cita" type="button" data-name-text="Agregando" class="btn btn-primary">Agregar cita</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar paciente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Agregue un nuevo paciente para luego agregar una cita</p>
                    <br>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="dni">DNI</label>
                                <input name="dni" id="dni" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="nombre">Nombres</label>
                                <input name="nombre" id="nombre" type="text" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="apellidopa">Apellido Paterno</label>
                                <input name="apellidopa" id="apellidopa" type="text" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="apellidoma">Apellido Materno</label>
                                <input name="apellidoma" id="apellidoma" type="text" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="genero">Género</label>
                                <select type="select" id="genero" name="genero" class="custom-select" required>
                                    <option value="-">Seleccionar</option>
                                    <option value="F">Femenino</option>
                                    <option value="M">Másculino</option>
                                    <option value="3">Otros</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="fechana">Fecha Nacimiento</label>
                                <input name="fechana" id="fechana" type="date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="celular">Número Celular</label>
                                <input name="celular" id="celular" type="text" maxlength="9" onkeypress="return validaNumericos(event)" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="correo">Correo Electrónico</label>
                                <input name="correo" id="correo" type="email" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="procedencia">Procedencia</label>
                                <input name="procedencia" id="procedencia" type="text" style="text-transform: uppercase;" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="close-paciente" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button id="save-paciente" type="button" data-name-text="Agregando" class="btn btn-primary">Agregar paciente</button>
                </div>
            </div>
        </div>
    </div>
    <!-- JQUERY -->
    <script src="<?= FOLDER_PATH ?>/src/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?= FOLDER_PATH ?>/src/js/main.d810cf0ae7f39f28f336.js"></script>
    <script src="<?= FOLDER_PATH ?>/src/js/cuestionario.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script src="<?= FOLDER_PATH ?>/src/js/selectize.min.js"></script>
    <script>
        $('input[id$="endTime"]').inputmask("hh:mm", {
            placeholder: "HH:MM",
            insertMode: false,
            showMaskOnHover: false,
            hourFormat: "24"
        });
    </script>
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
                    $("#form-search").css("width", "70%");
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
                    var sendsearch = $("#user-search1").children("option:selected").val();
                    var sendfilter = numbtn;
                }
                if (numbtn == 2) {
                    var sendsearch = document.getElementById("date").value;
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
                url: "<?= FOLDER_PATH ?>/appointment/search",
                type: "POST",
                data: data,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                success: function(resp) {
                    $("#spinner-src-" + numbtn).remove();
                    $("#btnsrc" + numbtn).attr("disabled", false);
                    $("#list-citas").html(resp);
                }
            })
        }
    </script>
    <script>
        $('#user-search1').selectize({
            valueField: 'id',
            labelField: 'name',
            searchField: 'name',
            options: [],
            create: false,
            render: {
                option: function(item) {
                    return '<div><span class="item_name">' + item.name + '</span></div>';
                }
            },
            load: function(query, callback) {
                if (!query.length) return callback();
                $.ajax({
                    url: "<?php echo FOLDER_PATH ?>/appointment/load_users",
                    type: 'POST',
                    data: {
                        nom_user: query
                    },
                    error: function() {
                        callback();
                    },
                    success: function(res) {
                        var as = JSON.parse(res);
                        callback(as.users);
                    }
                });
            }
        });
        $('#user-search2').selectize({
            valueField: 'id',
            labelField: 'name',
            searchField: 'name',
            options: [],
            create: false,
            render: {
                option: function(item) {
                    return '<div><span class="item_name">' + item.name + '</span></div>';
                }
            },
            load: function(query, callback) {
                if (!query.length) return callback();
                $.ajax({
                    url: "<?php echo FOLDER_PATH ?>/appointment/load_users_new_cita",
                    type: 'POST',
                    data: {
                        nom_user: query
                    },
                    error: function() {
                        callback();
                    },
                    success: function(res) {
                        var as = JSON.parse(res);
                        callback(as.users);
                    }
                });
            }
        });
    </script>
    <script>
        $('#save-cita').click(function() {
            var usersearch = $("#user-search2").children("option:selected").val();
            var datecita = $("#date2").val();
            var timecita = $("#endTime").val();
            if (usersearch == "" || usersearch == null) {
                swal("Atención!", "Debe seleccionar a un paciente.", "warning");
                return;
            }
            if (datecita == "" || datecita == null) {
                swal("Atención!", "Debe definir una fecha.", "warning");
                return;
            }
            if (timecita == "" || timecita == null) {
                swal("Atención!", "Debe definir una hora en la que se realizará la hora de atención.", "warning");
                return;
            }

            var data = new FormData();
            data.append("usersearch", usersearch);
            data.append("datecita", datecita);
            data.append("timecita", timecita);

            $.ajax({
                beforeSend: function() {
                    var btnsav = document.getElementById('save-cita');
                    var text = btnsav.getAttribute('data-name-text');
                    $("#save-cita").html('');
                    $("#save-cita").append(text + '&ThinSpace;&ThinSpace;<span id="spinner-sv" class="fa fa-spinner fa-spin"></span>');
                    $("#save-cita").attr("disabled", true);
                },
                url: "<?= FOLDER_PATH ?>/appointment/save",
                type: "POST",
                data: data,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                success: function(resp) {
                    $("#close-cita").trigger('click');
                    $("#spinner-sv").remove();
                    $("#save-cita").html('Agregar cita');
                    $("#save-cita").attr("disabled", false);

                    /* var filter = document.getElementById("filter").value; */
                    search(3);
                }
            })
        });
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
            
            if (correo == "" || correo == null) {
                swal("Atención!", "Debe ingresar un correo electrónico.", "warning");
                return;
            }
            if (!validateEmail(correo)) {
                swal("Atención!", "Debe ingresar un correo electrónico válido", "warning");
                return;
            }
            if (procedencia == "" || procedencia == null) {
                swal("Atención!", "Debe definir una fecha.", "warning");
                return;
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
                    $("#save-cita").attr("disabled", true);
                },
                url: "<?= FOLDER_PATH ?>/appointment/save_paciente",
                type: "POST",
                data: data,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                success: function(resp) {
                    $("#close-cita").trigger('click');
                    $("#spinner-sv").remove();
                    $("#save-paciente").html('Agregar paciente');
                    $("#save-paciente").attr("disabled", false);

                    /* var filter = document.getElementById("filter").value; */
                    search(3);
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
</body>

</html>