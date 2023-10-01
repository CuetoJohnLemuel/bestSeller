-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 01, 2023 at 10:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'John Lemuel Cueto', 'lemuelcueto@gmail.com', '1', '2023-09-28 13:19:59'),
(4, 'Wintermelon', 'jjjj@gmail.com', '789789', '2023-09-30 08:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `code` text NOT NULL,
  `productName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quantity` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `productDescription` varchar(1000) NOT NULL,
  `productPrice` int NOT NULL,
  `productCategory` varchar(50) NOT NULL,
  `productImage` text NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `productName`, `quantity`, `productDescription`, `productPrice`, `productCategory`, `productImage`, `createdAt`, `updatedAt`) VALUES
(28, '2323', 'Nike', '23', 'Mahuna', 2, 'Bags', 'uploads/1696065709_62ac09f814175b37ee4e.png', '2023-09-30 09:21:49', '2023-09-30 17:36:11'),
(29, '534', 'hfghfg', '345', 'fhfgh', 4361111, 'Bags', 'uploads/1696066302_0e288e907679113efc34.png', '2023-09-30 09:31:42', '2023-09-30 19:41:14'),
(31, 'hjhj', 'hjhj', '78', 'hjhj', 78, 'Bags', 'uploads/1696067693_64e585cc7b1ed0304c7f.png', '2023-09-30 09:54:53', '2023-09-30 17:55:38'),
(32, '67', 'jk', '78', 'jk', 78, 'Shoes', 'uploads/1696068033_e8964008c102e16c568d.jpg', '2023-09-30 10:00:33', '2023-09-30 10:00:33'),
(33, '434GDB', 'Mr. Lee', '34', 'Slim fit', 450, 'T-Shirts', 'uploads/1696083741_61593c3977773dd02ffa.jpg', '2023-09-30 14:22:21', '2023-09-30 14:22:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
