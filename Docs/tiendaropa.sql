-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-01-2024 a las 20:19:08
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendaropa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID_cliente` int(11) NOT NULL,
  `Cedula` varchar(17) NOT NULL,
  `NombresCliente` varchar(100) NOT NULL,
  `Direccion` varchar(150) NOT NULL,
  `Telefono` varchar(17) NOT NULL,
  `Correo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID_cliente`, `Cedula`, `NombresCliente`, `Direccion`, `Telefono`, `Correo`) VALUES
(1, '1712730330', 'Rodrigo Javier', 'Baldeon Ortega', '0993677621', 'rodbal79@hotmail.com'),
(2, '0400497152', 'Wilson Hernán', 'Calapi Madera', '062770305', 'wilsoncalapim@gmail.com'),
(3, '0400640744', 'Laura Yolanda', 'Muñoz Cuasquer', '0980931510', 'lauritamc@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendasropa`
--

CREATE TABLE `tiendasropa` (
  `ID_tienda` int(14) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Ciudad` varchar(100) NOT NULL,
  `Categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tiendasropa`
--

INSERT INTO `tiendasropa` (`ID_tienda`, `Nombre`, `Ciudad`, `Categoria`) VALUES
(1, 'DeModa', 'Ibarra', 'Mujer'),
(2, 'DeModa', 'Ibarra', 'Hombre'),
(3, 'DeModa', 'Ibarra', 'Niños');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `UsuarioId` int(11) NOT NULL,
  `Cedula` varchar(17) NOT NULL,
  `Nombres` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Telefono` varchar(17) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Contrasenia` text NOT NULL,
  `Rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UsuarioId`, `Cedula`, `Nombres`, `Apellidos`, `Telefono`, `Correo`, `Contrasenia`, `Rol`) VALUES
(1, '1400373583', 'ANTONIO WILMER', 'AYUY AGUANANCHI', '0999122053', 'wilmerayuy@gmail.com', '123456', 'administrador'),
(2, '1400872345', 'Wilmer Stevens', 'Ayuy Atamaint entzacua', '0939237688', '123', 'wilmerstevens@gmail.com', 'Vendedor'),
(3, '0401400312', 'Yolanda Patricia', 'Calapi Muñoz', '0984923825', 'ypcalapi@gmail.com', '123', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventasropa`
--

CREATE TABLE `ventasropa` (
  `ID_venta` int(14) NOT NULL,
  `ID_tienda` int(14) NOT NULL,
  `ID_cliente` int(14) NOT NULL,
  `Producto` varchar(100) NOT NULL,
  `Cantidad` int(100) DEFAULT NULL,
  `Precio` float DEFAULT NULL,
  `Total` int(50) NOT NULL,
  `Fecha_venta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ventasropa`
--

INSERT INTO `ventasropa` (`ID_venta`, `ID_tienda`, `ID_cliente`, `Producto`, `Cantidad`, `Precio`, `Total`, `Fecha_venta`) VALUES
(1, 1, 3, 'Camiseta cuello V', 3, 5, 15, '2024-01-05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID_cliente`);

--
-- Indices de la tabla `tiendasropa`
--
ALTER TABLE `tiendasropa`
  ADD PRIMARY KEY (`ID_tienda`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioId`);

--
-- Indices de la tabla `ventasropa`
--
ALTER TABLE `ventasropa`
  ADD PRIMARY KEY (`ID_venta`),
  ADD KEY `ID_tienda` (`ID_tienda`),
  ADD KEY `ID_cliente` (`ID_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventasropa`
--
ALTER TABLE `ventasropa`
  ADD CONSTRAINT `ventasropa_ibfk_1` FOREIGN KEY (`ID_tienda`) REFERENCES `tiendasropa` (`ID_tienda`),
  ADD CONSTRAINT `ventasropa_ibfk_2` FOREIGN KEY (`ID_cliente`) REFERENCES `clientes` (`ID_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
