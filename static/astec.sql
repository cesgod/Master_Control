-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 20, 2022 at 08:19 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_clyfsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `astec`
--

CREATE TABLE `astec` (
  `Plano_N` varchar(4) DEFAULT NULL,
  `N_DE_ODT` varchar(7) DEFAULT NULL,
  `ACTIVIDADES` varchar(58) DEFAULT NULL,
  `DESCRIPCION` varchar(59) DEFAULT NULL,
  `DIRECCION` varchar(47) DEFAULT NULL,
  `EJECUTADO_POR` varchar(18) DEFAULT NULL,
  `INICIO` varchar(5) DEFAULT NULL,
  `FIN` varchar(9) DEFAULT NULL,
  `ESTADO_DE_EJECUCION_PER` varchar(9) DEFAULT NULL,
  `HHP_INICIAL` varchar(7) DEFAULT NULL,
  `HHP_FINAL` varchar(7) DEFAULT NULL,
  `FECHA_DE_FISCALIZACION` varchar(11) DEFAULT NULL,
  `ESTADO_DE_FISCALIZACION` varchar(12) DEFAULT NULL,
  `ELABORADO_POR` varchar(29) DEFAULT NULL,
  `CIERRE_PERIODO` varchar(204) DEFAULT NULL,
  `OBSERVACION` varchar(85) DEFAULT NULL,
  `OBSERVACION_II` varchar(101) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `astec`
--

INSERT INTO `astec` (`Plano_N`, `N_DE_ODT`, `ACTIVIDADES`, `DESCRIPCION`, `DIRECCION`, `EJECUTADO_POR`, `INICIO`, `FIN`, `ESTADO_DE_EJECUCION_PER`, `HHP_INICIAL`, `HHP_FINAL`, `FECHA_DE_FISCALIZACION`, `ESTADO_DE_FISCALIZACION`, `ELABORADO_POR`, `CIERRE_PERIODO`, `OBSERVACION`, `OBSERVACION_II`) VALUES
('7438', '5071/20', 'Mejoramiento Iluminacion', 'Montaje de alumbrados LED', 'Humaita desde Mcal Lopez hasta Dr. Botrell', 'Juan Carlos G.', '44119', '44200', 'Ejecutado', '27,59', '25,747', '44572', 'Fiscalizado', 'Daniel Bruno', 'Diciembre 2021 (1ra quincena)', '', ''),
('7588', '5002/21', 'Montaje de medidor Exclusivo', 'Instalacion de medidores Mt 880 en transformadores privados', 'Cap Demattei e/ Pte Franco', 'Juan Carlos G.', '44215', '', 'Anulado', '', '', '', 'Anulado', 'Fermin', 'Anulado', 'Pedido de 3 medidores para instalacion en puesto de medicion privado MT880, BLOCKWARE', 'No se lleg? a ejecutar'),
('PL23', '5012/21', 'Mont. med. y banco de capac. PD p?blico', 'Mont. med. y banco de capac. PD p?blico', 'Cap Demattei e/ Pte Franco', 'Juan Carlos G.', '44356', '44524', 'Ejecutado', '55,9', '56,3', '44573', 'Fiscalizado', 'Daniel Bruno', 'Diciembre 2021 (1ra quincena)', 'Cambiar las mano de obras de instalaci?n a reubicaci?n de cajas', 'Cambiar los cables externos que son de 4mm por 6mm y hacer devoluciones'),
('PL62', '5043/21', 'Mantenimiento Subestaci?n;Mantenimiento Subestaci?n Period', 'San Francisco e/ Uruguay y Ruta 8 (Subestacion)', 'Juan Carlos G.', '44443', '44448', 'Ejecutado', '', '', '44849', 'Fiscalizado', 'Daniel Bruno', 'Diciembre 2021 (1ra quincena)', 'Tienen que avisar desde auditor?a si va a contar con mano de obra', '', NULL),
('PL63', '5044/21', 'Mont. med. y banco de capac. PD p?blico', 'Mont. med. y banco de capac. PD p?blico', 'Cap Demattei e/ Pte Franco', 'Juan Carlos G.', '44453', '44582', 'Ejecutado', '27,95', '28,45', '44573', 'Fiscalizado', 'Daniel Bruno', 'Diciembre 2021 (1ra quincena)', 'Cambiar los cables externos que son de 4mm por 6mm y hacer devoluciones', ''),
('PL72', '5053/21', 'Retiro de caja totalizadora PD Publico', 'Retiro de medidores MT880 ', 'Cap Demattei e/ Pte Franco (PP05, SL06, PP07)', 'Juan Carlos G.', '44459', '44460', 'Ejecutado', '', '', '', 'Pendiente', 'Daniel Bruno', '', '', 'Falta hacer devoluci?n de cajas retiradas. Luego ver si se va a reutilizar en ASTEC para hacer el ped'),
('PL48', '5057/21', 'Adecuaci?n de LMT', 'Alimentador N? 4. Construcci?n Subterr?nea (Obra civil).', 'San Francisco e/ Calle 3 y Ruta 8', 'Alberto Santa Cruz', '', '', 'Ejecutado', '', '', '44590', 'Fiscalizado', 'Daniel Bruno', 'Diciembre 2021 (1ra quincena)', 'Falta una devoluci?n procesada por dep?sito, de ca?os PEAD', ''),
('PL75', '5062/21', 'Reacondicionamiento de Generadores', 'Reacondicionamiento de Generadores', 'Subestaci?n;Juan Carlos G.', '', '', 'Ejecutado', '', '', '44588', 'Fiscalizado', 'Daniel Bruno', 'Diciembre 2021 (1ra quincena)', 'El trabajo de reacondicionamiento se realiz? en CRA, luego, los generadores fueron transportados a la subestaci?n;Se va a averiguar como va a quedar la mano de obra. Tambi?n averiguar la devoluci?n de la ', NULL, NULL),
('PL57', '5063/21', 'Montaje de AP', 'Mejoramiento de iluminacion', 'C. A Lopez desde Hernandarias hasta Bvar Yegros', 'Juan Carlos G.', '', '', 'Pendiente', '', '', '', '', 'Daniel Bruno', '', 'Falta que la cuadrilla de ?scar cambie un poste', ''),
('PL66', '5065/21', 'Adecuaci?n de LMT', 'Ducto Subterraneo para Cable MT (Alimentador N? 3)', 'Bvar Iturbe esq Olimpo', 'Alberto Santa Cruz', '44490', '', 'Ejecutado', '231,072', '231,072', '44580', 'Fiscalizado', 'Daniel Bruno', 'Diciembre 2021 (1ra quincena)', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
