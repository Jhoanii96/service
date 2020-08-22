-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-08-2020 a las 22:10:08
-- Versión del servidor: 10.3.23-MariaDB-cll-lve
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fcepcvdv_clinica_app`
--

DELIMITER $$
--
-- Procedimientos
--
$$

$$

$$

$$

$$

$$

$$

CREATE DEFINER=`cpses_fc1uku28q1`@`localhost` PROCEDURE `mostrar_detalle_cita` (IN `codcita` INT, IN `user_name` VARCHAR(60) CHARSET utf8)  BEGIN

	
	select 
		vd.id, 
        vd.nombre, 
        vd.ape_pa, 
        vd.ape_ma, 
        vd.dni, 
        vd.celular, 
        vd.fntoage, 
        vd.genero, 
        vd.fecha_cita, 
        vd.precio, 
        vd.estado, 
        vd.email, 
        vd.fn 
	from v_detalle_cita vd 
    where vd.id = codcita and vd.username = user_name; 


END$$

CREATE DEFINER=`cpses_fc1uku28q1`@`localhost` PROCEDURE `mostrar_detalle_historial` (IN `codhistorial` INT, IN `user_name` VARCHAR(60) CHARSET utf8)  BEGIN

	select * from v_detalle_historia vd where vd.id = codhistorial and vd.username = user_name; 

END$$

$$

$$

$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `Id_Citas` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Paciente` int(11) NOT NULL,
  `Fecha_Creacion` timestamp NULL DEFAULT current_timestamp(),
  `Fecha_Cita` timestamp NULL DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT 0,
  `Recordatorio_SMS` tinyint(1) DEFAULT NULL,
  `Recordatorio_CORREO` int(11) DEFAULT NULL,
  `Atencion` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`Id_Citas`, `Id_Usuario`, `Id_Paciente`, `Fecha_Creacion`, `Fecha_Cita`, `Precio`, `Estado`, `Recordatorio_SMS`, `Recordatorio_CORREO`, `Atencion`) VALUES
(1, 2, 1, '2020-07-16 00:00:00', '2020-07-18 00:30:00', 50, 0, 1, 1, 0),
(2, 2, 1, '2020-07-19 00:00:00', '2020-07-19 14:15:00', 60, 1, 1, 2, 1),
(3, 2, 1, '2020-07-23 00:00:00', '2020-07-28 17:50:00', 50, 1, 1, 1, 1),
(4, 2, 11, '2020-08-05 05:16:34', '2020-08-13 20:30:00', 50, 0, 0, 0, 0),
(5, 2, 5, '2020-08-08 03:45:50', '2020-08-09 01:20:00', 50, 0, 0, 0, 0),
(6, 2, 2, '2020-08-08 03:46:21', '2020-08-09 15:10:00', 50, 0, 0, 0, 0),
(7, 2, 2, '2020-08-08 03:46:44', '2020-08-05 15:10:00', 50, 0, 0, 0, 0),
(8, 2, 1, '2020-08-09 01:18:06', '2020-08-08 17:12:00', 50, 0, 0, 0, 0),
(9, 2, 5, '2020-08-09 01:18:24', '2020-08-09 09:08:00', 50, 0, 0, 0, 0),
(10, 2, 10, '2020-08-09 02:46:33', '2020-08-09 11:26:00', 50, 0, 0, 0, 0),
(11, 2, 14, '2020-08-17 01:51:22', '2020-08-17 17:12:00', 50, 0, 0, 0, 0),
(12, 2, 15, '2020-08-17 02:11:36', '2020-08-18 01:20:00', 50, 0, 0, 0, 0),
(13, 2, 15, '2020-08-17 02:11:57', '2020-08-17 08:03:00', 50, 0, 0, 0, 0),
(14, 2, 1, '2020-08-17 02:14:41', '2020-08-18 02:21:00', 50, 0, 0, 0, 0),
(15, 2, 1, '2020-08-17 02:15:05', '2020-08-18 03:22:00', 50, 0, 0, 0, 0),
(16, 6, 16, '2020-08-19 01:51:22', '2020-08-20 19:30:00', 50, 0, 0, 0, 0),
(17, 6, 1, '2020-08-19 01:52:34', '2020-08-19 02:00:00', 50, 0, 0, 0, 0),
(18, 6, 18, '2020-08-19 02:37:49', '2020-08-19 03:00:00', 50, 0, 0, 0, 0),
(19, 6, 17, '2020-08-21 23:54:12', '2020-08-21 23:00:00', 50, 0, 0, 0, 0);

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
(33, '2RTPGQ', '1', '2020-07-05 19:31:53'),
(34, 'TRLDMZ', '1', '2020-08-18 21:41:23'),
(35, '7X9GN1', '1', '2020-08-19 23:14:43');

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
(24, 1, '2020-07-17 01:18:08', 7, 0),
(26, 2, '2020-07-17 02:36:07', 1, 0),
(27, 6, '2020-08-19 01:42:21', 4, 0),
(28, 7, '2020-08-20 03:16:04', 3, 0);

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
  `Pregunta` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_cuestionario`
--

INSERT INTO `detalle_cuestionario` (`Id_Detalle_Cuestionario`, `Id_Cuestionario`, `Pregunta`) VALUES
(22, 24, 'tabaco'),
(95, 24, '123456'),
(96, 24, '4548484'),
(97, 24, 'pregunta 1'),
(116, 26, 'SIDA'),
(117, 24, 'TIENE TETANO'),
(118, 24, 'FUMA'),
(119, 24, 'PREGUNTA 3'),
(120, 27, 'PREGUNTA 1'),
(121, 27, 'PREGUNTA 2'),
(122, 27, 'PREGUNTA 3'),
(123, 27, 'PREGUNTA 4'),
(124, 28, 'Pregunta1'),
(125, 28, 'Pregunta 2'),
(126, 28, 'Pregunta 3');

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
  `Id_Paciente` int(11) NOT NULL,
  `Mostrar` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_cuestionario_paciente`
