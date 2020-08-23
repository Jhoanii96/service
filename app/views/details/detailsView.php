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

    <link href="<?= FOLDER_PATH ?>/src/css/main.d810cf0ae7f39f28f336.css" rel="stylesheet">

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

        <div class="app-main">

            <!-- PANEL LATERAL IZQUIERDO -->
            <?php require(ROOT . '/' . PATH_VIEWS . 'panel_lateral_izq.php'); ?>




            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-graph text-success">
                                    </i>
                                </div>
                                <div>Detalles de la consulta
                                    <div class="page-title-subheading">Build whatever layout you need with our Architect framework.
                                    </div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                                    <i class="fa fa-star"></i>
                                </button>
                                
                            </div>
                        </div>
                    </div>
                    
                    



                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Grid Rows</h5>
                                    <form class="">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="exampleEmail11" class="">Email</label><input name="email" id="exampleEmail11" placeholder="with a placeholder" type="email" class="form-control"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="examplePassword11" class="">Password</label><input name="password" id="examplePassword11" placeholder="password placeholder" type="password" class="form-control"></div>
                                            </div>
                                        </div>
                                        <div class="position-relative form-group"><label for="exampleAddress" class="">Address</label><input name="address" id="exampleAddress" placeholder="1234 Main St" type="text" class="form-control"></div>
                                        <div class="position-relative form-group"><label for="exampleAddress2" class="">Address 2</label><input name="address2" id="exampleAddress2" placeholder="Apartment, studio, or floor" type="text" class="form-control">
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="exampleCity" class="">City</label><input name="city" id="exampleCity" type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="exampleState" class="">State</label><input name="state" id="exampleState" type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="position-relative form-group"><label for="exampleZip" class="">Zip</label><input name="zip" id="exampleZip" type="text" class="form-control"></div>
                                            </div>
                                        </div>
                                        <div class="position-relative form-check"><input name="check" id="exampleCheck" type="checkbox" class="form-check-input"><label for="exampleCheck" class="form-check-label">Check me out</label></div>
                                        <button class="mt-2 btn btn-primary">Sign in</button>
                                    </form>
                                </div>
                            </div>
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Inline</h5>
                                    <div>
                                        <form class="form-inline">
                                            <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group"><label for="exampleEmail22" class="mr-sm-2">Email</label><input name="email" id="exampleEmail22" placeholder="something@idk.cool" type="email" class="form-control"></div>
                                            <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group"><label for="examplePassword22" class="mr-sm-2">Password</label><input name="password" id="examplePassword22" placeholder="don't tell!" type="password" class="form-control"></div>
                                            <button class="btn btn-primary">Submit</button>
                                        </form>
                                        <div class="divider"></div>
                                        <form class="">
                                            <div class="position-relative form-check form-check-inline"><label class="form-check-label"><input type="checkbox" class="form-check-input"> Some input</label></div>
                                            <div class="position-relative form-check form-check-inline"><label class="form-check-label"><input type="checkbox" class="form-check-input"> Some other input</label></div>
                                        </form>
                                        <div class="divider"></div>
                                        <form class="form-inline">
                                            <div class="position-relative form-group"><label for="exampleEmail33" class="sr-only">Email</label><input name="email" id="exampleEmail33" placeholder="Email" type="email" class="mr-2 form-control"></div>
                                            <div class="position-relative form-group"><label for="examplePassword44" class="sr-only">Password</label><input name="password" id="examplePassword44" placeholder="Password" type="password" class="mr-2 form-control"></div>
                                            <button class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>






            </div>
        </div>
        <!-- MODAL USER CONFIGURATIONS  -->

        <div class="modal fade" id="AppDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detalles de la consulta</h5>
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
                            <p class="mb-0 title-details">Datos de la consulta</p>
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

                            <p class="mb-0 title-details">Datos consulta</p>
                            <div class="form-row mt-3">
                                <div class="col-md-5 ml-4 mr-4">
                                    <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Fecha consulta: </label>
                                        <span id="det_fcon" style="padding: 7px 0; left: 5px;"></span>
                                    </div>
                                    <!-- <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Diagnostico: </label>
                                    <span id="det_est" style="padding: 7px 0; left: 5px;"></span>
                                </div> -->
                                </div>
                                <div class="col-md-5 ml-4 mr-4">
                                    <!-- <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Precio: </label>
                                    <span id="det_cost" style="padding: 7px 0; left: 5px;"></span>
                                </div> -->
                                </div>

                            </div>

                            <p class="mb-0 title-details">Datos de la cita</p>
                            <div class="form-row mt-3">
                                <div class="col-md-5 ml-4 mr-4">
                                    <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Fecha cita: </label>
                                        <span id="det_fc" style="padding: 7px 0; left: 5px;"></span>
                                    </div>
                                    <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Estado: </label>
                                        <span id="det_est" style="padding: 7px 0; left: 5px;"></span>
                                    </div>
                                </div>
                                <div class="col-md-5 ml-4 mr-4">
                                    <div class="position-relative row form-group"><label style="padding: 7px 12px; left: 5px;">Precio: </label>
                                        <span id="det_cost" style="padding: 7px 0; left: 5px;"></span>
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

        <div class="app-drawer-overlay d-none animated fadeIn"></div>
        <script type="text/javascript" src="<?= FOLDER_PATH ?>/src/js/main.d810cf0ae7f39f28f336.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
        <script src="<?= FOLDER_PATH ?>/src/js/cuestionario.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>




</body>

</html>