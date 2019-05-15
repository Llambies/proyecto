-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2019 a las 11:30:26
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipoEmpresa` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fechaCreacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `tipoEmpresa`, `fechaCreacion`) VALUES
(1, 'Agricom', 'Cooperativa', '2019-03-17'),
(2, 'Hermanos Perez', 'Sociedad Limitada', '2019-03-17'),
(3, 'Margarita', 'Sociedad Limitada', '2019-03-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `IdDato` int(11) NOT NULL,
  `IdNodo` int(11) NOT NULL,
  `Agua` float NOT NULL,
  `Luz` float NOT NULL,
  `Sol` float NOT NULL,
  `Sal` float NOT NULL,
  `Presion` float NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`IdDato`, `IdNodo`, `Agua`, `Luz`, `Sol`, `Sal`, `Presion`, `Fecha`) VALUES
(1, 6, 54, 45, 23, 23, 1023, '2019-04-28 01:00:00'),
(2, 6, 52, 56, 26, 22, 1024, '2019-04-28 04:00:00'),
(3, 6, 34, 89, 29, 20, 1024, '2019-04-28 08:00:00'),
(4, 6, 89, 100, 34, 34, 1024, '2019-04-28 13:00:00'),
(5, 6, 80, 80, 32, 32, 1023, '2019-04-28 18:00:00'),
(6, 6, 65, 42, 24, 27, 1022, '2019-04-28 23:00:00'),
(16, 5, 54, 44, 23, 23, 1023, '2019-04-28 01:00:00'),
(17, 5, 52, 57, 26, 22, 1024, '2019-04-28 04:00:00'),
(18, 5, 34, 87, 29, 20, 1024, '2019-04-28 08:00:00'),
(19, 5, 89, 99, 34, 34, 1024, '2019-04-28 13:00:00'),
(20, 5, 80, 81, 32, 32, 1023, '2019-04-28 18:00:00'),
(21, 5, 65, 41, 24, 27, 1022, '2019-04-28 23:00:00'),
(22, 4, 54, 45, 23, 23, 1023, '2019-04-28 01:00:00'),
(23, 4, 52, 56, 26, 22, 1024, '2019-04-28 04:00:00'),
(24, 4, 34, 89, 29, 20, 1024, '2019-04-28 08:00:00'),
(25, 4, 89, 100, 34, 34, 1024, '2019-04-28 13:00:00'),
(26, 4, 80, 80, 32, 32, 1023, '2019-04-28 18:00:00'),
(27, 4, 65, 42, 24, 27, 1022, '2019-04-28 23:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nodos`
--

