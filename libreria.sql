-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2022 a las 07:03:17
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autors`
--

CREATE TABLE `autors` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autors`
--

INSERT INTO `autors` (`id`, `nombre`, `pais`, `imagen`, `created`, `modified`) VALUES
(1, 'Homero', 'Grecia', 'https://goo.su/jEH4UY', NULL, NULL),
(2, 'William Shakespeare', 'Reino Unido', 'https://goo.su/ECkO', NULL, NULL),
(3, 'Miguel de Cervantes Saavedra', 'España', 'https://goo.su/gF7KeWw', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplars`
--

CREATE TABLE `ejemplars` (
  `id` int(11) NOT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `editorial` varchar(100) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `libro_id` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ejemplars`
--

INSERT INTO `ejemplars` (`id`, `isbn`, `editorial`, `cantidad`, `libro_id`, `modified`, `created`) VALUES
(1, '978-0062457714', '‎ Harper; 2nd Edition (13 Septiembre 2016)', 7, 6, NULL, NULL),
(2, '0062457713', ' ‎ Avery; Illustrated edición (16 Octubre 2018)', 1, 5, '2022-10-25 04:44:48', NULL),
(4, '978-0062457713', 'Edition; 2nd Edition (13 Septiembre 2016)', 5, 3, '2022-10-25 04:44:01', '2022-10-25 04:44:01'),
(5, '00624577134564', '‎ Independently published (2 Diciembre 2021)', 9, 3, '2022-10-24 23:47:30', '2022-10-24 23:47:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `resumen` text DEFAULT NULL,
  `autor_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `resumen`, `autor_id`, `created`, `modified`) VALUES
(1, 'La Iliada', NULL, 1, NULL, NULL),
(2, 'La Odisea', NULL, 1, NULL, NULL),
(3, 'Hamlet', NULL, 2, NULL, NULL),
(4, 'Romeo y Julieta', NULL, 2, NULL, NULL),
(5, 'Otelo', NULL, 2, NULL, NULL),
(6, 'El ingenioso hidalgo don Quijote de la Mancha', NULL, 3, NULL, NULL),
(7, 'the subtle art of not giving a fuck', 'this is a book', 3, '2022-10-25 04:08:15', '2022-10-24 23:51:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autors`
--
ALTER TABLE `autors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `ejemplars`
--
ALTER TABLE `ejemplars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `ejemplars` (`libro_id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titulo` (`titulo`),
  ADD KEY `libros` (`autor_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autors`
--
ALTER TABLE `autors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ejemplars`
--
ALTER TABLE `ejemplars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ejemplars`
--
ALTER TABLE `ejemplars`
  ADD CONSTRAINT `ejemplars` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros` FOREIGN KEY (`autor_id`) REFERENCES `autors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
