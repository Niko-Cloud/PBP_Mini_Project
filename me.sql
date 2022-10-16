-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 04, 2022 at 08:16 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `me`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('yuki', '63a9f0ea7bb98050796b649e85481845');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `stok` int DEFAULT NULL,
  `harga` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `stok`, `harga`) VALUES
(1, 'Ergonomic Wool Shirt', 439, 4352),
(2, 'Intelligent Plastic Bench', 408, 4318),
(3, 'Sleek Aluminum Car', 300, 3705),
(4, 'Enormous Cotton Clock', 282, 2717),
(5, 'Mediocre Wool Lamp', 408, 1149),
(6, 'Synergistic Plastic Computer', 200, 2964),
(7, 'Durable Wooden Gloves', 296, 3809),
(8, 'Sleek Cotton Keyboard', 302, 1403),
(9, 'Small Plastic Knife', 200, 4621),
(10, 'Sleek Aluminum Coat', 285, 4396),
(11, 'Mediocre Silk Car', 278, 1297),
(12, 'Synergistic Rubber Keyboard', 300, 2812),
(13, 'Heavy Duty Copper Shoes', 255, 3624),
(14, 'Durable Wooden Plate', 480, 1329),
(15, 'Synergistic Iron Shoes', 443, 3152),
(16, 'Aerodynamic Copper Computer', 337, 4421),
(17, 'Awesome Paper Coat', 445, 2897),
(18, 'Lightweight Iron Bag', 372, 1000),
(19, 'Intelligent Wool Table', 210, 1075),
(20, 'Rustic Wooden Wallet', 203, 4037),
(21, 'Incredible Rubber Wallet', 269, 2689),
(22, 'Fantastic Granite Shirt', 475, 1380),
(23, 'Gorgeous Plastic Plate', 436, 2227),
(24, 'Aerodynamic Linen Clock', 407, 1966),
(25, 'Fantastic Leather Bottle', 412, 4217),
(26, 'Aerodynamic Leather Shirt', 282, 1969),
(27, 'Mediocre Granite Knife', 267, 2860),
(28, 'Awesome Bronze Shirt', 364, 2572),
(29, 'Sleek Bronze Bench', 395, 4747),
(30, 'Practical Aluminum Shoes', 242, 2022),
(31, 'Incredible Silk Bench', 340, 2752),
(32, 'Durable Concrete Computer', 217, 2824),
(33, 'Fantastic Copper Gloves', 461, 3290),
(34, 'Intelligent Concrete Gloves', 355, 4654),
(35, 'Ergonomic Wool Bottle', 498, 4795),
(36, 'Small Wooden Hat', 327, 3359),
(37, 'Enormous Linen Table', 225, 1923),
(38, 'Fantastic Copper Bottle', 363, 3883),
(39, 'Sleek Copper Lamp', 269, 3966),
(40, 'Practical Bronze Keyboard', 206, 1771),
(41, 'Mediocre Copper Table', 335, 4845),
(42, 'Intelligent Wool Hat', 244, 3558),
(43, 'Lightweight Wooden Coat', 286, 2905),
(44, 'Incredible Concrete Bench', 430, 3545),
(45, 'Incredible Wooden Plate', 251, 3147),
(46, 'Fantastic Linen Plate', 303, 3787),
(47, 'Small Linen Lamp', 245, 4494),
(48, 'Intelligent Aluminum Chair', 285, 4030),
(49, 'Lightweight Paper Clock', 377, 4395),
(50, 'Heavy Duty Granite Table', 234, 3847),
(51, 'Flexibel Plastic', 344, 4345);

-- --------------------------------------------------------

--
-- Table structure for table `item_struk`
--

CREATE TABLE `item_struk` (
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga` int NOT NULL,
  `jumlah_barang` int NOT NULL,
  `sub_total` int NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `struk`
--

CREATE TABLE `struk` (
  `id_struk` int NOT NULL,
  `pembayaran` int DEFAULT NULL,
  `kembalian` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_struk`
--
ALTER TABLE `item_struk`
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `struk`
--
ALTER TABLE `struk`
  ADD PRIMARY KEY (`id_struk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `struk`
--
ALTER TABLE `struk`
  MODIFY `id_struk` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