CREATE TABLE `nodos` (
  `IdNodo` int(11) NOT NULL,
  `IdParcela` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Latitud` float DEFAULT NULL,
  `Longitud` float NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci,
  `Icono` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nodos`
--

INSERT INTO `nodos` (`IdNodo`, `IdParcela`, `Nombre`, `Latitud`, `Longitud`, `Descripcion`, `Icono`) VALUES
(1, 1, 'Nodo 1', 33.9979, -0.168736, NULL, NULL),
(2, 1, 'Nodo 2', 34.9979, -0.168736, NULL, NULL),
(3, 2, 'Nodo 1', 35.9979, -0.168736, NULL, NULL),
(4, 3, 'Nodo 1', 36.9979, -0.168736, NULL, NULL),
(5, 4, 'Nodo 1', 39.0006, -0.169993, NULL, NULL),
(6, 5, 'Nodo 1', 38.9979, -0.168736, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcelas`
--

CREATE TABLE `parcelas` (
  `IdParcela` int(11) NOT NULL,
  `TipoCultivo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ColorParcela` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `parcelas`
--

INSERT INTO `parcelas` (`IdParcela`, `TipoCultivo`, `Nombre`, `ColorParcela`) VALUES
(1, 'Melones', 'Tomatoes', '#FE9A2E'),
(2, 'Zanahorias', 'Potatas', '#FE9A2E'),
(3, 'Tomates', 'Parcelica', '#FE4AFE'),
(4, 'Zanahorias', 'Parcelon', '#0E9A2F'),
(5, 'Tomates', 'Espanyita', '#FE9A2E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Rol` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `idCliente`, `Nombre`, `Apellidos`, `Usuario`, `Password`, `Email`, `Rol`) VALUES
(1, 1, 'Anselmo', 'Rodriguez', 'anselmo', '$2y$10$aXC4e/RROuVWw08UmHRVMe86b9gXgm8WJxV0uw3SAjnM6zyz77Ovm', 'anselmo@margarita.com', 'cliente'),
(10, 2, 'Paco', 'Perez', 'pacoperez', '$2y$10$aXC4e/RROuVWw08UmHRVMe86b9gXgm8WJxV0uw3SAjnM6zyz77Ovm', 'paco@gmail.com', 'cliente'),
(11, 3, 'Administrador', '01', 'admin', '$2y$10$aXC4e/RROuVWw08UmHRVMe86b9gXgm8WJxV0uw3SAjnM6zyz77Ovm', 'marcalandete@gmail.com', 'administrador'),
(12, 3, 'elver', 'galarga', 'admin2', '$2y$10$aXC4e/RROuVWw08UmHRVMe86b9gXgm8WJxV0uw3SAjnM6zyz77Ovm', 'email@email.com', 'admin'),
(51, 2, 'Adrian', 'Llambies', 'pepe', '$2y$10$xOmnqUjq0ucsNAJMA8QbNu/uvzeRX4uVdXVBP2wohnZm/5BFv823y', 'adrmallla17@gmail.com', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosparcelas`
--

CREATE TABLE `usuariosparcelas` (
  `IdUsuarioParcela` int(11) NOT NULL,
  `IdParcela` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuariosparcelas`
--

INSERT INTO `usuariosparcelas` (`IdUsuarioParcela`, `IdParcela`, `IdUsuario`) VALUES
(1, 1, 10),
(2, 2, 10),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 1, 11),
(7, 2, 11),
(8, 3, 11),
(9, 4, 11),
(10, 5, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vertices`
--

CREATE TABLE `vertices` (
  `IdVertice` int(11) NOT NULL,
  `IdParcela` int(11) NOT NULL,
  `Latitud` float NOT NULL,
  `Longitud` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vertices`
--

INSERT INTO `vertices` (`IdVertice`, `IdParcela`, `Latitud`, `Longitud`) VALUES
(1, 3, 12, 21),
(2, 3, 13, 21),
(3, 3, 13, 22),
(4, 4, 39.0012, -0.169273),
(5, 4, 39.0001, -0.168133),
(6, 4, 38.9994, -0.169163),
(7, 4, 39.0005, -0.170579),
(8, 5, 38.9988, -0.168539),
(9, 5, 38.9984, -0.16784),
(10, 5, 38.9972, -0.168892),
(11, 5, 38.9975, -0.16974);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`IdDato`);

--
-- Indices de la tabla `nodos`
--
ALTER TABLE `nodos`
  ADD PRIMARY KEY (`IdNodo`);

--
-- Indices de la tabla `parcelas`
--
ALTER TABLE `parcelas`
  ADD PRIMARY KEY (`IdParcela`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `Name` (`Usuario`),
  ADD UNIQUE KEY `Name_2` (`Usuario`,`Email`);

--
-- Indices de la tabla `usuariosparcelas`
--
ALTER TABLE `usuariosparcelas`
  ADD PRIMARY KEY (`IdUsuarioParcela`);

--
-- Indices de la tabla `vertices`
--
ALTER TABLE `vertices`
  ADD PRIMARY KEY (`IdVertice`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `IdDato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `nodos`
--
ALTER TABLE `nodos`
  MODIFY `IdNodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `parcelas`
--
ALTER TABLE `parcelas`
  MODIFY `IdParcela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `usuariosparcelas`
--
ALTER TABLE `usuariosparcelas`
  MODIFY `IdUsuarioParcela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `vertices`
--
ALTER TABLE `vertices`
  MODIFY `IdVertice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
