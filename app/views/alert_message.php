<?php

$datos_enabled = $data['Enabled']->fetch();

$fecha_habilitado = $datos_enabled['fecha'] . ' 23:59:59';

$fecha_7daysago = strtotime('-7 day', strtotime($fecha_habilitado));
$fecha_7daysago = date('Y-m-d H:i:s', $fecha_7daysago);
$fecha_4daysago = strtotime('-4 day', strtotime($fecha_habilitado));
$fecha_4daysago = date('Y-m-d H:i:s', $fecha_4daysago);
$fecha_2daysago = strtotime('-2 day', strtotime($fecha_habilitado));
$fecha_2daysago = date('Y-m-d H:i:s', $fecha_2daysago);
$act_msg = 0;
$days = -1;
$color_alert = 'alert-primary';
$blink = '';
if (isset($_COOKIE['alert_active7'])) {
    $alert_active7 = $_COOKIE['alert_active7'];
} else {
    $alert_active7 = 1;
}
if (isset($_COOKIE['alert_active4'])) {
    $alert_active4 = $_COOKIE['alert_active4'];
} else {
    $alert_active4 = 1;
}

if (date('Y-m-d H:i:s') >= $fecha_7daysago && date('Y-m-d H:i:s') <= $fecha_habilitado) {
    $date_ini = new DateTime(date('Y-m-d H:i:s'));
    $date_fin = new DateTime($fecha_habilitado);
    $interval = $date_ini->diff($date_fin);
    $days = 7;
    if (date('Y-m-d H:i:s') >= $fecha_4daysago && date('Y-m-d H:i:s') <= $fecha_habilitado) {
        $iddays = '';
        $days = 4;
        if (date('Y-m-d H:i:s') >= $fecha_2daysago && date('Y-m-d H:i:s') <= $fecha_habilitado) {
            $days = 2;
            $mensage = "Nota: Tu fecha de uso del sistema caducará en " . $interval->d . " dias " . $interval->h . " horas y " . $interval->i . " minutos, cuando caduque usted ya no podrá seguir usando la aplicación";
            $color_alert = 'alert-danger';
            $blink = 'blink';
        } else {
            $mensage = "Nota: Tu fecha de uso del sistema caducará en " . $interval->d . " dias " . $interval->h . " horas y " . $interval->i . " minutos, cuando caduque usted ya no podrá seguir usando la aplicación";
            $color_alert = 'alert-danger';
        }
        $mensage = "Nota: Tu fecha de uso del sistema caducará en " . $interval->d . " dias " . $interval->h . " horas y " . $interval->i . " minutos, cuando caduque usted ya no podrá seguir usando la aplicación";
        $color_alert = 'alert-danger';
    } else {
        $mensage = "Nota: Tu fecha de uso del sistema caducará en " . $interval->d . " dias " . $interval->h . " horas y " . $interval->i . " minutos, cuando caduque usted ya no podrá seguir usando la aplicación";
    }
    $act_msg = 1;
} else {
    if (date('Y-m-d H:i:s') > $fecha_habilitado) {
        echo ("<script>location.href = '" . FOLDER_PATH . "/expired';</script>");
    }
}

if ($act_msg == 1) {

    if ($alert_active7 == "0") {
        $act_msg = 0;
    }
    if ($alert_active4 == "0") {
        $act_msg = 0;
    }

    if ($days == 7 && $alert_active7 == 1) {
        $act_msg = 1;
        echo '
            <div class="alert ' . $color_alert . ' alert-server ' . $blink . '" role="alert" style="z-index: 99999; width: 100%; height: 60px; border-radius: 0; margin-bottom: 0px;position: fixed;">
                <div style="margin: 0;position: relative;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);text-align: center;">
                    <button id="close-alert7" type="button" class="close" data-dismiss="alert" style="line-height: 0.75;">×</button>
                    ' . $mensage . '
                </div>
            </div>
        ';
    }
    if ($days == 4 && $alert_active4 == 1) {
        $act_msg = 1;
        echo '
            <div class="alert ' . $color_alert . ' alert-server ' . $blink . '" role="alert" style="z-index: 99999; width: 100%; height: 60px; border-radius: 0; margin-bottom: 0px;position: fixed;">
                <div style="margin: 0;position: relative;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);text-align: center;">
                    <button id="close-alert4" type="button" class="close" data-dismiss="alert" style="line-height: 0.75;">×</button>
                    ' . $mensage . '
                </div>
            </div>
        ';
    }
    if ($days == 2) {
        $act_msg = 1;
        echo '
            <div class="alert ' . $color_alert . ' alert-server ' . $blink . '" role="alert" style="z-index: 99999; width: 100%; height: 60px; border-radius: 0; margin-bottom: 0px;position: fixed;">
                <div style="margin: 0;position: relative;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);text-align: center;">
                    <button id="close-alert2" type="button" class="close" data-dismiss="alert" style="line-height: 0.75;">×</button>
                    ' . $mensage . '
                </div>
            </div>
        ';
    }
}
