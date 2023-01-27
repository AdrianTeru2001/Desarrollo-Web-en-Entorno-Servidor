-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2022 a las 01:11:26
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

DROP TABLE IF EXISTS `articulos`;
CREATE TABLE `articulos` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `contenido` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`codigo`, `titulo`, `categoria`, `fecha`, `contenido`, `likes`) VALUES
(1, 'Mi primer POST', 'normal', '2018-12-18', 'Quiero dedicar este primer post para explicar un poco quien soy, a que me dedico y por que voy a crear un blog. Soy Antonio, me dedico a la programacion y voy a postear cosillas interesantes y utiles para facilitar la progamacion de aplicaciones web.Si te ha gustado, dame un LIKE!!!', 50),
(2, 'Mis andanzas con el lenguaje PHP', 'premium', '2018-12-24', 'PHP, es un lenguaje molon, que permite la programacion web en el entorno del servidor. No es tipado, es decir que las variables no tienen que ser definidas de un tipo determinad, incluso la misma variable puede contener un valor de un determinado tipo y posteriormente almacenar un valor de un tipo diferente.', 200),
(4, 'Hablemos de Tecnología', 'normal', '2019-01-01', 'Los avances tecnologicos cada vez son mas inapreciables, pues estamos acostumbrados a los cambios que se han estado produciendo en los ultimos años, de tal manera que dichos cambios se ven como una evolucion natural de la vida, y no como algo prodigioso que se ha conseguido.', 110),
(6, 'Internet de las cosas', 'premium', '2019-01-04', 'Cada dia necesitamos que cualquier objeto diario de nuestra vida cotidiana sea mas inteligente y capaz de realizar acciones que nos faciliten la vida, y ahi es donde entra en juego el internet de las cosas, posibilitando que objetos inteligentes se conecten a internet para realizar intercambio de informacion en ambos sentidos.', 300),
(7, 'TWIG. Un motor de plantillas de moda', 'premium', '2019-01-29', 'Recientemente el desarrollo web del lado del servidor ha evolucionado proporcionando distintos Frameworks que facilitan el desarrollo y propiciando aplicaciones mas robustas y faciles de mantener. Muchos de esos frameworks usan un motor de plantillas y uno de los mas conocidos es TWIG, en el proximo articulo explicaremos mas detalladamente en que consiste.', 523),
(8, 'Tengo un trasto amarillo', 'normal', '2022-01-15', 'Si es amarillo pero a diferencia de la canción, no es un tractor sino un trasto, y es que mi scooter de color amarillo se ha convertido en un trasto, ya que se ha gripado el motor y arreglarla me saldría más caro que comprar una nueva, así que ahora mismo tendré que moverme en transporte público hasta que busque alguna solución.', 125),
(9, 'La crisis del silicio toca techo', 'normal', '2022-01-15', 'Un nuevo estudio asegura que a partir de ahora los precios de ciertos componentes electrónicos, como las tarjetas gráficas se irán estabilizando poco a poco, ya que gracias al descubrimiento de un nuevo yacimiento, no habrá escasez en unos buenos pocos de años.', 214);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
CREATE TABLE `cuentas` (
  `nombre` varchar(10) NOT NULL,
  `token` varchar(11) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `consultas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`nombre`, `token`, `estado`, `consultas`) VALUES
('Alejandro', '2505858467C', 'activa', 5),
('Fernando', '5434915524A', 'activa', 4),
('Isabel', '3324471476S', 'activa', 5),
('Juan', '3214569875H', 'bloqueada', 0),
('Manolo', '8004691685Y', 'activa', 5),
('Pepe', '4354863214F', 'activa', 5),
('Roberto', '3949766638H', 'activa', 5),
('Rosalara', '7272774574P', 'activa', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
