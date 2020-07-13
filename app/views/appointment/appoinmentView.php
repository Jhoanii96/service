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
    <?php require(ROOT . '/' . PATH_VIEWS . 'fonts.php'); ?>

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
                                    <div class="input-group pb-4" style="align-items: center;">
                                        <div class="position-relative input-group ">
                                            <label for="exampleCustomSelect" class="mr-2 mt-auto mb-auto">Fecha Cita</label>
                                            <input name="date" id="date" placeholder="password placeholder" type="date" class="mr-2 form-control">
                                            <button class="btn-icon btn-pill btn btn-primary"><i class="mr-0 pe-7s-search btn-icon-wrapper"></i></button>
                                        </div>
                                    </div>
                                    <div class="input-group pb-4" style="margin-left: auto;">
                                        <div class="position-relative input-group">
                                            <label for="exampleCustomSelect" class="mr-2 mt-auto mb-auto">Horas</label>
                                            <input class="form-control input-mask-trigger mr-2" id="endTime">
                                            <button class="btn-icon btn-pill btn btn-success">Agregar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Paciente</th>
                                        <th>Edad</th>
                                        <th>Atención</th>
                                        <th>Fecha y hora</th>
                                        <th>Atender</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Arturito</td>
                                        <td class="text-center">6 años</td>
                                        <td class="text-center">8 días</td>
                                        <td class="text-center">09/07/2020 15:30</td>
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
                                    <tr>
                                        <td>Arturito</td>
                                        <td class="text-center">6 años</td>
                                        <td class="text-center">8 días</td>
                                        <td class="text-center">09/07/2020 15:30</td>
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
                                    <tr>
                                        <td>Arturito</td>
                                        <td class="text-center">6 años</td>
                                        <td class="text-center">8 días</td>
                                        <td class="text-center">09/07/2020 15:30</td>
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
                                    <tr>
                                        <td>Arturito</td>
                                        <td class="text-center">6 años</td>
                                        <td class="text-center">8 días</td>
                                        <td class="text-center">09/07/2020 15:30</td>
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
                                    <tr>
                                        <td>Arturito</td>
                                        <td class="text-center">6 años</td>
                                        <td class="text-center">8 días</td>
                                        <td class="text-center">09/07/2020 15:30</td>
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
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Paciente</th>
                                        <th>Edad</th>
                                        <th>Atención</th>
                                        <th>Fecha y hora</th>
                                        <th>Atender</th>
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


    <!-- END MODAL -->
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script type="text/javascript" src="<?= FOLDER_PATH ?>/src/js/main.d810cf0ae7f39f28f336.js"></script>
    <script src="<?= FOLDER_PATH ?>/src/js/cuestionario.js"></script>
    <script>
        document.getElementById("btn-adm_consulta").addEventListener("click", consulta_admin);
        document.getElementById("btn-adm_close").addEventListener("click", close_admin);
        
        function consulta_admin() {
            location.href = "<?= FOLDER_PATH ?>/consultation"
        }

        function close_admin() {
            location.href = "<?= FOLDER_PATH ?>/login/salir"
        }
    </script>
</body>

</html>