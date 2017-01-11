-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2016 a las 00:16:45
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
  `nombre` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(30) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `bodegas`
--

INSERT INTO `bodegas` (`idbodegas`, `nombre`, `direccion`, `descripcion`) VALUES
(1, 'BOGOTA', 'BODEGA PRINCIPAL', 'CRA 26 # 45 C 23'),
(2, 'CORDOBA', 'BODEGA CORDOBA', 'CORDOBA 1'),
(3, 'RP DENTAL', 'BODEGA MEDELLIN', 'MEDELLIN'),
(4, 'SINCELEJO', 'BODEGA SINCELEJO', 'SINCELEJO 1'),
(5, 'NARIÃ‘O', 'BODEGA NARIÃ‘O', 'NARIÃ‘O'),
(6, 'TUNJA', 'BODEGA TUNJA', 'TUNJA 1'),
(7, 'CUCUTA', 'BODEGA CUCUTA', 'CUCUTA'),
(8, 'SANTA BIBIANA', 'BODEGA SANTA BIBIANA', 'SANTA BIBIANA 1'),
(9, 'PEREIRA', 'BODEGA PEREIRA', 'PEREIRA'),
(10, 'BARRANQUILLA', 'BODEGA BARRANQUILLA', 'BARRANQUILLA 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierreinventario`
--

CREATE TABLE `cierreinventario` (
  `idinventario` int(15) NOT NULL,
  `idbodega` int(40) NOT NULL,
  `ncedula` int(15) NOT NULL,
  `idmarcas` int(15) NOT NULL,
  `idlineas` int(15) NOT NULL,
  `referencia` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `numerolote` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `tipopresentacion` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `stockminimo` int(4) NOT NULL,
  `stockmaximo` int(4) NOT NULL,
  `precio` double NOT NULL,
  `costo` double NOT NULL,
  `estado` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `saldo` int(15) NOT NULL,
  `fechadevencimiento` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `iva` int(11) NOT NULL,
  `fecha_registro` varchar(15) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `idciudades` int(15) NOT NULL,
  `iddepartamento` int(15) NOT NULL,
  `nombre` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `codigo` varchar(15) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`idciudades`, `iddepartamento`, `nombre`, `codigo`) VALUES
(0, 0, 'nombre', 'codigo'),
(1, 1, 'MEDELLIN', '001'),
(2, 1, 'ABEJORRAL', '002'),
(3, 1, 'ABRIAQUI', '004'),
(4, 1, 'ALEJANDRIA', '021'),
(5, 1, 'AMAGA', '030'),
(6, 1, 'AMALFI', '031'),
(7, 1, 'ANDES', '034'),
(8, 1, 'ANGELOPOLIS', '036'),
(9, 1, 'ANGOSTURA', '038'),
(10, 1, 'ANORI', '040'),
(11, 1, 'SANTAFE DE ANTI', '042'),
(12, 1, 'ANZA', '044'),
(13, 1, 'APARTADO', '045'),
(14, 1, 'ARBOLETES', '051'),
(15, 1, 'ARGELIA', '055'),
(16, 1, 'ARMENIA', '059'),
(17, 1, 'BARBOSA', '079'),
(18, 1, 'BELMIRA', '086'),
(19, 1, 'BELLO', '088'),
(20, 1, 'BETANIA', '091'),
(21, 1, 'BETULIA', '093'),
(22, 1, 'CIUDAD BOLIVAR', '101'),
(23, 1, 'BRICE?O', '107'),
(24, 1, 'BURITICA', '113'),
(25, 1, 'CACERES', '120'),
(26, 1, 'CAICEDO', '125'),
(27, 1, 'CALDAS', '129'),
(28, 1, 'CAMPAMENTO', '134'),
(29, 1, 'CA?ASGORDAS', '138'),
(30, 1, 'CARACOLI', '142'),
(31, 1, 'CARAMANTA', '145'),
(32, 1, 'CAREPA', '147'),
(33, 1, 'EL CARMEN DE VI', '148'),
(34, 1, 'CAROLINA', '150'),
(35, 1, 'CAUCASIA', '154'),
(36, 1, 'CHIGORODO', '172'),
(37, 1, 'CISNEROS', '190'),
(38, 1, 'COCORNA', '197'),
(39, 1, 'CONCEPCION', '206'),
(40, 1, 'CONCORDIA', '209'),
(41, 1, 'COPACABANA', '212'),
(42, 1, 'DABEIBA', '234'),
(43, 1, 'DON MATIAS', '237'),
(44, 1, 'EBEJICO', '240'),
(45, 1, 'EL BAGRE', '250'),
(46, 1, 'ENTRERRIOS', '264'),
(47, 1, 'ENVIGADO', '266'),
(48, 1, 'FREDONIA', '282'),
(49, 1, 'FRONTINO', '284'),
(50, 1, 'GIRALDO', '306'),
(51, 1, 'GIRARDOTA', '308'),
(52, 1, 'GOMEZ PLATA', '310'),
(53, 1, 'GRANADA', '313'),
(54, 1, 'GUADALUPE', '315'),
(55, 1, 'GUARNE', '318'),
(56, 1, 'GUATAPE', '321'),
(57, 1, 'HELICONIA', '347'),
(58, 1, 'HISPANIA', '353'),
(59, 1, 'ITAGUI', '360'),
(60, 1, 'ITUANGO', '361'),
(61, 1, 'JARDIN', '364'),
(62, 1, 'JERICO', '368'),
(63, 1, 'LA CEJA', '376'),
(64, 1, 'LA ESTRELLA', '380'),
(65, 1, 'LA PINTADA', '390'),
(66, 1, 'LA UNION', '400'),
(67, 1, 'LIBORINA', '411'),
(68, 1, 'MACEO', '425'),
(69, 1, 'MARINILLA', '440'),
(70, 1, 'MONTEBELLO', '467'),
(71, 1, 'MURINDO', '475'),
(72, 1, 'MUTATA', '480'),
(73, 1, 'NARI?O', '483'),
(74, 1, 'NECOCLI', '490'),
(75, 1, 'NECHI', '495'),
(76, 1, 'OLAYA', '501'),
(77, 1, 'PE?OL', '541'),
(78, 1, 'PEQUE', '543'),
(79, 1, 'PUEBLORRICO', '576'),
(80, 1, 'PUERTO BERRIO', '579'),
(81, 1, 'PUERTO NARE', '585'),
(82, 1, 'PUERTO TRIUNFO', '591'),
(83, 1, 'REMEDIOS', '604'),
(84, 1, 'RETIRO', '607'),
(85, 1, 'RIONEGRO', '615'),
(86, 1, 'SABANALARGA', '628'),
(87, 1, 'SABANETA', '631'),
(88, 1, 'SALGAR', '642'),
(89, 1, 'SAN ANDRES DE C', '647'),
(90, 1, 'SAN CARLOS', '649'),
(91, 1, 'SAN FRANCISCO', '652'),
(92, 1, 'SAN JERONIMO', '656'),
(93, 1, 'SAN JOSE DE LA ', '658'),
(94, 1, 'SAN JUAN DE URA', '659'),
(95, 1, 'SAN LUIS', '660'),
(96, 1, 'SAN PEDRO', '664'),
(97, 1, 'SAN PEDRO DE UR', '665'),
(98, 1, 'SAN RAFAEL', '667'),
(99, 1, 'SAN ROQUE', '670'),
(100, 1, 'SAN VICENTE', '674'),
(101, 1, 'SANTA BARBARA', '679'),
(102, 1, 'SANTA ROSA DE O', '686'),
(103, 1, 'SANTO DOMINGO', '690'),
(104, 1, 'EL SANTUARIO', '697'),
(105, 1, 'SEGOVIA', '736'),
(106, 1, 'SONSON', '756'),
(107, 1, 'SOPETRAN', '761'),
(108, 1, 'TAMESIS', '789'),
(109, 1, 'TARAZA', '790'),
(110, 1, 'TARSO', '792'),
(111, 1, 'TITIRIBI', '809'),
(112, 1, 'TOLEDO', '819'),
(113, 1, 'TURBO', '837'),
(114, 1, 'URAMITA', '842'),
(115, 1, 'URRAO', '847'),
(116, 1, 'VALDIVIA', '854'),
(117, 1, 'VALPARAISO', '856'),
(118, 1, 'VEGACHI', '858'),
(119, 1, 'VENECIA', '861'),
(120, 1, 'VIGIA DEL FUERT', '873'),
(121, 1, 'YALI', '885'),
(122, 1, 'YARUMAL', '887'),
(123, 1, 'YOLOMBO', '890'),
(124, 1, 'YONDO', '893'),
(125, 1, 'ZARAGOZA', '895'),
(126, 2, 'BARRANQUILLA', '001'),
(127, 2, 'BARANOA', '078'),
(128, 2, 'CAMPO DE LA CRU', '137'),
(129, 2, 'CANDELARIA', '141'),
(130, 2, 'GALAPA', '296'),
(131, 2, 'JUAN DE ACOSTA', '372'),
(132, 2, 'LURUACO', '421'),
(133, 2, 'MALAMBO', '433'),
(134, 2, 'MANATI', '436'),
(135, 2, 'PALMAR DE VAREL', '520'),
(136, 2, 'PIOJO', '549'),
(137, 2, 'POLONUEVO', '558'),
(138, 2, 'PONEDERA', '560'),
(139, 2, 'PUERTO COLOMBIA', '573'),
(140, 2, 'REPELON', '606'),
(141, 2, 'SABANAGRANDE', '634'),
(142, 2, 'SABANALARGA', '638'),
(143, 2, 'SANTA LUCIA', '675'),
(144, 2, 'SANTO TOMAS', '685'),
(145, 2, 'SOLEDAD', '758'),
(146, 2, 'SUAN', '770'),
(147, 2, 'TUBARA', '832'),
(148, 2, 'USIACURI', '849'),
(149, 3, 'BOGOTA, D.C.', '001'),
(150, 4, 'CARTAGENA', '001'),
(151, 4, 'ACHI', '006'),
(152, 4, 'ALTOS DEL ROSAR', '030'),
(153, 4, 'ARENAL', '042'),
(154, 4, 'ARJONA', '052'),
(155, 4, 'ARROYOHONDO', '062'),
(156, 4, 'BARRANCO DE LOB', '074'),
(157, 4, 'CALAMAR', '140'),
(158, 4, 'CANTAGALLO', '160'),
(159, 4, 'CICUCO', '188'),
(160, 4, 'CORDOBA', '212'),
(161, 4, 'CLEMENCIA', '222'),
(162, 4, 'EL CARMEN DE BO', '244'),
(163, 4, 'EL GUAMO', '248'),
(164, 4, 'EL PE?ON', '268'),
(165, 4, 'HATILLO DE LOBA', '300'),
(166, 4, 'MAGANGUE', '430'),
(167, 4, 'MAHATES', '433'),
(168, 4, 'MARGARITA', '440'),
(169, 4, 'MARIA LA BAJA', '442'),
(170, 4, 'MONTECRISTO', '458'),
(171, 4, 'MOMPOS', '468'),
(172, 4, 'NOROSI', '490'),
(173, 4, 'MORALES', '473'),
(174, 4, 'PINILLOS', '549'),
(175, 4, 'REGIDOR', '580'),
(176, 4, 'RIO VIEJO', '600'),
(177, 4, 'SAN CRISTOBAL', '620'),
(178, 4, 'SAN ESTANISLAO', '647'),
(179, 4, 'SAN FERNANDO', '650'),
(180, 4, 'SAN JACINTO', '654'),
(181, 4, 'SAN JACINTO DEL', '655'),
(182, 4, 'SAN JUAN NEPOMU', '657'),
(183, 4, 'SAN MARTIN DE L', '667'),
(184, 4, 'SAN PABLO', '670'),
(185, 4, 'SANTA CATALINA', '673'),
(186, 4, 'SANTA ROSA', '683'),
(187, 4, 'SANTA ROSA DEL ', '688'),
(188, 4, 'SIMITI', '744'),
(189, 4, 'SOPLAVIENTO', '760'),
(190, 4, 'TALAIGUA NUEVO', '780'),
(191, 4, 'TIQUISIO', '810'),
(192, 4, 'TURBACO', '836'),
(193, 4, 'TURBANA', '838'),
(194, 4, 'VILLANUEVA', '873'),
(195, 4, 'ZAMBRANO', '894'),
(196, 5, 'TUNJA', '001'),
(197, 5, 'ALMEIDA', '022'),
(198, 5, 'AQUITANIA', '047'),
(199, 5, 'ARCABUCO', '051'),
(200, 5, 'BELEN', '087'),
(201, 5, 'BERBEO', '090'),
(202, 5, 'BETEITIVA', '092'),
(203, 5, 'BOAVITA', '097'),
(204, 5, 'BOYACA', '104'),
(205, 5, 'BRICE?O', '106'),
(206, 5, 'BUENAVISTA', '109'),
(207, 5, 'BUSBANZA', '114'),
(208, 5, 'CALDAS', '131'),
(209, 5, 'CAMPOHERMOSO', '135'),
(210, 5, 'CERINZA', '162'),
(211, 5, 'CHINAVITA', '172'),
(212, 5, 'CHIQUINQUIRA', '176'),
(213, 5, 'CHISCAS', '180'),
(214, 5, 'CHITA', '183'),
(215, 5, 'CHITARAQUE', '185'),
(216, 5, 'CHIVATA', '187'),
(217, 5, 'CIENEGA', '189'),
(218, 5, 'COMBITA', '204'),
(219, 5, 'COPER', '212'),
(220, 5, 'CORRALES', '215'),
(221, 5, 'COVARACHIA', '218'),
(222, 5, 'CUBARA', '223'),
(223, 5, 'CUCAITA', '224'),
(224, 5, 'CUITIVA', '226'),
(225, 5, 'CHIQUIZA', '232'),
(226, 5, 'CHIVOR', '236'),
(227, 5, 'DUITAMA', '238'),
(228, 5, 'EL COCUY', '244'),
(229, 5, 'EL ESPINO', '248'),
(230, 5, 'FIRAVITOBA', '272'),
(231, 5, 'FLORESTA', '276'),
(232, 5, 'GACHANTIVA', '293'),
(233, 5, 'GAMEZA', '296'),
(234, 5, 'GARAGOA', '299'),
(235, 5, 'GUACAMAYAS', '317'),
(236, 5, 'GUATEQUE', '322'),
(237, 5, 'GUAYATA', '325'),
(238, 5, 'GsICAN', '332'),
(239, 5, 'IZA', '362'),
(240, 5, 'JENESANO', '367'),
(241, 5, 'JERICO', '368'),
(242, 5, 'LABRANZAGRANDE', '377'),
(243, 5, 'LA CAPILLA', '380'),
(244, 5, 'LA VICTORIA', '401'),
(245, 5, 'LA UVITA', '403'),
(246, 5, 'VILLA DE LEYVA', '407'),
(247, 5, 'MACANAL', '425'),
(248, 5, 'MARIPI', '442'),
(249, 5, 'MIRAFLORES', '455'),
(250, 5, 'MONGUA', '464'),
(251, 5, 'MONGUI', '466'),
(252, 5, 'MONIQUIRA', '469'),
(253, 5, 'MOTAVITA', '476'),
(254, 5, 'MUZO', '480'),
(255, 5, 'NOBSA', '491'),
(256, 5, 'NUEVO COLON', '494'),
(257, 5, 'OICATA', '500'),
(258, 5, 'OTANCHE', '507'),
(259, 5, 'PACHAVITA', '511'),
(260, 5, 'PAEZ', '514'),
(261, 5, 'PAIPA', '516'),
(262, 5, 'PAJARITO', '518'),
(263, 5, 'PANQUEBA', '522'),
(264, 5, 'PAUNA', '531'),
(265, 5, 'PAYA', '533'),
(266, 5, 'PAZ DE RIO', '537'),
(267, 5, 'PESCA', '542'),
(268, 5, 'PISBA', '550'),
(269, 5, 'PUERTO BOYACA', '572'),
(270, 5, 'QUIPAMA', '580'),
(271, 5, 'RAMIRIQUI', '599'),
(272, 5, 'RAQUIRA', '600'),
(273, 5, 'RONDON', '621'),
(274, 5, 'SABOYA', '632'),
(275, 5, 'SACHICA', '638'),
(276, 5, 'SAMACA', '646'),
(277, 5, 'SAN EDUARDO', '660'),
(278, 5, 'SAN JOSE DE PAR', '664'),
(279, 5, 'SAN LUIS DE GAC', '667'),
(280, 5, 'SAN MATEO', '673'),
(281, 5, 'SAN MIGUEL DE S', '676'),
(282, 5, 'SAN PABLO DE BO', '681'),
(283, 5, 'SANTANA', '686'),
(284, 5, 'SANTA MARIA', '690'),
(285, 5, 'SANTA ROSA DE V', '693'),
(286, 5, 'SANTA SOFIA', '696'),
(287, 5, 'SATIVANORTE', '720'),
(288, 5, 'SATIVASUR', '723'),
(289, 5, 'SIACHOQUE', '740'),
(290, 5, 'SOATA', '753'),
(291, 5, 'SOCOTA', '755'),
(292, 5, 'SOCHA', '757'),
(293, 5, 'SOGAMOSO', '759'),
(294, 5, 'SOMONDOCO', '761'),
(295, 5, 'SORA', '762'),
(296, 5, 'SOTAQUIRA', '763'),
(297, 5, 'SORACA', '764'),
(298, 5, 'SUSACON', '774'),
(299, 5, 'SUTAMARCHAN', '776'),
(300, 5, 'SUTATENZA', '778'),
(301, 5, 'TASCO', '790'),
(302, 5, 'TENZA', '798'),
(303, 5, 'TIBANA', '804'),
(304, 5, 'TIBASOSA', '806'),
(305, 5, 'TINJACA', '808'),
(306, 5, 'TIPACOQUE', '810'),
(307, 5, 'TOCA', '814'),
(308, 5, 'TOGsI', '816'),
(309, 5, 'TOPAGA', '820'),
(310, 5, 'TOTA', '822'),
(311, 5, 'TUNUNGUA', '832'),
(312, 5, 'TURMEQUE', '835'),
(313, 5, 'TUTA', '837'),
(314, 5, 'TUTAZA', '839'),
(315, 5, 'UMBITA', '842'),
(316, 5, 'VENTAQUEMADA', '861'),
(317, 5, 'VIRACACHA', '879'),
(318, 5, 'ZETAQUIRA', '897'),
(319, 6, 'MANIZALES', '001'),
(320, 6, 'AGUADAS', '013'),
(321, 6, 'ANSERMA', '042'),
(322, 6, 'ARANZAZU', '050'),
(323, 6, 'BELALCAZAR', '088'),
(324, 6, 'CHINCHINA', '174'),
(325, 6, 'FILADELFIA', '272'),
(326, 6, 'LA DORADA', '380'),
(327, 6, 'LA MERCED', '388'),
(328, 6, 'MANZANARES', '433'),
(329, 6, 'MARMATO', '442'),
(330, 6, 'MARQUETALIA', '444'),
(331, 6, 'MARULANDA', '446'),
(332, 6, 'NEIRA', '486'),
(333, 6, 'NORCASIA', '495'),
(334, 6, 'PACORA', '513'),
(335, 6, 'PALESTINA', '524'),
(336, 6, 'PENSILVANIA', '541'),
(337, 6, 'RIOSUCIO', '614'),
(338, 6, 'RISARALDA', '616'),
(339, 6, 'SALAMINA', '653'),
(340, 6, 'SAMANA', '662'),
(341, 6, 'SAN JOSE', '665'),
(342, 6, 'SUPIA', '777'),
(343, 6, 'VICTORIA', '867'),
(344, 6, 'VILLAMARIA', '873'),
(345, 6, 'VITERBO', '877'),
(346, 7, 'FLORENCIA', '001'),
(347, 7, 'ALBANIA', '029'),
(348, 7, 'BELEN DE LOS AN', '094'),
(349, 7, 'CARTAGENA DEL C', '150'),
(350, 7, 'CURILLO', '205'),
(351, 7, 'EL DONCELLO', '247'),
(352, 7, 'EL PAUJIL', '256'),
(353, 7, 'LA MONTA?ITA', '410'),
(354, 7, 'MILAN', '460'),
(355, 7, 'MORELIA', '479'),
(356, 7, 'PUERTO RICO', '592'),
(357, 7, 'SAN JOSE DEL FR', '610'),
(358, 7, 'SAN VICENTE DEL', '753'),
(359, 7, 'SOLANO', '756'),
(360, 7, 'SOLITA', '785'),
(361, 7, 'VALPARAISO', '860'),
(362, 8, 'POPAYAN', '001'),
(363, 8, 'ALMAGUER', '022'),
(364, 8, 'ARGELIA', '050'),
(365, 8, 'BALBOA', '075'),
(366, 8, 'BOLIVAR', '100'),
(367, 8, 'BUENOS AIRES', '110'),
(368, 8, 'CAJIBIO', '130'),
(369, 8, 'CALDONO', '137'),
(370, 8, 'CALOTO', '142'),
(371, 8, 'CORINTO', '212'),
(372, 8, 'EL TAMBO', '256'),
(373, 8, 'FLORENCIA', '290'),
(374, 8, 'GUACHENE', '300'),
(375, 8, 'GUAPI', '318'),
(376, 8, 'INZA', '355'),
(377, 8, 'JAMBALO', '364'),
(378, 8, 'LA SIERRA', '392'),
(379, 8, 'LA VEGA', '397'),
(380, 8, 'LOPEZ', '418'),
(381, 8, 'MERCADERES', '450'),
(382, 8, 'MIRANDA', '455'),
(383, 8, 'MORALES', '473'),
(384, 8, 'PADILLA', '513'),
(385, 8, 'PAEZ', '517'),
(386, 8, 'PATIA', '532'),
(387, 8, 'PIAMONTE', '533'),
(388, 8, 'PIENDAMO', '548'),
(389, 8, 'PUERTO TEJADA', '573'),
(390, 8, 'PURACE', '585'),
(391, 8, 'ROSAS', '622'),
(392, 8, 'SAN SEBASTIAN', '693'),
(393, 8, 'SANTANDER DE QU', '698'),
(394, 8, 'SANTA ROSA', '701'),
(395, 8, 'SILVIA', '743'),
(396, 8, 'SOTARA', '760'),
(397, 8, 'SUAREZ', '780'),
(398, 8, 'SUCRE', '785'),
(399, 8, 'TIMBIO', '807'),
(400, 8, 'TIMBIQUI', '809'),
(401, 8, 'TORIBIO', '821'),
(402, 8, 'TOTORO', '824'),
(403, 8, 'VILLA RICA', '845'),
(404, 9, 'VALLEDUPAR', '001'),
(405, 9, 'AGUACHICA', '011'),
(406, 9, 'AGUSTIN CODAZZI', '013'),
(407, 9, 'ASTREA', '032'),
(408, 9, 'BECERRIL', '045'),
(409, 9, 'BOSCONIA', '060'),
(410, 9, 'CHIMICHAGUA', '175'),
(411, 9, 'CHIRIGUANA', '178'),
(412, 9, 'CURUMANI', '228'),
(413, 9, 'EL COPEY', '238'),
(414, 9, 'EL PASO', '250'),
(415, 9, 'GAMARRA', '295'),
(416, 9, 'GONZALEZ', '310'),
(417, 9, 'LA GLORIA', '383'),
(418, 9, 'LA JAGUA DE IBI', '400'),
(419, 9, 'MANAURE', '443'),
(420, 9, 'PAILITAS', '517'),
(421, 9, 'PELAYA', '550'),
(422, 9, 'PUEBLO BELLO', '570'),
(423, 9, 'RIO DE ORO', '614'),
(424, 9, 'LA PAZ', '621'),
(425, 9, 'SAN ALBERTO', '710'),
(426, 9, 'SAN DIEGO', '750'),
(427, 9, 'SAN MARTIN', '770'),
(428, 9, 'TAMALAMEQUE', '787'),
(429, 10, 'MONTERIA', '001'),
(430, 10, 'AYAPEL', '068'),
(431, 10, 'BUENAVISTA', '079'),
(432, 10, 'CANALETE', '090'),
(433, 10, 'CERETE', '162'),
(434, 10, 'CHIMA', '168'),
(435, 10, 'CHINU', '182'),
(436, 10, 'CIENAGA DE ORO', '189'),
(437, 10, 'COTORRA', '300'),
(438, 10, 'LA APARTADA', '350'),
(439, 10, 'LORICA', '417'),
(440, 10, 'LOS CORDOBAS', '419'),
(441, 10, 'MOMIL', '464'),
(442, 10, 'MONTELIBANO', '466'),
(443, 10, 'MO?ITOS', '500'),
(444, 10, 'PLANETA RICA', '555'),
(445, 10, 'PUEBLO NUEVO', '570'),
(446, 10, 'PUERTO ESCONDID', '574'),
(447, 10, 'PUERTO LIBERTAD', '580'),
(448, 10, 'PURISIMA', '586'),
(449, 10, 'SAHAGUN', '660'),
(450, 10, 'SAN ANDRES SOTA', '670'),
(451, 10, 'SAN ANTERO', '672'),
(452, 10, 'SAN BERNARDO DE', '675'),
(453, 10, 'SAN CARLOS', '678'),
(454, 10, 'SAN PELAYO', '686'),
(455, 10, 'TIERRALTA', '807'),
(456, 10, 'VALENCIA', '855'),
(457, 11, 'AGUA DE DIOS', '001'),
(458, 11, 'ALBAN', '019'),
(459, 11, 'ANAPOIMA', '035'),
(460, 11, 'ANOLAIMA', '040'),
(461, 11, 'ARBELAEZ', '053'),
(462, 11, 'BELTRAN', '086'),
(463, 11, 'BITUIMA', '095'),
(464, 11, 'BOJACA', '099'),
(465, 11, 'CABRERA', '120'),
(466, 11, 'CACHIPAY', '123'),
(467, 11, 'CAJICA', '126'),
(468, 11, 'CAPARRAPI', '148'),
(469, 11, 'CAQUEZA', '151'),
(470, 11, 'CARMEN DE CARUP', '154'),
(471, 11, 'CHAGUANI', '168'),
(472, 11, 'CHIA', '175'),
(473, 11, 'CHIPAQUE', '178'),
(474, 11, 'CHOACHI', '181'),
(475, 11, 'CHOCONTA', '183'),
(476, 11, 'COGUA', '200'),
(477, 11, 'COTA', '214'),
(478, 11, 'CUCUNUBA', '224'),
(479, 11, 'EL COLEGIO', '245'),
(480, 11, 'EL PE?ON', '258'),
(481, 11, 'EL ROSAL', '260'),
(482, 11, 'FACATATIVA', '269'),
(483, 11, 'FOMEQUE', '279'),
(484, 11, 'FOSCA', '281'),
(485, 11, 'FUNZA', '286'),
(486, 11, 'FUQUENE', '288'),
(487, 11, 'FUSAGASUGA', '290'),
(488, 11, 'GACHALA', '293'),
(489, 11, 'GACHANCIPA', '295'),
(490, 11, 'GACHETA', '297'),
(491, 11, 'GAMA', '299'),
(492, 11, 'GIRARDOT', '307'),
(493, 11, 'GRANADA', '312'),
(494, 11, 'GUACHETA', '317'),
(495, 11, 'GUADUAS', '320'),
(496, 11, 'GUASCA', '322'),
(497, 11, 'GUATAQUI', '324'),
(498, 11, 'GUATAVITA', '326'),
(499, 11, 'GUAYABAL DE SIQ', '328'),
(500, 11, 'GUAYABETAL', '335'),
(501, 11, 'GUTIERREZ', '339'),
(502, 11, 'JERUSALEN', '368'),
(503, 11, 'JUNIN', '372'),
(504, 11, 'LA CALERA', '377'),
(505, 11, 'LA MESA', '386'),
(506, 11, 'LA PALMA', '394'),
(507, 11, 'LA PE?A', '398'),
(508, 11, 'LA VEGA', '402'),
(509, 11, 'LENGUAZAQUE', '407'),
(510, 11, 'MACHETA', '426'),
(511, 11, 'MADRID', '430'),
(512, 11, 'MANTA', '436'),
(513, 11, 'MEDINA', '438'),
(514, 11, 'MOSQUERA', '473'),
(515, 11, 'NARI?O', '483'),
(516, 11, 'NEMOCON', '486'),
(517, 11, 'NILO', '488'),
(518, 11, 'NIMAIMA', '489'),
(519, 11, 'NOCAIMA', '491'),
(520, 11, 'VENECIA', '506'),
(521, 11, 'PACHO', '513'),
(522, 11, 'PAIME', '518'),
(523, 11, 'PANDI', '524'),
(524, 11, 'PARATEBUENO', '530'),
(525, 11, 'PASCA', '535'),
(526, 11, 'PUERTO SALGAR', '572'),
(527, 11, 'PULI', '580'),
(528, 11, 'QUEBRADANEGRA', '592'),
(529, 11, 'QUETAME', '594'),
(530, 11, 'QUIPILE', '596'),
(531, 11, 'APULO', '599'),
(532, 11, 'RICAURTE', '612'),
(533, 11, 'SAN ANTONIO DEL', '645'),
(534, 11, 'SAN BERNARDO', '649'),
(535, 11, 'SAN CAYETANO', '653'),
(536, 11, 'SAN FRANCISCO', '658'),
(537, 11, 'SAN JUAN DE RIO', '662'),
(538, 11, 'SASAIMA', '718'),
(539, 11, 'SESQUILE', '736'),
(540, 11, 'SIBATE', '740'),
(541, 11, 'SILVANIA', '743'),
(542, 11, 'SIMIJACA', '745'),
(543, 11, 'SOACHA', '754'),
(544, 11, 'SOPO', '758'),
(545, 11, 'SUBACHOQUE', '769'),
(546, 11, 'SUESCA', '772'),
(547, 11, 'SUPATA', '777'),
(548, 11, 'SUSA', '779'),
(549, 11, 'SUTATAUSA', '781'),
(550, 11, 'TABIO', '785'),
(551, 11, 'TAUSA', '793'),
(552, 11, 'TENA', '797'),
(553, 11, 'TENJO', '799'),
(554, 11, 'TIBACUY', '805'),
(555, 11, 'TIBIRITA', '807'),
(556, 11, 'TOCAIMA', '815'),
(557, 11, 'TOCANCIPA', '817'),
(558, 11, 'TOPAIPI', '823'),
(559, 11, 'UBALA', '839'),
(560, 11, 'UBAQUE', '841'),
(561, 11, 'VILLA DE SAN DI', '843'),
(562, 11, 'UNE', '845'),
(563, 11, 'UTICA', '851'),
(564, 11, 'VERGARA', '862'),
(565, 11, 'VIANI', '867'),
(566, 11, 'VILLAGOMEZ', '871'),
(567, 11, 'VILLAPINZON', '873'),
(568, 11, 'VILLETA', '875'),
(569, 11, 'VIOTA', '878'),
(570, 11, 'YACOPI', '885'),
(571, 11, 'ZIPACON', '898'),
(572, 11, 'ZIPAQUIRA', '899'),
(573, 12, 'QUIBDO', '001'),
(574, 12, 'ACANDI', '006'),
(575, 12, 'ALTO BAUDO', '025'),
(576, 12, 'ATRATO', '050'),
(577, 12, 'BAGADO', '073'),
(578, 12, 'BAHIA SOLANO', '075'),
(579, 12, 'BAJO BAUDO', '077'),
(580, 12, 'BOJAYA', '099'),
(581, 12, 'EL CANTON DEL S', '135'),
(582, 12, 'CARMEN DEL DARI', '150'),
(583, 12, 'CERTEGUI', '160'),
(584, 12, 'CONDOTO', '205'),
(585, 12, 'EL CARMEN DE AT', '245'),
(586, 12, 'EL LITORAL DEL ', '250'),
(587, 12, 'ISTMINA', '361'),
(588, 12, 'JURADO', '372'),
(589, 12, 'LLORO', '413'),
(590, 12, 'MEDIO ATRATO', '425'),
(591, 12, 'MEDIO BAUDO', '430'),
(592, 12, 'MEDIO SAN JUAN', '450'),
(593, 12, 'NOVITA', '491'),
(594, 12, 'NUQUI', '495'),
(595, 12, 'RIO IRO', '580'),
(596, 12, 'RIO QUITO', '600'),
(597, 12, 'RIOSUCIO', '615'),
(598, 12, 'SAN JOSE DEL PA', '660'),
(599, 12, 'SIPI', '745'),
(600, 12, 'TADO', '787'),
(601, 12, 'UNGUIA', '800'),
(602, 12, 'UNION PANAMERIC', '810'),
(603, 13, 'NEIVA', '001'),
(604, 13, 'ACEVEDO', '006'),
(605, 13, 'AGRADO', '013'),
(606, 13, 'AIPE', '016'),
(607, 13, 'ALGECIRAS', '020'),
(608, 13, 'ALTAMIRA', '026'),
(609, 13, 'BARAYA', '078'),
(610, 13, 'CAMPOALEGRE', '132'),
(611, 13, 'COLOMBIA', '206'),
(612, 13, 'ELIAS', '244'),
(613, 13, 'GARZON', '298'),
(614, 13, 'GIGANTE', '306'),
(615, 13, 'GUADALUPE', '319'),
(616, 13, 'HOBO', '349'),
(617, 13, 'IQUIRA', '357'),
(618, 13, 'ISNOS', '359'),
(619, 13, 'LA ARGENTINA', '378'),
(620, 13, 'LA PLATA', '396'),
(621, 13, 'NATAGA', '483'),
(622, 13, 'OPORAPA', '503'),
(623, 13, 'PAICOL', '518'),
(624, 13, 'PALERMO', '524'),
(625, 13, 'PALESTINA', '530'),
(626, 13, 'PITAL', '548'),
(627, 13, 'PITALITO', '551'),
(628, 13, 'RIVERA', '615'),
(629, 13, 'SALADOBLANCO', '660'),
(630, 13, 'SAN AGUSTIN', '668'),
(631, 13, 'SANTA MARIA', '676'),
(632, 13, 'SUAZA', '770'),
(633, 13, 'TARQUI', '791'),
(634, 13, 'TESALIA', '797'),
(635, 13, 'TELLO', '799'),
(636, 13, 'TERUEL', '801'),
(637, 13, 'TIMANA', '807'),
(638, 13, 'VILLAVIEJA', '872'),
(639, 13, 'YAGUARA', '885'),
(640, 14, 'RIOHACHA', '001'),
(641, 14, 'ALBANIA', '035'),
(642, 14, 'BARRANCAS', '078'),
(643, 14, 'DIBULLA', '090'),
(644, 14, 'DISTRACCION', '098'),
(645, 14, 'EL MOLINO', '110'),
(646, 14, 'FONSECA', '279'),
(647, 14, 'HATONUEVO', '378'),
(648, 14, 'LA JAGUA DEL PI', '420'),
(649, 14, 'MAICAO', '430'),
(650, 14, 'MANAURE', '560'),
(651, 14, 'SAN JUAN DEL CE', '650'),
(652, 14, 'URIBIA', '847'),
(653, 14, 'URUMITA', '855'),
(654, 14, 'VILLANUEVA', '874'),
(655, 15, 'SANTA MARTA', '001'),
(656, 15, 'ALGARROBO', '030'),
(657, 15, 'ARACATACA', '053'),
(658, 15, 'ARIGUANI', '058'),
(659, 15, 'CERRO SAN ANTON', '161'),
(660, 15, 'CHIBOLO', '170'),
(661, 15, 'CIENAGA', '189'),
(662, 15, 'CONCORDIA', '205'),
(663, 15, 'EL BANCO', '245'),
(664, 15, 'EL PI?ON', '258'),
(665, 15, 'EL RETEN', '268'),
(666, 15, 'FUNDACION', '288'),
(667, 15, 'GUAMAL', '318'),
(668, 15, 'NUEVA GRANADA', '460'),
(669, 15, 'PEDRAZA', '541'),
(670, 15, 'PIJI?O DEL CARM', '545'),
(671, 15, 'PIVIJAY', '551'),
(672, 15, 'PLATO', '555'),
(673, 15, 'PUEBLOVIEJO', '570'),
(674, 15, 'REMOLINO', '605'),
(675, 15, 'SABANAS DE SAN ', '660'),
(676, 15, 'SALAMINA', '675'),
(677, 15, 'SAN SEBASTIAN D', '692'),
(678, 15, 'SAN ZENON', '703'),
(679, 15, 'SANTA ANA', '707'),
(680, 15, 'SANTA BARBARA D', '720'),
(681, 15, 'SITIONUEVO', '745'),
(682, 15, 'TENERIFE', '798'),
(683, 15, 'ZAPAYAN', '960'),
(684, 15, 'ZONA BANANERA', '980'),
(685, 16, 'VILLAVICENCIO', '001'),
(686, 16, 'ACACIAS', '006'),
(687, 16, 'BARRANCA DE UPI', '110'),
(688, 16, 'CABUYARO', '124'),
(689, 16, 'CASTILLA LA NUE', '150'),
(690, 16, 'CUBARRAL', '223'),
(691, 16, 'CUMARAL', '226'),
(692, 16, 'EL CALVARIO', '245'),
(693, 16, 'EL CASTILLO', '251'),
(694, 16, 'EL DORADO', '270'),
(695, 16, 'FUENTE DE ORO', '287'),
(696, 16, 'GRANADA', '313'),
(697, 16, 'GUAMAL', '318'),
(698, 16, 'MAPIRIPAN', '325'),
(699, 16, 'MESETAS', '330'),
(700, 16, 'LA MACARENA', '350'),
(701, 16, 'URIBE', '370'),
(702, 16, 'LEJANIAS', '400'),
(703, 16, 'PUERTO CONCORDI', '450'),
(704, 16, 'PUERTO GAITAN', '568'),
(705, 16, 'PUERTO LOPEZ', '573'),
(706, 16, 'PUERTO LLERAS', '577'),
(707, 16, 'PUERTO RICO', '590'),
(708, 16, 'RESTREPO', '606'),
(709, 16, 'SAN CARLOS DE G', '680'),
(710, 16, 'SAN JUAN DE ARA', '683'),
(711, 16, 'SAN JUANITO', '686'),
(712, 16, 'SAN MARTIN', '689'),
(713, 16, 'VISTAHERMOSA', '711'),
(714, 17, 'PASTO', '001'),
(715, 17, 'ALBAN', '019'),
(716, 17, 'ALDANA', '022'),
(717, 17, 'ANCUYA', '036'),
(718, 17, 'ARBOLEDA', '051'),
(719, 17, 'BARBACOAS', '079'),
(720, 17, 'BELEN', '083'),
(721, 17, 'BUESACO', '110'),
(722, 17, 'COLON', '203'),
(723, 17, 'CONSACA', '207'),
(724, 17, 'CONTADERO', '210'),
(725, 17, 'CORDOBA', '215'),
(726, 17, 'CUASPUD', '224'),
(727, 17, 'CUMBAL', '227'),
(728, 17, 'CUMBITARA', '233'),
(729, 17, 'CHACHAGsI', '240'),
(730, 17, 'EL CHARCO', '250'),
(731, 17, 'EL PE?OL', '254'),
(732, 17, 'EL ROSARIO', '256'),
(733, 17, 'EL TABLON DE GO', '258'),
(734, 17, 'EL TAMBO', '260'),
(735, 17, 'FUNES', '287'),
(736, 17, 'GUACHUCAL', '317'),
(737, 17, 'GUAITARILLA', '320'),
(738, 17, 'GUALMATAN', '323'),
(739, 17, 'ILES', '352'),
(740, 17, 'IMUES', '354'),
(741, 17, 'IPIALES', '356'),
(742, 17, 'LA CRUZ', '378'),
(743, 17, 'LA FLORIDA', '381'),
(744, 17, 'LA LLANADA', '385'),
(745, 17, 'LA TOLA', '390'),
(746, 17, 'LA UNION', '399'),
(747, 17, 'LEIVA', '405'),
(748, 17, 'LINARES', '411'),
(749, 17, 'LOS ANDES', '418'),
(750, 17, 'MAGsI', '427'),
(751, 17, 'MALLAMA', '435'),
(752, 17, 'MOSQUERA', '473'),
(753, 17, 'NARI?O', '480'),
(754, 17, 'OLAYA HERRERA', '490'),
(755, 17, 'OSPINA', '506'),
(756, 17, 'FRANCISCO PIZAR', '520'),
(757, 17, 'POLICARPA', '540'),
(758, 17, 'POTOSI', '560'),
(759, 17, 'PROVIDENCIA', '565'),
(760, 17, 'PUERRES', '573'),
(761, 17, 'PUPIALES', '585'),
(762, 17, 'RICAURTE', '612'),
(763, 17, 'ROBERTO PAYAN', '621'),
(764, 17, 'SAMANIEGO', '678'),
(765, 17, 'SANDONA', '683'),
(766, 17, 'SAN BERNARDO', '685'),
(767, 17, 'SAN LORENZO', '687'),
(768, 17, 'SAN PABLO', '693'),
(769, 17, 'SAN PEDRO DE CA', '694'),
(770, 17, 'SANTA BARBARA', '696'),
(771, 17, 'SANTACRUZ', '699'),
(772, 17, 'SAPUYES', '720'),
(773, 17, 'TAMINANGO', '786'),
(774, 17, 'TANGUA', '788'),
(775, 17, 'SAN ANDRES DE T', '835'),
(776, 17, 'TUQUERRES', '838'),
(777, 17, 'YACUANQUER', '885'),
(778, 18, 'CUCUTA', '001'),
(779, 18, 'ABREGO', '003'),
(780, 18, 'ARBOLEDAS', '051'),
(781, 18, 'BOCHALEMA', '099'),
(782, 18, 'BUCARASICA', '109'),
(783, 18, 'CACOTA', '125'),
(784, 18, 'CACHIRA', '128'),
(785, 18, 'CHINACOTA', '172'),
(786, 18, 'CHITAGA', '174'),
(787, 18, 'CONVENCION', '206'),
(788, 18, 'CUCUTILLA', '223'),
(789, 18, 'DURANIA', '239'),
(790, 18, 'EL CARMEN', '245'),
(791, 18, 'EL TARRA', '250'),
(792, 18, 'EL ZULIA', '261'),
(793, 18, 'GRAMALOTE', '313'),
(794, 18, 'HACARI', '344'),
(795, 18, 'HERRAN', '347'),
(796, 18, 'LABATECA', '377'),
(797, 18, 'LA ESPERANZA', '385'),
(798, 18, 'LA PLAYA', '398'),
(799, 18, 'LOS PATIOS', '405'),
(800, 18, 'LOURDES', '418'),
(801, 18, 'MUTISCUA', '480'),
(802, 18, 'OCA?A', '498'),
(803, 18, 'PAMPLONA', '518'),
(804, 18, 'PAMPLONITA', '520'),
(805, 18, 'PUERTO SANTANDE', '553'),
(806, 18, 'RAGONVALIA', '599'),
(807, 18, 'SALAZAR', '660'),
(808, 18, 'SAN CALIXTO', '670'),
(809, 18, 'SAN CAYETANO', '673'),
(810, 18, 'SANTIAGO', '680'),
(811, 18, 'SARDINATA', '720'),
(812, 18, 'SILOS', '743'),
(813, 18, 'TEORAMA', '800'),
(814, 18, 'TIBU', '810'),
(815, 18, 'TOLEDO', '820'),
(816, 18, 'VILLA CARO', '871'),
(817, 18, 'VILLA DEL ROSAR', '874'),
(818, 19, 'ARMENIA', '001'),
(819, 19, 'BUENAVISTA', '111'),
(820, 19, 'CALARCA', '130'),
(821, 19, 'CIRCASIA', '190'),
(822, 19, 'CORDOBA', '212'),
(823, 19, 'FILANDIA', '272'),
(824, 19, 'GENOVA', '302'),
(825, 19, 'LA TEBAIDA', '401'),
(826, 19, 'MONTENEGRO', '470'),
(827, 19, 'PIJAO', '548'),
(828, 19, 'QUIMBAYA', '594'),
(829, 19, 'SALENTO', '690'),
(830, 20, 'PEREIRA', '001'),
(831, 20, 'APIA', '045'),
(832, 20, 'BALBOA', '075'),
(833, 20, 'BELEN DE UMBRIA', '088'),
(834, 20, 'DOSQUEBRADAS', '170'),
(835, 20, 'GUATICA', '318'),
(836, 20, 'LA CELIA', '383'),
(837, 20, 'LA VIRGINIA', '400'),
(838, 20, 'MARSELLA', '440'),
(839, 20, 'MISTRATO', '456'),
(840, 20, 'PUEBLO RICO', '572'),
(841, 20, 'QUINCHIA', '594'),
(842, 20, 'SANTA ROSA DE C', '682'),
(843, 20, 'SANTUARIO', '687'),
(844, 21, 'BUCARAMANGA', '001'),
(845, 21, 'AGUADA', '013'),
(846, 21, 'ALBANIA', '020'),
(847, 21, 'ARATOCA', '051'),
(848, 21, 'BARBOSA', '077'),
(849, 21, 'BARICHARA', '079'),
(850, 21, 'BARRANCABERMEJA', '081'),
(851, 21, 'BETULIA', '092'),
(852, 21, 'BOLIVAR', '101'),
(853, 21, 'CABRERA', '121'),
(854, 21, 'CALIFORNIA', '132'),
(855, 21, 'CAPITANEJO', '147'),
(856, 21, 'CARCASI', '152'),
(857, 21, 'CEPITA', '160'),
(858, 21, 'CERRITO', '162'),
(859, 21, 'CHARALA', '167'),
(860, 21, 'CHARTA', '169'),
(861, 21, 'CHIMA', '176'),
(862, 21, 'CHIPATA', '179'),
(863, 21, 'CIMITARRA', '190'),
(864, 21, 'CONCEPCION', '207'),
(865, 21, 'CONFINES', '209'),
(866, 21, 'CONTRATACION', '211'),
(867, 21, 'COROMORO', '217'),
(868, 21, 'CURITI', '229'),
(869, 21, 'EL CARMEN DE CH', '235'),
(870, 21, 'EL GUACAMAYO', '245'),
(871, 21, 'EL PE?ON', '250'),
(872, 21, 'EL PLAYON', '255'),
(873, 21, 'ENCINO', '264'),
(874, 21, 'ENCISO', '266'),
(875, 21, 'FLORIAN', '271'),
(876, 21, 'FLORIDABLANCA', '276'),
(877, 21, 'GALAN', '296'),
(878, 21, 'GAMBITA', '298'),
(879, 21, 'GIRON', '307'),
(880, 21, 'GUACA', '318'),
(881, 21, 'GUADALUPE', '320'),
(882, 21, 'GUAPOTA', '322'),
(883, 21, 'GUAVATA', '324'),
(884, 21, 'GsEPSA', '327'),
(885, 21, 'HATO', '344'),
(886, 21, 'JESUS MARIA', '368'),
(887, 21, 'JORDAN', '370'),
(888, 21, 'LA BELLEZA', '377'),
(889, 21, 'LANDAZURI', '385'),
(890, 21, 'LA PAZ', '397'),
(891, 21, 'LEBRIJA', '406'),
(892, 21, 'LOS SANTOS', '418'),
(893, 21, 'MACARAVITA', '425'),
(894, 21, 'MALAGA', '432'),
(895, 21, 'MATANZA', '444'),
(896, 21, 'MOGOTES', '464'),
(897, 21, 'MOLAGAVITA', '468'),
(898, 21, 'OCAMONTE', '498'),
(899, 21, 'OIBA', '500'),
(900, 21, 'ONZAGA', '502'),
(901, 21, 'PALMAR', '522'),
(902, 21, 'PALMAS DEL SOCO', '524'),
(903, 21, 'PARAMO', '533'),
(904, 21, 'PIEDECUESTA', '547'),
(905, 21, 'PINCHOTE', '549'),
(906, 21, 'PUENTE NACIONAL', '572'),
(907, 21, 'PUERTO PARRA', '573'),
(908, 21, 'PUERTO WILCHES', '575'),
(909, 21, 'RIONEGRO', '615'),
(910, 21, 'SABANA DE TORRE', '655'),
(911, 21, 'SAN ANDRES', '669'),
(912, 21, 'SAN BENITO', '673'),
(913, 21, 'SAN GIL', '679'),
(914, 21, 'SAN JOAQUIN', '682'),
(915, 21, 'SAN JOSE DE MIR', '684'),
(916, 21, 'SAN MIGUEL', '686'),
(917, 21, 'SAN VICENTE DE ', '689'),
(918, 21, 'SANTA BARBARA', '705'),
(919, 21, 'SANTA HELENA DE', '720'),
(920, 21, 'SIMACOTA', '745'),
(921, 21, 'SOCORRO', '755'),
(922, 21, 'SUAITA', '770'),
(923, 21, 'SUCRE', '773'),
(924, 21, 'SURATA', '780'),
(925, 21, 'TONA', '820'),
(926, 21, 'VALLE DE SAN JO', '855'),
(927, 21, 'VELEZ', '861'),
(928, 21, 'VETAS', '867'),
(929, 21, 'VILLANUEVA', '872'),
(930, 21, 'ZAPATOCA', '895'),
(931, 22, 'SINCELEJO', '001'),
(932, 22, 'BUENAVISTA', '110'),
(933, 22, 'CAIMITO', '124'),
(934, 22, 'COLOSO', '204'),
(935, 22, 'COROZAL', '215'),
(936, 22, 'COVE?AS', '221'),
(937, 22, 'CHALAN', '230'),
(938, 22, 'EL ROBLE', '233'),
(939, 22, 'GALERAS', '235'),
(940, 22, 'GUARANDA', '265'),
(941, 22, 'LA UNION', '400'),
(942, 22, 'LOS PALMITOS', '418'),
(943, 22, 'MAJAGUAL', '429'),
(944, 22, 'MORROA', '473'),
(945, 22, 'OVEJAS', '508'),
(946, 22, 'PALMITO', '523'),
(947, 22, 'SAMPUES', '670'),
(948, 22, 'SAN BENITO ABAD', '678'),
(949, 22, 'SAN JUAN DE BET', '702'),
(950, 22, 'SAN MARCOS', '708'),
(951, 22, 'SAN ONOFRE', '713'),
(952, 22, 'SAN PEDRO', '717'),
(953, 22, 'SAN LUIS DE SIN', '742'),
(954, 22, 'SUCRE', '771'),
(955, 22, 'SANTIAGO DE TOL', '820'),
(956, 22, 'TOLU VIEJO', '823'),
(957, 23, 'IBAGUE', '001'),
(958, 23, 'ALPUJARRA', '024'),
(959, 23, 'ALVARADO', '026'),
(960, 23, 'AMBALEMA', '030'),
(961, 23, 'ANZOATEGUI', '043'),
(962, 23, 'ARMERO', '055'),
(963, 23, 'ATACO', '067'),
(964, 23, 'CAJAMARCA', '124'),
(965, 23, 'CARMEN DE APICA', '148'),
(966, 23, 'CASABIANCA', '152'),
(967, 23, 'CHAPARRAL', '168'),
(968, 23, 'COELLO', '200'),
(969, 23, 'COYAIMA', '217'),
(970, 23, 'CUNDAY', '226'),
(971, 23, 'DOLORES', '236'),
(972, 23, 'ESPINAL', '268'),
(973, 23, 'FALAN', '270'),
(974, 23, 'FLANDES', '275'),
(975, 23, 'FRESNO', '283'),
(976, 23, 'GUAMO', '319'),
(977, 23, 'HERVEO', '347'),
(978, 23, 'HONDA', '349'),
(979, 23, 'ICONONZO', '352'),
(980, 23, 'LERIDA', '408'),
(981, 23, 'LIBANO', '411'),
(982, 23, 'MARIQUITA', '443'),
(983, 23, 'MELGAR', '449'),
(984, 23, 'MURILLO', '461'),
(985, 23, 'NATAGAIMA', '483'),
(986, 23, 'ORTEGA', '504'),
(987, 23, 'PALOCABILDO', '520'),
(988, 23, 'PIEDRAS', '547'),
(989, 23, 'PLANADAS', '555'),
(990, 23, 'PRADO', '563'),
(991, 23, 'PURIFICACION', '585'),
(992, 23, 'RIOBLANCO', '616'),
(993, 23, 'RONCESVALLES', '622'),
(994, 23, 'ROVIRA', '624'),
(995, 23, 'SALDA?A', '671'),
(996, 23, 'SAN ANTONIO', '675'),
(997, 23, 'SAN LUIS', '678'),
(998, 23, 'SANTA ISABEL', '686'),
(999, 23, 'SUAREZ', '770'),
(1000, 23, 'VALLE DE SAN JU', '854'),
(1001, 23, 'VENADILLO', '861'),
(1002, 23, 'VILLAHERMOSA', '870'),
(1003, 23, 'VILLARRICA', '873'),
(1004, 24, 'CALI', '001'),
(1005, 24, 'ALCALA', '020'),
(1006, 24, 'ANDALUCIA', '036'),
(1007, 24, 'ANSERMANUEVO', '041'),
(1008, 24, 'ARGELIA', '054'),
(1009, 24, 'BOLIVAR', '100'),
(1010, 24, 'BUENAVENTURA', '109'),
(1011, 24, 'GUADALAJARA DE ', '111'),
(1012, 24, 'BUGALAGRANDE', '113'),
(1013, 24, 'CAICEDONIA', '122'),
(1014, 24, 'CALIMA', '126'),
(1015, 24, 'CANDELARIA', '130'),
(1016, 24, 'CARTAGO', '147'),
(1017, 24, 'DAGUA', '233'),
(1018, 24, 'EL AGUILA', '243'),
(1019, 24, 'EL CAIRO', '246'),
(1020, 24, 'EL CERRITO', '248'),
(1021, 24, 'EL DOVIO', '250'),
(1022, 24, 'FLORIDA', '275'),
(1023, 24, 'GINEBRA', '306'),
(1024, 24, 'GUACARI', '318'),
(1025, 24, 'JAMUNDI', '364'),
(1026, 24, 'LA CUMBRE', '377'),
(1027, 24, 'LA UNION', '400'),
(1028, 24, 'LA VICTORIA', '403'),
(1029, 24, 'OBANDO', '497'),
(1030, 24, 'PALMIRA', '520'),
(1031, 24, 'PRADERA', '563'),
(1032, 24, 'RESTREPO', '606'),
(1033, 24, 'RIOFRIO', '616'),
(1034, 24, 'ROLDANILLO', '622'),
(1035, 24, 'SAN PEDRO', '670'),
(1036, 24, 'SEVILLA', '736'),
(1037, 24, 'TORO', '823'),
(1038, 24, 'TRUJILLO', '828'),
(1039, 24, 'TULUA', '834'),
(1040, 24, 'ULLOA', '845'),
(1041, 24, 'VERSALLES', '863'),
(1042, 24, 'VIJES', '869'),
(1043, 24, 'YOTOCO', '890'),
(1044, 24, 'YUMBO', '892'),
(1045, 24, 'ZARZAL', '895'),
(1046, 25, 'ARAUCA', '001'),
(1047, 25, 'ARAUQUITA', '065'),
(1048, 25, 'CRAVO NORTE', '220'),
(1049, 25, 'FORTUL', '300'),
(1050, 25, 'PUERTO RONDON', '591'),
(1051, 25, 'SARAVENA', '736'),
(1052, 25, 'TAME', '794'),
(1053, 26, 'YOPAL', '001'),
(1054, 26, 'AGUAZUL', '010'),
(1055, 26, 'CHAMEZA', '015'),
(1056, 26, 'HATO COROZAL', '125'),
(1057, 26, 'LA SALINA', '136'),
(1058, 26, 'MANI', '139'),
(1059, 26, 'MONTERREY', '162'),
(1060, 26, 'NUNCHIA', '225'),
(1061, 26, 'OROCUE', '230'),
(1062, 26, 'PAZ DE ARIPORO', '250'),
(1063, 26, 'PORE', '263'),
(1064, 26, 'RECETOR', '279'),
(1065, 26, 'SABANALARGA', '300'),
(1066, 26, 'SACAMA', '315'),
(1067, 26, 'SAN LUIS DE PAL', '325'),
(1068, 26, 'TAMARA', '400'),
(1069, 26, 'TAURAMENA', '410'),
(1070, 26, 'TRINIDAD', '430'),
(1071, 26, 'VILLANUEVA', '440'),
(1072, 27, 'MOCOA', '001'),
(1073, 27, 'COLON', '219'),
(1074, 27, 'ORITO', '320'),
(1075, 27, 'PUERTO ASIS', '568'),
(1076, 27, 'PUERTO CAICEDO', '569'),
(1077, 27, 'PUERTO GUZMAN', '571'),
(1078, 27, 'LEGUIZAMO', '573'),
(1079, 27, 'SIBUNDOY', '749'),
(1080, 27, 'SAN FRANCISCO', '755'),
(1081, 27, 'SAN MIGUEL', '757'),
(1082, 27, 'SANTIAGO', '760'),
(1083, 27, 'VALLE DEL GUAMU', '865'),
(1084, 27, 'VILLAGARZON', '885'),
(1085, 28, 'SAN ANDRES', '001'),
(1086, 28, 'PROVIDENCIA', '564'),
(1087, 29, 'LETICIA', '001'),
(1088, 29, 'EL ENCANTO', '263'),
(1089, 29, 'LA CHORRERA', '405'),
(1090, 29, 'LA PEDRERA', '407'),
(1091, 29, 'LA VICTORIA', '430'),
(1092, 29, 'MIRITI - PARANA', '460'),
(1093, 29, 'PUERTO ALEGRIA', '530'),
(1094, 29, 'PUERTO ARICA', '536'),
(1095, 29, 'PUERTO NARI?O', '540'),
(1096, 29, 'PUERTO SANTANDE', '669'),
(1097, 29, 'TARAPACA', '798'),
(1098, 30, 'INIRIDA', '001'),
(1099, 30, 'BARRANCO MINAS', '343'),
(1100, 30, 'MAPIRIPANA', '663'),
(1101, 30, 'SAN FELIPE', '883'),
(1102, 30, 'PUERTO COLOMBIA', '884'),
(1103, 30, 'LA GUADALUPE', '885'),
(1104, 30, 'CACAHUAL', '886'),
(1105, 30, 'PANA PANA', '887'),
(1106, 30, 'MORICHAL', '888'),
(1107, 31, 'SAN JOSE DEL GU', '001'),
(1108, 31, 'CALAMAR', '015'),
(1109, 31, 'EL RETORNO', '025'),
(1110, 31, 'MIRAFLORES', '200'),
(1111, 32, 'MITU', '001'),
(1112, 32, 'CARURU', '161'),
(1113, 32, 'PACOA', '511'),
(1114, 32, 'TARAIRA', '666'),
(1115, 32, 'PAPUNAUA', '777'),
(1116, 32, 'YAVARATE', '889'),
(1117, 33, 'PUERTO CARRE?O', '001'),
(1118, 33, 'LA PRIMAVERA', '524'),
(1119, 33, 'SANTA ROSALIA', '624'),
(1120, 33, 'CUMARIBO', '773');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `iddepartamento` int(15) NOT NULL,
  `nombre` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `codigo` varchar(15) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`iddepartamento`, `nombre`, `codigo`) VALUES
