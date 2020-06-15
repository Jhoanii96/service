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
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/main_register.css">

    <style>
        .select2-container--default {
            width: 100% !important;
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
            outline: .0025rem solid #000 !important;
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

</head>

<body>
    <div class="app pl1 newBrand">
        <div class="app-route">
            <div class="checkout-wrapper">
                <div class="ux-overlay-wrapper" style="min-height: 0px;">
                    <div class="checkout-view container">
                        <div class="checkout-box">
                            <div class="checkout-box-col progress-bar">
                                <div>
                                    <ul class="ux-tabs-wiz-list">
                                        <li role="status" aria-live="polite" aria-label="step current" id="first" class="ux-tabs-wiz-step-current">
                                            <a><span class="ux-tabs-wiz-txt">Información personal</span></a></li>
                                        <li role="status" aria-live="polite" aria-label="step incomplete" tabindex="1" class="ux-tabs-wiz-step-incomplete">
                                            <a><span class="ux-tabs-wiz-txt">Registrar usuario</span></a></li>
                                        <li role="status" aria-live="polite" aria-label="step incomplete" id="last" class="ux-tabs-wiz-step-incomplete">
                                            <a><span class="ux-tabs-wiz-txt">Completo</span></a></li>
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
                                    <h2 style="text-align: center;margin-bottom: 20px;">Información personal</h2>
                                    <div class="customer-contact">
                                        <form class="customer-contact-form">
                                            <fieldset class="form-group form-group-phone"><label>Especialidad
                                                    <span class="req">*</span></label>
                                                <div class="form-group">
                                                    <select class="form-control select2" name="" id="">
                                                        <option value="">Pediatra</option>
                                                        <option value="">Psicologo</option>
                                                        <option value="">Medicina general</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                            <div class="ctHidden">
                                                <fieldset class="form-group"><label for="Nombre" id="label-Nombre">Código Medico del Perú (CMP) <span class="req" aria-label="required">*</span></label><input id="Nombre" name="fname" data-valid="true" aria-labelledby="label-Nombre" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                                </fieldset>
                                            </div>
                                            <div class="ctHidden">
                                                <fieldset class="form-group"><label for="Nombre" id="label-Nombre">Nombres <span class="req" aria-label="required">*</span></label><input id="Nombre" name="fname" data-valid="true" aria-labelledby="label-Nombre" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                            </div>
                                            <!-- <div class="name-fields">
                                                <div class="ctHidden">
                                                    <fieldset class="form-group"><label for="Nombre" id="label-Nombre">Código Medico del Perú (CMP) <span class="req" aria-label="required">*</span></label><input id="Nombre" name="fname" data-valid="true" aria-labelledby="label-Nombre" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                                    </fieldset>
                                                </div>
                                            </div> -->
                                            <!-- <div class="name-fields">

                                            </div> -->
                                            <div class="ctHidden">
                                                <fieldset class="form-group"><label for="Nombre" id="label-Nombre">Apellido Paterno <span class="req" aria-label="required">*</span></label><input id="Nombre" name="fname" data-valid="true" aria-labelledby="label-Nombre" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                                <fieldset class="form-group"><label for="Apellido" id="label-Apellido">Apellido Materno <span class="req" aria-label="required">*</span></label><input id="Apellido" name="lname" data-valid="true" aria-labelledby="label-Apellido" aria-required="true" class="ctHidden form-control" value="">
                                                </fieldset>
                                            </div>
                                            <!-- <div class="name-fields">
                                                
                                            </div> -->
                                            <div class="address-form undefined">
                                                <fieldset class="form-group"><label for="address1" id="label-address1">Dirección <span class="req" aria-label="required">*</span></label><input id="address1" name="address1" autocomplete="on" data-valid="true" aria-labelledby="label-address1" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                                <fieldset class="form-group form-group-phone"><label>Género<span class="req">*</span></label>
                                                    <div class="form-group">
                                                        <select class="form-control" name="" id="">
                                                            <option value="">Masculino</option>
                                                            <option value="">Femenino</option>
                                                        </select>
                                                    </div>
                                                </fieldset>
                                                <div class="postal-code-field">
                                                    <fieldset class="form-group"><label for="postalCode" id="label-postalCode">Celular
                                                            <span class="req" aria-label="required">*</span></label><input id="postalCode" type="text" name="postal" data-valid="true" aria-labelledby="label-postalCode" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                                </div>
                                                <div class="state-field ctHidden">
                                                    <fieldset class="form-group"><label for="state" id="label-state">Correo <span class="req" aria-label="required">*</span></label><input id="state" name="state" data-valid="true" aria-labelledby="label-state" aria-required="true" class="form-control" value="">
                                                    </fieldset>
                                                </div>
                                                <div class="city-field">
                                                    <fieldset class="form-group"><label for="city" id="label-city">Fecha Nacimiento <span class="req" aria-label="required">*</span></label><input type="date" id="city" name="city" data-valid="true" aria-labelledby="label-city" aria-required="true" class="ctHidden form-control" value="">
                                                    </fieldset>
                                                </div>
                                                <fieldset class="form-group form-group-phone"><label>Tiempo de atención promedio<span class="req">*</span></label>
                                                    <div class="form-group">
                                                        <select class="form-control select2" name="" id="">
                                                            <option value="">30 minutos</option>
                                                            <option value="">1 hora</option>
                                                        </select>
                                                    </div>
                                                </fieldset>
                                                <div class="city-field">
                                                    <fieldset class="form-group"><label for="city" id="label-city">Precio promedio <span class="req" aria-label="required">*</span></label><input type="text" id="city" name="city" data-valid="true" aria-labelledby="label-city" aria-required="true" class="ctHidden form-control" value="">
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="ux-btn-set ux-btn-split save-cancel-btn-set" style="text-align: right;" role="group">
                                                <button data-eid="gce.cart.checkout.customer-contact-save.click" tabindex="-1" class="btn btn-primary ux-btn-set-item" id="" type="button">Siguiente</button>
                                                <!-- <button data-eid="gce.cart.checkout.customer-contact-save.click" disabled="" tabindex="-1" class="btn btn-primary disabled ux-btn-set-item" id="" type="button">Guardar</button> -->
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

    <script src="<?= FOLDER_PATH ?>/src/js/jquery-3.2.1.min.js"></script>
    <script src="<?= FOLDER_PATH ?>/src/js/select2.full.min.js"></script>

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
    </script>

</body>

</html>