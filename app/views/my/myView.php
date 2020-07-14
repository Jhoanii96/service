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
    <?php require(ROOT . '/' . PATH_VIEWS . 'fonts.php'); ?>

    <link href="<?= FOLDER_PATH ?>/src/css/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <?php 
            $profile = $this->showProfile();
            $this->session->add('Nombres', $profile['Nombres']);
            $this->session->add('especialidad', $profile['especialidad']);
        ?>

        <!-- HEADER -->
        <?php require(ROOT . '/' . PATH_VIEWS . 'panel_superior.php'); ?>

        <!-- PANEL LATERAL DERECHO/CONFIGURACIONES DE DISEÑO -->
        <?php require(ROOT . '/' . PATH_VIEWS . 'panel_lateral_der.php'); ?>

        <div class="app-main">

            <!-- PANEL LATERAL IZQUIERDO -->
            <!--?php require(ROOT . '/' . PATH_VIEWS . 'panel_lateral_izq.php'); ?-->
            
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <?php                                           
                        $state = $this->stateProfile();
                        if($state[0] == 1){
                            // $this->updateStateProfile();
                    ?>
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-home icon-gradient bg-mean-fruit">
                                    </i>
                                </div>
                                <div>Actualizando datos
                                    <div class="page-title-subheading">Mi información
                                    </div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow btn btn-dark">
                                    <i class="fa fa-star"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- FORMS WIZARD -->
                    <div class="col-md-12 col-lg-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <div id="smartwizard2" class="forms-wizard-alt sw-main sw-theme-default">
                                    <ul class="forms-wizard nav nav-tabs step-anchor">
                                        <li>
                                            <a href="#step-1" class="nav-link">
                                                <em>1</em><span>Datos perfil</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#step-2" class="nav-link">
                                                <em>2</em><span>Cuestionario</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="form-wizard-content sw-container tab-content">
                                        <div id="step-1" class="tab-pane step-content">
                                            <!-- <h5 class="title" style="margin-bottom: 30px;">MI PERFIL</h5> -->
                                            <form>
                                                <div class="form-row mb-2">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label>Nombre</label>
                                                            <input name="nombre" id="nombre"  type="text" value="<?php echo $profile['Nombres']; ?>" class="form-control" required/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label>Apellido Paterno</label>
                                                            <input name="apellidopa" id="apellidopa"  type="text" value="<?php echo $profile['Apellido_Paterno']; ?>" class="form-control" required/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label>Apellido Materno</label>
                                                            <input name="apellidoma" id="apellidoma" type="text" value="<?php echo $profile['Apellido_Materno']; ?>" class="form-control" required/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row mb-2">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label>Especialidad</label>
                                                            <input name="especialidad" id="especialidad" type="text" value="<?php echo $profile['especialidad']; ?>" class="form-control" required/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"> 
                                                            <label>DNI</label>
                                                            <input name="dni" id="dni" type="text" value="<?php echo $profile['Documento']; ?>" class="form-control"  maxLength="8" required/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"> 
                                                            <label>Codigo Medico del Peru</label>
                                                            <input name="cmp" id="cmp" type="text" value="<?php echo $profile['CMP']; ?>" class="form-control" maxLength="6" required/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row mb-2">
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label>Pais</label>
                                                            <select class="custom-select" name="pais" id="pais">
                                                                <option selected>Seleccione su pais</option>
                                                                <?php  
                                                                    $pais = $this->showTableSelect('pais');
                                                                    foreach($pais as $row) { 
                                                                        if($row['Descripcion'] == $profile['pais']){
                                                                            echo '<option value="'.$row["Descripcion"].'" selected>'.$row["Descripcion"].'</option>';    
                                                                        }else{
                                                                            echo '<option value="'.$row["Descripcion"].'">'.$row["Descripcion"].'</option>';
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label>Departamento</label>
                                                            <select class="custom-select" name="departamento" id="departamento">
                                                                <option selected>Seleccione su departamento</option>
                                                                <?php  
                                                                    $depa = $this->showTableSelect('departamento');
                                                                    foreach ($depa as $row) { 
                                                                        if($row['Descripcion'] == $profile['departamento']){
                                                                            echo '<option value="'.$row["Descripcion"].'" selected>'.$row["Descripcion"].'</option>';
                                                                        }else{
                                                                            echo '<option value="'.$row["Descripcion"].'">'.$row["Descripcion"].'</option>';
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label>Provincia</label>
                                                            <select class="custom-select" name="provincia" id="provincia">
                                                                <option selected>Seleccione su provincia</option>
                                                                <?php  
                                                                    $prov = $this->showTableSelect('provincia');
                                                                    foreach ($prov as $row) { 
                                                                        if($row['Descripcion'] == $profile['provincia']){
                                                                            echo '<option value="'.$row["Descripcion"].'" selected>'.$row["Descripcion"].'</option>';
                                                                        }else{
                                                                            echo '<option value="'.$row["Descripcion"].'">'.$row["Descripcion"].'</option>';
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label>Distrito</label>
                                                            <select class="custom-select" name="distrito" id="distrito" >
                                                                <option selected>Seleccione su opcion</option>
                                                                <?php  
                                                                    $dist = $this->showTableSelect('distrito');
                                                                    foreach ($dist as $row) { 
                                                                        if($row['Descripcion'] == $profile['distrito']){
                                                                            echo '<option value="'.$row["Descripcion"].'" selected>'.$row["Descripcion"].'</option>';
                                                                        }else{
                                                                            echo '<option value="'.$row["Descripcion"].'">'.$row["Descripcion"].'</option>';
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row mb-2">
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group"><label>Telefono 1</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                    <i class="fa fa-phone"></i>
                                                                </span>
                                                                </div><input name="telefono1" id="telefono1" value="<?php echo $profile['Telefono_Fijo01']; ?>" type="text" class="form-control" required/></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group"><label>Telefono 2</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                    <i class="fa fa-phone"></i>
                                                                </span>
                                                                </div><input name="telefono2" id="telefono2" placeholder="Ingrese su segundo telefono" type="text" class="form-control"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group"><label>Celular 1</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                    <i class="fas fa-mobile-alt"></i>
                                                                </span>
                                                                </div><input name="celular1" id="celular1" type="text" value="<?php echo $profile['Celular01']; ?>" class="form-control" required></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group"><label>Celular 2</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                    <i class="fas fa-mobile-alt"></i>
                                                                </span>
                                                                </div><input name="celular2" id="celular2" placeholder="Ingrese su segundo celular" type="text" class="form-control"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row mb-2">
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label>Correo Electrónico</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fa fa-envelope"></i>
                                                                    </span>
                                                                </div>
                                                                <input name="correo" id="correo" value="<?php echo $profile['email01']; ?>" type="email" class="form-control" required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-md-3">
                                                        <div class="position-relative form-group"><label >Facebook</label><input name="facebook" id="facebook" placeholder="" type="text"class="form-control"></div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group"><label>Twitter</label><input name="twitter" id="twitter" placeholder="" type="text" class="form-control"></div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group"><label>LinkedIn</label><input name="linkedin" id="linkedin" placeholder="" type="text" class="form-control"></div>
                                                    </div> -->
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label>Tiempo de Atencion Promedio</label>
                                                            <input name="tiempoatencion" id="tiempoatencion" type="text" class="form-control" required/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group"><label >Precio de Consulta Promedio</label><input name="precioconsulta" id="precioconsulta" placeholder="" type="text"class="form-control" required></div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group"><label>Dia de pago</label><input name="diapago" id="diapago"  type="date" class="form-control" required></div>
                                                    </div>
                                                </div> 
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label>Agregar imagen</label>
                                                            <input name="imagen" id="imagen" type="file" class="form-control-file" required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="float-right">
                                                    <button type="button" class="btn btn-success" id="btn_guardar">GUARDAR</button>
                                                </div> -->
                                                <!-- <button class="mt-2 btn btn-primary">GUARDAR</button> -->
                                            </form>
                                            <!-- <h5 class="title mt-3" style="margin-bottom: 30px;">SEGURIDAD DE CONTRASEÑA</h5>               
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="TxtUsuario" class="control-label">Usuario</label>
                                                            <input type="text" value="Alberth123" readonly="readonly" disabled="disabled" class="aspNetDisabled form-control" onkeypress="return Enter(this, event)">
                                                        </div>
                                                    </div>
                                                </div>
                                                                                                                        
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="TxtContrasenia" class="control-label">Contraseña</label>
                                                            <div class="input-group">
                                                                <div id="show1" class="input-group-prepend" style="cursor: pointer;">
                                                                    <span class="input-group-text" title="Mostrar/Ocultar contraseña">
                                                                        <i id="pass_show" class="fa fa-eye"></i>
                                                                    </span>
                                                                </div>                                                    
                                                                <input name="contraseña" value="?php echo $profile['Password']; ?>" id="contraseña" class="form-control" onkeypress="return Enter(this, event)" type="password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
            
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="TxtContraseniaConfirmada" class="control-label">Confirme</label>
                                                            <div class="input-group">
                                                                <div id="show2" class="input-group-prepend" style="cursor: pointer;">
                                                                    <span class="input-group-text" title="Mostrar/Ocultar contraseña">
                                                                        <i id="confirm_show" class="fa fa-eye"></i>
                                                                    </span>
                                                                </div>
                                                                <input name="contraseña_confirmada"  id="contraseña_confirmada"  class="form-control" onkeypress="return Enter(this, event)" type="password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                    
                                            </div> -->

                                            <!-- <div class="row">   
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="correo_comprobacion" class="control-label">Correo electrónico</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fa fa-envelope"></i>
                                                                    </span>
                                                                </div>
                                                                <input name="correo_comprobacion" type="text" value="albeerthronaldo@hotmail.com" id="correo_comprobacion" class="form-control" onkeypress="return Enter(this, event)">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
            
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="celular_comprobacion" class="control-label">Celular</label>
                                                            <input name="celular_comprobacion" type="text" value="959856138" id="celular_comprobacion" class="form-control" onkeypress="return Enter(this, event)">
                                                        </div>
                                                    </div>
                                                </div>   
                                            </div> -->
                                            <!-- <div class="float-right">
                                                <button type="button" class="btn btn-success" id="showtoast">GUARDAR</button>
                                            </div> -->
                                        </div>
                        
                                        <div id="step-2" class="tab-pane step-content">
                                            <h2>Cuestionario</h2>
                                            <form>
                                                <div class="form-group col-md-6">
                                                    <label>Ingrese la cantidad de preguntas :</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="cantidad" autofocus="autofocus">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-info" id="button">Generar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="container" id="questions">
                                            </div>
                                            <div class="main-card mb-3 card" id="tableQuestions">
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="divider"></div>
                                <div class="clearfix">
                                    <!-- <button type="button"  class="btn-shadow float-left btn btn-info">Guardar</button> -->
                                    <button type="button" id="next-btn2" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Siguiente</button>
                                    <button type="button" id="prev-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Atras</button>
                                </div>                
                            </div>
                        </div>
                    </div>

                    <!-- END FORMS WIZARD -->

                    <?php
                        }else{
                    ?>
                    
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-home icon-gradient bg-mean-fruit">
                                    </i>
                                </div>
                                <div>Panel de administración
                                    <div class="page-title-subheading">Bienvenido.
                                    </div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow btn btn-dark">
                                    <i class="fa fa-star"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-midnight-bloom">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading" style="font-size: 20px;">Perfil</div>
                                        <div class="widget-subheading">Edita tu información personal</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <i class="pe-7s-user" style="font-size: 40px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-arielle-smile">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading" style="font-size: 20px;">Enviar notificaciones</div>
                                        <div class="widget-subheading">Enviar mensajes a usuarios</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <i class="pe-7s-bell" style="font-size: 38px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-grow-early">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading" style="font-size: 20px;">Bandeja de consulta</div>
                                        <div class="widget-subheading">Verificar la bandeja de entrada</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <i class="pe-7s-comment" style="font-size: 40px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mbg-3 h-auto pl-0 pr-0 bg-transparent no-border card-header" style="border-bottom: 1px solid #9c9c9c;padding-bottom: 15px;padding-top: 25px;">
                        <div class="card-header-title fsize-2 font-weight-normal">Registro de consultas</div>
                        <div class="btn-actions-pane-right">
                            <button id="btn-adm_consulta" class="btn-shadow btn btn-warning text-white fsize-1"><i class="fa fa-plus"></i> Nueva consulta</button>
                        </div>
                    </div>

                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha consulta</th>
                                        <th>Anamnesis</th>
                                        <th>Exámen físico</th>
                                        <th>Exámenes</th>
                                        <th>Archivos</th>
                                        <th>Imágenes</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>15</td>
                                        <td>2011/04/25</td>
                                        <td>TE: SP:</td>
                                        <td>Orofaringe</td>
                                        <td>Pedidos: Resultados:</td>
                                        <td>..Archivo..</td>
                                        <td>..Imágen..</td>
                                        <td class="text-center">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <button class="btn-shadow btn btn-warning text-white"><i class="fa fa-eye"></i> Detalle</button>
                                                <button class="btn-shadow btn btn-warning text-white"><i class="fa fa-edit"></i> Editar</button>
                                                <button class="btn-shadow btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>2011/04/25</td>
                                        <td>TE: SP:</td>
                                        <td>Orofaringe</td>
                                        <td>Pedidos: Resultados:</td>
                                        <td>..Archivo..</td>
                                        <td>..Imágen..</td>
                                        <td class="text-center">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <button class="btn-shadow btn btn-warning text-white"><i class="fa fa-eye"></i> Detalle</button>
                                                <button class="btn-shadow btn btn-warning text-white"><i class="fa fa-edit"></i> Editar</button>
                                                <button class="btn-shadow btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>2011/04/25</td>
                                        <td>TE: SP:</td>
                                        <td>Orofaringe</td>
                                        <td>Pedidos: Resultados:</td>
                                        <td>..Archivo..</td>
                                        <td>..Imágen..</td>
                                        <td class="text-center">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <button class="btn-shadow btn btn-warning text-white"><i class="fa fa-eye"></i> Detalle</button>
                                                <button class="btn-shadow btn btn-warning text-white"><i class="fa fa-edit"></i> Editar</button>
                                                <button class="btn-shadow btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>2011/04/25</td>
                                        <td>TE: SP:</td>
                                        <td>Orofaringe</td>
                                        <td>Pedidos: Resultados:</td>
                                        <td>..Archivo..</td>
                                        <td>..Imágen..</td>
                                        <td class="text-center">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <button class="btn-shadow btn btn-warning text-white"><i class="fa fa-eye"></i> Detalle</button>
                                                <button class="btn-shadow btn btn-warning text-white"><i class="fa fa-edit"></i> Editar</button>
                                                <button class="btn-shadow btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>2011/04/25</td>
                                        <td>TE: SP:</td>
                                        <td>Orofaringe</td>
                                        <td>Pedidos: Resultados:</td>
                                        <td>..Archivo..</td>
                                        <td>..Imágen..</td>
                                        <td class="text-center">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <button class="btn-shadow btn btn-warning text-white"><i class="fa fa-eye"></i> Detalle</button>
                                                <button class="btn-shadow btn btn-warning text-white"><i class="fa fa-edit"></i> Editar</button>
                                                <button class="btn-shadow btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>2011/04/25</td>
                                        <td>TE: SP:</td>
                                        <td>Orofaringe</td>
                                        <td>Pedidos: Resultados:</td>
                                        <td>..Archivo..</td>
                                        <td>..Imágen..</td>
                                        <td class="text-center">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <button class="btn-shadow btn btn-warning text-white"><i class="fa fa-eye"></i> Detalle</button>
                                                <button class="btn-shadow btn btn-warning text-white"><i class="fa fa-edit"></i> Editar</button>
                                                <button class="btn-shadow btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha consulta</th>
                                        <th>Anamnesis</th>
                                        <th>Exámen físico</th>
                                        <th>Exámenes</th>
                                        <th>Archivos</th>
                                        <th>Imágenes</th>
                                        <th>Opciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>


                    <?php } ?>             
                </div>

            </div>
        </div>

    </div>
    <!-- MODAL USER CONFIGURATIONS  -->
    
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script type="text/javascript" src="<?= FOLDER_PATH ?>/src/js/main.d810cf0ae7f39f28f336.js"></script>
    <script src="<?= FOLDER_PATH ?>/src/js/cuestionario.js"></script>
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
    </script>
    <script>
        $('#show1').click(function() {
            var type = document.getElementById('contraseña').type;
            if (type == "text") {
                document.getElementById('contraseña').type = 'password';
                document.getElementById("pass_show").className = "fa fa-eye";

            } else {
                document.getElementById('contraseña').type = 'text';
                document.getElementById("pass_show").className = "fa fa-eye-slash";
            }
        });
        $('#show2').click(function() {
            var type = document.getElementById('contraseña_confirmada').type;
            if (type == "text") {
                document.getElementById('contraseña_confirmada').type = 'password';
                document.getElementById("confirm_show").className = "fa fa-eye";
            } else {
                document.getElementById('contraseña_confirmada').type = 'text';
                document.getElementById("confirm_show").className = "fa fa-eye-slash";
            }
        });
    </script>
    <script>
        $('#smartwizard2').smartWizard({
            keyboardSettings: {
                keyNavigation: false
            }
        });
    </script>
</body>
</html>