(0, 'departamento', 'codigo'),
(1, 'ANTIOQUIA', '05'),
(2, 'ATLANTICO', '08'),
(3, 'BOGOTA', '11'),
(4, 'BOLIVAR', '13'),
(5, 'BOYACA', '15'),
(6, 'CALDAS', '17'),
(7, 'CAQUETA', '18'),
(8, 'CAUCA', '19'),
(9, 'CESAR', '20'),
(10, 'CORDOBA', '23'),
(11, 'CUNDINAMARCA', '25'),
(12, 'CHOCO', '27'),
(13, 'HUILA', '41'),
(14, 'LA GUAJIRA', '44'),
(15, 'MAGDALENA', '47'),
(16, 'META', '50'),
(17, 'NARI?O', '52'),
(18, 'N. DE SANTANDER', '54'),
(19, 'QUINDIO', '63'),
(20, 'RISARALDA', '66'),
(21, 'SANTANDER', '68'),
(22, 'SUCRE', '70'),
(23, 'TOLIMA', '73'),
(24, 'VALLE DEL CAUCA', '76'),
(25, 'ARAUCA', '81'),
(26, 'CASANARE', '85'),
(27, 'PUTUMAYO', '86'),
(28, 'SAN ANDRES', '88'),
(29, 'AMAZONAS', '91'),
(30, 'GUAINIA', '94'),
(31, 'GUAVIARE', '95'),
(32, 'VAUPES', '97'),
(33, 'VICHADA', '99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `idhistorial` int(15) NOT NULL,
  `iduser` int(15) NOT NULL,
  `ip` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` varchar(15) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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
(61, 1023911054, '192.168.0.4', '2016-06-08'),
(62, 1023911054, '192.168.0.3', '2016-06-09'),
(63, 53055373, '192.168.0.3', '2016-06-09'),
(64, 1023911054, '::1', '2016-06-09'),
(65, 1030570356, '192.168.0.7', '2016-06-09'),
(66, 53055373, '::1', '2016-06-10'),
(67, 1023911054, '192.168.0.17', '2016-06-13'),
(68, 1030570356, '192.168.0.7', '2016-06-13'),
(69, 1023911054, '::1', '2016-06-13'),
(70, 1023911054, '::1', '2016-06-16'),
(71, 1030570356, '192.168.0.17', '2016-06-17'),
(72, 1030570356, '127.0.0.1', '2016-06-20'),
(73, 1030570356, '127.0.0.1', '2016-06-21'),
(74, 1030570356, '127.0.0.1', '2016-06-22'),
(75, 1030570356, '127.0.0.1', '2016-06-22'),
(76, 1030570356, '127.0.0.1', '2016-06-22'),
(77, 1030570356, '127.0.0.1', '2016-06-22'),
(78, 1030570356, '192.168.0.24', '2016-06-23'),
(79, 1030570356, '192.168.0.24', '2016-06-23'),
(80, 1030570356, '192.168.0.24', '2016-06-23'),
(81, 1030570356, '192.168.0.24', '2016-06-23'),
(82, 1030570356, '192.168.0.24', '2016-06-23'),
(83, 1030570356, '192.168.0.24', '2016-06-23'),
(84, 1030570356, '192.168.0.24', '2016-06-24'),
(85, 1023911054, '192.168.0.3', '2016-06-24'),
(86, 1030570356, '192.168.0.23', '2016-06-24'),
(87, 1023911054, '192.168.0.24', '2016-06-24'),
(88, 53055373, '192.168.0.3', '2016-06-24'),
(89, 1030570356, '192.168.0.11', '2016-06-28'),
(90, 1023911054, '192.168.0.25', '2016-06-28'),
(91, 1023911054, '192.168.0.3', '2016-06-28'),
(92, 1023911054, '192.168.0.25', '2016-06-28'),
(93, 1023911054, '192.168.0.25', '2016-06-28'),
(94, 1023911054, '192.168.0.25', '2016-06-28'),
(95, 1030570356, '192.168.0.4', '2016-07-11'),
(96, 1023911054, '192.168.0.5', '2016-07-11'),
(97, 1030570356, '192.168.0.4', '2016-07-11'),
(98, 80248331, '192.168.0.4', '2016-07-11'),
(99, 80248331, '192.168.0.4', '2016-07-11'),
(100, 1023911054, '192.168.0.5', '2016-07-11'),
(101, 1023911054, '192.168.0.5', '2016-07-11'),
(102, 1023911054, '192.168.0.5', '2016-07-11'),
(103, 1023911054, '192.168.0.5', '2016-07-11'),
(104, 1023911054, '192.168.0.5', '2016-07-11'),
(105, 1023911054, '192.168.0.5', '2016-07-11'),
(106, 1030570356, '192.168.0.4', '2016-07-11'),
(107, 1030570356, '192.168.0.4', '2016-07-11'),
(108, 1030570356, '192.168.0.4', '2016-07-11'),
(109, 1030570356, '192.168.0.4', '2016-07-12'),
(110, 1030570356, '192.168.0.4', '2016-07-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idinventario` int(15) NOT NULL,
  `idbodega` int(40) NOT NULL,
  `ncedula` int(15) NOT NULL,
  `idmarcas` int(15) NOT NULL,
  `idlineas` int(15) NOT NULL,
  `referencia` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `numerolote` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `tipopresentacion` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `stockminimo` int(4) NOT NULL,
  `stockmaximo` int(4) NOT NULL,
  `precio` double NOT NULL,
  `costo` double NOT NULL,
  `estado` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `saldo` int(15) NOT NULL,
  `fechadevencimiento` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `iva` int(11) NOT NULL,
  `fechamodificado` varchar(15) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`idinventario`, `idbodega`, `ncedula`, `idmarcas`, `idlineas`, `referencia`, `descripcion`, `numerolote`, `tipopresentacion`, `stockminimo`, `stockmaximo`, `precio`, `costo`, `estado`, `saldo`, `fechadevencimiento`, `iva`, `fechamodificado`) VALUES
