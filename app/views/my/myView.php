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
, 
    <?php require(ROOT . '/' . PATH_VIEWS . 'fonts.php'); ?>

    <link href="<?= FOLDER_PATH ?>/src/css/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">

        <!-- HEADER -->
        <?php require(ROOT . '/' . PATH_VIEWS . 'panel_superior.php'); ?>

        <!-- PANEL LATERAL DERECHO/CONFIGURACIONES DE DISEÑO -->
        <?php require(ROOT . '/' . PATH_VIEWS . 'panel_lateral_der.php'); ?>

        <div class="app-main">

            <!-- PANEL LATERAL IZQUIERDO -->
            <?php require(ROOT . '/' . PATH_VIEWS . 'panel_lateral_izq.php'); ?>
            
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <?php
                        
                        $state = $this->stateProfile();
                         
                        if($state[0] == 1){
                            // $this->updateStateProfile();
                    ?>
                    
                    <!-- FORMS WIZARD -->
                    <div class="col-md-12 col-lg-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <div id="smartwizard2" class="forms-wizard-alt sw-main sw-theme-default">
                                    <ul class="forms-wizard nav nav-tabs step-anchor">
                                        <li>
                                            <a href="#step-1">
                                                <em>1</em><span>Datos perfil</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#step-2">
                                                <em>2</em><span>Cuestionario</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="form-wizard-content sw-container tab-content">
                                        <div id="step-1" class="tab-pane step-content">
                                            <!-- <h5 class="title" style="margin-bottom: 30px;">MI PERFIL</h5> -->
                                            <form >
                                                <div class="form-row mb-2">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label>Nombre</label><input name="nombre" id="nombre" placeholder="" type="text" class="form-control" required/></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label>Apellido Paterno</label><input name="apellidopa" id="apellidopa" placeholder="" type="text" class="form-control" required/></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label>Apellido Materno</label><input name="apellidoma" id="apellidoma" placeholder="" type="text" class="form-control" required/></div>
                                                    </div>
                                                </div>

                                                <div class="form-row mb-2">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label>Especialidad</label>
                                                            <select class="custom-select" name="especialidad" id="especialidad">
                                                                <option selected>Seleccione su especialidad</option>
                                                                <option value="1">Doctor</option>
                                                                <option value="2">Oftalmologo</option>
                                                                <option value="3">Pediatra</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label>DNI</label><input name="dni" id="dni" placeholder="" type="text"class="form-control" maxLength="8" required/></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label>Codigo Medico del Peru</label><input name="cmp" id="cmp" placeholder="" type="text" class="form-control" maxLength="6" required/></div>
                                                    </div>
                                                </div>

                                                <div class="form-row mb-2">
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label>Pais</label>
                                                            <select class="custom-select" name="pais" id="pais">
                                                                <option selected>Seleccione su pais</option>
                                                                <option value="1">Peru</option>
                                                                <option value="2">Argentina</option>
                                                                <option value="3">Bolivia</option>
                                                                <option value="4">Colombia</option>
                                                                <option value="5">Chile</option>
                                                                <option value="6">Brasil</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label>Departamento</label>
                                                            <select class="custom-select" name="departamento" id="departamento">
                                                                <option selected>Seleccione su departamento</option>
                                                                <option value="1">Tacna</option>
                                                                <option value="2">Moquegua</option>
                                                                <option value="3">Madre de dios</option>
                                                                <option value="4">Puno</option>
                                                                <option value="5">Santiago</option>
                                                                <option value="6">Arica</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label>Provincia</label>
                                                            <select class="custom-select" name="provincia" id="provincia">
                                                                <option selected>Seleccione su provincia</option>
                                                                <option value="1">Tacna</option>
                                                                <option value="2">Moquegua</option>
                                                                <option value="3">Madre de dios</option>
                                                                <option value="4">Puno</option>
                                                                <option value="5">Santiago</option>
                                                                <option value="6">Arica</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label>Distrito</label>
                                                            <select class="custom-select" name="distrito" id="distrito">
                                                                <option selected>Seleccione su distrito</option>
                                                                <option value="1">Tacna</option>
                                                                <option value="2">Moquegua</option>
                                                                <option value="3">Madre de dios</option>
                                                                <option value="4">Puno</option>
                                                                <option value="5">Santiago</option>
                                                                <option value="6">Arica</option>
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
                                                                </div><input name="telefono1" id="telefono1" placeholder="" type="text" class="form-control" required/></div>
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
                                                                </div><input name="celular1" id="celular1" placeholder="" type="text" class="form-control" required/></div>
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
                                                                <input name="correo" id="correo" placeholder="" type="email" class="form-control" required/>
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
                                            <h5 class="title mt-3" style="margin-bottom: 30px;">SEGURIDAD DE CONTRASEÑA</h5>               
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="TxtUsuario" class="control-label">Usuario</label>
                                                            <input name="correo_comprobacion" type="text" value="Alberth123" readonly="readonly" id="correo_comprobacion" disabled="disabled" class="aspNetDisabled form-control" onkeypress="return Enter(this, event)">
                                                        </div>
                                                    </div>
                                                </div>
                                                                                                                        
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="TxtContrasenia" class="control-label">Contraseña</label>
                                                            <div class="input-group">
                                                                <div id="divpwd" class="input-group-prepend" style="cursor: pointer;">
                                                                    <span class="input-group-text" title="Mostrar/Ocultar contraseña">
                                                                        <i id="icon" class="fa fa-eye"></i>
                                                                    </span>
                                                                </div>                                                    
                                                                <input name="contraseña" value="132456" id="contraseña" class="form-control" onkeypress="return Enter(this, event)" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
            
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="TxtContraseniaConfirmada" class="control-label">Confirme</label>
                                                            <div class="input-group">
                                                                <div id="divpwd2" class="input-group-prepend" style="cursor: pointer;">
                                                                    <span class="input-group-text" title="Mostrar/Ocultar contraseña">
                                                                        <i id="icon2" class="fa fa-eye-slash"></i>
                                                                    </span>
                                                                </div>
                                                                <input name="contraseña_confirmada" value="123456" id="contraseña_confirmada" class="form-control" onkeypress="return Enter(this, event)" type="password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                    
                                            </div>

                                            <div class="row">   
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
                                            </div>
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
                                                        <input type="text" class="form-control" id="cantidad">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-info" id="button">Mostrar</button>
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
                                    <!-- <button type="button" id="reset-btn2" class="btn-shadow float-left btn btn-link">Reset</button> -->
                                    <button type="button" id="next-btn2" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Siguiente</button>
                                    <button type="button" id="prev-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Atras</button>
                                </div>                
                            </div>
                        </div>
                    </div>

                    <!-- END FORMS WIZARD -->


                    <!-- DATOS PERFIL USUARIO -->
                    
                    <!-- <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="title" style="margin-bottom: 30px;">MI PERFIL</h5>
                                    <form class="">
                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label>Nombre</label><input name="nombre" id="nombre" placeholder="" type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label>Apellido Paterno</label><input name="apellidopa" id="apellidopa" placeholder="" type="text"
                                                                                                                                                            class="form-control"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label>Apellido Materno</label><input name="apellidoma" id="apellidoma" placeholder="" type="text" class="form-control"></div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label>Especialidad</label><input name="especialidad" id="especialidad" placeholder="" type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label>DNI</label><input name="dni" id="dni" placeholder="" type="text"class="form-control"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label>Codigo Medico del Peru</label><input name="cmp" id="cmp" placeholder="" type="text" class="form-control"></div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label>Pais</label><input name="pais" id="pais" placeholder="" type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label>Departamento</label><input name="departamento" id="departamento" placeholder="" type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label>Provincia</label><input name="provincia" id="provincia" placeholder="" type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label>Distrito</label><input name="distrito" id="distrito" placeholder="" type="text" class="form-control"></div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label>Direccion de Domicilio</label><input name="domicilio" id="domicilio" placeholder="" type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label>Direccion de Consultas</label><input name="direccion" id="direccion" placeholder="" type="text" class="form-control"></div>
                                            </div>                                               
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label>Telefono 1</label><input name="telefono1" id="telefono1" placeholder="" type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label>Telefono 2</label><input name="telefono2" id="telefono2" placeholder="Ingrese su segundo telefono" type="text"class="form-control"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label>Celular 1</label><input name="celular1" id="celular1" placeholder="" type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label>Celular 2</label><input name="celular2" id="celular2" placeholder="Ingrese su segundo celular" type="text" class="form-control"></div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label>Correo Electronico</label><input name="email" id="email" placeholder="" type="email" class="form-control"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label >Facebook</label><input name="facebook" id="facebook" placeholder="" type="text"class="form-control"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label>Twitter</label><input name="twitter" id="twitter" placeholder="" type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label>LinkedIn</label><input name="linkedin" id="linkedin" placeholder="" type="text" class="form-control"></div>
                                            </div>

                                        </div> 
                                        <div class="form-row">
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label>Tiempo de Atencion Promedio</label><input name="tiempoatencion" id="tiempoatencion" placeholder="" type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label >Precio de Consulta Promedio</label><input name="precioconsulta" id="precioconsulta" placeholder="" type="text"class="form-control"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label>Dia de pago</label><input name="diapago" id="diapago" placeholder="" type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label>Agregar imagen</label><input name="email" id="exampleEmail11" placeholder="" type="email" class="form-control"></div>
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <button type="button" class="btn btn-success" id="btn_guardar">GUARDAR</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="title" style="margin-bottom: 30px;">SEGURIDAD DE CONTRASEÑA</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="TxtUsuario" class="control-label">Usuario</label>
                                                    <input name="ctl00$BodyPadre$TxtUsuario" type="text" value="Alberth123" readonly="readonly" id="BodyPadre_TxtUsuario" disabled="disabled" class="aspNetDisabled form-control" onkeypress="return Enter(this, event)">
                                                </div>
                                            </div>
                                        </div>
                                                                                                                
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="TxtContrasenia" class="control-label">Contraseña</label>
                                                    <div class="input-group">
                                                        <div id="divpwd" class="input-group-prepend" style="cursor: pointer;">
                                                            <span class="input-group-text" title="Mostrar/Ocultar contraseña">
                                                                <i id="icon" class="fa fa-eye"></i>
                                                            </span>
                                                        </div>                                                    
                                                        <input name="ctl00$BodyPadre$TxtContrasenia" value="132456" id="BodyPadre_TxtContrasenia" class="form-control" onkeypress="return Enter(this, event)" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="TxtContraseniaConfirmada" class="control-label">Confirme</label>
                                                    <div class="input-group">
                                                        <div id="divpwd2" class="input-group-prepend" style="cursor: pointer;">
                                                            <span class="input-group-text" title="Mostrar/Ocultar contraseña">
                                                                <i id="icon2" class="fa fa-eye-slash"></i>
                                                            </span>
                                                        </div>
                                                        <input name="ctl00$BodyPadre$TxtContraseniaConfirmada" value="123456" id="BodyPadre_TxtContraseniaConfirmada" class="form-control" onkeypress="return Enter(this, event)" type="password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                    
                                    </div>

                                    <div class="row">   
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="TxtEmail" class="control-label">Email</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fa fa-envelope"></i>
                                                            </span>
                                                        </div>
                                                        <input name="ctl00$BodyPadre$TxtEmail" type="text" value="albeerthronaldo@hotmail.com" id="BodyPadre_TxtEmail" class="form-control" onkeypress="return Enter(this, event)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="TxtCelular" class="control-label">Celular</label>
                                                    <input name="ctl00$BodyPadre$TxtCelular" type="text" value="959856138" id="BodyPadre_TxtCelular" class="form-control" onkeypress="return Enter(this, event)">
                                                </div>
                                            </div>
                                        </div>   

                                    </div>
                                    <div class="float-right">
                                        <button type="button" class="btn btn-success" id="showtoast">GUARDAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- END DATOS PERFIL -->

                    <!-- <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="card-title">
                                <h2>Cuestionario</h2>
                            </div>
                            <form>
                                <div class="form-group col-md-6">
                                    <label>Ingrese la cantidad de preguntas :</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="cantidad">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-info" id="button">Mostrar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="container" id="questions">
                        </div>
                    </div>

                    <div class="main-card mb-3 card" id="tableQuestions">
                                     
                    </div> -->
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

                    <!-- <div class="row">
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
                                        <div class="widget-heading" style="font-size: 20px;">Notificaciones</div>
                                        <div class="widget-subheading">Verificar la bandeja de notificaciones</div>
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
                                        <div class="widget-heading" style="font-size: 20px;">Consultas</div>
                                        <div class="widget-subheading">Consultar al administrador</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <i class="pe-7s-comment" style="font-size: 40px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

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
                        <!-- <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-premium-dark">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Extra</div>
                                        <div class="widget-subheading">....</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <i class="pe-7s-comment" style="font-size: 40px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div> -->
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
            
    
            <!-- END MODAL -->
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script type="text/javascript" src="<?= FOLDER_PATH ?>/src/js/main.d810cf0ae7f39f28f336.js"></script>
    <script src="<?= FOLDER_PATH ?>/src/js/cuestionario.js"></script>
    <script>
        
        document.getElementById("btn-adm_consulta").addEventListener("click", consulta_admin);
        document.getElementById("btn-adm_close").addEventListener("click", close_admin);

        function consulta_admin() {
            location.href = "<?= FOLDER_PATH ?>/consultation"
        }
        function close_admin() {
            location.href = "<?= FOLDER_PATH ?>/login/salir"
        } 
    </script>
</body>
</html>