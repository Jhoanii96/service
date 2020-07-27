/* ========================== VIEW | Mostrar datos usuario ========================== */
CREATE VIEW `v_perfil` AS
select 

	dc.Id_Doctor as id, 
    dc.Nombres as nombre, 
    dc.Apellido_Paterno as ape_paterno, 
    dc.Apellido_Materno as ape_materno, 
    dc.Documento as dni, 
    es.Descripcion as especialidad, 
    dc.CMP as cmp, 
    (if(dc.Sexo = 'M', 'Masculino', if(dc.Sexo = 'F', 'Femenino', 'Otros'))) as genero, 
    dc.Celular01 as celular1, 
    dc.Celular02 as celular2, 
    dc.Telefono_Fijo01 as telefono1, 
    dc.Telefono_Fijo02 as telefono2, 
    dc.Direccion as domicilio, 
    dc.Fecha_Nacimiento as fecha, 
    
    us.Nombre as username, 
    us.Password as pass, 
    dc.email01 as correo, 
    us.Fecha_Registro as fecharegistro, 
    us.Dia_Pago as fechapago, 
    us.imagen as foto, 
    
    pa.Descripcion as pais, 
    de.Descripcion as departamento, 
    pr.Descripcion as provincia, 
    di.Descripcion as distrito, 
    us.Direccion as diratencion, 
    us.Direccion_IP as dirip, 
    us.Ubicacion_GPS as gpsmaps, 
    
    us.Tiempo_Atencion_Promedio as tiempoatencion, 
    us.Precio_Predeterminado as precioconsulta, 
    us.Dia_Pago as diapago, 
    
    dc.Facebook as facebook, 
    dc.Twitter as twitter, 
    dc.Linkedin as linkedin 
from doctor dc 
inner join especialidad es 
on es.Id_Especialidad = dc.Id_Especialidad 
inner join usuario us 
on us.Id_Doctor = dc.Id_Doctor 
inner join pais pa 
on pa.Id_Pais = dc.Id_Pais 
inner join departamento de 
on de.Id_Departamento = dc.Id_Departamento 
inner join provincia pr 
on pr.Id_Provincia = dc.Id_Provincia 
inner join distrito di 
on di.Id_Distrito = dc.Id_Distrito 

/* ========================== PROCEDURE | Mostrar datos usuario ========================== */

CREATE PROCEDURE `mostrar_perfil` (

	IN user_name varchar(60)

)
BEGIN

	select * from v_perfil vp where vp.username = user_name; 

END
