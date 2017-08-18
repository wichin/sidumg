-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2017 at 03:33 AM
-- Server version: 5.6.14
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sidumg`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat_categoria`
--

CREATE TABLE IF NOT EXISTS `cat_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_creacion` (`usuario_creacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `cat_categoria`
--

INSERT INTO `cat_categoria` (`id`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'Tenis', 1, '2017-08-07 03:28:37', NULL, NULL, 1),
(2, 'Maletin', 1, '2017-08-07 03:31:54', NULL, NULL, 1),
(3, 'Zapatos', 1, '2017-08-08 01:28:39', NULL, NULL, 1),
(4, 'Camisola', 1, '2017-08-12 23:20:30', NULL, NULL, 1),
(5, 'Medias', 1, '2017-08-14 10:42:07', NULL, NULL, 1),
(6, 'Chaqueta', 1, '2017-08-14 10:42:19', NULL, NULL, 1),
(7, 'Playera', 1, '2017-08-14 10:42:58', NULL, NULL, 1),
(8, 'Camiseta', 1, '2017-08-14 10:43:08', NULL, NULL, 1),
(9, 'Mochila', 1, '2017-08-14 10:43:31', NULL, NULL, 1),
(10, 'Sudadero', 1, '2017-08-14 10:43:46', NULL, NULL, 1),
(11, 'Muñequera', 1, '2017-08-14 10:43:55', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat_color`
--

CREATE TABLE IF NOT EXISTS `cat_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_creacion` (`usuario_creacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cat_color`
--

INSERT INTO `cat_color` (`id`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'Rojo', 1, '2017-08-07 22:00:00', NULL, NULL, 1),
(2, 'Azul', 1, '2017-08-07 22:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat_deporte`
--

CREATE TABLE IF NOT EXISTS `cat_deporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_creacion` (`usuario_creacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cat_deporte`
--

INSERT INTO `cat_deporte` (`id`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'Fútbol', 1, '2017-08-07 21:00:00', NULL, NULL, 1),
(2, 'Fútbol Americano', 1, '2017-08-07 21:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat_estado_factura`
--

CREATE TABLE IF NOT EXISTS `cat_estado_factura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_creacion` (`usuario_creacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cat_estado_usuario`
--

CREATE TABLE IF NOT EXISTS `cat_estado_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_creacion` (`usuario_creacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cat_estado_usuario`
--

INSERT INTO `cat_estado_usuario` (`id`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'Activo', 1, '2017-07-30 00:00:00', NULL, NULL, 1),
(2, 'Inactivo', 1, '2017-07-30 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat_genero`
--

CREATE TABLE IF NOT EXISTS `cat_genero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_creacion` (`usuario_creacion`,`usuario_modificacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cat_genero`
--

INSERT INTO `cat_genero` (`id`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'Hombre', 1, '2017-07-29 00:00:00', NULL, NULL, 1),
(2, 'Mujer', 1, '2017-07-29 00:00:00', NULL, NULL, 1),
(3, 'Niño', 1, '2017-08-06 21:00:00', NULL, NULL, 1),
(4, 'Niña', 1, '2017-08-06 21:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat_nacionalidad`
--

CREATE TABLE IF NOT EXISTS `cat_nacionalidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_creacion` (`usuario_creacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cat_nacionalidad`
--

INSERT INTO `cat_nacionalidad` (`id`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'guatemalteco', 1, '2017-07-30 00:00:00', NULL, NULL, 1),
(2, 'extranjero', 1, '2017-07-30 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat_pais`
--

CREATE TABLE IF NOT EXISTS `cat_pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_creacion` (`usuario_creacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cat_pais`
--

INSERT INTO `cat_pais` (`id`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'Guatemala', 1, '2017-08-12 21:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat_talla`
--

CREATE TABLE IF NOT EXISTS `cat_talla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_creacion` (`usuario_creacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cat_talla`
--

INSERT INTO `cat_talla` (`id`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, '4', 1, '2017-08-07 22:00:00', NULL, NULL, 1),
(2, '5', 1, '2017-08-07 22:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat_tipo_cliente`
--

CREATE TABLE IF NOT EXISTS `cat_tipo_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_creacion` (`usuario_creacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cat_tipo_cliente`
--

INSERT INTO `cat_tipo_cliente` (`id`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'Primium', 1, '2017-08-15 15:00:00', NULL, NULL, 1),
(2, 'Regular', 1, '2017-08-15 15:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat_tipo_cobro`
--

CREATE TABLE IF NOT EXISTS `cat_tipo_cobro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_creacion` (`usuario_creacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cat_tipo_documento`
--

CREATE TABLE IF NOT EXISTS `cat_tipo_documento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_creacion` (`usuario_creacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cat_tipo_documento`
--

INSERT INTO `cat_tipo_documento` (`id`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'DPI', 1, '2017-07-30 00:00:00', NULL, NULL, 1),
(2, 'PASAPORTE', 1, '2017-07-30 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat_tipo_local`
--

CREATE TABLE IF NOT EXISTS `cat_tipo_local` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_creacion` (`usuario_creacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cat_tipo_local`
--

INSERT INTO `cat_tipo_local` (`id`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'Oficina', 1, '2017-08-12 20:00:00', NULL, NULL, 1),
(2, 'Bodega', 1, '2017-08-12 20:00:00', NULL, NULL, 1),
(3, 'Punto de Venta', 1, '2017-08-12 20:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat_tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `cat_tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_creacion` (`usuario_creacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cat_tipo_usuario`
--

INSERT INTO `cat_tipo_usuario` (`id`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'Informática', 1, '2017-07-30 00:00:00', NULL, NULL, 1),
(2, 'Gerencial', 1, '2017-07-30 00:00:00', NULL, NULL, 1),
(3, 'Personal', 1, '2017-08-14 10:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat_transaccion`
--

CREATE TABLE IF NOT EXISTS `cat_transaccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(100) NOT NULL,
  `origen` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_creacion` (`usuario_creacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cat_transaccion`
--

INSERT INTO `cat_transaccion` (`id`, `motivo`, `origen`, `destino`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'Nuevo Ingreso', 'Proveedor', 'Bodega', 1, '2017-08-14 20:30:00', NULL, NULL, 1),
(2, 'Traslado', 'Bodega', 'Punto de venta', 1, '2017-08-14 20:30:00', NULL, NULL, 1),
(3, 'Venta', 'Punto de venta', 'Cliente', 1, '2017-08-14 20:30:00', NULL, NULL, 1),
(4, 'Devolucion Cliente', 'Cliente', 'Punto de venta', 1, '2017-08-14 20:30:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_acceso_rol`
--

CREATE TABLE IF NOT EXISTS `tb_acceso_rol` (
  `id_rol` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_rol`,`id_menu`),
  KEY `usuario_creacion` (`usuario_creacion`,`usuario_modificacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`),
  KEY `fk_acceso_rol_menu` (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_acceso_rol`
--

INSERT INTO `tb_acceso_rol` (`id_rol`, `id_menu`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 1, 1, '2017-07-30 00:00:00', NULL, NULL, 1),
(1, 2, 1, '2017-07-30 00:00:00', NULL, NULL, 1),
(1, 3, 1, '2017-07-30 00:00:00', NULL, NULL, 1),
(1, 4, 1, '2017-07-30 00:00:00', NULL, NULL, 1),
(1, 5, 1, '2017-08-12 19:00:00', NULL, NULL, 1),
(1, 6, 1, '2017-08-14 10:00:00', NULL, NULL, 1),
(1, 7, 1, '2017-08-14 22:00:00', NULL, NULL, 1),
(1, 8, 1, '2017-08-15 12:00:00', NULL, NULL, 1),
(1, 9, 1, '2017-08-15 17:00:00', NULL, NULL, 1),
(1, 10, 1, '2017-08-15 19:00:00', NULL, NULL, 1),
(7, 9, 1, '2017-08-15 16:00:00', NULL, NULL, 1),
(7, 10, 1, '2017-08-15 19:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_articulo`
--

CREATE TABLE IF NOT EXISTS `tb_articulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `precio_venta` float NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_deporte` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_talla` int(11) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_color` (`id_color`),
  KEY `id_talla` (`id_talla`),
  KEY `id_deporte` (`id_deporte`),
  KEY `id_genero` (`id_genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_articulo`
--

INSERT INTO `tb_articulo` (`id`, `descripcion`, `precio_venta`, `id_categoria`, `id_deporte`, `id_proveedor`, `id_genero`, `id_color`, `id_talla`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'Zapatos Fútbol Americano Nike Rojo Hombre-2', 900, 3, 2, 1, 1, 1, 1, 1, '2017-08-12 18:52:02', NULL, NULL, 1),
(2, 'Maletin Fútbol Adidas Rojo Mujer-2', 450, 2, 1, 2, 2, 1, 1, 1, '2017-08-12 18:53:55', NULL, NULL, 1),
(3, 'Playera Fútbol Nike Azul Hombre-2', 250, 7, 1, 1, 1, 2, 1, 1, '2017-08-14 12:01:39', NULL, NULL, 1),
(4, 'Chaqueta-Fútbol Nike Azul Hombre-5', 400, 6, 1, 1, 1, 2, 2, 1, '2017-08-14 23:06:41', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_autorizacion_factura`
--

CREATE TABLE IF NOT EXISTS `tb_autorizacion_factura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resolucion` varchar(150) NOT NULL,
  `fecha_caducidad` date NOT NULL,
  `valor_inicial` int(11) NOT NULL,
  `valor_final` int(11) NOT NULL,
  `serie` varchar(25) NOT NULL,
  `valor_actual` int(11) NOT NULL,
  `id_local` int(11) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_local` (`id_local`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_autorizacion_factura`
--

INSERT INTO `tb_autorizacion_factura` (`id`, `resolucion`, `fecha_caducidad`, `valor_inicial`, `valor_final`, `serie`, `valor_actual`, `id_local`, `usuario_creacion`, `fecha_creacion`, `estado`) VALUES
(1, 'SAT 2016-05-1234', '2018-08-15', 1, 500000, 'A', 1, 1, 1, '2017-08-15 14:15:57', 1),
(2, 'SAT 2017-06-1234', '2017-08-16', 1, 500000, 'B', 1, 2, 1, '2017-08-15 14:21:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cliente`
--

CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `id_tipo_cliente` int(11) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_estado` (`id_persona`),
  KEY `id_tipo_cliente` (`id_tipo_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_cliente`
--

INSERT INTO `tb_cliente` (`id`, `id_persona`, `id_tipo_cliente`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 1, 1, 1, '2017-08-15 15:00:00', NULL, NULL, 1),
(2, 11, 1, 1, '2017-08-15 15:14:18', NULL, NULL, 1),
(4, 14, 2, 9, '2017-08-15 16:44:49', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cuenta`
--

CREATE TABLE IF NOT EXISTS `tb_cuenta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cuenta_abono`
--

CREATE TABLE IF NOT EXISTS `tb_cuenta_abono` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cuenta_detalle` int(11) NOT NULL,
  `monto` float NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_cuenta_detalle` (`id_cuenta_detalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cuenta_detalle`
--

CREATE TABLE IF NOT EXISTS `tb_cuenta_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cuenta` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_cuenta` (`id_cuenta`),
  KEY `id_factura` (`id_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_empresa`
--

CREATE TABLE IF NOT EXISTS `tb_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_pais` (`id_pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_empresa`
--

INSERT INTO `tb_empresa` (`id`, `nombre`, `id_pais`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'Implementos Deportivos S.A.', 1, 1, '2017-08-12 21:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_factura`
--

CREATE TABLE IF NOT EXISTS `tb_factura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `serie` varchar(25) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_tipo_cobro` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_autorizacion` int(11) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_serie_numero` (`serie`,`numero`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_tipo_cobro` (`id_tipo_cobro`),
  KEY `id_estado` (`id_estado`),
  KEY `id_autorizacion` (`id_autorizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_factura_detalle`
--

CREATE TABLE IF NOT EXISTS `tb_factura_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_factura` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `id_movimiento` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_articulo` (`id_articulo`),
  KEY `id_movimiento` (`id_movimiento`),
  KEY `id_factura` (`id_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ingreso_proveedor`
--

CREATE TABLE IF NOT EXISTS `tb_ingreso_proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) NOT NULL,
  `id_local` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `id_movimiento` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_local` (`id_local`),
  KEY `id_articulo` (`id_articulo`),
  KEY `id_movimiento` (`id_movimiento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tb_ingreso_proveedor`
--

INSERT INTO `tb_ingreso_proveedor` (`id`, `id_proveedor`, `id_local`, `id_articulo`, `precio_compra`, `id_movimiento`) VALUES
(9, 1, 6, 1, 750, 15),
(10, 1, 6, 3, 250, 16),
(11, 1, 6, 1, 600, 17),
(12, 2, 6, 2, 400, 18),
(13, 2, 6, 2, 250, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tb_inventario`
--

CREATE TABLE IF NOT EXISTS `tb_inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_local` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `cantidad` bigint(20) NOT NULL,
  `ultima_modificacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_local` (`id_local`),
  KEY `id_articulo` (`id_articulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tb_inventario`
--

INSERT INTO `tb_inventario` (`id`, `id_local`, `id_articulo`, `cantidad`, `ultima_modificacion`) VALUES
(7, 6, 1, 18, '2017-08-15 11:04:35'),
(8, 6, 3, 5, '2017-08-15 11:06:13'),
(9, 6, 2, 25, '2017-08-15 11:04:35'),
(12, 1, 1, 10, '2017-08-15 11:04:35'),
(13, 1, 2, 12, '2017-08-15 11:04:35'),
(14, 2, 3, 2, '2017-08-15 11:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_local`
--

CREATE TABLE IF NOT EXISTS `tb_local` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `id_tipo_local` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_tipo_local` (`id_tipo_local`),
  KEY `id_empresa` (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_local`
--

INSERT INTO `tb_local` (`id`, `nombre`, `direccion`, `telefono`, `id_tipo_local`, `id_empresa`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'Miraflores', '21 avenida 4-32, zona 11. Local 12', '2222-4444', 3, 1, 1, '2017-08-12 23:50:14', 0, '0000-00-00 00:00:00', 1),
(2, 'Oakland Mall', 'Diagonal 6, 13-01 zona 10. Local 77', '2233-1234', 3, 1, 1, '2017-08-12 23:52:16', 0, '0000-00-00 00:00:00', 1),
(3, 'Pradera Concepción', 'Km 15.5 Carretera a El Salvador. Local 21', '6644-5533', 3, 1, 1, '2017-08-12 23:54:29', 0, '0000-00-00 00:00:00', 1),
(4, 'Eskala Roosevelt', 'Calzada Roosevelt, Km. 13.8 Zona 3 de Mixco. Local 24', '6632-0000', 3, 1, 1, '2017-08-12 23:56:26', 0, '0000-00-00 00:00:00', 1),
(5, 'Metronorte', 'Km. 5 Carretera al Atlántico. Local 201', '2499-2600', 3, 1, 1, '2017-08-13 00:02:14', 0, '0000-00-00 00:00:00', 1),
(6, 'Administración Central', 'Edificio Géminis 10 Torre Norte. Local 4', '2244-1234', 1, 1, 1, '2017-08-14 08:36:32', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE IF NOT EXISTS `tb_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `url` varchar(100) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `id_modulo` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_creacion` (`usuario_creacion`,`usuario_modificacion`,`id_modulo`),
  KEY `id_modulo` (`id_modulo`),
  KEY `usuario_modificacion` (`usuario_modificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `nombre`, `descripcion`, `url`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `id_modulo`, `estado`) VALUES
(1, 'Crear Usuarios', 'Creación de nuevos usuario', 'admin/crearUsuario', 1, '2017-07-30 00:00:00', NULL, NULL, 1, 1),
(2, 'Ver Usuarios', 'Lista los usuarios disponibles en el sistema.', 'admin/verUsuario', 1, '2017-07-30 00:00:00', NULL, NULL, 1, 1),
(3, 'Crear Categoría', 'Creación de nuevas categorías de productos.', 'inventario/crearCategoria', 1, '2017-07-30 00:00:00', NULL, NULL, 2, 1),
(4, 'Crear Artículo', 'Creación de nuevos artículos', 'inventario/crearArticulo', 1, '2017-07-30 00:00:00', NULL, NULL, 2, 1),
(5, 'Gestión Local', 'Creación de Locales y vista de los existentes.', 'admin/gestionLocal', 1, '2017-08-12 19:14:00', NULL, NULL, 1, 1),
(6, 'Ingreso Proveedor', 'Registro de ingreso de artículos de un proveedor', 'inventario/ingresoProveedor', 1, '2017-08-14 10:00:00', NULL, NULL, 2, 1),
(7, 'Traslado Artículo', 'Movimiento de artículos de bodega a puntos de venta', 'inventario/trasladoArticulo', 1, '2017-08-14 22:00:00', NULL, NULL, 2, 1),
(8, 'Agregar Autorización', 'Permite agregar autorización para factura y asociarla a un punto de venta.', 'factura/agregarAutorizacion', 1, '2017-08-15 12:00:00', NULL, NULL, 3, 1),
(9, 'Crear Cliente', 'Creación de clientes para la empresa.', 'factura/crearCliente', 1, '2017-08-15 15:00:00', NULL, NULL, 3, 1),
(10, 'Nueva Factura', 'Creación de nuevas facturas', 'factura/crearFactura', 1, '2017-08-15 19:00:00', NULL, NULL, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_metas`
--

CREATE TABLE IF NOT EXISTS `tb_metas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `importe_ventas` float NOT NULL,
  `cantidad_ventas` int(11) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_modulo`
--

CREATE TABLE IF NOT EXISTS `tb_modulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `clase` varchar(50) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_creacion` (`usuario_creacion`,`usuario_modificacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_modulo`
--

INSERT INTO `tb_modulo` (`id`, `nombre`, `descripcion`, `clase`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'Administración', 'Módulo para la administración de usuarios y catálogos.', 'fa fa-cog', 1, '2017-07-30 00:00:00', NULL, NULL, 1),
(2, 'Inventario', 'Módulo con funcionalidades para la administración del inventario de la tienda.', 'fa fa-building', 1, '2017-07-30 00:00:00', NULL, NULL, 1),
(3, 'Facturación', 'Módulo para la generación de facturas y acciones relacionadas a este proceso.', 'fa fa-file-text', 1, '2017-07-30 00:00:00', NULL, NULL, 1),
(4, 'Cuentas por Cobrar', 'Módulo para la administración de cuentas por cobrar.', 'fa fa-calculator', 1, '2017-07-30 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_movimiento_inventario`
--

CREATE TABLE IF NOT EXISTS `tb_movimiento_inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaccion` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_transaccion` (`id_transaccion`),
  KEY `id_articulo` (`id_articulo`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_transaccion_2` (`id_transaccion`),
  KEY `id_articulo_2` (`id_articulo`),
  KEY `id_usuario_2` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tb_movimiento_inventario`
--

INSERT INTO `tb_movimiento_inventario` (`id`, `id_transaccion`, `id_articulo`, `cantidad`, `fecha`, `id_usuario`, `estado`) VALUES
(15, 1, 1, 12, '2017-08-14 21:58:02', 1, 1),
(16, 1, 3, 7, '2017-08-14 21:59:18', 1, 1),
(17, 1, 1, 16, '2017-08-14 21:59:18', 1, 1),
(18, 1, 2, 25, '2017-08-14 22:00:32', 1, 1),
(19, 1, 2, 12, '2017-08-15 10:17:58', 1, 1),
(26, 2, 1, 10, '2017-08-15 11:04:35', 1, 1),
(27, 2, 2, 12, '2017-08-15 11:04:35', 1, 1),
(28, 2, 3, 2, '2017-08-15 11:06:13', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_movimiento_local`
--

CREATE TABLE IF NOT EXISTS `tb_movimiento_local` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_local_origen` int(11) NOT NULL,
  `id_local_destino` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `id_movimiento` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_local_origen` (`id_local_origen`),
  KEY `id_local_destino` (`id_local_destino`),
  KEY `id_articulo` (`id_articulo`),
  KEY `id_movimiento` (`id_movimiento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_movimiento_local`
--

INSERT INTO `tb_movimiento_local` (`id`, `id_local_origen`, `id_local_destino`, `id_articulo`, `id_movimiento`) VALUES
(5, 6, 1, 1, 26),
(6, 6, 1, 2, 27),
(7, 6, 2, 3, 28);

-- --------------------------------------------------------

--
-- Table structure for table `tb_persona`
--

CREATE TABLE IF NOT EXISTS `tb_persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(150) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `nit` varchar(20) DEFAULT NULL,
  `documento` varchar(100) DEFAULT NULL,
  `id_tipo_documento` int(11) DEFAULT NULL,
  `id_genero` int(11) NOT NULL,
  `id_nacionalidad` int(11) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_tipo_documento` (`id_tipo_documento`),
  KEY `id_genero` (`id_genero`),
  KEY `id_nacionalidad` (`id_nacionalidad`),
  KEY `usuario_creacion` (`usuario_creacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tb_persona`
--

INSERT INTO `tb_persona` (`id`, `nombres`, `apellidos`, `fecha_nacimiento`, `direccion`, `nit`, `documento`, `id_tipo_documento`, `id_genero`, `id_nacionalidad`, `celular`, `telefono`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'Wichin', 'Pérez', '1982-02-24', NULL, '1860209-6', '1875948560401', 1, 1, 1, '55856571', '78494396', 1, '2017-07-30 00:00:00', NULL, NULL, 1),
(11, 'Usuario', 'Prueba', NULL, '', '', '12345', 1, 1, NULL, '', '', 1, '2017-08-15 15:14:18', NULL, NULL, 1),
(14, 'Cliente', 'Prueba', NULL, '', '', '123456', 1, 1, NULL, NULL, NULL, 9, '2017-08-15 16:44:49', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_proveedor`
--

CREATE TABLE IF NOT EXISTS `tb_proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(255) NOT NULL,
  `nombre_comercial` varchar(255) NOT NULL,
  `nit` varchar(15) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_proveedor`
--

INSERT INTO `tb_proveedor` (`id`, `razon_social`, `nombre_comercial`, `nit`, `direccion`, `telefono`, `correo`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'Nike S.A.', 'Nike', NULL, NULL, NULL, NULL, 1, '2017-08-07 21:00:00', NULL, NULL, 1),
(2, 'Addi Daeler S.A.', 'Adidas', NULL, NULL, NULL, NULL, 1, '2017-08-07 21:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rol`
--

CREATE TABLE IF NOT EXISTS `tb_rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_creacion` (`usuario_creacion`,`usuario_modificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_rol`
--

INSERT INTO `tb_rol` (`id`, `nombre`, `descripcion`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'Super Admin', 'Usuario con acceso completo a todos las opciones del sistema.', 1, '2017-07-30 00:00:00', NULL, NULL, 1),
(2, 'Administrador', 'Usuario con acceso a módulos de mantenimiento del sistema.', 1, '2017-07-30 00:00:00', NULL, NULL, 1),
(3, 'Gerente General', 'Responsable legal de la empresa.', 1, '2017-08-14 10:00:00', NULL, NULL, 1),
(4, 'Administrador Financiero', 'Encargado de establecer metas y control financiero de la empresa.', 1, '2017-08-14 10:00:00', NULL, NULL, 1),
(5, 'Administrador Tienda', 'Encargado de la adminstración de los puntos de vente.', 1, '2017-08-14 10:00:00', NULL, NULL, 1),
(6, 'Jefe Bodega', 'Encargado de la administración de bodegas', 1, '2017-08-14 10:00:00', NULL, NULL, 1),
(7, 'Ejecutivo Ventas', 'Encargado de actividades en los puntos de venta.', 1, '2017-08-14 10:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `id_local` int(11) DEFAULT NULL,
  `id_estado` int(11) NOT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_persona` (`id_persona`),
  KEY `id_rol` (`id_rol`),
  KEY `id_tipo_usuario` (`id_tipo_usuario`),
  KEY `id_estado` (`id_estado`),
  KEY `usuario_creacion` (`usuario_creacion`),
  KEY `usuario_modificacion` (`usuario_modificacion`),
  KEY `id_local` (`id_local`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tb_usuario`
--

INSERT INTO `tb_usuario` (`id`, `correo`, `password`, `id_persona`, `id_rol`, `id_tipo_usuario`, `id_local`, `id_estado`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`) VALUES
(1, 'wii@mail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 1, 1, 6, 1, 1, '2017-07-30 00:00:00', NULL, NULL),
(9, 'prueba@mail.com', '21232f297a57a5a743894a0e4a801fc3', 11, 7, 3, 1, 1, 1, '2017-08-15 15:14:18', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_acceso_rol`
--
ALTER TABLE `tb_acceso_rol`
  ADD CONSTRAINT `fk_acceso_rol_menu` FOREIGN KEY (`id_menu`) REFERENCES `tb_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_acceso_rol_rol` FOREIGN KEY (`id_rol`) REFERENCES `tb_rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_articulo`
--
ALTER TABLE `tb_articulo`
  ADD CONSTRAINT `fk_articulo_cat` FOREIGN KEY (`id_categoria`) REFERENCES `cat_categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_articulo_color` FOREIGN KEY (`id_color`) REFERENCES `cat_color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_articulo_deporte` FOREIGN KEY (`id_deporte`) REFERENCES `cat_deporte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_articulo_gen` FOREIGN KEY (`id_genero`) REFERENCES `cat_genero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_articulo_prov` FOREIGN KEY (`id_proveedor`) REFERENCES `tb_proveedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_articulo_talla` FOREIGN KEY (`id_talla`) REFERENCES `cat_talla` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_autorizacion_factura`
--
ALTER TABLE `tb_autorizacion_factura`
  ADD CONSTRAINT `fk_aut_fact_local` FOREIGN KEY (`id_local`) REFERENCES `tb_local` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD CONSTRAINT `fk_cliente_tipo` FOREIGN KEY (`id_tipo_cliente`) REFERENCES `cat_tipo_cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cliente_persona` FOREIGN KEY (`id_persona`) REFERENCES `tb_persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_cuenta`
--
ALTER TABLE `tb_cuenta`
  ADD CONSTRAINT `fk_cuenta_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_cuenta_abono`
--
ALTER TABLE `tb_cuenta_abono`
  ADD CONSTRAINT `fk_abono_detalle` FOREIGN KEY (`id_cuenta_detalle`) REFERENCES `tb_cuenta_detalle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_cuenta_detalle`
--
ALTER TABLE `tb_cuenta_detalle`
  ADD CONSTRAINT `fk_detallec_factura` FOREIGN KEY (`id_factura`) REFERENCES `tb_factura` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detallec_cuenta` FOREIGN KEY (`id_cuenta`) REFERENCES `tb_cuenta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD CONSTRAINT `fk_empresa_pais` FOREIGN KEY (`id_pais`) REFERENCES `cat_pais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_factura`
--
ALTER TABLE `tb_factura`
  ADD CONSTRAINT `fk_fact_autorizacion` FOREIGN KEY (`id_autorizacion`) REFERENCES `tb_autorizacion_factura` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fact_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fact_estado` FOREIGN KEY (`id_estado`) REFERENCES `cat_estado_factura` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fact_tipo_cobro` FOREIGN KEY (`id_tipo_cobro`) REFERENCES `cat_tipo_cobro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_factura_detalle`
--
ALTER TABLE `tb_factura_detalle`
  ADD CONSTRAINT `fk_detalle_factura` FOREIGN KEY (`id_factura`) REFERENCES `tb_factura` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_articulo` FOREIGN KEY (`id_articulo`) REFERENCES `tb_articulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_mov` FOREIGN KEY (`id_movimiento`) REFERENCES `tb_movimiento_inventario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_ingreso_proveedor`
--
ALTER TABLE `tb_ingreso_proveedor`
  ADD CONSTRAINT `fk_ingreso_articulo` FOREIGN KEY (`id_articulo`) REFERENCES `tb_articulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ingreso_local` FOREIGN KEY (`id_local`) REFERENCES `tb_local` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ingreso_mov` FOREIGN KEY (`id_movimiento`) REFERENCES `tb_movimiento_inventario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ingreso_prov` FOREIGN KEY (`id_proveedor`) REFERENCES `tb_proveedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_inventario`
--
ALTER TABLE `tb_inventario`
  ADD CONSTRAINT `fk_inv_articulo` FOREIGN KEY (`id_articulo`) REFERENCES `tb_articulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inv_local` FOREIGN KEY (`id_local`) REFERENCES `tb_local` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_local`
--
ALTER TABLE `tb_local`
  ADD CONSTRAINT `fk_local_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_local_tipo` FOREIGN KEY (`id_tipo_local`) REFERENCES `cat_tipo_local` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD CONSTRAINT `fk_modulo_menu` FOREIGN KEY (`id_modulo`) REFERENCES `tb_modulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_metas`
--
ALTER TABLE `tb_metas`
  ADD CONSTRAINT `fk_metas_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_movimiento_inventario`
--
ALTER TABLE `tb_movimiento_inventario`
  ADD CONSTRAINT `fk_mov_articulo` FOREIGN KEY (`id_articulo`) REFERENCES `tb_articulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mov_trans` FOREIGN KEY (`id_transaccion`) REFERENCES `cat_transaccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mov_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_movimiento_local`
--
ALTER TABLE `tb_movimiento_local`
  ADD CONSTRAINT `fk_mov_loc_articulo` FOREIGN KEY (`id_articulo`) REFERENCES `tb_articulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mov_loc_destino` FOREIGN KEY (`id_local_destino`) REFERENCES `tb_local` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mov_loc_mov` FOREIGN KEY (`id_movimiento`) REFERENCES `tb_movimiento_inventario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mov_loc_origen` FOREIGN KEY (`id_local_origen`) REFERENCES `tb_local` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_persona`
--
ALTER TABLE `tb_persona`
  ADD CONSTRAINT `fk_persona_genero` FOREIGN KEY (`id_genero`) REFERENCES `cat_genero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_persona_nac` FOREIGN KEY (`id_nacionalidad`) REFERENCES `cat_nacionalidad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_persona_tipo_doc` FOREIGN KEY (`id_tipo_documento`) REFERENCES `cat_tipo_documento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_usuario_estado` FOREIGN KEY (`id_estado`) REFERENCES `cat_estado_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_local` FOREIGN KEY (`id_local`) REFERENCES `tb_local` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_persona` FOREIGN KEY (`id_persona`) REFERENCES `tb_persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `tb_rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_tipo` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `cat_tipo_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
