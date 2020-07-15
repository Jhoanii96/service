<?php

class perfilModel extends Model
{

    /* ----------------------------- CONSULTAS DE PERFIL ----------------------------- */

    // Actualizar perfil con imagen
    public function update_perfil(perfill $dataPerfil, $emPerfil)
    {

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
    public function update_perfilWi(perfill $dataPerfil, $emPerfil)
    {

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

    public function mostrar_perfil($codPerfil)
    {
        $query = "CALL mostrar_perfil($codPerfil);";
        $res = Model::query_execute($query);
        return $res;
    }

    public function getStateProfile($user)
    {
        $query = "SELECT us.estado_perfil FROM usuario us WHERE us.Nombre = '" . $user . "';";
        $res = Model::query_execute($query);
        return $res;
    }

    public function updateStateProfile($user)
    {
        $query = "UPDATE usuario SET estado_perfil = 0 WHERE Nombre = '" . $user . "';";
        $res = Model::query_execute($query);
        return $res;
    }

    public function showProfile($user)
    {
        $query = "CALL showProfile('" . $user . "');";
        $res = Model::query_execute($query);
        return $res;
    }

    public function updateProfile($user,$nombre,$apellidopa,$apellidoma,$especialidad,
        $dni,$cmp,$pais,$departamento,$provincia,$distrito,$telefono1,$telefono2,$celular1,
        $celular2,$precioconsulta,$tiempoatencion,$diapago){

        $query = "CALL updateProfile('$user','$nombre','$apellidopa','$apellidoma',
           $especialidad,'$dni','$cmp',$pais,$departamento,$provincia,
           $distrito,'$telefono1','$telefono2','$celular1','$celular2','$precioconsulta',
           $tiempoatencion,'$diapago')";
        Model::query_execute($query);
    }

    /* public function updateProfile(
        $user,
        $nombre,
        $apellidopa,
        $apellidoma,
        $especialidad,
        $dni,
        $pais
    ) {

        $query = "CALL updateProfile('$user','$nombre','$apellidopa','$apellidoma',$especialidad,'$dni',$pais)";
        Model::query_execute($query);
    } */
}
