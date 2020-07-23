CREATE PROCEDURE `insertarPerfil`
(
    `nameUSER` VARCHAR(20),
	`nombre` VARCHAR(20),
    `apellidoPA` VARCHAR(20),
    `apellidoMA` VARCHAR(20),
    `especialidad` INT,
    `dni` CHAR(8),
    `provincia` INT,
    `departamento` INT,
    `distrito` INT,
    `correo` CHAR(50),
    `contraseña` VARCHAR(50),
    `cmp` CHAR(6),
    `telefono1` VARCHAR(20),
    `celular1` VARCHAR(20),
    `tap` INT,
    `pcp` INT,
    `diaPago` DATETIME,
)
BEGIN
    SELECT * FROM doctor do INNER JOIN pais pa ON
    do.Id_Pais = pa.Id_Pais INNER JOIN provincia pro ON
    pro.Id_Provincia = do.Id_Provincia INNER JOIN departamento dep ON
    dep.Id_Departamento = do.Id_Departamento INNER JOIN 
    
    UPDATE INTO usuario(Id_Especialidad,Id_Departamento,Id_Provincia,ID_Distrito,) VALUES()

END

create view showPerfil AS


/* PROCEDIMIENTO PARA MOSTRAR PERFIL*/

create PROCEDURE showPerfil(name VARCHAR(30))

SELECT Nombres,Apellido_Paterno,Apellido_Materno,es.Descripcion,Documento,CMP,pa.Descripcion,dep.Descripcion,
pro.Descripcion,dis.Descripcion,Telefono_Fijo01,Telefono_Fijo02,Celular01,Celular02,email01,Tiempo_Atencion_Promedio,
Fecha_Registro,Monto_Pago FROM doctor doc INNER JOIN pais pa ON
doc.Id_Pais = pa.Id_Pais INNER JOIN provincia pro ON
pro.Id_Provincia = doc.Id_Provincia INNER JOIN departamento dep ON
dep.Id_Departamento = doc.Id_Departamento INNER JOIN usuario us ON
us.Id_Doctor = doc.Id_Doctor INNER JOIN especialidad es ON
es.Id_Especialidad = doc.Id_Especialidad INNER JOIN distrito dis ON
dis.ID_Distrito = doc.ID_Distrito WHERE us.Nombre = name 


/* PROCEDIMIENTO PARA ACTUALIZAR PERFIL*/

create procedure updateProfile(
    user varchar(40),
    nombre varchar(80),
    apellidoPA varchar(80),
    apellidoMA varchar(80),
    especialidad varchar(50),
    dni char(8),
    cmp varchar(10),
    pais int,
    departamento int,
    provincia int,
    distrito int,
    telefono1 varchar(20),
    telefono2 varchar(20),
    celular1 varchar(20),
    celular2 varchar(20),
    precioconsulta int,
    tiempoatencion int,
    diapago datetime
)

UPDATE doctor doc INNER JOIN pais pa ON
doc.Id_Pais = pa.Id_Pais INNER JOIN provincia pro ON
pro.Id_Provincia = doc.Id_Provincia INNER JOIN departamento dep ON
dep.Id_Departamento = doc.Id_Departamento INNER JOIN usuario us ON
us.Id_Doctor = doc.Id_Doctor INNER JOIN especialidad es ON
es.Id_Especialidad = doc.Id_Especialidad INNER JOIN distrito dis ON
dis.ID_Distrito = doc.ID_Distrito
SET doc.Nombres = nombre,Apellido_Paterno = apellidoPA,Apellido_Materno = apellidoMA,
especialidad = es.Descripcion,Documento = dni,CMP = cmp,doc.Id_Pais = pais,doc.Id_Departamento = departamento,
doc.Id_Provincia = provincia,doc.Id_Distrito = provincia,Telefono_Fijo01 = telefono1,Telefono_Fijo02 = telefono2,
Celular01 = celular1,Celular02 = celular2,Monto_Pago = precioconsulta,
Tiempo_Atencion_Promedio = tiempoatencion,Dia_Pago = diapago WHERE us.Nombre = user;

