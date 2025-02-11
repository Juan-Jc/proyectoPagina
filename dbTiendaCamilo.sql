-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para tienda
CREATE DATABASE IF NOT EXISTS `tienda` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `tienda`;

-- Volcando estructura para tabla tienda.accesos
CREATE TABLE IF NOT EXISTS `accesos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `pass` varchar(8) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `correcto` char(1) NOT NULL,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla tienda.accesos: ~19 rows (aproximadamente)
DELETE FROM `accesos`;
INSERT INTO `accesos` (`id`, `email`, `pass`, `fecha`, `correcto`, `ip`) VALUES
	(1, 'juan@dummy.com', '78945612', '0000-00-00 00:00:00', '0', '::1'),
	(2, 'juan@dummy.com', '78945612', '0000-00-00 00:00:00', '0', '::1'),
	(3, 'juan@admin.com', '12345678', '2024-12-18 19:35:23', '0', '::1'),
	(4, 'juan@admin.com', '12345678', '2024-12-18 19:58:08', '1', '::1'),
	(5, 'juan@dummy.com', '78945612', '2024-12-18 19:58:28', '0', '::1'),
	(6, 'juan@admin.com', '12345678', '2024-12-18 20:30:16', '1', '::1'),
	(7, 'juan@admin.com', '12345678', '2024-12-19 15:33:08', '1', '::1'),
	(8, 'juan@admin.com', '12345678', '2024-12-19 16:19:10', '1', '::1'),
	(9, 'juan@admin.com', '12345678', '2024-12-19 16:21:32', '1', '::1'),
	(10, 'juan@admin.com', '12345678', '2024-12-19 18:52:36', '1', '::1'),
	(11, 'juan@admin.com', '12345678', '2024-12-20 15:35:35', '1', '::1'),
	(12, 'alejo@user.com', '12345678', '2024-12-20 17:51:48', '1', '::1'),
	(13, 'juan@admin.com', '12345678', '2024-12-20 17:53:11', '1', '::1'),
	(14, 'alejo@user.com', '12345678', '2024-12-20 17:53:20', '1', '::1'),
	(15, 'juan@admin.com', '12345678', '2024-12-20 19:10:35', '1', '::1'),
	(16, 'juan@admin.com', 'admin', '2025-01-07 15:59:23', '0', '::1'),
	(17, 'juan@admin.com', '1234', '2025-01-07 15:59:32', '0', '::1'),
	(18, 'juan@admin.com', '12345678', '2025-01-07 15:59:54', '1', '::1'),
	(19, 'alejo@user.com', '12345678', '2025-01-07 16:02:29', '1', '::1'),
	(20, 'oijf@gmil.com', 'odkpf', '2025-01-07 16:46:20', '0', '::1'),
	(21, 'juan@admin.com', '12345678', '2025-01-07 17:00:24', '1', '::1'),
	(22, 'juan@admin.com', '12345678', '2025-01-09 15:32:03', '1', '::1'),
	(23, 'juan@admin.com', '12345678', '2025-01-15 17:57:02', '1', '::1'),
	(24, 'juan@admin.com', '12345678', '2025-01-16 20:26:56', '1', '::1'),
	(25, 'juan@admin.com', '12345678', '2025-01-17 16:33:23', '1', '::1'),
	(26, 'juan@admin.com', '12345678', '2025-01-20 16:36:05', '1', '::1'),
	(27, 'juan@admin.com', '12345678', '2025-01-21 15:33:36', '1', '::1'),
	(28, 'juan@admin.com', '12345678', '2025-01-22 16:02:25', '1', '::1'),
	(29, 'juan@admin.com', '12345678', '2025-02-05 19:49:50', '1', '::1'),
	(30, 'juan@admin.com', '12345678', '2025-02-06 15:42:53', '1', '::1'),
	(31, 'juan@admin.com', '12345678', '2025-02-11 15:44:43', '1', '::1');

-- Volcando estructura para tabla tienda.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `idCat` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCat` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idCat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla tienda.categorias: ~2 rows (aproximadamente)
DELETE FROM `categorias`;
INSERT INTO `categorias` (`idCat`, `nombreCat`, `url`) VALUES
	(1, 'hombre', '678bba54cf25c_ImgCatHombre.jpg'),
	(2, 'mujer', '678bba5fca827_ImgCatMujer.jpg');

