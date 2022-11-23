-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2019 a las 19:40:56
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE `catalogo` (
  `codigo` varchar(20) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(100) COLLATE utf8_bin NOT NULL,
  `detalle` varchar(500) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`codigo`, `nombre`, `precio`, `imagen`, `detalle`) VALUES
('parkduo', 'Parker Duofold International', '406.00', 'parkerduo.jpg', 'Plumín de oro 18K. Fabricada en Reino Unido. Cuerpo en resina de alta resistencia.'),
('peli1000', 'Pelikan Souvëran M-1000', '545.00', 'pelikan.jpg', 'Plumín de oro 18K.  Émbolo de bronce. Fabricación alemana. Excelentes acabados.'),
('viscvan', 'Visconti Van Gogh', '180.00', 'visconti.jpg', 'Diseño y acabados de lujo. Cuerpo fabricado en Italia. Plumín alemán.'),
('waterexp', 'Waterman Expert', '103.55', 'waterman.jpg', 'Excelente pluma de uso diario. Fabricada en Francia. Plumín de acero.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `nombre` varchar(30) NOT NULL,
  `token` varchar(10) NOT NULL,
  `peticiones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`nombre`, `token`, `peticiones`) VALUES
('Ana', '321cba', 0),
('Pepe', '123abc', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(30) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `nombre`, `precio`, `imagen`, `stock`, `descripcion`) VALUES
(1, 'raton', 6, 'raton.png', 30, 'Raton de la marca logitech de muy buena calidad'),
(2, 'teclado', 11, 'teclado.png', 25, 'Teclado gaming de tacto mecánico muy resistente'),
(3, 'monitor', 90, 'monitor.png', 15, 'Monitor de 24 pulgadas 1ms y 75hz con panel LCD'),
(4, 'joystick', 35, 'joystick.png', 5, 'Joystick compatible con ps4 y PC con vibracion'),
(8, 'ImpresoraCanon', 35, '', 0, 'Impresora de inyeccion tinta'),
(9, 'TorreGaming', 1200, '', 0, 'Torre adaptada para videojuegos de alto rendimient');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
