
/* =============================================== VIEWS =============================================== */

CREATE VIEW `v_lista_citas` AS
select 
	ci.Id_Citas as id, 
    pa.Nombre as nombre, 
    pa.Apellido_Paterno as apepa, 
    pa.Apellido_Materno as apema, 
    pa.Fecha_Nacimiento as fenac, 
    ci.Fecha_Creacion as fecre, 
    ci.Estado as estado, 
    ci.Fecha_Cita as fechacita, 
    us.Nombre as username 
from citas ci 
inner join paciente pa 
on pa.Id_Paciente = ci.Id_Paciente 
inner join usuario us 
on us.Id_Usuario = ci.Id_Usuario 

CREATE VIEW `v_paciente` AS
    SELECT 
        `pa`.`Id_Paciente` AS `id`,
        `pa`.`Nombre` AS `nombre`,
        CONCAT(`pa`.`Apellido_Paterno`,
                ' ',
                `pa`.`Apellido_Materno`) AS `apellidos`,
        `pa`.`Fecha_Nacimiento` AS `fecha_nac`,
        `us`.`Nombre` AS `user_name`
    FROM
        (`paciente` `pa`
        JOIN `usuario` `us` ON ((`us`.`Id_Usuario` = `pa`.`Id_Usuario`)))

/* =============================================== PROCEDURE =============================================== */

DELIMITER $$
CREATE PROCEDURE `mostrar_lista_citas`(

	IN nombresearch varchar(60), 
    IN filter varchar(1), 
    IN user_name varchar(60) 

)
BEGIN
 
	if(filter = '0')
    then
		select * from v_lista_citas vlc where vlc.username = user_name order by vlc.fechacita desc;
    end if;

	if(filter = '1')
    then
		select * from v_lista_citas vlc 
		where 
        vlc.username = user_name and 
        concat(vlc.nombre, ' ', vlc.apepa, ' ', vlc.apema, ' ', vlc.dni) like concat('%', nombresearch, '%') 
		order by vlc.fechacita desc;
    end if;
    
    if(filter = '2')
    then
		select * from v_lista_citas vlc 
		where 
        vlc.username = user_name and 
        DATE_FORMAT(vlc.fechacita, "%Y-%m-%d") = nombresearch 
		order by vlc.fechacita desc;
    end if;

END$$

DELIMITER ;