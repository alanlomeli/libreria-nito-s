-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2019 a las 19:02:59
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `skaters`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `Articulo_ID` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`Articulo_ID`, `Nombre`) VALUES
(1, 'Llantas'),
(2, 'Trucks'),
(3, 'Tablas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `PK_historial` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `FK_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `Marca_ID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`Marca_ID`, `Nombre`) VALUES
(1, 'Antifashion'),
(2, 'Santa Cruz'),
(3, 'Vans'),
(4, 'Dexlix'),
(5, 'Spitfire'),
(6, 'Independent'),
(7, 'Dexlix'),
(8, 'Plan B'),
(9, 'Deathwish'),
(10, 'Hysteria'),
(11, 'Krux'),
(12, 'Vulkan'),
(13, 'VEnture'),
(14, 'Thunder');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Producto_ID` int(11) NOT NULL,
  `Marca_FK` int(11) NOT NULL,
  `Articulo_FK` int(11) NOT NULL,
  `Cantidad` tinyint(4) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  `Modelo` varchar(50) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Producto_ID`, `Marca_FK`, `Articulo_FK`, `Cantidad`, `Nombre`, `Foto`, `Modelo`, `Descripcion`, `Precio`) VALUES
(1, 4, 3, 11, 'Tabla Dexlix Cocodrilo 8.5 inch', 'tabla-dexlixcoco.png', 'T-DEXCOCO85', 'Bonita tabla Dexlix color rosa de 8.5', 1000),
(4, 7, 3, 19, 'Tabla Dexlix X THC 420 Rojo ', 'tabla-dexlixthc.png', 'THC 420', '8.4 inch', 690),
(5, 7, 3, -1, 'Tabla Dexlix Alv coco', 'tabla-dexlixalv.png', 'ALV COCO', '8.0,8.12,8.25,8.37,8.5 inch', 570),
(6, 8, 3, 29, 'Tabla Plan B Sheckler ', 'tabla-planbsheckler.png', 'Sheckler Hands', '8.25 inch', 890),
(7, 9, 3, 30, 'Tabla Deathwish Skateboards Slash', 'tabla-deathwishslash.png', 'Slash', '8 inch', 949),
(8, 8, 3, 29, 'Tabla Plan B Felipe Gustavo', 'tabla-planbfelipe.png', 'Felipe GUstavo', '8.25 inch', 890),
(10, 5, 1, 26, 'Spitfire Chargers 80hd Azul 54mm', 'llanta-spitfirechargers.png', '80hdL', '80hd Azul 54mm', 900),
(11, 5, 1, 27, 'Spitfire Wheels Mike Anderson 54 mm 99 duro Rosas', 'llanta-spitfiremike.png', 'Mike Anderson', '54 mm 99 duro Rosas', 800),
(12, 5, 1, 29, 'Spitfire Wheels F4 Lock Ins Daewon 53mm', 'llanta-spitfirelocks.png', 'Lock Ins Daewon', '53mm', 950),
(13, 5, 1, 29, 'Spitfire Wheels 80HD Chargers Green 54mm', 'llanta-spitfirechargersgreen.png', 'Chargers Green ', '54mm', 950),
(14, 5, 1, 24, 'Spitfire Wheels 80HD Chargers Red 54mm', 'llanta-spitfirechargersred.png', 'Chargers Red', '54mm', 900),
(15, 5, 1, 30, 'Spitfire Arson Dept 54mm', 'llanta-spitfirearson.png', 'Arson Dept', '54mm', 1000),
(16, 10, 2, 29, 'Trucks Hysteria X Ludica', 'trucks-Hysteria-X-Ludica-Serpiente.png', 'X LUDICA', '149', 690),
(17, 6, 2, 28, 'Trucks Independent 215', 'trucks-INDY215.png', 'Independent 215', '215', 1290),
(18, 11, 2, -1, 'Trucks Krux Pro Nora', 'krux-k4_nora_multi_colour_trucks_8_5_standard_trucks_pro_model_nora_grande.png', ' Pro Nora', '8.0', 850),
(19, 12, 2, 28, 'Trucks Vulkan Negro', 'vulkan-negro2.png', 'VK-blc', '8.5', 590),
(20, 13, 2, 25, 'Trucks Venture Biebel Brilliant V-Lights Low 5.0', 'Trucks-Venture-Biebel-Brilliant-V-Lights-Low.png', 'iebel Brilliant V-Lights Low', '5.0', 950),
(21, 14, 2, 30, 'Trucks Thunder Polish Team Editions 145', 'trucks-thunder-polished.png', 'Polish Team Editions', '145', 820);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuario`
--

CREATE TABLE `t_usuario` (
  `Usuario_ID` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_usuario`
