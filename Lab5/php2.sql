-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2024 at 01:20 PM
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

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`Invoice_id`, `Invoice_date`, `Invoice_Total`, `address`, `status`) VALUES
(1, '2024-01-14 08:00:00', 150.75, '123 Main St, Cityville', 1),
(2, '2024-01-14 09:15:00', 200.5, '456 Oak St, Townburg', 2),
(3, '2024-01-14 10:30:00', 180.25, '789 Pine St, Villagetown', 1),
(4, '2024-01-14 11:45:00', 120, '567 Birch St, Hamletville', 2),
(5, '2024-01-14 13:00:00', 90.5, '890 Maple St, Countryside', 1),
(6, '2024-01-14 14:15:00', 220.75, '432 Cedar St, Riverside', 2),
(7, '2024-01-14 15:30:00', 180.25, '987 Elm St, Meadowville', 1),
(8, '2024-01-14 16:45:00', 150, '654 Walnut St, Brookside', 2),
(9, '2024-01-14 18:00:00', 200.5, '321 Pine St, Hilltop', 1),
(10, '2024-01-14 19:15:00', 120.75, '876 Oak St, Lakeside', 2),
(11, '2024-01-14 20:30:00', 90.25, '543 Maple St, Mountainview', 1),
(12, '2024-01-14 21:45:00', 250, '210 Cedar St, Seaside', 2),
(13, '2024-01-14 22:00:00', 180.25, '765 Birch St, Skyville', 1),
(14, '2024-01-14 23:15:00', 150.5, '432 Elm St, Oceanfront', 2),
(15, '2024-01-15 00:30:00', 200.75, '987 Walnut St, Lakeshore', 1),
(16, '2024-01-15 01:45:00', 120.25, '654 Pine St, Hillside', 2),
(17, '2024-01-15 03:00:00', 90, '321 Oak St, Countryside', 1),
(18, '2024-01-15 04:15:00', 220.5, '876 Cedar St, Meadowside', 2),
(19, '2024-01-15 05:30:00', 180.75, '543 Birch St, Hillview', 1),
(20, '2024-01-15 06:45:00', 150.25, '210 Elm St, Riverside', 2);

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

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`Invoice_detail_id`, `Invoice_id`, `product_id`, `product_quantity`) VALUES
(1, 1, 1, 5),
(2, 1, 2, 3),
(3, 2, 3, 2),
(4, 2, 4, 4),
(5, 3, 5, 1),
(6, 3, 6, 6),
(7, 4, 7, 3),
(8, 4, 8, 2),
(9, 5, 9, 4),
(10, 5, 10, 3),
(11, 6, 11, 2),
(12, 6, 12, 5),
(13, 7, 13, 3),
(14, 7, 14, 4),
(15, 8, 16, 2),
(16, 8, 18, 3),
(17, 9, 20, 5),
(18, 9, 22, 2),
(19, 10, 23, 3),
(20, 10, 25, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `product_price` int NOT NULL,
  `product_quantity` int NOT NULL,
  `product_description` text COLLATE utf8mb4_general_ci NOT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_user` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_user` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_user` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_description`, `product_img`, `created_user`, `created_at`, `updated_user`, `updated_at`, `deleted_user`, `deleted_at`) VALUES
