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


create PROCEDURE showPerfil(name VARCHAR(30))

BEGIN
SELECT Nombres,Apellido_Paterno,Apellido_Materno,es.Descripcion,Documento,CMP,pa.Descripcion,dep.Descripcion,
pro.Descripcion,dis.Descripcion,Telefono_Fijo01,Telefono_Fijo02,Celular01,Celular02,email01,Tiempo_Atencion_Promedio,Fecha_Registro,Monto_Pago FROM doctor doc INNER JOIN pais pa ON
doc.Id_Pais = pa.Id_Pais INNER JOIN provincia pro ON
pro.Id_Provincia = doc.Id_Provincia INNER JOIN departamento dep ON
dep.Id_Departamento = doc.Id_Departamento INNER JOIN usuario us ON
us.Id_Doctor = doc.Id_Doctor INNER JOIN especialidad es ON
es.Id_Especialidad = doc.Id_Especialidad INNER JOIN distrito dis ON
dis.ID_Distrito = doc.ID_Distrito WHERE us.Nombre = 'jhon' 
END