(1939, 1, 1030570356, 1, 6, 'OSAT-576', 'PUTTY 1 CC', '0', 'CC', 10, 50, 1316700, 488334, '1', 2, '2024-02-14', 0, '2016-07-11 (20:'),
(1940, 1, 1023911054, 1, 6, 'OSAT-577', 'PUTTY 2.0 CC', '0', 'CC', 10, 50, 2978745, 920881, '1', 6, '3000-01-01', 0, '2016-07-11 (19:'),
(1941, 1, 1023911054, 1, 6, 'OSAT-578', 'PUTTY 5 CC', '0', 'CC', 10, 50, 3978975, 1687000, '1', 2, '3000-01-01', 0, '2016-07-11 (19:'),
(1942, 1, 1023911054, 1, 6, 'OSAT-579', 'PUTTY 10 CC', '0', 'CC', 10, 50, 6060285, 2583000, '1', 0, '3000-01-01', 0, '2016-07-11 (19:'),
(1943, 1, 1023911054, 1, 6, 'OSAT-423', 'CHIPS DE 5 CC', '0', 'CC', 10, 50, 2020095, 673400, '1', 4, '3000-01-01', 0, '2016-07-11 (19:'),
(1944, 1, 1023911054, 1, 6, 'OSAT-422', 'CHIPS DE 7.5 CC', '0', 'CC', 10, 50, 2426078, 1346800, '1', 2, '3000-01-01', 0, '2016-07-11 (19:'),
(1945, 1, 1023911054, 1, 6, 'OSAT-421', 'CHIPS DE 10 CC', '0', 'CC', 10, 50, 2889810, 1001490, '1', 6, '3000-01-01', 0, '2016-07-11 (19:'),
(1946, 1, 1023911054, 1, 6, 'OSAT-406', 'CHIPS DE 15 CC', '0', 'CC', 10, 50, 4909905, 896000, '1', 4, '3000-01-01', 0, '2016-07-11 (19:'),
(1947, 1, 1023911054, 1, 6, 'OSAT-402', 'CUBOS DE 15 CC', '0', 'CC', 10, 50, 2171262, 664344, '1', 2, '3000-02-02', 0, '2016-07-11 (20:'),
(1948, 1, 1023911054, 1, 6, 'OSAT-401', 'CUBOS DE 30 CC', '0', 'CC', 10, 50, 3136267, 959608, '1', 0, '3000-01-01', 0, '2016-07-11 (20:'),
(1949, 1, 1023911054, 1, 6, 'OSAT-521', 'GRANULOS DE 1 CC', '0', 'CC', 10, 50, 820254, 283500, '1', 3, '3000-01-01', 0, '2016-07-11 (20:'),
(1950, 1, 1023911054, 1, 6, 'OSAT-522', 'GRANULOS DE 2 CC', '0', 'CC', 10, 50, 1158006, 477000, '1', 1, '3000-01-01', 0, '2016-07-11 (20:'),
(1952, 1, 1030570356, 1, 6, 'OSBCG-01', 'MEMBRANA 25X25X20', '0', 'UNIDAD', 10, 10, 0, 207000, '1', 3, '3000-01-01', 0, '2016-07-11 (20:'),
(1953, 1, 1023911054, 1, 6, 'OSAT-575', 'PUTTY 0.5 CC', '0', 'CC', 10, 50, 881265, 274081, '1', 4, '3000-01-05', 0, '2016-07-11 (19:'),
(1956, 8, 1023911054, 1, 6, 'OSAT-575', 'PUTTY 0.5 CC', '0', 'CC', 10, 50, 881265, 274081, '1', 3, '3000-01-05', 0, '2016-07-11 (19:'),
(1957, 8, 1030570356, 1, 6, 'OSAT-576', 'PUTTY 1 CC', '0', 'CC', 10, 50, 1316700, 488334, '1', 3, '2024-02-14', 0, '2016-07-11 (19:'),
(1958, 8, 1030570356, 1, 6, 'OSBCG-01', 'MEMBRANA 25X25X20', '0', 'UNIDAD', 10, 10, 0, 207000, '1', 3, '3000-01-01', 0, '2016-07-11 (20:'),
(1959, 1, 80248331, 1, 2, '456', 'NOREF', '456', 'UNI', 10, 100, 0, 1, '1', 15, '2016-12-31', 0, '2016-07-11 (23:');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex`
--

CREATE TABLE `kardex` (
  `idkardex` int(11) NOT NULL,
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
  `signo` varchar(45) NOT NULL COMMENT 'negativo,positivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `kardex`
--

INSERT INTO `kardex` (`idkardex`, `producto`, `documento`, `fecha_creacion_documento`, `hora_creacion_documento`, `bodega_salida`, `bodega_entrada`, `usuario_salida`, `cantidad`, `precio`, `costo`, `cliente`, `saldo_anterior`, `entrada`, `salida`, `saldo_nuevo`, `concepto`, `signo`) VALUES
(136, 1938, 'T1', '2016-07-11', '20:24:29', 1, 8, 1023911054, 3, 0, 274081, 8, 17, 0, 3, 14, 'REMISION', '-'),
(137, 1939, 'T1', '2016-07-11', '20:24:29', 1, 8, 1023911054, 3, 0, 488334, 8, 15, 0, 3, 12, 'REMISION', '-'),
(138, 1952, 'T1', '2016-07-11', '20:24:29', 1, 8, 1023911054, 3, 0, 207000, 8, 5, 0, 3, 2, 'REMISION', '-'),
(139, 1939, 'T2', '2016-07-11', '20:42:20', 1, 7, 1023911054, 1, 0, 488334, 7, 15, 0, 1, 14, 'REMISION', '-'),
(140, 1941, 'T2', '2016-07-11', '20:42:20', 1, 7, 1023911054, 1, 0, 1687000, 7, 57, 0, 1, 56, 'REMISION', '-'),
(141, 1952, 'T3', '2016-07-11', '22:25:18', 1, 6, 80248331, 2, 0, 207000, 6, 5, 0, 2, 3, 'REMISION', '-'),
(142, 1941, 'T4', '2016-07-11', '22:31:12', 1, 5, 80248331, 3, 0, 1687000, 5, 56, 0, 3, 53, 'REMISION', '-'),
(143, 1940, 'T5', '2016-07-11', '22:32:32', 1, 4, 80248331, 1, 0, 920881, 4, 23, 0, 1, 22, 'REMISION', '-'),
(144, 1941, 'T5', '2016-07-11', '22:32:32', 1, 4, 80248331, 3, 0, 1687000, 4, 53, 0, 3, 50, 'REMISION', '-'),
(145, 1953, 'T6', '2016-07-11', '22:34:44', 1, 3, 80248331, 7, 0, 274081, 3, 17, 0, 7, 10, 'REMISION', '-'),
(146, 1939, 'T6', '2016-07-11', '22:34:44', 1, 3, 80248331, 6, 0, 488334, 3, 14, 0, 6, 8, 'REMISION', '-'),
(147, 1940, 'T6', '2016-07-11', '22:34:44', 1, 3, 80248331, 8, 0, 920881, 3, 22, 0, 8, 14, 'REMISION', '-'),
(148, 1941, 'T6', '2016-07-11', '22:34:44', 1, 3, 80248331, 16, 0, 1687000, 3, 50, 0, 16, 34, 'REMISION', '-'),
(149, 1942, 'T6', '2016-07-11', '22:34:44', 1, 3, 80248331, 4, 0, 2583000, 3, 13, 0, 4, 9, 'REMISION', '-'),
(150, 1943, 'T6', '2016-07-11', '22:34:45', 1, 3, 80248331, 5, 0, 673400, 3, 13, 0, 5, 8, 'REMISION', '-'),
(151, 1945, 'T6', '2016-07-11', '22:34:45', 1, 3, 80248331, 6, 0, 1001490, 3, 17, 0, 6, 11, 'REMISION', '-'),
(152, 1946, 'T6', '2016-07-11', '22:34:45', 1, 3, 80248331, 3, 0, 896000, 3, 8, 0, 3, 5, 'REMISION', '-'),
(153, 1953, 'T7', '2016-07-11', '22:36:57', 1, 2, 80248331, 3, 0, 274081, 2, 10, 0, 3, 7, 'REMISION', '-'),
(154, 1939, 'T7', '2016-07-11', '22:36:57', 1, 2, 80248331, 2, 0, 488334, 2, 8, 0, 2, 6, 'REMISION', '-'),
(155, 1940, 'T7', '2016-07-11', '22:36:58', 1, 2, 80248331, 2, 0, 920881, 2, 14, 0, 2, 12, 'REMISION', '-'),
(156, 1941, 'T7', '2016-07-11', '22:36:58', 1, 2, 80248331, 12, 0, 1687000, 2, 34, 0, 12, 22, 'REMISION', '-'),
(157, 1942, 'T7', '2016-07-11', '22:36:58', 1, 2, 80248331, 1, 0, 2583000, 2, 9, 0, 1, 8, 'REMISION', '-'),
(158, 1943, 'T7', '2016-07-11', '22:36:58', 1, 2, 80248331, 1, 0, 673400, 2, 8, 0, 1, 7, 'REMISION', '-'),
(159, 1945, 'T7', '2016-07-11', '22:36:58', 1, 2, 80248331, 1, 0, 1001490, 2, 11, 0, 1, 10, 'REMISION', '-'),
(160, 1950, 'T7', '2016-07-11', '22:36:58', 1, 2, 80248331, 1, 0, 477000, 2, 2, 0, 1, 1, 'REMISION', '-'),
(161, 1953, 'T8', '2016-07-11', '22:39:52', 1, 9, 80248331, 3, 0, 274081, 9, 7, 0, 3, 4, 'REMISION', '-'),
(162, 1939, 'T8', '2016-07-11', '22:39:52', 1, 9, 80248331, 4, 0, 488334, 9, 6, 0, 4, 2, 'REMISION', '-'),
(163, 1940, 'T8', '2016-07-11', '22:39:53', 1, 9, 80248331, 6, 0, 920881, 9, 12, 0, 6, 6, 'REMISION', '-'),
(164, 1941, 'T8', '2016-07-11', '22:39:53', 1, 9, 80248331, 20, 0, 1687000, 9, 22, 0, 20, 2, 'REMISION', '-'),
(165, 1942, 'T8', '2016-07-11', '22:39:53', 1, 9, 80248331, 8, 0, 2583000, 9, 8, 0, 8, 0, 'REMISION', '-'),
(166, 1943, 'T8', '2016-07-11', '22:39:53', 1, 9, 80248331, 3, 0, 673400, 9, 7, 0, 3, 4, 'REMISION', '-'),
(167, 1945, 'T8', '2016-07-11', '22:39:53', 1, 9, 80248331, 4, 0, 1001490, 9, 10, 0, 4, 6, 'REMISION', '-'),
(168, 1946, 'T8', '2016-07-11', '22:39:53', 1, 9, 80248331, 1, 0, 896000, 9, 5, 0, 1, 4, 'REMISION', '-'),
(169, 1948, 'T8', '2016-07-11', '22:39:53', 1, 9, 80248331, 1, 0, 959608, 9, 1, 0, 1, 0, 'REMISION', '-'),
(170, 1959, 'O1', '2016-07-11', '23:23:08', 1, 1023911054, 80248331, 13, 0, 1, 1023911054, 10, 13, 13, 10, 'ORDEN', '-'),
(171, 1959, 'R1', '2016-07-11', '23:29:12', 1, 1023911054, 80248331, 10, 0, 1, 1023911054, 10, 0, 10, 0, 'REMISION', '-'),
(172, 1959, 'H2', '2016-07-11', '23:31:10', 1, 1023911054, 80248331, 2, 0, 1, 1023911054, 7, 0, 2, 5, 'HOJADEGASTO', '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas`
--

