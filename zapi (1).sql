-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-12-2017 a las 18:43:04
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zapi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `dni` int(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `domicilio` varchar(50) NOT NULL,
  `telefono` int(30) NOT NULL,
  `celular` int(30) NOT NULL,
  `mail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`dni`, `nombre`, `apellido`, `domicilio`, `telefono`, `celular`, `mail`) VALUES
(333333335, 'jul', 'arias', '3 n 1060', 1111, 2222, 'aaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_productos` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `valor` int(3) NOT NULL,
  `cantidad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_productos`, `nombre`, `valor`, `cantidad`) VALUES
(6, 'Calabresa', 250, '248'),
(8, 'Jamon y Morrones', 200, '395'),
(9, 'Jugo Baggio', 40, '479'),
(10, 'ivess', 2, '227');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodeventa`
--

CREATE TABLE `tipodeventa` (
  `id` int(10) NOT NULL,
  `tipo_venta` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipodeventa`
--

INSERT INTO `tipodeventa` (`id`, `tipo_venta`) VALUES
(1, 'Local'),
(2, 'Delivery');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_user` varchar(15) NOT NULL,
  `contraseña_user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_user`, `contraseña_user`) VALUES
(1, 'julian', '12345678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `dni` int(30) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `total_ventas` int(30) NOT NULL,
  `tipo_venta` varchar(10) NOT NULL,
  `domicilio_ventas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_producto`, `dni`, `fecha`, `total_ventas`, `tipo_venta`, `domicilio_ventas`) VALUES
(8, 6, 333333333, '21-12-2017', 1, '1', 'Mar de ajo 11'),
(9, 6, 0, '21-12-2017', 1, '1', '0'),
(10, 10, 0, '21-12-2017', 11, '1', '0'),
(11, 8, 37198864, '21-12-2017', 1, '2', 'Pizzeria'),
(12, 6, 37198864, '21-12-2017', 5, 'local', 'Pizzeria'),
(13, 10, 43143122, '21-12-2017', 2, 'delivery', 'En la casa de la mama'),
(14, 6, 43143122, '21-12-2017', 1, 'delivery', 'En la casa de la mama'),
(15, 9, 43143122, '21-12-2017', 4, 'delivery', 'En la casa de la mama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventasp`
--

CREATE TABLE `ventasp` (
  `idP` int(11) NOT NULL,
  `idP_producto` int(11) NOT NULL,
  `dni` int(30) NOT NULL,
  `fechaP` varchar(10) NOT NULL,
  `total_ventasP` int(30) NOT NULL,
  `tipo_ventaP` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventasp`
--

INSERT INTO `ventasp` (`idP`, `idP_producto`, `dni`, `fechaP`, `total_ventasP`, `tipo_ventaP`) VALUES
(1, 9, 333333335, '21-12-2017', 1, '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_productos`);

--
-- Indices de la tabla `tipodeventa`
--
ALTER TABLE `tipodeventa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nombre_user`),
  ADD UNIQUE KEY `id_user` (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventasp`
--
ALTER TABLE `ventasp`
  ADD PRIMARY KEY (`idP`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `dni` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333333336;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tipodeventa`
--
ALTER TABLE `tipodeventa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `ventasp`
--
ALTER TABLE `ventasp`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
