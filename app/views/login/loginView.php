<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="<?= FOLDER_PATH ?>/src/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= FOLDER_PATH ?>/src/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= FOLDER_PATH ?>/src/css/util_login.css">
    <link rel="stylesheet" type="text/css" href="<?= FOLDER_PATH ?>/src/css/main_login.css">
</head>

<body style="background: url(https://image.freepik.com/foto-gratis/mesa-medica-estetoscopio-mascarilla_23-2148519724.jpg) center center / cover no-repeat fixed;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100" style="height: 500px;">
                <div class="login100-pic">
                    <span style="display: block;color: #fff;font-size: 40px;text-align: center;margin-top: 110px;">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    </span>
                    <span style="display: block;text-align: center;color: #fff;line-height: normal;font-size: 16px;">
                        Normandie - Production
                    </span>
                    <span style="display: block;text-align: center;color: #fff;font-size: 20px;">
                        BIENVENIDO A NUESTRO ESPACIO
                    </span>
                    <span style="display: block;text-align: center;color: #fff;margin-top: 120px;">
                        Si no tienes una cuenta,<br>
                        por favor contacte a su administrador
                    </span>
                </div>

                <form id="login-form" class="login100-form validate-form">
                    <span class="login100-form-title">
                        Conexión
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input id="user" class="input100" type="text" name="users" placeholder="Nombre usuario" readonly autocomplete="off" value autocapitalize="off" autocorrect="off" aria-haspopup="false">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input id="pass" class="input100" type="password" name="password" placeholder="Password" readonly autocomplete="off" value autocapitalize="off" autocorrect="off" aria-haspopup="false">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Entrar
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            ¿Olvidaste tu
                        </span>
                        <a class="txt2" href="#">
                            contraseña?
                        </a>
                    </div>

                    <div class="text-center p-t-60">
                        <a class="txt2" href="<?= FOLDER_PATH ?>/register">
                            Crea tu cuenta
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?= FOLDER_PATH ?>/src/js/jquery-3.2.1.min.js"></script>
    <script src="<?= FOLDER_PATH ?>/src/js/popper.js"></script>
    <script src="<?= FOLDER_PATH ?>/src/js/bootstrap.min.js"></script>
    <script src="<?= FOLDER_PATH ?>/src/js/main_login.js"></script>

    <script>
        
        document.getElementById("user").addEventListener("focus", userFunction);
        document.getElementById("pass").addEventListener("focus", passFunction);
        
        function userFunction() {
            if (this.hasAttribute('readonly')) {
                this.removeAttribute('readonly');
                // fix for mobile safari to show virtual keyboard
                this.blur();
                this.focus();
            }

        }

        function passFunction() {
            if (this.hasAttribute('readonly')) {
                this.removeAttribute('readonly');
                // fix for mobile safari to show virtual keyboard
                this.blur();
                this.focus();
            }
        }

        document.getElementById('user').focus();
    </script>

</body>

</html>