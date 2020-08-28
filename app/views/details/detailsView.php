<?php

date_default_timezone_set('UTC');

$datos = $data['datos_details']->fetch();

/* Dato historia */
$id = $datos['id'];

/* Datos paciente */

$Nombres = $datos['nombres'];
$Fechanac_nac = $datos['fn'];
$dni = $datos['dni'];

$cellphone = str_split($datos['celular'], 1);
$digits = count($cellphone);
$digits = $digits - 1;
$newcellphone = [];
$newcellphone[0] = '';
$newcellphone[1] = '';
$newcellphone[2] = '';
$newcellphone[3] = '';
$counting = 0;
$countarray = 0;
for ($i = $digits; $i >= 0; $i--) {
    if ($counting == 3 && $countarray < 3) {
        $counting = 0;
        $countarray++;
    }
    $newcellphone[$countarray] = $cellphone[$i] . $newcellphone[$countarray];
    $counting++;
}
$cellphone_patient = $newcellphone[3] . ' ' . $newcellphone[2] . ' ' . $newcellphone[1] . ' ' . $newcellphone[0];

if ($datos['genero'] == 'M') {
    $genero = 'Masculino';
}
if ($datos['genero'] == 'F') {
    $genero = 'Femenino';
}
if ($datos['genero'] != 'F' || $datos['genero'] != 'M') {
    $genero = 'Otros';
}

$email = $datos['email'];
$birthDate = explode("-", $datos['edad']);
$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
    ? ((date("Y") - $birthDate[0]) - 1)
    : (date("Y") - $birthDate[0]));


/* Datos Consulta */
$fecha_historia = $datos['fecha_historia'];
$diagnostico = $datos['diag'];
$examen_fisico = $datos['ex_fi'];
$anamnesis = $datos['anam'];
$axamenes = $datos['exam'];

/* fecha cita */
$fcreacion = $datos['fcreacion'];
$Fechacita = $datos['fcita'];
$precio = $datos['precio'];
$atencion = $datos['atencion'];



