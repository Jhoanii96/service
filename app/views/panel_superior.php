<div id="top-header" class="app-header header-shadow"<?php if (isset($act_msg)) { if ($act_msg == 1) { echo(' style="margin-top: 60px;"'); } } ?>>
    <div class="app-header__logo" style="/* background: url('<?= FOLDER_PATH ?>/src/assets/media/images/logo-inverse.png') no-repeat */">
        <div class="logo-src" style="background: url('<?= FOLDER_PATH ?>/src/assets/media/images/logo-inverse.png') no-repeat"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="app-header__content">
        <div class="app-header-left">
            <div class="search-wrapper">
                <div class="input-holder">
                    <input type="text" class="search-input" placeholder="Type to search">
                    <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
            </div>
        </div>
        <div class="app-header-right">
            <div class="header-dots">
                <div class="dropdown">
                    <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link" id="btnNotification">
                        <span class="icon-wrapper icon-wrapper-alt rounded-circle" >
                            <!-- <span class="icon-wrapper-bg bg-danger"></span> -->
                            <span class="icon-wrapper-bg bg-deep-blue"></span>
                            <i class="icon ion-android-notifications" aria-hidden="true" style="font-size:30px"></i>
                            <span id="cantNotification" style="display:none;border:1px solid red;color:white;background:#F63D3D;width:18px;height:18px;border-radius:50%;position:absolute;right:1px;top:-1px"></span>
                            <!-- <i class="icon text-danger icon-anim-pulse ion-android-notifications"></i> -->
                            <!-- <span class="badge badge-dot badge-dot-sm badge-danger">Notificaciones</span> -->
                        </span>
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                        <div class="dropdown-menu-header mb-0">
                            <div class="dropdown-menu-header-inner bg-deep-blue">
                                <div class="menu-header-image opacity-1" style="background-image: url('<?= FOLDER_PATH ?>/src/assets/media/images/city3.jpg');"></div>
                                <div class="menu-header-content text-dark">
                                    <h5 class="menu-header-title" id="content-notification">NOTIFICACIONES</h5>
                                    <h6 class="menu-header-subtitle">Tiene <b id="cant-notifications"></b> notificaciones sin leer</h6>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-messages-header" role="tabpanel">
                                <div class="scroll-area-sm">
                                    <div class="scrollbar-container">
                                        <div class="p-3">
                                            <div class="notifications-box" >
                                                <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column" id="notifications-box" style="height:auto;">
                                                    <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                        <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <h4 class="timeline-title">All Hands Meeting</h4>
                                                                <span class="vertical-timeline-element-date"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                        <div>
                                                            <span class="vertical-timeline-element-icon bounce-in"></span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <p>Yet another one, at <span class="text-success">15:00 PM</span></p>
                                                                <span class="vertical-timeline-element-date"></span>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="vertical-timeline-item dot-success vertical-timeline-element">
                                                        <div>
                                                            <span class="vertical-timeline-element-icon bounce-in"></span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <h4 class="timeline-title">Build the production release
                                                                    <span class="badge badge-danger ml-2">NEW</span>
                                                                </h4>
                                                                <span class="vertical-timeline-element-date"></span>
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
                        <ul class="nav flex-column">
                            <li class="nav-item-divider nav-item"></li>
                            <li class="nav-item-btn text-center nav-item">
                                <!-- <button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">Ver los últimos cambios</button> -->
                                <a href="<?= FOLDER_PATH ?>/notifications" class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">Ver todas los notificaciones</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="dropdown">
                    <button type="button" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                        <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                            <span class="icon-wrapper-bg bg-focus"></span>
                            <span class="language-icon opacity-8 flag large ES" style="background: url('<?= FOLDER_PATH ?>/src/assets/media/images/ES.svg') no-repeat; background-size: 32px 32px;"></span>
                        </span>
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu dropdown-menu-right">
                        <div class="dropdown-menu-header">
                            <div class="dropdown-menu-header-inner pt-4 pb-4 bg-focus">
                                <div class="menu-header-image opacity-05" style="background-image: url('<?= FOLDER_PATH ?>/src/assets/media/images/city2.jpg');"></div>
                                <div class="menu-header-content text-center text-white">
                                    <h6 class="menu-header-subtitle mt-0"> Eligir idioma</h6>
                                </div>
                            </div>
                        </div>
                        <button type="button" tabindex="0" class="dropdown-item active">
                            <span class="mr-3 opacity-8 flag large ES" style="background: url('<?= FOLDER_PATH ?>/src/assets/media/images/ES.svg') no-repeat; background-size: 32px 32px;"></span>Spain
                        </button>
                        <button type="button" tabindex="0" class="dropdown-item">
                            <span class="mr-3 opacity-8 flag large US" style="background: url('<?= FOLDER_PATH ?>/src/assets/media/images/US.svg') no-repeat; background-size: 32px 32px;"></span> USA
                        </button>
                    </div>
                </div>
                <div class="dropdown">
                    <button type="button" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false" class="p-0 btn btn-link dd-chart-btn">
                        <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                            <span class="icon-wrapper-bg bg-success"></span>
                            <i class="icon text-success ion-ios-analytics"></i>
                        </span>
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                        <div class="dropdown-menu-header">
                            <div class="dropdown-menu-header-inner bg-premium-dark">
                                <div class="menu-header-image" style="background-image: url('<?= FOLDER_PATH ?>/src/assets/media/images/abstract4.jpg');"></div>
                                <div class="menu-header-content text-white">
                                    <h5 class="menu-header-title">Usuarios en línea</h5>
                                    <h6 class="menu-header-subtitle">Resumen de actividad de usuarios recientes</h6>
                                </div>
                            </div>
                        </div>
                        <div class="widget-chart">
                            <div class="widget-chart-content">
                                <div class="icon-wrapper rounded-circle">
                                    <div class="icon-wrapper-bg opacity-9 bg-focus"></div>
                                    <i class="lnr-users text-white"></i>
                                </div>
                                <div class="widget-numbers">
                                    <span>344.000</span>
                                </div>
                                <div class="widget-subheading pt-2">
                                    Vistas desde el último inicio de sesión
                                </div>
                                <div class="widget-description text-danger">
                                    <span class="pr-1"><span>176%</span></span>
                                    <i class="fa fa-arrow-left"></i>
                                </div>
                            </div>
                            <div class="widget-chart-wrapper">
                                <div id="dashboard-sparkline-carousel-3-pop"></div>
                            </div>
                        </div>
                        <ul class="nav flex-column">
                            <li class="nav-item-divider mt-0 nav-item"></li>
                            <li class="nav-item-btn text-center nav-item">
                                <button class="btn-shine btn-wide btn-pill btn btn-warning btn-sm">
                                    <i class="fa fa-cog fa-spin mr-2"></i>Ver detalles
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    <div class="rounded-image" alt="" style="background-image: url(<?php echo FOLDER_PATH . '/' . $this->session->get('image_user'); ?>);"></div>
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-menu-header">
                                        <div class="dropdown-menu-header-inner bg-info">
                                            <div class="menu-header-image opacity-2" style="background-image: url('<?= FOLDER_PATH ?>/src/assets/media/images/city3.jpg');"></div>
                                            <div class="menu-header-content text-left">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <div width="42" height="42" class="rounded-image" alt="" style="background-image: url(<?php echo FOLDER_PATH . '/' . $this->session->get('image_user'); ?>);"></div>
                                                        </div>
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading"><?php echo $this->session->get('Nombres'); ?></div>
                                                            <div class="widget-subheading opacity-8"><?php echo $this->session->get('especialidad'); ?></div>
                                                        </div>
                                                        <div class="widget-content-right mr-2">
                                                            <button id="btn-adm_close" class="btn-pill btn-shadow btn-shine btn btn-focus">&MediumSpace;Salir&MediumSpace;</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="scroll-area-xs" style="height: 150px;">
                                        <div class="scrollbar-container ps">
                                            <ul class="nav flex-column">
                                                <li class="nav-item-header nav-item">Mi cuenta</li>
                                                <li class="nav-item">
                                                    <a href="<?= FOLDER_PATH ?>/perfil" class="nav-link">Ver perfil
                                                        <!-- <div class="ml-auto badge badge-success">New</div> -->
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="<?= FOLDER_PATH ?>/change_password" class="nav-link">Cambiar contraseña</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="<?= FOLDER_PATH ?>/notifications" class="nav-link">Notificaciones
                                                        <div class="ml-auto badge badge-warning"> </div>
                                                    </a>
                                                </li>
                                                <!-- <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Administración
                                                        <div class="ml-auto badge badge-warning">512</div>
                                                    </a>
                                                </li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <ul class="nav flex-column">
                                        <li class="nav-item-divider mb-0 nav-item"></li>
                                    </ul>
                                    <div class="grid-menu grid-menu-2col">
                                        <div class="no-gutters row">
                                            <div class="col-sm-6">
                                                <button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-warning">
                                                    <i class="pe-7s-mail icon-gradient bg-amy-crisp btn-icon-wrapper mb-2"></i> Bandeja de entrada
                                                </button>
                                            </div>
                                            <div class="col-sm-6">
                                                <button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">
                                                    <i class="pe-7s-ticket icon-gradient bg-love-kiss btn-icon-wrapper mb-2"></i>
                                                    <b>Consultas</b>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left ml-3 header-user-info">
                            <div class="widget-heading"> <?php echo $this->session->get('Nombres'); ?> </div>
                            <div class="widget-subheading"> <?php echo $this->session->get('especialidad'); ?> </div>
                        </div>
                        <div class="widget-content-right header-user-info ml-3">
                            <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
</script>