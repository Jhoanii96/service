<?php

class homeModel extends Model
{
    
    public function load_datauser($admin){
        $query = "CALL `cargar_tipousuario`('" . $admin . "');";
        $res = Model::query_execute($query);
        return $res;
    }

    public function load_dataUserHome($idUsu){
        $query = "select id, nombre, apellido, nombreTipo, foto from v_usuario usu where usu.email = '" . $idUsu . "';";
        $res = Model::query_execute($query);
        return $res;
    }


    /* --------- CONSULTAS ADMINISTRADOR Y TECNICO PAG. PRINCIPAL --------- */

    // formulario principal
    public function show_tprincipal(string $estado)
    {

        $query = "select * from v_tincidencias_ap where recibo = 1 and estado like concat('%', '" . $estado . "', '%') order by nums desc;";
        $res = Model::query_execute($query);
        return $res;

    }

    public function show_tincidencias(string $estado)
    {

        $query = "select * from v_tincidencias_ap where recibo = 1 and estado like concat('%', '" . $estado . "', '%');";
        $res = Model::query_execute($query);
        return $res;

    }

    /* --------------------------- CONSULTAS PAG. PRINCIPAL --------------------------- */


    public function show_num_pendientes()
    {

        $query = "select * from `v_numero_solicitud`;";
        $res = Model::query_execute($query);
        return $res;

    }

    public function show_en_linea()
    {

        $query = "select * from `v_numero_online`;";
        $res = Model::query_execute($query);
        return $res;

    }

    public function show_miembros_total()
    {

        $query = "select * from `v_numero_usuario`;";
        $res = Model::query_execute($query);
        return $res;

    }

    public function show_nuevos_usuario()
    {

        $query = "select count(num_nuevo_usu) as num_nuevo_usu from `v_numero_nuevo_usuario`;";
        $res = Model::query_execute($query);
        return $res;

    }

    /* --------------------------- CONSULTAS PAG. NOTIFICACIONES --------------------------- */

    public function show_bell_notifications()
    {

        $query = "select * from `v_bell_notificacion`;";
        $res = Model::query_execute($query);
        return $res;

    }

    public function show_bell_notificationsAdmin(int $Num)
    {

        $query = "select * from `v_bell_notificacion` where `destino` = " . $Num . ";";
        $res = Model::query_execute($query);
        return $res;

    }



}

