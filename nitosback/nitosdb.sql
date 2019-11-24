-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 07:55 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nitosdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `articulo`
--

CREATE TABLE `articulo` (
  `Articulo_ID` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Descripcion` longtext NOT NULL,
  `Foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articulo`
--

INSERT INTO `articulo` (`Articulo_ID`, `Nombre`, `Descripcion`, `Foto`) VALUES
(1, 'Gabriel Garcia Marquez', 'Gabriel José de la Concordia García Márquez<br>\r\n(Aracataca, Magdalena, 6 de marzo de 1927 -<br> \r\nCiudad de México, 17 de abril de 2014?)<br>\r\nfue un escritor, guionista, editor y <br>\r\nperiodista colombiano. En 1982 recibió el<br> \r\nPremio Nobel de Literatura.<br>\r\nEstá relacionado de manera inherente con<br> \r\nel realismo mágico y su obra más conocida,<br> \r\nla novela Cien años de soledad, <br>\r\nes considerada una de las más representativas <br>\r\nde este movimiento literario, e incluso se <br>\r\nconsidera que por el éxito de la <br>\r\nnovela es que tal término se aplica a la <br>\r\nliteratura surgida a partir de los años 1960 <br>\r\nen América Latina. <br>\r\n?En 2007 la Real Academia Española y la <br>\r\nAsociación de Academias de la Lengua Española <br>\r\npublicaron una edición popular <br>\r\nconmemorativa de esta obra, por considerarla <br>\r\nparte de los grandes clásicos hispánicos de <br>\r\ntodos los tiempos.<br>', 'garcia_marquez.jpg'),
(2, 'Charles John Huffam Dickens', 'Charles John Huffam Dickens (Portsmouth, 7 de febrero de 1812-Gads Hill Place, 9 de junio de 1870) fue un escritor y novelista inglés, uno de los más reconocidos de la literatura universal, y el más sobresaliente de la época victoriana. Fue maestro del gé', 'autores.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `PK_ID` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Titulo` varchar(80) NOT NULL,
  `Descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`PK_ID`, `Fecha`, `Hora`, `Titulo`, `Descripcion`) VALUES
(2, '2019-11-30', '17:30:00', 'Conferencia por Mario Vargas Llosa', 'Mario Vargas Llosa, el premio nobel de 2010, viene a deleitarnos con una plática. No te lo puedes perder.'),
(8, '2000-03-10', '10:00:00', 'Este es un nuevo evento', 'Este evento está bien chidoris'),
(10, '2019-11-23', '19:30:00', 'Juanpa se rifa', 'Ya quedó este pedo compas'),
(36, '2222-12-12', '12:21:00', 'asdsa', 'asdsa');

-- --------------------------------------------------------

--
-- Table structure for table `historial`
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
-- Table structure for table `marca`
--

CREATE TABLE `marca` (
  `Marca_ID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marca`
--

INSERT INTO `marca` (`Marca_ID`, `Nombre`) VALUES
(1, 'Chapman & Hall'),
(2, '	\r\nBradbury and Evans'),
(3, 'Grupo Editorial Tomo'),
(4, 'BackList'),
(5, 'Richard Bentley'),
(6, 'Espasa'),
(7, 'Alianza Editorial'),
(8, 'Diana'),
(9, 'DeBolsillo');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `Producto_ID` int(11) NOT NULL,
  `Marca_FK` int(11) NOT NULL,
  `Articulo_FK` int(11) NOT NULL,
  `Cantidad` tinyint(4) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  `Modelo` varchar(50) NOT NULL,
  `Descripcion` varchar(2000) NOT NULL,
  `Precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`Producto_ID`, `Marca_FK`, `Articulo_FK`, `Cantidad`, `Nombre`, `Foto`, `Modelo`, `Descripcion`, `Precio`) VALUES
