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

    <!-- HEADER -->
    <link href="<?= FOLDER_PATH ?>/src/css/all_fonts.css" rel="stylesheet" media="screen">
    
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
    <link href="<?= FOLDER_PATH ?>/src/css/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
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
                                                <div class="form-row">
                                                    <div class="col-md-2">
                                                        <label for="exampleCustomSelect" class="">Buscar</label>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-2">
                                                        <div class="position-relative form-group">
                                                            <select type="select" id="exampleCustomSelect" name="customSelect" class="custom-select">
                                                                <option value="0">Seleccionar</option>
                                                                <option value="1">DNI</option>
                                                                <option value="2">Nombres</option>
                                                                <option value="3">Apellidos</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <input name="filter" id="filter" placeholder="Ingresar buscador" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="position-relative form-group">
                                                            <button class="mb-2 mr-2 btn-icon btn-pill btn btn-primary"><i class="pe-7s-search btn-icon-wrapper"> </i>Buscar</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="dni">DNI</label>
                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Género</label>
                                                            <select type="select" id="exampleCustomSelect" name="customSelect" class="custom-select">
                                                                <option value="0">Seleccionar</option>
                                                                <option value="1">Femenino</option>
                                                                <option value="2">Másculino</option>
                                                                <option value="3">Otros</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="examplePassword22">Fecha Nacimiento</label>
                                                            <input name="date" id="date" placeholder="password placeholder" type="date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="dni">Nombres</label>
                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Apellido Paterno</label>
                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="examplePassword22">Apellido Materno</label>
                                                            <input name="date" id="date" placeholder="password placeholder" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="dni">Número Celular</label>
                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Correo Electrónico</label>
                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="procedencia">Procedencia</label>
                                                            <input name="procedencia" id="procedencia" placeholder="password placeholder" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="anterior">Ocupación Anterior</label>
                                                            <input name="anterior" id="anterior" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="actual">Ocupación Actual</label>
                                                            <input name="actual" id="actual" type="text" placeholder="" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-2">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                        <div>
                                                            <div class="card-body">
                                                                <div class="form-row">
                                                                    <div class="col-md-6">
                                                                        <div class="position-relative form-group">
                                                                            <label for="dni">DNI</label>
                                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="position-relative form-group">
                                                                            <label for="genero">Nombres</label>
                                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-md-6">
                                                                        <div class="position-relative form-group">
                                                                            <label for="dni">Apellido Paterno</label>
                                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="position-relative form-group">
                                                                            <label for="genero">Apellido Materno</label>
                                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="position-relative form-group">
                                                                    <label for="exampleEmail3">--------------------------------------------</label>
                                                                    <p class="form-control-plaintext">Control de preguntas</p>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-md-6">
                                                                        <div class="position-relative form-group">
                                                                            <label for="dni">P1: ¿?</label>
                                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="position-relative form-group">
                                                                            <label for="genero">P2: ¿?</label>
                                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-md-6">
                                                                        <div class="position-relative form-group">
                                                                            <label for="dni">P3: ¿?</label>
                                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="position-relative form-group">
                                                                            <label for="genero">P4: ¿?</label>
                                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-md-6">
                                                                        <div class="position-relative form-group">
                                                                            <label for="dni">P5: ¿?</label>
                                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="position-relative form-group">
                                                                            <label for="genero">P6: ¿?</label>
                                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-md-6">
                                                                        <div class="position-relative form-group">
                                                                            <label for="dni">P7: ¿?</label>
                                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="position-relative form-group">
                                                                            <label for="genero">P8: ¿?</label>
                                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-md-6">
                                                                        <div class="position-relative form-group">
                                                                            <label for="dni">P9: ¿?</label>
                                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="position-relative form-group">
                                                                            <label for="genero">P10: ¿?</label>
                                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-3">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="dni">DNI</label>
                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Nombres</label>
                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="dni">Apellido Paterno</label>
                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Apellido Materno</label>
                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail3">--------------------------------------------</label>
                                                    <p class="form-control-plaintext">Control de preguntas</p>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Anamnesis</label>
                                                            <textarea rows="1" class="form-control autosize-input" style="max-height: 200px; height: 35px;">TE:
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
                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Nombres</label>
                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="dni">Apellido Paterno</label>
                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="genero">Apellido Materno</label>
                                                            <input name="dni" id="dni" placeholder="with a placeholder" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail3">--------------------------------------------</label>
                                                    <p class="form-control-plaintext">Control de preguntas</p>
                                                </div>


                                                <div class="form-inline">

                                                    <div class="position-relative form-group">
                                                        <label for="exampleCustomSelect" class="mr-2">Fecha Cita</label>
                                                        <input name="date" id="date" placeholder="password placeholder" type="date" class="mr-2 form-control">
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
                                                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Fecha consulta</th>
                                                                <th>Anamnesis</th>
                                                                <th>Exámen físico</th>
                                                                <th>Exámenes</th>
                                                                <th>Archivos</th>
                                                                <th>Imágenes</th>
                                                                <th>Opciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>15</td>
                                                                <td>2011/04/25</td>
                                                                <td>TE: SP:</td>
                                                                <td>Orofaringe</td>
                                                                <td>Pedidos: Resultados:</td>
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
                                                            <tr>
                                                                <td>15</td>
                                                                <td>2011/04/25</td>
                                                                <td>TE: SP:</td>
                                                                <td>Orofaringe</td>
                                                                <td>Pedidos: Resultados:</td>
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
                                                                <th>Anamnesis</th>
                                                                <th>Exámen físico</th>
                                                                <th>Exámenes</th>
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
                                    <div class="divider"></div>
                                    <div class="clearfix">
                                        <button type="button" id="reset-btn2" class="btn-shadow float-left btn btn-link">Resetear</button>
                                        <button type="button" id="next-btn2" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Siguiente</button>
                                        <button type="button" id="prev-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Anterior</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mbg-3 h-auto pl-0 pr-0 bg-transparent no-border card-header" style="border-bottom: 1px solid #9c9c9c;padding-bottom: 15px;padding-top: 25px;">
                        <div class="card-header-title fsize-2 font-weight-normal">Registro: LAURA</div>
                    </div>

                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha consulta</th>
                                        <th>Anamnesis</th>
                                        <th>Exámen físico</th>
                                        <th>Exámenes</th>
                                        <th>Archivos</th>
                                        <th>Imágenes</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>15</td>
                                        <td>2011/04/25</td>
                                        <td>TE: SP:</td>
                                        <td>Orofaringe</td>
                                        <td>Pedidos: Resultados:</td>
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
                                    <tr>
                                        <td>15</td>
                                        <td>2011/04/25</td>
                                        <td>TE: SP:</td>
                                        <td>Orofaringe</td>
                                        <td>Pedidos: Resultados:</td>
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
                                    <tr>
                                        <td>15</td>
                                        <td>2011/04/25</td>
                                        <td>TE: SP:</td>
                                        <td>Orofaringe</td>
                                        <td>Pedidos: Resultados:</td>
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
                                    <tr>
                                        <td>15</td>
                                        <td>2011/04/25</td>
                                        <td>TE: SP:</td>
                                        <td>Orofaringe</td>
                                        <td>Pedidos: Resultados:</td>
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
                                    <tr>
                                        <td>15</td>
                                        <td>2011/04/25</td>
                                        <td>TE: SP:</td>
                                        <td>Orofaringe</td>
                                        <td>Pedidos: Resultados:</td>
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
                                    <tr>
                                        <td>15</td>
                                        <td>2011/04/25</td>
                                        <td>TE: SP:</td>
                                        <td>Orofaringe</td>
                                        <td>Pedidos: Resultados:</td>
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
                                        <th>Anamnesis</th>
                                        <th>Exámen físico</th>
                                        <th>Exámenes</th>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
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

</body>

</html>