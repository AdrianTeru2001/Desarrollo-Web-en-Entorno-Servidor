-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2021 a las 14:32:11
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestisimal`
--
CREATE DATABASE IF NOT EXISTS `gestisimal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gestisimal`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo` int(4) NOT NULL,
  `descripcion` varchar(100) CHARACTER SET latin1 NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `descripcion`, `precio_compra`, `precio_venta`, `stock`) VALUES
(1, 'Varilla roscada 0.50m.', '7.00', '10.00', 10),
(5, 'Caja tuercas 18mm.', '21.00', '25.05', 10),
(6, 'chapa galvanizada', '10.50', '20.55', 7),
(7, 'barra para cortina 2m.', '10.30', '22.33', 5),
(8, 'Perfil metálico en L', '23.30', '32.50', 8),
(9, 'Perfil metalico en U', '28.30', '52.50', 10),
(10, 'Barra acero 16mm', '35.30', '45.40', 50),
(11, 'Estantería para pared.', '25.30', '30.60', 5),
(12, 'Tablero pino 1x2m.', '10.00', '15.00', 20),
(13, 'Puerta paso 0.72m.', '85.50', '110.55', 5),
(14, 'Puerta de 0.62m.', '70.50', '90.50', 10),
(15, 'Puerta blindada 0.82m', '205.81', '258.33', 2),
(16, 'Puerta doble hoja 1m', '140.50', '192.30', 3),
(17, 'Ventana acristalada', '75.00', '98.00', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
