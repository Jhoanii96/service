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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="<?= FOLDER_PATH ?>/src/css/all_fonts.css" rel="stylesheet" media="screen">

    <link href="<?= FOLDER_PATH ?>/src/css/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
      <!-- HEADER -->
      <?php require(ROOT . '/' . PATH_VIEWS . 'panel_superior.php'); ?>
      <!-- PANEL LATERAL DERECHO/CONFIGURACIONES DE DISEÑO -->
      <!--?php require(ROOT . '/' . PATH_VIEWS . 'panel_lateral_der.php'); ?-->

      <div class="app-main">

          <!-- PANEL LATERAL IZQUIERDO -->
          <?php require(ROOT . '/' . PATH_VIEWS . 'panel_lateral_izq.php'); ?>
          
          <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div class="page-title-icon">
                                <i class="pe-7s-home icon-gradient bg-mean-fruit">
                                </i>
                            </div>
                            <div>Reportes
                                <div class="page-title-subheading">
                                    Reporte de ganancias.
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
              <!-- CONTENIDO AYUDA -->
                <div class="main-card mb-3 card">
                    <div class="card-body">
                      <div class="form-group row mt-5">
                        <label for="" class="col-md-2 col-form-label pl-5">Desde :</label>   
                        <div class="col-md-4">
                          <input type="date" name="" class="form-control"  id="report-before">
                        </div>
                        <label label for="" class="col-md-2 col-form-label pl-5">Hasta :</label>
                        <div class="col-md-4">
                          <input type="date" name="" class="form-control"  id="report-after">
                        </div>
                      </div>
                      <div class="row" style="display:flex;align-items:center;justify-content:center; margin-bottom:20px">
                        <button class="btn btn-primary" id="btnConsultar">Consultar Ganancias</button>
                        <button class="btn btn-danger ml-4" id="btnConsultarCantidad">Consultar Cantidad de consultas</button>
                        <button class="btn btn-warning ml-4" id="btnConsultarAmbos">Ambas consultas</button>
                      </div>
                      <!-- <div class="row"> -->
                      <!-- </div> -->
                        <div class="row mb-3" style="display:flex;align-items:center;justify-content:flex-end;" id="contentTotalGanancia">
                            <div class="col-md-3" >
                                <label for="" style="display:none" id="lblGananciaTotal">Ganancia total : </label>
                                <input type="text" class="form-control" id="totalGanancia" style="display:none">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12" style="margin:0 auto">
                                <canvas id="myChart" width="150" height="150" ></canvas>    
                            </div>
                            <div class="col-md-6 col-sm-12" style="margin:0 auto">
                                <canvas id="cantidadChart" width="150" height="150" ></canvas>    
                            </div>
                        </div>
                    </div>
                </div>
              <!-- END CONTENIDO AYUDA -->
            </div>
          </div>
      </div>
    </div>
    
    <!-- MODAL ADD QUESTION -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Pregunta:</label>
                            <input type="text" class="form-control" id="answer">
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnSaveAnswer" >Guardar pregunta</button>
                </div>
            </div>
        </div>
    </div>

    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="<?= FOLDER_PATH ?>/src/js/jquery-3.2.1.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="<?= FOLDER_PATH ?>/src/js/main.d810cf0ae7f39f28f336.js"></script>
    <script src="https://cdnjs.com/libraries/Chart.js"></script>
    <script>
        let cons = document.getElementById("btn-adm_consulta");
        let close = document.getElementById("btn-adm_close");
        if (cons != null) {
            document.getElementById("btn-adm_consulta").addEventListener("click", consulta_admin);
            function consulta_admin() {
                location.href = "<?= FOLDER_PATH ?>/consultation"
            }
        }
        if (close != null) {
            document.getElementById("btn-adm_close").addEventListener("click", close_admin);
            function close_admin() {
                location.href = "<?= FOLDER_PATH ?>/login/salir"
            }
        }

        /** Capturar las fechas de busqueda de ganancias */
        $('#btnConsultar').click(function(e){
            e.preventDefault();
            let dateBefore = $('#report-before').val(); 
            let dateAfter = $('#report-after').val();
            dateBefore = dateBefore + ' 00:00:00';
            dateAfter = dateAfter + ' 23:59:59';

            console.log(dateBefore,dateAfter);
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: '<?= FOLDER_PATH ?>/reports/getReport',
                data: {before:dateBefore,after:dateAfter}
            })
            .done(function(data){

                if (Object.keys(data).length > 0) {
                    // alert(data);
                    let fechas = new Array();
                    let ganancias = new Array();
                    let totalGanancia = 0;
                    /*  Chart JS*/
                    for (let index = 0; index < Object.keys(data).length; index++) {
                        let arrayFecha = data[index].Fecha.split(" ");
                        console.log("array fecha : " + arrayFecha);
                        fechas.push(arrayFecha[0]);
                        ganancias.push(data[index].Monto); 
                        totalGanancia += parseFloat(data[index].Monto);
                    }
                    // console.log(fechas,ganancias);
                    var ctx = document.getElementById('myChart');
                    var mixedChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: fechas,
                            datasets: [{
                                label: 'Ganancias de consultas',
                                data: ganancias ,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)'
                                ],
                                borderWidth: 1
                            },{
                                label: 'Cantidad de consultas',
                                data: ganancias,
                                type: 'line',
                                lineTension: 0,
                                fill: false,
                                borderColor: 'orange',
                                backgroundColor: 'transparent',
                                borderDash: [5, 5],
                                pointBorderColor: 'orange',
                                pointBackgroundColor: 'rgba(255,150,0,0.5)',
                                pointRadius: 5,
                                pointHoverRadius: 10,
                                pointHitRadius: 30,
                                pointBorderWidth: 2,
                                pointStyle: 'rectRounded'
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                    $('#totalGanancia').css('display','block');
                    $('#lblGananciaTotal').css('display','block');
                    $('#totalGanancia').val('S/'+totalGanancia);
                    $('#totalGanancia').attr('disabled','true');
                    console.log(' Ganancia total : '+ totalGanancia);
                }else{
                    alert(data);
                }
            })
            .fail(function(jqXHR,textStatus){
                alert('status: ' + textStatus);
            })

        })

        $('#btnConsultarCantidad').click(function(e){
            e.preventDefault();
            let dateBefore = $('#report-before').val(); 
            let dateAfter = $('#report-after').val();
            dateBefore = dateBefore + ' 00:00:00';
            dateAfter = dateAfter + ' 23:59:59';

            console.log(dateBefore,dateAfter);
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: '<?= FOLDER_PATH ?>/reports/getReport',
                data: {before:dateBefore,after:dateAfter}
            })
            .done(function(data){

                if (Object.keys(data).length > 0) {
                    // alert(data);
                    let fechas = new Array();
                    let cantidad = new Array();
                    let totalGanancia = 0;
                    /*  Chart JS*/
                    for (let index = 0; index < Object.keys(data).length; index++) {
                        let arrayFecha = data[index].Fecha.split(" ");
                        console.log("array fecha : " + arrayFecha);
                        fechas.push(arrayFecha[0]);
                        cantidad.push(data[index].Cantidad); 
                        totalGanancia += parseFloat(data[index].Monto);
                    }
                    // console.log(fechas,ganancias);
                    var ctx = document.getElementById('cantidadChart');
                    var mixedChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: fechas,
                            datasets: [{
                                label: 'Cantidad de consultas',
                                data: cantidad ,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                    $('#totalGanancia').css('display','block');
                    $('#lblGananciaTotal').css('display','block');
                    $('#totalGanancia').val('S/'+totalGanancia);
                    $('#totalGanancia').attr('disabled','true');
                    console.log(' Ganancia total : '+ totalGanancia);
                }else{
                    alert(data);
                }
            })
            .fail(function(jqXHR,textStatus){
                alert('status: ' + textStatus);
            })
        })

        let pulsado = true;
        $('#btnConsultarAmbos').click(function(e){
            e.preventDefault();
            let dateBefore = $('#report-before').val(); 
            let dateAfter = $('#report-after').val();
            dateBefore = dateBefore + ' 00:00:00';
            dateAfter = dateAfter + ' 23:59:59';
            var ctx = document.getElementById('myChart');
            var cantx = document.getElementById('cantidadChart');
            // ctx2d = ctx.getContext('2d');
            // ctx2d.clearRect(0, 0, ctx.width, ctx.height);
            // cantx2d = cantx.getContext('2d');
            // cantx2d.clearRect(0, 0, cantx.width, cantx.height);

            console.log(dateBefore,dateAfter);
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: '<?= FOLDER_PATH ?>/reports/getReport',
                data: {before:dateBefore,after:dateAfter}
            })
            
            .done(function(data){

                if (Object.keys(data).length > 0) {
                    // alert(data);
                    let fechas = new Array();
                    let cantidad = new Array();
                    let ganancias = new Array();
                    let totalGanancia = 0;
                    /*  Chart JS*/
                    for (let index = 0; index < Object.keys(data).length; index++) {
                        let arrayFecha = data[index].Fecha.split(" ");
                        console.log("array fecha : " + arrayFecha);
                        fechas.push(arrayFecha[0]);
                        cantidad.push(data[index].Cantidad);
                        ganancias.push(data[index].Monto); 
                        totalGanancia += parseFloat(data[index].Monto);
                    }
                        var mixedChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: fechas,
                                datasets: [{
                                    label: 'Ganancias de consultas',
                                    data: ganancias ,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                        var cantChart = new Chart(cantx, {
                            type: 'bar',
                            data: {
                                labels: fechas,
                                datasets: [{
                                    label: 'Cantidad de consultas',
                                    data: cantidad ,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                        
                    $('#totalGanancia').css('display','block');
                    $('#lblGananciaTotal').css('display','block');
                    $('#totalGanancia').val('S/'+totalGanancia);
                    $('#totalGanancia').attr('disabled','true');
                    console.log(' Ganancia total : '+ totalGanancia);
                }else{
                    alert(data);
                }
            })
            .fail(function(jqXHR,textStatus){
                alert('status: ' + textStatus);
            })
        })

        function AddChart(ctx,cantx,fechas,ganancias,cantidad){
            var mixedChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: fechas,
                    datasets: [{
                        label: 'Ganancias de consultas',
                        data: ganancias ,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            var cantChart = new Chart(cantx, {
                type: 'bar',
                data: {
                    labels: fechas,
                    datasets: [{
                        label: 'Cantidad de consultas',
                        data: cantidad ,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            let charts = new Array();
            charts.push(mixedChart,cantChart);
            return charts;
        }


        /** Para las notificaciones */

        (function requestNotification(){
                    
            $.ajax({
                url: "<?php echo FOLDER_PATH ?>/my/notifications",
                type: 'get',
                dataType: 'JSON',
                success: function(data){
                    if (Object.keys(data).length > 0) {
                        let content = '';
                        let cantNotification = 0;
                        for (let index = 0; index < Object.keys(data).length; index++) {
                            
                            content += '<div class="vertical-timeline-item dot-success vertical-timeline-element mb-2" ">';
                            content +=    '<div>'
                            content +=        '<span class="vertical-timeline-element-icon bounce-in"></span>';
                            content +=        '<a href="<?= FOLDER_PATH ?>/notifications" class="vertical-timeline-element-content bounce-in row content-row-notification" style="text-decoration:none" onclick="return notificationclick()">';
                            content +=            '<h4 class="timeline-title container-notification" >'+data[index].Titulo;
                            content +=            '</h4>';
                            if(data[index].Leido === '0'){
                            cantNotification++;
                            content +=            '<span class="badge badge-danger ml-2" style="float:right">NEW</span>';
                            }
                            content +=            '<span class="vertical-timeline-element-date"></span>';
                            content +=        '</a>';
                            content +=    '</div>';
                            content += '</div>';
                            console.log(data[index].Titulo , data[index].Descripcion);
                        }
                        $('#notifications-box').html(content);
                        if(cantNotification > 0){
                            $('#cantNotification').html(cantNotification);
                            $('#cantNotification').css('display','block');
                        }else{
                            $('#cantNotification').css('display','none');
                        }
                        $('#cant-notifications').html(cantNotification);
                    }
                    // console.log(status.status)
                    setTimeout(() => {
                        requestNotification();
                    },6000);
                }
                // complete:requestNotification,
                // timeout: 60000
            });
            })();

            function notificationclick(){
                // e.preventDefault();
                $.ajax({
                    type:'post',
                    url:'<?php echo FOLDER_PATH ?>/my/updateStateAllNotifications'
                })
                .done(function(response){
                    console.log(response);
                })
                .fail(function(){
                    console.log('Hubo un error')
                })
            }
    </script>
</body>
</html>