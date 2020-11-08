



ALTER VIEW `v_detalle_historia` AS
    SELECT 
        `hc`.`Id_historia_clinica` AS `id`,
        CONCAT(`pa`.`Nombre`,
                ' ',
                `pa`.`Apellido_Paterno`,
                ' ',
                `pa`.`Apellido_Materno`) AS `nombres`,
        `pa`.`Documento` AS `dni`,
        `pa`.`Genero` AS `genero`,
        `pa`.`Celular` AS `celular`,
        DATE_FORMAT(`pa`.`Fecha_Nacimiento`, '%d/%m/%Y') AS `fn`,
        `pa`.`Email` AS `email`,
        `pa`.`Procedencia` AS `procedencia`,
        `pa`.`Fecha_Nacimiento` AS `edad`,
        DATE_FORMAT(`hc`.`Fecha`, '%d/%m/%Y %h:%i:%s') AS `fecha_historia`,
        `hc`.`Diagnostico` AS `diag`,
        `hc`.`Examen_Fisico` AS `ex_fi`,
        `hc`.`Anamnesis` AS `anam`,
        `hc`.`Examenes` AS `exam`,
        DATE_FORMAT(`ci`.`Fecha_Creacion`,
                '%d/%m/%Y %h:%i:%s') AS `fcreacion`,
        DATE_FORMAT(`ci`.`Fecha_Cita`, '%d/%m/%Y %h:%i %p') AS `fcita`,
        `ci`.`Estado` AS `estado`,
        `ci`.`Atencion` AS `atencion`,
        `hc`.`Monto` AS `precio`,
        `hc`.`Tratamiento` AS `tratamiento`,
        (SELECT 
                COUNT(`ar`.`Id_Archivo`)
            FROM
                `archivo` `ar`
            WHERE
                ((`ar`.`Id_Historia_Clinica` = `hc`.`Id_historia_clinica`)
                    AND ((`ar`.`Id_Tipo_Archivo` = 1)
                    OR (`ar`.`Id_Tipo_Archivo` = 2)))) AS `count_image`,
        (SELECT 
                COUNT(`ar`.`Id_Archivo`)
            FROM
                `archivo` `ar`
            WHERE
                ((`ar`.`Id_Historia_Clinica` = `hc`.`Id_historia_clinica`)
                    AND (`ar`.`Id_Tipo_Archivo` = 3))) AS `count_pdf`,
        (SELECT 
                COUNT(`ar`.`Id_Archivo`)
            FROM
                `archivo` `ar`
            WHERE
                ((`ar`.`Id_Historia_Clinica` = `hc`.`Id_historia_clinica`)
                    AND (`ar`.`Id_Tipo_Archivo` = 4))) AS `count_doc`,
        `us`.`Nombre` AS `username`
    FROM
        (((`historia_clinica` `hc`
        JOIN `paciente` `pa` ON ((`pa`.`Id_Paciente` = `hc`.`Id_Paciente`)))
        LEFT JOIN `citas` `ci` ON ((`ci`.`Id_Citas` = `hc`.`Id_Cita`)))
        JOIN `usuario` `us` ON ((`us`.`Id_Usuario` = `hc`.`Id_Usuario`)))






ALTER VIEW `v_lista_archivo` AS 
SELECT 
        `ar`.`Id_Archivo` AS `id`,
        `ar`.`Subnombre` AS `name_archivo`,
        `ar`.`Enlace` AS `link`,
        `ar`.`Size` AS `ar_size`,
        DATE_FORMAT(`ar`.`FechaCreado`, '%d/%m/%Y %h:%i:%s') AS `fecha_subido`,
        `ta`.`Id_Tipo_Archivo` AS `tipo`,
        `ta`.`Nombre` AS `tipo_archivo`,
        `ar`.`Id_Historia_Clinica` AS `Id_Historia_Clinica`,
        `us`.`Nombre` AS `username`
    FROM
        ((`archivo` `ar`
        LEFT JOIN `tipo_archivo` `ta` ON ((`ta`.`Id_Tipo_Archivo` = `ar`.`Id_Tipo_Archivo`)))
        JOIN `usuario` `us` ON ((`us`.`Id_Usuario` = `ar`.`CreadoPor`)))
    WHERE
        (`ar`.`Borrado` = 0)












DELIMITER $$
CREATE PROCEDURE `actualizar_password`(

	IN user varchar(60),
	IN newpass varchar(50) 

)
BEGIN

	select @iduser := Id_Usuario from usuario where Nombre = user;

	UPDATE `usuario`
	SET
	`Password` = newpass
	WHERE `Id_Usuario` = @iduser;

END$$
DELIMITER ;











DELIMITER $$

CREATE TRIGGER insert_espacio_usuario
    AFTER INSERT
    ON archivo FOR EACH ROW
BEGIN
    
    select Id_Espacio_Usuario into @idespacio from espacio_usuario where Id_Usuario = new.CreadoPor; 
    
    select count(Id_Archivo) into @cantidad from archivo where CreadoPor = new.CreadoPor; 
    select sum(Size) into @espacio_usado from archivo where CreadoPor = new.CreadoPor; 
    
    UPDATE `espacio_usuario`
	SET
    `Cantidad` = @cantidad, 
	`Espacio_Usado` = @espacio_usado 
	WHERE `Id_Espacio_Usuario` = @idespacio;
    
END$$    

DELIMITER ;
 

DELIMITER $$

CREATE TRIGGER cantidad_historia_usuario
    AFTER INSERT
    ON historia_clinica FOR EACH ROW
BEGIN
    
    select Id_Usuario into @idusuario from historia_clinica where Id_Usuario = new.Id_historia_clinica; 
    
    select count(Id_historia_clinica) into @cantidad_historia from historia_clinica where Id_Usuario = @idusuario; 
    
    UPDATE `usuario`
	SET
	`Cantidad_Historia_Clinica` = @cantidad_historia 
	WHERE `Id_Usuario` = @idusuario; 

    
END$$    

DELIMITER ;