--

INSERT INTO `detalle_cuestionario_paciente` (`Id_Cuestionario_Paciente`, `Id_Detalle_Cuestionario`, `Respuesta`, `Id_Paciente`, `Mostrar`) VALUES
(1, 22, '1', 1, 1),
(2, 95, '2', 1, 1),
(3, 96, '4', 1, 1),
(4, 97, '4', 1, 1),
(5, 116, 'si', 1, 1),
(7, 116, 'no', 10, 1),
(8, 116, 'si', 11, 1),
(9, 116, 'no', 12, 1),
(10, 116, 'no', 13, 1),
(15, 117, 'SIASDASDASD', 1, 1),
(16, 118, '5464684', 1, 1),
(17, 119, 'ASDASDASD', 1, 1),
(18, 120, 'no', 16, 1),
(19, 121, 'no', 16, 1),
(20, 122, 'no', 16, 1),
(21, 123, 'no', 16, 1),
(22, 120, 'si', 17, 1),
(23, 121, 'si', 17, 1),
(24, 122, 'si', 17, 1),
(25, 123, 'si', 17, 1),
(26, 120, 'no', 18, 1),
(27, 121, 'no', 18, 1),
(28, 122, 'no', 18, 1),
(29, 123, 'no', 18, 1),
(30, 116, 'no', 16, 1),
(31, 120, 'no', 19, 1),
(32, 121, 'no', 19, 1),
(33, 122, 'no', 19, 1),
(34, 123, 'no', 19, 1),
(35, 120, 'si', 20, 1),
(36, 121, 'si', 20, 1),
(37, 122, 'si', 20, 1),
(38, 123, 'si', 20, 1),
(39, 120, 'no', 21, 1),
(40, 121, 'no', 21, 1),
(41, 122, 'no', 21, 1),
(42, 123, 'no', 21, 1),
(81, 120, 'no', 22, 1),
(82, 121, 'no', 22, 1),
(83, 122, 'no', 22, 1),
(84, 123, 'no', 22, 1),
(85, 120, 'no', 23, 1),
(86, 121, 'no', 23, 1),
(87, 122, 'no', 23, 1),
(88, 123, 'no', 23, 1),
(89, 120, 'no', 24, 1),
(90, 121, 'no', 24, 1),
(91, 122, 'no', 24, 1),
(92, 123, 'no', 24, 1),
(93, 22, '1', 5, 1),
(94, 95, '2', 5, 1),
(95, 96, '3', 5, 1),
(96, 97, '5', 5, 1),
(97, 117, '8', 5, 1),
(98, 118, '5', 5, 1),
(99, 119, '8', 5, 1),
(100, 116, 'no', 20, 1);

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
(1, 1, 1, 22, 156, 1415, '70143435', '897846', 'ALBERTH RONALDO', 'FRISANCHO', 'PONCE', '', 'M', '', '', '4684654', '', '', 'alberth@gmail.com', '', '', '', '1999-10-10'),
(2, 3, 1, 22, 157, 1426, '75744654', '198745', 'JHON', 'ALVARADO', 'ACHATA', NULL, 'M', '123546', '65465465', '654654', '65465', NULL, 'jhon_123_jw@outlook.com', NULL, NULL, NULL, '1996-01-27'),
(9, 2, 1, 22, 156, 1415, '00465365', '084684', 'JHON', 'ALVARADO', 'ACHATA', 'Calle Violetas Mz. C Lote. 6', 'M', NULL, NULL, '+51910181425', NULL, NULL, 'jhon_123_jw@hotmail.com', NULL, NULL, NULL, '2020-07-01'),
(10, 3, 1, 22, 156, 1415, '04848648', '979977', 'ERICK', 'AYCAYA', 'ALANIA', 'La Catedral', 'M', NULL, NULL, '+51910181425', NULL, NULL, 'jhon_123_jw@hotmail.com', NULL, NULL, NULL, '1700-06-05'),
(11, 3, 1, 22, 156, 1415, '65598486', '646846', 'RUTH', 'RAMIREZ', 'REJAS', 'Abajo de la plaza zela', 'F', NULL, NULL, '+51914684233', NULL, NULL, 'jhon_123_jw@hotmail.com', NULL, NULL, NULL, '2020-06-04'),
(12, 2, 1, 3, 11, 94, '98798798', '879879', 'RONALDO', 'FRISANCHO', 'PONCE', 'av ', 'M', NULL, NULL, '959854747', NULL, NULL, 'albeerthronaldo@hotmail.com', NULL, NULL, NULL, '1998-07-27'),
(13, 1, 1, 2, 5, 44, '70143455', '456465', 'JOSE', 'LEONARDO', 'PEREZ', 'AV', 'M', '', '', '9598746218', '', NULL, 'albeerthronaldo@hotmail.com', NULL, NULL, NULL, '1994-05-21');

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
(3, 'Psicologo', NULL),
(99, 'Otros', 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `Id_historia_clinica` int(11) NOT NULL,
  `Id_Paciente` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Cita` int(11) DEFAULT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `Anamnesis` text NOT NULL,
  `Examenes` text NOT NULL,
  `Examen_Fisico` text NOT NULL,
  `Diagnostico` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historia_clinica`
--

INSERT INTO `historia_clinica` (`Id_historia_clinica`, `Id_Paciente`, `Id_Usuario`, `Id_Cita`, `Fecha`, `Anamnesis`, `Examenes`, `Examen_Fisico`, `Diagnostico`) VALUES
(62, 14, 1, NULL, '2020-08-21 17:22:52', '1\r\n2\r\n3\r\n', 'diag', 'resultado', 'dasdawdawdawd'),
(63, 14, 1, NULL, '2020-08-21 17:23:31', '1\r\n2\r\n3\r\n', 'diag', 'resultado', 'dasdawdawdawd'),
(64, 6, 1, NULL, '2020-08-21 17:26:55', '1\r\n2\r\n3\r\n', 'diag', 'resultado', 'asdasdasdasd'),
(65, 5, 1, NULL, '2020-08-21 17:31:23', '1\r\n2\r\n3\r\n', 'diag', 'resultado', 'adawdawd'),
(66, 13, 1, NULL, '2020-08-21 17:32:05', '1\r\n2\r\n3\r\n', 'diag', 'resultado', 'da45w4d6a4wd'),
(67, 13, 1, NULL, '2020-08-21 17:33:57', '1\r\n2\r\n3\r\n', 'diag', 'resultado', 'adsadwadwad'),
(68, 4, 1, NULL, '2020-08-21 17:52:31', '1\r\n2\r\n3\r\n', 'diag', 'resultado', 'asdasda'),
(70, 11, 1, NULL, '2020-08-21 18:00:43', '1\r\n2\r\n3\r\n', 'diag', 'resultado', 'asdasdadad'),
(71, 11, 1, NULL, '2020-08-21 18:00:51', '1\r\n2\r\n3\r\n', 'diag', 'resultado', 'asdasdadad'),
(72, 12, 1, NULL, '2020-08-21 18:01:50', '1\r\n2\r\n3\r\n', 'diag', 'resultado', 'awdawdawdawdawd'),
(73, 12, 1, NULL, '2020-08-21 18:03:28', '1\r\n2\r\n3\r\n', 'diag', 'resultado', 'awdawdawdawdawd'),
(0, 24, 6, NULL, '2020-08-21 19:52:00', '1:1\r\n2:\r\n3:\r\n4:\r\n5:', '12', '12', '12'),
(0, 20, 6, NULL, '2020-08-21 20:13:07', '1:\r\n2:\r\n3:\r\n4:\r\n5:', '12', '12', '12'),
(0, 1, 1, NULL, '2020-08-21 21:18:52', '1\r\n2\r\n3\r\n', 'diag', 'resultado', '123456789'),
(0, 5, 1, NULL, '2020-08-21 21:21:38', '1 asda\r\n2 asdasd\r\n3 asdasd\r\n', 'diag asdasd', 'resultado asdasd', '12345484684'),
(0, 20, 2, NULL, '2020-08-21 21:46:48', 'alsjdlkasjdlk\r\nslkjdlaksdj', 'sd', 'saluuute', '654654654'),
(0, 20, 2, NULL, '2020-08-21 21:50:52', 'alsjdlkasjdlk\r\nslkjdlaksdj', 'sd', 'saluuute', '654654654');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica_predeterminado`
--

CREATE TABLE `historia_clinica_predeterminado` (
  `Id_Historia_Clinica_Predeterminado` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `Anamnesis_Pred` varchar(50) DEFAULT NULL,
  `Examenes_Pred` varchar(50) DEFAULT NULL,
  `Examen_Fisico_Pred` varchar(50) DEFAULT NULL,
  `Diagnostico_Pred` varchar(50) DEFAULT NULL,
  `Tratamiento_Pred` varchar(50) NOT NULL,
  `creado` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historia_clinica_predeterminado`
--

INSERT INTO `historia_clinica_predeterminado` (`Id_Historia_Clinica_Predeterminado`, `Id_Usuario`, `Fecha`, `Anamnesis_Pred`, `Examenes_Pred`, `Examen_Fisico_Pred`, `Diagnostico_Pred`, `Tratamiento_Pred`, `creado`) VALUES
(34, 2, '2020-08-10 22:05:21', 'kasdhkjah\r\nalsjdalk', 'saluuute', 'alsjdlkasjdlk\r\nslkjdlaksdj', '', '654654654', b'1'),
(35, 1, '2020-08-15 19:48:30', 'te:', 'resultado', '1\r\n2\r\n3\r\n', 'diag', '', b'1'),
(0, 6, '2020-08-19 19:52:58', 'TE:\r\nDE:', '', '1:\r\n2:\r\n3:\r\n4:\r\n5:', '', '', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `Id_Imagen` int(11) NOT NULL,
  `Nombre` varchar(250) NOT NULL,
  `tamaño` float DEFAULT NULL,
  `Id_Historia_Clinica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`Id_Imagen`, `Nombre`, `tamaño`, `Id_Historia_Clinica`) VALUES
(102, 'src/assets/media/images/historia_clinica/0822201252311598050351.0263.jpeg', 979433, 68),
(103, '/src/Documentos/0822201252311598050351.0263.pdf', 87176, 68),
(104, 'src/assets/media/images/historia_clinica/0822201252311598050351.0263.jpeg', 106965, 68),
(105, 'src/assets/media/images/historia_clinica/0822200100511598050851.7249.jpeg', 478301, 71),
(106, 'src/assets/media/images/historia_clinica/0822200100511598050851.725.jpeg', 145534, 71),
(107, 'src/assets/media/images/historia_clinica/0822200103281598051008.1886.jpeg', 979433, 73),
(108, 'src/assets/media/images/historia_clinica/0822200103281598051008.1886.jpeg', 145534, 73),
(109, '/src/Documentos/0822200103281598051008.1887.vnd.openxmlformats-officedocument.wordprocessingml.document', 242291, 73),
(110, '/src/Documentos/0822200103281598051008.1887.pdf', 87176, 73),
(111, 'src/assets/media/images/historia_clinica/0821200745161598053516.0809.jpeg', 57702, 75),
(112, '/src/Documentos/0821200918521598059132.9379.pdf', 1677250, 0),
(113, 'src/assets/media/images/historia_clinica/0821200918521598059132.9379.jpeg', 127271, 0),
(114, '/src/Documentos/0821200918521598059132.9379.pdf', 2845200, 0),
(115, '/src/Documentos/0821200921381598059298.543.pdf', 448792, 0);

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
(1, '75745454', 'Jhon ', 'Olvia', 'Perez', 'M', '1997-08-18', '925754844', 'salute@gmail.com', 'Chile', 'Obrero', 'Arquitecto', 2),
(2, '4654654', 'asdasd', 'asdasdasd', 'asdqwdwqd', '', '2020-07-03', '6464545', 'asda@gmail.com', 'asdasdasd', '', '', 2),
(4, '4454845454', 'asdasdasd', 'asdasdasd', 'asdasdasd', 'F', '2020-07-15', '464545454', 'asdsdasd@gmail.com', 'argentina', 'asdasd', 'asdsasd', 2),
(5, '7878454', 'walter', 'aguilar', 'perez', 'M', '2020-07-07', '92854845', 'ol@gmail.com', 'peruana', 'odd', 'aksdjlaskjd', 2),
(6, '76507579', 'akldjlakjdlkaj', 'aguilar', 'asdasdasd', 'F', '2020-07-07', '454684654', 'dyangel@gmail.com', 'argentina', 'opcion 11555', 'ocupacion 154545', 2),
(10, '32145678', 'ALBERTH RONALDO', 'ALVARADO', 'ACHATadasd', 'F', '2020-07-09', '928575911', '', 'peruana', 'obrero', 'arquitecto', 2),
(11, '12345678', 'LIZETH ZULEMA', 'WASHUALDO', 'VENGEGAZ', 'M', '1996-01-27', '928575911', '', 'peruana', 'obrero', 'arquitecto', 2),
(12, '65478899', 'ALBERTH RONALDO', 'ALVARADO', 'ACHATadasd', 'F', '2020-07-02', '928575911', '', 'peruana', 'obrero', 'arquitecto', 2),
(13, '32164557', 'ALBERTH RONALDO', 'ALVARADO', 'PONCE', 'F', '2020-07-21', '928575911', '', 'peruana', 'obrero', 'arquitecto', 2),
(14, '00486486', 'ERICK JOEL', 'AYCAYA', 'ALANIA', 'M', '1050-02-01', '456486486', '', '', NULL, NULL, 2),
(15, '68486486', 'DALTHON', 'WALPA', 'MAMANI', 'M', '0001-01-01', '648486486', 'dalthon@gmail.com', '00000', NULL, NULL, 2),
(16, '99999999', 'RONALD', 'REYES', 'ROSALES', 'M', '1998-07-27', '959856137', 'ronaldo@hotmail.com', 'PERU-TACNA', '', 'ESTUDIANTE', 6),
(17, '77777777', 'JORGE', 'GUSTAVO', 'ALAYA', 'M', '1997-08-27', '959856137', '', 'LIMA', '', '', 6),
(18, '33333333', 'RUTH', 'RAMIRES', 'REJAS', 'F', '1997-07-21', '959856137', 'ruth@gmail.com', 'PERU-TACNA', '', '', 6),
(19, '22222222', 'JOAQUIN', 'PEREZ', 'PEREZ', 'M', '1992-05-25', '959856137', '', 'TACMA', '', '', 6),
(20, '70143455', 'JOSUE', 'ALDAIR', 'MAMANI', 'Seleccionar', '1997-08-27', '', 'jsue@hotmail.com', 'PERU', '', 'ESTUDIANTE', 6),
(21, '55555555', 'ROSA', 'LAURA', 'PAXI', 'M', '1997-08-27', '454564884', '', 'PERU-TACNA', '', '', 6),
(22, '66666666', 'JEAN', 'FRANCO ', 'MALAGA', 'M', '1997-06-24', '959856137', 'ronaldo@hotmail.com', 'PERU-TACNA', '', 'DOCENTE', 6),
(23, '12121212', 'YIMI', 'MUÑOZ', 'MAMANI', 'M', '1997-02-21', '959856137', '', 'PERU-TACNA', '', '', 6),
(24, '36363636', 'YONI', 'LLANOS ', 'TICONA', 'M', '1997-05-21', '959856137', '', 'PERU', '', '', 6);

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
  `Direccion_IP` varchar(45) DEFAULT NULL,
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
  `imagen` varchar(250) NOT NULL DEFAULT 'src/assets/media/images/profile/avatar1.png'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Id_Doctor`, `Nombre`, `Password`, `Direccion`, `Direccion_IP`, `Ubicacion_GPS`, `Activo`, `Fecha_Activacion`, `Monto_Pago`, `Fecha_Habilitado`, `Fecha_Registro`, `Dia_Pago`, `Codigo_Web_Registro`, `Visualizo_Indicaciones`, `Tiempo_Atencion_Promedio`, `Precio_Predeterminado`, `Hora_Inicio_Atencion`, `Hora_Fin_Atencion`, `estado_perfil`, `imagen`) VALUES
(1, 1, 'alberth', '123456', NULL, NULL, NULL, 1, '2020-06-28 00:00:00.000', 4500.00, NULL, NULL, '2020-08-05', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'src/assets/media/images/profile/avatar1.png'),
(2, 2, 'jhon', '123456', NULL, NULL, NULL, 1, '2020-06-28 00:00:00.000', 4000.00, NULL, NULL, '2020-04-15', NULL, NULL, 80, 4500.00, NULL, NULL, 0, 'src/assets/media/images/profile/0724200634261595565266.8879.jpeg'),
(3, 9, 'jhonxdas123', '4eM9Jqb3yBVXD7D', 'Centro de tacna', NULL, NULL, 1, '2020-07-05 00:00:00.000', 150.60, '2020-07-05', '2020-07-05 19:12:17.000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'src/assets/media/images/profile/avatar1.png'),
(4, 10, 'ericksolitario', 'B4NHL32da7v8zSa', 'Fuera de la catedral', NULL, NULL, 1, '2020-07-05 00:00:00.000', 50.00, '2020-07-05', '2020-07-05 19:18:14.000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'src/assets/media/images/profile/avatar1.png'),
(5, 11, 'ruthlapanda', 'g78WWQhKrihsPjJ', 'en la plaza zela', NULL, NULL, 1, '2020-07-05 00:00:00.000', 150.00, '2020-07-05', '2020-07-05 19:32:23.000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'src/assets/media/images/profile/avatar1.png'),
(6, 12, 'ronaldo456', 'MFzc6Km7c5sC6y4', 'av', NULL, NULL, 1, '2020-08-18 00:00:00.000', 80.00, '2020-08-18', '2020-08-18 21:42:00.000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'src/assets/media/images/profile/avatar1.png'),
(7, 13, 'RONALDIÑO123', 'wU5Zpgv9QSRzpAE', 'AV', NULL, NULL, 1, '2020-08-19 00:00:00.000', 100.00, '2020-08-19', '2020-08-19 23:15:07.000', '1998-01-15', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'src/assets/media/images/profile/0819201115531597893353.4744.png');

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
-- Estructura Stand-in para la vista `v_citas_consulta`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_citas_consulta` (
`id` int(11)
,`dni` varchar(30)
,`nombre` varchar(30)
,`apellidos` varchar(61)
,`fecha_nac` date
,`fecha_atencion` timestamp
,`estado` int(11)
,`user_name` varchar(300)
);

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
-- Estructura Stand-in para la vista `v_detalle_paciente`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_detalle_paciente` (
`id` int(11)
,`dni` varchar(30)
,`nombre` varchar(30)
,`apellidos` varchar(61)
,`ape_paterno` varchar(30)
,`ape_materno` varchar(30)
,`genero` varchar(30)
,`fecha_nac` date
,`celular` varchar(20)
,`email` varchar(40)
,`direccion` varchar(30)
,`ocupa_ant` varchar(40)
,`ocupa_act` varchar(40)
,`user_name` varchar(300)
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
-- Estructura Stand-in para la vista `v_lista_citas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_lista_citas` (
`id` int(11)
,`nombre` varchar(30)
,`apepa` varchar(30)
,`apema` varchar(30)
,`dni` varchar(30)
,`fenac` date
,`fecre` timestamp
,`estado` int(11)
,`fechacita` timestamp
,`username` varchar(300)
,`id_paciente` int(11)
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
-- Estructura Stand-in para la vista `v_lista_historia_clinica`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_lista_historia_clinica` (
`id_historia` int(11)
,`id_paciente` int(11)
,`nombre_paciente` varchar(92)
,`fecha_nacimiento` date
,`fecha_consulta` datetime
,`username` varchar(300)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_paciente`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_paciente` (
`id` int(11)
,`nombre` varchar(30)
,`apellidos` varchar(61)
,`fecha_nac` date
,`user_name` varchar(300)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_perfil`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_perfil` (
`id` bigint(20)
,`nombre` varchar(80)
,`ape_paterno` varchar(50)
,`ape_materno` varchar(50)
,`dni` varchar(11)
,`especialidad` varchar(50)
,`cmp` varchar(10)
,`genero` varchar(9)
,`celular1` varchar(20)
,`celular2` varchar(20)
,`telefono1` varchar(20)
,`telefono2` varchar(20)
,`domicilio` varchar(200)
,`fecha` date
,`username` varchar(300)
,`pass` varchar(50)
,`correo` varchar(200)
,`fecharegistro` datetime(3)
,`fechapago` date
,`foto` varchar(250)
,`pais` varchar(50)
,`departamento` varchar(50)
,`provincia` varchar(50)
,`distrito` varchar(50)
,`diratencion` varchar(200)
,`dirip` varchar(45)
,`gpsmaps` varchar(200)
,`tiempoatencion` int(11)
,`precioconsulta` decimal(18,2)
,`diapago` date
,`facebook` varchar(200)
,`twitter` varchar(200)
,`linkedin` varchar(200)
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
-- Estructura para la vista `v_citas_consulta`
--
DROP TABLE IF EXISTS `v_citas_consulta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`fcepcvdv`@`localhost` SQL SECURITY DEFINER VIEW `v_citas_consulta`  AS  select `ci`.`Id_Citas` AS `id`,`pa`.`Documento` AS `dni`,`pa`.`Nombre` AS `nombre`,concat(`pa`.`Apellido_Paterno`,' ',`pa`.`Apellido_Materno`) AS `apellidos`,`pa`.`Fecha_Nacimiento` AS `fecha_nac`,`ci`.`Fecha_Cita` AS `fecha_atencion`,`ci`.`Estado` AS `estado`,`us`.`Nombre` AS `user_name` from ((`citas` `ci` join `paciente` `pa` on(`ci`.`Id_Paciente` = `pa`.`Id_Paciente`)) join `usuario` `us` on(`us`.`Id_Usuario` = `ci`.`Id_Usuario`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_departamento`
--
DROP TABLE IF EXISTS `v_departamento`;

CREATE ALGORITHM=UNDEFINED DEFINER=`fcepcvdv`@`localhost` SQL SECURITY DEFINER VIEW `v_departamento`  AS  select `de`.`Id_Pais` AS `idPais`,`de`.`Id_Departamento` AS `idDepartamento`,`de`.`Descripcion` AS `nombre_departamento` from `departamento` `de` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_detalle_paciente`
--
DROP TABLE IF EXISTS `v_detalle_paciente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`fcepcvdv`@`localhost` SQL SECURITY DEFINER VIEW `v_detalle_paciente`  AS  select `pa`.`Id_Paciente` AS `id`,`pa`.`Documento` AS `dni`,`pa`.`Nombre` AS `nombre`,concat(`pa`.`Apellido_Paterno`,' ',`pa`.`Apellido_Materno`) AS `apellidos`,`pa`.`Apellido_Paterno` AS `ape_paterno`,`pa`.`Apellido_Materno` AS `ape_materno`,`pa`.`Genero` AS `genero`,`pa`.`Fecha_Nacimiento` AS `fecha_nac`,`pa`.`Celular` AS `celular`,`pa`.`Email` AS `email`,`pa`.`Procedencia` AS `direccion`,`pa`.`Ocupacion_Anterior` AS `ocupa_ant`,`pa`.`Ocupacion_Actual` AS `ocupa_act`,`us`.`Nombre` AS `user_name` from (`paciente` `pa` join `usuario` `us` on(`us`.`Id_Usuario` = `pa`.`Id_Usuario`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_distrito`
--
DROP TABLE IF EXISTS `v_distrito`;

CREATE ALGORITHM=UNDEFINED DEFINER=`fcepcvdv`@`localhost` SQL SECURITY DEFINER VIEW `v_distrito`  AS  select `di`.`Id_Provincia` AS `idProvincia`,`di`.`Id_Distrito` AS `idDistrito`,`di`.`Descripcion` AS `nombre_distrito` from `distrito` `di` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_lista_citas`
--
DROP TABLE IF EXISTS `v_lista_citas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`fcepcvdv`@`localhost` SQL SECURITY DEFINER VIEW `v_lista_citas`  AS  select `ci`.`Id_Citas` AS `id`,`pa`.`Nombre` AS `nombre`,`pa`.`Apellido_Paterno` AS `apepa`,`pa`.`Apellido_Materno` AS `apema`,`pa`.`Documento` AS `dni`,`pa`.`Fecha_Nacimiento` AS `fenac`,`ci`.`Fecha_Creacion` AS `fecre`,`ci`.`Estado` AS `estado`,`ci`.`Fecha_Cita` AS `fechacita`,`us`.`Nombre` AS `username`,`pa`.`Id_Paciente` AS `id_paciente` from ((`citas` `ci` join `paciente` `pa` on(`pa`.`Id_Paciente` = `ci`.`Id_Paciente`)) join `usuario` `us` on(`us`.`Id_Usuario` = `ci`.`Id_Usuario`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_lista_doctor`
--
DROP TABLE IF EXISTS `v_lista_doctor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`fcepcvdv`@`localhost` SQL SECURITY DEFINER VIEW `v_lista_doctor`  AS  select `doc`.`Id_Doctor` AS `id`,concat(`doc`.`Nombres`,' ',`doc`.`Apellido_Paterno`,' ',`doc`.`Apellido_Materno`) AS `nombre` from (`doctor` `doc` join `usuario` `usu` on(`usu`.`Id_Doctor` = `doc`.`Id_Doctor`)) where `usu`.`Activo` = 1 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_lista_historia_clinica`
--
DROP TABLE IF EXISTS `v_lista_historia_clinica`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_lista_historia_clinica`  AS  select `hc`.`Id_historia_clinica` AS `id_historia`,`pa`.`Id_Paciente` AS `id_paciente`,concat(`pa`.`Nombre`,' ',`pa`.`Apellido_Paterno`,' ',`pa`.`Apellido_Materno`) AS `nombre_paciente`,`pa`.`Fecha_Nacimiento` AS `fecha_nacimiento`,`hc`.`Fecha` AS `fecha_consulta`,`us`.`Nombre` AS `username` from ((`historia_clinica` `hc` join `paciente` `pa` on(`pa`.`Id_Paciente` = `hc`.`Id_Paciente`)) join `usuario` `us` on(`us`.`Id_Usuario` = `hc`.`Id_Usuario`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_paciente`
--
DROP TABLE IF EXISTS `v_paciente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`fcepcvdv`@`localhost` SQL SECURITY DEFINER VIEW `v_paciente`  AS  select `pa`.`Id_Paciente` AS `id`,`pa`.`Nombre` AS `nombre`,concat(`pa`.`Apellido_Paterno`,' ',`pa`.`Apellido_Materno`) AS `apellidos`,`pa`.`Fecha_Nacimiento` AS `fecha_nac`,`us`.`Nombre` AS `user_name` from (`paciente` `pa` join `usuario` `us` on(`us`.`Id_Usuario` = `pa`.`Id_Usuario`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_perfil`
--
DROP TABLE IF EXISTS `v_perfil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`fcepcvdv`@`localhost` SQL SECURITY DEFINER VIEW `v_perfil`  AS  select `dc`.`Id_Doctor` AS `id`,`dc`.`Nombres` AS `nombre`,`dc`.`Apellido_Paterno` AS `ape_paterno`,`dc`.`Apellido_Materno` AS `ape_materno`,`dc`.`Documento` AS `dni`,`es`.`Descripcion` AS `especialidad`,`dc`.`CMP` AS `cmp`,if(`dc`.`Sexo` = 'M','Masculino',if(`dc`.`Sexo` = 'F','Femenino','Otros')) AS `genero`,`dc`.`Celular01` AS `celular1`,`dc`.`Celular02` AS `celular2`,`dc`.`Telefono_Fijo01` AS `telefono1`,`dc`.`Telefono_Fijo02` AS `telefono2`,`dc`.`Direccion` AS `domicilio`,`dc`.`Fecha_Nacimiento` AS `fecha`,`us`.`Nombre` AS `username`,`us`.`Password` AS `pass`,`dc`.`email01` AS `correo`,`us`.`Fecha_Registro` AS `fecharegistro`,`us`.`Dia_Pago` AS `fechapago`,`us`.`imagen` AS `foto`,`pa`.`Descripcion` AS `pais`,`de`.`Descripcion` AS `departamento`,`pr`.`Descripcion` AS `provincia`,`di`.`Descripcion` AS `distrito`,`us`.`Direccion` AS `diratencion`,`us`.`Direccion_IP` AS `dirip`,`us`.`Ubicacion_GPS` AS `gpsmaps`,`us`.`Tiempo_Atencion_Promedio` AS `tiempoatencion`,`us`.`Precio_Predeterminado` AS `precioconsulta`,`us`.`Dia_Pago` AS `diapago`,`dc`.`Facebook` AS `facebook`,`dc`.`Twitter` AS `twitter`,`dc`.`Linkedin` AS `linkedin` from ((((((`doctor` `dc` join `especialidad` `es` on(`es`.`Id_Especialidad` = `dc`.`Id_Especialidad`)) join `usuario` `us` on(`us`.`Id_Doctor` = `dc`.`Id_Doctor`)) join `pais` `pa` on(`pa`.`Id_Pais` = `dc`.`Id_Pais`)) join `departamento` `de` on(`de`.`Id_Departamento` = `dc`.`Id_Departamento`)) join `provincia` `pr` on(`pr`.`Id_Provincia` = `dc`.`Id_Provincia`)) join `distrito` `di` on(`di`.`Id_Distrito` = `dc`.`Id_Distrito`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_provincia`
--
DROP TABLE IF EXISTS `v_provincia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`fcepcvdv`@`localhost` SQL SECURITY DEFINER VIEW `v_provincia`  AS  select `pr`.`Id_Departamento` AS `idDepartamento`,`pr`.`Id_Provincia` AS `idProvincia`,`pr`.`Descripcion` AS `nombre_pro` from `provincia` `pr` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`Id_Citas`);

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
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`Id_Imagen`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`Id_Paciente`),
  ADD UNIQUE KEY `UN_DOC` (`Documento`);

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
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `Id_Citas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `codigo_registro`
--
ALTER TABLE `codigo_registro`
  MODIFY `id_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  MODIFY `Id_Cuestionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `Id_Departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `detalle_cuestionario`
--
ALTER TABLE `detalle_cuestionario`
  MODIFY `Id_Detalle_Cuestionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `detalle_cuestionario_paciente`
--
ALTER TABLE `detalle_cuestionario_paciente`
  MODIFY `Id_Cuestionario_Paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `Id_Distrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1634;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `Id_Doctor` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `espacio_usuario`
--
ALTER TABLE `espacio_usuario`
  MODIFY `Id_Espacio_Usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `Id_Especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `Id_Imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `Id_Paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `Id_Usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
