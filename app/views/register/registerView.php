<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>

    <link rel="preload" href="https://img6.wsimg.com/ux/fonts/gd-sage/1.0/gd-sage-bold.woff2" as="font"
        type="font/woff2" crossorigin="">
    <link rel="preload" href="https://img6.wsimg.com/ux/fonts/sherpa/1.1/gdsherpa-bold.woff2" as="font"
        type="font/woff2" crossorigin="">
    <link rel="preload" href="https://img6.wsimg.com/ux/fonts/sherpa/1.1/gdsherpa-regular.woff2" as="font"
        type="font/woff2" crossorigin="">
    <style>
        @font-face {
            font-family: gd-sage;
            src: url(//img6.wsimg.com/ux/fonts/gd-sage/1.0/gd-sage-bold.woff2) format("woff2"), url(//img6.wsimg.com/ux/fonts/gd-sage/1.0/gd-sage-bold.woff) format("woff");
            font-weight: 700;
            font-display: swap;
        }
    </style>
    
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/main_register.css">
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
                                        <li role="status" aria-live="polite" aria-label="step complete" id="first"
                                            class="ux-tabs-wiz-step-complete">
                                            <a><span class="ux-tabs-wiz-txt">Información personal</span></a></li>
                                        <li role="status" aria-live="polite" aria-label="step current" tabindex="1"
                                            class="ux-tabs-wiz-step-current">
                                            <a><span class="ux-tabs-wiz-txt">Registrar usuario</span></a></li>
                                        <li role="status" aria-live="polite" aria-label="step incomplete" id="last"
                                            class="ux-tabs-wiz-step-incomplete"><a><span
                                                    class="ux-tabs-wiz-txt">Completo</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-box">
                            <div class="checkout-box-col">
                                <div class="customer-contact-box">
                                    <h2>Información de facturación</h2>
                                    <div class="customer-contact">
                                        <form class="customer-contact-form">
                                            <div class="name-fields">
                                                <div class="ctHidden">
                                                    <fieldset class="form-group"><label for="Nombre"
                                                            id="label-Nombre">Nombre <span class="req"
                                                                aria-label="required">*</span></label><input id="Nombre"
                                                            name="fname" data-valid="true"
                                                            aria-labelledby="label-Nombre" aria-required="true"
                                                            class="ctHidden form-control" value="Jhon"></fieldset>
                                                    <fieldset class="form-group"><label for="Apellido"
                                                            id="label-Apellido">Apellido <span class="req"
                                                                aria-label="required">*</span></label><input
                                                            id="Apellido" name="lname" data-valid="true"
                                                            aria-labelledby="label-Apellido" aria-required="true"
                                                            class="ctHidden form-control" value="Alvarado Achata">
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <fieldset class="form-group form-group-phone"><label>Teléfono principal
                                                    <span class="req">*</span></label>
                                                    <select class="form-group" name="" id="">
                                                        <option value="">Pediatra</option>
                                                        <option value="">Psicologo</option>
                                                        <option value="">Medicina general</option>
                                                    </select>
                                                <div class="form-group">
                                                    <div class="ux-tel-container"><button tabindex="0"
                                                            class="btn ux-tel-btn" id="basic-addon1" type="button"><span
                                                                class="country-id">PE +51</span><span
                                                                class="uxicon uxicon-chevron-down-lt"></span></button>
                                                        <fieldset class="form-group"><input maxlength="17" id="n"
                                                                type="tel" name="Teléfono principal"
                                                                aria-labelledby="label-n" aria-required="false"
                                                                class="form-control ctHidden ux-tel-input" value="">
                                                        </fieldset>
                                                    </div>

                                                    
                                                    <div id="dropdown-country-phone" class="dropdown ux-select-dropdown ux-tel-container"
                                                        style="top: inherit;">
                                                        
                                                        <ul id="phoneCountryList"
                                                            class="dropdown-menu dropdown-menu-items" role="menu">
                                                            
                                                            <div id="PE" role="presentation"
                                                                class="dropdown-item active"><a role="menuitem"
                                                                    href="#PE"><span
                                                                        class="country-id">PE </span><span
                                                                        class="country-name">Perú </span><span
                                                                        class="dial-code">+51 </span></a></div>
                                                            <div id="AF" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#AF"><span
                                                                        class="country-id">AF </span><span
                                                                        class="country-name">Afganistán </span><span
                                                                        class="dial-code">+93 </span></a></div>
                                                            <div id="AL" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#AL"><span
                                                                        class="country-id">AL </span><span
                                                                        class="country-name">Albania </span><span
                                                                        class="dial-code">+355 </span></a></div>
                                                            <div id="DE" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#DE"><span
                                                                        class="country-id">DE </span><span
                                                                        class="country-name">Alemania </span><span
                                                                        class="dial-code">+49 </span></a></div>
                                                            <div id="AD" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#AD"><span
                                                                        class="country-id">AD </span><span
                                                                        class="country-name">Andorra </span><span
                                                                        class="dial-code">+376 </span></a></div>
                                                            <div id="AO" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#AO"><span
                                                                        class="country-id">AO </span><span
                                                                        class="country-name">Angola </span><span
                                                                        class="dial-code">+244 </span></a></div>
                                                            <div id="AI" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#AI"><span
                                                                        class="country-id">AI </span><span
                                                                        class="country-name">Anguila </span><span
                                                                        class="dial-code">+1 </span></a></div>
                                                            <div id="AQ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#AQ"><span
                                                                        class="country-id">AQ </span><span
                                                                        class="country-name">Antártida </span><span
                                                                        class="dial-code">+672 </span></a></div>
                                                            <div id="AG" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#AG"><span
                                                                        class="country-id">AG </span><span
                                                                        class="country-name">Antigua y Barbuda
                                                                    </span><span class="dial-code">+1 </span></a></div>
                                                            <div id="SA" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#SA"><span
                                                                        class="country-id">SA </span><span
                                                                        class="country-name">Arabia Saudí </span><span
                                                                        class="dial-code">+966 </span></a></div>
                                                            <div id="DZ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#DZ"><span
                                                                        class="country-id">DZ </span><span
                                                                        class="country-name">Argelia </span><span
                                                                        class="dial-code">+213 </span></a></div>
                                                            <div id="AR" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#AR"><span
                                                                        class="country-id">AR </span><span
                                                                        class="country-name">Argentina </span><span
                                                                        class="dial-code">+54 </span></a></div>
                                                            <div id="AM" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#AM"><span
                                                                        class="country-id">AM </span><span
                                                                        class="country-name">Armenia </span><span
                                                                        class="dial-code">+374 </span></a></div>
                                                            <div id="AW" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#AW"><span
                                                                        class="country-id">AW </span><span
                                                                        class="country-name">Aruba </span><span
                                                                        class="dial-code">+297 </span></a></div>
                                                            <div id="AU" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#AU"><span
                                                                        class="country-id">AU </span><span
                                                                        class="country-name">Australia </span><span
                                                                        class="dial-code">+61 </span></a></div>
                                                            <div id="AT" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#AT"><span
                                                                        class="country-id">AT </span><span
                                                                        class="country-name">Austria </span><span
                                                                        class="dial-code">+43 </span></a></div>
                                                            <div id="AZ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#AZ"><span
                                                                        class="country-id">AZ </span><span
                                                                        class="country-name">Azerbaiyán </span><span
                                                                        class="dial-code">+994 </span></a></div>
                                                            <div id="BS" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BS"><span
                                                                        class="country-id">BS </span><span
                                                                        class="country-name">Bahamas </span><span
                                                                        class="dial-code">+1 </span></a></div>
                                                            <div id="BH" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BH"><span
                                                                        class="country-id">BH </span><span
                                                                        class="country-name">Bahrein </span><span
                                                                        class="dial-code">+973 </span></a></div>
                                                            <div id="BD" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BD"><span
                                                                        class="country-id">BD </span><span
                                                                        class="country-name">Bangladesh </span><span
                                                                        class="dial-code">+880 </span></a></div>
                                                            <div id="BB" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BB"><span
                                                                        class="country-id">BB </span><span
                                                                        class="country-name">Barbados </span><span
                                                                        class="dial-code">+1 </span></a></div>
                                                            <div id="BE" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BE"><span
                                                                        class="country-id">BE </span><span
                                                                        class="country-name">Bélgica </span><span
                                                                        class="dial-code">+32 </span></a></div>
                                                            <div id="BZ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BZ"><span
                                                                        class="country-id">BZ </span><span
                                                                        class="country-name">Belice </span><span
                                                                        class="dial-code">+501 </span></a></div>
                                                            <div id="BJ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BJ"><span
                                                                        class="country-id">BJ </span><span
                                                                        class="country-name">Benin </span><span
                                                                        class="dial-code">+229 </span></a></div>
                                                            <div id="BM" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BM"><span
                                                                        class="country-id">BM </span><span
                                                                        class="country-name">Bermudas </span><span
                                                                        class="dial-code">+1 </span></a></div>
                                                            <div id="BY" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BY"><span
                                                                        class="country-id">BY </span><span
                                                                        class="country-name">Bielorrusia </span><span
                                                                        class="dial-code">+375 </span></a></div>
                                                            <div id="BO" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BO"><span
                                                                        class="country-id">BO </span><span
                                                                        class="country-name">Bolivia </span><span
                                                                        class="dial-code">+591 </span></a></div>
                                                            <div id="BQ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BQ"><span
                                                                        class="country-id">BQ </span><span
                                                                        class="country-name">Bonaire, Sint Eustatius y
                                                                        Saba </span><span class="dial-code">+599
                                                                    </span></a></div>
                                                            <div id="BA" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BA"><span
                                                                        class="country-id">BA </span><span
                                                                        class="country-name">Bosnia y Herzegovina
                                                                    </span><span class="dial-code">+387 </span></a>
                                                            </div>
                                                            <div id="BW" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BW"><span
                                                                        class="country-id">BW </span><span
                                                                        class="country-name">Botsuana </span><span
                                                                        class="dial-code">+267 </span></a></div>
                                                            <div id="BR" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BR"><span
                                                                        class="country-id">BR </span><span
                                                                        class="country-name">Brasil </span><span
                                                                        class="dial-code">+55 </span></a></div>
                                                            <div id="BN" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BN"><span
                                                                        class="country-id">BN </span><span
                                                                        class="country-name">Brunei </span><span
                                                                        class="dial-code">+673 </span></a></div>
                                                            <div id="BG" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BG"><span
                                                                        class="country-id">BG </span><span
                                                                        class="country-name">Bulgaria </span><span
                                                                        class="dial-code">+359 </span></a></div>
                                                            <div id="BF" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BF"><span
                                                                        class="country-id">BF </span><span
                                                                        class="country-name">Burkina Faso </span><span
                                                                        class="dial-code">+226 </span></a></div>
                                                            <div id="BI" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BI"><span
                                                                        class="country-id">BI </span><span
                                                                        class="country-name">Burundi </span><span
                                                                        class="dial-code">+257 </span></a></div>
                                                            <div id="BT" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BT"><span
                                                                        class="country-id">BT </span><span
                                                                        class="country-name">Bután </span><span
                                                                        class="dial-code">+975 </span></a></div>
                                                            <div id="CV" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#CV"><span
                                                                        class="country-id">CV </span><span
                                                                        class="country-name">Cabo Verde </span><span
                                                                        class="dial-code">+238 </span></a></div>
                                                            <div id="KH" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#KH"><span
                                                                        class="country-id">KH </span><span
                                                                        class="country-name">Camboya </span><span
                                                                        class="dial-code">+855 </span></a></div>
                                                            <div id="CM" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#CM"><span
                                                                        class="country-id">CM </span><span
                                                                        class="country-name">Camerún </span><span
                                                                        class="dial-code">+237 </span></a></div>
                                                            <div id="CA" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#CA"><span
                                                                        class="country-id">CA </span><span
                                                                        class="country-name">Canadá </span><span
                                                                        class="dial-code">+1 </span></a></div>
                                                            <div id="QA" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#QA"><span
                                                                        class="country-id">QA </span><span
                                                                        class="country-name">Catar </span><span
                                                                        class="dial-code">+974 </span></a></div>
                                                            <div id="TD" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#TD"><span
                                                                        class="country-id">TD </span><span
                                                                        class="country-name">Chad </span><span
                                                                        class="dial-code">+235 </span></a></div>
                                                            <div id="CL" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#CL"><span
                                                                        class="country-id">CL </span><span
                                                                        class="country-name">Chile </span><span
                                                                        class="dial-code">+56 </span></a></div>
                                                            <div id="CN" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#CN"><span
                                                                        class="country-id">CN </span><span
                                                                        class="country-name">China </span><span
                                                                        class="dial-code">+86 </span></a></div>
                                                            <div id="CY" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#CY"><span
                                                                        class="country-id">CY </span><span
                                                                        class="country-name">Chipre </span><span
                                                                        class="dial-code">+357 </span></a></div>
                                                            <div id="VA" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#VA"><span
                                                                        class="country-id">VA </span><span
                                                                        class="country-name">Ciudad del Vaticano
                                                                    </span><span class="dial-code">+39 </span></a></div>
                                                            <div id="CO" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#CO"><span
                                                                        class="country-id">CO </span><span
                                                                        class="country-name">Colombia </span><span
                                                                        class="dial-code">+57 </span></a></div>
                                                            <div id="KM" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#KM"><span
                                                                        class="country-id">KM </span><span
                                                                        class="country-name">Comoras </span><span
                                                                        class="dial-code">+269 </span></a></div>
                                                            <div id="CD" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#CD"><span
                                                                        class="country-id">CD </span><span
                                                                        class="country-name">Congo (República
                                                                        Democrática del Congo) </span><span
                                                                        class="dial-code">+243 </span></a></div>
                                                            <div id="CG" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#CG"><span
                                                                        class="country-id">CG </span><span
                                                                        class="country-name">Congo (República)
                                                                    </span><span class="dial-code">+242 </span></a>
                                                            </div>
                                                            <div id="KR" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#KR"><span
                                                                        class="country-id">KR </span><span
                                                                        class="country-name">Corea del Sur </span><span
                                                                        class="dial-code">+82 </span></a></div>
                                                            <div id="CI" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#CI"><span
                                                                        class="country-id">CI </span><span
                                                                        class="country-name">Costa de Marfil
                                                                    </span><span class="dial-code">+225 </span></a>
                                                            </div>
                                                            <div id="CR" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#CR"><span
                                                                        class="country-id">CR </span><span
                                                                        class="country-name">Costa Rica </span><span
                                                                        class="dial-code">+506 </span></a></div>
                                                            <div id="HR" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#HR"><span
                                                                        class="country-id">HR </span><span
                                                                        class="country-name">Croacia </span><span
                                                                        class="dial-code">+385 </span></a></div>
                                                            <div id="CW" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#CW"><span
                                                                        class="country-id">CW </span><span
                                                                        class="country-name">Curazao </span><span
                                                                        class="dial-code">+599 </span></a></div>
                                                            <div id="DK" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#DK"><span
                                                                        class="country-id">DK </span><span
                                                                        class="country-name">Dinamarca </span><span
                                                                        class="dial-code">+45 </span></a></div>
                                                            <div id="DM" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#DM"><span
                                                                        class="country-id">DM </span><span
                                                                        class="country-name">Dominica </span><span
                                                                        class="dial-code">+1 </span></a></div>
                                                            <div id="EC" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#EC"><span
                                                                        class="country-id">EC </span><span
                                                                        class="country-name">Ecuador </span><span
                                                                        class="dial-code">+593 </span></a></div>
                                                            <div id="EG" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#EG"><span
                                                                        class="country-id">EG </span><span
                                                                        class="country-name">Egipto </span><span
                                                                        class="dial-code">+20 </span></a></div>
                                                            <div id="SV" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#SV"><span
                                                                        class="country-id">SV </span><span
                                                                        class="country-name">El Salvador </span><span
                                                                        class="dial-code">+503 </span></a></div>
                                                            <div id="AE" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#AE"><span
                                                                        class="country-id">AE </span><span
                                                                        class="country-name">Emiratos Árabes Unidos
                                                                    </span><span class="dial-code">+971 </span></a>
                                                            </div>
                                                            <div id="ER" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#ER"><span
                                                                        class="country-id">ER </span><span
                                                                        class="country-name">Eritrea </span><span
                                                                        class="dial-code">+291 </span></a></div>
                                                            <div id="SK" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#SK"><span
                                                                        class="country-id">SK </span><span
                                                                        class="country-name">Eslovaquia </span><span
                                                                        class="dial-code">+421 </span></a></div>
                                                            <div id="SI" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#SI"><span
                                                                        class="country-id">SI </span><span
                                                                        class="country-name">Eslovenia </span><span
                                                                        class="dial-code">+386 </span></a></div>
                                                            <div id="ES" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#ES"><span
                                                                        class="country-id">ES </span><span
                                                                        class="country-name">España </span><span
                                                                        class="dial-code">+34 </span></a></div>
                                                            <div id="US" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#US"><span
                                                                        class="country-id">US </span><span
                                                                        class="country-name">Estados Unidos
                                                                    </span><span class="dial-code">+1 </span></a></div>
                                                            <div id="EE" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#EE"><span
                                                                        class="country-id">EE </span><span
                                                                        class="country-name">Estonia </span><span
                                                                        class="dial-code">+372 </span></a></div>
                                                            <div id="ET" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#ET"><span
                                                                        class="country-id">ET </span><span
                                                                        class="country-name">Etiopía </span><span
                                                                        class="dial-code">+251 </span></a></div>
                                                            <div id="PH" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#PH"><span
                                                                        class="country-id">PH </span><span
                                                                        class="country-name">Filipinas </span><span
                                                                        class="dial-code">+63 </span></a></div>
                                                            <div id="FI" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#FI"><span
                                                                        class="country-id">FI </span><span
                                                                        class="country-name">Finlandia </span><span
                                                                        class="dial-code">+358 </span></a></div>
                                                            <div id="FJ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#FJ"><span
                                                                        class="country-id">FJ </span><span
                                                                        class="country-name">Fiyi </span><span
                                                                        class="dial-code">+679 </span></a></div>
                                                            <div id="FR" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#FR"><span
                                                                        class="country-id">FR </span><span
                                                                        class="country-name">Francia </span><span
                                                                        class="dial-code">+33 </span></a></div>
                                                            <div id="GA" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GA"><span
                                                                        class="country-id">GA </span><span
                                                                        class="country-name">Gabón </span><span
                                                                        class="dial-code">+241 </span></a></div>
                                                            <div id="GM" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GM"><span
                                                                        class="country-id">GM </span><span
                                                                        class="country-name">Gambia </span><span
                                                                        class="dial-code">+220 </span></a></div>
                                                            <div id="GE" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GE"><span
                                                                        class="country-id">GE </span><span
                                                                        class="country-name">Georgia </span><span
                                                                        class="dial-code">+995 </span></a></div>
                                                            <div id="GH" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GH"><span
                                                                        class="country-id">GH </span><span
                                                                        class="country-name">Ghana </span><span
                                                                        class="dial-code">+233 </span></a></div>
                                                            <div id="GI" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GI"><span
                                                                        class="country-id">GI </span><span
                                                                        class="country-name">Gibraltar </span><span
                                                                        class="dial-code">+350 </span></a></div>
                                                            <div id="GD" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GD"><span
                                                                        class="country-id">GD </span><span
                                                                        class="country-name">Granada </span><span
                                                                        class="dial-code">+1 </span></a></div>
                                                            <div id="GR" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GR"><span
                                                                        class="country-id">GR </span><span
                                                                        class="country-name">Grecia </span><span
                                                                        class="dial-code">+30 </span></a></div>
                                                            <div id="GL" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GL"><span
                                                                        class="country-id">GL </span><span
                                                                        class="country-name">Groenlandia </span><span
                                                                        class="dial-code">+299 </span></a></div>
                                                            <div id="GP" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GP"><span
                                                                        class="country-id">GP </span><span
                                                                        class="country-name">Guadalupe </span><span
                                                                        class="dial-code">+590 </span></a></div>
                                                            <div id="GU" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GU"><span
                                                                        class="country-id">GU </span><span
                                                                        class="country-name">Guam </span><span
                                                                        class="dial-code">+1 </span></a></div>
                                                            <div id="GT" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GT"><span
                                                                        class="country-id">GT </span><span
                                                                        class="country-name">Guatemala </span><span
                                                                        class="dial-code">+502 </span></a></div>
                                                            <div id="GF" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GF"><span
                                                                        class="country-id">GF </span><span
                                                                        class="country-name">Guayana Francesa
                                                                    </span><span class="dial-code">+594 </span></a>
                                                            </div>
                                                            <div id="GG" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GG"><span
                                                                        class="country-id">GG </span><span
                                                                        class="country-name">Guernsey </span><span
                                                                        class="dial-code">+44 </span></a></div>
                                                            <div id="GN" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GN"><span
                                                                        class="country-id">GN </span><span
                                                                        class="country-name">Guinea </span><span
                                                                        class="dial-code">+224 </span></a></div>
                                                            <div id="GQ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GQ"><span
                                                                        class="country-id">GQ </span><span
                                                                        class="country-name">Guinea Ecuatorial
                                                                    </span><span class="dial-code">+240 </span></a>
                                                            </div>
                                                            <div id="GW" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GW"><span
                                                                        class="country-id">GW </span><span
                                                                        class="country-name">Guinea-Bissau </span><span
                                                                        class="dial-code">+245 </span></a></div>
                                                            <div id="GY" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GY"><span
                                                                        class="country-id">GY </span><span
                                                                        class="country-name">Guyana </span><span
                                                                        class="dial-code">+592 </span></a></div>
                                                            <div id="HT" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#HT"><span
                                                                        class="country-id">HT </span><span
                                                                        class="country-name">Haití </span><span
                                                                        class="dial-code">+509 </span></a></div>
                                                            <div id="NL" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#NL"><span
                                                                        class="country-id">NL </span><span
                                                                        class="country-name">Holanda </span><span
                                                                        class="dial-code">+31 </span></a></div>
                                                            <div id="HN" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#HN"><span
                                                                        class="country-id">HN </span><span
                                                                        class="country-name">Honduras </span><span
                                                                        class="dial-code">+504 </span></a></div>
                                                            <div id="HK" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#HK"><span
                                                                        class="country-id">HK </span><span
                                                                        class="country-name">Hong Kong </span><span
                                                                        class="dial-code">+852 </span></a></div>
                                                            <div id="HU" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#HU"><span
                                                                        class="country-id">HU </span><span
                                                                        class="country-name">Hungría </span><span
                                                                        class="dial-code">+36 </span></a></div>
                                                            <div id="IN" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#IN"><span
                                                                        class="country-id">IN </span><span
                                                                        class="country-name">India </span><span
                                                                        class="dial-code">+91 </span></a></div>
                                                            <div id="ID" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#ID"><span
                                                                        class="country-id">ID </span><span
                                                                        class="country-name">Indonesia </span><span
                                                                        class="dial-code">+62 </span></a></div>
                                                            <div id="IQ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#IQ"><span
                                                                        class="country-id">IQ </span><span
                                                                        class="country-name">Iraq </span><span
                                                                        class="dial-code">+964 </span></a></div>
                                                            <div id="IE" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#IE"><span
                                                                        class="country-id">IE </span><span
                                                                        class="country-name">Irlanda </span><span
                                                                        class="dial-code">+353 </span></a></div>
                                                            <div id="AC" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#AC"><span
                                                                        class="country-id">AC </span><span
                                                                        class="country-name">Isla Ascensión
                                                                    </span><span class="dial-code">+247 </span></a>
                                                            </div>
                                                            <div id="BV" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#BV"><span
                                                                        class="country-id">BV </span><span
                                                                        class="country-name">Isla Bouvet </span><span
                                                                        class="dial-code">+0 </span></a></div>
                                                            <div id="CX" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#CX"><span
                                                                        class="country-id">CX </span><span
                                                                        class="country-name">Isla Christmas
                                                                    </span><span class="dial-code">+61 </span></a></div>
                                                            <div id="IM" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#IM"><span
                                                                        class="country-id">IM </span><span
                                                                        class="country-name">Isla de Man </span><span
                                                                        class="dial-code">+44 </span></a></div>
                                                            <div id="NF" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#NF"><span
                                                                        class="country-id">NF </span><span
                                                                        class="country-name">Isla Norfolk </span><span
                                                                        class="dial-code">+672 </span></a></div>
                                                            <div id="IS" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#IS"><span
                                                                        class="country-id">IS </span><span
                                                                        class="country-name">Islandia </span><span
                                                                        class="dial-code">+354 </span></a></div>
                                                            <div id="AX" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#AX"><span
                                                                        class="country-id">AX </span><span
                                                                        class="country-name">Islas Åland </span><span
                                                                        class="dial-code">+358 </span></a></div>
                                                            <div id="KY" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#KY"><span
                                                                        class="country-id">KY </span><span
                                                                        class="country-name">Islas Caimán </span><span
                                                                        class="dial-code">+1 </span></a></div>
                                                            <div id="CC" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#CC"><span
                                                                        class="country-id">CC </span><span
                                                                        class="country-name">Islas Cocos (Keeling)
                                                                    </span><span class="dial-code">+61 </span></a></div>
                                                            <div id="CK" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#CK"><span
                                                                        class="country-id">CK </span><span
                                                                        class="country-name">Islas Cook </span><span
                                                                        class="dial-code">+682 </span></a></div>
                                                            <div id="FO" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#FO"><span
                                                                        class="country-id">FO </span><span
                                                                        class="country-name">Islas Feroe </span><span
                                                                        class="dial-code">+298 </span></a></div>
                                                            <div id="GS" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GS"><span
                                                                        class="country-id">GS </span><span
                                                                        class="country-name">Islas Georgia del Sur y
                                                                        Sandwich del Sur </span><span
                                                                        class="dial-code">+248 </span></a></div>
                                                            <div id="HM" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#HM"><span
                                                                        class="country-id">HM </span><span
                                                                        class="country-name">Islas Heard y McDonald
                                                                    </span><span class="dial-code">+0 </span></a></div>
                                                            <div id="FK" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#FK"><span
                                                                        class="country-id">FK </span><span
                                                                        class="country-name">Islas Malvinas
                                                                    </span><span class="dial-code">+500 </span></a>
                                                            </div>
                                                            <div id="MP" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MP"><span
                                                                        class="country-id">MP </span><span
                                                                        class="country-name">Islas Marianas del Norte
                                                                    </span><span class="dial-code">+1 </span></a></div>
                                                            <div id="MH" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MH"><span
                                                                        class="country-id">MH </span><span
                                                                        class="country-name">Islas Marshall
                                                                    </span><span class="dial-code">+692 </span></a>
                                                            </div>
                                                            <div id="UM" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#UM"><span
                                                                        class="country-id">UM </span><span
                                                                        class="country-name">Islas menores alejadas de
                                                                        los EE. UU. </span><span class="dial-code">+1
                                                                    </span></a></div>
                                                            <div id="PN" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#PN"><span
                                                                        class="country-id">PN </span><span
                                                                        class="country-name">Islas Pitcairn
                                                                    </span><span class="dial-code">+872 </span></a>
                                                            </div>
                                                            <div id="SB" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#SB"><span
                                                                        class="country-id">SB </span><span
                                                                        class="country-name">Islas Salomón </span><span
                                                                        class="dial-code">+677 </span></a></div>
                                                            <div id="TC" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#TC"><span
                                                                        class="country-id">TC </span><span
                                                                        class="country-name">Islas Turcas y Caicos
                                                                    </span><span class="dial-code">+1 </span></a></div>
                                                            <div id="VG" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#VG"><span
                                                                        class="country-id">VG </span><span
                                                                        class="country-name">Islas Vírgenes Británicas
                                                                    </span><span class="dial-code">+1 </span></a></div>
                                                            <div id="VI" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#VI"><span
                                                                        class="country-id">VI </span><span
                                                                        class="country-name">Islas Vírgenes de los EE.
                                                                        UU. </span><span class="dial-code">+1
                                                                    </span></a></div>
                                                            <div id="IL" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#IL"><span
                                                                        class="country-id">IL </span><span
                                                                        class="country-name">Israel </span><span
                                                                        class="dial-code">+972 </span></a></div>
                                                            <div id="IT" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#IT"><span
                                                                        class="country-id">IT </span><span
                                                                        class="country-name">Italia </span><span
                                                                        class="dial-code">+39 </span></a></div>
                                                            <div id="JM" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#JM"><span
                                                                        class="country-id">JM </span><span
                                                                        class="country-name">Jamaica </span><span
                                                                        class="dial-code">+1 </span></a></div>
                                                            <div id="JP" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#JP"><span
                                                                        class="country-id">JP </span><span
                                                                        class="country-name">Japón </span><span
                                                                        class="dial-code">+81 </span></a></div>
                                                            <div id="JE" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#JE"><span
                                                                        class="country-id">JE </span><span
                                                                        class="country-name">Jersey </span><span
                                                                        class="dial-code">+44 </span></a></div>
                                                            <div id="JO" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#JO"><span
                                                                        class="country-id">JO </span><span
                                                                        class="country-name">Jordania </span><span
                                                                        class="dial-code">+962 </span></a></div>
                                                            <div id="KZ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#KZ"><span
                                                                        class="country-id">KZ </span><span
                                                                        class="country-name">Kazajistán </span><span
                                                                        class="dial-code">+7 </span></a></div>
                                                            <div id="KE" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#KE"><span
                                                                        class="country-id">KE </span><span
                                                                        class="country-name">Kenia </span><span
                                                                        class="dial-code">+254 </span></a></div>
                                                            <div id="KG" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#KG"><span
                                                                        class="country-id">KG </span><span
                                                                        class="country-name">Kirguistán </span><span
                                                                        class="dial-code">+996 </span></a></div>
                                                            <div id="KI" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#KI"><span
                                                                        class="country-id">KI </span><span
                                                                        class="country-name">Kiribati </span><span
                                                                        class="dial-code">+686 </span></a></div>
                                                            <div id="KV" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#KV"><span
                                                                        class="country-id">KV </span><span
                                                                        class="country-name">Kosovo </span><span
                                                                        class="dial-code">+383 </span></a></div>
                                                            <div id="KW" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#KW"><span
                                                                        class="country-id">KW </span><span
                                                                        class="country-name">Kuwait </span><span
                                                                        class="dial-code">+965 </span></a></div>
                                                            <div id="LA" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#LA"><span
                                                                        class="country-id">LA </span><span
                                                                        class="country-name">Laos </span><span
                                                                        class="dial-code">+856 </span></a></div>
                                                            <div id="LS" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#LS"><span
                                                                        class="country-id">LS </span><span
                                                                        class="country-name">Lesoto </span><span
                                                                        class="dial-code">+266 </span></a></div>
                                                            <div id="LV" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#LV"><span
                                                                        class="country-id">LV </span><span
                                                                        class="country-name">Letonia </span><span
                                                                        class="dial-code">+371 </span></a></div>
                                                            <div id="LB" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#LB"><span
                                                                        class="country-id">LB </span><span
                                                                        class="country-name">Líbano </span><span
                                                                        class="dial-code">+961 </span></a></div>
                                                            <div id="LR" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#LR"><span
                                                                        class="country-id">LR </span><span
                                                                        class="country-name">Liberia </span><span
                                                                        class="dial-code">+231 </span></a></div>
                                                            <div id="LY" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#LY"><span
                                                                        class="country-id">LY </span><span
                                                                        class="country-name">Libia </span><span
                                                                        class="dial-code">+218 </span></a></div>
                                                            <div id="LI" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#LI"><span
                                                                        class="country-id">LI </span><span
                                                                        class="country-name">Liechtenstein </span><span
                                                                        class="dial-code">+423 </span></a></div>
                                                            <div id="LT" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#LT"><span
                                                                        class="country-id">LT </span><span
                                                                        class="country-name">Lituania </span><span
                                                                        class="dial-code">+370 </span></a></div>
                                                            <div id="LU" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#LU"><span
                                                                        class="country-id">LU </span><span
                                                                        class="country-name">Luxemburgo </span><span
                                                                        class="dial-code">+352 </span></a></div>
                                                            <div id="MO" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MO"><span
                                                                        class="country-id">MO </span><span
                                                                        class="country-name">Macao </span><span
                                                                        class="dial-code">+853 </span></a></div>
                                                            <div id="MK" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MK"><span
                                                                        class="country-id">MK </span><span
                                                                        class="country-name">Macedonia </span><span
                                                                        class="dial-code">+389 </span></a></div>
                                                            <div id="MG" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MG"><span
                                                                        class="country-id">MG </span><span
                                                                        class="country-name">Madagascar </span><span
                                                                        class="dial-code">+261 </span></a></div>
                                                            <div id="MY" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MY"><span
                                                                        class="country-id">MY </span><span
                                                                        class="country-name">Malasia </span><span
                                                                        class="dial-code">+60 </span></a></div>
                                                            <div id="MW" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MW"><span
                                                                        class="country-id">MW </span><span
                                                                        class="country-name">Malawi </span><span
                                                                        class="dial-code">+265 </span></a></div>
                                                            <div id="MV" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MV"><span
                                                                        class="country-id">MV </span><span
                                                                        class="country-name">Maldivas </span><span
                                                                        class="dial-code">+960 </span></a></div>
                                                            <div id="ML" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#ML"><span
                                                                        class="country-id">ML </span><span
                                                                        class="country-name">Mali </span><span
                                                                        class="dial-code">+223 </span></a></div>
                                                            <div id="MT" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MT"><span
                                                                        class="country-id">MT </span><span
                                                                        class="country-name">Malta </span><span
                                                                        class="dial-code">+356 </span></a></div>
                                                            <div id="MA" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MA"><span
                                                                        class="country-id">MA </span><span
                                                                        class="country-name">Marruecos </span><span
                                                                        class="dial-code">+212 </span></a></div>
                                                            <div id="MQ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MQ"><span
                                                                        class="country-id">MQ </span><span
                                                                        class="country-name">Martinica </span><span
                                                                        class="dial-code">+596 </span></a></div>
                                                            <div id="MU" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MU"><span
                                                                        class="country-id">MU </span><span
                                                                        class="country-name">Mauricio </span><span
                                                                        class="dial-code">+230 </span></a></div>
                                                            <div id="MR" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MR"><span
                                                                        class="country-id">MR </span><span
                                                                        class="country-name">Mauritania </span><span
                                                                        class="dial-code">+222 </span></a></div>
                                                            <div id="YT" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#YT"><span
                                                                        class="country-id">YT </span><span
                                                                        class="country-name">Mayotte </span><span
                                                                        class="dial-code">+269 </span></a></div>
                                                            <div id="MX" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MX"><span
                                                                        class="country-id">MX </span><span
                                                                        class="country-name">México </span><span
                                                                        class="dial-code">+52 </span></a></div>
                                                            <div id="FM" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#FM"><span
                                                                        class="country-id">FM </span><span
                                                                        class="country-name">Micronesia </span><span
                                                                        class="dial-code">+691 </span></a></div>
                                                            <div id="MD" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MD"><span
                                                                        class="country-id">MD </span><span
                                                                        class="country-name">Moldavia </span><span
                                                                        class="dial-code">+373 </span></a></div>
                                                            <div id="MC" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MC"><span
                                                                        class="country-id">MC </span><span
                                                                        class="country-name">Mónaco </span><span
                                                                        class="dial-code">+377 </span></a></div>
                                                            <div id="MN" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MN"><span
                                                                        class="country-id">MN </span><span
                                                                        class="country-name">Mongolia </span><span
                                                                        class="dial-code">+976 </span></a></div>
                                                            <div id="ME" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#ME"><span
                                                                        class="country-id">ME </span><span
                                                                        class="country-name">Montenegro </span><span
                                                                        class="dial-code">+382 </span></a></div>
                                                            <div id="MS" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MS"><span
                                                                        class="country-id">MS </span><span
                                                                        class="country-name">Montserrat </span><span
                                                                        class="dial-code">+1 </span></a></div>
                                                            <div id="MZ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MZ"><span
                                                                        class="country-id">MZ </span><span
                                                                        class="country-name">Mozambique </span><span
                                                                        class="dial-code">+258 </span></a></div>
                                                            <div id="MM" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#MM"><span
                                                                        class="country-id">MM </span><span
                                                                        class="country-name">Myanmar (Birmania)
                                                                    </span><span class="dial-code">+95 </span></a></div>
                                                            <div id="NA" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#NA"><span
                                                                        class="country-id">NA </span><span
                                                                        class="country-name">Namibia </span><span
                                                                        class="dial-code">+264 </span></a></div>
                                                            <div id="NR" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#NR"><span
                                                                        class="country-id">NR </span><span
                                                                        class="country-name">Nauru </span><span
                                                                        class="dial-code">+674 </span></a></div>
                                                            <div id="NP" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#NP"><span
                                                                        class="country-id">NP </span><span
                                                                        class="country-name">Nepal </span><span
                                                                        class="dial-code">+977 </span></a></div>
                                                            <div id="NI" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#NI"><span
                                                                        class="country-id">NI </span><span
                                                                        class="country-name">Nicaragua </span><span
                                                                        class="dial-code">+505 </span></a></div>
                                                            <div id="NE" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#NE"><span
                                                                        class="country-id">NE </span><span
                                                                        class="country-name">Níger </span><span
                                                                        class="dial-code">+227 </span></a></div>
                                                            <div id="NG" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#NG"><span
                                                                        class="country-id">NG </span><span
                                                                        class="country-name">Nigeria </span><span
                                                                        class="dial-code">+234 </span></a></div>
                                                            <div id="NU" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#NU"><span
                                                                        class="country-id">NU </span><span
                                                                        class="country-name">Niue </span><span
                                                                        class="dial-code">+683 </span></a></div>
                                                            <div id="NO" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#NO"><span
                                                                        class="country-id">NO </span><span
                                                                        class="country-name">Noruega </span><span
                                                                        class="dial-code">+47 </span></a></div>
                                                            <div id="NC" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#NC"><span
                                                                        class="country-id">NC </span><span
                                                                        class="country-name">Nueva Caledonia
                                                                    </span><span class="dial-code">+687 </span></a>
                                                            </div>
                                                            <div id="NZ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#NZ"><span
                                                                        class="country-id">NZ </span><span
                                                                        class="country-name">Nueva Zelanda </span><span
                                                                        class="dial-code">+64 </span></a></div>
                                                            <div id="OM" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#OM"><span
                                                                        class="country-id">OM </span><span
                                                                        class="country-name">Omán </span><span
                                                                        class="dial-code">+968 </span></a></div>
                                                            <div id="PK" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#PK"><span
                                                                        class="country-id">PK </span><span
                                                                        class="country-name">Pakistán </span><span
                                                                        class="dial-code">+92 </span></a></div>
                                                            <div id="PW" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#PW"><span
                                                                        class="country-id">PW </span><span
                                                                        class="country-name">Palau </span><span
                                                                        class="dial-code">+680 </span></a></div>
                                                            <div id="PA" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#PA"><span
                                                                        class="country-id">PA </span><span
                                                                        class="country-name">Panamá </span><span
                                                                        class="dial-code">+507 </span></a></div>
                                                            <div id="PG" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#PG"><span
                                                                        class="country-id">PG </span><span
                                                                        class="country-name">Papúa Nueva Guinea
                                                                    </span><span class="dial-code">+675 </span></a>
                                                            </div>
                                                            <div id="PY" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#PY"><span
                                                                        class="country-id">PY </span><span
                                                                        class="country-name">Paraguay </span><span
                                                                        class="dial-code">+595 </span></a></div>
                                                            <div id="PF" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#PF"><span
                                                                        class="country-id">PF </span><span
                                                                        class="country-name">Polinesia Francesa
                                                                    </span><span class="dial-code">+689 </span></a>
                                                            </div>
                                                            <div id="PL" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#PL"><span
                                                                        class="country-id">PL </span><span
                                                                        class="country-name">Polonia </span><span
                                                                        class="dial-code">+48 </span></a></div>
                                                            <div id="PT" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#PT"><span
                                                                        class="country-id">PT </span><span
                                                                        class="country-name">Portugal </span><span
                                                                        class="dial-code">+351 </span></a></div>
                                                            <div id="PR" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#PR"><span
                                                                        class="country-id">PR </span><span
                                                                        class="country-name">Puerto Rico </span><span
                                                                        class="dial-code">+1 </span></a></div>
                                                            <div id="GB" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#GB"><span
                                                                        class="country-id">GB </span><span
                                                                        class="country-name">Reino Unido </span><span
                                                                        class="dial-code">+44 </span></a></div>
                                                            <div id="CF" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#CF"><span
                                                                        class="country-id">CF </span><span
                                                                        class="country-name">República Centroafricana
                                                                    </span><span class="dial-code">+236 </span></a>
                                                            </div>
                                                            <div id="CZ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#CZ"><span
                                                                        class="country-id">CZ </span><span
                                                                        class="country-name">República Checa
                                                                    </span><span class="dial-code">+420 </span></a>
                                                            </div>
                                                            <div id="DO" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#DO"><span
                                                                        class="country-id">DO </span><span
                                                                        class="country-name">República Dominicana
                                                                    </span><span class="dial-code">+1 </span></a></div>
                                                            <div id="RE" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#RE"><span
                                                                        class="country-id">RE </span><span
                                                                        class="country-name">Reunión </span><span
                                                                        class="dial-code">+262 </span></a></div>
                                                            <div id="RW" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#RW"><span
                                                                        class="country-id">RW </span><span
                                                                        class="country-name">Ruanda </span><span
                                                                        class="dial-code">+250 </span></a></div>
                                                            <div id="RO" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#RO"><span
                                                                        class="country-id">RO </span><span
                                                                        class="country-name">Rumanía </span><span
                                                                        class="dial-code">+40 </span></a></div>
                                                            <div id="RU" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#RU"><span
                                                                        class="country-id">RU </span><span
                                                                        class="country-name">Rusia </span><span
                                                                        class="dial-code">+7 </span></a></div>
                                                            <div id="EH" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#EH"><span
                                                                        class="country-id">EH </span><span
                                                                        class="country-name">Sáhara Occidental
                                                                    </span><span class="dial-code">+685 </span></a>
                                                            </div>
                                                            <div id="WS" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#WS"><span
                                                                        class="country-id">WS </span><span
                                                                        class="country-name">Samoa </span><span
                                                                        class="dial-code">+685 </span></a></div>
                                                            <div id="AS" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#AS"><span
                                                                        class="country-id">AS </span><span
                                                                        class="country-name">Samoa Americana
                                                                    </span><span class="dial-code">+684 </span></a>
                                                            </div>
                                                            <div id="KN" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#KN"><span
                                                                        class="country-id">KN </span><span
                                                                        class="country-name">San Cristóbal y Nieves
                                                                    </span><span class="dial-code">+1 </span></a></div>
                                                            <div id="SM" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#SM"><span
                                                                        class="country-id">SM </span><span
                                                                        class="country-name">San Marino </span><span
                                                                        class="dial-code">+378 </span></a></div>
                                                            <div id="PM" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#PM"><span
                                                                        class="country-id">PM </span><span
                                                                        class="country-name">San Pedro y Miquelón
                                                                    </span><span class="dial-code">+508 </span></a>
                                                            </div>
                                                            <div id="VC" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#VC"><span
                                                                        class="country-id">VC </span><span
                                                                        class="country-name">San Vicente y las
                                                                        Granadinas </span><span class="dial-code">+1
                                                                    </span></a></div>
                                                            <div id="SH" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#SH"><span
                                                                        class="country-id">SH </span><span
                                                                        class="country-name">Santa Elena </span><span
                                                                        class="dial-code">+290 </span></a></div>
                                                            <div id="LC" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#LC"><span
                                                                        class="country-id">LC </span><span
                                                                        class="country-name">Santa Lucía </span><span
                                                                        class="dial-code">+1 </span></a></div>
                                                            <div id="ST" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#ST"><span
                                                                        class="country-id">ST </span><span
                                                                        class="country-name">Santo Tomé y Príncipe
                                                                    </span><span class="dial-code">+239 </span></a>
                                                            </div>
                                                            <div id="SN" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#SN"><span
                                                                        class="country-id">SN </span><span
                                                                        class="country-name">Senegal </span><span
                                                                        class="dial-code">+221 </span></a></div>
                                                            <div id="RS" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#RS"><span
                                                                        class="country-id">RS </span><span
                                                                        class="country-name">Serbia </span><span
                                                                        class="dial-code">+381 </span></a></div>
                                                            <div id="SC" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#SC"><span
                                                                        class="country-id">SC </span><span
                                                                        class="country-name">Seychelles </span><span
                                                                        class="dial-code">+248 </span></a></div>
                                                            <div id="SL" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#SL"><span
                                                                        class="country-id">SL </span><span
                                                                        class="country-name">Sierra Leona </span><span
                                                                        class="dial-code">+232 </span></a></div>
                                                            <div id="SG" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#SG"><span
                                                                        class="country-id">SG </span><span
                                                                        class="country-name">Singapur </span><span
                                                                        class="dial-code">+65 </span></a></div>
                                                            <div id="SX" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#SX"><span
                                                                        class="country-id">SX </span><span
                                                                        class="country-name">Sint Maarten </span><span
                                                                        class="dial-code">+1 </span></a></div>
                                                            <div id="SO" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#SO"><span
                                                                        class="country-id">SO </span><span
                                                                        class="country-name">Somalia </span><span
                                                                        class="dial-code">+252 </span></a></div>
                                                            <div id="LK" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#LK"><span
                                                                        class="country-id">LK </span><span
                                                                        class="country-name">Sri Lanka </span><span
                                                                        class="dial-code">+94 </span></a></div>
                                                            <div id="SZ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#SZ"><span
                                                                        class="country-id">SZ </span><span
                                                                        class="country-name">Suazilandia </span><span
                                                                        class="dial-code">+268 </span></a></div>
                                                            <div id="ZA" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#ZA"><span
                                                                        class="country-id">ZA </span><span
                                                                        class="country-name">Sudáfrica </span><span
                                                                        class="dial-code">+27 </span></a></div>
                                                            <div id="SD" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#SD"><span
                                                                        class="country-id">SD </span><span
                                                                        class="country-name">Sudan </span><span
                                                                        class="dial-code">+249 </span></a></div>
                                                            <div id="SE" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#SE"><span
                                                                        class="country-id">SE </span><span
                                                                        class="country-name">Suecia </span><span
                                                                        class="dial-code">+46 </span></a></div>
                                                            <div id="CH" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#CH"><span
                                                                        class="country-id">CH </span><span
                                                                        class="country-name">Suiza </span><span
                                                                        class="dial-code">+41 </span></a></div>
                                                            <div id="SR" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#SR"><span
                                                                        class="country-id">SR </span><span
                                                                        class="country-name">Surinam </span><span
                                                                        class="dial-code">+597 </span></a></div>
                                                            <div id="SJ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#SJ"><span
                                                                        class="country-id">SJ </span><span
                                                                        class="country-name">Svalbard y Jan Mayen
                                                                    </span><span class="dial-code">+967 </span></a>
                                                            </div>
                                                            <div id="TH" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#TH"><span
                                                                        class="country-id">TH </span><span
                                                                        class="country-name">Tailandia </span><span
                                                                        class="dial-code">+66 </span></a></div>
                                                            <div id="TW" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#TW"><span
                                                                        class="country-id">TW </span><span
                                                                        class="country-name">Taiwán </span><span
                                                                        class="dial-code">+886 </span></a></div>
                                                            <div id="TZ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#TZ"><span
                                                                        class="country-id">TZ </span><span
                                                                        class="country-name">Tanzania </span><span
                                                                        class="dial-code">+255 </span></a></div>
                                                            <div id="TJ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#TJ"><span
                                                                        class="country-id">TJ </span><span
                                                                        class="country-name">Tayikistán </span><span
                                                                        class="dial-code">+7 </span></a></div>
                                                            <div id="IO" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#IO"><span
                                                                        class="country-id">IO </span><span
                                                                        class="country-name">Territorio Británico del
                                                                        Océano Índico </span><span
                                                                        class="dial-code">+809 </span></a></div>
                                                            <div id="TF" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#TF"><span
                                                                        class="country-id">TF </span><span
                                                                        class="country-name">Territorios Australes
                                                                        Franceses </span><span class="dial-code">+33
                                                                    </span></a></div>
                                                            <div id="PS" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#PS"><span
                                                                        class="country-id">PS </span><span
                                                                        class="country-name">Territorios Palestinos
                                                                    </span><span class="dial-code">+63 </span></a></div>
                                                            <div id="TP" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#TP"><span
                                                                        class="country-id">TP </span><span
                                                                        class="country-name">Timor Oriental
                                                                    </span><span class="dial-code">+670 </span></a>
                                                            </div>
                                                            <div id="TL" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#TL"><span
                                                                        class="country-id">TL </span><span
                                                                        class="country-name">Timor Oriental
                                                                    </span><span class="dial-code">+670 </span></a>
                                                            </div>
                                                            <div id="TG" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#TG"><span
                                                                        class="country-id">TG </span><span
                                                                        class="country-name">Togo </span><span
                                                                        class="dial-code">+228 </span></a></div>
                                                            <div id="TK" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#TK"><span
                                                                        class="country-id">TK </span><span
                                                                        class="country-name">Tokelau </span><span
                                                                        class="dial-code">+690 </span></a></div>
                                                            <div id="TO" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#TO"><span
                                                                        class="country-id">TO </span><span
                                                                        class="country-name">Tonga </span><span
                                                                        class="dial-code">+676 </span></a></div>
                                                            <div id="TT" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#TT"><span
                                                                        class="country-id">TT </span><span
                                                                        class="country-name">Trinidad y Tobago
                                                                    </span><span class="dial-code">+1 </span></a></div>
                                                            <div id="TN" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#TN"><span
                                                                        class="country-id">TN </span><span
                                                                        class="country-name">Túnez </span><span
                                                                        class="dial-code">+216 </span></a></div>
                                                            <div id="TM" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#TM"><span
                                                                        class="country-id">TM </span><span
                                                                        class="country-name">Turkmenistán </span><span
                                                                        class="dial-code">+993 </span></a></div>
                                                            <div id="TR" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#TR"><span
                                                                        class="country-id">TR </span><span
                                                                        class="country-name">Turquía </span><span
                                                                        class="dial-code">+90 </span></a></div>
                                                            <div id="TV" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#TV"><span
                                                                        class="country-id">TV </span><span
                                                                        class="country-name">Tuvalu </span><span
                                                                        class="dial-code">+688 </span></a></div>
                                                            <div id="UA" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#UA"><span
                                                                        class="country-id">UA </span><span
                                                                        class="country-name">Ucrania </span><span
                                                                        class="dial-code">+380 </span></a></div>
                                                            <div id="UG" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#UG"><span
                                                                        class="country-id">UG </span><span
                                                                        class="country-name">Uganda </span><span
                                                                        class="dial-code">+256 </span></a></div>
                                                            <div id="UY" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#UY"><span
                                                                        class="country-id">UY </span><span
                                                                        class="country-name">Uruguay </span><span
                                                                        class="dial-code">+598 </span></a></div>
                                                            <div id="UZ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#UZ"><span
                                                                        class="country-id">UZ </span><span
                                                                        class="country-name">Uzbekistán </span><span
                                                                        class="dial-code">+998 </span></a></div>
                                                            <div id="VU" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#VU"><span
                                                                        class="country-id">VU </span><span
                                                                        class="country-name">Vanuatu </span><span
                                                                        class="dial-code">+678 </span></a></div>
                                                            <div id="VE" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#VE"><span
                                                                        class="country-id">VE </span><span
                                                                        class="country-name">Venezuela </span><span
                                                                        class="dial-code">+58 </span></a></div>
                                                            <div id="VN" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#VN"><span
                                                                        class="country-id">VN </span><span
                                                                        class="country-name">Vietnam </span><span
                                                                        class="dial-code">+84 </span></a></div>
                                                            <div id="WF" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#WF"><span
                                                                        class="country-id">WF </span><span
                                                                        class="country-name">Wallis y Futuna
                                                                    </span><span class="dial-code">+681 </span></a>
                                                            </div>
                                                            <div id="YE" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#YE"><span
                                                                        class="country-id">YE </span><span
                                                                        class="country-name">Yemen </span><span
                                                                        class="dial-code">+967 </span></a></div>
                                                            <div id="DJ" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#DJ"><span
                                                                        class="country-id">DJ </span><span
                                                                        class="country-name">Yibuti </span><span
                                                                        class="dial-code">+253 </span></a></div>
                                                            <div id="ZM" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#ZM"><span
                                                                        class="country-id">ZM </span><span
                                                                        class="country-name">Zambia </span><span
                                                                        class="dial-code">+260 </span></a></div>
                                                            <div id="ZW" role="presentation" class="dropdown-item"><a
                                                                    role="menuitem"
                                                                    href="#ZW"><span
                                                                        class="country-id">ZW </span><span
                                                                        class="country-name">Zimbabue </span><span
                                                                        class="dial-code">+263 </span></a></div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="address-form undefined">
                                                <fieldset class="form-group"><label for="address1"
                                                        id="label-address1">Dirección <span class="req"
                                                            aria-label="required">*</span></label><input id="address1"
                                                        name="address1" autocomplete="on" data-valid="true"
                                                        aria-labelledby="label-address1" aria-required="true"
                                                        class="ctHidden form-control" value=""></fieldset><button
                                                    tabindex="0" class="btn btn-link address2" id=""
                                                    type="button">Agrega la línea de dirección</button>
                                                <div class="postal-code-field">
                                                    <fieldset class="form-group"><label for="postalCode"
                                                            id="label-postalCode">Código postal
                                                            <span class="req"
                                                                aria-label="required">*</span></label><input
                                                            id="postalCode" type="text" name="postal" data-valid="true"
                                                            aria-labelledby="label-postalCode" aria-required="true"
                                                            class="ctHidden form-control" value=""></fieldset>
                                                </div>
                                                <div class="state-field ctHidden">
                                                    <fieldset class="form-group"><label for="state"
                                                            id="label-state">Estado <span class="req"
                                                                aria-label="required">*</span></label><input id="state"
                                                            name="state" data-valid="true" aria-labelledby="label-state"
                                                            aria-required="true" class="form-control" value="">
                                                    </fieldset>
                                                </div>
                                                <div class="city-field">
                                                    <fieldset class="form-group"><label for="city"
                                                            id="label-city">Ciudad <span class="req"
                                                                aria-label="required">*</span></label><input id="city"
                                                            name="city" data-valid="true" aria-labelledby="label-city"
                                                            aria-required="true" class="ctHidden form-control" value="">
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="org-tax-fields">
                                                <fieldset class="form-group"><label for="Organizaci:C3-B3n"
                                                        id="label-Organizaci:C3-B3n">Organización </label><input
                                                        maxlength="100" id="Organizaci:C3-B3n" type="text"
                                                        placeholder="" data-valid="true"
                                                        aria-labelledby="label-Organizaci:C3-B3n" aria-required="false"
                                                        class="org-field form-control" value=""></fieldset>
                                                <fieldset class="form-group"><label for="ID-fiscal"
                                                        id="label-ID-fiscal">ID fiscal
                                                    </label><input id="ID-fiscal" type="text" placeholder=""
                                                        data-valid="true" aria-labelledby="label-ID-fiscal"
                                                        aria-required="false" class="tax-field form-control" value="">
                                                </fieldset>
                                            </div>
                                            <div class="ux-btn-set ux-btn-split save-cancel-btn-set" role="group">
                                                <button data-eid="gce.cart.checkout.customer-contact-save.click"
                                                    disabled="" tabindex="-1"
                                                    class="btn btn-primary disabled ux-btn-set-item" id=""
                                                    type="button">Guardar</button></div>
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

    <script>
        $('#basic-addon1').click(function(){
            var x = document.getElementById("dropdown-country-phone").className;
            if (x === "dropdown ux-select-dropdown ux-tel-container") {
                document.getElementById("dropdown-country-phone").className = "dropdown ux-select-dropdown ux-tel-container open";
            } else {
                document.getElementById("dropdown-country-phone").className = "dropdown ux-select-dropdown ux-tel-container";
            }
        });
    </script>
    
</body>

</html>