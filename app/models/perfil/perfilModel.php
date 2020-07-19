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

    public function updateProfile($idUser,$idDoctor,$nombre,$apellidopa,$apellidoma,$especialidad,
        $dni,$cmp,$pais,$departamento,$provincia,$distrito,$telefono1,$telefono2,$celular1,
        $celular2,$precioconsulta,$tiempoatencion,$diapago,$image){

        // $query = "CALL updateProfile('$user','$nombre','$apellidopa','$apellidoma',
        //    $especialidad,'$dni','$cmp',$pais,$departamento,$provincia,
        //    $distrito,'$telefono1','$telefono2','$celular1','$celular2','$precioconsulta',
        //    $tiempoatencion,'$diapago')";
        // Model::query_execute($query);

        $queryUser ="UPDATE usuario 
                    SET
                    Dia_Pago = '$diapago',
                    Tiempo_Atencion_Promedio = $tiempoatencion,
                    Precio_Predeterminado = $precioconsulta,
                    imagen = '$image'
                    WHERE Id_Usuario = $idUser;";
        Model::query_execute($queryUser);

        $queryDoctor = "UPDATE doctor
                    SET
                    Id_Especialidad = $especialidad,
                    Id_Pais = $pais,
                    Id_Departamento = $departamento,
                    Id_Provincia = $provincia,
                    Id_Distrito = $distrito,
                    Documento = '$dni',
                    CMP = '$cmp',
                    Nombres = '$nombre',
                    Apellido_Paterno = '$apellidopa',
                    Apellido_Materno = '$apellidoma',
                    Telefono_Fijo01 = '$telefono1',
                    Telefono_Fijo02 = '$telefono2',
                    Celular01 = '$celular1',
                    Celular02 = '$celular2'  
                    WHERE Id_Doctor = $idDoctor;";
        Model::query_execute($queryDoctor);
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
