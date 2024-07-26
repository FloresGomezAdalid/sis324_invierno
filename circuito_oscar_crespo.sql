-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2024 a las 16:41:44
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `circuito_oscar_crespo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id` int(11) NOT NULL,
  `total_vueltas` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `total_vueltas`, `fecha`) VALUES
(1, 2, '2024-07-24'),
(2, 3, '2024-07-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coche`
--

CREATE TABLE `coche` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `piloto` varchar(100) NOT NULL,
  `copiloto` varchar(100) NOT NULL,
  `detalles_coche` text DEFAULT NULL,
  `hora_salida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `coche`
--

INSERT INTO `coche` (`id`, `numero`, `piloto`, `copiloto`, `detalles_coche`, `hora_salida`) VALUES
(1, 24, 'Adalid', 'Pedro', 'Rojo', '02:30:00'),
(2, 54, 'Facere nemo nihil a ', 'Tempora qui porro co', 'Sed suscipit volupta', '06:39:00'),
(3, 32, 'Adalid', 'Pedro', 'rojo con franjas blancas', '14:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelta`
--

CREATE TABLE `vuelta` (
  `id` int(11) NOT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  `coche_id` int(11) DEFAULT NULL,
  `numero_vuelta` int(11) NOT NULL,
  `hora_paso` time NOT NULL,
  `tiempo_vuelta` time DEFAULT NULL,
  `velocidad` float DEFAULT NULL,
  `tiempo_acumulado` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vuelta`
--

INSERT INTO `vuelta` (`id`, `carrera_id`, `coche_id`, `numero_vuelta`, `hora_paso`, `tiempo_vuelta`, `velocidad`, `tiempo_acumulado`) VALUES
(7, 2, 1, 1, '17:42:00', '15:12:00', 0.328947, '13:12:00'),
(10, 2, 1, 2, '02:45:00', '00:15:00', 20, '11:27:00'),
(11, 2, 1, 3, '03:00:00', '00:30:00', 10, '09:57:00'),
(12, 2, 3, 1, '14:45:00', '00:15:00', 20, '22:15:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coche`
--
ALTER TABLE `coche`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vuelta`
--
ALTER TABLE `vuelta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrera_id` (`carrera_id`),
  ADD KEY `coche_id` (`coche_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `coche`
--
ALTER TABLE `coche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vuelta`
--
ALTER TABLE `vuelta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vuelta`
--
ALTER TABLE `vuelta`
  ADD CONSTRAINT `vuelta_ibfk_1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`),
  ADD CONSTRAINT `vuelta_ibfk_2` FOREIGN KEY (`coche_id`) REFERENCES `coche` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