(1, 'Product 1', 20, 100, 'Description 1', 'image1.jpg', 1, '2024-01-14 18:15:16', 1, '2024-01-14 18:15:16', NULL, NULL),
(2, 'Product 2', 25, 80, 'Description 2', 'image2.jpg', 1, '2024-01-14 18:15:16', 1, '2024-01-14 18:15:16', NULL, NULL),
(3, 'Product 3', 30, 120, 'Description 3', 'image3.jpg', 2, '2024-01-14 18:15:16', 2, '2024-01-14 18:15:16', NULL, NULL),
(4, 'Product 4', 15, 150, 'Description 4', 'image4.jpg', 2, '2024-01-14 18:15:16', 2, '2024-01-14 18:15:16', NULL, NULL),
(5, 'Product 5', 18, 90, 'Description 5', 'image5.jpg', 3, '2024-01-14 18:15:16', 3, '2024-01-14 18:15:16', NULL, NULL),
(6, 'Product 6', 22, 110, 'Description 6', 'image6.jpg', 3, '2024-01-14 18:15:16', 3, '2024-01-14 18:15:16', NULL, NULL),
(7, 'Product 7', 28, 80, 'Description 7', 'image7.jpg', 4, '2024-01-14 18:15:16', 4, '2024-01-14 18:15:16', NULL, NULL),
(8, 'Product 8', 19, 130, 'Description 8', 'image8.jpg', 4, '2024-01-14 18:15:16', 4, '2024-01-14 18:15:16', NULL, NULL),
(9, 'Product 9', 25, 100, 'Description 9', 'image9.jpg', 5, '2024-01-14 18:15:16', 5, '2024-01-14 18:15:16', NULL, NULL),
(10, 'Product 10', 21, 120, 'Description 10', 'image10.jpg', 5, '2024-01-14 18:15:16', 5, '2024-01-14 18:15:16', NULL, NULL),
(11, 'Product 11', 15, 90, 'Description 11', 'image11.jpg', 6, '2024-01-14 18:15:16', 6, '2024-01-14 18:15:16', NULL, NULL),
(12, 'Product 12', 30, 110, 'Description 12', 'image12.jpg', 6, '2024-01-14 18:15:16', 6, '2024-01-14 18:15:16', NULL, NULL),
(13, 'Product 13', 23, 80, 'Description 13', 'image13.jpg', 7, '2024-01-14 18:15:16', 7, '2024-01-14 18:15:16', NULL, NULL),
(14, 'Product 14', 17, 100, 'Description 14', 'image14.jpg', 7, '2024-01-14 18:15:16', 7, '2024-01-14 18:15:16', NULL, NULL),
(15, 'Product 15', 20, 120, 'Description 15', 'image15.jpg', 8, '2024-01-14 18:15:16', 8, '2024-01-14 18:15:16', NULL, NULL),
(16, 'Product 16', 28, 90, 'Description 16', 'image16.jpg', 8, '2024-01-14 18:15:16', 8, '2024-01-14 18:15:16', NULL, NULL),
(17, 'Product 17', 24, 110, 'Description 17', 'image17.jpg', 9, '2024-01-14 18:15:16', 9, '2024-01-14 18:15:16', NULL, NULL),
(18, 'Product 18', 16, 80, 'Description 18', 'image18.jpg', 9, '2024-01-14 18:15:16', 9, '2024-01-14 18:15:16', NULL, NULL),
(19, 'Product 19', 22, 100, 'Description 19', 'image19.jpg', 10, '2024-01-14 18:15:16', 10, '2024-01-14 18:15:16', NULL, NULL),
(20, 'Product 20', 27, 120, 'Description 20', 'image20.jpg', 10, '2024-01-14 18:15:16', 10, '2024-01-14 18:15:16', NULL, NULL);

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
(1, 'John Doe', 'john.doe@example.com', '1234567890', 0, '2024-01-14 08:00:00', '2024-01-14 08:00:00', '2024-01-14 08:00:00', 1, 1, 1, '123456789'),
(2, 'Jane Smith', 'jane.smith@example.com', '9876543210', 0, '2024-01-14 09:15:00', '2024-01-14 09:15:00', '2024-01-14 09:15:00', 2, 2, 2, '123456789'),
(3, 'Bob Johnson', 'bob.johnson@example.com', '5678901234', 0, '2024-01-14 10:30:00', '2024-01-14 10:30:00', '2024-01-14 10:30:00', 3, 3, 3, '123456789'),
(4, 'Alice Williams', 'alice.williams@example.com', '3456789012', 0, '2024-01-14 11:45:00', '2024-01-14 11:45:00', '2024-01-14 11:45:00', 4, 4, 4, '123456789'),
(5, 'Chris Davis', 'chris.davis@example.com', '7890123456', 0, '2024-01-14 13:00:00', '2024-01-14 13:00:00', '2024-01-14 13:00:00', 5, 5, 5, '123456789'),
(6, 'Eva Miller', 'eva.miller@example.com', '2345678901', 0, '2024-01-14 14:15:00', '2024-01-14 14:15:00', '2024-01-14 14:15:00', 6, 6, 6, '123456789'),
(7, 'David Wilson', 'david.wilson@example.com', '8901234567', 0, '2024-01-14 15:30:00', '2024-01-14 15:30:00', '2024-01-14 15:30:00', 7, 7, 7, '123456789'),
(8, 'Grace Moore', 'grace.moore@example.com', '4567890123', 0, '2024-01-14 16:45:00', '2024-01-14 16:45:00', '2024-01-14 16:45:00', 8, 8, 8, '123456789'),
(9, 'Henry Turner', 'henry.turner@example.com', '6543210987', 0, '2024-01-14 18:00:00', '2024-01-14 18:00:00', '2024-01-14 18:00:00', 9, 9, 9, '123456789'),
(10, 'Fiona Lee', 'fiona.lee@example.com', '8907654321', 0, '2024-01-14 19:15:00', '2024-01-14 19:15:00', '2024-01-14 19:15:00', 10, 10, 10, '123456789'),
(11, 'George Harris', 'george.harris@example.com', '3456789012', 0, '2024-01-14 20:30:00', '2024-01-14 20:30:00', '2024-01-14 20:30:00', 11, 11, 11, 'hashed_password_11'),
(12, 'Hannah Johnson', 'hannah.johnson@example.com', '7890123456', 0, '2024-01-14 21:45:00', '2024-01-14 21:45:00', '2024-01-14 21:45:00', 12, 12, 12, '123456789'),
(13, 'Ian Brown', 'ian.brown@example.com', '2345678901', 0, '2024-01-14 22:00:00', '2024-01-14 22:00:00', '2024-01-14 22:00:00', 13, 13, 13, '123456789'),
(14, 'Julia Smith', 'julia.smith@example.com', '8901234567', 0, '2024-01-14 23:15:00', '2024-01-14 23:15:00', '2024-01-14 23:15:00', 14, 14, 14, '123456789'),
(15, 'Kevin White', 'kevin.white@example.com', '4567890123', 0, '2024-01-15 00:30:00', '2024-01-15 00:30:00', '2024-01-15 00:30:00', 15, 15, 15, '123456789'),
(16, 'Lily Turner', 'lily.turner@example.com', '6543210987', 0, '2024-01-15 01:45:00', '2024-01-15 01:45:00', '2024-01-15 01:45:00', 16, 16, 16, '123456789'),
(17, 'Michael Brown', 'michael.brown@example.com', '8907654321', 0, '2024-01-15 03:00:00', '2024-01-15 03:00:00', '2024-01-15 03:00:00', 17, 17, 17, '123456789'),
(18, 'Natalie Davis', 'natalie.davis@example.com', '3456789012', 0, '2024-01-15 04:15:00', '2024-01-15 04:15:00', '2024-01-15 04:15:00', 18, 18, 18, '123456789'),
(19, 'Oliver Miller', 'oliver.miller@example.com', '7890123456', 0, '2024-01-15 05:30:00', '2024-01-15 05:30:00', '2024-01-15 05:30:00', 19, 19, 19, '123456789'),
(20, 'Penelope Harris', 'penelope.harris@example.com', '2345678901', 0, '2024-01-15 06:45:00', '2024-01-15 06:45:00', '2024-01-15 06:45:00', 20, 20, 20, '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`Invoice_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

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
  MODIFY `Invoice_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
