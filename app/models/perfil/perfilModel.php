<?php

    class perfilModel extends Model
    {
		
		/* ----------------------------- CONSULTAS DE PERFIL ----------------------------- */

        // Actualizar perfil con imagen
        public function update_perfil(perfill $dataPerfil, $emPerfil){
            
            $query = "CALL actualizar_perfil(
                        '" . $dataPerfil->getNombre() . "', 
                        '" . $dataPerfil->getApellido() . "', 
                        '" . $dataPerfil->getDni() . "', 
                        '" . $dataPerfil->getCelular() . "', 
                        '" . $dataPerfil->getNacimiento() . "', 
                        '" . $dataPerfil->getFoto() . "', 
                        '" . $dataPerfil->getContrasena() . "',
                        '" . $emPerfil . "');";
            Model::query_execute($query);
            
        }

        // Actualizar perfil sin imagen
        public function update_perfilWi(perfill $dataPerfil, $emPerfil){
            
            $query = "CALL actualizar_perfilWi(
                        '" . $dataPerfil->getNombre() . "', 
                        '" . $dataPerfil->getApellido() . "', 
                        '" . $dataPerfil->getDni() . "', 
                        '" . $dataPerfil->getCelular() . "', 
                        '" . $dataPerfil->getNacimiento() . "', 
                        '" . $dataPerfil->getContrasena() . "',
                        '" . $emPerfil . "');";
            Model::query_execute($query);
            
        }

        public function mostrar_perfil($codPerfil){
            $query = "CALL mostrar_perfil('".$codPerfil."');";
            $res = Model::query_execute($query);
            return $res;
        }

        
    }

    
     
?>



