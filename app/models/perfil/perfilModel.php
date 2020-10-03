<?php

class perfilModel extends Model
{

    /* ----------------------------- CONSULTAS DE PERFIL ----------------------------- */


    public function mostrar_perfil($codPerfil)
    {
        $query = "CALL mostrar_perfil('$codPerfil');";
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

    public function updateProfile(
        $idUser,
        $idDoctor,
        $nombre,
        $apellidopa,
        $apellidoma,
        $especialidad,
        $dni,
        $cmp,
        $pais,
        $departamento,
        $provincia,
        $distrito,
        $telefono1,
        $telefono2,
        $celular1,
        $celular2,
        $precioconsulta,
        $diapago,
        $dont_edit_photo,
        $image
    ) {

        $query = "CALL actualizar_perfil($idUser,$idDoctor,'$nombre','$apellidopa',
            '$apellidoma',$especialidad,'$dni','$cmp',$pais,$departamento,$provincia,
            $distrito,'$telefono1','$telefono2','$celular1','$celular2','$precioconsulta',
            '$diapago','$dont_edit_photo','$image')";
        Model::query_execute($query);
    }

    public function showUserImage($idUser)
    {
        $query = "SELECT imagen FROM usuario WHERE Id_Usuario = $idUser";
        $res = Model::query_execute($query);
        return $res;
    }

    public function ActualizarPerfil_1($celphone1, $celphone2, $telefono1, $telefono2, $domicilio, $username)
    {
        $query = "CALL actualizar_perfil_personal('$celphone1', '$celphone2', '$telefono1', '$telefono2', '$domicilio', '$username')";
        Model::query_execute($query);
    }

    public function ActualizarPerfil_2($email, $precio, $link_image, $username, $isnotimage)
    {
        $query = "CALL actualizar_perfil_cuenta('$email', '$precio', '$link_image', '$username', '$isnotimage')";
        Model::query_execute($query);
    }

    public function ActualizarPerfil_3($address, $username)
    {
        $query = "CALL actualizar_perfil_ubicacion('$address', '$username')";
        Model::query_execute($query);
    }
    public function fecha_habilitado($idUser)
    {
        $query = "SELECT us.Mensaje_Habilitado as activo, us.Fecha_Habilitado as fecha FROM usuario us WHERE us.Nombre = '$idUser'";
        return Model::query_execute($query);
    }
}
