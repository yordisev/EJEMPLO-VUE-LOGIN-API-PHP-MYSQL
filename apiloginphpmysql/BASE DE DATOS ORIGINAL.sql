-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.22-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para db_api_php_vue
CREATE DATABASE IF NOT EXISTS `db_api_php_vue` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_api_php_vue`;

-- Volcando estructura para tabla db_api_php_vue.asistentes
CREATE TABLE IF NOT EXISTS `asistentes` (
  `id_asis` int(11) NOT NULL AUTO_INCREMENT,
  `tip_doc` varchar(50) DEFAULT NULL,
  `numero_doc` int(11) DEFAULT NULL,
  `p_nombre` varchar(50) DEFAULT NULL,
  `s_nombre` varchar(50) DEFAULT NULL,
  `p_apellido` varchar(50) DEFAULT NULL,
  `s_apellido` varchar(50) DEFAULT NULL,
  `edad` varchar(50) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `barrio` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  PRIMARY KEY (`id_asis`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_api_php_vue.asistentes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `asistentes` DISABLE KEYS */;
INSERT INTO `asistentes` (`id_asis`, `tip_doc`, `numero_doc`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `edad`, `sexo`, `barrio`, `direccion`, `telefono`, `correo`, `fecha_nacimiento`) VALUES
	(1, 'CC', 123456789, 'ELIMELETH', 'JUAN', 'MARTINEZ', 'ALSINA', '28', 'M', 'MALAMBO', 'CALLE 8 # 45-32', '313590553', 'ELIMETH@REDES.COM', '1993-12-29'),
	(2, 'CC', 1234, 'ANDRES', 'KEVIN', 'ALMARIO', 'PEREZ', '27', 'M', 'SOLEDAD', 'CALLE 55 # 32-23', '3126546545', 'KEVIN@LOCAL.COM', '2021-12-29'),
	(3, 'CC', 123456, 'ELIMECA', 'SANDRA', 'BARRIOS', 'MENDEZ', '25', 'F', 'CARTAGENA', 'CALLE 77 # 54-09', '325545665', 'ELIMECA@COCA.COM', '2000-12-29');
/*!40000 ALTER TABLE `asistentes` ENABLE KEYS */;

-- Volcando estructura para tabla db_api_php_vue.modulo
CREATE TABLE IF NOT EXISTS `modulo` (
  `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idmodulo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- Volcando datos para la tabla db_api_php_vue.modulo: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
