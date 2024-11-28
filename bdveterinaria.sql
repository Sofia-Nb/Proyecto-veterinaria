-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2024 a las 22:19:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdveterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idCarrito` varchar(50) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `idproducto` bigint(20) DEFAULT NULL,
  `cantproductos` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`idCarrito`, `idusuario`, `fechaCreacion`, `idproducto`, `cantproductos`) VALUES
('3', 79, '2024-11-25 20:53:03', 1, 4),
('3', 79, '2024-11-25 21:03:51', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idcompra` bigint(20) NOT NULL,
  `cofecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idusuario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraestado`
--

CREATE TABLE `compraestado` (
  `idcompraestado` bigint(20) UNSIGNED NOT NULL,
  `idcompra` bigint(11) NOT NULL,
  `idcompraestadotipo` int(11) NOT NULL,
  `cefechaini` timestamp NOT NULL DEFAULT current_timestamp(),
  `cefechafin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraestadotipo`
--

CREATE TABLE `compraestadotipo` (
  `idcompraestadotipo` int(11) NOT NULL,
  `cetdescripcion` varchar(50) NOT NULL,
  `cetdetalle` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `compraestadotipo`
--

INSERT INTO `compraestadotipo` (`idcompraestadotipo`, `cetdescripcion`, `cetdetalle`) VALUES
(1, 'iniciada', 'cuando el usuario : cliente inicia la compra de uno o mas productos del carrito'),
(2, 'aceptada', 'cuando el usuario administrador da ingreso a uno de las compras en estado = 1 '),
(3, 'enviada', 'cuando el usuario administrador envia a uno de las compras en estado =2 '),
(4, 'cancelada', 'un usuario administrador podra cancelar una compra en cualquier estado y un usuario cliente solo en estado=1 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraitem`
--

CREATE TABLE `compraitem` (
  `idcompraitem` bigint(20) UNSIGNED NOT NULL,
  `idproducto` bigint(20) NOT NULL,
  `idcompra` bigint(20) NOT NULL,
  `cicantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_carrito`
--

CREATE TABLE `detalle_carrito` (
  `idDetalle` int(11) NOT NULL,
  `idCarrito` varchar(50) DEFAULT NULL,
  `idproducto` bigint(20) DEFAULT NULL,
  `cantidad` int(11) DEFAULT 1,
  `fechaAgregado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `idmenu` bigint(20) NOT NULL,
  `menombre` varchar(50) NOT NULL COMMENT 'Nombre del item del menu',
  `medescripcion` varchar(124) NOT NULL COMMENT 'Descripcion mas detallada del item del menu',
  `idpadre` bigint(20) DEFAULT NULL COMMENT 'Referencia al id del menu que es subitem',
  `medeshabilitado` timestamp NULL DEFAULT current_timestamp() COMMENT 'Fecha en la que el menu fue deshabilitado por ultima vez'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idmenu`, `menombre`, `medescripcion`, `idpadre`, `medeshabilitado`) VALUES
(1, 'productos', '../productos.php', NULL, NULL),
(2, 'contacto', 'index-contacto.html', NULL, NULL),
(3, 'Gestionar Productos', '', NULL, '2024-11-27 03:29:11'),
(4, 'Gestionar Compras', '', NULL, '2024-11-27 03:29:36'),
(5, 'Asignar Roles', '', NULL, '2024-11-27 03:30:14'),
(6, 'Eliminar Usuarios', '', NULL, '2024-11-27 03:30:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menurol`
--

CREATE TABLE `menurol` (
  `idmenu` bigint(20) NOT NULL,
  `idrol` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `menurol`
--

INSERT INTO `menurol` (`idmenu`, `idrol`) VALUES
(1, 3),
(2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` bigint(20) NOT NULL,
  `pronombre` varchar(50) NOT NULL,
  `prodetalle` varchar(512) NOT NULL,
  `procantstock` int(11) NOT NULL,
  `precio` varchar(11) DEFAULT NULL,
  `prodeshabilitado` timestamp NULL DEFAULT current_timestamp(),
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `pronombre`, `prodetalle`, `procantstock`, `precio`, `prodeshabilitado`, `imagen`) VALUES
(1, 'Collares para cachorros', 'Collar elegantes de colores para cualquier ocasión especial. Longitud ajustable.', 20, '20.99', '0000-00-00 00:00:00', 'img1.webp'),
(2, 'Prendas para cachorros', 'Prendas cómodas para cachorritos, diseñadas para mantenerlos cálidos. Perfectas para cualquier ocasión, con materiales suaves y seguros.', 20, '49.99', '0000-00-00 00:00:00', 'img2.jpg'),
(3, 'Correas', 'Correas resistentes y cómodas para perros, ideales para paseos seguros y controlados.', 15, '19.99', '0000-00-00 00:00:00', 'img3.webp'),
(4, 'Collares para gatos', 'Collares suaves y ligeros. Ofrecen comodidad y seguridad, con un diseño ajustable que se adapta a gatos de todos los tamaños.', 15, '20.99', '0000-00-00 00:00:00', 'img4.jpg'),
(5, 'Prendas para gatos', 'Abrigos cómodos para gatos. Fabricados con materiales suaves y transpirables, ideales para mantener a tu mascota cálida y protegida en climas fríos.', 15, '39.99', '0000-00-00 00:00:00', 'img5.avif'),
(6, 'Pechera con correa para gatos', 'Pechera ajustable con correa incluida. Ideal para paseos seguros, fabricada con materiales resistentes pero suaves al tacto.', 10, '49.99', '0000-00-00 00:00:00', 'img6.webp'),
(7, 'Pedigree adulto', 'Alimento balanceado para perros adultos. Enriquecido con vitaminas y minerales para mantener a tu mascota fuerte y saludable.', 10, '29.99', '0000-00-00 00:00:00', 'img7.jpg'),
(8, 'Raza adulto (Perro)', 'Alimento premium para perros adultos. Diseñado para cubrir todas sus necesidades nutricionales con ingredientes de alta calidad.', 20, '129.99', '0000-00-00 00:00:00', 'img8.jpg'),
(9, 'Dog Chow adulto', 'Comida completa para perros adultos. Proporciona la energía y los nutrientes necesarios para mantener a tu perro feliz y saludable.', 20, '19.99', '0000-00-00 00:00:00', 'img9.png'),
(10, 'Whiskas adultos', 'Alimento seco para gatos adultos. Formulado con ingredientes naturales para una digestión óptima. Incluye nutrientes esenciales para su bienestar.', 15, '49.99', '0000-00-00 00:00:00', 'img10.webp'),
(11, 'Cat Chow adulto', 'Alimento rico en proteínas y fibras naturales. Ayuda a mantener un sistema digestivo saludable y un pelaje brillante.', 20, '79.99', '0000-00-00 00:00:00', 'img11.jpg'),
(12, 'Raza adulto (Gato)', 'Comida premium para gatos adultos, enriquecida con vitaminas y minerales esenciales. Diseñada para mejorar la salud general y mantener la vitalidad.', 15, '99.99', '0000-00-00 00:00:00', 'img12.webp'),
(13, 'Librela', 'Tratamiento innovador para el alivio del dolor crónico en perros. Utiliza anticuerpos monoclonales para brindar un alivio seguro y efectivo.', 10, '18.99', '0000-00-00 00:00:00', 'img13.jpg'),
(14, 'Anemi-Bye', 'Suplemento antianémico diseñado para tratar deficiencias de hierro en mascotas.', 15, '109.99', '0000-00-00 00:00:00', 'img14.jpg'),
(15, 'Simparica', 'Tabletas masticables que eliminan pulgas y garrapatas. Brinda protección continua por hasta 30 días, manteniendo a tu mascota libre de parásitos.', 15, '30.99', '0000-00-00 00:00:00', 'img15.png'),
(16, 'Silimarina', 'Hepatoprotector natural que ayuda a mantener un hígado saludable. Ideal para mascotas con enfermedades hepáticas o en recuperación.', 10, '49.99', '0000-00-00 00:00:00', 'img16.webp'),
(17, 'RevolutionPlus', 'Tratamiento antiparasitario de amplio espectro. Protege contra pulgas, garrapatas, ácaros y parásitos internos.', 15, '79.99', '0000-00-00 00:00:00', 'img17.jpg'),
(18, 'Totalfull', 'Suplemento nutricional completo para mejorar la vitalidad y fortalecer el sistema inmunológico de tu mascota. Ideal para periodos de recuperación o como complemento dietético.', 10, '55.99', '0000-00-00 00:00:00', 'img18.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL,
  `rodescripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rodescripcion`) VALUES
(1, 'administrador'),
(2, 'veterniario'),
(3, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariorol`
--

CREATE TABLE `usuariorol` (
  `idusuario` int(11) NOT NULL,
  `idrol` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuariorol`
--

INSERT INTO `usuariorol` (`idusuario`, `idrol`) VALUES
(76, 3),
(77, 3),
(78, 3),
(79, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombreUsuario` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `usDeshabilitado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombreUsuario`, `email`, `password`, `usDeshabilitado`) VALUES
(76, 'nacho', 'nacho@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(77, 'saul', 'saul@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(78, 'natali', 'nat@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(79, 'jose', 'jose@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `fk_producto` (`idproducto`);

--
-- Indices de la tabla `detalle_carrito`
--
ALTER TABLE `detalle_carrito`
  ADD PRIMARY KEY (`idDetalle`),
  ADD KEY `idCarrito` (`idCarrito`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indices de la tabla `menurol`
--
ALTER TABLE `menurol`
  ADD PRIMARY KEY (`idmenu`,`idrol`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
  ADD PRIMARY KEY (`idusuario`,`idrol`),
  ADD KEY `idrol` (`idrol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_carrito`
--
ALTER TABLE `detalle_carrito`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`);

--
-- Filtros para la tabla `detalle_carrito`
--
ALTER TABLE `detalle_carrito`
  ADD CONSTRAINT `detalle_carrito_ibfk_1` FOREIGN KEY (`idCarrito`) REFERENCES `carrito` (`idCarrito`) ON DELETE CASCADE,
  ADD CONSTRAINT `detalle_carrito_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
  ADD CONSTRAINT `usuariorol_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuariorol_ibfk_2` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
