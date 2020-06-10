<?php

    require ROOT . FOLDER_PATH . "/" . DATA . "admin/autoload" . DATAI . "php";
    require ROOT . FOLDER_PATH . "/system/libs/Session.php";

    class perfil extends Controller 
    {
        private $session;

        public function index() {

            include(ROOT . FOLDER_PATH . "/app/controllers/data_sesion" . DATAI . "php");

            $this->dataPerfil = new dataAdmin();

            if (isset($_POST['update']) && !empty($_POST['update'])) {
                $update = $_POST['update'];
            } else {
                $update = "";
            }
            
            # editamos organizador segun el dato que pase como parámetro
            
            if($update == "true"){
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $dni = $_POST['dni'];
                $contact_point = $_POST['contact_point'];
                $correo = $_POST['correo'];
                $nacimiento = $_POST['date'];
                // comprobación de cambios en la imagen
                @$textimage = $_POST['textImage'];
                    
                $code = $this->session->get('usuarioUsi');
                @$password = $_POST['password'];

                if(@$password != '' || @$password != NULL) {
                    $password = base64_encode($password);
                } else {
                    $password = "";
                }
                    
                if ($textimage == NULL || $textimage == '') {
                    
                    $encapsuPerfil = new perfill($firstName, $lastName, $dni, 
                        $contact_point, $nacimiento, "", $password);
                
                    $this->dataPerfil->actualizarPerfilWi($encapsuPerfil, $code);
                        
                } else {
                    $file_name = date("m"."d"."y") . date("h"."i"."s".microtime(TRUE)) . "." . basename($_FILES['image']['type']);
                    $file_type = $_FILES['image']['type'];
                    $file_size = $_FILES['image']['size'];
                        
                    $file_tmp =$_FILES['image']['tmp_name'];
                    
                    $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/media/image/perfil/';
                    move_uploaded_file($file_tmp, $imagen_destino.$file_name);
                    $imagen_bd = '/src/assets/media/image/perfil/' . $file_name;
                        
                    $encapsuPerfil = new perfill($firstName, $lastName, $dni, 
                    $contact_point, $nacimiento, $imagen_bd, $password);
                    
                    $this->dataPerfil->actualizarPerfil($encapsuPerfil, $code);
                }
                    
                sleep(1);
                echo("<script>location.href = '" . FOLDER_PATH . "/perfil';</script>");
                    
            } else {
                $this->allDatos_usu = $this->dataPerfil->mostrarEditarPerfil($this->session->get('usuarioUsi'));
                $this->BellNtf = $this->dataPerfil->BellNotifications();
                $this->AdminView('perfil/perfil', [
                    'nombre' => $this->datos_usu['nombre'], 
                    'apellido' => $this->datos_usu['apellido'], 
                    'tipouser' => $this->datos_usu['nombreTipo'], 
                    'online' => 'online', 
                    'foto' => $this->datos_usu['foto'], 
                    'BellNtf' => $this->BellNtf, 
                    'datos_perfil' => $this->allDatos_usu
                ]);
            }

            

            

        }
/* 
        public function perfil($link = '', $data = '')
		{
            
            
        } */
    }

    
?>