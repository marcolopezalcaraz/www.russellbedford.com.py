-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2020 a las 21:35:35
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jueves`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `asunto` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `mensaje` varchar(250) NOT NULL,
  `respondido` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`nombre`, `apellido`, `asunto`, `email`, `telefono`, `celular`, `mensaje`, `respondido`, `fecha`, `hora`) VALUES
('marco', 'lopez', 'consulta', 'marco@lopez.com', '555 555 ', '555 555', '', 'hola!', '2020-01-02', '15:16:56'),
('marco', 'lopez', 'consulta', 'marco@lopez.com', '555 555 ', '555 555', '', 'hola!', '2020-01-02', '15:16:56'),
('marco', 'lopez', 'consulta', 'marco@gmail.com', '55 555', '5555 555', 'pendiente', 'hola!', '2020-01-02', '15:18:51'),
('john', 'gomez', 'hola', 'john@gmail.com', '333 333', '333 333', 'pendiente', 'hola!', '2020-01-02', '15:20:18'),
('juan', 'alcaraz', 'hola', 'juan@gmail.com', '444 444', '444 444', 'pendiente', 'hola!', '2020-01-02', '15:24:57'),
('juan', 'alcaraz', 'hola', 'juan@gmail.com', '444 444', '444 444', 'pendiente', 'hola!', '2020-01-02', '15:35:22'),
('marcelo', 'acosta', 'hola', 'marcelo@gmail.com', '666 666', '666 666', 'pendiente', 'hola!', '2020-01-02', '15:51:50'),
('marco', 'lopez', 'hola', 'hol', '444 444', '444 444', 'pendiente', 'asdasd', '2020-01-02', '15:54:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `precio` int(11) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `nombre`, `precio`, `descripcion`, `imagen`) VALUES
(2, 'procesador intel', 800000, 'Core i5 es una nomenclatura que designa procesadores de gama media o media-alta de la marca Intel. Se caracterizan por un precio accesible y prestaciones decentes. Suelen emplearse en ordenadores preparados para ejecutar programas complejos o juegos que necesiten potencia ligeramente superior.\r\n\r\nLa familia i5 ofrece una velocidad de procesamiento media de unos 3.5 GHz y un cachÃ© de unos 8 Mb.\r\n\r\nEvoluciÃ³n de la familia Intel Core i5:\r\n\r\nIntel Core i5 basados en la microarquitectura Nehalem. Es la primera generaciÃ³n de esta familia de procesadores, lanzada a finales de 2009.\r\nIntel Core i5 basados en la microarquitectura Sandy Bridge. Es la segunda generaciÃ³n de esta familia de procesadores, lanzada en 2011 y descontinuada en 2012.\r\nIntel Core i5 basados en la microarquitectura Ivy Bridge. Es la tercera generaciÃ³n de esta familia de procesadores, lanzada en 2012\r\nIntel Core i5 basados en la microarquitectura Haswell. Es la cuarta generaciÃ³n de esta familia de procesadores, lanzad', 'intel 5.jpg'),
(3, 'memoria Ram', 450000, 'memoria RAM Kingston 8GB', 'ram.jpg'),
(4, 'SSD 120', 200000, 'SSD Kingston 120GB', 'ssd.jpg'),
(6, 'brother 8080', 0, 'brother 8080 compartida en Red', '8080.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `contenido` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titulo`, `contenido`, `fecha`, `imagen`) VALUES
(4, 'primera publicacion', 'Lorem ipsum es el texto que se usa habitualmente en diseÃ±o grÃ¡fico en demostraciones de tipografÃ­as o de borradores de diseÃ±o para probar el diseÃ±o visual antes de insertar el texto final.', '0000-00-00', 'Lorem_ipsum_design.svg.png'),
(5, 'segunda publicacion', 'XAMPP es un paquete de software libre, que consiste principalmente en el sistema de gestiÃ³n de bases de datos MySQL, el servidor web Apache y los intÃ©rpretes para lenguajes de script PHP y Perl. ', '0000-00-00', 'xampp.png'),
(6, 'tercera publicacion', 'MySQL es un sistema de gestiÃ³n de bases de datos relacional desarrollado bajo licencia dual:', '2020-03-05', 'mysql.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `hora` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `nombre`, `login`, `password`, `fecha`, `hora`) VALUES
(5, 'marco lopez', 'marco', '123', '2020-02-20', '0000-00-00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `codigo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
