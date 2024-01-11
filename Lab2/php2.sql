-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2024 at 10:09 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php2`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `Invoice_id` int NOT NULL,
  `Invoice_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Invoice_Total` double NOT NULL,
  `address` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `Invoice_detail_id` int NOT NULL,
  `Invoice_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `product_name` int NOT NULL,
  `product_price` int NOT NULL,
  `product_quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_phone` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `is_deleted` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_created` int DEFAULT NULL,
  `user_updated` int DEFAULT NULL,
  `user_deleted` int DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_phone`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`, `user_created`, `user_updated`, `user_deleted`, `user_password`) VALUES
(2, 'Nguyễn Văn Đặng1', 'nvdang@gmail.com', '2222222211', 0, '2024-01-05 09:58:19', '2024-01-05 09:58:19', '2024-01-05 09:58:19', NULL, NULL, NULL, '123'),
(10, 'Nguyễn Văn A', 'nva@gmail.com', '0999999999', 0, '2024-01-10 08:47:59', '2024-01-10 08:47:59', '2024-01-10 08:47:59', NULL, NULL, NULL, '123456789'),
(13, 'Nguyễn Văn B nè', 'nmquang1997@gmail.com', '12345678', 0, '2024-01-10 09:38:34', '2024-01-10 09:38:34', '2024-01-10 09:38:34', NULL, NULL, NULL, '12343515'),
(14, 'Nguyễn Văn D', 'nmquang111@gmail.com', '1234567891', 0, '2024-01-10 09:40:20', '2024-01-10 09:40:20', '2024-01-10 09:40:20', NULL, NULL, NULL, '1234444441'),
(17, 'admin', '123123@gmail.com', '123123', 0, '2024-01-10 11:26:37', '2024-01-10 11:26:37', '2024-01-10 11:26:37', NULL, NULL, NULL, '123123'),
(18, 'admin1', '123@gmail.com', '123', 0, '2024-01-10 11:33:35', '2024-01-10 11:33:35', '2024-01-10 11:33:35', NULL, NULL, NULL, '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`Invoice_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `Invoice_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
