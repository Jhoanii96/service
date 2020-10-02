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
$precio = $datos['precio'];
$diagnostico = $datos['diag'];
$examen_fisico = $datos['ex_fi'];
$anamnesis = $datos['anam'];
$axamenes = $datos['exam'];
$tratamiento = $datos['tratamiento'];

/* fecha cita */
$fcreacion = $datos['fcreacion'];
$Fechacita = $datos['fcita'];
$atencion = $datos['atencion'];

/* Files */
$count_image = $datos['count_image'];
$count_pdf = $datos['count_pdf'];
$count_doc = $datos['count_doc']; 

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
        /* #gallery_viewer {
            display: grid !important;
            height: auto !important;
            grid-template: repeat(2, 1fr) / repeat(4, 1fr) !important;
            grid-gap: 0.5em !important;
        } */
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
                                    <h5 class="card-title">Datos de la consulta</h5>
                                    <div style="display: flex;">
                                        <span>Fecha consulta: <?= $fecha_historia ?></span>
                                        <span style="margin-left: auto;">Precio: S/. <?= $precio ?></span>
                                    </div>
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
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label class="">Tratamiento</label>
                                                <textarea class="form-control" rows="3" style="overflow-y: scroll;" readonly><?= $tratamiento ?></textarea>
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
                                                <label class="">Fecha cita creada</label>
                                                <input type="text" class="form-control" value="<?= $fcreacion ?>" readonly>
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
                                    </div>
                                </div>
                            </div>




                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Archivos [Imagen, Word y PDF]</h5>
                                    <h5 class="card-subtitle">Imágenes</h5>
                                    <div class="row" style="margin-bottom: 20px;">
                                        <?php
                                        if ($count_image == 0) {
                                            echo '<style>
                                                #demo-test-gallery {
                                                    display: grid;
                                                    height: auto;
                                                    grid-template: repeat(1, 1fr) / repeat(1, 1fr);
                                                    grid-gap: 0.5em;
                                                }

                                                #demo-test-gallery>a:nth-child(1) {
                                                    grid-column: span 1;
                                                    grid-row: span 1;
                                                }
                                            </style>';
                                        }
                                        if ($count_image > 0 && $count_image <= 4) {
                                            echo '<style>
                                                #demo-test-gallery {
                                                    display: grid;
                                                    height: auto;
                                                    grid-template: auto / repeat(2, 1fr);
                                                    grid-gap: 0.5em;
                                                }

                                                #demo-test-gallery>a:nth-child(1) {
                                                    grid-column: span 1;
                                                    grid-row: span 1;
                                                }

                                                #demo-test-gallery>a:nth-child(2) {
                                                    grid-column: span 1;
                                                    grid-row: span 1;
                                                }

                                                #demo-test-gallery>a:nth-child(3) {
                                                    grid-column: span 1;
                                                    grid-row: span 1;
                                                }

                                                #demo-test-gallery>a:nth-child(4) {
                                                    grid-column: span 1;
                                                    grid-row: span 1;
                                                }

                                                @media (max-width: 800px) {
                                                    #demo-test-gallery {
                                                        grid-template-columns: repeat(1, 1fr);
                                                        grid-template-rows: auto;
                                                    }
                                                }
                                            </style>';
                                        } 
                                        if ($count_image > 4) {
                                            echo '<style>
                                            #demo-test-gallery {
                                                display: grid;
                                                height: auto;
                                                grid-template-columns: repeat(6, 1fr);
                                                grid-template-rows: auto;
                                                grid-gap: 0.5em;
                                            }
                                            
                                            #demo-test-gallery>a:nth-child(7n + 1) {
                                                grid-column: span 2;
                                                grid-row: span 2;
                                            }
                                            
                                            #demo-test-gallery>a:nth-child(2) {
                                                grid-column: span 3;
                                                grid-row: span 3;
                                            }
                                            
                                            #demo-test-gallery>a:nth-child(4) {
                                                grid-column: span 1;
                                                grid-row: span 1;
                                            }
                                            
                                            #demo-test-gallery>a:hover {
                                                opacity: 1;
                                            }
                                            
                                            #demo-test-gallery>a {
                                                overflow: hidden;
                                                position: relative;
                                            }
                                            
                                            #demo-test-gallery a {
                                                display: flex;
                                                justify-content: center;
                                                align-items: center;
                                                text-decoration: none;
                                            }

                                            @media (max-width: 800px) {
                                                #demo-test-gallery {
                                                    grid-template-columns: repeat(1, 1fr);
                                                }
                                                #demo-test-gallery>a:nth-child(7n + 1) {
                                                    grid-column: span 1;
                                                    grid-row: span 1;
                                                }
                                                
                                                #demo-test-gallery>a:nth-child(2) {
                                                    grid-column: span 1;
                                                    grid-row: span 1;
                                                }
                                                
                                                #demo-test-gallery>a:nth-child(4) {
                                                    grid-column: span 1;
                                                    grid-row: span 1;
                                                }
                                            }
                                            
                                            @media (max-width: 800px) and (max-width: 350px) {
                                                #demo-test-gallery>a {
                                                    width: 98%;
                                                }
                                            }
                                            </style>';
                                        }
                                        ?>
                                            <div id="demo-test-gallery" class="demo-gallery" style="margin-left: 15px;margin-right: 15px;<?php if($count_image == 0) {echo'width: 100%;';} ?>">
                                                <?php 
                                                    if ($count_image == 0) {
                                                        echo '<span style="display: flex;border: 1px dashed #7a8295;color: #7a8295;height: 35px;justify-content: center;align-items: center;">No se encontraron imagenes</span>';
                                                    } else {
                                                        $list_images = $this->Get_Files($id, 1);
                                                        while($list=$list_images->fetch()){
                                                            list($width, $height) = getimagesize(ROOT . FOLDER_PATH . '/' . $list["link"]);
                                                            if ($width > 2000) {
                                                                $newwidth = $width * 1.5;
                                                                $newheight = $height * 1.5;
                                                            } else {
                                                                if ($width < 750) {
                                                                    $newwidth = $width * 5;
                                                                    $newheight = $height * 5;
                                                                } else {
                                                                    $newwidth = $width * 3;
                                                                    $newheight = $height * 3;
                                                                }
                                                            }
                                                            
                                                            echo '
                                                                <a href="' . FOLDER_PATH . '/' . $list["link"] . '" data-size="' . $newwidth . 'x' . $newheight . '" data-med="' . FOLDER_PATH . '/' . $list["link"] . '" data-med-size="' . $width . 'x' . $height . '" class="demo-gallery__img--main">
                                                                    <img src="' . FOLDER_PATH . '/' . $list["link"] . '" alt="" style="" />
                                                                    <figure style="display: none;">Nombre del archivo: ' . $list["name_archivo"] . ' | Dimensiones: ' . $width . ' x ' . $height . ' | Tipo: ' . $list["tipo_archivo"] . ' | Tamaño: ' . number_format(($list["ar_size"]/1000), 1) . ' KB</figure>
                                                                </a>
                                                            ';
                                                        }
                                                    }
                                                ?>
                                                

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
                                    <?php 
                                        if ($count_doc == 0) {
                                            echo '<span style="display: flex;border: 1px dashed #7a8295;color: #7a8295;height: 35px;justify-content: center;align-items: center;">No se encontraron documentos Word</span>';
                                        } else {
                                            echo '<div style="border-top: 1px solid #7a8295;"></div>';
                                            $list_doc = $this->Get_Files($id, 4);
                                            while($list=$list_doc->fetch()){
                                                echo '
                                                    <div style="display: flex;border-bottom: 1px solid #7a8295;">
                                                        <span title="Tipo: ' . $list["tipo_archivo"] . ' | Tamaño: ' . number_format(($list["ar_size"]/1000), 1) . ' KB">' . $list["name_archivo"] . '</span>
                                                        <a href="' . FOLDER_PATH . '/' . $list["link"] . '" style="color: #000973; font-weight: bold; margin-left: auto;" download="' . $list["name_archivo"] . '">
                                                            Descargar <i class="fa fa-fw" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                ';
                                            }
                                        }
                                    ?>

                                    <br>

                                    <h5 class="card-subtitle">Documentos PDF</h5>
                                    <?php 
                                        if ($count_pdf == 0) {
                                            echo '<span style="display: flex;border: 1px dashed #7a8295;color: #7a8295;height: 35px;justify-content: center;align-items: center;">No se encontraron documentos PDF</span>';
                                        } else {
                                            echo '<div style="border-top: 1px solid #7a8295;"></div>';
                                            $list_pdf = $this->Get_Files($id, 3);
                                            while($list=$list_pdf->fetch()){
                                                echo '
                                                    <div style="display: flex;border-bottom: 1px solid #7a8295;">
                                                        <span title="Tipo: ' . $list["tipo_archivo"] . ' | Tamaño: ' . number_format(($list["ar_size"]/1000), 1) . ' KB">' . $list["name_archivo"] . '</span>
                                                        <a href="' . FOLDER_PATH . '/' . $list["link"] . '" style="color: #730000; font-weight: bold; margin-left: auto;" download="' . $list["name_archivo"] . '">
                                                            Descargar <i class="fa fa-fw" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                ';
                                            }
                                        }
                                    ?>

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

    <script>
        $(':input[readonly]').css({
            'background-color': '#fff'
        });
        $(window).on("load",function(){
            $('.demo-gallery__img--main').find('img').each(function(){
                var imgClass = (this.width/this.height > 1) ? 'wide' : 'tall';
                $(this).addClass(imgClass);
            })
        })
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
                        }

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