CREATE TABLE `lineas` (
  `idlineas` int(15) NOT NULL,
  `nombre` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `lineas`
--

INSERT INTO `lineas` (`idlineas`, `nombre`, `descripcion`) VALUES
(1, 'LINEA1', 'LINEA1'),
(2, 'LINEA2', 'LINEA2'),
(3, 'LINEA3', 'LINEA3'),
(4, 'LINEA4', 'LINEA4'),
(5, 'LINEA5', 'LINEA5'),
(6, 'BIOMATERIALES ', 'Biomateriales '),
(7, 'LINEA7', 'LINEA7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `idmarcas` int(15) NOT NULL,
  `idtercero` int(15) NOT NULL,
  `nombre` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`idmarcas`, `idtercero`, `nombre`, `descripcion`) VALUES
(1, 1, 'GENERICA', 'OTRAS MARCAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `id_observacion` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `documento` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `observacion` varchar(700) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` varchar(15) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `observaciones`
--

INSERT INTO `observaciones` (`id_observacion`, `idusuario`, `documento`, `observacion`, `fecha`) VALUES
(13, 80248331, 'T1', 'LOS PRODUCTOS LLEGARON OK ', '2016-07-11'),
(14, 80248331, 'T2', 'SE APROBO OK', '2016-07-11'),
(15, 80248331, 'T3', 'OK', '2016-07-11'),
(16, 80248331, 'T4', 'SE APROBO CON UNA LLAMADA XXXXX', '2016-07-11'),
(17, 80248331, 'T5', 'EN PROCESO DE ENVIO', '2016-07-11'),
(18, 80248331, 'T6', '..', '2016-07-11'),
(19, 80248331, 'T8', '...', '2016-07-11'),
(20, 80248331, 'T8', '...', '2016-07-11'),
(21, 80248331, 'T5', '...', '2016-07-11'),
(22, 80248331, 'T7', '...', '2016-07-11'),
(23, 80248331, 'O1', 'LAS CANTIDES NO SE ENCUENTRAN DISPONIBLES', '2016-07-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `idpaciente` int(15) NOT NULL,
  `nombrecirujano` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `nombrepaciente` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `numerodecedulapaciente` int(15) NOT NULL,
  `historiaclinica` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `fechacirujia` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `fechamodificado` varchar(15) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`idpaciente`, `nombrecirujano`, `nombrepaciente`, `numerodecedulapaciente`, `historiaclinica`, `fechacirujia`, `fechamodificado`) VALUES
(70, 'OSMED', 'OSMED', 2016, '2016', '15/06/2016', ''),
(82, 'DR JARA', 'ALEJANDRO', 1030570356, '1030570356', '2016-07-12', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedido` int(15) NOT NULL,
  `referencia` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `cantidad` int(15) NOT NULL,
  `fechapedido` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `estado` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `idusuario` int(15) NOT NULL,
  `observaciones` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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
  `fecha` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `subtotal` int(15) NOT NULL,
  `iva` int(15) NOT NULL,
  `descuento` int(15) NOT NULL,
  `fletes` int(15) NOT NULL,
  `estado` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `retefuente` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `total` int(15) NOT NULL,
  `documento` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `observacioneliminado` varchar(250) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `remision`
--

INSERT INTO `remision` (`idremision`, `idsalida`, `idbodega`, `idpaciente`, `idusuario`, `idclientes`, `fecha`, `subtotal`, `iva`, `descuento`, `fletes`, `estado`, `retefuente`, `total`, `documento`, `observacioneliminado`) VALUES
(114, 1, 1, 70, 1023911054, 18, '2016-07-11', 0, 0, 0, 0, '2', '0', 0, 'T1', 'TRASLSDO DE BOGOTA A SANTA BIBIANA'),
(115, 7, 1, 70, 1023911054, 17, '2016-07-11', 0, 0, 0, 0, '2', '0', 0, 'T2', 'TRASLADO DE BOGOTA A CUCUTA'),
(116, 9, 1, 70, 80248331, 16, '2016-07-11', 0, 0, 0, 0, '2', '0', 0, 'T3', ''),
(117, 10, 1, 70, 80248331, 15, '2016-07-11', 0, 0, 0, 0, '2', '0', 0, 'T4', ''),
(118, 11, 1, 70, 80248331, 14, '2016-07-11', 0, 0, 0, 0, '2', '0', 0, 'T5', ''),
(119, 13, 1, 70, 80248331, 10, '2016-07-11', 0, 0, 0, 0, '2', '0', 0, 'T6', ''),
(120, 21, 1, 70, 80248331, 12, '2016-07-11', 0, 0, 0, 0, '2', '0', 0, 'T7', ''),
(121, 29, 1, 70, 80248331, 19, '2016-07-11', 0, 0, 0, 0, '2', '0', 0, 'T8', ''),
(122, 38, 1, 82, 80248331, 9, '2016-07-11', 0, 0, 0, 0, '2', '0', 0, 'O1', ''),
(123, 39, 1, 82, 80248331, 9, '2016-07-11', 0, 0, 0, 0, '2', '0', 0, 'R1', NULL),
(124, 40, 1, 82, 80248331, 9, '2016-07-11', 0, 0, 0, 0, '1', '0', 0, 'H2', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidadeinventario`
--

CREATE TABLE `salidadeinventario` (
  `idsalida` int(15) NOT NULL,
  `idinventario` int(15) NOT NULL,
  `idkit` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `cantidad` int(15) NOT NULL,
  `precio` int(15) NOT NULL,
  `tipo` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `lote` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `salidadeinventario`
--

INSERT INTO `salidadeinventario` (`idsalida`, `idinventario`, `idkit`, `cantidad`, `precio`, `tipo`, `lote`) VALUES
(5, 1939, 'T1', 3, 0, 'REMISION', '0'),
(6, 1952, 'T1', 3, 0, 'REMISION', '0'),
(7, 1939, 'T2', 1, 0, 'REMISION', '0'),
(8, 1941, 'T2', 1, 0, 'REMISION', '0'),
(9, 1952, 'T3', 2, 0, 'REMISION', '0'),
(10, 1941, 'T4', 3, 0, 'REMISION', '0'),
(11, 1940, 'T5', 1, 0, 'REMISION', '0'),
(12, 1941, 'T5', 3, 0, 'REMISION', '0'),
(13, 1953, 'T6', 7, 0, 'REMISION', '0'),
(14, 1939, 'T6', 6, 0, 'REMISION', '0'),
(15, 1940, 'T6', 8, 0, 'REMISION', '0'),
(16, 1941, 'T6', 16, 0, 'REMISION', '0'),
(17, 1942, 'T6', 4, 0, 'REMISION', '0'),
(18, 1943, 'T6', 5, 0, 'REMISION', '0'),
(19, 1945, 'T6', 6, 0, 'REMISION', '0'),
(20, 1946, 'T6', 3, 0, 'REMISION', '0'),
(21, 1953, 'T7', 3, 0, 'REMISION', '0'),
(22, 1939, 'T7', 2, 0, 'REMISION', '0'),
(23, 1940, 'T7', 2, 0, 'REMISION', '0'),
(24, 1941, 'T7', 12, 0, 'REMISION', '0'),
(25, 1942, 'T7', 1, 0, 'REMISION', '0'),
(26, 1943, 'T7', 1, 0, 'REMISION', '0'),
(27, 1945, 'T7', 1, 0, 'REMISION', '0'),
(28, 1950, 'T7', 1, 0, 'REMISION', '0'),
(29, 1953, 'T8', 3, 0, 'REMISION', '0'),
(30, 1939, 'T8', 4, 0, 'REMISION', '0'),
(31, 1940, 'T8', 6, 0, 'REMISION', '0'),
(32, 1941, 'T8', 20, 0, 'REMISION', '0'),
(33, 1942, 'T8', 8, 0, 'REMISION', '0'),
(34, 1943, 'T8', 3, 0, 'REMISION', '0'),
(35, 1945, 'T8', 4, 0, 'REMISION', '0'),
(36, 1946, 'T8', 1, 0, 'REMISION', '0'),
(37, 1948, 'T8', 1, 0, 'REMISION', '0'),
(38, 1959, 'O1', 13, 0, 'ORDEN', '456'),
(39, 1959, 'R1', 10, 0, 'REMISION', '456'),
(40, 1959, 'H2', 2, 0, 'HOJADEGASTO', '456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros`
--

CREATE TABLE `terceros` (
  `idclientes` int(15) NOT NULL,
  `departamento` int(15) NOT NULL,
  `ciudad` int(15) NOT NULL,
  `nombre` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `institucion` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `nit` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `celular` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `estado` varchar(11) COLLATE latin1_spanish_ci NOT NULL,
  `contacto_directo` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `sede` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `tipo` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `calificacion` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `bodega` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `fechamodificado` varchar(15) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `terceros`
--

INSERT INTO `terceros` (`idclientes`, `departamento`, `ciudad`, `nombre`, `institucion`, `nit`, `telefono`, `correo`, `direccion`, `celular`, `estado`, `contacto_directo`, `sede`, `tipo`, `calificacion`, `bodega`, `fechamodificado`) VALUES
(1, 3, 149, 'ALEJANDRO ', 'WAKUSOFT', '1030570356', '3219045297', 'WAKUSOFT@GMAIL.COM', 'CL 38 A 50 A 71 SUR', '3219045297', 'ACTIVO', 'ALEJANDRO', 'SUR', 'PROVEEDOR', '3', '1', ''),
(9, 3, 149, 'DAVID', 'SISTEMAS', '1023911054', '2356487', 'WAKUSOFT@GMAIL.COM', 'CR 7 # 7 16', '3202605639', 'ACTIVO', 'DAVID', 'CENTRO MAYOR', 'CLIENTE', 'A', '1023911054', ''),
(10, 1, 1, 'bodega1', '1', '3', '1', '1', 'cl ...', '1', '1', '1', '1', 'BODEGA', '1', '1', '1'),
(11, 1, 1, 'BOGOTA', '1', '9004922171', '1', '1', 'CRA 26 # 45 C 23', '1', '1', '1', '1', 'BODEGA', '1', '1', '1'),
(12, 1, 1, 'CORDOBA', '1', '2', '1', '1', 'CORDOBA 1', '1', '1', '1', '1', 'BODEGA', '1', '1', '1'),
(13, 1, 1, 'RP DENTAL', '1', '3', '1', '1', 'MEDELLIN', '1', '1', '1', '1', 'BODEGA', '1', '1', '1'),
(14, 1, 1, 'SINCELEJO', '1', '4', '1', '1', 'SINCELEJO 1', '1', '1', '1', '1', 'BODEGA', '1', '1', '1'),
(15, 1, 1, 'NARIÃ‘O', '1', '5', '1', '1', 'NARIÃ‘O', '1', '1', '1', '1', 'BODEGA', '1', '1', '1'),
(16, 1, 1, 'TUNJA', '1', '6', '1', '1', 'TUNJA 1', '1', '1', '1', '1', 'BODEGA', '1', '1', '1'),
(17, 1, 1, 'CUCUTA', '1', '7', '1', '1', 'CUCUTA', '1', '1', '1', '1', 'BODEGA', '1', '1', '1'),
(18, 1, 1, 'SANTA BIBIANA', '1', '8', '1', '1', 'SANTA BIBIANA 1', '1', '1', '1', '1', 'BODEGA', '1', '1', '1'),
(19, 1, 1, 'PEREIRA', '1', '9', '1', '1', 'PEREIRA', '1', '1', '1', '1', 'BODEGA', '1', '1', '1'),
(20, 1, 1, 'BARRANQUILLA', '1', '10', '1', '1', 'BARRANQUILLA 1', '1', '1', '1', '1', 'BODEGA', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipousuario` int(15) NOT NULL,
  `tipo` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idtipousuario`, `tipo`, `descripcion`) VALUES
(1, 'ADMINISTRADOR', 'admin'),
(2, 'USUARIO', 'usuario'),
(3, 'INVENTARIO', 'inventario'),
(4, 'COMERCIAL', 'vendedores ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ncedula` int(15) NOT NULL,
  `iddepartamento` int(15) NOT NULL,
  `idciudad` int(15) NOT NULL,
  `tipousuario` int(15) NOT NULL,
  `nombre` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `cargo` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `ntelefono` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `clave` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `estado` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ncedula`, `iddepartamento`, `idciudad`, `tipousuario`, `nombre`, `apellido`, `cargo`, `ntelefono`, `clave`, `estado`) VALUES
(53055373, 3, 149, 1, 'JENNY', 'LOAIZA', 'DIRECTORA', '2884041', '1234', 'ACTIVO'),
(79596152, 3, 149, 1, 'LUIS MIGUEL ', 'MARROQUIN ', 'GERENTE ', '2884041', '1234', 'ACTIVO'),
(80248331, 3, 149, 3, 'ANDRES', 'ORTIZ', 'coordinador bod', '3004188660', '80248331', 'ACTIVO'),
(528791662, 3, 149, 3, 'alva maria', 'valbuena', 'axuliar de bode', '3193551016', 'laurarogert', 'ACTIVO'),
(1023911054, 3, 149, 1, 'david', 'infante', 'sistemas', '3202605639', '1234', 'ACTIVO'),
(1030570356, 3, 149, 1, 'Alejandro', 'Moreno', 'Programador', '3219045297', '1234', 'ACTIVO');

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
  ADD PRIMARY KEY (`idkardex`);

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
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`id_observacion`);

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
  MODIFY `idhistorial` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idinventario` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1960;
--
-- AUTO_INCREMENT de la tabla `kardex`
--
ALTER TABLE `kardex`
  MODIFY `idkardex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
--
-- AUTO_INCREMENT de la tabla `lineas`
--
ALTER TABLE `lineas`
  MODIFY `idlineas` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `idmarcas` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `id_observacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idpaciente` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedido` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `remision`
--
ALTER TABLE `remision`
  MODIFY `idremision` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT de la tabla `salidadeinventario`
--
ALTER TABLE `salidadeinventario`
  MODIFY `idsalida` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `terceros`
--
ALTER TABLE `terceros`
  MODIFY `idclientes` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipousuario` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
