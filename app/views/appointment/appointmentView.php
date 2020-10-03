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
                                            <button id="op-paciente" class="btn-icon btn-pill btn btn-info mr-1" data-toggle="modal" data-target="#exampleModal1">Añadir paciente</button>
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

                                    $count = 0;
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

                                        $count += 1;

                                    ?>
                                        <tr>
                                            <td><?= $datos_cita['nombre'] ?> <?= $datos_cita['apepa'] ?> <?= $datos_cita['apema'] ?></td>
                                            <td class="text-center"><?= $age ?> años</td>
                                            <td class="text-center"><?= date("h:i A", strtotime($datos_cita['fechacita'])) ?></td>
                                            <?php
                                            if ($datos_cita['estado'] == 0) {
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
                                            if ($datos_cita['estado'] == 1) {
                                            ?>
                                                <td class="text-center" style="color: <?= $css ?>;"><?= $estado ?></td>
                                            <?php
                                            }
                                            ?>
                                            <td class="text-center">
                                                <div role="group" class="btn-group-sm btn-group">
                                                    <button id="details_<?= $count ?>" onclick="GetDetails(<?= $count ?>)" meta-data="{<?php echo (base64_encode(utf8_encode("[" . $count . "]|" . $datos_cita['id'] . "-data-appointment-details"))); ?>}" data-toggle="modal" data-target="#AppDetails" class="btn btn-primary text-white">Detalles <i class="fa fa-eye"></i></button>
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
                    <p class="mb-0">Busque el usuario, la fecha y la hora en que realizará la cita, si el paciente no existe haga <span id="to-paciente" style="cursor: pointer;text-decoration: underline;color: #000eb9;">click</span> aquí para añadir un nuevo paciente.</p>
                    <br>
                    <label class="mr-2 mt-auto mb-auto">Buscar paciente</label>
                    <select id="user-search2" class="select_users mr-0" placeholder="Escriba el paciente...">
                    </select>
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
                                <input name="dni" id="dni" type="text" class="form-control" maxlength="8" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="nombre">Nombres</label>
                                <input name="nombre" id="nombre" type="text" class="form-control" maxlength="50" style="text-transform: uppercase;" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="apellidopa">Apellido Paterno</label>
                                <input name="apellidopa" id="apellidopa" type="text" class="form-control" maxlength="30" style="text-transform: uppercase;" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="apellidoma">Apellido Materno</label>
                                <input name="apellidoma" id="apellidoma" type="text" class="form-control" maxlength="30" style="text-transform: uppercase;" required>
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


    <div class="modal fade" id="AppDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalles de la cita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="data-loading" style="display: block; margin: auto;">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgba(241, 242, 243, 0); display: block;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                        <rect x="40" y="40" width="6" height="6" fill="#7bc3d1">
                            <animate attributeName="fill" values="#1e80cd;#7bc3d1;#7bc3d1" keyTimes="0;0.125;1" dur="1.1111111111111112s" repeatCount="indefinite" begin="0s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="47" y="40" width="6" height="6" fill="#7bc3d1">
                            <animate attributeName="fill" values="#1e80cd;#7bc3d1;#7bc3d1" keyTimes="0;0.125;1" dur="1.1111111111111112s" repeatCount="indefinite" begin="0.1388888888888889s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="54" y="40" width="6" height="6" fill="#7bc3d1">
                            <animate attributeName="fill" values="#1e80cd;#7bc3d1;#7bc3d1" keyTimes="0;0.125;1" dur="1.1111111111111112s" repeatCount="indefinite" begin="0.2777777777777778s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="40" y="47" width="6" height="6" fill="#7bc3d1">
                            <animate attributeName="fill" values="#1e80cd;#7bc3d1;#7bc3d1" keyTimes="0;0.125;1" dur="1.1111111111111112s" repeatCount="indefinite" begin="0.9722222222222222s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="54" y="47" width="6" height="6" fill="#7bc3d1">
                            <animate attributeName="fill" values="#1e80cd;#7bc3d1;#7bc3d1" keyTimes="0;0.125;1" dur="1.1111111111111112s" repeatCount="indefinite" begin="0.41666666666666663s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="40" y="54" width="6" height="6" fill="#7bc3d1">
                            <animate attributeName="fill" values="#1e80cd;#7bc3d1;#7bc3d1" keyTimes="0;0.125;1" dur="1.1111111111111112s" repeatCount="indefinite" begin="0.8333333333333333s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="47" y="54" width="6" height="6" fill="#7bc3d1">
                            <animate attributeName="fill" values="#1e80cd;#7bc3d1;#7bc3d1" keyTimes="0;0.125;1" dur="1.1111111111111112s" repeatCount="indefinite" begin="0.6944444444444444s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="54" y="54" width="6" height="6" fill="#7bc3d1">
                            <animate attributeName="fill" values="#1e80cd;#7bc3d1;#7bc3d1" keyTimes="0;0.125;1" dur="1.1111111111111112s" repeatCount="indefinite" begin="0.5555555555555556s" calcMode="discrete"></animate>
                        </rect>
                    </svg>
                </div>
                <div id="data-details" style="display: none;">
                    <div class="modal-body">
                        <p class="mb-0 title-details">Datos del paciente</p>
                        <div class="form-row mt-3">
                            <div class="col-md-5 ml-4 mr-4">
                                <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 10px;">Nombre: </label>
                                    <span id="det_nom" style="padding: 7px 0; left: 5px; white-space: nowrap;"></span>
                                </div>

                                <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">DNI: </label>
                                    <span id="det_dni" style="padding: 7px 0; left: 5px;"></span>
                                </div>
                                <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Genero: </label>
                                    <span id="det_gen" style="padding: 7px 0; left: 5px;"></span>
                                </div>
                                <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Edad: </label>
                                    <span id="det_edad" style="padding: 7px 0; left: 5px;"></span>
                                </div>
                            </div>

                            <div class="col-md-5 ml-4 mr-4">
                                <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Fecha de nacimiento: </label>
                                    <span id="det_fn" style="padding: 7px 0; left: 5px;"></span>
                                </div>
                                <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Celular: </label>
                                    <span id="det_cel" style="padding: 7px 0; left: 5px;"></span>
                                </div>
                                <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Email: </label>
                                    <span id="det_email" style="padding: 7px 0; left: 5px;"></span>
                                </div>

                            </div>
                        </div>

                        <p class="mb-0 title-details">Datos de la cita</p>
                        <div class="form-row mt-3">
                            <div class="col-md-5 ml-4 mr-4">
                                <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Fecha cita: </label>
                                    <span id="det_fc" style="padding: 7px 0; left: 5px;"></span>
                                </div>
                            </div>
                            <div class="col-md-5 ml-4 mr-4">
                                <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Estado: </label>
                                    <span id="det_est" style="padding: 7px 0; left: 5px;"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
        function validaNumericos(event) {
            if (event.charCode >= 48 && event.charCode <= 57) {
                return true;
            }
            return false;
        }
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

                    $("#date2").val("");
                    $("#endTime").val("");
                    $("#user-search2")[0].selectize.clear();

                    search(3);
                }
            })
        });
    </script>
    <script>
        $('#to-paciente').click(function() {
            $("#close-cita").trigger('click');
            $("#op-paciente").trigger('click');
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
    <script>
        function validateEmail(e) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(e).toLowerCase());
        }
    </script>
    <script>
        function GetDetails(e) {
            var data_app = document.getElementById('details_' + e);
            var meta_data = data_app.getAttribute('meta-data');

            var data = new FormData();
            data.append("meta_data", meta_data);
            $.ajax({
                beforeSend: function() {
                    $("#data-details").css("display", "none");
                    $("#data-loading").css("display", "block");
                    /* $("#data-details").html(''); */
                },
                url: "<?= FOLDER_PATH ?>/appointment/show_details",
                type: "POST",
                data: data,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                success: function(resp) {
                    var obj_details = JSON.parse(resp);
                    var genero = '';
                    var estado = '';
                    obj_details = obj_details[0];


                    if (obj_details[7] == 'M') {
                        genero = 'Masculino';
                    }
                    if (obj_details[7] == 'F') {
                        genero = 'Femenino';
                    }
                    if (obj_details[7] == 'O') {
                        genero = 'Otros';
                    }
                    if (obj_details[10] == '0') {
                        estado = 'Pendiente';
                    }
                    if (obj_details[10] == '1') {
                        estado = 'Atendido';
                    }
                    if (obj_details[10] == '2') {
                        estado = 'Anulado';
                    }

                    $("#det_nom").html(obj_details[1] + ' ' + obj_details[2] + ' ' + obj_details[3]);
                    $("#det_dni").html(obj_details[4]);
                    $("#det_gen").html(genero);
                    $("#det_edad").html(calcularEdad(obj_details[6]));
                    $("#det_fn").html(obj_details[12]);
                    $("#det_cel").html(obj_details[5]);
                    $("#det_email").html((obj_details[11] != '') ? obj_details[11] : "No definido");
                    $("#det_fc").html(obj_details[8]);
                    $("#det_est").html(estado);

                    $("#data-loading").css("display", "none");
                    $("#data-details").css("display", "block");

                    /* $("#data-details").html(resp); */
                }
            })
        }

        function calcularEdad(fechana) {
            console.log(fechana);
            let dateParts = fechana.split("-");
            let hoy = new Date();
            let cumpleanos = new Date(dateParts[0], dateParts[1] - 1, dateParts[2].substr(0, 2));
            let edad = hoy.getFullYear() - cumpleanos.getFullYear();
            let m = hoy.getMonth() - cumpleanos.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }
            edad = edad.toString() + " años";
            return edad;
        }


        /** para las notificaciones */
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
                console.log('Hubo un error');
            })
        }
    </script>
</body>

</html>