/* PROCEDIMIENTO PARA ACTUALIZAR PERFIL  VERSION  DE SHON  */
CREATE PROCEDURE `updateProfile`(

	user varchar(40),
    nombre varchar(80),
    apellidoPA varchar(80),
    apellidoMA varchar(80),
    especialidad int,
    dni char(8),
    cmp varchar(10),
    pais int,
    departamento int,
    provincia int,
    distrito int,
    telefono1 varchar(20),
    telefono2 varchar(20),
    celular1 varchar(20),
    celular2 varchar(20),
    precioconsulta float,
    tiempoatencion int,
    diapago date
	
)
BEGIN

	declare iddoctor int;
    declare idusuario int;

	SELECT @iddoctor := d.Id_Doctor FROM doctor d WHERE d.Documento = dni; 
    SELECT @idusuario := u.Id_Usuario FROM usuario u WHERE u.Nombre = user; 

	UPDATE `doctor`
	SET
	`Id_Especialidad` = especialidad,
	`Id_Pais` = pais,
	`Id_Departamento` = departamento,
	`Id_Provincia` = provincia,
	`Id_Distrito` = distrito,
	`Documento` = dni,
	`CMP` = cmp,
	`Nombres` = nombre,
	`Apellido_Paterno` = apellidoPA,
	`Apellido_Materno` = apellidoMA,
	`Telefono_Fijo01` = telefono1,
	`Telefono_Fijo02` = telefono2,
	`Celular01` = celular1,
	`Celular02` = celular2  
	WHERE `Documento` = @iddoctor;
	
    UPDATE `usuario` 
	SET
	`Monto_Pago` = precioconsulta,
	`Dia_Pago` = diapago,
	`Tiempo_Atencion_Promedio` = tiempoatencion,
	`Precio_Predeterminado` = precioconsulta 
	WHERE `Id_Usuario` = @idusuario;
	
END

/*UPDATE PROFILE 2.0*/

CREATE PROCEDURE updateProfile(

	idUser int,
    idDoctor int,
    nombre varchar(80),
    apellidoPA varchar(80),
    apellidoMA varchar(80),
    especialidad int,
    dni char(8),
    cmp varchar(10),
    pais int,
    departamento int,
    provincia int,
    distrito int,
    telefono1 varchar(20),
    telefono2 varchar(20),
    celular1 varchar(20),
    celular2 varchar(20),
    precioconsulta float,
    tiempoatencion int,
    diapago date
	
)

BEGIN

    UPDATE usuario 
	SET
	Monto_Pago = precioconsulta,
	Dia_Pago = diapago,
	Tiempo_Atencion_Promedio = tiempoatencion,
	Precio_Predeterminado = precioconsulta WHERE Id_Usuario = idUser;

    UPDATE doctor
	SET
	Id_Especialidad = especialidad,
	Id_Pais = pais,
	Id_Departamento = departamento,
	Id_Provincia = provincia,
	Id_Distrito = distrito,
	Documento = dni,
	CMP = cmp,
	Nombres = nombre,
	Apellido_Paterno = apellidoPA,
	Apellido_Materno = apellidoMA,
	Telefono_Fijo01 = telefono1,
	Telefono_Fijo02 = telefono2,
	Celular01 = celular1,
	Celular02 = celular2  WHERE Id_Doctor = idDoctor;
END


/*PROCEDIMIENTO PARA MOSTRAR LAS PREGUNTAS DE CADA DOCTOR*/

CREATE PROCEDURE getQuestionnaire(
    idUser int 
)

SELECT pa.Documento,pa.Nombre,pa.Apellido_Paterno,pa.Apellido_Materno,de.Pregunta 
FROM cuestionario cu INNER JOIN detalle_cuestionario de ON
de.Id_Cuestionario = cu.Id_Cuestionario INNER JOIN detalle_cuestionario_paciente decupa ON 
decupa.Id_Detalle_cuestionario = de.Id_Detalle_cuestionario INNER JOIN paciente pa ON
pa.Id_Paciente = decupa.Id_Paciente
WHERE cu.Id_Usuario = idUser













-- UPDATE usuario  
-- UPDATE doctor SET , WHERE 


SELECT pa.Id_Pais,pa.Descripcion,dep.Id_Departamento,dep.Descripcion,pro.Id_Provincia,pro.Descripcion,
dis.Id_Distrito,dis.Descripcion FROM pais pa inner join departamento dep ON
pa.Id_Pais = dep.Id_Pais inner join provincia pro ON
dep.Id_Departamento = pro.Id_Departamento inner join distrito dis ON
pro.Id_Provincia = dis.Id_Provincia



/*TRIGGER PARA ACTUALIZAR CANTIDAD DE PREGUNTAS INSERTADAS*/

CREATE TRIGGER sumaPreguntas AFTER INSERT ON detalle_cuestionario
FOR EACH ROW

    BEGIN
        UPDATE cuestionario 
            SET cant_preguntas = cant_preguntas+1 
        WHERE  Id_cuestionario = NEW.Id_Detalle_cuestionario
    END

CREATE TRIGGER restaPreguntas AFTER DELETE ON detalle_cuestionario
FOR EACH ROW

    UPDATE cuestionario 
       SET cant_preguntas = IF(cant_preguntas > 0 ,cant_preguntas-1,0)
    	WHERE  Id_Cuestionario = old.Id_Cuestionario