-- Volcando estructura para tabla tienda.fotosproductos
CREATE TABLE IF NOT EXISTS `fotosproductos` (
  `idProducto` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  KEY `idProducto` (`idProducto`),
  CONSTRAINT `linkFotos` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla tienda.fotosproductos: ~19 rows (aproximadamente)
DELETE FROM `fotosproductos`;
INSERT INTO `fotosproductos` (`idProducto`, `url`) VALUES
	(1, 'productoHombre1.jpg'),
	(2, 'productoHombre2.jpg'),
	(3, 'productoHombre3.jpg'),
	(4, 'productoHombre4.jpg'),
	(5, 'productoHombre5.jpg'),
	(6, 'productoHombre6.jpg'),
	(7, 'productoMujer1.jpg'),
	(8, 'productoMujer2.jpg'),
	(9, 'productoMujer3.jpg'),
	(10, 'productoMujer4.jpg'),
	(11, 'productoMujer5.jpg'),
	(12, 'productoMujer6.jpg'),
	(13, 'productoOferta1.jpg'),
	(14, 'productoOferta2.jpg'),
	(15, 'productoOferta3.jpg'),
	(1, 'productohombre1-2.jpg'),
	(2, 'productohombre2-2.jpg'),
	(24, '67a4d8c46ef28_1.jpg'),
	(24, '67a4f03fc78e9_ico2.jpg');

-- Volcando estructura para tabla tienda.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `email` varchar(250) NOT NULL,
  `idProducto` int(250) NOT NULL,
  `nombreProducto` varchar(250) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  KEY `email` (`email`),
  KEY `idProducto` (`idProducto`),
  CONSTRAINT `FK_pedidos_productos` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pedidos_usuarios` FOREIGN KEY (`email`) REFERENCES `usuarios` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla tienda.pedidos: ~0 rows (aproximadamente)
DELETE FROM `pedidos`;

-- Volcando estructura para tabla tienda.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `descLarga` varchar(300) NOT NULL,
  `precio` int(11) NOT NULL,
  `idCat` int(11) DEFAULT NULL,
  `oferta` int(11) NOT NULL COMMENT 'son porcentajes',
  PRIMARY KEY (`idProducto`),
  KEY `FK_productos_categorias` (`idCat`),
  CONSTRAINT `FK_productos_categorias` FOREIGN KEY (`idCat`) REFERENCES `categorias` (`idCat`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla tienda.productos: ~17 rows (aproximadamente)
DELETE FROM `productos`;
INSERT INTO `productos` (`idProducto`, `nombre`, `descripcion`, `descLarga`, `precio`, `idCat`, `oferta`) VALUES
	(1, 'Marshal Flannel', 'Camisa de Manga Larga para Hombre', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti iste fugiat, dolores quaerat quam impedit quas error dicta magnam ipsum aliquid. Provident deserunt iste ex maxime? Veritatis, quis facere. Harum?', 70, 1, 0),
	(2, 'DC Star', 'Camiseta para Hombre', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti iste fugiat, dolores quaerat quam impedit quas error dicta magnam ipsum aliquid. Provident deserunt iste ex maxime? Veritatis, quis facere. Harum?', 35, 1, 0),
	(3, 'Pure', 'Zapatillas de cuero para Hombre', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti iste fugiat, dolores quaerat quam impedit quas error dicta magnam ipsum aliquid. Provident deserunt iste ex maxime? Veritatis, quis facere. Harum?', 80, 1, 1),
	(4, 'Teknic', 'Zapatillas de cuero para Hombre', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti iste fugiat, dolores quaerat quam impedit quas error dicta magnam ipsum aliquid. Provident deserunt iste ex maxime? Veritatis, quis facere. Harum?', 85, 1, 0),
	(5, 'Worker', 'Vaquero de Corte Recto para Hombre', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti iste fugiat, dolores quaerat quam impedit quas error dicta magnam ipsum aliquid. Provident deserunt iste ex maxime? Veritatis, quis facere. Harum?', 85, 1, 0),
	(6, 'DC Cap Star', 'Gorra Flexfit para Hombre', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti iste fugiat, dolores quaerat quam impedit quas error dicta magnam ipsum aliquid. Provident deserunt iste ex maxime? Veritatis, quis facere. Harum?', 30, 1, 0),
	(7, 'Nonchalant', 'Pantalón técnico snow para Mujer', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti iste fugiat, dolores quaerat quam impedit quas error dicta magnam ipsum aliquid. Provident deserunt iste ex maxime? Veritatis, quis facere. Harum?', 155, 2, 0),
	(8, 'Chalet Anorak', 'Chaqueta para Nieve para Mujer', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti iste fugiat, dolores quaerat quam impedit quas error dicta magnam ipsum aliquid. Provident deserunt iste ex maxime? Veritatis, quis facere. Harum?', 200, 2, 1),
	(9, 'Chelsea', 'Zapatillas con Plataforma para Mujer', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti iste fugiat, dolores quaerat quam impedit quas error dicta magnam ipsum aliquid. Provident deserunt iste ex maxime? Veritatis, quis facere. Harum?', 75, 2, 0),
	(10, 'Splendid', 'Gorro para Mujer', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti iste fugiat, dolores quaerat quam impedit quas error dicta magnam ipsum aliquid. Provident deserunt iste ex maxime? Veritatis, quis facere. Harum?', 35, 2, 0),
	(11, 'Manteca 4 Hi', 'Zapatillas de cuero altas para Mujer', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti iste fugiat, dolores quaerat quam impedit quas error dicta magnam ipsum aliquid. Provident deserunt iste ex maxime? Veritatis, quis facere. Harum?', 95, 2, 0),
	(12, 'Franchise', 'Manoplas técnicas snowboard/esquí para Mujer', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti iste fugiat, dolores quaerat quam impedit quas error dicta magnam ipsum aliquid. Provident deserunt iste ex maxime? Veritatis, quis facere. Harum?', 55, 2, 0),
	(13, 'Construct', 'Zapatillas para Hombre', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti iste fugiat, dolores quaerat quam impedit quas error dicta magnam ipsum aliquid. Provident deserunt iste ex maxime? Veritatis, quis facere. Harum?', 90, 1, 10),
	(14, 'Teknic', 'Zapatillas de cuero para Hombre', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti iste fugiat, dolores quaerat quam impedit quas error dicta magnam ipsum aliquid. Provident deserunt iste ex maxime? Veritatis, quis facere. Harum?', 85, 1, 20),
	(15, 'Truth OG', 'Zapatillas para Hombre Truth OG', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti iste fugiat, dolores quaerat quam impedit quas error dicta magnam ipsum aliquid. Provident deserunt iste ex maxime? Veritatis, quis facere. Harum?', 130, 1, 0),
	(23, 'prueba', 'jaskdjf', 'asdfad', 123, 1, 0),
	(24, 'prueba 2', 'jaskdjf', 'asdfad', 1233, 1, 0);

-- Volcando estructura para tabla tienda.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `nombre` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL,
  `telef` varchar(9) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `provincia` varchar(20) DEFAULT NULL,
  `rol` char(1) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla tienda.usuarios: ~5 rows (aproximadamente)
DELETE FROM `usuarios`;
INSERT INTO `usuarios` (`nombre`, `pass`, `email`, `telef`, `direccion`, `cp`, `provincia`, `rol`) VALUES
	('alejandro', '12345678', 'alejo@user.com', '999999999', 'calle elche', '03025', 'elche', '2'),
	('carlos', '123456', 'carlos@user.com', '999999999', 'calle elche', '03025', 'elche', '2'),
	('emilo', '123456', 'emilio@user.com', '999999999', 'calle elche', '03025', 'elche', '2'),
	('irene', '$2y$10$JhYbYlh5d0NCAvW1XOPoDeoweSvCUAPLl40w1wKJvxK', 'irene@user.com', '789789789', 'calle alicante', '03058', 'sanvi', '2'),
	('juan', '12345678', 'juan@admin.com', '625896321', 'virgen del carmen', '03012', 'alicante', '1'),
	('maria', '$2y$10$Q', 'mary@user.com', '456456456', 'calle elche', '03025', 'elche', '2');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
