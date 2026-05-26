-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-05-2026 a las 16:28:00
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
-- Base de datos: `IntoUni`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Administrador`
--

CREATE TABLE `Administrador` (
  `email_administrador` varchar(50) NOT NULL,
  `password_administrador` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `Administrador`
--

INSERT INTO `Administrador` (`email_administrador`, `password_administrador`) VALUES
('admin@correo', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Aspirante`
--

CREATE TABLE `Aspirante` (
  `id_aspirante` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` int(10) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `colegio_origen` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Beneficio`
--

CREATE TABLE `Beneficio` (
  `id_beneficio` int(10) NOT NULL,
  `nombre_beneficio` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Interes`
--

CREATE TABLE `Interes` (
  `id_interes` int(10) NOT NULL,
  `fecha_interes` date NOT NULL,
  `estado` varchar(20) NOT NULL,
  `id_aspirante` int(10) NOT NULL,
  `id_programa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Programa_academico`
--

CREATE TABLE `Programa_academico` (
  `id_programa` int(10) NOT NULL,
  `nombre_programa` varchar(50) NOT NULL,
  `modalidad` varchar(20) NOT NULL,
  `id_universidad` int(10) NOT NULL,
  `duracion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Universidad`
--

CREATE TABLE `Universidad` (
  `id_universidad` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `pagina_web` varchar(63) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Universidad_beneficio`
--

CREATE TABLE `Universidad_beneficio` (
  `id_universidad_beneficio` int(10) NOT NULL,
  `id_beneficio` int(10) NOT NULL,
  `id_universidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Aspirante`
--
ALTER TABLE `Aspirante`
  ADD PRIMARY KEY (`id_aspirante`);

--
-- Indices de la tabla `Beneficio`
--
ALTER TABLE `Beneficio`
  ADD PRIMARY KEY (`id_beneficio`);

--
-- Indices de la tabla `Interes`
--
ALTER TABLE `Interes`
  ADD PRIMARY KEY (`id_interes`),
  ADD KEY `id_aspirante` (`id_aspirante`),
  ADD KEY `id_programa` (`id_programa`);

--
-- Indices de la tabla `Programa_academico`
--
ALTER TABLE `Programa_academico`
  ADD PRIMARY KEY (`id_programa`),
  ADD KEY `id_universidad` (`id_universidad`);

--
-- Indices de la tabla `Universidad`
--
ALTER TABLE `Universidad`
  ADD PRIMARY KEY (`id_universidad`);

--
-- Indices de la tabla `Universidad_beneficio`
--
ALTER TABLE `Universidad_beneficio`
  ADD PRIMARY KEY (`id_universidad_beneficio`),
  ADD KEY `id_universidad` (`id_universidad`),
  ADD KEY `id_beneficio` (`id_beneficio`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Interes`
--
ALTER TABLE `Interes`
  ADD CONSTRAINT `Interes_ibfk_1` FOREIGN KEY (`id_aspirante`) REFERENCES `Aspirante` (`id_aspirante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Interes_ibfk_2` FOREIGN KEY (`id_programa`) REFERENCES `Programa_academico` (`id_programa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Programa_academico`
--
ALTER TABLE `Programa_academico`
  ADD CONSTRAINT `Programa_academico_ibfk_1` FOREIGN KEY (`id_universidad`) REFERENCES `Universidad` (`id_universidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Universidad_beneficio`
--
ALTER TABLE `Universidad_beneficio`
  ADD CONSTRAINT `Universidad_beneficio_ibfk_1` FOREIGN KEY (`id_universidad`) REFERENCES `Universidad` (`id_universidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Universidad_beneficio_ibfk_2` FOREIGN KEY (`id_beneficio`) REFERENCES `Beneficio` (`id_beneficio`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
