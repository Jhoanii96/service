<?php

class registerModel extends Model
{

    /* ----------------------------- CONSULTAS DE Combobox ----------------------------- */

    public function mostrar_especialidad()
    {

        $query = "select Id_Especialidad as id, Descripcion as nombre from Especialidad;";
        $res = Model::query_execute($query);
        return $res;

    }

    public function mostrar_pais()
    {

        $query = "select Id_Pais as id, Descripcion as nombre from Pais;";
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

        $query = "select * from v_lista_usuario v where v.nombre like concat('%', '$nom_user', '%')";
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
        $query = "SELECT nombre_codigo FROM codigo_registro WHERE nombre_codigo = '$code';";
        $res = Model::query_execute($query);
        return $res;
    }

}
