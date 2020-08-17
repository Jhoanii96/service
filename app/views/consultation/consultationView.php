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
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> -->
    <!-- <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/select2.css"> -->
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/js/select2-bootstrap4.css">
    <!-- <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/js/select2.js"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/selectize.css">

    <style>
        #example1_wrapper>div:nth-child(2) {
            overflow-x: auto;
            border-right: none;
        }

        @media only screen and (min-width: 128px) and (max-width: 992px) {
            #example1_wrapper>div:nth-child(2) {
                overflow-x: auto;
                padding-right: 0px;
                margin-right: 0px;
                border-right: 1px solid #f4f4f4;
                padding-top: 0px;
                margin-top: 0px;
            }
        }

        .dropzone {
            width: 100%;
            height: 200px;
            border: 2px dashed #ccc;
            color: #ccc;
            line-height: 200px;
            text-align: center;
        }

        .dropzone.dragover {
            border-color: #000;
            color: #000;
        }
    </style>

    <style>
        .select_users {
            font-family: Arial, Helvetica, sans-serif;
            flex: 1 1 auto;
            margin-right: 5px;
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

        .selectize-dropdown {
            top: 35px !important;
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

        #content-select>span.select2-container--bootstrap4 {
            width: auto !important;
        }
    </style>
    <!-- HEADER -->
    <link href="<?= FOLDER_PATH ?>/src/css/all_fonts.css" rel="stylesheet" media="screen">
    <link href="<?= FOLDER_PATH ?>/src/css/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">

        <!-- HEADER -->
        <?php require(ROOT . '/' . PATH_VIEWS . 'panel_superior.php'); ?>

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
                                <div>Nueva consulta
                                    <div class="page-title-subheading">Bienvenido.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">

                        <div class="col-md-12 col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <div id="smartwizard2" class="forms-wizard-alt">
                                        <ul class="forms-wizard">
                                            <li>
                                                <a href="#step-1">
                                                    <em>1</em><span>Datos paciente</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-2">
                                                    <em>2</em><span>Cuestionario</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-3">
                                                    <em>3</em><span>Prueba clinica</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-4">
                                                    <em>4</em><span>Citas</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="form-wizard-content">
                                            <div id="step-1">
                                                <form id="frm-search-patient">
                                                    <div class="form-row">
                                                        <div class="col-md-2">
                                                            <label for="customSelect">Buscar</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-2">
                                                            <div class="position-relative input-group">
                                                                <select type="select" id="filter-search" name="filter-search" class="custom-select">
                                                                    <option value="0">Seleccionar</option>
                                                                    <option value="1">DNI</option>
                                                                    <?php
                                                                    if ($data['nombre_usuario'][0] != "nothing") {
                                                                        echo '<option value="2" selected>Paciente</option>';
                                                                    } else {
                                                                        echo '<option value="2" selected>Paciente</option>';
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5" style="display:none" id="content-filter">
                                                            <div class="position-relative form-group">
                                                                <input name="filter" id="filter" type="text" placeholder="Ingrese su dni" class="form-control" maxlength="8" minlength="7" onkeypress="return validaNumericos(event)">
                                                            </div>

                                                        </div>
                                                        <div class="col-md-5" id="content-select">
                                                            <!-- <div class="position-relative form-group"  id="content-select" style="display:none"> -->
                                                            <select id="single" class="js-states custom-select" name="single">
                                                                <?php
                                                                if (!isset($data['nombre_usuario'][1])) {
                                                                    $data['nombre_usuario'][1] = '';
                                                                }
                                                                if ($data['nombre_usuario'][0] != "nothing") {
                                                                    echo ('<option value="' . $data['nombre_usuario'][1] . '" selected="selected">' . $data['nombre_usuario'][0] . '</option>');
                                                                }
                                                                ?>
                                                            </select>
                                                            <!-- </div> -->
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="position-relative form-group">
                                                                <button class="mb-2 mr-2 btn-icon btn-pill btn btn-primary" id="btnSearchPatient"><i class="pe-7s-search btn-icon-wrapper"> </i>Buscar</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>

                                                <form id="frm-patient" name="frm-patient" method="post">
                                                    <div class="form-row">
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="dni">DNI</label>
                                                                <input name="dni" id="dni" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="genero">Género</label>
                                                                <select type="select" id="genero" name="genero" class="custom-select" required>
                                                                    <option>Seleccionar</option>
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
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="nombre">Nombres</label>
                                                                <input name="nombre" id="nombre" type="text" class="form-control" onkeyup="mayus(this);" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="apellidopa">Apellido Paterno</label>
                                                                <input name="apellidopa" id="apellidopa" type="text" class="form-control" onkeyup="mayus(this);" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="apellidoma">Apellido Materno</label>
                                                                <input name="apellidoma" id="apellidoma" type="text" class="form-control" onkeyup="mayus(this);" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="celular">Número Celular</label>
                                                                <input name="celular" id="celular" type="text" maxlength="9" onkeypress="return validaNumericos(event)" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="correo">Correo Electrónico</label>
                                                                <input name="correo" id="correo" type="email" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="procedencia">Procedencia</label>
                                                                <input name="procedencia" id="procedencia" type="text" class="form-control" onkeyup="mayus(this);" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="position-relative form-group">
                                                                <label for="ocupacionan">Ocupación Anterior</label>
                                                                <input name="ocupacionan" id="ocupacionan" type="text" class="form-control" onkeyup="mayus(this);">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="position-relative form-group">
                                                                <label for="ocupacionac">Ocupación Actual</label>
                                                                <input name="ocupacionac" id="ocupacionac" type="text" class="form-control" onkeyup="mayus(this);">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <button class="btn btn-warning submitPatient" id="btnSavePatient">Guardar paciente</button>
                                                            <button class="btn btn-warning submitPatient" id="btnUpdatePatient" style="display:none">Actualizar Paciente</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div id="step-2">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                        <div>
                                                            <div class="card-body">
                                                                <form id="frm-answers-patient">
                                                                    <table class="table">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">DNI</th>
                                                                                <th scope="col">Paciente</th>
                                                                                <th scope="col">Género</th>
                                                                                <th scope="col">Edad</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td id="cuest-dni"></td>
                                                                                <td id="cuest-nombre"></td>
                                                                                <td id="cuest-genero"></td>
                                                                                <td id="cuest-fechana"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <div class="divider"></div>
                                                                    <div class="position-relative form-group">
                                                                        <!-- <label for="exampleEmail3">--------------------------------------------</label> -->
                                                                        <p class="form-control-plaintext">Control de preguntas</p>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <?php
                                                                        $questions = $this->getQuestionnaire();

                                                                        foreach ($questions as $key => $row) {
                                                                            echo "<div class='col-md-6'>";
                                                                            echo    "<div class='position-relative form-group'>";
                                                                            echo        "<label for='question'>P $key: ¿" . $row['Pregunta'] . "?</label>";
                                                                            echo        "<input type='hidden' name='detalle[]' value='" . $row['Id_Detalle'] . "' class='input-detalle'>";
                                                                            echo        "<input name='answers[]' type='text' id='answwer-$key' class='form-control input-answers' required>";
                                                                            echo    "</div>";
                                                                            echo "</div>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-md-12">
                                                                            <button class="btn btn-info submitAnswers" id="btnSaveAnswers" type="submit">Guardar Respuestas</button>
                                                                            <button class="btn btn-warning submitAnswers" id="btnUpdateAnswers" style="display:none">Actualizar Respuestas</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-3">
                                                <table class="table">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col">DNI</th>
                                                            <th scope="col">Paciente</th>
                                                            <th scope="col">Género</th>
                                                            <th scope="col">Edad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td id="pru-dni"></td>
                                                            <td id="pru-nombre"></td>
                                                            <td id="pru-genero"></td>
                                                            <td id="pru-fechana"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="divider"></div>
                                                <div class="position-relative form-group">
                                                    <!-- <label for="exampleEmail3">--------------------------------------------</label> -->
                                                    <p class="form-control-plaintext">Control de preguntas</p>
                                                </div>
                                                <?php
                                                $history = $this->getHistoryPred();

                                                ?>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Anamnesis</label>
                                                            <textarea rows="1" class="form-control autosize-input" style="max-height: 200px; height: 35px;"><?php echo ($history) ? $history['Anamnesis_Pred'] : ""; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Examen Físico</label>
                                                            <textarea rows="1" class="form-control autosize-input" style="max-height: 200px; height: 35px;"><?php echo ($history) ? $history['Examen_Fisico_Pred'] : ""; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Exámenes</label>
                                                            <textarea rows="1" class="form-control autosize-input" style="max-height: 200px; height: 35px;"><?php echo ($history) ? $history['Examenes_Pred'] : ""; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Diagnóstico</label>
                                                            <textarea rows="1" class="form-control autosize-input" style="max-height: 200px; height: 35px;"><?php echo ($history) ? $history['Diagnostico_Pred'] : ""; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Tratamiento</label>
                                                            <textarea rows="1" class="form-control autosize-input" style="max-height: 200px; height: 35px;"><?php echo ($history) ? $history['Tratamiento_Pred'] : ""; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Subir archivos JPG/PNG</label>
                                                            <div id="uploads"></div>
                                                            <div class="dropzone" id="dropzone" style="display: block;">Arrastre archivos o de clic aquí para subirlos</div>
                                                            <input id="filepdf" type="file" style="display: none;" accept="application/pdf" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-4">
                                                <table class="table">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col">DNI</th>
                                                            <th scope="col">Paciente</th>
                                                            <th scope="col">Género</th>
                                                            <th scope="col">Edad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td id="cita-dni"></td>
                                                            <td id="cita-nombre"></td>
                                                            <td id="cita-genero"></td>
                                                            <td id="cita-fechana"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div tabindex="-1" class="dropdown-divider mt-4 mb-4" style="border-top: 1px solid #d6d6d6;"></div>


                                                <div class="form-inline">
                                                    <div id="form-search" class="input-group" style="align-items: center;">
                                                        <div class="position-relative input-group mb-4">
                                                            <label class="mr-2 mt-auto mb-auto">Filtro</label>
                                                            <select type="select" id="filter-cita" name="filter-cita" class="custom-select mr-2">
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
                                                </div>
                                                <div class="form-inline">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleCustomSelect" class="mr-2">Hora</label>
                                                        <input class="form-control input-mask-trigger" id="endTime">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="position-relative form-group">
                                                            <button id="add-apptmt" class="mr-2 btn-icon btn-pill btn btn-success">Agregar</button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="card-body">
                                                    <table style="width: 100%;" id="list_citas" class="table table-hover table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Paciente</th>
                                                                <th>Edad</th>
                                                                <th>Hora atención</th>
                                                                <th>Estado</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                        <tfoot>
                                                            <th>Paciente</th>
                                                            <th>Edad</th>
                                                            <th>Hora atención</th>
                                                            <th>Estado</th>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="clearfix">
                                        <!-- <button type="button" id="reset-btn2" class="btn-shadow float-left btn btn-link">Resetear</button> -->
                                        <button type="button" id="save-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-warning">Guardar y Continuar</button>
                                        <button type="button" id="next-btn2" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Siguiente</button>
                                        <button type="button" id="prev-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Anterior</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Historial clínico</h5>
                            <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Paciente</th>
                                        <th>Edad</th>
                                        <th>Fecha Consulta</th>
                                        <th>Hora Consulta</th>
                                        <th>Archivos</th>
                                        <th>Imágenes</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody id="list_historial">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Paciente</th>
                                        <th>Edad</th>
                                        <th>Fecha Consulta</th>
                                        <th>Hora Consulta</th>
                                        <th>Archivos</th>
                                        <th>Imágenes</th>
                                        <th>Opciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script type="text/javascript" src="<?= FOLDER_PATH ?>/src/js/main.d810cf0ae7f39f28f336.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="<?= FOLDER_PATH ?>/src/js/selectize.min.js"></script>
    <script>
        var g_paciente = "", g_edad = "", count_insert_cita = 0;
    </script>
    <script>
        /* document.getElementById("photoInputFilePhoto").onchange = function() {
            document.getElementById("uploadFile").value = this.files[0].name;
        }; */

        var pdf_file;

        (function() {
            var dropzone = document.getElementById('dropzone');
            var fileupload = $("#filepdf");

            var upload = function(files) {
                pdf_file = files[0];
                document.getElementById("dropzone").style.lineHeight = "normal";
                document.getElementById("dropzone").style.color = "rgb(253, 0, 0)";
                document.getElementById("dropzone").style.border = "2px inset rgb(255, 77, 0)";
                $("#dropzone").html('<i class="fa fa-file-pdf" style="font-size: 60px; display: block; height: 125px; padding-top: 55px; color: rgb(255, 38, 38);"></i><span id="title_pdf" style="display: block; height: 75px; color: rgb(255, 38, 38);">' + pdf_file.name + '</span>');
            }

            dropzone.ondrop = function(e) {
                e.preventDefault();
                this.className = 'dropzone';
                if (e.dataTransfer.files.length >= 2) {
                    Swal.fire("Atención!", "Debe ingresar solamente (1) archivo PDF", "warning");
                    return;
                }
                if (e.dataTransfer.files[0].type != 'application/pdf') {
                    Swal.fire("Atención!", "Debe se ingresado solo el archivo PDF", "warning");
                    return;
                }
                upload(e.dataTransfer.files);
            }

            dropzone.onmouseover = function() {
                document.getElementById("dropzone").style.cursor = "pointer";
                document.getElementById("dropzone").style.backgroundColor = "rgb(247, 247, 255)";
                document.getElementById("dropzone").style.color = "#777777";
            }
            dropzone.onmouseleave = function() {
                document.getElementById("dropzone").style.backgroundColor = "rgb(255, 255, 255)";
                document.getElementById("dropzone").style.color = "#ccc";
            }

            dropzone.onclick = function() {
                document.getElementById("dropzone").style.backgroundColor = "rgb(40,204,233,0.35)";
                document.getElementById("dropzone").style.color = "rgb(77, 58, 156)";
                document.getElementById("dropzone").style.border = "2px dashed #16008c";
                /* border: 2px dashed #16008c; */
                fileupload.click();
            }

            fileupload.change(function() {
                if (this.files.length >= 2) {
                    Swal.fire("Atención!", "Debe ingresar solamente (1) archivo PDF", "warning");
                    return;
                }
                if (this.files[0].type != 'application/pdf') {
                    Swal.fire("Atención!", "Debe se ingresado solo el archivo PDF", "warning");
                    return;
                }
                upload(this.files);
            });

            dropzone.ondragover = function() {
                this.className = 'dropzone dragover';
                return false;
            }

            dropzone.ondragleave = function() {
                this.className = 'dropzone';
                return false;
            }
        }());

        function selectSupr(e) {
            var nom_value = e.value;
            if (nom_value == 4) {
                document.getElementById("select_supr").style.display = "block";
            } else {
                document.getElementById("select_supr").style.display = "none";
            }
        }

        /* $('#add_user').on('click', function() {
        	var fname = $('#fname').val();
        	var lname = $('#lname').val();
        	var correo = $('#correo').val();
        	var status = $("#status").children("option:selected").val();
        	var gender = $("#gender").children("option:selected").val();
        	var date = $('#date').val();
        	var rol_user = $("#rol_user").children("option:selected").val();
        	var supr = $("#supr").children("option:selected").val();
        	var code = $('#code').val();
        	var password = $('#password').val();

        	if (pdf_file == null) {
        		Swal.fire("Atención!", "Debe ingresar el CV del usuario", "warning");
        		return;
        	}
        	if (fname == "") {
        		Swal.fire("Atención!", "Debe ingresar el nombre del usuario", "warning");
        		return;
        	}
        	if (lname == "") {
        		Swal.fire("Atención!", "Debe ingresar el apellido del usuario", "warning");
        		return;
        	}
        	if (correo == "") {
        		Swal.fire("Atención!", "Debe ingresar el correo del usuario", "warning");
        		return;
        	}
        	if (date == "") {
        		Swal.fire("Atención!", "Debe ingresar la fecha de nacimiento del usuario", "warning");
        		return;
        	}
        	if (code.length != 0) {
        		if (code.length < 4) {
        			Swal.fire("Atención!", "El nombre de acceso del usuario debe contener más de 4 caracteres", "warning");
        			return;
        		}
        	} else {
        		Swal.fire("Atención!", "Debe ingresar el nombre de acceso del usuario", "warning");
        		return;
        	}
        	if (password.length != 0) {
        		if (password.length < 6) {
        			Swal.fire("Atención!", "Debe ingresar la contraseña mayor de 6 caracteres", "warning");
        			return;
        		}
        	}
        	


        	var data = new FormData();

        	data.append("fname", fname);
        	data.append("lname", lname);
        	data.append("correo", correo);
        	data.append("status", status);
        	data.append("gender", gender);
        	data.append("date", date);
        	data.append("rol_user", rol_user);
        	data.append("supr", supr);
        	data.append("image", $('input[type=file]')[0].files[0]);
        	data.append("file_pdf", pdf_file);
        	data.append("code", code);
        	data.append("password", password);

        	$.ajax({
        		beforeSend: function() {
        			Pace.restart();
        			var btnadd = document.getElementById('add_user');
        			var text = btnadd.getAttribute('data-name-text');
        			$("#add_user").html('');
        			$("#add_user").append("" + text + "&ThinSpace;&ThinSpace;<span id='spinner-us' class='fa fa-spinner fa-spin'></span>");
        			$("#add_user").attr("disabled", true);
        		},
        		url: "<?= FOLDER_PATH ?>/admin/user/save",
        		type: "POST",
        		data: data,
        		contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
        		processData: false, // NEEDED, DON'T OMIT THIS
        		success: function() {
        			$("#spinner-us").remove();
        			$("#add_user").html('Agregado');
        			$("#add_user").attr("disabled", false);
        			setTimeout(function() {
        				location.href = "<?= FOLDER_PATH ?>/admin/user";
        			}, 500);
        		}
        	})
        }); */
    </script>
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $('input[id$="endTime"]').inputmask("hh:mm", {
            placeholder: "HH:MM",
            insertMode: false,
            showMaskOnHover: false,
            hourFormat: "24"
        });
    </script>

    <?php
    if ($data['nombre_usuario'][0] != "nothing") {
        echo '
        <script>
            $(document).ready(function() {
                $("#select2-single-container").html("' . $data['nombre_usuario'][0] . '");
                var delayInMilliseconds = 1000;
                setTimeout(function() {
                    $("#btnSearchPatient").trigger("click");
                }, delayInMilliseconds);
            });
        </script>
        ';
    }
    ?>


    <script>
        let cons = document.getElementById("btn-adm_consulta");
        let close = document.getElementById("btn-adm_close");
        let save = document.getElementById("save-btn2");
        if (cons != null) {
            document.getElementById("btn-adm_consulta").addEventListener("click", consulta_admin);

            function consulta_admin() {
                location.href = "<?= FOLDER_PATH ?>/consultation"
            }
        }

        if (save != null) {
            document.getElementById("save-btn2").addEventListener("click", function() {

                Swal.fire({
                    icon: 'success',
                    title: 'Guardando su consulta',
                    showConfirmButton: false,
                    timer: 850
                }).then(function() {

                    location.href = "<?= FOLDER_PATH ?>/my";
                });
            });
        }

        if (close != null) {
            document.getElementById("btn-adm_close").addEventListener("click", close_admin);

            function close_admin() {
                location.href = "<?= FOLDER_PATH ?>/login/salir"
            }
        }
    </script>

    <script>
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

        function validaNumericos(event) {
            if (event.charCode >= 48 && event.charCode <= 57) {
                return true;
            }
            return false;
        }

        function mayus(e) {
            e.value = e.value.toUpperCase();
        }


        $('.submitPatient').click(function() {
            buttonPressed = $(this).attr('id');
            // console.log(buttonPressed);
        });

        $('#frm-patient').submit(function(e) {
            e.preventDefault();


            if (buttonPressed === 'btnSavePatient') {
                // console.log('savePatient');
                let datos = $('#frm-patient').serialize();

                let request = $.ajax({
                    type: "post",
                    dataType: 'JSON',
                    url: "<?php echo FOLDER_PATH ?>/consultation/insertPatient",
                    data: datos
                });
                request.done(function(data) {

                    if (Object.keys(data).length > 1) {
                        // alert('Se insertó correctamente');
                        Swal.fire({
                            icon: 'success',
                            title: 'El paciente fue agregado',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        if (data.Genero == 'F') {
                            data.Genero = 'FEMENINO';
                        } else {
                            data.Genero = 'MASCULINO';
                        }
                        let edad = calcularEdad(data.Fecha_Nacimiento);
                        $('#cuest-nombre').html(data.Nombre + " " + data.Apellido_Paterno + " " + data.Apellido_Materno);
                        $('#cuest-dni').html(data.Documento);
                        $('#cuest-fechana').html(edad);
                        $('#cuest-genero').html(data.Genero);
                        $('#pru-nombre').html(data.Nombre + " " + data.Apellido_Paterno + " " + data.Apellido_Materno);
                        $('#pru-dni').html(data.Documento);
                        $('#pru-fechana').html(edad);
                        $('#pru-genero').html(data.Genero);
                        $('#cita-nombre').html(data.Nombre + " " + data.Apellido_Paterno + " " + data.Apellido_Materno);
                        $('#cita-dni').html(data.Documento);
                        $('#cita-fechana').html(edad);
                        $('#cita-genero').html(data.Genero);
                        $('#btnSaveAnswers').css('display', 'block');
                        $('#btnUpdateAnswers').css('display', 'none');
                        $('#btnUpdatePatient').css('display', 'block');
                        $('#btnSavePatient').css('display', 'none');
                        $('.input-answers').val('');

                    } else {
                        // alert(data);
                        Swal.fire({
                            icon: 'error',
                            title: data,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
                request.fail(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hubo un error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                });

            } else if (buttonPressed = 'btnUpdatePatient') {
                // console.log('UpdatePatient');

                let datos = $('#frm-patient').serialize();
                $.ajax({
                        type: "post",
                        url: "<?php echo FOLDER_PATH ?>/consultation/updatePatient",
                        data: datos
                    })
                    .done(function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: response,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        let genero = $('#genero').val();
                        if (genero == 'F') {
                            genero = 'FEMENINO';
                        } else {
                            genero = 'MASCULINO';
                        }
                        let fechana = $('#fechana').val();
                        let edad = calcularEdad(fechana);
                        $('#cuest-nombre').html($('#nombre').val() + " " + $('#apellidopa').val() + " " + $('#apellidoma').val());
                        $('#cuest-dni').html($('#dni').val());
                        $('#cuest-genero').html(genero);
                        $('#cuest-fechana').html(edad);
                        $('#pru-nombre').html($('#nombre').val() + " " + $('#apellidopa').val() + " " + $('#apellidoma').val());
                        $('#pru-dni').html($('#dni').val());
                        $('#pru-genero').html(genero);
                        $('#pru-fechana').html(edad);
                        $('#cita-nombre').html($('#nombre').val() + " " + $('#apellidopa').val() + " " + $('#apellidoma').val());
                        $('#cita-dni').html($('#dni').val());
                        $('#cita-genero').html(genero);
                        $('#cita-fechana').html(edad);

                    })
                    .fail(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Hubo un error',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
            }
        });

        $('#btnSearchPatient').on("click", function() {
            let select = $('select[name="single"] option:selected').text();
            let documento = $('#filter').val();
            let search = $('#filter-search').val();
            let valuePaciente = $('select[name="single"] option:selected').val();
            let arrayPaciente = new Array();
            if (documento === "" && (search === '1' || search === '0')) {
                console.log('ingrese dni')
                Swal.fire({
                    icon: 'error',
                    title: 'Ingrese el dni',
                    showConfirmButton: false,
                    timer: 1500
                });
            } else if (select === "" && search === '2') {
                console.log('ingrese paciente')
                Swal.fire({
                    icon: 'error',
                    title: 'Ingrese el paciente',
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                arrayPaciente.push(select);
                arrayPaciente.push(valuePaciente);
                let request = $.ajax({
                    data: {
                        namePaciente: arrayPaciente,
                        filter: documento
                    },
                    type: "post",
                    dataType: 'JSON',
                    url: "<?php echo FOLDER_PATH ?>/consultation/searchPatient"
                });
                request.done(function(data) {
                    // console.log(Object.keys(data).length);
                    if (Object.keys(data).length > 1) {
                        $('#nombre').val(data.Nombre);
                        $('#apellidopa').val(data.Apellido_Paterno);
                        $('#apellidoma').val(data.Apellido_Materno);
                        $('#procedencia').val(data.Procedencia);
                        $('#ocupacionac').val(data.Ocupacion_Actual);
                        $('#ocupacionan').val(data.Ocupacion_Anterior);
                        $('#dni').val(data.Documento);
                        $('#correo').val(data.Email);
                        $('#celular').val(data.Celular);
                        $("#genero option[value=" + data.Genero + "]").attr("selected", true);
                        $('#fechana').val(data.Fecha_Nacimiento);
                        // $('#btnSavePatient').attr("disabled", true);
                        if (data.Genero == 'F') {
                            data.Genero = 'FEMENINO';
                        } else {
                            data.Genero = 'MASCULINO';
                        }
                        let edad = calcularEdad(data.Fecha_Nacimiento);
                        $('#cuest-nombre').html(data.Nombre + " " + data.Apellido_Paterno + " " + data.Apellido_Materno);
                        $('#cuest-dni').html(data.Documento);
                        // console.log(calcularEdad(data.Fecha_Nacimiento));
                        $('#cuest-fechana').html(edad);
                        $('#cuest-genero').html(data.Genero);
                        $('#pru-nombre').html(data.Nombre + " " + data.Apellido_Paterno + " " + data.Apellido_Materno);
                        $('#pru-dni').html(data.Documento);
                        $('#pru-fechana').html(edad);
                        $('#pru-genero').html(data.Genero);
                        $('#cita-nombre').html(data.Nombre + " " + data.Apellido_Paterno + " " + data.Apellido_Materno);
                        $('#cita-dni').html(data.Documento);
                        $('#cita-fechana').html(edad);
                        $('#cita-genero').html(data.Genero);
                        $('#btnSaveAnswers').css('display', 'none');
                        $('#btnUpdateAnswers').css('display', 'block');
                        $('#filter').val("");
                        $('#btnSavePatient').css('display', 'none');
                        $('#btnUpdatePatient').css('display', 'block');
                        // let cantQuestion = $('.input-answers').toArray().length;
                        $('.input-answers').each(function(index) {
                            if (index < data[0]) {
                                $(this).val(data[index + 1].Respuesta);
                                // console.log(data[index+1].Respuesta);
                            }
                        });

                        // console.log(Object.keys(data.0).length);
                        generar_citas_paciente('');
                        generar_historial(valuePaciente);
                        g_paciente = data.Nombre + " " + data.Apellido_Paterno + " " + data.Apellido_Materno;
                        g_edad = edad;
                    } else {

                        Swal.fire({
                            title: data,
                            text: "Desea agregarlo ?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si'
                        }).then((result) => {
                            if (result.value) {
                                let dni = $('#filter').val();
                                $('#dni').val(dni);
                            } else {
                                $('#filter').val("");
                            }
                        })
                        $('#btnSavePatient').css('display', 'block');
                        $('#btnUpdatePatient').css('display', 'none');
                        resetear_form();
                    }
                });
                request.fail(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hubo un error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                });
                return false;
            }


        });

        $('#filter-search').change(function() {
            if ($(this).val() === '1') {
                $('#content-filter').css('display', 'block');
                $('#content-select').css('display', 'none');
                resetear_form();

            } else if ($(this).val() === '2') {
                $('#content-filter').css('display', 'none');
                $('#content-select').css('display', 'block');
                resetear_form();

            } else {
                $('#content-filter').css('display', 'block');
                $('#content-select').css('display', 'none');
            }

        })

        function resetear_form() {
            $('#nombre').val("");
            $('#apellidopa').val("");
            $('#apellidoma').val("");
            $('#procedencia').val("");
            $('#ocupacionac').val("");
            $('#ocupacionan').val("");
            $('#dni').val("");
            $('#correo').val("");
            $('#celular').val("");
            $("#genero").prop("selectedIndex", 0);
            $('#fechana').val("");
            $('#cuest-nombre').html("");
            $('#cuest-dni').html("");
            $('#cuest-genero').html("");
            $('#cuest-fechana').html("");
            $('#pru-nombre').html("");
            $('#pru-dni').html("");
            $('#pru-genero').html("");
            $('#pru-fechana').html("");
            $('#cita-nombre').html("");
            $('#cita-dni').html("");
            $('#cita-genero').html("");
            $('#cita-fechana').html("");
            $('.input-answers').val("");
        }


        // SELECT2 LIBRERIA
        $("#single").select2({
            placeholder: 'Ingrese el paciente',
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo FOLDER_PATH ?>/consultation/showPatients',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    console.log(data);
                    return {
                        results: data
                    };
                },
                cache: true
            }
            // templateResult:formatRepo
            // templateSelection: formatRepoSelection
        });

        // function formatRepo(patient){
        //     if(patient.loading){
        //         return patient.text;
        //     }

        //     let $container = $(
        //         "<div class='select2-result-patient clearfix'>"+
        //             "<div class='select2-result-name'"+
        //             "</div>"+
        //         "</div>"
        //     );

        //     $container.find('.select2-result-name').text(patient.text);
        //     return $container;
        // }

        // function formatRepoSelection (patient) {
        //     return patient.text;
        // }

        function generar_citas_paciente(fecha) {
            var data = new FormData();
            data.append("fecha", fecha);
            $.ajax({
                url: "<?= FOLDER_PATH ?>/consultation/citas",
                type: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(resp) {
                    $('#list_citas').html(resp);
                }
            })
        }

        function generar_historial(paciente) {
            var data = new FormData();
            data.append("paciente", paciente);
            $.ajax({
                url: "<?= FOLDER_PATH ?>/consultation/consultas",
                type: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(resp) {
                    $('#list_historial').html(resp);
                }
            })
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('input[type=text]').forEach(node => node.addEventListener('keypress', e => {
                if (e.keyCode == 13) {
                    e.preventDefault();
                }
            }))
        });

        let buttonPressed;


        $('.submitAnswers').on('click', function(e) {

            buttonPressed = $(this).attr('id');
            console.log(buttonPressed);
        });

        $('#frm-answers-patient').submit(function(e) {
            e.preventDefault();

            if ($('#cuest-nombre').html() !== "") {
                if (buttonPressed === 'btnSaveAnswers') {

                    let answersArray = new Array();
                    let detalleArray = new Array();

                    $('.input-detalle').each(function() {
                        detalleArray.push($(this).val());
                    })

                    $('.input-answers').each(function() {
                        answersArray.push($(this).val());
                    })

                    $.ajax({
                            type: "post",
                            url: "<?php echo FOLDER_PATH ?>/consultation/insertAnswers",
                            data: {
                                detalle: detalleArray,
                                answers: answersArray
                            }
                        })
                        .done(function(response) {
                            console.log(response);
                            Swal.fire({
                                icon: 'success',
                                title: response,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#btnUpdateAnswers').css('display', 'block');
                            $('#btnSaveAnswers').css('display', 'none');
                        })
                        .fail(function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ocurrió un problema',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        });
                } else if (buttonPressed === 'btnUpdateAnswers') {

                    let answersArray = new Array();
                    let detalleArray = new Array();

                    $('.input-detalle').each(function() {
                        detalleArray.push($(this).val());
                    })

                    $('.input-answers').each(function() {
                        answersArray.push($(this).val());
                    })

                    $.ajax({
                            type: "post",
                            url: "<?php echo FOLDER_PATH ?>/consultation/updateAnswers",
                            data: {
                                detalle: detalleArray,
                                answers: answersArray
                            }
                        })
                        .done(function(response) {
                            console.log(response);
                            Swal.fire({
                                icon: 'success',
                                title: response,
                                showConfirmButton: false,
                                timer: 1500
                            });

                        })
                        .fail(function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ocurrió un problema',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        });
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Por favor busque o agregue un paciente',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    </script>
    <script>
        $('#prev-btn2').css('display', 'none');
        $('#save-btn2').css('display', 'none');

        $('#prev-btn2').on('click', function() {
            $('#next-btn2').css('display', 'block');
            $('#save-btn2').css('display', 'none');
            if (detectCSS('#step-2', 'display', 'block')) {
                $('#prev-btn2').css('display', 'none');
                // console.log('true');
            } else {

            }
        });

        $('#next-btn2').on('click', function() {
            $('#prev-btn2').css('display', 'block');
            if (detectCSS('#step-3', 'display', 'block')) {
                $('#next-btn2').css('display', 'none');
                $('#save-btn2').css('display', 'block');
                console.log('true');
            }
        });

        function detectCSS(attr, css, value) {
            let result = $(attr).css(css) === value ? true : false;
            return result;
        }
    </script>
    <script>
        $("#filter-cita").on("change", function() {
            var data = document.getElementById("filter-cita").value;
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
            var filter = document.getElementById("filter-cita").value;
            if (filter != 1 && filter != 2 && filter != 3) {
                Swal.fire("Atención!", "Operación inválida", "warning");
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
                Swal.fire("Atención!", "Operación inválida", "warning");
            }

            var data = new FormData();
            data.append("search", sendsearch);
            data.append("filter", sendfilter);

            $.ajax({
                beforeSend: function() {
                    $("#spsearch").append('<span id="spinner-src-' + numbtn + '" class="fa fa-spinner fa-spin" style="width: 14px; height: 14px; margin: 12px 12px;"></span>');
                    $("#btnsrc" + numbtn).attr("disabled", true);
                },
                url: "<?= FOLDER_PATH ?>/consultation/search",
                type: "POST",
                data: data,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                success: function(resp) {
                    $("#spinner-src-" + numbtn).remove();
                    $("#btnsrc" + numbtn).attr("disabled", false);
                    $("#list_citas").html(resp);
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
                    url: "<?php echo FOLDER_PATH ?>/consultation/load_users",
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
        $("#add-apptmt").click(function() {

            var row = "";
            var filter = document.getElementById("filter-cita").value;

            var hora = $("#endTime").val();

            if (count_insert_cita > 0) {
                Swal.fire("Atención!", "Usted ya no puede agregar mas citas", "warning");
                return;
            }

            Swal.fire({
                title: "Agregar cita",
                html: "<span>¿Desea agregar la cita de las " + getTimeAMPMFormat(hora) + "?<br>Al agregar ya no podrá volver a agregar otra cita.</span>" ,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si'
            }).then((result) => {
                if (result.isConfirmed == false) {
                    return;
                } else {
                    if (hora == "") {
                        Swal.fire("Atención!", "Operación inválida", "warning");
                        return;
                    }
                    if (g_paciente == "") {
                        Swal.fire("Atención!", "Operación inválida", "warning");
                        return;
                    }
                    if (g_edad == "") {
                        Swal.fire("Atención!", "Operación inválida", "warning");
                        return;
                    }

                    if (filter != 1 && filter != 2 && filter != 3) {
                        Swal.fire("Atención!", "Operación inválida", "warning");
                        return;
                    }

                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = today.getFullYear();

                    datenow = dd + '/' + mm + '/' + yyyy;

                    if (filter == 1 || filter == 3) {
                        row = '<tr>' +
                            '<td>' + g_paciente + '</td>' +
                            '<td class="text-center">' + g_edad + '</td>' +
                            '<td class="text-center">' + datenow + '</td>' +
                            '<td class="text-center">' + getTimeAMPMFormat(hora) + '</td>' +
                            '<td class="text-center">Pendiente</td></tr>';
                    }
                    if (filter == 2) {
                        row = '<tr>' +
                            '<td>' + g_paciente + '</td>' +
                            '<td class="text-center">' + g_edad + '</td>' +
                            '<td class="text-center">' + getTimeAMPMFormat(hora) + '</td>' +
                            '<td class="text-center">Pendiente</td></tr>';
                    }

                    var rowCount = $('#list_citas tbody tr').length;

                    if (rowCount == 0) {
                        $("#list_citas tbody").html(row);
                    } else {
                        $("#list_citas tbody tr:first").before(row);
                    }

                    count_insert_cita = 1;
                }
            });
        });

        const getTimeAMPMFormat = (hora) => {
            let time = hora.split(":");
            const ampm = time[0] >= 12 ? 'PM' : 'AM';
            hours = time[0] % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            hours = hours < 10 ? '0' + hours : hours; // appending zero in the start if hours less than 10
            minutes = time[1];
            return hours + ':' + minutes + ' ' + ampm;
        };
    </script>

</body>

</html>