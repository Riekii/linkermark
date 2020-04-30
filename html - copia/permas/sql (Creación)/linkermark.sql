-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2019 a las 10:16:00
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `linkermark`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `nick` varchar(20) NOT NULL,
  `id_m` int(11) NOT NULL,
  `mensajes` varchar(1000) NOT NULL,
  `datetime` datetime NOT NULL,
  `foto` varchar(900) DEFAULT NULL,
  `link` varchar(8000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`nick`, `id_m`, `mensajes`, `datetime`, `foto`, `link`) VALUES
('admin', 1, 'Buenos dias a todos\r\n', '2019-05-06 08:24:48', 'tenor (2).gif', NULL),
('admin', 2, 'https://www.youtube.com/watch?v=zspS7arjsIs&list=PL4qVr6MsU-wiE3vs2jxSVr-u0iXsF_ZZn&index=14', '2019-05-07 09:02:22', NULL, NULL),
('admin', 3, 'https://youtu.be/zspS7arjsIs?list=PL4qVr6MsU-wiE3vs2jxSVr-u0iXsF_ZZn\r\n', '2019-05-07 09:02:33', NULL, NULL),
('admin', 4, 'sdd', '2019-05-07 09:18:28', NULL, NULL),
('admin', 5, 'sds', '2019-05-07 09:18:47', 'Rlwallpaper.jpg', NULL),
('admin', 6, 'dsd', '2019-05-07 09:19:13', '72A.jpg', NULL),
('admin', 7, '234', '2019-05-07 09:19:52', 'comercial_de_helado_perturbador.jpg', NULL),
('admin', 8, 'rrfd', '2019-05-07 09:28:13', NULL, NULL),
('admin', 9, 'f', '2019-05-07 09:36:19', NULL, NULL),
('admin', 10, 'fd', '2019-05-07 09:38:03', NULL, NULL),
('admin', 11, 'fdsfds', '2019-05-07 09:40:10', NULL, NULL),
('admin', 12, 'hjj', '2019-05-07 09:45:27', NULL, NULL),
('admin', 13, 'j', '2019-05-07 09:46:06', NULL, NULL),
('admin', 14, 'https://youtu.be/0Bjw39-n7KM?t=131', '2019-05-07 10:03:46', NULL, NULL),
('admin', 15, ' ewr', '2019-05-07 10:09:00', NULL, NULL),
('admin', 16, 'f f', '2019-05-07 10:09:31', NULL, NULL),
('admin', 17, 'https://google.es fdsfsd', '2019-05-07 10:10:12', NULL, NULL),
('admin', 18, 'https://google.es', '2019-05-07 10:10:20', NULL, NULL),
('admin', 19, 'https://youtu.be/UzFymohh7rI e', '2019-05-07 10:15:30', NULL, NULL),
('admin', 20, 'https://www.youtube.com/watch?v=Bw1IU1Yzy8Y', '2019-05-07 13:39:02', NULL, NULL),
('admin', 21, 'https://www.youtube.com/watch?v=Bw1IU1Yzy8Y werewrwe', '2019-05-07 13:39:12', NULL, NULL),
('admin', 22, 'fsdfd', '2019-05-07 13:39:34', '72A.jpg', NULL),
('admin', 23, 'https://google.es\r\n', '2019-05-07 13:40:21', NULL, NULL),
('admin', 24, 'https://www.youtube.com/watch?v=WtTb7MEG02s\r\njhfdfyjd', '2019-05-07 14:09:52', NULL, NULL),
('admin', 25, 'rr', '2019-05-07 14:15:36', NULL, NULL),
('admin', 26, 'hola que tal estamos chavales ajajja madre mia', '2019-05-07 15:24:20', NULL, NULL),
('admin', 27, 'e', '2019-05-07 15:37:24', NULL, NULL),
('admin', 28, 'https://youtu.be/Dmy9zi-LQ4M?list=RDDmy9zi-LQ4M holaaa', '2019-05-08 10:46:04', NULL, NULL),
('admin', 29, 'hola, asi se ve un video insertado\r\nhttps://youtu.be/kPqwplI63Kk\r\nen medio de una frase', '2019-05-08 10:47:23', NULL, NULL),
('admin', 30, 'hola http://google.es', '2019-05-08 10:48:47', NULL, NULL),
('admin', 31, 'hola https://google.es gey\r\n', '2019-05-08 10:50:30', NULL, NULL),
('admin', 32, 'ey https://youtu.be/tVuvTKMpDcM', '2019-05-08 10:51:39', NULL, NULL),
('admin', 33, 'https://youtu.be/tVuvTKMpDcM ey', '2019-05-08 10:51:56', NULL, NULL),
('admin', 34, 'eyt https://youtu.be/tVuvTKMpDcM ey', '2019-05-08 10:52:08', NULL, NULL),
('admin', 35, 'ey https://youtu.be/tVuvTKMpDcM ey', '2019-05-08 10:52:23', NULL, NULL),
('admin', 36, 'egdfgdf https://youtu.be/tVuvTKMpDcM', '2019-05-08 10:54:06', NULL, NULL),
('admin', 37, 'ey https://google.es', '2019-05-08 10:54:16', NULL, NULL),
('admin', 38, 'https://google.es et https://google.es que https://google.es tal', '2019-05-08 11:04:10', NULL, NULL),
('admin', 39, 'https://www.youtube.com/watch?v=C9MLwI70zcE\r\nfds', '2019-05-08 12:18:42', '72A.jpg', NULL),
('admin', 40, 'hola\r\nhttps://google.es', '2019-05-08 13:54:57', NULL, NULL),
('admin', 41, 'hola\r\nhttps://google.es', '2019-05-08 14:00:59', NULL, NULL),
('admino', 42, 'hola', '2019-05-08 15:33:03', NULL, NULL),
('eoo', 43, 'd', '2019-05-10 09:06:42', NULL, NULL),
('eoo', 44, 'e', '2019-05-10 09:08:00', NULL, NULL),
('eoo', 45, 'E', '2019-05-10 09:08:40', NULL, NULL),
('eoo', 46, 'E', '2019-05-10 09:10:36', NULL, NULL),
('eoo', 47, 'x', '2019-05-10 09:12:17', NULL, NULL),
('eoo', 48, 'e', '2019-05-10 09:20:18', NULL, NULL),
('eoo', 49, 'W', '2019-05-10 09:21:14', NULL, NULL),
('eoo', 50, 'W', '2019-05-10 09:21:20', 'comercial_de_helado_perturbador.jpg', NULL),
('eoo', 51, 'E', '2019-05-10 09:21:31', NULL, NULL),
('eoo', 52, 'http://youtube.com', '2019-05-10 09:21:41', NULL, NULL),
('eoo', 53, 'l', '2019-05-10 09:22:17', NULL, NULL),
('rer', 54, 'e', '2019-05-10 09:24:07', NULL, NULL),
('rer', 55, 'e', '2019-05-10 09:24:24', NULL, NULL),
('rer', 56, 'e', '2019-05-10 09:25:30', NULL, NULL),
('rer', 57, 'e', '2019-05-10 09:25:38', NULL, NULL),
('rer', 58, 'r', '2019-05-10 09:25:54', NULL, NULL),
('rer', 59, 'd', '2019-05-10 09:26:35', NULL, NULL),
('rer', 60, 'E', '2019-05-10 09:27:50', NULL, NULL),
('rer', 61, 'dsds', '2019-05-10 09:37:10', NULL, NULL),
('rer', 62, 'e', '2019-05-10 09:40:39', NULL, NULL),
('rer', 63, 'e', '2019-05-10 09:40:41', NULL, NULL),
('rer', 64, 'e', '2019-05-10 09:40:43', NULL, NULL),
('rer', 65, 'e', '2019-05-10 09:40:46', NULL, NULL),
('rer', 66, 'e', '2019-05-10 09:40:49', NULL, NULL),
('rer', 67, 'e', '2019-05-10 09:40:57', NULL, NULL),
('rer', 68, 'rfetreter', '2019-05-10 09:48:52', 'comercial_de_helado_perturbador.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nick` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `mensajes` int(255) NOT NULL,
  `color` varchar(20) DEFAULT NULL,
  `descripcion` varchar(800) NOT NULL DEFAULT 'Soy nuevo en linkermark',
  `foto` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nick`, `nombre`, `correo`, `pass`, `mensajes`, `color`, `descripcion`, `foto`) VALUES
('admin', 'admini', 'admin', 'admin', 1, 'black', 'Si la vida te da limones, exprÃ­meselos en la cara', 'flo.png'),
('admine', 'admine', 'admine', 'b8422e52794e60dde0c148c7708c8e78', 0, NULL, 'Soy nuevo en linkermark', 'photo.png'),
('admino', 'admino', 'admino', '21232f297a57a5a743894a0e4a801fc3', 0, 'white', 'Soy nuevo en linkermark', 'photo.png'),
('eo', 'eo', 'e', '504332760740d229cd79cadd87588941', 0, NULL, 'Soy nuevo en linkermark', 'photo.png'),
('eoo', 'zpoderman', 'eoo', 'b544692f2f59371abe948360bddda6ed', 1, '', 'Soy nuevo en linkermark', 'photo.png'),
('ooo', 'ooo', 'ooo', '7f94dd413148ff9ac9e9e4b6ff2b6ca9', 0, NULL, 'Soy nuevo en linkermark', 'photo.png'),
('q', 'q', 'q', '7694f4a66316e53c8cdd9d9954bd611d', 0, NULL, 'Soy nuevo en linkermark', 'photo.png'),
('rer', 'rere', 'erer', 'd66c264e1dbd73e6111d3ffc70908e8e', 12, '', 'Soy nuevo en linkermark', 'flo.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD KEY `fk_user` (`nick`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nick`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`nick`) REFERENCES `usuarios` (`nick`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
