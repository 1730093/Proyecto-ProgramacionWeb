-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2020 a las 09:49:42
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `asunto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fyhenvio` datetime NOT NULL,
  `usuariointerno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idDestino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fechanac` date DEFAULT NULL,
  `fechaingreso` datetime NOT NULL,
  `fechaalta` datetime DEFAULT NULL,
  `motivo` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechadefuncion` datetime DEFAULT NULL,
  `diagnostico` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `apellidos`, `sexo`, `fechanac`, `fechaingreso`, `fechaalta`, `motivo`, `fechadefuncion`, `diagnostico`) VALUES
(1, 'Luis', 'Gutierrez', 'Masculino', '2020-08-04', '2020-08-27 17:08:00', '2020-08-09 17:08:00', NULL, '0000-00-00 00:00:00', 'Gripa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uexterno`
--

CREATE TABLE `uexterno` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fechanacimiento` date NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `idpaciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `uexterno`
--

INSERT INTO `uexterno` (`id`, `nombre`, `apellido`, `sexo`, `fechanacimiento`, `email`, `usuario`, `contrasena`, `idpaciente`) VALUES
(1, 'Jorge', 'Meza', 'Masculino', '2020-08-25', '1730093@upv.edu.mx', 'JorgeMeza', 'Meza01', NULL),
(2, 'Jorge', 'Meza', 'Masculino', '2020-08-25', '1730093@upv.edu.mx', 'JorgeMeza', 'Meza01', NULL),
(3, 'Jorge', 'Meza', 'Masculino', '0000-00-00', 'j000rge52@gmail.com', 'Jorge23', 'Meza', NULL),
(4, 'Jorge', 'Meza', 'Masculino', '1999-04-29', '1730093@upv.edu.mx', 'Jorge721', 'Meza01742', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uinterno`
--

CREATE TABLE `uinterno` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Sexo` tinyint(1) NOT NULL,
  `Correo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Cargo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `NUsuario` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Contraseña` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `uexterno`
--
ALTER TABLE `uexterno`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `uexterno`
--
ALTER TABLE `uexterno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
