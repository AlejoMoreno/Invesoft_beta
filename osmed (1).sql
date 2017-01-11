-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2016 a las 00:03:07
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `osmed`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodegas`
--

CREATE TABLE `bodegas` (
  `idbodegas` int(40) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bodegas`
--

INSERT INTO `bodegas` (`idbodegas`, `nombre`, `direccion`, `descripcion`) VALUES
(1, 'bodega1', 'calle 39 23-34', 'hola'),
(2, 'bodega2', 'cr 45 # 56-67', 'hola'),
(2147483647, 'alejandro ', '123123', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `idciudades` int(15) NOT NULL,
  `iddepartamento` int(15) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `codigo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`idciudades`, `iddepartamento`, `nombre`, `codigo`) VALUES
(1, 1, 'Bogota', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `iddepartamento` int(15) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `codigo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`iddepartamento`, `nombre`, `codigo`) VALUES
(1, 'Cundinamarca', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `idhistorial` int(15) NOT NULL,
  `iduser` int(15) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `fecha` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`idhistorial`, `iduser`, `ip`, `fecha`) VALUES
(1, 1, '123', '2016-04-06'),
(2, 1023911054, '::1', '2016-04-22'),
(3, 1023911054, '::1', '2016-04-22'),
(4, 1023911054, '::1', '2016-04-22'),
(5, 1023911054, '::1', '2016-04-22'),
(6, 1023911054, '::1', '2016-04-22'),
(7, 1023911054, '::1', '2016-04-22'),
(8, 1023911054, '::1', '2016-04-22'),
(9, 1023911054, '::1', '2016-04-22'),
(10, 1023911054, '::1', '2016-04-22'),
(11, 1023911054, '::1', '2016-04-22'),
(12, 1023911054, '::1', '2016-04-22'),
(13, 1023911054, '::1', '2016-04-22'),
(14, 1023911054, '::1', '2016-04-22'),
(15, 1023911054, '::1', '2016-04-22'),
(16, 1023911054, '::1', '2016-04-22'),
(17, 1023911054, '::1', '2016-04-22'),
(18, 1023911054, '::1', '2016-04-22'),
(19, 1023911054, '::1', '2016-04-22'),
(20, 1023911054, '::1', '2016-04-22'),
(21, 1023911054, '::1', '2016-04-22'),
(22, 1023911054, '::1', '2016-04-22'),
(23, 1023911054, '::1', '2016-04-22'),
(24, 1023911054, '::1', '2016-04-22'),
(25, 1023911054, '::1', '2016-04-22'),
(26, 1023911054, '::1', '2016-04-22'),
(27, 1023911054, '::1', '2016-04-22'),
(28, 1023911054, '::1', '2016-05-24'),
(29, 1023911054, '::1', '2016-05-24'),
(30, 1023911054, '::1', '2016-05-24'),
(31, 1023911054, '::1', '2016-05-24'),
(32, 1023911054, '::1', '2016-05-24'),
(33, 1023911054, '::1', '2016-05-25'),
(34, 1023911054, '::1', '2016-05-25'),
(35, 1023911054, '::1', '2016-05-26'),
(36, 1023911054, '::1', '2016-05-26'),
(37, 1023911054, '::1', '2016-05-26'),
(38, 1023911054, '::1', '2016-05-26'),
(39, 1023911054, '192.168.0.14', '2016-05-26'),
(40, 1023911054, '192.168.0.23', '2016-06-01'),
(41, 1023911054, '192.168.0.14', '2016-06-01'),
(42, 53055373, '192.168.0.14', '2016-06-01'),
(43, 53055373, '192.168.0.14', '2016-06-01'),
(44, 79596152, '192.168.0.14', '2016-06-01'),
(45, 53055373, '192.168.0.14', '2016-06-03'),
(46, 53055373, '192.168.0.14', '2016-06-03'),
(47, 1023911054, '192.168.0.7', '2016-06-03'),
(48, 1023911054, '192.168.0.25', '2016-06-03'),
(49, 1023911054, '192.168.0.25', '2016-06-03'),
(50, 1030570356, '192.168.0.25', '2016-06-03'),
(51, 1023911054, '192.168.0.7', '2016-06-03'),
(52, 1023911054, '192.168.0.7', '2016-06-03'),
(53, 1030570356, '192.168.0.25', '2016-06-03'),
(54, 1023911054, '192.168.0.29', '2016-06-08'),
(55, 80248331, '192.168.0.22', '2016-06-08'),
(56, 1023911054, '192.168.0.22', '2016-06-08'),
(57, 80248331, '192.168.0.22', '2016-06-08'),
(58, 1030570356, '192.168.0.33', '2016-06-08'),
(59, 1023911054, '192.168.0.7', '2016-06-08'),
(60, 1030570356, '192.168.0.7', '2016-06-08'),
(61, 1023911054, '192.168.0.4', '2016-06-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idinventario` int(15) NOT NULL,
  `idbodega` int(15) NOT NULL,
  `ncedula` int(15) NOT NULL,
  `idmarcas` int(15) NOT NULL,
  `idlineas` int(15) NOT NULL,
  `referencia` varchar(15) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `numerolote` varchar(15) NOT NULL,
  `tipopresentacion` varchar(15) NOT NULL,
  `stockminimo` int(4) NOT NULL,
  `stockmaximo` int(4) NOT NULL,
  `precio` int(15) NOT NULL,
  `costo` int(15) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `saldo` int(15) NOT NULL,
  `fechadevencimiento` varchar(15) NOT NULL,
  `iva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`idinventario`, `idbodega`, `ncedula`, `idmarcas`, `idlineas`, `referencia`, `descripcion`, `numerolote`, `tipopresentacion`, `stockminimo`, `stockmaximo`, `precio`, `costo`, `estado`, `saldo`, `fechadevencimiento`, `iva`) VALUES
(4, 2147483647, 1030570356, 123, 6, 'ooo', 'producto ooo ', '4561234', 'unidad', 100, 1, 0, 10000, 'activo', -20, '2016-12-31', 16),
(5, 2147483647, 1030570356, 123, 6, 'ooo123', 'hjkl', 'uuiop', 'yuoi', 10, 1, 0, 102, '12', -8, '2016-12-31', 1512);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex`
--

CREATE TABLE `kardex` (
  `idkardex` int(15) NOT NULL,
  `idsalida` int(15) NOT NULL,
  `idclientes` int(15) NOT NULL,
  `fechaventa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas`
--

CREATE TABLE `lineas` (
  `idlineas` int(15) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lineas`
--

INSERT INTO `lineas` (`idlineas`, `nombre`, `descripcion`) VALUES
(6, 'BIOMATERIALES ', 'Biomateriales ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `idmarcas` int(15) NOT NULL,
  `idtercero` int(15) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`idmarcas`, `idtercero`, `nombre`, `descripcion`) VALUES
(123, 2, 'GENERICA', 'Marca genÃ©rica ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `idpaciente` int(15) NOT NULL,
  `nombrecirujano` varchar(20) NOT NULL,
  `nombrepaciente` varchar(20) NOT NULL,
  `numerodecedulapaciente` int(15) NOT NULL,
  `historiaclinica` varchar(20) NOT NULL,
  `fechacirujia` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`idpaciente`, `nombrecirujano`, `nombrepaciente`, `numerodecedulapaciente`, `historiaclinica`, `fechacirujia`) VALUES
(3, '', '', 0, '', ''),
(4, '1', '1', 1, '1', '1'),
(5, '', '', 0, '', ''),
(6, '', '', 0, '', ''),
(7, '', '', 0, '', ''),
(8, 'nobre', 'nombre', 1030570356, '32142151', '12251'),
(9, '1212', '7878', 145644, '1212', '1212'),
(10, '1212', '7878', 145644, '1212', '1212'),
(11, '123', '123', 123, '123', '123'),
(12, '123', '123', 123, '123', '123'),
(13, '123', '12', 121, '1231', '212'),
(14, '789', '9789', 97878, '789', '789'),
(15, '23123', '1231', 2313, '123', '1231'),
(16, '', '', 0, '', ''),
(17, '', '', 0, '', ''),
(18, '', '', 0, '', ''),
(19, '1231', '1231', 1030570356, '12313', '123123'),
(20, '1231', '1231', 1030570356, '12313', '123123'),
(21, '1231', '1231', 1030570356, '12313', '123123'),
(22, '1231', '1231', 1030570356, '12313', '123123'),
(23, '', '', 1030570356, '', ''),
(24, '', '', 1030570356, '', ''),
(25, '', '', 1030570356, '', ''),
(26, '', '', 1030570356, '', ''),
(27, '', '', 1030570356, '', ''),
(28, 'cirujano1', 'nombre1', 1030570356, '12345312.', '12121212');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedido` int(15) NOT NULL,
  `referencia` varchar(30) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `cantidad` int(15) NOT NULL,
  `fechapedido` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `idusuario` int(15) NOT NULL,
  `observaciones` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idpedido`, `referencia`, `nombre`, `cantidad`, `fechapedido`, `estado`, `idusuario`, `observaciones`) VALUES
(1, '346578080890', '346578080890', 2147483647, '2016-06-01', '', 1023911054, 'observaciones'),
(2, '3', 'dd', 5, '2016-06-01', '', 1023911054, 'observaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remision`
--

CREATE TABLE `remision` (
  `idremision` int(15) NOT NULL,
  `idsalida` int(15) NOT NULL,
  `idbodega` int(15) NOT NULL,
  `idpaciente` int(15) NOT NULL,
  `idusuario` int(15) NOT NULL,
  `idclientes` int(15) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `subtotal` int(15) NOT NULL,
  `iva` int(15) NOT NULL,
  `descuento` int(15) NOT NULL,
  `fletes` int(15) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `retefuente` varchar(15) NOT NULL,
  `total` int(15) NOT NULL,
  `documento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `remision`
--

INSERT INTO `remision` (`idremision`, `idsalida`, `idbodega`, `idpaciente`, `idusuario`, `idclientes`, `fecha`, `subtotal`, `iva`, `descuento`, `fletes`, `estado`, `retefuente`, `total`, `documento`) VALUES
(3, 7, 1, 8, 1030570356, 2, '2016-12-31', 0, 0, 0, 0, '1', '0', 50000, '123'),
(4, 7, 1, 9, 1030570356, 2, '2016-12-31', 50000, 0, 2000, 3000, '1', '0', 45000, '124'),
(5, 7, 1, 11, 1030570356, 2, '', 42000, 0, 200, 200, '1', '2000', 39600, '30620161'),
(6, 7, 1, 13, 1030570356, 2, '', 50000, 0, 41, 41, '1', '41', 49877, '30620161'),
(7, 13, 1, 14, 1030570356, 2, '', 5000, 0, 1, 1, '1', '1', 4997, '30620162'),
(8, 14, 1, 15, 1030570356, 2, '', 787820, 0, 2, 2, '1', '2', 787814, '30620163'),
(9, 27, 1, 8, 1030570356, 2, '', 30000, 0, 0, 0, '1', '0', 30000, 'R12'),
(10, 29, 1, 8, 1030570356, 7, '2016-12-31', 400, 0, 0, 0, '1', '0', 400, 'R13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidadeinventario`
--

CREATE TABLE `salidadeinventario` (
  `idsalida` int(15) NOT NULL,
  `idinventario` int(15) NOT NULL,
  `idkit` varchar(15) NOT NULL,
  `cantidad` int(15) NOT NULL,
  `precio` int(15) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salidadeinventario`
--

INSERT INTO `salidadeinventario` (`idsalida`, `idinventario`, `idkit`, `cantidad`, `precio`, `tipo`) VALUES
(7, 4, '30620161', 1, 3000, 'Nokit'),
(8, 4, '30620161', 12, 1212, 'Nokit'),
(9, 4, '30620161', 12, 100, 'Nokit'),
(11, 4, '30620161', 888, 123, 'Nokit'),
(12, 4, '30620161', 1030, 1515, 'Nokit'),
(13, 4, '30620162', 12, 1000, 'Nokit'),
(14, 5, '30620163', 78, 7878, 'Nokit'),
(18, 4, '30620164', 0, 0, 'Nokit'),
(20, 4, '30620165', 0, 0, 'Nokit'),
(22, 4, '30620166', 0, 0, 'Nokit'),
(24, 4, '30620167', 0, 0, 'Nokit'),
(27, 4, 'R12', 20, 1000, 'Nokit'),
(28, 5, 'R12', 10, 1000, 'Nokit'),
(29, 4, 'R13', 10, 20, 'Nokit'),
(30, 5, 'R13', 10, 20, 'Nokit');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros`
--

CREATE TABLE `terceros` (
  `idclientes` int(15) NOT NULL,
  `departamento` int(15) NOT NULL,
  `ciudad` int(15) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `institucion` varchar(15) NOT NULL,
  `nit` varchar(20) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `estado` varchar(11) NOT NULL,
  `contacto_directo` varchar(15) NOT NULL,
  `sede` varchar(15) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `calificacion` varchar(15) NOT NULL,
  `bodega` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `terceros`
--

INSERT INTO `terceros` (`idclientes`, `departamento`, `ciudad`, `nombre`, `institucion`, `nit`, `telefono`, `correo`, `direccion`, `celular`, `estado`, `contacto_directo`, `sede`, `tipo`, `calificacion`, `bodega`) VALUES
(1, 1, 0, 'dainfes', 'cafe salud', '12334', '2344', 'dvgf', 'dsfrd', '324', 'biyy', 'dffdfd', 'ffdfd', 'dffd', '', ''),
(2, 1, 1, 'alejandro', 'wakusoft', '1030570356', '3219045297', 'wakusoft@gmail.com', 'CL 38 A 50 A 71 SUR', '3219045297', 'activo', 'Alejandro', 'BogotÃ¡', 'cliente', 'A', ''),
(3, 1, 1, 'alejandro ', '1231312', '10305703561', '123123', '123@45.com', '123123', '123123', 'activo', '123123', '123', 'cliente', 'A', '10305703561'),
(4, 1, 1, 'alejandro ', '1231312', '10305703562', '123123', '123@45.com', '123123', '123123', 'activo', '123123', '123', 'cliente', 'A', '10305703562'),
(5, 1, 1, 'alejandro', '1231312', '10305703563', '123123', '123@45.com', '123123', '123123', 'activo', '123123', '123', 'cliente', 'A', '10305703563'),
(6, 1, 1, 'alejandro ', '1231312', '10305703564', '123123', '123@45.com', '123123', '123123', 'activo', '123123', '123', 'cliente', 'A', '10305703564'),
(7, 1, 1, 'alejandro ', '1231312', '10305703567', '123123', '123@45.com', '123123', '123123', 'activo', '123123', '123', 'cliente', 'A', '10305703567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipousuario` int(15) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idtipousuario`, `tipo`, `descripcion`) VALUES
(1, 'Administrador', 'admin'),
(2, 'Usuario', 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ncedula` int(15) NOT NULL,
  `iddepartamento` int(15) NOT NULL,
  `idciudad` int(15) NOT NULL,
  `tipousuario` int(15) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `cargo` varchar(15) NOT NULL,
  `ntelefono` varchar(15) NOT NULL,
  `clave` varchar(15) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ncedula`, `iddepartamento`, `idciudad`, `tipousuario`, `nombre`, `apellido`, `cargo`, `ntelefono`, `clave`, `estado`) VALUES
(53055373, 1, 1, 1, 'JENNY', 'LOAIZA', 'DIRECTORA', '2884041', '1234', 'ACTIVO'),
(79596152, 1, 1, 1, 'LUIS MIGUEL ', 'MARROQUIN ', 'GERENTE ', '2884041', '1234', 'ACTIVO'),
(80248331, 1, 1, 2, 'ANDRES', 'ORTIZ', 'coordinador bod', '3004188660', '80248331', 'activo'),
(528791662, 1, 1, 2, 'alva maria', 'valbuena', 'axuliar de bode', '3193551016', 'laurarogert', 'activo'),
(1023911054, 1, 1, 1, 'david', 'infante', 'sistemas', '3202605639', '1234', 'activo'),
(1030570356, 1, 1, 1, 'Alejandro', 'Moreno', 'Programador', '3219045297', '1234', 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  ADD PRIMARY KEY (`idbodegas`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`idciudades`),
  ADD KEY `iddepartamento` (`iddepartamento`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`iddepartamento`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`idhistorial`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idinventario`),
  ADD KEY `ncedula` (`ncedula`),
  ADD KEY `idmarca` (`idmarcas`),
  ADD KEY `idlineas` (`idlineas`),
  ADD KEY `idbodega` (`idbodega`);

--
-- Indices de la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD PRIMARY KEY (`idkardex`),
  ADD KEY `idsalida` (`idsalida`),
  ADD KEY `idclientes` (`idclientes`);

--
-- Indices de la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD PRIMARY KEY (`idlineas`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`idmarcas`),
  ADD KEY `idtercero` (`idtercero`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`idpaciente`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `remision`
--
ALTER TABLE `remision`
  ADD PRIMARY KEY (`idremision`),
  ADD KEY `idsalida` (`idsalida`),
  ADD KEY `idbodega` (`idbodega`,`idpaciente`,`idusuario`,`idclientes`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idclientes` (`idclientes`),
  ADD KEY `idpaciente` (`idpaciente`);

--
-- Indices de la tabla `salidadeinventario`
--
ALTER TABLE `salidadeinventario`
  ADD PRIMARY KEY (`idsalida`),
  ADD KEY `idinventario` (`idinventario`);

--
-- Indices de la tabla `terceros`
--
ALTER TABLE `terceros`
  ADD PRIMARY KEY (`idclientes`),
  ADD KEY `despartamento` (`departamento`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idtipousuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ncedula`),
  ADD KEY `iddepartamento` (`iddepartamento`),
  ADD KEY `tipousuario` (`tipousuario`),
  ADD KEY `idciudad` (`idciudad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `idhistorial` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idinventario` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `lineas`
--
ALTER TABLE `lineas`
  MODIFY `idlineas` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `idmarcas` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idpaciente` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedido` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `remision`
--
ALTER TABLE `remision`
  MODIFY `idremision` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `salidadeinventario`
--
ALTER TABLE `salidadeinventario`
  MODIFY `idsalida` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `terceros`
--
ALTER TABLE `terceros`
  MODIFY `idclientes` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipousuario` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
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
-- Filtros para la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD CONSTRAINT `kardex_ibfk_2` FOREIGN KEY (`idclientes`) REFERENCES `terceros` (`idclientes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kardex_ibfk_3` FOREIGN KEY (`idsalida`) REFERENCES `salidadeinventario` (`idsalida`) ON DELETE CASCADE ON UPDATE CASCADE;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
