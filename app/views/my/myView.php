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


</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <?php
        $profile = $this->showProfile();
        $this->session->add('Nombres', $profile['Nombres']);
        $this->session->add('especialidad', $profile['especialidad']);
        $this->session->add('idUser', $profile['Id_Usuario']);
        $this->session->add('idDoctor', $profile['Id_Doctor']);
        $imagen = $profile['imagen'];
        $this->session->add('image_user', $profile['imagen']);
        ?>

        <!-- HEADER -->
        <?php require(ROOT . '/' . PATH_VIEWS . 'panel_superior.php'); ?>

        <div class="app-main">

            <!-- PANEL LATERAL IZQUIERDO -->
            <?php require(ROOT . '/' . PATH_VIEWS . 'panel_lateral_izq.php'); ?>

            <div class="app-main__outer">
                <div class="app-main__inner">
                    <?php
                    $state = $this->stateProfile();
                    if ($state[0] == 1) {
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

                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <div id="smartwizard2" class="forms-wizard-alt sw-main sw-theme-default">
                                    <ul class="forms-wizard nav nav-tabs step-anchor">
                                        <li>
                                            <a href="#step-1" class="nav-link" id="btnDataProfile">
                                                <em>1</em><span>Datos perfil</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#step-2" class="nav-link" id="btnQuestionnaire">
                                                <em>2</em><span>Cuestionario</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="form-wizard-content sw-container tab-content">
                                        <div id="step-1" class="tab-pane step-content">
                                            <!-- <h5 class="title" style="margin-bottom: 30px;">MI PERFIL</h5> -->
                                            <!-- <form action="<--?= FOLDER_PATH . '/my/updateProfile' ?>"  method="post" name="form-profile"> -->
                                            <form method="post" enctype="multipart/form-data" name="frm-profile" id="frm-profile">
                                                <div class="form-row mb-2">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label>Nombre</label>
                                                            <input name="nombre" id="nombre" type="text" value="<?php echo $profile['Nombres']; ?>" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label>Apellido Paterno</label>
                                                            <input name="apellidopa" id="apellidopa" type="text" value="<?php echo $profile['Apellido_Paterno']; ?>" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label>Apellido Materno</label>
                                                            <input name="apellidoma" id="apellidoma" type="text" value="<?php echo $profile['Apellido_Materno']; ?>" class="form-control " required>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row mb-2">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label>Especialidad</label>
                                                            <select class="custom-select" name="especialidad" id="especialidad" required>
                                                                <option selected>Seleccione su especialidad</option>
                                                                <?php
                                                                $especialidad = $this->showTableSelect('especialidad');
                                                                foreach ($especialidad as $row) {
                                                                    if ($row['Descripcion'] == $profile['especialidad']) {
                                                                        echo '<option value="' . $row["Id_Especialidad"] . '" selected>' . $row["Descripcion"] . '</option>';
                                                                    } else {
                                                                        echo '<option value="' . $row["Id_Especialidad"] . '">' . $row["Descripcion"] . '</option>';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label>DNI</label>
                                                            <input name="dni" id="dni" type="text" value="<?php echo $profile['Documento']; ?>" class="form-control" maxLength="8" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label>Codigo Medico del Peru</label>
                                                            <input name="cmp" id="cmp" type="text" value="<?php echo $profile['CMP']; ?>" class="form-control" maxLength="6" required>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row mb-2">
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label>Pais</label>
                                                            <select class="custom-select" name="pais" id="pais" required>
                                                                <option selected>Seleccione su pais</option>
                                                                <?php
                                                                $pais = $this->showTableSelect('pais');
                                                                foreach ($pais as $row) {
                                                                    if ($row['Descripcion'] == $profile['pais']) {
                                                                        echo '<option value="' . $row["Id_Pais"] . '" selected>' . $row["Descripcion"] . '</option>';
                                                                        $_SESSION["id_pais"] = $row["Id_Pais"];
                                                                    } else {
                                                                        echo '<option value="' . $row["Id_Pais"] . '">' . $row["Descripcion"] . '</option>';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label>Departamento</label>
                                                            <select class="custom-select" name="departamento" id="departamento" required>
                                                                <option selected>Seleccione su departamento</option>
                                                                <?php
                                                                $depa = $this->showTableSelect('departamento', $_SESSION["id_pais"], 'Pais');
                                                                foreach ($depa as $row) {
                                                                    if ($row['Descripcion'] == $profile['departamento']) {
                                                                        echo '<option value="' . $row["Id_Departamento"] . '" selected>' . $row["Descripcion"] . '</option>';
                                                                        $_SESSION['id_departamento'] = $row['Id_Departamento'];
                                                                    } else {
                                                                        echo '<option value="' . $row["Id_Departamento"] . '">' . $row["Descripcion"] . '</option>';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label>Provincia</label>
                                                            <select class="custom-select" name="provincia" id="provincia" required>
                                                                <option selected>Seleccione su provincia</option>
                                                                <?php
                                                                $prov = $this->showTableSelect('provincia', $_SESSION['id_departamento'], 'Departamento');
                                                                foreach ($prov as $row) {
                                                                    if ($row['Descripcion'] == $profile['provincia']) {
                                                                        echo '<option value="' . $row["Id_Provincia"] . '" selected>' . $row["Descripcion"] . '</option>';
                                                                        $_SESSION['id_provincia'] = $row['Id_Provincia'];
                                                                    } else {
                                                                        echo '<option value="' . $row["Id_Provincia"] . '">' . $row["Descripcion"] . '</option>';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label>Distrito</label>
                                                            <select class="custom-select" name="distrito" id="distrito" required>
                                                                <option selected>Seleccione su opcion</option>
                                                                <?php
                                                                $dist = $this->showTableSelect('distrito', $_SESSION['id_provincia'], 'Provincia');
                                                                foreach ($dist as $row) {
                                                                    if ($row['Descripcion'] == $profile['distrito']) {
                                                                        echo '<option value="' . $row["Id_Distrito"] . '" selected>' . $row["Descripcion"] . '</option>';
                                                                    } else {
                                                                        echo '<option value="' . $row["Id_Distrito"] . '">' . $row["Descripcion"] . '</option>';
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
                                                                </div>
                                                                <input name="telefono1" id="telefono1" value="<?php echo $profile['Telefono_Fijo01']; ?>" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group"><label>Telefono 2</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fa fa-phone"></i>
                                                                    </span>
                                                                </div>
                                                                <input name="telefono2" id="telefono2" value="<?php echo $profile['Telefono_Fijo02']; ?>" placeholder="Ingrese su segundo telefono" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group"><label>Celular 1</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-mobile-alt"></i>
                                                                    </span>
                                                                </div>
                                                                <input name="celular1" id="celular1" type="text" value="<?php echo $profile['Celular01']; ?>" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group"><label>Celular 2</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-mobile-alt"></i>
                                                                    </span>
                                                                </div>
                                                                <input name="celular2" id="celular2" value="<?php echo $profile['Celular02']; ?>" type="text" class="form-control" novalidate="true">
                                                            </div>
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
                                                                <input name="correo" id="correo" value="<?php echo $profile['email01']; ?>" type="email" class="form-control" required>
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
                                                    <!-- <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label>Tiempo de Atencion Promedio</label>
                                                            <input name="tiempoatencion" id="tiempoatencion" value="<!-?php echo $profile['Tiempo_Atencion_Promedio']; ?>" type="text" class="form-control" required>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label>Precio de Consulta Promedio</label>
                                                            <input name="precioconsulta" id="precioconsulta" value="<?php echo $profile['Monto_Pago']; ?>" type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label>Dia de pago</label>
                                                            <input name="diapago" id="diapago" type="date" value="<?php echo $profile['Dia_Pago']; ?>" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="divider"></div> -->
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label>Agregar imagen</label>
                                                            <input name="imagen" id="imagen" type="file" class="form-control-file">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" style="display:flex;justify-content:flex-end;align-items:center">
                                                        <button class="btn btn-success" type="submit" id="btnSaveProfile" name="submit">Actualizar perfil</button>
                                                    </div>
                                                </div>
                                                <!-- <div class="float-right">
                                                <button type="button" class="btn btn-success" id="btn_guardar">GUARDAR</button>
                                            </div> -->
                                                <!-- <button class="mt-2 btn btn-primary">GUARDAR</button> -->

                                                <!-- END FORMULARIO PROFILE -->
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
                                        <!-- </form> -->

                                        <div id="step-2" class="tab-pane step-content">
                                            <!-- <form> -->
                                            <div class="container">
                                                <div class="row mb-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h2>Cuestionario</h2>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Ingrese su pregunta " id="cantidad" onkeypress="showQuestion2(event)" oninput="validarInput()" onFocus="if (this.value!='') this.value='';">
                                                                <div class="input-group-append">
                                                                    <button type="button" class="btn btn-info" id="button" onclick="showFunctionQuestion2(event)" disabled>Crear</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card border-info" style="max-width:18rem;margin:auto;">
                                                            <!-- <div class="card-header ">Nota :</div> -->
                                                            <div class="card-body text-info">
                                                                <h5 class="card-title">Nota :</h5>
                                                                <p class="card-text">Solo puede crear un cuestionario</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row" id="questions">

                                                </div>
                                            </div>
                                            <!-- <div class="main-card mb-3 card" id="tableQuestions">
                                            </div> -->
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="clearfix">
                                    <!-- <button type="button"  class="btn-shadow float-left btn btn-info">Guardar</button> -->
                                    <button type="button" id="save-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-warning">Guardar y Continuar</button>
                                    <button type="button" id="next-btn2" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Siguiente</button>
                                    <button type="button" id="prev-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Atras</button>
                                </div>
                            </div>
                        </div>

                        <!-- END FORMS WIZARD -->

                    <?php
                    } else {
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
                                            <th>Paciente</th>
                                            <th>Edad</th>
                                            <th>Fecha Consulta</th>
                                            <th>Hora Consulta</th>
                                            <th>Archivos</th>
                                            <th>Imágenes</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $count = 0;
                                        while ($datos_historial = $data['Result']->fetch()) {

                                            $birthDate = explode("-", $datos_historial['fecha_nacimiento']);
                                            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                                                ? ((date("Y") - $birthDate[0]) - 1)
                                                : (date("Y") - $birthDate[0]));


                                            $count += 1;
                                        ?>
                                            <tr>
                                                <td><?= $datos_historial['nombre_paciente'] ?></td>
                                                <td><?= $age ?></td>
                                                <td><?= date("Y-m-d", strtotime($datos_historial['fecha_consulta'])) ?></td>
                                                <td><?= date("H:i", strtotime($datos_historial['fecha_consulta'])) ?></td>
                                                <td>2</td>
                                                <td>2</td>
                                                <td class="text-center">
                                                    <div role="group" class="btn-group-sm btn-group">
                                                        <button id="details_<?= $count ?>" onclick="GetDetailsCon(<?= $count ?>)" meta-data="{<?php echo (base64_encode(utf8_encode("[" . $count . "]|" . $datos_historial[0] . "-data-history-details"))); ?>}" data-toggle="modal" data-target="#AppDetails" class="btn-shadow btn btn-warning text-white"><i class="fa fa-eye"></i> Detalle</button>
                                                        <button class="btn-shadow btn btn-warning text-white"><i class="fa fa-edit"></i> Editar</button>
                                                        <button class="btn-shadow btn btn-danger"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php

                                        }

                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Paciente</th>
                                            <th>Edad</th>
                                            <th>Fecha Consulta</th>
                                            <th>Hora Consulta</th>
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

    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script type="text/javascript" src="<?= FOLDER_PATH ?>/src/js/main.d810cf0ae7f39f28f336.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
    <script src="<?= FOLDER_PATH ?>/src/js/cuestionario.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
    <script>
        let cons = document.getElementById("btn-adm_consulta");
        let close = document.getElementById("btn-adm_close");
        // let save = document.getElementById("save-btn2");
        if (cons != null) {
            document.getElementById("btn-adm_consulta").addEventListener("click", function() {
                location.href = "<?= FOLDER_PATH ?>/consultation";
            });
        }

        // if(save != null){
        //     document.getElementById("save-btn2").addEventListener("click",function(){

        //         Swal.fire({
        //                 icon: 'success',
        //                 title: 'Guardando su consulta',
        //                 showConfirmButton: false,
        //                 timer: 850
        //         }).then(function(){

        //             location.href = "<!?= FOLDER_PATH ?>/my";
        //         });
        //     });
        // }
        if (close != null) {
            document.getElementById("btn-adm_close").addEventListener("click", close_admin);

            function close_admin() {
                location.href = "<?= FOLDER_PATH ?>/login/salir"
            }
        }
    </script>
    <script>
        $('#prev-btn2').css('display', 'none');
        $('#save-btn2').css('display', 'none');
        $('#next-btn2').css('display', 'block');

        $('#prev-btn2').on('click', function() {
            $('#next-btn2').css('display', 'block');
            $('#prev-btn2').css('display', 'none');
            $('#save-btn2').css('display', 'none');
        });

        $('#next-btn2').on('click', function() {
            $('#prev-btn2').css('display', 'block');
            $('#next-btn2').css('display', 'none');
            $('#save-btn2').css('display', 'block');
        });

        $("#btnDataProfile").click(function() {
            $('#prev-btn2').css('display', 'none');
            $('#next-btn2').css('display', 'block');
            $('#save-btn2').css('display', 'none');
        })
        $("#btnQuestionnaire").click(function() {
            $('#prev-btn2').css('display', 'block');
            $('#next-btn2').css('display', 'none')
            $('#save-btn2').css('display', 'block');
        })

        function detectCSS(attr, css, value) {
            let result = $(attr).css(css) === value ? true : false;
            return result;
        }

        $('#frm-profile').on('submit', function() {
            // let datos = $('#frm-profile').serialize();

            $.ajax({
                type: "post",
                url: "<?php echo FOLDER_PATH ?>/my/updateProfile",
                data: new FormData(this),
                processData: false,
                cache: false,
                contentType: false,
                success: function(response) {
                    swal({
                        title: '¡Actualizado con exito !',
                        text: response,
                        icon: 'success',
                        timer: 10000,
                        buttons: false
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                    swal({
                        text: resp,
                        timer: 3000,
                        icon: "success"
                    })
                }
            });
            return false;
        });

        $('#save-btn2').click(function() {
            let dato = 0;

            $.ajax({
                    type: "post",
                    url: "<?php echo FOLDER_PATH ?>/my/updateStateProfile",
                    data: dato
                })
                .done(function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: response,
                        showConfirmButton: false,
                        timer: 850
                    }).then(function() {
                        location.href = "<?= FOLDER_PATH ?>/my";
                    });
                })
                .fail(function() {
                    alert('no se pudo')
                })

            return false;
        });

        let click = 0;


        function showQuestion2(event) {

            if (quantity != null || buttonEnviar != null || questions != null || click != null) {
                let dato = quantity.value;
                let keycode = (event.keycode ? event.keycode : event.which);
                if (keycode == '13') {
                    event.preventDefault();
                    showFunctionQuestion2();
                }
            }
        }

        function showFunctionQuestion2() {
            // event.preventDefault();
            let dato = quantity.value;
            click += 1;
            $.ajax({
                type: "post",
                url: "<?php echo FOLDER_PATH ?>/my/insertQuestion",
                data: {
                    dato: dato
                },
                success: function(response) {
                    let div1 = document.createElement('div');
                    let div2 = document.createElement('div');
                    let div3 = document.createElement('div');
                    let span = document.createElement('span');
                    let input = document.createElement("input");
                    let content = document.createTextNode("Pregunta " + click);
                    div1.classList.add('col-md-6')
                    div2.classList.add('input-group')
                    div2.classList.add('mb-2')
                    div3.classList.add('input-group-prepend')
                    span.classList.add('input-group-text')
                    input.type = 'text'
                    input.classList.add('form-control')
                    input.value = dato
                    input.disabled = true

                    questions.appendChild(div1)
                    div1.appendChild(div2)
                    div2.appendChild(div3)
                    div3.appendChild(span)
                    span.appendChild(content)
                    div2.appendChild(input)
                },
                error: function(thrownError) {
                    alert('Error' + thrownError);
                }
            });
        }
    </script>
    
    <script>
        function GetDetailsCon(e) {
            var data_app = document.getElementById('details_' + e);
            var meta_data = data_app.getAttribute('meta-data');

            var data = new FormData();
            data.append("meta_data", meta_data);
            $.ajax({
                beforeSend: function() {
                    $("#data-details").css("display", "none");
                    $("#data-loading").css("display", "block");
                    /* $("#data-details").html(''); */
                },
                url: "<?= FOLDER_PATH ?>/my/show_details",
                type: "POST",
                data: data,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                success: function(resp) {
                    var obj_details = JSON.parse(resp);
                    var genero = '';
                    var estado = '';
                    obj_details = obj_details[0];


                    if (obj_details[3] == 'M') {
                        genero = 'Masculino';
                    }
                    if (obj_details[3] == 'F') {
                        genero = 'Femenino';
                    }
                    if (obj_details[3] == 'O') {
                        genero = 'Otros';
                    }
                    if (obj_details[16] == '0') {
                        estado = 'Pendiente';
                    }
                    if (obj_details[16] == '1') {
                        estado = 'Atendido';
                    }
                    if (obj_details[16] == '2') {
                        estado = 'Anulado';
                    }

                    $("#det_nom").html(obj_details[1]);
                    $("#det_dni").html(obj_details[2]);
                    $("#det_gen").html(genero);
                    $("#det_cel").html(obj_details[4]);
                    $("#det_edad").html(calcularEdad(obj_details[8]));
                    $("#det_fn").html(obj_details[5]);
                    $("#det_email").html(isNullorEmpty(obj_details[6]));

                    $("#det_fcon").html(obj_details[9]);

                    $("#det_fc").html(isNullorEmpty(obj_details[15]));
                    if (isNullorEmpty(obj_details[16]) != "No definido") {
                        $("#det_est").html(estado);
                    } else {
                        $("#det_est").html("No definido");
                    }

                    if (isNullorEmpty(obj_details[18]) != "No definido") {
                        $("#det_cost").html("S/. " + isNullorEmpty(obj_details[18]));
                    } else {
                        $("#det_cost").html("No definido");
                    }


                    $("#data-loading").css("display", "none");
                    $("#data-details").css("display", "block");

                    /* $("#data-details").html(resp); */
                }
            })
        }

        function calcularEdad(fechana) {
            console.log(fechana);
            let dateParts = fechana.split("-");
            let hoy = new Date();
            let cumpleanos = new Date(dateParts[0], dateParts[1] - 1, dateParts[2].substr(0, 2));
            let edad = hoy.getFullYear() - cumpleanos.getFullYear();
            let m = hoy.getMonth() - cumpleanos.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }
            edad = edad.toString() + " años";
            return edad;
        }

        function isNullorEmpty(e) {
            if (e == '' || e == null) {
                return "No definido";
            } else {
                return e;
            }
        }
    </script>



</body>

</html>