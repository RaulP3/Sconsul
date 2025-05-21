-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2022 at 11:10 PM
-- Server version: 8.0.30
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consultorio`
--

-- --------------------------------------------------------

--
-- Table structure for table `citas`
--

CREATE TABLE `citas` (
  `id` int NOT NULL,
  `medicoId` int NOT NULL,
  `pacienteId` int NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `costo` double NOT NULL DEFAULT '0',
  `estado` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL COMMENT 'R = registrada, C = Confirmada, A = Atendida, X = Cancelada',
  `horaCheckIn` time NOT NULL DEFAULT '00:00:00',
  `horaCheckOut` time NOT NULL DEFAULT '00:00:00',
  `responsable` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Dumping data for table `citas`
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
-- Table structure for table `expediente`
--

CREATE TABLE `expediente` (
  `id` int NOT NULL,
  `idPaciente` int NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `archivos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Referencia de archivos como radiografías, estudios Clínicos, etc.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingresos`
--

CREATE TABLE `ingresos` (
  `id` int NOT NULL,
  `idCita` int NOT NULL,
  `cantidad` double NOT NULL,
  `metodoPago` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `cajeroId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Dumping data for table `ingresos`
--

INSERT INTO `ingresos` (`id`, `idCita`, `cantidad`, `metodoPago`, `fecha`, `cajeroId`) VALUES
(1, 5, 650, 'efectivo', '2022-12-16', 34),
(2, 5, 650, 'tarjeta', '2022-12-16', 34),
(3, 4, 500, 'tarjeta', '2022-12-16', 34);

-- --------------------------------------------------------

--
-- Table structure for table `medicos`
--

CREATE TABLE `medicos` (
  `id` int NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `fechaNac` date DEFAULT NULL,
  `costoConsulta` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Dumping data for table `medicos`
--

INSERT INTO `medicos` (`id`, `nombres`, `apellidos`, `telefono`, `fechaNac`, `costoConsulta`) VALUES
(1, 'Dr. Ricardo', 'Urbina', '6251234455', '1975-11-05', 650),
(2, 'Melany', 'Urbina Garcia', '6251235566', '2005-03-03', 800);

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `ultimoCita` datetime DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `padecimientos` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci COMMENT 'Los diferentes padecimientos o enfermedades importantes a tomar en cuenta en la consulta. En formato JSON'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Dumping data for table `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombres`, `apellidos`, `telefono`, `email`, `ultimoCita`, `fechaNac`, `padecimientos`) VALUES
(1, 'Arturo', 'Gutierrez', '6141234555', 'a@gmail.com', NULL, '1976-12-14', '{\"Diabetes\":\"\",\"Hipertension\":\"\",\"Alergias\":\"\"}'),
(2, 'Olaf', 'Urbina', '6251221438', 'o@gmail.com', NULL, '1979-12-13', '{\"Diabetes\":\"\",\"Hipertension\":\"\",\"Alergias\":\"\"}');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `password` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `permisos` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL COMMENT 'El tipo de acceso que tiene en el sistema ej. Administrador, usuario, etc',
  `foto` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  `estado` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL COMMENT 'Activo / Inactivo',
  `ultimoLogin` datetime DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `costoConsulta` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `telefono`, `email`, `password`, `permisos`, `foto`, `estado`, `ultimoLogin`, `fechaNac`, `costoConsulta`) VALUES
(13, 'Raul', 'Prieto', '6251221438', 'r@gmail.com', '$2y$10$4NxyweuG8QF71A7ch6zvleuaxTz2MFeeWaiN8Z6NF.B/9AVge/GAe', 'admin', 'assets/images/faces/1.jpg', '1', '0000-00-00 00:00:00', '1991-09-27', 0),
(34, 'Pedro', 'Perez', '6251221438', 'p@gmail.com', '$2y$10$N/kd.YltwoV3GDS9G1A9.O02QemmpyTJARFFLn/uv9JM4OkTtaR.u', 'asistente', NULL, '1', NULL, '1985-12-13', 0),
(35, 'Olaf', 'Urbina', '6251236677', 'o@gmail.com', '$2y$10$poQf34C4arEKfuwCEx18P.jyUSsoQObG0DyKukCwvJgkXXWA8PYri', 'medico', NULL, '1', NULL, '2022-12-11', 0),
(36, 'Jose', 'Urbina', '6251221438', 'j@gmail.com', '$2y$10$wuxpr0qyKTf1xmMqGW2XAu0mm2PElpd/BNm5ULTyscXn0ijzBb8vS', 'medico', NULL, '1', NULL, '1975-12-14', 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `expediente`
--
ALTER TABLE `expediente`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
