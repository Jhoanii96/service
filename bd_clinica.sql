-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2020 a las 18:45:04
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_clinica`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getQuestionnaire` (IN `idUser` INT)  SELECT de.Pregunta FROM cuestionario cu INNER JOIN detalle_cuestionario de ON
de.Id_Cuestionario = cu.Id_Cuestionario WHERE 
cu.Id_Usuario = idUser$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_codigo` (IN `codigo` VARCHAR(6))  BEGIN

	INSERT INTO `codigo_registro`
	(`nombre_codigo`, 
    `codigo_usado`, 
	`fecha_codigo`)
	VALUES
	(codigo,
    '0', 
	NOW());

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_registro` (IN `especialidad` INT, IN `pais` INT, IN `departamento` INT, IN `provincia` INT, IN `distrito` INT, IN `cmp` VARCHAR(10), IN `dni` VARCHAR(10), IN `nombre` VARCHAR(80), IN `apellidop` VARCHAR(50), IN `apellidom` VARCHAR(50), IN `address1` VARCHAR(200), IN `gen` VARCHAR(1), IN `cellphone` VARCHAR(20), IN `fn` DATE, IN `price` DECIMAL(18,2), IN `username` VARCHAR(300), IN `new_password` VARCHAR(50), IN `dconsulta` VARCHAR(200), IN `email` VARCHAR(200), IN `isactive` TINYINT, IN `fecha_activacion` DATE, IN `usersearch` INT)  BEGIN
	
	INSERT INTO `doctor`
	(`Id_Especialidad`, `Id_Pais`, `Id_Departamento`, `Id_Provincia`, `Id_Distrito`,
	`Documento`, `CMP`, `Nombres`, `Apellido_Paterno`, `Apellido_Materno`, `Direccion`,
	`Sexo`, `Celular01`, `email01`, `Fecha_Nacimiento`)
	VALUES
	(especialidad, pais, departamento, provincia, distrito, 
	dni, cmp, nombre, apellidop, apellidom, address1, 
	gen, cellphone, email, fn);
    
    SELECT @iddoctor := Id_Doctor FROM doctor WHERE Documento = dni; 
    
    INSERT INTO `usuario`
	(`Id_Doctor`, `Nombre`, `Password`, `Direccion`, `Activo`, `Fecha_Activacion`, `Fecha_Habilitado`,
	`Monto_Pago`, `Fecha_Registro`)
	VALUES
	(@iddoctor, username, new_password, dconsulta, isactive, fecha_activacion, fecha_activacion, 
	price, NOW());
    
    
    if(usersearch != -1)
    then 
		INSERT INTO `referencia_usuario`
		(`Id_Usuario`,
		`Id_Usuario_Referencia`,
		`Fecha_Registro`)
		VALUES
		(@iddoctor,
		usersearch,
		NOW());
        
	end if;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showProfile` (IN `name` VARCHAR(30) CHARSET utf8)  SELECT us.Id_Usuario,doc.Id_Doctor,doc.Nombres,doc.Apellido_Paterno,doc.Apellido_Materno,es.Descripcion as especialidad,Documento,CMP,pa.Descripcion as pais,dep.Descripcion as departamento,pro.Descripcion as provincia,dis.Descripcion as distrito, doc.Telefono_Fijo01,doc.Telefono_Fijo02,doc.Celular01,doc.Celular02,email01,us.Tiempo_Atencion_Promedio,us.Dia_Pago,us.Precio_Predeterminado,us.Password FROM doctor doc INNER JOIN pais pa ON
doc.Id_Pais = pa.Id_Pais INNER JOIN provincia pro ON
pro.Id_Provincia = doc.Id_Provincia INNER JOIN departamento dep ON
dep.Id_Departamento = doc.Id_Departamento INNER JOIN usuario us ON
us.Id_Doctor = doc.Id_Doctor INNER JOIN especialidad es ON
es.Id_Especialidad = doc.Id_Especialidad INNER JOIN distrito dis ON
dis.ID_Distrito = doc.ID_Distrito WHERE us.Nombre = name$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo_registro`
--

CREATE TABLE `codigo_registro` (
  `id_codigo` int(11) NOT NULL,
  `nombre_codigo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codigo_usado` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_codigo` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `codigo_registro`
--

INSERT INTO `codigo_registro` (`id_codigo`, `nombre_codigo`, `codigo_usado`, `fecha_codigo`) VALUES
(1, 'FKR0X0', '1', '2020-07-03 18:18:15'),
(2, 'NJE4W7', '1', '2020-07-03 18:22:41'),
(3, 'ZXM5U7', '1', '2020-07-03 18:25:02'),
(4, 'EYT60O', '1', '2020-07-03 18:26:22'),
(5, '3BA4MQ', '1', '2020-07-03 18:32:23'),
(6, '33WN2K', '1', '2020-07-03 18:36:34'),
(7, 'OXKPLR', '1', '2020-07-03 18:40:27'),
(8, 'A2KC2A', '1', '2020-07-03 18:41:53'),
(9, 'NGHAJ5', '1', '2020-07-03 18:44:52'),
(10, 'MDVEG0', '1', '2020-07-03 18:45:46'),
(11, 'UB22E2', '1', '2020-07-03 18:47:11'),
(12, '2PW88E', '1', '2020-07-03 18:49:01'),
(13, '2EP9G4', '1', '2020-07-03 18:49:51'),
(14, 'C696E8', '1', '2020-07-03 18:50:54'),
(15, 'MDLBEP', '1', '2020-07-03 18:52:25'),
(16, 'BDR404', '1', '2020-07-03 18:53:42'),
(17, '5YDHAD', '1', '2020-07-03 18:55:58'),
(18, 'T3MU74', '1', '2020-07-03 18:58:48'),
(19, 'OPN08Q', '1', '2020-07-03 19:41:33'),
(20, '1X1III', '1', '2020-07-03 19:41:56'),
(21, 'PZ26NX', '1', '2020-07-03 19:42:14'),
(22, 'WPOO63', '1', '2020-07-05 16:41:50'),
(23, 'E4QCIU', '1', '2020-07-05 16:46:33'),
(24, 'AJ4NJK', '1', '2020-07-05 16:51:04'),
(25, '9CVDD4', '1', '2020-07-05 17:03:09'),
(26, 'JFH41H', '0', '2020-07-05 17:19:35'),
(27, 'ADVRC1', '1', '2020-07-05 17:29:40'),
(28, '7238P3', '1', '2020-07-05 17:35:16'),
(29, 'D99KM3', '1', '2020-07-05 17:51:17'),
(30, 'O9NX5R', '1', '2020-07-05 19:04:18'),
(31, 'YKZI7K', '1', '2020-07-05 19:11:28'),
(32, '7OCKG8', '1', '2020-07-05 19:17:16'),
(33, '2RTPGQ', '1', '2020-07-05 19:31:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario`
--

CREATE TABLE `cuestionario` (
  `Id_Cuestionario` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  `cant_preguntas` int(11) NOT NULL DEFAULT 0,
  `estado_crear_mas` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuestionario`
--

INSERT INTO `cuestionario` (`Id_Cuestionario`, `Id_Usuario`, `Fecha_creacion`, `cant_preguntas`, `estado_crear_mas`) VALUES
(24, 1, '2020-07-17 01:18:08', 4, 0),
(26, 2, '2020-07-17 02:36:07', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `Id_Departamento` int(11) NOT NULL,
  `Id_Pais` int(11) NOT NULL,
  `Descripcion` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Cod_Sunat` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`Id_Departamento`, `Id_Pais`, `Descripcion`, `Cod_Sunat`) VALUES
(1, 1, 'AMAZONAS', '01'),
(2, 1, 'ANCASH', '02'),
(3, 1, 'APURIMAC', '03'),
(4, 1, 'AREQUIPA', '04'),
(5, 1, 'AYACUCHO', '05'),
(6, 1, 'CAJAMARCA', '06'),
(7, 1, 'CUSCO', '08'),
(8, 1, 'HUANCAVELICA', '09'),
(9, 1, 'HUANUCO', '10'),
(10, 1, 'ICA', '11'),
(11, 1, 'JUNIN', '12'),
(12, 1, 'LA LIBERTAD', '13'),
(13, 1, 'LAMBAYEQUE', '14'),
(14, 1, 'LORETO', '16'),
(15, 1, 'MADRE DE DIOS', '17'),
(16, 1, 'MOQUEGUA', '18'),
(17, 1, 'PASCO', '19'),
(18, 1, 'PIURA', '20'),
(19, 1, 'PUNO', '21'),
(20, 1, 'UCAYALI', '25'),
(21, 1, 'SAN MARTIN', '22'),
(22, 1, 'TACNA', '23'),
(23, 1, 'LIMA', '15'),
(24, 1, 'TUMBES', '24'),
(25, 1, 'PROV. CONST. DEL CALLAO', '07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cuestionario`
--

CREATE TABLE `detalle_cuestionario` (
  `Id_Detalle_Cuestionario` int(11) NOT NULL,
  `Id_Cuestionario` int(11) NOT NULL,
  `Pregunta` varchar(40) DEFAULT NULL,
  `respuesta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_cuestionario`
--

INSERT INTO `detalle_cuestionario` (`Id_Detalle_Cuestionario`, `Id_Cuestionario`, `Pregunta`, `respuesta`) VALUES
(22, 24, 'tabaco', NULL),
(95, 24, '123456', NULL),
(96, 24, '4548484', NULL),
(97, 24, 'pregunta 1', NULL),
(116, 26, 'SIDA', NULL);

--
-- Disparadores `detalle_cuestionario`
--
DELIMITER $$
CREATE TRIGGER `restaPreguntas` AFTER DELETE ON `detalle_cuestionario` FOR EACH ROW UPDATE cuestionario 
       SET cant_preguntas = cant_preguntas-1
    	WHERE  Id_Cuestionario = old.Id_Cuestionario
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `sumaPreguntas` AFTER INSERT ON `detalle_cuestionario` FOR EACH ROW UPDATE cuestionario 
            SET cant_preguntas = cant_preguntas+1 
        WHERE  Id_Cuestionario = NEW.Id_Cuestionario
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cuestionario_paciente`
--

CREATE TABLE `detalle_cuestionario_paciente` (
  `Id_Cuestionario_Paciente` int(11) NOT NULL,
  `Id_Detalle_Cuestionario` int(11) NOT NULL,
  `Respuesta` varchar(20) NOT NULL,
  `Id_Paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `Id_Distrito` int(11) NOT NULL,
  `Id_Departamento` int(11) NOT NULL,
  `Id_Provincia` int(11) NOT NULL,
  `Descripcion` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Cod_Sunat` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`Id_Distrito`, `Id_Departamento`, `Id_Provincia`, `Descripcion`, `Cod_Sunat`) VALUES
(1, 1, 1, 'CHACHAPOYAS', '010101'),
(2, 1, 1, 'ASUNCI?N', '010102'),
(3, 1, 1, 'BALSAS', '010103'),
(4, 1, 1, 'CHETO', '010104'),
(5, 1, 1, 'CHILIQU?N', '010105'),
(6, 1, 1, 'CHUQUIBAMBA', '010106'),
(7, 1, 1, 'GRANADA', '010107'),
(8, 1, 1, 'HUANCAS', '010108'),
(9, 1, 1, 'LAJALCA', '010109'),
(10, 1, 1, 'LEIMEBAMBA', '010110'),
(11, 1, 1, 'LEVANTO', '010111'),
(12, 1, 1, 'MAGDALENA', '010112'),
(13, 1, 1, 'MARISCALCASTILLA', '010113'),
(14, 1, 1, 'MOLINOPAMPA', '010114'),
(15, 1, 1, 'MONTEVIDEO', '010115'),
(16, 1, 1, 'OLLEROS', '010116'),
(17, 1, 1, 'QUINJALCA', '010117'),
(18, 1, 1, 'SANFRANCISCODEDAGUAS', '010118'),
(19, 1, 1, 'SANISIDRODEMAINO', '010119'),
(20, 1, 1, 'SOLOCO', '010120'),
(21, 1, 1, 'SONCHE', '010121'),
(22, 1, 2, 'BAGUA', '010201'),
(23, 1, 2, 'ARAMANGO', '010202'),
(24, 1, 2, 'COPALLIN', '010203'),
(25, 1, 2, 'ELPARCO', '010204'),
(26, 1, 2, 'IMAZA', '010205'),
(27, 1, 2, 'LAPECA', '010206'),
(28, 1, 3, 'JUMBILLA', '010301'),
(29, 1, 3, 'CHISQUILLA', '010302'),
(30, 1, 3, 'CHURUJA', '010303'),
(31, 1, 3, 'COROSHA', '010304'),
(32, 1, 3, 'CUISPES', '010305'),
(33, 1, 3, 'FLORIDA', '010306'),
(34, 1, 3, 'JAZ?N', '010307'),
(35, 1, 3, 'RECTA', '010308'),
(36, 1, 3, 'SANCARLOS', '010309'),
(37, 1, 3, 'SHIPASBAMBA', '010310'),
(38, 1, 3, 'VALERA', '010311'),
(39, 1, 3, 'YAMBRASBAMBA', '010312'),
(40, 1, 4, 'NIEVA', '010401'),
(41, 1, 4, 'ELCENEPA', '010402'),
(42, 2, 5, 'HUARAZ', '020101'),
(43, 2, 5, 'COCHABAMBA', '020102'),
(44, 2, 5, 'COLCABAMBA', '020103'),
(45, 2, 5, 'HUANCHAY', '020104'),
(46, 2, 5, 'INDEPENDENCIA', '020105'),
(47, 2, 5, 'JANGAS', '020106'),
(48, 2, 5, 'LALIBERTAD', '020107'),
(49, 2, 5, 'OLLEROS', '010116'),
(50, 2, 5, 'PAMPAS', '020109'),
(51, 2, 5, 'PARIACOTO', '020110'),
(52, 2, 5, 'PIRA', '020111'),
(53, 2, 5, 'TARICA', '020112'),
(54, 2, 6, 'AIJA', '020201'),
(55, 2, 6, 'CORIS', '020202'),
(56, 2, 6, 'HUACLL?N', '020203'),
(57, 2, 6, 'LAMERCED', '020204'),
(58, 2, 6, 'SUCCHA', '020205'),
(59, 2, 7, 'LLAMELL?N', '020301'),
(60, 2, 7, 'ACZO', '020302'),
(61, 2, 7, 'CHACCHO', '020303'),
(62, 2, 7, 'CHINGAS', '020304'),
(63, 2, 7, 'MIRGAS', '020305'),
(64, 2, 7, 'SANJUANDERONTOY', '020306'),
(65, 2, 8, 'CHACAS', '020401'),
(66, 2, 8, 'ACOCHACA', '020402'),
(67, 2, 9, 'CHIQUI?N', '020501'),
(68, 2, 9, 'ABELARDOPARDOLEZAMETA', '020502'),
(69, 2, 9, 'ANTONIORAYMONDI', '020503'),
(70, 2, 9, 'AQUIA', '020504'),
(71, 2, 9, 'CAJACAY', '020505'),
(72, 2, 9, 'CANIS', '020506'),
(73, 2, 9, 'COLQUIOC', '020507'),
(74, 2, 9, 'HUALLANCA', '020508'),
(75, 2, 9, 'HUASTA', '020509'),
(76, 2, 9, 'HUAYLLACAY?N', '020510'),
(77, 2, 9, 'LAPRIMAVERA', '020511'),
(78, 2, 9, 'MANGAS', '020512'),
(79, 2, 9, 'PACLL?N', '020513'),
(80, 2, 9, 'SANMIGUELDECORPANQUI', '020514'),
(81, 2, 9, 'TICLLOS', '020515'),
(82, 3, 10, 'ABANCAY', '030101'),
(83, 3, 10, 'CHACOCHE', '030102'),
(84, 3, 10, 'CIRCA', '030103'),
(85, 3, 10, 'CURAHUASI', '030104'),
(86, 3, 10, 'HUANIPACA', '030105'),
(87, 3, 10, 'LAMBRAMA', '030106'),
(88, 3, 10, 'PICHIRHUA', '030107'),
(89, 3, 10, 'SANPEDRODECACHORA', '030108'),
(90, 3, 10, 'TAMBURCO', '030109'),
(91, 3, 11, 'ANDAHUAYLAS', '030201'),
(92, 3, 11, 'ANDARAPA', '030202'),
(93, 3, 11, 'CHIARA', '030203'),
(94, 3, 11, 'HUANCARAMA', '030204'),
(95, 3, 11, 'HUANCARAY', '030205'),
(96, 3, 11, 'HUAYANA', '030206'),
(97, 3, 11, 'KISHUARA', '030207'),
(98, 3, 11, 'PACOBAMBA', '030208'),
(99, 3, 11, 'PACUCHA', '030209'),
(100, 3, 11, 'PAMPACHIRI', '030210'),
(101, 3, 11, 'POMACOCHA', '030211'),
(102, 3, 11, 'SANANTONIODECACHI', '030212'),
(103, 3, 11, 'SANJER?NIMO', '010518'),
(104, 3, 11, 'SANMIGUELDECHACCRAMPA', '030214'),
(105, 3, 11, 'SANTAMAR?ADECHICMO', '030215'),
(106, 3, 11, 'TALAVERA', '030216'),
(107, 3, 11, 'TUMAYHUARACA', '030217'),
(108, 3, 11, 'TURPO', '030218'),
(109, 3, 11, 'KAQUIABAMBA', '030219'),
(110, 3, 12, 'ANTABAMBA', '030301'),
(111, 3, 12, 'ELORO', '030302'),
(112, 3, 12, 'HUAQUIRCA', '030303'),
(113, 3, 12, 'JUANESPINOZAMEDRANO', '030304'),
(114, 3, 12, 'OROPESA', '030305'),
(115, 3, 12, 'PACHACONAS', '030306'),
(116, 3, 12, 'SABAINO', '030307'),
(117, 3, 13, 'CHALHUANCA', '030401'),
(118, 3, 13, 'CAPAYA', '030402'),
(119, 3, 13, 'CARAYBAMBA', '030403'),
(120, 3, 13, 'CHAPIMARCA', '030404'),
(121, 3, 13, 'COLCABAMBA', '020103'),
(122, 3, 13, 'COTARUSE', '030406'),
(123, 3, 13, 'HUAYLLO', '030407'),
(124, 3, 13, 'JUSTOAPUSAHUARAURA', '030408'),
(125, 3, 13, 'LUCRE', '030409'),
(126, 3, 13, 'POCOHUANCA', '030410'),
(127, 3, 13, 'SANJUANDECHAC?A', '030411'),
(128, 3, 13, 'SA?AYCA', '030412'),
(129, 3, 13, 'SORAYA', '030413'),
(130, 3, 13, 'TAPAIRIHUA', '030414'),
(131, 3, 13, 'TINTAY', '030415'),
(132, 3, 13, 'TORAYA', '030416'),
(133, 3, 13, 'YANACA', '030417'),
(134, 3, 14, 'TAMBOBAMBA', '030501'),
(135, 3, 14, 'COTABAMBAS', '030502'),
(136, 3, 14, 'COYLLURQUI', '030503'),
(137, 3, 14, 'HAQUIRA', '030504'),
(138, 3, 14, 'MARA', '030505'),
(139, 3, 14, 'CHALLHUAHUACHO', '030506'),
(140, 3, 15, 'CHINCHEROS', '030601'),
(141, 3, 15, 'ANCO-HUALLO', '030602'),
(142, 3, 15, 'COCHARCAS', '030603'),
(143, 3, 15, 'HUACCANA', '030604'),
(144, 3, 15, 'OCOBAMBA', '030605'),
(145, 3, 15, 'ONGOY', '030606'),
(146, 3, 15, 'URANMARCA', '030607'),
(147, 3, 15, 'RANRACANCHA', '030608'),
(148, 3, 16, 'CHUQUIBAMBILLA', '030701'),
(149, 3, 16, 'CURPAHUASI', '030702'),
(150, 3, 16, 'GAMARRA', '030703'),
(151, 3, 16, 'HUAYLLATI', '030704'),
(152, 3, 16, 'MAMARA', '030705'),
(153, 3, 16, 'MICAELABASTIDAS', '030706'),
(154, 3, 16, 'PATAYPAMPA', '030707'),
(155, 3, 16, 'PROGRESO', '030708'),
(156, 3, 16, 'SANANTONIO', '030709'),
(157, 3, 16, 'SANTAROSA', '010610'),
(158, 3, 16, 'TURPAY', '030711'),
(159, 3, 16, 'VILCABAMBA', '030712'),
(160, 3, 16, 'VIRUNDO', '030713'),
(161, 3, 16, 'CURASCO', '030714'),
(162, 3, 16, 'CURASCO', '030714'),
(163, 4, 17, 'AREQUIPA', '040101'),
(164, 4, 17, 'ALTOSELVAALEGRE', '040102'),
(165, 4, 17, 'CAYMA', '040103'),
(166, 4, 17, 'CERROCOLORADO', '040104'),
(167, 4, 17, 'CHARACATO', '040105'),
(168, 4, 17, 'CHIGUATA', '040106'),
(169, 4, 17, 'JACOBOHUNTER', '040107'),
(170, 4, 17, 'LAJOYA', '040108'),
(171, 4, 17, 'MARIANOMELGAR', '040109'),
(172, 4, 17, 'MIRAFLORES', '040110'),
(173, 4, 17, 'MOLLEBAYA', '040111'),
(174, 4, 17, 'PAUCARPATA', '040112'),
(175, 4, 17, 'POCSI', '040113'),
(176, 4, 17, 'POLOBAYA', '040114'),
(177, 4, 17, 'QUEQUE?A', '040115'),
(178, 4, 17, 'SABANDIA', '040116'),
(179, 4, 17, 'SACHACA', '040117'),
(180, 4, 17, 'SANJUANDESIGUAS', '040118'),
(181, 4, 17, 'SANJUANDETARUCANI', '040119'),
(182, 4, 17, 'SANTAISABELDESIGUAS', '040120'),
(183, 4, 17, 'SANTARITADESIGUAS', '040121'),
(184, 4, 17, 'SOCABAYA', '040122'),
(185, 4, 17, 'TIABAYA', '040123'),
(186, 4, 17, 'UCHUMAYO', '040124'),
(187, 4, 17, 'VITOR', '040125'),
(188, 4, 17, 'YANAHUARA', '040126'),
(189, 4, 17, 'YARABAMBA', '040127'),
(190, 4, 17, 'YURA', '040128'),
(191, 4, 17, 'JOS?LUISBUSTAMANTEYRIVERO', '040129'),
(192, 4, 18, 'CAMAN?', '040201'),
(193, 4, 18, 'JOS?MAR?AQUIMPER', '040202'),
(194, 4, 18, 'MARIANONICOL?SVALC?RCEL', '040203'),
(195, 4, 18, 'MARISCALC?CERES', '040204'),
(196, 4, 18, 'NICOL?SDEPI?ROLA', '040205'),
(197, 4, 18, 'OCO?A', '040206'),
(198, 4, 18, 'QUILCA', '040207'),
(199, 4, 18, 'SAMUELPASTOR', '040208'),
(200, 4, 19, 'CARAVEL', '040301'),
(201, 4, 19, 'ACARI', '040302'),
(202, 4, 19, 'ATICO', '040303'),
(203, 4, 19, 'ATIQUIPA', '040304'),
(204, 4, 19, 'BELLAUNI?N', '040305'),
(205, 4, 19, 'CAHUACHO', '040306'),
(206, 4, 19, 'CHALA', '040307'),
(207, 4, 19, 'CHAPARRA', '040308'),
(208, 4, 19, 'HUANUHUANU', '040309'),
(209, 4, 19, 'JAQUI', '040310'),
(210, 4, 19, 'LOMAS', '040311'),
(211, 4, 19, 'QUICACHA', '040312'),
(212, 4, 19, 'YAUCA', '040313'),
(213, 4, 20, 'APLAO', '040401'),
(214, 4, 20, 'ANDAGUA', '040402'),
(215, 4, 20, 'AYO', '040403'),
(216, 4, 20, 'CHACHAS', '040404'),
(217, 4, 20, 'CHILCAYMARCA', '040405'),
(218, 4, 20, 'CHOCO', '040406'),
(219, 4, 20, 'HUANCARQUI', '040407'),
(220, 4, 20, 'MACHAGUAY', '040408'),
(221, 4, 20, 'ORCOPAMPA', '040409'),
(222, 4, 20, 'PAMPACOLCA', '040410'),
(223, 4, 20, 'TIP?N', '040411'),
(224, 4, 20, 'U??N', '040412'),
(225, 4, 20, 'URACA', '040413'),
(226, 4, 20, 'VIRACO', '040414'),
(227, 4, 21, 'CHIVAY', '040501'),
(228, 4, 21, 'ACHOMA', '040502'),
(229, 4, 21, 'CABANACONDE', '040503'),
(230, 4, 21, 'CALLALLI', '040504'),
(231, 4, 21, 'CAYLLOMA', '040505'),
(232, 4, 21, 'COPORAQUE', '040506'),
(233, 4, 21, 'HUAMBO', '010604'),
(234, 4, 21, 'HUANCA', '040508'),
(235, 4, 21, 'ICHUPAMPA', '040509'),
(236, 4, 21, 'LARI', '040510'),
(237, 4, 21, 'LLUTA', '040511'),
(238, 4, 21, 'MACA', '040512'),
(239, 4, 21, 'MADRIGAL', '040513'),
(240, 4, 21, 'SANANTONIODECHUCA', '040514'),
(241, 4, 21, 'SIBAYO', '040515'),
(242, 4, 21, 'TAPAY', '040516'),
(243, 4, 21, 'TISCO', '040517'),
(244, 4, 21, 'TUTI', '040518'),
(245, 4, 21, 'YANQUE', '040519'),
(246, 4, 21, 'MAJES', '040520'),
(247, 4, 22, 'CHUQUIBAMBA', '010106'),
(248, 4, 22, 'ANDARAY', '040602'),
(249, 4, 22, 'CAYARANI', '040603'),
(250, 4, 22, 'CHICHAS', '040604'),
(251, 4, 22, 'IRAY', '040605'),
(252, 4, 22, 'R?OGRANDE', '040606'),
(253, 4, 22, 'SALAMANCA', '040607'),
(254, 4, 22, 'YANAQUIHUA', '040608'),
(255, 4, 23, 'MOLLENDO', '040701'),
(256, 4, 23, 'COCACHACRA', '040702'),
(257, 4, 23, 'DEANVALDIVIA', '040703'),
(258, 4, 23, 'ISLAY', '040704'),
(259, 4, 23, 'MEJ?A', '040705'),
(260, 4, 23, 'PUNTADEBOMB?N', '040706'),
(261, 4, 24, 'COTAHUASI', '040801'),
(262, 4, 24, 'ALCA', '040802'),
(263, 4, 24, 'CHARCANA', '040803'),
(264, 4, 24, 'HUAYNACOTAS', '040804'),
(265, 4, 24, 'PAMPAMARCA', '040805'),
(266, 4, 24, 'PUYCA', '040806'),
(267, 4, 24, 'QUECHUALLA', '040807'),
(268, 4, 24, 'SAYLA', '040808'),
(269, 4, 24, 'TAURIA', '040809'),
(270, 4, 24, 'TOMEPAMPA', '040810'),
(271, 4, 24, 'TORO', '040811'),
(272, 5, 25, 'AYACUCHO', '050101'),
(273, 5, 25, 'ACOCRO', '050102'),
(274, 5, 25, 'ACOSVINCHOS', '050103'),
(275, 5, 25, 'CARMENALTO1/', '050104'),
(276, 5, 25, 'CHIARA', '030203'),
(277, 5, 25, 'OCROS', '021401'),
(278, 5, 25, 'PACAYCASA', '050107'),
(279, 5, 25, 'QUINUA', '050108'),
(280, 5, 25, 'SANJOS?DETICLLAS', '050109'),
(281, 5, 25, 'SANJUANBAUTISTA', '050110'),
(282, 5, 25, 'SANTIAGODEPISCHA', '050111'),
(283, 5, 25, 'SOCOS', '050112'),
(284, 5, 25, 'TAMBILLO', '050113'),
(285, 5, 25, 'VINCHOS', '050114'),
(286, 5, 25, 'JES?SNAZARENO', '050115'),
(287, 5, 26, 'CANGALLO', '050201'),
(288, 5, 26, 'CHUSCHI', '050202'),
(289, 5, 26, 'LOSMOROCHUCOS', '050203'),
(290, 5, 26, 'MAR?APARADODEBELLIDO', '050204'),
(291, 5, 26, 'PARAS', '050205'),
(292, 5, 26, 'TOTOS', '050206'),
(293, 5, 27, 'SANCOS', '050301'),
(294, 5, 27, 'CARAPO', '050302'),
(295, 5, 27, 'SACSAMARCA', '050303'),
(296, 5, 27, 'SANTIAGODELUCANAMARCA', '050304'),
(297, 5, 28, 'HUANTA', '050401'),
(298, 5, 28, 'AYAHUANCO', '050402'),
(299, 5, 28, 'HUAMANGUILLA', '050403'),
(300, 5, 28, 'IGUAIN', '050404'),
(301, 5, 28, 'LURICOCHA', '050405'),
(302, 5, 28, 'SANTILLANA', '050406'),
(303, 5, 28, 'SIVIA', '050407'),
(304, 5, 28, 'LLOCHEGUA', '050408'),
(305, 5, 29, 'SANMIGUEL', '050501'),
(306, 5, 29, 'ANCO', '050502'),
(307, 5, 29, 'AYNA', '050503'),
(308, 5, 29, 'CHILCAS', '050504'),
(309, 5, 29, 'CHUNGUI', '050505'),
(310, 5, 29, 'LUISCARRANZA', '050506'),
(311, 5, 29, 'SANTAROSA', '010610'),
(312, 5, 29, 'TAMBO', '050508'),
(313, 5, 29, 'SAMUGARI', 'NULL'),
(314, 5, 30, 'PUQUIO', '050601'),
(315, 5, 30, 'AUCARA', '050602'),
(316, 5, 30, 'CABANA', '021501'),
(317, 5, 30, 'CARMENSALCEDO', '050604'),
(318, 5, 30, 'CHAVI?A', '050605'),
(319, 5, 30, 'CHIPAO', '050606'),
(320, 5, 30, 'HUAC-HUAS', '050607'),
(321, 5, 30, 'LARAMATE', '050608'),
(322, 5, 30, 'LEONCIOPRADO', '050609'),
(323, 5, 30, 'LLAUTA', '050610'),
(324, 5, 30, 'LUCANAS', '050611'),
(325, 5, 30, 'OCA?A', '050612'),
(326, 5, 30, 'OTOCA', '050613'),
(327, 5, 30, 'SAISA', '050614'),
(328, 5, 30, 'SANCRIST?BAL', '010516'),
(329, 5, 30, 'SANJUAN', '021909'),
(330, 5, 30, 'SANPEDRO', '021409'),
(331, 5, 30, 'SANPEDRODEPALCO', '050618'),
(332, 5, 30, 'SANCOS', '050301'),
(333, 5, 30, 'SANTAANADEHUAYCAHUACHO', '050620'),
(334, 5, 30, 'SANTALUC?A', '050621'),
(335, 5, 31, 'CORACORA', '050701'),
(336, 5, 31, 'CHUMPI', '050702'),
(337, 5, 31, 'CORONELCASTA?EDA', '050703'),
(338, 5, 31, 'PACAPAUSA', '050704'),
(339, 5, 31, 'PULLO', '050705'),
(340, 5, 31, 'PUYUSCA', '050706'),
(341, 5, 31, 'SANFRANCISCODERAVACAYCO', '050707'),
(342, 5, 31, 'UPAHUACHO', '050708'),
(343, 5, 32, 'PAUSA', '050801'),
(344, 5, 32, 'COLTA', '050802'),
(345, 5, 32, 'CORCULLA', '050803'),
(346, 5, 32, 'LAMPA', '050804'),
(347, 5, 32, 'MARCABAMBA', '050805'),
(348, 5, 32, 'OYOLO', '050806'),
(349, 5, 32, 'PARARCA', '050807'),
(350, 5, 32, 'SANJAVIERDEALPABAMBA', '050808'),
(351, 5, 32, 'SANJOS?DEUSHUA', '050809'),
(352, 5, 32, 'SARASARA', '050810'),
(353, 5, 33, 'QUEROBAMBA', '050901'),
(354, 5, 33, 'BEL?NCHALCOS', '050902'),
(355, 5, 33, 'CHILCAYOC', '050904'),
(356, 5, 33, 'HUACA?A', '050905'),
(357, 5, 33, 'MORCOLLA', '050906'),
(358, 5, 33, 'PAICO', '050907'),
(359, 5, 33, 'SANPEDRODELARCAY', '050908'),
(360, 5, 33, 'SANSALVADORDEQUIJE', '050909'),
(361, 5, 33, 'SANTIAGODEPAUCARAY', '050910'),
(362, 5, 33, 'SORAS', '050911'),
(363, 5, 34, 'HUANCAPI', '051001'),
(364, 5, 34, 'ALCAMENCA', '051002'),
(365, 5, 34, 'APONGO', '051003'),
(366, 5, 34, 'ASQUIPATA', '051004'),
(367, 5, 34, 'CANARIA', '051005'),
(368, 5, 34, 'CAYARA', '051006'),
(369, 5, 34, 'COLCA', '051007'),
(370, 5, 34, 'HUAMANQUIQUIA', '051008'),
(371, 5, 34, 'HUANCARAYLLA', '051009'),
(372, 5, 34, 'HUAYA', '051010'),
(373, 5, 34, 'SARHUA', '051011'),
(374, 5, 34, 'VILCANCHOS', '051012'),
(375, 5, 35, 'VILCASHUAM?N', '051101'),
(376, 5, 35, 'ACCOMARCA', '051102'),
(377, 5, 35, 'CARHUANCA', '051103'),
(378, 5, 35, 'CONCEPCI?N', '051104'),
(379, 5, 35, 'HUAMBALPA', '051105'),
(380, 5, 35, 'INDEPENDENCIA', '020105'),
(381, 5, 35, 'SAURAMA', '051107'),
(382, 5, 35, 'VISCHONGO', '051108'),
(383, 6, 36, 'CAJAMARCA', '060101'),
(384, 6, 36, 'ASUNCI?N', '010102'),
(385, 6, 36, 'CHETILLA', '060103'),
(386, 6, 36, 'COSP?N', '060104'),
(387, 6, 36, 'ENCA?ADA', '060105'),
(388, 6, 36, 'JES?S', '060106'),
(389, 6, 36, 'LLACANORA', '060107'),
(390, 6, 36, 'LOSBA?OSDELINCA', '060108'),
(391, 6, 36, 'MAGDALENA', '010112'),
(392, 6, 36, 'MATARA', '060110'),
(393, 6, 36, 'NAMORA', '060111'),
(394, 6, 36, 'SANJUAN', '021909'),
(395, 6, 37, 'CAJABAMBA', '060201'),
(396, 6, 37, 'CACHACHI', '060202'),
(397, 6, 37, 'CONDEBAMBA', '060203'),
(398, 6, 37, 'SITACOCHA', '060204'),
(399, 6, 38, 'CELEND?N', '060301'),
(400, 6, 38, 'CHUMUCH', '060302'),
(401, 6, 38, 'CORTEGANA', '060303'),
(402, 6, 38, 'HUASM?N', '060304'),
(403, 6, 38, 'JORGECH?VEZ', '060305'),
(404, 6, 38, 'JOS?G?LVEZ', '060306'),
(405, 6, 38, 'MIGUELIGLESIAS', '060307'),
(406, 6, 38, 'OXAMARCA', '060308'),
(407, 6, 38, 'SOROCHUCO', '060309'),
(408, 6, 38, 'SUCRE', '060310'),
(409, 6, 38, 'UTCO', '060311'),
(410, 6, 38, 'LALIBERTADDEPALL?N', '060312'),
(411, 6, 39, 'CHOTA', '060401'),
(412, 6, 39, 'ANGUIA', '060402'),
(413, 6, 39, 'CHADIN', '060403'),
(414, 6, 39, 'CHIGUIRIP', '060404'),
(415, 6, 39, 'CHIMB?N', '060405'),
(416, 6, 39, 'CHOROPAMPA', '060406'),
(417, 6, 39, 'COCHABAMBA', '020102'),
(418, 6, 39, 'CONCH?N', '060408'),
(419, 6, 39, 'HUAMBOS', '060409'),
(420, 6, 39, 'LAJAS', '060410'),
(421, 6, 39, 'LLAMA', '021305'),
(422, 6, 39, 'MIRACOSTA', '060412'),
(423, 6, 39, 'PACCHA', '060413'),
(424, 6, 39, 'PION', '060414'),
(425, 6, 39, 'QUEROCOTO', '060415'),
(426, 6, 39, 'SANJUANDELICUPIS', '060416'),
(427, 6, 39, 'TACABAMBA', '060417'),
(428, 6, 39, 'TOCMOCHE', '060418'),
(429, 6, 39, 'CHALAMARCA', '060419'),
(430, 6, 40, 'CONTUMAZ?', '060501'),
(431, 6, 40, 'CHILETE', '060502'),
(432, 6, 40, 'CUPISNIQUE', '060503'),
(433, 6, 40, 'GUZMANGO', '060504'),
(434, 6, 40, 'SANBENITO', '060505'),
(435, 6, 40, 'SANTACRUZDETOLED', '060506'),
(436, 6, 40, 'TANTARICA', '060507'),
(437, 6, 40, 'YON?N', '060508'),
(438, 6, 41, 'CUTERVO', '060601'),
(439, 6, 41, 'CALLAYUC', '060602'),
(440, 6, 41, 'CHOROS', '060603'),
(441, 6, 41, 'CUJILLO', '060604'),
(442, 6, 41, 'LARAMADA', '060605'),
(443, 6, 41, 'PIMPINGOS', '060606'),
(444, 6, 41, 'QUEROCOTILLO', '060607'),
(445, 6, 41, 'SANANDR?SDECUTERVO', '060608'),
(446, 6, 41, 'SANJUANDECUTERVO', '060609'),
(447, 6, 41, 'SANLUISDELUCMA', '060610'),
(448, 6, 41, 'SANTACRUZ', '021208'),
(449, 6, 41, 'SANTODOMINGODELACAPILLA', '060612'),
(450, 6, 41, 'SANTOTOM?S', '010521'),
(451, 6, 41, 'SOCOTA', '060614'),
(452, 6, 41, 'TORIBIOCASANOVA', '060615'),
(453, 6, 42, 'BAMBAMARCA', '060701'),
(454, 6, 42, 'CHUGUR', '060702'),
(455, 6, 42, 'HUALGAYOC', '060703'),
(456, 6, 43, 'JA?N', '060801'),
(457, 6, 43, 'BELLAVISTA', '060802'),
(458, 6, 43, 'CHONTALI', '060803'),
(459, 6, 43, 'COLASAY', '060804'),
(460, 6, 43, 'HUABAL', '060805'),
(461, 6, 43, 'LASPIRIAS', '060806'),
(462, 6, 43, 'POMAHUACA', '060807'),
(463, 6, 43, 'PUCAR?', '060808'),
(464, 6, 43, 'SALLIQUE', '060809'),
(465, 6, 43, 'SANFELIPE', '060810'),
(466, 6, 43, 'SANJOS?DELALTO', '060811'),
(467, 6, 43, 'SANTAROSA', '010610'),
(468, 6, 44, 'SANIGNACIO', '060901'),
(469, 6, 44, 'CHIRINOS', '060902'),
(470, 6, 44, 'HUARANGO', '060903'),
(471, 6, 44, 'LACOIPA', '060904'),
(472, 6, 44, 'NAMBALLE', '060905'),
(473, 6, 44, 'SANJOS?DELOURDES', '060906'),
(474, 6, 44, 'TABACONAS', '060907'),
(475, 6, 45, 'PEDROG?LVEZ', '061001'),
(476, 6, 45, 'CHANCAY', '061002'),
(477, 6, 45, 'EDUARDOVILLANUEVA', '061003'),
(478, 6, 45, 'GREGORIOPITA', '061004'),
(479, 6, 45, 'ICHOC?N', '061005'),
(480, 6, 45, 'JOS?MANUELQUIROZ', '061006'),
(481, 6, 45, 'JOS?SABOGAL', '061007'),
(482, 6, 46, 'SANMIGUEL', '050501'),
(483, 6, 46, 'BOL?VARCALQUIS', 'NULL'),
(484, 6, 46, 'CATILLUCEL', '061104'),
(485, 6, 46, 'PRADOLA', 'NULL'),
(486, 6, 46, 'FLORIDA', '010306'),
(487, 6, 46, 'LLAPA', '061107'),
(488, 6, 46, 'NANCHOC', '061108'),
(489, 6, 46, 'NIEPOS', '061109'),
(490, 6, 46, 'SANGREGORIO', '061110'),
(491, 6, 46, 'SANSILVESTREDECOCH?N', '061111'),
(492, 6, 46, 'TONGOD', '061112'),
(493, 6, 46, 'UNI?NAGUABLANCA', '061113'),
(494, 6, 47, 'SANPABLO', '061201'),
(495, 6, 47, 'SANBERNARDINO', '061202'),
(496, 6, 47, 'SANLUIS', '020701'),
(497, 6, 47, 'TUMBAD?N', '061204'),
(498, 6, 48, 'SANTACRUZ', '021208'),
(499, 6, 48, 'ANDABAMBA', '061302'),
(500, 6, 48, 'CATACHE', '061303'),
(501, 6, 48, 'CHANCAYBA?OS', '061304'),
(502, 6, 48, 'LAESPERANZA', '061305'),
(503, 6, 48, 'NINABAMBA', '061306'),
(504, 6, 48, 'PUL?N', '061307'),
(505, 6, 48, 'SAUCEPAMPA', '061308'),
(506, 6, 48, 'SEXI', '061309'),
(507, 6, 48, 'UTICYACU', '061310'),
(508, 6, 48, 'YAUYUC?N', '061311'),
(509, 7, 49, 'CUSCO', '080101'),
(510, 7, 49, 'CCORCA', '080102'),
(511, 7, 49, 'POROY', '080103'),
(512, 7, 49, 'SANJER?NIMO', '010518'),
(513, 7, 49, 'SANSEBASTI?N', '080105'),
(514, 7, 49, 'SANTIAGO', '080106'),
(515, 7, 49, 'SAYLLA', '080107'),
(516, 7, 49, 'WANCHAQ', '080108'),
(517, 7, 50, 'ACOMAYO', '080201'),
(518, 7, 50, 'ACOPIA', '080202'),
(519, 7, 50, 'ACOS', '080203'),
(520, 7, 50, 'MOSOCLLACTA', '080204'),
(521, 7, 50, 'POMACANCHI', '080205'),
(522, 7, 50, 'RONDOC?N', '080206'),
(523, 7, 50, 'SANGARARA', '080207'),
(524, 7, 51, 'ANTA', '020604'),
(525, 7, 51, 'ANCAHUASI', '080302'),
(526, 7, 51, 'CACHIMAYO', '080303'),
(527, 7, 51, 'CHINCHAYPUJIO', '080304'),
(528, 7, 51, 'HUAROCONDO', '080305'),
(529, 7, 51, 'LIMATAMBO', '080306'),
(530, 7, 51, 'MOLLEPATA', '080307'),
(531, 7, 51, 'PUCYURA', '080308'),
(532, 7, 51, 'ZURITE', '080309'),
(533, 7, 52, 'CALCA', '080401'),
(534, 7, 52, 'COYA', '080402'),
(535, 7, 52, 'LAMAY', '080403'),
(536, 7, 52, 'LARES', '080404'),
(537, 7, 52, 'PISAC', '080405'),
(538, 7, 52, 'SANSALVADOR', '080406'),
(539, 7, 52, 'TARAY', '080407'),
(540, 7, 52, 'YANATILE', '080408'),
(541, 7, 53, 'YANAOCA', '080501'),
(542, 7, 53, 'CHECCA', '080502'),
(543, 7, 53, 'KUNTURKANKI', '080503'),
(544, 7, 53, 'LANGUI', '080504'),
(545, 7, 53, 'LAYO', '080505'),
(546, 7, 53, 'PAMPAMARCA', '040805'),
(547, 7, 53, 'QUEHUE', '080507'),
(548, 7, 53, 'T?PACAMARU', '080508'),
(549, 7, 54, 'SICUANI', '080601'),
(550, 7, 54, 'CHECACUPE', '080602'),
(551, 7, 54, 'COMBAPATA', '080603'),
(552, 7, 54, 'MARANGANI', '080604'),
(553, 7, 54, 'PITUMARCA', '080605'),
(554, 7, 54, 'SANPABLO', '061201'),
(555, 7, 54, 'SANPEDRO', '021409'),
(556, 7, 54, 'TINTA', '080608'),
(557, 7, 55, 'SANTOTOM?S', '010521'),
(558, 7, 55, 'CAPACMARCA', '080702'),
(559, 7, 55, 'CHAMACA', '080703'),
(560, 7, 55, 'COLQUEMARCA', '080704'),
(561, 7, 55, 'LIVITACA', '080705'),
(562, 7, 55, 'LLUSCO', '080706'),
(563, 7, 55, 'QUI?OTA', '080707'),
(564, 7, 55, 'VELILLE', '080708'),
(565, 7, 56, 'ESPINAR', '080801'),
(566, 7, 56, 'CONDOROMA', '080802'),
(567, 7, 56, 'COPORAQUE', '040506'),
(568, 7, 56, 'OCORURO', '080804'),
(569, 7, 56, 'PALLPATA', '080805'),
(570, 7, 56, 'PICHIGUA', '080806'),
(571, 7, 56, 'SUYCKUTAMBO', '080807'),
(572, 7, 56, 'ALTOPICHIGUA', '080808'),
(573, 7, 57, 'SANTAANA', '080901'),
(574, 7, 57, 'ECHARATE', '080902'),
(575, 7, 57, 'HUAYOPATA', '080903'),
(576, 7, 57, 'MARANURA', '080904'),
(577, 7, 57, 'OCOBAMBA', '030605'),
(578, 7, 57, 'QUELLOUNO', '080906'),
(579, 7, 57, 'KIMBIRI', '080907'),
(580, 7, 57, 'SANTATERESA', '080908'),
(581, 7, 57, 'VILCABAMBA', '030712'),
(582, 7, 57, 'PICHARI', '080910'),
(583, 7, 58, 'PARURO', '081001'),
(584, 7, 58, 'ACCHA', '081002'),
(585, 7, 58, 'CCAPI', '081003'),
(586, 7, 58, 'COLCHA', '081004'),
(587, 7, 58, 'HUANOQUITE', '081005'),
(588, 7, 58, 'OMACHA', '081006'),
(589, 7, 58, 'PACCARITAMBO', '081007'),
(590, 7, 58, 'PILLPINTO', '081008'),
(591, 7, 58, 'YAURISQUE', '081009'),
(592, 7, 59, 'PAUCARTAMBO', '081101'),
(593, 7, 59, 'CAICAY', '081102'),
(594, 7, 59, 'CHALLABAMBA', '081103'),
(595, 7, 59, 'COLQUEPATA', '081104'),
(596, 7, 59, 'HUANCARANI', '081105'),
(597, 7, 59, 'KOS?IPATA', '081106'),
(598, 7, 60, 'URCOS', '081201'),
(599, 7, 60, 'ANDAHUAYLILLAS', '081202'),
(600, 7, 60, 'CAMANTI', '081203'),
(601, 7, 60, 'CCARHUAYO', '081204'),
(602, 7, 60, 'CCATCA', '081205'),
(603, 7, 60, 'CUSIPATA', '081206'),
(604, 7, 60, 'HUARO', '081207'),
(605, 7, 60, 'LUCRE', '030409'),
(606, 7, 60, 'MARCAPATA', '081209'),
(607, 7, 60, 'OCONGATE', '081210'),
(608, 7, 60, 'OROPESA', '030305'),
(609, 7, 60, 'QUIQUIJANA', '081212'),
(610, 7, 61, 'URUBAMBA', '081301'),
(611, 7, 61, 'CHINCHERO', '081302'),
(612, 7, 61, 'HUAYLLABAMBA', '021906'),
(613, 7, 61, 'MACHUPICCHU', '081304'),
(614, 7, 61, 'MARAS', '081305'),
(615, 7, 61, 'OLLANTAYTAMBO', '081306'),
(616, 7, 61, 'YUCAY', '081307'),
(617, 8, 62, 'HUANCAVELICA', '090101'),
(618, 8, 62, 'ACOBAMBILLA', '090102'),
(619, 8, 62, 'ACORIA', '090103'),
(620, 8, 62, 'CONAYCA', '090104'),
(621, 8, 62, 'CUENCA', '090105'),
(622, 8, 62, 'HUACHOCOLPA', '090106'),
(623, 8, 62, 'HUAYLLAHUARA', '090107'),
(624, 8, 62, 'IZCUCHACA', '090108'),
(625, 8, 62, 'LARIA', '090109'),
(626, 8, 62, 'MANTA', '090110'),
(627, 8, 62, 'MARISCALC?CERES', '040204'),
(628, 8, 62, 'MOYA', '090112'),
(629, 8, 62, 'NUEVOOCCORO', '090113'),
(630, 8, 62, 'PALCA', '090114'),
(631, 8, 62, 'PILCHACA', '090115'),
(632, 8, 62, 'VILCA', '090116'),
(633, 8, 62, 'YAULI', '090117'),
(634, 8, 62, 'ASCENSI?N', '090118'),
(635, 8, 62, 'HUANDO', '090119'),
(636, 8, 63, 'ACOBAMBA', '021902'),
(637, 8, 63, 'ANDABAMBA', '061302'),
(638, 8, 63, 'ANTA', '020604'),
(639, 8, 63, 'CAJA', '090204'),
(640, 8, 63, 'MARCAS', '090205'),
(641, 8, 63, 'PAUCARA', '090206'),
(642, 8, 63, 'POMACOCHA', '030211'),
(643, 8, 63, 'ROSARIO', '090208'),
(644, 8, 64, 'LIRCAY', '090301'),
(645, 8, 64, 'ANCHONGA', '090302'),
(646, 8, 64, 'CALLANMARCA', '090303'),
(647, 8, 64, 'CCOCHACCASA', '090304'),
(648, 8, 64, 'CHINCHO', '090305'),
(649, 8, 64, 'CONGALLA', '090306'),
(650, 8, 64, 'HUANCA-HUANCA', '090307'),
(651, 8, 64, 'HUAYLLAYGRANDE', '090308'),
(652, 8, 64, 'JULCAMARCA', '090309'),
(653, 8, 64, 'SANANTONIODEANTAPARCO', '090310'),
(654, 8, 64, 'SANTOTOM?SDEPATA', '090311'),
(655, 8, 64, 'SECCLLA', '090312'),
(656, 8, 65, 'CASTROVIRREYNA', '090401'),
(657, 8, 65, 'ARMA', '090402'),
(658, 8, 65, 'AURAHUA', '090403'),
(659, 8, 65, 'CAPILLAS', '090404'),
(660, 8, 65, 'CHUPAMARCA', '090405'),
(661, 8, 65, 'COCAS', '090406'),
(662, 8, 65, 'HUACHOS', '090407'),
(663, 8, 65, 'HUAMATAMBO', '090408'),
(664, 8, 65, 'MOLLEPAMPA', '090409'),
(665, 8, 65, 'SANJUAN', '021909'),
(666, 8, 65, 'SANTAANA', '080901'),
(667, 8, 65, 'TANTARA', '090412'),
(668, 8, 65, 'TICRAPO', '090413'),
(669, 8, 66, 'CHURCAMPA', '090501'),
(670, 8, 66, 'ANCO', '050502'),
(671, 8, 66, 'CHINCHIHUASI', '090503'),
(672, 8, 66, 'ELCARMEN', '090504'),
(673, 8, 66, 'LAMERCED', '020204'),
(674, 8, 66, 'LOCROJA', '090506'),
(675, 8, 66, 'PAUCARBAMBA', '090507'),
(676, 8, 66, 'SANMIGUELDEMAYOCC', '090508'),
(677, 8, 66, 'SANPEDRODECORIS', '090509'),
(678, 8, 66, 'PACHAMARCA', '090510'),
(679, 8, 66, 'COSME', 'NULL'),
(680, 8, 67, 'HUAYTAR?', '090601'),
(681, 8, 67, 'AYAVI', '090602'),
(682, 8, 67, 'C?RDOVA', '090603'),
(683, 8, 67, 'HUAYACUNDOARMA', '090604'),
(684, 8, 67, 'LARAMARCA', '090605'),
(685, 8, 67, 'OCOYO', '090606'),
(686, 8, 67, 'PILPICHACA', '090607'),
(687, 8, 67, 'QUERCO', '090608'),
(688, 8, 67, 'QUITO-ARMA', '090609'),
(689, 8, 67, 'SANANTONIODECUSICANCHA', '090610'),
(690, 8, 67, 'SANFRANCISCODESANGAYAICO', '090611'),
(691, 8, 67, 'SANISIDRO', '090612'),
(692, 8, 67, 'SANTIAGODECHOCORVOS', '090613'),
(693, 8, 67, 'SANTIAGODEQUIRAHUARA', '090614'),
(694, 8, 67, 'SANTODOMINGODECAPILLAS', '090615'),
(695, 8, 67, 'TAMBO', '050508'),
(696, 8, 68, 'PAMPAS', '020109'),
(697, 8, 68, 'ACOSTAMBO', '090702'),
(698, 8, 68, 'ACRAQUIA', '090703'),
(699, 8, 68, 'AHUAYCHA', '090704'),
(700, 8, 68, 'COLCABAMBA', '020103'),
(701, 8, 68, 'DANIELHERN?NDEZ', '090706'),
(702, 8, 68, 'HUACHOCOLPA', '090106'),
(703, 8, 68, 'HUARIBAMBA', '090709'),
(704, 8, 68, '?AHUIMPUQUIO', '090710'),
(705, 8, 68, 'PAZOS', '090711'),
(706, 8, 68, 'QUISHUAR', '090713'),
(707, 8, 68, 'SALCABAMBA', '090714'),
(708, 8, 68, 'SALCAHUASI', '090715'),
(709, 8, 68, 'SANMARCOSDEROCCHAC', '090716'),
(710, 8, 68, 'SURCUBAMBA', '090717'),
(711, 8, 68, 'TINTAYPUNCU', '090718'),
(712, 9, 69, 'HU?NUCO', '100101'),
(713, 9, 69, 'AMARILIS', '100102'),
(714, 9, 69, 'CHINCHAO', '100103'),
(715, 9, 69, 'CHURUBAMBA', '100104'),
(716, 9, 69, 'MARGOS', '100105'),
(717, 9, 69, 'QUISQUI', '100106'),
(718, 9, 69, 'SANFRANCISCODECAYR?N', '100107'),
(719, 9, 69, 'SANPEDRODECHAULAN', '100108'),
(720, 9, 69, 'SANTAMAR?ADELVALLE', '100109'),
(721, 9, 69, 'YARUMAYO', '100110'),
(722, 9, 69, 'PILLCOMARCA', '100111'),
(723, 9, 69, 'YACUS', 'NULL'),
(724, 9, 70, 'AMBO', '100201'),
(725, 9, 70, 'CAYNA', '100202'),
(726, 9, 70, 'COLPAS', '100203'),
(727, 9, 70, 'CONCHAMARCA', '100204'),
(728, 9, 70, 'HUACAR', '100205'),
(729, 9, 70, 'SANFRANCISCO', '100206'),
(730, 9, 70, 'SANRAFAEL', '100207'),
(731, 9, 70, 'TOMAYKICHWA', '100208'),
(732, 9, 71, 'LAUNI?N', '100301'),
(733, 9, 71, 'CHUQUIS', '100307'),
(734, 9, 71, 'MAR?AS', '100311'),
(735, 9, 71, 'PACHAS', '100313'),
(736, 9, 71, 'QUIVILLA', '100316'),
(737, 9, 71, 'RIPAN', '100317'),
(738, 9, 71, 'SHUNQUI', '100321'),
(739, 9, 71, 'SILLAPATA', '100322'),
(740, 9, 71, 'YANAS', '100323'),
(741, 9, 72, 'HUACAYBAMBA', '100401'),
(742, 9, 72, 'CANCHABAMBA', '100402'),
(743, 9, 72, 'COCHABAMBA', '020102'),
(744, 9, 72, 'PINRA', '100404'),
(745, 9, 73, 'LLATA', '100501'),
(746, 9, 73, 'ARANCAY', '100502'),
(747, 9, 73, 'CHAV?NDEPARIARCA', '100503'),
(748, 9, 73, 'JACASGRANDE', '100504'),
(749, 9, 73, 'JIRCAN', '100505'),
(750, 9, 73, 'MIRAFLORES', '040110'),
(751, 9, 73, 'MONZ?N', '100507'),
(752, 9, 73, 'PUNCHAO', '100508'),
(753, 9, 73, 'PU?OS', '100509'),
(754, 9, 73, 'SINGA', '100510'),
(755, 9, 73, 'TANTAMAYO', '100511'),
(756, 9, 74, 'RUPA-RUPA', '100601'),
(757, 9, 74, 'DANIELALOMIAROBLES', '100602'),
(758, 9, 74, 'HERMILIOVALDIZ?N', '100603'),
(759, 9, 74, 'JOS?CRESPOYCASTILLO', '100604'),
(760, 9, 74, 'LUYANDO', '100605'),
(761, 9, 74, 'MARIANODAMASOBERA?N', '100606'),
(762, 9, 75, 'HUACRACHUCO', '100701'),
(763, 9, 75, 'CHOL?N', '100702'),
(764, 9, 75, 'SANBUENAVENTURA', '100703'),
(765, 9, 76, 'PANAO', '100801'),
(766, 9, 76, 'CHAGLLA', '100802'),
(767, 9, 76, 'MOLINO', '100803'),
(768, 9, 76, 'UMARI', '100804'),
(769, 9, 77, 'PUERTOINCA', '100901'),
(770, 9, 77, 'CODODELPOZUZO', '100902'),
(771, 9, 77, 'HONORIA', '100903'),
(772, 9, 77, 'TOURNAVISTA', '100904'),
(773, 9, 77, 'YUYAPICHIS', '100905'),
(774, 9, 78, 'JES?S', '060106'),
(775, 9, 78, 'BA?OS', '101002'),
(776, 9, 78, 'JIVIA', '101003'),
(777, 9, 78, 'QUEROPALCA', '101004'),
(778, 9, 78, 'RONDOS', '101005'),
(779, 9, 78, 'SANFRANCISCODEAS?S', '101006'),
(780, 9, 78, 'SANMIGUELDECAURI', '101007'),
(781, 9, 79, 'CHAVINILLO', '101101'),
(782, 9, 79, 'CAHUAC', '101102'),
(783, 9, 79, 'CHACABAMBA', '101103'),
(784, 9, 79, 'APARICIOPOMARES', '101104'),
(785, 9, 79, 'JACASCHICO', '101105'),
(786, 9, 79, 'OBAS', '101106'),
(787, 9, 79, 'PAMPAMARCA', '040805'),
(788, 9, 79, 'CHORAS', '101108'),
(789, 10, 80, 'ICA', '110101'),
(790, 10, 80, 'LATINGUI?A', '110102'),
(791, 10, 80, 'LOSAQUIJES', '110103'),
(792, 10, 80, 'OCUCAJE', '110104'),
(793, 10, 80, 'PACHAC?TEC', '110105'),
(794, 10, 80, 'PARCONA', '110106'),
(795, 10, 80, 'PUEBLONUEVO', '110107'),
(796, 10, 80, 'SALAS', '110108'),
(797, 10, 80, 'SANJOS?DELOSMOLINOS', '110109'),
(798, 10, 80, 'SANJUANBAUTISTA', '050110'),
(799, 10, 80, 'SANTIAGO', '080106'),
(800, 10, 80, 'SUBTANJALLA', '110112'),
(801, 10, 80, 'TATE', '110113'),
(802, 10, 80, 'YAUCADELROSARIO', '110114'),
(803, 10, 81, 'CHINCHAALTA', '110201'),
(804, 10, 81, 'ALTOLARAN', '110202'),
(805, 10, 81, 'CHAV?N', '110203'),
(806, 10, 81, 'CHINCHABAJA', '110204'),
(807, 10, 81, 'ELCARMEN', '090504'),
(808, 10, 81, 'GROCIOPRADO', '110206'),
(809, 10, 81, 'PUEBLONUEVO', '110107'),
(810, 10, 81, 'SANJUANDEY?NAC', '110208'),
(811, 10, 81, 'SANPEDRODEHUACARPANA', '110209'),
(812, 10, 81, 'SUNAMPE', '110210'),
(813, 10, 81, 'TAMBODEMORA', '110211'),
(814, 10, 82, 'NAZCA', '110301'),
(815, 10, 82, 'CHANGUILLO', '110302'),
(816, 10, 82, 'ELINGENIO', '110303'),
(817, 10, 82, 'MARCONA', '110304'),
(818, 10, 82, 'VISTAALEGRE', '010612'),
(819, 10, 83, 'PALPA', '110401'),
(820, 10, 83, 'LLIPATA', '110402'),
(821, 10, 83, 'R?OGRANDE', '040606'),
(822, 10, 83, 'SANTACRUZ', '021208'),
(823, 10, 83, 'TIBILLO', '110405'),
(824, 10, 84, 'PISCO', '110501'),
(825, 10, 84, 'HUANCANO', '110502'),
(826, 10, 84, 'HUMAY', '110503'),
(827, 10, 84, 'INDEPENDENCIAPARACAS', '020105'),
(828, 10, 84, 'SANANDR?S', '110506'),
(829, 10, 84, 'SANCLEMENTE', '110507'),
(830, 10, 84, 'T?PACAMARUINCA', '110508'),
(831, 11, 85, 'HUANCAYO', '120101'),
(832, 11, 85, 'CARHUACALLANGA', '120104'),
(833, 11, 85, 'CHACAPAMPA', '120105'),
(834, 11, 85, 'CHICCHE', '120106'),
(835, 11, 85, 'CHILCA', '120107'),
(836, 11, 85, 'CHONGOSALTO', '120108'),
(837, 11, 85, 'CHUPURO', '120111'),
(838, 11, 85, 'COLCA', '051007'),
(839, 11, 85, 'CULLHUAS', '120113'),
(840, 11, 85, 'ELTAMBO', '120114'),
(841, 11, 85, 'HUACRAPUQUIO', '120116'),
(842, 11, 85, 'HUALHUAS', '120117'),
(843, 11, 85, 'HUANC?N', '120119'),
(844, 11, 85, 'HUASICANCHA', '120120'),
(845, 11, 85, 'HUAYUCACHI', '120121'),
(846, 11, 85, 'INGENIO', '120122'),
(847, 11, 85, 'PARIAHUANCA', '020607'),
(848, 11, 85, 'PILCOMAYO', '120125'),
(849, 11, 85, 'PUCAR?', '060808'),
(850, 11, 85, 'QUICHUAY', '120127'),
(851, 11, 85, 'QUILCAS', '120128'),
(852, 11, 85, 'SANAGUST?N', '120129'),
(853, 11, 85, 'SANJER?NIMODETUN?N', '120130'),
(854, 11, 85, 'SA?O', '120132'),
(855, 11, 85, 'SAPALLANGA', '120133'),
(856, 11, 85, 'SICAYA', '120134'),
(857, 11, 85, 'SANTODOMINGODEACOBAMBA', '120135'),
(858, 11, 85, 'VIQUES', '120136'),
(859, 11, 86, 'CONCEPCI?N', '051104'),
(860, 11, 86, 'ACO', '020902'),
(861, 11, 86, 'ANDAMARCA', '120203'),
(862, 11, 86, 'CHAMBAR?', '120204'),
(863, 11, 86, 'COCHAS', '021405'),
(864, 11, 86, 'COMAS', '120206'),
(865, 11, 86, 'HERO?NASTOLEDO', '120207'),
(866, 11, 86, 'MANZANARES', '120208'),
(867, 11, 86, 'MARISCALCASTILLA', '010113'),
(868, 11, 86, 'MATAHUASI', '120210'),
(869, 11, 86, 'MITO', '120211'),
(870, 11, 86, 'NUEVEDEJULIO', '120212'),
(871, 11, 86, 'ORCOTUNA', '120213'),
(872, 11, 86, 'SANJOS?DEQUERO', '120214'),
(873, 11, 86, 'SANTAROSADEOCOPA', '120215'),
(874, 11, 87, 'CHANCHAMAYO', '120301'),
(875, 11, 87, 'PEREN', '120302'),
(876, 11, 87, 'PICHANAQUI', '120303'),
(877, 11, 87, 'SANLUISDESHUARO', '120304'),
(878, 11, 87, 'SANRAM?N', '120305'),
(879, 11, 87, 'VITOC', '120306'),
(880, 11, 88, 'JAUJA', '120401'),
(881, 11, 88, 'ACOLLA', '120402'),
(882, 11, 88, 'APATA', '120403'),
(883, 11, 88, 'ATAURA', '120404'),
(884, 11, 88, 'CANCHAYLLO', '120405'),
(885, 11, 88, 'CURICACA', '120406'),
(886, 11, 88, 'ELMANTARO', '120407'),
(887, 11, 88, 'HUAMAL', '120408'),
(888, 11, 88, 'HUARIPAMPA', '120409'),
(889, 11, 88, 'HUERTAS', '120410'),
(890, 11, 88, 'JANJAILLO', '120411'),
(891, 11, 88, 'JULC?N', '120412'),
(892, 11, 88, 'LEONORORD??EZ', '120413'),
(893, 11, 88, 'LLOCLLAPAMPA', '120414'),
(894, 11, 88, 'MARCO', '120415'),
(895, 11, 88, 'MASMA', '120416'),
(896, 11, 88, 'MASMACHICCHE', '120417'),
(897, 11, 88, 'MOLINOS', '120418'),
(898, 11, 88, 'MONOBAMBA', '120419'),
(899, 11, 88, 'MUQUI', '120420'),
(900, 11, 88, 'MUQUIYAUYO', '120421'),
(901, 11, 88, 'PACA', '120422'),
(902, 11, 88, 'PACCHA', '060413'),
(903, 11, 88, 'PANC?N', '120424'),
(904, 11, 88, 'PARCO', '120425'),
(905, 11, 88, 'POMACANCHA', '120426'),
(906, 11, 88, 'RICR?N', '120427'),
(907, 11, 88, 'SANLORENZO', '120428'),
(908, 11, 88, 'SANPEDRODECHUN?N', '120429'),
(909, 11, 88, 'SAUSA', '120430'),
(910, 11, 88, 'SINCOS', '120431'),
(911, 11, 88, 'TUNANMARCA', '120432'),
(912, 11, 88, 'YAULI', '090117'),
(913, 11, 88, 'YAUYOS', '120434'),
(914, 11, 89, 'JUN?N', '120501'),
(915, 11, 89, 'CARHUAMAYO', '120502'),
(916, 11, 89, 'ONDORES', '120503'),
(917, 11, 89, 'ULCUMAYO', '120504'),
(918, 12, 90, 'TRUJILLO', '130101'),
(919, 12, 90, 'ELPORVENIR', '130102'),
(920, 12, 90, 'FLORENCIADEMORA', '130103'),
(921, 12, 90, 'HUANCHACO', '130104'),
(922, 12, 90, 'LAESPERANZA', '061305'),
(923, 12, 90, 'LAREDO', '130106'),
(924, 12, 90, 'MOCHE', '130107'),
(925, 12, 90, 'POROTO', '130108'),
(926, 12, 90, 'SALAVERRY', '130109'),
(927, 12, 90, 'SIMBAL', '130110'),
(928, 12, 90, 'VICTORLARCOHERRERA', '130111'),
(929, 12, 91, 'ASCOPE', '130201'),
(930, 12, 91, 'CHICAMA', '130202'),
(931, 12, 91, 'CHOCOPE', '130203'),
(932, 12, 91, 'MAGDALENADECAO', '130204'),
(933, 12, 91, 'PAIJ?N', '130205'),
(934, 12, 91, 'R?ZURI', '130206'),
(935, 12, 91, 'SANTIAGODECAO', '130207'),
(936, 12, 91, 'CASAGRANDE', '130208'),
(937, 12, 92, 'BOL?VAR', '061102'),
(938, 12, 92, 'BAMBAMARCA', '060701'),
(939, 12, 92, 'CONDORMARCA', '130303'),
(940, 12, 92, 'LONGOTEA', '130304'),
(941, 12, 92, 'UCHUMARCA', '130305'),
(942, 12, 92, 'UCUNCHA', '130306'),
(943, 12, 93, 'CHEP?N', '130401'),
(944, 12, 93, 'PACANGA', '130402'),
(945, 12, 93, 'PUEBLONUEVO', '110107'),
(946, 12, 94, 'JULC?N', '120412'),
(947, 12, 94, 'CALAMARCA', '130502'),
(948, 12, 94, 'CARABAMBA', '130503'),
(949, 12, 94, 'HUASO', '130504'),
(950, 12, 95, 'OTUZCO', '130601'),
(951, 12, 95, 'AGALLPAMPA', '130602'),
(952, 12, 95, 'CHARAT', '130604'),
(953, 12, 95, 'HUARANCHAL', '130605'),
(954, 12, 95, 'LACUESTA', '130606'),
(955, 12, 95, 'MACHE', '130608'),
(956, 12, 95, 'PARANDAY', '130610'),
(957, 12, 95, 'SALPO', '130611'),
(958, 12, 95, 'SINSICAP', '130613'),
(959, 12, 95, 'USQUIL', '130614'),
(960, 12, 96, 'SANPEDRODELLOC', '130701'),
(961, 12, 96, 'GUADALUPE', '130702'),
(962, 12, 96, 'JEQUETEPEQUE', '130703'),
(963, 12, 96, 'PACASMAYO', '130704'),
(964, 12, 96, 'SANJOS', '130705'),
(965, 12, 97, 'TAYABAMBA', '130801'),
(966, 12, 97, 'BULDIBUYO', '130802'),
(967, 12, 97, 'CHILLIA', '130803'),
(968, 12, 97, 'HUANCASPATA', '130804'),
(969, 12, 97, 'HUAYLILLAS', '130805'),
(970, 12, 97, 'HUAYO', '130806'),
(971, 12, 97, 'ONGON', '130807'),
(972, 12, 97, 'PARCOY', '130808'),
(973, 12, 97, 'PATAZ', '130809'),
(974, 12, 97, 'PIAS', '130810'),
(975, 12, 97, 'SANTIAGODECHALLAS', '130811'),
(976, 12, 97, 'TAURIJA', '130812'),
(977, 12, 97, 'URPAY', '130813'),
(978, 12, 98, 'HUAMACHUCO', '130901'),
(979, 12, 98, 'CHUGAY', '130902'),
(980, 12, 98, 'COCHORCO', '130903'),
(981, 12, 98, 'CURGOS', '130904'),
(982, 12, 98, 'MARCABAL', '130905'),
(983, 12, 98, 'SANAGORAN', '130906'),
(984, 12, 98, 'SARIN', '130907'),
(985, 12, 98, 'SARTIMBAMBA', '130908'),
(986, 12, 99, 'SANTIAGODECHUCO', '131001'),
(987, 12, 99, 'ANGASMARCA', '131002'),
(988, 12, 99, 'CACHICADAN', '131003'),
(989, 12, 99, 'MOLLEBAMBA', '131004'),
(990, 12, 99, 'MOLLEPATA', '080307'),
(991, 12, 99, 'QUIRUVILCA', '131006'),
(992, 12, 99, 'SANTACRUZDECHUCA', '131007'),
(993, 12, 99, 'SITABAMBA', '131008'),
(994, 12, 100, 'CASCAS', '131101'),
(995, 12, 100, 'LUCMA', '021307'),
(996, 12, 100, 'MARMOT', 'NULL'),
(997, 12, 100, 'SAYAPULLO', '131104'),
(998, 12, 101, 'VIR', '131201'),
(999, 12, 101, 'CHAO', '131202'),
(1000, 12, 101, 'GUADALUPITO', '131203'),
(1001, 13, 102, 'CHICLAYO', '140101'),
(1002, 13, 102, 'CHONGOYAPE', '140102'),
(1003, 13, 102, 'ET?N', '140103'),
(1004, 13, 102, 'ET?NPUERTO', '140104'),
(1005, 13, 102, 'JOS?LEONARDOORTIZ', '140105'),
(1006, 13, 102, 'LAVICTORIA', '140106'),
(1007, 13, 102, 'LAGUNAS', '140107'),
(1008, 13, 102, 'MONSEF', '140108'),
(1009, 13, 102, 'NUEVAARICA', '140109'),
(1010, 13, 102, 'OYOTUN', '140110'),
(1011, 13, 102, 'PICSI', '140111'),
(1012, 13, 102, 'PIMENTEL', '140112'),
(1013, 13, 102, 'REQUE', '140113'),
(1014, 13, 102, 'SANTAROSA', '010610'),
(1015, 13, 102, 'SA?A', '140115'),
(1016, 13, 102, 'CAYALT', '140116'),
(1017, 13, 102, 'PATAPO', '140117'),
(1018, 13, 102, 'POMALCA', '140118'),
(1019, 13, 102, 'PUCALA', '140119'),
(1020, 13, 102, 'TUM?N', '140120'),
(1021, 13, 103, 'FERRE?AFE', '140201'),
(1022, 13, 103, 'CA?ARIS', '140202'),
(1023, 13, 103, 'INCAHUASI', '140203'),
(1024, 13, 103, 'MANUELANTONIOMESONESMURO', '140204'),
(1025, 13, 103, 'PITIPO', '140205'),
(1026, 13, 103, 'PUEBLONUEVO', '110107'),
(1027, 13, 104, 'LAMBAYEQUE', '140301'),
(1028, 13, 104, 'CHOCHOPE', '140302'),
(1029, 13, 104, 'ILLIMO', '140303'),
(1030, 13, 104, 'JAYANCA', '140304'),
(1031, 13, 104, 'MOCHUMI', '140305'),
(1032, 13, 104, 'M?RROPE', '140306'),
(1033, 13, 104, 'MOTUPE', '140307'),
(1034, 13, 104, 'OLMOS', '140308'),
(1035, 13, 104, 'PACORA', '140309'),
(1036, 13, 104, 'SALAS', '110108'),
(1037, 13, 104, 'SANJOS', '130705'),
(1038, 13, 104, 'TUCUME', '140312'),
(1039, 14, 105, 'IQUITOS', '160101'),
(1040, 14, 105, 'ALTONANAY', '160102'),
(1041, 14, 105, 'FERNANDOLORES', '160103'),
(1042, 14, 105, 'INDIANA', '160104'),
(1043, 14, 105, 'LASAMAZONAS', '160105'),
(1044, 14, 105, 'MAZAN', '160106'),
(1045, 14, 105, 'NAPO', '160107'),
(1046, 14, 105, 'PUNCHANA', '160108'),
(1047, 14, 105, 'PUTUMAYO', '160109'),
(1048, 14, 105, 'TORRESCAUSANA', '160110'),
(1049, 14, 105, 'BEL?N', '050902'),
(1050, 14, 105, 'SANJUANBAUTISTA', '050110'),
(1051, 14, 105, 'TENIENTEMANUELCLAVERO', '160114'),
(1052, 14, 106, 'YURIMAGUAS', '160201'),
(1053, 14, 106, 'BALSAPUERTO', '160202'),
(1054, 14, 106, 'JEBEROS', '160205'),
(1055, 14, 106, 'LAGUNAS', '140107'),
(1056, 14, 106, 'SANTACRUZ', '021208'),
(1057, 14, 106, 'TENIENTEC?SARL?PEZROJAS', '160211'),
(1058, 14, 107, 'NAUTA', '160301'),
(1059, 14, 107, 'PARINARI', '160302'),
(1060, 14, 107, 'TIGRE', '160303'),
(1061, 14, 107, 'TROMPETEROS', '160304'),
(1062, 14, 107, 'URARINAS', '160305'),
(1063, 14, 108, 'RAM?NCASTILLA', '160401'),
(1064, 14, 108, 'PEBAS', '160402'),
(1065, 14, 108, 'YAVARI', '160403'),
(1066, 14, 108, 'SANPABLO', '061201'),
(1067, 14, 109, 'REQUENA', '160501'),
(1068, 14, 109, 'ALTOTAPICHE', '160502'),
(1069, 14, 109, 'CAPELO', '160503'),
(1070, 14, 109, 'EMILIOSANMART?N', '160504'),
(1071, 14, 109, 'MAQUIA', '160505'),
(1072, 14, 109, 'PUINAHUA', '160506'),
(1073, 14, 109, 'SAQUENA', '160507'),
(1074, 14, 109, 'SOPLIN', '160508'),
(1075, 14, 109, 'TAPICHE', '160509'),
(1076, 14, 109, 'JENAROHERRERA', '160510'),
(1077, 14, 109, 'YAQUERANA', '160511'),
(1078, 14, 110, 'CONTAMANA', '160601'),
(1079, 14, 110, 'INAHUAYA', '160602'),
(1080, 14, 110, 'PADREM?RQUEZ', '160603'),
(1081, 14, 110, 'PAMPAHERMOSA', '120605'),
(1082, 14, 110, 'SARAYACU', '160605'),
(1083, 14, 110, 'VARGASGUERRA', '160606'),
(1084, 14, 111, 'BARRANCA', '150201'),
(1085, 14, 111, 'CAHUAPANAS', '160702'),
(1086, 14, 111, 'MANSERICHE', '160703'),
(1087, 14, 111, 'MORONA', '160704'),
(1088, 14, 111, 'PASTAZA', '160705'),
(1089, 14, 111, 'ANDOAS', '160706'),
(1090, 15, 112, 'TAMBOPATA', '170101'),
(1091, 15, 112, 'INAMBARI', '170102'),
(1092, 15, 112, 'LASPIEDRAS', '170103'),
(1093, 15, 112, 'LABERINTO', '170104'),
(1094, 15, 113, 'MANU', '170201'),
(1095, 15, 113, 'FITZCARRALD', '170202'),
(1096, 15, 113, 'MADREDEDIOS', '170203'),
(1097, 15, 113, 'HUEPETUHE', '170204'),
(1098, 15, 114, 'I?APARI', '170301'),
(1099, 15, 114, 'IBERIA', '170302'),
(1100, 15, 114, 'TAHUAMANU', '170303'),
(1101, 16, 115, 'MOQUEGUA', '180101'),
(1102, 16, 115, 'CARUMAS', '180102'),
(1103, 16, 115, 'CUCHUMBAYA', '180103'),
(1104, 16, 115, 'SAMEGUA', '180104'),
(1105, 16, 115, 'SANCRIST?BAL', '010516'),
(1106, 16, 115, 'TORATA', '180106'),
(1107, 16, 116, 'OMATE', '180201'),
(1108, 16, 116, 'CHOJATA', '180202'),
(1109, 16, 116, 'COALAQUE', '180203'),
(1110, 16, 116, 'ICHU?A', '180204'),
(1111, 16, 116, 'LACAPILLA', '180205'),
(1112, 16, 116, 'LLOQUE', '180206'),
(1113, 16, 116, 'MATALAQUE', '180207'),
(1114, 16, 116, 'PUQUINA', '180208'),
(1115, 16, 116, 'QUINISTAQUILLAS', '180209'),
(1116, 16, 116, 'UBINAS', '180210'),
(1117, 16, 116, 'YUNGA', '180211'),
(1118, 16, 117, 'ILO', '180301'),
(1119, 16, 117, 'ELALGARROBAL', '180302'),
(1120, 16, 117, 'PACOCHA', '180303'),
(1121, 17, 118, 'CHAUPIMARCA', '190101'),
(1122, 17, 118, 'HUACH?N', '190102'),
(1123, 17, 118, 'HUARIACA', '190103'),
(1124, 17, 118, 'HUAYLLAY', '190104'),
(1125, 17, 118, 'NINACACA', '190105'),
(1126, 17, 118, 'PALLANCHACRA', '190106'),
(1127, 17, 118, 'PAUCARTAMBO', '081101'),
(1128, 17, 118, 'SANFRANCISCODEASISDEYARUSYAC?N', '190108'),
(1129, 17, 118, 'SIM?NBOL?VAR', '190109'),
(1130, 17, 118, 'TICLACAYAN', '190110'),
(1131, 17, 118, 'TINYAHUARCO', '190111'),
(1132, 17, 118, 'VICCO', '190112'),
(1133, 17, 118, 'YANACANCHA', '120909'),
(1134, 17, 119, 'YANAHUANCA', '190201'),
(1135, 17, 119, 'CHACAYAN', '190202'),
(1136, 17, 119, 'GOYLLARISQUIZGA', '190203'),
(1137, 17, 119, 'PAUCAR', '190204'),
(1138, 17, 119, 'SANPEDRODEPILLAO', '190205'),
(1139, 17, 119, 'SANTAANADETUSI', '190206'),
(1140, 17, 119, 'TAPUC', '190207'),
(1141, 17, 119, 'VILCABAMBA', '030712'),
(1142, 17, 120, 'OXAPAMPA', '190301'),
(1143, 17, 120, 'CHONTABAMBA', '190302'),
(1144, 17, 120, 'HUANCABAMBA', '190303'),
(1145, 17, 120, 'PALCAZU', '190304'),
(1146, 17, 120, 'POZUZO', '190305'),
(1147, 17, 120, 'PUERTOBERM?DEZ', '190306'),
(1148, 17, 120, 'VILLARICA', '190307'),
(1149, 17, 120, 'CONSTITUCI?N', 'NULL'),
(1150, 18, 121, 'PIURA', '200101'),
(1151, 18, 121, 'CASTILLA', '200104'),
(1152, 18, 121, 'CATACAOS', '200105'),
(1153, 18, 121, 'CURAMORI', '200107'),
(1154, 18, 121, 'ELTALL?N', '200108'),
(1155, 18, 121, 'LAARENA', '200109'),
(1156, 18, 121, 'LAUNI?N', '100301'),
(1157, 18, 121, 'LASLOMAS', '200111'),
(1158, 18, 121, 'TAMBOGRANDE', '200114'),
(1159, 18, 122, 'AYABACA', '200201'),
(1160, 18, 122, 'FR?AS', '200202'),
(1161, 18, 122, 'JILILILAGUNAS', 'NULL'),
(1162, 18, 122, 'MONTERO', '200205'),
(1163, 18, 122, 'PACAIPAMPA', '200206'),
(1164, 18, 122, 'PAIMAS', '200207'),
(1165, 18, 122, 'SAPILLICA', '200208'),
(1166, 18, 122, 'SICCHEZ', '200209'),
(1167, 18, 122, 'SUYO', '200210'),
(1168, 18, 123, 'HUANCABAMBA', '190303'),
(1169, 18, 123, 'CANCHAQUE', '200302'),
(1170, 18, 123, 'ELCARMENDELAFRONTERA', '200303'),
(1171, 18, 123, 'HUARMACA', '200304'),
(1172, 18, 123, 'LALAQUIZ', '200305'),
(1173, 18, 123, 'SANMIGUELDEELFAIQUE', '200306'),
(1174, 18, 123, 'SONDOR', '200307'),
(1175, 18, 123, 'SONDORILLO', '200308'),
(1176, 18, 124, 'CHULUCANAS', '200401'),
(1177, 18, 124, 'BUENOSAIRES', '200402'),
(1178, 18, 124, 'CHALACO', '200403'),
(1179, 18, 124, 'LAMATANZA', '200404'),
(1180, 18, 124, 'MORROP?N', '200405'),
(1181, 18, 124, 'SALITRAL', '200406'),
(1182, 18, 124, 'SANJUANDEBIGOTE', '200407'),
(1183, 18, 124, 'SANTACATALINADEMOSSA', '200408'),
(1184, 18, 124, 'SANTODOMINGO', '200409'),
(1185, 18, 124, 'YAMANGO', '200410'),
(1186, 18, 125, 'PAITA', '200501'),
(1187, 18, 125, 'AMOTAPE', '200502'),
(1188, 18, 125, 'ARENAL', '200503'),
(1189, 18, 125, 'COL?N', '200504'),
(1190, 18, 125, 'LAHUACA', '200505'),
(1191, 18, 125, 'TAMARINDO', '200506'),
(1192, 18, 125, 'VICHAYAL', '200507'),
(1193, 18, 126, 'SULLANA', '200601'),
(1194, 18, 126, 'BELLAVISTA', '060802'),
(1195, 18, 126, 'IGNACIOESCUDERO', '200603'),
(1196, 18, 126, 'LANCONES', '200604'),
(1197, 18, 126, 'MARCAVELICA', '200605'),
(1198, 18, 126, 'MIGUELCHECA', '200606'),
(1199, 18, 126, 'QUERECOTILLO', '200607'),
(1200, 18, 126, 'SALITRAL', '200406'),
(1201, 18, 127, 'PARI?AS', '200701'),
(1202, 18, 127, 'ELALTO', '200702'),
(1203, 18, 127, 'LABREA', '200703'),
(1204, 18, 127, 'LOBITOS', '200704'),
(1205, 18, 127, 'LOSORGANOS', '200705'),
(1206, 18, 127, 'M?NCORA', '200706'),
(1207, 18, 128, 'SECHURA', '200801'),
(1208, 18, 128, 'BELLAVISTADELAUNI?N', '200802'),
(1209, 18, 128, 'BERNAL', '200803'),
(1210, 18, 128, 'CRISTONOSVALGA', '200804'),
(1211, 18, 128, 'VICE', '200805'),
(1212, 18, 128, 'RINCONADA', 'NULL'),
(1213, 18, 128, 'LLICUAR', 'NULL'),
(1214, 19, 129, 'PUNO', '210101'),
(1215, 19, 129, 'ACORA', '210102'),
(1216, 19, 129, 'AMANTANI', '210103'),
(1217, 19, 129, 'ATUNCOLLA', '210104'),
(1218, 19, 129, 'CAPACHICA', '210105'),
(1219, 19, 129, 'CHUCUITO', '210106'),
(1220, 19, 129, 'COATA', '210107'),
(1221, 19, 129, 'HUATA', '021203'),
(1222, 19, 129, 'MA?AZO', '210109'),
(1223, 19, 129, 'PAUCARCOLLA', '210110'),
(1224, 19, 129, 'PICHACANI', '210111'),
(1225, 19, 129, 'PLATER?A', '210112'),
(1226, 19, 129, 'SANANTONIO', '030709'),
(1227, 19, 129, 'TIQUILLACA', '210114'),
(1228, 19, 129, 'VILQUE', '210115'),
(1229, 19, 130, 'AZ?NGARO', '151005'),
(1230, 19, 130, 'ACHAYA', '210202'),
(1231, 19, 130, 'ARAPA', '210203'),
(1232, 19, 130, 'ASILLO', '210204'),
(1233, 19, 130, 'CAMINACA', '210205'),
(1234, 19, 130, 'CHUPA', '210206'),
(1235, 19, 130, 'JOS?DOMINGOCHOQUEHUANCA', '210207'),
(1236, 19, 130, 'MU?ANI', '210208'),
(1237, 19, 130, 'POTONI', '210209'),
(1238, 19, 130, 'SAMAN', '210210'),
(1239, 19, 130, 'SANANT?N', '210211'),
(1240, 19, 130, 'SANJOS', '130705'),
(1241, 19, 130, 'SANJUANDESALINAS', '210213'),
(1242, 19, 130, 'SANTIAGODEPUPUJA', '210214'),
(1243, 19, 130, 'TIRAPATA', '210215'),
(1244, 19, 131, 'MACUSANI', '210301'),
(1245, 19, 131, 'AJOYANI', '210302'),
(1246, 19, 131, 'AYAPATA', '210303'),
(1247, 19, 131, 'COASA', '210304'),
(1248, 19, 131, 'CORANI', '210305'),
(1249, 19, 131, 'CRUCERO', '210306'),
(1250, 19, 131, 'ITUATA', '210307'),
(1251, 19, 131, 'OLLACHEA', '210308'),
(1252, 19, 131, 'SANGAB?N', '210309'),
(1253, 19, 131, 'USICAYOS', '210310'),
(1254, 19, 132, 'JULI', '210401'),
(1255, 19, 132, 'DESAGUADERO', '210402'),
(1256, 19, 132, 'HUACULLANI', '210403'),
(1257, 19, 132, 'KELLUYO', '210404'),
(1258, 19, 132, 'PISACOMA', '210405'),
(1259, 19, 132, 'POMATA', '210406'),
(1260, 19, 132, 'ZEPITA', '210407'),
(1261, 19, 133, 'ILAVE', '210501'),
(1262, 19, 133, 'CAPAZO', '210502'),
(1263, 19, 133, 'PILCUYO', '210503'),
(1264, 19, 133, 'SANTAROSA', '010610'),
(1265, 19, 133, 'CONDURIRI', '210505'),
(1266, 19, 134, 'HUANCAN', '210601'),
(1267, 19, 134, 'COJATA', '210602'),
(1268, 19, 134, 'HUATASANI', '210603'),
(1269, 19, 134, 'INCHUPALLA', '210604'),
(1270, 19, 134, 'PUSI', '210605'),
(1271, 19, 134, 'ROSASPATA', '210606'),
(1272, 19, 134, 'TARACO', '210607'),
(1273, 19, 134, 'VILQUECHICO', '210608'),
(1274, 19, 135, 'LAMPA', '050804'),
(1275, 19, 135, 'CABANILLA', '210702'),
(1276, 19, 135, 'CALAPUJA', '210703'),
(1277, 19, 135, 'NICASIO', '210704'),
(1278, 19, 135, 'OCUVIRI', '210705'),
(1279, 19, 135, 'PALCA', '090114'),
(1280, 19, 135, 'PARATIA', '210707'),
(1281, 19, 135, 'PUCAR?', '060808'),
(1282, 19, 135, 'SANTALUC?A', '050621'),
(1283, 19, 135, 'VILAVILA', '210710'),
(1284, 19, 136, 'AYAVIRI', '151004'),
(1285, 19, 136, 'ANTAUTA', '210802'),
(1286, 19, 136, 'CUPI', '210803'),
(1287, 19, 136, 'LLALLI', '210804'),
(1288, 19, 136, 'MACARI', '210805'),
(1289, 19, 136, 'NU?OA', '210806'),
(1290, 19, 136, 'ORURILLO', '210807'),
(1291, 19, 136, 'SANTAROSA', '010610'),
(1292, 19, 136, 'UMACHIRI', '210809'),
(1293, 19, 137, 'MOHO', '210901'),
(1294, 19, 137, 'CONIMA', '210902'),
(1295, 19, 137, 'HUAYRAPATA', '210903'),
(1296, 19, 137, 'TILALI', '210904'),
(1297, 19, 138, 'PUTINA', '211001'),
(1298, 19, 138, 'ANANEA', '211002'),
(1299, 19, 138, 'PEDROVILCAAPAZA', '211003'),
(1300, 19, 138, 'QUILCAPUNCU', '211004'),
(1301, 19, 138, 'SINA', '211005'),
(1302, 19, 139, 'JULIACA', '211101'),
(1303, 19, 139, 'CABANA', '021501'),
(1304, 19, 139, 'CABANILLAS', '211103'),
(1305, 19, 139, 'CARACOTO', '211104'),
(1306, 19, 140, 'SANDIA', '211201'),
(1307, 19, 140, 'CUYOCUYO', '211202'),
(1308, 19, 140, 'LIMBANI', '211203'),
(1309, 19, 140, 'PATAMBUCO', '211204'),
(1310, 19, 140, 'PHARA', '211205'),
(1311, 19, 140, 'QUIACA', '211206'),
(1312, 19, 140, 'SANJUANDELORO', '211207'),
(1313, 19, 140, 'YANAHUAYA', '211208'),
(1314, 19, 140, 'ALTOINAMBARI', '211209'),
(1315, 19, 140, 'SANPEDRODEPUTINAPUNCO', '211210'),
(1316, 19, 141, 'YUNGUYO', '211301'),
(1317, 19, 141, 'ANAPIA', '211302'),
(1318, 19, 141, 'COPANI', '211303'),
(1319, 19, 141, 'CUTURAPI', '211304'),
(1320, 19, 141, 'OLLARAYA', '211305'),
(1321, 19, 141, 'TINICACHI', '211306'),
(1322, 19, 141, 'UNICACHI', '211307'),
(1323, 20, 142, 'CALLERIA', '250101'),
(1324, 20, 142, 'CAMPOVERDE', '250102'),
(1325, 20, 142, 'IPARIA', '250103'),
(1326, 20, 142, 'MASISEA', '250104'),
(1327, 20, 142, 'YARINACOCHA', '250105'),
(1328, 20, 142, 'NUEVAREQUENA', '250106'),
(1329, 20, 142, 'MANANTAY', '250107'),
(1330, 20, 143, 'RAYMONDI', '250201'),
(1331, 20, 143, 'SEPAHUA', '250202'),
(1332, 20, 143, 'TAHUANIA', '250203'),
(1333, 20, 143, 'YURUA', '250204'),
(1334, 20, 144, 'PADREABAD', '250301'),
(1335, 20, 144, 'IRAZOLA', '250302'),
(1336, 20, 144, 'CURIMAN?', '250303'),
(1337, 20, 145, 'PUR?S', '250401'),
(1338, 21, 146, 'MOYOBAMBA', '220101'),
(1339, 21, 146, 'CALZADA', '220102'),
(1340, 21, 146, 'HABANA', '220103'),
(1341, 21, 146, 'JEPELACIO', '220104'),
(1342, 21, 146, 'SORITOR', '220105'),
(1343, 21, 146, 'YANTALO', '220106'),
(1344, 21, 147, 'BELLAVISTA', '060802'),
(1345, 21, 147, 'ALTOBIAVO', '220202'),
(1346, 21, 147, 'BAJOBIAVO', '220203'),
(1347, 21, 147, 'HUALLAGA', '220204'),
(1348, 21, 147, 'SANPABLO', '061201'),
(1349, 21, 147, 'SANRAFAEL', '100207'),
(1350, 21, 148, 'SANJOS?DESISA', '220301'),
(1351, 21, 148, 'AGUABLANCA', '220302'),
(1352, 21, 148, 'SANMART?N', '220303'),
(1353, 21, 148, 'SANTAROSA', '010610'),
(1354, 21, 148, 'SHATOJA', '220305'),
(1355, 21, 149, 'SAPOSOA', '220401'),
(1356, 21, 149, 'ALTOSAPOSOA', '220402'),
(1357, 21, 149, 'ELESLAB?N', '220403'),
(1358, 21, 149, 'PISCOYACU', '220404'),
(1359, 21, 149, 'SACANCHE', '220405'),
(1360, 21, 149, 'TINGODESAPOSOA', '220406'),
(1361, 21, 150, 'LAMAS', '220501'),
(1362, 21, 150, 'ALONSODEALVARADO', '220502'),
(1363, 21, 150, 'BARRANQUITA', '220503'),
(1364, 21, 150, 'CAYNARACHI', '220504'),
(1365, 21, 150, 'CU?UMBUQUI', '220505'),
(1366, 21, 150, 'PINTORECODO', '220506'),
(1367, 21, 150, 'RUMISAPA', '220507'),
(1368, 21, 150, 'SANROQUEDECUMBAZA', '220508'),
(1369, 21, 150, 'SHANAO', '220509'),
(1370, 21, 150, 'TABALOSOS', '220510'),
(1371, 21, 150, 'ZAPATERO', '220511'),
(1372, 21, 151, 'JUANJU', '220601'),
(1373, 21, 151, 'CAMPANILLA', '220602'),
(1374, 21, 151, 'HUICUNGO', '220603'),
(1375, 21, 151, 'PACHIZA', '220604'),
(1376, 21, 151, 'PAJARILLO', '220605'),
(1377, 21, 152, 'PICOTA', '220701'),
(1378, 21, 152, 'BUENOSAIRES', '200402'),
(1379, 21, 152, 'CASPISAPA', '220703'),
(1380, 21, 152, 'PILLUANA', '220704'),
(1381, 21, 152, 'PUCACACA', '220705'),
(1382, 21, 152, 'SANCRIST?BAL', '010516'),
(1383, 21, 152, 'SANHILARI?N', '220707'),
(1384, 21, 152, 'SHAMBOYACU', '220708'),
(1385, 21, 152, 'TINGODEPONASA', '220709'),
(1386, 21, 152, 'TRESUNIDOS', '220710'),
(1387, 21, 153, 'RIOJA', '220801'),
(1388, 21, 153, 'AWAJUN', '220802'),
(1389, 21, 153, 'ELIASSOPL?NVARGAS', '220803'),
(1390, 21, 153, 'NUEVACAJAMARCA', '220804'),
(1391, 21, 153, 'PARDOMIGUEL', '220805'),
(1392, 21, 153, 'POSIC', '220806'),
(1393, 21, 153, 'SANFERNANDO', '220807'),
(1394, 21, 153, 'YORONGOS', '220808'),
(1395, 21, 153, 'YURACYACU', '220809'),
(1396, 21, 154, 'TARAPOTO', '220901'),
(1397, 21, 154, 'ALBERTOLEVEAU', '220902'),
(1398, 21, 154, 'CACATACHI', '220903'),
(1399, 21, 154, 'CHAZUTA', '220904'),
(1400, 21, 154, 'CHIPURANA', '220905');
INSERT INTO `distrito` (`Id_Distrito`, `Id_Departamento`, `Id_Provincia`, `Descripcion`, `Cod_Sunat`) VALUES
(1401, 21, 154, 'ELPORVENIR', '130102'),
(1402, 21, 154, 'HUIMBAYOC', '220907'),
(1403, 21, 154, 'JUANGUERRA', '220908'),
(1404, 21, 154, 'LABANDADESHILCAYO', '220909'),
(1405, 21, 154, 'MORALES', '220910'),
(1406, 21, 154, 'PAPAPLAYA', '220911'),
(1407, 21, 154, 'SANANTONIO', '030709'),
(1408, 21, 154, 'SAUCE', '220913'),
(1409, 21, 154, 'SHAPAJA', '220914'),
(1410, 21, 155, 'TOCACHE', '221001'),
(1411, 21, 155, 'NUEVOPROGRESO', '221002'),
(1412, 21, 155, 'P?LVORA', '221003'),
(1413, 21, 155, 'SHUNTE', '221004'),
(1414, 21, 155, 'UCHIZA', '221005'),
(1415, 22, 156, 'TACNA', '230101'),
(1416, 22, 156, 'ALTODELAALIANZA', '230102'),
(1417, 22, 156, 'CALANA', '230103'),
(1418, 22, 156, 'CIUDADNUEVA', '230104'),
(1419, 22, 156, 'INCL?N', '230105'),
(1420, 22, 156, 'PACHIA', '230106'),
(1421, 22, 156, 'PALCA', '090114'),
(1422, 22, 156, 'POCOLLAY', '230108'),
(1423, 22, 156, 'SAMA', '230109'),
(1424, 22, 156, 'G.ALBARRACIN', '230110'),
(1425, 22, 157, 'CANDARAVE', '230201'),
(1426, 22, 157, 'CAIRANI', '230202'),
(1427, 22, 157, 'CAMILACA', '230203'),
(1428, 22, 157, 'CURIBAYA', '230204'),
(1429, 22, 157, 'HUANUARA', '230205'),
(1430, 22, 157, 'QUILAHUANI', '230206'),
(1431, 22, 158, 'LOCUMBA', '230301'),
(1432, 22, 158, 'ILABAYA', '230302'),
(1433, 22, 158, 'ITE', '230303'),
(1434, 22, 159, 'TARATA', '230401'),
(1435, 22, 159, 'HEROESALBARRAC?N', '230402'),
(1436, 22, 159, 'ESTIQUE', '230403'),
(1437, 22, 159, 'ESTIQUE-PAMPA', '230404'),
(1438, 22, 159, 'SITAJARA', '230405'),
(1439, 22, 159, 'SUSAPAYA', '230406'),
(1440, 22, 159, 'TARUCACHI', '230407'),
(1441, 22, 159, 'TICACO', '230408'),
(1442, 23, 160, 'LIMA', '150101'),
(1443, 23, 160, 'ANC?N', '150102'),
(1444, 23, 160, 'ATE', '150103'),
(1445, 23, 160, 'BARRANCO', '150104'),
(1446, 23, 160, 'BRE?A', '150105'),
(1447, 23, 160, 'CARABAYLLO', '150106'),
(1448, 23, 160, 'CHACLACAYO', '150107'),
(1449, 23, 160, 'CHORRILLOS', '150108'),
(1450, 23, 160, 'CIENEGUILLA', '150109'),
(1451, 23, 160, 'COMAS', '120206'),
(1452, 23, 160, 'ELAGUSTINO', '150111'),
(1453, 23, 160, 'INDEPENDENCIA', '020105'),
(1454, 23, 160, 'JES?SMAR?A', '150113'),
(1455, 23, 160, 'LAMOLINA', '150114'),
(1456, 23, 160, 'LAVICTORIA', '140106'),
(1457, 23, 160, 'LINCE', '150116'),
(1458, 23, 160, 'LOSOLIVOS', '150117'),
(1459, 23, 160, 'LURIGANCHO', '150118'),
(1460, 23, 160, 'LUR?N', '150119'),
(1461, 23, 160, 'MAGDALENADELMAR', '150120'),
(1462, 23, 160, 'PUEBLOLIBRE', '021207'),
(1463, 23, 160, 'MIRAFLORES', '040110'),
(1464, 23, 160, 'PACHAC?MAC', '150123'),
(1465, 23, 160, 'PUCUSANA', '150124'),
(1466, 23, 160, 'PUENTEPIEDRA', '150125'),
(1467, 23, 160, 'PUNTAHERMOSA', '150126'),
(1468, 23, 160, 'PUNTANEGRA', '150127'),
(1469, 23, 160, 'R?MAC', '150128'),
(1470, 23, 160, 'SANBARTOLO', '150129'),
(1471, 23, 160, 'SANBORJA', '150130'),
(1472, 23, 160, 'SANISIDRO', '090612'),
(1473, 23, 160, 'SANJUANDELURIGANCHO', '150132'),
(1474, 23, 160, 'SANJUANDEMIRAFLORES', '150133'),
(1475, 23, 160, 'SANLUIS', '020701'),
(1476, 23, 160, 'SANMART?NDEPORRES', '150135'),
(1477, 23, 160, 'SANMIGUEL', '050501'),
(1478, 23, 160, 'SANTAANITA', '150137'),
(1479, 23, 160, 'SANTAMAR?ADELMAR', '150138'),
(1480, 23, 160, 'SANTAROSA', '010610'),
(1481, 23, 160, 'SANTIAGODESURCO', '150140'),
(1482, 23, 160, 'SURQUILLO', '150141'),
(1483, 23, 160, 'VILLAELSALVADOR', '150142'),
(1484, 23, 160, 'VILLAMAR?ADELTRIUNFO', '150143'),
(1485, 23, 161, 'BARRANCA', '150201'),
(1486, 23, 161, 'PARAMONGA', '150202'),
(1487, 23, 161, 'PATIVILCA', '150203'),
(1488, 23, 161, 'SUPE', '150204'),
(1489, 23, 161, 'SUPEPUERTO', '150205'),
(1490, 23, 162, 'CAJATAMBO', '150301'),
(1491, 23, 162, 'COPA', '150302'),
(1492, 23, 162, 'GORGOR', '150303'),
(1493, 23, 162, 'HUANCAP?N', '150304'),
(1494, 23, 162, 'MANAS', '150305'),
(1495, 23, 163, 'CANTA', '150401'),
(1496, 23, 163, 'ARAHUAY', '150402'),
(1497, 23, 163, 'HUAMANTANGA', '150403'),
(1498, 23, 163, 'HUAROS', '150404'),
(1499, 23, 163, 'LACHAQUI', '150405'),
(1500, 23, 163, 'SANBUENAVENTURA', '100703'),
(1501, 23, 163, 'SANTAROSADEQUIVES', '150407'),
(1502, 23, 164, 'SANVICENTEDECA?ETE', '150501'),
(1503, 23, 164, 'ASIA', '150502'),
(1504, 23, 164, 'CALANGO', '150503'),
(1505, 23, 164, 'CERROAZUL', '150504'),
(1506, 23, 164, 'CHILCA', '120107'),
(1507, 23, 164, 'COAYLLO', '150506'),
(1508, 23, 164, 'IMPERIAL', '150507'),
(1509, 23, 164, 'LUNAHUANA', '150508'),
(1510, 23, 164, 'MALA', '150509'),
(1511, 23, 164, 'NUEVOIMPERIAL', '150510'),
(1512, 23, 164, 'PACAR?N', '150511'),
(1513, 23, 164, 'QUILMANA', '150512'),
(1514, 23, 164, 'SANANTONIO', '030709'),
(1515, 23, 164, 'SANLUIS', '020701'),
(1516, 23, 164, 'SANTACRUZDEFLORES', '150515'),
(1517, 23, 164, 'Z??IGA', '150516'),
(1518, 23, 165, 'HUARAL', '150601'),
(1519, 23, 165, 'ATAVILLOSALTO', '150602'),
(1520, 23, 165, 'ATAVILLOSBAJO', '150603'),
(1521, 23, 165, 'AUCALLAMA', '150604'),
(1522, 23, 165, 'CHANCAY', '061002'),
(1523, 23, 165, 'IHUARI', '150606'),
(1524, 23, 165, 'LAMPI?N', '150607'),
(1525, 23, 165, 'PACARAOS', '150608'),
(1526, 23, 165, 'SANMIGUELDEACOS', '150609'),
(1527, 23, 165, 'SANTACRUZDEANDAMARCA', '150610'),
(1528, 23, 165, 'SUMBILCA', '150611'),
(1529, 23, 165, 'VEINTISIETEDENOVIEMBRE', '150612'),
(1530, 23, 166, 'MATUCANA', '150701'),
(1531, 23, 166, 'ANTIOQU?A', '150702'),
(1532, 23, 166, 'CALLAHUANCA', '150703'),
(1533, 23, 166, 'CARAMPOMA', '150704'),
(1534, 23, 166, 'CHICLA', '150705'),
(1535, 23, 166, 'CUENCA', '090105'),
(1536, 23, 166, 'HUACHUPAMPA', '150707'),
(1537, 23, 166, 'HUANZA', '150708'),
(1538, 23, 166, 'HUAROCHIR', '150709'),
(1539, 23, 166, 'LAHUAYTAMBO', '150710'),
(1540, 23, 166, 'LANGA', '150711'),
(1541, 23, 166, 'LARAOS', '150712'),
(1542, 23, 166, 'MARIATANA', '150713'),
(1543, 23, 166, 'RICARDOPALMA', '150714'),
(1544, 23, 166, 'SANANDR?SDETUPICOCHA', '150715'),
(1545, 23, 166, 'SANANTONIO', '030709'),
(1546, 23, 166, 'SANBARTOLOM', '150717'),
(1547, 23, 166, 'SANDAMI?N', '150718'),
(1548, 23, 166, 'SANJUANDEIRIS', '150719'),
(1549, 23, 166, 'SANJUANDETANTARANCHE', '150720'),
(1550, 23, 166, 'SANLORENZODEQUINTI', '150721'),
(1551, 23, 166, 'SANMATEO', '150722'),
(1552, 23, 166, 'SANMATEODEOTAO', '150723'),
(1553, 23, 166, 'SANPEDRODECASTA', '150724'),
(1554, 23, 166, 'SANPEDRODEHUANCAYRE', '150725'),
(1555, 23, 166, 'SANGALLAYA', '150726'),
(1556, 23, 166, 'SANTACRUZDECOCACHACRA', '150727'),
(1557, 23, 166, 'SANTAEULALIA', '150728'),
(1558, 23, 166, 'SANTIAGODEANCHUCAYA', '150729'),
(1559, 23, 166, 'SANTIAGODETUNA', '150730'),
(1560, 23, 166, 'SANTODOMINGODELOSOLLEROS', '150731'),
(1561, 23, 166, 'SURCO', '150732'),
(1562, 23, 167, 'HUACHO', '150801'),
(1563, 23, 167, 'AMBAR', '150802'),
(1564, 23, 167, 'CALETADECARQU?N', '150803'),
(1565, 23, 167, 'CHECRAS', '150804'),
(1566, 23, 167, 'HUALMAY', '150805'),
(1567, 23, 167, 'HUAURA', '150806'),
(1568, 23, 167, 'LEONCIOPRADO', '050609'),
(1569, 23, 167, 'PACCHO', '150808'),
(1570, 23, 167, 'SANTALEONOR', '150809'),
(1571, 23, 167, 'SANTAMAR?A', '150810'),
(1572, 23, 167, 'SAY?N', '150811'),
(1573, 23, 167, 'VEGUETA', '150812'),
(1574, 23, 168, 'OY?N', '150901'),
(1575, 23, 168, 'ANDAJES', '150902'),
(1576, 23, 168, 'CAUJUL', '150903'),
(1577, 23, 168, 'COCHAMARCA', '150904'),
(1578, 23, 168, 'NAV?N', '150905'),
(1579, 23, 168, 'PACHANGARA', '150906'),
(1580, 23, 169, 'YAUYOS', '120434'),
(1581, 23, 169, 'ALIS', '151002'),
(1582, 23, 169, 'ALLAUCA', '151003'),
(1583, 23, 169, 'AYAVIRI', '151004'),
(1584, 23, 169, 'AZ?NGARO', '151005'),
(1585, 23, 169, 'CACRA', '151006'),
(1586, 23, 169, 'CARANIA', '151007'),
(1587, 23, 169, 'CATAHUASI', '151008'),
(1588, 23, 169, 'CHOCOS', '151009'),
(1589, 23, 169, 'COCHAS', '021405'),
(1590, 23, 169, 'COLONIA', '151011'),
(1591, 23, 169, 'HONGOS', '151012'),
(1592, 23, 169, 'HUAMPARA', '151013'),
(1593, 23, 169, 'HUANCAYA', '151014'),
(1594, 23, 169, 'HUANGASCAR', '151015'),
(1595, 23, 169, 'HUANTAN', '151016'),
(1596, 23, 169, 'HUA?EC', '151017'),
(1597, 23, 169, 'LARAOS', '150712'),
(1598, 23, 169, 'LINCHA', '151019'),
(1599, 23, 169, 'MADEAN', '151020'),
(1600, 23, 169, 'MIRAFLORES', '040110'),
(1601, 23, 169, 'OMAS', '151022'),
(1602, 23, 169, 'PUTINZA', '151023'),
(1603, 23, 169, 'QUINCHES', '151024'),
(1604, 23, 169, 'QUINOCAY', '151025'),
(1605, 23, 169, 'SANJOAQU?N', '151026'),
(1606, 23, 169, 'SANPEDRODEPILAS', '151027'),
(1607, 23, 169, 'TANTA', '151028'),
(1608, 23, 169, 'TAURIPAMPA', '151029'),
(1609, 23, 169, 'TOM?S', '151030'),
(1610, 23, 169, 'TUPE', '151031'),
(1611, 23, 169, 'VI?AC', '151032'),
(1612, 23, 169, 'VITIS', '151033'),
(1613, 23, 169, 'VI?AC', '151032'),
(1614, 23, 169, 'VITIS', '151033'),
(1615, 25, 170, 'CALLAO', '070101'),
(1616, 23, 170, 'BELLAVISTA', '060802'),
(1617, 25, 170, 'CARMENDELALEGUAREYNOSO', '070103'),
(1618, 25, 170, 'LAPERLA', '070104'),
(1619, 25, 170, 'LAPUNTA', '070105'),
(1620, 25, 170, 'VENTANILLA', '070106'),
(1621, 24, 171, 'TUMBES', '240101'),
(1622, 24, 171, 'CORRALES', '240102'),
(1623, 24, 171, 'LACRUZ', '240103'),
(1624, 24, 171, 'PAMPASDEHOSPITAL', '240104'),
(1625, 24, 171, 'SANJACINTO', '240105'),
(1626, 24, 171, 'SANJUANDELAVIRGEN', '240106'),
(1627, 24, 172, 'ZORRITOS', '240201'),
(1628, 24, 172, 'CASITAS', '240202'),
(1629, 24, 172, 'CANOASDEPUNTASAL', '240203'),
(1630, 24, 173, 'ZARUMILLA', '240301'),
(1631, 24, 173, 'AGUASVERDES', '240302'),
(1632, 24, 173, 'MATAPALO', '240303'),
(1633, 24, 173, 'PAPAYAL', '240304');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `Id_Doctor` bigint(20) NOT NULL,
  `Id_Especialidad` int(11) DEFAULT NULL,
  `Id_Pais` int(11) DEFAULT NULL,
  `Id_Departamento` int(11) DEFAULT NULL,
  `Id_Provincia` int(11) DEFAULT NULL,
  `Id_Distrito` int(11) DEFAULT NULL,
  `Documento` varchar(11) DEFAULT NULL,
  `CMP` varchar(10) DEFAULT NULL,
  `Nombres` varchar(80) DEFAULT NULL,
  `Apellido_Paterno` varchar(50) DEFAULT NULL,
  `Apellido_Materno` varchar(50) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Sexo` char(1) DEFAULT NULL,
  `Telefono_Fijo01` varchar(20) DEFAULT NULL,
  `Telefono_Fijo02` varchar(20) DEFAULT NULL,
  `Celular01` varchar(20) DEFAULT NULL,
  `Celular02` varchar(20) DEFAULT NULL,
  `Celular03` varchar(20) DEFAULT NULL,
  `email01` varchar(200) DEFAULT NULL,
  `Facebook` varchar(200) DEFAULT NULL,
  `Twitter` varchar(200) DEFAULT NULL,
  `Linkedin` varchar(200) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`Id_Doctor`, `Id_Especialidad`, `Id_Pais`, `Id_Departamento`, `Id_Provincia`, `Id_Distrito`, `Documento`, `CMP`, `Nombres`, `Apellido_Paterno`, `Apellido_Materno`, `Direccion`, `Sexo`, `Telefono_Fijo01`, `Telefono_Fijo02`, `Celular01`, `Celular02`, `Celular03`, `email01`, `Facebook`, `Twitter`, `Linkedin`, `Fecha_Nacimiento`) VALUES
(1, 1, 1, 22, 156, 1415, '70143435', NULL, 'ALBERTH RONALDO', 'FRISANCHO', 'PONCE', '', 'M', '', '', '', '', '', 'alberth@gmail.com', '', '', '', '1999-10-10'),
(2, 3, 1, 22, 157, 1426, '75744654', '198745', 'JHON', 'ALVARADO', 'ACHATA', NULL, 'M', '123546', '65465465', '654654', '65465', NULL, 'jhon_123_jw@outlook.com', NULL, NULL, NULL, '1996-01-27'),
(9, 2, 1, 22, 156, 1415, '00465365', '084684', 'JHON', 'ALVARADO', 'ACHATA', 'Calle Violetas Mz. C Lote. 6', 'M', NULL, NULL, '+51910181425', NULL, NULL, 'jhon_123_jw@hotmail.com', NULL, NULL, NULL, '2020-07-01'),
(10, 3, 1, 22, 156, 1415, '04848648', '979977', 'ERICK', 'AYCAYA', 'ALANIA', 'La Catedral', 'M', NULL, NULL, '+51910181425', NULL, NULL, 'jhon_123_jw@hotmail.com', NULL, NULL, NULL, '1700-06-05'),
(11, 3, 1, 22, 156, 1415, '65598486', '646846', 'RUTH', 'RAMIREZ', 'REJAS', 'Abajo de la plaza zela', 'F', NULL, NULL, '+51914684233', NULL, NULL, 'jhon_123_jw@hotmail.com', NULL, NULL, NULL, '2020-06-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacio_usuario`
--

CREATE TABLE `espacio_usuario` (
  `Id_Espacio_Usuario` int(11) NOT NULL,
  `Id_Usuario` bigint(20) DEFAULT NULL,
  `Id_Tipo_Informacion` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Espacio_Usado` decimal(18,2) DEFAULT NULL,
  `Espacio_Total` decimal(18,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `Id_Especialidad` int(11) NOT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `Abreviatura` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`Id_Especialidad`, `Descripcion`, `Abreviatura`) VALUES
(1, 'Odontología', NULL),
(2, 'Oftamología', NULL),
(3, 'Psicologo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `Id_historia_clinica` int(11) NOT NULL,
  `Id_Paciente` int(11) NOT NULL,
  `Id_Doctor` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Cita` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Anamnesis` text NOT NULL,
  `Examenes` text NOT NULL,
  `Examen_Fisico` text NOT NULL,
  `Diagnostico` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `Id_Paciente` int(11) NOT NULL,
  `Documento` varchar(30) DEFAULT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Apellido_Paterno` varchar(30) DEFAULT NULL,
  `Apellido_Materno` varchar(30) DEFAULT NULL,
  `Genero` varchar(30) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Celular` varchar(20) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Procedencia` varchar(30) DEFAULT NULL,
  `Ocupacion_Anterior` varchar(40) DEFAULT NULL,
  `Ocupacion_Actual` varchar(40) DEFAULT NULL,
  `Id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`Id_Paciente`, `Documento`, `Nombre`, `Apellido_Paterno`, `Apellido_Materno`, `Genero`, `Fecha_Nacimiento`, `Celular`, `Email`, `Procedencia`, `Ocupacion_Anterior`, `Ocupacion_Actual`, `Id_Usuario`) VALUES
(1, '75745454', 'Jhon ', 'Olvia', 'Perez', 'M', '1997-08-18', '925754844', 'salute@gmail.com', 'Chile', 'Obrero', 'Arquitecto', 0),
(2, '4654654', 'asdasd', 'asdasdasd', 'asdqwdwqd', '', '2020-07-03', '6464545', 'asda@gmail.com', 'asdasdasd', '', '', 2),
(3, '75744654', 'walter', 'huaynapata', 'aguilar', 'F', '2020-07-06', '925754845', 'dyangelt@gmail.com', 'peruana', 'obrero', 'desarrollador', 2),
(4, '4454845454', 'asdasdasd', 'asdasdasd', 'asdasdasd', 'F', '2020-07-15', '464545454', 'asdsdasd@gmail.com', 'argentina', 'asdasd', 'asdsasd', 2),
(5, '7878454', 'walter', 'aguilar', 'perez', 'M', '2020-07-07', '92854845', 'ol@gmail.com', 'peruana', 'odd', 'aksdjlaskjd', 2),
(6, '76507579', 'akldjlakjdlkaj', 'aguilar', 'asdasdasd', 'F', '2020-07-07', '454684654', 'dyangel@gmail.com', 'argentina', 'opcion 11555', 'ocupacion 154545', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `Id_Pais` int(11) NOT NULL,
  `Codigo_Internacional` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Descripcion` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Abreviatura` varchar(20) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`Id_Pais`, `Codigo_Internacional`, `Descripcion`, `Abreviatura`) VALUES
(1, NULL, 'PERÚ', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `Id_Provincia` int(11) NOT NULL,
  `Id_Departamento` int(11) NOT NULL,
  `Descripcion` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Cod_Sunat` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`Id_Provincia`, `Id_Departamento`, `Descripcion`, `Cod_Sunat`) VALUES
(1, 1, 'CHACHAPOYAS', '0101'),
(2, 1, 'BAGUA', '0102'),
(3, 1, 'BONGARA', '0103'),
(4, 1, 'CONDORCANQUI', '0104'),
(5, 2, 'HUARAZ', '0201'),
(6, 2, 'AIJA', '0202'),
(7, 2, 'ANTONIORAYMONDI', '0203'),
(8, 2, 'ASUNCION', '0204'),
(9, 2, 'BOLOGNESI', '0205'),
(10, 3, 'ABANCAY', '0301'),
(11, 3, 'ANDAHUAYLAS', '0302'),
(12, 3, 'ANTABAMBA', '0303'),
(13, 3, 'AYMARAES', '0304'),
(14, 3, 'COTABAMBAS', '0305'),
(15, 3, 'CHINCHEROS', '0306'),
(16, 3, 'GRAU', '0307'),
(17, 4, 'AREQUIPA', '0401'),
(18, 4, 'CAMANA', '0402'),
(19, 4, 'CARAVELI', '0403'),
(20, 4, 'CASTILLA', '0404'),
(21, 4, 'CAYLLOMA', '0405'),
(22, 4, 'CONDESUYOS', '0406'),
(23, 4, 'ISLAY', '0407'),
(24, 4, 'LAUNION', '0408'),
(25, 5, 'HUAMANGA', '0501'),
(26, 5, 'CANGALLO', '0502'),
(27, 5, 'HUANCASANCOS', '0503'),
(28, 5, 'HUANTA', '0504'),
(29, 5, 'LAMAR', '0505'),
(30, 5, 'LUCANAS', '0506'),
(31, 5, 'PARINACOCHAS', '0507'),
(32, 5, 'PAUCARDELSARASARA', '0508'),
(33, 5, 'SUCRE', '0509'),
(34, 5, 'VICTORFAJARDO', '0510'),
(35, 5, 'VILCASHUAMAN', '0511'),
(36, 6, 'CAJAMARCA', '0601'),
(37, 6, 'CAJABAMBA', '0602'),
(38, 6, 'CELENDIN', '0603'),
(39, 6, 'CHOTA', '0604'),
(40, 6, 'CONTUMAZA', '0605'),
(41, 6, 'CUTERVO', '0606'),
(42, 6, 'HUALGAYOC', '0607'),
(43, 6, 'JAEN', '0608'),
(44, 6, 'SANIGNACIO', '0609'),
(45, 6, 'SANMARCOS', '0610'),
(46, 6, 'SANMIGUEL', '0611'),
(47, 6, 'SANPABLO', '0612'),
(48, 6, 'SANTACRUZ', '0613'),
(49, 7, 'CUSCO', '0801'),
(50, 7, 'ACOMAYO', '0802'),
(51, 7, 'ANTA', '0803'),
(52, 7, 'CALCA', '0804'),
(53, 7, 'CANAS', '0805'),
(54, 7, 'CANCHIS', '0806'),
(55, 7, 'CHUMBIVILCAS', '0807'),
(56, 7, 'ESPINAR', '0808'),
(57, 7, 'LACONVENCION', '0809'),
(58, 7, 'PARURO', '0810'),
(59, 7, 'PAUCARTAMBO', '0811'),
(60, 7, 'QUISPICANCHI', '0812'),
(61, 7, 'URUBAMBA', '0813'),
(62, 8, 'HUANCAVELICA', '0901'),
(63, 8, 'ACOBAMBA', '0902'),
(64, 8, 'ANGARAES', '0903'),
(65, 8, 'CASTROVIRREYNA', '0904'),
(66, 8, 'CHURCAMPA', '0905'),
(67, 8, 'HUAYTARA', '0906'),
(68, 8, 'TAYACAJA', '0907'),
(69, 9, 'HUANUCO', '1001'),
(70, 9, 'AMBO', '1002'),
(71, 9, 'DOSDEMAYO', '1003'),
(72, 9, 'HUACAYBAMBA', '1004'),
(73, 9, 'HUAMALIES', '1005'),
(74, 9, 'LEONCIOPRADO', '1006'),
(75, 9, 'MARA?ON', '1007'),
(76, 9, 'PACHITEA', '1008'),
(77, 9, 'PUERTOINCA', '1009'),
(78, 9, 'LAURICOCHA', '1010'),
(79, 9, 'YAROWILCA', '1011'),
(80, 10, 'ICA', '1101'),
(81, 10, 'CHINCHA', '1102'),
(82, 10, 'NAZCA', '1103'),
(83, 10, 'PALPA', '1104'),
(84, 10, 'PISCO', '1105'),
(85, 11, 'HUANCAYO', '1201'),
(86, 11, 'CONCEPCION', '1202'),
(87, 11, 'CHANCHAMAYO', '1203'),
(88, 11, 'JAUJA', '1204'),
(89, 11, 'JUNIN', '1205'),
(90, 12, 'TRUJILLO', '1301'),
(91, 12, 'ASCOPE', '1302'),
(92, 12, 'BOLIVAR', '1303'),
(93, 12, 'CHEPEN', '1304'),
(94, 12, 'JULCAN', '1305'),
(95, 12, 'OTUZCO', '1306'),
(96, 12, 'PACASMAYO', '1307'),
(97, 12, 'PATAZ', '1308'),
(98, 12, 'SANCHEZCARRION', '1309'),
(99, 12, 'SANTIAGODECHUCO', '1310'),
(100, 12, 'GRANCHIMU', '1311'),
(101, 12, 'VIRU', '1312'),
(102, 13, 'CHICLAYO', '1401'),
(103, 13, 'FERRE?AFE', '1402'),
(104, 13, 'LAMBAYEQUE', '1403'),
(105, 14, 'MAYNAS', '1601'),
(106, 14, 'ALTOAMAZONAS', '1602'),
(107, 14, 'LORETO', '1603'),
(108, 14, 'MARISCALRAMONCASTILLA', '1604'),
(109, 14, 'REQUENA', '1605'),
(110, 14, 'UCAYALI', '1606'),
(111, 14, 'DATEMDELMARA?ON', '1607'),
(112, 15, 'TAMBOPATA', '1701'),
(113, 15, 'MANU', '1702'),
(114, 15, 'TAHUAMANU', '1703'),
(115, 16, 'MARISCALNIETO', '1801'),
(116, 16, 'GENERALSANCHEZCERRO', '1802'),
(117, 16, 'ILO', '1803'),
(118, 17, 'PASCO', '1901'),
(119, 17, 'DANIELALCIDESCARRION', '1902'),
(120, 17, 'OXAPAMPA', '1903'),
(121, 18, 'PIURA', '2001'),
(122, 18, 'AYABACA', '2002'),
(123, 18, 'HUANCABAMBA', '2003'),
(124, 18, 'MORROPON', '2004'),
(125, 18, 'PAITA', '2005'),
(126, 18, 'SULLANA', '2006'),
(127, 18, 'TALARA', '2007'),
(128, 18, 'SECHURA', '2008'),
(129, 19, 'PUNO', '2101'),
(130, 19, 'AZANGARO', '2102'),
(131, 19, 'CARABAYA', '2103'),
(132, 19, 'CHUCUITO', '2104'),
(133, 19, 'ELCOLLAO', '2105'),
(134, 19, 'HUANCANE', '2106'),
(135, 19, 'LAMPA', '2107'),
(136, 19, 'MELGAR', '2108'),
(137, 19, 'MOHO', '2109'),
(138, 19, 'SANANTONIODEPUTINA', '2110'),
(139, 19, 'SANROMAN', '2111'),
(140, 19, 'SANDIA', '2112'),
(141, 19, 'YUNGUYO', '2113'),
(142, 20, 'CORONELPORTILLO', '2501'),
(143, 20, 'ATALAYA', '2502'),
(144, 20, 'PADREABAD', '2503'),
(145, 20, 'PURUS', '2504'),
(146, 21, 'MOYOBAMBA', '2201'),
(147, 21, 'BELLAVISTA', '2202'),
(148, 21, 'ELDORADO', '2203'),
(149, 21, 'HUALLAGA', '2204'),
(150, 21, 'LAMAS', '2205'),
(151, 21, 'MARISCALCACERES', '2206'),
(152, 21, 'PICOTA', '2207'),
(153, 21, 'RIOJA', '2208'),
(154, 21, 'SANMARTIN', '2209'),
(155, 21, 'TOCACHE', '2210'),
(156, 22, 'TACNA', '2301'),
(157, 22, 'CANDARAVE', '2302'),
(158, 22, 'J.BASADRE', '2303'),
(159, 22, 'TARATA', '2304'),
(160, 23, 'LIMA', '1501'),
(161, 23, 'BARRANCA', '1502'),
(162, 23, 'CAJATAMBO', '1503'),
(163, 23, 'CANTA', '1504'),
(164, 23, 'CA?ETE', '1505'),
(165, 23, 'HUARAL', '1506'),
(166, 23, 'HUAROCHIRI', '1507'),
(167, 23, 'HUAURA', '1508'),
(168, 23, 'OYON', '1509'),
(169, 23, 'YAUYOS', '1510'),
(170, 25, 'PROV.CONST.DELCALLAO', '0701'),
(171, 24, 'TUMBES', '2401'),
(172, 24, 'CONTRALMIRANTEVILLAR', '2402'),
(173, 24, 'ZARUMILLA', '2403');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencia_usuario`
--

CREATE TABLE `referencia_usuario` (
  `Id_Referencia_Usuario` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Usuario_Referencia` int(11) NOT NULL,
  `Fecha_Registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `referencia_usuario`
--

INSERT INTO `referencia_usuario` (`Id_Referencia_Usuario`, `Id_Usuario`, `Id_Usuario_Referencia`, `Fecha_Registro`) VALUES
(1, 9, 1, '2020-07-05'),
(2, 10, 1, '2020-07-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_informacion`
--

CREATE TABLE `tipo_informacion` (
  `Id_Tipo_Informacion` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Abreviatura` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` bigint(20) NOT NULL,
  `Id_Doctor` bigint(20) DEFAULT NULL,
  `Nombre` varchar(300) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Ubicacion_GPS` varchar(200) DEFAULT NULL,
  `Activo` tinyint(4) DEFAULT NULL,
  `Fecha_Activacion` datetime(3) DEFAULT NULL,
  `Monto_Pago` decimal(18,2) DEFAULT NULL,
  `Fecha_Habilitado` date DEFAULT NULL,
  `Fecha_Registro` datetime(3) DEFAULT NULL,
  `Dia_Pago` date DEFAULT NULL,
  `Codigo_Web_Registro` varchar(25) DEFAULT NULL,
  `Visualizo_Indicaciones` tinyint(4) DEFAULT NULL,
  `Tiempo_Atencion_Promedio` int(11) DEFAULT NULL,
  `Precio_Predeterminado` decimal(18,2) DEFAULT NULL,
  `Hora_Inicio_Atencion` int(11) DEFAULT NULL,
  `Hora_Fin_Atencion` int(11) DEFAULT NULL,
  `estado_perfil` tinyint(1) NOT NULL DEFAULT 1,
  `imagen` longblob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Id_Doctor`, `Nombre`, `Password`, `Direccion`, `Ubicacion_GPS`, `Activo`, `Fecha_Activacion`, `Monto_Pago`, `Fecha_Habilitado`, `Fecha_Registro`, `Dia_Pago`, `Codigo_Web_Registro`, `Visualizo_Indicaciones`, `Tiempo_Atencion_Promedio`, `Precio_Predeterminado`, `Hora_Inicio_Atencion`, `Hora_Fin_Atencion`, `estado_perfil`, `imagen`) VALUES
(1, 1, 'alberth', '123456', NULL, NULL, 1, '2020-06-28 00:00:00.000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '');
INSERT INTO `usuario` (`Id_Usuario`, `Id_Doctor`, `Nombre`, `Password`, `Direccion`, `Ubicacion_GPS`, `Activo`, `Fecha_Activacion`, `Monto_Pago`, `Fecha_Habilitado`, `Fecha_Registro`, `Dia_Pago`, `Codigo_Web_Registro`, `Visualizo_Indicaciones`, `Tiempo_Atencion_Promedio`, `Precio_Predeterminado`, `Hora_Inicio_Atencion`, `Hora_Fin_Atencion`, `estado_perfil`, `imagen`) VALUES
(2, 2, 'jhon', '123456', NULL, NULL, 1, '2020-06-28 00:00:00.000', '4000.00', NULL, NULL, '2020-04-15', NULL, NULL, 80, '4500.00', NULL, NULL, 0, 0xffd8fffe00104c61766335382e33352e31303000ffdb0043000808080908090b0b0b0b0b0b0d0c0d0d0d0d0d0d0d0d0d0d0d0e0e0e1111110e0e0e0d0d0e0e10101111121312111111111313141414181817171c1c1d222229ffc400ab000100020301010100000000000000000000010205040306070801010101010101010100000000000000000001020304050607100100020102040306020804030802010500010203041121051231514106133261719122b18152a17262421423330743c1d124341592e1f0533544637382162593b2d2a2541101010001030204060006020301010100000102310311213204711241618113052251a19152423323b162143472c115d1ffc00011080438078003012200021200031200ffda000c03010002110311003f00f815ad3bcf19faa3aade33f545bbca0016eab78cfd4eab78cfd550016eab78cfd4eab78cfd550016eab78cfd4eab78cfd550016eab78cfd4eab78cfd550016eab78cfd4eab78cfd550016eab78cfd4eab78cfd550016eab78cfd4eab78cfd550016eab78cfd4eab78cfd550016eab78cfd4eab78cfd550016eab78cfd4eab78cfd550016eab78cfd4eab78cfd550016eab78cfd4eab78cfd550016eab78cfd4eab78cfd550016eab78cfd4eab78cfd550016eab78cfd4eab78cfd550016eab78cfd4eab78cfd550016eab78cfd4eab78cfd550016eab78c9d56f19faaa002dd56f19fa9d56f19faaa002dd56f193aade3280013d53e32754f8cfd502a02dd56f19fabbe0b4f5c719eed66ce9bdf851642335bcf8a779f19552a36a8bccc5678cb1bf75b79de766e6499b4f4c7e6e19b6ac456019a570de7c651369f19423b832a989b78cadbcf8ca0004f54f8caf5999b4719517c51bde011596accf8caf169f19724c4834adb8d464ad26b169e99f263f5579da38bb6ed3d4cf604a56af54f8ca3aa7c67ea801913d53e32754f8ca0005baa7c67eaded3ccf477963dbfa7f7045846d6f2e792d3159e32b439669daa0d2b43aa7c67ea8de7c650907353aa7c656de7c6554c002779f194ef3e3284a0bc116de7c65f49f4be2e8e5f9affa713faa1f357d7393e2f63c9e3e3499fac39ee5fc5377475d993d6bb1dd5f3bb4cfb6cbdfdfb7e26f24ff007327ed4fe296e684d18b3ad5bad379f89c7e2255138537973cb698af7746b6a27b4027115abbcf8ca779f1942512b3c349de7c653bcf8ca1644380899dfbba6f3e32a561d22045e05a37f1fd6eb48b5a62b1bef33b2910f43e9fd04eb3594de3eda4ef3f925672d1646b19d63e87c93451a4d1d236e36e32cdc56118e9c22b10cf68b95cdf6be4e11e0e36ae339af449d133cbd31a3a5d0df513c2368f17a7d3683169e3dd899f196d63c75c71b5636756f09eee8e5bb94d2385bca9d31e11f444d6be10e8ac82703c9fabb53fcaf2acb31b6f6fb63f37c1e3eda3eabfe216ab6c583047f15a777cab370aecc5d59cb575c2746b0ed69f1ddeabd23cb3fea3cca9d51f663fba5e622bbbeede8ae4ff00f4fd0c65b57efcbc539e571d4a67a3d9d31d6b111111c23675e9af847d0885dd47015e9af847d0e9af847d17400305cfb534d1f2dcf7e11334b4476ef30f84f2ad2db98f32c74e33d57eab7c9f4cff0010757ecf498f047f993f830ffe1ff2eebcd935568f77edafe6e59ea9977bb6dce213a60fab60c14c38a94888fb6b11f44e4d362cb1b5ab0ee975f6572f7479cd572bf67f7638de3c1889a6dde1eef663755cbe99b8d7859e6ce7a6bbe5398f66de5329a3cd8e5e9af2dd306d1e0d8cda7be0b6d6871d9e52f4af6f13f492faa729afdb3bc3d1683575cb1d37db779d5e979a4c5a3bc37865c57373ddc259e4eb5ed7a6be11f44f4d7c21a3a2d5467a6d3ef437ded670bcc7cf6f39e9a74d7c23e9074d7c23e89ee96863882bd35f08fa27a6be11f4480710474d7c23e874d7c23e8b00702bd35f08fa1d35f08fa2c0270aaf4d7c23e874d7c23e8b009c2abd35f08fa27a6be11f44809c2abd35f08fa1d35f08fa2c01c0af4d7c23e874d7c23e8b00702bd35f08fa1d35f08fa2c01c0af4d7c23e874d7c23e8b009c2abd35f08fa1d31e11f45804e155e9af847d0e9af847d1600e82bd35f08fa1d35f08fa240057a6be11f43a6be11f458038829d35f08fa1d35f08fa2e01c41cfa6be11f43a63c23e8bca0015e9af847d11d35f08fa2e80381ced8e968da6b0c46ab9563bef348da59a559ca72d37865e9acbc367d2df0ced6ab56623c1ef3361a65aed68dde7359cb2d8f7b63e31e0f35e8ed9e3cbdd38af36de7e97c87d4d4e8d7d27c6ae3e9eb6dcc36fdd643d594e9d461b76f262f9170e655f8c33cfe2ccd1d6cfcd6f73e97b27680651d388a6c8da164289c2ab310a4c3a292a89c2be6fea7c3ecf5d5bc7f1c3ce6f2f77eacd3f569eb963f825e161e9c34636f479739f956b775566655e2b4c2aed11c558fcfbf577970de7c65b39e3ee6bb5ca31c29133ff00897d0fd1b1be3c9bf8be7b0fa3fa32bfd0c93fbcce7da99f6b7b53f25dbee8f6d104c252e03d5c41e33d5d877d2d327e8d9e0e2784717d47d4387daf2fcb1e1c5f2bc73bd61e8dbbd1369e5de9f935bdecb6f3e32aef2b4aaee3808de51bcf888544e15cf2ef359e32c6ef3e32ca5a383196eea3362d75c33337ef2dede7c65a5a78fb9ba09210de7c51333e2942a1c2b1992662d3c65cf79f1975cd1f74b8a8c70b4de7c651369f191120caadd53e32754f8cfd554aa209ea9f194f54f8cfd554a80bc5a7aa38cf7662933c38b0d5f7aacc57c846a11b78e67787aae6b1ff0003827e0f298bbc3d6f32e3cbb0fe40d0f1d799f16235133d73c597bb0fa8f7e5466c5ad79b4f8cfd51d53e329954180de7c64de7c650001d56f19faa779f19540455b79f194754f8ca004526d3e3298b4f8cab2980454ef3e32754f8ca051153bcf8cabd53bf79faa512822adbcf8c9d53e328815104f54f8c9d53e32814153d53e32754f8ca00456c60b4f5f796de5b4f44f1969e0f7db59bdc408ae39ad3ecabc65abd53e32d8cff00dbab5812c13d53e32754f8ca0513854ef3e32754f8ca00454ef3e32754f8ca00454ef3e329ea9f15445413d53e326f3e3280404ef3e326f3e3281404f54f8c9d53e3280404f54f8c9bcf8ca05013bcf8ca626778e32aa6bde3e600d2b779f9a136ef3f34302000000000000000000000000000000000000000000000000000000000000000000000094000910009000000006d697df86ab6f4befc2c22c2330028e839c57a77968649eab4b7b2ced496366419a544f1e0921208000025df4f1bdf7706de96384c82c236d2848340d2d4cfddb3758fcf3f78252b809403209000190c1eeb1ec860f7105846c35f513b55b1b353513d81a2b4d2901900488024482c23ae1a4e4c94af8da23f5bed15a7b1e5bd3e18bfd1f29e4b83dbebf0d7f7a27e8faeeba3a74797e14971deba33bbac7a763dd7667e35f228e36bfed4aea53f8be72e8ed34893471ba884828034734ef76f4f08963adc651282bb2db10bec880875ae1be4ada623857ba2949c968ac71999da1ea75da18e5bcb2913fdccbc67f34b58cee8d49cb784d6bcad61d621110e910d230a9ad5f55f48f2ac94d3c5fa7eec9f83c2723d05b98f30c38623bda267e4fd29a3d161d262ad29588888886336a4eade0c65789c3868b97530c45ad1bd99788d9110bae33d31533cbd55cd2240055595e5cb24f4d667c226401f11f5aea3dbf36e889e14ac7d5e2b3cef3b339ce32ce7e65a9bf7fbb68fc981bf19971beecbd38e91668cd7a6f977fd479962c7b6f5acf55be50fd13871d7152b58e1158d9f38f4072a8c58675768e37e15f93e9b10e987bae1a396e339ea9859096c6010970d4648c386f7fd1accfd001f16f5a6aa757cd3d95666629b4447c5f4ef4ce82ba1e5b8abb71b4754fe6f93e8b0cf37e7fbf789cdd5f944beef8e914ad6b1e50e38f5ceaedfbd76cba611373da2e252ea3908120035f369e99abb5a1e7b55a0be1e35e357a9d959ac5b84c396e63cf57576dacf8e95c5e1f64b3bace5dded8ff386126b313b4bc2e9b98fa6be839ed67ea9e4eb832db0de2d0f59832c66a45a1e3594e5daa8c793d9da785bb35b37d9cf1bc6518dec74aeb9ce71af48b2ab43d83c209424000000000000000000000000000000000000000000424004000000002ab22401000021aba9b65a537c558b4f84b65a7aad5574d5e3dfca04b788b1719cde1e7751cd39b62eda3eaf94c3019fd53cd71ef13a19fac339a8d765cde7b47c18fb71efc5cfd76395bcba6384af4638fa63e5dea2e6baae6396b6cb87d8f4cf086134dadcba5cf5cd58e31e4fa17a9b4b4b693ae2b1bd6627b3c6f2cc18f26bb0d6f589acf786f96639f58de5ab7e3d5babf3c71f5ffb9d23d5da8f3c51f57b09e4ba09ff0022bfaffddcadc8397cff00951fad7864f5b7c479bafabe7f8b13bd7d5f87f8b1dbf57fbb2593d2fa1bf94d7e5ff7b4b2fa434d3eee4bc7d3fd9af49ea63ea2dc63ad3d57a2b778bc7e51feed8afa8f97dff8f6f9b019bd1f963fb79227e6c466f4df30c5bed8fabe4715a991338c5c1eaf9a731d0eb747971d7357798e1f37cfa931b2d9b97eaf0fbd8ef1f5694576e1699acb5b7d3959654dceac59636e559872e9bc76b6e8ebbc77aba24615afa8f7a1aeef9af16d9c5a466aa1f4bf4757fe0ef3fbef9abe99e8d9ff0083bc7efb39e867a35b5dcbb7dcf62097147a46a6af1466c19293e7597c6ed4f67972d3f46f68fd6fb65a37897c7b98e39c3cc33d7c6d33f576dabd536f571def65ddd1a6aaeabd23cc2aacaeaeca20ab199236b4b28c7678fb962252ba69e3bb6dafa6f75b0a0a842c80418ecfefb84b67511f735d46695556565641048008a250b4288269ef5598af93118ffb95662a23508dac7ddeb798ff00e998bf2791c7e4f5baee3caf1fe40d0f1f9186cfefcb339186cfefca8cd2b5a509403220000109001000022528948000000482822b5591e694550000400051b1a7f79b39bdc6b69fde77cfeefe68291c73fb956b36351eed5ae0850050000400054400050000140000001000405131de3e62d1de054568dbbcfcd55adde556064000000000000000000000000000000000000000000000000000000000000000001200800000480021200000037349efb4db9a3fee2c161197104ced1ba8e8357536db6869c43a64bfb4b6ea03350424000000190d3c6d463d94c71b560161174a120d0863b2f1bcb232c65fde904a55000641200032383dd63d90c1eea0b163bb433cef66fb1f97df905a57200190482009590b408d41eb3d238bab5fd5fa312fa3f32e1a2cdfb12f13e8bc5bdf2dded79a7fc967fd8979f73b99dcee7ab6bb176fb23e458bb4fce5d1cf176fcdd5e89a0e080900572cb3b55a50dacfdb66b3351145b64c43674da7b6a32d31d78cda620668b272f4be98e57fcce6f6f78fb71f6f9b67d5d937cd8b1c7955ed39768e9a2d3571d636e1c7e6f9d7a8b24e4e6178fd1da1cef5c99c7576938c3cdacba62c0c43a442221b3a7c339f2d31c77b5a23eb2e895c1a7d5ffc3be53b56facbd7bcf4d777d6a187e47a28d0683062db698ac6ff00366a21ac5639e7ab3754c2e8482009400218de699a3068b3de7cb1dbf064a5e43d65a8f63ca72c44ed36da3f5a532d2ac5c758f89e4b754e4bcff15a51cbf496d76ab161aff1da227e4a5f8521ef7d05cb7dae7beaad1c29eefcde7ab3ad8f4a65d257d4b9768e9a1d2e3c34e115888fcd908442cef27115e6b79a89480021e7bd4daafe539666b79cc6df57a17ce7d7daa98c38705678de78c265a56773b6ae3ac6b0ee8d2f40e877b65d55a3f667f17d4de73d2da2fe4f96628f3b4754fe6f489b5dad61db1773b99cbae5448986864372520023642c002bb317acd04658eaa471fc596559cf1f5469bc32f4de5878bb639a4ed68686af05ef58b6399ade9c6b2f69abd1d735778e1679cc98ed8ed35b43c3670edbb8f1d5f425e5c3672e7a337c9f9846bb046ffdca70bd7c25987cdfdbdf95ebb1e6aff6f24f4e48f2e3e6fa2e3bc64a56d1dad112eb85e718e5b3758e19cf4e55d77e7595d1284bd03800000024010000024004094000090010000024010000000000000000204a0004714a001084b867cd5c349b485d0593972d56aaba7aef3dfc1e5b519ed9efd52b6a33db3de667e8d6971dccbd9cade6bbece3eeef8ce270e6acba4aa83430dcea9d5a0cd1f0ff0057cef97cf4eb30cfc7fd5f50d7d3af4d963f765f30d346daac7ffd9fead4f748c65ac32f67d5b64ece94c76b446d132dac7a1cf7ed59164b5b62e5234763667b1727bcfbd3b37e9cab057bf11d66dfedb79b2ddfd3c9c52d3da1daba2cf93b525ec69a5c58fb521d7a76ed0e71e893877b948f15b6bc77fd17264f7ab5fcdf2ef587268e5daca5ba63a7247978bf406cf9d7f885a2f6ba2a67ff00cab7e2e731b1d2e8ef96732e8e1357c56704794ece535c95f8b7fc9ce601d158bcb3bf7aecd7d992d447dad19aa8c2d737b6f4bf34d369296c596dd3369e0f19d32dac7a2d4df1fb4ae3b4d7c62132eb179e1ac2f1933272fb5e3cd8b346f4bd6d1f09757c570eb757a49fb6f7aede4f45a3f566a316d19abd71e31dde776b8f2f5bcd8e7717d1e5f36f54e9e30eb29923fcc8e2f59a2f50e8b59c3afa2de12c37ab695c987166acc4f4cf78670ee24e3276dceb896ccb1af132aafdd57a923ca288590d44415d9a1a88fb99069ea614417c11f643b3960f721d4010848a20d2d4c7186a37b511f6b454669512acaca4820904802122615115d30ff72196ab17823fa90ca402c23668f59abe3ca69f3793a3d5ea7ff47a7ce01a1e47230d9bdf9667230b9bdf9519a5709426550644094000000212800112944a400015000150159591240024014001141b1a7f79df3f68f9b969fde74cff00c3f34058e3a8fe1f935ddf51de3e4e008000a80000a000200082802a080028a0000244a0085e238c216ac7180063adde7e684dbbcfcd0c8c8000000000000000000000000000000000000000000000000000000000000000000000000940000900000001bba3fee349b9a3fee28b09ab2cd5c969c93d31dbcdb17df6e0e714f6749f151b4684f009010042400000168e3686523b31b8a37bc3260d422400515b769632ddd93bfbb2c5f98254a80010480802590c1ee31ec860f741a847763727bd2c8cb1b6ef20b4aa8241904a1282c5596855d221015f4df4761e9d25affa532f43cdb86833fec4b5b9060f61cbf17c6b13f56c738ff90cff00b12f2e5ddf366f77cdecc3b164fc7e4f9261f75d9cf0fb8eaf5247915094ec92a0ad1cd3bd9ce217bf1b4910888110f7be94e59bff00c4e48fd9dde5796e86faed4571d63cf8fc9f61d269aba6c34c758dba62218cef4633ae9b739ae9b53ddd6fc2b33e112f8f732bfb5d6e6b7ef3edb97453fc8e7cd7e115a4be15938e5c9fb56fc59c7559386b734632cb9be4a443da7a27977f3bcd2b698deb8bee978e887dbfd01caff95d1cea2d1b5b2f6f9369356132d1f43ac6d110e910ac3a3a0e22528480084a0010f9aff8819f6c583144fbd6e2fa53e33eb6d4fb6e651489de31c7d259cfb6a6e76b7b7dd176e7e4f13349cb92b4af7998887df7d3bcbe397f2fc58f6dad31136f9cbe3de9bd1ceb79a628db78a4f54fe4fbfd636873db9ce4d6d7bba6e68ceefb2c9212ea388000087c8b9b5a79b7a8a98638d71da227f297d535b97d869f2dff0046b3f83e69e91d3ceb799ea3597f2b4cc4fce5cb774f9a6e75cb19f175dad7e461d31c9f51c58e3152b48e1111110e825d872a0b212000000090010250008968eaf495cf5e1ef37d1b265398ad637d37965e135da59be3be3b471f2f9c327e9ad7ce6c138324ff00530cf4fe5e52cceb34719abbc47dd0f1b8eb3cbf9ae3c9eed727db67936ff1cff835bb8f194bf17af73f2c39636ef38dc5f424a238a5e91e70000004800080048200048020000a880482884800820014000000000000409000425590052f68a44ccf93cbebb5539efb47bb0c9733cfd31d11e7dd8072ddbc473ddbce4edb58f35d766718f9a8877a61be49fb6b32c961e556b7bf3b393a6385c9d58cf398b0bb6eeb4d2e5c9dab2f4f8b41871ff0eff36dc562b1c23666757ab1c662ddb23c596572794c9ca72db0e4de76fb2df83e43a5c3ecf9a531dbf8736d3f57e88bc6f598f84be0daaa7b2f505a3ff9e3f170f4fa5d373d9e8f5fab471dbf77dd31e1c7588dab11dbf0768888571fb91f28fc1d5d24e158b6d4a812008842c800739879ff0052697f9ae55a8a7eeccfd1e8a5af9f1c65c77a4f6b44c02c47e5fdb6de3c276526194e67a6fe575fa9c5db6bcedf2dd8e9866247a0696a23ed68ecc8e78fb5a3b348cd5aa6cfb97a5f975351c8f1cf4c4dbbbe21b3f467a3a9d3c9b4ff001a97aab32f09968f2fabe47a3cbd517c5113f0e12f2bacf47c71b60bedfbb2fb0f33d0f547b5ac7cde7661ca65c194e2bd3709944dabce3e4f8aea7946bb473c71db879c34726b35338bd95ef69af84bee77a56f1b5a2263e30f37ccbd3ba4d552d6ad2296dbf8787e0ed38ae12f0e36658bd3672f9753370e30eb168b7673be1b61be4a6dbc56663e8d79e13c37acbd52b31e35adc43846598f7beaed168b76974232a357531f6b6dada88fb1440c3ee43aa98bdc874510550b2aa038678fb58f64737b8c70334a8739eee87b3b5a26f11c236dff003546562a028809842401b1a6f7e592863f4bde590806a11b147a8cf6df93d3f69e5e8f53a98db94d3e60a3ca5d86cdefcb317f36172fbf2a334ae32aad280644200000001024005656567bc2400000001500561657cc01601445004506d69bbcaf9bdfa234d1dcc9c72d5051c334ff0051c96bcef7b2a085005400015140000011514010450054404828289168101310eb8ebbcc7cca526d3b43d072ee5b7cd68e9aefe33e5002c78ab7bd3f35536ef3f34323000000000000000000000000000000000000000000000000000000250000000000002401094240010900000000001b9a4f7da6dbd27f71458465dcb34ed497570cf3f6a8e952b4400644240000001b1a78deedf696963bcb741a844800a39e4f7658d6472f0a4b1c0cd28212080008096434feeb1edfd3fba0d423bcf69636dde591b7696364169401048a94a168005a1b3a6c7ed3363af8da1af0cd721c3edf9862af7da7766e8996956358eb1f5fd263f65a7c74f0ad63f53579c7fc867fd8964e23663b9b46fa1cff00b12f27b8f67b7c9aba3e49823ec875d94c31f63abd23c4a82dc2b2b29978550068ece958dd110cef22d04eb75748dbedacef2959caf41ac6735ecfd33caff95c1ed6f1f7dff543e81cbf45edadd568fb63f5b5f97e8672cd6b11b56af638b1571562b11b6ce3dd93784f776e7d3839eee5ecc07a92d18393ea76e1f66d0fce5de5f7af5d679c3ca6d1fa76887c22217232d58c170d1b1a3d3db53a8c58ab1bcdad10fd33caf4d1a4d1e1c511eed21f19f42f2dfe6b98c6698fb7171fcdf76884c755c133d226e2d10bc212d8e624000109400297b74d667c1f9fb9de6f6fcc75593bc75db67dd39a668d3e8f35e7cab3f83f3ec45b519a23bce5c911f5b396ee91377d9d76b5ad6cfbbe9de84e5b18b4f7d4da3eebced1f287d118ce53a5fe4f45871785637f9b28dedcfc571e9239ee773375a904b42080001e4fd5facfe5b975a91ef65fb617f49e83f92e5d499f7b27df3f9b03ea6bcebf9ae97475e3b4c5a7eafa160c718b15291fc3110e5aee79431eb9e57e4e93a6df9d32e98633e6ea913c1d47312090042400000000000424004313cc39563d774cefd16acefbb2e33963ea9c34d6397a6b2ad63a62216027401221200848020000a80000000000000000000a8000a2012008128000000000040940030badd164cf9778ecbe2e594af1b7165d0e3f4f9cad7677fabc63247072a62a53b46cbadb1b249c2adbca2a859000abe25cf707b1f50d67f4ad4b7d65f6f7c8fd5b8ba79de9efe3d1ff00f7396e68bbbdae9b7a9b7ddf27d5b0ff006e9f28fc1d5c74ff00daa7ecc7e0eedcd09a314a025441084800a4a930e92a4803e1beb7d24e0e69ed36fb7257f5bc6da1f59ff10749d7a7c39e23dc9989fcdf299e2e7ee5d5e8c7489868d2cf1f6b4193cd1f6b1fb2a72a2221fa47d295db93e9bf65f9ca95ded5f9c7e2fd31e9ec7ecf95e9ebfb90da4d58cb432d1999af546d3e6f29cc749ec2fbc47db2f5ce1a8d3d7518e6b299e8ddeabb578cbcdce5e1e0e61ced1bb775186d86f3596acc3ce3dc92f31f21e6b83d8730cd5f19dfeac65e95b7787a6f53e2f67aeadbf4e1e7a61e9c3ac8ce1a3cd9eb5773b9a56c1fa32d79adabf064a54987458e634ab96d1df8a725eb6a4badb0d67e0d4cd8ed585106d63f7216968e2cb6ac36ab962ca44174250a039e4f7658c656dd98b9eea252aacce9317572dd4db6fe2a30ef59a0c3bf24d45bc6d1fa99cb44cf4f9986bfcd76fbbe55e455591b3a0e62122401b7a5f36fc34b4beeb7201a83668f55ace1caf17cde528f57afff00d331028f2393cd86cbef4b33761727bd2a334ae2aad2a8322000000001090015f3595f3480000000000acac4aa00223b25511404a80ddd3c7daa5bfbbf2876c51b521af6e37bcfc10556b7799f98884aa320028000000000008a80022a8250940048985401d6949b4f04e3c73696530e18ac7c40589c18628f57a3c996f8a3160a6dfa566a683965b37df93eca479cf06eea39962d2d7d8e9a36f29b08d457ca2dde7e684dbbcfcd08388000000009400000000000000000000000000000000000000000000000094000000000000000240010900000001b5a5fee355b3a6f7e14584665ada99e10d986a6a7c946e95aa08064120000000dfd346d46c39618da90ec0dc200080e39bdc63dbf9fdc6828cd2800880090506f69fb4b45bba6f305846c5fdd963591cbee4b1c82d5128482095a10b4200b43d8fa3f075eb2d7fd18878f87d33d1da7e9d35f2fe95b6fa319f6d6777b5d36fba35b5dcf6bb3439a7fc966fd896421a3cce3fe0f37ec4bcc3d63e478bddfcdd14c7dbf39757a478d510e39a786cd8886b65e36401ceb5de6223cdf5ef497269c786b331f75f8ccf843c37a67955b986b6bf6ef5acef2fd0da0d1d74b8a223bece791ae5e4de1ef7f4ce578c7cdb1a7c15c148ac43604b7073b79a8f96ff88ba89ae1c387f4a7abe8f92443e93fe2364df59a7af856cf0fcb3496d6eb30e1ac6fd56872cb532d5db1d0c7b5f64f42f2efe539746598fbb2fddf93dd435747a7ae9b063c511b456b11fa9b90de3a351cb3d6a5d564a212082509001084a001e57d619fd8f2ac91bed36e0f9b7a5341fcef32c7331bd717dd2f5debed474e0c38bc6665b3e86e5fec74b6d45a38e5fc1c373ae7175dcf277dbe9854d36deee236888f05d09761c4480002992dd14b5bc226576279de79c1cbf3da3bf4ed1f9f012e9459d6c78ee438675fcef55abb71ad2db565f4779ff4e683f92d15667decb3d76fcde81cf6b4b7f75ac2718c6f7359f08ce779ca8b212d8c8940900000000000000012008120021200084a12080000a000800000002a0000000000000002a08480021202880000000000010250006c0002a2c890055f35f59e2db59a3bfef447eb7d2de0fd6b4fb7496f0c8c6e76d373b6b7b7dc61dd1ecf4b3be1a7ecc7e0d86ae8a77d3629fdcafe0da6a684d233752eb44a12a208128004292bab200f23eb0d3ff31ca72edfc3f77d1f0a8f75fa4b98e1f6fa4cd8ff004a931fa9f9cf2e3f63972e3fd1bda3e92e796a67eced8686dfbb4f347db2c7ecca658fb658dd991b55f0c7f571c7ef57f17e9fe595e9d1e08fdcafe0fccba6aef9f147efd7f17ea0d1d7a74f8a3f72bf8378983967a1b8db490b36ae68c2f33d1fb5a75d7bc3ca5a1f42b5778792e69a4f6393aa3b59c739d5bce747ab6af31cb6af193e63eaec3f662cbe13b3c54f17d3bd4583db68327ee7dcf99471ac1b7a33b6e9b9aaeeeae72a4c3acc28ee8e239b867f725b130e1a8f725a1073ae3ade90e37c368ecd8c1c68ead24418fae6bd276b366992b7ed2bda95bf76a5f4f35e3569106d4f662edde5b35cd6af0bc35a6779684a2afa268b0c57d3b7f8ef3fa9f3cd9f57a62e8e43b7ff001eff00a9cf734f9a6e7b37b5afc9adad6f93e4c85a7bcfcd5758470a509095106f6963ec6dc3574dee36601a8ad8a3d3ebadff00f1b85e5ab2f45adb7ffc7e0fcc01e6eec364f7a597bb0f93de9f9a8cd2b9aa94032084a0000000040022165616004000000000000ac2c9a46f289001285e91bda00191af0ac34a7f8e5bb3c2ad0b7b93f19051c63b240540011440011500145000100128aa8250b20a0ed8b1cde538b14de59dd168af9ad14a57f301638e0d3cf0ad637997a7d372ec5a5a466d4cc78c57cdd27f96e534f2be6fd50f39ace616cb336c96fc846a0c96bf9a5b3fd94fb31c768879ccfacae39da38cb1fa8d74db857831fd5bda37f1542d73b7973b779f9a136ef3f3420800000000000000000000000000000000000000000000000000000000000000000000000009000000000001df07bf0e0ef83df854519b6a6a7bc36e1a7a9ef0d0dd2b580064000008e22f48def000c9d636885910906c00401afa8f75a2ddd4f66928cd28020809424144ecdcd379b51b5a6ef20b08eba8f75a2dcd47669a0b44a5098004af0a3a420a2d11bbec9e9ec31879762f8f17c830d7ab2d2be3688fd6fb8e871fb2d362af8561c77744ddf677d9d5767ddb9b34b9947fc1e6fd896fb4b9847fc266fd89701e81f22c7da7e72e8a523bfce5d767a3d89a3c8261a9d339326d1de67686e793d4fa3391cf33d77b5bd7fa58a6278f6994a941f49f46f238e5ba2adf257fa978de7e1bbdc442b4ac562223c9d08ace579ac02db2b200f84faeb37b5e6bd3fa112dff004072e9cdabbea6d1bd71f08f9bcf7a9b2ff31ce336dfa5d3fadf60f48f2efe479663de36b648eab397f77ccc7b9dff00b7e49976bd4c2e88859d47112000240004094003e47eb399d5735c18238f0ac6df397d3b96e96347a4c58a3f86b10f9f69b4dff51f53e7b5b8d705a1f4f88d9c71efc9adb9afc6bae5d30c533f6f21225d073000013b303ceb164d4fb0c358deb6c91d5f088e2ce930ce5a569ac758ca98e9d14ad7c22174c2522940000480000000000000020240510900450001000000000000000000000000000000000000000000015004028000200028000084800211b240055e2bd674df4d86dfa391ed5e53d5d5df97efe166373b6ae7db5bc3ba261dd19de5d3be8f07ff005d7f06eb4395ff00c8e9ff00faebf8320b8e93c8c7b679196b532d6f98102880848008565640038de37897e7ef5069ff0096e6ba8a76ded36fabf41cbe2beb7c138b9a75f95e23f0633f633d1d76f54dbd5e27247db2c6eccade384b1b30e68ecadae5d4ead6608fdfafe2fd3b83862a7ecd7f07e6ee458fda733d357f7e1fa531c6d4ac7c21d70f74c1c773d8dcf6758595859d0721596a6ab0467c535fa375ce6055978a8f9b733d3cce1cd8a7f4661f1ce9e9b5ebfa3330fd15ce347d759c958f2e2f81f33c3fcbebf353e3bb961d2af1c64f567d64665e70f263a5ce5da61ce5d5184736be7acde22b1de65b4ad237cf863f7e1a4f6456a61acd3aab3de25d9b1acc5ecb5796bf1ddc25b8ce1a22e5ad555587446472b52b6eec6e4af4da76651a19e3ee519aad789e31f37d7eb35c9c9787fe4ffa3e53a5c319f518a93fc56ac4fe6fa1eb3966b345a4b7f2b92671cd38d267fddcb73dbccdcbc58e9b3efe46d4e95f339ef3f395533de627bee8768470baad41212a32321a7f721de1c70f0a43b0363a44b2d9f3c5f4386bbf1899618dc00b4b117f7a5959626fef4a8cd2a884a019102500000002128900455288ec9000000000000501359dad0be4af4d9cdb19637ad6c8035ddb0c6f78716d69e38c8036724ed49f9342feed5b99e76a34afde23c016954014400004004514001000014048803b63c737952949bcf064b1d229002c64b97e86d9ed111c223bcbd06a359a7d062f65a7da6fe7779aa6b3261c7358b74c4f7d987d46b77de2b3f983512d6feaf5dc6666dd5696072e6b649e32e56b4dbbaa8896b0263bc7cd54d7bc0022dde7e684dbbcfcd000000000000000000000000000000000000000000000000000000000000000000000000240109000000000001db0fbf0e2eb8bdf85146723b35753de1b51d9aba9f251bba1746a800c800003b618def0e2dad347dd3202c6ea50906800401aba9ed0d36dea3c9a8a8cd5a00a8ca8b200059b3a7f79acd8d3fbc0b11d351da1aadad4f935506816424054c3a4290bc220acb726c1edf5d869fbdbfd1f6bc71d3588f08887cabd278baf5f16dbdd8997d621e7ddd5373b9e8d9d2b5b3da96a6ba37d2e5fd996e35b591be9f2feccb90eaaf90d638dbf6a5d21111b5adfb52bc3d1343d9e4a5d56ad2d96d5c75e36bcc561fa07d31ca6bcab97e3a6df7da3aaff00397cabd17cae7987328cb68fb307ddf0ddf79ac6d111e09eeb1326725a178442ca300e7927a6b69f089fc1d5a9acb7469f2cf8567f04283e07834f3cc7d41d1b6f139a77f944bf4061c718b1d291dab111f47cafd15a1f6dccb55aa98e15998facbeb6e787bae1a3ae7a4673d44896c60128480008004ab68deb31e312b200187e59ca29a0be6cbbf55f2dbaa67fd19904c670ad6579aca4424004a0004ee7142c0084a3cd20000009100024000000012800120020000a8000000000000000000000000000000000000000000000000000a80801500014000000001020010f33eab8df965fe130f4cf3fea7aefcaf2b3976df232edbe4d63dd3cd31ee8dee51c797e9bff00aebf8324c57249df96e967ff008a9f832a63db3c8c7b67919775f332eebe6025a1040000844aca80292f957f8878b6b69b27e52faacbc27aeb4b39b9775c46f34989fc99cfb4cbb6b787744c3ba3e3d6ed2c6cf764a7dc63a7bb8a3d2acffa5ebd5cdf4dfb4fd155ed0fcfde90c7d7ce307c25fa0a1d76fdcdbf770dcf6377d9784a2167547210acc2eaca80e192917acd67cdf06f5ae8a747cc6b3b70bc4cbef92f99ff00889a3ebd2e2d4477a5f6fc99b345ba3a61758ce3abe432e730eae72a8e94ae69c11beaf047efc12eda2af5ebb047ef4349744f726ad9e7d8bd96be7c26b0c4bd3faab1746a30dfc61e6570ed4dbd0cfbaaee77288590ea398ab4b511c5bcd4d4c76510adbe478bdaf30c31f1dfe8faf6a2bbe9ef1fbaf97fa5b1f5f32a7c225f56c91f64fc9c377589bbdcefb3db5767b5f06d4d76cf963c2f6fc5afd9bfafaedabcdffd97fc5a4f44d09a47972d6ae7ad5446c44f16918194c71b561756bd9651b03710008962afef4b2b3da58ab779519a555094032080000000113d92ac80260000000000000054025b51f761f9355b7838e398015aaddd3c6d569cf7643146d4854211c7513da1a93c6d2d8cf3f7fc9ac0528028800000000800828002883a5293794529379642948a420350a52290b5af148e2e5973571c3159735b2482e896bae7d45afc23b350422335128000131de10bd2b33681414b779f9a16b779f9aa8000000000000000000000000000000000000000000000000000000000000000900425000009004240001000240001d31fbd0e6e98fde858845676bda1c3511c1debeec39678fb1a1a568000c8024006d6967bb55b9a58e1320b08db001a004a00d2d4f786ab6751ddac0cd289424000001677c1efb83b619daf00b08eba8ef0d66c6a3bc35d0512942d0828b42f0ac2f0828f77e8cc733972dbf75f488788f46e2db4d7bf8cecf710f2ee77267dd5ebdaed5dbed896beaa3fa193f665b0e3a8fece4fd99607447c8a63efbfed4fe2b6d36dab1de7841fe664fda9fc5ea7d21cb3fea5cceb368de98b6b4f86f0f47b27b3cd752fbbea7e91e531cb3975378db25e22d67ac856b58ac44476874858ae5756530b21200317ce6dd3cbf513ff00c76fc19473c98a99a934bc6f13c26105479cf4ae86347cbe26636b649eab7c5e9d5a52b8eb15af088ecb263d22b596aca400048800120002500009100024000488001220005e4552009080012212000000000000022400000000000000000000000000000000000000000000000000000004240010000a094008000a0000204a00112c17a8637e599fe5fe8ceb09cfe37e5b9ff67fd132d2f919697c971d613587a7e77e57a6ff00ebab34c07a6a77e5783f6219f4c3b679261db3c972eebe667dd401b1900001025000a4b07cff0017b5e59a98ff00e3b7e0cecb53578e32e0c949ed6acc7ea4ba2acd51f9b3b567e0d0d998d663f659f3d3b74de589d9e51ec1ec7d0d4eae6b1f0abeed0f8a7f87f8fab99649f0a3ed70edb7a536f470dcd4ddd57483a0e408595501ce61e5fd5b83dbf28d470de6b5de1ea658de698bdb68b3d3c69282c1f99fc94977bc74e4c95fd1bda3f5b8c9123b51ce61b7caa3ab98e1f9b5a590e475eae698fe112b742e9526b166acefab70ef831e4fd1988fabc4f93e8dea7c7d7cbedf09897cea3b26de89b6bbbdc6eeaa2abcaaf40e2a86aea3b4369afa88fb551957a3f4762ead55effa30fa5de3ed9f93c37a2f16d4cb93c783dd5bb4bcfb9dc99f757a36bb5adaed8f87735af4eb73c7efdbf163659ce7d4e9e639a3e2c24bd38e90c3b63c79eb7cd73eeaaabb6f30b95e3786d1cc6dc7563f8c3b52f165b672b62f3af0951a576438c64db859db7dc10567b4b176ef2ca5bb3153de5512992a250a322122000000056cb2b200b2120008000000000001b5a6f386b36b170bfce001cba77c9b7c5906b52bbe4996ccced00b1631d9677b5a5c616bfe32806400500004400150000005e949bc95acda5bd4ad71d41489a52290e39b5114e11ddc73eabcaac7ccccc88ba336ad7bcde78a820435404ece95c73228ae7b2f149977ae2d9b14c33646856a4626de2d3cccc79372b86b45fb4c01c2f0f3b6ef3f3426dde7e686460000000000000000000000000000000000000000000000000000000000000000000000120084a1200000000002f5eea2d5ee0a33d4f760bc6f59857171a43ab437ec462a636437f2e1eae31dda331b032b50002096fe9e3ec8683258a36a408b08e8900684c213e480068ea3de6bb633fbcd7066ea51284800b2a9004af8fde8516af705846c6a3bc383b66ef0e282894c21684145a1d214875a46f688f1944aa3ebbe99c3ecb97d3f7b8bd24317ca717b2d161afeec32b0f2657ad4babdd876c268973cf1be2bfeccba968deb31f0941a47c7726f1932fed4fe2fb5fa17954e8b97c66bd76be6fbbf27cb795e82dafe75187a666b19a66ff2897e89c38ab871d695e1158888fc9de7b18bcb9fba67abac2eac2d0d0e6894a00048852d971d3debd63e731080ae831f979a68b0efd59f1fe5689fc188cfeaae5f8bdd9be49fdda5e7fd04b9446e636bd421e1afeabc979fe969b34fff0084c395b9b739cdee6932edf3ac7faab8fab2ac3d131c31d5ef66f58f3739cf8a3f8a1f3bbe5e7d93ff006b7fced5ff007728c3ea0bff00edf6fcebfeeebcb87a7271e2bd3ebc23e873adc15fe28729e65823cf77858d17a827fcba47e70eb1cb39f4f962875f5c72f464e136f2aeff00563d9ffd570a3feab87c25e4ebc9f9dcff001e18faff00b2d3c9f9d47f99867ebfece9f5239fd3ae5f4b274fad1ea7fead87c24ffab61f097929e59cf23b7b29fcff00ee6b5f49cfe9fe456df29874fa91cbe9e4c7d1c9d66ee2f71ff55c3e129ffaa607838b738a47dfa3b7e535ff007739e65a9c7fdcd2668f946ff84bafd48e1659ece3f4b27a2678d7d0e399609f3758d7609fe287ce29ce71ff001e3cb4f9d2dfecdac7ccf4b7fe3dbe7bc7e2f47d48f2735e5bb793d8fa257363bf6b43abc1e3d5d3bd72d7fed43258b98e6a7f1757e6f6cbcbc932b1e0b387b72c257aa4b0b8b9ad6785e3664f1ea31e5f76d0f639e3b9ea785d73dbb8bbaca25d072164a000488480000000022a41000900100000000000000000000000000000000000000000000000000000409402a25000a8000a0000204a00112c3f3d8df9767fd99fc1986279cc6fa0cffb33f8265a52e9566b09ab1de94b7572bc5f0e0f4cf2fe91aedcae9f3ff57a8676fb2791b7d91acfba99f75006c6000001094002b2e7687552401f9ffd4987d8734d457c78bcbbddfae30fb2e65d7fa759fd4f0af35d4cbbabd78e863db1f48ff0f29ff139edfbbb3ebd0f97ff008798ff00a79aff001d9f50875dbed5dbed70dcee373b974a12d8e60aa4501496be6af5d2d5f18986ccb9ca00fcd3cdf0ff002fcd3578fc3231b2f57eb1d34e9f9ce5b7fe6ed6796984891dd2691ca596f4e577e65bf844b152f47e95c716cf96de0b744cb45c7b9ac7ba3d3f3ac7ed3439a3c2b32f9557b3ec3aca75e9f2d7c6b2f90cc74dad1e169836936cddf65ddf652555e547a12380872cd1bd1d55bfbb2d083e81e91c5d1a0dfc665eaa7b30be9fc5ecb97e2f8c6ecd4bcb9f754cb5af5edf6c5c748f8efa96bd3ccb27e5f83cecbd57ab29d3ccedf18afe0f2d2f561db0dbed8f1ee775373baaab628df242ae9863fa8d8e708c800a342b358b77719adb1f6e30d8400397544d658d9eeca5bb4b173dd519a55405190424004000023cd2af9802c000080000014001004c36ebefd7e4d46ec47dd4022c6c6db299676a4aed7d4ced4016b437dd2884906680002002a28002a28b56b3692b59b4ed0dc88ae1aef28044c4570d78b433ea26f3b476573e79c9f26b08b7a3349e284ba569ba2a2b9ba571ccbb56910ed5aee28ae55c710d8a629b7686de1d24dbcb7f83d2e9395456bed33cc62a478f7901a9184d2f2ebe6b7db5dd9abe834fa2c5339ed1d5b70ac39eb79f61d2567169236f2eaf378ed4ebb36a2d336b4cee21225adccbaaa577db8b1f6d45af68e2d69923bc0896b25bbcaab5bbcaa0000000000000000000000000000000000000000000000000000000000000000000940000900042400000000004c2120a33582f1d11c5df786969f1d6d46c7b18f8b437123b3964c75bb5724da93b6f2e7ed2fe20d32b5f1cd1c969bda7cd50412ca523ed86323bc3295ed022c22c09d81a128e2995401a19fde7175cbefcb903200002764aab0025284a0b08eb93cbe4e6b5a77d950512b42abc20a2d0dad2d7af3638f1b47e2d686579463f6baec35fde66a65a35171d63ed1a7ac571523c223f06cc395236ac7c9d61e41ed82f0caf2ed1fb7bf54c7db0c6d2b369888ef2f67a4c54d3618df68e1bc92735bc275673bc635cf7af4e182e51e9ea72fe61aad4cc47f5277a7c3c5eae187cfcef41a7e13962d3e15e33f462efcfb59a8b74e8f497bfef5fed8fd6e913979ede5787adf9b865d5e9f07bf92b5f9cbcc7f23ceb5dfdfcf18227f869dfead9c3e9ad344ef9af933cfefdb78fa2a70c37cf1a3b66f5268a93318faf2cfeec4fe2d4b737e69a9ff96d1cd77ed6bcff00a3d061d169b4f1b63c54afca1b31b41eafd2afa7f6c3cb468b9deabfbda8a6289f2a5677fc65dbff00d6e97fef6ab517f87546df83d26e6ecf16ead35cc9a46584c7e9ee5d8fbe3eb9f1b4ccb214e5fa4c71f6e1a47e4dbdd1ba7a62afaaa2b18b157b52bf485f6ac79423737005b81d94dcea8f10074dcddcfaa3c4ea8f10074dcddcfaa3c60ea8f180074dcddcfaa3c53d51e200bf095671e39fe1acfe508ea44e4ac77980073be8f4d93dec549fca1a3939172ecbdf053f26e5b59a7a7bd9691f9c353273be5f8a266da8c7c3f7a19b8cab7293dda99589c5ac566f48e86fc696cb8e7e16e1f831f93d39cc74fc74fa8eb8f2ade192bfac394d3fcd99f94231faab067b563161cb7899efd32e396d7e9afa91db1ddfdb1f4eb073ff0056d2ff007f4fd511e7575c5cdb1d663aa6d8a7f7b83e81498cb48998ef1e6d4d4f2dd26aebb64c549f8ed1bbcf65c757b38994eaf4ccb1c9e3e6c63749ce22d1c662d1e30cee1cd4cd1bd65e3f3fa5ef8266fa3cb35fdcb7186a62d5733e5b7ff88c33d31ded5e30e7b79f3d1cb2c2e1798e9b9b7e9eae98ee4ca715f431a5a1d5d75b82b96be6dd7a931bcce5e55ca716c120a2000000002250240000000000000000000000000000000000000000000000000000004240010000000a00000000201000319cda37d0e6fd8b7e0c9b1fcd3fe4b37ec5bf04ba52e8b3526ac6fa66bd3cb317c61e8584f4fc6dcb707ecc336cedf6c5c3b62e7dd4cbba8034320000084a0010acad2ac803e4ff00e2169e7af0658f0b43e60fb4faf30c5b97d6fe75bc7e0f8b3cd9f755dcee7ab0ed89b7dafb0ff87f8fa74592de367d161e33d138ba394d27f4b8bd9c3aedf6ae1db1cb73b933eeab2509686010940021ce5d25cec00f8fff00889a7e9d460cde35e9fd6f9ccbebff00e2261ebd0e2c9fa3797c859f7a7bbb63a1868e52f5de92a7d996de32f256ecf71e95a6da29b78da533d133d1bc3b970ee7a5bd77acc7c25f1fd553a3539abfbf2fb14be57ceb17b2e61923c789b7aa6deabbba35b9dac4ca8e92a4bd308f28aab31d535af8cc42eeda3c5edb59829fbd12a5d1166afab68317b2d2e2af8561b88ac6d588f825e5baa3d93457cabd611b6bf7f847e0f1f2f6beb2affc6567e0f172f5edf6c36fb5e2ddefa6ef7d525db4f1f7b8bbe9bde96c7287bb74051a0425000adfdd962a594c9eecb1720ce46484250a320000084a000563baca4080b884a80200012800004a00130c9d63847c18d8eec9d7b02c22cd1d5cf686f31ba89defb02d2b8c241519000114014016ad66d3c1111bb72b1186bbcf74021115c35de7bb1f9b34e49f8232e69c92e5159910a9555e29bba569b3a0a0ad6910e910886d62c1bf190515c5866ef43a2e5393371db68f3b4afcbe9a4c713933db68af6af8b4f98fa82d93fa783eca476d81645d23379755a0e534e1b65cbfaa25e475fce351adb4ef6da3c218ac996f9277b4eee6885bc31aa66d32a800826bde3e684c778f98022dde509b779f9a00000000000000000000000000000000000000000000000000000000000128000000128001208004800000000000250901594d1cfdb2de63b452c8b491b9a134696a23ee6b36f53e4d4512952212082d5f7a19486331fbf0ca035089210b20a0aa51200c6e4f7a545ad3c655064012009110b0009425058b129424012b42b0bc20a2d0f47e9ac7ed398e3f87179c87a1f4eea2fa7d54db1e29cb3b7088633d132d1bc3ba2e1ac7d8a3834751cdb49a79da6f16b7e8d78cfd218aa69f98ebff00bb7f6149fe1af19ff465b49ca34d8ad1b57aed3e76e2f2eab5ece78678fdb7397e6d7eae632e9b4dbd63ceff006fe7c59cbf24e61afda755abb523cf1e39da3e5bc3d0e874f5d3e1ad6236e0dbde3c5bc6373470dccb9ae795e6d62749c8f43a488db156d6fd2b4755beb2cbd6b5af08888f92939291ded1f56b64e61a4c51bdf3523f32412de51bc879fcbea6e5387bea69f9305a9f5f72ac3bc526f79f8446df8ab3c8d4c5ef51bbe41a9ff12adbcfb1d344f84cdb6ff4979fd57aef9b6a27ec98c71e11c7fd958b5974983efb37ad7bcecc7e7e6fa0d37f73518abb794da1f9d7373fe659fdfd45ff0029ff00bd8dbea72e59def7b5be72db939bd1c3efdaaf5b728d3ff99d73fbbc7f060b3ff88da5aff6b15adf3e0f8cf51bb57261ca615d9f52cbfe23e79f7304558ecbebfe677f77a6bf943e7fd46eb72acb1308e8f5f9fd65cdf346dedba7e5c18e9f50f349ff00dd65ff00b52c0ee9dce68cfa634cdffd7b99cffeeb37fdb947fd6f994ffeef3ffdbb7fbb0db9b9cd44f4cfd2b31ff59e65ff00fd79ff00fea5968e75cca3ff00779ffeddbfdd86dd3b9cd0e27e959a8e79cce3ff00779bfedcba473ee671ff00bacbff006a582dd3ba7344f4cfd2bd1d3d4bcd69598fe62fc7e32d7bf3be6393beab37fdb961b74ee9cd0f4c57a4e5d8798f37bcd299edc3bf5df6fc65ed349e83be4dad9f51bf8c44effadf2ec59f2619de97b57e53b3d0683d51ccb4331b659bd7c2d3feab31f533cf0c6597a5ab257d7b45e94e57a4dbfa5179fdee3f8bd1e1d360c31b531d2bf2888786e4feb7d2eaf6a6a63d8dfc7bc7d5ee30ea3167af563bd6d13e0f46384c4c33e5e6cb2b572c7d2da84a912b36308b22d4ade36b444c0b00298f153157a6958ac784708fd4e90858d001284800000000228942411400100000000000000000000000000000000000000000000000001090151000280000020012810009420001a3ccb8e8f37ec5bf06eb4f5f59be972d623799adb87e529742e9566a46b7248db9769bff00aeacb31bca696c7a0d3d6d1b4c63ac4c32298f6c31d2196b4bad4881a100000000042ab2b200f2beafc3ed794e5fdd9897c0dfa2fd434f69caf531fb92fcf158fea447ef7fab86e6bf25dcd63d1b5a26d695f7ef4b63f67ca74f1fbaf48c5f27c718b4382bfb91f8328e98f6c5c748e596b4cb5a94a12a32084800aa92bab200f19eb5c519393e59fd1e2f85578d61fa1bd4b8bdb72ad457f767f07e79a7666eab5d70d0c345327bb2fa27a771fb3e5f4f8f1fabe7b78df68f197d6b4b87d8697057ff008ebf8319e866ed86a61ababe71ea9a746b71dbf4ab2fa3bc37ab70cef872786f1f5670d4c356f73b572edaf1b2aaf2acbd5123c82bb331e9fc5ed799567f4237621eb3d23877be6c9b7c0cb4a9b9dab8eb176fba3dd8944bce3d43e6beb4aff5f14fc1e125effd6befe1f93c0cbd5b7da9b5daf1ef779bddf5cdb3a68ef2d76de9a3ed751c86c80a288040039e4f7658c964f2fbb2c648334a84250a32084800812800422133d8800476949b1000094000000009005a91f743270c762e368648161112c55e7aaf32c8e59e9a4b190052a4054400144006ce3c7111d564142b118abd52d3cb9ad9256cb92725b68ecad69b00295a3aedb2404074a63b5dd71e1df8cb6beda47800d298f0c57b9933d71b5b3eab6e1563ad69b7710d12d77cba8b649eed74022540000000042d1de155abde000b7795536ef3f34000000000000000000000000000000000000000000000000000000000000002500000000900000000000000004a120a373473f7b2cc2e9e76bc334b08d6262e1a88dead164b246f596354294001075c3efc324c760fee3228350894a120a0adbb4aca5fdd9006327ba13280644904240004a002448350128590022168442d0828b443de7a330ff5325f678487d27d194db064b7ef39ee686e76baedf745daee7bb86ee9b4fa9c93d586b5998fd2ecd2c7136b44479bdb68f0c60c358f3f379e4e6b583d195e2573debd182cba7e7f97b65c78be5d33f8eed7ff00a473cc9eff0030b57f66b8ff00ff0017b09b444719d9e4f9dfabb41ca6b31d7ed327e8d78b7d5a70e62461b5fe9ae6734999e69936f8cd6bf8443e59ce299b499269fcf4ea3c76c933feadde75eafe61cda66bd538f1fe8c4bc9ccefc6677646a56a4e17ea99ef3326ee7b9ba0d0e9b9bb9ee94551d374eee46eca83aee6ee7b9d4c8a3a6e9ddcbaa0eb45075dd3bb875a7ad955476dd3bb875a7ad15477dd3bb875a7ad955477dd3bb8f5add6caa8edba625cbaa16dd955476895e25c6257896554778967396f3ed7f2db47b3cb69af9d678c7eb79f895e259e7829672afb8f26f59e935d15a6798c593e3c227eaf6d8f2d72444d662627b6cfcb91698e30f4fca3d51ade59688ea9be3f3accbd1867ea79a65c57973c7d2f4d9cbf40a5e4b94faaf43cc62226feceff00a36f17aaade2d1bc4ef1f07b58c32994789bcb1b8d745944b6302e955200900000000128045488482000000000000000000000000000000000000000000000000020015000050000109400226d10e17d4e2a77b43965d2ce5b6f379dbc18dd4f279cdeee6b512d91cf2dbe7dd64b5d31dcf4fb376dccb057cdad7e73828c4cfa66f79fbb5593ff001f9b8cfa3b0dbbea327fe3f32eec8c7d0f8936b2adfd7acacf3ec31fa3f571b7a830feefd58fff00f4bd2ffe764ffc7e69ff00f4bd17fe664ffc7e67d65fa13f67d0a9f5ab73febf8fca69f54c73d8f1a7d5a13e8ad17fe6e4ff00c7e6afff00a5697cb364ff00c7e69f59afa31bfa0e7f5ab2f5e7759f0fabbc737a78301ffe97863b6a32c7fe3e6e793d25a9a7f67576fcd26e9f45abb37f64dfaf511cd30cbbd75d82dfc510f097e43cf717bb9e9788f8cffb356d5e7ba79fbb4ded223ceb2dcdc95c6ede518bb594769bb2eafa7572d2fdad12e8f95c73ccfa79db2e9f3e39f97fdecae0f53e3f3c9b7c2d130f4f3cbcb32cb1796ce1ecb8e39bdf21e774fcfb0e4db7b44fca597c5acc197b5a1eb72c7739d5e276cf6acd1cb9a53af459ebe3497e76c78fab5bd1ff00cbb7ff00ecfd21a8daf8724471deb2f8069b16fcf229ff00cf3fff00726eeb1773d8daf736fddf7ed257a34f8a3c2b5fc1b4e78a36a563c221d1d268ae5752a5280104880010acacaca80c7f31c7197499abe34b7e12fcd7d1d17c95f0b4fe2fd3b9ebd58af1e312fcddcc717b1d7ea69e17b7e2c5d4cbd9d70f74c1ab869ed353869fa57ac7eb7daf59a7f634c3f0a447ea7c8f93619cfcd74d5fdedff5bee3cd71ff0042b3e1b33968b74aeb8dfca33fdd8bcc4bcbfaa71f568babc2d0f552c1f3ec7ed397e5f846ee73548f465a55f67cba3b420a7ba3d691e314b70897d0bd2b83d9e87abf4a777cf3276dbc783eb1c9f17b1d0e1aedb7db09b9a33bae9b5dc6d6b59244aeacb88f40f9d7ad7dec2f9fcbe83eb5ef85f3f97ab6fb4daed78f7bbe9bddce72ddc11f634a5bf87dc8751cc7500010250a038e6f7658d96473fb8c68334a00a32200001094002252894800acac0020442c002000004803b608fbdbed3d3c716e82c2357553f6ecd286c6a677b6cd704ab40054005e95ea9f8200e98b1f571f2467c9d5f6c765af9768e9ab5c01111b2474a639baa02b5acdbb3731e188e32bd695c70d6cda9db85408ba3b65cf5c71f1637267b5e5c6d69b775510b580000000010940024000426bde109af78002dde7e685a7de9f9aa0000000000000000000000000000000000000000000000000000002500000000000094240000000000000000004a120a3a639dad0ced7b43cfd7bb398677a42c235898bacf662edc2659463f2c6d7950ab5c8120c8eda7f7d906869bdf642106a10ec94424141cf2fb92e8e59bdc90158e9364aa0c0b000090041625284828244a02a616425005df56f4a53a74113e33bbe50f79cbfd49a7d068a98a2b36bc47eb72ddd177272edb5dc9b778afae72ac117c9d76ed5f176e6beaae5bcaab3d7922f788f72b3bcbe21a9f56731cd59a63bfb2a4fe8f0979cc996f96d36bda6d33de665cb0d1b9386b77ae4cdbcde5eef9d7aeb5fcc2669827d863f87bdb3c464cb7cb69b5ed3699f399ddc7748a9152204161122933b293641a476de15eb72115474eb4754a821545f7375528a2a52aa5004a77552cb554592ac277640592aa514164eeaa59551785b752166541d22cbc59c5661546cc5dd225ad0bc30a2b6e25d21bfff0045d67f2f5cf5af552d1bf063b8d67698da6186b2c6c58cccb975a5ad49deb3313f07b6e49eadd66866b5cd3397176e3de1e2625b18727b2bd6db45a227b4f69671cae3595cb1f5469fa1b97f38d2731a44e2bc6f3fc333c61977c6b415d273098b69734e8f51fa3bed59987b1d1f35d6e82631eb6bd74ed196bc7eaf76397aa7479b0bc759f38f0e53d35e8ce73d2ebed5ed966be0cd8f3d22f49ea89767ad25e5e55ab25095100000012020000000000000000000000000000000000000000000000000000084a00000050000100002ab23700438e6a5af49ad6d3599ed3e0ec80079eaf31cda1bc62d647099dab963b7e6ce63c94cb58b5262d13e0aea34f8b538e71e4ac5a261e3f372fe65ca324e5d1de72e2ef38ade5f2631bed754ce7bcd5aca7bc5c2fb5d1ed4797d17aa7479ad18b37f432f69adb8717a4c7929963aab68b47c1d18c72f530de58fa5d040d8c092500038df4f8727bd8e93f38863b3f22e5b9f7ebc14fcb832e25c6556a65632f1da9f47e96dc7064c9867cb69e0c2df91f3dd16f6c59ab9ab1da3cf67d2c71cb6ff004ecf463bbfb707cbedcef9a682b319f4d93f28de3fd5e2343aaa4f3ba6a2fbd2bed7ab69f9bf415f152f1316ac4fce1f27d4fa7716bbd479b171c78f85bede1e4f2f5f777ce73fcdeafc6e9eee185d7c9f4cd3731d367ac74de3eac844c4f6e2f9f5fd27aad1f1d1ea6db47f0df8a29cd39bf2b9db5382d6ac7f157f1597973b8dc7ac4cb1b8bacce6738afa20f37a2f5268b55c26fd16f09e0f414c94c91bd66261d99c72f53cede78fa5d0068604225280073b46f0fcf3ea3c33879ceaa3c6f32fd0ef867adf17b3e7133fa55dd322ba60986ad3f48609cdcef1cf9523797db75f4ebd3da1f2cff0fb075ebb5193f46b5d9f5ecd5eac768f827ed6356fe5132d5e0a58fe618fda6972d7c6b2ca66af4ded1e132d5cd5de968f84b80f61347c5e2369b4785a63f58ed9ebd1a9cd5fdfb393d58a63a4792ae5a98e9ed33e2af8da1f61c34e8c74af8447e0f95f28c7ed798e2aedda777d66236886373d9373574daf75dad05657565cc751f3bf5b7f92f9f4be85eb6ed85f3d97ab6bb536b478f7bb977bb9ce591c7ee431ec957b43b0e4240004094280d7d44fd8c7b7b53eeb4419a95084a14400000425000aca624f3240122200044f0e29251000900004a1200dbd3470996d38608daabe5b74d241a9a1ecd0bcef695005640010416eae1b2a0280988ddb78b0edc6402298f0efc65b16b571429973571c315932daf22352336bbe6d4cdf788e0d4df740225400001094002509400000009100094c7785535ef0005bbcfcd09b779f9a0000000000000000000000000000000000000000000000000000000000000004a000122000480000000000000009424144c331a59de8c3327a39f2582c26ac834b511c776eb5f511bd546aad68824181b3a5ef2de869697cdba837089000071cfee3bb5f51ee82a3440064128488025090688244880250b40288dd6e2250511b3b55cf6758628b15685910b6c82894b7347a0d46b6f14c349b4cfd1f42e53e8ba536c9ab9de7f4611ac71e558b5f3fd1f2ed56baf15c38ed3f1db87d5ee345e91c3a5c7edf5b6f76379aefc383e83a7d160d2562b8a91588f0786f5af35f658e34d8edc6def131e5d32e916d6275af9f736d461cfa9b7b1a45295e15da3662d2870a3b4d1400156241280dc802504e1d662090473e1db8212244ae7e975e10b0941cbd2edc09011c7d2edc2528488e3e976e12b1b241c7875e12b42ab6cc8e4e9e95e1d214885e195736ac7d63d23aa8cfa39c56e3d13dbe0dae69e97c3afded86229927f289792f476a3d9eb271f95e1f5ac7c2d13f17a263ebdb5d9edaf2dbe9ccddee7cb3fe8f8f0da34daca5b064ed5cbb4f44fce63835f5de9fd6e86bd7d3ed31f95e9f747ea7db757cbb4dcc7174e5a44ef1c27ce3f3794a69f5dca33c60b53f99d25e768dfbd5e3b8ff0007a339ef3e6ed33fe2f3e37dabe4959b56778deb31f94bd6725e67abcd93d85f51c2d1b4464e359f871e0f69cdfd1fa6d6d7dae9bfa5798df6f297cd75bcaf59cab2ff0052b35da785a3b3c92f15d7776f8eb347af2e2c72dbcf9e95f57d36ab5bcb29d37d2f553bf563da63f28ab2da5e7ba5d45a293d58ede16adabf8c3c67a5fd4bed2634bab989f2a5a7f097d0ff0095d3de62d38eb33e53b3a639fa7a55dabebc7af5e1cb2c7d5d62ee4f4e5e6dc89dd2ac7059d91c4480a0000024004000000000000000000000000000000005000400000000000010000000280200004001ba0400250846e00944a3756640579be73e9bd273489b6d18f2795a3871f8ecf039351cf3d2f93a7efcb87cbbdabb7fa3ebf3688ef2d3d4c6933526b9ba2627c7671cf1f4df5475aeb85e7a572790e57eb9d26ab6aea3fa56f1f27b3c1add36a637c59697dfc2d13feaf9873bf4c682d36cba4d463a5bbf44cbc07f37ace5d96694cd6acd67f86dbc318e7cb96538bd1bcb0e1db1bcceafd31ba777c0f49eb5e6ba6da2d6ade23c6277faeef4ba4ff10e3788cf87e7316ffb9e97099d799deedcafabee6ef1d83d6bca337f996acfc63fef6571fa839665eda8a71f197762672b83770ace8d1c7aed366f732d27e52d98b44f696d39e5838e1d376957438ebaab6a3f8e6366dee9dcb395251656d4ade36b444efe29dd208af37aff004bf2fd64f5747b2b7e953edfc186b72ee73c9befd3649d4638fe099e3b7e6f7c873b8fbc7474c73f6ae6f25a2f55e9ed318b555be0c9dbeeada23ebb6cf558f363cd58b52d5b44f9c4eed2d572bd1eb236cb8ab3f1ed2f3b9b92ebb974fb4e5d9a76ff00cabf18fca7fee671cb92e3fa6b2c78265fb7b343ca697d47eced1875d8ed83276dfbd67f3e0f4b8b3e2cd5eaa5e2d13e0d24ac37945df1dff10b0cd75b87278c6dfa9f637ccffc45d34db4d872c7f0db8fd0a5d0c754c758e7fe1de0fe8e7cdfa56dbe8fa6bc57a134fec794c5a7f8ef33fa9ed884d172d532d6bc6f31c7ecf3dbe2c5de384bd1f3ac7c6b679eb38dd572d5ecc3ae319daed7c879ae3f67cc73c78ceffa9a4cbfa831f4733b4fe96cc459db0d21868e396b573ee677d2d8baf5f92dfa357d25e27d2387866cbe33b3dbb9ee77265abb6d769876c42b2bab2c8dabe7beb5f770be772fa2fad7dcc2f9dcbd5b5da9b5a3c7bddc6f77291c661928ecc757df8649d87284409400084a1406a6a7c9a4dbd4f786a03352a1091510100a0084a00110944240112255ec00944a5120091109004885abde00190c71b561c3556e110da8ed0d0d44ef7f902fb1ece200200008a262374d6b369da1b95a57146f2009c78a291bcf772cfa98a70870cfa9df84346677ee22e8cdab5ad369de540104000010940002500000000000000026bde109af78004dbbcfcd55adde7e6a800000000000000000000000000000000000000000000000000000000000900402401094240000000000000000141200096e69276bb49b1a7b6d78059aa334ae48deb2b9dd47418a17bd76b4a8a303734d1c25b70d6d37bada41b84128480a35751d9b2d6d4f90252b4c006412082c448241a04a1280ab4255dd688128b0eebc40bc4256562a25d2215d992d072fd4730cb18f0d6677ef3e501a8357162be5bc52913699ed10f75cabd199b3f4e4d4cf457bf4f9bd7722f4ce0e5b48b5e22f93c67c9eae2bb2c9cba49c44b78632bcb1da1e59a6d0638a62c75aed1df6e33f9b21b2fb0b0351ad9f2461c56bcf6ac4cbe07ceb5b3aed765cbe5d5b47e4fb0fa9b551a5e5d97c6f1d30f855b8cb19b39eade1aae0aa164398ed23a613a213b24442475884a402469094ecb452d3e4896f0378ede59f6ce544bb461bcf92f1a7b1cb9dce461f476fedfbd9fb70d659b51a69f14ff2df16dcbea3e7bede3f69fde4d51b9fcb4789fcbfc5d1c7ea3e23ef7ffc9c7faff83512dafe5be27f2f2ece5f51f09f672fb55f6c9ac9877fe5ec8f63687473f5c7c67d1cfeddbd8fc5cd64cd2d1e486d397ce74cf6b3dbbd670b2d0aad023934bc2f0a43a420e7968b968cefa7f2fb2e63867e2fb7d3b43e0dcae76d661fdb8fc5f79c713158f943d3b1a54d8f778b7b586f7b33fa7e38ead89ac4f76ae8e77c6dc6eadd5c4435357a1d3ebb1cd32d2b689f18e30dc4b367314e7847c839c7a5351cbef39f4bbda91c787787a6f4c7a8bf9a88d2ea3865af08dfcdee26b168da637878fe71e9aae5b7f33a4fe9e6af1e1c377927fab3f8577dcc7d51e9bfecc3e31c70cbd35ec96799e45cdada9aff002fa88e8cf8f84c4ff16cf4ce8e7b779c7c986b39c5480e8320000090040000000150000000000000000000000000000000000001009004000a008004a046e00206b66d4e1c11be4bc57e61a06ad857779cd573d9f774b86f9e7c623edfab42639deb237bde9a5a4fc7798fc071b95cb4fe63acc663aff27abcba8c586266f7ad63e330c06afd53caf4bdf356dfb3313f83c5736d46834116ae4d464d5e59f28b7089fd6f9cea32466c96b4474c4f9783a5ca62f2e6ccc6d7a70e5f57d57f881a6a7f671cdfe7bc3cf6a7d7dafc9bfb3ad69f944bc0eeaccba5ddfd394739b5fb767a3d47aab9aea3be798fd9e1f83119799ebb2fbda9cd3ffe76ff007684ca9bb5cda8ccc6469b16d466b77c979f9da5c26dbf1956654dd55074dcddcb746e023af527aa63ce5c7737501bb8f5ba9c33f666c95f95ad1feacee93d57cdb49eee69b47ef7ddf8bcaee6eb2f0259cabeb1a0ff001126222baac7ff00e51ff73d8f2ef5672ce63315ae58ada7cadc3e9bbf3beeb56f349deb3359f83a4cff006e6e1961fa767eacade2d1bc4c4adbbf38687d4fccf41b74e6b5a23cadbcbdbf2eff001122662baac5b7ef4717a1c665c3caef961cbeb5ba7761343cf341af88f659a9333fc3bf165e2d12ec92f2e0b658ebb9ba9ba625441ababd0e9b5959ae5c75b6fe311bc7ca5e6efe9fd4686d393419ef5ffe3b5a6d5f96d6de21ebf74a58ad4bc32f1b8bd4597477f67cc70ce29eded36fb27f3ec9f535b0730e4b96d8ad5c91b56626369f37a8d469306aabd39695b44f8c3c5736f49e4b62bff239ad8e27be29f767cf6679e56ce5ae3aa63787a0f4ee28c5caf4f11fa2cd3c472de779796531e975f82d8ba23a632471a4fe6f5d8357a7d557ab164ade3e124d094baad8d3e6b8faf04cf83c8cbddeaa9d786f1f09786bc6d330e79eab9fb3becf6fcd367ddf35f55639aeb71dbf4aaf377e1597b2f57e3fece4f0e0f1978df6af8cc43786861a26e772ee773e8fe9ac3ecf97d27f4b8bd0b4395e2f63a2c34f0ab7dcaeb52eaed8e916682b2b2b200f9f7ad7dcc2f9d3e8beb5f770be76f4ed686d68f2ef7726f7718b8e48641a38237bb79d87284000042128501a1a9f79acd8d47bed7906695000215002880894a24011092000000056126c002bda5644a600075c51bddcdb3a78e3b8036e676862ed3d5332decf3b51a00b5280000b56bd53b415af54ecdada986379ee08b135ad70c6f2d0cd9e6f28cd9e724fc1ac21a250041001000940900400000000000002401000009af784263bc0016ef285adde55000000000000000000000000000000000000000000000000000000000000001284802120000848000000000a25000090004af49dad0a2d000cf5277ac2ee1a69de90d89b4428e8469ea29b4eed6d99ea72cd6eb2bfd3c3698f1d97bfa6b98d31daf6a6d158999f9440c5dc919aebf4b2ac669a3ec6cb8e08da8ecda30a00a00d3d4f9371a5a8f781295ac900641284a0b144a13dc4144ed3246d0b6f032469311b2ee7bad59dd2941787452174146e683477d76a6986bded3b3ee9ca39460e5782b5a563ab68eab79ccbe61e8ac3193997ecd777da21bc22e3a3393392d10b4410bc368c8aa1dab8ed7e110dcc7a0b5bdee00d272f947af33f4e2c38bf4b8be5730fa6ff0088dd34d5e0c55fe1aceef9a3967ab396aef86861a282db2181eac345c7440b6cdac7837e328c679711b7b3c1787ffc8dd93da75ad7a62b59b35d378b6a2b11d96673cf879ed77f09e032dffcb2e98bf498e3309249c70e35c55aba45621616e56b2e5b3e1b6f66718c7a0126c09c3484a4111509480caa129044513094832a6d12e76c559745a0978479f7b630de9c651dda57c335ece70c935f262db8c3be3972e38de2bf2be27c3dd8cf8f6f6afb9e37666eed5fdceb1af0e90ac2f0ee8fcb65a56b3d1bfa09db538a7f7ebf8bf4be9b1d72e9f1cda3bd23f07e6be5b5ead5e18fdfafe2fd37a6aed871c7eec7e0f4f87d69e1f5c9f3fc47f69e23d938f0c629e1d9dc4ba5d4bab8a404c0828849b2401a53a0d3cea2b9fa222f1e71feadd129270ab6f280000910022a400400000000000000000000000000000000000000000000004000002a008050954400297e3598df6e1dde4f55aae57a69b4ea32db35ebe5c7f0ecf4ba9d561d2e39be5b456b1e32f9473ef5369b375e2d2e1a4efbc4e498de7f2633e3dd8ddca49f16f1e7d9bdac6dac86a7d71a6c1bd74b823f38dbf0792e63eabe63afdebd7eceb3e5579cb77de7cdca65cb2dde7a47274c76fdebb26f69b4ef333333e72e5326fba6b872e4f76969fc9567542d72952653962d8ad35b46d30e13658a82fbab32e5369566d2aa23aeeab96f2aee288eeaeee3d528ea9141df746ee3d4758a23b6e6ee5d69ea45074dd3bb9ee6e00e9badbb8ee6e00dcc3a8cb82dd58ef6a4fc2767b8e51ebbd668e2b8f3c7b6ac7f17f16cf9eee9dd65e04ca72afd23cafd4fcbb99d63a72d6b79fe1b7097a28b44f67e50c79af8a7aa969acf8c4bddf24f5d6af43b63d4ff005a9e33de21d65e5ce5e1e6b3877ca72fbba582e55cf745cd6916c39237f3aefc619bddd495e75b385cf254041c751a5c1a9acd72d2b78f8c3ccea3d37ec6ded74196d82f1fc3bfdb2f5a82c559784788a73dd6682decb9961e9af68cd5e35fcda539f167b5ad8ed16accf0d9ef351a6c3aaa4d32d2b7acf94c3e57cdb936a7976a6d7d0de62bdfd9cf18fc9cb36b2d1e8dad6b1b5ab15eaca7568e2de12f0ba4c7edf57a7a78da1eb39af338d46872e1cf5f6796b1da7cfe4c37a6b0fb7d745bf42bba61a549d2574dcee865d72c5f4dc75e9a563c22170607710acacac822be79eb6ff25f3d7d07d6bfe4be7d2f56d769b7daf1eef71bddce9a78fba5b8d5d379b6dd51ca2a10914454212851063b3fbf2e0eb9bdf9720669500032084a140112944801000000002f8fde5b2e29a4ef1d9ce3bb251f754058c62be6e97af45a61490412dec11b55a2c8d3eda02c235b536de621acb5e7aad32aaa1504c46f2446ed9fb70d779ee010fb7046f3dd8fcb966f28cb926f2e42152802080080048848021280004a00000000000000004a0004d7bc2135ef0009b7bd3f3556b779540000000000000000000000000000000000000000000000000000004a00000000120008480000000000000a09400240005a165617880064b4b7fb7a6379b4cf087d27917a7b1c63ae7d4d62d7b71889f2617d25c97dada353963edafbb1e32fa845623b31b99711c772f35e8d9c7d57c9df671e31f373a63ad236ac44443579870d1ea3ff00aaff00837d8de6d3d3a2cf3ffc76fc18474ba2d7c7b17bbf9ae8c7eeacf6c23c020050068e7f7dbcc7e6f781295c804190379480d0885b61282a1d29d930b20a236dd6881645508e0eb1c5485e23662ad583d67a3f574d2731fbe768bc74bed959898de1f9b715a6b68b47098ecfb57a379ee1d7d6ba7d45ba7252386f3ef7d5bc3473c6f159ca3594e8f658f15f24ed11bb2987411deff46fe3a52b1f6c43b3b23932e74c54c7eec6cb4aeac80af877f89787a75982ff00a559fd4f96bed7fe25e966f8706688e15de27f37c5b670cb533d5e9dbed36fb54d859d31d3aacc3395e8f6e3a3a787c7d79e18feec74c387ce5b7b2d11b1b3cfb979ae6fd2fdbb63e96ccbef9757bb19c493f48d9294ec0daabb2765b64f4882f0a6c6cebb27a406bd2e5b1b3b744a7d9dbc24196f871e93676e8b781d121c30df0e5b25d3a4e941cdbf4a86cbf49b20c2d8aa56d93b08c88d93b703659118b395ad1bd7a6c43ae68fb9ce1e997989876bf21e2b1f46e678fc5d7ee1d37f366f9063f6bcc7047efc7ea7e93c71b56bf287e7ff0046e0f6bcdf0f0e15e32fd051c1ebd8f75f0fdb5f17c4fb33e23ba2c942d0ddd47312020000009000000040005448000000000000000000000000000000000000000000021200204a0050000154ab3c0010c1f38e79a6e558a6d6b44dfca91dd8de7fea5c3cba96c58a62f9a6387c1f33ae9399f3ccfd5317b754f79df68672be99cbcdbb97ab2f4c5c67aaf0f46d63e99eaae5cdf9eeab9ae49ebb4c53ca8c661d06a73f1ae3988fd29e11f59d9eee3d3b8b94d2b6cf8efa9cb6f76b5e1589f8f764b49c8759afb45b53b60c31db15236faccb95b72aed30ba7f37592611cae7effca3e59fc8ea3265f678e96c93bedf6c6f1f57a9d07a1f5ba988b6698c51e13dff0056efad69b95e8f471118f15636f3f377cf7f6749fd4e78e172af6e38f1d1d32ce62f25bcdeaf9e57d21cbf4d31bff5263befd9cb9bea349c9b4b3ece948bcc7db11b3d3e7c914adaf69edbcbe29cf798db5fabbceff6d676ac24c26de3c9bd7a71fb74f55ce9b53ab0fa8cf6d464b64b4ef369ddad2bcb9cbcda8efa2ab2aa55684542bba5595540dd02054040804549baa0a82dd4b75b91ba2a2bbc5b75b76b6e98b22a0d8dcddc7ad7dd141d374eee5ba77006fe935ba8d1648c98725a968f3897d43d3febede6b875ff002f69fefe6f90ee9896a518ca72d3f57e9b59835748be2c95bc4f84b6b77e61e55cfb5dcab245b16499af9d2677897d7b94faf397eb2b5ae6fe8e4f3de786edb31e775ca72fa08d1c1afd36a3fb79696f94c3737687212f31ce69b64adbc61e9984e714df1c5bc259cf45cb474daef898774780e6dcb30ebb05e26b1d7b4ed2f01c9afa9e57a9be4f637b538d6d311db8bead3c5c234f8a2262295e3df839e37a58c3d19ceb2ba35f49afc1acac4e3b46fe75f386ebce6b3935a97f6da3b4e2bf9c7f0cba68f9bed68c1aaafb3c9db7f2b2aeb08ce9e4cf4ab29de278c2b28368f9dfad7be17cfa5f40f5afbd85e025eadbed36bb5e4deee37bbdb1a6f765b2e3a78fb1d9d15cc40008a844a512a20c665f7a5c9d2f3f74b9831550002020144044a55f30059000000003238677a431cddd3cf005845b3e3ebafc61a0cb385f0c5bb7702ab4a91bda1bb9add1472c78a62dc7c95d4db798a8241ac0eb1b638ea9efe4082dbd70c6f3dda5932ce495725e6f2e6809401040000102500094000000002500000000000000000002d1de3e6aa6bde00136ef2aa6dde500000000000000000000000000000000000000000000000000000000240102500025000240000000000000004800a0942d000b4325cb3476d6ea71e2ac77986361f4af456823efd45a38c4ed54ace778c6ae339ae9b339ce3df68b4d4d2e0a62ac6d15886e2216796f547be4e228c3f3c9e9d066fd9966181f514f4f2ecbf258b3566e956e95f2ba764a2bd92f60f008128500636f3bda591b7696327ba094a8048009424404a50b402894a1640130942f1088aab42f10ac3a44202bd0f27e4bff0052c592d16dad5ecd5c98355cb3511bf552d59e168ff77b0f4747f432fed3d5eab9760d7d7a725627e3e70e7cf572cbb9d3d3f8f2eb8f6c6e7a47d5f4d7d6ba6d55a2b963844cf0ea7d262777c0399fa439872c98d4e9b7bd23ee89afbd0f59e97f59ef31a3d7fdb78e15bcf0fca5ebc6f31cb1bc3c394e2bb673d5cfc1f5444a297ae4ac5ab31313e70b4bb8f32bcb7aaf97c6bf95e7aedbda91d55f9c3f35e4a4d6d359ef13b3f5c64a45eb359ed3131f57e75f57726bf2be619262bfd3c93d559f9b96e6abb93a72efb359dabc578dd9b3a78e32e3b36b4fe6f367a54cf4afb5f6eebbfb7e69f6ebc789c3cdb1b2764ecb6cf28fd8c22bb2f156ee934593557e9ac7ce5eb749c970e2da6f1d523a618f2dc8f3efef7d39c4d6bc7e1d166cbeed2df465b0f21cf7f7bed7b5c782948da2b10ef1466636bd1c3b67bd86d6af8d9676bcae2f4f638f7edbb769c8f4b5fe1dd9fe85ba589b71d1eecfc665fdaf9bcb115e57a68ff2ebf4758e5fa78ff2ebf4864fa4d99f4c69eabe233bfdd5e4e58a9e5da69ff2ebf4873b729d2dbfcb8fa335d28e963d33f4dbd93c4ee4fee78f979fb723d2cff0b5ede9fc13da661ea3a51d0e576e3abe8e3e333f77cef53c5e4f4f5a3ddb6ec7e4e4daac7fc3bbe87d089a3cd76f87a1f670f15865af47c8993e5d934d971fbd498fc9c26afa8e4d353246d358961b55c970e4899a7db2f159c3d3963cbef74b3a757c9dadfcb0bf0786d93b323abd065d2cfdd1c3c5a5b6cf22e538afa5927aa678faa34b37bd0a42d92dd564d2bd53111e6ed876ace91f95fb85e7c4e6e3e2b3fa9bd9e5f17d4ffc3cd17dd975131fbb0facbcb7a4b43fc972bc5c369c9f7cbd43dbb5d36fcd71e9862f93bdd7719cbae75685958581048000250900000000004a048208480000000000000000000000000000000000000000002120008128014000061b9b5f5938bd9e96bbdafc3abf463c59819cb9e3a34b8ebd51e1743e8fc5193dbeb2ded724cef313c61ec70e9f169e915c74ad623ca2366c21cb6f6fd3e6eae99e7eaf27353683658005186d65faadb79432f927a6b33f079fc93d5332b355c5478ff556bbf95d1cd2b3f764e1f93e4169df8bd6faaf5939f5d348ed8f83c8cb86f5fc9cf3bce55e8da9d1bc27e31ce5495e559447591d1cd55e556873e1d149557565a471b8baf0a2164348e1c3ad8a821a1c5d2e22a482c726ac100456401008a937420541d62eb6ee09dd1506c6e6ee3175f74511d373753700190d3730d568edbe1cd7a7cad30f61a1ff0010799e9a22b936cb11e3dfeaf01bbbe97263c39ab6c94ebaeff7478c28cd8b5f61d27f895a7bcc467c334f8bd1e4f5272ae61a69e8cf489f0b4edf8bc972bf4f7a779f618be09b52fb7dd5eae313f25f55fe1c638adad87516aede455624e2c39646baac193ddc94b7cad0edbeef9fff00fab6bf05a7a35131b4f8b671e979fe923edbd6f11e33bbcee9ea95ed7198e534af6ed0d772fc3aea6d78e31dade70c0d398f37c71fd4d3f57c9debcf3511efe93247ca2588d713f6edab9f37f4e9a5b6af419230e5df2e39e15bf7dbe7e6ceb115e75a7b6dd74c949f8d6594c79699a916acef1294b386a2cbcbe79eb59fea61f93c14bdcfad2dfd7c51f078697a76bb4dbed79377b8ddef6ee18da90e88a46d584baa39881285010adbb4aca5fdd90418cb7756532aa8c0812800109428808f34a20001280000001b5a69e32d56c69fde0588de001b113c218bbdbaef32ded45fa69f363fb0252af58e9fba5ad9724de53932753808ca00208000008120008480081200800000000000000004a0000000135ef084d7bc0016ef3f3426dde5000000000000000000000000000000000000000000000000000000000009400000900424000000000000482a21200a0b421680074a46f311f17dc3d37a7fe5f97628db8da377c5f478fda6a31d7c6d0fbfe929ecf062ac7952bf8396ee8ceefb3d1e1e7e5f26bc37bb6e0912e03d6301939d469f34e3cf8ad48df68bf786b7a873e3cdcab25a968b44eddbe6c9737cba6c3a6b4e5a56dbf0ac4c7199f83e6fcc745abd3e92334ded5c792627d94cf6899e1ddb9346b062de958dcf87e98aafba92beec0f523ca0848a80e77f7658d643370a4b1e095520033162412802565561144ac8488a2578442d095145a1d621487584451f4af48d7fe16f3fbcf73a6c7ed3256bf178df49c6da2fcdf41e538fab3efe0e196a7f73d38f4c4d30f93d4c63acd3a66378db6d9e479d7a3b45cc6272618f639bcad5ecf650bc3b71cabcbcf547cab43afe6de97cb187595b66d3efb45e379da1f48d0f32d2f30c717c392277f2f386c65d3e2cf59ae4a56f13e53112f27a8f4bfb1cbedf419afa7b77e989fb27f29e0d6197b315339ef1a95ecde67d4dc929ce3457a6dfd4ac4cd27e2cc72ffe6e30446ab6eb8f38f36ecbb59cc4c6f472c6f1795ca757e4fd569726972df1648dad59d9cb1dba25f6df587a4ff9f89d569a3fa91c6d588f79f17cd82f82f6a5e262d59da625e3ca3a6ece2be9f87dcfa7b9867fab1e6d9cb99c7e9b55dadd9df163ebbc563ce766371da692cb68f363ae6a4da622225e1e1d73c79afe81b59ccf1994d2f57c3fb678c98619619de9347bcd06929a7c55888e3e72cad6189c3ccf476da232d7eadfaeb74d3fe6d7eb0de338595e9decfd595ae19e72de95b910971ae7c57f76d13f996d462a7bd7ac7e6d272cda3b8d58d6e9a7b64afd5d7da567b4c2a7211d8522d1e29ea8f169045857aa3c53d51e2009159b563cda79798e9707bf92b1f989cf01edcfe9bdb2182bfa8f435fe2dfe4e13ea5d1f9752b1ea570fad873c72f46a4d5e5afea7a444ed4dd8dcbea5d4dfdcac57ff1f169cfd4f44bc3cbbbe2261789d5ec33e0a65acd6d112f9f732c51a7c96a57c5b17e7dabbd7a77dbe2c3e4bdf35a66d33332c6e4d0b797d4c377d1b5b9ff00cdaf8f96fddcc38d1af10f49e9ae596e63cc30d7a77a5677b786d0c2e0d2e5d45a2b4acda5f66f4be930728d2fdfb7b5bf1b78c7c164e6c8d6dde32e5e1cef4b58dd96e3c3dc62a571d2b4af08ac443ac31b5e6583c5b14d660b7f1c3d95ca6e635e175bb7946e8e55cb49ed6874de25d125e5c96cab884a88090000001128120a00008000000028002000000000000000000000000000000000000080000001410940008d92002154a001cb253da46cd2d463c7a6d3e4bedeed667f5324c273fc9ecf966a663f425bc74276d4e53fba3f3b731cb39b579af3e77b7e2c74b632cef699f8b5e5e1baa3e8e1ecd63ece72a4af2aca8ead292aad2ab432d2aacaeaa8caf0aaab21465ae1542c8518e1a551b2c85473b1b550b2366870b1d78544a1479f875b8a0051c5ab1000ac2898b2a020eb16dd6705e2c088e89513ba80c972ee69a9e579a32e0bcd663bc794bef3e9cf54e9b9d61e8b4c533447dd59f3f93f3a6edad1eaf368b353361b4d6d59df803162bef5aaaf467bc7c5aef3dca7d435e6dc326d19786f1e3f17a070ab94eaf563db130eb8c4ecacd6b3e50b0cc56c71b60c56ef4acfe4452b48dab1111f075524107cbbd653ff001958f08878c7b0f584ff00c7fe51f83c847bd0f56df69b7daf1eef7d4dcefac847684a50ea8c884250a20872cbeecbab8e6f724018e5569554601094000848a882110944280942500000003b60f7dc5db07bf000c802b69e989906c696a2dbdb6f068decbe5bef32d7118a95002080000000002120084a1200800000000000000000000000000004d7bc2135ef1f3002dde509b7794000000000000000000000000000000000000000000000000000940000000000094090000000000000012848280000985e147480066f9061f6dcc30c7c777dd691b5623c1f1ff4761f69cc379f2acfe2fb143cfbbec9bbabd9e1fb6f9b5e1fb7e6b27b0c7734d546974992fe7b6d1f39725774ac0e48ff00ab734e9df7c5a7efe13673f57d76d0d623f4abf8b2fc8f49ec34d1927dfcbf75a67bf1627d61ff00251fb55fc5b9ae24eff9b9dd32ab7b3e4f9fc761287a878c000070cf3f6b45b9a8ecd3066ad0120025094055964261004ac85912aaad0b2216844aa2d10eb0a43b5612a55847d5bd2f5db4159f17d1392d38dacf09e9eaf4f2ec3f2ff57d1b94536c3bf8cb94ee31ee77cbfc7f24cfb19985910b3b0f320240060f9a5f5f69ae1d2d76eaf7b24f6afd1d2fa9af2bd256751926f688f9cda7e0cc35b36930ea2d5b64ac5ba7b6fd99e7aad6bdbe2cc63b966b736bf1def9314e2aeff675779861b9e7a5347cd22d78ac532edc2623bbd84522b1b444441b25fcb156e7e1932fcebaff004af33d0da7fa337ac7f157b7fbb0bfc9ea37dbd964dff667fd9fa8ad4ada369ac4fcdaff00c8e9b7dfd8e3ff00b30f3d9c3d1c3e9e194e3a3e6cb63f327b0cd4ef5bd7f293ef8fd2fd6fd29979568737bf831cfe5fecd4b7a6f94dbbe931febff7795e8f4cfd3e8faedf77cff5e5fb7e78ae5cb5ed6b7eb44e5cb79e37b7d5fa17ff00d6393fff00f253ff00f6ff00760759e91d15324db1e1e13e5c783ceed961d3a3eadcefd39397830decb9eb7a3e2dd57f1974aea33447bf6fabeab3c87454e13a78fd7feed4b7a7b436b6fd1b7c1c597d0d9cecbab8e3970f9aff00319e7fccbfd65d2353aa8f76f79fabe9d1c9797c7f915fd7feeed4e57a3a76c3585474bb997aade5cf97cb2f9f576f3c9fad5ebd4f8e4fd6fad7f25a7ffcbafd13fc9e9fff002a9f45e51db733cadd7d9cb9e5f26ead578e4fd6ed4d0ebb53eee2bdbff1f17d53f95c11fe5d7e8ed5c75af6888f92a3a639de32f8c727cbabc875f6ff002a61da3d39ae9f2887d3764ec9ca88f9b57d35acb4f1e98fcffee6f53d2997cf257f5ffb3de6c8d991d33bcf0e6f27a7f4b60c768b64bcdb6f2f265ebc9b435ed8a196d93b03532b196ae1d261c3ee5221b7109d9205ea2568e084c0883a45ed1e72e919b257f8a5ca2b33db8b7f0e832e4efc2165ab8e37266c9532ca6262d6ea38444eef498a6d348eaeed4d3e871e1e3de5beefb595ae9863e98e1bb8cc7472cf2f55120d0c800000008a9001000000000000000000000000000000000000000000000000544000a000000002000042ab20010f3bea8b74f29d47ecbd13cefaa2bd5cab51fb2dff006d3fb2a7f7427747e73bf771976bf77297807d3c355c35729576768a4da5b15c310ae59e5c3b70fa7e03c37d4bebcb49a347d9da7c96f616643657674f5c8f3bcfb5e0b7777af1c4f8bf4b270d1fe5e51fcbcb7b646cf47d4707c4ff00f979fee3eeb4274f2a4e9ecc8ecaecf47d48e0f837ed9b9fb8fbec6ce0b439ce3b47932bb2bb3d33295e77e5b73c1eeedff6f2fd458c4ec865271d67c9cada7acf67ade799d8fc659c7c1fa8def05b5bbedc5fdc6821b56d3da1c2d8ed1de1e9631ce57e5787d0f11e077367aeb1c85d5d9d223e6b562bb216d90da39651b550b236691e7b1d72884250a3ced58025460aef83066cfbfb3a4dba7bede48db6fc9ec3d13d36d664a5a2262d58e12ccfa8bd29bf56a3495f8da91fe83a49ce2c336f193e6bb21d2d4b5266b68da63bc29b30343ae0cf934d9232639e9b44bea3c8f9e63d7e38a5e62b963bc78fc9f2875c19f269f245f1da6b68e3c18ce72dba6de5c5e1cdf764bcbf23e7b8f5f48c779db2c7eb7a6dde75ca715eb4c6f316564565051f29f57cff00fc8cfecd7f0796c7c6f0f4feadff00d4adf2afe0f358637bbd5b7da61db1e3dcefa6e77d6eaab4a1d060421285010e19fdc6c35b51ee820d05656428c08424004000822424540109140400003b60f7dc5b183df006f3535393a6bb36d88d4db7bc895aa56acceeaa50830000200000000084800080000000000000000000000000000000135ef084d7bc0016ef3f3426dde500000000000000000000000000000000000000000000000000000000000250002410009000000000005012000000b42f0a42f000fa1fa1f0c4e5c97f08dbeafa843e75e85aff004f34fc6afa2c3cdb9dc9b9dcf7ecf645d9ec8b3cbf36bff33add3697bc6fd567a8796e5f5fe639aea32cf18a7db0ce3a98fbb79685f6f37a6ad62958ac7946cf23eb0ff92afed57f17b078df58ff00c9d7f6abf89877430ee899f6df25cfb6bc0a131d87b078440000d4d479355b1a89fba1ae0941200094a1684144ac84a0a256842f0cd4aa2578557844ab05e1debe4e50ef8e38c7cd2a56a11f61e451b6830c7c1f4bd057a74f47cf392d3fe17047c21f4bc35e9a563e0e78771b7ad74dded89bda46c42cac2d0ec3ce09000424040109001024d81515365d00a8aec6cb00a35afa6c593deac4b472f2bc578fb7ed65cd98cb095b74c772e2e6f2d9395e5af6e2d2be9b2d3bd65ed5134acf7887972c2c7a9edc77264f13c2cd64d9ecada4c36ef4870b72dc13e5b3c6f4dc257d178a6e651e536367a79e558bc5ce79453f49e677fa51ed797eb579dd8d99ff00fa3fefa3fe8f3fa6e0ebf49ea79bebfc182d8d99e8e51fbebc728afe9383bfd27a5e6faff079fd93b3d2472ac4eb5e5d82be5bb83d336e3d0f25ddcabcbc43ad70e4b76acbd5574986bfc10ef18eb5ed10f33d93191eab78786e56bcd63e5d9afe5b37f1f2aac7bd2cc27670c76b9d5e97a32dde34795ad8b498b1f6ac366382764b38c98b4d6595ac894240000004a004512848200000000a8000000000000000000000000000000000000000021200204a01500014000040120084265000861f9ee29cdcb75158fd0965dcb3d3dae2bd7c6b30dceda629fdd12bf2de5af4ded1e1330e1b6ecdf3cd1db45afcf8ed1fc5331f9b114f7e1f3e99f4b63eaedeb3e2787bf96ddf8c77a53a6169875d9db0e972e79da959979ede6d49397ec3c3e1f4f6f193f4ed8f1272d3d91b3d2e2e4396dc6d6e96d47a7a3ceeb1da6db723cd7c5e38e93978fe957a5eca7d3d5f2bb85fd3b68ed787376fa6f570f2cf193de3c9ecaecf457e45a9af6e2d4bf2ad55238d1c9bb858f5f0c63e236b2f761f646cdeb68f357fcbb7d25c670debdeb31f930bc56b86f9c6e96357643bcd255e9061bf4b8ec898ddd7a51d2a8e7672d58d5b61ad9ad7d3cc7664363676c73fdb93e378bfb7cca5cb6fa5fd3ebd6226b30aeccadb1d6de4d4c98263b3d72b8619f0fc5658dc6f17a3f47e37c14ddc7d58f4ca7f16a2179855e948fcc56f29c5e2aa8d961b470ca36a8b0d23cb946f39c3d6fa322dff0053aeddb6e2fb46dbbe4be86c5d5acbdbf4621f5dd9df0d0c3479b3d4cf5783f50fa5a9aa8b67d3c45727798f17caf2e2be1bcd2f1b4d7bc3f47ecf17ea3f4d535d4b66c3115cb5e3c3f899ce3a59cacbcb9ce95f1e955b19b0df05ed4bd66b6af0989e0e1b388ea2f8b2df05e2f499ada3ce1f44e4bea5a6a22316a27a6fda2de2f9b113b4eec67396dd36f2e2b9bef35b45a37898981f28e59ea4d468662b9267253e3de21f40d1738d26ba9134c9113fa333b4bcceb9e3eef638ede7cf4af9efab3ff54bfecd7f079fd3c7dd2cff00aae77e677fd9afe0c0e9bcdd70ed8b876b8ee77d4cfbab6a555912d8c8a80a021aba9ecda69ea7c8112b4d55912a32202400400022b29479a5505010a20251b9bc000dbd3c77969eec8608da80b08eb79e9accb0796dd56964f557e9aede2c425299251094208000200000848002012008128000000000000000000000000000000135ef084d7bc0016ef3f342d6f7a7e6a800000000000000000000000000000000000000000000000000000094240100900109000000000000000120280000b42f0a42f000fa9fa163fe1f3fed55f4087cfbd0b3fd0cf1f1abe830f2ee771b9dcfa1b3d90d9ec88c9c296fd99fc1e7fd3f599ae7bcc71b6497a3db78d9c70e9f1e9e26291b6f3bcfcd99a565bbac69d9e2bd67ff00294fda8fc5ed5e27d65ff2b8ff006a3f15c758b8774673eda9b9db5e0ebeec248ec3d83c4200006867f7dc5d737bf2e40825284a002c884c08a2c942c228985d585e19455597851d211148bc36717bf5f9c3855b38bdfafce19a56a11f70e494df1e9e3e10fa253b43c1f20aef183e15afe0f7b0cedfb9b7a5f35def637b58e90942cea380002009000000004a00012000848008126c0081202a20d9202a204a7605454480a884a7cc05440b0008812002364ec0002400000000000480200002800200000000000000000000000000000000000000000000002001284a01500005000040319afcd9b16dd1d8673bc63781ac24b94e59143cb4eb33fe94a635f9e3f89a793d7932f6fd3c5e9d1bbcec734cd1df69fc978e6b6f3abdb8de2bc9376bc55ebbb31e2bd7dca37e9d6523e16ff77ca1f7de6faaa6bb45970f4efd559dbe6f8467c538b25ab31b4c4c9bf38cd3733f5f0be1efe33e0bb587a396d618f69d3f1da1eff43a6a61c35888e3e6f9e6932c63bd77f2987d074dcc34d92b5db2577dbc61c76e7e55ac7a5f37ebf2dce7c36ddfea91f3f637a67e1f0c39eb8f2ca56ab74a2968b46f13bbabb0ddc98ae7d28e875146bd4c38f42b38e1b08d8576993935270d67bc438db4786fde95fa323b23667869e8c77329eee1cb079394697277a6df263b37a7f0cfb9330f59d2acd5cee11d1f476fc5e78ebd5f3f9781cdc8335379acf530f9b479b0cfdd5987d4e68e1974f4c91b5ab13f3879ee1c3bf0fbdb7bd86efc2be2e39f15f289aab30f79a9e438724ccd3ed979dd5f28cfa7de76ea8f18e2f2bae587e9f76c79763c4ccb8c72fe6c16c8d9de6bb39cc39a3bb763532e18b47068cd7665e61ab9f16fc61e8dbcba70e585e2bf37f73f0fe8cfd734cb5f37d7f19b5f576729f0e67c9a1b2365f61eb48fc856aa9b2765b64d6bbcb7079b7354cf57d1bd07827ab35f6e1b443e9cd2f44f2aa69f94526d58eacb3d5bf9ed2f419f4334de6bc61df0d0c748f2e5ab395fcab1bb2b30eb31b2ad80f0fea5f4e535d8e7361aed96b1ff0069f22cd86f86f34c95e998f27e929784f53fa72baca4ea30d76c95e3311e6e7946ece6378d665e1f21955db252d4b4d6d1b4c4ed30e4e23a0b629a572d26f1bd626378f83e89a7e47a1d4e1ae7d35ef4998f29ecf9bbd47a779cff00297f61927ecbf6f84b395e1729cc6f092b38de2b03cd2b7a6af256f79bcd676de7e0e3a6ed2d8e71316d76698e3bda65c74f1f6b78e90c748ce5dd4cbbabbcaab2ad8c82128540434b53de1bad1d47bca252b5909428c089400020000553b100a22363648008d84a001358de593ac6d10d2c15dedf26d65bf45664162c63b557eab6cd35af3d532aa546282001140010000010900042500094000000000000000000000000000000009af78426bde00136ef2aad6f7a7e6a800000000000000000000000000000000000000000000000000000000000900000000000000000152200048240130bc290bc080fa6fa1a7eccd1f27d1a1f30f43df6c992be30fa7c3cdb9dc6ef73e86cf64367b22e0398ea225e23d65ff2f8bf6a1ede5e1fd65fd8c3fb50d61dd0c3ba339f6d4dcedaf0d1d84a1ec1e21000031d93de9516bfbd2a82025094012b2b0ba0a2528592a551685a1585d2a342d0e90e70eb0cd458abd5b5823fa94fda86bd5b7a68df2d3f6a19a56a11f7ef4e5378c7f0a47e0f670f2fe9da6d86b3fbb1f83d4c1b7a2e1da9bbddf24ddee5d6425b4720480000002400000000120084ec00084c2400000046c90001090000480200004a1200212000000000000000090000010000000000000000000000000000000000000000000000000000000000001500008000a0e77ad6f1b4c6ee880061b53cb6278e3fa3099315f1ced31b3d9b865c14cb1f7443cbb9870f4d9cbd7b79faa71eef2cbc578e985259bd472cb578d38fc188be3b5276989dde26f3c3d2fa0e5b79fa9c2637797e6be9fa6ae672639e9bcf9794bd5a9b303b447ca73f24d6e0df7a6f11e0c54fb4a4edc61f68b562784f162357c9749aa89de9159f18457a3d7e99d1c1f39c7cc7578b85724f065f49ea3d463b4466fba3c7cdb7a8f4ae48dfd95f7f9b4bff00d635be356a565eadbf1197339eaf3e3d2bd1e2e7fa3bc7199afcdb98f9b68f2708cb1bbc0eb3936af49c6d5998f8319316af8c3acc9cdf5ae78fedf2f2bcde5f608c95bf1acc4c7c16ddf2bd2f34d5697856f3b7c78fe2c9d3d4ba9a77ad6cedcb9cafacf2ed6f7a76faf5e1f414bc5e0f54ff00e6e3dbe4f41a6e6ba5d5577ade23e12eac4af4b8ed6f4dcbc7bb26295c949fe28faafbb63ba23646cb0a8d728e53571be38b7786dab3051d31cb873798d7f26c79a26d4fb6cf1da8d264d3da6b68d9f54b558fd568f1ea2b35b563e7e6e19e3c7576b1f6bc36f7ae7a6eb1f336f3b8d95f3098739ab37afe5b7d25a7cebe52c4cc3cab6715f6728ce39faf19946232d36b4b9ecdacf1f7b86cf4e3d6261a47e3fc4e3e8ddce7c6b5e3effbf73cd465793e8afaed760c558df7bc6ff28eec76cfaf7f87bc8a62675d923cbfa7bfe2ed1709cd8f9b95d58dcbc62faae8f0574f831e3ac6d15ac436f622167a3d87928c76a747178eaaf09616f49accc4bd5311cc6958da7cda459526ac3cb9da37874973b6d11bca8d8f9bfaafd395b56dabc11b4c71bd5f3097d77d49ea3c18315f4d8f6bded1b4f846ef91cf79972ca714cab78de8631ce55df65e5596451cad69b4ccccef2dec3ee431d66f60bc4d766a1106c216565b01084a010434351efb7d8ecfefca894ae284a08ac0894277400084a2401109220540409144100988de401b982bb5776b6b2ffc2ddf729f261f2dbaed2945f62b880832204a000001000000000402400425000000000000000000000000000000026bde109af78004dbde9f9aab5bde9f9aa00000000000000000000000000000000000000000000000000000025000094000942500090000000000004a120a094000b42f0a42f0803dc7a2adb6b2d1fbb2fadc3e29e95cbecf9953e31b3ed70f3eef72eeeb1efd8ec67c3f6ae212e23d0225e1fd65fd9c3fb4f70f0deb2fede0fda6b0ee861dd18dceda6e76d7884250f60f1082444f60063adef4aa99ef2804120202ad0b2b0b2009590b4334ad0b42f0aad0c8a2d0e90a43a4314ad423ad5bba4fefe3fda86955bfa28ff89c5fb50c64993708fd1bc86bb69abf28fc1e86185e4b5db478fe50cd43787698f6c73dceea99f755d284b430240001284800000277409d800364800000000000900102400409000000000000000000000001280004a0012000884802a000000000000000000000000a2070bea715276b5b8896c88d496b6052b68b46f13baca910a90144000000000000000004240010901440000000021200211b2c8005766b66d363cd1f747e6db552ce5565e11e7b51cae6bc71f162af86f49fba261ed5caf86993bc44bcb9e1e97a6ce5ecdbdcf579bc92f0f1530aecf4b9b95e3b71acecc565e5f9b1f96f0f13b67b7fa7d179f0ddfdb1bb23677b52d5ef130a6ce2bc70f4273cb8da95b778dd8fcdcab479fdec55657657635469181ffa0687a663d9c7cd84d6fa5b8f560b7e52f73b236686fd5d3861f2bc9c8798537fe94dbe4c6db0ea304cc4d6f131f37d97671b69f15fdea567f2076dae9972e5cbe3d4d46a31cef192f13f396574fcff005983bdbae3e2f799b92e8b377c71133e70c16abd294b71c37dbe12d72cbb63bd9635c56c1ea6c36dbda474b275e77a0b7f9d5793bfa67591db6968e5e4daec3df14fe4e9cb0fabf570e275e397cccaf35f43af31d2dfb64acb6a2f16ed3bbe496c3a8c13bcd6f5fab7b0737d5e9fb5a6623ca5d39737d79d6731e0d9dcb8635f4f73b43c2d7d51aa8ef8eadfc3ea6c77fee566aeac72fa12bc9b5e26659719467355a7ae7c76a4f9be7bacd3ce9b25ab3e4f653cef4531bf5fea9788e6bad8d567b4d7b31b91ad5f77c2ee713297cdf277bc54dbdbcbd379b97e2c3e4fbadbb9ecebb3d2720f4deab9c66aed49ae2dfeebcf6d9bc7a48b8ce6f0f97e273fa9bb9dfddaf3659712d3d31e9ec9ce755589898c55989b5bfd1fa1f47a4c5a2c34c58a3a6b58da23e4d4e57caf4dca74d5c58a22368e33e733e2dfb6a31d3cde8da9eee92711e6debd7872bce55b089b457bb15935f33eef0695f364bf795565ae194cdaead3dde32c466cd6cd3bcb5b367c586b36c97ad63e32f15cd7d61834fbd34dfd4b78f90ce597a6248e931e5eaf57adc1a3c737cb78ac43e6dcefd5d6cf5b61d2f0acf09b79fe4f31cc399eab98de6d96f331fa3e50c549965c385bc9272eb270e77b5af69b5a7799f37296c5715f24ed5acdbe512cc693d3badd54c6f4e8af8d9a66de11a98dc9e7261cacfa1dfd1b118a76cbf7edf93c6eb797ea3437e9cb498dbb4f936e78e5cb0e9961c3132b76e3099fba5d2d8ad5752388ed8b2f5709eeeec67696d62cdbf096d203615590d082ac6e5f7a5929632fef4a894ae60806694556442882095912006c6cb44325a6e51add57f6f0da63c6787e225b20d4c6e5a317b2367a79f4b732e9dfa3f2de18ad4f2bd66977f6986d1f1db7fc1589b92b2eb76b28c63b60aef6dd4d9bb8abd1574472571d4dfa6bb78b113c5b5a8bf55a5aa22649500020212800000400000000000004000000000000000000000000000000009af78426bde00136f7a7e6aad6f7a7e6a80000000000090040000000000000000000000000000000000000000250000940009109000424000000001412848000002d0b290bc22d066b91dfa398609fde7ddf1f1ac7c9f9ef4393d9ea71dbc2d0fbfe96dd7871dbc695fc1e7ddf65ddf67b3c3e953c37bb69ab9b5318b2e3a4ff001cecda79fe6f7f659f4b7f2f69b7d5c166af5265a3d03c2facbdcc1fb4f7113bc44f8c3c2facbddd3fed35877430ee8cee76d373b6bc5a1287ac788422dd92adbb48031d3de504822090045168591090582d0b2ab4314aa2d0bc2b0bc334ab05e178521d219a3508eb0c9f2daf56b3047efc31b56679357ab9869e3f7e1ce95b8b1fa4796d7a74b8a3f7619186a6963a70d23e11f83721d71d213479f2eea5d6ad0942410480009000013040024479a40004802120000000848000000000000000090040940000000240010900400054000000000000000000000000000040296b456379f2051afaad4460a4f8cf6799be4b5ed3332efabd44e7bcf879351e6decbd9cb3bce55e8d9c7dddb09c6319be5b9f7fb2659a792d364f6796b3f17abacef10f56d5e7173d8babcbbb38c9bdf9a2e212f40e00002000000000000000008480002001412800000010900102500083649200a2365d00a8e17d3e2bf7ac352fcb70dbcb66490c5c256dd31cec7360afca3f46cd5b72acb1db8bd38f3ddaaf43d537bf6f33c9db97678fe1729d1678fe197b0d8d9e5b8e4f53db3731af13c5ce972c7f0ca9fcbe4fd197b6d91d11e0f2715eb7bfd51e0788f617fd1947b1bfe8cbdbfb3af823d953c21e4e2bd7c3e8733f6f072f13ec6ffa3289d3de7f83f53db7b2a78427d9d7c1e4e2bd7c3dfcc7839af059797573c6d7c316fc987d57a471ea63fa749c73f0ecfaaf457c13d2f2f15ea7d09bb31f77ce7c4f2fa0b5f4aef4bd6df0dbfef626fe8fe7149feceff297e82d91b3cfe9af43db8eee32bc4fcdb9390f32c7c2705fe92ae3f4e733cdeee0b7e70fd29d274c3cdc57a5f4f732966af98f8572cf43ebb265adb515e8a44c4cc79cc3eada7c31a2c55c5831c522b1e5dfe6cff4b19974ba8fe7299a97fb36dad4f2f99b538eb52baeee5ea738d4b5b34f7996b66c95c31d592dd31e32c8ea34da98d663cb8adbd3b64a6fc36f1d97e63ca34dccf1c63cd13b44efc387e0efcb87ed96b9d1e3755ea4e5fa6fe3ea9f08797d77ac32e589ae9b14c7c678ff00b3e8b8fd1fca31ff009316f9c6ff008b218f9072bc5eee970ffd88ff00674cb724d1ce6322cc394b9d7c073e6e6daff7fdb5a27ca22765f07a679aeabdcc16e3e2fd134d169f170a62ad76f0886c45623b33cf2de8ebd238eaf87693fc3dd7e6da7364ae3f86dbff00ac3219bd11a4d0de9d56b5e7cfb6d3fa9f6079de755e34962e8d67db5df1b2e5c39edf7c78fc3cb749a7f731563f26df4edd9db65661c07b38e07263b5fa2c1abc36ae4a44f0efe6c9cc3866feddbe4b10a3e0da8a7b3cf92b1fc37b447e52d9c778bc6de69cb1beb32fff0065ff00174e8889df67af131d1e2ab75ae37c55b352f82d5ecc8aad2b23471e5b57859b5bee9b52b3e4a569d2a204f69632ddd93bf0acb172a252aa2500cd44025401db4fa6c9aacb5c78e37b4b93d77a43075eb66ffa30959cfb6ac9cd6f6fbe3d0f27f4ae1d3c5726a3efbf7dbca1ec698698e36ad6223e0e910b3cf965eaae6f5ede1e98e8a6ce593063cb1317a56d1f186ca36544e15e079dfa5e968b66d3474cc719af94bc066bfb3acd6785a386cfbd4c44be43eade5ffcaeafaeb1f6e4e3f0ddeadbcb98e5b77f278f771f4de7f6edbd39c2bc64f1735e547a4780400008128000004500040000000004250000000940000000000000000000000009af78f9a135ef0005bbcfcd09b779f9a000000000000000000000000000000000000000000000000000000000000480212800120000000000280000900012bc28b4200ed8e76b44fc5f76e459fdbf2fc16fdddbe8f8343eb7e8bd57b5d24e399f7276872ddd1773b5e9f0fad6762f19bdc303ea1c733a4eb8ef8ed5b7eb675a5ccb1fb5d265af8d65e79aa3d9968abe8b27b6d362bf8d61e37d65ff00b7f9bd0720cfed74715f3c73359fc9e77d633f7e9fe7fe8e98f798f7b19f67c932ff001bc7021ea1e4045bb4a55b7bb200c74a09ee208253084828b2caac828985e145e18a28b2f0aad0cd2b42f0e90a43a558a56a11d6af41e9faf5732d3c7efc30157a6f4bd7ab9ae9ff00698c8adc23f46e18da958f843621ca9da1d61d60f3dd51710b000940009000129476480000009100090000000000000000120020120080480201200848008848000002a000000000000000000000000000002005061f98ea7a63a2b3c7cd91cf923152d6f83ca65bce4bcda7cd8dcbc635cb7ee91bdb9ce51d7626b5cc079c7a04c4ed2f57a5bfb4c559f83c9b3fcaefbd26be0edb37ab3b57f371df9f8c6b77b2b2e9425ec1e3000100000000000000000000000000424151000280000000021200211b2c80011b24005645800576126c00a8b6c80040900154a40545459002a11b2c008a9b2c002bb0b000a891501085854057642c85014d981e735fb6b3f17a061b9bd77c51f3673d299695d36fba261dd1e5655974951e71ee1ce5aba9e186ff00296dcb4f57fd8c9fb32a20f8a4ff00cd659fdfb7e2eb2a446f9f2cfefdbf17497ab1f631d23c775a5d5cd09943a0c8852575144572cb3b5258d96f67b7dbb34548cd2a1094030b4015104be85e89c5fdfbfc9f3e7d4bd1d8e2ba3b5b6ef2c6e76d4dded75d9ef8bb3def67094422f9298ab36b4c44479cbca3da2e871d3ea71ea6bd58e778f17700d549797f54e8eba8e5f7b6df7538c3d4b1fccb17b6d265af8d67f06b1d624672eb2ad7e7dbc6d32e52dbd4d3a32debe132d597b523e5b596b541285191000000020000000000200004802000004a000000000000000000000004d7bc2135ef0009b779556b7795400000000000000000000000000000128000000000000000000000000120084a1200804802120000000000a8244028900012b42a98101787b9f45eabd9eaed8e67859e1a198e49a8fe5b5d86ff00bd0ce5db56e8ebb578ce318de2c7dea0b47544c4f9c298edd7589f187478c7d348f21ca727f2bccf55a69e1169eaafe6c6faca7fa9a7f9b29ceb17f29adc1abaf0de7a6df261bd5d78bdf4f313bc4f1fd4eb3ba18eb8b965d94cf4c9e590943d23ca0adfdd9595bfbb200c68082094a128aa2e9855664aa2cb42b0b43228bad0ac2f0c52b42f0e90a43a4334ad423ad5eb3d251bf37c1f3793abd3fa5af34e6fa6dbcedb3152b43f48561d21cabda1da1d879c581200250900013c00120000000090000000000001200812008000a8000a80000000000000000000000000000000000000000000002000425cf25ba2932228c2f32d46f3d11f9b0eeb9afd77997179376f3931975b5ecda9c62de3a4004468194e5b93a72ede2c5bbe9efd192b3f186f0ee9e6ccd58cfb6b5747af4a959de22577d048f9e5480a000020000000000000000021202a000008480a8800140000000000004090010000000008d92000848008812002a6c9e079002000042400042500000002128001091405588e6dfd9fcd976339a47f4259cb4a5d2b58f7431d63c84ab2bca92f38f78e72d1d7ceda5cbfb32df962f9aceda2cdfb32a252e8f90538daf3fbd3f8a6518fb4fce5697ab123c74ae6aad286c65555656565a441a5a98e2d46e6a7c9a6a334a84250a200241912fb0fa6317b3e5d4f8f17c7eb1bcc478cbed7cb269a5e5b8ad69e988a6f2e5bbda9bba477d8eef935b1ad64751a8c7a6c7392f3b443ce6da9e797fe2c7a689f94dd82d56bf57cdb59b62c56be1a4f08ed12f438b4dce2d58daf8f0c476ac6ff00ece38fedbbc63c3bdfd313d595af47a7c18f4d8e2948da21d9e571736d4e93575d36b223eff76f1da67f37a9eee4d653dddb48ce379f90e39637a5a3e12eca5bb22343e01cde9d1adcd1fbf2c5cb3dea0a74730cff001b4b02f64d218e93c9f373eebe66e775f35109943430084a000001000000000000001000000000000000000000000000000026bde109af78002dde7e684dbbcfcd0000000000000000000000000000000000000000000000000000000250000000244240102400000000014000120000b42a94017876c56e8b44f84b82f00a3eefc8b591abd0e2b79c4444b36f9d7a275b5e8be099e3de1f4487932e96b5b9dcfa58de6473d9bce1188e77a6fe67439223bc46f0f98ebb593a9c3a7adbdec7f6cfe4fb25ab1689897c87d41a1fe4f984ed1b56f3d51f9b5b7ffea6d5e324ddff0098d6f4e716821287a479015bfbb2b2b7f764018e9413dd28202d0aad082895a1094a9545a1785217864aa2cbc2b0b4334ad41d21d2ae70e9566a56a11daaf41e9c9db9b693ff00b21e7eacff00a7bff56d27ff006430343f4b53b43b438d3b47e4ed0ec3ce2c9424004a1200249200122160042509045000100000048288480000008000000000000000a800000000000000000000000000000000000280020869eb676c16f9371a1aff00ec5932d2a65db5ac758b8f747984250f08f700204512bd384c28b4775116bd861fedd7e4eae383fb75f93b3df8e90c748f9f75a65ad480a32000000000000000000000000000021200a88120020005000000000000000010240040900102500000000000224240042c8d801027640020480080000425000863b98ffcbd99163f9847fc3dfe49742e8d63ac31d63c74b9cba4b9cbce3de292c3f399db439be4cc4bcf7a8add3cbeff001d85894ba3e5f48fb495a3dd844bd508f18e72aaca3691042b2b2b2d0834b53de1a8dad47bcd551910848a252a12848323be9e37cd8e3c6d5fc5f47cb39799e4c5a3c3c316388f6b31f83e7182b7b65a4538da6d1b3ed1c9f43fca69e26defdfeebcfc5cb73dbe09bb5e8dad2fc785d89d6b7b4ba4c3a4c75a52b11b79f9b6d0970bd51e99388af25ea9c3b62c5a8afbd8f2471f83d0e833c6a74b8b2479d61adceb17b6d0668f08dda3e98c9d7cbeb5fd0998fd6dded49db58fefbe47f7cf2af44a4aeacb2ad8f8cfab71f4730b7c63779297bdf5b62db555b78d5e0a5eac3b61876c7cfddefabbddf549556955b1c4109001000000020000002000120020000000000000000000000000000135ef084d7bc0016ef3f3426dde7e68000000000000000000000000000000000000000000000000000000000001200848000000021200000a80241400004884a282cb4290b420a8ce723d6ce8b5b8efbf0df697dcb0e48c94ada3b5a377e75a5ba66263ca5f6cf4d6b7f9bd053c69f6cb8eefb35bb3a3dbe1ef4b1cfc3dfc9e8df3ff0059d3efc16f8bdfeef0feb38fe9e09f0b38e1dd130ee8f46e76d33edaf1484a1ec1e3056dda5644f69006367b84f7942082568556841459308592a55130bc290bb34aa2ebc290bc334ad0bc3ac39c3a558a56a11daaf45e9b8df9ae97ff00b21e76af57e93c36cbcdb06dfc33d53f2628d0fd155ed0eb0e55ed0eb0ec3ce2c94240120000942600120002442400000000012812080002a000000000000000000000000000000000000000000000002a0000000008480a88696ba37c166eb5b535ebc568f83396956e8d63ac23c921698da66157807bc881220a83a638ded11f15192e5f83da648b4f6858d6139ca159cef18d7a0c51b52bf274207b66915e2baa240010000000000000000000000000000000000000000042405440241440000000000000000000021200200000000000046e84f640000002000010940021a3af8ff87bfc9bcd3d77fcb64f925d16fbae3acf326b1e2a5495e5497947be0e72f31ea8b6da098f1b43d44bc77ab2fb69e95f1b353531d6265a532d2bc0f942b2bca92f5423ca39cab2b4ab2d42322aacaea3420d0d47bcd776cf3f738a8c8a80a2504a120cb4f43e9ac119b9963de3857797d92b0f977a331f56aef6fd187d49e6ddd5377b9ead8edf9b5b3da94a12e63a8d7d553af064af8d65e57d297da3538bf472d9ebb2ff006eff00b32f1de9ac731aad64ff00f24b734a934ac65dd8997763e6f66acacacb2363e69eb9afdd8a7e6f9bcbe87eb8bef971d7c2377cf25eadbed36fb63c3bfde6ff007a92aad2aba0e0084a0000011400100000042400424004000000000000000000000000000026bde109af78004dbbcaab5bbcaa000000000000000000000000000000000000000000000000000000000000009040024424000000001504a120a000009424401752160545ded7d21cca74fa9f6369fb6ff8bc4c3634f9ad83256f5e1359896729ccad3aedde338e73a3f43c4bc6faca3fe1b1cf85a19ce4faeaebb478efbef3b6d6f9b13eaeaefa1dfc2d5fc5e5c7ba7992719fcdf473eda9cf3873f07cfe3b08af64bd63c6089ed2944f6006367ba133de441016855684145928599a5516859485e19a5685e1785178668b08e90e9573874ab14adc23b55ef3d093b7358fd89783abdc7a2276e6d4fd9963dc5f63dabefd0e90e75748761e7164a212009000059090000004884808000a8024000000000000000000000000000000000000000000000000000000000000000000001510ada378d964028f23a8af4e5b47c5c1bfcc29d39a7e2d07832e96b59f757bf1d233b7d718848988ddcd5d116a526f6888f37a9d2e08c38e23ead0d0693a7efb77f26621db6675b5db6b1f4e3e6e1bd7a70e5bb973925284ba0e60002000000000000000000000000000028002000000000000021202a20480a0800004a000000000000000040002400400004aab000a89d9000212800109001568ebff00e5eff26f343987fcbd92e94ba56b1d618eb1e3a5ce5d25ce5e61ef1ce5e07d597df261afed3df4be6dea7befaead7c2ade3a98eace5db533ed79cb394ba4a92f441e51ce555a556e1105559594b7668418dc9ef4b9ad6eeaa8c8a8942880942c00fa27a2b17db96ff97eb7d061e1fd2d9b0e9397cdf25a2bbcb2b8b99eab5d9fa74d8f6c513c6f6e1bfc9e4dcee5ca7e55eddaec8985e31c5e944577da3759cc7514bc7db6f94b01c934f6c36d4da6b31d592663e2f44ac4447659a544bac51495d49011f26f5adfab5958f0ac3c2cbd87abedbf309fd9878f97af6fb61876c7877bbea6ef7d525129955b1c8010000000000800000080012800000000000000000000000000000004d7bc2135ef0009b779556b77954000000000000000000000000000000000000000000000000000000000000004a00012848000000000a00009000001004a61098005968516051eff00d1bcca31e4b69ef3c2deefcde9fd59ff00a75be75fc5f22d26a2da5cd5c95ef59ddf4be65afaf32e47392278fdbd51f1ddc329f9b79cd2bd9b779dbf2e5cb6b2e994f83c5d27ed8594c7eeaeea3004f6116ed28a0c74f74267ba10412b42ab420a2cb2b0b4334aa2cba8b43228bc2f0a42f0cd2b508e90e90e50ed562a56a11d6af69e8bff00d5b1fca5e2eaf6fe87aefcda9f0acfe2c8d1ecfbfc3a439c3ac3b0f3894a120090000591090000001200800028910904010900000000000000000012800000000000000000000000000000000000000000000400084b9e6bc62c76b4f0da2642a8f09ea0e6b34e61874d4f1fb9b10f1d82f6e67cfab69e31ed27e8fa65f95fe84bc39de73c976f1f5faafc5eddb9c6119cb3f47a67c18688dd9ad1687b5eff00943634fcbeb8f8db8cb2511b1b78fab27a70c7d317732f4c79b3cbd5488d9225b56042401000000000000000000000000000000000000000000000000000000000000541094028024010000025000000000008000046c9001085950010940000800431bcca76d3cb24c4f369db0a65a532d2b58eb170ee9e6f2b2e72bcb9cbcc3dc292f97fa82dd7ccaff0ac3e9f67c9f9b5baf5f9a7f26f0d570d5cf73b4dcd18bb292bcb9cbd03ce292acad2ab508c8ab9e49fb65d25c334fdad0831f2a2d285191084a1440590bd38da37f1007d0b90721f6fa7c7973ded349e314df687bdc3871e0ac56958ac47830dca357a5fe570e2ae5acda2b11b33b0f26779acdd5eddbc789cb58e8b26109841a08400021ce57972c96dab33f0007c53d4f93af98e5f84ecf332ccf3bcbed75f9e7f7e58697af1ed8b8e93c9f3b77bea67dd559553286860109001000000020000000002000000000000000000000000000000004d7bc2135ef0005bbcfcd09b779f9a00000000000000000000000000000000000000000000000000000000000000004800800048000000a000009000004012984000b25584828b323a7d764c586f877deb7ef0c72d5ee97a8d6378acb378a7ec87570c3ee43bb43a022dda528b7694018d9ee13dc0412b42ab420a2cb2a9669545e177385e191a1785e1485e19a558474874ab943ad58a56a2c76abde7a0e37e6b1fb13f8bc255effd011fff002b3ffd73f8b1ee7bc5f62e95f76874873875761e712942400480024f3427b802412000008000009424050004000000000000000000000000000000000000000000000000000000000000000010d2e6186fa8d266c74e16b52623e6dd12f58ab11e17d3be9bcba0cd6cf9e63abb443dca471d9c2e18f57675dccbd55cc1200884802a000000000000000000000000000000000000000000000000000000000000000000000848008488051284a00000000000425000000023b2500080001084a0010c1f38b6d4ac7c59c979de736e358673eda67db5d30ee86d7746025ce5d25ce5e71ed1c72cf4d2d3f097c83576ebd4e6b7ef4beafafbfb3d3659fdcb3e4133bcda7c665d76f536dcb7743714973749739771c052555a556a119156b6a27ed6ccb4f51e4d0834d095546410942a20977d345273522feef546ff0057064795e8e35fabc78666622de7052f482cd63ebba1e5ba2a5297c748ed1312ccbc3f2bd6e6e59abffa7e79debda969efb793dbc3c76b59ff00cbdf8ce19c34e3f4b250d1e63acae874f6c93df6e11e32c11b2f45a35b86da9fe5e277bc44da7e0db79fe4ba4bfdfabcdfdccbfaa1e81785cb539e59c745658fe659a306932de786d596425e13d63cc7d8e0fe5eb3c6fdfe4cb784e6c5bd19cef18d7cbb557f6996f6f1996acaf69de5497a95f3f2d6b2aa12800109400000000020000002000120021280000000000000000000000000004d7bc2135ef0005bbca16b7bd3f35400000000000000000000000000000000000000000000000000000000000480204a0004a12000000000a09400025090000450480800b22120a25b9a5c3ed3aa7ca2265a70cce18f61a799f3b43395e256377b7cebb6c61f53731c7f75eafb763feeb97f46395fe0b60f71ddada79fb5b2ec934792f4b56eb7cd2adbdd95916ed22b231b3dc27bc880895a154c20a2eb2a9669545d7735e192b42f0bc290bc334ab08bc3ad5ca1d6ac52b7123bd5f43ff0f637e696ff00ea9fc5f3cabe8bfe1dff00ea97ff00eab7e2c7bc59aadd2add2bee10e90e70e90ea3ce2c942401200008b5ba52e39ffb7225d026aef12973c53bd21d1526905baa405195000400480a8480200000000000000000000000000000000000000000000000000000000000000000212000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000084a0050001000140000109400210b2001025000842500089795e6d6eacdb783d4cbc66b6dd59edf3637344dcd1d76bb9763b9a52e72bcb9cb88f58c0fa8337b1d0649f1e0f97c767d07d5793a74715fd298780f275db36dc774dcd5ce5495e549765701455286a11055a3a89e2dd963f34fdcd0cd2b82ab4aaa220081412f4fe94c5d7cc6b6fd17987b8f45e2df5196fe10ce5a54cfb6b587745dbef8c97aa31ce2d4e9b3c709eb8899fcdedb4d6ebc34b78d61e3bd5793aada6c5e7392af61a5af4e0c71e15879ef6c2f6c7ab1eecbe4b3bafc9b0f1bafbdf9a733a696bfdbc53137f09db8bd1732d65747a7b5bf8a636ac78cb1fc8b456c58a73e58fea6599b4fca531d4d22e7a17ba33d4ac52b158ed0994aac8d0d7d466ae0c76bdb8456265f0ee77cc6dcc3577bf944ed1f27b8f58f369c348d3639e36f7b67cb667776dad5bdb9d1e7dfbc63c7edcb7efe5e485252aba2bce20000010000008a84802000000000812800000000004a000000000000000000004d7bc2135ef0004f79f9a136ef3f340000000000000000000000000000000000000000000000000000000000025000000090000001500014000048848000200921090516109015b3a6c5ed6f10c8eaadb4c523b553a2c7ecf1db24b56f6ea999f170cfae58cf9a5eb9df8747d6f058fa7c3eee7fd5c60ef8e3f4fc26d63fd5ce55df4d3c25b50d3d37796e43d134268f8f96b572eebe6b227b2513d81818e9ee84cf79402094a130828ba55599a55165e1485d92b48bc2d0ac2d0cd2b43ac3a43943ac314ad423b55ef3d093b735e1fa13f8bc1d5edfd116db9ad7f665cead6c8fbfc3a43955d5d87985928480240001cb51fdab7c9d5c753fda94ba174a4d4f7869bfb556c3869e36c70ec98f6c5c748b96b4cb5a94a051048008a0940209000000000000000000000001284a000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000001504240510000084a00012800154800800010894a001cf24ed59788cd3be4b4fc5ec3596e9c179f83c5da78cb96e7b26e7b3d1b1ad5d8f772b292bcb9cb98f40f0feaec9f6e1a7c5e2e5ea7d5593ab558e9e0f2d2edb7a2e1a3cfb9a99eae72a4af2a4ba8e428aad2ab50882b2c664e36964add98cb779686695cd09428caa012080fa4fa2f16d832dfc6db7ea7cd9f52f4eeda4e536cb3c3bdbf531b9da9bba3a6cf7aecf77935359bf30e7b8f177ae29e3f387beac6d110f0de98c76d4ea751acb7f14cedf57b9ea889db7eee39690cb57a70d72f330d3e6c6eaf977f399f1def6fb31f1e9f1964e2368da3c928679e88df1d418ee63aca6874f7cb69ed13f56fda622377cabd59ce3f99c9fcbe39fb69ef7c65637b739c8bd1cb76f18bc8f31d65f5da8be5b4efbcf0f931e9dd47a2748af0e579b6a22502054000004250000000000800800488480212800000000000000000000000000000004d7bc2135ef0009b779556b7795400000000000000000000000000000000000000000000000000000000000000000048800480000000000a0940009000120941421db152725e21c996e5d878cde7c92b1b978c2b584f56527eef0f5f80dbfa9e276e7c79fe4d9cf318f1571c7e6c7bb6a2fd7925c5c70f7bfbad63d318fabe27f1b861fd186318dfbeaddcefc6bbe9fde96e434707bf2de87a26898e8f91b9df9799bbdf52484a8c0c75bde9426fef4a01912984250516595599a55165a1585a19a551785e1485e19a56874874ab943ad58a56a11daaf67e8c9db9a53e4f1957adf48db6e67473a56e11fa269da1d5c31fbb1f2778771e72ac9424104884800d6d4cfd9b78b65ab9b8de91f14cb44cb459ac31d5b148dab1f24cdabe30d7d4e6f638e67e8f336cf92d6dfaa7759d2386ede3886b5db671e79af60960747adb45a2979df7eccef77a1cb6b2f547074ddc7d37cd601d47341280012000000000000000000000000090040000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000212805000000001025000212a80084a0004255006339a5fa704c78bc9cbd1738bfdb5abce4b8ee6acee773d7b3dabb5dae72a4af2e579da2591d47cc3d4197da731b7eef060e5bdccafed35d9e7f7a5a12f461a18691e6cfb8cb5525595a549742398aaa955a84414bf69632591cbc2b2c74b4334aa2128511100914131c663e6fa1e7cb38793e9f4b4fee668ed0f9ed67a6d133e530fa4724d35b5f9a9a9bc4fb3c558ad227e0e5b9ec6e7475dafeef236bade1e9395696bcbb434adb68dabbd989d066cdccf995f2ef3ec70ced5f0975e7dae9daba3c3fdccbc38794331cb3455d0e9a948efb7dd3e32e3adb534c7cde8d2631a9d72f2645123475fadc7a1c16cb79ed1f56468bd185f51739a68305b1d67fa97e111e0f90e5b4dfaad3de78b21ccb5b7e61a9be5b79cf08f831d3d9db0e93969cecf55bf08e984fc6dfdb4a5595addd49751f2d6ea84250a320080004a000000000104240010250000000000000000000000000000000000026bde109af78002dde7e684dbbcfcd00000000000000000000000000000000000000000000000000000000000000000009100024000000500000480021200094ec84c20a2f4af55a21e8b68d3e9fe330c672fc3d77eaf286eeb6fc62ae1bfa49fbacee5e7724fd3ecfda31e32dcdcfe9c7fe5e8f038fd3f03b997f5de1a0212d0e17ada8e98b85e1bcc7d385e19076c344c347837bbeaeff7ac4a212d2b82b1d7f7a555efef4aa8320b212828b425585a19ab545d685568629560bc2f0a42d0cd2b43a43a55ce1d218a56a11daaf4fe98bf4732c4f315677915ba798e0fda873c96b73526afd2d8677a57e50d9869e96dd58693f086dc3b4d224d1e7bad32d6ae942544048000d598df3c7c1b4d68e1a88f8c3392df6f36b148d3e693b62afc658087a5e6b8fab0efe13bbcdd7bbcdbddcd6fce32f93d3b3da9b17f0f9bacf0bd7f27abc53bd2b3f0795b71c95fc9eab146d8ebf23675a9b3ad4ded21bda475483d23ce094008a90011410904000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000128000000000004a0000000000000000000000000000000000000010250028002280002000044a12800000042b2956d3b4480af2dcd6fd59b6f06225b9abbf5e6bcfc5a72f3e5dd59bad7b76fb62e3d318e72d6d45ba715e7c2b2d9963799e5f65a4cb6fdd954691f27cd7ebcd96de3697194d78c6fe32acbd38e8479b2d52a92a4af2e72d91910aa6512d4220e19a76acb1f2ddcfd9a32d0cd2aa028c884a1200d8d362f6d9f1d3f4ad10fb064cf8793f2fa768dabc23c65f2de4b58fe7f15addab3d53f47b7c38efcef5dd76ff97c3b4447e94c38eefb45cf5e7f51df63a7aa9b7a71fbadbe49a2c9a8cb6d7ea23eebf1a44f944bd6a94ad6958ad636884ccc446f2e396be4cbd184e9e6d2b97257152d7b4ed111bcbe47ea1e736e639a71d267d9d276f9ecce7a9b9fc4efa5c16f85e5f3e6f09d79fd3727119cbaf13f6b875cadfd741494ab2a3aab572777276cae2ed1268f939f75f36b7a71b9908068710040000000000000200200128120084a0000000000000000000000000000000135ef084d7bc0016ef284dbbcfcd000000000000000000000000000000000000000000000000000000000000000250002509000109000005000004a1200000a2568855b9a4c5ed72442265789563aec61f53730c7f7948cd68f1fb2c3bcf9b1b96dd7799657536f678b6f1619e59d7732a9b5a5bf17e8739f4bc1ece1fb9cb5e3ef19618ff4e22503a8f9e26384c7cd928ecc6b215ed0eb868983c5e23bfe4be23ba792f09552e88f3a34327bd2a2f93de950104a5094145a168561684a55165a145d8a28bad0aad0cd2b43a43a439c3a4334ad423b5598e516e9d7609fde861eac8f2eb74eaf0cfef439d326e6a91fa6796dbab4d49f83250c1f26bf569abf2866eaeb8e9130ed8e39f755dceeae89425a1812212003573474dab7f0eeda44c6ece5a34d63ab2e792233e298f1879cbe9ad86f3bf67a0f613fc36984d74f58e33f74fc5c37a7aa4ae9e976dabe9e639fa987d2696d92fd768e10f41045623b4259da9c4756f772e6f1fa72480000241000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000004a000000000000000000000004a12008000000000000000000000000425000940000002a00028842400421280010940021c3516e9c769f83bb1bccb274609f889969562e3ac794bcef699f8cb8caf2e72f30f74d0525e7fd4593a34193e2f412f25eabc9d3a4ad7f4a5610ba52e95f3e8e1552579525e984792ad52545a55695945655594958b046aea27b34db5a89e30d55128a84a146412848032bca3459b5da98c78e6623f8a7e0fb1687494d160ae3ac768e3f19786f45e2de72e4f86cfa26ee1bb7d99dcee7ab6274e5bd9ec8b3c6fa979e46931ce0c53f7da38ede4c873de734e5b8662277c93c2b1feaf9267cf935396d9324ccdad3bb18ce6ba63388de57884fcb3f272b5a6d3333c667ba89955a1d309e9c63485565401c72766bb6afd9aaeb8e863a3e6788ff256fc4cfcfe44a01a1e5042500000000000000802120080001280000000000000000000000000000000135ef084c778f98016ef3f342d6f7a7e6a8000000000000000000000000000000000000000000000000000000000000009100000009109050000000004a1200250905130cf72ec3d35ebf161b0d3aef10f53588c58e23c21c77b2e30ae7e22e91f4bed5b7f53c561ff005eaf77d8f0ebb99fea70c6eb6fbdf6f0692d92dd57995536e718c6a7491d3c665eadfcbe1d1c372fab3cafc680951806f63f761a2ddc3ee43a61ee60f1f89d62f89f6754a06c79468e4f7e545f2fbd2a03225284a0a2565564145965566451785e1485a192b48e90e90e50e90c52b7123bc37b493b67c53fbd0d0ab6b04ed929f3873ab5b847e8de417df1447eec7e0f4d578bf4e64fb71fc691f83da55ac344dbd1cf77b9addeef92eb2a9741c4584240004801c128d92000000900004a004120000000000000000000094000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000021280000000005042500002370010000204002180e7193ddab3ef27ccefd79e63c19cfb6b3b9dae9b7d728d6cf73192e72bcb9cb88f58a4bc27abb27f669f1ddeea5f37f545fab5b5af855ac755c75673d2a67daf372e72bcb9cbd0479852555956864555959496841a5a8f79ad2ef9a7ee9705192a1094288020007d43d1b488d1e4b78d99de6dcd31f2dd3cde67eedbedaf8b09e9fcd8f43ca672de768db7783e6dccf2732d45af699e989dab1e5b3cd9ce726bfbad7b70e9844c7acc31f9b5f5badcbaecd6cb9277de7847834c42a3bedce273fb6d084aa2812800056dd9a72dd969dbbba62983c3e2b58d78ad31540741e110000000000000002021280000000000000004a000000000000000000000004d7bc2135ef0009b779556b7bd3f3540000000000000000000000000000000000000000000000000000000000000012800012000000000a000009424004c0bd2bbcc420d1272cbf2dc1bccde7c990d5dfa31cfc53a5c7ecb1c43535d7e310f16edf56e7093f2ddf9bf57f6dc3e9782b97f5735df2c7e8f8198ffd64fe6c70859dc7c74000112dad3cfdad56c69fcdbc0c3579bc46917c476cf36d084ba2bc634b2fbce6e99bde7341904a128aa2cb4290b432aa8baca2d0c0d0e90b290bb34ab05e1d21ca1d218ab5a83b55b38bdeafce1ab56c639dad1f373a56c7dd790e4e9a609f843e835ecf98f24bff00c360b7c21f4ac53d55acfc176fdd36bdd37bd977b48d8859459d479c4a5000240004c2400004800002025002a090054000000000000000000000000000000000000000000000000000000000000012008000000000000000000000000000000000000000000000000000000004a120080000000000000000000000000000040002500a0000008004a000046e94002000042252a802992dd3599f08789cf7ebc969f8bd4f31cbecf04fc5e425cb73d937357a3635ad6cce95597395e549731dc525f28e7993da731c9fbbc1f55bced12f8ff30b75ebb3cfefcb786ab86ae7b9a26e68d3952569525de0e08a4aa9565a22085656525a5418ec93bda5cd7bf79730644212895100942240193cbccf2e6d363d3c7db4a77f8b1e884b95e8cd7bf6274e7e51d719c633c84080694046e082005010d5c9ddb4e1961bc131d5e5f153f09e6df88ff1b800ea3e68800100000000400001009001094000000000000000000000000000000000009af78426bde00136f7a7e6aad6ef2a80000000000000000000000000000000000000000000000000000025000002401000024005400050000000004802896474187da64de7b4342b1bcbd368f0fb2c71e32c6778c6d72f1178c38fdbd3e136feaefede3fbca3e87d976bd7e23d5fd3396df68607517eac92cd66b74e3996026779979f6bbad6b67ddf6fee17d3b58cf8ff00c397dcaf64f3aaa503b0f942c00025db04f1987175c3efb786a98eaf3f88ecf9aeff00656e2503b0f08d4cdef38bb67ef0e28322612801459685530802eb2ab3156a8b42f0e70bc3155a1d21d21ca1d218a56923ad5debddaf0ef56295b847d8f914ff00c0619f83e95a0bf5e0abe61c8277e5f87e4fa1f28bef8b6f09676f54c3b9bdded8bb9d8cdacac2cee3c8252800120000b2ab0000900000400001220004800000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000009400000000000025000000000000000000000000200004828800114000100000aa5000212800154ab69da2640180e7197dda3012dbd665f6b9ad3f1694bcf9f725eb5ecdae98b5874c62b2a4ad2a4a0d8e1a8b74e2bcf844fe0f8e66b75e6cb6f1b4beb9afbf469b2cfeecfe0f8eefbcda7e32e9b7aaedeae5bba26efb225ce57973771c2885652896a1105654b7659cefd9a1063addd54cf7428c884255040565657cc2e8b355c758e880701f52104002a0aa50a0008001cb24707552dc61ac7549ab96f4e76f26b72738df26a216943b0f9208004000000011400101094000250000000000000000000000000000000000026bde109af78004dbde9f9aab5bbcfcd50000000000000000000000000000000000000000000000000000000000000000004800a000000000000241688dc1563774587dae48f087a688da18fd061e8c7bf9cb22f1789bd6473ddbce75fa8fb1ed71b59e7fd578fe4f7fdbb6fe9f85db9fb9cff3686b6fb536f161dbbadb7564dbc1a4ebb53f16b0ed8f0fdc32e77b8fd471f1779decfcc01b1e51615590454af8f85e1cd31c261ac7549ab96ef655dceccbc9911109771f386b67ef0d76c67f26ba08825090544acaa505175958599a5512bc28b432348e90e90e70bc3256a0ed0ed0d7876ab9d5adc23eb5e9ab6fcbf1fc1ef393e4db24d7c5f3cf4b5b7d0fca5ed7437e8cd59f8b94ee4f775cbb3e4bfdbf27b685dceb3c177a4789561090412000260842d0000240000000010000048000000000000000000000000000000000000000000000000000000000000000000000000000000000000000940000000000000000000000000000000000000000000000000000000000000800122014000000001000000002a9f24000800043435f9bd9619f19e0de79be6d9faaf148f24bd25673d1719cd8e9b539ca30b33ba92b4a92e03d6aaa92b4a922830bcf327b3d0659f83e531d9f4bf53db6e5f7f8be671eebaed9b6e3bbec9bbac44a92b4a92ed071112a4ad2acb516222ae593dd97570cfeea80d04250a32884250002b1dd288ee9745cb46f6fba79aed77e3e6b821c07d20001442128510100002252804ba2b4eddd0e992369737748f8f96b5adc9c677cd0028e60000000082120008000000000000000000000000000000000000000135ef085a3bc0013de554dbbca00000000000000000000000000000000000000000000000000000000001280004880012002800000000024141b7a5c53932435a21e879761e8a754f79672bc4ae5bd78c2baec61f53731c7f7647d0fb46dfd4f158feb1eac8d6bd311104ced12971d4dba71cbc37ad5c757ebf19e8c24fd4ff8372f18657e1584cb6eabcb927ba1ecc7a41f99ddbce795f8d66f5a00a320b2a9845049213d89aa319f5c6f92e5d656fd3b42ee58e77ac3a3d03e615c73c706ab7337bad24104a50020b25094145a168521766ad5165a14598aab07485e1ce178628d0eb0ed0e10ed562ad6a11f4cf48df7d35e3c2cf6b8e76989782f47dbfa5963e2f750e14babd1345c7b5eeb4d7f698ab3f06d430dca72f562e9f06621e89a261db1e2cb5ad6e74caac9425a1cc12848009400094a2120025000240045000404a120280020000a8000000000000000000000000297bc63acda7b4715d13113dc018fc3cd7479a768c9113db696f45eb6ed312c767e51a3cf3d538e2b6f1aef13fa98dc9c97518b8e9b5592bfbb33bfe2bc2f2b658dccff006f4a3cbfb4e77a48e35a67dbebfa935e7f7c7c351a6c98fc676965be257375f4e3968f4e30d8b9ee832ff99159f0b3214d5e9f27bb92b3f9b0d7a6b9adc6c6d0ac4c4f6e2b3232000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000080004a0150001400004000002a000200042550072cb7e8a4cf83c5e6bce4c969f197a4e699ba3174f9cbcacb96efb33b97abd1b3356f67b512e72b4a92c0ec22549626dacbe6d6d70e29fb69fdc9ff0046565411e47d5b6db4948f1b3e7cf69eafcbbfb1c7f1dde2e5db6f45dbd1c37754dcee525495a549751c842a994342086b67f75b0d5d4288351095546441222540415ee15672d0cf475d9ef8bb1fe48bab2b2967248f7de929969564104a8b3aa63a4f24000a2000001000e3921aedbbf186a3acbd0c747ccdf9c6e56bc4cfcfe400d0f3000000008a80482084a000000000000000000000000000000000000000135ef084d7bc0016ef3f3426dde7e68000000000000000000000000000120080000000000000000000000012800000000480280000000000009131c4162c6de930ce5bc4793d452bd31110c7f2fc1d14ea9ef2c93c7e272d2396f5e73afd2fd8f6b8c73dcfddf4c7d2fb6ed7d2f0bb73f739fe631bafbf08864984d65fab24c7833b7dd1adaee76f1578d9cfc9cfc7e5c6cdf8d6980f50f814a000809424012094106ce09fb5ddad83cdb2ef09a3e665adf36b3eebe6a64f765a2dfbf1ab4057304a1282094a128aa2cb428b43228baca2cc8a2f0bc39c3a4334aa3a43ad5c61d618ab5a83dffa3efc7257f37d061f32f4865ad7557acf9d783e970f3dd572d5e9c3b4c3467394e5e8cbd3e2f530f0786f34bd663ca5edf0dfda63acf8c3a6de8cedfbbcfbd3f26f7e68d8109761e612940009000129556001280012212000008a2509040109014001000000000000000000000000000004240010adb1d2fdeb13f92e02a31d979568b37bf8ab3ff8f831d97d3ba49e38e6d8e7f7665e846bd5596e675879cffa5ebb0ff6b577dbc2cb56bce7179e3c9f57a14b7f8dd5874e71ae6c1d75bafa4ed7d34cfc6aef1cc7247bda7c90ca0bc446f88cb860d4573c6f1131f36c2222212b504044c6f0c1e5e5dac9b4db16aaddfb5a780b149d19c1e6af1ceb4f1c271e5d948e6fcc3147f574579fd99aff00ba37c4a8e9c637e0f503ce57d434dffa9a7cb4f9d667f06d579ee8added6afceb68ff461bb839ba7a2b348685399e8efdb353ebb7e2ed1abd34ff9b8ff00ed47fbb0bc5736bd35b435ff0099c13fe653fed47fbafed71cff001d7eb08bc32aea29d74fd28faa7aabe30820b08de12000000000000000000000000000000000000000000000000000000000021280540001400000001008900100002000108994b4b599bd8e2b4fc04ba2ac9cd8f3bcc73fb5cd31e51c18d95ed6de665ca5e7cbad47b309c631b8acb15cd757fcae9e76f7edf6d7e72c9da62b1333da1e63144f35d74e49fed619dabf1916095bfca747fcbe1ebb71c993eeb4fcd9395bb2920457cdbd5593ab5b4af855e6a597e7d926fccb27eef061a5e8c345c3479773b933d6ab2a2d2ab716302a810aa821a79e78b718fcd3bd8544ae484aa080aacaa8026bd9595e3b319e867a3bf87ef6bc3775113d92897388f65d2ad44760af614671ed861db0001a100000080044f186a4b71a978e2e98a60f0f8a9d716fc54fc679a803a0f0000000008084a001284a0000000000000000000000000000000000000004d7bc2135ef0005bbcfcd09b779f9a000000000000000000000000000000000000000128000000000000000000128480a20480000000000090506f68b07b5c91e10d288de5e9b4383d963dfce59cef18dae5bf78c3cddfc3edfd5ddc31fde51f47ecdb5f53c47abfa272ddac74c6d0b03c16f23f5b8cf4c927b4e1a45a768979cc93d5799f8b39a9b74e39605df675abb3a57ccfb95fc709f172fb965f9613e084250ee3e5d41200002401202023b619fba5b6d1c7c2f0de76c7431d1f3f77beaef77d44f663e7bb22c7df85a5a1c6884a04104a50905164aa940175955985aa2cbc39ba432348e90e90e30e90c52b69195e59aa9d26ab1e4f098ddf66d366ae7c55bd6778b444be135eefa4fa5798fb4c7fcbda78d7b7c9c32d572d5e9c345dbecf9bdc55eab9567ebc7d33de1e4e193e5b9bd9668f0930ee666aceece716f29ce35ec567389dd77a4781561090412212000000948000942404000140000488011200000000000000000000000000000000000000000000000000000000000211358f058054729c58eddeb1f470be834b93dec556e2179a8bcd462edc9b436ff002a21af3e9fd1cf6ea8ff00f26750beaa8dfaeb0f3b6f4e69a7b64cd1f2b7fdcaff00faed23b67cf1ff00e51fecf4a37ebac3a7aeb9bccffd02fe5aacd1f9c7fb23fe839fff00fb337d5e986bd5f065d3d7f08e6f3b5e4b9e3ff779beadac5cb3263b44cea735b6f2dfbfea6606b9f8465bb9fc230424000000000000000000000000000000000000000000000001090004241440000000002000054016448800010000200112f31cd751d77e88ed0cfea727b2c56b7c1e2f25e6f6999f3633bc46376e8ebb539c9d363deb9ca92b4cb475baaae9305f25bca387cdcc7a06279ceaaf3d3a5c33f7e4e13b794323a1d2574982b48efb719f1962b9469ed9ef6d6658fbafeeefe50f44a27b915972b4f09f94ba4b5b536e8c37b78564551f25e676ebd7e7b7ef31f2eb96dd79b25bc6d2e32f463a45c7478f2d6a65ad565594ca8dc2220aa50d022258ebcf196f5e76863e544a55509577150250200095dcdd1cf3337abc2eb935e1b4a1221847a856128aa56ad630ed861dbfcc4250836000008480086be48e2d872c91c1bc754c7579bc4cfc1bdf9cede4d601d47cb5000400010040009400000000000000000000000000000000000000009af78426bde00136f7a7e6aad6ef2a80000000000000000000000000000000000000000025000000000240100002509014000000000000122623790558ddd161f69923c21e9a236886968707b3c7bf9cb7de2f137ac8e5bb79cebf53f63dae36f3cffaaf1fc9f47c06d7d2f0db78fc39fe600e63d8ac6ebef3b4558a6f6ba7fa8d17af6a7e2bb7db1f03c7e5cefdf848e7e33aefe7e6801b1e40000120002774a21220898e130df863e5bd59de21d70d0c1e2f11dff26bc46b1768e68dacdd6b678e3bb63cb46ba51b24104a554a00b255590512bc290b334aa2cbc290b433451d217897385e19a56876af764b43abbe933d325676da637f931512d88970cf55dcd5ecda9cedd5f0fdb5f71d1ea2ba9c34c959ef10dea5a6b3bc3e79e96e69d3ff000d79fd97bf89730347b6d0ea233e28f18e12df8792e59a8f6593a67b59eb225e9c6f3231b77a3c39ce32ae9bd38be6ba554ba0e0252800120000b2ab00094000900004a0045000412000a000800000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000812008001400045109400000008e29540000004000210952d3b400ac5735cb15c3d3bf7796964798ea3db6598f28e0c64b86e7733975af56ccfc5bc2718c56d3b71792d564b736d7460a7f671cfdf3e331e4dfe75ae9c348c38bfb9938444793bf2bd0c68b046fc6f6e369f8ca0d53dd91a52b8e915af0888d969159951444b15cdb27b3d0e7b7855939795f52ebb162d1df1754755f86cb1625f74caf12be7113bef3e3328923dd43d508f254566554caad45405528041c72cfdad16e67f75a4a252a1129554404250091611dd7523baee59ea67abdbe1bb6f9b5e1fb3e64aa94323d08ac775958ee95a5630d2f9d30f7f3a008360000084a00052f1bc2e8959a8c6739c6f9355a7285ad1c55761f1eae5d2d0006401008a942500800002500000000000000000000000000000000000026bde109af78002dde7e684dbbca0000000000000000000000000000000000000000000000004800812008480021200a000000000090506f68b07b5c91e0d288dde9397e1e8c7bcf9b395e31b5cb7ef183d1e1b6feaef618fef28f7fd9f6fd7e2a5fe996b2111b4244bc1cf23f5f8ce249fa684254b4ed59012e8c16aadd5965aebe49ded32a3db876c59a3f35e22f3bb9ff00f55cf72f39e57e350028e60000240004c2555a1001b98a77ab4db182784ba60986af27899a35e23b679b614cb1bd65756feecba8f10d091129041295616401295564144acaa61155175a145982a8baf0e6bc334ad41d625deb2d6877870dc5dc7b7c36953c37bb6f065b61c95c959da6b3bbebdc9f5f5d769ab7dfee8e16f9be3512f43c87995b43a88899fb2fc261c875ce715bce738f93ebd4b74cc4c3d96873fb6c51e31dde1f1e4ae4ac5ab3bc4f1866f95ea7d964e99ed66f6ef5671e95e3de9f8ba6739c6bd642ce712bbd23c0ab084820900004a13000900004a000480002500024400825090000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000010910000000000a0080000000100079a0000425000200015627996ae3153a23bcb239b2463a4da7c9e33559a73649b3395e231b95bc27ab28ebb33af2e136dda5abd4d34b8ad92d3b6d0d9b5a238bc86aef6e6fad8c149fe8e39def3e53b79390f415d395e9efaccf6d6e6f3e18e27ca1e9b773c74ae2a456bc2223645f2d291bda6223e2a11579973bde2b1bcced10f39aff52e934bbc527da5be1e2f0fcc39feaf5dbd77e8a7840d482775e23d3f38f53d30f562d36d6b769b783e7ba8d465d564eac969b4ccf9b94cab5e3786f1863ab197e52df68ebbb3d3b76373c9594aaf4423c02154a1a10154ab22a0d6cf3d9aaef9e78c35c12a23c500a095008022c4d7baea55771cb532d5f4363b1767b20a820ea2be6b2be6b2958c3dfcd71d72f34008340848008000001406b648e2e4d8cb0d7769a24d1f2777a67979b7e2271b940147010900454000802500000000000000000000000000000000000000026bde109af78004dbbcaab5bbcaa00000000000000000000000000000000000000000000000000250905410900500000000000012262370558dcd2609cb78f07a7ac74c447834397e1f674de7bcb22f1f89bd6472ddbce75fa7fb1ecf1867b9fbe93e4fa3f6edbfa5e176e7c39fe62509721ef51afa8b74e397763f5f6dab11e2b3ad6b6fba39ee5e30cafc2b978abe9d9cefc18894250f60fcdd4a000800002400016553ba2825d70ced330e4b5276bb58ea98eae1e23b177fb2b749ec0ec3e78c7cf742f78dad2a020984aab20094a120a89594590516859485a19a551785e1ce16864ad23a44bb435e1dab2e1b8bb8f6f86f767c36b5de25d6b2d7874acb88f6eaafa3fa679b7b4aff002f96df747bbbbdc52f3598987c2b066be0bd6f49da62777d6392f33aebf4f13bfdf1c2d00f2f1c3a6e4ebcbe9ba0d5467c71e31dd928788d1ea6706489f2f37b1c392b929168f37a31bcc636efb3e6e738cabaef63a56c25459d479c4a5000240004a555a000000122000480000008094000910901400100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000001000904000002a00011404002440002128fa0006e200004002502000566463b986abd8639da78cf612de22ae339b18be69abea9f6759e1e6c14cad7bcda6667bcb1bcc35b8f4582d92d3da38478cb86779ac3d7b538c5bd18be7bcca34b8bd952df7e4e1f263b45cc341caf0445b245b24fbde332f0fafd6e4d767b64bccf7e11e10c7ccb41cf575c309c73ef5eef57eaeaed31869f9cffe21e4f57cdf59ab99eac93113fc31c218c9953751ce6372f847a5333bb9cc932a6ea466498a929c5c6d2a4af87bcba61aae0e1e23b19f11db3cdb2aa50ed15e244212851042ab2b2a034b37bce0eb93de972dc56442001904255906a0bd7b264825c6ea9757d3daecc7c970ed9e476400342b3dd28b254f68c63dd913befc80106c01000000000a80e778e0d56e4f66a4f775c744c5f3fc54e33f935e2a76a006c78c40900100020000000000000000000000000000000000000000026bde109af78004dbbcfcd55adde550000000000000000000000000000000000000000000000000012000000a000000000090146ee8b0fb5c91e10d388dde8f97e1f674dfce59caf18dae7bf971879bbf87c3ea6f618fef28f7fda36bd7e2a5fe99cb2111b4442c25e0bd51fb0c67124fd3400828861f5d3bdf666181d55bab24baed772ecf73c5e3af1b197c9cfee378d9e3f75ac84a1ea1f0a9400100000120000000983b5a12895c7548e5bbd70c9acfb6f937e1652b3f6c2cee3e62b4f37bce4ef9e38b5c1912b42a002c9552802c95564144ad0aa6250545d68552c95a1775ab8ba565c77346b3d1eaf0ddd7c93c3f7fc9da1d225c625d21e7ab5ef1da2599e51afb687515b6ff006cced6860e25d6b2c099ce634fb9e9f3d33e3adeb3bc4c3d272bd574cfb3b4f7ecf8c7a779cce9ef1832cfd96edf07d2b1e4ed6acfc776b1e951e2dc9ce2e994e2d8fa0c4aec668353edf1c6fde3bb250f5263798f9cd6738caac9552a302c212000000b0aa40129400091090000000004500045480080000000000000000000000000000021202808004884808000000000002800200000000000000000000000000000000000000000000021280048848020001400000000425000000023cd000250000804000891599015cf2e48c749b4f6878ed66a673e4999ede4c8733d6f54fb3acf0f3606f68ac4ccf08872dcae79de6bbecce6f2ebb73d38b8ea33d3063b64bced158ddf29e73cdb2730cd3b4ed8eb3c2192f51f389d4649c18adf657bede6f213288e9c736475db9ee89973992654951d15132a4c932ab5041128159684112ed87dd7096c62f721d705db793c4e919f13ecea810ec3ca081122a04ab29567b480342fde5cd6b77514652884a010109479856a6ab86b3cd7d80701f5269140001594a2485f63d98feff917be7924041b0425000000000a8086ade3696db5f2c3a6298eaf278a9f8c6fc4ce76dc40741f34000110000000000000000000000000000000000000000000009af78426bde00136ef2aad6ef2a8000000000000000000000000000000000000000900400000000900140424000000000048988dc162c6de8f0fb5c90f515af4c4434341a7f674de7bcb22f1f89ba471ddcbd59d7e9fec5b5c619e77def1fc9f4beddb5f47c36dcf7b39bf3120e63de00200e779dab32f3b79eab4cb3ba9b74e396025e8d9f75d9d2be4fdcef4c279b97dcefe584f8200771f32940010000012848000002dc113c448337456ce19deaecd5c13de1b4ee9347cbab9ce32be6e19e38351bb9637ab49462944a000592aa6100592821155164aa94145e16852166695a45d7a39af4972cf45cf47a3c3f7c4d8ef8ed0b44b9ad12f3d57d2476874897089748962ab4366b6da7787d13d37ce3dbd634f967ee8ed33e6f9b44b67066be0bc5e93b4c32396e4f774ca731fa0345a99c19227ca7bbd863bc5eb168f37c9392736a6bf0c44cff52b1c61ee7966b7a67d9da78793b6ddf673c6f15f377a695db3c79c6bd42ce512e8f48f0aac2120824400094c20004a4000000120000000000200002a400400400a900100400a2400004008a94250009400024400000009400000901040028910022a4004504241140010000000000000000000000000000010940025000280020000a00000800001500595000010009400021095401132c5731d67b0a74d7de96dea7515c149b4fe4f1d9f3db35e6d6672bc46372fb3784f5591db671f771bdb79999785f50f3de8df4f8278f6b4c7e0dce7fcf2ba5a4e1c53bde7bfc1f36c979bda6d69de67bb923d127b3a6dcebca96b4cf1f172994ccb9c8aeb2711512a4a66545540512aaa8889553285202b2dba70ac353bcc3763b3b60b868f0f89ee9e4cf88eff009008741c046e80510439de76acaee5967ed150694aa94033510000088ee26a996865a3aedf5cf1f35d9ff24580711f481094000ac2cac2fb527bb17bb1f9996b8f9ac0841b00000000001401cb246f0eaada382cd52396f4e70c9bcfae35a62650ec3e417542401001008a000800000000000000000000000000000000000009af78426bde00136ef2aad6ef2a80000000000000000000000000000000000000000002500002405000042400000000482837f4383da64f934ab1bcbd2e8707b3c7bf9cb39de31b7e0e5e22f1879bd1e1b6fea6f6de3fbca3e87d9b6bd7e23d5fd3396f446d0912f00fd7e338927e960020a0848a80c76bedb5221876475f6dedb7831cf5ed76b5b7d318f81f71bfeef28c78dbcefe400d8f10000000000000240005a15580138a76bb75a74a4edd7f1d9b70ed8e898de5f3373bf2f36f770b8d97faba978deb2c7cb233d98fb46d32d0e14a80006529408ad0b2510200b2554c20a2c9552828e9bad57385eae79e8b9e95db62fe71367be3b2ca44acf3557d31789747185e258ab54768975896bc4ba44b0b5464b45abc9a3cd5c94998dbbfc61f59e57ccf1ebb156d4b7dd1de3c25f19acb21a2d6e5d1648be39dbc63c511c339c5f375ca731fa4f96eb3db57a6def47eb65e25f2be47ce63574ae489daf1ef43e8da3d55751489df8f9c3d585e6396dde2f0f959ce3276dec7a72c8a548959dc795564a00412212002ca800b0000000091090000000000000101280512200101202880000000010002442001614ea8f13aa3c6001715dd200910900000000001280000000001152212000008a0008000000800482001220015280040000500045000004000000004aa000000020012800010200112e3972d71566d3e4b5ef158de783caf30d6ce6b74d7dd81cf72f1163aed63cdf270d6eaeda8bcf1fb63b3c7f3be734d0639a5662725a384783639bf35c7cbf0cf1def3eec3e53aad4df5592d92f3bcccb95bcd65e9c67a63ae139be4a67cd6cd7b5ef3bcccb5a65332e7320eb8ce234899526532a4cb4022551596840566455550102162c4295e3786eb4f1f1bb6ddb0d171d1f3f7fbeb3bbd73a2a94363904a04000d7cf3c1b0d3cf3c5444ad704032084a05016aa92bc76633d0cde8f0fdf1af0dddf2480e43dc2000015f35959eeb3dc8c67ede66e69f38b0083620000001400001024006ade369736c6486bbac31d1f2772719df36fc44e3728028e0204a01140010000000000000000000000000000000000000135ef084d7bc0026dde555adde550000000000000000000000000012800000000000000128000480028000000000000917a57aa76055c6735bba1c1ed7244f943d2446cd5d1e18c58e3c65b8f1788bcd93f4e3b997395afd57d9367d3b5967fd5789f27d2f07b5f47c3ede3fa9ff290181ec00100102979dab32a254cba460b536eacb6f9b5d7bcef69951edc7b62cd1f99f1179ddcefc6b1b979cb2bfbb40428e624000000000001284800994276de601299695bf18ffe177fcd4acef0c8fb3fe874fc18cc5d9adabcfabcdcf62f5cbcdcbc6e1e9c763e3b7ffebd7f75c3d3b7e1ff00f9e1d5a5963ee6eb573c717a47c3ab5ae94241804a00684a50200ba55482a2c9552828b2f5735abddcf3d172d1d76bbe26d77cf376dd6851687995f545d685168616a8e90bc3944af0c8a8ed12e912d787489615465347adcda3c917c7698dbcbc5f5af4f73fa6a22b3d5b5bf8aaf8b44b7749abc9a4c91931da62624978479f771fe2ed94f547ea4c19ab9a916acb6625f30f4e7a8e9a88ac4ced6fe2affabe918b2572562d12f64eae5b77d9f22ce2bb6f63eed94a912b3a8f3aac940082400049084c0024000000048000000000000008a0000000000000856d68ac6f2009ddad97578b1779fc98ad5f3099deb8fb78b0f6b4dbbcee96f0f2ee67eaab27aabd7b787a6339939ac7f0d5a37e619ade7b3415ddacb779d1c58c7678d5e86d4ea72dbbda558cf923f8a5ae6ed7aad659f4c6990c7afcd4f3dfe6cc69f9863cbc2dc25e63737d9db6f73f6e2f3ee6d7bc7a1ede27759e7347cc271cf4df8c33f4bc5e378f37bdc76b2e670f9cedbb87179744a0761c4480000000000000000000000000009400025000225000a825000a0008a0008084a0144a128004a0400251ba55005950000100000002054054b9dad111c4b5b689f079ce63cc37df1e39f9c8c677883a6de3eac95e63afeb9e8a4f0f378de6bcd7172fc5333313798e10a736e718b4149e3bde7b43e5bacd665d6659c992dbf847838e579acbd1b78fa7176c2734d66b72eb32ce4bcefc78478434265332e7320eb84e23689952649952655409956495555015925595104212aaac0100aa952af87bcb65af83b3bbbe3a1347ccdceebe6996b7cc4034320810080d2cd3f7375a19277b282573408159000010e8e7e6e8e79a66f6785fee6bc2f6d1094303d40002a0acf7595b2cd49ab1b9db573eda94a1283498e910002800a8000a000002968de1ab2dc96ade36974c130783c54eb2ba78a9f8c5006c78040940200000940000000000000000000000000000000000009af7842d1de00116ef3f3426dde5000000000000000000000000000000000000000240010900042401400000000000152caf2fd3f5dbaa7c98da57aa59cd05e29f64b1b97d38daceece70af6781dafade236f1f8f5f93afdb73fa7e270b7f7c7f365a1225f387eda742000340020086b6aadd38a5b2c76bedb5621ac7ad9e6d6df7473ddbe9dbcafc2b978abc6ce7e4c4ca1287ad5f9bb52808041200000000000094240074c55eac95851b7a1af565dfc20672edbe497af13f764fe2e9b53d5bbb73fef199dbeddbe0c44474ded5f0966989cff006e69f8b1e1efe558f0fdef67de70ff0046ddfd5e3f83d1f77c79f0b7e19451c33c707773cb1bd5ef1f92aad2005731221282c4130848342c2ab420094a1282895a3ba8b47766e85d1d36fba79a61dd3cdd92aa5e6ab5f548e9bace6b43228baf12e6965547585e25ca257896154768975896b44bac4b1541bfa5d4e4d3648c98e76987d7fd31ea8aea36c792769ed3bcbe2b596d60d464d3de2f4b4c4c185e2a3cdbf873f377ce738d7eaac7922f1168e30eb12f9c7a57d4b8f578eb8b25b6b46d1c65f43ada2d1bc79bd8e7b77a3e3baeecebcfedd92ac277741c4584240120002528dc0048848009400090000000000000000000004000c1f32d56dfd3acfcd96cd9231d26de10f2396f37bccf8b1b978c5cf7ae91d36e7393a6c4d6b9eea932879c7a22a502001220004a55001664747ad9c13d33c6ac625ac6fa6f2cb19cf546dede97adebbc4f75de6345ac9c368adbdd7a4a5e2f1bc79bdd2f2e5b5973387cfb3876dec78bcfedd1281d87012237001220004884800000000000000000000000022800000804548800128000015004a550000000400000800102240514b5a238ca9932571c4cda5e635fcce6fbc567a6be239e79703aed61cd77e61cc77de949e1e72f9f739e7d8f4559a527ab24fea68f3bf51462eac58277b4f7b783e7d972db2da6d69de65cf3bcd62bbede3e9c7cddf6f1e6f3fa74d4ea726a724e4c969b4cf8b5264997399075c27a6344ca924ca9baa8132a13285104205656288899412850040858a823744a55b2919cb4a99f6d6ce2f761d14a7bb0bbd108f9950402820805011bb1d6ef2debced12d0904a542014640400057bba2945dc73d4cb57d0f0f3f06f627184400c8eaa00082113d9644ac44cbae37c8ba520457b2569754c7b679261db00046c00500000004000e3921d95b46f0d63aa4d5c3c44e76eba6739c6f93500751f216884a010012082000004a00000000000000000000000000000004d7bc2135ef0009b779f9aab5bbcaa00000000000000000000000000000000000000250002400500000000000004a1d71d7aa4148d9d3d3cdb3313de3bc158e98592a3d1b7d3fe56327a5cfed6bb4f786db03bcd2dd55f265f066ae5afc7cdf3b731f4e563d3bf8f3397ed3c1ef7d7d8c32f7e38be71f1bed1bfe8ceed5bd32eb3cdb02078c7e9512022a886235f6ded10cbb03abb7565974daee5d99f93c7e3af1b1939fdc6f1b3e7635407a87c1a5000400000000000004a1200965797d7ed9962659ed2d7a71558dceca9bbd8f57839cf89dbf8735bfb7ce7c4f961ff2da62f5d1b64a4b28c4f30f7aae3b3fe489b5df1f43ee78fabc26e7972d7dc3ff005773c9cd5bc7db29acf04cf17d21f8b18f1368da5551cd6a404104884834ca6130aa50688b2555815129552cdd0ba378eb3cd31d63b2ca25e7a3eb422e9552c8d0e8952166555175e1ce166451d2178972895a1914778974ddaf12beeca9744ba36f49acc9a4cd5c94b4c4c4bee9e97f53e2e618ab8f25a22f1c1f9f376fe8b5b974796b931da6261bc6f151f3b29ccb17ddfabeb689edc5d21f3bf4c7aa31eb71d71e4b6d77d02b78b46f0f4b9e1799c3cce9b938ebfb7659ce256741c8592800120000b200048000250002400000000000010002073c978a566de02030fcd33edfd38fcd8276cf9272de6df17079776f39336f36bd9b538c5d319c480a5af4a46f6b4434afccb4d5e116eaf9716451be31b5e617cbc3169f35ff00fc56ebe653db477fcc5e2df619b9633dd9018deae6b1df476fc94b6b755878e6d265ac78ec8be9ca7b34c4cf1beeca8d0d3f31d3ea27689e9b7e8cf096f20d894aa0a0b6ecdf2dd5ed3ecedf9306b56d359de1bc2f1930e7b939c6ba3dc27763741a9f6d4da7bc320f73185e717ce6f39e9caadba159b4446f3c1e5b98f3cbf54e1d1c45ad1c26f3eec36c6797a630de187aabd58f9b64e61cf3047b4f6b5bc4719a337cb3d4b5d6e2fbabb5ebc2d1e12dbcb8eed9ab0f565b33d9eb93bb0f4e6b8e678c4c3278f2d72c6f59ddea73c73993cae99eddc5d92aee9741cc48200120000212000000020001200200000000010001ba0000000040000200040aee02a65c32e5ae2acdad3b44299f514c359b5a5e3f99f358e9b5af6e9a40e7b997b1abb6d63cde7f4edcc798fb4df79e9a43e5dcf3d433926d874f6da38c4da3cfe4d5e73cff0026aed38f14cd71f6f9bca4d9cb2bcd66bbe18f1247a36f1f75ad6999de78b94ca265ce6c8ae927115332a48a4ca804caa4aaaa20aa5495502554aa2a02042c50102aa209957c1288e36859aae3ab96e76e5e49bd7f0adc8488771f384a042882502001cb2ced56936b3f66a8acd2a10901040224161355ea9070baa3ea6dce309e4d63a4000500400a9448020ad5656166aa5636fb4dbd3e740106c001400000000042500955ab78da546c6486bbb263a3e46738caf9ba7889c6e5424147010002000000000000000000000000000000000000026bde109af78004dbde9f9aa9b779400000000000000000000000000000025000002400100024424140000000001202910dec14e9eee7a5c339af10cfe4d356d8f68ef1d879b7b3f4e58ff374c273eda3edfdabc2cded9deb7fba7a631c9578d67a67bc2cee92f3397c974cf0b86571bacbc0889b63b75552167338530ceede5329ae3796595c19eb9a3e3e0d8603eeacf5567696474fab8b7db6e12f9d9e3e9bc3d7bd87aa73ef1fb5f0dbf37f6b1ce7bcebe6fcefdb7c5fd0dcf4e57f1cbf856fa0ee3c23f5492f2ade76acbce649ded33f1677536e9c566025df67dd7674af99f73bf8e13e2e5f72bf9613e0801dc7cb288004122120000000000250901626b1d56ac7c5e92b1b5623e0c1e92bd79a3e0cf38efe919dfd64f83e8fdae7fb376fea48edf6a9f86e5fde5ff112c4f30ef0cb313aff007a18daef86d7747a7c7f5f0f9f92f8effd7c9af8e77ac3a38e19e0ecfa491f88ab9775f369e58dace4d8cd0d76873a54a0482025020094a00684adbaa200b8aa5295a891da16521679c7d6898e9164aa966ad6c596851661545d6512caaa2ee9bb942d0c8a3ac2775099e0caa5d29976df257774896baf12aaf9c327a4d5e5d2648be3b4c4c3ed1e96f5663d556b873dba6fc22265f09896d61cf7c568b52d3598f04c6f1516f59c0fd6b4bc5a2263b4ba44be63e8ff005653578eba5d45a232470ada7f89f4aad9e9630bcc799bce7576859ce2566c605928001200009842770048000000024000100006e2000961b9a67e9af4479b2d69da265e4b5da88be4b5a7b4319de31ac6ede8dedce728deccfc9a96b4563796133732c996f38f4b49b4f9dbf8537c96e659271e399ae2afbd68f3f833dcbf414deb4a57688ef2f355939af5c4caf118bd1722d46bad16d4e499f84767b4d2727d1e929d35c559f8cc44b238b15715622be4e8ebb587bd7a24e2386ee7ed1e7b79ae75c38e9eed2b1f28874d929d8e14457652d8e968dad589f9c3aec8d91551e4f9b7a6706b3fab83fa39a38c4d7844cfc5e5f0eab3e8f37f2dac8e9b470adfcacfa9b03cf393e3e69a7b46db64af1a5a3beef2eee1e9eaf465398f56d67cf4af3e378bcb071c4603976b3262c96d1ea7864c7c2267ce19f78c7bd25e6008051b5a5cf383244fd5eb6978bd6263cde2197d3732a69b05e72cf0ac6f0efb5758e785e2bcdbf34aebb939c5c7d45cc3d9569a7a5e2b6c9ef4efb6d10f3d8f55a3d3d7a7da57e33e72d3cfa4b738d55b559e6d15ed4ac4edc1b51caf471fe5eff3dd776fe4c5eb794d99c63cfedbc671246c575ba6c9c2325677f8b09a888e5fada66a7b9967eef0ddbb9b93e9af5fb22693e5312f31cc2da8d1d670e79ebaf7c76f364687d02b6ea8898f36e69b537c168da78307caf37b7d263b7c1916a5e2a3394e634f6b872c65a45a3cddb779ee57a8da671ccf7ecf40f6cbcb1b579c5f3ece2f0e9bb38c9601d0721208004a000128000000000000112009420004a00000400250000204002508ddcaf78ac6f202af32c7eab5d8f044f1de7c18ed6734db7ae3fabc6734e73874559b64bf55a7b46e96f0e39e5eaab8ce6bd3b78fa672c9733e6b5c75b64cd7da23cb77c9b9bf39cbafcb3113318e3b435799735cdcc324cda76af957c989dd8d7ab5a46e4e388985e738bcd9ce65132a4cb9abdda04ca9b932accaa8132acca10a082f4a75c4cf839b7f4b4df1dbe26899f6b7863ebcb876f093d5bb3e6c74cab2b5f85a546c8f355ce7195f3a84086a2b20811b8a80810295289a71ba17c5de5ac755c3570dfeca9e23b3e6d9043aabc22500080811200d6cf3c5aced9a7ee71519a51000808f3491dd2e85d1ac3ae53cdada9ce78f9ae0380fa80002a0800540000563bacaf9acd54ac61efe74c3fbbcc001b000000000000004002b78de1ab2dc6ade36974c531783c54eb2baf8a9f8caa00d8f9e0812082000000000000000000000000000000000000135ef084d7bc0016ef3f342d6ef2a80000000000000000000000000009004000000000002a4000000000001688dd0d9d2e2f6b92204b788d474d9c7d7b98e3fbb2333cbf07453aa7bcb26ad6bd3110bbc1bb7d59d72b757ecbedbb5f4bc2e13defe5fcdeec31f4e327ea48d3d469bda475477863237df69e130cfb4f53a68c91bd784bd9b19f338fd3cb865e9cb97e77eede1fd1b93764e9974be6fb9e2b62788dacb0bfae9e6c708e359da784a5f4525e5f8b6b2c6e195c6eb3a211358b252a323a62d55f0f0b7186531e5ae48deb2c32bf7639de93b3c9bdb7c758f5d9cbf47f6cf1bf531fa59dfca69f18fcee396585971e96321aeb6d4d98777cfa89c9b7570d9c1e5daed7598fa5f7bee397fbbca3e7e5e23ff00232f55d789c880010048aa212810048848000000942416337464397d7eeb599868e869d38b7f16f3cdbdddf26376f39d7ddfb64e3c3f3fbcad76f038fa7c36df973fcc6275fef432cc46bfde85daef86d7743c77febe478eff00d7c9a58676b4c365a95e1786dbe8e3a263a3f15b9df979b7bf38ceb9668fb5a8debc6f5968b63cf4a0008094080252800161022b508b6e9552828eb0b4290b3cf4babeae1db130ed9e4b255859957412b28b334aa45a16dd45a19505d6738599017dcb4f054b76454cfb6f926e765f273dd78971dd689557cf65de25d625af12bc4b0ada37b0e7be1bc5e93316acef12fb17a67d6f8f2569a7d6db6b70ac5e7cfe6f8a44bb56d313bc7031bc564b398d3f5be3c95cb58b5262d13da61da25f0df4a7abefa39ae9f5569b629ed6f3abed1a7d463d4e3ae4c768b56dc625e973c2bcce99cf76e42ce712b3a0e62c955200900013295520090000000000005565401ababc9ecf0da5f35e659726a33d74b49dbab8da7e0f7dcd7274e388f17cfb0cefcd327c2af3ef7b33bddcf56c695ad8ed65b4da7a69b1c5291d9ebb96e08c78fabce5e73157aaf58f8bd8e2af452b1e106d4fc9ad9f737afe2c6ffb3a2db2130f40f3a1b25280046c2400550b2001e27d51c93f98ac6af4f1b66c5c787f1430dcb35d1abc5b5b864af0b44f7de1f4d9ac5a2627cdf35f5072e9e53ab8d6e0aff4af3fd5ac7687977671979bb6ece717af672e671fa71dacb8c9901cb066ae7c717acef12e8f28f6030da8bceab575c1de95fbaec96a32c60c56bcf9431dcaf15ba6d9afef649dff0020065eb1158da3c928000dd87e75a38d5e96dc37b5637865d131bc6c00f3fe9bcb33a59c73de93b3d2bcbe836d2f31cd87b45bee87a68006c60c9ecf2567e2f654b75d627c5e1e1eab9764ebc31f077d9bab3b5dcf3efcd2b5bd3f1645284c3d23c82400000000000442508004c251ba0013ba000000004000008004a108dc013ba932adaf158e2c36b399d69bd69c67c4672bc456b0c7d5590cfaac78238cf1f0797d6f32b64df7b74d7e7b309cc79c61d3c4db2e4de7c377cdf9afa833eb2d35a4f453e1de59cf2f672d5d36b0e7ad76bf8ce1e879c7a9630cce3d3cef3e76f0782d46ab2ea2f37c969b4cf8b5ed6dfbb9ccac8d2657d9cd332a44a93244f04ba2e5a3aed77c5d8ef5a65499375665cd5ed1332a0aeeaa8277421028259ac15e9c71f261b14755e19d88da1cb7344ddf67bfc04e772df83afdba77df260f511b649706deb236c8d376c7486df6c7cfde9c6e67e75bf1538decfcd00896c79d10810a00081529476c3da5c65b18bdd6f0d570797c4e93cd9f13ece803a8f20080011ba056dc2004695e77b4aa21464010002d5557af6672d133d1dfc3ce738d7869f9f94480e43de000020000000057cd6567bc2cb7d97da318eb97998f765f20041b0000000000000424004396487544c6f0b8ea8e3bf39c2ba65399634c4cc6d28761f1d729c5a2128040048208000000000000000000000000000000004d7bc2168ef0005bbcaa9b779f9a00000000000000000000000000000000001220001200a000000000000a987a0e5b87a6bd7e2c1523797a5d1e5a5a9158e131e4e5bd78c2b3bf2dc3c9f4bed5b7f53c561ff5eaedf66dcc76fc47e5fdd389e6de01e01faf8a090056a6a34f5cb1e130c5cc4e39e9b33ee1970d72c717af633fedfe4f2e37d3797e77eede1bd366f6335e997ffebeeeeede3bb85c72eb2b102d930df04f8c78a913bbe9b1865eb9cbf0cf478ad8cbc36e5c2e9ed7e094250d8f3a56ae4e32e7c617b775578e558f55c6f3193a96511d9cace1d5efdbdc99cf8bc12d9d63a0af578a77716ae2fa8f3edef4cba5480c2bd024408aa89109414098ec3ae1af564ac2a265db575e27eec9fc59ec35e9c758f83b2238425e2cfbab2fd46c4f4ed613feb3fe1d319c49e4311aff007a1976235fefc3a6d77436bba3c9e3bfc197c8f1dffaf97cbfe58e9ef0dc869cb671cef587d0c344c1f90f11dff26bc4ceb17968da38cb79a99636b3a0f252b92500322404501284a0025002c1610941474af6594af65dc32d4cb5afa9b7d98f926d766295954eec8ed0592aa500592aa595a2af0b39adbb2a0ba2dd908bf649a9356373b2f91b9d97c9c96dd4894eed55af9a3aeebc4b96eb44b03511de25d225af12e912cab68dcc767bbf4c7aab372ac918f2da6f8667b4ff000fc9f3ea4b767165c7b7556d5df8c6f092f03567308fd4da2d760d762ae5c378b56db766f44bf39fa7bd49a8e4f9abc66d8a67eeaeefbd72de65839960ae5c368b44c718f077d5cf0becf3d9c574dc9eecaa5459d4721294000900012955300079a506e009dd10800132aa5590079ee6d7df2447843c3e9677e699fe10f5dcc6dbe7b7c1e3f413bf31d4cf83c9bb7f24cfbaf9bdbb5d9170ed8f53a798f6b4f9c3d8d7b43e57835b9abcdbd8ccfdbde1f51c36eac759f1875d9f74d9f771dff66b7fd9d9651687a0794480000000225248028d5d5e971eb30df1648deb6898fab6d1295551f24ad72724d74e9326fecaff00db99edf267fbb37ea0e534e63a69988feae3fba93e7bc3c672cd6ce48b60c9c32e29e9989ef3f178ace2f0ebbb3af2f7e37d5238ecdf6579bda6698f147f1da3f532b8ebd14ac479430f96273732a57cb1c6ecdb911e800100001a079de671fcbeb34f9fc6dd32f4359de227c586e798baf4b378fe098b7d1bbcbf37b6d2e3bf8c4200c84339ca3271b558286ee872fb3cd596f0e9946674ac6e4e71ad65d657af4ab13bacf60f9eab0aa601048224004000265000002001220004a0400250200046e8ddcef92b48de6620055f76ae7d4e3c15ded2c5eaf9ad69bd71fd5e239afa830e9a266f7ebbfe8c4a5bc38e7973d164e6bd1b787a6735e8b98736de2666dd148f8ecf9cf36f54447563d3f19fd2799e67ceb3f30b4f19ad3cab12c1cd92df55591a93d13e2cdbcb633ea7267b4daf69b4cf8cb5a6cacd9ce65646a25acad32a4cab32acc91a10b4a627838cdb8ba319993d1b1ddf25f0dad4ccabb88615eb040ac8a06e81028373475defbf832ed0d157ed996f3cfb9aa67dd5f67c04ff0055bfbaebe0e71b38fc58bd757ee8963997d6d77a6fe0c3bbed76c4daed7cbf1b3fdd97c9bf1f38ddf382a9955d8784010a2002019112dcac6d586a79c36e1d705c3478fc4eb19f11dff25900d8f3820dd5dc504b9659daaead6cd20856ba0019100000e8e71ddd1cf333d5ecf0b3bab5e167e37cc01cc7a80100025000002a02b6595b2cd7b43d989df97c89df7c80106c00000000000000001094003864ab8b6af1bc355d66898e8f95bd38cebaf8a9f94bfb1091a1e51000200000000000000000000000000000000026bde109af78002dde7e685adde7e6a80000000000000000000000000000009400025090042401400000000017ac6f20a46de0a70ddb31bd27aabde1148da1766f51e8dab70e2cd65e5632d833c65afc7ce1b0c0c4db1cf55596c19e32c7c7cdf3b3c7d3958f4efe1cce5fb7f0dbd37f6b1ce7bcebe6f87f68f11e8ceed5d32eb8f9b6440f18fd2094240155b562d1c58dcda398fbb1fd1931d76b73d17e0e4f9fe3bc24f13b7ff69a57bd80de6bc2dc2516eccce6c14cb1c63f362b3e9af863c61f525e5e3d9dde3a57e0f2c2e16e3974b357e8bee7e07ea4bbb87749d7e2d001ee1f9628002083612008da7c4de52259cabae1bb960e47542dba86ce5c3abe863bb8e4f9eba5cf89bcb8ba7a63eaf2f9d8eee58fbba36b45c73b4baa5db4f79c77eb72bdb7c9d2e3d2fc5f4f0ff26d4fde78bc38efdf5617fa7297f93d28e78f25725778747cc5ca71787ee9cf6b726ee18e734b12c3ebfdf8f932ec46bffb91f26f6bba1b5df1e7f1dfe0cbe478eff064c7bae19ef0e4b629dacf761a986afca78a9d279b5e27b3e6da6be68f36c39e58deaea3c1469800c8250002404012002c412884a0d0bd5752abb865aae5abe96cf6626cf644a554b03b422dba554c22a8b250250164aa9656aa2f0adfb0adfb24d49ab1bbd997926ef657285b7512dabe70e9baf0e512b6ec5551d625d225c62578962ab511b58a7eeafcdf61d368f4fafd162f69489fb238fe4f8d53bc3ec9e9fc9ed397e2f939d5c9db6fdcdbd5e5b99fa732e9e66f87efa7879c39f25e7bace499e3699e8dfefa4f9be97b6f0c2f31e45a6d6c4cc57a2fe3092a1962eb63e89c9f9de979b61adf1de3ab6fbabe712ce3f3ad70733f4f678cb8e6db44f78ed3f37d67d3bea9c1cdeb14bcc53344718f1f93d32f31c70cbabc36715db7307b34a912b3b8f3894a0004820012844da2bc658dcdccf1639dabf748ce597a46f0c2e4c98f3d6e6f7f2ac38db9a679edc1a79eee561ea9b31e9b752d78889e2f2b6d7ea27f8e5c2da9cb6ef6977796e55e67b6618c3557ebc979797e5bc75daa9f8b3f69e12f3dcaa77d5eaa7f799cb54ab8e91a5399ff00c3730d3e78ed33d33f9be9fcaf3465d3d78be7dceb07b6d2dad1ef536b47e4cffa675ded30d2267bc6d3f3874dabf93385e328e5bd3f16b39ce35ed5685167b07855611ba4100000000015591b002930f9dfa9f95db479639869abc7fcd88f388f37d15c7362ae6c76a5a378b46d2c6e4e716dd36ef194737c8b946ae35baacd96378e1b717a579ebe8ffe81cd2f4b70c59a67a27e6f43bef1bc79bc51ab38b63e8b185e71802106c000070d4e3f6b86f5f189623915e630df14f7a5a619d979bd1cce9f9a67c73c22ff00742283d3c2d59da627c1cd68007b3d264f6986b2da60f94e6de271b38f563a44dbbce2f065d2d6f7671954a554b639000002120000800000004200015dd59b444002dba96bc56379e0c76a39962c3c37ea9799e63ce36acdb25e2958fc872cf3f68aefb7b7ef5e8b53cd31e38dabf74bc8f33e7b4c359b65c91fb30f0dccfd5533d54d3ffda78acfabcba8b7564bcda533cbda3122ededf1d6b7964f4dccbd4f9f3ccd70fd95f1f39796c99af967aad3332e1bab36591a89965cb15699526cacca932ad4822dba932899577152a27752d3b1bb8de541131c65ddaf8fbbb39e5ecb93d7e1bddaf0dda2108647a0102050042f8e3aad11f1055c673646674d5e9c70d856b1b562167972eeacbf45b138dac3ca3a6338c64f835f535eac72c0bd15e37acbcf5f85a63e2f46ce95367ddf27ee33f2c6fc1d3ee53a617e2a2043d23e4002000014644d237b36dad8b8da5b0eb868b8e8f9fbfdf59ddefcbcc103439839d7cd6b4f09569d8105da79677b36da379de54295542500c800009aaea55772cf54cb57d1f0f3f06b67b2020647504a00000000014113d88ec4f6457b1ecbecc7f7fc8bdf3caac020d8000000000000008a0020006ade3696d396486f04c75793c54fc6575df9ce15ae03a0f96084802200000000000000000000000000000000135ef084d7bc0016ef3f3426dde7e6800000000000000000000000000000000004a1202a02120a8000a0000a96f6934feda65a511bcbd368717b3c5f3672be9c6d73dfbc61e6efe1b6beb6ee387eebe87d9b6fd5e279fe996b1fb4e3b74d92ca6a30465afc7c98ae359e99ef0dcbcce5e7f0f9f3f8bcbb9b776b3cb0bae3787d8fbbf87f4e58eecf7e992cac6f49eaaac3d367307c7c72b865329aceb1964f4fa98cd1e130da6036989eaaf0964b4faa8c9f6db84be76e63e9cb87af7b0f54e7de3f67e13c44f11b38e7efefe6fcff00db3c57d0ddf45edcff00e5bc212f08fd5a4109014431dafb6d488f164589d7cf186f0ee8bb5dd1e6f1578d9cfc98f1bfe0cfe4c64c6eaecb8f74cb861f94ddd9f5758f4573dc5d5e977729787cab387bf736a6608da47549657cf74cb6b2c5283714731200000000d9c51f6b55bb5e1584a56b1d4c56adad8a77afd193c3a9ae58e3c258c566be1c1e6dfc399cc7a1f77ed7e2fe9e5f4b2bd2f6dfd57c68cf311aff00ee418b557c5c2fc63c5cf5792b96d1357836bb9e8bb7e9cf99a3f61e3bff005f2f93e3edf8efabe1aede7dd38e3e31a8470b4209f274c7549abc3bf3f0abbbd99793755b7184c4f01dc7ce46848be48dad2a032000009424004a0401302128ad117aba395678ba3867aae7abe8ec76467c3767cd2940c0f4095a154a0d0b255dd28a0b2554a00956fd9652fd926ab8eae7bbd991bdd95c92aa5a57cd1685e1cd68965551d17873895a18ab5a88ef57d7bd2f6df97d3f37c7ab2facfa46dbe8b6f0973c97277dbd536b57af85d485a1cc7a02f8eb96bb5a2261e7755c862b7f6da4b7b2bc4efc387e0f490b209672aaf25f52e6c592ba5e6159adbb5724fbb3f9be815bd6f1bd66263c61f39d46971ea6935b47ca7ce1cb43cd757c8ef18f3ef9b4de56fe2a3d1865cc71c6f15e2cf1f4d7ab3c7d51f4e4b4b47adc1adc51930da2d13e0dc7a525e5e15b38594bda295999f24b17ccf3fb3c5d3fa4ace578946b19ce518cd66bed9a66b5e15637746e8dde7cafaab2f5618fa63a2db8a000b6e8dd00022dda582e51b465d54fff0024b396ed2f37cb6dff0019abc7e3329a8a8f4568ae6c731de2d1b7d583e519a745abc9a7b70da7aa9f9ba69b513a2bce0cfc237fb2caf34c336e8d4e0e36a77dbce0d101f51d2678cd8e27cfcdb6f11c8b9ad32d6b3bf7e168f097b5acc5a377b31bcc73dabcc78329c5aebbd38bcae9dd098761c0480000000238a50008425000c273be538b9a69ad4b47dd5e34b784bc372ccd688b69f2f0c98a7a769f388f37d4e5f2cf53e3be8398e3d4d2384ced6f0fcdc3767bb7bb3a3d3b37d98daee6590a62c91971d6f1fc51baef38f582000079be6f5fe5f5183531e568acfca5e918de6983f98d2de3ce2378fc801bf4b75d2b3e30e8c4727d47b7d2d7c69f6cfe4cb00373499bd8e5ad9ec6968b56263cde1225ea7966a3da62e99ef577da636ef579b7e695d37a738b2a940f40f1a80020000008400277423772be5ad237b4c400aebba96bc477961f3f36c74de29c6581d4f31c97de6d7e981c73cf9d11e9dbdbf7af47a9e658b16f11f74fc1e7359cda7699bde295f9bc7732f5369f4dbd693ed2ff00ab7780d6f36d4eb6d337bcede558e10679fb46244dbdbf7aeb964f6bccbd558f175530ef7b7e9793c36b399ea35b6df25e7e4c74d9499246932c985a6ce73656655991445f757757746ed46919e5332aee85771444cca3746eacc8a2169d9af33ba6f65001db1bab953b2ee796a5d5eff0fd8bb1d901084576128104504b6f494eac9bf834d97d1536a6fe2ce5d31acee76bb6c63eaddc27c5dfc0e3cef4f8756e80f28fbaa89603511b64b33ec2eb636c9f376d9d536bb9f3bee33fd53cdbf1f39d9be71a484a1eb1f04402012952805112bae1f397671c3eebabbcd08f999f75f34bad48815505324f05a23839df8da21d01056fc21a32dbcb3b55a80952a000100402c58bd7b2c881c2ea57d4dbe984f25c74809420d00000000000280884ab55f626958bdd8fcccbbb158041b000000000000042400000042b68de161519ca732ab4e636943a648e2e6ec47c7bab7bb38cef9884a01cc0004000000000000000000000128000000135ef084d7bc0026dde7e6aa6dde7e680000000000000000000000000000000120008482a000280000024148dbd262f699221ea2b5e98d98be5b876af5b2cf2789ba473debce75fa6fb16df18ee67fbbc3dff006adbfa7e170ffb754b5353a78c91bc7bd0db1cf0cbd3972c3d5e27666fed6585f79d3cde96023789dadc25664b53a68cb1bc70b317c6b3d368da5f4e5e6386c67ccf4bf0996370b71bacbc57d7fbb786f46737719d32eef3595b577f84ac3d03e30d9d3eae6b3d37fab2913bc6ec04d7776c3a8b619dadc6af0ef6dfa6f3ed5ebcf1f5e3c3f55f6df17f5f6bd37bb0e95f9df0bbf7c36ecce7cfc9994b9d2f5c91bc4aef9cb6715fb573dbce6e63329a59c8c3ebe7ef865d83d5cef965bdaee6b6bae4f3f8ff00f065f263ee178d9f9c6a021e91f06941285110000e0566b074ac3532e1970cf6665d674775389bae3af3cb93e6e58658eb1f46ce54dd29e98474bb39cc9f2deecf625d3a23ce1bb59de1cb4b4eacb113c5bb9f4b38e7aa9dbc1bae39ee7a739fab1e4c5f53c3f83fade1772ceec32e9f28e22b5b6eb3a8f9aa8eed5c95da7836daf97ba8cdbc7532d1cb74cf18423662e3c3a3d386efaf1b2ebc3c5a36f14ef58746be09f26c28835f3479b836b2c6f0d504a50004000012022809425058263bbab8bb38e7aae6f7f86edacf85d2a4425cc7ac4884802565441a48b25022a8b297ecb2993b13526ae5bbd94deecc9c565130d8f9a2e9552caa8bc3a4392f12c8a3b55f52f475b7d2dfe6f95d5f4ff45cff00432fce18cb45cb475dad536bb9eee1787385e1c55ea165d44a00bab7a572566b68de252200c362fe6f91e6f6da5def8a7dfc5f0f83e83cab9ce9b99e28b52db5bf8ab3de25e63bb119b45974f97f99d1da6978e3358ed6f9c3aede5ece4f36ee3eef459cbeacf31cd727565dbc14e4fea2c5aedb0e6fe9678e1359e1bfc9c35d3bea2df377dced672bce2f2ed7737b73d39b5042b6bd691bda6223c65c47a05c6133f3bd3e39e9c7be5b78578fe0e11cc39867fed69e6bf1b70fc401e8879db66e6f8a3aed4ada238cc46dbb27a2d7e3d5c70e168f7ab3de001bef3378fe479ac5e78533477f8bd3317cd749fcd69e7a7dfaf1aca52836f51a6c5aba74de37f8b0f6e5baad3c4ff2f9666bfa36e2d9e4facfe630f45fdfa70b479f066100783c39b5fca75536c98e7a2d3bcedd9f5be49cca9acc31b4efe0f3d931d32c4c5a2277603966a6dca799ce1b4cf45e77afd7b37b578c99d3872dd9ce3e4ebecfb025c30e48cb8eb68f3777b52758f9cb67153ba5559440000000011b21654010f2fea4d0c6af4d6e1e4f50d4d663f6b86d1f06739ce356e8dedde32893a58f95724d4cc45f4d93dec73b47c9e85e579952797732a6a3b52df6d9e9e97ae4a45a38c4c6ef20f7a458005108b47544c78a4501e67964ff002dafd4609e1133d558f9bd33ccf36a4e9b5583555e1c7a6df2dde8eb68bc44c76900746f6873fb1cb1e13dda0b42ce951329ccaaf795b45a227c5662b96ea3dae2da7bc328f5b3868f9edee4e32a9108dda1cd53ba376be4d4e2c5ef5a18ccdcdf1d7dc8dc632cb8475c70b9335bb5f2ea71e28ded6799cdccf364ed3d2c5ea357158eacb7da3e32d5bc3cf72b5ce4e5ecc7098bd0e7e6fe58e3f361751adbdf8defb47cf83c7eb7d51a4c1bc63fea4c3c5f30e7daad64fbd34af8435967cb3c33b7b7e96b2c9ef75fea1d26922622dd778f28783e63ea0d56b77af57457c2181b5e6dde5cb7491b32c9cdd6d699eee7d4a6eaee288b4ca932accabb8d7022dba15dd046a254ab2108dd5503744caa8dc5412e76b2d32e169dc288846e8dd08a0daa76595af64b9dd56eafa5b3d9176fb6081083625002a89ac6f3b33f86bd148861b4d5eac90cec386f68cef6b1f4bedd8f39e57f51dbedd3f0cafc5208711f4c18ad7d78c4b2ac7ebabf63a6df744c3ba3cbe3273b19b7e2273b39f930e84a1ed1f9a51021466952acf6595b0b35632d2a67db7c9b38fdd85d5af6859dc7cc00428839f7bba3963e3332ea00d7cd3d9aceb9677b39033411c52804104714a6bdca9968de1d729e6d6d4e738b825c47d48200100000000000140158ef2b2bfc4b08c67ae3e667ede7160106c00000000000000010046e0acdbc2508ea884750d4c55c33dfc71d3aab923786b3666665c2d1b4b78e8b270f2f889c67e6c6ee773bcaa8480e420004000000000000000000000000000005abde3e6aa6bde000b779f9a136ef280000000000000000001280000000048021200081200000280000974c75eab4439b27cbb0f5e4de7c919dcbc635bc67364fdbd1e0f0fa9e236f1fde519cc14e8c758f83ba12f9d95e72acbf71e1f0f46d618feb18eb2702509055435f3e9eb963e3e2d91ac72b8d95970dfda9bdb79617de3b301316c73d368fcd2cc65c35cb5da6188cb8ad8278f1af8be9e37d539797633e3f1fdbf0dbbb796d6796196b2beffddbc2faf1fab8ceb8f7792022771eb1f9c114bdf0cef5ede0c9e1d5572f7e13e0c6b9cd3ce387c9e7dedbe7f28f43ec7dafc67d3bf4b3bd2f6dff00f1f1d9f79fcf3be4b7cdb18f57931f0b718695af16b4cfc5e2dad6f93bfd3f4db63f55f72bfeac7e35f1bff36eeed63b79f76375fdc402155940045540040000004a0004800a37b97d77c933e0ccedbb19cbabc2659479f7afe5f2677efe75f67ed73fd17e3964ebf6d9c785c3e3cdfe2c76a34bfc58fbf83437db84f097a06b66d3532c76da7c5e9d9cfd58f1ef1e3c72b8de63e2fdcbc2fd0ddf5e33f1cbf857e937f671dfc2e197bb16d6c9ddb5930e4c3df8c78b5324c4cbe9c630ca67397e1727a3c5787cbc36770cbe57f71401d078c5f14ed7f9b6da313b5a1baa208b46f12d296fb4af1b58129544a1208000009408a02caa505844bab93a439e6b9bd7e16f72786bc657c961097157b91294082894a0dd144e645a12a751d48d7a55c32dfc668e8e790ea952eccd5b9386f7bfc75e5cf76e538734aa907045d2ac251545e178735a19551da1f4ef457f6737ce1f3087d47d191b69f27c65cf2d172d1d76fb8daee7ba895dce178711ea164a1280256516dc0129408034757a0a6a23aab338f2476bd7bb1d8f9964d15bd96b379f28c9e3f367f7798d76fce32ff2f8e23a2b3f75ff00da4138f756f64e75867edc11396f3da23b39d745aad74f56a2f34afe857fdd90d0f2dc1a1a456958dfcede7f56774fa2c99e7844c478a35272336fa63118397e9f0ed14c71feac8460bf9527e8f53a7d062c31db79f196e463a7e8c7d1387a663c2f3c3c796572af1138ed1de182d772eb6fedf4ff00664af1dbcadf07d4ad831dbbd63e8c36ab95ff00163fa3cb63d19e1cbd9abc986e7a6bc568799467fe9e58e8cb1c2627cd96db831bccb95fb59eba7f4f2d3b4c70ecd7d17329eaf61a88e8c91c237e1d4f3a3d831fadc37e5dacaea71ff6ed3f7c47c5e970e5ae6a56f59de26119f0d7518ad4b718b43cdf2ed45f97ea6da4cbeeccef8e67f04507ab79ce7d8263d96a2bdf1db8bd1438eab0c67c17a78c200cff0020d6c66c158dfbc46cf4cf93fa7b556d3dada7b4fdd8adc3e4fa869f3466c7167ab6ef38b9ecdf678f7671979ba6fce92b656512f40f30b08dd200000084090042968de2564028f9e73ed0c6a29971f9f7860f90ea66d8a705fdfc5335fca1ee39ae2db2f578c3e79ae8ff00a6730a6a23863c93116f0e3e6f25d572eeaf763db19c2fe11ead0ad2f17ac5a3b4c6eb32ae8084a0018de69a6fe674b92be711bc7e4d7e47a89cda4ac4cfdd4fb67f2662d1bc6cf31a798e5dccaf8a785336f35f848a8b5ea45773745064f976a3d8e68de784bd25f578691bcda1e23a89b4cf79975dbbd1c9e6ddc6dc9e97a6cfcde958fb2376232f31cf93f8b6f931dbb4355cc74da48fea64ad67c37e2e9967fa7370c36bf6ecc9db2dadde665a99b5587047564bc55e275deaedb7ae0aff00f94bc76af98ea3576df25ed3bf96fc3e83721a396593def32f54e1c3135c1f7dbc7c9e1b57cd755ab99ebc93b7879319365376646d72c9cdd26ca4d95dd5dd1a05b757756655dd1ae045b757757746e8d0ca51ba3757755113ba5408b016995771555444ab32395ac008b5b773dc4208098eeaad5ee28b8f5b1b3008ddcc7d4c349e4b3437100289dd0263b829193d0d3bd99270d3d3a31c3bbcbbb79c99caf3957dff00058f1b18fc7abbec63e9dbc27c200323a886aeaabbe396d39e4aef4985c75891cf7673865e55bca732bce216bc6d69851ef49a3f295ace7195f310943439ad113de12471bc2cd571d5cb77b32f24deecadaf201d95f3815b4ed12b39649e1008271c6d55e511d9179dab200d3bf1b2a00c08f33742645042d5557af6632d0cf477d89fec8d7869f9ac0388fa002500000a0000000000a5bbaea5bbae3a98eae3bfd8bbdd951c4de523a7a62bc937b38e46f2754833e969e8ff00c8cbf4f39d52754f8031e96de9ff00c8bfa798ea94754a467d31a7a7ff0022fe9e646f27148cfa634ed77f3ae28d8d9203572cafbb08d84aa0a839de1d6559eca894ad7090180425008a94002000000000000000000000000026bde109af78004dbbcaa9b779400000000000000000000000090040000240004240540005000012f49cbb1f4e2dfc5e723bc3d669636c35f938efde3067c476bebfd9f1f578b9ff00596bb7d8ff00cf9fff002d904bc23f590004550000052d48bc6d2b84a33963329c5d2b4c566d24d3eea7d1a916f1e12cfb573696997b709f17bf6b3f5cf8bc586570bcbf23e3fc2ffe36e74eccb4f83f4be23631f11b770cbe5f0ac6216be2c987bc6f1e2a44c4be9338e5339cc7e29df7f633f0f9dc32f95fda2dd9a930dbb766a3708f2e499237985ba9089862e2e8f46deffb579171cf8c27aa5c5d2e3cbeabe7e1bb962b8af527aa1cdab8be83863bf8dd7a2446f0965787766652fb8940cab4241120a97b6f9339a0aed8b7f16eb5f4b1b62ab61e3ddefa99f75f37e8fc0ce3c36d793a7849c6c6dfff003120303d02b688b47160b598ab4bfdbc19e6175dfdc76d8cacc99daee7cbfba6ce3b9b16dd6695dbee1fe0be718e4acaf4be8c729787e2f2c6e378af7ee6dcce7c512dca4ef58694eedac33f6bba4bcbe6b79e370bd5d9ad9a38b61cb2c70dd473ab5aa0032094000900004a12802530aa61295bc6f0916e29e284b3c4576fa997edcce2906788d3a7d4cbf6e6901381ab95a894a1295412a5d752ec80e495528322cb28b420a8b2f0a42d0828eb57d57d1b789d25e36e313c5f2a87d5bd1d5db4969f19632d0cf476daee36bb9ed21d1ce1d1c47a84acaa40129425004ee956133da514189e69a9bd623062fee64e1f28f16ef2ed0c69b1d6958ded3de7c6588e5d1edf5fa9c96e3d16e9afc2367d0b9668e263da5a3e48de339a39ee5e31ae9a3e595888b64fa3354a5691b446cb4425d70c786de7dccfd55cc480082365900a8c7eab454cf13c369788e6dca2326fbc74de3ddb43e8ed4d4e9a99ebb4f7f2970dcc7dddace63d3b59fb384bc57cbf97eb6f5bce9b51c2f5e113fa50edcd3411aac5d55e1929c6b2dbe75c9ed3f757edc94e35b479b47977318cb33832fdb969c277f3789ab38af7a63799cabca35f39e9ecb2f0cb8f84c78ecce3ccf35d3df4996bacc11eecfdf11e70cce8b594d6618bd7f38f0645187d6d2743afa6a63ddbf0bbdd72bd6444c46ff6dbb3cf6bb4d1aad3da9e7b6f1f368f24d5da69386f3f7e29dbf26b1bc5658ce738d6df5789dd2c472ed67b4af45a78c32ef73185e717ce74dcc78c96dd2a8d8e62c00008dcd9200aa12805186e6d4df1c5bc1e2b9968ebadd3da93dfcbe6f7dcc6bd5a7b3c8cbcfb9dcbb9abd7b3dacece95e73926a67a2fa7c93f7e29dbe70f40f2bcdb0db43aac7acc71b46fb64dbe2f47a7cd5d462adeb3bc5a37731dd1d800510f3fcf3476cd8e3363f7f14c5a3f27a052d1bc4c4f98146872ed546ab4f5b79c709f9b7f7791f6d3c9b5d68bf0c1978c4f944f9baeb3d51a4c11fd39f693f055e0679e1e9a6d11df8311ade77a3d1d677bc5ad1fc30f9febbd49acd56f15b7b3acf83cedf25af3bda667e68dc8b6f0e372e5eb75feaad466998c3f6478bcbe6d565cf6def69b4fc5ad32aee48d2e5972e6bf52bbabbab328aa8b6e8dd5dd5dc684ab4ca375508d1ca2dba1546e8a2251ba3740a06e810a08915162c1128dd1bb9dae2885ace3324ca1010408004ba63eee4eb8c3d9bc3ba799b7df8f9bbca10398fa889400340efa7a75e48f9b8327a1a77b25d2b3b9db5d36e7ab3c67eec76f098fab7f1fe6c9c7084a07907e864e1624400a0a2c85128c06a2bd3965aeded6d76c8d17b70eb226df6c7e67c44e3773f3ae9e3271bf9f9a006c792a2375b1fbea3a61ef2de1aae1ab86ff00633e22fe3f36c021d47884b85f8de1d9cabc6f32083ab9669daaead6cd3c40a95ae6e4a146400001d61ce3bba39e699bd9e175ad7859d280303d600000000000000000a59752cb8ea4d5cf77b2aee765f205774eeea3e6af15223737041283783700488dcdc3917d37f49811c4e227aa44749b595f6486d274ab172727aa787bee846ebf49b436e56d795f431d9c7150e999741d2de1c9e3c76b2c9f45ab78da5477c90e0ec9347c8ca716c74df9c6e5409428e20002025000025000000000000000000026bde109af78002dde7e685adde5500000000000000012008000000004a000048000000000a00002d12f53a2bf5618f83cab27a0d4fb2b74cf6979fc44fc3e6ebb98fab1b1f6bec9971e26cfde35e0f07bdf437f0cfe3fc1e8c5627759f30d1fbd898de673fb4802360028000800848a88aadab131b4f16865d144f1a4ed2c80ebb79dc2b9bc3e33c263e270e3fba695ed79fcb4c98f85a3f36a33dad9db1b05357d4c32994e63cdb1788fc1f88d9cf673f4e53abedfdd709b9b927eb1408e306ef5a4bcbf38e99e170a25028e606c90011b2365900bca23f34ef29138955d31dccb1f7733a93bee83663d2dbd7f5f9c6caf2bd360fedd7e4eac5e8f51b7f4edf9328f979f75f374dec7d3979bf7be1ffc3b7ffccff878bed7bff5bc3c975c3a5480e23e98860f5b3fd567582d67f765d76bb8daee787ee1fe0be713ee1fe1f9c6a21287a87c005b14ed6d952bc2cde1aa63abcbe267e32b7bf39c2b715b46f091d87cf1a285f2576b280c8000090000201004a610402c26ab884b2362d02373701785846e9dd0e60d7a72fd252af14ed2566e4cbae3b3954a975fa55bc6c33eae6b93d39eccc30b7ddc5284a8f2094aab200b42f0a42d00a3ad5f5ef49576d044f8ccfe2f90d7bc3ec9e968db9763fcdcf3d0cf476daee5d9ee7a787473874711e91294240120200b13da7e48580187f4fe2f69aed563f1cbfe8faa62c718eb158f27cd79347f29cf6627ddcf1131f3ecfa743aedaede8f36f5f64deee592884ba0e0a240100000409001a7a9d357514da638f94be6dcf393de97f6d8bedc94e3bc7f143ea8d2d5e92ba8a4c6dc5c3771f776b398f46ce5ece38de2f2f9b72fd6d398e1b63c9efc474deb2c3d3af92eb369dfd8e59fa4b7b9b72fcdcaf53fcce1acf7fbeb1e71e6db98c3cdf49f198fce25e26ace2bde92f3195a5a2f58b4718979dd7d3f90d553574e15b4c45f657956ae74d92da3cd3b4d7dc99f3867753a7aea70db1dbb4c3228dcd3e7f772527e2f5ba3d546a29f18eef96f29d4ce0c97d1e59fbabeeefe70f57833db05e2d0edb57ab94bc38ef63d39fd3ad9cc7b54b574da8a67a44c4f16cbda98de63c0b94e2f0b6e95774f151904a381c001084a001c33d7ab15a3e0f1778dad31f17b998e0f1baca7466bc7c5c777d9adcd1e9d8f7676356335582ba9c56c76f38798e5b9f272ed4db479a67a667fa733db69f27ae6139ce87f99c5d74fee63e359f9380f50cc8c2727e61fcd62f677e1929c2d13dd9a001559550187e71a18d769ad5fe28e357c833e3b61c96a5bbd6767dd65f3af5572ce8bff00314af09f7b66b148e7b8d67d63c3cca8b4b9cba0e086eacc92aaa894dc42052a250200040814410028210940a8210b3a574f97244cd696988ef3b4ec01ab81ba267671b5b76911136b3925504128100208050075a38bbd7b1aac6b1bc59523a44ee97393ab673b1d2ce5f530cbd73978b6f73d17e0e880721f4224bca638b3fa7a7463861b4f4ebc90cfc7671debd19deba3e9fdbb1e772dfd477fb6e3f8e57f778480e03ea0000a210b2aa22b1bafaf0896299cd5d77c53f060debdaed67674afcff8f9c6fdf8c8ebf729fecc6fc1008771f32ad43ae1ece52ef8e36ac3782e0f1789fed67c4eb1d00741e51169da25cf176f9a724fdab563688004b532cef66dcf668da779916252aa800640005135eee8a55771cf532d5f43c34fc3e6d6c4e36e00323b0008000280000000002b6ecb227b2c4673edbe4b969484a23b2552eb59c6749e4b876c11b245e50f4cfd348d848bca33e99fa6842404e1400114001150900451094022ab78e0d496eb52fddd31d1317cff00153f297e0e9e2a749554250d8f08000800000000000000000000000009af78426bde00136ef2aad6ef2a800000000000000000244000094000000025000240150001400001689d9501a88cfe8757d5f65997dde32b69acef0cd6935ddab77cfdec3d3979bd7bb87af1f8c7ed3ed7e23ebf8792f763d2bf3bf6ef17ff008dbd39edcba56692a44c4f659f396bf6cce36592cf74884b2ad800200028021280418dd7db844312ded6db7c9b78345ebdaed5dbed8f81f70bfeebe51cbc65f56fe7e6846cb21d11e3b25d555e946d30b8e93261e4cf63fa5eb73de4ddd11b3b38f3c3e6658dc757d2b8cbaaa93a611d32ecc7a9f2deccf625d122bc60ddb39e5e36b2c6e3aac9a46f642f8b8d81211b331bb734ba9989e8bcfca5a88b57a9c7771f563e4e8fa7f6ff0011ff008fbf8f5fc72e95e267a2774b0f83556c5f6df8c78b2d4b56f1bc3e5bd1bf87a6f3ed5fbc9798f91f6bf17f570fa795fcb1fe3166135bfdc66d85d6ff00718daee36bb9eafb87f83e713c7ff82f9c6921287a87c0a08948b35473ce738d6ab66b3bd61671c33c36767a123e52e5d2df370cd1e6d76ede3786928c55a024100000004504a63ba0f366e8b5bc3ba79a63ac75d93b40979cafa9e8c7f4d446c9127227a67e9a0128270a240404b96475872c8b3526ae3bff00e3abbdd95c5284b63e702c8001785955e1051d69de1f6cf4f63f67cbb17c61f15c5ef57e6fba729af4e8b0c7ee439e7a19e8efb3a9b3ad65217521787247a459284802404012ba8b400313cca6da7be1d553be2b44cfcb77d37479eba9c14cb5e316ac4fea783d4618cd86f49f3865fd23abf69a4b60b7bd827a5d36d36f579f7a68def76bd82509771e4120020261000026000550bcaa00c5f30d157538a786f3b7d5f2fcf8f2726d67546fec6f3b5a3f465f63798e77cb6b9f1dbedde2d1c7fdde7dd9d7975dc9ce2f56cde9c7e9cb6ef19478be61a08d75699f05b6c91c627c5cf16bf5d86b14cba79b5a386f13b44fea973d06a2fa0d44e8f36fd3fe5ccfe0f4af20f60f0babc1cc2faa8d5c62e88af19e3e5f47b2d16a6ba9c35bc786d3f377b562d1313e6f39a599e5dafb619fede5fbabe1b803d869f516c1789897abd3e7ae7a44c3c5c4b734baab69edbc4f0f3877dabece58de2bcfbd8fbbbe5399c3d825c30e5ae6a45a1ddec4979eaf9ed59c5012a322000055e679b63e9cbd5e2f4ec3737a6f8e2de0c6e76ae7db5d76afe4cedf4ca3ccab31bac87987b878fe69a7bf2fd4d75787dd99fbe23c1e974da8aea715725677de1d33e1ae7c76c76e3168d9e5349972727d5ce9f27f6af3f64f94020f5c84efbed3e28051596a6af4d4d562b63bc6f130dc955407c479968afa2d45f1cc70df87c98d97d4fd4fcb3f99d3fb5a57eea77f93e5d68db84bac4c1e6bd2b7b91ca55745766c72a8a217d91b280aa1d2296b768996c5345a9c9eee2bcfff008cff00b288bc72d346cf43a7f4e730cffe5f4fcf87e2cd61f46659fee648819f5a3acdbb5e1365eb86f7f76b33f93ea5a7f4968b171bef79fcd9cc3cb3498223a30d23ff00c6376dc6e56b93d58e1317c7f0f28d6e6f7715bf36774be90d564e396d14f86cfa8452b1da221674b948e2e18eddaf53c7e97d27a2c3c72755e7f53639b69f4fa1e5d9a31d2b5fb767a598793f5764e8e5db78da1bf55a93573f4cc62e5db5f22bcef32e4bca92f40f0885528144040006ea8000d9af66bc3bc766a0b0890056846c98b2380c658f2dbbeceefa7a5d1c196d0d3bd993607164be1edc63c193c5aba64e13c25f3b77b9df7b6f9fca3f69e0271b12fefabe4fdb7c77d3e36b3bd3fb6b7130aee3c83f4891642041a44ca0428a39e58de968f83cf5b84cbd24f679fcf5e9bcc3d1b3eececeb5f23ee73b2f9ba7dca73b78dfd57155655ea1f129512daac6d10d5f386dbae1a1868f0789eef933e23bd2036380e3938cc43ab8f7c9f2760056f3b4349b7927ed69ca8cd2a0004000149aba57b2510970baa3ea6df4c31f26f1e9200028000000000000000022528029515ecb2b5596ea5d58c3b61b7db00106c000000000000000010900102500035f24361cef1c1ac7531d5e6f1339c1bde9ce15ac03a0f962000400000000000000000000000004d7bc2135ef0005bbcfcd0b5bbcaa0000000000000025090040900109000109001094240000000014000000004a62765520b064f4baeb62da2dc619cc79f1e58e130f20e94c96a4f0978f7b6f8bcc7aef57ea3ed5e3e658fd2cef59a5fdbf358e571bccf67b14b0da6e63fc37fab2d5bd6f1bc4eef94efbdb7e9bcfb3fa23e57db7c74f1184c72bf9cfe3f17410380faeca5000d2255b4ed1ba58fd66a3a6bd31dc6f09ce50af3f89dc9b7b595f870c666b7564997207ae6915f9edebeadccafeed73b79400080028800000008022622522f3c23396332d5a57a5d30fbd2875c382d7acdebe5e4eb2f2c7abd339787736bd163d796cddfcf1c26bd6ff00276148b6fc3cd76c78e2f165e2eb1131b95bdf0cfdb3c3c12259329c2b7b7bb96ce733c7a58c32383574c9c2784b475dfdc719a6fdb838e49befc67778e61e8dc7b2ce5fa4dcf138f89f07729af4e67c5f9cc7732dbd2f4bac545627759c96ce1ee73c3726700106c5b1ced66cb4e784eedb89de1df1d130d1f3372719df36f7e719df8a65a56e12dd6ae58dacd0e14ae40022090050024012020b3523b4255af659e72beb4d22617f19e4250941b04a1202c1225040d9cb23b38e459a93571dff00f1d37ffc75c520d8f9e253084880b2f0aad00a3674f1be4ac7c61f79d057a74b863f72bf83e17a2af567c71fbd0fbc6963a70638f0a57f072cfd8cddf67ddad9f76d42eac2ce68ee252848025281005a12aac00962f4fa9b729e6f8ed1c316a27a6fe1133e6ca34f5da5aea70cc7f1471acf84c13a546739ce35a7d2ab68b56263b4c6ee8f27e96e676d66967164fee619e89f1988f37ab7ad9c2f31f3dace71954a509686013b0002400046c8580051cf2638c959acf9baa0151f3be7fc9a726f35e16af1a5bfd187e57afb5a674f9fedcb4e1c7cdf52d569eb9f1cc4f7f27cd79cf29b4da7262fb3353b4c79ecf1e53d35d7767bbdf85e6471d9cbd99562f9a69bdb61ebafbf4e312c4e0f51570c7b3d4d6d5bd784fc539bd4fa4e99888b4b8a3d09cb31cb359fcde0899f7a385be6ca43c0fa7f5dd5aec948e15c933311e0f790b08a323a3d5db4f6fdd97a8c59a99abbd65e21bfa3d54e0c91e13dddf6efb38e378af36f63eeef94e63d70a52d17ac4c79aef611e05a000821a7ada7b4c16f9371cf2d7aa968f84a5d15a9ac4786b46d2a3be58e9bda3e2e32f215f412691562b9a686bacc131fc71c6b3f165500a3cff26d6daf59d3e5e193170e3e70cf3caf35a5b45adc5aaaf0adb85f6f9f9bd3d2f5c958b5677890482caac851472bd22f1313c625f29f5172a9d16a26f58fb2f3bfca5f5a6179e692353a2c91b6f311bc358eacb19ce6355f2cd3727d66aa22d4c73b5bb4f933983d21a9bff72d15fd6f57e9ccf5be8e317f163deb30f45b3afa98ae330e5d71d1e230fa3b0576ebc936fc994c7e9ae5f8ff008377a2d93b2faab2ccdb91d18cc7cab478bddc34fa36aba7c54f76958fc9b1b1b289c2a9b6c2fb1b0029b0b000aa164480292f01eb6cd11871e3f19ddefe5f26f596a26fac8c7e5486b1d570d58cfb6b3bbdaf152a4af2e72ee3c621095544040000806805abddb1b3853bb659b784c9df670f5cc9d7c36954dd3ba663753b3a39e35e7b38af56fedf33d513b2d48de5476c51e6e83c8b357744d625220ea2d4cf9717ef43218b574c9f0963559aeef36eed7bc7a5f6fedff70e38dbdcbe55f119edf7184a6a32e1fde86470eaa9963bed3e0f96f5eeed7f747eee5e5f9ffb77dc3acdadcbe55b42374bc8afd0a4bc8c26b2bb64dfc59a63b5f1c225d36bb936fba3c5e3e73b17e163af8a9cec67e4c4ca13287b07e6a94ac6f66db5717bcd976c7459a3e6ef75ceb3b9dd7cc2452f3b565460531f19997673c71c1d001cb2cfdad36c6696ba8cd28002011dc5aa9744cb46f09ce53cdbd89ce71701c47d300000000000000000040096f0952d3bf0844cee446cb8c7493873ddcbd38f9bc7bb9faf2f826aba95eebb9e5aae7abd9b3d919d8ec0064770000000000000000000040422662059d559cacc67352adbb226de0aedbf723a49c339f6df278f7776e7e4e1285ed0a28f2d102500809400002401000000000000000009af78426bde00136ef2aad6ef2a800250002400100002442401094240109000424001090000000000140000000000004a005459b587559314f096a0ce526538ad3d1b3bb9ece732c6f58e0f49839853270b7096422d16e312f1912dbc3abc98bcdf3b736ee17e0f7e58cca715fb8f05e370f1587fda6b1f8ed8dfcf633996378b1ea86271f32acc7dd1c5cb2eb6d7f7783e5bd5f438bf07efdf0a7dd66e6d74e997bb7b51aaae389889de586b5a6d3bca2677426d63c4e5d9d3c7effaefa25d357ccb79bc820144000012811550001501220282122822598e5f5db1fcd8797a0d2d76c35f931b97f0acef767cde8f0539f1787c2655d7edd39f157e187ffae3a8d275fdd4e1663b79acf4da3697a070cb8299a38c71f16b673e671fa7931cbd37970fba785fa59fd5c67e396bf0afd16eed63bd85c32d2b122d970df04f8d548b44be933867eb9cbf10f4789f0f9786ddb85d3dafc12e195ddc72b63c992e5a35e611b4c2c8518995c6f4651d530b75420d98b8b6f5e1e23f6f22d2d8c53f6b53a5db0cf9338b4efbf65b2c79db2e19a1ddcf246f5512ab50120c88480000900004161eee95ecbb9d1d1c32d572d5f536bb316767b20912c0ec0000241640071c8ece39171d49ab8eff00f8d37fb1c9284b63c00b4222164144c2f0aaf080acaf29af56b70fed43ee98e36ad7e50f89722a756bf0fce1f6fac70872cccde8d9d2aece8e90b2216731d8128480253084a0094a1220252848030f873cf25e675cf1fdacf3117f089f17d531e48c94adabc62637897ce75ba6aeab05a93e1c3e6cafa4f9a5b363b68f37f7307db1bf9c3b6d5636ef193cbbd38aebbb39c5ed56552f40f1894a1200944240000ec00a8994002185e67a5ebafb4ac718eecd2b68de366339ce2db785f4e5197c9b9af22c5aefbabf65fc7c5e4737a6f5b8fb4757c9f5dd7e9bd864e1da58f785bca716bdf672cedde718f9c72dd16bb97678c9fcb5aff93dee9b2df3638b5a9349f096c6c961a6e094a1291019de5babff002ed3f2679e1e969a5a263c9eb7479e33e389f3f37ab6ef31cf6af578f7671979baef4e9cb70425e81e50425000f23cc317b3cf3f163e5e879be2f76ec03cb96b5773b9eec3b633b57f15155f622b33db8b23a8c7ebf4b5d5e9ed8e7ce387cd82e4babb60b4e8b3ced6a6f15dfce21ebfd8e4fd1979ae75caaf92635187edcb8f8f86fb288732b3a862b957308d5e3e9bf0cb4e16af9b2d20a91556d1168989f35900a3c4e4a4f29e6b5b470c59e78f844bd9c4ef1bf8b0bcff0049fcc692d6afbd4fba17e49aafe67474999fbab1b5be6d1ecccf73fb9980106840940a02120021559500154a05073b3e2bea6c9ed398e57da6f3c25f0ae757f69aecd3fbd2dedea6deae3bdda9bfdac3ca8b4ab2ee3ca8851654004250d10040003ae36c38e387663333d5edf0bdb5af0fd9f300647a38e5629d2ed5de91f744c6e9c75ebbc4339eca96ac5661b993cbbb78e1e4cf66ce7292f135f83eff0080da99e39faa74bd18789dd2dbc9a1db8d276f83467aa93b5a1ec70daddf574babf36fa9e3fc05f0ff009e1d71bfc1741bc48ee3e6029348f92e022ad8f3e5c3e7d50dec5adc77eff6cb1ea4d225e7ddd9f78f4bed780fb8fa38dbddbd3dabe233b1689ecd6d657ab1fc98b89c98fddb3aff003793a662d1bbe6e3d328f6e5b732f37ed7778dcdacb8f7c6bf2de1fc76ef87e9dd8fe9a48475413235e9b1bae5f571cb9ae987ce5ddcb147daeaeb3457cfcb5be69471cb3da1d9af6e378042bb578424448a0d5cb3bd9c936e32806150250080e95ece6ecc67a266f4f869f9b7e167700398f6800000000000008dd59b0d49c8e3b9b9309f15a67673f78d965c636c6fee713d31e3b6dbc808004c775dcfcdd1cf2d5737b7c3dfc6f9b3e1b4be600c0f520002a7206e8de05e158b9e33dd28566c75237e96de6cbc449a2e8537946cc3ac923d0f9f96ee593a6eaf52361898dae8f5e7bb8e2f01bcca3658493869bcf732cdcd08591c001caf0e4d8bc706b8314a81220c880000000000000000000000004d7bc2135ef0009b7795536ef3f3400240001090004240004240109100024000000000000000000000150001400000000000048801516dd68bcc3980dccac65b119178bc4b54dd8b8b6f6edf88f6c9e26e8d48bcc3ac647175b397d89797cddbdeb8793b0ac5a256725b387d373c37267a0020e800080250951500488a1b6f30f478a3a6958f830da5c5193271f26761cb7bb639ef5eb27e9f47ed93fddb97f58c7abedbb7c61967fd578fe4901c47d3113113dd8fcda28b71a70964474dbcfd15cde2f19e131f13b767f74d2bdaf3f6ae4c5efc7e6e592d130f456a45b84c6ec6eab478eb49b470d9f4f1b32eb1e1dbcee35f84dedacf672b8e738b1facf1be176fc46ddb67592d95890989846efa292f2fc5ba67b570488dd2a3902d49daca808add45b8c159de12a20d1916bc6d654190000004a00250905826b3b3a6ee70bece594eadbdbb1b98cc78af245b74a9b27671e1d5f4fd78fedf396dd3babb27672e1d5f42ee633ddf3d3ba7a90972f4b6f665bf268f2238ca9787452e9c70ad679e596acb9244ecc8c2a528d96810130e910a43a409547a1f4dd7ab98e37da2af917a4f1f5730afc2b2faf43967a99eaf4ece9576bb5785955d81d412853265c78a37bdab5f9cec803a2580cdcff0567a7156d96dfbb133fafb35675fcdf3f1c5a7e98fdedbfdc04e7f4f5497919cfcfabc671d7eb09af3cd5e9e76d4e9efb78c46f1fa91559eaf5c96334bcd34baa8fb6f113e13c27f5b2513bf641a1660f3dedcaf98e1d653856d3d393fdd9c6aeb34f5d560be39f38e1f34d04ca732abe87a7cd5cf8a992b3bc5a2261dde1fd21cc2d6c57d1e59fbf04ed1bf9c3dbbd719dbbce2f9fa37b938caac9425b1cc4849d800425000a5add3599f0e2c0e5e6b6ea9e988d99ad47f6aff00b32f1b6eec6797a58ddf675dbc3d6dec7bb3f839a56f3b5e36f8b2d5b45a378e2f10c8e935d6c13b5b8d5bc72f53cf8e5c5633c3d0f5658faa33ba9d3d73d2627bf93ca66c36c379acbd8e3c95cb5eaaceed7d56929a8afc7c5d7767bba77471d9cbd9c6738e4f2286ce7d3df05a62d1f9b5de36acf4d7b99c6f339424191a065396ea3d964e999e12c5af59da776f1bc58cc6739ce35a7b884b4f459bdb6289f38eedc7b59c6f323e7359ce32a00d0c8d1d762f6b867e1c5e4a6367b9b46f130f1faac538f35a3e2e1b93ab5bba3d5b37a56366f5ad6a526f3b471dde9747a1a62ac4da37b39f2ed1744464b471f26618db9cd75c2711d3772e2386e65ce4e7ecebe11f4696ab438f3d6786d2c8a16ce5a49959597c639e72dd4729d646af147dbfc710cde8b554d661ae4a4f7eff0007bae65a0a6b70da968ef0f91f464e43cc670db7f6392dc3c23779af474dc8f6e379f9b8ed65fc1eb2554c4f546f1da50e43d239e4a464acd67ce1e4794cce8798e6d2dbddb6f34fabd93c6f3bace975fa6d4c76eae99fcd6119becb968f608571dbae95b78c42e0a200004212280855654010aacaca80d6d45ba315ede113f83e0bcc2fd7a9cb3e3697dcb99dfa3479e7f72df83e0d9edd592d3f174dbf75dbf770dfd233bfecd79516955d91e610aa650b0808014644000d246ce3ece8a53b2ec65aa5d5f4b627fae35b3d90010758b1bfa1a6f69b7832cd6d253a71fcdb4f2eedfc98cfbabeef80c78d9e7f75e8f0d8fa76709f04297c75bf0988974125e11d32c2672e394e656d8bcba19ef8e7f269cf5d385a259f56d4ada36987bb6b77d5d2eaf14e8fcaf8ef0396c65eac27385fe0fd4658cca597dd8389894b772686b3c693b4b4af8b2e2ef1bfc9f4de7dadee7a57e15f63c77db6edf39ed4e67bc10ac5e3e4b3d28f8c7f010942851a978da5ce61b1961c3ce1a1c6996adba47db0ba212a3221c29c6d32e979daaae28da37f1007552f3f6aee396780a8354100c8000098eeeae513b2fd50e59ae539af7785edac6ceee3863c55857aa11d4e6dfa5ee79af88c5714ea46f2c3a7a5e978af88b74741cb8c9b39baf1c3d96f0f9b967965ad5fa91d5328d92ccc5b7a7737f8e91e446c9002de7540050004080894ef2acac59c8de39dc7466cb3e67138a44f4c574fab9fedc91c51b252703773cafbb08d8d9202a2120280020000a80021404aa6e6d3225bc0de185cef1112e12dae986b5fbab12f2e55e9dfdb98638aa848d0f208001000000000000000000000135ef084d7bc002d359de784f7474cf84fd1b36ef3f39400cb5fa67c27e874cf84b6006996bf4cf849d33e12d801a65afb4f849d33e12ee906996bf4cf849b4f84b6006996bf4cf849b4f84b6006996bf4cf849d33e12d801a46bf4cf849d33e12d801596bf4cf849b4f84b6006996bf4cf849b4f84bba41a65afb4f849b4f84b600691afb4f849b4f84b600565afd33e126d3e12d801a65afb4f849b4f84b6006996bf4cf849d33e12d801a65afd33e126d3e12d801b65afd36f093a67c27e8da01a65abd33e1274cf84b6806996b74cf849d36f09fa3640691add33e1274cf84b62520bcb2d78ea8f29fa3a45ade12e89075c73b8de8e444fc257da7c2510ed0e771e1bc9f576b7b1ce7c5e2d8d5cba67c13b4f84bb25c95f4f961c369f09369f09764a0e9cb9b874cf84a7a67c25de4815d65736f6831f09b327b35745ee379e2ddeb955dceeafd3781e26c63d67edcbc27f830f273dbe06d2ea38f15b7d1e67ee7f379dcf6946d2ea32d3d1ccfdc7072da5abaa89f6566f4b5f53fd9b18eb1a9ac5ddb3d19759db5c777b32f2af39d33e12af4cf84b647ad5f9cbc3197bb57a3e08f673e12da94b532e1973cf671cbe0db53a2de0acc5bc25bb2a4ba4cb963178b3dab8bbee6862de6bd9d769f0930f6977761e361a19a93df6971da7c27e8c865ecd605acb86d3e126d3e12ee02b2e3d33e074cf84bb2c836cb5f69f094ed3e12ee036c38c44efda57e99f097487464758cc71e99f09369f0977115b65c769f094f4cf84bb250ada38ed3e129e99f09755991a65c7a67e2a5e27c25b4e7745566b562b3e1274cf84bb8c8ac472da7c13d33e0eab20da39c567c178acf84ba42f0834cbd7fa3f1cff3736f0abea51f93e6be90fefdbe4fa3c38e5aae7abd9b5dac6df6bb44ace70961a77e639b475bcc69a6fb6bf7e49ed5863b1f2bcdaf9f69acbcc786389da21a7aeff9fa7cff00d5eb31f686745ae9cf2e6ae9f9761c11fd3c70dcf6568fe16c60eced6ec9d5b8dfaa7ee385d58fdb673be3c778dad1595efddcdcd5e8e5cd83d5f20d3e59eac569c56f84f063ababd7727b74e68f6b8bf49eb9e67d43fd9965a6fa462bd0e935987578e2f4b6edbde1e5fd3dfd87a3861a74e639b0da9c97e55afc3acc5eecda2327ca5f55d3e7a67c54c9598dad112f94f3cff978f9d7f17d0f957fc8e1fd8874daf786d6b5cf7b8d59deed8cdf5478c27aa3c63ead54bb0e2c36b7af8c7d53d55f18fab5015be639b6faabe31f557aabe31fa9ac22ba30ed7e99acc6f1c61e3b3c45725a3e2f552f27abfef5be6e3bbecbbba3d5b17ad63635ae7bc78a378721e669ece5864b49acb69eddfed7a6c59f1e6aef5b43c3bd172ef71d76efb261ab96f4f7377b7e6cb65c78f346d6da581d572f9c7c69b4c7cd9b71d47b92d67873a3ad676f73d378f6709ac79798dbba378f14e5f79c5e3e1aafa3cc728e9bc2778f1721969db98e4cff0029cb1169aeef41d51e30f27caffbaf46edb7dabb5dae1bbc7a98deee6cef5f1837af8c3586d59e8e6d9de3c61ad934f8725a2d6db78f8833672d3accb8736c44d63ce3f51bc78c35a4456f961b3d51e308de3c61ae8456f961b1bc78c3c37acb95d757a3b64c7b75d38f0efc1ec2587e75ff002397f6658ce731aba576c32e3273c7ba3c2722d67f31a588b7bd8fed966a76795f4dfbb9ff0069e9e5e557d195ca68b6f0c1f3dd346a347798f7a9f747e4cc34b987fcae5fd8922c75bc70e6d6e49a88cfa3a71e35fb67f265f779af4dff00cadbf6e5e845adcb3873c748e9bc2375109c34ebcc7374dd1ba88655d398e6e9bc2aaa11a74e639ad2a4c8a4a2ba72c30dcfafd3cbf37c6b30f875e2666784bed9ea1ffd3f2fc9f1ab7774db5db71dfba39eff00b352627c255da7c25b32aba351cd9ad69acf84a3a67c25b12905e596af4cf849d33e12d94402b2d6da7c253113e12ee98eea37cb0b56b3b7695ba67c25dabd92e5755babebed5fc27931b7d93c9c369f0975c38e6f788d966ce97fbb0c5d0cb4af561f96527c633b3fe4c7ce3295aed1109da5d47895faac78924e6748e4e7b49b4baa196de8e67ee3cee5b49b4ba8c36f4733f71e772da51b6fe4ec865a77b71fdc706964d2e3c9fc2d1be83257dc966c976dbdeb8eba393e7f8cfb761bdf96dd98e5fc2bdef376a65c7ef525116dfc594d4b151ddf431b32d1cf6747e3b776f3d9cbd39ce1eafb9ff91192bbc38569336ecdcb7bae74f79da11f3736335b69f0369764b41cb0d2cb13db6975ad6623b272778778eca2f2cb86d3e0d5cdbefda5bf0d6cbef035cb2d3e99f0946d3e12d95415970da7c24da7c25dc0691c62b3e12b74cf84bb42c8368d7e99f094f4cf84bb88ad7461afd33e1274fc25b0806f961c369f09369f09774a0df2c35f69f09369f0977146f97370e99f09fa1b4f84b6007461afb4f849b4f84b6100db0d7989f094c639f0977f35d9b786737a76b0f5df837e1f46b5ab3b769562b3e12da95617130d13c471329e4cf88ee8e1d33e1274cf84b610d8e2c3874cf849d33e12ee906d86bed3e1274cf84fd1dd20db0d7e99f09369f096c201b61c3a67c24da7c25dc06d970da7c251c7c25dd5069971dad3e529e8b79eed9aa58b59babd1b7b572d7477daed6bc536f24ed3e12ee94a3ae331c67446bed3e12d7c949f096fb9645c755c7572f13c5c3e6cf88ff1df3686d3e1274cf84b606c7811afd33e1274cf84b600565afd36f09369f09fa36006996bf4cf849d33e12d801a46bf4cf849d33e12d801596b6d3e129e99f097701a65afd33e1274cf84b6406996b74cf84ad5acef1c27bbba6bde3e60d32fffd9);
INSERT INTO `usuario` (`Id_Usuario`, `Id_Doctor`, `Nombre`, `Password`, `Direccion`, `Ubicacion_GPS`, `Activo`, `Fecha_Activacion`, `Monto_Pago`, `Fecha_Habilitado`, `Fecha_Registro`, `Dia_Pago`, `Codigo_Web_Registro`, `Visualizo_Indicaciones`, `Tiempo_Atencion_Promedio`, `Precio_Predeterminado`, `Hora_Inicio_Atencion`, `Hora_Fin_Atencion`, `estado_perfil`, `imagen`) VALUES
(3, 9, 'jhonxdas123', '4eM9Jqb3yBVXD7D', 'Centro de tacna', NULL, 1, '2020-07-05 00:00:00.000', '150.60', '2020-07-05', '2020-07-05 19:12:17.000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(4, 10, 'ericksolitario', 'B4NHL32da7v8zSa', 'Fuera de la catedral', NULL, 1, '2020-07-05 00:00:00.000', '50.00', '2020-07-05', '2020-07-05 19:18:14.000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(5, 11, 'ruthlapanda', 'g78WWQhKrihsPjJ', 'en la plaza zela', NULL, 1, '2020-07-05 00:00:00.000', '150.00', '2020-07-05', '2020-07-05 19:32:23.000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_sistema`
--

CREATE TABLE `usuario_sistema` (
  `Id_Usuario_Sistema` int(11) NOT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Activo` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_departamento`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_departamento` (
`idPais` int(11)
,`idDepartamento` int(11)
,`nombre_departamento` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_distrito`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_distrito` (
`idProvincia` int(11)
,`idDistrito` int(11)
,`nombre_distrito` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_lista_doctor`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_lista_doctor` (
`id` bigint(20)
,`nombre` varchar(182)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_provincia`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_provincia` (
`idDepartamento` int(11)
,`idProvincia` int(11)
,`nombre_pro` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_departamento`
--
DROP TABLE IF EXISTS `v_departamento`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_departamento`  AS  select `de`.`Id_Pais` AS `idPais`,`de`.`Id_Departamento` AS `idDepartamento`,`de`.`Descripcion` AS `nombre_departamento` from `departamento` `de` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_distrito`
--
DROP TABLE IF EXISTS `v_distrito`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_distrito`  AS  select `di`.`Id_Provincia` AS `idProvincia`,`di`.`Id_Distrito` AS `idDistrito`,`di`.`Descripcion` AS `nombre_distrito` from `distrito` `di` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_lista_doctor`
--
DROP TABLE IF EXISTS `v_lista_doctor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_lista_doctor`  AS  select `doc`.`Id_Doctor` AS `id`,concat(`doc`.`Nombres`,' ',`doc`.`Apellido_Paterno`,' ',`doc`.`Apellido_Materno`) AS `nombre` from (`doctor` `doc` join `usuario` `usu` on(`usu`.`Id_Doctor` = `doc`.`Id_Doctor`)) where `usu`.`Activo` = 1 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_provincia`
--
DROP TABLE IF EXISTS `v_provincia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_provincia`  AS  select `pr`.`Id_Departamento` AS `idDepartamento`,`pr`.`Id_Provincia` AS `idProvincia`,`pr`.`Descripcion` AS `nombre_pro` from `provincia` `pr` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `codigo_registro`
--
ALTER TABLE `codigo_registro`
  ADD PRIMARY KEY (`id_codigo`);

--
-- Indices de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD PRIMARY KEY (`Id_Cuestionario`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`Id_Departamento`);

--
-- Indices de la tabla `detalle_cuestionario`
--
ALTER TABLE `detalle_cuestionario`
  ADD PRIMARY KEY (`Id_Detalle_Cuestionario`);

--
-- Indices de la tabla `detalle_cuestionario_paciente`
--
ALTER TABLE `detalle_cuestionario_paciente`
  ADD PRIMARY KEY (`Id_Cuestionario_Paciente`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`Id_Distrito`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`Id_Doctor`);

--
-- Indices de la tabla `espacio_usuario`
--
ALTER TABLE `espacio_usuario`
  ADD PRIMARY KEY (`Id_Espacio_Usuario`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`Id_Especialidad`);

--
-- Indices de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD PRIMARY KEY (`Id_historia_clinica`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`Id_Paciente`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`Id_Pais`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`Id_Provincia`);

--
-- Indices de la tabla `referencia_usuario`
--
ALTER TABLE `referencia_usuario`
  ADD PRIMARY KEY (`Id_Referencia_Usuario`);

--
-- Indices de la tabla `tipo_informacion`
--
ALTER TABLE `tipo_informacion`
  ADD PRIMARY KEY (`Id_Tipo_Informacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`);

--
-- Indices de la tabla `usuario_sistema`
--
ALTER TABLE `usuario_sistema`
  ADD PRIMARY KEY (`Id_Usuario_Sistema`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `codigo_registro`
--
ALTER TABLE `codigo_registro`
  MODIFY `id_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  MODIFY `Id_Cuestionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `Id_Departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `detalle_cuestionario`
--
ALTER TABLE `detalle_cuestionario`
  MODIFY `Id_Detalle_Cuestionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de la tabla `detalle_cuestionario_paciente`
--
ALTER TABLE `detalle_cuestionario_paciente`
  MODIFY `Id_Cuestionario_Paciente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `Id_Distrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1634;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `Id_Doctor` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `espacio_usuario`
--
ALTER TABLE `espacio_usuario`
  MODIFY `Id_Espacio_Usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `Id_Especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  MODIFY `Id_historia_clinica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `Id_Paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `Id_Pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `Id_Provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT de la tabla `referencia_usuario`
--
ALTER TABLE `referencia_usuario`
  MODIFY `Id_Referencia_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_informacion`
--
ALTER TABLE `tipo_informacion`
  MODIFY `Id_Tipo_Informacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
