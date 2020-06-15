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

</head>

<body class="time_loader" style="overflow-y: hidden;">
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
                                        <li role="status" aria-live="polite" aria-label="step incomplete" id="second" tabindex="1" class="ux-tabs-wiz-step-incomplete">
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
                                    <h2 id="title-text" style="text-align: center;margin-bottom: 20px;">Información personal</h2>
                                    <div class="customer-contact">
                                        <div class="steps" style="height: 1020px;">
                                            <form class="customer-contact-form">
                                                <div class="page slidepage page-one">
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
                                                    <div class="ctHidden">
                                                        <fieldset class="form-group"><label for="Nombre" id="label-Nombre">Apellido Paterno <span class="req" aria-label="required">*</span></label><input id="Nombre" name="fname" data-valid="true" aria-labelledby="label-Nombre" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                                        <fieldset class="form-group"><label for="Apellido" id="label-Apellido">Apellido Materno <span class="req" aria-label="required">*</span></label><input id="Apellido" name="lname" data-valid="true" aria-labelledby="label-Apellido" aria-required="true" class="ctHidden form-control" value="">
                                                        </fieldset>
                                                    </div>
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
                                                            <fieldset class="form-group">
                                                                <label for="city" id="label-city">Precio promedio <span class="req" aria-label="required">*</span></label>
                                                                <input type="text" id="city" name="city" data-valid="true" aria-labelledby="label-city" aria-required="true" class="ctHidden form-control" value="">
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="ux-btn-set ux-btn-split save-cancel-btn-set" style="text-align: right;" role="group">
                                                        <button data-eid="gce.cart.checkout.customer-contact-save.click" tabindex="-1" class="btn btn-primary ux-btn-set-item" id="nextBtn-1" type="button">Siguiente</button>
                                                        <!-- <button data-eid="gce.cart.checkout.customer-contact-save.click" disabled="" tabindex="-1" class="btn btn-primary disabled ux-btn-set-item" id="" type="button">Guardar</button> -->
                                                    </div>
                                                </div>



                                                <div class="page page-two">
                                                    <div class="ctHidden">
                                                        <fieldset class="form-group"><label for="Nombre" id="label-Nombre">Usuario<span class="req" aria-label="required">*</span></label><input id="Nombre" name="fname" data-valid="true" aria-labelledby="label-Nombre" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                                        </fieldset>
                                                    </div>
                                                    <div class="ctHidden">
                                                        <fieldset class="form-group"><label for="Nombre" id="label-Nombre">Contraseña <span class="req" aria-label="required">*</span></label><input id="Nombre" name="fname" data-valid="true" aria-labelledby="label-Nombre" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                                        </fieldset>
                                                    </div>
                                                    <div class="ctHidden">
                                                        <fieldset class="form-group"><label for="Apellido" id="label-Apellido">Confirmar contraseña <span class="req" aria-label="required">*</span></label><input id="Apellido" name="lname" data-valid="true" aria-labelledby="label-Apellido" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                                        </fieldset>
                                                    </div>
                                                    <div class="ctHidden" style="clear: both;">
                                                        <fieldset class="form-group"><label for="Nombre" id="label-Nombre">Dirección de consultas<span class="req" aria-label="required">*</span></label><input id="Nombre" name="fname" data-valid="true" aria-labelledby="label-Nombre" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                                        </fieldset>
                                                    </div>
                                                    <div style="display: flex;justify-content: flex-end;">
                                                        <div class="ux-btn-set ux-btn-split save-cancel-btn-set" style="text-align: right;" role="group">
                                                            <button data-eid="gce.cart.checkout.customer-contact-save.click" tabindex="-1" class="btn btn-primary ux-btn-set-item" id="prevBtn-2" type="button">Anterior</button>
                                                            <!-- <button data-eid="gce.cart.checkout.customer-contact-save.click" disabled="" tabindex="-1" class="btn btn-primary disabled ux-btn-set-item" id="" type="button">Guardar</button> -->
                                                        </div>
                                                        <div class="ux-btn-set ux-btn-split save-cancel-btn-set" style="text-align: right;" role="group">
                                                            <button data-eid="gce.cart.checkout.customer-contact-save.click" tabindex="-1" class="btn btn-primary ux-btn-set-item" id="nextBtn-2" type="button">Siguiente</button>
                                                            <!-- <button data-eid="gce.cart.checkout.customer-contact-save.click" disabled="" tabindex="-1" class="btn btn-primary disabled ux-btn-set-item" id="" type="button">Guardar</button> -->
                                                        </div>
                                                    </div>
                                                </div>





                                                <div class="page page-three">
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
                                                    <div class="ctHidden">
                                                        <fieldset class="form-group"><label for="Nombre" id="label-Nombre">Apellido Paterno <span class="req" aria-label="required">*</span></label><input id="Nombre" name="fname" data-valid="true" aria-labelledby="label-Nombre" aria-required="true" class="ctHidden form-control" value=""></fieldset>
                                                        <fieldset class="form-group"><label for="Apellido" id="label-Apellido">Apellido Materno <span class="req" aria-label="required">*</span></label><input id="Apellido" name="lname" data-valid="true" aria-labelledby="label-Apellido" aria-required="true" class="ctHidden form-control" value="">
                                                        </fieldset>
                                                    </div>
                                                    <div style="display: flex;justify-content: flex-end;">
                                                        <div class="ux-btn-set ux-btn-split save-cancel-btn-set" style="text-align: right;" role="group">
                                                            <button data-eid="gce.cart.checkout.customer-contact-save.click" tabindex="-1" class="btn btn-primary ux-btn-set-item" id="prevBtn-3" type="button">Anterior</button>
                                                            <!-- <button data-eid="gce.cart.checkout.customer-contact-save.click" disabled="" tabindex="-1" class="btn btn-primary disabled ux-btn-set-item" id="" type="button">Guardar</button> -->
                                                        </div>
                                                        <div class="ux-btn-set ux-btn-split save-cancel-btn-set" style="text-align: right;" role="group">
                                                            <button data-eid="gce.cart.checkout.customer-contact-save.click" tabindex="-1" class="btn btn-primary ux-btn-set-item" id="Acept" type="button">Guardar y Aceptar</button>
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
    </div>

    <script src="<?= FOLDER_PATH ?>/src/js/jquery-3.2.1.min.js"></script>
    <script src="<?= FOLDER_PATH ?>/src/js/select2.full.min.js"></script>

    <!-- <svg id="CDLoading" class="js-remover" style="display: none;" xmlns="http://www.w3.org/2000/svg" fill="#d52b1e" viewBox="0 0 250 250"> -->
    <svg id="CDLoading" class="js-remover loader" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; display: block;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
        <rect x="19" y="19" width="20" height="20" fill="#0051a2">
            <animate attributeName="fill" values="#1b75be;#0051a2;#0051a2" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0s" calcMode="discrete"></animate>
        </rect>
        <rect x="40" y="19" width="20" height="20" fill="#0051a2">
            <animate attributeName="fill" values="#1b75be;#0051a2;#0051a2" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.125s" calcMode="discrete"></animate>
        </rect>
        <rect x="61" y="19" width="20" height="20" fill="#0051a2">
            <animate attributeName="fill" values="#1b75be;#0051a2;#0051a2" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.25s" calcMode="discrete"></animate>
        </rect>
        <rect x="19" y="40" width="20" height="20" fill="#0051a2">
            <animate attributeName="fill" values="#1b75be;#0051a2;#0051a2" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.875s" calcMode="discrete"></animate>
        </rect>
        <rect x="61" y="40" width="20" height="20" fill="#0051a2">
            <animate attributeName="fill" values="#1b75be;#0051a2;#0051a2" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.375s" calcMode="discrete"></animate>
        </rect>
        <rect x="19" y="61" width="20" height="20" fill="#0051a2">
            <animate attributeName="fill" values="#1b75be;#0051a2;#0051a2" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.75s" calcMode="discrete"></animate>
        </rect>
        <rect x="40" y="61" width="20" height="20" fill="#0051a2">
            <animate attributeName="fill" values="#1b75be;#0051a2;#0051a2" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.625s" calcMode="discrete"></animate>
        </rect>
        <rect x="61" y="61" width="20" height="20" fill="#0051a2">
            <animate attributeName="fill" values="#1b75be;#0051a2;#0051a2" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.5s" calcMode="discrete"></animate>
        </rect>
    </svg>


    <script>
        /* $("body").addClass('time_loader');
        $("body").css('overflow-y', 'hidden');
        $("#CDLoading").addClass('loader');
        $("#CDLoading").css('display', 'block');
        $('#lmd2').attr("disabled", true); */
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
    </script>
    <script>
        const slidePage = document.querySelector(".slidepage");
        const firtNextBtn = document.getElementById("nextBtn-1");
        const secnPrevBtn = document.getElementById("prevBtn-2");
        const secnNextBtn = document.getElementById("nextBtn-2");
        const threPrevBtn = document.getElementById("prevBtn-3");
        firtNextBtn.addEventListener("click", function() {
            slidePage.style.marginLeft = "-100%";
            document.querySelector(".steps").style.cssText = "height: 370px;";
            document.getElementById("first").className = "ux-tabs-wiz-step-complete";
            document.getElementById("second").className = "ux-tabs-wiz-step-current";
            document.getElementById("title-text").textContent = "Registrar usuario";
        });
        secnPrevBtn.addEventListener("click", function() {
            slidePage.style.marginLeft = "0%";
            document.querySelector(".steps").style.cssText = "height: 1020px;";
            document.getElementById("first").className = "ux-tabs-wiz-step-current";
            document.getElementById("second").className = "ux-tabs-wiz-step-incomplete";
            document.getElementById("title-text").textContent = "Información personal";
        });
        secnNextBtn.addEventListener("click", function() {
            slidePage.style.marginLeft = "-200%";
            document.querySelector(".steps").style.cssText = "height: 455px;";
            document.getElementById("second").className = "ux-tabs-wiz-step-complete";
            document.getElementById("last").className = "ux-tabs-wiz-step-current";
            document.getElementById("title-text").textContent = "Información personal";
            document.getElementById("title-text").textContent = "Completo";
        });
        threPrevBtn.addEventListener("click", function() {
            slidePage.style.marginLeft = "-100%";
            document.querySelector(".steps").style.cssText = "height: 370px;";
            document.getElementById("second").className = "ux-tabs-wiz-step-current";
            document.getElementById("last").className = "ux-tabs-wiz-step-incomplete";
            document.getElementById("title-text").textContent = "Registrar usuario";
        });
    </script>

</body>

</html>