(1, 1, 2, 50, 'Grandes esperanzas', 'grandesExpectaciones1.jpg', 'SDFHGF34D', 'La novela narra la historia Phillip Pirrip, un huérfano aprendiz de herrero cuya aspiración pasará a ser convertirse en un noble caballero, describiendo su vida desde su niñez hasta su madurez. Se puede decir que se trata de un Bildungsroman o novela de a', 50),
(2, 3, 2, 50, 'Grandes esperanzas', 'grandesEsperanzas2.jpg', 'FDS34DF', 'Kent, Inglaterra, finales del siglo XIX. El huérfano Pip vive una existencia humilde con su hermana y su cuñado, a quien ayuda en su taller de herrería. Cuando la rica Miss Havisham requiere a Pip como acompañante de ella y de su bella hija, el joven se d', 300),
(3, 4, 2, 49, 'GRANDES ESPERANZAS', 'grandesEsperanzas3.jpg', 'FHW42D3', 'Grandes esperanzas es uno de los títulos más célebres del gran autor inglés Charles Dickens. Publicado originalmente en 1860, cuenta la historia de Pip, un joven huérfano y miedoso, cuyo humilde destino se ve favorecido por un benefactor inesperado que ca', 150),
(4, 5, 2, 40, 'Oliver Twist', 'oliver.jpg', '34SDF56D', 'Es una historia de tinte realista, que destila crítica social, con un estilo ameno. Bajo una luz u otra, seguirán vivos muchos de sus personajes, llamarán la atención y se meterán por unos minutos, unas horas o unos días en las vidas de sus lectores.', 90),
(5, 6, 2, 45, 'David Copperfield', 'copperfield.jpg', 'FD45YUB3D', 'La transmutación íntima de ambos, protagonista y autor, fue compleja y sutil. Aunque ficción y realidad no siempre coinciden, las desdichas de la niñez, el trabajo en la abogacía, la condición  de escritor y varios de los personajes responden a la experie', 400),
(6, 7, 2, 30, 'Tiempos Dificiles', 'tiemposDificiles.jpg', 'HF356NT5X', 'Tiempos difíciles se cuenta entre las obras que han valido a Charles Dickens (1812-1870) su reputación como uno de los principales autores ingleses del siglo xix. Su entretenida trama, que entremezcla las vidas y peripecias, ilusiones y desdichas del rígi', 206),
(7, 8, 1, 10, 'Cien años de soledad', 'cienAnosDeSoledad.jpg', '35JY88L', 'Muchos años después, frente al pelotón de fusilamiento, el coronel Aureliano Buendía había de recordar aquella tarde remota en que su padre lo llevó a conocer el hielo. Macondo era entonces una aldea de veinte casas de barro y cañabrava construidas a la o', 368),
(8, 9, 1, 25, 'Cronica de una muerte anunciada', 'cronica.jpg', '56DHJK9L', 'El día en que lo iban a matar, Santiago Nasar se levantó a las 5.30 de la mañana para esperar el buque en que llegaba el obispo.» Acaso sea Crónica de una muerte anunciada la obra más «realista» de Gabriel García Márquez, pues se basa en un hecho históric', 350),
(9, 8, 1, 12, 'El amor en los tiempos de colera', 'amorEnTiemposDeColera.jpg', 'P09BZ5', 'Florentino Ariza... no había dejado de pensar en ella un solo instante después de que Fermina Daza lo rechazó sin apelación después de unos amores largos y contrariados, y habían transcurrido desde entonces cincuenta y un años, nueve meses y cuatro días. ', 198),
(10, 8, 1, 77, 'El coronel no tiene Quien le escriba', 'elCoronel.jpg', '6XK39JD', 'El administrador le entregó la correspondencia. Metió el resto en el saco y lo volvió a cerrar. El médico se dispuso a leer dos cartas personales. Pero antes de romper los sobres miró al coronel. Luego miró al administrador. -¿Nada para el coronel? El cor', 238),
(11, 8, 1, 43, 'Memoria de mis putas tristes', 'putas.jpg', '4QW9JH7', 'Un viejo periodista decide festejar sus noventa años a lo grande, dándose un regalo que le hará sentir que todavía está vivo: una jovencita virgen y con ella el principio de una nueva vida a una edad en que la mayoría de los mortales están muertos. En el ', 158);

-- --------------------------------------------------------

--
-- Table structure for table `t_usuario`
--

CREATE TABLE `t_usuario` (
  `Usuario_ID` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_usuario`
--

INSERT INTO `t_usuario` (`Usuario_ID`, `Nombre`) VALUES
(1, 'Cliente'),
(2, 'Administrador'),
(3, 'Almacenista');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
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
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`Usuario_ID`, `Tipo_FK`, `Nombre`, `Apellido`, `Correo`, `Contrasena`, `Ultima_Conexion`) VALUES
(1, 2, 'Alan Jesus', 'Lomeli', 'alomeligcia@gmail.com', 'clave', 1574561420),
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
-- Indexes for dumped tables
--

--
-- Indexes for table `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`Articulo_ID`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`PK_ID`);

--
-- Indexes for table `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`PK_historial`),
  ADD KEY `FK_usuario` (`FK_usuario`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`Marca_ID`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Producto_ID`),
  ADD KEY `Marca_FK` (`Marca_FK`),
  ADD KEY `Articulo_FK` (`Articulo_FK`);

--
-- Indexes for table `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`Usuario_ID`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Usuario_ID`),
  ADD KEY `Tipo_FK` (`Tipo_FK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articulo`
--
ALTER TABLE `articulo`
  MODIFY `Articulo_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `historial`
--
ALTER TABLE `historial`
  MODIFY `PK_historial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `Marca_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `Producto_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `t_usuario`
--
ALTER TABLE `t_usuario`
  MODIFY `Usuario_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Usuario_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`FK_usuario`) REFERENCES `usuario` (`Usuario_ID`);

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`Marca_FK`) REFERENCES `marca` (`Marca_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`Articulo_FK`) REFERENCES `articulo` (`Articulo_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Tipo_FK`) REFERENCES `t_usuario` (`Usuario_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
