<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cuenta expirada</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?= FOLDER_PATH ?>/src/css/expired.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>
        @media (min-width: 500px) {
            svg.svg-debit {
                top: 4px;
                right: 27px;
                width: 50px;
                height: 50px;
            }
        }

        svg.svg-debit {
            top: 5px;
            right: 17px;
            width: 240px;
            height: 240px;
        }

        .svg-debit-card {
            fill: #e5e5e5;
        }

        .svg-debit-data {
            fill: #bbb;
        }

        .svg-debit-sign {
            fill: #fff;
        }

        .svg-debit-read {
            fill: #555;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="container">
        <div class="container">
            <br>
            <p class="text-center" style="font-size: 25px;color: #ea0000;">Su cuenta de la aplicación ha sido expirada, por favor consulte con el administrador y ejecute el pagó para continuar y activar su cuenta </p>
            <hr>

            <div class="row">
                <aside class="col-sm-12">
                    <p align='center'>Metodos de pago</p>

                    <article class="card">
                        <div class="card-body p-5">

                            <ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#nav-tab-cash">
                                        <i class="far fa-money-bill-alt" aria-hidden="true"></i> Cash</a></li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#nav-tab-debit">
                                        <i class="far fa-credit-card"></i> Debit Card</a></li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#nav-tab-card">
                                        <i class="fa fa-credit-card"></i> Credit Card</a></li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#nav-tab-paypal">
                                        <i class="fab fa-paypal"></i> Paypal</a></li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
                                        <i class="fa fa-university"></i> Bank Transfer</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="nav-tab-cash">
                                    <p>¿Cómo pagar?</p>

                                    <p><strong>Nota:</strong> Pago que se realiza personalmente, país y ciudad: Perú/Tacna.</p>
                                    <p>Contáctese con el administrador en los medios:</p>
                                    <ul>
                                        <li>Correo electrónico: <a href="mailto:admin@apclinica.com">admin@apclinica.com</a></li>
                                        <li>Número telefónico: +51 999 265 155</li>
                                    </ul>
                                </div> <!-- tab-pane.// -->
                                <div class="tab-pane fade show" id="nav-tab-debit">
                                    <p>Pago por tarjeta de débito</p>
                                    <div style="display: inline-flex;width: 100%;">
                                        <svg class="svg-debit" viewBox="0 0 32 23" style="margin: auto;">
                                            <path class="svg-debit-card" d="M1.993 0h28c1.104 0 2 .895 2 2v18.999c0 1.104-.896 2.001-2 2.001h-28c-1.104 0-2-.896-2-2.001v-18.999c0-1.105.895-2 2-2z" />
                                            <path class="svg-debit-data" d="M12.993 15v2h16v-2h-16zm0 5h10v-2h-10v2zm-4-5h-4c-1.104 0-2 .896-2 2v1c0 1.104.896 2 2 2h4c1.104 0 2-.896 2-2v-1c0-1.104-.896-2-2-2z" />
                                            <path class="svg-debit-sign" d="M2.993 9h26v3h-26v-3z" />
                                            <path class="svg-debit-read" d="M-.007 3h32v3h-32v-3z" />
                                        </svg>
                                    </div>
                                    <p><strong>Nota:</strong> Método de pago pendiente.</p>
                                </div> <!-- tab-pane.// -->
                                <div class="tab-pane fade" id="nav-tab-card">
                                    <p>Pago por tarjeta de crédito</p>
                                    Se permite las siguientes tarjetas
                                    <div class="paymentWrap">
                                        <div class="btn-group paymentBtnGroup btn-group-justified">
                                            <label class="btn paymentMethod">
                                                <div class="method visa"></div>
                                            </label>
                                            <label class="btn paymentMethod">
                                                <div class="method master-card"></div>
                                            </label>
                                            <label class="btn paymentMethod">
                                                <div class="method amex"></div>
                                            </label>
                                            <label class="btn paymentMethod">
                                                <div class="method dinners"></div>
                                            </label>


                                        </div>
                                    </div>
                                    <p><strong>Nota:</strong> Método de pago pendiente.</p>
                                </div> <!-- tab-pane.// -->
                                <div class="tab-pane fade" id="nav-tab-paypal">
                                    <p>Paypal is easiest way to pay online</p>
                                    <p>
                                        <button type="button" class="btn btn-primary"> <i class="fab fa-paypal"></i> Log in my Paypal </button>
                                    </p>
                                    <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. </p>
                                </div>
                                <div class="tab-pane fade" id="nav-tab-bank">
                                    <p>Bank account details</p>
                                    <dl class="param">
                                        <dt>BANK: </dt>
                                        <dd> THE WORLD BANK</dd>
                                    </dl>
                                    <dl class="param">
                                        <dt>Account number: </dt>
                                        <dd> 12345678912345</dd>
                                    </dl>
                                    <dl class="param">
                                        <dt>IBAN: </dt>
                                        <dd> 123456789</dd>
                                    </dl>
                                    <p><strong>Note:</strong> Después de hacer la transferencia debe de tomar una foto del vaucher y enviarla al correo electrónico: <a href="mailto:admin@apclinica.com">admin@apclinica.com</a> </p>
                                </div> <!-- tab-pane.// -->
                            </div> <!-- tab-content .// -->

                        </div> <!-- card-body.// -->
                    </article> <!-- card.// -->


                </aside> <!-- col.// -->
            </div> <!-- row.// -->

        </div>
        <!--container end.//-->
    </div>
</body>

</html>