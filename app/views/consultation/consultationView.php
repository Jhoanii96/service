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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
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

        .item_name {
            padding-left: 10px;
            height: 30px;
            width: 100%;
            display: table-cell;
            vertical-align: middle;
        }

        .selectize-input {
            /* overflow: initial; */
        }

        @media (min-width: 576px) {
            #form-search {
                width: 70%;
            }
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
                                                                    <option value="1" selected>DNI</option>
                                                                    <option value="2">Paciente</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="position-relative form-group" style="display:none ">
                                                                <input name="filter" id="filter" type="text" placeholder="Ingrese su dni" class="form-control" maxlength="8" minlength="7" onkeypress="return validaNumericos(event)">
                                                                <span class="err" style="display:none;">* Minimo de 8 caracteres</span>
                                                            </div>
                                                    
                                                            <!-- <div class="position-relative form-group" >
                                                                <input list="patients" name="patients" id="browser" class="form-control" placeholder="Ingrese el paciente">
                                                                <datalist id="patients">
                                                                    <option value="Carlos">
                                                                    <option value="Firefox">
                                                                    <option value="Chrome">
                                                                    <option value="Opera">
                                                                    <option value="Safari">
                                                                </datalist>
                                                            </div> -->

                                                            <div class="position-relative input-group mb-4" id="b-name" >
                                                                <label class="mr-2 mt-auto mb-auto">Nombre paciente</label>
                                                                <select id="user-search1" class="select_users" placeholder="Escriba el usuario..."></select>
                                                                <button id="btnsrc1" class="btn-icon btn-pill btn btn-primary ml-2" onclick="search(1)"><i class="mr-0 pe-7s-search btn-icon-wrapper"></i></button>
                                                            </div>
                                                            <!-- <div class="position-relative input-group" >
                                                                <select class="js-example-basic-single custom-select name="state">
                                                                    <option value="AL">Alabama</option>
                                                                    <option value="WY">Wyoming</option>
                                                                </select>
                                                            </div> -->
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
                                                                    <option >Seleccionar</option>
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
                                                                <input name="correo" id="correo" type="email" class="form-control"  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
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
                                                            <button class="btn btn-warning submitPatient" id="btnUpdatePatient" style="display:none" >Actualizar Respuestas</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div id="step-2">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                        <div>
                                                            <div class="card-body">
                                                                <form id="frm-answers-patient" >
                                                                    <div class="form-row">
                                                                        <div class="col-md-6">
                                                                            <div class="position-relative form-group">
                                                                                <label for="documento">DNI</label>
                                                                                <input name="dni" id="cuest-dni" type="text" class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="position-relative form-group">
                                                                                <label for="nombre">Nombres</label>
                                                                                <input name="nombre" id="cuest-nombre" type="text" class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-md-6">
                                                                            <div class="position-relative form-group">
                                                                                <label for="apellidopa">Apellido Paterno</label>
                                                                                <input name="apellidopa" id="cuest-apellidopa" type="text" class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="position-relative form-group">
                                                                                <label for="apellidoma">Apellido Materno</label>
                                                                                <input name="apellidoma" id="cuest-apellidoma" type="text" class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                                                            <button class="btn btn-warning submitAnswers" id="btnUpdateAnswers" style="display:none" >Actualizar Respuestas</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-3">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="pru-dni">DNI</label>
                                                            <input name="pru-dni" id="pru-dni" type="text" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="pru-nombre">Nombres</label>
                                                            <input name="pru-nombre" id="pru-nombre" type="text" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="pru-apellidopa">Apellido Paterno</label>
                                                            <input name="pru-apellidopa" id="pru-apellidopa" type="text" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="pru-apellidoma">Apellido Materno</label>
                                                            <input name="pru-apellidoma" id="pru-apellidoma" type="text" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="position-relative form-group">
                                                    <!-- <label for="exampleEmail3">--------------------------------------------</label> -->
                                                    <p class="form-control-plaintext">Control de preguntas</p>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Anamnesis</label>
                                                            <textarea rows="1" class="form-control autosize-input" style="max-height: 200px; height: 35px;padding-left:40px;">TE:
SP:</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Examen Físico</label>
                                                            <textarea rows="1" class="form-control autosize-input" style="max-height: 200px; height: 35px;">OROFARINGE:
PULMONES:
OTROS:</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Exámenes</label>
                                                            <textarea rows="1" class="form-control autosize-input" style="max-height: 200px; height: 35px;">PEDIDOS:
RESULTADOS:</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Diagnóstico</label>
                                                            <textarea rows="1" class="form-control autosize-input" style="max-height: 200px; height: 35px;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Tratamiento</label>
                                                            <textarea rows="1" class="form-control autosize-input" style="max-height: 200px; height: 35px;"></textarea>
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
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="dni">DNI</label>
                                                            <input name="cita-dni" id="cita-dni" type="text" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="cita-nombre">Nombres</label>
                                                            <input name="cita-nombre" id="cita-nombre" type="text" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="cita-apellidopa">Apellido Paterno</label>
                                                            <input name="cita-apellidopa" id="cita-apellidopa" type="text" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="cita-apellidoma">Apellido Materno</label>
                                                            <input name="cita-apellidoma" id="cita-apellidoma" type="text" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div tabindex="-1" class="dropdown-divider mt-4 mb-4" style="border-top: 1px solid #d6d6d6;"></div>


                                                <div class="form-inline">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleCustomSelect" class="mr-2">Fecha Cita</label>
                                                        <input name="date" id="date" placeholder="password placeholder" type="date" class="mr-2 form-control" value="<?= date("Y-m-d") ?>">
                                                        <button class="mr-5 btn-icon btn-pill btn btn-primary"><i class="mr-0 pe-7s-search btn-icon-wrapper"></i></button>
                                                    </div>
                                                    <div class="position-relative form-group">
                                                        <label for="exampleCustomSelect" class="mr-2">Horas</label>
                                                        <input class="form-control input-mask-trigger" id="endTime">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="position-relative form-group">
                                                            <button class="mr-2 btn-icon btn-pill btn btn-success">Agregar</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Paciente</th>
                                                                <th>Edad</th>
                                                                <th>Hora atención</th>
                                                                <th>Estado</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="list_citas">

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
                                        <button type="button" id="next-btn2" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Siguiente</button>
                                        <button type="button" id="prev-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Anterior</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha consulta</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Edad</th>
                                        <th>Archivos</th>
                                        <th>Imágenes</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>15</td>
                                        <td>2011/04/25</td>
                                        <td>Jhon</td>
                                        <td>Alvarado Achata</td>
                                        <td>24 años</td>
                                        <td>..Archivo..</td>
                                        <td>..Imágen..</td>
                                        <td class="text-center">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <button class="btn-shadow btn btn-warning text-white"><i class="fa fa-eye"></i> Detalle</button>
                                                <button class="btn-shadow btn btn-warning text-white"><i class="fa fa-edit"></i> Editar</button>
                                                <button class="btn-shadow btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha consulta</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Edad</th>
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
    <script src="<?= FOLDER_PATH ?>/src/js/selectize.min.js"></script>
    <!-- JQUERY -->
    <script src="<?= FOLDER_PATH ?>/src/js/jquery-3.2.1.min.js"></script>
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
                    swal("Atención!", "Debe ingresar solamente (1) archivo PDF", "warning");
                    return;
                }
                if (e.dataTransfer.files[0].type != 'application/pdf') {
                    swal("Atención!", "Debe se ingresado solo el archivo PDF", "warning");
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
                    swal("Atención!", "Debe ingresar solamente (1) archivo PDF", "warning");
                    return;
                }
                if (this.files[0].type != 'application/pdf') {
                    swal("Atención!", "Debe se ingresado solo el archivo PDF", "warning");
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
        		swal("Atención!", "Debe ingresar el CV del usuario", "warning");
        		return;
        	}
        	if (fname == "") {
        		swal("Atención!", "Debe ingresar el nombre del usuario", "warning");
        		return;
        	}
        	if (lname == "") {
        		swal("Atención!", "Debe ingresar el apellido del usuario", "warning");
        		return;
        	}
        	if (correo == "") {
        		swal("Atención!", "Debe ingresar el correo del usuario", "warning");
        		return;
        	}
        	if (date == "") {
        		swal("Atención!", "Debe ingresar la fecha de nacimiento del usuario", "warning");
        		return;
        	}
        	if (code.length != 0) {
        		if (code.length < 4) {
        			swal("Atención!", "El nombre de acceso del usuario debe contener más de 4 caracteres", "warning");
        			return;
        		}
        	} else {
        		swal("Atención!", "Debe ingresar el nombre de acceso del usuario", "warning");
        		return;
        	}
        	if (password.length != 0) {
        		if (password.length < 6) {
        			swal("Atención!", "Debe ingresar la contraseña mayor de 6 caracteres", "warning");
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

        function validaNumericos(event) {
            if(event.charCode >= 48 && event.charCode <= 57){
            return true;
            }
            return false;        
        }

        function mayus(e) {
            e.value = e.value.toUpperCase();
        }


        $('.submitPatient').click(function(){
            buttonPressed = $(this).attr('id');
            console.log(buttonPressed);
        });

        $('#frm-patient').submit(function(e) {
            e.preventDefault();

            
            if(buttonPressed === 'btnSavePatient'){
                console.log('savePatient');
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
                        $('#cuest-nombre').val(data.Nombre);
                        $('#cuest-apellidopa').val(data.Apellido_Paterno);
                        $('#cuest-apellidoma').val(data.Apellido_Materno);
                        $('#cuest-dni').val(data.Documento);
                        $('#pru-nombre').val(data.Nombre);
                        $('#pru-apellidopa').val(data.Apellido_Paterno);
                        $('#pru-apellidoma').val(data.Apellido_Materno);
                        $('#pru-dni').val(data.Documento);
                        $('#cita-nombre').val(data.Nombre);
                        $('#cita-apellidopa').val(data.Apellido_Paterno);
                        $('#cita-apellidoma').val(data.Apellido_Materno);
                        $('#cita-dni').val(data.Documento);
                        $('#btnSaveAnswers').css('display','block');
                        $('#btnUpdateAnswers').css('display','none');
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

            }else if(buttonPressed = 'btnUpdatePatient'){
                console.log('UpdatePatient');

                let datos = $('#frm-patient').serialize();
                $.ajax({
                    type:"post",
                    url:"<?php echo FOLDER_PATH ?>/consultation/updatePatient",
                    data:datos
                })
                .done(function(response){
                    Swal.fire({
                        icon: 'success',
                        title: response,
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                .fail(function(){
                    Swal.fire({
                        icon: 'error',
                        title: 'Hubo un error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
            }
        });

        // $('#btnSearchPatient').on("click", function() {
            
        //     let datos = $('#frm-search-patient').serialize();

        //     // console.log(datos);
        //     let request = $.ajax({
        //         type: "post",
        //         dataType: 'JSON',
        //         url: "<?php echo FOLDER_PATH ?>/consultation/searchPatient",
        //         data: datos
        //     });
        //     request.done(function(data) {
        //         // console.log(Object.keys(data).length);
        //         if (Object.keys(data).length > 1) {
        //             $('#nombre').val(data.Nombre);
        //             $('#apellidopa').val(data.Apellido_Paterno);
        //             $('#apellidoma').val(data.Apellido_Materno);
        //             $('#procedencia').val(data.Procedencia);
        //             $('#ocupacionac').val(data.Ocupacion_Actual);
        //             $('#ocupacionan').val(data.Ocupacion_Anterior);
        //             $('#dni').val(data.Documento);
        //             $('#correo').val(data.Email);
        //             $('#celular').val(data.Celular);
        //             $("#genero option[value=" + data.Genero + "]").attr("selected", true);
        //             $('#fechana').val(data.Fecha_Nacimiento);
        //             // $('#btnSavePatient').attr("disabled", true);
        //             $('#cuest-nombre').val(data.Nombre);
        //             $('#cuest-apellidopa').val(data.Apellido_Paterno);
        //             $('#cuest-apellidoma').val(data.Apellido_Materno);
        //             $('#cuest-dni').val(data.Documento);
        //             $('#pru-nombre').val(data.Nombre);
        //             $('#pru-apellidopa').val(data.Apellido_Paterno);
        //             $('#pru-apellidoma').val(data.Apellido_Materno);
        //             $('#pru-dni').val(data.Documento);
        //             $('#cita-nombre').val(data.Nombre);
        //             $('#cita-apellidopa').val(data.Apellido_Paterno);
        //             $('#cita-apellidoma').val(data.Apellido_Materno);
        //             $('#cita-dni').val(data.Documento);
        //             $('#btnSaveAnswers').css('display','none');
        //             $('#btnUpdateAnswers').css('display','block');
        //             $('#btnSavePatient').css('display','none');
        //             $('#filter').val("");
        //             $('#btnUpdatePatient').css('display','block');
        //             // let cantQuestion = $('.input-answers').toArray().length;
        //             $('.input-answers').each(function(index){
        //                 if(index < data[0]){
        //                     $(this).val(data[index+1].Respuesta);
        //                     // console.log(data[index+1].Respuesta);
        //                 }
        //             });

        //             // console.log(Object.keys(data.0).length);
        //             generar_citas_paciente(data.Documento);
        //         } else {
        //             // alert(data);

        //             Swal.fire({
        //             title: data,
        //             text: "Desea agregarlo ?",
        //             icon: 'warning',
        //             showCancelButton: true,
        //             confirmButtonColor: '#3085d6',
        //             cancelButtonColor: '#d33',
        //             confirmButtonText: 'Si'
        //             }).then((result) => {
        //                 if(result.value){
        //                     let dni = $('#filter').val();
        //                     $('#dni').val(dni);
        //                 }else{
        //                     $('#filter').val("");
        //                 }
        //             })
                    
        //             $('#nombre').val("");
        //             $('#apellidopa').val("");
        //             $('#apellidoma').val("");
        //             $('#procedencia').val("");
        //             $('#ocupacionac').val("");
        //             $('#ocupacionan').val("");
        //             $('#dni').val("");
        //             $('#correo').val("");
        //             $('#celular').val("");
        //             $("#genero").prop("selectedIndex",0);
        //             $('#fechana').val("");
        //             $('#cuest-nombre').val("");
        //             $('#cuest-apellidopa').val("");
        //             $('#cuest-apellidoma').val("");
        //             $('#cuest-dni').val("");
        //             $('#pru-nombre').val("");
        //             $('#pru-apellidopa').val("");
        //             $('#pru-apellidoma').val("");
        //             $('#pru-dni').val("");
        //             $('#cita-nombre').val("");
        //             $('#cita-apellidopa').val("");
        //             $('#cita-apellidoma').val("");
        //             $('#cita-dni').val("");
        //             // $('#filter').val("");
        //         }
        //     });
        //     request.fail(function() {
        //         Swal.fire({
        //             icon: 'error',
        //             title: 'Hubo un error',
        //             showConfirmButton: false,
        //             timer: 1500
        //         });
        //     });
        //     return false;
        // });

        $('#btnSearchPatient').on('click',function(){
            let search = $('#filter-search').val();
            // alert(search);
            let datos = $('#frm-search-patient').serialize();

            if(search === '1'){
                // alert("1")
            }else if(search === '2'){
                
                $('#filter').get(0).type = 'select-one';
                // $('#password').get(0).type = 'text';
            }
        });

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        
        
        
        function generar_citas_paciente(dni) {
            var data = new FormData();
            data.append("dni", dni);
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

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('input[type=text]').forEach( node => node.addEventListener('keypress', e => {
                if(e.keyCode == 13) {
                    e.preventDefault();
                }
            }))
        });

        let buttonPressed;


        $('.submitAnswers').on('click',function(e){
            
            buttonPressed = $(this).attr('id');
            console.log(buttonPressed);
        });
        
        $('#frm-answers-patient').submit(function(e) {
            e.preventDefault();
            
            if($('#cuest-nombre').val() !== "" ){                
                if(buttonPressed === 'btnSaveAnswers'){
                    
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
                        $('#btnUpdateAnswers').css('display','block');
                        $('#btnSaveAnswers').css('display','none');
                    })
                    .fail(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ocurrió un problema',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    });
                }else if(buttonPressed === 'btnUpdateAnswers'){
                
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
            }else{
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

        $('#prev-btn2').on('click', function() {
            $('#next-btn2').css('display', 'block');
            if (detectCSS('#step-2', 'display', 'block')) {
                $('#prev-btn2').css('display', 'none');
                // console.log('true');
            } else {
                // $('#prev-btn2').css('display','block');
                // console.log('false');
            }
        });

        $('#next-btn2').on('click', function() {
            $('#prev-btn2').css('display', 'block');
            if (detectCSS('#step-3', 'display', 'block')) {
                $('#next-btn2').css('display', 'none');
                console.log('true');
            }
        });

        function detectCSS(attr, css, value) {
            let result = $(attr).css(css) === value ? true : false;
            return result;
        }
    </script>

</body>

</html>