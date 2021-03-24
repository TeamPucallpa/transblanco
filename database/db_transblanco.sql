-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 05:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_transblanco`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `apellido` varchar(200) DEFAULT NULL,
  `ruc_dni` int(11) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `celular` varchar(12) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(300) DEFAULT NULL,
  `latitud` varchar(200) DEFAULT NULL,
  `longitud` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `ruc_dni`, `direccion`, `celular`, `email`, `pass`, `latitud`, `longitud`, `created_at`, `updated_at`) VALUES
(1, 'Gabriel', 'Ojitos', 70428180, 'Jr.Calleria', '945090599', '', '1234', '-933', '-33', '2021-03-17 21:07:25', '2021-03-17 21:07:27'),
(16, 'alexis', 'caballero', 954832290, 'jr. julio c delgado 239', '954832290', '', '$2y$12$nHGem.BwVy9rJ2howI/7BOst6nHqHOoDLdI62vvhT8n5YTwq30lpC', '-8.3771420', '-74.5505539', '2021-03-19 16:18:43', '2021-03-19 16:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `detalle`
--

CREATE TABLE `detalle` (
  `pedido_id` bigint(20) NOT NULL,
  `producto_id` bigint(20) NOT NULL,
  `precio` float NOT NULL,
  `cant` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `total` float NOT NULL,
  `promocion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalle`
--

INSERT INTO `detalle` (`pedido_id`, `producto_id`, `precio`, `cant`, `subtotal`, `total`, `promocion`) VALUES
(7, 1, 20, 1, 20, 20, 0),
(7, 2, 15, 1, 15, 15, 0),
(7, 3, 15, 1, 15, 15, 0),
(8, 1, 20, 1, 20, 20, 0),
(8, 2, 15, 1, 15, 15, 0),
(8, 3, 15, 1, 15, 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `id` bigint(20) NOT NULL,
  `cliente_id` bigint(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `tipo_pago` int(11) NOT NULL,
  `total` float NOT NULL,
  `subtotal` float NOT NULL,
  `impuesto` float NOT NULL,
  `descuento` float NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pedido`
--

INSERT INTO `pedido` (`id`, `cliente_id`, `fecha`, `tipo_pago`, `total`, `subtotal`, `impuesto`, `descuento`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-03-03', 2, 2, 150, 3, 33, 1, '2021-03-23 17:33:13', '2021-03-23 17:33:13'),
(2, 1, '2020-03-03', 2, 2.3, 150, 3.3, 333.3, 1, '2021-03-23 17:34:21', '2021-03-23 17:34:21'),
(3, 1, '2021-03-27', 1, 105, 105, 0, 0, 1, '2021-03-23 20:41:08', '2021-03-23 20:41:08'),
(4, 1, '2021-03-27', 1, 105, 105, 0, 0, 1, '2021-03-23 21:00:15', '2021-03-23 21:00:15'),
(5, 1, '2021-03-29', 1, 105, 105, 0, 0, 1, '2021-03-23 21:04:16', '2021-03-23 21:04:16'),
(6, 1, '2021-03-25', 1, 35, 35, 0, 0, 1, '2021-03-23 21:08:36', '2021-03-23 21:08:36'),
(7, 1, '2020-03-03', 2, 2.3, 150, 3.3, 333.3, 1, '2021-03-23 21:41:21', '2021-03-23 21:41:21'),
(8, 1, '2021-03-27', 1, 50, 50, 0, 0, 1, '2021-03-23 21:42:09', '2021-03-23 21:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL,
  `oferta` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `precio_viejo` float DEFAULT NULL,
  `imagen` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `stock`, `oferta`, `precio`, `precio_viejo`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Six Pack SAN JUAN', 'Cerveza de la buena', 3, 1, 20, 25, 'https://vivanda.vteximg.com.br/arquivos/ids/242545-1000-1000/20063814.jpg?v=637438443236400000', '2021-03-20 21:16:24', '2021-03-20 21:16:24'),
(2, 'Six Pack LECHE GLORIA', 'Leche de la buena', 3, 0, 15, 20, 'https://www.reinsac.com/wp-content/uploads/2020/06/595706.png', '2021-03-20 21:19:11', '2021-03-20 21:19:11'),
(3, 'Six Pack Yogurt', 'Yogurt de la buena', 3, 0, 15, 20, 'https://www.minimarketpeter.pe/wp-content/uploads/2020/05/yomost-fresa.jpg', '2021-03-20 21:19:11', '2021-03-20 21:19:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `celular` (`celular`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