INSERT INTO `modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
	(1, 'Dashboard', 'Dashboard', 1),
	(2, 'Usuarios', 'Usuarios del sistema', 1),
	(3, 'Clientes', 'Clientes de tienda', 1),
	(4, 'Productos', 'Todos los productos', 1),
	(5, 'Pedidos', 'Pedidos', 1),
	(6, 'Caterogías', 'Caterogías Productos', 1);
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;

-- Volcando estructura para tabla db_api_php_vue.pacientes
CREATE TABLE IF NOT EXISTS `pacientes` (
  `PacienteId` int(11) NOT NULL AUTO_INCREMENT,
  `DNI` varchar(45) DEFAULT NULL,
  `Nombre` varchar(150) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `CodigoPostal` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Genero` varchar(45) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Imagen` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`PacienteId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla db_api_php_vue.pacientes: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` (`PacienteId`, `DNI`, `Nombre`, `Direccion`, `CodigoPostal`, `Telefono`, `Genero`, `FechaNacimiento`, `Correo`, `Imagen`) VALUES
	(1, 'A000000001', 'Juan Carlos Medina', 'Calle de pruebas 1', '20001', '633281515', 'M', '1989-03-02', 'Paciente1@gmail.com', NULL),
	(2, 'B000000002', 'Daniel Rios', 'Calle de pruebas 2', '20002', '633281512', 'M', '1990-05-11', 'Paciente2@gmail.com', NULL),
	(3, 'C000000003', 'Marcela Dubon', 'Calle de pruebas 3', '20003', '633281511', 'F', '2000-07-22', 'Paciente3@gmail.com', NULL),
	(4, 'D000000004', 'Maria Mendez', 'Calle de pruebas 4', '20004', '633281516', 'F', '1980-01-01', 'Paciente4@gmail.com', NULL),
	(6, 'F000000006', 'Angel Rios', 'Calle de pruebas 6', '20005', '633281510', 'M', '1988-11-30', 'Paciente6@gmail.com', NULL),
	(20, 'd10001as', 'prueba', '', '8000001', '3135696565', 'M', '2021-02-25', 'coreoprueba@prueba.com', ''),
	(21, 'd10001as', 'prueba', '', '8000001', '3135696565', 'M', '2021-02-25', 'coreoprueba@prueba.com', ''),
	(22, 'd10001as', 'prueba', '', '8000001', '3135696565', 'M', '2021-02-25', 'coreoprueba@prueba.com', ''),
	(23, 'd10001as', 'prueba', '', '8000001', '3135696565', 'M', '2021-02-25', 'coreoprueba@prueba.com', ''),
	(25, 'd10001as', 'prueba', '', '8000001', '3135696565', 'M', '2021-02-25', 'coreoprueba@prueba.com', '');
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;

-- Volcando estructura para tabla db_api_php_vue.permisos
CREATE TABLE IF NOT EXISTS `permisos` (
  `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `r` int(11) NOT NULL DEFAULT 0,
  `w` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idpermiso`),
  KEY `rolid` (`rolid`),
  KEY `moduloid` (`moduloid`)
) ENGINE=InnoDB AUTO_INCREMENT=236 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- Volcando datos para la tabla db_api_php_vue.permisos: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
	(212, 1, 1, 1, 0, 0, 0),
	(213, 1, 2, 1, 1, 1, 1),
	(214, 1, 3, 1, 0, 0, 0),
	(215, 1, 4, 1, 0, 0, 0),
	(216, 1, 5, 1, 0, 0, 0),
	(217, 1, 6, 1, 0, 0, 0),
	(230, 2, 1, 1, 0, 0, 0),
	(231, 2, 2, 0, 0, 0, 0),
	(232, 2, 3, 0, 0, 0, 0),
	(233, 2, 4, 0, 0, 0, 0),
	(234, 2, 5, 0, 0, 0, 0),
	(235, 2, 6, 0, 0, 0, 0);
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;

-- Volcando estructura para tabla db_api_php_vue.rol
CREATE TABLE IF NOT EXISTS `rol` (
  `idrol` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombrerol` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- Volcando datos para la tabla db_api_php_vue.rol: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` (`idrol`, `nombrerol`, `descripcion`, `status`) VALUES
	(1, 'Administrador', 'Acceso a todo el sistema', 1),
	(2, 'Supervisores', 'Supervisor de tienda', 1),
	(3, 'Vendedores', 'Acceso a módulo ventas', 1),
	(4, 'Servicio al cliente', 'Servicio al cliente sistema', 1),
	(5, 'Bodega', 'Bodega', 1),
	(6, 'Resporteria', 'Resporteria Sistema', 2),
	(7, 'Cliente', 'Clientes tienda', 1),
	(8, 'Ejemplo rol', 'Ejemplo rol sitema', 1),
	(9, 'Coordinador', 'Coordinador', 1),
	(10, 'Consulta Ventas', 'Consulta Ventas', 1);
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;

-- Volcando estructura para tabla db_api_php_vue.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `UsuarioId` bigint(20) NOT NULL AUTO_INCREMENT,
  `identificacion` varchar(30) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombres` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `usuario` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_swedish_ci NOT NULL,
  `seccional` varchar(20) COLLATE utf8mb4_swedish_ci NOT NULL,
  `municipio` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_swedish_ci NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`UsuarioId`) USING BTREE,
  KEY `rolid` (`rolid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- Volcando datos para la tabla db_api_php_vue.usuarios: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`UsuarioId`, `identificacion`, `nombres`, `apellidos`, `telefono`, `usuario`, `password`, `seccional`, `municipio`, `token`, `rolid`, `datecreated`, `estado`) VALUES
	(1, '2409198920', 'Abel', 'OSH', 1234567, 'usuario1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '24252622', 'Abel OSH', '', 1, '2020-08-13 00:51:44', 1),
	(2, '7865421565', 'Carlos', 'Hernández', 789465487, 'carlos@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '', '2c52a34f7988a0afc63e-dfe4badca8d2cb2b93e6-94824d050567a0ccd851-56165c5603c4ca020', 1, '2020-08-13 00:54:08', 1),
	(3, '879846545454', 'Pablo', 'Arana', 784858856, 'pablo@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '', '', 3, '2020-08-14 01:42:34', 0),
	(4, '65465465', 'Jorge David', 'Arana', 987846545, 'jorge@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '', '', 1, '2020-08-22 00:27:17', 1),
	(5, '4654654', 'Carme', 'Arana', 646545645, 'carmen@infom.com', 'be63ad947e82808780278e044bcd0267a6ac6b3cd1abdb107cc10b445a182eb0', '', '', '', 1, '2020-08-22 00:35:04', 1),
	(6, '8465484', 'Alex Fernando', 'Méndez', 222222222, 'alex@info.com', '608cfa9ffc1dac43e8710cb23bbcf1d5215beee7ca8632c6a4a5a63a56f59aeb', '', '', '', 7, '2020-08-22 00:48:50', 0),
	(7, '54684987', 'Francisco', 'Herrera', 6654456545, 'francisco@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '', '', 2, '2020-08-22 01:55:57', 1),
	(8, '54646849844', 'Axel Gudiel', 'Vela', 654687454, 'axel@info.com', '993fdea29acd1f7c6a6423c038601b175bb282382fc85b306a85f134fff4a63e', '', '', '', 3, '2020-09-07 01:30:52', 1),
	(9, '123456789', 'teofilo', 'escorcia', 3126785433, 'teofilo@gmail.com', 'admin', 'bolivar', 'calamar', '', 1, '2021-12-24 19:15:56', 1),
	(14, '987654321', 'andres', 'reales', 7654321, 'andres@gmail.com', 'ff960cb55673958c594d0daaab1e368651c75c02f9687192a1811e7b180336a7', 'atlantico', 'barranquilla', '', 2, '2021-12-25 12:25:47', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla db_api_php_vue.usuarios_token
CREATE TABLE IF NOT EXISTS `usuarios_token` (
  `TokenId` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioId` varchar(45) DEFAULT NULL,
  `Token` varchar(250) DEFAULT NULL,
  `Estado` varchar(45) CHARACTER SET armscii8 DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`TokenId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla db_api_php_vue.usuarios_token: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios_token` DISABLE KEYS */;
INSERT INTO `usuarios_token` (`TokenId`, `UsuarioId`, `Token`, `Estado`, `Fecha`) VALUES
	(6, '1', 'e78819629982106e3496746c3e05283e', 'Activo', '2021-09-27 20:19:00'),
	(7, '1', 'b32c8e50a30df2cdec22c5ef8510574d', 'Activo', '2021-09-28 15:44:00'),
	(8, '6', 'e02ba4b575db4b5a5e2f-b9576306575445656701-1da8c43144db3b7fa206-6cddbbb4472d97de784c', 'Activo', '2021-09-28 21:53:00'),
	(9, '3', '0e363585677c27dc0fd1-a00b0a53a14b51939700-ab6937d3aca028a457be-6bc15a98ab0677e39e42', 'Activo', '2021-09-29 19:06:00'),
	(11, '1', '4c4f4affd58d4f28e9f6-000472107329c4c62110-24d5e473d5133c7edc2d-84212a8f145fd3650ba9', 'Activo', '2021-12-25 01:01:00'),
	(37, '14', '8ff76ce78f48694b1c87-5e93d8c6bb7409f30953-5ff6f2716f1239517e3f-83c6874e0f931c7fab0b', 'Activo', '2021-12-27 13:09:00'),
	(38, '14', '7adac1229b2b3d176788-96bbcc35bb0839021c66-766d23f3629da9b4c005-7c545b2026a4fefd01fc', 'Activo', '2021-12-27 13:27:00'),
	(39, '14', '0d3ae534ebd54e236144-23176e8bf0af686e0d61-c6010ad11973131fa9f3-d43e02e56e5ec686037f', 'Activo', '2021-12-27 14:06:00'),
	(40, '14', 'cf04be428860700cd75d-549126a2f45949fe65cd-41bbc91f09f034fca837-dacdb6a240f8eb790b19', 'Activo', '2021-12-27 14:06:00'),
	(41, '14', '3c52de1c3b41af673047-5c310449ef980f365bcb-a62f314cbf5904a1a1a5-760972c7ba81a15328ad', 'Activo', '2021-12-27 15:31:00'),
	(42, '14', '0f3752a265ea248b4d86-7a5d7787203f57f7dfa0-90b0145494498121f88b-31117eda8ad80d7676ef', 'Activo', '2021-12-27 16:49:00'),
	(43, '14', '9eaf56ff841261b58e1b-ccb627be8fed09ff7cac-e4b4663b7f77c6eab392-92603a6ae96b164d676a', 'Activo', '2021-12-28 13:16:00'),
	(44, '14', '08560bc0dbe7e03ab032-5362add51efc30c42ce2-b099b91fda39d485a2e8-7f291336e7782ddf8c8e', 'Activo', '2021-12-28 19:10:00'),
	(45, '14', '1d108247bdbe58cfba83-1cbbdf53ba571de4c53a-1384c054b6b75d83f6a3-3efff3b2375fc135d4ef', 'Activo', '2021-12-29 13:17:00'),
	(46, '14', 'd5d0fed1860f990dbabb-9bfc5dc6fac4f4640a66-c054692e4b690ba20776-6e659ae93dd415479173', 'Activo', '2021-12-29 17:20:00');
/*!40000 ALTER TABLE `usuarios_token` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
