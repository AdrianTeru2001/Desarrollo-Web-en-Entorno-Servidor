-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-01-2023 a las 11:25:29
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `banco`
--
CREATE DATABASE IF NOT EXISTS `banco` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `banco`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `dni` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `gestor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`dni`, `nombre`, `direccion`, `telefono`, `gestor`) VALUES
('123123', 'Pepillo Grillo', 'Canada 234', '111112', '13579445N'),
('1234321', 'Anita García', 'La vereda 34', '111222333', '46987232L'),
('1234567', 'Tijuanenco Gómez', 'Mexico Lindo', '678432512', '13579445N'),
('125423', 'Doctor Andrade', 'Venezuela full out', '23424242', '13579445N'),
('213342534', 'Anastacio cabello', 'London city', '11111111', '46987232L'),
('3534534', 'Cacerolo Tontoñez', 'Almogía', '123456', '46987232L'),
('45678', 'Mota', 'Calle Falsa, 123', '555 444333', '13579445N'),
('555aaa', 'Luis José', 'Montserrat Roig, 10', '2222', '13579445N'),
('65767', 'Pepito Lupiañez', 'Alhaurín', '867867867', '13579445N'),
('76859', 'Ignacio', 'Periquito, 333', '555 325476', '46987232L'),
('789654', 'Yren', 'Calle Verdadera, 98', '555 98765', '46987232L'),
('873475933', 'Maria Sol', 'Calle Flor', '555 123456', '46987232L'),
('89665324', 'Amigo garzón', 'Plaza discordia 32', '123543255', '46987232L'),
('9652342', 'felipe gonzalez', 'Paseo de la jubilación', '1111110', '13579445N'),
('98354823', 'pepote palotes guerra', 'La vereda 22', '123543444', '13579445N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `dni` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `sueldo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`dni`, `nombre`, `cargo`, `sueldo`) VALUES
('12345678A', 'Armando Guerra', 'limpiador', 2345),
('12345678Z', 'Romualdo Fernández', 'director', 2400),
('13579445N', 'Saturnino Peláez', 'administrativo', 900),
('46987232L', 'Alicia Maravilla', 'administrativo', 1050),
('222', 'Empleado prueba', 'ninguno', 1000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
