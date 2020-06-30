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
                                <div>Panel de administración
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

                    <!-- <div class="row">
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-midnight-bloom">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading" style="font-size: 20px;">Perfil</div>
                                        <div class="widget-subheading">Edita tu información personal</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <i class="pe-7s-user" style="font-size: 40px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-arielle-smile">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading" style="font-size: 20px;">Notificaciones</div>
                                        <div class="widget-subheading">Verificar la bandeja de notificaciones</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <i class="pe-7s-bell" style="font-size: 38px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-grow-early">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading" style="font-size: 20px;">Consultas</div>
                                        <div class="widget-subheading">Consultar al administrador</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <i class="pe-7s-comment" style="font-size: 40px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-midnight-bloom">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading" style="font-size: 20px;">Perfil</div>
                                        <div class="widget-subheading">Edita tu información personal</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <i class="pe-7s-user" style="font-size: 40px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-arielle-smile">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading" style="font-size: 20px;">Enviar notificaciones</div>
                                        <div class="widget-subheading">Enviar mensajes a usuarios</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <i class="pe-7s-bell" style="font-size: 38px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-grow-early">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading" style="font-size: 20px;">Bandeja de consulta</div>
                                        <div class="widget-subheading">Verificar la bandeja de entrada</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <i class="pe-7s-comment" style="font-size: 40px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-premium-dark">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Extra</div>
                                        <div class="widget-subheading">....</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <i class="pe-7s-comment" style="font-size: 40px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <div class="mbg-3 h-auto pl-0 pr-0 bg-transparent no-border card-header" style="border-bottom: 1px solid #9c9c9c;padding-bottom: 15px;padding-top: 25px;">
                        <div class="card-header-title fsize-2 font-weight-normal">Registro de consultas</div>
                        <div class="btn-actions-pane-right">
                            <button id="btn-adm_consulta" class="btn-shadow btn btn-warning text-white fsize-1"><i class="fa fa-plus"></i> Nueva consulta</button>
                        </div>
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