-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 22-06-2016 a las 21:29:06
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `osmed`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `bodegas`
-- 

CREATE TABLE `bodegas` (
  `idbodegas` int(40) NOT NULL,
  `nombre` varchar(20) collate latin1_spanish_ci NOT NULL,
  `direccion` varchar(30) collate latin1_spanish_ci NOT NULL,
  `descripcion` varchar(30) collate latin1_spanish_ci NOT NULL,
  PRIMARY KEY  (`idbodegas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `bodegas`
-- 

INSERT INTO `bodegas` VALUES (1, 'bodega1', 'calle 39 23-34', 'hola');
INSERT INTO `bodegas` VALUES (2, 'bodega2', 'cr 45 # 56-67', 'hola');
INSERT INTO `bodegas` VALUES (1023911054, 'DAVID INFANTE', 'CDACDSC', 'PROVEEDOR');
INSERT INTO `bodegas` VALUES (1030570356, 'Alejandro Moreno', 'bodega de alejandro moreno', 'CL 38 A 50 A 71 SUR');
INSERT INTO `bodegas` VALUES (2147483647, 'alejandro ', '123123', 'cliente');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `ciudades`
-- 

CREATE TABLE `ciudades` (
  `idciudades` int(15) NOT NULL,
  `iddepartamento` int(15) NOT NULL,
  `nombre` varchar(15) collate latin1_spanish_ci NOT NULL,
  `codigo` varchar(15) collate latin1_spanish_ci NOT NULL,
  PRIMARY KEY  (`idciudades`),
  KEY `iddepartamento` (`iddepartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `ciudades`
-- 

INSERT INTO `ciudades` VALUES (1, 1, 'Bogota', '1');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `departamento`
-- 

CREATE TABLE `departamento` (
  `iddepartamento` int(15) NOT NULL,
  `nombre` varchar(15) collate latin1_spanish_ci NOT NULL,
  `codigo` varchar(15) collate latin1_spanish_ci NOT NULL,
  PRIMARY KEY  (`iddepartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `departamento`
-- 

INSERT INTO `departamento` VALUES (1, 'Cundinamarca', '12');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `historial`
-- 

CREATE TABLE `historial` (
  `idhistorial` int(15) NOT NULL auto_increment,
  `iduser` int(15) NOT NULL,
  `ip` varchar(20) collate latin1_spanish_ci NOT NULL,
  `fecha` varchar(15) collate latin1_spanish_ci NOT NULL,
  PRIMARY KEY  (`idhistorial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=78 ;

-- 
-- Volcar la base de datos para la tabla `historial`
-- 

INSERT INTO `historial` VALUES (1, 1, '123', '2016-04-06');
INSERT INTO `historial` VALUES (2, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (3, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (4, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (5, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (6, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (7, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (8, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (9, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (10, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (11, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (12, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (13, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (14, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (15, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (16, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (17, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (18, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (19, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (20, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (21, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (22, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (23, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (24, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (25, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (26, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (27, 1023911054, '::1', '2016-04-22');
INSERT INTO `historial` VALUES (28, 1023911054, '::1', '2016-05-24');
INSERT INTO `historial` VALUES (29, 1023911054, '::1', '2016-05-24');
INSERT INTO `historial` VALUES (30, 1023911054, '::1', '2016-05-24');
INSERT INTO `historial` VALUES (31, 1023911054, '::1', '2016-05-24');
INSERT INTO `historial` VALUES (32, 1023911054, '::1', '2016-05-24');
INSERT INTO `historial` VALUES (33, 1023911054, '::1', '2016-05-25');
INSERT INTO `historial` VALUES (34, 1023911054, '::1', '2016-05-25');
INSERT INTO `historial` VALUES (35, 1023911054, '::1', '2016-05-26');
INSERT INTO `historial` VALUES (36, 1023911054, '::1', '2016-05-26');
INSERT INTO `historial` VALUES (37, 1023911054, '::1', '2016-05-26');
INSERT INTO `historial` VALUES (38, 1023911054, '::1', '2016-05-26');
INSERT INTO `historial` VALUES (39, 1023911054, '192.168.0.14', '2016-05-26');
INSERT INTO `historial` VALUES (40, 1023911054, '192.168.0.23', '2016-06-01');
INSERT INTO `historial` VALUES (41, 1023911054, '192.168.0.14', '2016-06-01');
INSERT INTO `historial` VALUES (42, 53055373, '192.168.0.14', '2016-06-01');
INSERT INTO `historial` VALUES (43, 53055373, '192.168.0.14', '2016-06-01');
INSERT INTO `historial` VALUES (44, 79596152, '192.168.0.14', '2016-06-01');
INSERT INTO `historial` VALUES (45, 53055373, '192.168.0.14', '2016-06-03');
INSERT INTO `historial` VALUES (46, 53055373, '192.168.0.14', '2016-06-03');
INSERT INTO `historial` VALUES (47, 1023911054, '192.168.0.7', '2016-06-03');
INSERT INTO `historial` VALUES (48, 1023911054, '192.168.0.25', '2016-06-03');
INSERT INTO `historial` VALUES (49, 1023911054, '192.168.0.25', '2016-06-03');
INSERT INTO `historial` VALUES (50, 1030570356, '192.168.0.25', '2016-06-03');
INSERT INTO `historial` VALUES (51, 1023911054, '192.168.0.7', '2016-06-03');
INSERT INTO `historial` VALUES (52, 1023911054, '192.168.0.7', '2016-06-03');
INSERT INTO `historial` VALUES (53, 1030570356, '192.168.0.25', '2016-06-03');
INSERT INTO `historial` VALUES (54, 1023911054, '192.168.0.29', '2016-06-08');
INSERT INTO `historial` VALUES (55, 80248331, '192.168.0.22', '2016-06-08');
INSERT INTO `historial` VALUES (56, 1023911054, '192.168.0.22', '2016-06-08');
INSERT INTO `historial` VALUES (57, 80248331, '192.168.0.22', '2016-06-08');
INSERT INTO `historial` VALUES (58, 1030570356, '192.168.0.33', '2016-06-08');
INSERT INTO `historial` VALUES (59, 1023911054, '192.168.0.7', '2016-06-08');
INSERT INTO `historial` VALUES (60, 1030570356, '192.168.0.7', '2016-06-08');
INSERT INTO `historial` VALUES (61, 1023911054, '192.168.0.4', '2016-06-08');
INSERT INTO `historial` VALUES (62, 1023911054, '192.168.0.3', '2016-06-09');
INSERT INTO `historial` VALUES (63, 53055373, '192.168.0.3', '2016-06-09');
INSERT INTO `historial` VALUES (64, 1023911054, '::1', '2016-06-09');
INSERT INTO `historial` VALUES (65, 1030570356, '192.168.0.7', '2016-06-09');
INSERT INTO `historial` VALUES (66, 53055373, '::1', '2016-06-10');
INSERT INTO `historial` VALUES (67, 1023911054, '192.168.0.17', '2016-06-13');
INSERT INTO `historial` VALUES (68, 1030570356, '192.168.0.7', '2016-06-13');
INSERT INTO `historial` VALUES (69, 1023911054, '::1', '2016-06-13');
INSERT INTO `historial` VALUES (70, 1023911054, '::1', '2016-06-16');
INSERT INTO `historial` VALUES (71, 1030570356, '192.168.0.17', '2016-06-17');
INSERT INTO `historial` VALUES (72, 1030570356, '127.0.0.1', '2016-06-20');
INSERT INTO `historial` VALUES (73, 1030570356, '127.0.0.1', '2016-06-21');
INSERT INTO `historial` VALUES (74, 1030570356, '127.0.0.1', '2016-06-22');
INSERT INTO `historial` VALUES (75, 1030570356, '127.0.0.1', '2016-06-22');
INSERT INTO `historial` VALUES (76, 1030570356, '127.0.0.1', '2016-06-22');
INSERT INTO `historial` VALUES (77, 1030570356, '127.0.0.1', '2016-06-22');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `inventario`
-- 

CREATE TABLE `inventario` (
  `idinventario` int(15) NOT NULL auto_increment,
  `idbodega` int(15) NOT NULL,
  `ncedula` int(15) NOT NULL,
  `idmarcas` int(15) NOT NULL,
  `idlineas` int(15) NOT NULL,
  `referencia` varchar(15) collate latin1_spanish_ci NOT NULL,
  `descripcion` varchar(100) collate latin1_spanish_ci NOT NULL,
  `numerolote` varchar(15) collate latin1_spanish_ci NOT NULL,
  `tipopresentacion` varchar(15) collate latin1_spanish_ci NOT NULL,
  `stockminimo` int(4) NOT NULL,
  `stockmaximo` int(4) NOT NULL,
  `precio` double NOT NULL,
  `costo` double NOT NULL,
  `estado` varchar(30) collate latin1_spanish_ci NOT NULL,
  `saldo` int(15) NOT NULL,
  `fechadevencimiento` varchar(15) collate latin1_spanish_ci NOT NULL,
  `iva` int(11) NOT NULL,
  `fechamodificado` varchar(15) collate latin1_spanish_ci NOT NULL,
  PRIMARY KEY  (`idinventario`),
  KEY `ncedula` (`ncedula`),
  KEY `idmarca` (`idmarcas`),
  KEY `idlineas` (`idlineas`),
  KEY `idbodega` (`idbodega`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=11 ;

-- 
-- Volcar la base de datos para la tabla `inventario`
-- 

INSERT INTO `inventario` VALUES (7, 1030570356, 1030570356, 123, 6, '456', 'producto1', '456', 'UNIDAD', 10, 100, 2000, 76.012640737, 'ACTIVO', 3508, '2016-12-31', 16, '');
INSERT INTO `inventario` VALUES (8, 1, 1030570356, 123, 6, '123', '123', '123', '123', 1, 10, 0, 113.9375, '1', 226, '2016-12-31', 0, '');
INSERT INTO `inventario` VALUES (9, 1, 1030570356, 123, 6, '789', 'PRODUCTO 789', '789', 'UNIDAD', 10, 100, 0, 687.5, '1', 120, '2016-12-31', 16, '2016-06-20 (19:');
INSERT INTO `inventario` VALUES (10, 1, 1030570356, 123, 6, '159159', 'PRODUCTO 159159', '159159', 'UNIDAD', 10, 1000, 0, 500, '1', 0, '2016-06-23', 16, '2016-06-20 (19:');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `kardex`
-- 

CREATE TABLE `kardex` (
  `idkardex` int(11) NOT NULL auto_increment,
  `producto` int(11) NOT NULL,
  `documento` varchar(45) NOT NULL COMMENT 'numero de documento de venta,compra,ajuste,remision,salida,todo_tipo_de_doc',
  `fecha_creacion_documento` varchar(45) NOT NULL,
  `hora_creacion_documento` varchar(45) NOT NULL,
  `bodega_salida` int(11) NOT NULL,
  `bodega_entrada` int(11) NOT NULL,
  `usuario_salida` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `precio` float NOT NULL,
  `costo` float NOT NULL,
  `cliente` int(11) NOT NULL,
  `saldo_anterior` float NOT NULL,
  `entrada` float NOT NULL,
  `salida` float NOT NULL,
  `saldo_nuevo` float NOT NULL,
  `concepto` varchar(45) NOT NULL COMMENT 'venta,compra,ajuste,remision,salida,todo_tipo_de_doc',
  `signo` varchar(45) NOT NULL COMMENT 'negativo,positivo',
  PRIMARY KEY  (`idkardex`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Volcar la base de datos para la tabla `kardex`
-- 

INSERT INTO `kardex` VALUES (2, 7, 'R17', '2016-06-22', '21:15:41', 1, 1030570356, 0, 10, 1, 76.0126, 1030570356, 3538, 0, 10, 3528, 'REMISION', '-');
INSERT INTO `kardex` VALUES (3, 7, 'R17', '2016-06-22', '21:15:41', 1, 1030570356, 0, 20, 1, 76.0126, 1030570356, 3528, 0, 20, 3508, 'REMISION', '-');
INSERT INTO `kardex` VALUES (4, 7, 'O23', '2016-06-22', '21:22:24', 1, 1030570356, 0, 10, 0, 76.0126, 1030570356, 3508, 10, 10, 3508, 'ORDEN', '-');
INSERT INTO `kardex` VALUES (5, 7, 'O23', '2016-06-22', '21:22:24', 1, 1030570356, 0, 20, 0, 76.0126, 1030570356, 3508, 20, 20, 3508, 'ORDEN', '-');
INSERT INTO `kardex` VALUES (6, 9, 'C787', '2016-06-22', '21:26:01', 1023911054, 1, 0, 100, 500, 875, 1023911054, 20, 100, 0, 120, 'COMPRA', '+');
INSERT INTO `kardex` VALUES (7, 7, 'H89', '2016-06-22', '21:28:35', 1, 1030570356, 0, 10, 1000, 76.0126, 1030570356, 3508, 0, 10, 3498, 'HOJADEGASTO', '-');
INSERT INTO `kardex` VALUES (8, 7, 'H89', '2016-06-22', '21:28:35', 1, 1030570356, 0, 30, 1000, 76.0126, 1030570356, 3508, 0, 30, 3478, 'HOJADEGASTO', '-');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `lineas`
-- 

CREATE TABLE `lineas` (
  `idlineas` int(15) NOT NULL auto_increment,
  `nombre` varchar(15) collate latin1_spanish_ci NOT NULL,
  `descripcion` varchar(100) collate latin1_spanish_ci NOT NULL,
  PRIMARY KEY  (`idlineas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `lineas`
-- 

INSERT INTO `lineas` VALUES (6, 'BIOMATERIALES ', 'Biomateriales ');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `marcas`
-- 

CREATE TABLE `marcas` (
  `idmarcas` int(15) NOT NULL auto_increment,
  `idtercero` int(15) NOT NULL,
  `nombre` varchar(15) collate latin1_spanish_ci NOT NULL,
  `descripcion` varchar(100) collate latin1_spanish_ci NOT NULL,
  PRIMARY KEY  (`idmarcas`),
  KEY `idtercero` (`idtercero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=124 ;

-- 
-- Volcar la base de datos para la tabla `marcas`
-- 

INSERT INTO `marcas` VALUES (123, 2, 'GENERICA', 'Marca genÃ©rica ');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `observaciones`
-- 

CREATE TABLE `observaciones` (
  `id_observacion` int(11) NOT NULL auto_increment,
  `idusuario` int(11) NOT NULL,
  `documento` varchar(15) collate latin1_spanish_ci NOT NULL,
  `observacion` varchar(700) collate latin1_spanish_ci NOT NULL,
  `fecha` varchar(15) collate latin1_spanish_ci NOT NULL,
  PRIMARY KEY  (`id_observacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=9 ;

-- 
-- Volcar la base de datos para la tabla `observaciones`
-- 

INSERT INTO `observaciones` VALUES (1, 1, '1', '1', '1');
INSERT INTO `observaciones` VALUES (2, 1030570356, 'Seleccione Docu', '', '2016-06-21');
INSERT INTO `observaciones` VALUES (3, 1030570356, 'Seleccione Docu', '', '2016-06-21');
INSERT INTO `observaciones` VALUES (4, 1030570356, 'C89', 'esta totalmente aprobado este documento', '2016-06-21');
INSERT INTO `observaciones` VALUES (5, 1030570356, 'C89', 'esta totalmente aprobado este documento', '2016-06-21');
INSERT INTO `observaciones` VALUES (6, 1030570356, 'O89', 'este documento ya esta aprobado ', '2016-06-21');
INSERT INTO `observaciones` VALUES (7, 1030570356, 'R15', 'este ya fue aprobada ', '2016-06-21');
INSERT INTO `observaciones` VALUES (8, 1030570356, 'O11', 'esta aun esta en proceso ', '2016-06-21');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pacientes`
-- 

CREATE TABLE `pacientes` (
  `idpaciente` int(15) NOT NULL auto_increment,
  `nombrecirujano` varchar(20) collate latin1_spanish_ci NOT NULL,
  `nombrepaciente` varchar(20) collate latin1_spanish_ci NOT NULL,
  `numerodecedulapaciente` int(15) NOT NULL,
  `historiaclinica` varchar(20) collate latin1_spanish_ci NOT NULL,
  `fechacirujia` varchar(15) collate latin1_spanish_ci NOT NULL,
  `fechamodificado` varchar(15) collate latin1_spanish_ci NOT NULL,
  PRIMARY KEY  (`idpaciente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=72 ;

-- 
-- Volcar la base de datos para la tabla `pacientes`
-- 

INSERT INTO `pacientes` VALUES (3, '', '', 0, '', '', '');
INSERT INTO `pacientes` VALUES (4, '1', '1', 1, '1', '1', '');
INSERT INTO `pacientes` VALUES (5, '', '', 0, '', '', '');
INSERT INTO `pacientes` VALUES (6, '', '', 0, '', '', '');
INSERT INTO `pacientes` VALUES (7, '', '', 0, '', '', '');
INSERT INTO `pacientes` VALUES (8, 'nobre', 'nombre', 1030570356, '32142151', '12251', '');
INSERT INTO `pacientes` VALUES (9, '1212', '7878', 145644, '1212', '1212', '');
INSERT INTO `pacientes` VALUES (10, '1212', '7878', 145644, '1212', '1212', '');
INSERT INTO `pacientes` VALUES (11, '123', '123', 123, '123', '123', '');
INSERT INTO `pacientes` VALUES (12, '123', '123', 123, '123', '123', '');
INSERT INTO `pacientes` VALUES (13, '123', '12', 121, '1231', '212', '');
INSERT INTO `pacientes` VALUES (14, '789', '9789', 97878, '789', '789', '');
INSERT INTO `pacientes` VALUES (15, '23123', '1231', 2313, '123', '1231', '');
INSERT INTO `pacientes` VALUES (16, '', '', 0, '', '', '');
INSERT INTO `pacientes` VALUES (17, '', '', 0, '', '', '');
INSERT INTO `pacientes` VALUES (18, '', '', 0, '', '', '');
INSERT INTO `pacientes` VALUES (19, '1231', '1231', 1030570356, '12313', '123123', '');
INSERT INTO `pacientes` VALUES (20, '1231', '1231', 1030570356, '12313', '123123', '');
INSERT INTO `pacientes` VALUES (21, '1231', '1231', 1030570356, '12313', '123123', '');
INSERT INTO `pacientes` VALUES (22, '1231', '1231', 1030570356, '12313', '123123', '');
INSERT INTO `pacientes` VALUES (23, '', '', 1030570356, '', '', '');
INSERT INTO `pacientes` VALUES (24, '', '', 1030570356, '', '', '');
INSERT INTO `pacientes` VALUES (25, '', '', 1030570356, '', '', '');
INSERT INTO `pacientes` VALUES (26, '', '', 1030570356, '', '', '');
INSERT INTO `pacientes` VALUES (27, '', '', 1030570356, '', '', '');
INSERT INTO `pacientes` VALUES (28, 'cirujano1', 'nombre1', 1030570356, '12345312.', '12121212', '');
INSERT INTO `pacientes` VALUES (29, 'JARA', 'JENNY ', 53055373, '53055373', '09/06/2016', '');
INSERT INTO `pacientes` VALUES (30, 'JARA', 'JENNY ', 53055373, '53055373', '09/06/2016', '');
INSERT INTO `pacientes` VALUES (31, 'JARA', 'JENNY ', 53055373, '53055373', '09/06/2016', '');
INSERT INTO `pacientes` VALUES (32, 'nombre2', 'nombre1', 1030570356, '12345123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (33, ',ljkl', 'nipj', 1030570356, '123453123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (34, ',ljkl', 'nipj', 1030570356, '123453123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (35, ',ljkl', 'nipj', 1030570356, '123453123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (36, ',ljkl', 'nipj', 1030570356, '123453123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (37, ',ljkl', 'nipj', 1030570356, '123453123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (38, ',ljkl', 'nipj', 1030570356, '123453123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (39, ',ljkl', 'nipj', 1030570356, '123453123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (40, '123123', '12312', 1030570356, '1231', '2016-12-02', '');
INSERT INTO `pacientes` VALUES (41, '123123', '12312', 1030570356, '1231', '2016-12-02', '');
INSERT INTO `pacientes` VALUES (42, '123123', '12312', 1030570356, '1231', '2016-12-02', '');
INSERT INTO `pacientes` VALUES (43, 'a', 'a', 2016, 'a', 'a', '');
INSERT INTO `pacientes` VALUES (44, 'a', 'a', 2016, 'a', 'a', '');
INSERT INTO `pacientes` VALUES (45, 'nombrecirujano', 'nombrepaciente', 1030570356, '7845648', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (46, 'nombrecirujano', 'nombrepaciente', 1030570356, '123435123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (47, 'nombrecirujano', 'nombrepaciente', 1030570356, '123435123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (48, 'nombrecirujano', 'nombrepaciente', 1030570356, '123435123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (49, 'nombrecirujano', 'nombrepaciente', 1030570356, '123435123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (50, '', '', 0, '', '2016-06-10', '');
INSERT INTO `pacientes` VALUES (51, '', '', 0, '', '2016-06-10', '');
INSERT INTO `pacientes` VALUES (52, 'LOAIZA', 'JENNY', 53055373, '53055373', '2016-06-10', '');
INSERT INTO `pacientes` VALUES (53, 'LOAIZA', 'JENNY', 53055373, '53055373', '2016-06-10', '');
INSERT INTO `pacientes` VALUES (54, 'LOAIZA', 'JENNY', 53055373, '53055373', '2016-06-10', '');
INSERT INTO `pacientes` VALUES (55, '', '', 0, '', '', '');
INSERT INTO `pacientes` VALUES (56, '', '', 0, '', '', '');
INSERT INTO `pacientes` VALUES (57, 'a', 'a', 2016, 'a', 'a', '');
INSERT INTO `pacientes` VALUES (58, 'nombre2', 'nombre1', 1030570356, '1030570356', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (59, 'nombre2', 'nombre1', 1030570356, '1030570356', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (60, 'nombre2', 'nombre1', 1030570356, '1030570356', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (61, 'nombre2', 'nombre1', 1030570356, '123123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (62, 'nombre2', 'nombre1', 1030570356, '123123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (63, 'nombre2', 'nombre1', 1030570356, '123123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (64, 'nombre2', 'nombre1', 1030570356, '123123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (65, 'nombre2', 'nombre1', 1030570356, '123123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (66, 'nombre2', 'nombre1', 1030570356, '123123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (67, 'nombre2', 'nombre1', 1030570356, '123123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (68, 'nombre2', 'nombre1', 1030570356, '123123', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (69, 'nombre2', 'nombre1', 1030570356, '20121215', '2016-12-31', '');
INSERT INTO `pacientes` VALUES (70, '123', '123', 1030570356, '123', '2016-03-12', '');
INSERT INTO `pacientes` VALUES (71, '123', '3123', 12, '123', '0123-03-12', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pedidos`
-- 

CREATE TABLE `pedidos` (
  `idpedido` int(15) NOT NULL auto_increment,
  `referencia` varchar(30) collate latin1_spanish_ci NOT NULL,
  `nombre` varchar(15) collate latin1_spanish_ci NOT NULL,
  `cantidad` int(15) NOT NULL,
  `fechapedido` varchar(20) collate latin1_spanish_ci NOT NULL,
  `estado` varchar(20) collate latin1_spanish_ci NOT NULL,
  `idusuario` int(15) NOT NULL,
  `observaciones` varchar(100) collate latin1_spanish_ci NOT NULL,
  PRIMARY KEY  (`idpedido`),
  KEY `idusuario` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `pedidos`
-- 

INSERT INTO `pedidos` VALUES (1, '346578080890', '346578080890', 2147483647, '2016-06-01', '', 1023911054, 'observaciones');
INSERT INTO `pedidos` VALUES (2, '3', 'dd', 5, '2016-06-01', '', 1023911054, 'observaciones');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `remision`
-- 

CREATE TABLE `remision` (
  `idremision` int(15) NOT NULL auto_increment,
  `idsalida` int(15) NOT NULL,
  `idbodega` int(15) NOT NULL,
  `idpaciente` int(15) NOT NULL,
  `idusuario` int(15) NOT NULL,
  `idclientes` int(15) NOT NULL,
  `fecha` varchar(15) collate latin1_spanish_ci NOT NULL,
  `subtotal` int(15) NOT NULL,
  `iva` int(15) NOT NULL,
  `descuento` int(15) NOT NULL,
  `fletes` int(15) NOT NULL,
  `estado` varchar(15) collate latin1_spanish_ci NOT NULL,
  `retefuente` varchar(15) collate latin1_spanish_ci NOT NULL,
  `total` int(15) NOT NULL,
  `documento` varchar(20) collate latin1_spanish_ci NOT NULL,
  `observacioneliminado` varchar(250) collate latin1_spanish_ci default NULL,
  PRIMARY KEY  (`idremision`),
  KEY `idsalida` (`idsalida`),
  KEY `idbodega` (`idbodega`,`idpaciente`,`idusuario`,`idclientes`),
  KEY `idusuario` (`idusuario`),
  KEY `idclientes` (`idclientes`),
  KEY `idpaciente` (`idpaciente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=78 ;

-- 
-- Volcar la base de datos para la tabla `remision`
-- 

INSERT INTO `remision` VALUES (23, 66, 1, 43, 1030570356, 8, '2016-06-13', 70000, 0, 0, 0, '2', '0', 70000, 'C11251', NULL);
INSERT INTO `remision` VALUES (24, 72, 1, 43, 1030570356, 8, '2016-06-13', 120000, 0, 0, 0, '2', '0', 120000, 'C51', NULL);
INSERT INTO `remision` VALUES (25, 74, 1, 43, 1030570356, 8, '2016-06-13', 100000, 0, 0, 0, '1', '0', 100000, 'C78', NULL);
INSERT INTO `remision` VALUES (26, 77, 1, 43, 1030570356, 8, '2016-06-13', 21000, 0, 0, 0, '2', '0', 21000, 'C89', NULL);
INSERT INTO `remision` VALUES (27, 77, 1, 43, 1030570356, 8, '2016-06-13', 21000, 0, 0, 0, '2', '0', 21000, 'C89', NULL);
INSERT INTO `remision` VALUES (28, 81, 1, 8, 1030570356, 2, '2016-06-13', 40000, 0, 0, 0, '2', '0', 40000, 'R89', NULL);
INSERT INTO `remision` VALUES (31, 86, 1, 8, 1030570356, 2, '2016-06-13', 0, 0, 0, 0, '2', '0', 0, 'O89', NULL);
INSERT INTO `remision` VALUES (32, 86, 1, 8, 1030570356, 2, '2016-06-13', 0, 0, 0, 0, '2', '0', 0, 'O89', NULL);
INSERT INTO `remision` VALUES (33, 83, 1, 8, 1030570356, 2, '2016-06-13', 40000, 0, 0, 0, '1', '0', 40000, 'HR89', NULL);
INSERT INTO `remision` VALUES (34, 85, 1, 8, 1030570356, 2, '2016-06-13', 30000, 0, 0, 0, '1', '0', 30000, 'H89', NULL);
INSERT INTO `remision` VALUES (35, 87, 1, 43, 1030570356, 8, '2016-06-20', 629600, 0, 0, 0, '1', '0', 629600, 'C10', NULL);
INSERT INTO `remision` VALUES (36, 89, 1, 8, 1030570356, 2, '2016-06-20', 0, 0, 0, 0, '1', '0', 0, 'O10', NULL);
INSERT INTO `remision` VALUES (37, 91, 1, 8, 1030570356, 2, '2016-06-20', 3394000, 0, 0, 0, '1', '0', 3394000, 'R10', NULL);
INSERT INTO `remision` VALUES (38, 93, 1, 8, 1030570356, 2, '2016-06-20', 10000, 0, 0, 0, '1', '0', 10000, 'H10', NULL);
INSERT INTO `remision` VALUES (39, 93, 1, 8, 1030570356, 2, '2016-06-20', 246000, 0, 0, 0, '1', '0', 246000, 'H10', NULL);
INSERT INTO `remision` VALUES (40, 93, 1, 8, 1030570356, 2, '2016-06-20', 246000, 0, 0, 0, '1', '0', 246000, 'H10', NULL);
INSERT INTO `remision` VALUES (41, 93, 1, 8, 1030570356, 2, '2016-06-20', 254000, 0, 0, 0, '1', '0', 254000, 'H10', NULL);
INSERT INTO `remision` VALUES (42, 93, 1, 8, 1030570356, 2, '2016-06-20', 254000, 0, 0, 0, '1', '0', 254000, 'H10', NULL);
INSERT INTO `remision` VALUES (43, 93, 1, 8, 1030570356, 2, '2016-06-20', 254000, 0, 0, 0, '1', '0', 254000, 'H10', NULL);
INSERT INTO `remision` VALUES (44, 105, 1, 43, 1030570356, 8, '2016-06-20', 50000, 0, 0, 0, '1', '0', 50000, 'C11', NULL);
INSERT INTO `remision` VALUES (47, 108, 1, 8, 1030570356, 2, '2016-06-20', 0, 0, 0, 0, '3', '0', 0, 'O11', NULL);
INSERT INTO `remision` VALUES (48, 109, 1, 8, 1030570356, 2, '2016-06-20', 200000, 0, 0, 0, '1', '0', 200000, 'R11', NULL);
INSERT INTO `remision` VALUES (49, 110, 1, 43, 1030570356, 8, '2016-06-20', 50000, 0, 0, 0, '1', '0', 50000, 'C12', NULL);
INSERT INTO `remision` VALUES (50, 111, 1, 8, 1030570356, 2, '2016-06-20', 0, 0, 0, 0, 'pendiente', '0', 0, 'O12', NULL);
INSERT INTO `remision` VALUES (51, 112, 1, 8, 1030570356, 2, '2016-06-20', 200000, 0, 0, 0, '1', '0', 200000, 'R12', NULL);
INSERT INTO `remision` VALUES (52, 112, 1, 8, 1030570356, 2, '2016-06-20', 200000, 0, 0, 0, '1', '0', 200000, 'R12', NULL);
INSERT INTO `remision` VALUES (53, 114, 1, 8, 1030570356, 2, '2016-06-20', 40000, 0, 0, 0, '1', '0', 40000, 'H12', NULL);
INSERT INTO `remision` VALUES (54, 116, 1, 43, 1030570356, 8, '2016-06-20', 50000, 0, 0, 0, '1', '0', 50000, 'C123', NULL);
INSERT INTO `remision` VALUES (55, 117, 1, 11, 1030570356, 2, '2016-06-20', 0, 0, 0, 0, '1', '0', 0, 'O13', NULL);
INSERT INTO `remision` VALUES (56, 118, 1, 11, 1030570356, 2, '2016-06-20', 198000, 0, 0, 0, '1', '0', 198000, 'R13', NULL);
INSERT INTO `remision` VALUES (57, 119, 1, 11, 1030570356, 2, '2016-06-20', 58000, 0, 0, 0, '1', '0', 58000, 'H13', NULL);
INSERT INTO `remision` VALUES (58, 120, 1, 11, 1030570356, 2, '2016-06-20', 169000, 0, 0, 0, '1', '0', 169000, 'R14', NULL);
INSERT INTO `remision` VALUES (59, 121, 1, 11, 1030570356, 2, '2016-06-20', 169000, 0, 0, 0, '1', '0', 169000, 'H14', NULL);
INSERT INTO `remision` VALUES (60, 122, 1, 8, 1030570356, 2, '2016-06-20', 7840000, 0, 0, 0, '2', '0', 7840000, 'R15', NULL);
INSERT INTO `remision` VALUES (61, 125, 1, 8, 1030570356, 2, '2016-06-20', 7560000, 0, 0, 0, '1', '0', 7560000, 'H15', NULL);
INSERT INTO `remision` VALUES (62, 128, 1, 43, 1030570356, 8, '2016-06-20', 6000, 0, 0, 0, '1', '0', 6000, 'C16', NULL);
INSERT INTO `remision` VALUES (63, 129, 1, 71, 1030570356, 2, '2016-06-20', 0, 0, 0, 0, 'pendiente', '0', 0, 'O15', NULL);
INSERT INTO `remision` VALUES (64, 122, 1, 71, 1030570356, 2, '2016-06-20', 20000, 0, 0, 0, '2', '0', 20000, 'R15', NULL);
INSERT INTO `remision` VALUES (65, 131, 1, 11, 1030570356, 2, '2016-06-22', 0, 0, 0, 0, 'pendiente', '0', 0, 'O16', NULL);
INSERT INTO `remision` VALUES (66, 133, 1, 11, 1030570356, 2, '2016-06-22', 0, 0, 0, 0, 'pendiente', '0', 0, 'O17', NULL);
INSERT INTO `remision` VALUES (67, 135, 1, 11, 1030570356, 2, '2016-06-22', 0, 0, 0, 0, 'pendiente', '0', 0, 'O18', NULL);
INSERT INTO `remision` VALUES (68, 147, 1, 43, 1030570356, 8, '2016-06-22', 61030, 0, 0, 0, '1', '0', 61030, 'C30', NULL);
INSERT INTO `remision` VALUES (69, 156, 1, 11, 1030570356, 2, '2016-06-22', 20030, 0, 0, 0, '1', '0', 20030, 'R16', NULL);
INSERT INTO `remision` VALUES (70, 136, 1, 11, 1030570356, 3, '2016-06-22', 0, 0, 0, 0, 'pendiente', '0', 0, 'O19', NULL);
INSERT INTO `remision` VALUES (71, 162, 1, 11, 1030570356, 3, '2016-06-22', 0, 0, 0, 0, 'pendiente', '0', 0, 'O20', NULL);
INSERT INTO `remision` VALUES (72, 165, 1, 11, 1030570356, 2, '2016-06-22', 0, 0, 0, 0, 'pendiente', '0', 0, 'O21', NULL);
INSERT INTO `remision` VALUES (73, 170, 1, 11, 1030570356, 2, '2016-06-22', 0, 0, 0, 0, 'pendiente', '0', 0, 'O22', NULL);
INSERT INTO `remision` VALUES (74, 183, 1, 11, 1030570356, 2, '2016-06-22', 30, 0, 0, 0, '1', '0', 30, 'R17', NULL);
INSERT INTO `remision` VALUES (75, 186, 1, 11, 1030570356, 2, '2016-06-22', 0, 0, 0, 0, '1', '0', 0, 'O23', NULL);
INSERT INTO `remision` VALUES (76, 188, 1, 43, 1030570356, 8, '2016-06-22', 50000, 0, 0, 0, '1', '0', 50000, 'C787', NULL);
INSERT INTO `remision` VALUES (77, 85, 1, 8, 1030570356, 2, '2016-06-13', 40000, 0, 0, 0, '1', '0', 40000, 'H89', NULL);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `salidadeinventario`
-- 

CREATE TABLE `salidadeinventario` (
  `idsalida` int(15) NOT NULL auto_increment,
  `idinventario` int(15) NOT NULL,
  `idkit` varchar(15) collate latin1_spanish_ci NOT NULL,
  `cantidad` int(15) NOT NULL,
  `precio` int(15) NOT NULL,
  `tipo` varchar(15) collate latin1_spanish_ci NOT NULL,
  `lote` varchar(15) collate latin1_spanish_ci default NULL,
  PRIMARY KEY  (`idsalida`),
  KEY `idinventario` (`idinventario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=191 ;

-- 
-- Volcar la base de datos para la tabla `salidadeinventario`
-- 

INSERT INTO `salidadeinventario` VALUES (59, 7, 'kit18547845', 10, 1, 'kit', '');
INSERT INTO `salidadeinventario` VALUES (60, 7, 'kit18547845', 20, 1, 'kit', '');
INSERT INTO `salidadeinventario` VALUES (71, 7, 'R123', 10, 1000, 'Nokit', '');
INSERT INTO `salidadeinventario` VALUES (72, 7, 'C51', 30, 2000, 'compra', '');
INSERT INTO `salidadeinventario` VALUES (73, 7, 'C51', 30, 2000, 'compra', '');
INSERT INTO `salidadeinventario` VALUES (74, 7, 'C78', 10, 1000, 'compra', '');
INSERT INTO `salidadeinventario` VALUES (75, 7, 'C78', 30, 3000, 'compra', '');
INSERT INTO `salidadeinventario` VALUES (77, 7, 'C89', 100, 100, 'compra', '');
INSERT INTO `salidadeinventario` VALUES (78, 7, 'C89', 20, 1000, 'compra', '');
INSERT INTO `salidadeinventario` VALUES (79, 7, 'C89', 10, 100, 'compra', '');
INSERT INTO `salidadeinventario` VALUES (80, 7, 'C89', 20, 1000, 'compra', '');
INSERT INTO `salidadeinventario` VALUES (81, 7, 'R89', 10, 1000, 'Nokit', '');
INSERT INTO `salidadeinventario` VALUES (82, 7, 'R89', 30, 1000, 'Nokit', '');
INSERT INTO `salidadeinventario` VALUES (83, 7, 'HR89', 10, 1000, 'Nokit', '456');
INSERT INTO `salidadeinventario` VALUES (84, 7, 'HR89', 20, 1000, 'Nokit', '456');
INSERT INTO `salidadeinventario` VALUES (85, 7, 'H89', 10, 1000, 'Nokit', '456');
INSERT INTO `salidadeinventario` VALUES (86, 7, 'H89', 20, 1000, 'Nokit', '456');
INSERT INTO `salidadeinventario` VALUES (87, 7, 'C10', 787, 800, 'COMPRA', '456');
INSERT INTO `salidadeinventario` VALUES (88, 7, 'C10', 787, 800, 'COMPRA', '456');
INSERT INTO `salidadeinventario` VALUES (89, 8, 'O10', 123, 0, 'ORDEN', '123');
INSERT INTO `salidadeinventario` VALUES (90, 7, 'O10', 1574, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (91, 8, 'R10', 123, 2000, 'Nokit', '123');
INSERT INTO `salidadeinventario` VALUES (92, 7, 'R10', 1574, 2000, 'Nokit', '456');
INSERT INTO `salidadeinventario` VALUES (93, 8, 'H10', 1, 2000, 'Nokit', '123');
INSERT INTO `salidadeinventario` VALUES (94, 7, 'H10', 4, 2000, 'Nokit', '456');
INSERT INTO `salidadeinventario` VALUES (95, 8, 'H10', 123, 2000, 'Nokit', '123');
INSERT INTO `salidadeinventario` VALUES (96, 7, 'H10', 0, 2000, 'Nokit', '456');
INSERT INTO `salidadeinventario` VALUES (97, 8, 'H10', 123, 2000, 'Nokit', '123');
INSERT INTO `salidadeinventario` VALUES (98, 7, 'H10', 0, 2000, 'Nokit', '456');
INSERT INTO `salidadeinventario` VALUES (99, 8, 'H10', 123, 2000, 'Nokit', '123');
INSERT INTO `salidadeinventario` VALUES (100, 7, 'H10', 4, 2000, 'Nokit', '456');
INSERT INTO `salidadeinventario` VALUES (101, 8, 'H10', 123, 2000, 'Nokit', '123');
INSERT INTO `salidadeinventario` VALUES (102, 7, 'H10', 4, 2000, 'Nokit', '456');
INSERT INTO `salidadeinventario` VALUES (103, 8, 'H10', 123, 2000, 'Nokit', '123');
INSERT INTO `salidadeinventario` VALUES (104, 7, 'H10', 4, 2000, 'Nokit', '456');
INSERT INTO `salidadeinventario` VALUES (105, 9, 'C11', 100, 500, 'COMPRA', '789');
INSERT INTO `salidadeinventario` VALUES (108, 9, 'O11', 300, 0, 'ORDEN', '789');
INSERT INTO `salidadeinventario` VALUES (109, 9, 'R11', 100, 2000, 'Nokit', '789');
INSERT INTO `salidadeinventario` VALUES (110, 10, 'C12', 100, 500, 'COMPRA', '159159');
INSERT INTO `salidadeinventario` VALUES (111, 10, 'O12', 200, 0, 'ORDEN', '159159');
INSERT INTO `salidadeinventario` VALUES (112, 10, 'R12', 100, 2000, 'Nokit', '159159');
INSERT INTO `salidadeinventario` VALUES (113, 10, 'R12', 100, 2000, 'Nokit', '159159');
INSERT INTO `salidadeinventario` VALUES (114, 10, 'H12', 0, 2000, 'Nokit', '159159');
INSERT INTO `salidadeinventario` VALUES (115, 10, 'H12', 20, 2000, 'Nokit', '159159');
INSERT INTO `salidadeinventario` VALUES (116, 8, 'C123', 100, 500, 'COMPRA', '123');
INSERT INTO `salidadeinventario` VALUES (117, 8, 'O13', 100, 0, 'ORDEN', '123');
INSERT INTO `salidadeinventario` VALUES (118, 8, 'R13', 99, 2000, 'REMISION', '123');
INSERT INTO `salidadeinventario` VALUES (119, 8, 'H13', 29, 2000, 'Nokit', '123');
INSERT INTO `salidadeinventario` VALUES (120, 8, 'R14', 169, 1000, 'REMISION', '123');
INSERT INTO `salidadeinventario` VALUES (121, 8, 'H14', 169, 1000, 'HOJADEGASTO', '123');
INSERT INTO `salidadeinventario` VALUES (122, 10, 'R15', 180, 2000, 'REMISION', '159159');
INSERT INTO `salidadeinventario` VALUES (123, 9, 'R15', 300, 4000, 'REMISION', '789');
INSERT INTO `salidadeinventario` VALUES (124, 7, 'R15', 1570, 4000, 'REMISION', '456');
INSERT INTO `salidadeinventario` VALUES (125, 10, 'H15', 180, 2000, 'HOJADEGASTO', '159159');
INSERT INTO `salidadeinventario` VALUES (126, 9, 'H15', 300, 4000, 'HOJADEGASTO', '789');
INSERT INTO `salidadeinventario` VALUES (127, 7, 'H15', 1500, 4000, 'HOJADEGASTO', '456');
INSERT INTO `salidadeinventario` VALUES (128, 8, 'C16', 10, 600, 'COMPRA', '123');
INSERT INTO `salidadeinventario` VALUES (129, 8, 'O15', 20, 0, 'ORDEN', '123');
INSERT INTO `salidadeinventario` VALUES (130, 8, 'R15', 10, 2000, 'REMISION', '123');
INSERT INTO `salidadeinventario` VALUES (131, 7, 'O16', 10, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (132, 10, 'O16', 10, 0, 'ORDEN', '159159');
INSERT INTO `salidadeinventario` VALUES (133, 7, 'O17', 10, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (134, 8, 'O17', 0, 0, 'ORDEN', '123');
INSERT INTO `salidadeinventario` VALUES (135, 7, 'O18', 10, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (136, 7, 'O19', 10, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (137, 7, 'O19', 10, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (138, 7, 'C', 20, 1000, 'COMPRA', '456');
INSERT INTO `salidadeinventario` VALUES (139, 7, 'C', 10, 100, 'COMPRA', '456');
INSERT INTO `salidadeinventario` VALUES (140, 7, 'C', 100, 100, 'COMPRA', '456');
INSERT INTO `salidadeinventario` VALUES (141, 7, 'C', 20, 1000, 'COMPRA', '456');
INSERT INTO `salidadeinventario` VALUES (142, 7, 'C', 20, 1, 'COMPRA', '456');
INSERT INTO `salidadeinventario` VALUES (143, 7, 'C', 10, 1, 'COMPRA', '456');
INSERT INTO `salidadeinventario` VALUES (144, 9, 'C', 10, 1000, 'COMPRA', '789');
INSERT INTO `salidadeinventario` VALUES (145, 8, 'C', 123, 0, 'COMPRA', '123');
INSERT INTO `salidadeinventario` VALUES (146, 7, 'C', 1574, 0, 'COMPRA', '456');
INSERT INTO `salidadeinventario` VALUES (147, 7, 'C30', 20, 1000, 'COMPRA', '456');
INSERT INTO `salidadeinventario` VALUES (148, 7, 'C30', 10, 100, 'COMPRA', '456');
INSERT INTO `salidadeinventario` VALUES (149, 7, 'C30', 100, 100, 'COMPRA', '456');
INSERT INTO `salidadeinventario` VALUES (150, 7, 'C30', 20, 1000, 'COMPRA', '456');
INSERT INTO `salidadeinventario` VALUES (151, 7, 'C30', 20, 1, 'COMPRA', '456');
INSERT INTO `salidadeinventario` VALUES (152, 7, 'C30', 10, 1, 'COMPRA', '456');
INSERT INTO `salidadeinventario` VALUES (153, 9, 'C30', 10, 1000, 'COMPRA', '789');
INSERT INTO `salidadeinventario` VALUES (154, 8, 'C30', 123, 0, 'COMPRA', '123');
INSERT INTO `salidadeinventario` VALUES (155, 7, 'C30', 1574, 0, 'COMPRA', '456');
INSERT INTO `salidadeinventario` VALUES (156, 7, 'R16', 10, 1, 'REMISION', '456');
INSERT INTO `salidadeinventario` VALUES (157, 7, 'R16', 20, 1, 'REMISION', '456');
INSERT INTO `salidadeinventario` VALUES (158, 8, 'R16', 20, 1000, 'REMISION', '123');
INSERT INTO `salidadeinventario` VALUES (159, 7, 'O19', 10, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (160, 7, 'O19', 10, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (161, 7, 'O19', 20, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (162, 9, 'O20', 20, 0, 'ORDEN', '789');
INSERT INTO `salidadeinventario` VALUES (163, 7, 'O20', 10, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (164, 7, 'O20', 20, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (165, 7, 'O21', 10, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (166, 7, 'O21', 20, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (167, 7, 'O21', 10, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (168, 7, 'O21', 20, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (169, 8, 'O21', 20, 0, 'ORDEN', '123');
INSERT INTO `salidadeinventario` VALUES (170, 7, 'O22', 10, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (171, 7, 'O22', 20, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (172, 7, 'O22', 10, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (173, 7, 'O22', 20, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (174, 7, 'O22', 10, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (175, 7, 'O22', 20, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (176, 9, 'O22', 50, 0, 'ORDEN', '789');
INSERT INTO `salidadeinventario` VALUES (177, 7, 'A', 10, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (178, 7, 'A', 20, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (179, 10, 'A', 20, 0, 'ORDEN', '159159');
INSERT INTO `salidadeinventario` VALUES (180, 7, 'A', 10, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (181, 7, 'A', 20, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (182, 10, 'A', 20, 0, 'ORDEN', '159159');
INSERT INTO `salidadeinventario` VALUES (183, 7, 'R17', 10, 1, 'REMISION', '456');
INSERT INTO `salidadeinventario` VALUES (184, 7, 'R17', 10, 1, 'REMISION', '456');
INSERT INTO `salidadeinventario` VALUES (185, 7, 'R17', 20, 1, 'REMISION', '456');
INSERT INTO `salidadeinventario` VALUES (186, 7, 'O23', 10, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (187, 7, 'O23', 20, 0, 'ORDEN', '456');
INSERT INTO `salidadeinventario` VALUES (188, 9, 'C787', 100, 500, 'COMPRA', '789');
INSERT INTO `salidadeinventario` VALUES (189, 7, 'H89', 10, 1000, 'HOJADEGASTO', '456');
INSERT INTO `salidadeinventario` VALUES (190, 7, 'H89', 30, 1000, 'HOJADEGASTO', '456');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `terceros`
-- 

CREATE TABLE `terceros` (
  `idclientes` int(15) NOT NULL auto_increment,
  `departamento` int(15) NOT NULL,
  `ciudad` int(15) NOT NULL,
  `nombre` varchar(15) collate latin1_spanish_ci NOT NULL,
  `institucion` varchar(15) collate latin1_spanish_ci NOT NULL,
  `nit` varchar(20) collate latin1_spanish_ci NOT NULL,
  `telefono` varchar(15) collate latin1_spanish_ci NOT NULL,
  `correo` varchar(20) collate latin1_spanish_ci NOT NULL,
  `direccion` varchar(20) collate latin1_spanish_ci NOT NULL,
  `celular` varchar(20) collate latin1_spanish_ci NOT NULL,
  `estado` varchar(11) collate latin1_spanish_ci NOT NULL,
  `contacto_directo` varchar(15) collate latin1_spanish_ci NOT NULL,
  `sede` varchar(15) collate latin1_spanish_ci NOT NULL,
  `tipo` varchar(15) collate latin1_spanish_ci NOT NULL,
  `calificacion` varchar(15) collate latin1_spanish_ci NOT NULL,
  `bodega` varchar(15) collate latin1_spanish_ci NOT NULL,
  `fechamodificado` varchar(15) collate latin1_spanish_ci NOT NULL,
  PRIMARY KEY  (`idclientes`),
  KEY `despartamento` (`departamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=9 ;

-- 
-- Volcar la base de datos para la tabla `terceros`
-- 

INSERT INTO `terceros` VALUES (1, 1, 0, 'dainfes', 'cafe salud', '12334', '2344', 'dvgf', 'dsfrd', '324', '1', 'dffdfd', 'ffdfd', 'dffd', '', '', '');
INSERT INTO `terceros` VALUES (2, 1, 1, 'alejandro', 'wakusoft', '1030570356', '3219045297', 'wakusoft@gmail.com', 'CL 38 A 50 A 71 SUR', '3219045297', '1', 'Alejandro', 'BogotÃ¡', 'cliente', 'A', '', '');
INSERT INTO `terceros` VALUES (3, 1, 1, 'alejandro', 'wakusoft', '10305703561', '3219045297', 'wakusoft@gmail.com', 'CL 38 A 50 A 71 SUR', '3219045297', '1', 'Alejandro', 'BogotÃ¡', 'cliente', 'A', '10305703561', '');
INSERT INTO `terceros` VALUES (4, 1, 1, 'alejandro ', '1231312', '10305703562', '123123', '123@45.com', '123123', '123123', '1', '123123', '123', 'cliente', 'A', '10305703562', '');
INSERT INTO `terceros` VALUES (5, 1, 1, 'alejandro', '1231312', '10305703563', '123123', '123@45.com', '123123', '123123', '1', '123123', '123', 'cliente', 'A', '10305703563', '');
INSERT INTO `terceros` VALUES (6, 1, 1, 'alejandro ', '1231312', '10305703564', '123123', '123@45.com', '123123', '123123', '1', '123123', '123', 'cliente', 'A', '10305703564', '');
INSERT INTO `terceros` VALUES (7, 1, 1, 'alejandro ', '1231312', '10305703567', '123123', '123@45.com', '123123', '123123', '1', '123123', '123', 'cliente', 'A', '10305703567', '');
INSERT INTO `terceros` VALUES (8, 1, 1, 'DAVID INFANTE', 'DAVID INFANTE', '1023911054', '3121545', '123123@123.COM', 'CDACDSC', '12353153', 'ACTIVO', 'PROVEEDOR', 'SUR', 'PROVEEDOR', 'A', '1023911054', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tipousuario`
-- 

CREATE TABLE `tipousuario` (
  `idtipousuario` int(15) NOT NULL auto_increment,
  `tipo` varchar(15) collate latin1_spanish_ci NOT NULL,
  `descripcion` varchar(100) collate latin1_spanish_ci NOT NULL,
  PRIMARY KEY  (`idtipousuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `tipousuario`
-- 

INSERT INTO `tipousuario` VALUES (1, 'Administrador', 'admin');
INSERT INTO `tipousuario` VALUES (2, 'Usuario', 'usuario');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios`
-- 

CREATE TABLE `usuarios` (
  `ncedula` int(15) NOT NULL,
  `iddepartamento` int(15) NOT NULL,
  `idciudad` int(15) NOT NULL,
  `tipousuario` int(15) NOT NULL,
  `nombre` varchar(15) collate latin1_spanish_ci NOT NULL,
  `apellido` varchar(15) collate latin1_spanish_ci NOT NULL,
  `cargo` varchar(15) collate latin1_spanish_ci NOT NULL,
  `ntelefono` varchar(15) collate latin1_spanish_ci NOT NULL,
  `clave` varchar(15) collate latin1_spanish_ci NOT NULL,
  `estado` varchar(10) collate latin1_spanish_ci NOT NULL,
  PRIMARY KEY  (`ncedula`),
  KEY `iddepartamento` (`iddepartamento`),
  KEY `tipousuario` (`tipousuario`),
  KEY `idciudad` (`idciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 

INSERT INTO `usuarios` VALUES (53055373, 1, 1, 1, 'JENNY', 'LOAIZA', 'DIRECTORA', '2884041', '1234', 'ACTIVO');
INSERT INTO `usuarios` VALUES (79596152, 1, 1, 1, 'LUIS MIGUEL ', 'MARROQUIN ', 'GERENTE ', '2884041', '1234', 'ACTIVO');
INSERT INTO `usuarios` VALUES (80248331, 1, 1, 2, 'ANDRES', 'ORTIZ', 'coordinador bod', '3004188660', '80248331', 'activo');
INSERT INTO `usuarios` VALUES (528791662, 1, 1, 2, 'alva maria', 'valbuena', 'axuliar de bode', '3193551016', 'laurarogert', 'activo');
INSERT INTO `usuarios` VALUES (1023911054, 1, 1, 1, 'david', 'infante', 'sistemas', '3202605639', '1234', 'activo');
INSERT INTO `usuarios` VALUES (1030570356, 1, 1, 1, 'Alejandro', 'Moreno', 'Programador', '3219045297', '1234', 'activo');

-- 
-- Filtros para las tablas descargadas (dump)
-- 

-- 
-- Filtros para la tabla `ciudades`
-- 
ALTER TABLE `ciudades`
  ADD CONSTRAINT `ciudades_ibfk_1` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Filtros para la tabla `inventario`
-- 
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`ncedula`) REFERENCES `usuarios` (`ncedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_ibfk_4` FOREIGN KEY (`idlineas`) REFERENCES `lineas` (`idlineas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_ibfk_5` FOREIGN KEY (`idmarcas`) REFERENCES `marcas` (`idmarcas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_ibfk_6` FOREIGN KEY (`idbodega`) REFERENCES `bodegas` (`idbodegas`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Filtros para la tabla `marcas`
-- 
ALTER TABLE `marcas`
  ADD CONSTRAINT `marcas_ibfk_1` FOREIGN KEY (`idtercero`) REFERENCES `terceros` (`idclientes`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Filtros para la tabla `pedidos`
-- 
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`ncedula`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Filtros para la tabla `remision`
-- 
ALTER TABLE `remision`
  ADD CONSTRAINT `remision_ibfk_5` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`ncedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `remision_ibfk_6` FOREIGN KEY (`idclientes`) REFERENCES `terceros` (`idclientes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `remision_ibfk_7` FOREIGN KEY (`idpaciente`) REFERENCES `pacientes` (`idpaciente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `remision_ibfk_8` FOREIGN KEY (`idbodega`) REFERENCES `bodegas` (`idbodegas`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Filtros para la tabla `salidadeinventario`
-- 
ALTER TABLE `salidadeinventario`
  ADD CONSTRAINT `salidadeinventario_ibfk_1` FOREIGN KEY (`idinventario`) REFERENCES `inventario` (`idinventario`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Filtros para la tabla `terceros`
-- 
ALTER TABLE `terceros`
  ADD CONSTRAINT `terceros_ibfk_1` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`iddepartamento`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Filtros para la tabla `usuarios`
-- 
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`tipousuario`) REFERENCES `tipousuario` (`idtipousuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`idciudad`) REFERENCES `ciudades` (`idciudades`) ON DELETE CASCADE ON UPDATE CASCADE;
