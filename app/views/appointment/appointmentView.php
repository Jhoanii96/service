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
                                    <div class="input-group" style="align-items: center;">
                                        <div class="position-relative input-group mb-4">
                                            <label class="mr-2 mt-auto mb-auto">Nombre</label>
                                            <input name="date" id="date" placeholder="Ingresar nombre" type="text" class="mr-2 form-control">

                                        </div>
                                        <div class="position-relative input-group mb-4">
                                            <label class="mr-2 mt-auto mb-auto">Fecha Cita</label>
                                            <input name="date" id="date" type="date" class="mr-2 form-control">
                                            <button class="btn-icon btn-pill btn btn-primary"><i class="mr-0 pe-7s-search btn-icon-wrapper"></i></button>
                                        </div>
                                    </div>
                                    <div class="input-group pb-4" style="margin-left: auto;">
                                        <div class="position-relative input-group">
                                            <button class="btn-icon btn-pill btn btn-success" data-toggle="modal" data-target="#exampleModal">Agregar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Edad</th>
                                        <th>Atención</th>
                                        <th>Fecha y hora</th>
                                        <th>Atender</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    while ($datos_cita = $data['datos_cita']->fetch()) {
                                        
                                        $birthDate = explode("-", $datos_cita['fecha_nac']);
                                        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                                            ? ((date("Y") - $birthDate[0]) - 1)
                                            : (date("Y") - $birthDate[0]));

                                    ?>
                                        <tr>
                                            <td><?= $datos_cita['nombre'] ?></td>
                                            <td><?= $datos_cita['apellidos'] ?></td>
                                            <td class="text-center"><?= $age ?> años</td>
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
                                    <?php

                                    }

                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Paciente</th>
                                        <th>Apellidos</th>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar hora</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Agregue la hora en que realizará la consulta</p>
                    <br>
                    <label for="exampleCustomSelect" class="mr-2 mt-auto mb-auto">Horas</label>
                    <input class="form-control input-mask-trigger mr-2" id="endTime">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- JQUERY -->
    <script src="<?= FOLDER_PATH ?>/src/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?= FOLDER_PATH ?>/src/js/main.d810cf0ae7f39f28f336.js"></script>
    <script src="<?= FOLDER_PATH ?>/src/js/cuestionario.js"></script>
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