--

INSERT INTO `t_usuario` (`Usuario_ID`, `Nombre`) VALUES
(1, 'Cliente'),
(2, 'Administrador'),
(3, 'Almacenista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Usuario_ID` int(11) NOT NULL,
  `Tipo_FK` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Contrasena` varchar(128) NOT NULL,
  `Ultima_Conexion` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Usuario_ID`, `Tipo_FK`, `Nombre`, `Apellido`, `Correo`, `Contrasena`, `Ultima_Conexion`) VALUES
(1, 2, 'Alan Jesus', 'Lomeli', 'alomeligcia@gmail.com', 'clave', 1571591567),
(2, 1, 'Doug Dimmadomme', 'Dueño del Domodimm', 'dougdim@gmail.com', 'clave', 0),
(3, 3, 'Jose de Jesus', 'Jimenez Jara', 'josesito@gmail.com', 'clave', 0),
(6, 1, 'Maria', 'Jimenez', 'a16100159@ceti.mx', '123', 0),
(7, 1, 'Adriana', 'Espinosa', 'Adriana@gmail.com', '123', 0),
(8, 1, 'Nito', 'Rodriguez', 'juanpa1099@hotmail.com', 'nito123', 0),
(9, 1, 'Pablo', 'LeÃ³n', 'telasponcho@gmail.com', 'weeeynooo', 0),
(10, 1, 'Christian', 'Ochoa', 'christianhdez022@gmail.com', 'clave', 0),
(11, 1, 'juanpa', 'reyes', 'pablo16100279@gmail.com', '1234', 0),
(12, 1, 'Mohamed', 'Olmos', 'moes131212@gmail.com', 'clave', 0),
(13, 1, 'Hillary', 'Castaneda', 'hilary1723@gmail.com', '123', 0),
(14, 1, 'Mario', 'Villalpando', 'marioeltrunco@gmail.com', 'cacadevaca', 0),
(15, 1, 'Mariana', 'Bojorquez', 'bojorquez.mariana73@gmail.com', '1234', 0),
(16, 1, 'Andre Gabriel', 'Monterrubio Blas', 'andremblas@gmail.com', 'clave', 0),
(17, 1, 'Ricardo ', 'Lopez', 'relg1999@gmail.com', '123', 0),
(18, 1, 'Herbert', 'Jaime', 'herbert@hotmail.com', '1234', 0),
(19, 1, 'Krozz', 'RDGZ', 'krozzimpulse@gmail.com', '12', 0),
(20, 1, 'Coco', 'El matador', 'cocogaga@ceti.mx', 'ALVlaclase', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`Articulo_ID`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`PK_historial`),
  ADD KEY `FK_usuario` (`FK_usuario`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`Marca_ID`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Producto_ID`),
  ADD KEY `Marca_FK` (`Marca_FK`),
  ADD KEY `Articulo_FK` (`Articulo_FK`);

--
-- Indices de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`Usuario_ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Usuario_ID`),
  ADD KEY `Tipo_FK` (`Tipo_FK`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `Articulo_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `PK_historial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `Marca_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Producto_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  MODIFY `Usuario_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Usuario_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`FK_usuario`) REFERENCES `usuario` (`Usuario_ID`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`Marca_FK`) REFERENCES `marca` (`Marca_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`Articulo_FK`) REFERENCES `articulo` (`Articulo_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Tipo_FK`) REFERENCES `t_usuario` (`Usuario_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
