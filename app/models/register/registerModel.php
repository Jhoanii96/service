<?php

class registerModel extends Model
{

    /* ----------------------------- CONSULTAS DE Combobox ----------------------------- */

    public function mostrar_especialidad()
    {

        $query = "select Id_Especialidad as id, Descripcion as nombre from especialidad;";
        $res = Model::query_execute($query);
        return $res;

    }

    public function mostrar_pais()
    {

        $query = "select Id_Pais as id, Descripcion as nombre from pais;";
        $res = Model::query_execute($query);
        return $res;
        
    }

    public function mostrar_departamento($idpais)
    {

        $query = "select * from v_departamento where idPais = $idpais;";
        $res = Model::query_execute($query);
        return $res;
        
    }

    public function mostrar_provincia($iddepartamento)
    {

        $query = "select * from v_provincia where idDepartamento = $iddepartamento;";
        $res = Model::query_execute($query);
        return $res;
        
    }
    
    public function mostrar_distrito($idprovincia)
    {

        $query = "select * from v_distrito where idProvincia = $idprovincia;";
        $res = Model::query_execute($query);
        return $res;
        
    }

    public function mostrar_usuario($nom_user)
    {

        $query = "select * from v_lista_doctor v where v.nombre like concat('%', '$nom_user', '%')";
        $res = Model::query_execute($query);
        return $res;
        
    }

    public function mostrar_codigo()
    {

        $query = "SELECT * FROM codigo_registro;";
        $res = Model::query_execute($query);
        return $res;
        
    }

    public function insertar_codigo($codigo)
    {

        $query = "CALL `insertar_codigo`('$codigo');";
        $res = Model::query_execute($query);
        return $res;
        
    }

    public function verificar_codigo($code)
    {
        $query = "SELECT nombre_codigo FROM codigo_registro WHERE nombre_codigo = '$code' AND codigo_usado = '0';";
        $res = Model::query_execute($query);
        return $res;
    }

    public function codigo_usado($code)
    {
        $query = "UPDATE `codigo_registro` SET `codigo_usado` = '1' WHERE `nombre_codigo` = '$code';";
        Model::query_execute($query);
    }

    public function insertar_registro($especialidad, $pais, $departamento, $provincia, $distrito, 
        $cmp, $dni, $nombre, $apellidop, $apellidom, $address1, $gen, $cellphone, 
        $fn, $price, $username, $new_password, $dconsulta, $email, $isactive, $fecha_activacion, $usersearch 
    )
    {
        $query = "CALL `insertar_registro`($especialidad, $pais, $departamento, $provincia, $distrito, 
            '$cmp', '$dni', '$nombre', '$apellidop', '$apellidom', '$address1', '$gen', 
            '$cellphone', '$fn', '$price', '$username', '$new_password', '$dconsulta', '$email', 
            $isactive, '$fecha_activacion', $usersearch);
        ";
        Model::query_execute($query);
    }

}
