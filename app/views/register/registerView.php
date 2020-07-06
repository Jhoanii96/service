<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>

    <link rel="preload" href="https://img6.wsimg.com/ux/fonts/gd-sage/1.0/gd-sage-bold.woff2" as="font" type="font/woff2" crossorigin="">
    <link rel="preload" href="https://img6.wsimg.com/ux/fonts/sherpa/1.1/gdsherpa-bold.woff2" as="font" type="font/woff2" crossorigin="">
    <link rel="preload" href="https://img6.wsimg.com/ux/fonts/sherpa/1.1/gdsherpa-regular.woff2" as="font" type="font/woff2" crossorigin="">
    <style>
        @font-face {
            font-family: gd-sage;
            src: url(//img6.wsimg.com/ux/fonts/gd-sage/1.0/gd-sage-bold.woff2) format("woff2"), url(//img6.wsimg.com/ux/fonts/gd-sage/1.0/gd-sage-bold.woff) format("woff");
            font-weight: 700;
            font-display: swap;
        }
    </style>


    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= FOLDER_PATH ?>/src/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/main_register.css">
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/selectize.css">
    <style>
        .swal2-title {
            font-weight: normal !important;
            line-height: normal !important;
        }

        .swal2-popup {
            display: none;
            position: relative;
            flex-direction: column;
            justify-content: center;
            width: 320px !important;
            height: 205px !important;
            max-width: 100%;
            padding: 1.25em;
            border-radius: 0 !important;
            background: #fff;
            font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif !important;
            font-weight: 400 !important;
            font-size: 9.5px !important;
            box-sizing: border-box;
        }

        .swal2-icon {
            width: 50px !important;
            height: 50px !important;
            line-height: 50px !important;
        }

        .swal2-icon-text {
            font-size: 28px !important;
        }

        .swal2-confirm {
            border-radius: 0 !important;
        }

        .swal2-icon.swal2-warning {
            border-color: #ad1457 !important;
            color: #ad1457 !important;
        }
    </style>
    <style>
        .select2-container--default {
            /* width: 100% !important; */
        }

        .select2-selection--single {
            display: block;
            height: 2.75rem !important;
            width: 100% !important;
            padding: .375rem .75rem !important;
            font-size: 1rem !important;
            font-family: Arial, Helvetica, sans-serif !important;
            line-height: 1.5rem;
            color: #2b2b2b;
            background-color: #fff;
            background-image: none;
            background-clip: padding-box;
            border: .0625rem solid #d4dbe0 !important;
            vertical-align: middle;
            border-radius: 0 !important;
            box-shadow: none;
            transition: .3s all ease-in-out;
        }

        .select2-selection--single:focus {
            color: #2b2b2b;
            background-color: #fff;
            border: 1px solid #000 !important;
            outline: 0;
        }

        .select2-selection__arrow {
            top: 9px !important;
            width: 30px !important;
        }

        .select2-search__field {
            outline: none;
        }

        .select2-results__option {
            margin-top: 0px;
            margin-bottom: 0px;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>

    <style>
        .steps {
            width: 100%;
            overflow: hidden;
        }

        .steps form {
            display: flex;
        }

        .steps form .page {
            min-width: 100%;
            transition: all 0.3s ease-in-out;
        }

        .steps {
            transition: all 0.3s ease-in-out;
        }
    </style>
    <style>
        .loader {
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            filter: drop-shadow(5px 5px 4px rgba(0, 0, 0, 0.2));
            width: 140px;
            z-index: 10000000000;
        }

        body.time_loader>*:not(#CDModal2):not(#CDLoading) {
            -webkit-filter: blur(3px);
            -moz-filter: blur(3px);
            -ms-filter: blur(3px);
            -o-filter: blur(3px);
            filter: blur(3px);
        }
    </style>

    <style>
        #anchorTitle {
            /* border radius */
            -moz-border-radius: 8px;
            -webkit-border-radius: 8px;
            border-radius: 8px;
            /* box shadow */
            -moz-box-shadow: 2px 2px 3px #e6e6e6;
            -webkit-box-shadow: 2px 2px 3px #e6e6e6;
            box-shadow: 2px 2px 3px #e6e6e6;
            /* other settings */
            background-color: #fff;
            border: solid 3px #d6d6d6;
            color: #333;
            display: none;
            font-family: Helvetica, Arial, sans-serif;
            font-size: 11px;
            line-height: 1.3;
            max-width: 200px;
            padding: 5px 7px;
            position: absolute;
        }

        .btn-style {
            margin-left: 10px;
            background-color: #005fd4;
            color: #fff;
            border-style: none;
            width: 150px;
        }

        .btn-style:hover {
            background-color: #0090d4;
        }

        .hover {
            outline-style: dashed;
            outline-color: blue;
            outline-width: 1px;
        }
    </style>
    <style>
        .r-button-style {
            background-color: #0054d2;
            border-style: none;
            color: white;
            margin-left: 15px;
            font-size: 14px;
            outline-style: dashed;
            outline-width: 1px;
            margin-right: 1px;
            transition: ease-in-out all 0.2s;
        }

        .r-button-style:hover {
            background-color: #0084d2;
        }
    </style>
    <style>
        .select_users {
            font-family: Arial, Helvetica, sans-serif;
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
            height: 16px;
            background: url("<?= FOLDER_PATH ?>/src/assets/media/images/icons/spinner.gif");
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
    </style>

</head>

<!-- <body class="time_loader" style="overflow-y: hidden;"> -->

<body>
    <!-- <div>
        <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1470&q=80" alt="" style="background-position: 0 80%;background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
    </div> -->
<?php 
if (isset($_COOKIE['times'])) {
    $times = $_COOKIE['times'];
} else {
    $times = 0;
}

$registro = 1;
if(isset($times))
{

    if($times == 3)
    {

?>
    <span style="font-family: Arial, Helvetica, sans-serif;">Usted ha superado el número de intentos en generación de códigos, por favor vuelva mañana a intentarlo.</span>
    <br>
    <br>
    <span style="font-family: Arial, Helvetica, sans-serif;">En instantes le reenviaremos a la página principal...</span>
    <script>
        setTimeout(function(){
            location.href = "<?= FOLDER_PATH ?>/login";
        }, 4000);
    </script>

<?php        
    /* sleep(3);
    echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>"); */
        $registro = 0;
    }
    else
    {
        $registro = 1;
    }
}

if ($registro == 1) 
{

?>




    <div class="app pl1 newBrand" style="">
        <div class="app-route" style="padding-top: 20px;">
            <div class="checkout-wrapper">
                <div class="ux-overlay-wrapper" style="min-height: 0px;">
                    <div class="checkout-view container">
                        <div class="checkout-box">
                            <div class="checkout-box-col progress-bar">
                                <div>
                                    <ul class="ux-tabs-wiz-list">
                                        <li role="status" aria-live="polite" aria-label="step current" id="first" class="ux-tabs-wiz-step-current">
                                            <a><span class="ux-tabs-wiz-txt">Información personal</span></a></li>
                                        <li role="status" aria-live="polite" aria-label="step incomplete" id="second" tabindex="1" class="ux-tabs-wiz-step-incomplete">
                                            <a><span class="ux-tabs-wiz-txt">Registrar usuario</span></a></li>
                                        <li role="status" aria-live="polite" aria-label="step incomplete" id="last" class="ux-tabs-wiz-step-incomplete">
                                            <a><span class="ux-tabs-wiz-txt">Completar</span></a></li>
                                        <!-- <li role="status" aria-live="polite" aria-label="step complete" id="first" class="ux-tabs-wiz-step-complete">
                                            <a><span class="ux-tabs-wiz-txt">Información personal</span></a></li>
                                        <li role="status" aria-live="polite" aria-label="step current" tabindex="1" class="ux-tabs-wiz-step-current">
                                            <a><span class="ux-tabs-wiz-txt">Registrar usuario</span></a></li>
                                        <li role="status" aria-live="polite" aria-label="step incomplete" id="last" class="ux-tabs-wiz-step-incomplete">
                                            <a><span class="ux-tabs-wiz-txt">Completo</span></a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-box">
                            <div class="checkout-box-col">
                                <div class="customer-contact-box">
                                    <h2 id="title-text" style="text-align: center;margin-bottom: 20px;">Información personal</h2>
                                    <div class="customer-contact">
                                        <div class="steps">
                                            <form class="customer-contact-form">
                                                <div class="page slidepage page-one">
                                                    <fieldset class="form-group form-group-phone"><label>Especialidad
                                                            <span class="req">*</span></label>
                                                        <div class="form-group">
                                                            <select class="form-control select2" name="esp" id="esp">

                                                                <?php

                                                                while ($DatosEsp = $data['Mostrar_Esp']->fetch()) {

                                                                    echo '<option value="' . $DatosEsp[0] . '">' . $DatosEsp[1] . '</option>';
                                                                }

                                                                ?>
                                                            </select>
                                                        </div>
                                                    </fieldset>
                                                    <div class="name-fields">
                                                        <div class="ctHidden">
                                                            <fieldset class="form-group"><label>País
                                                                    <span class="req">*</span></label>
                                                                <div class="form-group">
                                                                    <select class="form-control" name="pais" id="id_pais" required>
                                                                        <option value="0">Seleccione</option>
                                                                        <?php

                                                                        while ($DatosPais = $data['Mostrar_Pais']->fetch()) {
                                                                            echo '<option value="' . $DatosPais[0] . '">' . $DatosPais[1] . '</option>';
                                                                        }

                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset class="form-group"><label>Departamento
                                                                    <span class="req">*</span></label>
                                                                <div class="form-group">
                                                                    <select class="form-control" name="departamento" id="id_departamento" required>
                                                                        <option value="0">Seleccione</option>
                                                                    </select>
                                                                </div>
                                                            </fieldset>
                                                            <script type="text/javascript">
                                                                <?php
                                                                /* $pro = "";
                                                                $DatosDep = [];
                                                                $DatosPro = [];
                                                                $DatosDep_array = [];
                                                                $DatosPro_array = [];
                                                                while($row = $data['Mostrar_Dep1']->fetch()){
                                                                    $DatosDep_array[] = array(
                                                                        0 => $row[1],
                                                                        1 => $row[3]
                                                                    );
                                                                }
                                                                
                                                                while($row = $data['Mostrar_Pro']->fetch()){
                                                                    $DatosPro_array[] = array(
                                                                        0 => $row[0],
                                                                        1 => $row[3]
                                                                    );
                                                                }

                                                                foreach ($DatosDep_array as $DatosDep) {

                                                                    $dep_pro = 'var dp_' . $DatosDep[1] . ' = new Array("-"';
                                                                    foreach ($DatosPro_array as $DatosPro) {

                                                                        if ($DatosDep[0] == $DatosPro[0]) {

                                                                            $pro .= ', ' . '"' . $DatosPro[1] . '"';
                                                                        }
                                                                    }
                                                                    $dep_pro .= $pro . ');'; 
                                                                    echo $dep_pro . '
                                                                    ';
                                                                } */

                                                                ?>
                                                            </script>
                                                        </div>
                                                    </div>
                                                    <div class="name-fields">
                                                        <div class="ctHidden">
                                                            <fieldset class="form-group"><label>Provincia
                                                                    <span class="req">*</span></label>
                                                                <div class="form-group">
                                                                    <select class="form-control" name="provincia" id="id_provincia">
                                                                        <option value="0">Seleccione</option>
                                                                    </select>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset class="form-group"><label>Distrito
                                                                    <span class="req">*</span></label>
                                                                <div class="form-group">
                                                                    <select class="form-control" name="distrito" id="id_distrito">
                                                                        <option value="0">Seleccione</option>
                                                                    </select>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="ctHidden" style="clear: both;">
                                                        <fieldset class="form-group"><label>Código Medico del Perú (CMP) <span class="req" aria-label="required">*</span></label><input id="cmp" name="cmp" data-valid="true" maxlength="6" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                                        </fieldset>
                                                    </div>
                                                    <div class="ctHidden">
                                                        <fieldset class="form-group"><label>DNI <span class="req" aria-label="required">*</span></label><input id="dni" name="dni" data-valid="true" maxlength="8" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                                    </div>
                                                    <div class="ctHidden">
                                                        <fieldset class="form-group"><label>Nombres <span class="req" aria-label="required">*</span></label><input id="nombre" name="nombre" data-valid="true" maxlength="80" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                                    </div>
                                                    <div class="ctHidden">
                                                        <fieldset class="form-group"><label>Apellido Paterno <span class="req" aria-label="required">*</span></label><input id="apellidop" name="apellidop" data-valid="true" maxlength="50" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                                        <fieldset class="form-group"><label>Apellido Materno <span class="req" aria-label="required">*</span></label><input id="apellidom" name="apellidom" data-valid="true" maxlength="50" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                                    </div>
                                                    <div class="undefined">
                                                        <fieldset class="form-group"><label>Dirección de domicilio <span class="req" aria-label="required">*</span></label><input id="address1" name="address1" maxlength="150" autocomplete="on" data-valid="true" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                                        <fieldset class="form-group"><label>Género<span class="req">*</span></label>
                                                            <div class="form-group">
                                                                <select class="form-control" name="gen" id="gen">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="M">Masculino</option>
                                                                    <option value="F">Femenino</option>
                                                                </select>
                                                            </div>
                                                        </fieldset>

                                                        <fieldset class="form-group">
                                                            <label>Celular
                                                                <span class="req" aria-label="required">*</span>
                                                            </label>
                                                            <input id="cellphone" type="text" name="cellphone" data-valid="true" aria-required="true" maxlength="20" class="ctHidden form-control" value="">
                                                        </fieldset>

                                                        <div class="ctHidden">
                                                            <fieldset class="form-group">
                                                                <label>Fecha Nacimiento
                                                                    <span class="req" aria-label="required">*</span>
                                                                </label>
                                                                <input type="date" id="fn" name="fn" data-valid="true" aria-required="true" class="ctHidden form-control" value="">
                                                            </fieldset>
                                                        </div>
                                                        <div class="ctHidden">
                                                            <fieldset class="form-group">
                                                                <label id="price_half">Precio promedio
                                                                    <span class="req" aria-label="required">*</span>
                                                                    &MediumSpace;<i class="fa fa-question-circle" aria-hidden="true" style="color: #001cb5;"></i>&ThinSpace;
                                                                    <div class="dropbox_dropcontent dropbox_arrow-top">
                                                                        <div class="compSelect_ul">
                                                                            <div class="li" style="line-height: 20px;font-weight: normal;">Ingresar el precio promedio que cobrará por cada consulta</div>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                                <!-- <input type="text" id="price" name="price" data-valid="true" aria-required="true" class="ctHidden form-control" value=""> -->
                                                                <input type="text" id="price" name="price" class="ctHidden form-control" value="" data-inputmask="'alias': 'decimal', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'S/ ', 'placeholder': '0'">
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="ux-btn-set ux-btn-split save-cancel-btn-set" style="text-align: right;margin-bottom: 1px;">
                                                        <button tabindex="-1" class="btn btn-primary ux-btn-set-item" id="nextBtn-1" type="button">Siguiente</button>
                                                        <!-- <button data-eid="gce.cart.checkout.customer-contact-save.click" disabled="" tabindex="-1" class="btn btn-primary disabled ux-btn-set-item" id="" type="button">Guardar</button> -->
                                                    </div>
                                                </div>



                                                <div class="page page-two">
                                                    <div class="ctHidden">
                                                        <fieldset class="form-group"><label>Nombre usuario<span class="req" aria-label="required">*</span></label><input id="username" name="username" maxlength="30" data-valid="true" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                                        </fieldset>
                                                    </div>
                                                    <div class="ctHidden">
                                                        <fieldset class="form-group">
                                                            <label>Contraseña<span class="req" aria-label="required">*</span>
                                                            </label>
                                                            <div class="pull-right">
                                                                <a class="btn btn-tertiary-inline btn-sm" aria-label="form_action_button">
                                                                    <div id="show_pass" class="text-primary-o" tabindex="0" style="outline: none;">Ver</div>
                                                                </a>
                                                            </div>
                                                            <input id="new_password" type="password" name="password" maxlength="30" autocomplete="new-password" data-valid="true" aria-required="true" class="ctHidden form-control" value="">
                                                        </fieldset>
                                                    </div>
                                                    <div class="ctHidden" style="clear: both;">
                                                        <fieldset class="form-group">
                                                            <label id="address_attention">Dirección de consultas
                                                                <span class="req" aria-label="required">*</span>
                                                                &MediumSpace;<i class="fa fa-question-circle" aria-hidden="true" style="color: #001cb5;"></i>&ThinSpace;
                                                                <div class="dropbox_dropcontent dropbox_arrow-top">
                                                                    <div class="compSelect_ul">
                                                                        <div class="li" style="line-height: 20px;font-weight: normal;">Ingrese la dirección donde usted realiza la consulta médica</div>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                            <input id="dconsulta" name="dconsulta" maxlength="150" data-valid="true" aria-required="true" class="ctHidden form-control" value="">
                                                        </fieldset>
                                                    </div>
                                                    <div class="state-field ctHidden">
                                                        <fieldset class="form-group">
                                                            <label id="e_mail">Correo electrónico
                                                                <span class="req" aria-label="required">*</span>
                                                                &MediumSpace;<i class="fa fa-question-circle" aria-hidden="true" style="color: #001cb5;"></i>&ThinSpace;
                                                                <div class="dropbox_dropcontent dropbox_arrow-top">
                                                                    <div class="compSelect_ul">
                                                                        <div class="li" style="line-height: 20px;font-weight: normal;">Ingrese su correo electrónico para enviar un código de verificación.</div>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                            <div style="display: flex;">
                                                                <input id="email" name="email" maxlength="150" data-valid="true" aria-required="true" class="form-control" value="">
                                                                <button type="button" id="send_code" data-name-text="Enviando..." class="r-button-style" style="width: 170px;">Enviar código</button>
                                                            </div>
                                                            <span id="message_code" style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 13px; display: none;">Se ha enviado el código de verificación a su correo, si no ha recibido ninguno porfavor haga clic en <span style="text-decoration: underline;">reenviar código</span></span>
                                                        </fieldset>
                                                    </div>
                                                    <div class="ctHidden">
                                                        <fieldset class="form-group">
                                                            <label id="insert_code">Insertar código
                                                                <span class="req" aria-label="required">*</span>
                                                                &MediumSpace;<i class="fa fa-question-circle" aria-hidden="true" style="color: #001cb5;"></i>&ThinSpace;
                                                                <div class="dropbox_dropcontent dropbox_arrow-top">
                                                                    <div class="compSelect_ul">
                                                                        <div class="li" style="line-height: 20px;font-weight: normal;">En la caja de texto ingrese el código de verificación que le ha llegado a su correo electrónico.</div>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                            <div style="display: flex;">
                                                                <input id="in_code" name="in_code" style="width: 100px;text-transform: uppercase;" maxlength="6" data-valid="true" aria-required="true" class="ctHidden form-control" value="">
                                                                <button type="button" id="check_code" class="r-button-style" data-name-text="Verificando..." style="width: 80px;">Verificar</button>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="ctHidden">
                                                        <fieldset class="form-group">
                                                            <div style="display: flex;">
                                                                <span id="active" data-active="0">ACTIVO:</span>&MediumSpace; <span><i id="active-1" class="fa fa-circle" style="color: #ff0000;" aria-hidden="true"></i></span>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group">
                                                            <div style="display: flex;">
                                                                <span id="factive">FECHA DE ACTIVACIÓN: --/--/---- </span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="ctHidden" style="margin-top: 20px; margin-bottom: 20px;">
                                                        <div class="checkbox">
                                                            <label style="font-weight: normal;">
                                                                <input id="recomended" type="checkbox"> Te ha recomendado algún usuario
                                                            </label>
                                                        </div>
                                                        <fieldset id="select-user" class="form-group form-group-phone" style="margin-top: 5px; display: none;">
                                                            <label style="font-weight: normal;">Seleccione usuario
                                                                <span class="req">*</span>
                                                            </label>
                                                            <div class="form-group">
                                                                <select id="user-search" class="select_users" placeholder="Escriba el usuario..."></select>
                                                            </div>
                                                        </fieldset>

                                                    </div>
                                                    <div style="display: flex;justify-content: flex-end;">
                                                        <div class="ux-btn-set ux-btn-split save-cancel-btn-set" style="text-align: right;" role="group">
                                                            <button data-eid="gce.cart.checkout.customer-contact-save.click" tabindex="-1" class="btn btn-primary ux-btn-set-item" id="prevBtn-2" type="button">Anterior</button>
                                                            <!-- <button data-eid="gce.cart.checkout.customer-contact-save.click" disabled="" tabindex="-1" class="btn btn-primary disabled ux-btn-set-item" id="" type="button">Guardar</button> -->
                                                        </div>
                                                        <div class="ux-btn-set ux-btn-split save-cancel-btn-set" style="text-align: right;" role="group">
                                                            <button data-eid="gce.cart.checkout.customer-contact-save.click" tabindex="-1" class="btn btn-primary ux-btn-set-item" id="nextBtn-2" type="button" style="margin-left: 5px;">Siguiente</button>
                                                            <!-- <button data-eid="gce.cart.checkout.customer-contact-save.click" disabled="" tabindex="-1" class="btn btn-primary disabled ux-btn-set-item" id="" type="button">Guardar</button> -->
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="page page-three">


                                                    <fieldset class="form-group form-group-phone">

                                                        <label>Confirme y acepte los términos de uso e información sobre la recopilación y el uso de información personal.</label>
                                                        <br><br>
                                                        <div style="display: flex;">
                                                            <div>
                                                                <input id="pp" style="margin-top: 3px;" type="checkbox" name="" id="">&MediumSpace; <span style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">He leido y acepto la política de privacidad</span>
                                                            </div>

                                                            <p class="fR">
                                                                <a href="<?= FOLDER_PATH ?>/Popup/Privacy.html" onclick="window.open(this.href, '', 'width=510, height=540'); return false;" class="aBtn">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">Ver detalles</font>
                                                                    </font>
                                                                </a>
                                                            </p>
                                                        </div>
                                                        <br>
                                                        <div style="display: flex;">
                                                            <div>
                                                                <input id="tc" style="margin-top: 3px;" type="checkbox" name="" id="">&MediumSpace; <span style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">He leido y acepto los terminos y condiciones de uso</span>
                                                            </div>

                                                            <p class="fR">
                                                                <a href="<?= FOLDER_PATH ?>/Popup/Service.html" onclick="window.open(this.href, '', 'width=510, height=540'); return false;" class="aBtn">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">Ver detalles</font>
                                                                    </font>
                                                                </a>
                                                            </p>
                                                        </div> <br>

                                                    </fieldset>
                                                    <div style="display: flex;justify-content: flex-end;">
                                                        <div class="ux-btn-set ux-btn-split save-cancel-btn-set" style="text-align: right;" role="group">
                                                            <button class="btn btn-primary ux-btn-set-item" id="prevBtn-3" type="button">Anterior</button>
                                                            <!-- <button data-eid="gce.cart.checkout.customer-contact-save.click" disabled="" tabindex="-1" class="btn btn-primary disabled ux-btn-set-item" id="" type="button">Guardar</button> -->
                                                        </div>
                                                        <div class="ux-btn-set ux-btn-split save-cancel-btn-set" style="text-align: right;" role="group">
                                                            <button class="btn btn-primary ux-btn-set-item" id="Acept" type="button" style="margin-left: 5px;">Guardar y Aceptar</button>
                                                            <!-- <button data-eid="gce.cart.checkout.customer-contact-save.click" disabled="" tabindex="-1" class="btn btn-primary disabled ux-btn-set-item" id="" type="button">Guardar</button> -->
                                                        </div>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="full-height">
        </div>

    </div>

<?php

           
    
} 

?>

    <script src="<?= FOLDER_PATH ?>/src/js/jquery-3.2.1.min.js"></script>
    <script src="<?= FOLDER_PATH ?>/src/js/select2.full.min.js"></script>
    <script src="<?= FOLDER_PATH ?>/src/js/selectize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

    <svg id="CDLoading" class="js-remover" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; display: none;" width="101px" height="101px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
        <!-- <svg id="CDLoading" class="js-remover loader" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; display: block;" width="101px" height="101px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"> -->
        <rect x="14.5" y="30" width="11" height="40" fill="#0051a2">
            <animate attributeName="opacity" dur="1.5873015873015872s" repeatCount="indefinite" calcMode="spline" keyTimes="0;0.5;1" keySplines="0.5 0 0.5 1;0.5 0 0.5 1" values="1;0.2;1" begin="-0.9523809523809523"></animate>
        </rect>
        <rect x="34.5" y="30" width="11" height="40" fill="#1b75be">
            <animate attributeName="opacity" dur="1.5873015873015872s" repeatCount="indefinite" calcMode="spline" keyTimes="0;0.5;1" keySplines="0.5 0 0.5 1;0.5 0 0.5 1" values="1;0.2;1" begin="-0.634920634920635"></animate>
        </rect>
        <rect x="54.5" y="30" width="11" height="40" fill="#408ee0">
            <animate attributeName="opacity" dur="1.5873015873015872s" repeatCount="indefinite" calcMode="spline" keyTimes="0;0.5;1" keySplines="0.5 0 0.5 1;0.5 0 0.5 1" values="1;0.2;1" begin="-0.3174603174603175"></animate>
        </rect>
        <rect x="74.5" y="30" width="11" height="40" fill="#89bff8">
            <animate attributeName="opacity" dur="1.5873015873015872s" repeatCount="indefinite" calcMode="spline" keyTimes="0;0.5;1" keySplines="0.5 0 0.5 1;0.5 0 0.5 1" values="1;0.2;1" begin="-1.5873015873015872"></animate>
        </rect>
    </svg>


    <script>
        $('#Acept').click(function() {
            var pp = document.querySelector("#pp");
            var tc = document.querySelector("#tc");
            if (pp.checked != true) {
                swal("Atención!", "Debe aceptar las políticas de privacidad.", "warning");
                return;
            }
            if (tc.checked != true) {
                swal("Atención!", "Debe aceptar los terminos y condiciones de uso.", "warning");
                return;
            }

            /* Paso 1 */

            var especialidad = $('#esp').children("option:selected").val();
            var pais = $('#id_pais').children("option:selected").val();
            var departamento = $('#id_departamento').children("option:selected").val();
            var provincia = $('#id_provincia').children("option:selected").val();
            var distrito = $('#id_distrito').children("option:selected").val();
            var cmp = $('#cmp').val();
            var dni = $('#dni').val();
            var nombre = $('#nombre').val();
            var apellidop = $('#apellidop').val();
            var apellidom = $('#apellidom').val();
            var address1 = $('#address1').val();
            var gen = $('#gen').children("option:selected").val();
            var cellphone = $('#cellphone').val();
            var fn = $('#fn').val();
            var price = $('#price').val();

            /* Paso 2 */

            var username = $('#username').val();
            var new_password = $('#new_password').val();
            var dconsulta = $('#dconsulta').val();
            var email = $('#email').val();
            var isactive = document.getElementById('active');
            var in_code = isactive.getAttribute('data-active');
            var checkbox = document.querySelector("#recomended");
            if (checkbox.checked) {
                var usersearch = $('#user-search').children("option:selected").val();
            } else {
                var usersearch = -1;
            }
            

            var data = new FormData();

            data.append("especialidad", especialidad);
			data.append("pais", pais);
			data.append("departamento", departamento);
            data.append("provincia", provincia);
            data.append("distrito", distrito);
            data.append("cmp", cmp);
            data.append("dni", dni);
            data.append("nombre", nombre);
            data.append("apellidop", apellidop);
            data.append("apellidom", apellidom);
            data.append("address1", address1);
            data.append("gen", gen);
            data.append("cellphone", cellphone);
            data.append("fn", fn);
            data.append("price", price);

			data.append("username", username);
			data.append("new_password", new_password);
			data.append("dconsulta", dconsulta);
			data.append("email", email);
            data.append("in_code", in_code);
			data.append("usersearch", usersearch);

            $.ajax({
            	beforeSend: function() {
            		$("body").addClass('time_loader');
                    $("body").css('overflow-y', 'hidden');
                    $("#CDLoading").addClass('loader');
                    $("#CDLoading").css('display', 'block');
                    $('#Acept').attr("disabled", true);
                    $('#prevBtn-3').attr("disabled", true);
            	},
            	url: "<?php echo FOLDER_PATH ?>/register/save",
            	type: "POST",
            	data: data,
            	contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            	processData: false, // NEEDED, DON'T OMIT THIS
            	success: function(resp) {
                    var delayInMilliseconds = 3000;
                    $("body").removeClass('time_loader');
					$("body").css('overflow-y','auto');
					$("#CDLoading").removeClass('loader');
					$("#CDLoading").css('display','none');
					swal("¡Información!", resp, "success");
                    setTimeout(function() {
                        window.location.href = "<?= FOLDER_PATH ?>/login";
                    }, delayInMilliseconds);
                    /* Load */
                    /* var delayInMilliseconds = 3000;
                    $("body").addClass('time_loader');
                    $("body").css('overflow-y', 'hidden');
                    $("#CDLoading").addClass('loader');
                    $("#CDLoading").css('display', 'block');
                    $('#Acept').attr("disabled", true);
                    setTimeout(function() {
                        window.location.href = "<?= FOLDER_PATH ?>/login";
                    }, delayInMilliseconds); */
            	}
            })
        });
    </script>

    <script>
        var veces = 1;
        $('#send_code').on('click', function() {
            /* var times = getCookie('times');
            if (times == 3) {
                swal('¡Advertencia!', 'Ha superado el número de intentos permitido, vuelva al dia siguiente a intentarlo.','warning');
                return;
            } else {
                veces = veces + 1;
                setCookie('times',veces,1);
            } */
            
            var email = $('#email').val();
            if (email == "") {
                swal("Atención!", "Debe ingresar un correo electrónico", "warning");
                return;
            }
            if (!validateEmail(email)) {
                swal("Atención!", "Debe ingresar un correo electrónico válido", "warning");
                return;
            }
            var data = new FormData();
            data.append("email", email);
            $.ajax({
                beforeSend: function() {
                    var btnsend = document.getElementById('send_code');
                    var text = btnsend.getAttribute('data-name-text');
                    $("#send_code").html('');
                    $("#send_code").append("" + text + "&ThinSpace;&ThinSpace;<span id='spinner-reg' class='fa fa-spinner fa-spin'></span>");
                    $("#send_code").attr("disabled", true);
                },
                url: "<?php echo FOLDER_PATH ?>/register/send_email",
                type: "POST",
                data: data,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                    swal({
                        text: resp,
                        timer: 3000,
                        icon: "success"
                    })
                },
                success: function(resp) {
                    swal({
                        title: '¡Confirmación!',
                        text: resp,
                        icon: 'success',
                        timer: 3000,
                        buttons: false
                    })
                    $("#spinner-reg").remove();
                    $("#send_code").html('Reenviar');
                    $("#send_code").attr("disabled", false);
                    $("#message_code").css("display", "block");
                }
            })
        });

        $('#check_code').on('click', function() {
            
            var code = $('#in_code').val();
            if (code == "") {
                swal("Atención!", "Debe ingresar el código", "warning");
                return;
            }
            var data = new FormData();
            data.append("code", code);
            $.ajax({
                beforeSend: function() {
                    var btncode = document.getElementById('check_code');
                    var text = btncode.getAttribute('data-name-text');
                    $("#check_code").css("width", "110px");
                    $("#check_code").html(text);
                    $("#check_code").attr("disabled", true);
                },
                url: "<?php echo FOLDER_PATH ?>/register/confirm",
                type: "POST",
                data: data,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                success: function(resp) {
                    if (resp == '1') {
                        swal({
                            title: '¡Confirmación!',
                            text: 'El código ingresado es válido',
                            icon: 'success',
                            timer: 3000,
                            buttons: false
                        })
                        var today = new Date();
                        var date_es = today.getDate()+'/'+(today.getMonth()+1)+'/'+today.getFullYear();
                        var date_in = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                        $("#check_code").attr("disabled", true);
                        $("#active").attr("data-active", "1|"+date_in);
                        $("#active-1").css("color", "#00b300");
                        $("#check_code").css("width", "80px");
                        $("#check_code").html('Verificado');
                        $("#factive").html('FECHA DE ACTIVACIÓN: ' + date_es);
                    }
                    else 
                    {
                        swal('¡Advertencia!','El código ingresado no es válido','warning');
                        $("#check_code").attr("disabled", false);
                        $("#active").attr("data-active", "0");
                        $("#active-1").css("color", "#ff0000");
                        $("#check_code").css("width", "80px");
                        $("#check_code").html('Verificar');
                    }
                }
            })
        });
    </script>

    <script>
        $('#basic-addon1').click(function() {
            var x = document.getElementById("dropdown-country-phone").className;
            if (x === "dropdown ux-select-dropdown ux-tel-container") {
                document.getElementById("dropdown-country-phone").className = "dropdown ux-select-dropdown ux-tel-container open";
            } else {
                document.getElementById("dropdown-country-phone").className = "dropdown ux-select-dropdown ux-tel-container";
            }
        });
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
        $(document).ready(function() {
            $("#price").inputmask('decimal', {
                rightAlign: false
            });
        });
    </script>
    <script>
        const slidePage = document.querySelector(".slidepage");
        const firtNextBtn = document.getElementById("nextBtn-1");
        const secnPrevBtn = document.getElementById("prevBtn-2");
        const secnNextBtn = document.getElementById("nextBtn-2");
        const threPrevBtn = document.getElementById("prevBtn-3");
        firtNextBtn.addEventListener("click", function() {

            var especialidad = $('#esp').children("option:selected").val();
            var pais = $('#id_pais').children("option:selected").val();
            var departamento = $('#id_departamento').children("option:selected").val();
            var provincia = $('#id_provincia').children("option:selected").val();
            var distrito = $('#id_distrito').children("option:selected").val();
            var cmp = $('#cmp').val();
            var dni = $('#dni').val();
            var nombre = $('#nombre').val();
            var apellidop = $('#apellidop').val();
            var apellidom = $('#apellidom').val();
            var address1 = $('#address1').val();
            var gen = $('#gen').children("option:selected").val();
            var cellphone = $('#cellphone').val();
            var fn = $('#fn').val();
            var price = $('#price').val();

            if (especialidad == 0) {
                swal("Atención!", "Debe seleccionar la especialidad en la que pertenece.", "warning");
                return;
            }
            if (pais == 0) {
                swal("Atención!", "Debe seleccionar el país de procedencia.", "warning");
                return;
            }
            if (departamento == 0) {
                swal("Atención!", "Debe seleccionar el departamento de procedencia.", "warning");
                return;
            }
            if (provincia == 0) {
                swal("Atención!", "Debe seleccionar la provincia de procedencia.", "warning");
                return;
            }
            if (distrito == 0) {
                swal("Atención!", "Debe seleccionar el distrito de procedencia.", "warning");
                return;
            }
            if (cmp.length != 6) {
                swal("Atención!", "Debe ingresar los 6 digitos de código médico del Perú.", "warning");
                return;
            }
            if (isNaN(Number(cmp))) {
                swal("Atención!", "Debe ingresar el código médico del Perú válido.", "warning");
                return;
            }
            if (dni.length != 8) {
                swal("Atención!", "Debe ingresar los 8 dígitos de su DNI.", "warning");
                return;
            }
            if (isNaN(Number(dni))) {
                swal("Atención!", "Debe ingresar el DNI válido.", "warning");
                return;
            }
            if (nombre == "") {
                swal("Atención!", "Debe ingresar sus nombres.", "warning");
                return;
            }
            if (apellidop == "") {
                swal("Atención!", "Debe ingresar su apellido paterno.", "warning");
                return;
            }
            if (apellidom == "") {
                swal("Atención!", "Debe ingresar su apellido materno.", "warning");
                return;
            }
            if (address1 == "") {
                swal("Atención!", "Debe ingresar su dirección de domicilio.", "warning");
                return;
            }
            if (gen == "0") {
                swal("Atención!", "Debe seleccionar su genero.", "warning");
                return;
            }
            if (cellphone == "") {
                swal("Atención!", "Debe ingresar su número de celular", "warning");
                return;
            }
            if (fn == "") {
                swal("Atención!", "Debe ingresar su fecha de nacimiento", "warning");
                return;
            }
            if (price == "") {
                swal("Atención!", "Debe ingresar el precio de consulta promedio.", "warning");
                return;
            }

            /* carga de la siguiente página */
            slidePage.style.marginLeft = "-100%";
            var checkbox = document.querySelector("#recomended");
            var ischecked = 600;
            if (checkbox.checked) {
                ischecked = 600 + 70;
            }
            document.querySelector(".steps").style.cssText = "height: " + ischecked + "px;";
            document.getElementById("first").className = "ux-tabs-wiz-step-complete";
            document.getElementById("second").className = "ux-tabs-wiz-step-current";
            document.getElementById("title-text").textContent = "Registrar usuario";
            var body = $("html, body");
            body.stop().animate({
                scrollTop: 0
            }, 300, 'swing');
        });
        secnPrevBtn.addEventListener("click", function() {

            slidePage.style.marginLeft = "0%";
            withsize = window.innerWidth;
            if (withsize < 520) {
                document.querySelector(".steps").style.cssText = "height: 1280px;";
            }
            if (withsize >= 520 && withsize < 768) {
                document.querySelector(".steps").style.cssText = "height: 1110px;";
            }
            if (withsize >= 768 && withsize < 1200) {
                document.querySelector(".steps").style.cssText = "height: 1280px;";
            }
            if (withsize >= 1200) {
                document.querySelector(".steps").style.cssText = "height: 1110px;";
            }

            /* document.querySelector(".steps").style.cssText = "height: 100%;"; */
            document.getElementById("first").className = "ux-tabs-wiz-step-current";
            document.getElementById("second").className = "ux-tabs-wiz-step-incomplete";
            document.getElementById("title-text").textContent = "Información personal";

        });
        secnNextBtn.addEventListener("click", function() {

            var username = $('#username').val();
            var new_password = $('#new_password').val();
            var dconsulta = $('#dconsulta').val();
            var email = $('#email').val();
            var isactive = document.getElementById('active');
            var in_code = isactive.getAttribute('data-active');
            var recomended = document.querySelector("#recomended");
            var usersearch = $('#user-search').children("option:selected").val();
            if (username == "") {
                swal("Atención!", "Debe ingresar un nombre usuario.", "warning");
                return;
            }
            if (/\s/.test(username)) {
                swal("Atención!", "Debe ingresar el nombre de usuario sin espacios", "warning");
                return;
            }
            if (username.length < 10) {
                swal("Atención!", "Debe ingresar el nombre de usuario con al menos 10 caracteres", "warning");
                return;
            }
            if (new_password == "") {
                swal("Atención!", "Debe ingresar una contraseña.", "warning");
                return;
            }
            if (new_password.length < 8) {
                swal("Atención!", "Debe ingresar una contraseña al menos 8 carácteres", "warning");
                return;
            }
            if (dconsulta == "") {
                swal("Atención!", "Debe ingresar la dirección donde realiza la consulta.", "warning");
                return;
            }
            if (email == "") {
                swal("Atención!", "Debe ingresar un correo electrónico", "warning");
                return;
            }
            if (!validateEmail(email)) {
                swal("Atención!", "Debe ingresar un correo electrónico válido", "warning");
                return;
            }
            if (in_code == "0") {
                swal("Atención!", "Debe validar el código.", "warning");
                return;
            }
            if (recomended.checked) {
                if (usersearch == "") {
                    swal("Atención!", "Debe buscar un usuario recomendado.", "warning");
                    return;
                }
            }

            slidePage.style.marginLeft = "-200%";
            withsize = window.innerWidth;
            if (withsize < 520) {
                document.querySelector(".steps").style.cssText = "height: 275px;";
            }
            if (withsize >= 520 && withsize < 768) {
                document.querySelector(".steps").style.cssText = "height: 275px;";
            }
            if (withsize >= 768) {
                document.querySelector(".steps").style.cssText = "height: 225px;";
            }
            /* document.querySelector(".steps").style.cssText = "height: 220px;"; */
            document.querySelector(".full-height").style.cssText = "height: 1000px;";
            document.querySelector("body").style.cssText = "overflow-y: hidden;";
            var body = $("html, body");
            body.stop().animate({
                scrollTop: 0
            }, 300, 'swing');
            document.getElementById("second").className = "ux-tabs-wiz-step-complete";
            document.getElementById("last").className = "ux-tabs-wiz-step-current";
            document.getElementById("title-text").textContent = "Información personal";
            document.getElementById("title-text").textContent = "Términos y condiciones";

        });
        threPrevBtn.addEventListener("click", function() {
            slidePage.style.marginLeft = "-100%";
            var ischecked = 600;
            if (checkbox.checked) {
                ischecked = 600 + 70;
            }
            document.querySelector(".steps").style.cssText = "height: " + ischecked + "px;";
            document.querySelector(".full-height").style.cssText = "height: 200px;";
            document.querySelector("body").style.cssText = "overflow-y: scroll;";
            document.getElementById("second").className = "ux-tabs-wiz-step-current";
            document.getElementById("last").className = "ux-tabs-wiz-step-incomplete";
            document.getElementById("title-text").textContent = "Registrar usuario";
        });

        function validateEmail(e) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(e).toLowerCase());
        }
    </script>
    <script>
        let message_code = document.getElementById("insert_code");
        let message_mail = document.getElementById("e_mail");
        let message_address = document.getElementById("address_attention");
        let message_price = document.getElementById("price_half");

        message_code.addEventListener("mouseover", function(event) {
            message_code.classList.add("hover");
            let setvisible = document.querySelector(".hover>div.dropbox_dropcontent");
            setvisible.style.cssText = "visibility: visible;";
        }, false);

        message_code.addEventListener("mouseout", function(event) {
            let setvisible = document.querySelector(".hover>div.dropbox_dropcontent");
            setvisible.style.cssText = "visibility: hidden;";
            message_code.classList.remove("hover");
        }, false);

        message_mail.addEventListener("mouseover", function(event) {
            message_mail.classList.add("hover");
            let setvisible = document.querySelector(".hover>div.dropbox_dropcontent");
            setvisible.style.cssText = "visibility: visible;";
        }, false);

        message_mail.addEventListener("mouseout", function(event) {
            let setvisible = document.querySelector(".hover>div.dropbox_dropcontent");
            setvisible.style.cssText = "visibility: hidden;";
            message_mail.classList.remove("hover");
        }, false);

        message_address.addEventListener("mouseover", function(event) {
            message_address.classList.add("hover");
            let setvisible = document.querySelector(".hover>div.dropbox_dropcontent");
            setvisible.style.cssText = "visibility: visible;";
        }, false);

        message_address.addEventListener("mouseout", function(event) {
            let setvisible = document.querySelector(".hover>div.dropbox_dropcontent");
            setvisible.style.cssText = "visibility: hidden;";
            message_address.classList.remove("hover");
        }, false);

        message_price.addEventListener("mouseover", function(event) {
            message_price.classList.add("hover");
            let setvisible = document.querySelector(".hover>div.dropbox_dropcontent");
            setvisible.style.cssText = "visibility: visible;";
        }, false);

        message_price.addEventListener("mouseout", function(event) {
            let setvisible = document.querySelector(".hover>div.dropbox_dropcontent");
            setvisible.style.cssText = "visibility: hidden;";
            message_price.classList.remove("hover");
        }, false);
    </script>

    <script>
        var checkbox = document.querySelector("#recomended");

        checkbox.addEventListener('change', function() {
            if (this.checked) {
                $("#select-user").css({
                    'display': 'block',
                    'margin-top': '5px'
                });
                document.querySelector(".steps").style.cssText = "height: 680px;";
            } else {
                $("#select-user").css('display', 'none');
                document.querySelector(".steps").style.cssText = "height: 600px;";
            }
        });
    </script>
    <script>
        $('#id_pais').on('change', function() {
            var id_value = this.value;
            if (id_value == 0) {
                $('#id_departamento').prop('disabled', true);
                $("#id_departamento").prop("selectedIndex", 0);
                $('#id_provincia').prop('disabled', true);
                $("#id_provincia").prop("selectedIndex", 0);
                $('#id_distrito').prop('disabled', true);
                $("#id_distrito").prop("selectedIndex", 0);
            } else {
                $.ajax({
                    beforeSend: function() {
                        $("#id_departamento").prop("disabled", true);
                    },
                    url: "<?php echo FOLDER_PATH ?>/register/pais",
                    type: "POST",
                    data: {
                        id_pais: id_value
                    },
                    success: function(data) {
                        $('#id_departamento').html(data);
                        $("#id_departamento").prop("selectedIndex", 0);
                        $("#id_departamento").attr("disabled", false);
                        $('#id_provincia').prop('disabled', true);
                        $("#id_provincia").prop("selectedIndex", 0);
                        $('#id_distrito').prop('disabled', true);
                        $("#id_distrito").prop("selectedIndex", 0);
                    }
                })
            }
        });
        $('#id_departamento').on('change', function() {
            var id_value = this.value;
            if (id_value == 0) {
                $('#id_provincia').prop('disabled', true);
                $("#id_provincia").prop("selectedIndex", 0);
                $('#id_distrito').prop('disabled', true);
                $("#id_distrito").prop("selectedIndex", 0);
            } else {
                $.ajax({
                    beforeSend: function() {
                        $("#id_provincia").prop("disabled", true);
                    },
                    url: "<?php echo FOLDER_PATH ?>/register/departamento",
                    type: "POST",
                    data: {
                        id_departamento: id_value
                    },
                    success: function(data) {
                        $("#id_provincia").prop("selectedIndex", 0);
                        $('#id_provincia').html(data);
                        $("#id_provincia").attr("disabled", false);
                        $('#id_distrito').prop('disabled', true);
                        $("#id_distrito").prop("selectedIndex", 0);
                    }
                })
            }
        });

        $('#id_provincia').on('change', function() {
            var id_value = this.value;
            if (id_value == 0) {
                $('#id_distrito').prop('disabled', true);
                $("#id_distrito").prop("selectedIndex", 0);
            } else {
                $.ajax({
                    beforeSend: function() {
                        $("#id_distrito").prop("disabled", true);
                    },
                    url: "<?php echo FOLDER_PATH ?>/register/provincia",
                    type: "POST",
                    data: {
                        id_provincia: id_value
                    },
                    success: function(data) {
                        $("#id_distrito").prop("selectedIndex", 0);
                        $('#id_distrito').html(data);
                        $("#id_distrito").attr("disabled", false);
                    }
                })
            }
        });
    </script>
    <script>
        $('#user-search').selectize({
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
                    url: "<?php echo FOLDER_PATH ?>/register/load_users",
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
        $('#show_pass').click(function() {
            var idpass = this.innerText;
            if (idpass == "Ver") {
                document.getElementById('new_password').type = 'text';
                document.getElementById('show_pass').innerText = 'Ocultar';
            } else {
                document.getElementById('new_password').type = 'password';
                document.getElementById('show_pass').innerText = 'Ver';
            }
        });
    </script>
    <script>
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        function eraseCookie(name) {
            document.cookie = name + '=; Max-Age=-99999999;';
        }
    </script>

</body>

</html>