?>





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

    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/lightbox.css">
    <link href="<?= FOLDER_PATH ?>/src/css/photoswipe.css" rel="stylesheet" />
    <link href="<?= FOLDER_PATH ?>/src/css/default-skin.css" rel="stylesheet" />


    <script src="<?= FOLDER_PATH ?>/src/js/photoswipe.min.js"></script>
    <script src="<?= FOLDER_PATH ?>/src/js/photoswipe-ui-default.min.js"></script>

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

        input,
        textarea {
            border-radius: 0 !important;
        }

        .cropper-container {
            width: auto !important;
            /* height: 300px !important; */
        }

        /* .cropper-canvas {
            margin: auto !important;
            transform: none !important;
        } */
        #gallery_viewer {
            display: grid;
            height: calc(100vh - 450px);
            grid-template: repeat(2, 1fr) / repeat(4, 1fr);
            grid-gap: 0.5em;
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
                                    <i class="pe-7s-paper-plane text-success">
                                    </i>
                                </div>
                                <div>Detalles de la consulta
                                    <div class="page-title-subheading">Detalle de la consulta o historial clínico, se muestran los datos del paciente, del historial, citas y archivos.
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
                                    <h5 class="card-title">Datos del paciente</h5>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label class="">Nombre completo</label>
                                                <input type="text" class="form-control" value="<?= $Nombres ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label class="">Fecha de nacimiento</label>
                                                <input type="text" class="form-control" value="<?= $Fechanac_nac ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label class="">DNI</label>
                                                <input type="text" class="form-control" value="<?= $dni ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label class="">Celular</label>
                                                <input type="text" class="form-control" value="<?= $cellphone_patient ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label class="">Genero</label>
                                                <input type="text" class="form-control" value="<?= $genero ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label class="">Email</label>
                                                <input type="text" class="form-control" value="<?= $email ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="position-relative form-group">
                                                <label class="">Edad</label>
                                                <input type="text" class="form-control" value="<?= $age ?> años" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Datos de la consulta</h5><span>Fecha consulta: <?= $fecha_historia ?></span>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label class="">Diagnostico</label>
                                                <textarea class="form-control" rows="3" style="overflow-y: scroll;" readonly><?= $diagnostico ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label class="">Examen físico</label>
                                                <textarea class="form-control" rows="3" style="overflow-y: scroll;" readonly><?= $examen_fisico ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label class="">Anamnesis</label>
                                                <textarea class="form-control" rows="3" style="overflow-y: scroll;" readonly><?= $anamnesis ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label class="">Examenes</label>
                                                <textarea class="form-control" rows="3" style="overflow-y: scroll;" readonly><?= $axamenes ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Datos cita</h5>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label class="">Fecha cita</label>
                                                <input type="text" class="form-control" value="<?= $Fechacita ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label class="">Precio</label>
                                                <input type="text" class="form-control" value="<?= $precio ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label class="">Estado</label>
                                                <input type="text" class="form-control" value="<?= $atencion ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label class="">Fecha cita creada</label>
                                                <input type="text" class="form-control" value="<?= $fcreacion ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Archivos [Imagen, Word y PDF]</h5>
                                    <h5 class="card-subtitle">Imagenes</h5>
                                    <div class="row" style="margin-bottom: 20px;">

                                        <div id="gallery_viewer" class="demo-gallery" data-pswp-uid="1" style="margin-left: 15px;margin-right: 15px;">

                                            <div>
                                                <a href="<?= FOLDER_PATH ?>/src/assets/files/images/illust_70133000_20180824_085626.png" data-size="3000x1718" data-med="<?= FOLDER_PATH ?>/src/assets/files/images/illust_70133000_20180824_085626.png" data-med-size="524x524" data-author="Folkert Gorter" class="demo-gallery__img--main">
                                                    <img src="<?= FOLDER_PATH ?>/src/assets/files/images/illust_70133000_20180824_085626.png" alt="" style="width: 100%;" />
                                                </a>
                                            </div>

                                        </div>
                                        <!-- <div class="style-select">
                                            <p style="margin:24px 0 12px;color:#444;">Demo gallery style</p>

                                            <div class="radio">
                                                <input type="radio" name="gallery-style" value="all" id="radio-all-controls" checked="">
                                                <label for="radio-all-controls">

                                                    All controls<br>
                                                    <span>caption, share and fullscreen buttons, tap to toggle controls</span>
                                                </label>
                                            </div>

                                            <div class="radio">
                                                <input type="radio" name="gallery-style" value="minimal" id="radio-minimal-black">
                                                <label for="radio-minimal-black">

                                                    Minimal<br>
                                                    <span>no caption, transparent background, tap to close</span>
                                                </label>
                                            </div>

                                        </div> -->



                                    </div>


                                    <h5 class="card-subtitle">Documentos Word</h5>

                                    <!-- <div class="form-row">
                                        <a href="/2019/src/assets/media/cfp/Formato_ES_PrimerWIA_2019.docx" style="text-decoration: underline; color: #333333; font-weight: normal;">Descargar plantilla de envío (Formato en word). 
                                            <i class="far fa-file-word-o" aria-hidden="true"></i>
                                        </a>
                                    </div> -->

                                    <h5 class="card-subtitle">Documentos PDF</h5>

                                    <!-- <div class="form-row">
                                        <a href="/2019/src/assets/media/cfp/Formato_ES_PrimerWIA_2019.docx" style="text-decoration: underline; color: #333333; font-weight: normal;">Descargar plantilla de envío (Formato en word). 
                                            <i class="far fa-file-word-o" aria-hidden="true"></i>
                                        </a>
                                    </div> -->

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
    </div>



    <div id="gallery" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>

        <div class="pswp__scroll-wrap">

            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share" title="Share"></button>

                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- <div class="pswp__loading-indicator"><div class="pswp__loading-indicator__line"></div></div> -->

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip">
                        <!-- <a href="#" class="pswp__share--facebook"></a>
					<a href="#" class="pswp__share--twitter"></a>
					<a href="#" class="pswp__share--pinterest"></a>
					<a href="#" download class="pswp__share--download"></a> -->
                    </div>
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center">
                    </div>
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

    <script>
        $(':input[readonly]').css({
            'background-color': '#fff'
        });
    </script>
    <script>
        $(window).on("load",function(){
            GetFiles(<?= $id ?>);
        });
    </script>

    <script>
        function GetFiles(e) {
            var data = new FormData();
            data.append("meta_data", e);
            $.ajax({
                beforeSend: function() {
                    /* $("#data-details").css("display", "none");
                    $("#data-loading").css("display", "block"); */
                    /* $("#data-details").html(''); */
                },
                url: "<?= FOLDER_PATH ?>/details/get_files",
                type: "POST",
                data: data,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                success: function(resp) {
                    /* var obj_details = JSON.parse(resp);
                    obj_details = obj_details[0]; */

                    /* $("#det_gen").html(genero);
                    $("#det_edad").html(calcularEdad(obj_details[6]));
                    $("#det_fn").html(obj_details[12]);
                    $("#det_cel").html(obj_details[5]);
                    $("#det_email").html((obj_details[11]!='') ? obj_details[11] : "No definido");
                    $("#det_fc").html(obj_details[8]);
                    $("#det_est").html(estado);
                    $("#det_cost").html("S/. " + obj_details[9]);

                    $("#data-loading").css("display", "none");
                    $("#data-details").css("display", "block"); */
                    
                    /* $("#data-details").html(resp); */
                }
            })
        }
    </script>

    <script type="text/javascript">
        (function() {

            var initPhotoSwipeFromDOM = function(gallerySelector) {

                var parseThumbnailElements = function(el) {
                    var thumbElements = el.childNodes,
                        numNodes = thumbElements.length,
                        items = [],
                        el,
                        childElements,
                        thumbnailEl,
                        size,
                        item;

                    for (var i = 0; i < numNodes; i++) {
                        el = thumbElements[i];

                        // include only element nodes 
                        if (el.nodeType !== 1) {
                            continue;
                        }

                        childElements = el.children;

                        size = el.getAttribute('data-size').split('x');

                        // create slide object
                        item = {
                            src: el.getAttribute('href'),
                            w: parseInt(size[0], 10),
                            h: parseInt(size[1], 10),
                            author: el.getAttribute('data-author')
                        };

                        item.el = el; // save link to element for getThumbBoundsFn

                        if (childElements.length > 0) {
                            item.msrc = childElements[0].getAttribute('src'); // thumbnail url
                            if (childElements.length > 1) {
                                item.title = childElements[1].innerHTML; // caption (contents of figure)
                            }
                        }


                        var mediumSrc = el.getAttribute('data-med');
                        if (mediumSrc) {
                            size = el.getAttribute('data-med-size').split('x');
                            // "medium-sized" image
                            item.m = {
                                src: mediumSrc,
                                w: parseInt(size[0], 10),
                                h: parseInt(size[1], 10)
                            };
                        }
                        // original image
                        item.o = {
                            src: item.src,
                            w: item.w,
                            h: item.h
                        };

                        items.push(item);
                    }

                    return items;
                };

                // find nearest parent element
                var closest = function closest(el, fn) {
                    return el && (fn(el) ? el : closest(el.parentNode, fn));
                };

                var onThumbnailsClick = function(e) {
                    e = e || window.event;
                    e.preventDefault ? e.preventDefault() : e.returnValue = false;

                    var eTarget = e.target || e.srcElement;

                    var clickedListItem = closest(eTarget, function(el) {
                        return el.tagName === 'A';
                    });

                    if (!clickedListItem) {
                        return;
                    }

                    var clickedGallery = clickedListItem.parentNode;

                    var childNodes = clickedListItem.parentNode.childNodes,
                        numChildNodes = childNodes.length,
                        nodeIndex = 0,
                        index;

                    for (var i = 0; i < numChildNodes; i++) {
                        if (childNodes[i].nodeType !== 1) {
                            continue;
                        }

                        if (childNodes[i] === clickedListItem) {
                            index = nodeIndex;
                            break;
                        }
                        nodeIndex++;
                    }

                    if (index >= 0) {
                        openPhotoSwipe(index, clickedGallery);
                    }
                    return false;
                };

                var photoswipeParseHash = function() {
                    var hash = window.location.hash.substring(1),
                        params = {};

                    if (hash.length < 5) { // pid=1
                        return params;
                    }

                    var vars = hash.split('&');
                    for (var i = 0; i < vars.length; i++) {
                        if (!vars[i]) {
                            continue;
                        }
                        var pair = vars[i].split('=');
                        if (pair.length < 2) {
                            continue;
                        }
                        params[pair[0]] = pair[1];
                    }

                    if (params.gid) {
                        params.gid = parseInt(params.gid, 10);
                    }

                    return params;
                };

                var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
                    var pswpElement = document.querySelectorAll('.pswp')[0],
                        gallery,
                        options,
                        items;

                    items = parseThumbnailElements(galleryElement);

                    // define options (if needed)
                    options = {

                        galleryUID: galleryElement.getAttribute('data-pswp-uid'),

                        getThumbBoundsFn: function(index) {
                            // See Options->getThumbBoundsFn section of docs for more info
                            var thumbnail = items[index].el.children[0],
                                pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                                rect = thumbnail.getBoundingClientRect();

                            return {
                                x: rect.left,
                                y: rect.top + pageYScroll,
                                w: rect.width
                            };
                        },

                        addCaptionHTMLFn: function(item, captionEl, isFake) {
                            if (!item.title) {
                                captionEl.children[0].innerText = '';
                                return false;
                            }
                            captionEl.children[0].innerHTML = item.title + '<br/><small>Photo: ' + item
                                .author + '</small>';
                            return true;
                        },

                    };


                    if (fromURL) {
                        if (options.galleryPIDs) {
                            // parse real index when custom PIDs are used 
                            // https://photoswipe.com/documentation/faq.html#custom-pid-in-url
                            for (var j = 0; j < items.length; j++) {
                                if (items[j].pid == index) {
                                    options.index = j;
                                    break;
                                }
                            }
                        } else {
                            options.index = parseInt(index, 10) - 1;
                        }
                    } else {
                        options.index = parseInt(index, 10);
                    }

                    // exit if index not found
                    if (isNaN(options.index)) {
                        return;
                    }



                    var radios = document.getElementsByName('gallery-style');
                    for (var i = 0, length = radios.length; i < length; i++) {
                        if (radios[i].checked) {
                            if (radios[i].id == 'radio-all-controls') {

                            } else if (radios[i].id == 'radio-minimal-black') {
                                options.mainClass = 'pswp--minimal--dark';
                                options.barsSize = {
                                    top: 0,
                                    bottom: 0
                                };
                                options.captionEl = false;
                                options.fullscreenEl = false;
                                options.shareEl = false;
                                options.bgOpacity = 0.85;
                                options.tapToClose = true;
                                options.tapToToggleControls = false;
                            }
                            break;
                        }
                    }

                    if (disableAnimation) {
                        options.showAnimationDuration = 0;
                    }

                    // Pass data to PhotoSwipe and initialize it
                    gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);

                    // see: http://photoswipe.com/documentation/responsive-images.html
                    var realViewportWidth,
                        useLargeImages = false,
                        firstResize = true,
                        imageSrcWillChange;

                    gallery.listen('beforeResize', function() {

                        var dpiRatio = window.devicePixelRatio ? window.devicePixelRatio : 1;
                        dpiRatio = Math.min(dpiRatio, 2.5);
                        realViewportWidth = gallery.viewportSize.x * dpiRatio;


                        if (realViewportWidth >= 1200 || (!gallery.likelyTouchDevice &&
                                realViewportWidth > 800) || screen.width > 1200) {
                            if (!useLargeImages) {
                                useLargeImages = true;
                                imageSrcWillChange = true;
                            }

                        } else {
                            if (useLargeImages) {
                                useLargeImages = false;
                                imageSrcWillChange = true;
                            }
                        }

                        if (imageSrcWillChange && !firstResize) {
                            gallery.invalidateCurrItems();
                        }

                        if (firstResize) {
                            firstResize = false;
                        }

                        imageSrcWillChange = false;

                    });

                    gallery.listen('gettingData', function(index, item) {
                        if (useLargeImages) {
                            item.src = item.o.src;
                            item.w = item.o.w;
                            item.h = item.o.h;
                        } else {
                            item.src = item.m.src;
                            item.w = item.m.w;
                            item.h = item.m.h;
                        }
                    });

                    gallery.init();
                };

                // select all gallery elements
                var galleryElements = document.querySelectorAll(gallerySelector);
                for (var i = 0, l = galleryElements.length; i < l; i++) {
                    galleryElements[i].setAttribute('data-pswp-uid', i + 1);
                    galleryElements[i].onclick = onThumbnailsClick;
                }

                // Parse URL and open gallery if it contains #&pid=3&gid=1
                var hashData = photoswipeParseHash();
                if (hashData.pid && hashData.gid) {
                    openPhotoSwipe(hashData.pid, galleryElements[hashData.gid - 1], true, true);
                }
            };

            initPhotoSwipeFromDOM('.demo-gallery');

        })();
    </script>



</body>

</html>