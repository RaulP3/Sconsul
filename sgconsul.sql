-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2025 a las 03:07:46
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
-- Base de datos: `sgconsul`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `medicoId` int(11) NOT NULL,
  `pacienteId` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `costo` double NOT NULL DEFAULT 0,
  `estado` varchar(1) NOT NULL COMMENT 'R = registrada, C = Confirmada, A = Atendida, X = Cancelada',
  `horaCheckIn` time NOT NULL DEFAULT '00:00:00',
  `horaCheckOut` time NOT NULL DEFAULT '00:00:00',
  `responsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `medicoId`, `pacienteId`, `fecha`, `hora`, `costo`, `estado`, `horaCheckIn`, `horaCheckOut`, `responsable`) VALUES
(1, 1, 1, '2022-12-08', '09:29:00', 0, 'R', '00:00:00', '00:00:00', 0),
(2, 35, 1, '2022-12-20', '11:00:00', 800, 'R', '00:00:00', '00:00:00', 34),
(3, 1, 1, '2022-12-22', '09:00:00', 0, 'R', '00:00:00', '00:00:00', 0),
(4, 36, 1, '2022-12-18', '11:00:00', 500, '$', '00:00:00', '00:00:00', 34),
(5, 1, 2, '2022-12-16', '09:00:00', 650, '$', '00:00:00', '00:00:00', 34),
(6, 35, 2, '2022-12-20', '11:00:00', 800, 'R', '00:00:00', '00:00:00', 13),
(7, 1, 2, '2022-12-21', '12:00:00', 0, 'R', '00:00:00', '00:00:00', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_Cliente` int(11) NOT NULL,
  `rSocial` varchar(80) NOT NULL,
  `rfc` varchar(50) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `nExt` int(11) NOT NULL,
  `nInt` int(11) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `cPostal` int(11) NOT NULL,
  `municipio` varchar(70) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `id` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text NOT NULL,
  `archivos` text NOT NULL COMMENT 'Referencia de archivos como radiografías, estudios Clínicos, etc.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id` int(11) NOT NULL,
  `idCita` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `metodoPago` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `cajeroId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id`, `idCita`, `cantidad`, `metodoPago`, `fecha`, `cajeroId`) VALUES
(1, 5, 650, 'efectivo', '2022-12-16', 34),
(2, 5, 650, 'tarjeta', '2022-12-16', 34),
(3, 4, 500, 'tarjeta', '2022-12-16', 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `fechaNac` date DEFAULT NULL,
  `costoConsulta` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id`, `nombres`, `apellidos`, `telefono`, `fechaNac`, `costoConsulta`) VALUES
(1, 'Dr. Ricardo', 'Urbina', '6251234455', '1975-11-05', 650),
(2, 'Melany', 'Urbina Garcia', '6251235566', '2005-03-03', 800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `ultimoCita` datetime DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `padecimientos` text DEFAULT NULL COMMENT 'Los diferentes padecimientos o enfermedades importantes a tomar en cuenta en la consulta. En formato JSON'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombres`, `apellidos`, `telefono`, `email`, `ultimoCita`, `fechaNac`, `padecimientos`) VALUES
(1, 'Arturo', 'Gutierrez', '6141234555', 'a@gmail.com', NULL, '1976-12-14', '{\"Diabetes\":\"\",\"Hipertension\":\"\",\"Alergias\":\"\"}'),
(2, 'Olaf', 'Urbina', '6251221438', 'o@gmail.com', NULL, '1979-12-13', '{\"Diabetes\":\"\",\"Hipertension\":\"\",\"Alergias\":\"\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `permisos` varchar(13) NOT NULL COMMENT 'El tipo de acceso que tiene en el sistema ej. Administrador, usuario, etc',
  `foto` text DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL COMMENT 'Activo / Inactivo',
  `ultimoLogin` datetime DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `costoConsulta` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `telefono`, `email`, `password`, `permisos`, `foto`, `estado`, `ultimoLogin`, `fechaNac`, `costoConsulta`) VALUES
(1, 'Raul', 'Prieto', '6251221414', 'raul@gmail.com', '$2y$10$0tYao9luuBbQaOTGYINkgOFMtGDPkKOaSSZ7Zbqv7QDqrk9GKc9WC', 'admin', 'assets/images/faces/1.jpg', '1', NULL, '1985-12-12', 0),
(34, 'Pedro', 'Perez', '6251221438', 'p@gmail.com', '$2y$10$N/kd.YltwoV3GDS9G1A9.O02QemmpyTJARFFLn/uv9JM4OkTtaR.u', 'asistente', NULL, '1', NULL, '1985-12-13', 0),
(35, 'Olaf', 'Urbina', '6251236677', 'o@gmail.com', '$2y$10$poQf34C4arEKfuwCEx18P.jyUSsoQObG0DyKukCwvJgkXXWA8PYri', 'medico', NULL, '1', NULL, '2022-12-11', 0),
(36, 'Jose', 'Urbina', '6251221438', 'j@gmail.com', '$2y$10$wuxpr0qyKTf1xmMqGW2XAu0mm2PElpd/BNm5ULTyscXn0ijzBb8vS', 'medico', NULL, '1', NULL, '1975-12-14', 500);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_Cliente`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_Cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
