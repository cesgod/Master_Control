-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-08-2021 a las 09:27:31
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seguimiento_pd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `ID` int(250) NOT NULL,
  `USERID` varchar(250) NOT NULL,
  `PASSWORD` varchar(250) NOT NULL,
  `USERNAME` varchar(250) NOT NULL,
  `LVL` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`ID`, `USERID`, `PASSWORD`, `USERNAME`, `LVL`) VALUES
(1, 'user@clyfsa.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'César Vera', 0),
(2, 'user2@clyfsa.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Astec Dummy', 1),
(3, 'deprop@clyfsa.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'DEPROP USER', 2),
(4, 'deom@clyfsa.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'DECCON USER', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pd_ur`
--

CREATE TABLE `pd_ur` (
  `ID` int(250) NOT NULL,
  `CODIGO` varchar(250) NOT NULL,
  `METER_NAME` varchar(250) NOT NULL,
  `PORCENTAJE` int(250) NOT NULL,
  `POTENCIA_NOMINAL` int(250) NOT NULL,
  `POTENCIA_MAX` double NOT NULL,
  `TIME_STAMP` varchar(250) NOT NULL,
  `ELABORADO` varchar(250) NOT NULL,
  `INFORME` varchar(250) NOT NULL,
  `FECHA_ENTREGA` varchar(250) NOT NULL,
  `OBSERVACION` varchar(250) NOT NULL,
  `DEPARTAMENTO` varchar(250) NOT NULL,
  `ESTADO_ASTEC` varchar(250) NOT NULL,
  `ESTADO_DEPROP` varchar(250) NOT NULL,
  `PLANO` varchar(250) NOT NULL,
  `ELABORADO_DEPROP` varchar(250) NOT NULL,
  `TIME_STAMP_DEPROP` varchar(250) NOT NULL,
  `OBSERVACION_DEPROP` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pd_ur`
--

INSERT INTO `pd_ur` (`ID`, `CODIGO`, `METER_NAME`, `PORCENTAJE`, `POTENCIA_NOMINAL`, `POTENCIA_MAX`, `TIME_STAMP`, `ELABORADO`, `INFORME`, `FECHA_ENTREGA`, `OBSERVACION`, `DEPARTAMENTO`, `ESTADO_ASTEC`, `ESTADO_DEPROP`, `PLANO`, `ELABORADO_DEPROP`, `TIME_STAMP_DEPROP`, `OBSERVACION_DEPROP`) VALUES
(1, '29', '30880440 YB29', 85, 100, 85.6081, '20-07-2021 19:15', 'César Vera', '3030-2021', '04-08-2021 14:09', 'Prueba 01 de carga', 'DEPROP', 'EN PROCESO', 'FINALIZADO', 'P7461', 'DEPROP USER', '', 'Prueba 01 de carga deprop'),
(16, '03', '30880219 SL03', 87, 100, 87.8329, '28-07-2021 18:45', 'Astec Dummy', '3036-2021', '05-08-2021 16:40', 'asdfasd ', 'DEPROP', 'EN PROCESO', 'FINALIZADO', 'P7466', 'DEPROP USER', '', 'asdfasd as;ikdjfhba;klsdjf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `potencia_lim`
--

CREATE TABLE `potencia_lim` (
  `ID` int(250) NOT NULL,
  `P_CRITICO` int(250) NOT NULL,
  `P_MARGINAL` int(250) NOT NULL,
  `P_HOURS` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `potencia_lim`
--

INSERT INTO `potencia_lim` (`ID`, `P_CRITICO`, `P_MARGINAL`, `P_HOURS`) VALUES
(1, 90, 85, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `pd_ur`
--
ALTER TABLE `pd_ur`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `potencia_lim`
--
ALTER TABLE `potencia_lim`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pd_ur`
--
ALTER TABLE `pd_ur`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
