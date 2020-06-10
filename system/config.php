<?php

/* Para obtener el 'Identificador Unifore de Recursos' */
define('URI', $_SERVER['REQUEST_URI']);

/* Para el Autoload */
define('CORE', 'system/core/');
define('DEFAULT_CONTROLLER', 'home');

/* Para la ruta de los controladores */
define('PATH_CONTROLLERS', 'app/controllers/');

/* define('PATH_VIEWS','app/views'); */
define('PATH_VIEWS', 'service/app/views/');
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

/* Para el nombre del folder principal */
define('FOLDER_PATH', '/service');
define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);
define('HELPER_PATH', 'system/helper/');

/* Para la BD */
/* define('SGBD', 'mysql:host=localhost;dbname=bdservicios;charset=utf8');
define('USER', 'root');
define('PASS', '123456');
define('ERROR_REPORTING_LEVEL', -1); */

/* AUTOLOAD DATA */
define('DATA', 'app/data/');
